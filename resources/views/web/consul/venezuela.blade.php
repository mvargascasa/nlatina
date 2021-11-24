@extends('layouts.web')
@section('header')
    <title>Notaria Latina - Consulado de Venezuela en New York</title>
    <meta name="description" content="Notaría Latina. Consulado de Venezuela en New York. Informacíon sobre Trámites Consulares de Venezolanos en New York"/>
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
              <h1 class="font-weight-bold heading-title" >Consulado Venezolano</h1>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
        <div class="row">
            <div class="col-12 col-md-4">
                <h4>Dirección:</h4>
                <p class="text-muted">7 E 51st St, New York, <br>NY 10017, Estados Unidos</p>

                <h4>Teléfono:</h4>
                <p class="text-muted">+1 646-283-5900</p>

                <h4>Email:</h4>
                <p class="text-muted">ven.newyork@gmail.com</p>

                <a href="http://eeuu.embajada.gob.ve/" class="btn btn-light btn-lg">Sitio Web Oficial</a>

            </div>
            <div class="col-12 col-md-4 p-4">
                <h3 class="pt-4">Informacion para Trámites Consulares</h3>
                <p>Conozca los requisitos para trámites consulares de Venezolanos en Estados Unidos.</p>

                <a href="http://eeuu.embajada.gob.ve/?page_id=71464" class="btn btn-dark btn-block">Trámites Consulares</a>
                <a href="https://tramites.saime.gob.ve/" class="btn btn-dark btn-block">Solicitud de Pasaportes</a>
                <a href="https://legalizacionve.mppre.gob.ve/" class="btn btn-dark btn-block">Antecedentes Penales</a>
                <a href="https://tcertificacioninternacional.mijp.gob.ve/" class="btn btn-dark btn-block">Apostilla Electrónica</a>
                

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
        document.getElementById('prisection').style.backgroundImage = "url('img/consulado/consulado-venezuela.jpg')";
    });
  </script>
@endsection

