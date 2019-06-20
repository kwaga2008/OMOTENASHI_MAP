<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Review;
use App\Place;

class ReviewsController extends Controller
{
  public function create($area_id,$place_id)
  {
    $spot = Place::find($place_id);
    return view('reviews.create')->with(["spot" => $spot]);
  }

  public function store(Request $request,$area_id,$place_id)
  {
    Review::create(
      array(
        'nickname' => $request->nickname,
        'text' => $request->text,
        'country' => $request->country,
        'feeling' => $request->feeling,
        'place_id' => $place_id

      )
    );
    $spot = Place::find($place_id);

    return view('reviews.store')->with(array("spot" => $spot));
  }

  public function index($area_id,$place_id)
  {
    $reviews = Review::where("place_id",$place_id)->orderBy('id','DESC')->get();
    $spot = Place::find($place_id);
    return view('reviews.index')->with(array("reviews" => $reviews,"spot" => $spot));
  }

  public function getReviews(Request $request)
  {
        $country = $request["country"];
        $id = $request["place_id"];
        $requirement = array($request["good"],$request["bad"],$request["omotenashi"]);
        $choice = false;
        for($i = 0;$i < 3; $i++){
          if(is_string($requirement[$i])){
              $choice = true;
          }
        }

        
        if ($country == "all") {
            $review_results = Review::where("place_id", $id);
        }else{
          $review_results = Review::where("place_id",$id)->where("country",$country);
        }
        if ($choice) {
            $review_results = $review_results->whereIn("feeling", $requirement);
        }
        

        $review_results = $review_results->orderBy("id","DESC")->get();

        return response()->json($review_results);
  }

}