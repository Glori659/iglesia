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
                <i class="fa fa-child fa-lg"></i> 
                Niño
            </a>
        </li>
        <li>
            <a href="{{ url('/person/adult')}}">
                <i class="glyphicon glyphicon-user"></i> 
                Adulto
            </a>
        </li>
        <li>
            <a href="{{ url('/person/adult/greater')}}">
                <i class="glyphicon glyphicon-user"></i> 
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
                        <th>Edad</th>
                        <th>Genero</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $people as $data)
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
                                ({!!$categorie=$data->age($data->date_birth)->categorie!!})
                            </td>
                            <td>
                                {!!$data->gender!!}
                            </td>
                            <td class="text-center">
                                {{ Form::model($data,['route' => ['person.destroy',$data->id]]) }}
                                    <div class="btn-group" role="group" aria-label="...">
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        @if($categorie=='Adulto'||$categorie=='Adulto Mayor')
                                            <a href="{{url('person/adult/')}}/{{$data->id}}/edit" type="button" class="btn btn-default">
                                                <i class="fa fa-pencil"></i> 
                                                Editar
                                            </a>
                                        @endif
                                        @if($categorie=='Niño')
                                            <a href="{{url('person/child/')}}/{{$data->id}}/edit" type="button" class="btn btn-default">
                                                <i class="fa fa-pencil"></i> 
                                                Editar
                                            </a>
                                        @endif
                                        <button type="submit" class="btn btn-default">
                                            <i class="fa fa-trash"></i> 
                                            Borrar
                                        </button>
                                    </div>                                
                                {{ Form::close() }}
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