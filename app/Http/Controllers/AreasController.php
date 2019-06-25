<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Area;
use App\Place;

class AreasController extends Controller
{
    //
    public function show($id){
        $area = Area::find($id);
        $top_places = Place::where("area_id",$id)->take(9)->get();
        return view("areas.show")->with(array("area" => $area, "top_places" => $top_places));
    }

    public function index(){
        return view("areas.index");
    }
    
    public function getResults(Request $request)
    {
        $keyword = $request["query"]; 
        $results = Area::where('area', "LIKE", "%$keyword%")->orWhere('area_en', "LIKE", "%$keyword%")->get();
        return response()->json($results);
    }
}
