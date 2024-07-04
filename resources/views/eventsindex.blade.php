@extends('layout')

@section('content')
    <section id="events">
        <div class="container">
            <div class="section-header">
                <h2>Upcoming Events</h2>
                <p>Check out our upcoming events and book your tickets</p>
            </div>
            
            <div class="row">
                @foreach ($events as $event)
                    <div class="col-lg-4 col-md-6">
                        <div class="event-item">
                            @if ($event->type == 'marketing')
                                <img src="{{ asset('assets/img/market.jpeg') }}" class="img-fluid" alt="Marketing Summit">
                                <div class="details">
                                    <h3><a href="#">{{ $event->title }}</a></h3>
                                    <p>{{ $event->description }}</p>
                                    <div class="event-meta">
                                        <p class="event-date">{{ $event->date }}</p>
                                        <p class="event-location">{{ $event->location }}</p>
                                    </div>
                                    <a href="{{ route('events.book', ['event' => $event->id]) }}" class="btn btn-primary">Buy Ticket</a>

                                </div>
                            @elseif ($event->type == 'tech')
                                <img src="{{ asset('assets/img/tech.jpeg') }}" class="img-fluid" alt="Tech Conference">
                                <div class="details">
                                    <h3><a href="#">{{ $event->title }}</a></h3>
                                    <p>{{ $event->description }}</p>
                                    <div class="event-meta">
                                        <p class="event-date">{{ $event->date }}</p>
                                        <p class="event-location">{{ $event->location }}</p>
                                    </div>
                                    <a href="{{ route('events.book', ['event' => $event->id]) }}" class="btn btn-primary">Buy Ticket</a>
                                </div>
                            @elseif ($event->type == 'business')
                                <img src="{{ asset('assets/img/business.jpeg') }}" class="img-fluid" alt="Business Expo">
                                <div class="details">
                                    <h3><a href="#">{{ $event->title }}</a></h3>
                                    <p>{{ $event->description }}</p>
                                    <div class="event-meta">
                                        <p class="event-date">{{ $event->date }}</p>
                                        <p class="event-location">{{ $event->location }}</p>
                                    </div>
                                    <a href="{{ route('events.book', ['event' => $event->id]) }}" class="btn btn-primary">Buy Ticket</a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
