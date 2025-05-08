<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Event;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    //add event function
    public function addEvents(Request $request, $id)
    {
        $user = auth::user();

        $request->validate([
            'organizer_name' => 'required|string',
            'event_name'   => 'required|string',
            'location' => 'required|string',
            'event_description'     =>  'required|string',
            'event_date'         => 'required|date',
            'event_img'         => 'required|image|mimes:jpeg,png,jpg|max:10485760',
        ]);

        //store event_img path in storage
        $eventImgPath = $request->file('event_img')->store('event_img', 'public');

        //store in db table events
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

    // get data form events and notifications table
    public function displayEvents(){
        $notifications = Notification::where('user_id', Auth::id())->latest()->get(); // para sa notification
        $notificationCount = $notifications->count();

        $events = Event::all();

        return view('Mods.announcements', compact('events', 'notifications', 'notificationCount'));
    }

    // attend event function
    public function attendEvent(Request $request, $eventId)
    {
        $user = auth::user();
        $event = Event::findOrFail($eventId);

        // Check if already attending
        if ($event->attendees()->where('user_id', $user->id)->exists()) {
            return back()->with('info', 'You are already marked as attending.');
        }

        // Add to attendees
        $event->attendees()->attach($user->id);

        // store a notification to event creator
        Notification::create([
            'user_id' => $event->user_id, // event creator
            'message' => ''.$user->full_name. " will attend your event: " .$event->event_name. '',
        ]);

        return back()->with('success', 'You have been marked as attending!');
    }
}
