<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Transaction;

class PaymentReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $transaction;
    public $remainingInstallments;
    public $remainingAmount;
    public $qrCode;

    public function __construct(Transaction $transaction, $remainingInstallments, $remainingAmount, $qrCode = null)
    {
        $this->transaction = $transaction;
        $this->remainingInstallments = $remainingInstallments;
        $this->remainingAmount = $remainingAmount;
        $this->qrCode = $qrCode;
    }

    public function build()
    {
        return $this->view('emails.payment_received')
                    ->with([
                        'transaction' => $this->transaction,
                        'remainingInstallments' => $this->remainingInstallments,
                        'remainingAmount' => $this->remainingAmount,
                        'qrCode' => $this->qrCode,
                    ]);
    }


    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
