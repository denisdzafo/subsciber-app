<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Subscriber;
use App\Quote;
use App\Mail\QuoteMail;
use Illuminate\Support\Facades\Mail;

class SendQuote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:quote';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send quote';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $subscribers=Subscriber::where('subscribed',"=", true)->get();
        $quotes=Quote::all();

        foreach($subscribers as $subscriber)
        {
          $number=$subscriber->quote_order;

            if($number>=$quotes->count()){
              $number=0;
            }
          $quoteId=$quotes[$number]->id;

          $quote=Quote::find($quoteId);

          Mail::to($subscriber->email)->send(new QuoteMail($quote));
          $number=$number+1;
          $subscriber->quote_order=$number;
          $subscriber->save();
        }
    }
}
