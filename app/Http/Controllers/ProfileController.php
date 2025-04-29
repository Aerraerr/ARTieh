<?php

namespace App\Http\Controllers;
use App\Models\Artworks;
use App\Models\Category;
use App\Models\Orders;
use App\Models\Order_Items;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //for logged in only artworks display
    public function showProfile(){
        $categories = Category::all();  // Fetch all categories

        $user = Auth::user();
        $artworks = collect();
        $ordered = collect();

        // Fetch artworks only if the user is a seller
        $artworks = collect();
        if ($user->role === 'seller') {
            $artworks = Artworks::where('user_id', $user->id)->get();

            //display ordered artwork of user(seller)
            $ordered = Orders::whereHas('items.artwork.user', function($query) use ($user) {
                $query->where('id', $user->id);
            })
            ->with(['items.artwork.user', 'status', 'payment'])
            ->latest('ordered_at')
            ->get();
        }

        $toPayCount = Orders::where('user_id', auth::id())->where('status_id', 1)->count();
        $toPickupCount = Orders::where('user_id', auth::id())->where('status_id', 2)->count();
        $toReceiveCount = Orders::where('user_id', auth::id())->where('status_id', 3)->count();
        $completedCount = Orders::where('user_id', auth::id())->where('status_id', 4)->count();
        $cancelledCount = Orders::where('user_id', auth::id())->where('status_id', 5)->count();

        return view('Mods.profile', compact('user', 'categories', 'artworks', 'ordered', 'toPayCount',
         'toPickupCount', 'toReceiveCount', 'completedCount', 'cancelledCount'));
    }

    public function showArtistList()
    {
        $creator = User::where('role', 'seller') //pag seller ang role
            ->whereHas('artworks') // tas may artworks
            ->with('artworks') // pede makuwa data hali artworks
            ->get(); // matik kuwa agad for display
        return view('Mods.artists', compact('creator'));
    }

   //function to display the details of the clicked Artist 
   public function AboutArtist($id)
   {
        $artist = User::where('role', 'seller')
                ->where('id', $id) 
                ->with([ // pag nasa order_item na ang artwork tas may status na except sa cancelled, kuwaon
                    'artworks.category',
                    'artworks.orderItems.order' => function ($query) {
                        $query->whereIn('status_id', [1, 2, 3, 4]);
                    }
                ]) // pede makuwa data hali artworks and category tables
                ->firstOrFail();
        return view('Mods.view_artist', compact('artist'));
   }

   //sa artworks tab
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
