<?php

namespace App\Http\Controllers;
use App\Models\Artworks;
use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfile(){
        
        $categories = Category::all();  // Fetch all categories

        $user = Auth::user();

        // Fetch artworks only if the user is a seller
        $artworks = collect();
        if ($user->role === 'seller') {
            $artworks = Artworks::where('user_id', $user->id)->get();
        }

        return view('Mods.profile', compact('user', 'categories', 'artworks'));
    }

    public function editProfile(Request $request, $id){
        $profile = User::find($id);

        // Validate the request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'nullable|digits_between:8,15',
            'address' => 'nullable|string|max:255',
            'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'biography'  => 'nullable|string|max:255'
        ]);

        //update yes
        $profile = User::find($id);
        $profile->first_name=$request->first_name;
        $profile->last_name=$request->last_name;
        $profile->email=$request->email;
        $profile->phone=$request->phone;
        $profile->address=$request->address;
        $profile->biography=$request->biography;

        if($request->hasFile('profile_img')){
            $imagePath = $request->file('profile_img')->store("profile_pic", 'public');
            $profile->profile_pic=$imagePath;
        }

        if($profile->save()){
            return redirect()->route('profile')->with('success', 'Profile updated successfully');
        }else{
            return redirect()->back()->with('error', 'Profile update failed');
        }
    }

    
}
