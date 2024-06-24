<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public $blade = "/admin/upload";

    public function index()
    {
        $uploads = Upload::all();
        return view($this->blade . '/index', [
            'uploads' => $uploads,
        ]);
    }
}
