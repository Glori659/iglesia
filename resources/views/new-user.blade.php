@extends('layout.main')
@section('tittle')
	New user
@stop
@section('content')
    {!! Form::open(array('url'=>'users','method'=>'POST','id'=>'add-user'))!!}
	<div class=" col-sm-8 col-lg-6 col-md-6 col-md-offset-3 col-sm-offset-2">
       		<div class="form-group">
                <label>Personal data</label>
                {!! Form::text('first_name',null,array('id'=>'first_name','class'=>'form-control','placeholder'=>'Enter first name'))!!}
            </div>

            <div class="form-group">
            	{!! Form::text('last_name',null,array('id'=>'last_name','class'=>'form-control','placeholder'=>'Enter last name'))!!}
            </div>

            <div class="form-group">
                <label>Email address</label>
                {!! Form::text('email',null,array('id'=>'last_name','class'=>'form-control','placeholder'=>'Enter email'))!!}
                <p class="help-block">Note: the email address will be used for login or reset your password</p>
            </div>

            <div class="form-group">
                <label>Password</label>
                {!! Form::password('password',array('id'=>'password','class'=>'form-control','placeholder'=>'Enter password'))!!}
            </div>
            <div class="form-group">
                {!! Form::password('password_confirmation',array('id'=>'password_confirmation','class'=>'form-control','placeholder'=>'Confirm your password'))!!}
            </div>

            <div class="form-group">
                <label>Select the type of user</label>
                <select class="form-control" name="type">
                    <option value='DEFAULT'>DEFAULT</option>
                    <option value='ADMIN'>ADMIN</option>
                </select>
            </div>
            <div class="form-group">
                <label>Select the status of the user</label>
                <select class="form-control" name="status">
                    <option value="1">ENABLED</option>
                    <option value="0">DISABLED</option>
                </select>
            </div>

            <button type="submit" class="btn btn-default">Create User</button>
            <button type="reset" class="btn btn-default">Reset</button>
        {!! Form::close()!!}
    </div>
@stop