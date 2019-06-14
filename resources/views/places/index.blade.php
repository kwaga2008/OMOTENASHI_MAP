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
<img src="images/toppage/Fuji.jpg" width="0" height="0" alt="">
<img src="images/toppage/kyoto.jpg" width="0" height="0" alt="">
<img src="images/toppage/tokyo.jpg" width="0" height="0" alt="">

</div>
<h1>Top page</h1>
<a href="/areas">名所を絞り込むとこ</a>
<a href="/areas/show">その他の観光地を探す</a>
</body>

@endsection