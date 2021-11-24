@extends('layouts.web')
@section('header')
<title>Poderes Especiales Notarizados y Apostillados en Queens New York - Notaria Latina</title> 
<meta name="description"        content="Un Poder Especial, es un documento legal que se utiliza para otorgar control a una actividad especifica sobre sus activos a otra persona en el caso de que usted no pudiera estar presente.">       
<meta name="keywords"           content="Poderes Especiales Notarizados y Apostillados  en Queens New York, Poderes Notarizados near me, notaria latina, notario publico, notary public near me, notario cerca de mi, notario publico near me, notaría nueva york, notary public queens" />

<meta property="og:url"         content="{{route('web.poderesp')}}" />
<meta property="og:type"        content="article" />
<meta property="og:title"       content="Poderes Especiales Notarizados y Apostillados  en Queens New York - Notaria Latina" />
<meta property="og:description" content="Un Poder Especial, es un documento legal que se utiliza para otorgar control a una actividad especifica sobre sus activos a otra persona en el caso de que usted no pudiera estar presente." />
<meta property="og:image"       content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />
@endsection

@section('content')

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Poderes Especiales</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
        <h3>Usted puede gestionar un trámite legal especifico sin estar presente.</h3>
        <p class="text-muted">Un Poder Especial, es un documento legal que se utiliza para otorgar control a una actividad especifica sobre sus activos a otra
            persona en el caso de que usted no pudiera estar presente.</p>
        <p class="text-muted">Por lo tanto le permite realizar trámites a distancia siendo una solución para gestionar sus bienes, trámites bancarios y otras tareas importantes.</p>
        <p class="text-muted">La persona que firma un poder se llama poderdante o mandante y la que recibe el mandato se llama apoderado o mandatario.</p>
        <p class="text-muted">Es siempre aconsejable asignar una persona de absoluta confianza para que realice las tareas encomendadas que se especificaran
            en la carta, de esta manera evita futuros inconvenientes que se puedan presentar.</p>
        <p class="text-muted">Este poder a diferencia del poder general, es limitado y específico, no genera un poder total sino especifico sobre una actividad en particular.</p>

        <h3>Para que se utiliza un poder especial?</h3>
        <ul class="text-muted">
            <li>Delegar la administración de propiedades.</li>
            <li>Solicitar permisos o documentos en instituciones públicas y privadas.</li>
            <li>Solicitar pasaportes y visas para menores de edad.</li>
            <li>Realizar transacciones bancarias.</li>
            <li>Reclamar pensiones.</li>
        </ul>

        <h3>Que requisitos necesito para realizarlo?</h3>
        <ul class="text-muted">
            <li>Identificación válida del poderdante.</li>
            <li>Nombres y apellidos del apoderado.</li>
            <li>Número de cédula del apoderado.</li>
            <li>Es aconsejable asignar una persona de absoluta confianza para que realice las tareas encomendadas.</li>
        </ul>

        <h3>En donde puedo solicitar un poder especial?</h3>
        <p class="text-muted">Acérquese a nuestra oficina y solicite su carta poder, un asesor lo guiará para que usted realice el trámite de manera correcta y segura.</p>



        <h3>En que tiempo se gestiona el poder?</h3>
        <ul class="text-muted">
            <li>El tiempo de entrega dentro de los Estados Unidos es de 24 horas.</li>
            <li>El tiempo de entrega fuera de los Estados Unidos es de 3 días laborables.</li>
            <li>El documento digital estará disponible en 24 horas.</li>
            <li class="text-red">Por motivos de codiv-19 puede existir retraso en los tiempos de entrega.</li>
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



@section('script')
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('img/poder-especial.jpg')";
    });
  </script>
@endsection

