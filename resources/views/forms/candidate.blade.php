@extends('layout.main')
@section('tittle')
    Crear una nueva Persona
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
    {!! Form::open(array('url'=>'candidates','method'=>'POST','id'=>'add-candidate'))!!}
        <div class=" col-sm-8 col-lg-6 col-md-6 col-md-offset-3 col-sm-offset-2">
            <div class="form-group">
                <label>Nombres <span class="text-danger">*</span></label>
                {!! Form::text('name_first',null,array('id'=>'first_name','class'=>'form-control','placeholder'=>'Introduzca sus Nombres'))!!}
            </div>

            <div class="form-group">
                <label>Apellidos <span class="text-danger">*</span></label>
                {!! Form::text('name_last',null,array('id'=>'last_name','class'=>'form-control','placeholder'=>'Introduzca sus Apellidos'))!!}
            </div>
            <div class="form-group">
                <label>Fecha de Cumpleaños <span class="text-danger">*</span></label>
                {!! Form::text('date_of_birth',null,array('id'=>'date_of_birth','class'=>'form-control','placeholder'=>'Introduzca su Fecha de Nacimiento'))!!}
            </div>
            <div class="form-group">
                <label>Pais <span class="text-danger">*</span></label>
                <select name=" address_country_code" id="person_address_country_code" class="form-control">
                    <option value="US">United States of America</option>
                    <option value="CA">Canada</option>
                    <option value="GB">United Kingdom</option>
                    <option disabled="disabled" value="---------------">---------------</option>
                    <option value="AF">Afghanistan</option>
                    <option value="AL">Albania</option>
                    <option value="DZ">Algeria</option>
                    <option value="AS">American Samoa</option>
                    <option value="AD">Andorre</option>
                    <option value="AO">Angola</option>
                    <option value="AI">Anguilla</option>
                    <option value="AG">Antigua and Barbuda</option>
                    <option value="AR">Argentina</option>
                    <option value="AM">Armenia</option>
                    <option value="AU">Australia</option>
                    <option value="AT">Austria</option>
                    <option value="AZ">Azerbaijan</option>
                    <option value="BS">Bahamas</option>
                    <option value="BH">Bahrain</option>
                    <option value="BD">Bangladesh</option>
                    <option value="BB">Barbade</option>
                    <option value="BY">Belarus</option>
                    <option value="BE">Belgium</option>
                    <option value="BM">Bermuda</option>
                    <option value="BO">Bolivia</option>
                    <option value="BA">Bosnia and Herzegovina</option>
                    <option value="BW">Botswana</option>
                    <option value="BR">Brazil</option>
                    <option value="VG">British Virgin Islands</option>
                    <option value="BG">Bulgaria</option>
                    <option value="BF">Burkina Faso</option>
                    <option value="BI">Burundi</option>
                    <option value="KH">Cambodia</option>
                    <option value="CM">Cameroon</option>
                    <option value="CA">Canada</option>
                    <option value="CV">Cape Verde</option>
                    <option value="KY">Cayman Islands</option>
                    <option value="CL">Chile</option>
                    <option value="CN">China</option>
                    <option value="CX">Christmas Island</option>
                    <option value="CC">Cocos (Keeling) Islands</option>
                    <option value="CO">Colombia</option>
                    <option value="CD">Congo (Dem. Rep.)</option>
                    <option value="CK">Cook Islands</option>
                    <option value="CR">Costa Rica</option>
                    <option value="HR">Croatia</option>
                    <option value="CU">Cuba</option>
                    <option value="CY">Cyprus</option>
                    <option value="CZ">Czech Republic</option>
                    <option value="CI">Côte D'Ivoire</option>
                    <option value="DK">Denmark</option>
                    <option value="DJ">Djibouti</option>
                    <option value="DM">Dominica</option>
                    <option value="DO">Dominican Republic</option>
                    <option value="EC">Ecuador</option>
                    <option value="EG">Egypt</option>
                    <option value="SV">El Salvador</option>
                    <option value="GQ">Equatorial Guinea</option>
                    <option value="ER">Eritrea</option>
                    <option value="EE">Estonia</option>
                    <option value="ET">Ethiopia</option>
                    <option value="FK">Falkland Islands</option>
                    <option value="FO">Faroe Islands</option>
                    <option value="FJ">Fiji</option>
                    <option value="FI">Finland</option>
                    <option value="FR">France</option>
                    <option value="GF">French Guiana</option>
                    <option value="PF">French Polynesia</option>
                    <option value="TF">French Southern Territories</option>
                    <option value="GM">Gambia</option>
                    <option value="GE">Georgia</option>
                    <option value="DE">Germany</option>
                    <option value="GH">Ghana</option>
                    <option value="GI">Gibraltar</option>
                    <option value="GR">Greece</option>
                    <option value="GL">Greenland</option>
                    <option value="GP">Guadeloupe</option>
                    <option value="GU">Guam</option>
                    <option value="GT">Guatemala</option>
                    <option value="GN">Guinea</option>
                    <option value="GY">Guyana</option>
                    <option value="HT">Haiti</option>
                    <option value="HN">Honduras</option>
                    <option value="HK">Hong Kong</option>
                    <option value="HU">Hungary</option>
                    <option value="IS">Iceland</option>
                    <option value="IN">India</option>
                    <option value="ID">Indonesia</option>
                    <option value="IR">Iran</option>
                    <option value="IQ">Iraq</option>
                    <option value="IE">Ireland</option>
                    <option value="IM">Isle of Man</option>
                    <option value="IL">Israel</option>
                    <option value="IT">Italy</option>
                    <option value="JM">Jamaica</option>
                    <option value="JP">Japan</option>
                    <option value="JO">Jordan</option>
                    <option value="KZ">Kazakhstan</option>
                    <option value="KE">Kenya</option>
                    <option value="KI">Kiribati</option>
                    <option value="KR">Korea (South)</option>
                    <option value="KW">Kuwait</option>
                    <option value="KG">Kyrgyzstan</option>
                    <option value="LA">Laos</option>
                    <option value="LV">Latvia</option>
                    <option value="LB">Lebanon</option>
                    <option value="LS">Lesotho</option>
                    <option value="LR">Liberia</option>
                    <option value="LY">Libya</option>
                    <option value="LI">Liechtenstein</option>
                    <option value="LT">Lithuania</option>
                    <option value="LU">Luxembourg</option>
                    <option value="MO">Macao</option>
                    <option value="MK">Macedonia</option>
                    <option value="MW">Malawi</option>
                    <option value="MY">Malaysia</option>
                    <option value="MV">Maldives</option>
                    <option value="ML">Mali</option>
                    <option value="MT">Malta</option>
                    <option value="MH">Marshall Islands</option>
                    <option value="MQ">Martinique</option>
                    <option value="MR">Mauritania</option>
                    <option value="MU">Mauritius</option>
                    <option value="YT">Mayotte</option>
                    <option value="MX">Mexico</option>
                    <option value="FM">Micronesia</option>
                    <option value="MD">Moldova</option>
                    <option value="MC">Monaco</option>
                    <option value="MN">Mongolia</option>
                    <option value="MS">Montserrat</option>
                    <option value="MA">Morocco</option>
                    <option value="MZ">Mozambique</option>
                    <option value="MM">Myanmar</option>
                    <option value="NA">Namibia</option>
                    <option value="NP">Nepal</option>
                    <option value="NL">Netherlands</option>
                    <option value="AN">Netherlands Antilles</option>
                    <option value="NC">New Caledonia</option>
                    <option value="NZ">New Zealand</option>
                    <option value="NI">Nicaragua</option>
                    <option value="NE">Niger</option>
                    <option value="NG">Nigeria</option>
                    <option value="NU">Niue</option>
                    <option value="NF">Norfolk Island</option>
                    <option value="MP">Northern Mariana Islands</option>
                    <option value="NO">Norway</option>
                    <option value="OM">Oman</option>
                    <option value="PK">Pakistan</option>
                    <option value="PW">Palau</option>
                    <option value="PA">Panama</option>
                    <option value="PG">Papua New Guinea</option>
                    <option value="PE">Peru</option>
                    <option value="PH">Philippines</option>
                    <option value="PN">Pitcairn</option>
                    <option value="PL">Poland</option>
                    <option value="PT">Portugal</option>
                    <option value="PR">Puerto Rico</option>
                    <option value="QA">Qatar</option>
                    <option value="RO">Romania</option>
                    <option value="RU">Russia</option>
                    <option value="RE">Réunion</option>
                    <option value="SH">Saint Helena</option>
                    <option value="KN">Saint Kitts and Nevis</option>
                    <option value="PM">Saint Pierre and Miquelon</option>
                    <option value="WS">Samoa</option>
                    <option value="SM">San Marino</option>
                    <option value="SA">Saudi Arabia</option>
                    <option value="SN">Senegal</option>
                    <option value="SC">Seychelles</option>
                    <option value="SL">Sierra Leone</option>
                    <option value="SG">Singapore</option>
                    <option value="SK">Slovakia</option>
                    <option value="SI">Slovenia</option>
                    <option value="SO">Somalia</option>
                    <option value="ZA">South Africa</option>
                    <option value="ES">Spain</option>
                    <option value="LK">Sri Lanka</option>
                    <option value="SD">Sudan</option>
                    <option value="SR">Suriname</option>
                    <option value="SZ">Swaziland</option>
                    <option value="SE">Sweden</option>
                    <option value="CH">Switzerland</option>
                    <option value="SY">Syria</option>
                    <option value="TW">Taiwan</option>
                    <option value="TJ">Tajikistan</option>
                    <option value="TZ">Tanzania</option>
                    <option value="TH">Thailand</option>
                    <option value="TG">Togo</option>
                    <option value="TK">Tokelau</option>
                    <option value="TT">Trinidad and Tobago</option>
                    <option value="TN">Tunisia</option>
                    <option value="TR">Turkey</option>
                    <option value="TM">Turkmenistan</option>
                    <option value="TC">Turks and Caicos Islands</option>
                    <option value="UG">Uganda</option>
                    <option value="UA">Ukraine</option>
                    <option value="AE">United Arab Emirates</option>
                    <option value="GB">United Kingdom</option>
                    <option value="US">United States of America</option>
                    <option value="UY">Uruguay</option>
                    <option value="UZ">Uzbekistan</option>
                    <option value="VE">Venezuela</option>
                    <option value="VN">Vietnam</option>
                    <option value="VI">Virgin Islands of the United States</option>
                    <option value="WF">Wallis and Futuna</option>
                    <option value="EH">Western Sahara</option>
                    <option value="YE">Yemen</option>
                    <option value="ZM">Zambia</option>
                    <option value="ZW">Zimbabwe</option>
                </select>
            </div>
            <div class="form-group">
                <label>Calle <span class="text-danger">*</span></label>
                {!! Form::text('address_street1',null,array('id'=>'address_street1','class'=>'form-control','placeholder'=>'Introduzca las Calles o Avenidas'))!!}
            </div>
            <div class="form-group">
                <label>Adicional </label>
                {!! Form::text('address_street2',null,array('id'=>'address_street2','class'=>'form-control','placeholder'=>"Introduzca las Calles o Avenidas))!!}
            </div>
            <div class="form-group">
                <label>Codigo Postal <span class="text-danger">*</span></label>
                {!! Form::text('address_postal_code',null,array('id'=>'address_postal_code','class'=>'form-control','placeholder'=>"Introduzca su Codigo Postal"))!!}
            </div>
            <div class="form-group">
                <label>Ciudad <span class="text-danger">*</span></label>
                {!! Form::text('address_city',null,array('id'=>'address_city','class'=>'form-control','placeholder'=>"Introduzca la Ciudad"))!!}
            </div>
            <div class="form-group">
                <label>Estado <span class="text-danger">*</span></label>
                {!! Form::text('address_subdivision',null,array('id'=>'address_subdivision','class'=>'form-control','placeholder'=>"Introduzca el Estado"))!!}
            </div>
            <div class='form-group'>
                <label>Documento de Identidad <span class="text-danger">*</span></label>
                <div class='input-group col-md-12'>
                    {!!Form::select('document_type',[
                        null=>null,
                        "ssn"		=>	"SSN",
                        "passport"	=>	"Passport"]
                        ,null,array(
                        'id'=>'document_type',
                        'class'=>'form-control',
                        'data-placeholder'=>'Nacionalidad'
                        ,'style'=>'width: 100%;'))
                    !!}
                    <span class="input-group-btn" style="width: 0%;">
                    </span>
                    {!! Form::text('document_value',null,array('id'=>'document_value','class'=>'form-control','placeholder'=>'Introduzca su Documento de Identidad','for'=>'document_value'))!!}
                </div>
            </div>
            <div class="form-group">
                <label>Notas</label>
                <textarea name="note" class="form-control" rows="3"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-default">Guardar </button>
            <button type="reset" class="btn btn-default">Volver </button>
        </div>
    {!! Form::close() !!}
@stop
@section('script-page')
    <script type="text/javascript">
    $(document).ready(function() {
        $('#date_of_birth').datepicker({
            autoclose: true,
            format: "dd-mm-yyyy",
        });
    });
    </script>
@stop