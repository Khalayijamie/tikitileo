<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function showPricing()
    {
        $events = Event::all();
        return view('pricing', compact('events'));
    }

    public function showInstallmentDetails($eventId, $installmentPlan)
    {
        $event = Event::findOrFail($eventId);

        $installmentAmount = ($event->price / $installmentPlan);
        $installmentDates = [];
        for ($i = 1; $i <= $installmentPlan; $i++) {
            $installmentDates[] = now()->addMonths($i)->format('Y-m-d');
        }

        $installmentDetails = [
            'totalAmount' => $event->price,
            'installmentAmount' => $installmentAmount,
            'installmentDates' => $installmentDates,
        ];

        return view('installmentdetails', compact('installmentDetails'));
    }
}
