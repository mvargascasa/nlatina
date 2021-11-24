@extends('layouts.web')
@section('header')
<title>Notaria Latina - Consulado de Colombia en New York</title>
<meta name="description" content="Notaría Latina. Consulado de Colombia en New York. Informacíon sobre Trámites Consulares para Colombianos en New York"/>
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
              <h1 class="font-weight-bold heading-title" >Consulado Colombiano</h1>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
        <div class="row">
            <div class="col-12 col-md-4">
                <h4>Dirección:</h4>
                <p class="text-muted">10 E 46th St, New York, <br>NY 10017, Estados Unidos</p>

                <h4>Teléfono:</h4>
                <p class="text-muted">+1 212-798-9000</p>

                <h4>Email:</h4>
                <p class="text-muted">cnuevayork@cancilleria.gov.co</p>

                <a href="https://nuevayork.consulado.gov.co/" class="btn btn-light btn-lg">Sitio Web Oficial</a>

            </div>
            <div class="col-12 col-md-4 p-4">
            <h3 class="pt-4">Solicite su Cédula de Identidad Colombiana.</h3>
            <p class="text-muted">Conoza aquí los requisitos para tramitar su cédula de identidad colombiana. Este post cuenta con información oficial del consulado.</p>

            <a href="https://nuevayork.consulado.gov.co/tramites_servicios/nacionalidad" class="btn btn-dark btn-block">Nacionalidad Colombianas</a>
            <a href="https://nuevayork.consulado.gov.co/tramites_servicios/pasaportes" class="btn btn-dark btn-block">Renueve su Pasaporte Colombiano</a>
            <a href="https://estadosunidos.embajada.gov.co/acerca/funciones" class="btn btn-dark btn-block">Funciones de la Embajada</a>
            <a href="https://nuevayork.consulado.gov.co/acerca/consul" class="btn btn-dark btn-block">Consul en New York</a>
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
        document.getElementById('prisection').style.backgroundImage = "url('img/consulado/consulado_colombiano.jpg')";
    });
  </script>
@endsection

