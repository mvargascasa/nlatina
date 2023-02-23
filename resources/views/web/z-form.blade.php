{!! Form::open(['route' => 'landing.thankpost', 'id' => 'formlead']) !!}

@php
    $url_name = Route::current()->getName();     
@endphp


<div class="form-group">
    {!! Form::hidden('url_current', $url_name) !!}
    {!! Form::label('fname', 'Nombres') !!}<b style="color: red">*</b>
    {!! Form::text('fname', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('lname', 'Apellidos') !!}<b style="color: red">*</b>
    {!! Form::text('lname', null, ['class' => 'form-control', 'required']) !!}
</div>

{{-- <div class="form-group">
    {!! Form::label('nation', 'Nacionalidad:') !!}
    {!! Form::text('nation', null, ['class' => 'form-control', 'required']) !!}
</div> --}}

<div class="form-group">
    {!! Form::label('country', 'País de residencia') !!}<b style="color: red">*</b>
    {!! Form::select('country', [
        null => 'Seleccione',
        '+54' => 'Argentina',
        '+56' => 'Chile',
        '+591' => 'Bolivia',
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

{!! Form::label('tlf', 'Teléfono') !!}<b style="color: red">*</b>
<div class="form-group d-flex">
    {!! Form::text('cod', null, ['class' => 'form-control', 'style' => 'border-radius: 5px 0px 0px 5px; width: 25%; background-color: #ffffff', 'id' => 'cod_country', 'readonly']) !!}
    {!! Form::number('tlf', null, ['class' => 'form-control','rows' => '2', 'style' => 'border-radius: 0px 5px 5px 0px; width: 100%', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class' => 'form-control','rows' => '2', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('service', 'Servicio') !!}<b style="color: red">*</b>
    {!! Form::select('service',
                                [null => 'Seleccione',
                                'Apostillas'=>'Apostillas',
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
    ,    null,    ['class' => 'form-control custom-select', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('message', 'Mensaje') !!}<b style="color: red">*</b>
    {!! Form::textarea('message', null, ['class' => 'form-control',  'maxlength'=>"100",'rows' => '2', 'id' => 'message', 'required', 'placeholder' => 'Hola, necesito ayuda con...']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Enviar',  ['class' => 'btn btn-lg btn-warning btn-block']) !!}
</div>


{!! Form::close() !!}
