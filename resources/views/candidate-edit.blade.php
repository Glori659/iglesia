@extends('layout.main')
@section('tittle')
    Create a new Candidate
@stop
@section('breadcrumb')
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="{{ url('candidates')}}">Canditates</a>
        </li>
        <li class="active">
            <i class="fa fa-edit"></i> candidate
        </li>
    </ol>
@stop
@section('content')
    {!! Form::open(array('url'=>'candidates/'.$data->id,'method'=>'PUT','id'=>'add-candidate'))!!}
        <div class=" col-sm-8 col-lg-6 col-md-6 col-md-offset-3 col-sm-offset-2">
            <div class="form-group">
                <label>First name <span class="text-danger">*</span></label>
                {!! Form::text('name_first',$candidate->name_first,array('id'=>'first_name','class'=>'form-control','placeholder'=>'Enter first name'))!!}
            </div>

            <div class="form-group">
                <label>Last name <span class="text-danger">*</span></label>
                {!! Form::text('name_last',$candidate->name_last,array('id'=>'last_name','class'=>'form-control','placeholder'=>'Enter last name'))!!}
            </div>
            <div class="form-group">
                <label>Date of birth <span class="text-danger">*</span></label>
                {!! Form::text('date_of_birth',$candidate->date_of_birth,array('id'=>'date_of_birth','class'=>'form-control','placeholder'=>'Enter date of birth'))!!}
            </div>
            <div class="form-group">
                <label>Address <span class="text-danger">*</span></label>
                {!!Form::select('address_country_code',[
                    "US"	=>	"United States of America",
                    "CA"	=>	"Canada",
                    "GB"	=>	"United Kingdom",
                    "AF"	=>	"Afghanistan",
                    "AL"	=>	"Albania",
                    "DZ"	=>	"Algeria",
                    "AS"	=>	"American Samoa",
                    "AD"	=>	"Andorre",
                    "AO"	=>	"Angola",
                    "AI"	=>	"Anguilla",
                    "AG"	=>	"Antigua and Barbuda",
                    "AR"	=>	"Argentina",
                    "AM"	=>	"Armenia",
                    "AU"	=>	"Australia",
                    "AT"	=>	"Austria",
                    "AZ"	=>	"Azerbaijan",
                    "BS"	=>	"Bahamas",
                    "BH"	=>	"Bahrain",
                    "BD"	=>	"Bangladesh",
                    "BB"	=>	"Barbade",
                    "BY"	=>	"Belarus",
                    "BE"	=>	"Belgium",
                    "BM"	=>	"Bermuda",
                    "BO"	=>	"Bolivia",
                    "BA"	=>	"Bosnia and Herzegovina",
                    "BW"	=>	"Botswana",
                    "BR"	=>	"Brazil",
                    "VG"	=>	"British Virgin Islands",
                    "BG"	=>	"Bulgaria",
                    "BF"	=>	"Burkina Faso",
                    "BI"	=>	"Burundi",
                    "KH"	=>	"Cambodia",
                    "CM"	=>	"Cameroon",
                    "CA"	=>	"Canada",
                    "CV"	=>	"Cape Verde",
                    "KY"	=>	"Cayman Islands",
                    "CL"	=>	"Chile",
                    "CN"	=>	"China",
                    "CX"	=>	"Christmas Island",
                    "CC"	=>	"Cocos (Keeling) Islands",
                    "CO"	=>	"Colombia",
                    "CD"	=>	"Congo (Dem. Rep.)",
                    "CK"	=>	"Cook Islands",
                    "CR"	=>	"Costa Rica",
                    "HR"	=>	"Croatia",
                    "CU"	=>	"Cuba",
                    "CY"	=>	"Cyprus",
                    "CZ"	=>	"Czech Republic",
                    "CI"	=>	"Côte D'Ivoire",
                    "DK"	=>	"Denmark",
                    "DJ"	=>	"Djibouti",
                    "DM"	=>	"Dominica",
                    "DO"	=>	"Dominican Republic",
                    "EC"	=>	"Ecuador",
                    "EG"	=>	"Egypt",
                    "SV"	=>	"El Salvador",
                    "GQ"	=>	"Equatorial Guinea",
                    "ER"	=>	"Eritrea",
                    "EE"	=>	"Estonia",
                    "ET"	=>	"Ethiopia",
                    "FK"	=>	"Falkland Islands",
                    "FO"	=>	"Faroe Islands",
                    "FJ"	=>	"Fiji",
                    "FI"	=>	"Finland",
                    "FR"	=>	"France",
                    "GF"	=>	"French Guiana",
                    "PF"	=>	"French Polynesia",
                    "TF"	=>	"French Southern Territories",
                    "GM"	=>	"Gambia",
                    "GE"	=>	"Georgia",
                    "DE"	=>	"Germany",
                    "GH"	=>	"Ghana",
                    "GI"	=>	"Gibraltar",
                    "GR"	=>	"Greece",
                    "GL"	=>	"Greenland",
                    "GP"	=>	"Guadeloupe",
                    "GU"	=>	"Guam",
                    "GT"	=>	"Guatemala",
                    "GN"	=>	"Guinea",
                    "GY"	=>	"Guyana",
                    "HT"	=>	"Haiti",
                    "HN"	=>	"Honduras",
                    "HK"	=>	"Hong Kong",
                    "HU"	=>	"Hungary",
                    "IS"	=>	"Iceland",
                    "IN"	=>	"India",
                    "ID"	=>	"Indonesia",
                    "IR"	=>	"Iran",
                    "IQ"	=>	"Iraq",
                    "IE"	=>	"Ireland",
                    "IM"	=>	"Isle of Man",
                    "IL"	=>	"Israel",
                    "IT"	=>	"Italy",
                    "JM"	=>	"Jamaica",
                    "JP"	=>	"Japan",
                    "JO"	=>	"Jordan",
                    "KZ"	=>	"Kazakhstan",
                    "KE"	=>	"Kenya",
                    "KI"	=>	"Kiribati",
                    "KR"	=>	"Korea (South)",
                    "KW"	=>	"Kuwait",
                    "KG"	=>	"Kyrgyzstan",
                    "LA"	=>	"Laos",
                    "LV"	=>	"Latvia",
                    "LB"	=>	"Lebanon",
                    "LS"	=>	"Lesotho",
                    "LR"	=>	"Liberia",
                    "LY"	=>	"Libya",
                    "LI"	=>	"Liechtenstein",
                    "LT"	=>	"Lithuania",
                    "LU"	=>	"Luxembourg",
                    "MO"	=>	"Macao",
                    "MK"	=>	"Macedonia",
                    "MW"	=>	"Malawi",
                    "MY"	=>	"Malaysia",
                    "MV"	=>	"Maldives",
                    "ML"	=>	"Mali",
                    "MT"	=>	"Malta",
                    "MH"	=>	"Marshall Islands",
                    "MQ"	=>	"Martinique",
                    "MR"	=>	"Mauritania",
                    "MU"	=>	"Mauritius",
                    "YT"	=>	"Mayotte",
                    "MX"	=>	"Mexico",
                    "FM"	=>	"Micronesia",
                    "MD"	=>	"Moldova",
                    "MC"	=>	"Monaco",
                    "MN"	=>	"Mongolia",
                    "MS"	=>	"Montserrat",
                    "MA"	=>	"Morocco",
                    "MZ"	=>	"Mozambique",
                    "MM"	=>	"Myanmar",
                    "NA"	=>	"Namibia",
                    "NP"	=>	"Nepal",
                    "NL"	=>	"Netherlands",
                    "AN"	=>	"Netherlands Antilles",
                    "NC"	=>	"New Caledonia",
                    "NZ"	=>	"New Zealand",
                    "NI"	=>	"Nicaragua",
                    "NE"	=>	"Niger",
                    "NG"	=>	"Nigeria",
                    "NU"	=>	"Niue",
                    "NF"	=>	"Norfolk Island",
                    "MP"	=>	"Northern Mariana Islands",
                    "NO"	=>	"Norway",
                    "OM"	=>	"Oman",
                    "PK"	=>	"Pakistan",
                    "PW"	=>	"Palau",
                    "PA"	=>	"Panama",
                    "PG"	=>	"Papua New Guinea",
                    "PE"	=>	"Peru",
                    "PH"	=>	"Philippines",
                    "PN"	=>	"Pitcairn",
                    "PL"	=>	"Poland",
                    "PT"	=>	"Portugal",
                    "PR"	=>	"Puerto Rico",
                    "QA"	=>	"Qatar",
                    "RO"	=>	"Romania",
                    "RU"	=>	"Russia",
                    "RE"	=>	"Réunion",
                    "SH"	=>	"Saint Helena",
                    "KN"	=>	"Saint Kitts and Nevis",
                    "PM"	=>	"Saint Pierre and Miquelon",
                    "WS"	=>	"Samoa",
                    "SM"	=>	"San Marino",
                    "SA"	=>	"Saudi Arabia",
                    "SN"	=>	"Senegal",
                    "SC"	=>	"Seychelles",
                    "SL"	=>	"Sierra Leone",
                    "SG"	=>	"Singapore",
                    "SK"	=>	"Slovakia",
                    "SI"	=>	"Slovenia",
                    "SO"	=>	"Somalia",
                    "ZA"	=>	"South Africa",
                    "ES"	=>	"Spain",
                    "LK"	=>	"Sri Lanka",
                    "SD"	=>	"Sudan",
                    "SR"	=>	"Suriname",
                    "SZ"	=>	"Swaziland",
                    "SE"	=>	"Sweden",
                    "CH"	=>	"Switzerland",
                    "SY"	=>	"Syria",
                    "TW"	=>	"Taiwan",
                    "TJ"	=>	"Tajikistan",
                    "TZ"	=>	"Tanzania",
                    "TH"	=>	"Thailand",
                    "TG"	=>	"Togo",
                    "TK"	=>	"Tokelau",
                    "TT"	=>	"Trinidad and Tobago",
                    "TN"	=>	"Tunisia",
                    "TR"	=>	"Turkey",
                    "TM"	=>	"Turkmenistan",
                    "TC"	=>	"Turks and Caicos Islands",
                    "UG"	=>	"Uganda",
                    "UA"	=>	"Ukraine",
                    "AE"	=>	"United Arab Emirates",
                    "GB"	=>	"United Kingdom",
                    "US"	=>	"United States of America",
                    "UY"	=>	"Uruguay",
                    "UZ"	=>	"Uzbekistan",
                    "VE"	=>	"Venezuela",
                    "VN"	=>	"Vietnam",
                    "VI"	=>	"Virgin Islands of the United States",
                    "WF"	=>	"Wallis and Futuna",
                    "EH"	=>	"Western Sahara",
                    "YE"	=>	"Yemen",
                    "ZM"	=>	"Zambia",
                    "ZW"	=>	"Zimbabwe",
                	],[$candidate->address_country_code=>$candidate->address_country_code],array(
            		'id'=>'address_country_code',
                    'class'=>'form-control'))
                !!}
            </div>
            <div class="form-group">
                <label>Street <span class="text-danger">*</span></label>
                {!! Form::text('address_street1',$candidate->address_street1,array('id'=>'address_street1','class'=>'form-control','placeholder'=>'Enter street'))!!}
            </div>
            <div class="form-group">
                <label>Street cont'd </label>
                {!! Form::text('address_street2',$candidate->address_street2,array('id'=>'address_street2','class'=>'form-control','placeholder'=>"Enter street cont'd"))!!}
            </div>
            <div class="form-group">
                <label>Postal code <span class="text-danger">*</span></label>
                {!! Form::text('address_postal_code',$candidate->address_postal_code,array('id'=>'address_postal_code','class'=>'form-control','placeholder'=>"Enter the postal code"))!!}
            </div>
            <div class="form-group">
                <label>City <span class="text-danger">*</span></label>
                {!! Form::text('address_city',$candidate->address_city,array('id'=>'address_city','class'=>'form-control','placeholder'=>"Enter city"))!!}
            </div>
            <div class="form-group">
                <label>State <span class="text-danger">*</span></label>
                {!! Form::text('address_subdivision',$candidate->address_subdivision,array('id'=>'address_subdivision','class'=>'form-control','placeholder'=>"Enter state"))!!}
            </div>
            <div class='form-group'>
                <label>Identity document <span class="text-danger">*</span></label>
                @if($candidate->ssn!='')
                <div class='input-group col-md-12'>
                    {!!Form::select('document_type',[
                        "ssn"		=>	"SSN",
                        "passport"	=>	"Passport"]
                        ,[""=>"ssn"],array(
                        'id'=>'document_type',
                        'class'=>'form-control'))
                    !!}
                    <span class="input-group-btn" style="width: 0%;">
                    </span>
                    {!! Form::text('document_value',$candidate->ssn,array('id'=>'document_value','class'=>'form-control','placeholder'=>'Enter the code of the identity document','for'=>'document_value'))!!}
                </div>
                @endif
                @if($candidate->passport!='')
                <div class='input-group col-md-12'>
                    {!!Form::select('document_type',[
                        "ssn"		=>	"SSN",
                        "passport"	=>	"Passport"]
                        ,[''=>'passport'],array(
                        'id'=>'document_type',
                        'class'=>'form-control',
                        'data-placeholder'=>'Nacionalidad'
                        ,'style'=>'width: 100%;'))
                    !!}
                    <span class="input-group-btn" style="width: 0%;">
                    </span>
                    {!! Form::text('document_value',$candidate->passport,array('id'=>'document_value','class'=>'form-control','placeholder'=>'Enter the code of the identity document','for'=>'document_value'))!!}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Note</label>
                {{ Form::textarea('note', $candidate->note, ['class' => 'form-control','rows'=>"3"]) }}
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
        $('#date_of_birth').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
        });
    });
    </script>
@stop