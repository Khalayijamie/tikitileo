<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        // return view('home');
        $events = Event::all(); // Fetch all events from the database
        return view('home', compact('events'));
    }
    public function about()
    {
        return view('about');
    }
}
