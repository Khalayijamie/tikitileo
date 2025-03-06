@extends('layout')

@section('content')
    <div class="container">
        <h1>Payment Options</h1>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>M-Pesa</h5>
                    </div>
                    <div class="card-body">
                        <img src="assets/img/gallery/mpesa.png" alt="M-Pesa" class="img-fluid mb-3 img-thumbnail" style="max-width: 100px;">
                        <form action="{{ route('pay') }}" method="POST">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ request('eventId') }}">
                            <input type="hidden" name="amount" value="{{ $price }}">
                            <input type="hidden" name="payment_method" value="mpesa">
                            <div class="form-group">
                                <label for="mpesa_number">M-Pesa Number</label>
                                <input type="tel" class="form-control" id="mpesa_number" name="mpesa_number" pattern="[0-9]{9,12}" placeholder="Enter 9-12 digit phone number" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Pay with M-Pesa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
