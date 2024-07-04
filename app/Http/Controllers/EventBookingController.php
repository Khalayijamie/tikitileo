<?php

namespace App\Http\Controllers;

use App\Models\Event;


class EventBookingController extends Controller
{
    public function showBookingForm($event)
    {
        $event = Event::where('name', $event)->firstOrFail();

        $paymentPlans = $event->paymentPlans;

        return view('eventsbooking', compact('event', 'paymentPlans'));
    }

    public function processBooking(Request $request, Event $event)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'payment_plan' => 'required|exists:payment_plans,id',
            'payment_method' => 'required|in:credit_card,paypal',
            // Add more validation rules as needed
        ]);

        // Process the booking and payment
        // ...
        return redirect()->route('events.book.success', $event)->with('success', 'Booking successful!');
        // Redirect to a success page or show a success message
        
    }
}
