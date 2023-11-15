@extends('layouts.web')
@section('header')
<title>Poderes Notarizados y Apostillados en Queens New York</title> 
<meta name="description"        content="Un poder o carta poder, es un documento legal que se utiliza para otorgar control total sobre sus activos a otra persona si usted no pudiera estar presente.">       
<meta name="keywords"           content="Poderes Notarizados y Apostillados  en Queens New York, Poderes Notarizados near me, carta poder, poder especial, poder general, notaría nueva york, notary public queens, que es un poder notaria, que es una carta poder, para que sirve una carta poder, requisitos carta poder, carta poder en new york, realizar carta poder en new york, poder general en new york, poder especial en new york, que es un poder notarial, que es una carta poder, donde puedo tramitar una carta poder, donde tramitar una carta poder, donde tramitar un poder notaria, donde puedo tramitar un poder notarial, donde tramitar un poder en estados unidos" />

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
<script defer src="{{ asset('js/navbar-style.js') }}"></script>
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

@php
    $detect = new Detection\MobileDetect;
    $isMobile = false;
    if($detect->isMobile()) $isMobile = true;
@endphp

<section id="prisection" style="background-size: cover;background-position: left center; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title">Poderes <br> <b class="heading-title" style="font-size: 28px; font-weight: 100">Notariales</b></h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

{{-- <div class="container pt-4">
            <h2 style="font-weight: 500; font-size: 28px">¿Qué es un poder notarial?</h2>
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
</div> --}}

