@extends('layouts.web')
@section('header')
<title>Notaria Latina - Consulado de Argentina en New York</title>
<meta name="description" content="Notaría Latina. Consulado de Argentina en New York. Informacíon sobre Trámites Consulares para Argentinos en New York"/>
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
              <h1 class="font-weight-bold heading-title" >Consulado Argentino</h1>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
        <div class="row">
            <div class="col-12 col-md-4">
                <h4>Dirección:</h4>
                <p class="text-muted">12 W 56th St, New York, <br>NY 10019, Estados Unidos</p>

                <h4>Teléfono:</h4>
                <p class="text-muted">+1 212-603-0400</p>

                <h4>Email:</h4>
                <p class="text-muted">informes@cnyor.com</p>

                <a href="https://cnyor.cancilleria.gob.ar" class="btn btn-light btn-lg">Sitio Web Oficial</a>

            </div>

            <div class="col-12 col-md-4 p-4">
            <img class="img-fluid" src="{{asset('img/consulado/pasaporte-argentino-mini.jpg')}}" alt="">

            <h3 class="pt-4">Renueve su Pasaporte Argentino</h3>
            <p class="text-muted">Conozca aquí los pasos a seguir para gestionar la renovación de su pasapore argentino. Este post cuenta con información oficial del consulado.</p>

            <a href="https://cnyor.cancilleria.gob.ar/content/visa-de-turista" class="btn btn-dark btn-block">Visa de Turista</a>
            <a href="https://cnyor.cancilleria.gob.ar/content/pasaporte-de-emergencia-1" class="btn btn-dark btn-block">Pasaporte de Emergencia</a>
            <a href="https://cancilleria.gob.ar/es/politica-exterior/seguridad-internacional" class="btn btn-dark btn-block">Seguridad Internacional</a>
            <a href="https://www.cancilleria.gob.ar/es/representaciones" class="btn btn-dark btn-block">Embajadas y Consulados</a>
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
        document.getElementById('prisection').style.backgroundImage = "url('img/consulado/consulado-argentino-1.jpg')";
    });
  </script>
@endsection

