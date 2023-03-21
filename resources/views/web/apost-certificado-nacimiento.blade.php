@extends('layouts.web')
@section('header')
<title>Apostillar Certificado de Nacimiento</title> 
<meta name="description"        content="¿Quiere apostillar una partida de nacimiento? Aquí encontrará la mejor información y el equipo notarial mas calificado para hacerlo un trámite rápido y sencillo para usted">       
<meta name="keywords"           content="apostillar certificado de nacimiento, apostilla de partida de nacimiento, como apostillar partida de nacimiento, partida de nacimiento, certificado de nacimiento" />

<meta property="og:url"         content="{{route('web.apostillar.nacimiento')}}" />
<meta property="og:type"        content="article" />
<meta property="og:title"       content="Apostillar Certificado de Nacimiento - Notaria Latina" />
<meta property="og:description" content="¿Quiere apostillar una partida de nacimiento? Aquí encontrará la mejor información y el equipo notarial mas calificado para hacerlo un trámite rápido y sencillo para usted" />
<meta property="og:image"       content="{{asset('img/apostillar-certificado-de-nacimiento.jpg')}}" />

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

<section id="prisection" style="background-size: cover;background-position: center; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Apostillar Certificado de Nacimiento</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="personalized-container pt-4 text-justify">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-xl-9 col-lg-9">
      <p>Los certificados de nacimiento son documentos esenciales que demuestran nuestra identidad y ciudadan&iacute;a. En Estados Unidos, estos certificados son emitidos por las oficinas de registro de nacimientos de cada estado y son necesarios para realizar una amplia variedad de tr&aacute;mites, como solicitar un pasaporte, inscribirse en una escuela o obtener una licencia de conducir. En este art&iacute;culo, explicaremos todo lo relacionado con los certificados de nacimiento en Estados Unidos, desde c&oacute;mo obtener uno hasta c&oacute;mo utilizarlo para realizar diferentes tr&aacute;mites. Adem&aacute;s, tambi&eacute;n abordaremos temas como la apostilla de un certificado de nacimiento y c&oacute;mo proteger nuestra informaci&oacute;n personal en el certificado. Si est&aacute;s interesado en aprender m&aacute;s sobre los certificados de nacimiento en Estados Unidos, &iexcl;sigue leyendo!</p>
  
      <p>&nbsp;</p>
      
      <h2>&iquest;D&oacute;nde puedo obtener un certificado de nacimiento en Estados Unidos?</h2>
      
      <p>Los certificados de nacimiento en Estados Unidos son emitidos por las oficinas de registro de nacimientos de cada estado. Puedes obtener un certificado de nacimiento solicit&aacute;ndolo a la oficina de registro de nacimientos del estado en el que naciste.</p>
      
      <p>&nbsp;</p>
      
      <h2>&iquest;Cu&aacute;les son los requisitos para obtener un certificado de nacimiento en Estados Unidos?</h2>
      
      <p>&nbsp;</p>
      
      <p>Los requisitos para obtener un certificado de nacimiento en Estados Unidos pueden variar seg&uacute;n el estado en el que est&eacute;s solicitando el certificado. En general, necesitar&aacute;s presentar pruebas de tu identidad y de tu ciudadan&iacute;a, as&iacute; como informaci&oacute;n sobre tu lugar de nacimiento y tus padres. Es posible que tambi&eacute;n debas pagar una tarifa para obtener el certificado.</p>
      
      <p>&nbsp;</p>
      
      <h2>&iquest;Cu&aacute;nto tiempo lleva obtener un certificado de nacimiento en Estados Unidos?</h2>
      
      <p>El tiempo que lleva obtener un certificado de nacimiento en Estados Unidos puede variar seg&uacute;n el estado en el que est&eacute;s solicitando el certificado y la cantidad de tr&aacute;mite que deba realizarse. En algunos casos, es posible que puedas obtener un certificado en el mismo d&iacute;a en que lo solicitas, mientras que en otros casos puede tomar varios d&iacute;as o incluso semanas. Es importante considerar este tiempo al planificar cualquier tr&aacute;mite que requiera un certificado de nacimiento.</p>
      
      <p>&nbsp;</p>
      
      <h2>&iquest;Cu&aacute;nto cuesta obtener un certificado de nacimiento en Estados Unidos?</h2>
      
      <p>El costo de obtener un certificado de nacimiento en Estados Unidos puede variar seg&uacute;n el estado en el que est&eacute;s solicitando el certificado y la cantidad de tr&aacute;mite que deba realizarse. En general, es posible que debas pagar una tarifa para obtener el certificado. Es importante verificar el costo exacto con la oficina de registro de nacimientos del estado en el que est&eacute;s solicitando el certificado antes de presentar tu solicitud.</p>
      
      <p>&nbsp;</p>
      
      <h2>&iquest;Puedo obtener un certificado de nacimiento en l&iacute;nea en Estados Unidos?</h2>
      
      <p>En algunos casos, es posible obtener un certificado de nacimiento en l&iacute;nea en Estados Unidos. Cada estado tiene su propio proceso para solicitar certificados de nacimiento en l&iacute;nea, por lo que es importante verificar las instrucciones espec&iacute;ficas del estado en el que te encuentres.</p>
      
      <p>&nbsp;</p>
      
      <h2>&iquest;C&oacute;mo apostillar un certificado o partida de nacimiento en Estados Unidos?</h2>
      
      <p>Para apostillar un certificado de nacimiento en una notar&iacute;a en Estados Unidos, debes seguir los siguientes pasos:</p>
      
      <ol>
          <li><strong>Obt&eacute;n una copia certificada del certificado de nacimiento:</strong> Primero debes obtener una copia certificada del certificado de nacimiento. Esto se puede hacer solicitando una copia del certificado a la oficina de registro de nacimientos del lugar donde naciste.</li>
          <li><strong>Lleva o env&iacute;a la copia certificada del certificado de nacimiento a una de nuestras oficinas en:</strong></li>
      </ol>
      
      <p><strong>New York</strong></p>
      
      <p><a href="https://g.page/notariapublicalatina">67-03 Roosevelt Avenue, Woodside, NY 11377</a></p>
      
      <p>&nbsp;718 766 5041/ 347 973 9888</p>
      
      <p><strong>New Jersey</strong></p>
      
      <p><a href="https://g.page/r/CVNRV-zNuJiZEAE">1146 East Jersey St Elizabeth, NJ 07201</a></p>
      
      <p>&nbsp;908 800 9046</p>
      
      <p><strong>Florida</strong></p>
      
      <p><a href="https://g.page/r/CeRrwPx_W2-xEAE">2104 N University Dr, Sunrise, FL 33322</a></p>
      
      <p>&nbsp;305 600 3290<br />
      &nbsp;</p>
      
      <ol start="3">
          <li>Presenta la copia certificada del certificado de nacimiento y cualquier otro documento requerido dependiendo del Estado donde te encuentres.</li>
          <li><strong>Recibe la apostilla:</strong> Una vez que hayas cumplido con todos los requisitos y hayas pagado la tarifa correspondiente, e entregaremos la apostilla en un plazo de 24 a 72 horas. Es importante guardar esta apostilla de manera segura, ya que es necesaria para verificar la autenticidad del certificado de nacimiento en otro pa&iacute;s.</li>
      </ol>
      <div class="text-center">
          <p class="text-muted"><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
            <a href="https://www.facebook.com/notariapublicalatina/"><em>FanPage de Facebook</em></a><em>.</em></p>
            <div class="text-center mb-5">
              <a class="btn btn-lg btn-warning" href="https://notarialatina.com/contactenos">Solicite su Trámite</a>
            </div>
    </div>
  </div>
  <div class="col-12 col-sm-12 col-md-12 col-xl-3 col-lg-3">
    <div class="text-white rounded p-4 mb-4 shadow sticky" style="background-color: #2B384D">
      <p class="text-center h6">¿Esta buscando donde apostillar un certificado de nacimiento en Estados Unidos?</p>
      <p class="text-center" style="font-size: 14px"><i class="fas fa-check text-warning"></i> Solicite aquí su trámite</p>
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
        document.getElementById('prisection').style.backgroundImage = "url('{{asset('img/apostillar-certificado-de-nacimiento.jpg')}}')";
    });
  </script>
@endsection

