@extends('layouts.web')
@section('header')
<title>Contratos Notarizados y Apostillados en {{ $data['office'] }}</title> 
<meta name="description"        content="Los contratos son documentos donde dos personas se comprometen a cumplir ciertas obligaciones. Lo ayudamos con el trámite en {{$data['office']}} ✔">       
<meta name="keywords"           content="que es un contrato, tipos de contratos en {{ Str::lower($data['office']) }}, requisitos para realizar un contrato en {{ Str::lower($data['office']) }}, realizar un contrato en {{ Str::lower($data['office']) }}, donde puedo realizar un contrato en {{ Str::lower($data['office']) }}, como puedo hacer un contrato en {{ Str::lower($data['office']) }}, donde puedo hacer un contrato de arrendamiento en {{ Str::lower($data['office']) }}, donde puedo hacer un contrato de compra venta en {{ Str::lower($data['office']) }}, donde puedo hacer un contrato prenupcial en {{ Str::lower($data['office']) }}, donde puedo apostillar un contrato en {{ Str::lower($data['office']) }}" />

<meta property="og:url"         content="{{ Request::url() }}" />
<meta property="og:type"        content="article" />
<meta property="og:title"       content="Contratos Notarizados y Apostillados en {{ $data['office'] }}" />
<meta property="og:description" content="Los contratos notarizados son documentos legales, firmados por dos personas que reflejan los derechos y obligaciones que ambas partes tienen respecto a un negocio o actividad realizada." />
<meta property="og:image"       content="{{asset('img/contratos.jpg')}}" />
@endsection

@section('phoneNumberHidden', $data['telfHidden'])
@section('phoneNumber', $data['telfShow'])

@section('content')

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Contratos en {{ $data['office'] }}</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
            <h2 style="font-size: 25px">¿Qué es un contrato y para que sirve?</h2>
            <p class="text-muted">Los contratos son un documentos legales, firmados por dos personas que reflejan los derechos y obligaciones que ambas partes tienen respecto a un negocio o actividad realizada.</p>
            <p class="text-muted">Este documento le va ayudar a evitar inconvenientes con promesas de «palabra» y así poder hacer cumplir lo que ya se estipuló en el mismo, teniendo así un respaldo legal para hacer valer lo acordado en el contrato.</p>


            <h2 style="font-size: 25px">¿Qué tipos de contratos puedo realizar?</h2>
            <ul class="text-muted">
                <li>Arriendo.</li>
                <li>Compra-venta.</li>
                <li>Préstamo de dinero.</li>
                <li>Prenupcial.</li>
                <li>Servicios.</li>
                <li>Transporte.</li>
            </ul>
            <p class="text-muted">Todo tipo de contrato está regulado por leyes que obligan a cumplir las cláusulas establecidas en el mismo.</p>

            <h2 style="font-size: 25px">¿Que requisitos necesito para realizar un contrato?</h2>
            <ul class="text-muted">
                <li>Identificación valida de las personas que van a realizar el contrato.</li>
                <li>Información de lo que se quiere dejar estipulado en el contrato.</li>
            </ul>

        <h2 style="font-size: 25px">¿En donde puedo realizar un contrato?</h2>
        <p class="text-muted">Acérquese a nuestra oficina y un asesor lo guiará para que realice el trámite de manera correcta y segura.</p>




        <h2 style="font-size: 25px">¿En que tiempo me entregan los contratos?</h2>
        <ul class="text-muted">
            <li>El tiempo de entrega dentro de los Estados Unidos es de 24 horas.</li>
            <li>El tiempo de entrega fuera de los Estados Unidos es de 3 días laborables.</li>
            <li>El documento digital estará disponible en 24 horas.</li>
            <li class="text-danger">Por motivos de codiv-19 puede existir retraso en los tiempos de entrega.</li>
        </ul>
        <p class="text-muted"><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
            <a href="https://www.facebook.com/notariapublicalatina/"><em>FanPage de Facebook</em></a><em>.</em></p>
            <div class="d-flex justify-content-center">
              <a class="btn btn-lg btn-warning" href="{{route('web.contactenos')}}">Solicite su Trámite</a>
            </div>

            @if($posts == null)
            <div class="mt-5">
              <h4>Artículos que pueden interesarle</h4>
              <div class="row">
                  @foreach ($posts as $post)
                  <div class="col-12 col-md-4">
                      <div data-aos="flip-left" id="card_posts" class="card my-2">
                          <a href="{{route('post.slug',$post->slug)}}" class="stretched-link">
                              <img data-src="{{url('uploads/'.$post->imgdir)}}" class="lazy card-img-top" alt="Imagen {{ $post->name }}" style="object-fit: cover;width: 100%; height: 150px !important;">
                              {{-- {{url('uploads/'.$post->imgdir)}} --}}
                          </a>
                          <div class="card-body p-2" style="position:relative;">
                          <span class="d-block text-muted font-weight-bold text-truncate "
                                  style="font-size:1rem">{{$post->name}}</span>
                          <span class="d-block text-muted text-truncate">
                              <?php echo strip_tags(substr($post->body,0,300))  ?>
                          </span>
                          {{-- <div class="small text-muted float-left">{{$post->created_at->format('M d')}}</div> --}}
                          </div>
                      </div>
                  </div>
                  @endforeach
              </div>
            </div>
            @endif
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
        document.getElementById('prisection').style.backgroundImage = "url('../img/contratos.jpg')";
        // document.getElementsByTagName("script")[0].parentNode.appendChild(scriptPopper);
        // document.getElementsByTagName("script")[0].parentNode.appendChild(scriptBootstrap);
    });
  </script>
@endsection

