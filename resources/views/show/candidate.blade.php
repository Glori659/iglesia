@extends('layout.main')
@section('tittle')
    Informacion de la Persona
@stop
@section('breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="{{ url('candidates')}}">Candidates</a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i> Persona
        </li>
    </ol>
@stop
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="col-lg-6">
            <h3>
                Informacion de la Persona
                <i class="fa fa-circle-thin" aria-hidden="true"></i>
            </h3>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <td>Nombres</td>
                            <td>{{$candidate->name_first}}</td>
                        </tr>
                        <tr>
                            <td>Apellidos</td>
                            <td>{{$candidate->name_last}}</td>
                        </tr>
                        <tr>
                            <td>Fecha de Cumpleaños</td>
                            <td>{{$candidate->date_of_birth}}</td>
                        </tr>
                        <tr>
                            <td>SSN</td>
                            <td>{{$candidate->ssn}}</td>
                        </tr>
                        <tr>
                            <td>Passport</td>
                            <td>{{$candidate->passport}}</td>
                        </tr>
                        <tr>
                            <td>Direccion Linea 1</td>
                            <td>{{$candidate->address_street1}}</td>
                        </tr>
                        <tr>
                            <td>Direccion Linea 2</td>
                            <td>{{$candidate->address_street2}}</td>
                        </tr>
                        <tr>
                            <td>Ciudad</td>
                            <td>{{$candidate->address_city}}</td>
                        </tr>
                        <tr>
                            <td>Subdivision</td>
                            <td>{{$candidate->address_subdivision}}</td>
                        </tr>
                        <tr>
                            <td>Codigo Postal</td>
                            <td>{{$candidate->address_postal_code}}</td>
                        </tr>
                        <tr>
                            <td>Pais</td>
                            <td>{{$candidate->address_country_code}}</td>
                        </tr>
                        <tr>
                            <td>Observaciones</td>
                            <td>{{$candidate->note}}</td>
                        </tr>
                        <tr>
                            <td>Created on</td>
                            <td>{{$data->created_at->diffForHumans()}}({{$data->created_at}})</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop