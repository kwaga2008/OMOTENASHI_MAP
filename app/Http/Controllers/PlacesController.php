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
    public function show($id){
        $place = Place::find($id);
        $places = Place::all();
        $info = Info::find($id);
        $reviews = Review::where("place_id",$id)->get();
        return view("places.show")->with(array("place" => $place,"places" => $places,"info" => $info, "reviews" => $reviews));
        
    }

    public function index(){
        return view("places.index");
    }
}
