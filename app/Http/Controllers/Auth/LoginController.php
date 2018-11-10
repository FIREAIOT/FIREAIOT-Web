<?php

namespace App\Http\Controllers\Auth;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @param Request $request
     * @param Client $client
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request, Client $client)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        try {
            $response = $client->post(config('app.url').'/oauth/token', [
                'form_params'       => [
                    'client_id'     => config('auth.proxy.client_id'),
                    'client_secret' => config('auth.proxy.client_secret'),
                    'grant_type'    => config('auth.proxy.grant_type'),
                    'username'      => $request->email,
                    'password'      => $request->password,
                    'scopes'        => '[*]'
                ]
            ]);

            if ($response->getStatusCode() === 200) {
                $this->clearLoginAttempts($request);

                return response($response->getBody()->getContents(), $response->getStatusCode());
            }
        } catch (\Exception $e) {
            $this->incrementLoginAttempts($request);

            return response('Invalid!', 401);
        }
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password'        => 'required|string',
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response(null, 204);
    }
}
