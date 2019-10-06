
@extends('welcome')

@section('title','Admin Dashboard|Single Quote')

@section('content')
@section('body_class','admin-dashboard-single-qoute')

<div class="container">

    <div class="row">
        <div class="col-lg-8 mx-auto">
            @foreach (['danger', 'warning', 'success', 'info','error'] as $key) @if ( Session::has($key) )
            <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
            @endif @endforeach

            <a href="{{route('admin.dashboard')}}" class="btn btn-primary">Back</a>

            <h3>{{$quote->quote}}</h3>

        </div>
    </div>
</div>


@endsection
