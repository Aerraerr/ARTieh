<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Order_Items;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchasesController extends Controller
{
    public function displayPurchases()
    {
        $user = auth::user();

        // Get cart with items and artwork info
        $topay = Orders::where('user_id', auth::id())
                    ->where('status_id', 1)
                    ->with(['items.artwork.user', 'status']) // loads 
                    ->latest('ordered_at')
                    ->get();

        $topickup = Orders::where('user_id', auth::id())
                    ->where('status_id', 2)
                    ->with(['items.artwork.user', 'status'])
                    ->latest('ordered_at')
                    ->get();
                    
        $toreceive = Orders::where('user_id', auth::id())
                    ->where('status_id', 3)
                    ->with(['items.artwork.user', 'status'])
                    ->latest('ordered_at')
                    ->get();
        
        $completed = Orders::where('user_id', auth::id())
                    ->where('status_id', 4)
                    ->with(['items.artwork.user', 'status', 'review']) 
                    ->latest('ordered_at')
                    ->get();
        
        $cancelled = Orders::where('user_id', auth::id())
                    ->where('status_id', 5)
                    ->with(['items.artwork.user', 'status'])
                    ->latest('ordered_at')
                    ->get();

        return view('Mods.purchases', compact('topay', 'topickup', 'toreceive', 'completed', 'cancelled'));
    }

    public function cancelOrder(Request $request, $orderId)
    {
        $order = Orders::findOrFail($orderId);

        $order->cancel_reason = $request->input('cancel_reason');
        $order->status_id = 5;
        $order->save();

        return redirect()->back()->with('success', 'Order cancelled successfully..');
    }
    
    public function reviewOrder(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'artwork_id' => 'required|exists:artworks,id',
            'artist_rating' => 'required|integer|min:1|max:5',
            'artwork_rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000'
        ]);

        Review::create([
            'user_id' => auth::id(),
            'order_id' => $validated['order_id'],
            'artwork_id' => $validated['artwork_id'],
            'artist_rating' => $validated['artist_rating'],
            'artwork_rating' => $validated['artwork_rating'],
            'comment' => $validated['comment']
        ]);

        return redirect()->back()->with('success', 'Thank you for the review!');
    }

    public function receivedOrder($orderId)
    {
        $order = Orders::findOrFail($orderId);

        $order->status_id = 4;
        $order->save();

        return redirect()->back()->with('success', 'Order Received..');
    }
}
