@extends('layout.main')
@section('tittle')
    Información del {{ $age->categorie }}
@stop
@section('btn-header')
@if($age->categorie=='Adulto' || $age->categorie=='Adulto Mayor' )
    <?php $url_edit='person/adult/'; ?>
@endif
@if($age->categorie=='Niño')
    <?php $url_edit='person/child/'; ?>
@endif
    <a href="{{url($url_edit)}}/{{$person->id}}/edit" class="btn btn-lg  btn-info pull-right"  style="text-align: right;">
        <i class="fa fa-pencil pull-left"></i>
        Editar
    </a>
@stop
@section('breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="{{ url('person')}}">Personas</a>
        </li>
        <li class="active">
            <i class="fa fa-eye"></i> Persona
        </li>
    </ol>
@stop
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="col-lg-6">
            <h3>
                Datos Personales 
                <i class="fa fa-circle" aria-hidden="true"></i>
            </h3>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <td>Nombres</td>
                            <td>{{$person->name_first}}</td>
                        </tr>
                        <tr>
                            <td>Apellido</td>
                            <td>{{$person->name_last}}</td>
                        </tr>
                        <tr>
                            <td>Nacionalidad</td>
                            <td>{{$person->nationality}}</td>
                        </tr>
                        <tr>
                            <td>Numero de documento o Cedula</td>
                            <td>{{$person->identity_document}}</td>
                        </tr>
                        <tr>
                            <td>Fecha de Nacimiento</td>
                            <td>{{$person->date_birth}}</td>
                        </tr>
                        <tr>
                            <td>Edad </td>
                            <td>{{$age->value}} años</td>
                        </tr>
                        <tr>
                            <td>Genero</td>
                            <td>{{$person->gender}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @if(isset($person->baptism))
            <h3>
                Bautizo
                <i class="fa fa-calendar-o" aria-hidden="true"></i>
            </h3>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <td>Bautizado:</td>
                            <td>{{ $person->baptism->status }}</td>
                        </tr>
                        <tr>
                            <td>Fecha de Bautizo:</td>
                            <td>{{ $person->baptism->date_baptisms }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endif
            <h3>
                Nucleos a los que pertenece
                <i class="fa fa-bullseye" aria-hidden="true"></i>
            </h3>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <tbody>
                    @foreach($person->core as $core)
                        <tr>
                            <td>Nucleo:</td>
                            <td>{{$core->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if($person->address->isEmpty())
            </div>
            <div class="col-lg-6">
            <h3>
                Representate
                <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
            </h3>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <td>Nombre:</td>
                            <td>
                                <a href="{{ url('person',
                                $person->chield->representative->id)}}">
                                    {{$person
                                    ->chield
                                    ->representative
                                    ->name_first}} 
                                    {{$person
                                    ->chield
                                    ->representative
                                    ->name_last}}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Cedula:</td>
                            <td>
                                {{$person
                                ->chield
                                ->representative
                                ->identity_document}}
                            </td>
                        </tr>
                        <tr>
                            <td>Parentesco:</td>
                            <td>
                                {!!$person
                                ->chield
                                ->relationship(
                                    $person->chield->type_relationship,
                                    $person->chield->representative
                                    ->gender
                                )!!}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endif
            <h3>
                Información Adicional
                <i class="fa fa-plus" aria-hidden="true"></i>
            </h3>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <td>observaciones</td>
                            <td>{{$person->observations}}</td>
                        </tr>
                        <tr>
                            <td>Cualidades</td>
                            <td>{{$person->qualities}}</td>
                        </tr>
                        <tr>
                            <td>Actividades que desea realizar</td>
                            <td>{{$person->question}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @if($person->address->isEmpty())
            </div>
            @endif
        @if(!$person->address->isEmpty())
        </div>
        <div class="col-lg-6">
            <h3>
                Datos de Contacto
                <i class="fa fa-globe" aria-hidden="true"></i>
            </h3>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <tbody>
                    @foreach($person->phone as $phone)
                        <tr>
                            <td>Number de {{$phone->type}}</td>
                            <td>{{$phone->number}}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td>Email:</td>
                            <td>{{$person->email}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h3>
                Direcciónes
                <i class="fa fa-map-marker" aria-hidden="true"></i>
            </h3>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <tbody>
                    @foreach($person->address as $address)
                        <tr>
                            <td>Pais</td>
                            <td>{{$address->city->state->country->country}}</td>
                        </tr>
                        <tr>
                            <td>Estado</td>
                            <td>{{$address->city->state->state}}</td>
                        </tr>
                        <tr>
                            <td>Ciudad</td>
                            <td>{{$address->city->city}}</td>
                        </tr>
                        <tr>
                            <td>Municipio</td>
                            <td>{{$address->parish->municipality->municipality}}</td>
                        </tr>
                        <tr>
                            <td>Parroquia</td>
                            <td>{{$address->parish->parish}}</td>
                        </tr>
                        <tr>
                            <td>Direccion de {{$address->type_address}}</td>
                            <td>{{$address->address}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <h3>
                Profesiones
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
            </h3>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <tbody>
                    @foreach($person->profession as $profession)
                        <tr>
                            <td>{{$profession->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</div>
@stop