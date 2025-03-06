<div class="modal fade" id="installmentPaymentModal" tabindex="-1" aria-labelledby="installmentPaymentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="installmentPaymentModalLabel">Installment Payment Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p class="lead mb-4">Thank you for choosing our installment plan! Please fill out the form below to proceed with your payment.</p>
      <form id="installmentPaymentForm" action="{{ route('payment') }}" method="GET">

          @csrf
           
          <input type="hidden" name="total_amount" value="{{ $installmentDetails['totalAmount'] }}">
          
          <div class="mb-3">
            <label for="installment_plan" class="form-label">Choose your Installment Plan</label>
            <select class="form-select" id="installment_plan" name="installment_plan" required>
              <option value="">Select your installment plan</option>
              <option value="2-months">2 Monthly Installments</option>
              <option value="3-months">3 Monthly Installments</option>
              <option value="6-months">6 Monthly Installments</option>
            </select>
          </div>
          
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
          </div>
          <div class="mb-3 form-check">
  <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
  <label class="form-check-label" for="terms">I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions</a></label>
</div>

          <button type="submit" class="btn btn-primary">Submit </button>
</form>





        </form>
      </div>
    </div>
  </div>
</div>
@include('terms-modal')

