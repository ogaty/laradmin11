<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('img');
        if (!is_null($file)) {
            $path = $request->post('path');
            if ($path) {
                $result = Storage::disk('s3')->put($path, $file);
            } else {
                $result = Storage::disk('s3')->put('/news4', $file);
            }
        } else {
            $result = null;
        }

        return response()->json(['path' => $result]);
    }

    public function list()
    {
        $files = Storage::disk('s3')->files('/news4');

        return response()->json(['files' => $files]);
    }
}
