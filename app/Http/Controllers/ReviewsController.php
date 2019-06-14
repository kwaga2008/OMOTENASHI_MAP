<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Review;

class ReviewsController extends Controller
{
  public function create()
  {
    return view('reviews.create');
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

  public function index(){
    $reviews = Review::all();

    return view('reviews.index')->with(["reviews" => $reviews]);
  }
}