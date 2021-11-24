@extends('layouts.web')
@section('header')
<title>Notaria Latina - Consulado de Bolivia en New York</title>
<meta name="description" content="Notaría Latina. Consulado de Bolivia en New York. Informacíon sobre Trámites Consulares para Bolivianos en New York"/>
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
              <h1 class="font-weight-bold heading-title" >Consulado Boliviano</h1>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
        <div class="row">
            <div class="col-12 col-md-4">
                <h4>Dirección:</h4>
                <p class="text-muted">800 2nd Ave #430, New York, <br>NY 10017, Estados Unidos</p>

                <h4>Teléfono:</h4>
                <p class="text-muted">+1 212-687-0530</p>

                <h4>Email:</h4>
                <p class="text-muted">info@boliviany.org</p>

                <a href="http://boliviany.org/en/" class="btn btn-light btn-lg">Sitio Web Oficial</a>

            </div>

            <div class="col-12 col-md-4 p-4">
            <img class="img-fluid" src="{{asset('img/consulado/doble-nacionalidad-bolivia-mini.jpg')}}" alt="">

            <h3 class="pt-4">Solicite la Doble Nacionalidad para sus hijos.</h3>
            <p class="text-muted">Conoza aquí los pasos a seguir para gestionar la doble nacionalidad boliviana para sus hijos. Este post cuenta con información oficial del consulado.</p>

            <a href="http://boliviany.org/es-co/tramites-consulares/visas" class="btn btn-dark btn-block">Visas</a>
            <a href="http://boliviany.org/es-co/tramites-consulares/registro-civil/16-matrimonio/2-celebracion-de-matrimonio" class="btn btn-dark btn-block">Celebración de Matrimonio</a>
            <a href="https://www.embolivia.se/seccion-consular/registro-civil/registro-de-matrimonio/" class="btn btn-dark btn-block">Registro de Matrimonio</a>
            <a href="http://boliviany.org/es-co/tramites-consulares/otros-tramites/retorno-a-bolivia" class="btn btn-dark btn-block">Retorno a Bolivia</a>
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
        document.getElementById('prisection').style.backgroundImage = "url('img/consulado/consulado-boliviano.jpg')";
    });
  </script>
@endsection

