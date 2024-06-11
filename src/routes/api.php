<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Controllers;

Route::middleware('auth:web')->group(function () {
    Route::post('/file/upload', [Controllers\Api\FileController::class, 'upload'])->name('api.file.upload');
});
