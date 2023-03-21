@extends('layouts.web')
@section('header')
<title>Apostillar Acta Constitutiva</title> 
<meta name="description"        content="¿Quiere entender todo el proceso para trámitar y apostillar una acta constitutiva?, aquí encontrará toda la información que necesitas.">       
<meta name="keywords"           content="apostillar acta constitutiva, como apostillar acta constitutiva" />

<meta property="og:url"         content="{{route('web.apostillar.acta.constitutiva')}}" />
<meta property="og:type"        content="article" />
<meta property="og:title"       content="Apostillar Acta Constitutiva - Notaria Latina" />
<meta property="og:description" content="¿Quiere entender todo el proceso para trámitar y apostillar una acta constitutiva?, aquí encontrará toda la información que necesitas." />
<meta property="og:image"       content="{{asset('img/acta-constitutiva-portada.jpg')}}" />

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
  @media screen and (max-width: 580px){.personalized-container{padding-left: 0px !important; padding-right: 0px !important}}
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
              <h1 class="font-weight-bold heading-title" >Apostillar Acta Constitutiva</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="personalized-container pt-4 text-justify">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-xl-9 col-lg-9">
      <p>Muy buenas mi estimado/a en esta p&aacute;gina le explicaremos c&oacute;mo obtener una apostilla para su acta constitutiva y qu&eacute; debe tener en cuenta al hacerlo. Adem&aacute;s, compartiremos algunos consejos &uacute;tiles para que el proceso sea lo m&aacute;s sencillo posible.&nbsp;</p>
  
      <p>&nbsp;</p>
      
      <p><strong><span style="color:#e74c3c">Si necesita ayuda con el apostillado de su acta constitutiva o tiene alguna otra pregunta sobre tr&aacute;mites legales, no dude en ponerse en contacto con nosotros al 800-742-8602 Estamos aqu&iacute; para ayudarle.</span></strong></p>
      
      <p>&nbsp;</p>
      <h2>&iquest;Qu&eacute; es un acta constituiva?</h2>
  
  <p>Un acta constitutiva es un documento que establece los t&eacute;rminos y condiciones para la creaci&oacute;n de una empresa o una organizaci&oacute;n. En &eacute;l se incluyen los detalles sobre la estructura y los objetivos de la empresa, as&iacute; como los derechos y deberes de sus miembros. Tambi&eacute;n se especifica la forma en que se tomar&aacute;n decisiones y se administrar&aacute; la empresa.</p>
  
  <p>El acta constitutiva es un documento fundamental para la creaci&oacute;n de una empresa, ya que establece sus bases y le da forma legal. Por lo general, se redacta al inicio de la empresa y se inscribe en el registro mercantil. A partir de ah&iacute;, la empresa comienza a operar de acuerdo a lo establecido en el acta constitutiva. Es importante tener en cuenta que el acta constitutiva puede ser modificada en el futuro, siempre y cuando se sigan los procedimientos establecidos para hacerlo.</p>
  
  <p>&nbsp;</p>
      
      <h2>&iquest;Qu&eacute; informaci&oacute;n debe incluir un acta constitutiva?</h2>
      
      <p>Un acta constitutiva debe incluir informaci&oacute;n esencial sobre la empresa, como su nombre, direcci&oacute;n, objetivo y estructura. Tambi&eacute;n puede incluir informaci&oacute;n sobre los accionistas o miembros de la empresa y sus responsabilidades.</p>
      
      <p>&nbsp;</p>
      
      <h2>&iquest;Por qu&eacute; es importante un acta constitutiva?</h2>
      
      <p>Un acta constitutiva es un documento esencial para cualquier empresa, ya que le da a la empresa existencia legal y le permite realizar actividades comerciales y adquirir activos. Adem&aacute;s, un acta constitutiva establece la estructura y los l&iacute;mites de la empresa y define las responsabilidades de sus miembros.</p>
      
      <p>&nbsp;</p>
      
      <h2>&iquest;Cu&aacute;ndo se necesita un acta constitutiva?</h2>
      
      <p>Un acta constitutiva se necesita cuando se establece una empresa o organizaci&oacute;n. En algunos pa&iacute;ses, se requiere que las empresas presenten un acta constitutiva para registrarse y obtener un n&uacute;mero de identificaci&oacute;n fiscal. En otros pa&iacute;ses, el acta constitutiva puede ser un documento interno que no se presenta a ning&uacute;n organismo gubernamental, pero que sigue siendo importante para establecer la existencia y estructura de la empresa.</p>
      
      <p>&nbsp;</p>
      
      <h2>&iquest;Qui&eacute;n puede firmar un acta constitutiva?</h2>
      
      <p>El acta constitutiva debe ser firmada por todos los fundadores o accionistas de la empresa. En algunos casos, tambi&eacute;n puede requerir la firma de un notario p&uacute;blico para garantizar su autenticidad.</p>
      
      <p>&nbsp;</p>
      
      <h2>&iquest;C&oacute;mo se puede modificar un acta constitutiva?</h2>
      
      <p>Para modificar un acta constitutiva, se debe seguir el proceso establecido por la ley de la empresa. Esto puede incluir la aprobaci&oacute;n de los accionistas o miembros de la empresa y la firma de una nueva acta constitutiva. Es importante tener en cuenta que las modificaciones a un acta constitutiva pueden afectar la estructura y responsabilidades de la empresa, por lo que es importante considerar cuidadosamente cualquier cambio antes de proceder.</p>
      
      <p>&nbsp;</p>
      
      <h2>&iquest;C&oacute;mo apostillar un acta constitutiva?</h2>
      
      <p>Para apostillar una acta constitutiva de una empresa latina en Estados Unidos, deber&aacute;s seguir estos pasos:</p>
      
      <ol>
          <li>Primero, aseg&uacute;rese de que el acta constitutiva est&eacute; firmada y sellada por un notario p&uacute;blico. Si no est&aacute; notariada, puedes acercarte a nuestras oficinas o enviarnos el documento y nosotros nos encargamos de todo el proceso.</li>
          <li>Una vez que tengas la apostilla, podr&aacute;s presentar el acta constitutiva en cualquier pa&iacute;s que haya ratificado la Convenci&oacute;n de la Haya sobre la Apostilla de Documentos P&uacute;blicos, que incluye la mayor&iacute;a de los pa&iacute;ses latinoamericanos.</li>
      </ol>
      
      <p>&nbsp;</p>
      
      <p>Es importante tener en cuenta que cada estado tiene sus propias leyes y regulaciones sobre c&oacute;mo obtener una apostilla, por lo que es recomendable consultar con el Departamento de Estado de su estado de residencia para obtener m&aacute;s informaci&oacute;n. Tambi&eacute;n es posible que se requiera una traducci&oacute;n oficial del documento al idioma del pa&iacute;s en el que planeas utilizar el acta constitutiva.</p>
      
      <p><br />
      <strong><span style="color:#e74c3c">Si necesitas ayuda con el apostillado de su acta constitutiva o tiene alguna otra pregunta sobre tr&aacute;mites legales, no dude en ponerse en contacto con nosotros al 800-742-8602 Estamos aqu&iacute; para ayudarle.</span></strong></p>
      <div class="text-center mb-5">
          <p class="text-muted"><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
            <a href="https://www.facebook.com/notariapublicalatina/"><em>FanPage de Facebook</em></a><em>.</em></p>
          <a class="btn btn-lg btn-warning" href="https://notarialatina.com/contactenos">Solicite su Trámite</a>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-xl-3 col-lg-3">
      <div class="text-white rounded p-4 mb-4 shadow sticky" style="background-color: #2B384D">
        <p class="text-center h6">¿Necesita apostillar una acta constitutiva?</p>
        <p class="text-center" style="font-size: 14px"><i class="far fa-file-check text-warning"></i> Apostille su documento ahora</p>
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
        document.getElementById('prisection').style.backgroundImage = "url('{{asset('img/acta-constitutiva-portada.jpg')}}')";
    });
  </script>
@endsection

