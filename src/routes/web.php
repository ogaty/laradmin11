<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers as Controllers;

Route::get('/auth/login', [Controllers\AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/login', [Controllers\AuthController::class, 'postLogin']);
Route::get('/auth/logout', [Controllers\AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth:web')->group(function () {
    Route::get('/', [Controllers\HomeController::class, 'dashboard']);
    Route::get('/dashboard', [Controllers\HomeController::class, 'dashboard']);
    Route::get('/news', [Controllers\NewsController::class, 'index'])->name('news.index');
    Route::get('/news1', [Controllers\NewsController::class, 'index'])->name('news1.index');
    Route::get('/news2', [Controllers\NewsController::class, 'index2'])->name('news2.index');
    Route::get('/news3', [Controllers\NewsController::class, 'index3'])->name('news3.index');
    Route::get('/news4', [Controllers\NewsController::class, 'index4'])->name('news4.index');
    Route::get('/news5', [Controllers\NewsController::class, 'index5'])->name('news5.index');
    Route::get('/news6', [Controllers\NewsController::class, 'index6'])->name('news6.index');
    Route::post('/news/add', [Controllers\NewsController::class, 'store1']);
    Route::post('/news1/add', [Controllers\NewsController::class, 'store1']);
    Route::post('/news2/add', [Controllers\NewsController::class, 'store2']);
    Route::post('/news3/add', [Controllers\NewsController::class, 'store3']);
    Route::post('/news4/add', [Controllers\NewsController::class, 'store4']);
    Route::post('/news5/add', [Controllers\NewsController::class, 'store5']);
    Route::get('/news-media', [Controllers\NewsMediaController::class, 'index'])->name('news-media.index');
    Route::post('/news-media/add', [Controllers\NewsMediaController::class, 'store']);
    Route::get('/news-media/media/{id}', [Controllers\NewsMediaController::class, 'medias']);

    Route::get('/users', [Controllers\UserController::class, 'index'])->name('user.index');
    Route::get('/usertokens', [Controllers\UserController::class, 'index'])->name('usertoken.index');
});

Route::middleware('auth:web')->group(function () {
    Route::post('/file/upload', [Controllers\Api\FileController::class, 'upload'])->name('api.file.upload');
    Route::get('/file/list', [Controllers\Api\FileController::class, 'list'])->name('api.file.list');
});
