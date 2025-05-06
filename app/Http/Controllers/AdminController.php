<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('Admin.management', compact('users')); // Pass users to the view
    }
    public function admindashboard()
    {
        $users = User::all(); // Fetch all users
        return view('Admin.admin', compact('users')); // Pass users to the view
    }

    public function applications()
    {
        $users = User::all(); // Fetch all users
        return view('Admin.application', compact('users')); // Pass users to the view
    }
    
    public function approveApplication($id)
    {
        $users = User::findOrFail($id);

        $users->role = 'seller';
        $users->save();

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

}