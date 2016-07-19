@extends('layout.main')
@section('style-page')
    @include('Data-Table.css')
@stop
@section('tittle')
    Candidates
@stop
@section('btn-header')
    <a href="{{ url('/candidates/create')}}" class="btn btn-lg  btn-info pull-right"  style="text-align: right;">
        <i class="fa fa-search pull-left"></i>
        Create a candidate
    </a>
@stop
@section('content')
    <div class="col-lg-12">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Created on</th>
                        <th>Created by</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach ( $candidate as $data)
                        <tr
                            @if(isset(json_decode($data->json)->deleted))
                                @if(json_decode($data->json)->deleted==true)
                                    class="danger"
                                @endif
                            @endif
                        >
                            <td class="text-center"><a href="{{url('/candidates')}}/{{$data->id}}">{!!$data->id !!}</td>
                            <td>
                                {!! json_decode($data->json)->name_first  !!}
                            </td>
                            <td>
                                {!! json_decode($data->json)->name_last  !!}
                            </td>
                            <td>{!!$data->created_at->diffForHumans()!!}</td>
                            <td>{!!$data->user->email!!}</td>
                            <td class="text-center">
                            @if(isset(json_decode($data->json)->deleted))
                                @if(json_decode($data->json)->deleted==true)
                                
                                @endif
                                @else
                                {{ Form::open(array('url' => 'candidates/' . $data->id)) }}
                                    <div class="btn-group" role="group" aria-label="...">
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        <a href="{{url('/candidates')}}/{{$data->id}}/edit" type="button" class="btn btn-default">
                                            <i class="fa fa-pencil"></i> 
                                            Edit
                                        </a>
                                        <button type="submit" class="btn btn-default">
                                            <i class="fa fa-trash"></i> 
                                            Delete
                                        </button>
                                    </div>                                
                                {{ Form::close() }}
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