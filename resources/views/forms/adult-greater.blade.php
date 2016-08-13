@extends('layout.main')
@section('style-page')
{{ HTML::style('assets/js/plugins/select2/select2.css') }}
@stop
@section('tittle')
    Registrar Adulto Mayor
@stop
@section('breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="{{ url('person')}}">Personas</a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i> Adulto Mayor
        </li>
    </ol>
@stop
@section('content')
    {!! Form::open(array('url'=>'person/adult/greater','method'=>'POST','id'=>'add-person'))!!}
        @include('forms.fields')
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-default">Guardar </button>
            <a href="{{url('person') }}" type="reset" class="btn btn-default">Volver </a>
        </div>
    {!! Form::close() !!}
@stop
@section('script-page')
    @include('forms.scripts')
@stop