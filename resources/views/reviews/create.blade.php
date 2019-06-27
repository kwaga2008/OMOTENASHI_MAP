@extends('layout')

@section('content')
    <header class="header_review">
      <div class="review_title">
        Write New Review
      </div>
    </header>
<body><center>
<div class="box1">
{{ $spot->place_en }}
@if($spot->id == 1)
@endif
</div>
<img src='{{ asset("assets/images/" . $spot->img_src,config("app.asset-secure")) }}' width="600" height="300" alt=""><br><br>
@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
<div class="contents row">
<div class="container">
{{ Form::open(['url' => URL::secure("/areas/$spot->area_id/places/$spot->id/reviews", array()), 'method' => 'post']) }}
<form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>"></p>
<p>Nick name
<input type="text" name="nickname"></p>
<p>Feeling
<div class="checkbox_01">
  <label>
    <input type="radio" name="feeling" class="checkbox01-input" value=good>
    <span class="checkbox01-parts">Good👍</span>
  </label>
  <label>
    <input type="radio" name="feeling" class="checkbox01-input" value=bad>
    <span class="checkbox01-parts">Bad👎</span>
  </label>
  <label>
    <input type="radio" name="feeling" class="checkbox01-input" value=omotenashi>
    <span class="checkbox01-parts">OMOTENASHI🙏</span>
    <p class="arrow_box">About Japanese custom and manner.</p>
  </label>
</div>
</p>
<p>Country<br>
<select name="country">
<option value="Japan">🇯🇵Japan</option>
<option value="China">🇨🇳China</option>
<option value="Korea">🇰🇷Korea</option>
<option value="Taiwan">🇨🇳Taiwan</option>
<option value="Hongkong">🇨🇳Hongkong</option>
<option value="America">🇺🇸America</option>
<option value="Thailand">🇹🇭Thailand</option>
<option value="Australia">🇦🇺Australia</option>
<option value="Philippine">🇵🇭Philippine</option>
<option value="malaysia">🇲🇾malaysia</option>
<option value="Singapore">🇸🇬Singapore</option>
<option value="Indonesia">🇮🇩Indonesia</option>
<option value="Vietham">🇻🇳Vietnam</option>
<option value="England">🇬🇧England</option>
<option value="Canada">🇨🇦Canada</option>
<option value="France">🇫🇷France</option>
<option value="Germany">🇩🇪Germany</option>
<option value="India">🇮🇳India</option>
<option value="Itary">🇮🇹Italy</option>
<option value="Spain">🇪🇸Spain</option>
<option value="Rossiya">🇷🇺Rossiya</option>
<option value="Other">Other</option>
</select>
</p>
<p>Review</p>
<textarea cols="100" name="text" placeholder="text" rows="10"></textarea><br>
<input type="submit" value="SENT">
{{ Form::close() }}
</div>
<a href="/areas/{{ $spot->area->id }}/places/{{ $spot->id }}">back</a>
</div>
</form>
<br>
</td>
</center>
</body>
@endsection