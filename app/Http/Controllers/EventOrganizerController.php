<?php

// app/Http/Controllers/EventOrganizerController.php

namespace App\Http\Controllers;

use App\Models\EventOrganizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventOrganizerController extends Controller
{
    public function dashboard()
    {
        $events = Auth::user()->events;
        return view('event-organizer.dashboard', compact('events'));
    }

    public function showLoginForm()
    {
        return view('auth.event-organizer-login');
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
        return redirect()->route('event-organizer.login');
    }
}

