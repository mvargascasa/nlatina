@extends('layouts.web')
@section('header')
<title>Notaria Latina - Consulado de Mexico en New York</title>
<meta name="description" content="Notaría Latina. Consulado de Mexico en New York. Informacíon sobre Trámites Consulares para Mexicanos en New York"/>
<meta property="og:url"                content="https://notarialatina.com" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="Notaría Latina - Notario Público en Queens New York." />
<meta property="og:description"        content="Gestión en Línea en todo EE.UU. Poderes, Apostillas, Traducciones, Autorizaciones de Viaje, Affidavit." />
<meta property="og:image"              content="https://notarialatina.com/img/meta-notaria-latina-queens-new-york.jpg" />
@endsection

@section('content')

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Consulado Mexicano</h1>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
        <div class="row">
            <div class="col-12 col-md-4">
                <h4>Dirección:</h4>
                <p class="text-muted">27 E 39th St, <br>NY 10016, Estados Unidos</p>

                <h4>Teléfono:</h4>
                <p class="text-muted">+1 212-217-6400</p>

                <h4>Email:</h4>
                <p class="text-muted">informes@cnyor.com</p>

                <a href="prensany@sre.gob.mx" class="btn btn-light btn-lg">Sitio Web Oficial</a>

            </div>

            <div class="col-12 col-md-4 p-4">
            <img class="img-fluid" src="{{asset('img/consulado/pasaporte-mexicano.jpg')}}" alt="">

            <h3 class="pt-4">Renueve su Pasaporte Mexicano</h3>
            <p class="text-muted">Requisitos para gestionar la renovación de su pasaporte mexicano. Solicite la cita para iniciar la gestión.</p>

            <a href="https://consulmex.sre.gob.mx/nuevayork/index.php/espanol/servicios-consulares/pasaportes-mexicano" class="btn btn-dark btn-block">Pasaporte Mexicano</a>
            <a href="https://consulmex.sre.gob.mx/nuevayork/index.php/espanol/visas-extranjeros-esp/visas-extranjeros" class="btn btn-dark btn-block">Visas Extranjeros</a>
            <a href="https://consulmex.sre.gob.mx/nuevayork/index.php/espanol/registro-civil-y-poderes-notariales/acta-de-nacimiento" class="btn btn-dark btn-block">Registro de Nacimiento</a>
            <a href="https://consulmex.sre.gob.mx/index.php/proteccion/16-detencion-migratoria" class="btn btn-dark btn-block">Detención Migratoria</a>
            </div>

            <div class="col-12 col-md-4 p-4">
                <a href="{{route('web.traducciones')}}"><img src="{{asset('img/consulado/publicidad-traducciones.jpg')}}" alt=""></a>
            </div>
        </div>
</div>


@endsection

@section('script')
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('img/consulado/consulado-mexico-1200x850.jpg')";
    });
  </script>
@endsection

