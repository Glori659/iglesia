<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Configuration;

class ConfigurationController extends Controller
{
    public function index(){
        $confi = \App\Configuration::find(1);
        return view('forms.key',compact('confi'));
    }
    public function update(Request $request, $id){
    	$rules = array(
    	    'key' => 'required',
    	    'name_app' => 'required'
    	);
    	$this->validate($request,$rules);
    	$confi= Configuration::find($id)->update($request->all());
    	return \Redirect::to('configuration')
                    ->with('success', 'Application data updated successfully')
                    ->withInput();
    }
}
