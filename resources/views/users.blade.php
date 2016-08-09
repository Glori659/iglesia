@extends('layout.main')
@section('style-page')
    @include('Data-Table.css')
@stop
@section('tittle')
    Lista de Usuarios
    <small class='pull-right'>
        <a href="{{ url('users/create') }}" class="btn btn-lg  btn-info">
            Crear un Usuario 
        </a> 
    </small>                               
@stop
@section('content')
<div class="col-lg-12">
    <div class="dataTable_wrapper">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Tipo</th>
                    <th>Estatus</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $users as $user)
                    <tr>
                        <td class="text-center"><a href="{{url('users')}}/{{$user->id}}">{{$user->id}}</td>
                        <td>
                            {{ $user->first_name }}
                        </td>
                        <td>
                            {{ $user->last_name }}
                        </td>
                        <td>{{ $user->email}}</td>
                        <td>{{ $user->type}}</td>
                        <td>
                            @if($user->status==1)
                                <span class="label label-success">
                                    ENABLED
                                </span>
                            @else
                                <span class="label label-danger">
                                    DISABLED
                                <span>
                            @endif
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