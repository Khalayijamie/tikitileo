<?php
// app/Http/Controllers/EventController.php

namespace App\Http\Controllers;

use App\Models\Event; // Make sure to import the Event model

class EventController extends Controller
{
    public function showEvents() {
        $events = [
            (object)[
                'id' => 1,
                'type' => 'marketing',
                'title' => 'Marketing Summit',
                'description' => 'Description for Marketing Summit...',
                'date' => 'January 12, 2024',
                'location' => 'New York, USA',
                'image' => 'event-1.jpg',
            ],
            (object)[
                'id' => 2,
                'type' => 'tech',
                'title' => 'Tech Conference',
                'description' => 'Description for Tech Conference...',
                'date' => 'March 22, 2024',
                'location' => 'San Francisco, USA',
                'image' => 'event-2.jpg',
            ],
            (object)[
                'id' => 3,
                'type' => 'business',
                'title' => 'Business Expo',
                'description' => 'Description for Business Expo...',
                'date' => 'June 15, 2024',
                'location' => 'London, UK',
                'image' => 'event-3.jpg',
            ],
        ];
        
        return view('eventsindex', ['events' => $events]);
    }
    
}


