<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewSubscriber extends Mailable
{
    use Queueable, SerializesModels;

    protected $subscriber;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subscriber)
    {
        $this->subscriber=$subscriber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

      return $this->from("noreply@subscriber-app.com", "Subscriber App")
        ->subject("Successully subscribed | Subscriber App")
        ->replyTo("noreply@subscriber-app.com", "Info")
        ->view('email.new-subscriber', [
        'subscriber' => $this->subscriber,
        'link' => route('email.unsubscribe', $this->subscriber),
      ]);
    }
}
