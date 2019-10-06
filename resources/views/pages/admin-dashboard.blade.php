
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
            <h4>Quotes</h4>
            <div class="add-quote">
                <a href="{{route('quotes.index')}}" class="btn btn-primary">Add Quote</a>
            </div>
            <div class="asset-inner">

                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Quote</th>
                        <th>Settings</th>
                    </tr>

                    @foreach($quotes as $quote)
                    <tr>
                        <td>{{$quote->id}}</td>
                        <td>{{$quote->quote}}</td>
                        <td>
                            <a href="{{route('quotes.show', $quote->id)}}" class="btn btn-sm btn-primary">View</a>
                            <a href="{{route('quotes.edit',$quote->id)}}" class="btn btn-sm btn-info">Edit</a>
                            <form class="form-horizontal quotes-delete" role="form" method="POST" action="{{route ('quotes.destroy',$quote->id)}}">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="_method" value="DELETE" />
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach

                </table>
                {{$quotes->links()}}
            </div>

        </div>
    </div>
</div>


@endsection
