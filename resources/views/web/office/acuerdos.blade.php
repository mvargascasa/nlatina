@extends('layouts.web')
@section('header')
    <title>Acuerdos Notarizados y Apostillados en {{ $data['office'] }} - Notaria Latina</title> 
    <meta name="description"        content="Los acuerdos son un pacto firmado entre dos o más personas que están de acuerdo con lo estipulado en el documento.">       
    <meta name="keywords"           content="Acuerdos Notarizados y Apostillados en Queens New York, Acuerdos Notarizados y Apostillados near me, notaria latina, notario publico, notary public near me, notario cerca de mi, notario publico near me, notaría nueva york, notary public queens, que es un acuerdo notaria, para que sirve un acuerdo notaria, requisitos para un acuerdo notaria, realizar un acuerdo en new york, tramitar acuerdo new york, notarizar acuerdo en new york" />
    
    <meta property="og:url"         content="{{route('web.acuerdos')}}" />
    <meta property="og:type"        content="article" />
    <meta property="og:title"       content="Acuerdos Notarizados y Apostillados en Queens New York - Notaria Latina" />
    <meta property="og:description" content="Los acuerdos son un pacto firmado entre dos o más personas que están de acuerdo con lo estipulado en el documento." />
    <meta property="og:image"       content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />
@endsection

@section('phoneNumberHidden', '+18007428602')
@section('phoneNumber', '800-742-8602')

@section('content')

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Acuerdos en {{ $data['office'] }}</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
    <h3>Los acuerdos son un pacto firmado entre dos o más personas que están de acuerdo con lo estipulado en el documento.</h3>
            <h3 class="font-weight-bold pt-4">Para que me sirve realizar un acuerdo?</h3>
            <p class="text-muted">Para comprometer a las dos personas a cumplir con  obligaciones y derechos establecidos por ley.</p>

            <h3 class="font-weight-bold pt-4">Que requisitos necesito para realizar un acuerdo?</h3>
            <ul class="text-muted">
                <li>Identificación válida de las personas que van a realizar el acuerdo.</li>
                <li>Información de lo que se quiere dejar estipulado en el acuerdo.</li>
            </ul>

            <h3 class="font-weight-bold pt-4">Donde puedo realizar un acuerdo?</h3>
            <p class="text-muted">Acérquese a nuestra oficina y un asesor lo guiará en la gestión del documento para que realice el trámite de manera correcta y segura.</p>

       <h3 class="font-weight-bold pt-4">En que tiempo me entregan los acuerdos?</h3>
        <ul class="text-muted">
            <li>El tiempo de entrega dentro de los Estados Unidos es de 24 horas.</li>
            <li>El tiempo de entrega fuera de los Estados Unidos es de 3 días laborables.</li>
            <li>El documento digital estará disponible en 24 horas.</li>
            <li class="text-danger">Por motivos de codiv-19 puede existir retraso en los tiempos de entrega.</li>
        </ul>
        <p class="text-muted"><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
            <a href="https://www.facebook.com/notariapublicalatina/"><em>FanPage de Facebook</em></a><em>.</em></p>
            <a class="btn btn-lg btn-warning" href="{{route('web.contactenos')}}">Solicite su Trámite</a>
</div>

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
 aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-white" style="background-color: #333 !important;">
          <h5 class="modal-title" id="exampleModalLabel">Complete el siguiente formulario y en breve le contactamos.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: #FFF !important;">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @include('z-form')
        </div>
      </div>
    </div>
  </div>
@endsection

@section('numberWpp', '13479739888')

@section('script')
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('../img/acuerdos.jpg')";
    });
  </script>
@endsection

