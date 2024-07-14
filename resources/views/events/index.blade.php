@extends('layout')

@section('content')
<div class="container">
    <h1>My Events</h1>
    <a href="{{ route('events.create') }}" class="btn btn-primary">Add New Event</a>
    <br><br>
    <div class="row">
        @foreach($events as $event)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top" alt="{{ $event->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                        <p class="card-text"><strong>Price:</strong> KES {{ $event->price }}</p>
                        <a href="{{ route('events.edit', $event) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
