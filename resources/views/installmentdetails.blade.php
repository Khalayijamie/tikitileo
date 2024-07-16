@extends('layout')
@include ('installment-payment-form')
@section('content')
<div class="container">
<h1>Installment Details for {{ $event->name }}</h1>
    
    <p>Event Date: {{ $event->date }}</p>
    
    @if ($installmentDetails)
        <p>Total Amount: Ksh{{ $installmentDetails['totalAmount'] }}</p>
        <p>Installment Amount: Ksh{{ $installmentDetails['installmentAmount'] }}</p>
        <p>Installment Dates:</p>
        <ul>
        @if($installmentDetails['installmentDates'] && count($installmentDetails['installmentDates']) > 0)
            @foreach ($installmentDetails['installmentDates'] as $date)
                <li>{{ $date }}</li>
            @endforeach
        @else
            <p>No installment dates available.</p>
        @endif
        </ul>
        <form action="{{ $paymentRoute }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Proceed to Payment</button>
        </form>
    @else
        <p>Invalid installment plan selected.</p>
    @endif
</div>
@endsection

@include('terms-modal')

<script>
function showTermsModal() {
    const termsModal = new bootstrap.Modal(document.getElementById('termsModal'));
    termsModal.show();

    document.getElementById('acceptTerms').onclick = function() {
        document.getElementById('installmentPaymentForm').submit();
    };
}
</script>
