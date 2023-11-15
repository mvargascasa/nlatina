@extends('layouts.web')
@section('header')
<title>Certificaciones de Documentos en Queens New York - Notaria Latina</title> 
<meta name="description" content="Las certificaciones son documentos firmados y sellados por un notario, que le proporciona autenticidad a nuestros documentos, pueden ser utilizados en todo aquel trámite legale donde se requiera total veracidad.">       
<meta name="keywords" content="Certificaciones de Documentos Notarizados y Apostillados en Queens New York, Certificaciones de Documentos near me, notaria, notaria latina, notario publico, notary public near me, notario cerca de mi, notario publico near me, notaría nueva york, notary public queens, que es una certificacion, para que sirve una certificacion, certificar acta de nacimiento en new york, certificar acta de matrimonio en new york, certificar declaracion jurada en new york, certificar documentos cerca de mi, notarizar certificacion en new york" />

<meta property="og:url"                content="{{route('web.certificaciones')}}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="Certificaciones de Documentos Notarizados y Apostillados en Queens New York - Notaria Latina" />
<meta property="og:description"        content="Las certificaciones son documentos firmados y sellados por un notario, que le proporciona autenticidad a nuestros documentos, pueden ser utilizados en todo aquel trámite legale donde se requiera total veracidad." />
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

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Certificaciones</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="personalized-container pt-4">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-xl-9 col-lg-9">
      <h2 style="font-weight: 500; font-size: 28px">Realizamos Certificaciones de documentos.</h2>
            <p class="text-muted">Las certificaciones son documentos firmados y sellados por un notario.</p>
            <p class="text-muted">Este trámite consta en una firma y sello en la que se declara que la copia emitida es fiel copia del documento original.</p>
            <p class="text-muted">Es decir, es un documento que el mismo notario expide o en base a un documento preexistente, así como la afirmación de que
                una transcripción o reproducción coincide fielmente con su original.</p>

            <h2 style="font-weight: 500; font-size: 28px">¿Para que me sirven las certificaciones?</h2>
            <p class="text-muted">Al ser la certificación un documento que le proporciona autenticidad a nuestros documentos, pueden ser utilizados
                en todo aquel trámite legal donde se requiera total veracidad.</p>
            <p class="text-muted">Esta certificación nos sirve para realizar tanto trámites nacionales como internacionales.</p>
            <p class="text-muted">Es importante que certifique documentos que puedan estar en deterioro para evitar gestionar este documento desde un
                inicion. Esto le evitará contratiempos a la hora de realizar trámites y gestiones importantes.</p>

            <h2 style="font-weight: 500; font-size: 28px">¿Qué tipo de documentos puedo certificar?</h2>
            <ul class="text-muted">
                <li>Actas de nacimiento.</li>
                <li>Actas de matrimonio.</li>
                <li>Cartas.</li>
                <li>Licencias de conducir.</li>
                <li>Declaraciones juradas.</li>
                <li>Escrituras.</li>
            </ul>

        <h2 style="font-weight: 500; font-size: 28px">¿Qué validez tienen las certificaciones?</h2>
        <p class="text-muted">Cualquier documento que sea certificado tiene la misma validez que el documento original, no vence en el tiempo y se puede
            utilizar el cualquier trámite legal que se necesite.</p>

        <h2 style="font-weight: 500; font-size: 28px">¿Que requisitos necesito para certificar un documento?</h2>
        <p class="text-muted">El único requisito es presentar el documento original que desea certificar, siempre que el notario pueda constatar que este es original.</p>

        <h2 style="font-weight: 500; font-size: 28px">¿En donde puedo certificar un documento?</h2>
        <p class="text-muted">Acérquese a nuestra oficina con el documento que desea certificar y un asesor lo guiará para que realice el trámite de manera correcta y segura.</p>




        <h2 style="font-weight: 500; font-size: 28px">¿En que tiempo me entregan mi documento certificado?</h2>
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
        <p class="text-center h6">¿Requiere certificar algún documento?</p>
        <p class="text-center" style="font-size: 14px"><i class="fas fa-file text-warning"></i> Lo ayudamos con la certificación de su documento</p>
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
        document.getElementById('prisection').style.backgroundImage = "url('img/inicio.jpg')";
    });
  </script>
@endsection

