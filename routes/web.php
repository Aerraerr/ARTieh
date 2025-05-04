<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtworksController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\SellerDashboardController;
use App\Http\Controllers\AdminController;
use App\Mail\VerificationCodeMail;





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

Route::get('/', [ArtworksController::class, 'homeDisplay'])->name('home'); 
/*Route::get('/', function () {
    return view('landing');
})->name('home'); */

// authenticated onli access
Route::middleware(['auth'])->group(function() {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // tigsaro ko na so pag show kang profile with modals yes
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile'); 

    //edit/update user info
    Route::put('/profile/{id}', [ProfileController::class, 'editProfile'])->name('profile.update');

    //event add and display routes
    Route::post('/events/add/{id}', [EventController::class, 'addEvents'])->name('events.add');

    // cart logic 
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'displayCart'])->name('cart');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

    //checkout routes
    Route::get('/checkout/{id}', [CheckoutController::class, 'checkoutProduct'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'checkoutCart'])->name('checkout.cart');
    Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.store');

    //sa my purchases yes
    Route::get('/purchases', [PurchasesController::class, 'displayPurchases'])->name('purchases');
    Route::post('/purchases/{order}', [PurchasesController::class, 'cancelOrder'])->name('cancel-order');
    Route::patch('/purchases/{orderId}', [PurchasesController::class, 'receivedOrder'])->name('received-order');
    Route::post('/purchases', [PurchasesController::class, 'reviewOrder'])->name('review-order');

    // Artwork Upload 
    Route::post('/storeUpload', [ArtworksController::class, 'storeUpload'])->name('storeUpload');
    //sellerdashboard
    Route::get('sellerdashboard', [SellerDashboardController::class, 'SellerDashDisplay'])->name('sellerdashboard');
    Route::patch('ordersModal/{order}', [SellerDashboardController::class, 'updateOrder'])->name('order.update');
});



// guest access
Route::middleware(['guest'])->group(function() {
    //auth routes
    Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::get('/artworks', [ArtworksController::class, 'showAllArtworks'])->name('artworks');
Route::get('/all-artworks', [ArtworksController::class, 'showAllArtworks'])->name('all-artworks');


//Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/artists', [ProfileController::class, 'showArtistList'])->name('artists');
//get the clicked artist by its id
Route::get('/view_artist/{id}', [ProfileController::class, 'AboutArtist'] )->name('view_artist');
//display all events
Route::get('/announcements', [EventController::class, 'displayEvents'])->name('announcements');


Route::get('/Seller/dashboard', [SellerDashboardController::class, 'SellerDashboard'])->name('SellerDashboard');
Route::get('/Seller/orders', [SellerDashboardController::class, 'SellerOrder'])->name('SellerOrders');
Route::get('/Seller/artworks', [SellerDashboardController::class, 'SellerArtworkDisplay'])->name('SellerArtworks');
Route::put('/Seller/artworksModal/{id}', [SellerDashboardController::class, 'SellerEditArtwork'])->name('SellerEditArtwork');
Route::get('/Seller/chat', [SellerDashboardController::class, 'SellerChat'])->name('SellerChat');

Route::get('/paintings', function () {
    return view('Mods.painting');
})->name('paintings');

Route::get('/beSeller', function () {
    return view('Mods.beSeller');
})->name('beSeller');

Route::get('/forChat', function () {
    return view('layouts.forChat');
})->name('forChat');

Route::get('/forNotif', function () {
    return view('layouts.forNotif');
})->name('forNotif');

Route::get('/drawings', function () {
    return view('Mods.drawings');
})->name('drawings');

Route::get('/sculptures', function () {
    return view('Mods.sculptures');
})->name('sculptures');

// STATIC PAGES

//PRODUCT VIEW
Route::get('/product-details', function () {
    return view('productView.product');
})->name('product-details');

//PRODUCT VIEW

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


Route::get('/product-details/{id}', [ArtworksController::class, 'showDetails'])->name('product-details');
Route::get('/category/{category}', [ArtworksController::class, 'showByCategory'])->name('category');








// SEARCH ENGINE
