@extends('layouts.web')

@section('header')
    <title>Matrimonios en {{ $data['office'] }} </title>
    <meta name="description" content="Si desea dar este paso importante en su vida, que mejor para hacerlo que en Florida. ¿Necesita saber como realizar el proceso de matrimonio? Consulte aquí!">
    <meta name="keywords" content="matrimonios, matrimonios florida, matrimonios miami, matrimonio en florida requisitos, boda en florida, como casarse en florida, requisitos para matrimonio en florida, requisitos para boda en florida, requisitos para casarse en florida, certificado de matrimonio florida, ">

    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Matrimonios en {{ $data['office'] }}">
    <meta property="og:description" content="Si desea dar este paso importante en su vida, que mejor para hacerlo que en Florida. ¿Necesita saber como realizar el proceso de matrimonio?">
    <meta property="og:image" content="{{ asset('img/matrimonios.webp') }}">
@endsection

@section('content')
<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>
        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Matrimonios en {{ $data['office'] }}</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

  <div class="container pt-4">
    <h3>¿Quién puede emitir el certificado de matrimonio?</h3>
    <p class="text-muted text-justify">
        Hace ya más de un año que los notarios pueden certificar el matrimonio en Florida, 
        al igual que tramitar el expediente previo a la celebración del matrimonio mediante un acta notarial.
        El fin de esta acta es para constatar que ambos contribuyentes cumplan los requisitos de capacidad, 
        además de que no existan impedimentos legales de cualquier otro tipo de matrimonio.  
    </p>
    <h3>¿Qué requisitos se necesitan?</h3>
    <p class="text-muted text-justify">Ante un notario público tendrás que tener la siguiente documentación:</p>
    <ul class="text-muted">
        <li>Documento de identidad, pasaporte o un tipo de ID.</li>
        <li>Certificado de nacimiento, expedido hace menos de un año por el Registro Civil del lugar de nacimiento.</li>
        <li>Certificados de empadronamiento en el lugar de residencia durante los dos últimos años ; o certificado del Consulado, si se ah residido en el extranjero. </li>
        <li>Si su pareja estaba casado antes necesitara brindar la acta de matrimonio anulada, o certificado de defunción del primer cónyuge. </li>
        <li>Los extranjero deberán presentar un certificado de capacidad matrimonio o certificado de soltería para poderse casar en florida. </li>
    </ul>
    <h3>¿Cómo se lleva a cabo el matrimonio?</h3>
    <p class="text-muted text-justify">
        Para la tramitación del acta el notario publico le preguntará a los futuros 
        esposos si reúnen los requisitos necesarios para contraer matrimonio. Así el notario publico escuchará a cada uno
        por separado, con la finalidad de cerciorarse de que sus manifestaciones son ciertas y su voluntad es propia 
        para poderse casar.  El notario público finalizará el acta haciendo constar que los contrayentes cumplen los 
        requisitos necesarios para poder contraer el matrimonio. Por último el notario público entregará una copia 
        del acta de los contrayentes quienes podrán contraer el matrimonio ante el mismo notario. 
    </p>
    
    <h3>¿En que tiempo me entregan mis documentos traducidos?</h3>
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
<script async src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script>
      var scriptBootstrap = document.createElement('script');
      scriptBootstrap.src = "{{ asset('js/bootstrap.min.js') }}";

      var scriptPopper = document.createElement('script');
      scriptPopper.src = "{{ asset('js/popper.min.js') }}";
        window.addEventListener('load', (event) => {
            document.getElementById('prisection').style.backgroundImage = "url('../img/matrimonios.webp')";
            document.getElementsByTagName("script")[0].parentNode.appendChild(scriptPopper);
        document.getElementsByTagName("script")[0].parentNode.appendChild(scriptBootstrap);
        });
    </script>
@endsection