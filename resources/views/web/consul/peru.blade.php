@extends('layouts.web')
@section('header')
<title>Notaria Latina - Consulado de Peru en New York</title>
<meta name="description" content="Notaría Latina. Consulado de Peru en New York. Informacíon sobre Trámites Consulares para Peruanos en New York"/>
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
              <h1 class="font-weight-bold heading-title" >Consulado Peruano</h1>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
        <div class="row">
            <div class="col-12 col-md-4">
                <h4>Dirección:</h4>
                <p class="text-muted">241 E 49th St, New York, <br>NY 10017, Estados Unidos</p>

                <h4>Teléfono:</h4>
                <p class="text-muted">+1 212-735-3901</p>

                <h4>Email:</h4>
                <p class="text-muted">consuladony@conperny.org</p>

                <a href="http://www.consulado.pe/es/nuevayork/Paginas/Inicio.aspx" class="btn btn-light btn-lg">Sitio Web Oficial</a>

            </div>

            <div class="col-12 col-md-4 p-4">
            <img class="img-fluid" src="{{asset('img/consulado/peruanos-en-estados-unidos-mini.jpg')}}" alt="">

            <h3 class="pt-4">Política de Migración de Perú</h3>
            <p class="text-muted">Cuando uno reside en otro país, es muy importante conocer las políticas que rigen en dicho lugar. En este posteo le compartimos la política de migraciones compartida por el consulado peruano.</p>

            <a href="http://www.consulado.pe/es/NuevaYork/tramite/Paginas/Nacimientos.aspx" class="btn btn-dark btn-block">Registro de Nacimiento</a>
            <a href="http://www.consulado.pe/es/NuevaYork/tramite/Paginas/dni.aspx" class="btn btn-dark btn-block">Solicite su DNI Peruano</a>
            <a href="http://www.consulado.pe/es/NuevaYork/asistenciaconsular/Paginas/Asistencia-Consular.aspx" class="btn btn-dark btn-block">Asistencia Consular</a>
            <a href="http://www.consulado.pe/es/NuevaYork/tramite/Paginas/pasaporte.aspx" class="btn btn-dark btn-block">Pasaportes</a>
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
        document.getElementById('prisection').style.backgroundImage = "url('img/consulado/consulado-peru.jpg')";
    });
  </script>
@endsection

