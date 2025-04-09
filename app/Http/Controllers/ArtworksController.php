<?php

namespace App\Http\Controllers;
use App\Models\Artworks;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ArtworksController extends Controller
{


    //function to store the form from upload-modal
    public function storeUpload(Request $request){
        // Validate the form data
        $request->validate([
            'artwork_title' => 'required|string|max:255',
            'description'   => 'required|string',
            'category_id'   => 'required|exists:category,id',
            'price'         => 'required|numeric|min:0',
            'image'         => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        //Store the image in the appropriate category folder
        $category = $request->category_id;
        $imagePath =$request->file('image')->store("artworks/{$category}", 'public');


        //save to database
        Artworks::create([
            'user_id'       => auth()->id(),        // Store the logged-in user's ID
            'category_id'   => $category,
            'artwork_title' => $request->artwork_title,
            'description'   => $request->description,
            'price'         => $request->price,
            'image_path'    => "storage/{$imagePath}",  // Simplified for public access
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

        // Filter artworks by category
        $artworks = Artworks::where('category_id', $categoryModel->id)->get();

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
    
        return view($view, compact('artworks'));
    }

    //function to display the details of the clicked cards/item and the more works by artist
    public function showDetails($id)
    {
        // Retrieve the artwork along with the user relationship
        $artwork = Artworks::with('user', 'category')->find($id);

        if (!$artwork) {
            return redirect()->back()->with('error', 'Artwork not found.');
        }

        // Fetch more artworks by the same artist, excluding the current one
        $moreWorks = Artworks::where('user_id', $artwork->user_id)
            ->where('id', '!=', $id) // Exclude the current artwork
            ->take(4) // Limit to 4 works
            ->get();

        // Load the details view with the artwork data
        return view('productView.product', compact('artwork', 'moreWorks'));
    }
    
}
