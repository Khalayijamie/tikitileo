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
    <p>We have received your payment of Ksh{{ $transaction->amount }}.</p>
    <p>You have {{ $remainingInstallments }} installments left to pay, totaling Ksh{{ $remainingAmount }}.</p>
    <p>Thank you for your purchase!</p>
</body>
</html>