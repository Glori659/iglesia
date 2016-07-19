@extends('layout.main')
@section('tittle')
    Information on the company
@stop
@section('breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="{{ url('companies')}}">Companies</a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i> Company
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
                            <td>{{$company->status}}</td>
                        </tr>
                        <tr>
                            <td>Legal name</td>
                            <td>{{$company->details->entity_name}}</td>
                        </tr>
                        <tr>
                            <td>Tax ID</td>
                            <td>{{$company->details->tax_id}}</td>
                        </tr>
                        <tr>
                            <td>Incorporation date</td>
                            <td>{{$company->details->incorp_date}}</td>
                        </tr>
                        <tr>
                            <td>OFAC</td>
                            <td>{{$company->details->ofac}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{$company->details->address}}</td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td>{{$company->details->state}}</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>{{$company->details->country_code}}</td>
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
                            <td>{{$company->address_street1}}</td>
                        </tr>
                        <tr>
                            <td>Address line 2</td>
                            <td>{{$company->address_street2}}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{$company->address_city}}</td>
                        </tr>
                        <tr>
                            <td>Subdivision</td>
                            <td>{{$company->address_subdivision}}</td>
                        </tr>
                        <tr>
                            <td>Postal code</td>
                            <td>{{$company->address_postal_code}}</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>{{$company->address_country_code}}</td>
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
                            <td>Entity name</td>
                            <td>{{$company->entity_name}}</td>
                        </tr>
                        <tr>
                            <td>Tax ID</td>
                            <td>{{$company->tax_id}}</td>
                        </tr>
                        <tr>
                            <td>Also know as</td>
                            <td>{{$company->dbas}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h3>
                Incorporation
                <i class="fa fa-check" aria-hidden="true"></i>
            </h3>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <td>Day </td>
                            <td>{{$company->incorporation_day}}</td>
                        </tr>
                        <tr>
                            <td>Month </td>
                            <td>{{$company->incorporation_month}}</td>
                        </tr>
                        <tr>
                            <td>Year </td>
                            <td>{{$company->incorporation_year}}</td>
                        </tr>
                        <tr>
                            <td>Ownership type</td>
                            <td>{{$company->incorporation_type}}</td>
                        </tr>
                        <tr>
                            <td>State </td>
                            <td>{{$company->incorporation_state}}</td>
                        </tr>
                        <tr>
                            <td>Country </td>
                            <td>{{$company->incorporation_country_code}}</td>
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
                            <td>Email </td>
                            <td>{{$company->email}}</td>
                        </tr>
                        <tr>
                            <td>URL </td>
                            <td>{{$company->url}}</td>
                        </tr>
                        <tr>
                            <td>IP address</td>
                            <td>{{$company->ip_address}}</td>
                        </tr>
                        <tr>
                            <td>Phone number</td>
                            <td>{{$company->phone_number}}</td>
                        </tr>
                        <tr>
                            <td>Note</td>
                            <td>{{$company->note}}</td>
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