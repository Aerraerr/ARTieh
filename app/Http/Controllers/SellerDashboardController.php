<?php

namespace App\Http\Controllers;
use App\Models\Artworks;
use App\Models\User;
use App\Models\Status;
use App\Models\Category;
use App\Models\Notification;
use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SellerDashboardController extends Controller
{
    //get all artworks of seller
    function SellerArtworkDisplay(){
        $categories = Category::all();
        $user = Auth::user();
        $artworks = collect();

        $notifications = Notification::where('user_id', Auth::id())->latest()->get();
        $notificationCount = $notifications->count();

        // Fetch artworks only if the user is a seller
        $artworks = collect();
        if ($user->role === 'seller') {
            $artworks = Artworks::where('user_id', $user->id)->get();
        }
       
        return view('Seller.artworks', compact('user', 'categories', 'artworks', 'notifications', 'notificationCount'));
    }

    //get the data to be displayed to seller dashboard blade
    public function SellerDashboard(){

        $user = Auth::user();
        $artworks = collect();
        $ordered = collect();

        $notifications = Notification::where('user_id', Auth::id())->latest()->get(); 
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
            
            // sa Business insight
            $totalorders = $ordered->count();
            $totalsale = $ordered->whereIn('status_id', 4)->sum('total_amount');

            $monthlysale = $ordered->whereIn('status_id', 4)->filter(function ($order) {
                return $order->ordered_at && \Carbon\Carbon::parse($order->ordered_at)->isCurrentMonth();
            })->sum('total_amount');

            $yearlysale = $ordered->whereIn('status_id', 4)->filter(function ($order) {
                return $order->ordered_at && \Carbon\Carbon::parse($order->ordered_at)->isCurrentYear();
            })->sum('total_amount');
            
            // Monthly Sales and Items Sold for the past 6 months
            $months = collect();
            for ($i = 5; $i >= 0; $i--) {
                $months->push(Carbon::now()->startOfMonth()->subMonths($i));
            }

            foreach ($months as $month) {
                $monthlyOrders = $ordered->whereIn('status_id', 4)->filter(function ($order) use ($month) {
                    return $order->ordered_at && Carbon::parse($order->ordered_at)->format('Y-m') === $month->format('Y-m');
                });

                $monthlySales[] = $monthlyOrders->sum('total_amount');
                $monthlyItems[] = $monthlyOrders->flatMap->items->count();
            }

            // Group ordered items by category where seller is the artwork owner and order is completed
            $categoryData = $ordered->flatMap->items->filter(function ($item) use ($user) {
                return $item->artwork && $item->artwork->user_id === $user->id && $item->order->status_id === 4;
            })->groupBy(function ($item) {
                return $item->artwork->category->category_name ?? 'Uncategorized';
            })->map->count();

            $categoryLabels = $categoryData->keys()->toArray();   // Example: ['Painting', 'Drawings', 'Sculpture']
            $categoryValues = $categoryData->values()->toArray();
        }
       
        return view('Seller.dashboard', compact('ordered', 'artworks', 'notifications', 'notificationCount', 'totalsale', 'totalorders', 'monthlysale', 'yearlysale', 'monthlySales', 'monthlyItems', 'categoryLabels', 'categoryValues'));
    }

    //get sellers ordered artowrks
    function SellerOrder(){

        $user = Auth::user();
        $artworks = collect();
        $ordered = collect();
        $status = Status::all();
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
       
        return view('Seller.orders', compact('ordered', 'artworks', 'notifications', 'notificationCount', 'status'));
    }

    //change status function
    public function updateOrder(Request $request, Orders $order)
    {
        $validated = $request->validate([
            'status_id' => 'required|integer|exists:status,id',
        ]);

        //update the status
        $order->status_id = $validated['status_id'];
        $order->save();

        //store change status notification with buyer id
        if ($order->status_id == 3) {
            $item = $order->items->first();;
            $artworkTitle = $item->artwork->artwork_title;
            $approved = now()->format('Y-m-d');

            Notification::create([ 
                'user_id' => $order->user_id,
                'message' => 'This ' .$approved. ',your order #' . $order->id . ' '. $artworkTitle . '  has been confirmed and marked as to receive.',
            ]);
        }

        return back()->with('success', 'Order status updated');
    }

    //function that edit artwork details
    public function SellerEditArtwork(Request $request, $id){
        $editArt = Artworks::find($id);
        
        // Validate the request
        $request->validate([
            'artwork_title' => 'required|string|max:255',
            'description'   => 'required|string',
            'category_id'   => 'required|exists:category,id',
            'dimension'     =>  'required|string',
            'price'         => 'required|numeric|min:0',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        //update artwork 
        $editArt->artwork_title = $request->artwork_title;
        $editArt->description = $request->description;
        $editArt->category_id = $request->category_id;
        $editArt->dimension = $request->dimension;
        $editArt->price = $request->price;

        // If a new image is uploaded, update the image path
        if ($request->hasFile('image')) {
            $category = $request->category_id;
            $imagePath = $request->file('image')->store("artworks/{$category}", 'public');
            $editArt->image_path = 'storage/' .$imagePath;
        }

        if($editArt->save()){
            return redirect()->back()->with('success', 'Artwork updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Artwork update failed');
        }
    }

    //function to remove artwork of seller
    public function removeArtwork($id)
    {
        $user = auth::user();

        // Find the artwork and delete it
        $artwork = Artworks::findOrFail($id);
        $artwork->delete();

        $approved = now()->format('Y-m-d');
        $artworkTitle = $artwork->artwork_title;
        $sellerId = $artwork->user_id;

        // store delete notification with seller id
        Notification::create([ 
            'user_id' => $sellerId,
            'message' => 'This ' . $approved . ', you removed ' . $artworkTitle . '',
        ]);

        return redirect()->back()->with('success', 'Artwork removed.');
    }
}
