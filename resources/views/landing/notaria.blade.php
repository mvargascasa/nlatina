@extends('landing.a-layout')
@section('header')
    <title>Servicios de Notaría en Linea - Notaria Latina</title>
    <meta name="description" content="Servicios de notaría, Gestión Fácil en línea, Entregas en 24 horas en Estados Unidos">
    <meta name="keywords" content="Servicio de notaría en Estados Unidos, Apostillas en Estados Unidos, Cartas Poder Estados Unidos, Traducciones Estados Unidos">
@endsection

@section('content')



<section id="prisection" style="min-height: 550px;background-size: cover;background-position: left bottom;background-repeat: no-repeat;">
  <div>

    <div class="row p-4 p-md-5">

      <div class="col-md-7 text-right">
        <h1 class="font-italic font-weight-bold mb-0" >Servicios de</h1>
        <h2 class="font-italic font-weight-bold" style="font-size: 60px;">Notaría</h2>
        <h3 class="font-italic font-weight-bold">Gestion Facíl en Línea</h3>
        <h3 class="font-italic font-weight-bold">Entregas en 24 Horas</h3>
        <h3 class="font-italic font-weight-bold">En Estados Unidos</h3>
        <p class="font-weight-bold">Trabajamos con envíos a todo el país.</p>
      </div>


      <div class="col-md-5" >
        <div class="row  text-white">
          <div class="card f-blue col-12 col-md-12 col-lg-10 col-xl-11" >
            <div class="card-body">

            <h2 class="font-italic font-weight-bold">Solicitar Ahora</h2>

    <small>
      Envíe el  formulario con sus datos y un asesor lo contactará para asesorarlo y realizar el trámite.
    </small>

            <form method="POST" action="{{route('landing.thankpost')}}" onsubmit="gtag('event', 'enviar', { 'event_category': 'suscripcion', 'event_label': 'LandingPage', value': '0'});">
                @csrf
              <div class="form-group pt-4">
                <input id="aaa" name="aaa" type="text" class="form-control" placeholder="Nombres" maxlength="40" minlength="2" required>
              </div>
              <div class="form-group">
                <input id="bbb" name="bbb" type="number" class="form-control" placeholder="Teléfono" maxlength="14" minlength="8" required>
              </div>
              <div class="form-group">
                <input id="ccc" name="ccc" type="email" class="form-control" placeholder="Email" maxlength="50" minlength="8" required>
              </div>
              <div class="form-group">
                <input id="ddd" name="ddd" type="text" class="form-control" placeholder="Mensaje" maxlength="100">
              </div>

              <button class="btn btn-lg btn-warning btn-block" type="submit">INICIAR TRAMITE</button>
            </form>
          </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="row justify-content-md-center py-4">

  <div class="col-12 text-center py-4">
    <h2 class="font-italic font-weight-bold">
      Nuestros servicios
    </h2>
    <hr class="hrb">
  </div>


  <div class="col lead col-12 col-md-4 col-lg-3 col-xl-3">

    <span class="lead font-weight-bold ">Apostillas:</span>
    <ul>
      <li>Diplomas</li>
      <li>Certificados de nacimiento.</li>
      <li>Poderes</li>
      <li>Contratos.</li>
      <li>Testamentos.</li>
  </ul>
  </div>

  <div class="col lead col-12 col-md-4 col-lg-3 col-xl-3">
    <span class="lead font-weight-bold ">Poderes:</span>
   <ul>
    <li>Para compra/venta.</li>
    <li>Administración de Propiedades.</li>
    <li>Inversiones de Dinero.</li>
    <li>Reclamos legales.</li>
    <li>Procedimientos en su nombre.</li>
  </ul>
  </div>

  <div class="col lead col-12 col-md-4 col-lg-3 col-xl-3">
    <span class="lead font-weight-bold ">Traducciones:</span>
   <ul>
    <li>Certificados de nacimiento.</li>
    <li>Diplomas.</li>
    <li>Certificados de matrimonio.</li>
    <li>Documentos de divorcio.</li>
    <li>Certificados de defunción.</li>
  </ul>
  </div>

</section>
@endsection
