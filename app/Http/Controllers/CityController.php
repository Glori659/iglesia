<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\City;

class CityController extends Controller
{
    public function show($id)
    {
        $cities=City::select('id','city as name')->where('state_id','=',$id)->get();
        return \Response::json(array('record' =>  $cities));
    }
}
