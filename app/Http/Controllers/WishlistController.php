<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function add(Request $request, $eventId)
    {
        $user = Auth::user();
        $event = Event::findOrFail($eventId);

        $user->wishlist()->attach($event);

        return redirect()->route('my.purchases')->with('success', 'Event added to wishlist!');
    }

    public function remove(Request $request, $eventId)
    {
        $user = Auth::user();
        $event = Event::findOrFail($eventId);

        $user->wishlist()->detach($event);

        return redirect()->route('my.purchases')->with('success', 'Event removed from wishlist!');
    }
}
