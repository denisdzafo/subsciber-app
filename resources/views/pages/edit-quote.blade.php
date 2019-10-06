
@extends('welcome')

@section('title','Admin Dashboard|Edit Quote')

@section('content')
@section('body_class','admin-dashboard-edit-quote')

<div class="container">

    <div class="row">
        <div class="col-lg-12 mx-auto">
            @foreach (['danger', 'warning', 'success', 'info','error'] as $key) @if ( Session::has($key) )
            <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
            @endif @endforeach

            <form method="post" action="{{route('quotes.update',$quote->id)}}" >
               <input type="hidden" name="_token" value="{{csrf_token()}}">
                 <input type="hidden" name="_method" value="PUT"/>
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <label class="form-label">Quote</label>
                     <textarea name="quote"  cols="80"  class="form-control">{{$quote->quote}}</textarea>
                  </div>
               </div>

               <button type="submit" class="btn btn-primary">Edit qoute</button>
            </form>

        </div>
    </div>
</div>


@endsection
