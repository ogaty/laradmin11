<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public $blade = "/admin/upload";

    public function index()
    {
        file_put_contents('/tmp/zipu/aaa.txt', 'aaa');
        $uploads = Upload::all();
        return view($this->blade . '/index', [
            'uploads' => $uploads,
        ]);
    }

    public function zip(Request $request)
    {
        $randomString = Str::random(5);
        $zipDir = '/tmp/zipu/' . $randomString;
        if (!is_dir($zipDir)) {
            mkdir($zipDir, 0777, true);
        }

        $handle = opendir($zipDir);

        $f = "";
        while (false!==($file = readdir($handle))) {
            if (is_dir($zipDir . $file) && !preg_match('/^\./', $file)) {
                $f = $file;
                break;
            }
        }
        dd($f);
    }
}
