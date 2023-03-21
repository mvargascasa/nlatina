@extends('layouts.web')
@section('header')
<title>Apostillar Poder Notarial</title> 
<meta name="description"        content="¿Quiere apostillar un poder notarial? Aquí encontrará la mejor información y el equipo notarial mas calificado para hacerlo un trámite rápido y sencillo para usted">       
<meta name="keywords"           content="Apostillar poder notarial, apostilla de poderes notariales, como apostillar un poder notarial, donde apostillar poder notarial." />

<meta property="og:url"         content="{{route('web.apostillar.poder.notarial')}}" />
<meta property="og:type"        content="article" />
<meta property="og:title"       content="Apostillar Poder Notarial - Notaria Latina" />
<meta property="og:description" content="¿Quiere apostillar un poder notarial? Aquí encontrará la mejor información y el equipo notarial mas calificado para hacerlo un trámite rápido y sencillo para usted" />
<meta property="og:image"       content="{{asset('img/apostillar-poder-notarial.jpg')}}" />

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
              <h1 class="font-weight-bold heading-title" >Apostillar Poder Notarial</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="personalized-container pt-4 text-justify">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-xl-9 col-lg-9">
      <p>&nbsp;</p>
  
      <p>En Notar&iacute;a Latina, estamos comprometidos con brindar un servicio de calidad y eficiencia a nuestros clientes. Una de las solicitudes m&aacute;s frecuentes que recibimos es la de apostillar documentos, un tr&aacute;mite que puede resultar confuso para aquellas personas que no est&aacute;n familiarizadas con &eacute;l.</p>
      
      <p>La apostilla es un sello o timbre que certifica la autenticidad de un documento p&uacute;blico, y es necesaria en algunos casos para que el documento tenga validez en el extranjero. En este art&iacute;culo, explicaremos en qu&eacute; consiste el proceso de apostilla y c&oacute;mo puedes solicitarla en Notar&iacute;a Latina.</p>
      
      <p>&nbsp;</p>
      
      <h2>&iquest;Qu&eacute; es un poder notarial?</h2>
      
      <p>Un poder notarial es un documento legal que permite a una persona (el &quot;otorgante&quot;) delegar en otra persona (el &quot;apoderado&quot;) la capacidad de realizar determinados actos o negocios jur&iacute;dicos en su nombre. El poder notarial debe ser otorgado ante un notario p&uacute;blico, quien certifica que el otorgante ha otorgado el poder de manera libre y voluntaria.</p>
      
      <p>&nbsp;</p>
      
      <h2>&iquest;Para qu&eacute; se utiliza un poder notarial?</h2>
      
      <p>Un poder notarial puede ser utilizado para una amplia variedad de prop&oacute;sitos, tales como:</p>
      
      <ul>
          <li>Representar al otorgante en un juicio o en un tr&aacute;mite judicial o administrativo</li>
          <li>Realizar tr&aacute;mites en el Registro Civil o en el Registro de la Propiedad</li>
          <li>Celebrar contratos o transacciones comerciales en nombre del otorgante</li>
          <li>Gestionar el cobro de deudas o el pago de facturas</li>
          <li>Gestionar el patrimonio del otorgante, incluyendo la administraci&oacute;n de bienes inmuebles y la inversi&oacute;n de fondos</li>
      </ul>
      
      <p>&nbsp;</p>
      
      <h2>&iquest;Qui&eacute;n puede ser apoderado?</h2>
      
      <p>Cualquier persona mayor de edad y con capacidad legal puede ser apoderado de un poder notarial. Sin embargo, es importante tener en cuenta que el apoderado debe ser de confianza y tener la capacidad y los conocimientos necesarios para llevar a cabo los actos o negocios jur&iacute;dicos encomendados.</p>
      
      <p>&nbsp;</p>
      
      <h2>&iquest;Cu&aacute;les son los requisitos para otorgar un poder notarial?</h2>
      
      <p>Para otorgar un poder notarial, el otorgante debe:</p>
      
      <ul>
          <li>Estar presente en nuestra notar&iacute;a p&uacute;blica, <a href="https://notarialatina.com/poderes">aqu&iacute; te dejamos toda la informaci&oacute;n</a> que necesitas para recibir un poder notarial por nuestra notar&iacute;a.</li>
          <li>Identificarse mediante su documento de identidad</li>
          <li>Firmar el poder notarial en presencia del notario</li>
          <li>Declarar que otorga el poder de manera libre y voluntaria</li>
      </ul>
      
      <p>&nbsp;</p>
      
      <h2>&iquest;Cu&aacute;les son los requisitos para ejercer un poder notarial?</h2>
      
      <p>Para ejercer un poder notarial, el apoderado debe:</p>
      
      <ul>
          <li>Presentar el poder notarial original ante el funcionario o autoridad que requiera su exhibici&oacute;n</li>
          <li>Identificarse mediante su documento de identidad</li>
          <li>Firmar en presencia del funcionario o autoridad, o ante el notario p&uacute;blico, seg&uacute;n sea el caso</li>
      </ul>
      
      <p>&nbsp;</p>
      
      <h2>&iquest;Cu&aacute;l es la duraci&oacute;n de un poder notarial?</h2>
      
      <p>La duraci&oacute;n de un poder notarial depende del t&eacute;rmino que se haya establecido en el documento. Si no se establece un t&eacute;rmino, el poder notarial tiene una duraci&oacute;n ilimitada, esto se conoce como <a href="https://notarialatina.com/post/poder-notarial-duradero-48020">poder notarial duradero</a>. Sin embargo, el otorgante puede revocar el poder en cualquier momento.</p>
      
      <p>&nbsp;</p>
      
      <p>Para apostillar un poder notarial en una notar&iacute;a, es necesario cumplir con los siguientes pasos:</p>
      
      <ol>
          <li>Verificar que el poder notarial cumpla con los requisitos legales y est&eacute; redactado de manera adecuada. Es fundamental que el poder notarial sea otorgado ante un notario p&uacute;blico y que est&eacute; debidamente firmado y sellado por el notario. Nosotros te podemos ayudar con este proceso, solo ll&aacute;manos al 800-742-8602 y te guiaremos en todo este proceso.</li>
          <li>Presentarse con el poder notarial original y con el documento de identidad en una de nuestras oficinas en:</li>
      </ol>
      
      <p>&nbsp;</p>
      <a href="{{route('web.oficina.newyork')}}">
        <div class="bg-light p-3 shadow-sm">
          <h4><strong>New York</strong></h4>
          
          <p><a href="https://g.page/notariapublicalatina">67-03 Roosevelt Avenue, Woodside, NY 11377</a></p>
          
          <p><i class="fas fa-headset text-primary"></i> &nbsp;<a class="btn btn-primary btn-sm rounded-pill" href="tel:+17187665041">718-766-5041</a>&nbsp; <a class="btn btn-primary btn-sm rounded-pill" href="tel:+13479739888">347-973-9888</a></p>
        </div>
      </a>
      
      
      <p>&nbsp;</p>
      
      <a href="{{route('web.oficina.newjersey')}}">
        <div class="bg-light p-3 shadow-sm">
          <h4><strong>New Jersey</strong></h4>
          
          <p><a href="https://g.page/r/CVNRV-zNuJiZEAE">1146 East Jersey St Elizabeth, NJ 07201</a></p>
          
          <p><i class="fas fa-headset text-primary"></i>&nbsp;<a class="btn btn-primary btn-sm rounded-pill" href="tel:+19088009046">908-800-9046</a></p>
        </div>
      </a>
      
      <p>&nbsp;</p>
      
      <a href="{{route('web.oficina.florida')}}">
        <div class="bg-light p-3 shadow-sm">
          <h4><strong>Florida</strong></h4>
          
          <p><a href="https://g.page/r/CeRrwPx_W2-xEAE">2104 N University Dr, Sunrise, FL 33322</a></p>
          
          <p><i class="fas fa-headset text-primary"></i>&nbsp;<a class="btn btn-primary btn-sm rounded-pill" href="tel:+13056003290">305-600-3290</a></p>
        </div>
      </a>

      
      <p>&nbsp;</p>
      
      <p>Tambi&eacute;n puede enviar estos documentos con la empresa de env&iacute;os de su preferencia. Luego solicitar la apostilla del poder notarial. Para eso revisaremos el poder y, si cumple con los requisitos legales, procederemos a realizar la apostilla.</p>
      
      <p>&nbsp;</p>
      
      <ol start="3">
          <li>Recibir la copia apostillada del poder notarial. Le entregaremos una copia del poder notarial con la apostilla, que es un sello o timbre que certifica que el poder ha sido autenticado por nuestra notar&iacute;a.</li>
      </ol>
      
      <p>&nbsp;</p>
      
      <p>Es importante tener en cuenta que la apostilla del poder notarial s&oacute;lo es necesaria en aquellos casos en los que el poder notarial se va a utilizar en un pa&iacute;s que haya adherido al Convenio de La Haya de 1961 sobre la legalizaci&oacute;n de documentos p&uacute;blicos extranjeros. Si el poder notarial se va a utilizar en un pa&iacute;s que no ha adherido al Convenio de La Haya, es posible que sea necesario realizar otro tipo de legalizaci&oacute;n, como la legalizaci&oacute;n consular.</p>
      
      <p><br />
      <br />
      &nbsp;</p>
      <div class="text-center mb-5">
          <p class="text-muted"><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
            <a href="https://www.facebook.com/notariapublicalatina/"><em>FanPage de Facebook</em></a><em>.</em></p>
          <a class="btn btn-lg btn-warning" href="https://notarialatina.com/contactenos">Solicite su Trámite</a>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-xl-3 col-lg-3">
      <div class="text-white rounded p-4 mb-4 shadow sticky" style="background-color: #2B384D">
        <p class="text-center h6">¿Está buscando donde apostillar un poder notarial?</p>
        <p class="text-center" style="font-size: 14px"><i class="fas fa-stamp text-warning"></i> Realice la apostilla de su poder aquí</p>
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
        document.getElementById('prisection').style.backgroundImage = "url('{{asset('img/apostillar-poder-notarial.jpg')}}')";
    });
  </script>
@endsection

