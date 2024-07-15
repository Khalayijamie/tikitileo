<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PaymentController extends Controller
{
    /**
     * Display the payment form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showPaymentForm(Request $request)
    {
        $selectedInstallment = $request->query('installment');

        $price = $request->query('price');

        return view('payment', compact('selectedInstallment', 'price'));
    }

    /**
     * Process the payment form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function processPayment(Request $request)
    {
        // Validate the payment form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'card_number' => 'required|numeric',
            'expiry_date' => 'required|date_format:m/y',
            'cvv' => 'required|numeric|digits:3',
            // Add more validation rules as needed
        ]);

        $selectedInstallment = $request->input('selected_installment');

        // Implement your payment processing logic here
        // You can use a payment gateway integration or your own payment processing code

        // Example: Simulating a successful payment
        $paymentSuccessful = true;

        if ($paymentSuccessful) {
            // Payment successful, you can redirect the user or display a success message
            return redirect()->route('payment.success')->with('success', 'Payment successful!');
        } else {
            // Payment failed, you can redirect the user or display an error message
            return redirect()->back()->withErrors(['payment' => 'Payment failed. Please try again.']);
        }
    }

    /**
     * Display the payment success view.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPaymentSuccess()
    {
        return view('payment.success');
    }
}

