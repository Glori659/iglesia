<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Configuration;

class UserController extends Controller
{
	public function index(){
		$users = User::get();
		return view('users',compact('users'));
	}
    public function create(){
    	return view('new-user');
    }
    public function store(Request $request){
        $rules = array(
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3',
            'type' => 'required',
            'status' => 'required',
        );
        $this->validate($request,$rules);
        $request['password']=\Hash::make($request['password']);
    	$user= User::create($request->all());
    	return \Redirect::to('users/'.$user->id)
                    ->with('success', 'User created successfully');
    }
    public function show($id){
        if (\Auth::user()->type=='ADMIN') {
        	$user  =    User::find($id);
         }else{
            $user  =    User::find(\Auth::user()->id);
         }
        $confi =    Configuration::find(1);
    	return view('settings',compact('user','confi'));
    }
    public function update(Request $request, $id){
        $rules = array(
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email'
        );
    	$user = User::find($id);

        if (!empty($request->current_password) && 
            !empty($request->password) && 
            !empty($request->password_confirmation)
            )
        {
            $rules=array_add($rules, 'password','required|min:3|confirmed');
            $rules=array_add($rules, 'password_confirmation','required|min:3');
            $this->validate($request,$rules);

            if(\Hash::check($request->current_password, $user->password)){
                $request['password']=\Hash::make($request['password']);
                $request=$request->all();
            }else {
                return \Redirect::to('users/'.$id)
                    ->with('warning', 'the current password is incorrect')
                    ->withInput();
            }     
        }else{
            $this->validate($request,$rules);
            $request=$request->except(['password']);
        }

    	$user->update($request);
    	return \Redirect::to('users/'.$id)
                    ->with('success', 'Successful modification')
                    ->withInput();
    }
}
