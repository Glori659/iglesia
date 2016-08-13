<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Person;
use App\Address;
use App\Profession;
use App\Baptism;
use App\Phone;
use App\Country;
use App\Group;
use App\Child;

class PersonController extends Controller
{
    public  $countries,
            $cores,
            $profession;

    public function __construct()
    {
        $this->countries=array(null=>null)+Country::lists('country','id')->toArray();
        $this->cores=array(null=>null)+Group::where('type','Nucleo')->lists('name','id')->toArray();
        $this->profession=array(null=>null)+Profession::lists('name','id')->toArray();
    }
	public function index()
    {
        /*$this->route='people';
        $this->fields="";
        $resul=$this->api_objects();
        $data=$resul->data;
        dd($data);*/
        //$people=Person::categorie($categorie="Adulto");
        //dd($people);
    	$people=Person::orderBy('created_at', 'desc')->get();
    	return view('people',compact('people'));
    }
    # Child functions
        public function createChild()
        {
            $adultsGreater=Person::categorie($categorie="Adulto");
            $adults=Person::categorie($categorie="Adulto Mayor");
            $countries=$this->countries;
            $cores=$this->cores;
            $representatives= $adultsGreater+$adults;
            $select=null;
            $disabled='disabled';
        	return view('forms.child',compact(
                'countries',
                'cores',
                'representatives',
                'select',
                'disabled'
            ));
        }
        public function storeChild(Request $request)
        {
            $rules = array(
                'core'              => 'required',
                'representative_id' => 'required',
                'type_relationship' => 'required',
                'name_first'        => 'required|min:3',
                'name_last'         => 'required|min:3',
                'date_birth'        => 'required',
                'nationality'       => 'required',
                'gender'            => 'required',
                'observations'      => 'min:3',
                'qualities'         => 'min:3',
                'question'          => 'min:3'
            );
            $this->validate($request,$rules);
            $age=Person::age($request['date_birth']);
            if($age->categorie=='Adulto'){
                return \Redirect::back()
                ->with('danger',
                'La persona que intenta registrar es un Adulto de '.$age->value.' años')
                ->withInput();
            }elseif($age->categorie=='Adulto Mayor'){
                return \Redirect::back()
                ->with('danger',
                'La persona que intenta registrar es un Adulto Mayor, cuya edad es de '.$age->value.' años')
                ->withInput();
            }
            $request['user_id']=\Auth::user()->id;
            $person= Person::create($request->all());
            $person->core()->attach($request['core']);

            $request['child_id']=$person->id;
            Child::create($request->all());

            return \Redirect::to('person/')
            ->with('success', 'El Niño fue registrado exitosamente')
            ->withInput();    
        }
        public function editChild($id){
            $person=Person::find($id);
            $adultsGreater=Person::categorie($categorie="Adulto");
            $adults=Person::categorie($categorie="Adulto Mayor");
            $countries=$this->countries;
            $cores=$this->cores;
            $representatives= $adultsGreater+$adults;
            $select=$person->data_selects($person);
            $disabled='disabled';
            return view('forms.adult-edit',compact(
                'countries',
                'cores',
                'representatives',
                'select',
                'disabled',
                'person'
            ));
        }
        public function updateChild(Request $request,$id){
            $age=Person::age($request['date_birth']);
            if ($age->categorie=='Adulto'|| $age->categorie=='Adulto Mayor') {
                return \Redirect::back()
                ->with('danger',
                'La fecha de nacimiento modificada indica que la persona tiene 
                la edad de '.$age->value.' años y para estar registrado como Niño la 
                edad maxima es de 14 años')
                ->withInput();
            }else{
                $person=Person::find($id);
                $person->update($request->all());
                return \Redirect::to('person/')
                ->with('success', 'El Niño fue actualizado exitosamente')
                ->withInput();
            }
        }
    # End Child functions

    # Adult functions
        public function createAdult()
        {
            $countries=$this->countries;
            $cores=$this->cores;
            $professions=$this->profession;
            $select=null;
            $disabled='disabled';
            return view('forms.adult',compact(
                'countries',
                'cores',
                'professions',
                'select',
                'disabled'
            ));
        }
        public function storeAdult(Request $request)
        {
            //dd($request->all());
            $rules = array(
                'core'              => 'required',
                'name_first'        => 'required|min:3',
                'name_last'         => 'required|min:3',
                'date_birth'        => 'required',
                'nationality'       => 'required',
                'identity_document' => 'required|unique:people',
                'gender'            => 'required',
                'email'             => 'required',
                'observations'      => 'min:3',
                'qualities'         => 'min:3',
                'question'          => 'min:3'
            );
            $this->validate($request,$rules);
            $age=Person::age($request['date_birth']);
            if ($age->categorie=='Niño') {
                return \Redirect::back()
                ->with('danger',
                'La persona que intenta registrar es un niño de '.$age->value.' años')
                ->withInput();
            }elseif($age->categorie=='Adulto Mayor'){
                return \Redirect::back()
                ->with('danger',
                'La persona que intenta registrar es un Adulto Mayor, cuya edad es de '.$age->value.' años')
                ->withInput();
            }
            $request['user_id']=\Auth::user()->id;
            $person= Person::create($request->all());
            $person->core()->attach($request['core']);
            $person->profession()->attach($request['profession_id']);

            $request['person_id']=$person->id;

            $address=Address::create($request->all());
            $address->person()->attach($request['person_id']);

            $address=Baptism::create($request->all());
            
            $phone=Phone::create($request->all());
            $phone->person()->attach($request['person_id']);

            return \Redirect::to('person/')
            ->with('success', 'El Adulto fue registrado exitosamente')
            ->withInput();    
        }
        public function editAdult($id)
        {
            $person=Person::find($id);
            $select=$person->data_selects($person);
            $countries=$this->countries;
            $cores=$this->cores;
            $professions=$this->profession;
            $disabled='';
            return view('forms.adult-edit',compact(
                'cores',
                'person',
                'select',
                'countries',
                'professions',
                'disabled'
            ));
        }
        public function updateAdult(Request $request,$id){
            $age=Person::age($request['date_birth']);
            if ($age->categorie=='Niño') {
                return \Redirect::back()
                ->with('danger',
                'La fecha de nacimiento modificada indica que la persona tiene 
                la edad de '.$age->value.' años y para estar registrado como adulto la 
                edad minima es de 15 años')
                ->withInput();
                //dd("es un niño ".$age);
            }elseif($age->categorie=='Adulto Mayor') {

                return \Redirect::back()
                ->with('danger',
                'La fecha de nacimiento modificada indica que la persona tiene 
                la edad de '.$age->value.' años y para estar registrado como adulto la 
                edad maxima es de 54 años')
                ->withInput();
                //dd("es un adulto mayor ".$age);
            }else{
                $person=Person::find($id);
                $person->update($request->all());

                return \Redirect::to('person/')
                ->with('success', 'El Adulto fue actualizado exitosamente')
                ->withInput();
            }
        }
    # End Adult functions

    # End Adult Greater functions
        public function createAdultGreater()
        {
            $countries=$this->countries;
            $cores=$this->cores;
            $professions=$this->profession;
            $select=null;
            $disabled='disabled';
            return view('forms.adult-greater',compact(
                'countries',
                'cores',
                'professions',
                'select',
                'disabled'
            ));
        }
        public function storeAdultGreater(Request $request)
        {

            $rules = array(
                'core'              => 'required',
                'name_first'        => 'required|min:3',
                'name_last'         => 'required|min:3',
                'date_birth'        => 'required',
                'nationality'       => 'required',
                'identity_document' => 'required|unique:people',
                'gender'            => 'required',
                'email'             => 'required',
                'observations'      => 'min:3',
                'qualities'         => 'min:3',
                'question'          => 'min:3'
            );
            $this->validate($request,$rules);
            $age=Person::age($request['date_birth']);
            if ($age->categorie=='Niño') {
                return Redirect::back()
                ->with('danger',
                'La persona que intenta registrar es un niño de '.$age->value.' años')
                ->withInput();
                //dd("es un niño ".$age);
            }elseif($age->categorie=='Adulto'){
                return Redirect::back()
                ->with('danger',
                'La persona que intenta registrar es un Adulto de '.$age->value.' años')
                ->withInput();
                dd("es un adulto ".$age);
            }
            $request['user_id']=\Auth::user()->id;
            $person= Person::create($request->all());
            $person->core()->attach($request['core']);
            $person->profession()->attach($request['profession_id']);

            $request['person_id']=$person->id;

            $address=Address::create($request->all());
            $address->person()->attach($request['person_id']);

            $address=Baptism::create($request->all());
            
            $phone=Phone::create($request->all());
            $phone->person()->attach($request['person_id']);

            return \Redirect::to('person/')
            ->with('success', 'El Adulto Mayor fue registrado exitosamente')
            ->withInput();
        }
        public function updateAdultGreater(Request $request,$id){
            $age=Person::age($request['date_birth']);
            if ($age->categorie=='Adulto'||$age->categorie=='Niño') {
                return \Redirect::back()
                ->with('danger',
                'La fecha de nacimiento modificada indica que la persona tiene 
                la edad de '.$age->value.' años y para estar registrado como adulto Mayor la 
                edad minima es de 55 años')
                ->withInput();
            }else{
                $person=Person::find($id);
                $person->update($request->all());

                return \Redirect::to('person/')
                ->with('success', 'El Adulto Mayor fue actualizado exitosamente')
                ->withInput();
            }
        }
    # End Adult Greater functions
    
    public function store(Request $request){
    	$rules = array(
            'core'              => 'required',
            'representative_id' => 'required',
            'type_relationship' => 'required',
            'name_first'        => 'required|min:3',
            'name_last'         => 'required|min:3',
            'date_birth'        => 'required',
            'nationality'       => 'required',
            'identity_document' => 'required|unique:people',
            'gender'            => 'required',
            'email'             => 'required',
            'observations'      => 'min:3',
            'qualities'         => 'min:3',
            'question'          => 'min:3'
        );
        $this->validate($request,$rules);
        //$request1=$request->except(['_token','date_birth']);
        $person= new Person;
        $person->create($request->all());
        return \Redirect::to('person/')
        ->with('success', 'El niño fue registrado exitosamente')
        ->withInput();
    }
    public function show($id){
        $person=Person::find($id);
        $age=$person->age($person->date_birth);
        return view('show.person',compact('person','age'));
        dd($data);
    }
    public function destroy($id){
        $person= Person::find($id);
        $age=$person->age($person->date_birth);
        //dd($person->representative);
        if ($age->categorie=='Adulto' || $age->categorie=='Adulto Mayor') {
            $aux=0;
            foreach ($person->representative as $chield) {
                //secho $chield->child->name_first;
                $aux++;
            }
            //dd("tiene ".$aux." niños");
            if ($aux<=0) {
                $person->destroy($id);
                return \Redirect::back()
                    ->with('success',
                    'El '.$age->categorie.' a sido eliminado exitosamente')
                    ->withInput();
            }else{
                return \Redirect::back()
                    ->with('danger',
                    'El '.$age->categorie.' no puede ser eliminado por representar a '.$aux.' niño(s)')
                    ->withInput();
            }
        }else{
            $person->destroy($id);
            return \Redirect::back()
                    ->with('success',
                    'El '.$age->categorie.' a sido eliminado exitosamente')
                    ->withInput();
        }
        dd($age->categorie);
        $person->de;
    }
}
