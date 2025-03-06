<?php

// app/Http/Controllers/EventOrganizerController.php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventOrganizerController extends Controller
{
    public function dashboard()
    
        {
            // Fetch events for the authenticated event organizer
            $events = Event::where('organizer_id', Auth::id())->get();
    
            // Pass events to the view
            return view('event-organizer.dashboard', ['events' => $events]);
        
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('event_organizer')->attempt($credentials)) {
            return redirect()->route('event-organizer.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::guard('event_organizer')->logout();
    }
}

