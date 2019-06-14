<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Place;
use App\Review;
use App\Info;

class PlacesController extends Controller
{
    //
    public function show(){
        $place = Place::find(1);
        $info = Info::find(1);
        $reviews = Review::where("place_id",1)->get();
        return view("places.show")->with(array("place" => $place, "info" => $info, "reviews" => $reviews));
    }
}
