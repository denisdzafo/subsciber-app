<div class="container">
  <a class="navbar-brand" href="{{route('index.page')}}">Subscriber App</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  @php
        $user=Auth()->user();

      @endphp
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('index.page')}}">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('reactivate.page')}}">Reactivate account</a>
      </li>
      @if(!Auth())
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
      @endif

      @if($user)
      <li>
          <a class="nav-link" href="{{route('admin.dashboard')}}">Admin Dashboard</a>
      </li>

      <li>
        <a class="nav-link" href="{{route('subscribers.page')}}">Subscribers</a>
      </li>
      @endif
    </ul>
  </div>
</div>
