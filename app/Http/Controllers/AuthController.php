<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showRegister(){
        return view ('auth.register');
    }
    
    public function showLogin(){
        return view ('auth.login');
    }

    public function register(Request $request){

        //check the post form data for validations mga boa
        $validated = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        //saves new user to the user table with the validated field (uyan na validation sa tass boa)
        $user = User::create($validated);

        //
        Auth::login($user);

        return redirect()->route('home');
    }
    
    public function login(Request $request){
        //check the post form data for validations mga boa
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($validated)){
            $request->session()->regenerate(); //regenerate the session id for newly authenticated user but keeps the data intack
        
            return redirect()->route('paintings'); //balik sa pag ka kupal i mean sa home page
        }

        //error message
        throw ValidationException::withMessages([
            'credentials' => 'Incorrect credentials'
        ]);

    }

    //syempre logout mahapot pa
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate(); //tigclear so data kang nakalogin 
        $request->session()->regenerateToken(); //added layer of security, no auq mag explain sau

        return redirect()->route('show.login');
    }
}
