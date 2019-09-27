<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;
use Session;
use App\Mail\NewSubscriber;
use Illuminate\Support\Facades\Mail;
class SubscriberController extends Controller
{
    public function emailSubmit(Request $request)
    {
          $this->validate($request, [
                'email' => 'required|email'
            ]);

          $subscriber=new Subscriber();
          $subscriber->email=$request->email;

          $subscriber->save();

          Session::flash('success', "You have been successfully subscribed.");
          return redirect()->route('index.page');
    }

    public function emailUnsubscribe($id)
    {

        $subscriber=Subscriber::find($id);
        if($subscriber){
          $subscriber = Subscriber::destroy($subscriber->id);

          Session::flash('success', "You have been successfully unsubscribed.");
          return redirect()->route('index.page');
        }
        else{
          Session::flash('warning', "We don't have this email in database.");
          return redirect()->route('index.page');
        }

    }
}
