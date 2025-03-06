<?php

// app/Http/Controllers/EventBookingController.php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventBookingController extends Controller
{
    public function showBookingForm($eventName)
    {
        $event = Event::where('name', $eventName)->firstOrFail();
        $paymentPlans = $event->paymentPlans;

        return view('eventsbooking', compact('event', 'paymentPlans'));
    }

    public function processBooking(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'payment_plan' => 'required|exists:payment_plans,id',
            'payment_method' => 'required|in:credit_card,paypal',
            // Add more validation rules as needed
        ]);

        // Process the booking and payment
        // ...

        return redirect()->route('events.book.success', $event)->with('success', 'Booking successful!');
    }
}

