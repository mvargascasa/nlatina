@extends('layouts.web')
@section('header')
<title>Apostillar Carta de Naturalización</title> 
<meta name="description"        content="¿Quieres entender todo el proceso para tramitar una carta de naturalización?, aquí encontrarás toda la información que necesitas.">       
<meta name="keywords"           content="carta de naturalizacion, apostillar carta de naturalizacion, como apostillar carta de naturalizacion, donde apostillar carta de naturalizacion, apostillar carta de naturalizacion estados unidos" />

<meta property="og:url"         content="{{route('web.apostillar.naturalizacion')}}" />
<meta property="og:type"        content="article" />
<meta property="og:title"       content="Apostillar Carta de Naturalización - Notaria Latina" />
<meta property="og:description" content="¿Quieres entender todo el proceso para tramitar una carta de naturalización?, aquí encontrarás toda la información que necesitas." />
<meta property="og:image"       content="{{asset('img/apostillar-carta-de-naturalizacion.jpg')}}" />

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
              <h1 class="font-weight-bold heading-title" >Apostillar Carta de Naturalización</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="personalized-container pt-4">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-xl-9 col-lg-9">
      <p>La apostilla es un certificado internacional que confirma la autenticidad de un documento p&uacute;blico para que sea reconocido en otro pa&iacute;s.&nbsp;</p>
  
      <p>Si usted es latino y necesita apostillar una carta de naturalizaci&oacute;n para utilizarla en otro pa&iacute;s mientras se encuentra en Estados Unidos, es importante que conozca los pasos a seguir para obtener este certificado.&nbsp;</p>
      
      <p>En este art&iacute;culo, le ofrecemos una gu&iacute;a detallada sobre c&oacute;mo apostillar una carta de naturalizaci&oacute;n para latinos en Estados Unidos en nuestra notar&iacute;a Latina. Adem&aacute;s, le informamos sobre los requisitos y tr&aacute;mites necesarios para que el proceso sea r&aacute;pido y eficiente. Si sigue nuestras instrucciones, podr&aacute; utilizar su documento sin problemas en el pa&iacute;s que necesite.</p>
      
      <h2>&iquest;Qu&eacute; es una carta de naturalizaci&oacute;n?</h2>
      
      <p>Una carta de naturalizaci&oacute;n es un documento emitido por el gobierno de los EE. UU. que otorga la ciudadan&iacute;a a un ciudadano no estadounidense. Es equivalente al pasaporte de un ciudadano estadounidense.</p>
      
      <h2>&iquest;Qui&eacute;n puede solicitar una carta de naturalizaci&oacute;n?</h2>
      
      <p>Para solicitar una carta de naturalizaci&oacute;n, se deben cumplir ciertos requisitos. Por lo general, debe ser mayor de edad, haber vivido en los EE. UU. durante al menos cinco a&ntilde;os (tres a&ntilde;os si estuvo casado con un ciudadano de los EE. UU.), haber estado legalmente en los EE. UU. durante ese tiempo, exhibir buen car&aacute;cter y demostrar conocimientos b&aacute;sicos. de ingl&eacute;s e historia y gobierno de los Estados Unidos.</p>
      
      <h2>&iquest;Cu&aacute;les son los pasos para obtener una carta de naturalizaci&oacute;n?</h2>
      
      <p><strong>Para obtener una carta de naturalizaci&oacute;n, se deben seguir los siguientes pasos:</strong></p>
      
      <p>Complete y env&iacute;e el Formulario N-400, Solicitud de Naturalizaci&oacute;n.</p>
      
      <p>Entrevista con un oficial de los Servicios de Ciudadan&iacute;a e Inmigraci&oacute;n de los Estados Unidos (USCIS).</p>
      
      <p>Aprobar las pruebas de dominio del idioma ingl&eacute;s e historia y gobierno de EE. UU.</p>
      
      <p>Asistir a la ceremonia de juramentaci&oacute;n.</p>
      
      <p>&nbsp;</p>
      
      <h2>&iquest;Cu&aacute;nto tiempo se tarda en obtener una carta de naturalizaci&oacute;n?</h2>
      
      <p>El tiempo transcurrido en el proceso de naturalizaci&oacute;n puede variar en funci&oacute;n de cada situaci&oacute;n individual. Por lo general, puede llevar de varios meses a varios a&ntilde;os obtener una carta de naturalizaci&oacute;n.</p>
      
      <p>&nbsp;</p>
      
      <h2>&iquest;Qu&eacute; pasa si se pierde la carta de naturalizaci&oacute;n?</h2>
      
      <p>Si pierde su carta de naturalizaci&oacute;n, deber&aacute; presentar el Formulario N-565, Solicitud de Reemplazo del Certificado de Naturalizaci&oacute;n o Ciudadan&iacute;a. Tambi&eacute;n es posible que se requiera una prueba de ciudadan&iacute;a, como un pasaporte o un certificado de nacimiento.</p>
      
      <p>Es importante tener en cuenta que puede tomar varios meses obtener una nueva carta de naturalizaci&oacute;n, por lo que se recomienda conservar una copia de la misma en un lugar seguro. Si se necesita obtener una nueva carta de naturalizaci&oacute;n, es importante seguir todos los pasos del proceso y presentar todos los documentos necesarios para garantizar que el tr&aacute;mite se complete de manera efectiva.</p>
      
      <p>&nbsp;</p>
      
      <h2>&iquest;C&oacute;mo Apostillar una carta de naturalizaci&oacute;n en Estados Unidos?</h2>
      
      <p>Si usted necesita apostillar una carta de naturalizaci&oacute;n para utilizarla en otro pa&iacute;s y actualmente se encuentra en Estados Unidos, podemos ofrecerle asistencia para obtener el certificado internacional que confirma la autenticidad de su documento.</p>
      
      <p>En primer lugar, es necesario asegurarse de que la carta de naturalizaci&oacute;n est&eacute; firmada y sellada por una autoridad competente. A continuaci&oacute;n, debe identificar el pa&iacute;s donde necesitar&aacute; utilizar la carta de naturalizaci&oacute;n apostillada. Cada pa&iacute;s tiene un tratado de reconocimiento mutuo de documentos p&uacute;blicos con otros pa&iacute;ses, y la apostilla es el medio de hacer cumplir ese tratado.</p>
      
      <p>Una vez que haya determinado el pa&iacute;s donde necesitar&aacute; utilizar la carta de naturalizaci&oacute;n, puede acudir a la notar&iacute;a Latina para solicitar una apostilla. El proceso suele incluir la presentaci&oacute;n del documento original y una copia, el rellenado de un formulario de solicitud y el pago de una tarifa.</p>
      
      <p>La notar&iacute;a Latina se encargar&aacute; de verificar y sellar la carta de naturalizaci&oacute;n para que est&eacute; lista para ser utilizada en el pa&iacute;s donde necesite presentarla. Es importante tener en cuenta que cada pa&iacute;s tiene sus propias leyes y regulaciones en cuanto a la apostilla de documentos. Por lo tanto, es fundamental seguir las instrucciones de la notar&iacute;a Latina para garantizar que el proceso se lleve a cabo de manera correcta.</p>
      
      <p>Adem&aacute;s, es posible que sea necesario obtener una traducci&oacute;n jurada del documento al idioma del pa&iacute;s donde lo necesite utilizar. En nuestra&nbsp; notar&iacute;a Latina, contamos con profesionales capacitados para realizar traducciones de alta calidad y garantizar la exactitud y fiabilidad de la informaci&oacute;n contenida en el documento.</p>
      
      <p>En conclusi&oacute;n, apostillar una carta de naturalizaci&oacute;n en Estados Unidos es un proceso sencillo y r&aacute;pido si cuenta con la ayuda de una notar&iacute;a de confianza como nuestra notar&iacute;a Latina. Nos esforzamos por brindar un servicio profesional y eficiente para que pueda utilizar su documento en el pa&iacute;s que necesite sin problemas.</p>
      
      <p>&nbsp;</p>
      
      <p>Si est&aacute; considerando el proceso de obtener una carta de naturalizaci&oacute;n, lo invitamos a elegir a Notaria Latina como su aliada en este proceso. &iquest;Por qu&eacute; somos la mejor opci&oacute;n? Aqu&iacute; hay algunas razones:</p>
      
      <ol>
          <li>Experiencia y conocimiento: Nuestro equipo dedicado tiene una amplia experiencia en el proceso de naturalizaci&oacute;n y un conocimiento profundo de los requisitos y procedimientos necesarios para garantizar que el proceso sea lo m&aacute;s r&aacute;pido y eficiente posible. Lo ayudaremos a completar el formulario y reunir todos los documentos necesarios, y lo guiaremos a trav&eacute;s de cada paso del proceso.</li>
          <li>Servicio Personalizado: En Notaria Latina valoramos a cada cliente y entendemos que cada situaci&oacute;n es &uacute;nica. Hacemos esto brindando un servicio personalizado y atenci&oacute;n personalizada para garantizar que se cumplan sus necesidades y expectativas.</li>
          <li>C&oacute;modo y conveniente: Brindamos citas a medida y hacemos todo lo posible para que su proceso sea c&oacute;modo y conveniente. Nuestras oficinas notariales est&aacute;n convenientemente ubicadas y contamos con todas las herramientas necesarias para llevar a cabo el proceso de forma r&aacute;pida y sencilla.</li>
          <li>Precios competitivos: Nos esforzamos por ofrecer precios justos y competitivos por nuestros servicios sin comprometer su calidad. Entendemos que el proceso de naturalizaci&oacute;n puede ser costoso, pero nos gustar&iacute;a trabajar con usted para encontrar la mejor soluci&oacute;n y hacer que el proceso sea lo m&aacute;s conveniente posible.</li>
      </ol>
      <p class="text-muted"><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
        <a href="https://www.facebook.com/notariapublicalatina/"><em>FanPage de Facebook</em></a><em>.</em></p>
        <div class="text-center mb-5">
          <a class="btn btn-lg btn-warning" href="https://notarialatina.com/contactenos">Solicite su Trámite</a>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-xl-3 col-lg-3">
      <div class="text-white rounded p-4 mb-4 shadow sticky" style="background-color: #2B384D">
        <p class="text-center h6">¿Necesita apostillar una carta de naturalización?</p>
        <p class="text-center" style="font-size: 14px"> Lo ayudamos con la apostilla de este documento <i class="fas fa-check-square text-warning"></i></p>
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
        document.getElementById('prisection').style.backgroundImage = "url('{{asset('img/apostillar-carta-de-naturalizacion.jpg')}}')";
    });
  </script>
@endsection

