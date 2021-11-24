@extends('layouts.web')
@section('header')    
<title>Notaria Latina - Consulado de Uruguay en New York</title>
<meta name="description" content="Notaría Latina. Consulado de Uruguay en New York. Informacíon sobre Trámites Consulares para Uruguayos en New York"/>
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
              <h1 class="font-weight-bold heading-title" >Consulado Uruguayo</h1>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
        <div class="row">
            <div class="col-12 col-md-4">
                <h4>Dirección:</h4>
                <p class="text-muted">420 Madison Ave, New York, <br>NY 10017, Estados Unidos</p>

                <h4>Teléfono:</h4>
                <p class="text-muted">+1 212-753-8191</p>

                <h4>Email:</h4>
                <p class="text-muted">cnuevayork@cancilleria.gov.co</p>

                <a href="cgnuevayork@mrree.gub.uy" class="btn btn-light btn-lg">Sitio Web Oficial</a>

            </div>
            <div class="col-12 col-md-4 p-4">
            <h3 class="pt-4">Solicite sus Antecedentes Penales del Uruguay</h3>
            <p class="text-muted">Conozca los requisitos para solicitar sus antecedentes penales del Uruguay. Este post cuenta con información oficial del consulado.</p>

            <a href="https://www.uruguaynewyork.org/asuntos-consulares/pasaportes/" class="btn btn-dark btn-block">Renueve su Pasaporte Uruguayo</a>
            <a href="https://www.uruguaynewyork.org/visas/" class="btn btn-dark btn-block">Visas</a>
            <a href="https://www.uruguaynewyork.org/asuntos-consulares/permiso-de-menor/" class="btn btn-dark btn-block">Permiso de Viaje Menores</a>
            <a href="https://www.uruguaynewyork.org/acerca-del-consulado/" class="btn btn-dark btn-block">Acerca del Consulado</a>
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
        document.getElementById('prisection').style.backgroundImage = "url('img/consulado/consulado-uruguay.jpg')";
    });
  </script>
@endsection

