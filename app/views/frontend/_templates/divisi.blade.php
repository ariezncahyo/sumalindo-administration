<!DOCTYPE html>
<html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <!-- Judul
    ================================================== -->
    <title>@yield('title')</title>

    <!-- CSS
    ================================================== -->
    {{ HTML::style('addon/css/bootstrap.css') }}

    @yield('style')

  </head>

  <body>

  @yield('konten')

  <!-- FOOTER -->
  <footer align="center">        
    <p>© 2013 SLJ Global, Tbk Company, Inc. · Privacy · Terms </p>
  </footer>

    <!-- Javascript
    ================================================== -->
    {{ HTML::script('addon/js/jquery-1.10.2.min.js') }}
    {{ HTML::script('addon/js/bootstrap.js') }}

    @yield('script')

  </body>
</html>
