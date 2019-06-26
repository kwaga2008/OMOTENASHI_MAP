@extends('layout')

@section('content')
    <div class="contents row">
        <div class="success">
            <h3>
                Review sent!
            </h3>
              <p class="thankyou">
<?php
$data = array(
  0 => array('name' => '\ありがとう💕/', 'rate' => 30),
  1 => array('name' => '\おもてなしです🙏/', 'rate' => 30),
  2 => array('name' => '\お・も・て・な・し/', 'rate' => 10),
  3 => array('name' => '\いえなしこちゃんには内緒だよ！/', 'rate' => 10),
  4 => array('name' => '\焼肉おごって🍖/', 'rate' => 10),
  5 => array('name' => '\500万円ほしい！！/', 'rate' => 5),
  6 => array('name' => '\つらみたらみ/', 'rate' => 4),
  7 => array('name' => '\だいすき💕💕💕/', 'rate' => 1),
);
print($data[gacha($data)]["name"]);

function gacha( $data = array() ){

  $max = 0;
  foreach( $data as $record ) $max += $record['rate'];

  $hit = mt_rand( 0, ($max - 1) );

  foreach( $data as $key => $record ){
    $max -= $record['rate'];
    if( $max <= $hit ) return $key;
  }
}
?>
</p>
              <div class="img-box">
                <img src='{{ asset("assets/images/nashiko.png") }}' width="600" height="300" alt="" >
                <img src='{{ asset("assets/images/nashiko2.png") }}' width="600" height="300" alt="" class="active">

              </div>
              <p>おもてなし子</p>
            <br>
            <a class="btn-gradation" href="/areas/{{ $spot->area->id }}/places/{{ $spot->id }}">Spot Page</a>
            <a class="btn-gradation" href="/">Top page</a>

        </div>
    </div>
@endsection