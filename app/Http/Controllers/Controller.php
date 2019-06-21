<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use App\Place;
use App\Review;
use DB;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function __construct(){
        $reviewSort = Review::select(DB::raw('count(*) as num, place_id'))->groupBy('place_id')->orderBy('num', 'DESC')->take(5)->get();
        $placeranks = $reviewSort->map(function($review)
        {
            return Place::find($review->place_id);
        });
        View::share('ranking', $placeranks);
    }
}
