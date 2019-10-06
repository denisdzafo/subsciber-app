<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;
use Session;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.create-quote');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, array(
        'quote'=>'required'
      ));

      $quote=new Quote();
      $quote->quote=$request->quote;

      $quote->save();

      Session::flash('success', 'Qoute has been successfully added.');
      return redirect()->route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quote=Quote::find($id);
        return view('pages.single-quote')->withQuote($quote);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $quote=Quote::find($id);
      return view('pages.edit-quote')->withQuote($quote);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quote=Quote::find($id);
        $this->validate($request, array(
          'quote'=>'required'
        ));

        $quote->quote=$request->quote;
        $quote->save();

        Session::flash('success', 'Qoute has been successfully updated.');
        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quote=Quote::find($id);
        $quote->delete();

        Session::flash('success', 'Qoute has been successfully deleted.');
        return redirect()->route('admin.dashboard');
    }
}
