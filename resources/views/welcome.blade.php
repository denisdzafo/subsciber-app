<!DOCTYPE html>
<html lang="en">

  <head>
    @include('partials.header')
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      @include('partials.nav')
    </nav>

    <!-- Page Content -->
    <section id="content" class="@yield('body_class')">
      @yield('content')
    </section>

    <!-- Footer -->
    <footer id="footer">
      @include('partials.footer')
    </footer>

  </body>

</html>
