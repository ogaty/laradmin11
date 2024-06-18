<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api as ApiControllers;

Route::post('/auth/login', [ApiControllers\AuthController::class, 'postLogin']);

Route::middleware('auth:web')->group(function () {
    Route::post('/file/upload', [ApiControllers\FileController::class, 'upload'])->name('api.file.upload');
});
