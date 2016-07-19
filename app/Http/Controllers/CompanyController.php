<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Company;

class CompanyController extends Controller
{
    public function index()
    {
        /*$this->route='people';
        $this->fields="";
        $resul=$this->api_objects();
        $data=$resul->data;
        dd($data);*/
    	$companies=Company::orderBy('created_at', 'desc')->get();
    	return view('companies',compact('companies'));
    }
    public function create()
    {
    	return view('forms.companies');
    }
    public function store(Request $request){
        $rules = array(
            'entity_name'           => 'required|min:5',
            'incorporation_type'    => 'required',
            'address_street1'       => 'required',
            'address_postal_code'   => 'required',
            'address_city'          => 'required',
            'address_subdivision'   => 'required',
            'tax_id'                => 'required|min:9',
        );
        $this->validate($request,$rules);
        if(empty($this->key)){
            return back()->with('danger', 'Configure api access key');
        }else{

            if(!empty($request->incorporation_date)){
                $pieces = explode("/", $request->incorporation_date);
                $request['incorporation_month']=$pieces[0]; 
                $request['incorporation_day']=$pieces[1];
                $request['incorporation_year']=$pieces[2];
            }
            $request['incorporation_country_code']='US';
            $request['address_country_code']='US';

        	$request1=$request->except(['_token','incorporation_date']);
            //dd($request1);
            $this->route='companies';
            $this->fields=$request1;
            $data=$this->api_objects();
            //dd(json_decode($data)->error);
            if (isset(json_decode($data)->error)) {
               return back()->with('danger', json_decode($data)->error->message)->withInput($request->all());
            }else{
                $person= new Company;
                $person->json=$data;
                $person->user_id=\Auth::user()->id;
                $person->save();
                return \Redirect::to('companies/')
                    ->with('success', 'Company verified successfully')
                    ->withInput();
            }
        	//dd($data);
        }
    }
    public function show($id){
        $data=Company::find($id);
        $company=json_decode($data->json);
        //dd($company);
        return view('show.company',compact('company','data'));
        dd($data);
    }
}
