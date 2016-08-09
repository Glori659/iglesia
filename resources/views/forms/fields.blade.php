<div class=" col-sm-8 col-lg-6 col-md-6 col-md-offset-3 col-sm-offset-2">

    <div class="form-group">
        <label>Nucleo <span class="text-danger">*</span></label>
        {!!Form::select('core',
            $cores,
        	$select['core_id'],
            array('id'=>'core',
            'class'=>'select-select2',
            'data-placeholder'=>'Seleccione el Nucleo al que Pertenece',
            'style'=>'width: 100%;', ))
        !!}
    </div>
    @if(isset($representatives))
    <div class="form-group">
        <label>Seleccione Representante <span class="text-danger">*</span></label>
        {!!Form::select('representative_id',$representatives,
        		null,array('id'=>'representative_id','class'=>'select-select2','data-placeholder'=>'Seleccione el Representante','style'=>'width: 100%;', ))!!}
    </div>
    <div class="form-group">
        <label>Parentesco con el Representante <span class="text-danger">*</span></label>
        {!!Form::select('type_relationship',
            [null=>null,
    		'Hijo(a)'	=>'Hijo(a)',
    		'Hermano(a)'=>'Hermano(a)',
    		'Primo(a)'	=>'Primo(a)',
    		'Sobrino(a)'=>'Sobrino(a)',
    		'Nieto(a)'	=>'Nieto(a)'],
    		null,
            array('id'=>'type_relationship',
            'class'=>'select-select2',
            'data-placeholder'=>'Seleccione el Parentesco',
            'style'=>'width: 100%;'))
        !!}
    </div>
    @else
    <div class="form-group">
        <label>Bautizado <span class="text-danger">*</span></label>
        <br>        
		<label class="radio-inline"><input type="radio" name="status" value="Si">Si</label>
		<label class="radio-inline"><input type="radio" name="status" value="No">No</label>
    </div>
    <div class="form-group">
        <label>Fecha de Bautizo <span class="text-danger">*</span></label>
        {!! Form::text('date_baptisms',null,array('id'=>'date_baptisms','class'=>'datepicker form-control','placeholder'=>'Seleccione la Fecha del Bautizo'))!!}
    </div>
    @endif
    <div class="form-group">
        <label>Nombres <span class="text-danger">*</span></label>
        {!! Form::text('name_first',null,array('id'=>'first_name','class'=>'form-control','placeholder'=>'Ingrese los Nombres'))!!}
    </div>
    <div class="form-group">
        <label>Apellidos <span class="text-danger">*</span></label>
        {!! Form::text('name_last',null,array('id'=>'last_name','class'=>'form-control','placeholder'=>'Ingrese los Apellidos'))!!}
    </div>
    <div class="form-group">
        <label>Fecha de Nacimiento <span class="text-danger">*</span></label>
        {!! Form::text('date_birth',null,array('id'=>'date_birth','class'=>'datepicker form-control','placeholder'=>'Seleccione la Fecha de Nacimiento'))!!}
    </div>
    <div class="form-group">
        <label>Genero <span class="text-danger">*</span></label>
        {!!Form::select('gender',[
            null=>null,
            "Femenino"  => "Femenino",
            "Masculino" => "Masculino",
            ]
            ,null,array(
            'id'=>'document_type',
            'class'=>'form-control',
            'style'=>'width: 100%;'))
        !!}
    </div>
    @if(!isset($representatives))
    <div class="form-group">
        <label>Tipo de Telefono <span class="text-danger">*</span></label>
        {!!Form::select('type',[
            null=>null,
            "Local"		=>  "Local",
            "Celular"	=>  "Celular",
            ],
    		$select['type_phone'],
            array('id'=>'representative_id',
            'class'=>'select-select2',
            'data-placeholder'=>'Seleccione el Tipo de Telefono',
            'style'=>'width: 100%;'))
        !!}
    </div>
    <div class="form-group">
        <label>Numero de Telefono <span class="text-danger">*</span></label>
        {!! Form::text('number',
            $select['number'],
            array('id'=>'last_name',
            'class'=>'form-control',
            'placeholder'=>'Ingrese su Numero Telefonico'))
        !!}
    </div>
    <div class="form-group">
        <label>Correo Electrónico <span class="text-danger">*</span></label>
        {!! Form::text('email',
            null,
            array('id'=>'last_name',
            'class'=>'form-control',
            'placeholder'=>'Ingrese el Correo Electrónico'))
        !!}
    </div>
    <div class="form-group">
        <label>Seleccione Profesión <span class="text-danger">*</span></label>
        {!!Form::select('profession_id',
            $professions,
    		$select['representative_id'],
            array('id'=>'representative_id',
            'class'=>'select-select2',
            'data-placeholder'=>'Seleccione la Profesión',
            'style'=>'width: 100%;', ))
        !!}
    </div>
    
    <!-- -->
    <div class="form-group">
        <label class="control-label" for="country_id"> Pa&iacutes <span class="text-danger">*</span></label>
        {!!Form::select('country_id',
            $countries,$select['country_id'],
            array('id'=>'country_id',
            'class'=>'form-control select-select2',
            'data-placeholder'=>'Selecciona un país...',
            'style'=>'width: 100%;'))
        !!}
    </div>
    <div class="form-group">
        <label class="control-label" for="state_id"> Estado <span class="text-danger">*</span></label>
        {!!Form::select('state_id',
            $states=array(null=>null)+\App\State::lists('state','id')->toArray(),
            $select['state_id'],
            array('id'=>'state_id',
            'class'=>'form-control select-select2',
            'data-placeholder'=>'Selecciona un Estado',
            'style'=>'width: 100%;',
            $disabled=>''))
        !!}
    </div>
    <div class="form-group">
        <label class="control-label" for="city_id"> Ciudad <span class="text-danger">*</span></label>
        {!!Form::select('city_id',
            $cities=array(null=>null)+\App\City::where('state_id',
            $select['state_id'])
            ->lists('city','id')
            ->toArray(),
            $select['city_id'],
            array('id'=>'city_id',
            'class'=>'form-control select-select2',
            'data-placeholder'=>'Selecciona una Ciudad',
            'style'=>'width: 100%;',
            $disabled=>''))
        !!}
    </div>
    <div class="form-group">
        <label class="control-label" for="municipality_id"> Municipio <span class="text-danger">*</span></label>
        {!!Form::select('municipality_id',
            $cities=array(null=>null)+\App\Municipality::where('state_id',
            $select['state_id'])
            ->lists('municipality','id')
            ->toArray(),
            $select['municipality_id'],
            array('id'=>'municipality_id',
            'class'=>'form-control select-select2',
            'data-placeholder'=>'Selecciona un Municipio',
            'style'=>'width: 100%;',
            $disabled=>''))!!}
    </div>
    <div class="form-group">
        <label class="control-label" for="parish_id"> Parroqu&iacutea <span class="text-danger">*</span></label>
        {!!Form::select('parish_id',
            $cities=array(null=>null)+\App\Parish::where('municipality_id',
            $select['municipality_id'])
            ->lists('parish','id')
            ->toArray(),
            $select['parish_id'],
            array('id'=>'parish_id',
            'class'=>'form-control select-select2',
            'data-placeholder'=>'Selecciona un Parroquía',
            'style'=>'width: 100%;',
            $disabled=>''))
        !!}
    </div>
    <div class="form-group">
        <label class="control-label" for="type_address"> Tipo de Direcci&oacuten <span class="text-danger">*</span></label>
        {!!Form::select('type_address',
            [null=>null,
            'home'=>'Casa',
            'office'=>'Oficina'],
            $select['type_address'],
            array('id'=>'type_address',
            'class'=>'form-control select-select2',
            'data-placeholder'=>'Seleccione un Tipo de Dirección',
            'style'=>'width: 100%;',
            $disabled=>''))
        !!}
    </div>
    <div class="form-group">
        <label class="control-label" for="address">Direcci&oacuten 
            <span class="text-danger">*</span>
        </label>
        {!!Form::text('address',
            $select['address'],
            array('id'=>'address',
            'class'=>'form-control',
            'placeholder'=>'Ingrese la Dirección.',
            'style'=>'width: 100%;',
            $disabled=>'',
            'for'=>'address'))
        !!}
    </div>
    <!-- -->
    @endif
     <div class='form-group'>
        <label>Nacionalidad <span class="text-danger">*</span></label>
        {!!Form::select('nationality',[
            null=>null,
            "Extranjero"    =>  "Extranjero",
            "Venezolano"    =>  "Venezolano",
            ]
            ,null,array(
            'id'=>'document_type',
            'class'=>'form-control',
            'style'=>'width: 100%;'))
        !!}
    </div>
    <div class='form-group'>
        <label>Documento de Identidad <span class="text-danger">*</span></label>
        {!! Form::text('identity_document',null,array('id'=>'identity_document','class'=>'form-control','placeholder'=>'Ingrese su Numero de Identidad','for'=>'identity_document'))!!}
    </div>
    <div class="form-group">
        <label>Observaciones</label>
        {!! Form::textarea('observations',null,array('class'=>'form-control','rows'=>4))!!}
        
    </div>
    <div class="form-group">
        <label>Cualidades</label>
        {!! Form::textarea('qualities',null,array('class'=>'form-control','rows'=>4))!!}
    </div>
    <div class="form-group">
        <label>¿En qué le gustaría participar en la iglesia?</label>
        {!! Form::textarea('question',null,array('class'=>'form-control','rows'=>4))!!}
    </div>
</div>