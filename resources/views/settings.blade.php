@extends('layout.main')
@section('tittle')
	Configuracion de Usuario
@stop
@section('content')
    <div class="col-lg-4 text-center">
			<i class="glyphicon glyphicon-user fa-5x"></i>
            <h3>{{$user->first_name}} {{$user->last_name}}
                <small>{{$user->type}}</small>
            </h3>
            <p>
            	Aquí se pueden Modificar las Configuraciones de Usuario.
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
                <label>Informacion Personal</label>
                {!! Form::text('first_name',null,array('id'=>'first_name','class'=>'form-control','placeholder'=>'Ingrese Su Nombre'))!!}
            </div>

            <div class="form-group">
            	{!! Form::text('last_name',null,array('id'=>'last_name','class'=>'form-control','placeholder'=>'Ingrese Su Apellido'))!!}
            </div>

            <div class="form-group">
                <label>Cuenta</label>
                {!! Form::text('email',null,array('id'=>'last_name','class'=>'form-control','placeholder'=>'Ingrese Su Correo Electronico'))!!}
                <p class="help-block">Nota: El correo Electronico se utilizará para iniciar la sesión o restablecer su contraseña</p>
            </div>

            <div class="form-group">
                <label>Cambiar su Contraseña</label>
                {!! Form::password('current_password',array('id'=>'current_password','class'=>'form-control','placeholder'=>'Contraseña Actual'))!!}
            </div>
            <div class="form-group">
                {!! Form::password('password',array('id'=>'password','class'=>'form-control','placeholder'=>'Ingrese su Nueva Contraseña'))!!}
            </div>
            <div class="form-group">
                {!! Form::password('password_confirmation',array('id'=>'password_confirmation','class'=>'form-control','placeholder'=>'Confirme su Nueva Contraseña'))!!}
            </div>
            @if(Auth::user()->type=='ADMIN' && Auth::user()->id!=$user->id)
                <div class="form-group">
                    <label>Seleccione el Tipo de Usuario</label>
                    {{ Form::select('type', ['DEFAULT'=>'DEFAULT','ADMIN'=>'ADMIN'], [$user->type=>$user->type],['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    <label>Seleccione el Estatus del Usuario</label>
                    {{ Form::select('status', [1=>'ENABLED',0=>'DISABLED'], [$user->status=>$user->status],['class'=>'form-control']) }}
                </div>
            @endif

            <button type="submit" class="btn btn-default">Guardar Cambios</button>
        </form>
    </div>
@stop