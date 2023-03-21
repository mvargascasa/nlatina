@extends('layouts.web')
@section('header')
<title>Poderes Notarizados y Apostillados en Queens New York</title> 
<meta name="description"        content="Encuentre aquí toda la información que necesita sobre poderes generales. Le facilitamos también nuestro servicio de asesoría profesional.¡Ingrese ahora!">       
<meta name="keywords"           content="poder general, que es un poder general, que es el poder general, que es un poder notarial general, que se necesita para dar un poder general, como tramitar un poder general, como solicitar un poder general, solicitar poder general en estados unidos" />

<meta property="og:url"         content="{{route('web.poderes')}}" />
<meta property="og:type"        content="article" />
<meta property="og:title"       content="Poderes Generales" />
<meta property="og:description" content="Encuentre aquí toda la información que necesita sobre poderes generales. Le facilitamos también nuestro servicio de asesoría profesional.¡Ingrese ahora!" />
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
<script>
  setTimeout(() => {
    document.getElementById('scriptrecaptcha').src = "https://www.google.com/recaptcha/api.js?render=6LdI9cMeAAAAALgxUrh7mzlzFBlIV-F4Gzvbp2D8"; 
      //console.log('cargando script recaptcha...');
    document.getElementById('iframevideo').src="https://www.youtube.com/embed/AHE8EC0wsNA";
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
  @media screen and (max-width: 580px){.personalized-container{padding-left: 0px !important; padding-right: 0px !important}}
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
              <h1 class="font-weight-bold heading-title">Poderes Generales</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

  <div class="personalized-container pt-4">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-xl-9 col-lg-9">
        <h2 style="font-weight: 500; font-size: 28px">¿Qué es un poder notarial general?</h2>
    
       <p class="text-muted"> Los acuerdos de <strong>poder notarial general</strong> permiten que un agente (apoderado) actúe en nombre del principal (Poderdante o persona que da el poder) en una amplia gama de asuntos financieros que pueden  vender acciones, 
        administrar beneficios gubernamentales como la seguridad social, manejar cuentas bancarias, enajenar o adquirir bienes raíces y hacer mucho más con este tipo de poder.</p>
    
        <p class="text-muted">
            En un poder notarial general hay dos partes, un mandante y un agente,
        establecen una relación en la que el mandante selecciona al agente para manejar sus asuntos relacionados con las finanzas en su nombre, lo cual se acuerda por escrito
        tal. El documento generalmente otorga amplias autorizaciones al agente. 
        </p>
    
    
                <p class="text-muted">Es posible que esté tratando de ayudar a un padre anciano a administrar sus finanzas. Si está discapacitado debido a una enfermedad, es posible que desee que se respeten sus deseos. En cualquier caso, el documento que necesita se llama poder notarial. Le permite designar a un agente que puede tomar decisiones en su nombre.
                         Hablar sobre la redacción de un poder notarial puede ser una rara oportunidad para discutir estos temas con un ser querido. Pero los poderes específicos otorgados, dependen del idioma del documento, por lo que es importante comprender la diferencia entre un poder notarial y un poder duradero.
                </p>
                <p class="text-muted">Hablar sobre la redacción de un poder notarial puede ser una rara oportunidad para discutir estos temas con un ser querido.
                     Pero los poderes específicos otorgados, dependen del idioma del documento, por lo que es importante comprender la diferencia entre un poder notarial y un poder duradero.
                    </p>
    
                    
          <div class="bg-light p-3 mb-3">
            <p style="text-align:center"><strong>&iexcl;Ll&aacute;menos y reciba asesor&iacute;a sobre como apostillar tus documentos!</strong></p>
            <p style="text-align:center"><a href="https://emojiterra.com/es/flecha-hacia-derecha/">➡️ ➡️</a>&nbsp;☎<a href="tel:+18007428602" onclick="gtag_report_conversion('tel:+18007428602');gtag('event', 'click', { 'event_category': 'Seguimiento de llamadas', 'event_label': 'HomePage:', 'value': '0'});">&nbsp;800-742-8602</a>&nbsp;⬅&nbsp;⬅</p>
          </div>
    
                <h2 style="font-weight: 500; font-size: 28px">Diferencias entre los tipos de poderes notariales</h2>
                <p class="text-muted">Hay varios tipos de poder notarial.</p>
                
                    <p class="text-muted">Los más comunes son los <a href="https://notarialatina.com/poderes-especiales">poderes especiales</a>, generales y médicos. .</p>
    
                    <p class="text-muted">Un poder notarial general otorga <strong>amplios poderes legales</strong> para actuar en nombre de una persona, incluida la presentación de declaraciones de impuestos, el pago de facturas, el préstamo de dinero y más. 
                    </p>
    
                    <p class="text-muted">
                        Está diseñado para otorgar al agente amplios poderes sin que usted tenga que anticipar todas las situaciones legales posibles por adelantado.
                    </p>
                    <p class="text-muted">
                        Por el contrario, los poderes especiales están escritos para ser limitados y requieren que describa cada autorización otorgada. Puede designar el control sobre un conjunto específico de asuntos, como decisiones comerciales o declaraciones de impuestos, o puede estar redactado para referirse a una enfermedad específica. 
                    </p>
                    <p class="text-muted">
                        Asimismo, un poder notarial para el cuidado de la salud otorga autoridad limitada con respecto al tratamiento médico permitido.
                    </p>
    
    
                <h2 style="font-weight: 500; font-size: 28px">¿Cuál es la diferencia entre un poder notarial duradero y un poder notarial general?</h2>
                <p class="text-muted">
                    El poder notarial general termina cuando usted queda incapacitado. Es una herramienta legal eficaz en cualquier situación, incluida la ayuda para asumir la responsabilidad legal de un ser querido.
                     Pero debido a su falta de durabilidad bajo presión, no es adecuado para varias decisiones importantes al final de su vida útil.
                </p>
                <p class="text-muted">
                    Cuando un poder notarial es duradero, significa que el lenguaje en el documento indica que los poderes del abogado seguirán aplicándose si usted queda incapacitado.
                     No existe una fecha de caducidad automática cuando caducan estos derechos. Un poder notarial perdurable está vigente hasta que el mandante fallece o usted toma acción para revocar el poder notarial que le otorgó al agente.
    
                </p>
                <p class="text-muted">
                    <strong>Otra cosa a tener en cuenta es que algunos estados tratan un poder notarial como un poder notarial
                         duradero a menos que se indique explícitamente lo contrario.</strong>
                </p>
                <p class="text-muted">
                    No quiere estar en una situación en la que tenga que esperar semanas para que la corte lo ayude. 
                    No desea esperar a que un juicio funcione a su favor o trabajar a tiempo para ayudar a su ser querido. 
                </p>
                <p class="text-muted">
                    Ya sea que se use un poder general o un poder especial, es importante tener un poder, ya sea duradero o no. 
                    Es una buena idea volver a visitar cada año para asegurarse de que todo esté en orden.
                </p>
                <div class="bg-light p-3 mb-3">
                  <p style="text-align:center"><strong>&iexcl;Ll&aacute;menos y reciba asesor&iacute;a sobre como apostillar tus documentos!</strong></p>
                  <p style="text-align:center"><a href="https://emojiterra.com/es/flecha-hacia-derecha/">➡️ ➡️</a>&nbsp;☎<a href="tel:+18007428602" onclick="gtag_report_conversion('tel:+18007428602');gtag('event', 'click', { 'event_category': 'Seguimiento de llamadas', 'event_label': 'HomePage:', 'value': '0'});">&nbsp;800-742-8602</a>&nbsp;⬅&nbsp;⬅</p>
                </div>
        <div class="text-center mb-5">
            <a class="btn btn-lg btn-warning" href="https://notarialatina.com/contactenos">Solicite su Trámite</a>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-xl-3 col-lg-3">
        <div class="text-white rounded p-4 mb-4 shadow sticky" style="background-color: #2B384D">
          <p class="text-center h6">¿Esta buscando cómo tramitar un poder general en Estados Unidos?</p>
          <p class="text-center" style="font-size: 14px"><i class="fas fa-check-double text-warning"></i> Lo ayudamos con la gestión de este documento</p>
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
        document.getElementById('prisection').style.backgroundImage = "url('img/que-es-un-poder-general.jpg')";
    });
  </script>
@endsection

