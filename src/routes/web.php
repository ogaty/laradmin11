<?php

use App\Http\Controllers as Controllers;
use App\Http\Controllers\Api as ApiControllers;
use Illuminate\Support\Facades\Route;

Route::get('/auth/login', [Controllers\AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/login', [Controllers\AuthController::class, 'postLogin']);
Route::get('/auth/logout', [Controllers\AuthController::class, 'logout'])->name('auth.logout');


Route::middleware('auth:web')->group(function () {
    Route::get('/', [Controllers\HomeController::class, 'dashboard']);
    Route::get('/dashboard', [Controllers\HomeController::class, 'dashboard']);
    Route::get('/news', [Controllers\NewsController::class, 'index'])->name('news.index');
    Route::get('/news1', [Controllers\NewsController::class, 'index1'])->name('news1.index');
    Route::get('/news2', [Controllers\NewsController::class, 'index2'])->name('news2.index');
    Route::get('/news3', [Controllers\NewsController::class, 'index3'])->name('news3.index');
    Route::get('/news4', [Controllers\NewsController::class, 'index4'])->name('news4.index');
    Route::get('/news5', [Controllers\NewsController::class, 'index5'])->name('news5.index');
    Route::get('/news6', [Controllers\NewsController::class, 'index6'])->name('news6.index');
    Route::post('/news/add', [Controllers\NewsController::class, 'store1']);
    Route::post('/news1/add', [Controllers\NewsController::class, 'store1'])->middleware(\Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class);
    Route::post('/news2/add', [Controllers\NewsController::class, 'store2']);
    Route::post('/news3/add', [Controllers\NewsController::class, 'store3']);
    Route::post('/news4/add', [Controllers\NewsController::class, 'store4']);
    Route::post('/news5/add', [Controllers\NewsController::class, 'store5']);
    Route::get('/news-media', [Controllers\NewsMediaController::class, 'index'])->name('news-media.index');
    Route::post('/news-media/add', [Controllers\NewsMediaController::class, 'store']);
    Route::get('/news-media/media/{id}', [Controllers\NewsMediaController::class, 'medias']);

    Route::get('/downloads', [Controllers\DownloadController::class, 'index'])->name('download.index');

    Route::get('/downloads/csv', [Controllers\DownloadController::class, 'downloadCsv'])->name('download.csv');
    Route::get('/downloads/csv2', [Controllers\DownloadController::class, 'downloadCsv2'])->name('download.csv2');
    Route::get('/downloads/csv3', [Controllers\DownloadController::class, 'downloadCsv3'])->name('download.csv3');
    Route::get('/downloads/csv4', [Controllers\DownloadController::class, 'downloadCsv4'])->name('download.csv4');
    Route::get('/downloads/zip', [Controllers\DownloadController::class, 'downloadZip'])->name('download.zip');
    Route::get('/downloads/pdf', [Controllers\DownloadController::class, 'downloadPdf'])->name('download.pdf');

    Route::get('/uploads', [Controllers\UploadController::class, 'index'])->name('upload.index');

    Route::get('/documents', [Controllers\DocumentController::class, 'index'])->name('document.index');

    Route::get('/slider/splide1', [Controllers\SliderController::class, 'splide'])->name('slider.splide');
    Route::get('/slider/swiper', [Controllers\SliderController::class, 'swiper'])->name('slider.swiper');
    Route::get('/slider/glide1', [Controllers\SliderController::class, 'glide'])->name('slider.glide');

    Route::get('/paginate/type1', [Controllers\PaginationController::class, 'type1'])->name('paginate.type1');
    Route::get('/paginate/type2', [Controllers\PaginationController::class, 'type2'])->name('paginate.type2');

    Route::get('/users', [Controllers\UserController::class, 'index'])->name('user.index');
    Route::get('/usertokens', [Controllers\UserController::class, 'index'])->name('usertoken.index');
});

//Route::middleware('auth:web')->group(function () {
//    Route::post('/file/upload', [Controllers\Api\FileController::class, 'upload'])->name('api.file.upload2');
//    Route::get('/file/list', [Controllers\Api\FileController::class, 'list'])->name('api.file.list');
//});
