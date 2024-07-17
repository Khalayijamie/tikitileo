@extends('layout')

@section('content')
<div class="container">
    <h1>My Events</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        @foreach($events as $event)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/assets/img/events/' . $event->image) }}" class="card-img-top" alt="{{ $event->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                        <p><strong>Date:</strong> {{ $event->date }}</p>
                        <p><strong>Time:</strong> {{ $event->time }}</p>
                        <p><strong>Location:</strong> {{ $event->location }}</p>
                        <p><strong>Price:</strong> KES {{ $event->price }}</p>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
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
