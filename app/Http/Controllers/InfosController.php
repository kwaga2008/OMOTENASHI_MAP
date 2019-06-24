<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Info;

class InfosController extends Controller
{
    //
    public function getInfo(Request $request)
  {
        $info_result = Info::find($request["place_id"]);
        return response()->json($info_result);
  }

}
