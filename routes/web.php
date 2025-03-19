<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;
use App\Models\Register;
use Illuminate\Http\Request;

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

Route::get('/login', function () {
    return view('Registration.login');
})->name('login');

//code para mag check kang acc if existing
Route::post('/login', function (Request $request) {   
    // Validate the input
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Find the user by email
    $user = Register::where('email', $credentials['email'])->first();

    // Compare the plain-text password (no hashing yes na yes)
    if ($user && $user->password === $credentials['password']) {
        // Store user data in session
        Session::put('user_id', $user->id);
        Session::put('user_email', $user->email);

        // Redirect to the landing page with success message
        echo "<script>alert('Logged in successfully!'); window.location.href='/';</script>";
    } else {
        // Redirect back with error message
        return redirect()->back()->with('error', 'Invalid email or password');
    }
})->name('login');


Route::get('/register', function () {
    return view('Registration.register');
})->name('register');

//tapok sa database so form data
Route::post('/register', function (){ // Inject Request here : Request $request
    $register = new Register();
    $register->email = request('email');
    $register->password = request('password');  //Hash::make($request->password); dai ko namuna tig hash for the sake of presentation onli whahah
    $register->save();
    
    //balik sa home page
    return redirect('/')->with('success', 'Registration successful!');
});

//logout na ano paman
Route::get('/logout', function () {
    Session::flush(); 
    echo "<script>alert('Logged out successfully!'); window.location.href='/';</script>";
})->name('logout');