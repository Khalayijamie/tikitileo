@extends('layout')

@section('content')
    <div class="container">
        <h1>Payment Options</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>PayPal</h5>
                    </div>
                    <div class="card-body">
                    <img src="assets/img/paypal.png" alt="PayPal" class="img-fluid mb-3 img-thumbnail" style="max-width: 100px;">>
                        <form action="{{ route('process-payment') }}" method="POST">
                            @csrf
                            <input type="hidden" name="payment_method" value="paypal">
                            <div class="form-group">
                                <label for="paypal_email">PayPal Email</label>
                                <input type="email" class="form-control" id="paypal_email" name="paypal_email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Pay with PayPal</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Credit/Debit Card</h5>
                    </div>
                    <div class="card-body">
                        <img src="assets/img/gallery/download.jpeg" alt="Credit Card" class="img-fluid mb-3 img-thumbnail" style="max-width: 100px;">
                        <form action="{{ route('process-payment') }}" method="POST">
                            @csrf
                            <input type="hidden" name="payment_method" value="card">
                            <div class="form-group">
                                <label for="card_number">Card Number</label>
                                <input type="text" class="form-control" id="card_number" name="card_number" required>
                            </div>
                            <div class="form-group">
                                <label for="expiry_date">Expiry Date</label>
                                <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="MM/YY" required>
                            </div>
                            <div class="form-group">
                                <label for="cvv">CVV</label>
                                <input type="text" class="form-control" id="cvv" name="cvv" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Pay with Card</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>M-Pesa</h5>
                    </div>
                    <div class="card-body">
                        <img src="assets/img/gallery/mpesa.png" alt="M-Pesa" class="img-fluid mb-3 img-thumbnail" style="max-width: 100px;">
                        <form action="{{ route('process-payment') }}" method="POST">
                            @csrf
                            <input type="hidden" name="payment_method" value="mpesa">
                            <div class="form-group">
                                <label for="mpesa_number">M-Pesa Number</label>
                                <input type="text" class="form-control" id="mpesa_number" name="mpesa_number" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Pay with M-Pesa</button>
                        </form>
                    </div>
                </div>
            </div>

           
        </div>
    </div>
@endsection
