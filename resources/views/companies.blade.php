@extends('layout.main')
@section('style-page')
    @include('Data-Table.css')
@stop
@section('tittle')
    Companies
@stop
@section('btn-header')
    <a href="{{ url('/companies/create')}}" class="btn btn-lg  btn-info pull-right"  style="text-align: right;">
        <i class="fa fa-building pull-left" aria-hidden="true"></i>  
        Verify a company
    </a>
@stop
@section('content')
    <div class="col-lg-12">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Entity name</th>
                        <th>Tax ID</th>
                        <th>Created on</th>
                        <th>Created by</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $companies as $data)
                        <tr>
                            <td class="text-center"><a href="{{url('/companies')}}/{{$data->id}}">{!!$data->id !!}</td>
                            <td>
                                {!! json_decode($data->json)->entity_name  !!}
                            </td>
                            <td>
                                {!! json_decode($data->json)->tax_id  !!}
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