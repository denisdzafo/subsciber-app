<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class QuoteMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $quote;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($quote)
    {
        $this->quote=$quote;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from("noreply@subscriber-app.com", "Subscriber App")
        ->subject("New Quote | Subscriber App")
        ->replyTo("noreply@subscriber-app.com", "Info")
        ->view('email.quote', [
        'quote' => $this->quote
      ]);
    }
}
