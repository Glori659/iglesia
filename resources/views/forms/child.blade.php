@extends('layout.main')
@section('tittle')
    Registrar Niño
@stop
@section('breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="{{ url('person')}}">People</a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i> Person
        </li>
    </ol>
@stop
@section('content')
    {!! Form::open(array('url'=>'person','method'=>'POST','id'=>'add-person'))!!}
        <div class=" col-sm-8 col-lg-6 col-md-6 col-md-offset-3 col-sm-offset-2">
            <div class="form-group">
                <label>Nucleo <span class="text-danger">*</span></label>
                <select name=" address_country_code" id="person_address_country_code" class="form-control">
                    <option value="US">United States of America</option>
                    <option value="CA">Canada</option>
                    <option value="GB">United Kingdom</option>
                    <option disabled="disabled" value="---------------">---------------</option>
                    <option value="AF">Afghanistan</option>
                    <option value="ZW">Zimbabwe</option>
                </select>
            </div>
            <div class="form-group">
                <label>Seleccione Representante <span class="text-danger">*</span></label>
                <select name=" address_country_code" id="person_address_country_code" class="form-control">
                    <option value="US">United States of America</option>
                    <option value="CA">Canada</option>
                    <option value="GB">United Kingdom</option>
                    <option disabled="disabled" value="---------------">---------------</option>
                    <option value="AF">Afghanistan</option>
                    <option value="ZW">Zimbabwe</option>
                </select>
            </div>
            <div class="form-group">
                <label>Nombres <span class="text-danger">*</span></label>
                {!! Form::text('name_first',null,array('id'=>'first_name','class'=>'form-control','placeholder'=>'Enter first name'))!!}
            </div>
            <div class="form-group">
                <label>Apellidos <span class="text-danger">*</span></label>
                {!! Form::text('name_last',null,array('id'=>'last_name','class'=>'form-control','placeholder'=>'Enter last name'))!!}
            </div>
            <div class="form-group">
                <label>Fecha de Nacimiento <span class="text-danger">*</span></label>
                {!! Form::text('date_birth',null,array('id'=>'date_birth','class'=>'form-control','placeholder'=>'Enter date of birth'))!!}
            </div>
            <div class="form-group">
                <label>Sexo <span class="text-danger">*</span></label>
                <select name=" address_country_code" id="person_address_country_code" class="form-control">
                    <option value="Femenino">Femenino</option>
                    <option value="Masculiono">Masculino</option>
                </select>
            </div>
            <div class="form-group">
                <label>Estado <span class="text-danger">*</span></label>
                <select name=" address_country_code" id="person_address_country_code" class="form-control">
                    <option value="US">United States of America</option>
                    <option value="CA">Canada</option>
                    <option value="GB">United Kingdom</option>
                    <option disabled="disabled" value="---------------">---------------</option>
                    <option value="AF">Afghanistan</option>
                    <option value="ZW">Zimbabwe</option>
                </select>
            </div>
            <div class="form-group">
                <label>Municipio <span class="text-danger">*</span></label>
                <select name=" address_country_code" id="person_address_country_code" class="form-control">
                    <option value="US">United States of America</option>
                    <option value="CA">Canada</option>
                    <option value="GB">United Kingdom</option>
                    <option disabled="disabled" value="---------------">---------------</option>
                    <option value="AF">Afghanistan</option>
                    <option value="ZW">Zimbabwe</option>
                </select>
            </div>
            <div class="form-group">
                <label>Parroquia<span class="text-danger">*</span></label>
                <select name=" address_country_code" id="person_address_country_code" class="form-control">
                    <option value="US">United States of America</option>
                    <option value="CA">Canada</option>
                    <option value="GB">United Kingdom</option>
                    <option disabled="disabled" value="---------------">---------------</option>
                    <option value="AF">Afghanistan</option>
                    <option value="ZW">Zimbabwe</option>
                </select>
            </div>
            <div class="form-group">
                <label>Direccion <span class="text-danger">*</span></label>
                {!! Form::text('address_street1',null,array('id'=>'address_street1','class'=>'form-control','placeholder'=>'Ingrese la Dirección'))!!}
            </div>
            <div class='form-group'>
                <label>Documento de Identidad <span class="text-danger">*</span></label>
                <div class='input-group col-md-12'>
                    {!!Form::select('nacionalidad',[
                        null=>null,
                        "Extranjero"    =>  "Extranjero",
                        "Venezolano"    =>  "Venezolano",
                        ]
                        ,null,array(
                        'id'=>'document_type',
                        'class'=>'form-control',
                        'placeholder'=>'Nacionalidad'
                        ,'style'=>'width: 100%;'))
                    !!}
                    <span class="input-group-btn" style="width: 0%;">
                    </span>
                    {!! Form::text('document_value',null,array('id'=>'document_value','class'=>'form-control','placeholder'=>'Ingrese su numero','for'=>'document_value'))!!}
                </div>
            </div>
            <div class="form-group">
                <label>Observaciones</label>
                <textarea name="note" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label>¿En qué le gustaría participar en la iglesia?</label>
                <textarea name="note" class="form-control" rows="3"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-default">Submit </button>
            <button type="reset" class="btn btn-default">Reset </button>
        </div>
    {!! Form::close() !!}
@stop
@section('script-page')
    <script type="text/javascript">
    $(document).ready(function() {
        $('#date_birth').datepicker({
            autoclose: true
        });
    });
    </script>
@stop