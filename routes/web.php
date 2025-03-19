<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');









Route::get('/', function () {
    return view('landing');
});

Route::get('/', function () {
    return view('landing');
})->name('home'); 

Route::get('/login', function () {
    return view('Registration.login');
})->name('login');

Route::get('/register', function () {
    return view('Registration.register');
})->name('register');


Route::get('/paintings', function () {
    return view('Mods.painting');
})->name('paintings');

Route::get('/drawings', function () {
    return view('Mods.drawings');
})->name('drawings');

Route::get('/sculptures', function () {
    return view('Mods.sculptures');
})->name('sculptures');

Route::get('/artists', function () {
    return view('Mods.artists');
})->name('artists');




//PRODUCT VIEW
Route::get('/product-details', function () {
    return view('productView.product');
})->name('product-details');


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

Route::get('/profile', function () {
    return view('Mods.profile');
})->name('profile');
