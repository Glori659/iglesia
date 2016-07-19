<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Candidate;
use Carbon\Carbon ;

class CandidateController extends Controller
{
    public function index()
    {
        /*$this->route='people';
        $this->fields="";
        $resul=$this->api_objects();
        $data=$resul->data;
        dd($data);*/
    	$candidate=Candidate::orderBy('created_at', 'desc')->get();
    	return view('candidates',compact('candidate'));
    }
    public function create()
    {
    	return view('forms.candidate');
    }
    public function store(Request $request){
        //dd($request->all());
        $rules = array(
            'name_first'            => 'required|min:3',
            'name_last'             => 'required|min:3',
            'address_country_code'  => 'required',
            'address_street1'       => 'required',
            'document_type'         => 'required',
            'document_value'        => 'required',
            'date_of_birth'            => 'required',
        );
        if ($request->document_type=='ssn') {
            $request['ssn']=$request->document_value;

        }elseif($request->document_type=='passport'){
            $request['passport']=$request->document_value;
        }
        $this->validate($request,$rules);
        if(empty($this->key)){
            return back()->with('danger', 'Configure api access key');
        }else{
        	$request1=$request->except(['_token','incorporation_date','document_type','document_value']);
            //dd($request1);
            $this->route='candidates';
            $this->fields=$request1;
            $data=$this->api_objects();
            //dd(json_decode($data)->error);
            if (isset(json_decode($data)->error)) {
               return back()->with('danger', json_decode($data)->error->message)->withInput($request->all());
            }else{
                $person= new Candidate;
                $person->json=$data;
                $person->user_id=\Auth::user()->id;
                $person->save();
                return \Redirect::to('candidates/')
                    ->with('success', 'Candidate verified successfully')
                    ->withInput();
            }
        	//dd($data);
        }
    }
    public function edit($id){
        $data=Candidate::find($id);
        $candidate=json_decode($data->json);
        if(isset($candidate->deleted)){
            if($candidate->deleted==true){
                return \Redirect::to('candidates/')
                    ->with('danger', 'The candidate was eliminated')
                    ->withInput();
            }
        }
        return view('candidate-edit',compact('candidate','data'));
    }
    public function show($id){
        $data=Candidate::find($id);
        $candidate=json_decode($data->json);
        //dd($candidate);
        return view('show.candidate',compact('candidate','data'));
        dd($data);
    }
    public function update(Request $request, $id){
        //dd("The edit operation is in development");
        $table=Candidate::find($id);
        $candidate=json_decode($table->json);
        
        //dd( $request->all());
        $rules = array(
            'name_first'            => 'required|min:3',
            'name_last'             => 'required|min:3',
            'address_country_code'  => 'required',
            'address_street1'       => 'required',
            'document_type'         => 'required',
            'document_value'        => 'required',
            'date_of_birth'            => 'required',
        );
        $this->validate($request,$rules);
        if ($request->document_type=='ssn') {
            $request['ssn']=$request->document_value;

        }elseif($request->document_type=='passport'){
            $request['passport']=$request->document_value;
        }
        if(empty($this->key)){
            return back()->with('danger', 'Configure api access key');
        }else{
            $request1=$request->except(['_token','incorporation_date','document_type','document_value']);
            //dd($request1);
            $this->CUSTOMREQUEST="PATCH";
            $this->route='candidates/'.$candidate->id;
            $this->fields=$request1;
            $data=$this->api_objects();
            //dd(json_decode($data)->error);
            if (isset(json_decode($data)->error)) {
               return back()->with('danger', json_decode($data)->error->message)->withInput($request->all());
            }else{
                $table->json=$data;
                $table->edited_by=\Auth::user()->id;
                $table->edit_at=Carbon::now()->toDateTimeString();
                $table->update();
                return \Redirect::to('candidates/')
                    ->with('success', 'Candidate edited successfully')
                    ->withInput();
            }
            //dd($data);
        }

    }
    public function destroy($id){
        //dd("The operation of removing is in development");
        $table=Candidate::find($id);
        $candidate=json_decode($table->json);
        $this->CUSTOMREQUEST="DELETE";
        $this->route='candidates/'.$candidate->id;
        $data=$this->api_objects();
        //dd($data);
        if (isset($data->error)) {
           return back()->with('danger', json_decode($data)->error->message)->withInput($request->all());
        }else{
            $table->json=json_encode($data);
            $table->deleted_by=\Auth::user()->id;
            $table->update();
            return \Redirect::to('candidates/')
                ->with('success', 'Candidate deleted successfully')
                ->withInput();
        }
    }
}
