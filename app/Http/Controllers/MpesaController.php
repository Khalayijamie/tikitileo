<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Safaricom\Mpesa\Mpesa;

class MpesaController extends Controller
{
    // Function to validate and sanitize the amount
    private function validateAmount($amount)
    {
        if (!is_numeric($amount) || $amount <= 0 || $amount > 70000) {
            throw new \InvalidArgumentException("Invalid amount: $amount");
        }
        return (int)$amount;
    }

    public function stk(Request $request)
    {
        $mpesa = new Mpesa();
        $phoneNumber = $request->input('mpesa_number');
        $phoneNumber = '254' . substr($phoneNumber, -9);

        $BusinessShortCode = '174379';
        $LipaNaMpesaPasskey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $TransactionType = 'CustomerPayBillOnline';

        // Log the request data for debugging
        \Log::info('Request data: ', $request->all());

        $Amount = '2000';

        $PartyA = $phoneNumber;
        $PartyB = '174379';
        $PhoneNumber = $phoneNumber;
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
            $PhoneNumber,
            $CallBackURL,
            $AccountReference,
            $TransactionDesc,
            $Remarks
        );

        \Log::info('STK Push Response: ' . json_encode($stkPushSimulation));
        \Log::info('Amount being sent to M-Pesa: ' . $Amount);
        \Log::info('M-Pesa phone number: ' . $PhoneNumber);

        return response()->json($stkPushSimulation);
    }
}
