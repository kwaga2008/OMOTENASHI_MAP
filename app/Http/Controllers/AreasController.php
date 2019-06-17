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
        $top_places = Place::where("area_id",$id)->take(6)->get();
        return view("areas.show")->with(array("area" => $area, "top_places" => $top_places));
    }

    public function index(){
        return view("areas.index");
    }
}
