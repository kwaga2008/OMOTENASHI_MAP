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
    public function show($area_id,$place_id){
        $place = Place::find($place_id);
        $places = Place::where("area_id",$area_id)->get();
        $info = Info::find($place_id);
        $reviews = Review::where("place_id",$place_id)->get();

        return view("places.show")->with(array("place" => $place,"places" => $places,"info" => $info, "reviews" => $reviews,"id" => $place_id));
    }

    public function index(){
        return view("places.index");
    }
}
