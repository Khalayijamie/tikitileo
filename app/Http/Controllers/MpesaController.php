<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Safaricom\Mpesa\Mpesa;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Mail\PaymentReceived;
use Illuminate\Support\Facades\Mail;

class MpesaController extends Controller
{
    private function validateAmount($amount)
    {
        if (!is_numeric($amount) || $amount <= 0 || $amount > 70000) {
            throw new \InvalidArgumentException("Invalid amount: $amount");
        }
        return (int)$amount;
    }

    public function stk(Request $request)
    {
        $eventId = $request->input('event_id'); // Ensure correct retrieval
        $mpesa = new Mpesa();
        $phoneNumber = $request->input('mpesa_number');
        $phoneNumber = '254' . substr($phoneNumber, -9);

        $BusinessShortCode = '174379';
        $LipaNaMpesaPasskey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $TransactionType = 'CustomerPayBillOnline';

        \Log::info('Request data: ', $request->all());

        $Amount = '750';
        $PartyA = $phoneNumber;
        $PartyB = $BusinessShortCode;
        $CallBackURL = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $AccountReference = 'Account Reference';
        $TransactionDesc = 'Transaction Description';
        $Remarks = 'Remarks';

        $stkPushSimulation = $mpesa->STKPushSimulation(
            $BusinessShortCode,
            $LipaNaMpesaPasskey,
            $TransactionType,
            $Amount,
            $PartyA,
            $PartyB,
            $phoneNumber,
            $CallBackURL,
            $AccountReference,
            $TransactionDesc,
            $Remarks
        );

        \Log::info('STK Push Response: ' . json_encode($stkPushSimulation));

        // Save the transaction in the database
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'event_id' => $eventId, // Ensure correct saving
            'amount' => $Amount,
            'mpesa_number' => $phoneNumber,
            'status' => 'Pending',
        ]);

        // Calculate remaining installments and amount
        $remainingInstallments = 1; // Example value
        $remainingAmount = 750; // Example value

        // Send payment received email
        Mail::to(Auth::user()->email)->send(new PaymentReceived($transaction, $remainingInstallments, $remainingAmount));
        
        return redirect()->route('booking.success')->with('success', 'Payment initiated successfully! Please check your M-Pesa for confirmation.');
    }
}
