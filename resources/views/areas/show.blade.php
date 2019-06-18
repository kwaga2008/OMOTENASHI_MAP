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
@for($n = 1; $n < 4; $n++)
<img src='{{ asset("assets/images/" . $area->area_en . "/slide" . $n . ".jpg") }}' width="0" height="0" alt="">
@endfor
</div>

<div td align="center">
<p><h1>{{ $area->area_en }}</h1></p>
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
@foreach($top_places as $place)
{{-- */$i = 1/* --}}
@if($place->img_src !="")
<li><a href="{{ $place->area->id }}/places/{{ $place->id }}"><img src='{{ asset("assets/images/" . $place->img_src) }}' width="300" height="300" alt="" ><p>{{ $place->place_en }}</p></a></li>
@else
<li><a href="{{ $place->area->id }}/places/{{ $place->id }}"><img src='{{ asset("assets/images/no_image.png") }}' width="300" height="300" alt="" ><p>{{ $place->place_en }}</p></a></li>
@endif
@if( $i == 3 )
<br><br>
@endif
{{-- */$i++/* --}}
@endforeach
</ul>
</div>
<a href="{{ $area->id }}/places/0">Find other place</a>
<br>
<a href="/">Top Page</a>
</body>

@endsection