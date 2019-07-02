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
    public function show($area_id, $place_id)
    {
        $place = Place::find($place_id);
        $places = Place::where("area_id", $area_id)->get();
        $info = Info::find($place_id);
        $reviews = Review::where("place_id", $place_id)->orderBy("id", "DESC")->take(5)->get();
        $area = Area::find($area_id);
        $areas = Area::all();


        return view("places.show")->with(array("place" => $place,"places" => $places,"info" => $info,
        "area" => $area, "reviews" => $reviews,"place_id" => $place_id,"areas" => $areas,"area_id" => $area_id));
    }

    public function index()
    {
        return view("places.index");
    }

    public function getSearchResults(Request $request)
    {
        $keyword = $request["query"];
        $area = $request["area"];
        if ($area == 0) {
            $area = "all";
        }
        if ($area != "all") {
            $results = Place::where("area_id", $request["area"])
            ->where(function ($query1) use ($keyword) {
                $query1->where('place_ja', 'iLIKE', "%$keyword%")->orWhere('place_en', 'iLIKE', "%$keyword%");
            })->get();
        } else {
            $results = Place::where('place_ja', "iLIKE", "%$keyword%")->orWhere('place_en', "iLIKE", "%$keyword%")->get();
        }
        return response()->json($results);
    }
    
    public function getMarkers(Request $request)
    {
        if ($request["area"] == "true") {
            $marker_results = Area::all();
        } else {
            $marker_results = Place::all();
        }
        
        return response()->json($marker_results);
    }
}
