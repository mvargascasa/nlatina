@extends('layouts.web')
@section('header')
<title>Notaria Latina - Consulado de Paraguay en New York</title>
<meta name="description" content="Notaría Latina. Consulado de Paraguay en New York. Informacíon sobre Trámites Consulares para Paraguayos en New York"/>
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
              <h1 class="font-weight-bold heading-title" >Consulado Paraguayo</h1>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
        <div class="row">
            <div class="col-12 col-md-4">
                <h4>Dirección:</h4>
                <p class="text-muted">801 2nd Ave #600, <br>NY 10017, Estados Unidos</p>

                <h4>Teléfono:</h4>
                <p class="text-muted">+1 212-682-9440</p>

                <h4>Email:</h4>
                <p class="text-muted">secretaria@consulparny.com</p>

                <a href="http://boliviany.org/en/" class="btn btn-light btn-lg">Sitio Web Oficial</a>

            </div>

            <div class="col-12 col-md-4 p-4">
            <img class="img-fluid" src="{{asset('img/consulado/pasaporte-paraguayo.jpg')}}" alt="">

            <h3 class="pt-4">Renueve su Pasaporte Paraguayo</h3>
            <p class="text-muted">Conoza aquí los requisitos para renovar su pasaporte de Paraguay. Este post cuenta con información oficial del consulado.</p>

            <a href="https://www.mre.gov.py/Sitios/Home/Contenido/consulpar-ny/194" class="btn btn-dark btn-block">Consulados en Estados Unidos</a>
            <a href="https://www.mre.gov.py/Sitios/Home/Contenido/consulpar-ny/89" class="btn btn-dark btn-block">Pasaportes</a>
            <a href="https://www.mre.gov.py/Sitios/Home/Contenido/consulpar-ny/88" class="btn btn-dark btn-block">Visas</a>
            <a href="https://www.mre.gov.py/Sitios/Home/Contenido/consulpar-ny/92" class="btn btn-dark btn-block">Repatriaciones</a>
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
        document.getElementById('prisection').style.backgroundImage = "url('img/consulado/consulado-paraguayo.jpg')";
    });
  </script>
@endsection

