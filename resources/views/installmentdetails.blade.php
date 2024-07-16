@extends('layout')
@include('installment-payment-form')

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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#installmentPaymentModal">
    Proceed to Payment
</button>


                </div>
            </div>
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



