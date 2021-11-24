@extends('layouts.web')
@section('header')
<title>Contratos Notarizados y Apostillados en Queens New York - Notaria Latina</title> 
<meta name="description"        content="Los contratos notarizados son un documentos legales, firmados por dos personas que reflejan los derechos y obligaciones que ambas partes tienen respecto a un negocio o actividad realizada.">       
<meta name="keywords"           content="Contratos Notarizados y Apostillados en Queens New York, Contratos Notarizados near me, notaria latina, notario publico, notary public near me, notario cerca de mi, notario publico near me, notaría nueva york, notary public queens" />

<meta property="og:url"         content="{{route('web.contratos')}}" />
<meta property="og:type"        content="article" />
<meta property="og:title"       content="Contratos Notarizados y Apostillados en Queens New York - Notaria Latina" />
<meta property="og:description" content="Los contratos notarizados son un documentos legales, firmados por dos personas que reflejan los derechos y obligaciones que ambas partes tienen respecto a un negocio o actividad realizada." />
<meta property="og:image"       content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />
@endsection

@section('content')

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Contratos</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
            <p class="text-muted">Los contratos son un documentos legales, firmados por dos personas que reflejan los derechos y obligaciones que ambas partes tienen respecto a un negocio o actividad realizada.</p>
            <p class="text-muted">Este documento le va ayudar a evitar inconvenientes con promesas de «palabra» y así poder hacer cumplir lo que ya se estipuló en el mismo, teniendo así un respaldo legal para hacer valer lo acordado en el contrato.</p>


            <h3>Qué tipos de contratos puedo realizar?</h3>
            <ul class="text-muted">
                <li>Arriendo.</li>
                <li>Compra-venta.</li>
                <li>Préstamo de dinero.</li>
                <li>Prenupcial.</li>
                <li>Servicios.</li>
                <li>Transporte.</li>
            </ul>
            <p class="text-muted">Todo tipo de contrato está regulado por leyes que obligan a cumplir las cláusulas establecidas en el mismo.</p>

            <h3>Que requisitos necesito para realizar un contrato?</h3>
            <ul class="text-muted">
                <li>Identificación valida de las personas que van a realizar el contrato.</li>
                <li>Información de lo que se quiere dejar estipulado en el contrato.</li>
            </ul>

        <h3>En donde puedo realizar un contrato?</h3>
        <p class="text-muted">Acérquese a nuestra oficina y un asesor lo guiará para que realice el trámite de manera correcta y segura.</p>




        <h3>En que tiempo me entregan los contratos?</h3>
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



@section('script')
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('img/contratos.jpg')";
    });
  </script>
@endsection

