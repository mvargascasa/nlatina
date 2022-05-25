@extends('layouts.web')
@section('header')
<title>Certificaciones de documentos en {{ $data['office'] }} - Notaria Latina</title> 
<meta name="description" content="Las certificaciones son documentos sellados y firmados por un notario. Contáctenos y lo ayudamos en el trámite del documento en {{$data['office']}} ✔">       
<meta name="keywords" content="que es una certificacion, para que sirve una certificacion, requisitos para certificar un documento en {{ Str::lower($data['office']) }}, certificar documentos en {{ Str::lower($data['office']) }}, certificar acta de nacimiento en {{ Str::lower($data['office']) }}, certificar acta de matrimonio en {{ Str::lower($data['office']) }}, certificar declaracion jurada en {{ Str::lower($data['office']) }}, certificar licencia de conducir en {{ Str::lower($data['office']) }}, donde puedo certificar un documento en {{ Str::lower($data['office']) }}, donde puedo realizar un certificado en {{ Str::lower($data['office']) }}" />

<meta property="og:url"                content="{{ Request::url() }}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="Certificaciones de Documentos Notarizados y Apostillados en {{ $data['office'] }} - Notaria Latina" />
<meta property="og:description"        content="Las certificaciones son documentos firmados y sellados por un notario, que le proporciona autenticidad a nuestros documentos, pueden ser utilizados en todo aquel trámite legale donde se requiera total veracidad." />
<meta property="og:image"              content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />
@endsection

@section('phoneNumberHidden', $data['telfHidden'])
@section('phoneNumber', $data['telfShow'])

@section('content')

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title">Certificaciones de documentos en {{ $data['office'] }}</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
            <h3>Realizamos Certificaciones de documentos en {{ $data['office'] }}</h3>
            <p class="text-muted">Las certificaciones son documentos firmados y sellados por un notario.</p>
            <p class="text-muted">Este trámite consta en una firma y sello en la que se declara que la copia emitida es fiel copia del documento original.</p>
            <p class="text-muted">Es decir, es un documento que el mismo notario expide o en base a un documento preexistente, así como la afirmación de que
                una transcripción o reproducción coincide fielmente con su original.</p>

            <h3>¿Para que me sirven las certificaciones?</h3>
            <p class="text-muted">Al ser la certificación un documento que le proporciona autenticidad a nuestros documentos, pueden ser utilizados
                en todo aquel trámite legal donde se requiera total veracidad.</p>
            <p class="text-muted">Esta certificación nos sirve para realizar tanto trámites nacionales como internacionales.</p>
            <p class="text-muted">Es importante que certifique documentos que puedan estar en deterioro para evitar gestionar este documento desde un
                inicion. Esto le evitará contratiempos a la hora de realizar trámites y gestiones importantes.</p>

            <h3>¿Qué tipo de documentos puedo certificar?</h3>
            <ul class="text-muted">
                <li>Actas de nacimiento.</li>
                <li>Actas de matrimonio.</li>
                <li>Cartas.</li>
                <li>Licencias de conducir.</li>
                <li>Declaraciones juradas.</li>
                <li>Escrituras.</li>
            </ul>

        <h3>¿Qué validez tienen las certificaciones?</h3>
        <p class="text-muted">Cualquier documento que sea certificado tiene la misma validez que el documento original, no vence en el tiempo y se puede
            utilizar el cualquier trámite legal que se necesite.</p>

        <h3>¿Que requisitos necesito para certificar un documento?</h3>
        <p class="text-muted">El único requisito es presentar el documento original que desea certificar, siempre que el notario pueda constatar que este es original.</p>

        <h3>¿En donde puedo certificar un documento?</h3>
        <p class="text-muted">Acérquese a nuestra oficina con el documento que desea certificar y un asesor lo guiará para que realice el trámite de manera correcta y segura.</p>




        <h3>¿En que tiempo me entregan mi documento certificado?</h3>
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

@section('numberWpp', $data['telfWpp'])

@section('script')
<script async src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script>
  var scriptBootstrap = document.createElement('script');
  scriptBootstrap.src = "{{ asset('js/bootstrap.min.js') }}";

  var scriptPopper = document.createElement('script');
  scriptPopper.src = "{{ asset('js/popper.min.js') }}";
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('../img/inicio.jpg')";
        document.getElementsByTagName("script")[0].parentNode.appendChild(scriptPopper);
        document.getElementsByTagName("script")[0].parentNode.appendChild(scriptBootstrap);
    });
  </script>
@endsection

