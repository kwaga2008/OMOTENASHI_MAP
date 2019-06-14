<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReviewsController extends Controller
{
  public function create(Request $request)
  {   
    $spot = $request->place_en;
    echo $spot;
    return view('reviews.create')->with(["spot" => $spot]);
  }

  public function store(Request $request)
  {
    Review::create(
      array(
        'nickname' => $request->nickname,
        'text' => $request->text,
      )
    );

    return view('reviews.store');
  }

  public function index()
  {
    return view('reviews.index');
  }
}