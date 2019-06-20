<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>OMOTENASHI MAP</title>
    <link rel="stylesheet" href="/css/style_w.css">
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCh0c7Qd5PE6KkiO5TKpcyhNfR3nnwxdjQ&language=ja"></script>
    <script src="{{ asset('assets/javascripts/jquery-3.4.1.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>
  </head>
  <body>
    <header class="header">
      <div class="header__bar row">
        <a href="/"><img src="{{ asset('assets/images/logo/logo.jpg') }}" width="300" height="300" alt=""></a>
      </div>
    </header>
    @yield('content')
<div class="wrapper_footer">
  <footer font-size="8px" color="black">
    <p>Copyright© 2019 ZENRIN DataCom CO., LTD. Group4 All Rights Reserved.</p>
  </footer>
</div>
  </body>
</html>


