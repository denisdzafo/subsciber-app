<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;
use Session;
use App\Mail\NewSubscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountDeactivated;
use App\Mail\AccountActivated;
use App\Mail\AccountReactivate;
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
          $subscriber->subscribed=false;
          $subscriber->save();
          $subscriber = Subscriber::destroy($subscriber->id);

          Session::flash('success', "You have been successfully unsubscribed.");
          return redirect()->route('index.page');
        }
        else{
          Session::flash('warning', "We don't have this email in database.");
          return redirect()->route('index.page');
        }

    }

    public function deactivateSubscriber($id)
    {
      $subscriber=Subscriber::find($id);
      $subscriber->subscribed=false;
      $subscriber->save();
      Mail::to($subscriber->email)->send(new AccountDeactivated());
      Session::flash('success', "You have cancel subscribtion for the subsriber.");
      return redirect()->route('subscribers.page');
    }

    public function activateSubscriber($id)
    {
      $subscriber=Subscriber::find($id);
      $subscriber->save();
      Mail::to($subscriber->email)->send(new AccountActivated());
      Session::flash('success', "You have subscribed user.");
      return redirect()->route('subscribers.page');
    }

    public function accountReactivate(Request $request)
    {
          $this->validate($request, [
                'email' => 'required|email'
            ]);

          $subscriber = Subscriber::onlyTrashed()->where('email','=',$request->email)->first();

          Mail::to($subscriber->email)->send(new AccountReactivate($subscriber));

          Session::flash('success', "We have send you mail to reactivate your profile.");
          return redirect()->route('index.page');
    }

    public function accountReactivateMail($id)
    {
      $subscriber = Subscriber::onlyTrashed()->find($id);
      $subscriber->restore();
      Session::flash('success', "You have succesfully restored your profile.");
      return redirect()->route('index.page');
    }
}
