@extends('layouts.web')
@section('header')
<title>Testamentos Notarizados y Apostillados en Queens New York</title> 
<meta name="description"        content="Los testamentos son documentos legales que reflejan la voluntad de una persona de distribuir sus bienes entre las personas que él considere después de su muerte.">       
<meta name="keywords"           content="Testamentos Notarizados y Apostillados en Queens New York, Testamentos Notarizados y Apostillados near me, notaria latina, notario publico, notary public near me, notario cerca de mi, notario publico near me, notaría nueva york, notary public queens, que es un testamento, para que sirve un testamento, requisitos para testamento, realizar un testamento en new york, notarizar testamento en new york" />

<meta property="og:url"         content="{{route('web.testamentos')}}" />
<meta property="og:type"        content="article" />
<meta property="og:title"       content="Testamentos Notarizados y Apostillados en Queens New York - Notaria Latina" />
<meta property="og:description" content="Los testamentos son documentos legales que reflejan la voluntad de una persona de distribuir sus bienes entre las personas que él considere después de su muerte." />
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

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Testamentos</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="personalized-container pt-4">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-xl-9 col-lg-9">
      <h2 style="font-weight: 500; font-size: 28px">Los testamentos son documentos legales que reflejan la voluntad de una persona de distribuir sus bienes entre las personas que él considere después de su muerte.</h2>
      <p class="text-muted">El documento tiene que realizarse en una notaría para que tenga validez y pueda ejecutarse de acuerdo a la voluntad del testador.</p>
      <p class="text-muted">Con la creación de su testamento usted puede evitar futuros inconvenientes familiares en la división de bienes ya que en éste documento usted define la división a su voluntad y este debe respetarse.</p>

      <h2 style="font-weight: 500; font-size: 28px">¿Que requisitos se necesita para realizar testamentos?</h2>
      <ul class="text-muted">
        <li>Presentar una identificación válida del testador.</li>
        <li>Nombres y apellidos del albacea.</li>
        <li>Nombres y apellidos de dos testigos.</li>
        <li>Información del patrimonio que se desea heredar.</li>
        <li>Información de los herederos.</li>
      </ul>

      <h2 style="font-weight: 500; font-size: 28px">Tipos de testamentos</h2>

      <h3><span style="font-size:16pt; font-weight: 500;"><span style="font-family:Arial"><span style="color:#000000">Testamento ol&oacute;grafo</span></span></span></h3>

      <p><span style="font-size:11pt"><span style="font-family:Arial"><span class="text-muted">Es un testamento escrito a mano y firmado por el testador (la persona que hace el testamento). Este tipo de testamento es v&aacute;lido siempre que cumpla con todos los requisitos legales, como estar escrito en un documento separado y firmado y fechado por el testador. Es importante tener en cuenta que un testamento ol&oacute;grafo debe encontrarse despu&eacute;s de la muerte del testador para que sea v&aacute;lido.</span></span></span></p>
  
      <h3><span style="font-size:16pt; font-weight: 500;"><span style="font-family:Arial"><span style="color:#000000">Testamento Cerrado</span></span></span></h3>
  
      <p><span style="font-size:11pt; "><span style="font-family:Arial"><span class="text-muted">Un testamento redactado por un notario y sellado en un sobre cerrado. El notario redacta el testamento de acuerdo con las instrucciones del testador y lo sella en un sobre sellado despu&eacute;s de redactarlo. Un testamento cerrado no se abre hasta que el testador muere.</span></span></span></p>
  
      <h3><span style="font-size:16pt; font-weight: 500; "><span style="font-family:Arial"><span style="color:#000000">Testamento p&uacute;blico</span></span></span></h3>
  
      <p><span style="font-size:11pt"><span style="font-family:Arial"><span class="text-muted">testamento redactado por un notario p&uacute;blico y firmado por el testador en presencia de testigos. Un testamento p&uacute;blico se lee p&uacute;blicamente despu&eacute;s de la muerte del testador y es v&aacute;lido siempre que se cumplan todos los requisitos legales.</span></span></span></p>
  
      <h3><span style="font-size:16pt; font-weight: 500;"><span style="font-family:Arial"><span style="color:#000000">Testamento Internacional</span></span></span></h3>
  
      <p><span style="font-size:11pt"><span style="font-family:Arial"><span class="text-muted">Un testamento redactado por un notario p&uacute;blico y reconocido en varios pa&iacute;ses. Este tipo de testamento es &uacute;til para las personas que poseen bienes en diferentes pa&iacute;ses y quieren asegurarse de que su testamento sea v&aacute;lido en todos los pa&iacute;ses.</span></span></span></p>
  
      <h2 style="font-weight: 500; font-size: 28px">¿En donde puedo realizar un testamento?</h2>
      <p class="text-muted">Acérquese a nuestra oficina y solicite empezar su proceso, nuestro personal le va asesorar de la mejor manera para que éste trámite se lleve a cabo de manera correcta y segura.</p>

      <h2 style="font-weight: 500; font-size: 28px">¿En que tiempo me entregan un testamento?</h2>
      <ul class="text-muted">
        <li>El tiempo de entrega dentro de los Estados Unidos es de 24 horas.</li>
        <li>El tiempo de entrega fuera de los Estados Unidos es de 3 días laborables.</li>
        <li>El documento digital estará disponible en 24 horas.</li>
        <li class="text-danger">Por motivos de codiv-19 puede existir retraso en los tiempos de entrega.</li>
      </ul>

      <p class="text-muted"><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
      <a href="https://www.facebook.com/notariapublicalatina/"><em>FanPage de Facebook</em></a><em>.</em></p>
      <div class="text-center mb-5">
        <a class="btn btn-lg btn-warning" href="https://notarialatina.com/contactenos">Solicite su Trámite</a>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-xl-3 col-lg-3">
      <div class="text-white rounded p-4 mb-4 shadow sticky" style="background-color: #2B384D">
        <p class="text-center h6">¿Requiere realizar un trámite con este documento?</p>
        <p class="text-center" style="font-size: 14px"><i class="fas fa-check-circle text-warning"></i> Lo ayudamos en el proceso</p>
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
        document.getElementById('prisection').style.backgroundImage = "url('img/testamento.jpg')";
    });
  </script>
@endsection

