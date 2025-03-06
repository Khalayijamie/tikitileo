<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('organizer_id', Auth::id())->get();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'location' => 'required',
            'price' => 'required|numeric',
            'available_tickets' => 'required|integer',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('assets/img/events', $imageName, 'public');
            $data['image'] = $imageName;
        }

        $data['installments_enabled'] = $request->has('installments_enabled') ? 1 : 0;
        $data['organizer_id'] = Auth::id();

        $installmentDates = $request->input('installment_dates', []);
        $data['installment_dates'] = json_encode($installmentDates);

        Event::create($data);

        return redirect()->route('events.index')->with('success', 'Event added successfully!');
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }
    public function update(Request $request, Event $event)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'date' => 'required|date',
        'time' => 'required|date_format:H:i',
        'location' => 'required',
        'price' => 'required|numeric',
        'available_tickets' => 'required|integer',
        'category' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $data = $request->except('image');

    if ($request->hasFile('image')) {
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('assets/img/events', $imageName, 'public');
        $data['image'] = $imageName;
    }

    $data['installments_enabled'] = $request->has('installments_enabled') ? 1 : 0;
    $data['organizer_id'] = Auth::id();

    $installmentDates = $request->input('installment_dates', []);
    $data['installment_dates'] = json_encode($installmentDates);

    $event->update($data);

    return redirect()->route('events.index')->with('success', 'Event updated successfully!');
}

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index');
    }


    public function search(Request $request)
    {
        $query = Event::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('date')) {
            $query->whereDate('date', $request->input('date'));
        }

        $events = $query->get();

        return view('events.search', compact('events'));
    }
}
