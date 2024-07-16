@extends('layout')

@section('content')
<div class="container">
    <h1>Edit Event</h1>
    <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Event Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $event->name) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $event->date) }}" required>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $event->location) }}" required>
        </div>

        <div class="form-group">
            <label for="price">Price (KES)</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $event->price) }}" required>
        </div>

        <div class="form-group">
            <label for="available_tickets">Available Tickets</label>
            <input type="number" name="available_tickets" id="available_tickets" class="form-control" value="{{ old('available_tickets', $event->available_tickets) }}" required>
        </div>

        <div class="form-group">
            <label for="image">Event Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($event->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/assets/img/events/' . $event->image) }}" alt="{{ $event->name }}" class="img-fluid" style="max-width: 200px;">
                </div>
            @endif
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>
@endsection
<br>
