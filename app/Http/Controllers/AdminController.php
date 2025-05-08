<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Artworks;
use App\Models\Notification;
use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    // get all data from tables users
    public function index()
    {
        // condition for access via role
        if (!Auth::check() || Auth::user()->role === 'admin') {
            $users = User::all();
            return view('Admin.management', compact('users'));
        }
        else{
            return view('admin.dashboard');
        }
    }

    // get all data from tables users
    public function admindashboard()
    {
        // condition for access via role
        if (!Auth::check() || Auth::user()->role === 'admin') {
            $users = User::all();
            $orders = Orders::all();
            $artworks = Artworks::all();
            // Initialize an array to hold the user count for each month (1-12)
         // Month indexes from 0 (Jan) to 11 (Dec)
         $monthlyUserCounts = array_fill(0, 12, 0);

         foreach ($users as $user) {
             $month = $user->created_at->month; // 1-12
             $monthlyUserCounts[$month - 1]++;
         }
 

            return view('Admin.admin', compact('users', 'artworks', 'orders', 'monthlyUserCounts'));
        }
        else{
            return view('admin.dashboard');
        }
    }

    // get all data from tables users
    public function applications()
    {
        // condition for access via role
        if (!Auth::check() || Auth::user()->role === 'admin') {
            $users = User::all(); 
            return view('Admin.application', compact('users')); 
        }
        else{
            return view('admin.dashboard');
        }
    }
    
    // function to approve buyer application to be a seller
    public function approveApplication($id)
    {
        if (!Auth::check() || Auth::user()->role === 'admin') {
            $users = User::findOrFail($id);

            // update the users role: buyer to seller
            $users->role = 'seller';
            $users->save();

            // create a message and store in table notification
            if ($users->role == 'seller') {
                $name = $users->full_name;
                $approved = $users->updated_at->format('Y-m-d');

                Notification::create([
                    'user_id' => $id,
                    'message' => 'This' .$approved. ',your application to be a Seller '. $name . '  has been approved.',
                ]);
            }
            return redirect()->back()->with('success', 'Seller Application Approved!');
        }
        else{
            return view('admin.dashboard');
        }
    }

}