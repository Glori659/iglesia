@extends('layout.main')
@section('tittle')
    Information on the person
@stop
@section('breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="{{ url('person')}}">People</a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i> Person
        </li>
    </ol>
@stop
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="col-lg-6">
            <h3>
                Results 
                <i class="fa fa-circle-thin" aria-hidden="true"></i>
            </h3>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <td>Status</td>
                            <td>{{$person->status}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{$person->details->address}}</td>
                        </tr>
                        <tr>
                            <td>Document</td>
                            <td>{{$person->details->identification}}</td>
                        </tr>
                        <tr>
                            <td>Date of birth</td>
                            <td>{{$person->details->date_of_birth}}</td>
                        </tr>
                        <tr>
                            <td>OFAC</td>
                            <td>{{$person->details->ofac}}</td>
                        </tr>
                        <tr>
                            <td>PEP</td>
                            <td>{{$person->details->pep}}</td>
                        </tr>
                        <tr>
                            <td>Address risk</td>
                            <td>{{$person->details->address_risk}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            <h3>
                Location 
                <i class="fa fa-map-marker" aria-hidden="true"></i>
            </h3>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <td>Address line 1</td>
                            <td>{{$person->address_street1}}</td>
                        </tr>
                        <tr>
                            <td>Address line 2</td>
                            <td>{{$person->address_street2}}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{$person->address_city}}</td>
                        </tr>
                        <tr>
                            <td>Subdivision</td>
                            <td>{{$person->address_subdivision}}</td>
                        </tr>
                        <tr>
                            <td>Postal code</td>
                            <td>{{$person->address_postal_code}}</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>{{$person->address_country_code}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h3>
                Identification 
                <i class="fa fa-circle" aria-hidden="true"></i>
            </h3>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <td>First name</td>
                            <td>{{$person->name_first}}</td>
                        </tr>
                        <tr>
                            <td>Middle name</td>
                            <td>{{$person->name_middle}}</td>
                        </tr>
                        <tr>
                            <td>Last name</td>
                            <td>{{$person->name_last}}</td>
                        </tr>
                        <tr>
                            <td>Day of birth</td>
                            <td>{{$person->birth_day}}</td>
                        </tr>
                        <tr>
                            <td>Month of birth</td>
                            <td>{{$person->birth_month}}</td>
                        </tr>
                        <tr>
                            <td>Year of birth</td>
                            <td>{{$person->birth_year}}</td>
                        </tr>
                        <tr>
                            <td>Document</td>
                            <td>{{$person->document_type}}: {{$person->document_value}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            <h3>
                Additional Data 
                <i class="fa fa-plus" aria-hidden="true"></i>
            </h3>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <td>Phone number</td>
                            <td>{{$person->phone_number}}</td>
                        </tr>
                        <tr>
                            <td>IP address</td>
                            <td>{{$person->ip_address}}</td>
                        </tr>
                        <tr>
                            <td>Note</td>
                            <td>{{$person->note}}</td>
                        </tr>
                        <tr>
                            <td>Created on</td>
                            <td>{{$data->created_at->diffForHumans()}}({{$data->created_at}})</td>
                        </tr>
                        <tr>
                            <td>Created by</td>
                            <td>{{$data->user->email}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop