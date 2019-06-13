<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Place;

class PlacesController extends Controller
{
    //
    public function show(){
        $place = Place::find(1);
        return view("places.show")->with(array("place" => $place));
    }
}
