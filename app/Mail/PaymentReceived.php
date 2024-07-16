<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Transaction;

class PaymentReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $transaction;
    public $remainingInstallments;
    public $remainingAmount;

    public function __construct(Transaction $transaction, $remainingInstallments, $remainingAmount)
    {
        $this->transaction = $transaction;
        $this->remainingInstallments = $remainingInstallments;
        $this->remainingAmount = $remainingAmount;
    }

    public function build()
    {
        return $this->view('emails.payment_received')
                    ->with([
                        'transaction' => $this->transaction,
                        'remainingInstallments' => $this->remainingInstallments,
                        'remainingAmount' => $this->remainingAmount,
                    ]);
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Payment Received',
        );
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
