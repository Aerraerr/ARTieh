<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use PhpParser\Node\Expr\AssignOp\Concat;

class AuthController extends Controller
{
    //call the blade register
    public function showRegister(){
        return view ('auth.register');
    }
    // call the blade login
    public function showLogin(){
        return view ('auth.login');
    }

    // function to register user
    public function register(Request $request){

        //check the post form data for validations
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $validated['name'] = $validated['first_name'] . ' ' . $validated['last_name'];
        
        //saves new user to the user table with the validated field (uyan na validation sa tass boa)
        $user = User::create($validated);

        Auth::login($user);
        
        return redirect()->route('home');
    }
    
    // functuion to login
    public function login(Request $request){
        //check the post form data for validations mga boa
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($validated)){
            $request->session()->regenerate(); //regenerate the session id for newly authenticated user but keeps the data intack
            
            // pag seller, redirect to sellerdashboard
            if (Auth::user()->role === 'seller') {
                return redirect()->route('SellerDashboard'); 
            }
            //if admin, redirect to admin dashboard
            elseif (Auth::user()->role === 'admin') {
                return redirect()->route('admin'); // Redirect admin to admin dashboard
            }

            return redirect()->route('home'); //balik sa pag ka kupal i mean sa home page
        }

        //error message
        throw ValidationException::withMessages([
            'credentials' => 'Incorrect credentials'
        ]);

    }

    // logout user
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate(); //tigclear so data kang nakalogin 
        $request->session()->regenerateToken();

        return redirect()->route('show.login');
    }
    
}
