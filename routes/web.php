<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/login', function () {
    return view('Registration.login');
})->name('login');

Route::get('/register', function () {
    return view('Registration.register');
})->name('register');
