{!! Form::open(['route' => 'landing.thankpost', 'id' => 'formlead']) !!}


<div class="form-group">
    {!! Form::label('fname', 'Nombres') !!}
    {!! Form::text('fname', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('lname', 'Apellidos') !!}
    {!! Form::text('lname', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('nation', 'Nacionalidad:') !!}
    {!! Form::text('nation', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tlf', 'Teléfono') !!}
    {!! Form::text('tlf', null, ['class' => 'form-control','rows' => '2']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class' => 'form-control','rows' => '2']) !!}
</div>

<div class="form-group">
    {!! Form::label('service', 'Servicio') !!}
    {!! Form::select('service',
                                ['Apostillas'=>'Apostillas',
                                'Poderes'=>'Poderes',
                                'Traducciones'=>'Traducciones',
                                'Affidavit'=>'Affidavit',
                                'Acuerdos'=>'Acuerdos',
                                'Autorizaciones de Viaje'=>'Autorizaciones de Viaje',
                                'Cartas de Invitación'=>'Cartas de Invitación',
                                'Certificaciones'=>'Certificaciones',
                                'Contratos'=>'Contratos',
                                'Poderes Especiales'=>'Poderes Especiales',
                                'Revocatorias'=>'Revocatorias',
                                'Testamentos'=>'Testamentos',]
    ,    null,    ['class' => 'form-control custom-select']) !!}
</div>

<div class="form-group">
    {!! Form::label('message', 'Mensaje') !!}
    {!! Form::textarea('message', null, ['class' => 'form-control',  'maxlength'=>"100",'rows' => '2']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Enviar',  ['class' => 'btn btn-lg btn-warning btn-block']) !!}
</div>


{!! Form::close() !!}
