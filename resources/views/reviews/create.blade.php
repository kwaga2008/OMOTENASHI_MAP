@extends('layout')

@section('content')
<body td align="center">

<h1>Kinkaku-ji</h1>
<div class="contents row">
    <div class="container">
        {{ Form::open(['url' => '/reviews', 'method' => 'post']) }}
<p>
<form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>">
<p>Nick name
<input type="text" name="nickname"></p>
<p>
<input type="radio" name="feeling" value="Good"> Good
<input type="radio" name="feeling" value="Bad"> Bad
<input type="radio" name="feeling" value="Omotenashi"> Omotenashi
</p>
<p>Country<br>
<select name="country">
<option value="country1">Japan</option>
<option value="country2">Korea</option>
<option value="country3">Chine</option>
<option value="country4">Taiwan</option>
<option value="country5">Hongkong</option>
<option value="country6">Thailand</option>
<option value="country7">America</option>
<option value="country8">Singapore</option>
<option value="country9">malaysia</option>
<option value="country10">Indonesia</option>
<option value="country11">Philippine</option>
<option value="country12">Vietnam</option>
<option value="country13">India</option>
<option value="country14">England</option>
<option value="country15">France</option>
<option value="country16">Germany</option>
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