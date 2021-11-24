@extends('layouts.web')
@section('header')
<title>Notaria Latina - Consulado de Ecuador en New York</title>
<meta name="description" content="Notaría Latina. Consulado de Ecuador en New York. Informacíon sobre Trámites Consulares para Ecuatorianos en New York"/>
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
              <h1 class="font-weight-bold heading-title" >Consulado Ecuatoriano</h1>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
        <div class="row">
            <div class="col-12 col-md-4">
                <h4>Dirección:</h4>
                <p class="text-muted">800 Second Ave, Suite 200, <br>New York, Estados Unidos</p>

                <h4>Teléfono:</h4>
                <p class="text-muted">+1 (212) 808-0170</p>

                <h4>Email:</h4>
                <p class="text-muted">cecunewyork@cancilleria.gob.ec</p>

                <a href="https://ecuadorny.com/" class="btn btn-light btn-lg">Sitio Web Oficial</a>

            </div>

            <div class="col-12 col-md-4 p-4">
            <img class="img-fluid" src="{{asset('img/consulado/pasaporte-ecuador-mini.jpg')}}" alt="">

            <h3 class="pt-4">Solicite la Renovación de su Pasaporte Ecuatoriano</h3>
            <p class="text-muted">Conoza los requisitos para solicitar sus antecedentes penales . Este post cuenta con información oficial del consulado.</p>

            <a href="https://ecuadorny.com/servicios/pasaportes/" class="btn btn-dark btn-block">Pasaporte</a>
            <a href="https://ecuadorny.com/servicios/autorizaciones-de-viaje-a-menores-de-edad/" class="btn btn-dark btn-block">Travel Authorization</a>
            <a href="https://ecuadorny.com/servicios/inscripciones-de-nacimiento-doble-nacionalidad/" class="btn btn-dark btn-block">Doble Nacionalidad</a>
            <a href="https://ecuadorny.com/servicios/legalizaciones/" class="btn btn-dark btn-block">Legalizaciones</a>
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
        document.getElementById('prisection').style.backgroundImage = "url('img/consulado/bandera-ecuador-flag-1200.jpg')";
    });
  </script>
@endsection

