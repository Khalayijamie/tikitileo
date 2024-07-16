<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstallmentController extends Controller
{
    public function showInstallmentDetails(Request $request, $plan)
    {
        // Handle the installment details based on the selected plan
        switch ($plan) {
            case '2-months':
                // Handle 2 monthly installments details
                $installmentDetails = [
                    'totalAmount' => 4000, // Example total amount for 2 monthly installments
                    'installmentAmount' => 2000, // Example installment amount
                    'installmentDates' => ['2023-06-01', '2023-07-01'], // Example installment dates
                    'plan' => $plan 
                ];
                break;
            case '3-months':
                // Handle 3 monthly installments details
                $installmentDetails = [
                    'totalAmount' => 4000, // Example total amount for 3 monthly installments
                    'installmentAmount' => 1333, // Example installment amount
                    'installmentDates' => ['2023-06-01', '2023-07-01', '2023-08-01'], // Example installment dates
                    'plan' => $plan 
                ];
                break;
            case '6-months':
                // Handle 6 monthly installments details
                $installmentDetails = [
                    'totalAmount' => 4000, // Example total amount for 6 monthly installments
                    'installmentAmount' => 666, // Example installment amount
                    'installmentDates' => ['2023-06-01', '2023-07-01', '2023-08-01', '2023-09-01', '2023-10-01', '2023-11-01'], // Example installment dates
                    'plan' => $plan 
                ];
                break;
            default:
                // Handle invalid plan
                $installmentDetails = null;
                break;
        }

        return view('installmentdetails', compact('installmentDetails', 'paymentRoute'));

    }
}
