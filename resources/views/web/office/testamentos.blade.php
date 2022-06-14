@extends('layouts.web')
@section('header')
<title>Testamentos Notarizados y Apostillados en {{ $data['office'] }}</title> 
<meta name="description"        content="Un testamento es un documento válido para realizar diferentes trámites notariales. ¿Dónde puede solicitarlo? Consulte por nuestro servicio en {{ $data['office'] }} 📃">       
<meta name="keywords"           content="que es un testamento, para que sirve un testamento, requisitos para realizar un testamento en {{ Str::lower($data['office']) }}, realizar un testamento en {{ Str::lower($data['office']) }}, donde realizar un testamento en {{ Str::lower($data['office']) }}, donde hacer un testamento en {{ Str::lower($data['office']) }}, como hacer un testamento en {{ Str::lower($data['office']) }}" />

<meta property="og:url"         content="{{Request::url()}}" />
<meta property="og:type"        content="article" />
<meta property="og:title"       content="Testamentos Notarizados y Apostillados en {{ $data['office'] }}" />
<meta property="og:description" content="Un testamento es un documento válido para realizar diferentes trámites notariales. ¿Dónde puede solicitarlo? Consulte por nuestro servicio en {{ $data['office'] }} 📃" />
<meta property="og:image"       content="{{asset('img/testamento.jpg')}}" />
@endsection

@section('phoneNumberHidden', $data['telfHidden'])
@section('phoneNumber', $data['telfShow'])

@section('content')

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Testamentos en {{ $data['office'] }}</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
        <h3>Los testamentos son documentos legales que reflejan la voluntad de una persona de distribuir sus bienes entre las personas que él considere después de su muerte.</h3>
        <p class="text-muted">El documento tiene que realizarse en una notaría para que tenga validez y pueda ejecutarse de acuerdo a la voluntad del testador.</p>
        <p class="text-muted">Con la creación de su testamento usted puede evitar futuros inconvenientes familiares en la división de bienes ya que en éste documento usted define la división a su voluntad y este debe respetarse.</p>

        <h3>¿Que requisitos se necesita para realizar testamentos?</h3>
        <ul class="text-muted">
            <li>Presentar una identificación válida del testador.</li>
            <li>Nombres y apellidos del albacea.</li>
            <li>Nombres y apellidos de dos testigos.</li>
            <li>Información del patrimonio que se desea heredar.</li>
            <li>Información de los herederos.</li>
        </ul>

        <h3>¿En donde puedo realizar un testamento?</h3>
        <p class="text-muted">Acérquese a nuestra oficina y solicite empezar su proceso, nuestro personal le va asesorar de la mejor manera para que éste trámite se lleve a cabo de manera correcta y segura.</p>


        <h3>¿En que tiempo me entregan un testamento?</h3>
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
        document.getElementById('prisection').style.backgroundImage = "url('../img/testamento.jpg')";
        document.getElementsByTagName("script")[0].parentNode.appendChild(scriptPopper);
        document.getElementsByTagName("script")[0].parentNode.appendChild(scriptBootstrap);
    });
  </script>
@endsection

