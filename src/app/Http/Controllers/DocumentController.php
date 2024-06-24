<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 役立つリンク集
 */
class DocumentController extends Controller
{
    public $blade = "/admin/document";

    public function index() 
    {
        return view($this->blade . '/index');
    }
}
