<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;
use Session;

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

    public function emailUnsubscribe(Request $request)
    {
      $this->validate($request, [
            'email' => 'required|email'
        ]);

        $subscriber=Subscriber::where('email','=',$request->email)->first();
        if($subscriber){
          $subscriber = Subscriber::destroy($subscriber->id);

          Session::flash('success', "You have been successfully unsubscribed.");
          return redirect()->route('unsubscribe.page');
        }
        else{
          Session::flash('warning', "We don't have this email in database.");
          return redirect()->route('unsubscribe.page');
        }

    }
}
