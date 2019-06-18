<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Place;
use App\Review;
use App\Info;
use App\Area;

class PlacesController extends Controller
{
    //
    public function show($area_id,$place_id){
        $place = Place::find($place_id);
        $places = Place::where("area_id",$area_id)->get();
        $info = Info::find($place_id);
        $reviews = Review::where("place_id",$place_id)->get();
        $area = Area::find($area_id);
        $areas = Area::all();


        return view("places.show")->with(array("place" => $place,"places" => $places,"info" => $info,
        "area" => $area, "reviews" => $reviews,"place_id" => $place_id,"areas" => $areas));
    }

    public function index(){
        return view("places.index");
    }

    public function getSearchResults($query)
    {
        $results = Place::where('place_ja',"LIKE", "%$query%")->orWhere('place_en',"LIKE", "%$query%")->get();

        return response()->json($results);
    }
}
