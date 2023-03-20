@extends('layouts.web')
@section('header')
<title>Affidávit Notarizados y Apostillados en Queens New York</title> 
<meta name="title" content="Affidávit Notarizados y Apostillas en Queens New York - Notaria Latina">
<meta name="description" content="Una declaración jurada o Affidávit es una manifestación escrita o verbal cuya veracidad es asegurada mediante un juramento ante una autoridad judicial o administrativa.">       
<meta name="keywords" content="Affidávit Notarizados y Apostillados en Queens New York, Affidávit Notarizados y Apostillados near me, notaria latina, notario publico, notary public near me, notario cerca de mi, notario publico near me, notaría nueva york, notary public queens, que es un affidavit, para que sirve un affidavit, como hacer una declaracion jurada, requisitos affidavit, obtener affidavit en new york, declaracion jurada en new york" />

<meta property="og:url"                content="{{route('web.affidavit')}}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="Affidávit Notarizados y Apostillados en Queens New York - Notaria Latina" />
<meta property="og:description"        content="Una declaración jurada o Affidávit es una manifestación escrita o verbal cuya veracidad es asegurada mediante un juramento ante una autoridad judicial o administrativa." />
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

<section id="prisection" style="background-size: cover;background-position: left center; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Affidávit</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="personalized-container pt-4">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-xl-9 col-lg-9">
      <h2 style="font-weight: 500; font-size: 28px">Realizamos Declaraciones Juradas (Affidávit).</h2>
      <p class="text-muted">Una declaración jurada o Affidávit es una manifestación escrita o verbal cuya veracidad es asegurada mediante un juramento
          ante una autoridad judicial o administrativa.</p>
      <p class="text-muted">Esto hace que el contenido de la declaración sea tomado como cierto hasta que se demuestre lo contrario.</p>
  
      <h2 style="font-weight: 500; font-size: 28px">¿Para que sirve un Affidávit?</h2>
      <p class="text-muted">Este documento es necesario para algunos trámites de inmigración cuando quieres solicitar que un familiar obtenga la visa o
          residencia en Estados Unidos.</p>
      <p class="text-muted">Este documento del affidavit también se conoce entre los migrantes como declaración jurada de sostenimiento, mantenimiento o
          solvencia económica.</p>
  
      <h2 style="font-weight: 500; font-size: 28px">¿Que requisitos necesito para realizar los acuerdos?</h2>
      <ul class="text-muted">
          <li>Identificación válida de la persona que va a realizar la declaración jurada.</li>
          <li>Información de lo que se quiere dejar estipulado en el documento.</li>
      </ul>
  
      <h2 style="font-weight: 500; font-size: 28px">¿Donde puedo realizar un acuerdo?</h2>
      <p class="text-muted">Acérquese a nuestra oficina y un asesor lo guiará en la gestión del documento para que realice el trámite de manera correcta y segura.</p>
  
      <h2 style="font-weight: 500; font-size: 28px">¿En que tiempo me entregan un Affidávit?</h2>
      <ul class="text-muted">
          <li>El tiempo de entrega dentro de los Estados Unidos es de 24 horas.</li>
          <li>El tiempo de entrega fuera de los Estados Unidos es de 3 días laborables.</li>
          <li>El documento digital estará disponible en 24 horas.</li>
          <li class="text-danger">Por motivos de codiv-19 puede existir retraso en los tiempos de entrega.</li>
      </ul>
      <p class="text-muted"><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
          <a href="https://www.facebook.com/notariapublicalatina/"><em>FanPage de Facebook</em></a><em>.</em></p>
          <div class="text-center mb-5">
            <a class="btn btn-lg btn-warning" href="{{route('web.contactenos')}}">Solicite su Trámite</a>
          </div>
    
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-xl-3 col-lg-3">
      <div class="text-white rounded p-4 mb-4 shadow sticky" style="background-color: #2B384D">
        <p class="text-center h6">¿Necesita realizar una declaración juramentada?</p>
        <p class="text-center" style="font-size: 14px"><i class="fas fa-check-circle text-warning"></i> Contáctenos y un asesor se comunicará con usted</p>
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
        document.getElementById('prisection').style.backgroundImage = "url('img/affidavit.jpg')";
    });
  </script>
@endsection

