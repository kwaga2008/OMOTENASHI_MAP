<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Review;
use App\Place;

class ReviewsController extends Controller
{
  public function create(Request $request)
  {   
    return view('reviews.create')->with(["spot" => $spot]);
  }

  public function store(Request $request)
  {
    Review::create(
      array(
        'nickname' => $request->nickname,
        'text' => $request->text,
        'country' => $request->country,
        'feeling' => $request->feeling
      )
    );

    return view('reviews.store');
  }

  public function index()
  {
    return view('reviews.index');
  }
}