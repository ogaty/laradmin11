<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * 通常ユーザー
 */
class UserController extends Controller
{
    protected $blade = "/users";

    /**
     */
    public function index()
    {
        $message = Session::get("message");
        return view($this->blade . '/index', ["message" => $message]);
    }
}
