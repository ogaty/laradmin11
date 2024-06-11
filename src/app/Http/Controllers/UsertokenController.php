<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * トークンつきUser
 * 明示的に別ユーザーにしている
 */
class UsertokenController extends Controller
{
    protected $blade = "/usertokens";

    /**
     */
    public function index()
    {
        $message = Session::get("message");
        return view($this->blade . '/index', ["message" => $message]);
    }
}
