@extends('layout.main')
@section('style-page')
{{ HTML::style('assets/js/plugins/select2/select2.css') }}
@stop
@section('tittle')
    Crear un nuevo Grupo
@stop
@section('breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="{{ url('group')}}">Grupos</a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i> Nuevo Grupo
        </li>
    </ol>
@stop
@section('content')
    {!! Form::open(array('url'=>'group','method'=>'POST','id'=>'add-person'))!!}
        <div class=" col-sm-8 col-lg-6 col-md-6 col-md-offset-3 col-sm-offset-2">
            <div class="form-group">
                <label>Nombre del Grupo <span class="text-danger">*</span></label>
                {!! Form::text('name',null,array('id'=>'first_name','class'=>'form-control','placeholder'=>'Ingrese el nombre del grupo'))!!}
            </div>
            <div class="form-group">
                <label>Tipo de Grupo</label>
                    {!!Form::select('type',[
                        null=>null,
                        "Nucleo"=>"Nucleo",
						"Departamento"=>"Departamento",]
                        ,null,array(
                        'id'=>'document_type',
                        'class'=>'form-control',
                        'data-placeholder'=>'Nacionalidad'
                        ,'style'=>'width: 100%;'))
                    !!}
            </div>
            <div class="form-group">
                <label>Lider del Grupo <span class="text-danger">*</span></label>
                 {!!Form::select('person_id',
                        $leaders
                        ,null,array(
                        'id'=>'document_type',
                        'class'=>'select-select2',
                        'data-placeholder'=>'Nacionalidad'
                        ,'style'=>'width: 100%;'))
                    !!}
            </div>
            <div class="form-group">
                <label>Descripción</label>
                {!! Form::textarea('description',null,array('class'=>'form-control','rows'=>4))!!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-default">Submit </button>
            <button type="reset" class="btn btn-default">Reset </button>
        </div>
    {!! Form::close() !!}
@stop
@section('script-page')
    {{ HTML::script('assets/js/plugins/select2/select2.js') }}
    <script type="text/javascript">
    $(".select-select2").select2();
    $(document).ready(function() {
        $('#incorporation_date').datepicker({
            autoclose: true
        });
    });
    </script>
@stop