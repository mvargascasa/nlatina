{!! Form::open(['route' => 'landing.thankpost', 'id' => 'formlead']) !!}

<div class="d-flex">
    <div class="form-group w-100">
        {!! Form::label('fname', 'Nombres:') !!}
        {!! Form::text('fname', null, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group w-100 ml-1">
        {!! Form::label('lname', 'Apellidos:') !!}
        {!! Form::text('lname', null, ['class' => 'form-control', 'required']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('country', 'País de residencia') !!}
    {!! Form::select('country', [
        null => 'Seleccione',
        '+54' => 'Argentina',
        '+591' => 'Bolivia',
        '+56' => 'Chile',
        '+57' => 'Colombia',
        '+506' => 'Costa Rica',
        '+593' => 'Ecuador',
        '+503' => 'El Salvador',
        '+34' => 'España',
        '+1' => 'Estados Unidos',
        '+502' => 'Guatemala',
        '+504' => 'Honduras',
        '+52' => 'México',
        '+505' => 'Nicaragua',
        '+507' => 'Panamá',
        '+595' => 'Paraguay',
        '+51' => 'Perú',
        '+1 787' => 'Puerto Rico',
        '+1 809' => 'República Dominicana',
        '+598' => 'Uruguay',
        '+58' => 'Venezuela'
    ], null, ['class' => 'form-control custom-select', 'id' => 'sel_country', 'required']) !!}
</div>

{!! Form::label('tlf', 'Teléfonos:') !!}
<div class="form-group d-flex">
    {!! Form::text('cod', null, ['class' => 'form-control', 'style' => 'border-radius: 5px 0px 0px 5px; width: 25%; background-color: #ffffff', 'id' => 'cod_country', 'readonly']) !!}
    {!! Form::number('tlf', null, ['class' => 'form-control','rows' => '2', 'style' => 'border-radius: 0px 5px 5px 0px; width: 100%', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','rows' => '2', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('service', 'Servicio:') !!}
    {!! Form::select('service',
                                [null => 'Seleccione',
                                'Apostilla'=>'Apostilla',
                                'Poder Notariado'=>'Poder Notariado',
                                'Traducción'=>'Traducción',
                                'Affidavit'=>'Affidavit',
                                'Acuerdos'=>'Acuerdos',
                                'Autorizaciones de Viaje'=>'Autorizaciones de Viaje',
                                'Cartas de Invitación'=>'Cartas de Invitación',
                                'Certificaciones'=>'Certificaciones',
                                'Contratos'=>'Contratos',
                                'Revocatorias'=>'Revocatorias',
                                'Testamentos'=>'Testamentos',
                                'Otro'=>'Otro']
    ,    null,    ['class' => 'form-control custom-select', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('message', 'Comentario:') !!}
    {!! Form::textarea('message', null, ['class' => 'form-control', 'maxlength'=>"100", 'rows' => '2', 'id' => 'message', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Enviar',  ['class' => 'btn btn-lg btn-warning btn-block']) !!}
</div>


{!! Form::close() !!}
