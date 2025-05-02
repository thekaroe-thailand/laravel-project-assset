<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');

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
Route::get('/delete-image/{id}', [UserController::class, 'deleteImage'])->name('delete-image');
Route::post('/search', [HomeController::class, 'search'])->name('search');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');
Route::get('/popular', [HomeController::class, 'popular'])->name('popular');
Route::get('/asset-in-categories/{id}', [HomeController::class, 'assetInCategories'])
    ->name('asset-in-categories');
Route::get('/edit-profile', [UserController::class, 'editProfile'])
    ->name('edit-profile');
Route::post('/edit-profile', [UserController::class, 'editProfileSubmit'])
    ->name('edit-profile-submit');
Route::get('/backoffice-signin', [AdminController::class, 'index'])
    ->name('backoffice-signin');
Route::post('/backoffice-signin', [AdminController::class, 'signin'])
    ->name('backoffice-signin');
Route::get('/backoffice/dashboard', [AdminController::class, 'dashboard'])
    ->name('backoffice-dashboard');
Route::get('/backoffice/signout', [AdminController::class, 'signout'])
    ->name('backoffice-signout');
Route::get('/backoffice/edit-profile', [AdminController::class, 'editProfile'])
    ->name('backoffice-edit-profile');
Route::post('/backoffice/edit-profile', [AdminController::class, 'editProfileSubmit'])
    ->name('backoffice-edit-profile-submit');

Route::group(['prefix' => 'backoffice'], function() {
    Route::get('/list', [AdminController::class, 'list'])
        ->name('backoffice-list');
    Route::get('/delete-admin/{id}', [AdminController::class, 'deleteAdmin'])
        ->name('backoffice-delete-admin');
    Route::get('/add-admin', [AdminController::class, 'addAdmin'])
        ->name('backoffice-add-admin');
    Route::post('/add-admin', [AdminController::class, 'addAdminSubmit'])
        ->name('backoffice-add-admin-submit');
    Route::get('/edit-admin/{id}', [AdminController::class, 'editAdmin'])
        ->name('backoffice-edit-admin');
    Route::post('/edit-admin/{id}', [AdminController::class, 'editAdminSubmit'])
        ->name('backoffice-edit-admin-submit');
});

