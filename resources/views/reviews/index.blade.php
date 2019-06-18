@extends('layout')

@section("content")
  <body>
    <header class="header_review">
      <div class="review_title">
        REVIEW
      </div>
    </header>
    <div class="box1">
      {{ $spot }}
    </div>
      <div class="cp_ipselect cp_sl01">
<select required>
  <option value="" hidden>Country</option>
  <option value="Japan">🇯🇵Japan</option>
  <option value="Chine">🇨🇳China</option>
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
</div>
    <div class="checkbox_01">
  <label>
    <input type="checkbox" name="checkbox01[]" class="checkbox01-input">
    <span class="checkbox01-parts">Good👍</span>
  </label>
  <label>
    <input type="checkbox" name="checkbox01[]" class="checkbox01-input">
    <span class="checkbox01-parts">Bad👎</span>
  </label>
  <label>
    <input type="checkbox" name="checkbox01[]" class="checkbox01-input">
    <span class="checkbox01-parts">OMOTENASHI🙏</span>
  </label>
</div>
<div class="container">
<a href="#" class="btn-gradation">narrow down</a>
</div>
    <div class="contents">
    @if(count($reviews) > 0)
    @foreach ($reviews as $review)
      <div class="message clearfix">
        <div class="message_box">
          <p class="user_name_show">
            <b>Name:</b> {{ $review->nickname }}
          </p>
          <p class="country_show">
            <b>Country:</b> {{ $review->country }}
          </p>
          <p class="feeling_show">
            <b>Feeling:</b> {{$review->feeling}}
          </p>
            -------------------------------------------------------------------------
          <p class="text_show">
            <b>Text:</b> {{ $review->text }}
          </p>

        </div>
      </div>
    @endforeach
    @else
    <div class="message clearfix">
        <div class="message_box">
          <p class="text">
            No review exists.
          </p>
        </div>
      </div>
    @endif
    <br>
    <center><a class="btn" href="/places/{{ $id }}">back</a></center>
  </div>
@endsection