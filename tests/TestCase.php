<?php

namespace Tests;

use App\Exceptions\Handler;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;
    
    /**
     * Called when the test is created.
     */
    protected function setUp()
    {
        parent::setUp();
        
        DB::statement('PRAGMA foreign_keys=on;');
        $this->disableExceptionHandling();
    }
    
    /**
     *
     */
    protected function disableExceptionHandling()
    {
        $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);
        
        $this->app->instance(ExceptionHandler::class, new class extends Handler {
            public function __construct() {}
            public function report(\Exception $e) {}
            public function render($request, \Exception $e) {
                throw $e;
            }
        });
    }
    
    /**
     * @return $this
     */
    protected function withExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, $this->oldExceptionHandler);
        return $this;
    }
    
    /**
     * @return array
     */
    public function unauthorizedJsonResponse()
    {
        return [
            "data"    => [],
            "status"  => "error",
            "message" => "Unauthorized.",
            "errors"  => []
        ];
    }
    
    /**
     * @return array
     */
    public function unauthenticatedJsonResponse()
    {
        return [
            "data"    => [],
            "status"  => "error",
            "message" => "Unauthenticated.",
            "errors"  => []
        ];
    }
}
