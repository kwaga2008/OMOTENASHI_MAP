@extends('layout')

@section("content")
  <body>
    <header class="header_review">
      <div class="review_title">
        REVIEW
      </div>
    </header>
    <div class="box1">
      {{ $spot->place_en }}
    </div>
          <center><img src='{{ asset("assets/images/" . $spot->img_src) }}' width="600" height="300" alt=""></center>
      <div class="cp_ipselect cp_sl01">
<select required id="country">
  <option value="all" hidden>Country</option>
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
  <form class="form_feeling">
  <label>
    <input type="checkbox" name="checkbox01[]" class="checkbox01-input" id="good">
    <span class="checkbox01-parts">Good👍</span>
  </label>
  <label>
    <input type="checkbox" name="checkbox01[]" class="checkbox01-input" id="bad">
    <span class="checkbox01-parts">Bad👎</span>
  </label>
  <label>
    <input type="checkbox" name="checkbox01[]" class="checkbox01-input" id="omotenashi">
    <span class="checkbox01-parts">OMOTENASHI🙏</span>
  </label>
  </form>
</div>
<br>
<div class="container">
<input type="button" class="btn-gradation" id="narrow_down" value="narrow down">
<script>
  var place_id = {{ $spot->id }};
</script>
<script src="{{ asset('assets/javascripts/reviews_show.js') }}"></script>
</div>
<div class="contents">
      <div class="reviews">
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
              <div class="bar_center">
              <p>
                -------------------------------------------------------
              </p>
              </div>
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
      </div>
    <br>
    <center>
    <input type="button" class="btn-gradation" onclick='location.href="/areas/{{ $spot->area->id }}/places/{{ $spot->id }}"' value="Back">
    <input type="button" class="btn-gradation" onclick='location.href="/"' value="Top Page">
    </center>
</div>
@endsection