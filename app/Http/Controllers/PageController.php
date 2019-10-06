<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quote;
use App\Subscriber;

class PageController extends Controller
{
  public function getIndex()
  {
      return view('pages.index');
  }

  public function getReactivate()
  {
      return view('pages.reactivate');
  }

  public function getAdminDashboard()
  {
    $quotes=Quote::paginate(10);
    return view('pages.admin-dashboard')->withQuotes($quotes);
  }

  public function getSubscribers()
  {
    $subsribers=Subscriber::paginate(10);
    return view('pages.subscribers')->withSubsribers($subsribers);
  }
}
