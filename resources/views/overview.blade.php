@extends('layout.main')
@section('style-page')
    @include('Data-Table.css')
@stop
@section('btn-header')
@stop
@section('breadcrumb')
@stop
@section('content')
    <div class="col-lg-12">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="history">
                <thead>
                    <tr>
                        <th>Operación</th>
                        <th>Llevado a cabo por</th>
                        <th>Ejecutado en la fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $history as $data)
                        <tr>
                            <td>
                               Creación de  
                               @if(isset($data->name_first))
                                    {!!$data->name_first!!} 
                                    {!!$data->name_last!!}
                               @endif
                               @if(isset($data->entity_name))
                                    {!!$data->entity_name!!}
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