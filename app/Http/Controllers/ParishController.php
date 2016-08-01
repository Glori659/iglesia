<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Parish;

class ParishController extends Controller
{
    public function show($id)
    {
        $parishes=Parish::select('id','parish as name')->where('municipality_id','=',$id)->get();
        return \Response::json(array('record' =>  $parishes));
    }
}
