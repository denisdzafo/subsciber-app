
@extends('welcome')

@section('title','Admin Dashboard')

@section('content')
@section('body_class','admin-dashboard')

<div class="container">

    <div class="row">
        <div class="col-lg-12 mx-auto">
            @foreach (['danger', 'warning', 'success', 'info','error'] as $key) @if ( Session::has($key) )
            <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
            @endif @endforeach

            <form method="post" action="{{route('qoutes.store')}}" >
               <input type="hidden" name="_token" value="{{csrf_token()}}">
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <label class="form-label">Quote</label>
                     <textarea name="quote"  cols="80"  class="form-control"></textarea>
                  </div>
               </div>

               <button type="submit" class="btn btn-primary">Add qoute</button>
            </form>

        </div>
    </div>
</div>


@endsection
