<?php

use Illuminate\Support\Facades\Route;

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


//  FOR ADMIN
Route::get('/admin', function () {
    return view('Admin.admin');
})->name('admin');

Route::get('/profile', function () {
    return view('Mods.profile');
})->name('profile');
