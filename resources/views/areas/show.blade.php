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
<img src="{{ asset('assets/images/kyoto/Gion.jpeg') }}" width="0" height="0" alt="">
<img src="{{ asset('assets/images/kyoto/Fushimi.jpg') }}" width="0" height="0" alt="">
<img src="{{ asset('assets/images/kyoto/Kiyomizu.jpg') }}" width="0" height="0" alt="">
</div>

<div td align="center">
<p><h1>{{ $area->area }}</h1></p>
<div class="info">
@if( $area->area_info != "")
<p>{{ $area->area_info }}</p>
@else
<p>No Information</p>
@endif
</div>
<br>
<h1>Select Area</h1>
<div class="area_selects">
<ul>
<li><a href="/places/1"><img src="{{ asset('assets/images/kyoto/Kinkaku_menu.jpg') }}" width="300" height="300" alt="" align=""><p>Kinkaku-ji</p></a></li>
<li><a href="/places/2"><img src="{{ asset('assets/images/kyoto/Kiyomizu_menu.jpg') }}" width="300" height="300" alt=""><p>Kiyomizu-dera</p></a></li>
<li><a href="/places/3"><img src="{{ asset('assets/images/kyoto/Gion_menu.jpg') }}" width="300" height="300" alt=""><p>Gion</p></a></li>
<br><br>
<li><a href="/places/4"><img src="{{ asset('assets/images/kyoto/Arashiyama_menu.jpg') }}" width="300" height="300" alt=""><p>Arashiyama</p></a></li>
<li><a href="/places/5"><img src="{{ asset('assets/images/kyoto/Byodo_menu.jpg') }}" width="300" height="300" alt=""><p>Byodo-in</p></a></li>
<li><a href="/places/6"><img src="{{ asset('assets/images/kyoto/Fushimi_menu.jpeg') }}" width="300" height="300" alt=""><p>Fushimi</p></a></li>
</ul>
</div>
<a href="/places/0">Find other place</a>
<br>
<a href="/">Top Page</a>
</body>

@endsection