@extends('layout.main')
@section('style-page')
    @include('Data-Table.css')
@stop
@section('tittle')
    Overview
@stop
@section('btn-header')
<!--<div class="btn-group pull-right" role="group" aria-label="...">
    <a href="{{ url('/person/create')}}" class="btn btn-lg  btn-info "  style="text-align: right;">
        <i class="glyphicon glyphicon-user pull-left"></i>
            Verify a person
    </a>
    <a href="{{ url('/companies/create')}}" class="btn btn-lg  btn-info "  style="text-align: right;">
        <i class="fa fa-building pull-left"></i>
            Verify a company
    </a>
    <a href="{{ url('/candidates/create')}}" class="btn btn-lg  btn-info"  style="text-align: right;">
        <i class="fa fa-search pull-left"></i>
            Create a candidate
    </a>
</div>-->
<div class="btn-group pull-right">
  <button type="button" class="btn btn-lg btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Options <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li>
        <a href="{{ url('/person/create')}}">
            <i class="glyphicon glyphicon-user"></i> 
            Verify a person
        </a>
    </li>
    <li>
        <a href="{{ url('/companies/create')}}">
            <i class="fa fa-building"></i> 
            Verify a company
        </a>
    </li>
    <li>
        <a href="{{ url('/candidates/create')}}">
            <i class="fa fa-search"></i> 
            Create a candidate
        </a>
    </li>
  </ul>
</div>
@stop
@section('breadcrumb')
@stop
@section('content')
    <div class="col-lg-12">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="history">
                <thead>
                    <tr>
                        <th>Operation</th>
                        <th>Carried out by</th>
                        <th>Executed on the date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $history as $data)
                        <tr>
                            <td>
                               Creation of {!! json_decode($data->json)->object!!} 
                               @if(isset(json_decode($data->json)->name_first))
                                    {!!json_decode($data->json)->name_first!!} 
                                    {!!json_decode($data->json)->name_last!!}
                               @endif
                               @if(isset(json_decode($data->json)->entity_name))
                                    {!!json_decode($data->json)->entity_name!!}
                               @endif
                            </td>
                            <td>{!!$data->email!!} </td>
                            <td>{!!$data->created_at!!}</td>
                        </tr>
                    @if(isset($data->edited_by))
                        @if(!empty($data->edited_by))
                        <tr>
                            <td>
                               Edition of {!! json_decode($data->json)->object!!} 
                                    {!!json_decode($data->json)->name_first!!} 
                                    {!!json_decode($data->json)->name_last!!}
                            </td>
                            <td>{!!$users->find($data->edited_by)->email!!} </td>
                            <td>{!!$data->edit_at!!}</td>
                        </tr>
                        @endif
                    @endif
                    @if(isset($data->deleted_by))
                        @if(!empty($data->deleted_by))
                        <tr>
                            <td>
                               Elimination of {!! json_decode($data->json)->object!!} 
                                    {!!json_decode($data->json)->name_first!!} 
                                    {!!json_decode($data->json)->name_last!!}
                            </td>
                            <td>{!!$users->find($data->deleted_by)->email!!} </td>
                            <td>{!!$data->updated_at!!}</td>
                        </tr>
                        @endif
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('script-page')
    @include('Data-Table.script')
    <script>
    $(document).ready(function() {
        $('#history').DataTable( {
            "responsive": true,
            "order": [ 2, "desc" ]
        } );
    });
    </script>
@stop