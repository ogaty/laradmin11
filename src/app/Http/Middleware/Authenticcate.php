<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;

class Authenticcate extends \Illuminate\Auth\Middleware\Authenticate
{
    protected function redirectTo(Request $request)
    {
        return route('auth.login');
    }
}
