@extends('layout')

@section('content')
<div class="container">
    <h1>Add New Event</h1>
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-4">
            <label for="name">Event Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group mb-4">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group mb-4">
            <label for="date">Date</label>
            <input type="date" name="date" id="event_date" class="form-control" required>
        </div>
        <div class="form-group mb-4">
            <label for="time">Time</label>
            <input type="time" name="time" class="form-control" required>
        </div>
        <div class="form-group mb-4">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" required>
        </div>
        <div class="form-group mb-4">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="form-group mb-4">
            <label for="available_tickets">Available Tickets</label>
            <input type="number" name="available_tickets" class="form-control" required>
        </div>
        <div class="form-group mb-4">
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
        <div class="form-group mb-4">
            <label for="image">Event Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group mb-4">
            <label for="installments_enabled">Enable Installments</label>
            <input type="checkbox" name="installments_enabled" id="installments_enabled" class="form-check-input">
        </div>
        <div id="installment_options" style="display: none;">
            <div class="form-group mb-4">
                <label for="installment_count">Number of Installments</label>
                <input type="number" name="installment_count" id="installment_count" class="form-control" min="2" max="12">
            </div>
            <div class="form-group mb-4">
                <label for="installment_interval">Interval between Installments (in days)</label>
                <input type="number" name="installment_interval" id="installment_interval" class="form-control" min="1">
            </div>
        </div>
        <div id="installment_dates_container"></div>

        <button type="submit" class="btn btn-primary">Add Event</button>
    </form>
</div>

<script>
    document.getElementById('installments_enabled').addEventListener('change', function() {
        document.getElementById('installment_options').style.display = this.checked ? 'block' : 'none';
    });

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('installment_count').addEventListener('change', generateDateInputs);
        document.getElementById('installment_interval').addEventListener('change', generateDateInputs);
    });

    function generateDateInputs() {
        const count = document.getElementById('installment_count').value;
        const interval = document.getElementById('installment_interval').value;
        const container = document.getElementById('installment_dates_container');
        const eventDate = document.getElementById('event_date').value;
        container.innerHTML = '';

        if (count > 0 && interval > 0 && eventDate) {
            let currentDate = new Date(eventDate);
            for (let i = 1; i <= count; i++) {
                const dateInput = document.createElement('input');
                dateInput.type = 'date';
                dateInput.name = `installment_dates[]`;
                dateInput.className = 'form-control mt-2';
                dateInput.value = currentDate.toISOString().split('T')[0];
                container.appendChild(dateInput);

                currentDate.setDate(currentDate.getDate() + parseInt(interval));
            }
        }
    }
</script>
@endsection
