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















