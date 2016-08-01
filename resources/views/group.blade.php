@extends('layout.main')
@section('style-page')
    @include('Data-Table.css')
@stop
@section('tittle')
    Grupos
@stop
@section('btn-header')
    <a href="{{ url('/group/create')}}" class="btn btn-lg  btn-info pull-right"  style="text-align: right;">
        <i class="fa fa-plus pull-left" aria-hidden="true"></i>  
        Crear
    </a>
@stop
@section('content')
    <div class="col-lg-12">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de Grupo</th>
                        <th>Tipo</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $groups as $data)
                        <tr>
                            <td class="text-center"><a href="{{url('/group')}}/{{$data->id}}">{!!$data->id !!}</td>
                            <td>
                                {!!$data->name !!}
                            </td>
                            <td>
                                {!!$data->type !!}
                            </td>
                            <td>
                                {{ Form::open(array('url' => 'group/'.$data->id)) }}
                                    <div class="btn-group" role="group" aria-label="...">
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        <a href="{{url('group/')}}/{{$data->id}}/edit" type="button" class="btn btn-default">
                                            <i class="fa fa-pencil"></i> 
                                            Edit
                                        </a>
                                        <button type="submit" class="btn btn-default">
                                            <i class="fa fa-trash"></i> 
                                            Delete
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