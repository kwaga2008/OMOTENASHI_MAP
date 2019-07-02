@extends('layout')

@section('content')
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
<script src="{{ asset('assets/javascripts/scroll.js',config('app.asset-secure')) }}"></script>

<script type="text/javascript">
         window.onload = function(){
            $('.slider').bxSlider({
                auto: true,
                pause: 5000,
            });
        }
</script>

</head>
<body>
<div class="slider">
<img src="{{ asset('assets/images/toppage/fuji.jpg',config('app.asset-secure')) }}" width="0" height="0" alt="">
<img src="{{ asset('assets/images/toppage/Castle.jpg',config('app.asset-secure')) }}" width="0" height="0" alt="">
<img src="{{ asset('assets/images/toppage/Hiroshima.jpg',config('app.asset-secure')) }}" width="0" height="0" alt="">
<img src="{{ asset('assets/images/toppage/kyoto.jpg',config('app.asset-secure')) }}" width="0" height="0" alt="">
<img src="{{ asset('assets/images/toppage/shibuya.jpg',config('app.asset-secure')) }}" width="0" height="0" alt="">
<img src="{{ asset('assets/images/toppage/Okinawa_sea.jpg',config('app.asset-secure')) }}" width="0" height="0" alt="">
<img src="{{ asset('assets/images/toppage/tokyo.jpg',config('app.asset-secure')) }}" width="0" height="0" alt="">

</div>
<div td align="center">
<p><h1>About OMOTENASHI MAP</h1></p>

<div class="info">
<p><!---おもてなしマップは、地図と観光情報と、地域のマナーや慣習をまとめた非常に便利なサービスです。ユーザーがレビューを書き込む機能があり、その地域の最新情報を手に入れることができます。また、ユーザーは国や感情によってレビューを絞り込むことができます。さあ、おもてなしマップを使って日本旅行を楽しみましょう！-->
The OMOTENASHI MAP is a very useful service that maps, tourist information, and manners and customs in the area. You have the ability to write reviews and get updates on their area. You can also narrow their reviews by country and sentiment. Now, let's enjoy the trip to Japan using the OMOTENASHI MAP!!!
</p>
</div>
<div td align="center">
<h1>Select Area</h1>
<div class="area_selects">
<div class="fadein">
<ul>
<li><a href="/areas/{{ $areas[0]->id }}"><img src="{{ asset('assets/images/toppage/tokyo_menu.jpg',config('app.asset-secure')) }}" width="300" height="300" alt="" align=""><p>Tokyo</p></a></li>
<li><a href="/areas/{{ $areas[1]->id }}"><img src="{{ asset('assets/images/toppage/kyoto_menu.jpg',config('app.asset-secure')) }}" width="300" height="300" alt=""><p>Kyoto</p></a></li>
<li><a href="/areas/{{ $areas[2]->id }}"><img src="{{ asset('assets/images/toppage/osaka_menu.jpg',config('app.asset-secure')) }}" width="300" height="300" alt=""><p>Osaka</p></a></li>

<li><a href="/areas/{{ $areas[3]->id }}"><img src="{{ asset('assets/images/toppage/hokkaido_menu.jpg',config('app.asset-secure')) }}" width="300" height="300" alt=""><p>Hokkaido</p></a></li>
<li><a href="/areas/{{ $areas[4]->id }}"><img src="{{ asset('assets/images/toppage/okinawa_menu.jpg',config('app.asset-secure')) }}" width="300" height="300" alt=""><p>Okinawa</p></a></li>
<li><a href="/areas/{{ $areas[5]->id }}"><img src="{{ asset('assets/images/toppage/nagoya_menu.png',config('app.asset-secure')) }}" width="300" height="300" alt=""><p>Nagoya</p></a></li>
</ul>
</div>
</div>

<br><br>
<a href="/areas/0/places/0" id=link_>Other area</a>
<br>
<br>
</div>
</body>

@endsection