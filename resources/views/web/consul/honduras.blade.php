@extends('layouts.web')
@section('header')
<title>Notaria Latina - Consulado de Honduras en New York</title>
<meta name="description" content="Notaría Latina. Consulado de Honduras en New York. Informacíon sobre Trámites Consulares para Hondureños en New York"/>
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
              <h1 class="font-weight-bold heading-title" >Consulado Hondureño</h1>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
        <div class="row">
            <div class="col-12 col-md-4">
                <h4>Dirección:</h4>
                <p class="text-muted">255 W 36th St #2, <br>NY 10018, Estados Unidos</p>

                <h4>Teléfono:</h4>
                <p class="text-muted">+1 212 603-0400</p>

                <h4>Email:</h4>
                <p class="text-muted">info.consuladodehonduras.ny@gmail.com​​</p>

                <a href="https://www.citaconsular.com/#/home" class="btn btn-light btn-lg">Sitio Web Oficial</a>

            </div>

            <div class="col-12 col-md-4 p-4">
            <img class="img-fluid" src="{{asset('img/consulado/cita-consular-honduras.jpg')}}" alt="">

            <h3 class="pt-4">Renueve su Pasaporte Argentino</h3>
            <p class="text-muted">En este link puede acceder al sitio web oficial del consulado para solicitar su cita. </p>

            <a href="http://inm.gob.hn/pasaporte.html" class="btn btn-dark btn-block">Pasaportes</a>
            <a href="http://inm.gob.hn/Delegaciones.html" class="btn btn-dark btn-block">Delegaciones</a>
            <a href="http://inm.gob.hn/permisos.html" class="btn btn-dark btn-block">Permisos para Extranjeros</a>
            <a href="http://inm.gob.hn/reglamento.html" class="btn btn-dark btn-block">Reglamento de Migración</a>
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

