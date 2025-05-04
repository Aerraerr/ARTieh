<?php

namespace App\Http\Controllers;
use App\Models\Artworks;
use App\Models\Category;
use App\Models\User;
use App\Models\Notification;
use App\Models\Order_Items;
use GuzzleHttp\Psr7\Query;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class ArtworksController extends Controller
{


    //function to store the form from upload-modal
    public function storeUpload(Request $request){
        // Validate the form data
        $request->validate([
            'artwork_title' => 'required|string|max:255',
            'description'   => 'required|string',
            'category_id'   => 'required|exists:category,id',
            'dimension'     =>  'required|string',
            'price'         => 'required|numeric|min:0',
            'image'         => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        //Store the image in the storage/public/artworks/category
        $category = $request->category_id;
        $imagePath =$request->file('image')->store("artworks/{$category}", 'public');


        //save to database
        Artworks::create([
            'user_id'       => auth::id(),        
            'category_id'   => $category,
            'artwork_title' => $request->artwork_title,
            'description'   => $request->description,
            'dimension'     => $request->dimension,
            'price'         => $request->price,
            'image_path'    => "storage/{$imagePath}",  
        ]);

        return redirect()->back()->with('success', 'Artwork uploaded successfully!');
    }
    
    // function to filter by category and display to the category page
    public function showByCategory($category)
    {
        // Find the category by name
        $categoryModel = Category::where('category_name', $category)->first();

        if (!$categoryModel) {
            abort(404, 'Category not found');
        }

        $artworks = Artworks::with('user')
            ->where('category_id', $categoryModel->id)
            ->whereDoesntHave('orderItems.order', function($query){
                $query->where('status_id', '!=', 5); // pagnacancel order, luwas giray sa display
            }) //pag so artwork nasa order_item, ekis na siya
            ->get();
              

         // Map the category name to the correct view
        $view = match($category) {
            'paintings' => 'Mods.painting',
            'drawings' => 'Mods.drawings',
            'sculpture' => 'Mods.sculptures',
            default => null 
        };
        // Handle unknown category views
        if (!$view) {
            Session::flash('error', "No view found for '{$category}'.");
            return redirect()->route('home');
        }
        
        $notifications = Notification::where('user_id', Auth::id())->latest()->get(); // para sa notification

        return view($view, compact('artworks', 'notifications'));
    }

    private function getArtworksByCategory($category) // hiniwalay ko na, mapagalon magparaulit wahaha
    {
        $categoryModel = Category::where('category_name', $category)->first();

        if (!$categoryModel) return [];

        return Artworks::with('user')
            ->where('category_id', $categoryModel->id)
            ->whereDoesntHave('orderItems.order', function($query){
                $query->where('status_id', '!=', 5);
            })
            ->get();
    }

    public function homeDisplay()
    {
        $creator = User::where('role', 'seller') 
            ->whereHas('artworks') 
            ->with('artworks') 
            ->get(); 

        $sculpt = $this->getArtworksByCategory('sculpture');
        $paint = $this->getArtworksByCategory('paintings');

        return view('landing', compact('sculpt', 'creator', 'paint'));
    }

    public function showAllArtworks()
    {
        $artworks = Artworks::with('user')
            ->whereDoesntHave('orderItems.order', function($query){
                $query->where('status_id', '!=', 5); // pagnacancel order, luwas giray sa display
            }) //pag so artwork nasa order_item, ekis na siya
            ->get();

        $notifications = Notification::where('user_id', Auth::id())->latest()->get();

        return view('Mods.artworks', compact('artworks', 'notifications'));
    }

    //function to display the details of the clicked cards/item and the more works by artist
    public function showDetails($id)
    {
        // Retrieve the artwork along with the user relationship
        $artwork = Artworks::with('user', 'category')->find($id);

        if (!$artwork) {
            return redirect()->back()->with('error', 'Artwork not found.');
        }

        // kuwa random artwork sa parehas na artist
        $moreWorks = Artworks::where('user_id', $artwork->user_id)
            ->where('id', '!=', $id) // so naka show na artwork dai na tigubay sa more works
            ->take(4) 
            ->get();
        
        
        $excludedArtworkIds = Order_Items::whereHas('order', function ($query) {
            $query->whereIn('status_id', [1, 2, 3, 4]); // dat wara siya sa order tables
        })->pluck('artwork_id');
            
        $otherArtworks = Artworks::whereNotIn('id', $excludedArtworkIds)
            ->where('id', '!=', $artwork->id) // exclude current artwork
            ->where('user_id', '!=', $artwork->user_id) // exclude same artist
            ->get();

        return view('productView.product', compact('artwork', 'moreWorks', 'otherArtworks'));
    }



}