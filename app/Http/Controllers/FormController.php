<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FormController extends Controller
{
    
    public function companies()
    {
    	return view('forms.companies');
    }
    public function candidates()
    {
    	return view('forms.candidates');
    }
}
