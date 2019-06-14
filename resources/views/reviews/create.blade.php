@extends('layout')

@section('content')
<body td align="center">
<div class="contents row">
<div class="container">
  <h1>Kinkaku-ji</h1>
  <h1>{{ $spot->place_en }}</h1>
{{ Form::open(['url' => '/reviews', 'method' => 'post']) }}
<p>
<img src="https://kinukake.com/img/sights-th/kinkakuji.jpg" alt="金閣寺1">
<form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>">
<p>Nick name
<input type="text" name="nickname"></p>
<p>
Good<br><input type="radio" name="feeling" value="Good">
Bad<br><input type="radio" name="feeling" value="Bad">
Omotenashi<br><input type="radio" name="feeling" value="Omotenashi">
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
</div>
</form>
</td>
</body>
@endsection