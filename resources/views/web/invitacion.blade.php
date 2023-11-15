@extends('layouts.web')
@section('header')
<title>Cartas de Invitación Notarizadas en Queens New York</title> 
<meta name="description"        content="Las cartas de invitación son un requisito válido que se presenta ante el consulado que lo requiera para la gestión de la visa de turista; la carta tiene que ser genuina y contener datos reales.">       
<meta name="keywords"           content="Cartas de Invitación Notarizadas y Apostilladas en Queens New York, Cartas de Invitación near me, notaria latina, notario publico, notary public near me, notario cerca de mi, notario publico near me, notaría nueva york, notary public queens, que es una carta de invitacion, para que sirve la carta de invitacion, donde puedo realizar una carta de invitacion, realizar carta de invitacion cerca de mi, tramitar carta de invitacion cerca de mi, tramitar carta de invitacion en new york" />

<meta property="og:url"         content="{{route('web.invitacion')}}" />
<meta property="og:type"        content="article" />
<meta property="og:title"       content="Cartas de Invitación Notarizadas y Apostilladas en Queens New York - Notaria Latina" />
<meta property="og:description" content="Las cartas de invitación son un requisito válido que se presenta ante el consulado que lo requiera para la gestión de la visa de turista; la carta tiene que ser genuina y contener datos reales." />
<meta property="og:image"       content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />

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
<script defer src="{{ asset('js/navbar-style-v1.1.js') }}"></script>
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

<section id="prisection" style="background-size: cover;background-position: left center; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Cartas de Invitación</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="personalized-container pt-4">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-xl-9 col-lg-9">
      <h2 style="font-weight: 500; font-size: 28px">Realizamos cartas de invitación de forma segura y efectiva.</h2>
      <p class="text-muted">Las cartas de invitación son un requisito válido que se presenta ante el consulado que lo requiera para la
          gestión de la visa de turista; la carta tiene que ser genuina y contener datos reales de la persona que va a realizarla.</p>
  
      <h2 style="font-weight: 500; font-size: 28px">¿Para que me sirven las cartas de invitación?</h2>
      <p class="text-muted">Puede ser utilizada para acompañar una solicitud de visa como turista para visitar a un familiar o amigo
          que reside en otro país. Es así que esta carta es un documento de presentación voluntaria que puede ayudar a obtener la visa.</p>
      <p class="text-muted">Por lo tanto, la persona que realiza la invitación tiene que ser un ciudadano que goce de todos los
          privilegios de su país y que además pueda soportar los gastos del viaje y estadía de la persona a la que invita.</p>
  
      <h2 style="font-weight: 500; font-size: 28px">¿Que requisitos necesito para hacer una carta de invitación?</h2>
      <ul class="text-muted">
          <li>Identificación válida de la persona que realiza la invitación.</li>
          <li>Nombres y apellidos de la persona a la que se quiere invitar.</li>
          <li>Presentar soporte de ingresos.</li>
      </ul>
  
      <h2 style="font-weight: 500; font-size: 28px">¿En donde puedo realizar una carta de invitación?</h2>
      <p class="text-muted">Acérquese a nuestra oficina con los requisitos necesarios y nuestros asesores le guiarán en la redacción de su carta y en la certificación de la misma.</p>
      
      
      <h2 style="font-weight: 500; font-size: 28px">¿En que tiempo me entregan mi carta de invitación?</h2>
      <ul class="text-muted">
          <li>El tiempo de entrega normal es de 25 días laborables</li>
          <li>Contamos con un servicio <strong>express</strong> de 5 días laborables</li>
      </ul>
      <p class="text-muted"><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
          <a href="https://www.facebook.com/notariapublicalatina/"><em>FanPage de Facebook</em></a><em>.</em></p>
          <div class="text-center mb-5">
            <a class="btn btn-lg btn-warning" href="{{route('web.contactenos')}}">Solicite su Trámite</a>
          </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-xl-3 col-lg-3">
      <div class="text-white rounded p-4 mb-4 shadow sticky" style="background-color: #2B384D">
        <p class="text-center h6">¿Requiere elaborar una carta de invitación?</p>
        <p class="text-center" style="font-size: 14px"><i class="fas fa-check-circle text-warning"></i> Elabore su carta de inmediato</p>
        @include('web.serv-form')
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
        document.getElementById('prisection').style.backgroundImage = "url('img/cartas-de-invitacion.jpg')";
    });
  </script>
@endsection

