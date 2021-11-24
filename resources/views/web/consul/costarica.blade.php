@extends('layouts.web')
@section('header')
<title>Notaria Latina - Consulado de Costa Rica en New York</title>
<meta name="description" content="Notaría Latina. Consulado de Costa Rica en New York. Informacíon sobre Trámites Consulares para Costarricenses en New York"/>
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
              <h1 class="font-weight-bold heading-title" >Consulado Costarricense</h1>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
        <div class="row">
            <div class="col-12 col-md-4">
                <h4>Dirección:</h4>
                <p class="text-muted">15 W 37th St 12 floor, New York, <br>NY 10018, Estados Unidos</p>

                <h4>Teléfono:</h4>
                <p class="text-muted">+1 212-509-3066</p>

                <h4>Email:</h4>
                <p class="text-muted">concr-us-ny@rree.go.cr</p>

                <a href="http://www.costarica-embassy.org/" class="btn btn-light btn-lg">Sitio Web Oficial</a>

            </div>

            <div class="col-12 col-md-4 p-4">
            <img class="img-fluid" src="{{asset('img/consulado/certificado-costa-rica.jpg')}}" alt="">

            <h3 class="pt-4">Solicitud de Certificado de Delincuencia</h3>
            <p class="text-muted">Conozca aquí los pasos para solicitar su certificado de delincuencia costarricense, directamente en su consulado de Costa Rica.</p>

            <a href="http://www.costarica-embassy.org/?q=node/93" class="btn btn-dark btn-block">Trámites de Visa</a>
            <a href="http://www.costarica-embassy.org/index.php?q=node/2" class="btn btn-dark btn-block">Embajada de Costa Rica</a>
            <a href="http://www.costarica-embassy.org/index.php?q=node/94#1" class="btn btn-dark btn-block">Servicios Legales</a>
            <a href="http://www.costarica-embassy.org/index.php?q=node/68" class="btn btn-dark btn-block">Consulado Costa Rica</a>
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
        document.getElementById('prisection').style.backgroundImage = "url('img/consulado/consulado-costa-rica.jpg')";
    });
  </script>
@endsection

