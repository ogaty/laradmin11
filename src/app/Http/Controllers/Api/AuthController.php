<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Usertoken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @param Request $request
     */
    public function postLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return response()->json([], 400);
        }

        $user = User::where('email', $email)->first();

        return response()->json($user, 200);
    }

    /**
     */
    public function logout()
    {
        Auth::logout();

        return response()->json([], 200);
    }

    /**
     * @param Request $request
     */
    public function tokenLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = Usertoken::where('email', $email)->where('password', Hash::make($password))->first(9);

        // ログインセッションを持たせる必要なし、持たせたらtokenの意味が無い
        if ($user) {
            $token = $user->createToken('mytoken');

            return response()->json($token->plainTextToken);
        }

        return response()->json(['auth failed.']);
    }
}
