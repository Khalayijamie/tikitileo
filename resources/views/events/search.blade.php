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
                  <a href="{{ route('pricing') }}" class="btn btn-secondary">Pricing Options</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</section>
<!-- End Events Section -->
@endsection
