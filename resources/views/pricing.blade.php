@extends('layout')

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
                <tr>
                    <td>Basic</td>
                    <td>Ksh4,000</td>
                    <td>
                        <ul>
                            <li>Acess to General Audience</li>
                            <li>Meal card</li>
                        </ul>
                    </td>
                    <td>
                        <select id="installmentOptions" class="form-control" name="installment_option">
                            <option value="">Select Installment Option</option>
                            <option value="2-months">2 Monthly Installments</option>
                            <option value="3-months">3 Monthly Installments</option>
                            <option value="6-months">6 Monthly Installments</option>
                        </select>
                        <input type="hidden" id="selectedInstallment" name="selected_installment" value="">
                    </td>
                    <td>
                        <button id="proceedButton" class="btn btn-primary" disabled onclick="proceedToInstallmentDetails()">Proceed</button>
                    </td>
<td>
    <a href="{{ route('payment') }}" class="btn btn-primary">One time payment</a>
    </td>

                </tr>
                <!-- Add more pricing plan rows as needed -->
            </tbody>
        </table>
    </div>

    <script>
        document.getElementById('installmentOptions').addEventListener('change', function() {
            const selectedOption = this.value;
            document.getElementById('selectedInstallment').value = selectedOption;
            updateProceedButton();
        });

        function updateProceedButton() {
            const selectedOption = document.getElementById('installmentOptions').value;
            const proceedButton = document.getElementById('proceedButton');

            if (selectedOption) {
                proceedButton.disabled = false;
            } else {
                proceedButton.disabled = true;
            }
        }

        function proceedToInstallmentDetails() {
            const selectedInstallment = document.getElementById('selectedInstallment').value;

            if (selectedInstallment === '2-months') {
                window.location.href = '{{ route("installment.details", ["plan" => "2-months"]) }}';
            } else if (selectedInstallment === '3-months') {
                window.location.href = '{{ route("installment.details", ["plan" => "3-months"]) }}';
            } else if (selectedInstallment === '6-months') {
                window.location.href = '{{ route("installment.details", ["plan" => "6-months"]) }}';
            }
        }

        updateProceedButton();
    </script>
@endsection


        

