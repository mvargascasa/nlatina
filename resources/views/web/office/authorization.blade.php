@extends('layouts.web')
@section('header')
<title>Autorizaciones de viaje en {{ $data['office'] }} - Notaria Latina</title> 
<meta name="description" content="Una autorización de viaje es un permiso para viajar fuera del país. Lo ayudamos con el trámite del documento en {{ $data['office'] }} de una forma segura! ✔">       
<meta name="keywords" content="que es una autorizacion de viaje, requisitos para realizar una autorizacion de viaje en {{ Str::lower($data['office']) }}, para que sirve una autorizacion de viaje, cuanto dura una autorizacion de viaje en {{ Str::lower($data['office']) }}, realizar autorizacion de viaje en {{ Str::lower($data['office']) }}, donde puedo realizar una autorizacion de viaje en {{ Str::lower($data['office']) }}, autorizacion de viaje para niños en {{ Str::lower($data['office']) }}, donde puedo realizar una carta de autorizacion de viaje en {{ Str::lower($data['office']) }}" />

<meta property="og:url"                content="{{ Request::url() }}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="Autorizaciones de Viaje Notarizadas y Apostillados en {{ $data['office'] }} - Notaria Latina" />
<meta property="og:description"        content="Las autorizaciones de viaje o travel authorization va a permitir que su hijo(a), menor de edad, viaje fuera del país sin necesidad de que lo acompañe los padres." />
<meta property="og:image"              content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />

<style>
  #card_posts:hover{box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;}
</style>
@endsection

@section('phoneNumberHidden', $data['telfHidden'])
@section('phoneNumber', $data['telfShow'])

@section('content')

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title">Autorizaciones de viaje en {{ $data['office'] }}</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
        <h2 style="font-size: 25px">Las autorizaciones de viaje o travel authorization va a permitir que su hijo(a), menor de edad, viaje fuera del país sin necesidad de que lo acompañe los padres.</h2>
        <p class="text-muted">La autorización de viaje designa quién va a ser la persona que acompañe al menor;  esta persona puede ser un familiar,
            amigo o alguna auxiliar de viaje como ser una aeromoza de la propia aerolinea.</p>
        <p class="text-muted">Es decir que este documento deben dar fe ambos padres o tutores sobre la autorización del menor a realizar el viaje con la persona mencionada.
            La autorización puede realizarse tambien para que el menor viaje con solo uno de sus padres.</p>


        <h2 style="font-size: 25px">¿Que requisitos se necesita para realizar autorizaciones de viaje?</h2>
        <ul class="text-muted">
            <li>Identificación válida del padre o madre que va a dar la autorización.</li>
            <li>Nombres y apellidos del menor que va a viajar.</li>
            <li>Fecha de nacimiento del menor.</li>
            <li>Nombres y apellidos de la persona que va a acompañar al menor.</li>
            <li>Información del vuelo.</li>
        </ul>

        <h2 style="font-size: 25px">¿Que tiempo de validez tienen las autorizaciones de viaje?</h2>
        <p class="text-muted">La autorización de viaje solo es válida por el tiempo que el menor vaya a estar fuera del país, entonces, terminado este periodo el documento
            pierde su validez automaticamente.  </p>

        <h2 style="font-size: 25px">¿En donde puedo realizar una autorización de viaje?</h2>
        <p class="text-muted">Acérquese a nuestra oficina con los requisitos necesarios y un asesor lo guiará para que realice el trámite de manera correcta y segura.</p>




        <h2 style="font-size: 25px">¿En que tiempo me entregan la autorización de viaje?</h2>
        <ul class="text-muted">
            <li>El tiempo de entrega es inmediato siempre que las personas que realiza el trámite se acerque con los requisitos correspondientes.</li>
        </ul>
        <p class="text-muted"><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
            <a href="https://www.facebook.com/notariapublicalatina/"><em>FanPage de Facebook</em></a><em>.</em></p>
            <div class="d-flex justify-content-center">
              <a class="btn btn-lg btn-warning" href="{{route('web.contactenos')}}">Solicite su Trámite</a>
            </div>

            @isset($posts)
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
            @endisset
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
        document.getElementById('prisection').style.backgroundImage = "url('../img/autorizaciones-de-viaje.jpg')";
        // document.getElementsByTagName("script")[0].parentNode.appendChild(scriptPopper);
        // document.getElementsByTagName("script")[0].parentNode.appendChild(scriptBootstrap);
    });
  </script>
@endsection

