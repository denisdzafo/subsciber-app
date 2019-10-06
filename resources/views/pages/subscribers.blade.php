
@extends('welcome')

@section('title','Admin Dashboard|Subscribers')

@section('content')
@section('body_class','admin-dashboard-subsribers')


<div class="container">

    <div class="row">
        <div class="col-lg-12 mx-auto">
            @foreach (['danger', 'warning', 'success', 'info','error'] as $key) @if ( Session::has($key) )
            <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
            @endif @endforeach
            <h4>Subsribers</h4>

            <div class="asset-inner">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Subsribed</th>
                        <th>Settings</th>
                    </tr>

                    @foreach($subsribers as $subscriber)
                    <tr>
                        <td>{{$subscriber->id}}</td>
                        <td>{{$subscriber->email}}</td>
                        @if($subscriber->subscribed)
                        <td>
                          Yes
                        </td>
                        @else
                        <td>
                          No
                        </td>
                        @endif

                        <td>
                            <a href="{{route('activate.subscriber',$subscriber->id)}}" class="btn btn-sm btn-primary">Activate</a>
                            <a href="{{route('deactivate.subscriber',$subscriber->id)}}" class="btn btn-sm btn-danger">Deactivate</a>


                        </td>
                    </tr>
                    @endforeach

                </table>
                {{$subsribers->links()}}
            </div>

        </div>
    </div>
</div>


@endsection
