<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Ticket</title>
</head>
<body>
    <h1>Your Ticket</h1>
    <p>Transaction ID: {{ $transaction->id }}</p>
    <p>Amount: Ksh{{ $transaction->amount }}</p>
    <p>Status: {{ $transaction->status }}</p>
</body>
</html>
