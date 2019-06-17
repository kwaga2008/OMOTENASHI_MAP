@extends('layout')

@section('content')
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

<script type="text/javascript">
        $(document).ready(function(){
            $('.slider').bxSlider({
                auto: true,
                pause: 5000,
            });
        });
</script>

</head>
<body>
<div class="slider">
<img src="{{ asset('assets/images/toppage/fuji.jpg') }}" width="0" height="0" alt="">
<img src="{{ asset('assets/images/toppage/kyoto.jpg') }}" width="0" height="0" alt="">
<img src="{{ asset('assets/images/toppage/tokyo.jpg') }}" width="0" height="0" alt="">
</div>

<div td align="center">
<h1>Select Area</h1>
<div class="area_selects">
<ul>
<li><a href="/areas/1"><img src="{{ asset('assets/images/toppage/tokyo_menu.jpg') }}" width="300" height="300" alt="" align=""><p>Tokyo</p></a></li>
<li><a href="/areas/2"><img src="{{ asset('assets/images/toppage/kyoto_menu.jpg') }}" width="300" height="300" alt=""><p>Kyoto</p></a></li>
<li><a href="/areas/3"><img src="{{ asset('assets/images/toppage/osaka_menu.jpg') }}" width="300" height="300" alt=""><p>Osaka</p></a></li>
<br><br>
<li><a href="/areas/4"><img src="{{ asset('assets/images/toppage/hokkaido_menu.jpg') }}" width="300" height="300" alt=""><p>Hokkaido</p></a></li>
<li><a href="/areas/5"><img src="{{ asset('assets/images/toppage/okinawa_menu.jpg') }}" width="300" height="300" alt=""><p>Okinawa</p></a></li>
<li><a href="/areas/6"><img src="{{ asset('assets/images/toppage/nagoya_menu.png') }}" width="300" height="300" alt=""><p>Nagoya</p></a></li>
</ul>
</div>
<br><br>
<a href="/places/0">The others</a>
<br>
<br>
</div>
</body>

@endsection