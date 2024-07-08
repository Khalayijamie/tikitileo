@extends('layout')

@section('content')
<section id="booking">
    <div class="container">
        <div class="section-header">
            <h2>Book Event</h2>
            <p>Please fill out the form to book your ticket for {{ $event->name }}</p>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="{{ route('events.book.process', $event) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="payment_plan">Payment Plan</label>
                        <select class="form-control" id="payment_plan" name="payment_plan" required>
                            <option value="">Select a payment plan</option>
                            @foreach ($paymentPlans as $plan)
                                <option value="{{ $plan->id }}">{{ $plan->name }} - {{ $plan->price }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="payment_method">Payment Method</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="credit_card" value="credit_card" required>
                            <label class="form-check-label" for="credit_card">Credit Card</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="paypal" value="paypal" required>
                            <label class="form-check-label" for="paypal">PayPal</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
