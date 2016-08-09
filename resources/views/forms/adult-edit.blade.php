@extends('layout.main')
@section('style-page')
{{ HTML::style('assets/js/plugins/select2/select2.css') }}
@stop
@section('tittle')
    Registrar Adulto
@stop
@section('breadcrumb')
    <ol class="breadcrumb"> 
        <li>
            <i class="fa fa-dashboard"></i>  <a href="{{ url('person')}}">Personas</a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i> Adulto
        </li>
    </ol>
@stop
@section('content')
    {!! Form::model($person,array('url'=>'person/adult/'.$person->id.'/edit','method'=>'PUT','id'=>'add-person','class'=>'form-horizontal'))!!}
        @include('forms.fields')
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-default">Guardar </button>
            <button type="reset" class="btn btn-default">Volver </button>
        </div>
    {!! Form::close() !!}
@stop
@section('script-page')
    @include('forms.scripts')
@stop