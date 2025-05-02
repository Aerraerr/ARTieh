<?php

namespace App\Http\Controllers;
use App\Models\Artworks;
use App\Models\Category;
use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SellerDashboardController extends Controller
{
    function SellerDashDisplay(){

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
            
            // sa Business insight
            $totalorders = $ordered->count();
            $totalsale = $ordered->sum('total_amount');
            $monthlysale = $ordered->filter(function ($order) {
                return $order->ordered_at && \Carbon\Carbon::parse($order->ordered_at)->isCurrentMonth();
            })->sum('total_amount');
            $yearlysale = $ordered->filter(function ($order) {
                return $order->ordered_at && \Carbon\Carbon::parse($order->ordered_at)->isCurrentYear();
            })->sum('total_amount');
            
        } 
        return view('Mods.sellerdashboard', compact('user', 'ordered', 'artworks', 'totalsale', 'totalorders', 'monthlysale', 'yearlysale'));
    }

    function SellerArtworkDisplay(){
        $categories = Category::all();
        $user = Auth::user();
        $artworks = collect();
        // Fetch artworks only if the user is a seller
        $artworks = collect();
        if ($user->role === 'seller') {
            $artworks = Artworks::where('user_id', $user->id)->get();
        }
       
        return view('Seller.artworks', compact('user', 'categories', 'artworks'));
    }

    public function SellerDashboard(){

        $user = Auth::user();
        $artworks = collect();
        $ordered = collect();
        $monthlySales = [];
        $monthlyItems = [];
        $categoryLabels = [];
        $categoryValues = [];
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
            $totalsale = $ordered->sum('total_amount');
            $monthlysale = $ordered->filter(function ($order) {
                return $order->ordered_at && \Carbon\Carbon::parse($order->ordered_at)->isCurrentMonth();
            })->sum('total_amount');
            $yearlysale = $ordered->filter(function ($order) {
                return $order->ordered_at && \Carbon\Carbon::parse($order->ordered_at)->isCurrentYear();
            })->sum('total_amount');
            
            // Monthly Sales and Items Sold for the past 6 months
            $months = collect();
            for ($i = 5; $i >= 0; $i--) {
                $months->push(Carbon::now()->startOfMonth()->subMonths($i));
            }

            foreach ($months as $month) {
                $monthlyOrders = $ordered->filter(function ($order) use ($month) {
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

            $categoryLabels = $categoryData->keys()->toArray();   // Example: ['Painting', 'Digital', 'Sketch']
            $categoryValues = $categoryData->values()->toArray();
        }
       
        return view('Seller.dashboard', compact('ordered', 'artworks', 'totalsale', 'totalorders', 'monthlysale', 'yearlysale', 'monthlySales', 'monthlyItems', 'categoryLabels', 'categoryValues'));
    }

    function SellerOrder(){

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
       
        return view('Seller.orders', compact('ordered', 'artworks'));
    }

    public function updateOrder(Request $request, Orders $order)
    {
        $validated = $request->validate([
            'status_id' => 'required|integer|exists:status,id',
        ]);

        $order->status_id = $validated['status_id'];
        $order->save();

        return back()->with('success', 'Order status updated');
    }

    // update the new edited user info
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

        //update artwork yes
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
    public function SellerChat()
    {
        return view('Seller.sellerchat');
    }
    
}
