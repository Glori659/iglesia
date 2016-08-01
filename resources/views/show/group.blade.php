@extends('layout.main')
@section('tittle')
    Información del grupo
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
                            <td>Cedula </td>
                            <td>{{$group->leader->identity_document}}</td>
                        </tr>
                    @else
                        <tr>
                            <td>
                            <i class="fa fa-exclamation-triangle text-warning" aria-hidden="true"></i>
                                No pose lider asignado este {!!$group->type !!}
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop