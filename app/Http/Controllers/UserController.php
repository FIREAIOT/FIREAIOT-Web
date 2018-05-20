<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
     * @return UserResource
     */
    public function index()
    {
        return new UserResource(auth()->user());
    }
}
