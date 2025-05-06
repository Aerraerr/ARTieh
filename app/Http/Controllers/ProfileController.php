<?php

namespace App\Http\Controllers;
use App\Models\Artworks;
use App\Models\Category;
use App\Models\Orders;
use App\Models\Order_Items;
use App\Models\User;
use App\Models\Notification;
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

        $notifications = Notification::where('user_id', Auth::id())->latest()->get(); // para sa notification
        $notificationCount = $notifications->count();

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

        return view('Mods.profile', compact('user', 'categories', 'artworks', 'ordered', 'notifications', 'notificationCount'));
    }

    public function showArtistList()
    {
        $notifications = Notification::where('user_id', Auth::id())->latest()->get(); // para sa notification
        $notificationCount = $notifications->count();

        $creator = User::where('role', 'seller') //pag seller ang role
            ->whereHas('artworks') // tas may artworks
            ->with('artworks') // pede makuwa data hali artworks
            ->get(); // matik kuwa agad for display
        return view('Mods.artists', compact('creator', 'notifications', 'notificationCount'));
    }

   //function to display the details of the clicked Artist 
   public function AboutArtist($id)
   {
        $artist = User::where('role', 'seller')
                ->where('id', $id) 
                ->with([ // pag nasa order_item na ang artwork tas may status na except sa cancelled, kuwaon
                    'artworks.category',
                    'artworks.orderItems.order' => function ($query) {
                        $query->whereIn('status_id', [1, 2, 3, 4, 5]);
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
            'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10485760',
            'biography'  => 'nullable|string|max:1000'
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
    public function applySeller()
    {
        $user = Auth::user();

        return view('Mods.beSeller', compact('user'));
    }
    public function beASeller(Request $request, $id)
    {
        $users = User::where('id', $id)->first();

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'nullable|digits_between:8,15',
            'gcash_no' => 'nullable|digits_between:8,15',
            'sampleArt' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'validId' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'biography'  => 'nullable|string|max:1000'
        ]);

        $sampleArt = $request->file('sampleArt')->store("sampleArt", 'public');
        $validId = $request->file('validId')->store("validId", 'public');

        $users->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gcash_no' => $request->gcash_no,
            'biography' => $request->biography,
            'validId' => $validId,
            'sampleArt' => $sampleArt,
        ]);


        return redirect()->route('profile')->with('success', 'Seller application submitted successfully! Wait for Admin conformation..');
    }
   
}
