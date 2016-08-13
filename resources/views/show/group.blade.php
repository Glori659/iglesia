@extends('layout.main')
@section('style-page')
    @include('Data-Table.css')
@stop
@section('tittle')
    Información del Grupo
@stop
@section('breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="{{ url('companies')}}">Grupos</a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i> Grupo
        </li>
    </ol>
@stop
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="col-lg-6">
            <h3>
                Detalles 
                <i class="fa fa-circle-thin" aria-hidden="true"></i>
            </h3>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <td>Nombre del Grupo</td>
                            <td>{{$group->name}}</td>
                        </tr>
                        <tr>
                            <td>Tipo de Grupo </td>
                            <td>{{$group->type}}</td>
                        </tr>
                        <tr>
                            <td>Descripción</td>
                            <td>{{$group->description}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            <h3>
                Lider 
                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
            </h3>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <tbody>
                    @if(isset($group->leader))
                        <tr>
                            <td>Nombre </td>
                            <td>
                                <a href="{{ url('person',$group->leader->id)}}">
                                    {{$group->leader->name_first}} 
                                    {{$group->leader->name_last}}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Documento de Identidad </td>
                            <td>{{$group->leader->identity_document}}</td>
                        </tr>
                    @else
                        <tr>
                            <td>
                            <i class="fa fa-exclamation-triangle text-warning" aria-hidden="true"></i>
                                No Posee Lider Asignado  {!!$group->type !!}
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <h3>
        <hr>
            Personas
        <hr>
    </h3>
    <div class="dataTable_wrapper">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Cedula</th>
                    <th>Edad</th>
                    <th>Genero</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $group->person as $data)
                    <tr>
                        <td class="text-center"><a href="{{url('/person')}}/{{$data->id}}">{!!$data->id !!}</td>
                        <td>
                            {!!$data->name_first!!}
                        </td>
                        <td>
                            {!!$data->name_last!!}
                        </td>
                        <td>
                        @if($data->identity_document=='')
                            <span class="label label-warning">
                                No Posee Cedula
                            </span>
                        @else
                            {!!$data->identity_document!!}
                        @endif
                        </td>
                        <td>
                            {!!$data->age($data->date_birth)->value!!}
                            ({!!$data->age($data->date_birth)->categorie!!})
                        </td>
                        <td>
                            {!!$data->gender!!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
@section('script-page')
    @include('Data-Table.script')
@stop