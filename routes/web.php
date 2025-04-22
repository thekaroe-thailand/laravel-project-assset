<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function() {
    return view ('pages.about');
})->name('about');

Route::get('/contact', function() {
    return view('pages.contact');
})->name('contact');

Route::get('/login', function() {
    return view('pages.login');
})->name('login');

Route::get('/register', function() {
    return view('pages.register');
})->name('register');

Route::get('/popular', function() {
    return view('pages.popular');
})->name('popular');

Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/post', [UserController::class, 'post'])->name('post');
Route::post('/post', [UserController::class, 'postSubmit'])->name('post');
Route::get('/my-post', [UserController::class, 'myPost'])->name('my-post');
Route::get('/sale-asset/{id}', [UserController::class, 'saleAsset'])->name('sale-asset');
Route::get('/normal-asset/{id}', [UserController::class, 'normalAsset'])->name('normal-asset');
Route::get('/cancel-assest/{id}', [UserController::class, 'cancelAsset'])->name('cancel-asset');
Route::get('/asset-image/{id}', [UserController::class, 'assetImage'])->name('asset-image');
Route::post('/asset-image-submit', [UserController::class, 'assetImageSubmit'])->name('asset-image-submit');
Route::get('/image/{fileName}', function($fileName) {
    $path = storage_path('app/public/uploads/'.$fileName);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
});

Route::get('/set-main-image/{id}', [UserController::class, 'setMainImage'])->name('set-main-image');











