<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function addEvents(Request $request, $id)
    {
        //dapat naka login
        $user = auth::user();

        $request->validate([
            'organizer_name' => 'required|string',
            'event_name'   => 'required|string',
            'location' => 'required|string',
            'event_description'     =>  'required|string',
            'event_date'         => 'required|date',
            'event_img'         => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        //store event_img path in storage
        $eventImgPath = $request->file('event_img')->store('event_img', 'public');

        //store in db
        Event::create([
            'organizer_name' => $request->organizer_name, 
            'event_name' => $request->event_name,
            'user_id' => $user->id,
            'location' => $request->location,
            'event_description' => $request->event_description,
            'event_date' => $request->event_date,
            'event_img' => $eventImgPath,
        ]);            
    
        return redirect()->back()->with('success', 'Event Created!');
    }

    
    public function displayEvents(){

        $events = Event::all();

        return view('Mods.announcements', compact('events'));
    }
}
