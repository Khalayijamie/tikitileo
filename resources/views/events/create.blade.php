@extends('layout')

@section('content')
<div class="container">
    <h1>Add New Event</h1>
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Event Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="available_tickets">Available Tickets</label>
            <input type="number" name="available_tickets" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" class="form-control" required>
                <option value="entertainment">Entertainment</option>
                <option value="education">Education</option>
                <option value="networking">Networking</option>
                <option value="product_launch">Product Launch</option>
                <option value="conference">Conference</option>
                <option value="workshop">Workshop</option>
                <option value="charity">Charity</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Event Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Event</button>
    </form>
</div>
@endsection
