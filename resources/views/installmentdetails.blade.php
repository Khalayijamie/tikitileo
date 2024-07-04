@extends('layout')

@section('content')
    <div class="container">
        <h1>Installment Details</h1>

        @if ($installmentDetails)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Amount: Ksh{{ $installmentDetails['totalAmount'] }}</h5>
                    <p class="card-text">Installment Amount: Ksh{{ $installmentDetails['installmentAmount'] }}</p>
                    <p class="card-text">Installment Dates:</p>
                    <ul>
                        @foreach ($installmentDetails['installmentDates'] as $date)
                            <li>{{ $date }}</li>
                        @endforeach
                    </ul>
                    <a href="{{ route('payment') }}" class="btn btn-primary">Proceed to Payment</a>
                </div>
            </div>
        @else
            <p>Invalid installment plan selected.</p>
        @endif
    </div>
@endsection
