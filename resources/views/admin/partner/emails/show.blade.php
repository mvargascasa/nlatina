@extends('layouts.app')

@section('scripts')
<style>
    .fw-bold{font-weight: bold}
    .shadow-card{box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;}
    .shadow-card:hover{box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;}
</style>
@endsection

@section('content')
<div class="container col-md-10 mt-5 mb-5">
    <h3>Información del Correo Enviado</h3>
    <div class="border rounded p-2 my-3 shadow-card">
        <h5 class="fw-bold">Partner: {{$email->partner_name . " " . $email->partner_lastname}}</h5>
        <p>Email: {{$email->partner_email}}</p>
    </div>
    <div class="border rounded p-2 my-3 shadow-card">
        <h5 class="fw-bold">Asunto</h5>
        <p>{{$email->subject}}</p>
    </div>
    <div class="border rounded p-2 my-3 shadow-card">
        <h5 class="fw-bold">Mensaje</h5>
        <div>{!!$email->message!!}</div>
    </div>
    <div class="border rounded p-2 my-3 shadow-card">
        <h5 class="fw-bold">Fecha de Envio</h5>
        <p>Enviado el {{date_format(new \DateTime($email->created_at), 'Y-M-d' )}}</p>
    </div>
</div>
@endsection

@section('end-scripts')

@endsection