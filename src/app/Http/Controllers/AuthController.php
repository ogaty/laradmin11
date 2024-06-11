<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     */
    public function login()
    {
        return view('auth/login');
    }

    /**
     * @param Request $request
     */
    public function postLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('/dashboard');
        }

        return redirect()->back();
    }

    /**
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/auth/login');
    }
}
