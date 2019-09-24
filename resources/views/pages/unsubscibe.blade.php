@extends('welcome')

@section('title','Subscriber')

@section('content')
@section('body_class','subscribe')



      <div class="container">

        <div class="row">
          <div class="col-lg-8 mx-auto">
            @foreach (['danger', 'warning', 'success', 'info','error'] as $key)
               @if ( Session::has($key) )
               <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
               @endif
            @endforeach
            <form method="post" action="{{route('email.unsubscribe')}}" >
               <input type="hidden" name="_token" value="{{csrf_token()}}">
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <label class="form-label">Email</label>
                     <input type="eamil" name="email" class="form-control">
                  </div>
               </div>


               <button type="submit" class="btn btn-primary">Unubscribe</button>
            </form>
          </div>
        </div>
      </div>



@endsection
