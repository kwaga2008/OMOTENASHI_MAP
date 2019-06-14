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
<img src="images/kyoto/Gion.jpeg" width="0" height="0" alt="">
<img src="images/Kyoto/Fushimi.jpg" width="0" height="0" alt="">
<img src="images/Kyoto/Kiyomizu.jpg" width="0" height="0" alt="">
</div>

<div td align="center">
<p><h1>Kyoto</h1></p>
<div class="info">
Kyoto is special because it reigned as national capital for more than a 1000 years, which is not only the longest that any city has ruled Japan but also it was the centre of activity throughout the formative years when what we now think of as Japanese culture was born, developed and refined. Kyoto is the city where today during your visit you can delve into Japanese history as well as experience the way of living that keeps Kyoto at the forefront of developing emerging technologies. 
</div>
<br>
<h1>Select Area</h1>
<div class="area_selects">
<ul>
<li><img src="images/kyoto/Kinkaku_menu.jpg" width="300" height="300" alt="" align=""><p>Kinkaku-ji</p></li>
<li><a href="/places/2"><img src="images/kyoto/Kiyomizu_menu.jpg" width="300" height="300" alt=""><p>Kiyomizu-dera</p></a></li>
<li><img src="images/kyoto/Gion_menu.jpg" width="300" height="300" alt=""><p>Gion</p></li>
<br><br>
<li><a href="/places/3"><img src="images/kyoto/Arashiyama_menu.jpg" width="300" height="300" alt=""><p>Arashiyama</p></li></a>
<li><img src="images/kyoto/Byodo_menu.jpg" width="300" height="300" alt=""><p>Byodo-in</p></li>
<li><img src="images/kyoto/Fushimi_menu.jpeg" width="300" height="300" alt=""><p>Fushimi</p></li>
</ul>
</div>
<a href="/places/0">その他の観光地を探す</a>
<br>
<a href="/">トップに戻る</a>
</body>

@endsection