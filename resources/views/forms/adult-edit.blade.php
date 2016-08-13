@extends('layout.main')
@section('style-page')
{{ HTML::style('assets/js/plugins/select2/select2.css') }}
@stop
@section('tittle')
    Editar {{ $person->age($person->date_birth)->categorie }}
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
@if($person->age($person->date_birth)->categorie=='Adulto Mayor')
    {!! Form::model($person,array('url'=>'person/adult/greater/'.$person->id.'/edit','method'=>'PUT','id'=>'add-person','class'=>'form-horizontal'))!!}
@endif
@if($person->age($person->date_birth)->categorie=='Adulto')
    {!! Form::model($person,array('url'=>'person/adult/'.$person->id.'/edit','method'=>'PUT','id'=>'add-person','class'=>'form-horizontal'))!!}
@endif
@if($person->age($person->date_birth)->categorie=='Niño')
    {!! Form::model($person,array('url'=>'person/child/'.$person->id.'/edit','method'=>'PUT','id'=>'add-person','class'=>'form-horizontal'))!!}
@endif
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