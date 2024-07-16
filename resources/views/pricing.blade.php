@extends('layout')

@include('terms-modal')


@section('content')
    <div class="container">
        <h1>Pricing Plans</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Plan</th>
                    <th>Price</th>
                    <th>Features</th>
                    <th>Installment Options</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->name }}</td>
                        <td id="eventPrice-{{ $event->id }}" data-price="{{ $event->price }}">Ksh{{ $event->price }}</td>
                        <td>
                            <ul>
                                <li>Access to General Audience</li>
                                <li>Meal card</li>
                            </ul>
                        </td>
                        <td>
                            <form id="installmentForm-{{ $event->id }}" action="{{ route('installment.details', [$event->id, 'installmentPlan' => 0]) }}" method="POST">
                                @csrf
                                <select id="installmentOptions-{{ $event->id }}" name="installmentPlan" class="form-control installmentOptions" onchange="updateFormAction({{ $event->id }}, this.value)">
                                    <option value="">Select Installment Option</option>
                                    <option value="2">2 Monthly Installments</option>
                                    <option value="3">3 Monthly Installments</option>
                                    <option value="6">6 Monthly Installments</option>
                                </select>
                                <input type="hidden" id="selectedInstallment-{{ $event->id }}" name="selected_installment" value="">
                                <button id="proceedButton-{{ $event->id }}" class="btn btn-primary" type="button" disabled onclick="submitInstallmentForm({{ $event->id }})">Proceed</button>
                            </form>
                        </td>
                        <td>
                        <a href="#" class="btn btn-nude" onclick="showTermsModal({{ $event->id }}, {{ $event->price }})">One time payment</a>



                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function updateFormAction(eventId, selectedValue) {
            const form = document.getElementById(`installmentForm-${eventId}`);
            const proceedButton = document.getElementById(`proceedButton-${eventId}`);
            const selectedInstallmentInput = document.getElementById(`selectedInstallment-${eventId}`);

            selectedInstallmentInput.value = selectedValue;
            if (selectedValue) {
                form.action = `{{ url('/installment-details/${eventId}') }}/${selectedValue}`;
                proceedButton.disabled = false;
            } else {
                form.action = `{{ url('/installment-details/${eventId}') }}/0`;
                proceedButton.disabled = true;
            }
        }

        function submitInstallmentForm(eventId) {
            const form = document.getElementById(`installmentForm-${eventId}`);
            form.submit();
        }

        function showTermsModal(eventId, price) {
    // Show the terms modal
    const termsModal = new bootstrap.Modal(document.getElementById('termsModal'));
    termsModal.show();

    // Update the accept button to redirect to payment page when clicked
    document.getElementById('acceptTerms').onclick = function() {
        window.location.href = "{{ route('payment') }}?price=" + price + "&event_id=" + eventId + "&payment_type=one_time";
    };
}

    </script>
@endsection
