@extends('layouts.web')
@section('header')
<title>Cartas de Invitación Notarizadas en {{ $data['office'] }} - Notaria Latina</title> 
<meta name="description"        content="Las cartas de invitación son un requisito válido que se presenta ante el consulado que lo requiera para la gestión de la visa de turista; la carta tiene que ser genuina y contener datos reales. Carta de invitación en {{ $data['office'] }}">       
<meta name="keywords"           content="Cartas de Invitación Notarizadas y Apostilladas en {{ $data['office'] }}, Cartas de Invitación near me, notaria latina, notario publico, notary public near me, notario cerca de mi, notario publico near me, notaría nueva york, notary public queens, que es una carta de invitacion, para que sirve la carta de invitacion, donde puedo realizar una carta de invitacion, realizar carta de invitacion cerca de mi, tramitar carta de invitacion cerca de mi, tramitar carta de invitacion en {{ $data['office'] }}" />

<meta property="og:url"         content="{{ Request::url() }}" />
<meta property="og:type"        content="article" />
<meta property="og:title"       content="Cartas de Invitación Notarizadas y Apostilladas en {{ $data['office'] }} - Notaria Latina" />
<meta property="og:description" content="Las cartas de invitación son un requisito válido que se presenta ante el consulado que lo requiera para la gestión de la visa de turista; la carta tiene que ser genuina y contener datos reales." />
<meta property="og:image"       content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />
@endsection

@section('phoneNumberHidden', $data['telfHidden'])
@section('phoneNumber', $data['telfShow'])

@section('content')

<section id="prisection" style="background-size: cover;background-position: left center; background-repeat: no-repeat;">
    <div>
        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">
            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Cartas de Invitación en {{ $data['office'] }}</h1>
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>
      </div>
    </div>
  </section>

<div class="container pt-4">
            <h3>Realizamos cartas de invitación de forma segura y efectiva en {{ $data['office'] }}</h3>
            <p class="text-muted">Las cartas de invitación son un requisito válido que se presenta ante el consulado que lo requiera para la
                gestión de la visa de turista; la carta tiene que ser genuina y contener datos reales de la persona que va a realizarla.</p>

            <h3>¿Para que me sirven las cartas de invitación?</h3>
            <p class="text-muted">Puede ser utilizada para acompañar una solicitud de visa como turista para visitar a un familiar o amigo
                que reside en otro país. Es así que esta carta es un documento de presentación voluntaria que puede ayudar a obtener la visa.</p>
            <p class="text-muted">Por lo tanto, la persona que realiza la invitación tiene que ser un ciudadano que goce de todos los
                privilegios de su país y que además pueda soportar los gastos del viaje y estadía de la persona a la que invita.</p>

            <h3>¿Que requisitos necesito para hacer una carta de invitación?</h3>
            <ul class="text-muted">
                <li>Identificación válida de la persona que realiza la invitación.</li>
                <li>Nombres y apellidos de la persona a la que se quiere invitar.</li>
                <li>Presentar soporte de ingresos.</li>
            </ul>

        <h3>¿En donde puedo realizar una carta de invitación?</h3>
        <p class="text-muted">Acérquese a nuestra oficina con los requisitos necesarios y nuestros asesores le guiarán en la redacción de su carta y en la certificación de la misma.</p>


        <h3>¿En que tiempo me entregan mi carta de invitación?</h3>
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
        document.getElementById('prisection').style.backgroundImage = "url('../img/cartas-de-invitacion.jpg')";
    });
  </script>
@endsection

