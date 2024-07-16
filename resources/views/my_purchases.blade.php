@extends('layout')

@section('content')
    <div class="container">
        <h1>My Purchases</h1>

        <h2>Previous Purchases</h2>
        @foreach ($previousPurchases as $purchase)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $purchase->event->name }}</h5>
                    <p class="card-text">Amount Paid: Ksh{{ $purchase->amount }}</p>
                </div>
            </div>
        @endforeach

        <h2>Ongoing Payments</h2>
        @foreach ($ongoingPayments as $payment)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $payment->event->name }}</h5>
                    <p class="card-text">Amount Paid: Ksh{{ $payment->amount }}</p>
                    <p class="card-text">Installments Left: {{ $payment->remaining_installments }}</p>
                </div>
            </div>
        @endforeach

        <h2>Wishlist</h2>
        @foreach ($wishlist as $event)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->name }}</h5>
                    <p class="card-text">Price: Ksh{{ $event->price }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
