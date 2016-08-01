<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Group;
use App\Person; 

class GroupController extends Controller
{
    public function index()
    {
        /*$this->route='people';
        $this->fields="";
        $resul=$this->api_objects();
        $data=$resul->data;
        dd($data);*/
    	$groups=Group::orderBy('created_at', 'desc')->get();
    	return view('group',compact('groups'));
    }
    public function create()
    {
        $adultsGreater=Person::categorie($categorie="Adulto");
        $adults=Person::categorie($categorie="Adulto Mayor");
        $leaders= $adultsGreater+$adults;
    	return view('forms.group',compact('leaders'));
    }
    public function edit($id)
    {
        $group=Group::find($id);
        $adultsGreater=Person::categorie($categorie="Adulto");
        $adults=Person::categorie($categorie="Adulto Mayor");
        $leaders= $adultsGreater+$adults;
        return view('forms.group-edit',compact('leaders','group'));
    }
    public function update(Request $request, $id){
        
        $rules = array(
            'name'          => 'required|min:5',
            'type'          => 'required',
            'person_id'     => 'required',
        );
        $this->validate($request,$rules);
        $group=Group::find($id);
        $request['user_id']=\Auth::user()->id;
        $group->update($request->all());
        return \Redirect::to('group/')
            ->with('success', 'El '.$group->type.' #'.$group->id.' llamado '.$group->name.' fue modificado con exito')
            ->withInput();
        //dd($data);
    }
    public function store(Request $request){
        
        $rules = array(
            'name'          => 'required|min:5',
            'type'          => 'required',
            'person_id'     => 'required',
        );
        $this->validate($request,$rules);
        $request['user_id']=\Auth::user()->id;
        $group=Group::create($request->all());
        return \Redirect::to('group/')
            ->with('success', 'El '.$group->type.' #'.$group->id.' llamado '.$group->name.' fue creado con exito')
            ->withInput();
    	//dd($data);
    }
    public function show($id) {
        $group=Group::find($id);
        //dd($company);
        return view('show.group',compact('group','data'));
        dd($data);
    }
    public function destroy($id) {
        dd('en desarrollo');
    }
}
