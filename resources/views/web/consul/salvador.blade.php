@extends('layouts.web')
@section('header')
<title>Notaria Latina - Consulado de El Salvador en New York</title>
<meta name="description" content="Notaría Latina. Consulado de El Salvador en New York. Informacíon sobre Trámites Consulares para Salvadoreños en New York"/>
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
              <h1 class="font-weight-bold heading-title">Consulado Salvadoreño</h1>
            </div>

        </div>
      </div>
    </section>

  <div class="container pt-4">
          <div class="row">
              <div class="col-12 col-md-4">
                  <h4>Dirección:</h4>
                  <p class="text-muted">46 Park Ave, <br>NY 10016, Estados Unidos</p>

                  <h4>Teléfono:</h4>
                  <p class="text-muted">+1 (212) 889-3608</p>

                  <h4>Email:</h4>
                  <p class="text-muted">consuladonyc@rree.gob.sv</p>

                  <a href="consuladonuevayork.rree.gob.sv" class="btn btn-light btn-lg">Sitio Web Oficial</a>

              </div>

              <div class="col-12 col-md-4 p-4">
              <img class="img-fluid" src="{{asset('img/consulado/cita-consular-honduras.jpg')}}" alt="">

              <h3 class="pt-4">Solicite la Nacionalidad Salvadoreña para sus Hijos</h3>
              <p class="text-muted">Conoza aquí los pasos a seguir para gestionar la naturalidad salvadoreña para sus hijos nacidos en el extranjero. Este post cuenta con información oficial del consulado.</p>

              <a href="https://rree.gob.sv/embajadas-y-consulados-de-el-salvador/" class="btn btn-dark btn-block">Consulados en el Exterior</a>
              <a href="https://rree.gob.sv/servicios-consulares/" class="btn btn-dark btn-block">Servicios Consulares</a>
              <a href="https://portalcitas.rree.gob.sv/#/sessions/signin" class="btn btn-dark btn-block">Portal de Citas</a>
              <a href="https://pasaportes.gob.sv/" class="btn btn-dark btn-block">Solicitud de Pasaporte</a>
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
        document.getElementById('prisection').style.backgroundImage = "url('img/consulado/consulado-salvador.jpg')";
    });
  </script>
@endsection

