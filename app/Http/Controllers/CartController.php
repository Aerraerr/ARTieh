<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Artworks;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //add to cart/wishlist function
    public function addTocart(Request $request, $artworkId)
    {
        //dapat naka login
        $user = auth::user();

        //hanap so artwork
        $artwork = Artworks::findOrFail($artworkId);
        

        //hanap or gibo cart
        $cart = Cart::firstOrCreate(
            ['user_id' => $user->id], // use to find a record in cart
            ['user_id' => $user->id] // use to create a new record if wara pa
        );

        // Check if the item is already in the cart (optional logic)
        $existingItem = CartItem::where('cart_id', $cart->id)
                                ->where('artwork_id', $artwork->id)
                                ->first();

        CartItem::create([
            'cart_id' => $cart->id,
            'artwork_id' => $artwork->id,
        ]);
 
        return redirect()->back()->with('success', 'Artwork added to cart!');
    }

    //display users added artworks in cart/wishlist
    public function displayCart()
    {
        $user = auth::user();
        $cart = Cart::where('user_id', $user->id)->first();

        if ($cart) {
            // Loop through cart items
            foreach ($cart->items as $item) {
                // Check kung na ordered na so artwork, y? delete : display
                if ($item->artwork && $item->artwork->orderItems()->exists()) {
                    $item->delete();
                }
            }
    
            // Refresh cart after removing ordered artworks
            $cart->load('items.artwork.user');
        }       

        return view('Mods.cart', compact('cart'));
    }

    //remove an artwork from cart/wishlist
    public function removeFromCart($id)
    {
        $user = auth::user();

        // Find the item and make sure it belongs to the user's cart
        $cartItem = CartItem::findOrFail($id);

        $cartItem->delete();

        return redirect()->route('cart')->with('success', 'Item removed from cart.');
    }
    

}
