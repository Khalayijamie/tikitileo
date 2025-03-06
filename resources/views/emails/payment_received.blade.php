<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Received</title>
</head>
<body>
    <h1>Payment Received</h1>
    <p>Dear {{ $transaction->user->name }},</p>
    @if ($transaction->status == 'Completed')
        <p>We have received your complete payment of Ksh{{ $transaction->amount }}. Here is your ticket:</p>
        <div><img src="{{ $qrCode }}" alt="QR Code"></div>
    @else
        <p>We have received your payment of Ksh{{ $transaction->amount }}.</p>
        <p>You have {{ $remainingInstallments }} installments left to pay, totaling Ksh{{ $remainingAmount }}.</p>
    @endif
    <p>Thank you for your purchase!</p>
</body>
</html>