<div class="container pt-5 text-justify">
    {{-- @if(!$isMobile)
        <iframe class="float-right mx-5 mb-4 rounded shadow" id="iframevideo" width="500" height="300" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    @endif --}}
        <h2 style="font-weight: 500; font-size: 28px">¿Qué es un poder notarial?</h2>
          <p class="text-muted">Un poder o carta poder, es un documento legal que se utiliza para otorgar control total sobre sus activos a otra persona
              si usted no pudiera estar presente. Por lo tanto le permite realizar trámites a distancia siendo una solución para gestionar sus bienes, trámites
              bancarios y otras tareas importantes.</p>
          <p class="text-muted">La persona que firma un poder se llama poderdante o mandante y la que recibe el mandato se llama apoderado o mandatario.
              Es siempre aconsejable asignar una persona de absoluta confianza para que realice las tareas encomendadas que se especificaran en la carta,
              de esta manera evita futuros inconvenientes que se puedan presentar.</p>

          <h2 style="font-weight: 500; font-size: 28px">¿Para qué se utiliza un poder?</h2>
          <p class="text-muted">El documento que porte la apostilla tiene validez legal en cualquiera de los países miembros del Convenio. La cual consiste en un sello
              que la autoridad encargada estampa en seco y se agrega como nota al reverso o como hoja adicional de los documentos que se quisiera
              autenticar. Es por eso que los únicos autorizados para validar esta apostilla son los notarios debidamente acreditados.</p>
          
              <p class="text-muted">En otras palabras los poderes notariales sirven para que usted pueda defenderse ante las autoridades judiciales, es decir, que usted pueda comparecer ante un juzgado en materia civil,
               en materia penal, en materia laboral, en materia mercantil, y en materia agraria.</p>


          <h2 style="font-weight: 500; font-size: 28px">Tipo de Poderes</h2>
          <ul class="text-muted">
              <li><a href="https://notarialatina.com/poderes-especiales">Poderes Especiales</a>: Otorgar control a una actividad especifica sobre sus activos a otra persona en el caso de que usted no pudiera estar presente.</li>
              <li>Poderes Generales:  Otorgar control más amplio y con más atribuciones sobre sus activos a otra persona en el caso de que usted no pudiera estar presente.</li>
          </ul>

          <h2 style="font-weight: 500; font-size: 28px">¿Qué tipos de documentos se pueden firmar por medio de usar un poder notarial?</h2>
          <p class="text-muted">
              Casi cualquier documento que usted firma por usted mismo se puede firmar por la persona a la cual usted le otorgue el poder notarial. Una excepción sería un testamento, la persona con el poder notarial para usted, no puede hacer un testamento por usted ni cambiar su testamento existente, hay límites en lo que un apoderado puede hacer al usar un poder notarial.
              Uno de los buenos detalles de un poder notarial es que usted puede hacerlo general o tan limitado y específico como usted lo desee, por ejemplo usted podría usar un poder notarial solo para autorizarlo a alguien que venda su casa, porque usted estará fuera de la ciudad cuando se llevará a cabo la venta. 
              Sin embargo, hay casos en los que usted querrá que su poder notarial sea lo más general posible para que su apoderado pueda manejar todos sus asuntos si es necesario.
          </p>

          <h2 style="font-weight: 500; font-size: 28px">¿En qué documentos se necesita la apostilla?</h2>
          <ul class="text-muted">
              <li>Compra / Venta</li>
              <li>Administración de propiedades.</li>
              <li>Administrar sus cuentas y transacciones bancarias.</li>
              <li>Inversiones de dinero.</li>
              <li>Hacer reclamos legales</li>
              <li>Procedimientos legales en su nombre.</li>

              Para más información sobre apostillas consulte el siguiente enlace <a href="https://notarialatina.com/apostillas"><i>Servicio de Apostillas</i></a>
          </ul>
          <h2 style="font-weight: 500; font-size: 28px">¿Cómo elegir un apoderado?</h2>
          <p class="text-muted">
              Aquí hay algunas sugerencias para elegir un apoderado:

              <ul class="text-muted">
                  <li>Puede nombrar a familiares, amigos cercanos, pastores, pastores de iglesias o rabinos.</li>
                  <li>Solo puede designar a una persona como su apoderado. Luego, designe uno o dos suplentes, ya que se necesita uno en caso de que no se pueda encontrar su primera opción cuando sea necesario.</li>
                  <li>Administrar sus cuentas y transacciones bancarias.</li>
                  <li>Hable con todas las personas que está considerando nombrar como su apoderado o suplente. Haga esto antes de decidir quién es responsable de implementar sus deseos.</li>
              </ul>
          </p>

          <h2 style="font-weight: 500; font-size: 28px">¿Qué requisitos debe cumplir su apoderado?
          </h2>
          <p class="text-muted">
              Aquí hay algunas sugerencias para elegir un apoderado:

              <ul class="text-muted">
                  <li> Adultos mayores de 18 años.
                  </li>
                  <li>Alguien en quien confíe plenamente.
                  </li>
              </ul>
          </p>
          <h2 style="font-weight: 500; font-size: 28px">¿Qué requisitos necesito para realizarlo?</h2>
          <ul class="text-muted">

              <li>Identificación válida del poderdante.</li>
              <li>Nombres y apellidos del apoderado.</li>
              <li>Número de cédula del apoderado.</li>
          </ul>

      <h2 style="font-weight: 500; font-size: 28px">¿Qué tiempo de validez tiene un poder?</h2>
      <p class="text-muted">Una carta poder tiene validez por el tiempo  que el poderdante establezca a la hora de realizar el poder con el notario,
          por fallecimiento del mismo o hasta  que por voluntad propia solicite una revocatoria.</p>
      <p class="text-muted">El poder puede utilizarse aun si el poderdante no se encuentre con todas sus facultades físicas o mentales.</p>

      <h2 style="font-weight: 500; font-size: 28px">¿Qué pasa con el poder notarial si yo quedo incapacitado?</h2>
      <p class="text-muted">En el pasado antes de que tuviéramos poderes notariales duraderos su poder notarial hubiera terminado cuando usted quedara incapacitado, justamente cuando probablemente lo necesitaba más, 
          ahora mientras que su poder notarial sea un poder notarial duradero permanecerá en  vigencia completa aun si usted queda incapacitado, cuando se convierte en vidente del poder notarial y cuando se termina.</p>

          </p><p class="text-muted">Otro de los buenos detalles de un poder notarial es que usted decide cuándo se convierte en vigente y cuándo se termina la autoridad de su apoderado, por ejemplo su poder notarial puede proveer que tome vigencia cuando usted lo firme o puede decidir que no tomará vigencia a menos y hasta que usted quede incapacitado,  usted puede revocar su poder notarial en cualquier momento siempre y cuando usted puede entender lo que usted estará firmando.</p>
          
         <p class="text-muted"> Sea como sea un poder notarial duradero se termina el momento de que usted fallezca si es que usted no lo ha revocado antes. </p>
          </p>
      <p class="text-muted">El poder puede utilizarse aun si el poderdante no se encuentre con todas sus facultades físicas o mentales.</p>
      
      <h2 style="font-weight: 500; font-size: 28px"> ¿Esto le dará control a mi apoderado sobre mí?</h2>
      <p class="text-muted"> No un poder notarial no le da a su apoderado el derecho de decirle que puede y que no puede hacer a usted, su apoderado no tomará decisiones por usted con las que usted no esté de acuerdo, el  tener un poder notarial tampoco le quita su habilidad de continuar manejando sus propios asuntos, siempre y cuando pueda hacerlo.</p>

      <h2 style="font-weight: 500; font-size: 28px">¿Por qué no debe esperar a obtener un poder notarial cuando ya no pueda manejar sus asuntos?</h2>
      <p class="text-muted"> Para crear un poder material para, necesita poder entender lo que usted está firmando sólo usted puede firmar su poder notarial, entonces si espera demasiado tiempo puede ser demasiado tarde para conseguir un poder notarial y si se hace demasiado tarde para crear su poder notarial entonces la única manera que alguien más puede tener autoridad de manejar sus asuntos sería por medio de que ellos hagan una 
          petición al tribunal para que sean designados como su tutor o curador lo cual puede ser un proceso difícil de manejar y caro.
      </p>

      <h2 style="font-weight: 500; font-size: 28px">¿En dónde puedo solicitar un poder?</h2>
      <p class="text-muted">Acérquese a nuestra oficina y solicite su carta poder, un asesor lo guiará para que usted realice el trámite de manera correcta y segura.</p>

      <h2 style="font-weight: 500; font-size: 28px">¿Cuánto tiempo demora hacer un poder?</h2>
      <ul class="text-muted">
          <li>El tiempo de entrega dentro de los Estados Unidos es de 24 horas.</li>
          <li>El tiempo de entrega fuera de los Estados Unidos es de 3 días laborables.</li>
          <li>El documento digital estará disponible en 24 horas.</li>
          <li class="text-danger">Por motivos de codiv-19 puede existir retraso en los tiempos de entrega.</li>
      </ul>
      {{-- @if($isMobile)
      <div class="d-flex justify-content-center">
          <iframe class="float-right mx-5 mb-4 rounded shadow" id="iframevideo" width="300" height="200"  title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      @endif --}}
      <p class="text-muted"><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
          <a href="https://www.facebook.com/notariapublicalatina/"><em>FanPage de Facebook</em></a><em>.</em></p>
          <div class="text-center">
              <a class="btn btn-lg btn-warning" href="https://notarialatina.com/contactenos">Solicite su Trámite</a>
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
        document.getElementById('prisection').style.backgroundImage = "url('img/poder.jpg')";
    });

    setTimeout(() => {
        document.getElementById('iframevideo').src = "https://www.youtube.com/embed/AHE8EC0wsNA";
    }, 3000);
  </script>
@endsection

