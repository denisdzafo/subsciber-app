<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountDeactivated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from("noreply@subscriber-app.com", "Subscriber App")
        ->subject("Account deactivated | Subscriber App")
        ->replyTo("noreply@subscriber-app.com", "Info")
        ->view('email.account-deactivated');
    }
}
