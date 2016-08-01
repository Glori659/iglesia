<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Municipality;

class MunicipalityController extends Controller
{
    public function show($id)
    {
        $municipalities=Municipality::select('id','municipality as name')->where('state_id','=',$id)->get();
        return \Response::json(array('record' =>  $municipalities));
    }
}
