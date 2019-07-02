<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>OMOTENASHI MAP</title>
    <link rel="stylesheet" href="/css/style_w.css">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.ico',config('app.asset-secure')) }}">
    <script src="https://maps.google.com/maps/api/js?key={{ config('app.api-key') }}&language=en"></script>
    <script src="{{ asset('assets/javascripts/jquery-3.4.1.js',config('app.asset-secure')) }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets/javascripts/scroll.js',config('app.asset-secure')) }}"></script>
  </head>
  <body>
    <header class="header">
      <div class="header__bar row">
        <a href="/"><img src="{{ asset('assets/images/logo/logo.jpg',config('app.asset-secure')) }}" width="300" height="300" alt=""></a>
        <a href="https://twitter.com/Pakuri_ja_nai"><img src="{{ asset('assets/images/nashio.png',config('app.asset-secure')) }}" width="70" height="100" alt="" class="disappear"></a>
    </div>
    </header>
    @yield('content')
<hr>
<div class="ranking">
  {{-- */$i = 1/* --}}
  <h1>Popular Spot</h1>
  <center><p>Number Of Reviews</p></center>
  <div class="rankingbox_wrapper">
    @foreach($ranking as $rank)
    <div class="rankingbox">
      <div class="fadein">
      @if($i==1)
      <h2><img src="{{ asset('assets/images/logo/king1.png',config('app.asset-secure')) }}" alt="" class="kinglogo">  Rank {{$i}}</h2>
      @elseif($i==2)
      <h2><img src="{{ asset('assets/images/logo/king2.png',config('app.asset-secure')) }}" alt="" class="kinglogo">  Rank {{$i}}</h2>
      @elseif($i==3)
      <h2><img src="{{ asset('assets/images/logo/king3.png',config('app.asset-secure')) }}" alt="" class="kinglogo">  Rank {{$i}}</h2>
      @else
      <h2>Rank {{$i}}</h2>
      @endif
      <a href="/areas/{{ $rank->area->id }}/places/{{ $rank->id }}"><img src='{{ asset("assets/images/" . $rank->img_src,config("app.asset-secure")) }}' width="300" height="300" alt="" class="rankingimg" ><p>{{ $rank->place_en }}</p></a>
      <p>Reviews:{{ count($rank->reviews) }}</p>
      {{-- */$i++/* --}}
     </div>
    </div>
    @endforeach
</div>
</div>
<hr>
<div class="wrapper_footer">
  <footer font-size="8px" color="black">
    <p>Copyright© 2019 ZENRIN DataCom CO., LTD. Group4 All Rights Reserved.</p>
  </footer>
</div>

  </body>
</html>


