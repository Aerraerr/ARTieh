<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtworksController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\SellerDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NavController;


// REGISTRATION / LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//landing page
Route::get('/', function () {
    return view('landing');
});
Route::get('/', [ArtworksController::class, 'homeDisplay'])->name('home'); 

// authenticated users access
Route::middleware(['auth'])->group(function() {

    //logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //profile display
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile'); 

    //profile edit & update user info
    Route::put('/profile/{id}', [ProfileController::class, 'editProfile'])->name('profile.update');
    Route::get('/beSeller', [ProfileController::class, 'applySeller'])->name('beSeller'); 
    Route::patch('/beSeller/{id}', [ProfileController::class, 'beASeller'])->name('beASeller');

    //event add and display routes
    Route::post('/events/add/{id}', [EventController::class, 'addEvents'])->name('events.add');
    Route::post('/events/{id}/attend', [EventController::class, 'attendEvent'])->name('events.attend');

    // cart logic 
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'displayCart'])->name('cart');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

    //checkout routes
    Route::get('/checkout/{id}', [CheckoutController::class, 'checkoutProduct'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'checkoutCart'])->name('checkout.cart');
    Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.store');

    //users purchases page
    Route::get('/purchases', [PurchasesController::class, 'displayPurchases'])->name('purchases');
    Route::post('/purchases/{order}', [PurchasesController::class, 'cancelOrder'])->name('cancel-order');
    Route::patch('/purchases/{orderId}', [PurchasesController::class, 'receivedOrder'])->name('received-order');
    Route::post('/purchases', [PurchasesController::class, 'reviewOrder'])->name('review-order');
    Route::patch('/purchases/{payId}/gcash-payment', [PurchasesController::class, 'gcashpay'])->name('gcash-payment');

    // Artwork Upload & edit
    Route::post('/storeUpload', [ArtworksController::class, 'storeUpload'])->name('storeUpload');
    Route::put('/artworks/{id}', [ArtworksController::class, 'editArtwork'])->name('artworks.update');

    //sellerdashboard
    Route::patch('ordersModal/{order}', [SellerDashboardController::class, 'updateOrder'])->name('order.update');
    Route::get('/Seller/dashboard', [SellerDashboardController::class, 'SellerDashboard'])->name('SellerDashboard');
    Route::get('/Seller/orders', [SellerDashboardController::class, 'SellerOrder'])->name('SellerOrders');
    Route::get('/Seller/artworks', [SellerDashboardController::class, 'SellerArtworkDisplay'])->name('SellerArtworks');
    Route::put('/Seller/artworksModal/{id}', [SellerDashboardController::class, 'SellerEditArtwork'])->name('SellerEditArtwork');
    Route::delete('/Seller/artworks/{id}', [SellerDashboardController::class, 'removeArtwork'])->name('removeArtwork');

    //notifications
    Route::get('/notification', [NotificationController::class, 'displayNotif']);

    //sa admin
    Route::get('/admin', [AdminController::class, 'admindashboard'])->name('admin');
    Route::get('/management', [AdminController::class, 'index'])->name('management');
    Route::get('/application', [AdminController::class, 'applications'])->name('application');
    Route::patch('/application/{id}', [AdminController::class, 'approveApplication'])->name('approveApplication');
});

// guest access
Route::middleware(['guest'])->group(function() {
    //login & register page
    Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

//display all artworks
Route::get('/artworks', [ArtworksController::class, 'showAllArtworks'])->name('artworks');
Route::get('/all-artworks', [ArtworksController::class, 'showAllArtworks'])->name('all-artworks');

//artist list page
Route::get('/artists', [ProfileController::class, 'showArtistList'])->name('artists');
//get the clicked artist by its id
Route::get('/view_artist/{id}', [ProfileController::class, 'AboutArtist'] )->name('view_artist');
//display all events
Route::get('/announcements', [EventController::class, 'displayEvents'])->name('announcements');


//paintings page
Route::get('/paintings', function () {
    return view('Mods.painting');
})->name('paintings');

//drawings page
Route::get('/drawings', function () {
    return view('Mods.drawings');
})->name('drawings');

//sculpture page
Route::get('/sculptures', function () {
    return view('Mods.sculptures');
})->name('sculptures');

//artwork view
Route::get('/product-details', function () {
    return view('productView.product');
})->name('product-details');

//layouts 

//admin navbar
Route::get('/forAdmin', function () {
    return view('layouts.forAdmin');
})->name('forAdmin');

// FOR VIEWPROFILE
Route::get('/forViewProfile', function () {
    return view('layouts.forViewProfile');
})->name('forViewProfile');

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

//display artworks by category & its details
Route::get('/product-details/{id}', [ArtworksController::class, 'showDetails'])->name('product-details');
Route::get('/category/{category}', [ArtworksController::class, 'showByCategory'])->name('category');