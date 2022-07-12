@extends('layouts.web')
@section('header')
    <title>Acuerdos Notariales Apostillados en {{ $data['office'] }} - Notaria Latina</title> 
    <meta name="description"        content="Los acuerdos son un pacto firmado entre dos o más personas. Consulte por nuestros servicios en {{$data['office']}} para realizar el trámite ✔">       
    <meta name="keywords"           content="que es un acuerdo notarial, para que sirve un acuerdo, requisitos para realizar un acuerdo en {{ Str::lower($data['office']) }}, realizar un acuerdo en {{ Str::lower($data['office']) }}, donde puedo realizar un acuerdo en {{ Str::lower($data['office']) }}, donde puedo realizar un acuerdo notarial en {{ Str::lower($data['office']) }}, apostillar acuerdon en {{ Str::lower($data['office']) }}, donde puedo apostillar un acuerdo notarial en {{ Str::lower($data['office']) }}" />
    
    <meta property="og:url"         content="{{ Request::url() }}" />
    <meta property="og:type"        content="article" />
    <meta property="og:title"       content="Acuerdos Notarizados y Apostillados en {{ $data['office'] }} - Notaria Latina" />
    <meta property="og:description" content="Los acuerdos son un pacto firmado entre dos o más personas que están de acuerdo con lo estipulado en el documento." />
    <meta property="og:image"       content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />

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
              <h1 class="font-weight-bold heading-title" >Acuerdos Notariales en {{ $data['office'] }}</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
      <h2 style="font-size: 25px">¿Qué es un acuerdo?</h2>
      <p class="text-muted">Un acuerdo en un convenio firmado entre dos o más personas frente a un tema en el cual se tienen opiniones diferentes por ambas partes.</p>
              <h2 style="font-size: 25px">¿Para que me sirve realizar un acuerdo?</h2>
              <p class="text-muted">El objetivo de un acuerdo es el de buscar una posición común entre ambas partes y de esta manera llegar a un acuerdo. Una vez realizado el mismo, este sirve para comprometer a las dos personas a cumplir con obligaciones y derechos establecidos por ley.</p>
  
              <h2 style="font-size: 25px">¿Que requisitos necesito para realizar un acuerdo?</h2>
              <ul class="text-muted">
                  <li>Identificación válida de las personas que van a realizar el acuerdo.</li>
                  <li>Información de lo que se quiere dejar estipulado en el acuerdo.</li>
              </ul>
  
              <h2 style="font-size: 25px">¿Donde puedo realizar un acuerdo?</h2>
              <p class="text-muted"><b style="font-weight: 500; cursor: pointer" data-toggle="modal" data-target="#exampleModal">Complete el siguiente formulario </b> con toda su informacion o acérquese a nuestra oficina y un asesor lo guiará en la gestión del documento para que realice el trámite de manera correcta y segura.</p>
  
         <h2 style="font-size: 25px">¿En que tiempo me entregan los acuerdos?</h2>
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

              @if(!sizeof($posts) == 0)
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
        document.getElementById('prisection').style.backgroundImage = "url('../img/acuerdos.jpg')";
        // document.getElementsByTagName("script")[0].parentNode.appendChild(scriptPopper);
        // document.getElementsByTagName("script")[0].parentNode.appendChild(scriptBootstrap);
    });
  </script>
@endsection

