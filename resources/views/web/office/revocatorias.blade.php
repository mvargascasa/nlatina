@extends('layouts.web')
@section('header')
<title>Revocatorias Notariales Apostilladas en {{ $data['office'] }}</title> 
<meta name="description"        content="Una revocatoria es un documento que deja sin efecto un poder. Lo ayudamos en el trámite del documento en {{ $data['office'] }} de una manera segura! ✔">       
<meta name="keywords"           content="que es una revocatoria, requisitos para realizar una revocatoria en {{ Str::lower($data['office']) }}, realizar una revocatoria en {{ Str::lower($data['office']) }}, revocatoria de carta poder en {{ Str::lower($data['office']) }}, donde puedo realizar una revocatoria de un poder en {{ Str::lower($data['office']) }}, donde puedo realizar la revocatoria de una carta poder en {{ Str::lower($data['office']) }}, donde puedo revocar un poder en {{ Str::lower($data['office']) }}, solicitar revocatoria de poder en {{ Str::lower($data['office']) }}" />

<meta property="og:url"         content="{{Request::url()}}" />
<meta property="og:type"        content="article" />
<meta property="og:title"       content="Revocatorias Notarizadas y Apostilladas en {{ $data['office'] }}" />
<meta property="og:description" content="Una Revocatoria es una escritura pública expedida por un notario a través de la cual se deja sin efecto un poder otorgado con antelación." />
<meta property="og:image"       content="{{asset('img/revocatoria.jpg')}}" />
<style>
  #card_posts:hover{box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;}
</style>
@endsection

@section('phoneNumberHidden', $data['telfHidden'])
@section('phoneNumber', $data['telfShow'])

@section('content')

<section id="prisection" style="background-size: cover;background-position: left bottom; background-repeat: no-repeat;">
    <div>
        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">
            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Revocatorias en {{ $data['office'] }}</h1>
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>
      </div>
    </div>
  </section>

<div class="container pt-4">
        <h2 style="font-size: 25px">Gestione su Revocatoria de forma rápida y segura en {{ $data['office'] }}</h2>
        <p class="text-muted">Una Revocatoria es una escritura pública expedida por un notario a través de la cual se deja sin efecto un poder otorgado con antelación.</p>
        <p class="text-muted">Este trámite es muy importante realizarlo si ya no desea que la persona apoderada continúe con la gestiónes por la cual se realizó el poder inicial.</p>

        <h2 style="font-size: 25px">¿Que tipo de poderes se pueden revocar?</h2>
        <ul class="text-muted">
            <li>Poderes generales.</li>
            <li>Poderes especiales.</li>
        </ul>


        <h2 style="font-size: 25px">¿Que requisitos necesito para realizar una revocatoria de poder?</h2>
        <ul class="text-muted">
            <li>Identificación válida de la persona que otorgó el poder.</li>
            <li>Nombres y apellidos del nuevo apoderado.</li>
            <li>Número de cédula del nuevo apoderado.</li>
            <li>Copia del poder anterior.</li>
            <li>Es aconsejable asignar una persona de absoluta confianza para que realice el trámite necesario para realizar la revocación de un poder.</li>
        </ul>

        <h2 style="font-size: 25px">¿En donde puedo solicitar la revocatoria de un poder?</h2>
        <p class="text-muted">Acérquese a nuestra oficina y solicite la revocatoria del poder, un asesor lo guiará para que usted realice el trámite de manera correcta y segura.</p>


        <h2 style="font-size: 25px">¿En que tiempo me entregan los documentos necesarios?</h2>
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
        document.getElementById('prisection').style.backgroundImage = "url('../img/revocatoria.jpg')";
        document.getElementsByTagName("script")[0].parentNode.appendChild(scriptPopper);
        document.getElementsByTagName("script")[0].parentNode.appendChild(scriptBootstrap);
    });
  </script>
@endsection

