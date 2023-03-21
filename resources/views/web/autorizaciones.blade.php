@extends('layouts.web')
@section('header')
<title>Autorizaciones de Viaje en Queens New York - Notaria Latina</title> 
<meta name="description" content="Las autorizaciones de viaje o travel authorization va a permitir que su hijo(a), menor de edad, viaje fuera del país sin necesidad de que lo acompañe los padres.">       
<meta name="keywords" content="Autorizaciones de Viaje Notarizadas y Apostillados en Queens New York, Autorizaciones de Viaje Notarizadas y Apostillados near me, notaria latina, notario publico, notary public near me, notario cerca de mi, notario publico near me, notaría nueva york, notary public queens, que es una autorizacion de viaje, travel authorization, para que sirve una autorizacion de viaje, autorizacion de viaje menor de edad, requisitos autorizacion de viaje, autorizacion de viaje cerca de mi, autorizacion de viaje en new york, travel authorization in new york" />

<meta property="og:url"                content="{{route('web.autorizaciones')}}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="Autorizaciones de Viaje Notarizadas y Apostillados en Queens New York - Notaria Latina" />
<meta property="og:description"        content="Las autorizaciones de viaje o travel authorization va a permitir que su hijo(a), menor de edad, viaje fuera del país sin necesidad de que lo acompañe los padres." />
<meta property="og:image"              content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />

<meta name="csrf-token" content="{{ csrf_token() }}">

<script type="text/javascript">
  function callbackThen(response){
      // read HTTP status
      console.log(response.status);
      // read Promise object
      response.json().then(function(data){
        if(data.success && data.score > 0.5){
          console.log(data);
        } else {
          document.getElementById('formlead').addEventListener('submit', function (event) {
            event.preventDefault();
            console.log('recaptcha error. Stop form submission!');
          });
        }
      });
  }

  function callbackCatch(error){
      console.error('Error:', error)
  }
  </script>

<script id="scriptrecaptcha"></script>
<script>
  setTimeout(() => {
     document.getElementById('scriptrecaptcha').src = "https://www.google.com/recaptcha/api.js?render=6LdI9cMeAAAAALgxUrh7mzlzFBlIV-F4Gzvbp2D8"; 
      //console.log('cargando script recaptcha...');
  }, 3000);

  setTimeout(() => {
      var csrfToken = document.head.querySelector('meta[name="csrf-token"]');
      grecaptcha.ready(function() {
          grecaptcha.execute('6LdI9cMeAAAAALgxUrh7mzlzFBlIV-F4Gzvbp2D8', {action: 'homepage'}).then(function(token) {
                  
          fetch('/biscolab-recaptcha/validate?token=' + token, {
              headers: {
                  "X-Requested-With": "XMLHttpRequest",
                  "X-CSRF-TOKEN": csrfToken.content
              }
          })
          .then(function(response) {
              callbackThen(response)
          })
          .catch(function(err) {
              callbackCatch(err)
          });
              });
          });
          //console.log('ejecutando codigo del recaptcha...');
  }, 3500);
</script>
<style>
  .sticky {position: sticky; top: 10px;}
  @media screen and (max-width: 580px){.personalized-container{padding-left: 1px !important; padding-right: 1px !important}}
  @media screen and (max-width: 1300px){.personalized-container{padding-left: 30px !important; padding-right: 30px !important}}
  .personalized-container{padding-left: 150px; padding-right: 150px};
</style>
@endsection

@section('phoneNumberHidden', '+18007428602')
@section('phoneNumber', '800-742-8602')

@section('content')

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Autorizaciones de Viaje</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="personalized-container pt-4">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-xl-9 col-lg-9">
      <h2 style="font-weight: 500; font-size: 28px">Las autorizaciones de viaje o travel authorization va a permitir que su hijo(a), menor de edad, viaje fuera del país sin necesidad de que lo acompañe los padres.</h2>
      <p class="text-muted">La autorización de viaje designa quién va a ser la persona que acompañe al menor;  esta persona puede ser un familiar,
          amigo o alguna auxiliar de viaje como ser una aeromoza de la propia aerolinea.</p>
      <p class="text-muted">Es decir que este documento deben dar fe ambos padres o tutores sobre la autorización del menor a realizar el viaje con la persona mencionada.
          La autorización puede realizarse tambien para que el menor viaje con solo uno de sus padres.</p>
  
  
      <h2 style="font-weight: 500; font-size: 28px">¿Que requisitos se necesita para realizar autorizaciones de viaje?</h2>
      <ul class="text-muted">
          <li>Identificación válida del padre o madre que va a dar la autorización.</li>
          <li>Nombres y apellidos del menor que va a viajar.</li>
          <li>Fecha de nacimiento del menor.</li>
          <li>Nombres y apellidos de la persona que va a acompañar al menor.</li>
          <li>Información del vuelo.</li>
      </ul>
  
      <h2 style="font-weight: 500; font-size: 28px">¿Que tiempo de validez tienen las autorizaciones de viaje?</h2>
      <p class="text-muted">La autorización de viaje solo es válida por el tiempo que el menor vaya a estar fuera del país, entonces, terminado este periodo el documento
          pierde su validez automaticamente.  </p>
  
      <h2 style="font-weight: 500; font-size: 28px">¿En donde puedo realizar una autorización de viaje?</h2>
      <p class="text-muted">Acérquese a nuestra oficina con los requisitos necesarios y un asesor lo guiará para que realice el trámite de manera correcta y segura.</p>
  
      <h2 style="font-weight: 500; font-size: 28px">¿En que tiempo me entregan la autorización de viaje?</h2>
      <ul class="text-muted">
          <li>El tiempo de entrega es inmediato siempre que las personas que realiza el trámite se acerque con los requisitos correspondientes.</li>
      </ul>
      <p class="text-muted"><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
          <a href="https://www.facebook.com/notariapublicalatina/"><em>FanPage de Facebook</em></a><em>.</em></p>
          <div class="text-center mb-5">
            <a class="btn btn-lg btn-warning" href="{{route('web.contactenos')}}">Solicite su Trámite</a>
          </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-xl-3 col-lg-3">
      <div class="text-white rounded p-4 mb-4 shadow sticky" style="background-color: #2B384D">
        <p class="text-center h6">¿Requiere llevar a cabo una autorización de viaje?</p>
        <p class="text-center" style="font-size: 14px"><i class="fas fa-plane-departure text-warning"></i> Realice su solicitud de trámite ahora mismo</p>
        @include('z-form')
      </div>
    </div>
  </div>
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
        document.getElementById('prisection').style.backgroundImage = "url('img/autorizaciones-de-viaje.jpg')";
    });
  </script>
@endsection

