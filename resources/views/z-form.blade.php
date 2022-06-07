{!! Form::open(['route' => 'landing.thankpost', 'id' => 'formlead']) !!}


<div class="form-group">
    {!! Form::label('fname', 'Nombres:') !!}
    {!! Form::text('fname', null, ['class' => 'form-control', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('lname', 'Apellidos:') !!}
    {!! Form::text('lname', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('tlf', 'Teléfonos:') !!}
    {!! Form::number('tlf', null, ['class' => 'form-control','rows' => '2', 'required']) !!}
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
