<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>GoogleMaptest</title>
    <link rel="stylesheet" href="/css/style_w.css">
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAXG_vbJY53Jmt6dV-0x5iIcoigSaoyz6s&language=ja"></script>
    <script src="{{ asset('assets/javascripts/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('assets/javascripts/get_content.js') }}"></script>
  </head>
  <body>
    <header class="header">
      <div class="header__bar row">
        <h1 class="grid-6"><a href="/">GoogleMaptest</a></h1>
      </div>
    </header>
    @yield('content')
  </body>
</html>


