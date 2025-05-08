<?php

namespace App\Http\Controllers;
use App\Models\Artworks;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Notification;
use App\Models\Order_Items;
use App\Models\Orders;
use App\Models\Payments;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // get the artwork data via id
    public function checkoutProduct($id){

        $user = auth::user();
        $artwork = Artworks::findOrFail($id);

        return view('Mods.checkout', compact('user', 'artwork'));
    }
    
    // get the artwork data via id in the cart page
    public function checkoutCart(Request $request, $artworkIds){
        
        $user = auth::user();
        $artwork = Artworks::whereIn('id', $artworkIds)->firstOrFail();
 
        return view('Mods.checkout', compact('user', 'artwork', 'artworks'));
    }

    // create the order
    public function placeOrder(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'artwork_id' => 'required|exists:artworks,id',
            'payment_method' => 'required|in:cod,gcash',
            'delivery_method' => 'required|in:request delivery,self pickup',
        ]);

        $artwork = Artworks::findOrFail($validated['artwork_id']);
        $deliveryFee = $validated['delivery_method'] === 'request delivery' ? 58 : 0;
        $totalAmount = $artwork->price + $deliveryFee;

        //unique ref no generator 
        $timestamp = substr(time(), -9);
        $random = rand(100, 999);
        $reference = $timestamp . $random;

        //store the data in the orders table
        $order = Orders::create([
            'user_id' => auth::id(),
            'status_id' => 1,
            'total_amount' => $totalAmount,
            'ordered_at' => now(),
            'delivery_method' => $validated['delivery_method'],
            'reference_no' => $reference
        ]);

        // store the data in order_items table
        Order_Items::create([
            'artwork_id' => $validated['artwork_id'],
            'order_id' => $order->id,
            'price' => $artwork->price
        ]);

        //store the data in the payments table
        Payments::create([
            'order_id' => $order->id,
            'payment_method' => $validated['payment_method'],
            'amount' => $totalAmount,
            'payment_date' => null
        ]);
        $approved = now()->format('Y-m-d');
        $item = $order->items->first();
        $artwork = $item->artwork;
        $artworkTitle = $item->artwork->artwork_title;
        $sellerId = $artwork->user_id;
        $buyer = Auth::user()->full_name;

        //store message about user checkout
        Notification::create([ 
            'user_id' => Auth::id(),
            'message' => 'This ' .$approved . ', you have checkout ' . $artworkTitle. '',
        ]);
        // store meesage with seller id
        Notification::create([ 
            'user_id' => $sellerId,
            'message' => 'This ' . $approved . ', your artwork "' . $artworkTitle . '" has been checkout by '.$buyer. '',
        ]);

        return redirect()->route('purchases')->with('success', 'Your order has been placed successfully!');
    }
}
