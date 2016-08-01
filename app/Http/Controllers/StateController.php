<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\State;

class StateController extends Controller
{
    
    public function show($id)
    {
        $states=State::select('id',"state as name")->where('country_id','=',$id)->get();
        return \Response::json(array('record' =>  $states));
    }
}
