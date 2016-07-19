@extends('layout.main')
@section('style-page')
    @include('Data-Table.css')
@stop
@section('tittle')
    Personas
@stop
@section('btn-header')
    <div class="btn-group pull-right">
      <button type="button" class="btn btn-lg btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Registro <span class="caret"></span>
      </button>
      <ul class="dropdown-menu">
        <li>
            <a href="{{ url('/person/child')}}">
                <i class="glyphicon glyphicon-user"></i> 
                Niño
            </a>
        </li>
        <li>
            <a href="{{ url('/person/adult')}}">
                <i class="fa fa-building"></i> 
                Adulto
            </a>
        </li>
        <li>
            <a href="{{ url('/person/adult/greater')}}">
                <i class="fa fa-search"></i> 
                Adulto Mayor
            </a>
        </li>
      </ul>
    </div>
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
                        <th>Cedula</th>
                        <th>Estatus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $people as $data)
                        <tr>
                            <td class="text-center"><a href="{{url('/person')}}/{{$data->id}}">{!!$data->id !!}</td>
                            <td>
                                {!! json_decode($data->json)->name_first  !!}
                            </td>
                            <td>
                                {!! json_decode($data->json)->name_last  !!}
                            </td>
                            <td>{!!$data->created_at->diffForHumans()!!}</td>
                            <td>{!!$data->user->email!!}</td>
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