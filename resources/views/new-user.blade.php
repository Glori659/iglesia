@extends('layout.main')
@section('tittle')
	Nuevo Usuario
@stop
@section('content')
    {!! Form::open(array('url'=>'users','method'=>'POST','id'=>'add-user'))!!}
	<div class=" col-sm-8 col-lg-6 col-md-6 col-md-offset-3 col-sm-offset-2">
       		<div class="form-group">
                <label>Informacion Personal</label>
                {!! Form::text('first_name',null,array('id'=>'first_name','class'=>'form-control','placeholder'=>'Ingrese Sus Nombres'))!!}
            </div>

            <div class="form-group">
            	{!! Form::text('last_name',null,array('id'=>'last_name','class'=>'form-control','placeholder'=>'Ingrese Sus Apellidos'))!!}
            </div>

            <div class="form-group">
                <label>Correo Electronico</label>
                {!! Form::text('email',null,array('id'=>'last_name','class'=>'form-control','placeholder'=>'Ingrese Su Correo Electronico'))!!}
                <p class="help-block">Nota: El correo Electronico se utilizará para iniciar la sesión o restablecer su contraseña</p>
            </div>

            <div class="form-group">
                <label>Contraseña</label>
                {!! Form::password('password',array('id'=>'password','class'=>'form-control','placeholder'=>'Ingrese Su Contraseña'))!!}
            </div>
            <div class="form-group">
                {!! Form::password('password_confirmation',array('id'=>'password_confirmation','class'=>'form-control','placeholder'=>'Confirme Su Contraseña'))!!}
            </div>

            <div class="form-group">
                <label>Seleccione el Tipo de Usuario</label>
                <select class="form-control" name="type">
                    <option value='DEFAULT'>DEFAULT</option>
                    <option value='ADMIN'>ADMIN</option>
                </select>
            </div>
            <div class="form-group">
                <label>Seleccione el Estatus del Usuario</label>
                <select class="form-control" name="status">
                    <option value="1">ENABLED</option>
                    <option value="0">DISABLED</option>
                </select>
            </div>

            <button type="submit" class="btn btn-default">Crear Usuario</button>
            <button type="reset" class="btn btn-default">Volver</button>
        {!! Form::close()!!}
    </div>
@stop