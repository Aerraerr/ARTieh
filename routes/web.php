<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtworksController;
use App\Http\Controllers\ProfileArtwork;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;


// REGISTRATION / LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

 


Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');





Route::get('/', function () {
    return view('landing');
});


Route::get('/', function () {
    return view('landing');
})->name('home'); 



// Artwork Upload Routes
Route::post('/storeUpload', [ArtworksController::class, 'storeUpload'])->name('storeUpload');
// update artwork route
Route::put('/artworks/{id}', [ArtworksController::class, 'editArtwork'])->name('artworks.update');
//Route::get('/get-artwork/{id}', [ArtworksController::class, 'getArtwork'])->name('artworks.get');

// tigsaro ko na so pag show kang profile with modals yes
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile'); 
//edit/update user info
Route::put('/profile/{id}', [ProfileController::class, 'editProfile'])->name('profile.update');





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

Route::get('/announcements', function () {
    return view('Mods.announcements');
})->name('announcements');






//PRODUCT VIEW
Route::get('/product-details', function () {
    return view('productView.product');
})->name('product-details');

//announcements page view
Route::get('/announcements', function () {
    return view('Mods.announcements');
})->name('announcements');


// ========================================
//=========================================

//  FOR ADMIN
Route::get('/admin', function () {
    return view('Admin.admin');
})->name('admin');

Route::get('/management', function () {
    return view('Admin.management');
})->name('management');

Route::get('/forAdmin', function () {
    return view('layouts.forAdmin');
})->name('forAdmin');

Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
Route::get('/management', [AdminController::class, 'index'])->name('management');




//LAYOUTS


// FOR VIEWPROFILE

Route::get('/forViewProfile', function () {
    return view('layouts.forViewProfile');
})->name('forViewProfile');
// update artwork route
Route::put('/artworks/{id}', [ArtworksController::class, 'editArtwork'])->name('artworks.update');




// FOR BG EXTEND
Route::get('/forbg', function () {
    return view('Mods.painting');
})->name('mainbg');
Route::get('/forbg', function () {
    return view('Mods.mainbg');
})->name('mainbg');



//FOR NAV EXTEND
Route::get('/forNav', function () {
    return view('Mods.painting');
})->name('forNav');

//FOR EXAMPLES EXTEND
Route::get('/example', function () {
    return view('Example.paintexample');
})->name('example');

Route::get('/featuredpainting', function () {
    return view('Example.featuredpainting');
})->name('featuredpainting');
Route::get('/howtoget', function () {
    return view('Example.howtoget');
})->name('howtoget');






//FOR FOOTER
Route::get('/footer', function () {
    return view('layouts.footer');
})->name('footer');

//Route::get('/artwork/{id}', [ArtworksController::class, 'showDetails'])->name('artwork');
Route::get('/product-details/{id}', [ArtworksController::class, 'showDetails'])->name('product-details');
Route::get('/category/{category}', [ArtworksController::class, 'showByCategory'])->name('category');