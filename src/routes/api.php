<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api as ApiControllers;

Route::post('/auth/login', [ApiControllers\AuthController::class, 'postLogin'])->name('api.postLogin');
Route::post('/auth/logout', [ApiControllers\AuthController::class, 'logout'])->name('api.logout');

Route::middleware('auth:web')->group(function () {
    Route::post('/users/me', [ApiControllers\AuthController::class, 'me'])->name('api.me');
    Route::post('/file/upload', [ApiControllers\FileController::class, 'upload'])->name('api.file.upload');
});
