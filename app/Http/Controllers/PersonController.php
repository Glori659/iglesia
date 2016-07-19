<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Person;
class PersonController extends Controller
{
	public function index()
    {
        /*$this->route='people';
        $this->fields="";
        $resul=$this->api_objects();
        $data=$resul->data;
        dd($data);*/
    	$people=Person::orderBy('created_at', 'desc')->get();
    	return view('people',compact('people'));
    }
    public function createChild()
    {
    	return view('forms.child');
    }
     public function createAdult()
    {
        return view('forms.adult');
    }
    public function createAdultGreater()
    {
        return view('forms.adult-greater');
    }
    public function store(Request $request){
    	$pieces = explode("/", $request->date_birth);
    	$rules = array(
            'name_first'            => 'required|min:3',
            'name_last'             => 'required|min:3',
            'address_country_code'  => 'required',
            'address_street1'       => 'required',
            'document_type'         => 'required',
            'document_value'        => 'required',
            'date_birth'            => 'required',
        );
        $this->validate($request,$rules);
        if(empty($this->key)){
            return back()->with('danger', 'Configure api access key');
        }else{
            $request['birth_month']=$pieces[0]; 
            $request['birth_day']=$pieces[1];
            $request['birth_year']=$pieces[2];
        	$request1=$request->except(['_token','date_birth']);
            $this->route='people';
            $this->fields=$request1;
            $data=$this->api_objects();
            //dd(json_decode($data)->error);
            if (isset(json_decode($data)->error)) {
               return back()->with('danger', json_decode($data)->error->message)->withInput($request->all());
            }else{
                $person= new Person;
                $person->json=$data;
                $person->user_id=\Auth::user()->id;
                $person->save();
                return \Redirect::to('person/')
                    ->with('success', 'Person verified successfully')
                    ->withInput();
            }
        	//dd($data);
        }
    }
    public function show($id){
        $data=Person::find($id);
        $person=json_decode($data->json);
        //dd($data->user);
        return view('show.person',compact('person','data'));
        dd($data);
    }
}
