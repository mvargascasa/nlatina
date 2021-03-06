@extends('layouts.web')
@section('header')
<title>Poderes Notarizados y Apostillados en Queens New York</title> 
<meta name="description"        content="Un poder o carta poder, es un documento legal que se utiliza para otorgar control total sobre sus activos a otra persona si usted no pudiera estar presente.">       
<meta name="keywords"           content="Poderes Notarizados y Apostillados  en Queens New York, Poderes Notarizados near me, carta poder, poder especial, poder general, notaria latina, notario publico, notary public near me, notario cerca de mi, notario publico near me, notaría nueva york, notary public queens, que es un poder notaria, que es una carta poder, para que sirve una carta poder, requisitos carta poder, carta poder en new york, realizar carta poder en new york, poder general en new york, poder especial en new york" />

<meta property="og:url"         content="{{route('web.poderes')}}" />
<meta property="og:type"        content="article" />
<meta property="og:title"       content="Poderes Notarizados y Apostillados  en Queens New York - Notaria Latina" />
<meta property="og:description" content="Un poder o carta poder, es un documento legal que se utiliza para otorgar control total sobre sus activos a otra persona si usted no pudiera estar presente." />
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
@endsection

@section('phoneNumberHidden', '+18007428602')
@section('phoneNumber', '800-742-8602')

@section('content')

<section id="prisection" style="background-size: cover;background-position: left center; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title">Poderes <br> <b class="heading-title" style="font-size: 28px; font-weight: 100">Generales y Especiales</b></h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
            <h2 style="font-weight: 500; font-size: 28px">Gestione sus trámites legales sin estar presente por medio de un apoderado de confianza.</h2>
            <p class="text-muted">Un poder o carta poder, es un documento legal que se utiliza para otorgar control total sobre sus activos a otra persona
                si usted no pudiera estar presente. Por lo tanto le permite realizar trámites a distancia siendo una solución para gestionar sus bienes, trámites
                bancarios y otras tareas importantes.</p>
            <p class="text-muted">La persona que firma un poder se llama poderdante o mandante y la que recibe el mandato se llama apoderado o mandatario.
                Es siempre aconsejable asignar una persona de absoluta confianza para que realice las tareas encomendadas que se especificaran en la carta,
                de esta manera evita futuros inconvenientes que se puedan presentar.</p>

            <h2 style="font-weight: 500; font-size: 28px">¿Para que se utiliza un poder?</h2>
            <p class="text-muted">El documento que porte la apostilla tiene validez legal en cualquiera de los países miembros del Convenio. La cual consiste en un sello
                que la autoridad encargada estampa en seco y se agrega como nota al reverso o como hoja adicional de los documentos que se quisiera
                autenticar. Es por eso que los únicos autorizados para validar esta apostilla son los notarios debidamente acreditados.</p>

            <h2 style="font-weight: 500; font-size: 28px">Tipo de Poderes</h2>
            <ul class="text-muted">
                <li>Poder Especial: Otorgar control a una actividad especifica sobre sus activos a otra persona en el caso de que usted no pudiera estar presente.</li>
                <li>Poder General:  Otorgar control más amplio y con más atribuciones sobre sus activos a otra persona en el caso de que usted no pudiera estar presente.</li>
            </ul>

            <h2 style="font-weight: 500; font-size: 28px">¿En que documentos se necesita la apostilla?</h2>
            <ul class="text-muted">
                <li>Compra / Venta</li>
                <li>Administración de propiedades.</li>
                <li>Administrar sus cuentas y transacciones bancarias.</li>
                <li>Inversiones de dinero.</li>
                <li>Hacer reclamos legales</li>
                <li>Procedimientos legales en su nombre.</li>
            </ul>

            <h2 style="font-weight: 500; font-size: 28px">¿Que requisitos necesito para realizarlo?</h2>
            <ul class="text-muted">

                <li>Identificación válida del poderdante.</li>
                <li>Nombres y apellidos del apoderado.</li>
                <li>Número de cédula del apoderado.</li>
            </ul>

        <h2 style="font-weight: 500; font-size: 28px">¿Que tiempo de validez tiene un poder?</h2>
        <p class="text-muted">Una carta poder tiene validez por el tiempo  que el poderdante establezca a la hora de realizar el poder con el notario,
            por fallecimiento del mismo o hasta  que por voluntad propia solicite una revocatoria.</p>
        <p class="text-muted">El poder puede utilizarse aun si el poderdante no se encuentre con todas sus facultades físicas o mentales.</p>

        <h2 style="font-weight: 500; font-size: 28px">¿En donde puedo solicitar un poder?</h2>
        <p class="text-muted">Acérquese a nuestra oficina y solicite su carta poder, un asesor lo guiará para que usted realice el trámite de manera correcta y segura.</p>


        <h2 style="font-weight: 500; font-size: 28px">¿Cuanto tiempo demora hacer un poder?</h2>
        <ul class="text-muted">
            <li>El tiempo de entrega dentro de los Estados Unidos es de 24 horas.</li>
            <li>El tiempo de entrega fuera de los Estados Unidos es de 3 días laborables.</li>
            <li>El documento digital estará disponible en 24 horas.</li>
            <li class="text-danger">Por motivos de codiv-19 puede existir retraso en los tiempos de entrega.</li>
        </ul>
        <p class="text-muted"><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
            <a href="https://www.facebook.com/notariapublicalatina/"><em>FanPage de Facebook</em></a><em>.</em></p>
            <a class="btn btn-lg btn-warning" href="{{route('web.contactenos')}}">Solicite su Trámite</a>
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
        document.getElementById('prisection').style.backgroundImage = "url('img/poder.jpg')";
    });
  </script>
@endsection

