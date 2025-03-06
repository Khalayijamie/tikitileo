<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $previousPurchases = Transaction::with('event')
            ->where('user_id', $user->id)
            ->where('status', 'Completed')
            ->get();

        $ongoingPayments = Transaction::with('event')
            ->where('user_id', $user->id)
            ->where('status', 'Pending')
            ->get();

        $wishlist = $user->wishlist; // Assuming you have a relationship set up for wishlist

        return view('my_purchases', compact('previousPurchases', 'ongoingPayments', 'wishlist'));
    }
}
