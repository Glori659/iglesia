@extends('layout.main')
@section('tittle')
	User Settings
@stop
@section('content')
    <div class="col-lg-4 text-center">
			<i class="glyphicon glyphicon-user fa-5x"></i>
            <h3>{{$user->first_name}} {{$user->last_name}}
                <small>{{$user->type}}</small>
            </h3>
            <p>
            	Here you can see the basic information of the user and to modify user data, simply use the form that appears on the right
	            <i class="fa fa-arrow-right" aria-hidden="true"></i>
			</p>
    </div>
    <div class="col-lg-8">
    	@if($user->status==1)
	    	<h4 class="text-success">
	        	ENABLED USER <i class="fa fa-circle-o" aria-hidden="true"></i>
	        </h4>
    	@else
	    	<h4 class="text-danger">
	        	DISABLED USER <i class="fa fa-circle-o" aria-hidden="true"></i>
	        </h4>
    	@endif
    	{{ Form::model($user, array('url' => array('users', $user->id), 'method'=>'PUT'))}}
       		<div class="form-group">
                <label>personal data</label>
                {!! Form::text('first_name',null,array('id'=>'first_name','class'=>'form-control','placeholder'=>'Enter first name'))!!}
            </div>

            <div class="form-group">
            	{!! Form::text('last_name',null,array('id'=>'last_name','class'=>'form-control','placeholder'=>'Enter last name'))!!}
            </div>

            <div class="form-group">
                <label>Your Account</label>
                {!! Form::text('email',null,array('id'=>'last_name','class'=>'form-control','placeholder'=>'Enter new email'))!!}
                <p class="help-block">Note: the email address will be used for login or reset your password</p>
            </div>

            <div class="form-group">
                <label>Change your password</label>
                {!! Form::password('current_password',array('id'=>'current_password','class'=>'form-control','placeholder'=>'Current password'))!!}
            </div>
            <div class="form-group">
                {!! Form::password('password',array('id'=>'password','class'=>'form-control','placeholder'=>'New your password'))!!}
            </div>
            <div class="form-group">
                {!! Form::password('password_confirmation',array('id'=>'password_confirmation','class'=>'form-control','placeholder'=>'Confirm your password'))!!}
            </div>
            @if(Auth::user()->type=='ADMIN' && Auth::user()->id!=$user->id)
                <div class="form-group">
                    <label>Select the type of user</label>
                    {{ Form::select('type', ['DEFAULT'=>'DEFAULT','ADMIN'=>'ADMIN'], [$user->type=>$user->type],['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    <label>Select the status of the user</label>
                    {{ Form::select('status', [1=>'ENABLED',0=>'DISABLED'], [$user->status=>$user->status],['class'=>'form-control']) }}
                </div>
            @endif

            <button type="submit" class="btn btn-default">Update User</button>
        </form>
    </div>
@stop