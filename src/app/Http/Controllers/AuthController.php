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
        $remember = $request->input('remember');
        if (Auth::attempt(['email' => $email, 'password' => $password], $remember == 1)) {
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
