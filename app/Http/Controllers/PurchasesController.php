<?php

namespace App\Http\Controllers;

use App\Models\Artworks;
use App\Models\Orders;
use App\Models\Order_Items;
use App\Models\Payments;
use App\Models\Review;
use App\Models\Notification;
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

        $approved = now()->format('Y-m-d');
        $item = $order->items->first();
        $artwork = $item->artwork;
        $artworkTitle = $item->artwork->artwork_title;
        $sellerId = $artwork->user_id;
        $buyer = Auth::user()->full_name;

        Notification::create([ // sa buyer notify cancel
            'user_id' => Auth::id(),
            'message' => 'This ' .$approved . ', you have cancelled ' . $artworkTitle. '',
        ]);
        Notification::create([ // sa seller notify cancel
            'user_id' => $sellerId,
            'message' => 'This ' . $approved . ', your artwork "' . $artworkTitle . '" was cancelled by the '.$buyer. '',
        ]);
    

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

        $artwork = Artworks::findOrFail($validated['artwork_id']);
        $sellerId = $artwork->user_id;
        $artworkTitle = $artwork->artwork_title;
        $buyer = Auth::user()->name;
        $approved = now()->format('Y-m-d');

        Notification::create([ // sa seller notify 
            'user_id' => $sellerId,
            'message' => 'This ' . $approved . ', your sold artwork "' . $artworkTitle . '" was reviewed by ' .$buyer. '',
        ]);
        return redirect()->back()->with('success', 'Thank you for the review!');
    }

    public function receivedOrder($orderId)
    {
        $order = Orders::findOrFail($orderId);

        $order->status_id = 4;
        $order->save();

        $approved = now()->format('Y-m-d');
        $item = $order->items->first();
        $artwork = $item->artwork;
        $artworkTitle = $item->artwork->artwork_title;
        $sellerId = $artwork->user_id;
        $buyer = Auth::user()->full_name;

        Notification::create([ // sa seller notify cancel
            'user_id' => $sellerId,
            'message' => 'This ' . $approved . ', your artwork "' . $artworkTitle . '" was received by the '.$buyer. '',
        ]);

        return redirect()->back()->with('success', 'Order Received..');
    }

    // payment proof store to database
    public function gcashpay(Request $request, $payId)
    {
        $request->validate([
            'payment_reference' => 'required|string|max:255',
            'payment_proof'   => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $payproofpath =$request->file('payment_proof')->store("payment_proof", 'public');
        $payment = Payments::where('order_id', $payId)->first();

        $payment->update([
            'payment_reference' => $request->payment_reference,
            'payment_proof' => $payproofpath,
            'payment_date' => now(),
        ]);

        $order = Orders::findOrFail($payId);
        $approved = now()->format('Y-m-d');
        $item = $order->items->first();
        $artwork = $item->artwork;
        $artworkTitle = $item->artwork->artwork_title;
        $sellerId = $artwork->user_id;
        $buyer = Auth::user()->full_name;

        Notification::create([ // sa buyer notify
            'user_id' => Auth::id(),
            'message' => 'This ' .$approved . ', you have paid ₱' . $payment->amount . ' for order '. $payment->id . '',
        ]);
        Notification::create([ // sa seller notify 
            'user_id' => $sellerId,
            'message' => 'This ' . $approved . ', your artwork "' . $artworkTitle . '" was paid ₱'. $payment->amount .'by' .$buyer. '',
        ]);

        return redirect()->back()->with('success', 'Payment submitted successfully!');
    }
}
