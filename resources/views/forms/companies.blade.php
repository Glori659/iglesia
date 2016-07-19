@extends('layout.main')
@section('tittle')
    Create a new company
@stop
@section('breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="{{ url('companies')}}">Companies</a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i> companie
        </li>
    </ol>
@stop
@section('content')
    {!! Form::open(array('url'=>'companies','method'=>'POST','id'=>'add-person'))!!}
        <div class=" col-sm-8 col-lg-6 col-md-6 col-md-offset-3 col-sm-offset-2">
            <div class="form-group">
                <label>Campany name <span class="text-danger">*</span></label>
                {!! Form::text('entity_name',null,array('id'=>'first_name','class'=>'form-control','placeholder'=>'Enter first name'))!!}
            </div>

            <div class="form-group">
                <label>Select state</label>
                 {!!Form::select('incorporation_state',[
                        null=>null,
                        "AL"=>"Alabama",
						"AK"=>"Alaska",
						"AZ"=>"Arizona",
						"AR"=>"Arkansas",
						"CA"=>"California",
						"CO"=>"Colorado",
						"CT"=>"Connecticut",
						"DE"=>"Delaware",
						"DC"=>"District of Columbia",
						"FL"=>"Florida",
						"GA"=>"Georgia",
						"HI"=>"Hawaii",
						"ID"=>"Idaho",
						"IL"=>"Illinois",
						"IN"=>"Indiana",
						"IA"=>"Iowa",
						"KS"=>"Kansas",
						"KY"=>"Kentucky",
						"LA"=>"Louisiana",
						"ME"=>"Maine",
						"MD"=>"Maryland",
						"MA"=>"Massachusetts",
						"MI"=>"Michigan",
						"MN"=>"Minnesota",
						"MS"=>"Mississippi",
						"MO"=>"Missouri",
						"MT"=>"Montana",
						"NE"=>"Nebraska",
						"NV"=>"Nevada",
						"NH"=>"New Hampshire",
						"NJ"=>"New Jersey",
						"NM"=>"New Mexico",
						"NY"=>"New York",
						"NC"=>"North Carolina",
						"ND"=>"North Dakota",
						"OH"=>"Ohio",
						"OK"=>"Oklahoma",
						"OR"=>"Oregon",
						"PA"=>"Pennsylvania",
						"PR"=>"Puerto Rico",
						"RI"=>"Rhode Island",
						"SC"=>"South Carolina",
						"SD"=>"South Dakota",
						"TN"=>"Tennessee",
						"TX"=>"Texas",
						"UT"=>"Utah",
						"VT"=>"Vermont",
						"VA"=>"Virginia",
						"WA"=>"Washington",
						"WV"=>"West Virginia",
						"WI"=>"Wisconsin",
						"WY"=>"Wyoming",]
                        ,null,array(
                        'id'=>'document_type',
                        'class'=>'form-control',
                        'data-placeholder'=>'Nacionalidad'
                        ,'style'=>'width: 100%;'))
                    !!}
            </div>
            <div class="form-group">
                <label>Select an incorporation type <span class="text-danger">*</span></label>
                 {!!Form::select('incorporation_type',[
                        null=>null,
                        "corporation"	=>"Corporation",
						"llc"			=>"Limited liability company",
						"partnership"	=>"Partnership",
						"sp"			=>"Sole proprietorship",
						"other"			=>"Other"]
                        ,null,array(
                        'id'=>'document_type',
                        'class'=>'form-control',
                        'data-placeholder'=>'Nacionalidad'
                        ,'style'=>'width: 100%;'))
                    !!}
            </div>
            <div class="form-group">
                <label>Street <span class="text-danger">*</span></label>
                {!! Form::text('address_street1',null,array('id'=>'address_street1','class'=>'form-control','placeholder'=>'Enter street'))!!}
            </div>
            <div class="form-group">
                <label>Street cont'd </label>
                {!! Form::text('address_street2',null,array('id'=>'address_street2','class'=>'form-control','placeholder'=>"Enter street cont'd"))!!}
            </div>
            <div class="form-group">
                <label>Postal code <span class="text-danger">*</span></label>
                {!! Form::text('address_postal_code',null,array('id'=>'address_postal_code','class'=>'form-control','placeholder'=>"Enter the postal code"))!!}
            </div>
            <div class="form-group">
                <label>City <span class="text-danger">*</span></label>
                {!! Form::text('address_city',null,array('id'=>'address_city','class'=>'form-control','placeholder'=>"Enter city"))!!}
            </div>
            <div class="form-group">
                <label>State <span class="text-danger">*</span></label>
                {!! Form::text('address_subdivision',null,array('id'=>'address_subdivision','class'=>'form-control','placeholder'=>"Enter state"))!!}
            </div>
            <div class='form-group'>
                <label>Tax ID <span class="text-danger">*</span></label>          
                    {!! Form::text('tax_id',null,array('id'=>'tax_id','class'=>'form-control','placeholder'=>'Enter Tax ID','for'=>'tax_id'))!!}
            </div>
            <div class="form-group">
                <label>DBAs</label>
                {!! Form::text('dbas',null,array('id'=>'dbas','class'=>'form-control','placeholder'=>""))!!}
            </div>
            <div class="form-group">
                <label>Registration number</label>
                {!! Form::text(' registration_number ',null,array('id'=>' registration_number ','class'=>'form-control','placeholder'=>""))!!}
            </div>
            <div class="form-group">
                <label>Email address</label>
                {!! Form::text('email',null,array('id'=>'email','class'=>'form-control','placeholder'=>""))!!}
            </div>
            <div class="form-group">
                <label>URL</label>
                {!! Form::text('url',null,array('id'=>'url','class'=>'form-control','placeholder'=>""))!!}
            </div>
            <div class="form-group">
                <label>Phone</label>
                {!! Form::text('phone_number',null,array('id'=>'phone_number','class'=>'form-control','placeholder'=>""))!!}
            </div>
            <div class="form-group">
                <label>IP address</label>
                {!! Form::text('ip_address',null,array('id'=>'ip_address','class'=>'form-control','placeholder'=>"Enter IP address"))!!}
            </div>
            <div class="form-group">
                <label>Note</label>
                <textarea name="note" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label>Incorporation date</label>
                {!! Form::text('incorporation_date',null,array('id'=>'incorporation_date','class'=>'form-control','placeholder'=>"Incorporation date"))!!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-default">Submit </button>
            <button type="reset" class="btn btn-default">Reset </button>
        </div>
    {!! Form::close() !!}
@stop
@section('script-page')
    <script type="text/javascript">
    $(document).ready(function() {
        $('#incorporation_date').datepicker({
            autoclose: true
        });
    });
    </script>
@stop