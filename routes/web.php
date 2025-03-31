<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtworksController;
use App\Http\Controllers\ProfileArtwork;
use Illuminate\Support\Facades\Session;

Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');





Route::get('/', function () {
    return view('landing');
});


Route::get('/', function () {
    return view('landing');
})->name('home'); 

//auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Artwork Upload Routes
Route::get('/profile', [ArtworksController::class, 'showProfile'])->name('profile'); // tigsaro ko na so pag show kang profile with modals yes
Route::post('/storeUpload', [ArtworksController::class, 'storeUpload'])->name('storeUpload');

//Route::get('/artworks', [ProfileArtwork::class, 'profileArtwork']);

Route::get('/paintings', function () {
    return view('Mods.painting');
})->name('paintings');

Route::get('/drawings', function () {
    return view('Mods.drawings');
})->name('drawings');

Route::get('/sculptures', function () {
    return view('Mods.sculptures');
})->name('sculptures');

// STATIC PAGES
//artist view
Route::get('/artists', function () {
    return view('Mods.artists');
})->name('artists');

//PRODUCT VIEW
Route::get('/product-details', function () {
    return view('productView.product');
})->name('product-details');

//announcements page view
Route::get('/announcements', function () {
    return view('Mods.announcements');
})->name('announcements');

//  FOR ADMIN
Route::get('/admin', function () {
    return view('Admin.admin');
})->name('admin');
Route::get('/management', function () {
    return view('Admin.management');
})->name('management');


//LAYOUTS
// FOR BG EXTEND
Route::get('/forbg', function () {
    return view('Mods.painting');
})->name('forbg');

//FOR NAV EXTEND
Route::get('/forNav', function () {
    return view('Mods.painting');
})->name('forNav');

//FOR FOOTER
Route::get('/footer', function () {
    return view('layouts.footer');
})->name('footer');

//Route::get('/artwork/{id}', [ArtworksController::class, 'showDetails'])->name('artwork');
Route::get('/product-details/{id}', [ArtworksController::class, 'showDetails'])->name('product-details');
Route::get('/category/{category}', [ArtworksController::class, 'showByCategory'])->name('category');