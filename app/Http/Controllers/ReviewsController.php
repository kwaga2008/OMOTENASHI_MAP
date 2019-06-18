<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Review;
use App\Place;

class ReviewsController extends Controller
{
  public function create($id)
  {
    $spot = Place::find($id);
    return view('reviews.create')->with(["spot" => $spot]);
  }

  public function store(Request $request,$id)
  {
    Review::create(
      array(
        'nickname' => $request->nickname,
        'text' => $request->text,
        'country' => $request->country,
        'feeling' => $request->feeling,
      )
    );

    return view('reviews.store')->with(array("id" => $id));
  }

  public function index($id)
  {
    $reviews = Review::where("place_id",$id)->get();
    $reviews = Review::orderBy('id','DESC')->get();
    $spot = Place::find($id)->place_en;
    return view('reviews.index')->with(array("reviews" => $reviews,"spot" => $spot));
  }
}