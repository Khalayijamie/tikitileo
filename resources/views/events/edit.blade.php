@extends('layout')

@section('content')
<div class="container">
    <h1>Edit Event</h1>
    <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-4">
            <label for="name">Event Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $event->name) }}" required>
        </div>

        <div class="form-group mb-4">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="form-group mb-4">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $event->date) }}" required>
        </div>

        <div class="form-group mb-4">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $event->location) }}" required>
        </div>

        <div class="form-group mb-4">
            <label for="price">Price (KES)</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $event->price) }}" required>
        </div>

        <div class="form-group mb-4">
            <label for="available_tickets">Available Tickets</label>
            <input type="number" name="available_tickets" id="available_tickets" class="form-control" value="{{ old('available_tickets', $event->available_tickets) }}" required>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control" required>
                <option value="entertainment" {{ $event->category == 'entertainment' ? 'selected' : '' }}>Entertainment</option>
                <option value="education" {{ $event->category == 'education' ? 'selected' : '' }}>Education</option>
                <option value="networking" {{ $event->category == 'networking' ? 'selected' : '' }}>Networking</option>
                <option value="product_launch" {{ $event->category == 'product_launch' ? 'selected' : '' }}>Product Launch</option>
                <option value="conference" {{ $event->category == 'conference' ? 'selected' : '' }}>Conference</option>
                <option value="workshop" {{ $event->category == 'workshop' ? 'selected' : '' }}>Workshop</option>
                <option value="charity" {{ $event->category == 'charity' ? 'selected' : '' }}>Charity</option>
            </select>
        </div>

        <div class="form-group mb-4">
            <label for="image">Event Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($event->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/assets/img/events/' . $event->image) }}" alt="{{ $event->name }}" class="img-fluid" style="max-width: 200px;">
                </div>
            @endif
        </div>

        <div class="form-group mb-4">
            <label for="installments_enabled">Enable Installments</label>
            <input type="checkbox" name="installments_enabled" id="installments_enabled" class="form-check-input" {{ $event->installments_enabled ? 'checked' : '' }}>
        </div>

        <div id="installment_options" style="display: {{ $event->installments_enabled ? 'block' : 'none' }};">
            <div class="form-group mb-4">
                <label for="installment_count">Number of Installments</label>
                <input type="number" name="installment_count" id="installment_count" class="form-control" min="2" max="12" value="{{ $event->installment_count }}">
            </div>
            <div class="form-group mb-4">
                <label for="installment_interval">Interval between Installments (in days)</label>
                <input type="number" name="installment_interval" id="installment_interval" class="form-control" min="1" value="{{ $event->installment_interval }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>

<script>
    document.getElementById('installments_enabled').addEventListener('change', function() {
        document.getElementById('installment_options').style.display = this.checked ? 'block' : 'none';
    });
</script>
@endsection
