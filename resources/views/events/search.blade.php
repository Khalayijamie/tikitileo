@extends('layout')

@section('content')
<!-- ======= Search Bar Section ======= -->
<section id="search-bar">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h2>Find Your Next Event</h2>
      <p>Search for events by date, category, or name.</p>
    </div>
    
    <form action="{{ route('events.search') }}" method="get">
      <div class="row">
        <div class="col-lg-4 col-md-12 mb-3">
          <input type="text" class="form-control" id="event-name" name="name" placeholder="Event Name">
        </div>
        <div class="col-lg-4 col-md-12 mb-3">
          <select name="category" class="form-control" id="event-category">
            <option value="">Select Category</option>
            <option value="entertainment">Entertainment</option>
            <option value="education">Education</option>
            <option value="networking">Networking</option>
            <option value="product_launch">Product Launch</option>
            <option value="conference">Conference</option>
            <option value="workshop">Workshop</option>
            <option value="charity">Charity</option>
          </select>
        </div>
        <div class="col-lg-4 col-md-12 mb-3">
          <input type="date" class="form-control" id="event-date" name="date" placeholder="Date">
        </div>
        <div class="col-lg-12 text-center">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </div>
    </form>
  </div>
</section> 
<!-- End Search Bar Section -->

<!-- ======= Events Section ======= -->
<section id="events">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h2>Search Results</h2>
      <p>Explore the events that match your search criteria.</p>
    </div>

    <div class="row">
      @if($events->isEmpty())
        <div class="col-12">
          <p>No events found.</p>
        </div>
      @else
        @foreach($events as $event)
          <div class="col-lg-4 col-md-6">
            <div class="event" data-aos="fade-up" data-aos-delay="100">
              <img src="{{ asset('storage/assets/img/events/' . $event->image) }}" alt="{{ $event->name }}" class="img-fluid">
              <div class="details">
                <h3><a href="#">{{ $event->name }}</a></h3>
                <p>{{ $event->description }}</p>
                <p><strong>Date:</strong> {{ $event->date }}</p>
                <p><strong>Location:</strong> {{ $event->location }}</p>
                <p><strong>Price:</strong> KES {{ $event->price }}</p>
                <div class="social">
                  
              @if($event->installments_enabled)
    <div class="installment-info">
        <span class="installment-badge">Installments Available</span>
        <p class="installment-details">
            <i class="fas fa-calendar-alt"></i> {{ $event->installment_count }} payments
            <i class="fas fa-clock ml-2"></i> Every {{ $event->installment_interval }} days
        </p>
    </div>
@endif
<div class="button-group mt-3">
@if($event->installments_enabled)
        <a href="{{ route('installment.details', ['eventId' => $event->id, 'installmentPlan' => $event->installment_count ?? 1]) }}" class="btn btn-soft-pink rounded-pill shadow-sm me-2 px-4 py-2">
            <i class="fas fa-calendar-alt me-1"></i> Installments
        </a>
    @endif
    <a href="{{ route('payment', ['eventId' => $event->id]) }}" class="btn btn-soft-peach rounded-pill shadow-sm px-4 py-2">
        <i class="fas fa-money-bill-wave me-1"></i> Pay Now
    </a>
</div>
</a>

              <!-- <p><strong>Available Tickets:</strong> {{ $event->available_tickets }}</p> -->
              <!-- <div class="social">
                <a href="{{ route('pricing') }}" class="btn btn-secondary">Buy Ticket</a>
              </div> -->
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
<!-- End Events Section -->
@endsection
