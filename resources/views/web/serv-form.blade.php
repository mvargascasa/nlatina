{!! Form::open(['route' => 'landing.thankpost', 'id' => 'formlead']) !!}

@php
    $url_name = Route::current()->getName();     
@endphp

<div class="d-flex">
    <div class="form-group w-100">
        {!! Form::hidden('url_current', $url_name) !!}
        {!! Form::label('fname', 'Nombres:') !!}
        {!! Form::text('fname', null, ['class' => 'form-control rounded-0', 'required']) !!}
    </div>
    <div class="form-group w-100 ml-1">
        {!! Form::label('lname', 'Apellidos:') !!}
        {!! Form::text('lname', null, ['class' => 'form-control rounded-0', 'required']) !!}
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
    ], null, ['class' => 'form-control custom-select rounded-0', 'id' => 'sel_country_serv', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('state', 'Estado/Departamento') !!}
    {!! Form::select('state', ['' => 'Seleccione'], null, ['class' => 'form-control custom-select rounded-0', 'id' => 'sel_state_serv', 'required']) !!}
</div>

{!! Form::label('tlf', 'Teléfono:') !!}
<div class="form-group d-flex">
    <label class="border-top border-left border-bottom pt-1 bg-white border-right-0" style="height: 35px"><img width="30px" class="pl-2" id="img-country-serv" src="" alt=""></label>
    {!! Form::text('cod', null, ['class' => 'form-control rounded-0 border-left-0', 'style' => 'border-radius: 5px 0px 0px 5px; width: 40%; background-color: #ffffff;font-size:14px', 'id' => 'cod_country_serv', 'readonly']) !!}
    {!! Form::number('tlf', null, ['class' => 'form-control rounded-0','rows' => '2', 'style' => 'border-radius: 0px 5px 5px 0px; width: 100%;font-size:14px', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control rounded-0','rows' => '2', 'required']) !!}
</div>

@php
    $segments = Request::segments(); $viewservice = false; $getservicename = "";
    if(count($segments) < 1 || $segments[0] == "consulado" || $segments[0] == "post"){ $viewservice = true; }
    else {
        if(count($segments) > 0 && count($segments) < 2) $getservicename = $segments[0] . " general";
        if(count($segments) > 1 && count($segments) < 3) $getservicename = $segments[1];
    }
@endphp

@if(!$viewservice)
    {!! Form::hidden('servicename', $getservicename) !!}
@endif

@if($viewservice)
    <div class="form-group">
        {!! Form::label('service', 'Servicio que desea tramitar:') !!}
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
        ,    null,    ['class' => 'form-control custom-select rounded-0', 'required']) !!}
    </div>
@endif
{{-- @if(Request::is('post/*'))
    <div class="form-group">
        {!! Form::label('office', '¿Oficina en la que desea hacer el trámite?') !!}
        {!! Form::select('office', ['' => 'Seleccione', 'New York' => 'New York', 'New Jersey' => 'New Jersey', 'Florida' => 'Florida'], null, ['class' => 'form-control', 'required']) !!}
    </div>
@endif --}}

<div class="form-group">
    {!! Form::label('message', 'Comentario:') !!}
    {!! Form::textarea('message', null, ['class' => 'form-control rounded-0', 'maxlength'=>"100", 'rows' => '2', 'id' => 'message', 'required']) !!}
</div>

<div class="form-group">
    @if (str_contains(url()->current(), '/post'))
        {!! Form::submit('Solicitar Trámite',  ['class' => 'btn btn-lg btn-warning btn-block']) !!}
    @else
        {!! Form::submit('Enviar',  ['class' => 'btn btn-lg btn-warning btn-block']) !!}
    @endif
</div>


{!! Form::close() !!}
