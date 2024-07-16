<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class InstallmentController extends Controller
{
    public function showInstallmentDetails($eventId, $installmentPlan)
    {
        $event = Event::findOrFail($eventId);

        if ($event->installment_count <= 1) {
            // Redirect to direct payment route
            return redirect()->route('payment', ['eventId' => $event->id]);
        }
    
        $installmentAmount = $event->installment_count > 0 ? ($event->price / $event->installment_count) : 0;

        $installmentDates = $event->installmentDates;
    
        $installmentDetails = [
            'event' => $event,
            'totalAmount' => $event->price,
            'installmentAmount' => $installmentAmount,
            'installmentDates' => $installmentDates ?? [],
            
        ];
    
        
        return view('installmentdetails', [
            'installmentDetails' => $installmentDetails,
            'event' => $event,
            'paymentRoute' => route('payment', ['eventId' => $event->id])
        ]);
        
    }
    public function checkInstallments($eventId)
{
    $event = Event::findOrFail($eventId);

    if ($event->installment_count <= 1) {
        // Redirect to direct payment route
        return redirect()->route('payment', ['eventId' => $event->id]);
    }

    // Redirect to installment details page
    return redirect()->route('installment.details', ['eventId' => $event->id, 'installmentPlan' => $event->installment_count]);
}

        
    
}
