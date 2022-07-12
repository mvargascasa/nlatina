@extends('layouts.web')
@section('header')
<title>Affidávit Notarizados y Apostillados en {{ $data['office'] }}</title> 
<meta name="title" content="Affidávit Notarizados y Apostillas en {{ $data['office'] }}">
<meta name="description" content="Una declaración jurada (Affidávit) es un manifiesto cuya veracidad se asegura mediante un juramento 📃 Consulte por nuestros servicios en {{ $data['office'] }} 🗽">       
<meta name="keywords" content="affidavit, declaracion jurada, declaracion juramentada, que es un affidavit, para que sirve un affidavit, requisitos para realizar affidavit en {{ Str::lower($data['office']) }}, como hacer una declaracion jurada en {{ Str::lower($data['office']) }}, realizar declaracion jurada en {{ Str::lower($data['office']) }}, donde puedo realizar una declaracion jurada notarial en {{ Str::lower($data['office']) }}, donde hacer declaracion juramentada en {{ Str::lower($data['office']) }}" />

<meta property="og:url"                content="{{ Request::url() }}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="Affidávit Notarizados y Apostillados en {{ $data['office'] }}" />
<meta property="og:description"        content="Una declaración jurada o Affidávit es una manifestación escrita o verbal cuya veracidad es asegurada mediante un juramento ante una autoridad judicial o administrativa." />
<meta property="og:image"              content="{{asset('img/affidavit.jpg')}}" />
<style>
  #card_posts:hover{box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;}
</style>
@endsection

@section('phoneNumberHidden', $data['telfHidden'])
@section('phoneNumber', $data['telfShow'])

@section('content')

<section id="prisection" style="background-size: cover;background-position: left center; background-repeat: no-repeat;">
    <div>
        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">
            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Declaración Jurada (Affidávit) en {{ $data['office'] }}</h1>
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>
      </div>
    </div>
  </section>

<div class="container pt-4">
            <h2 style="font-size: 25px">Realizamos Declaraciones Juradas (Affidávit)</h2>
            <p class="text-muted">Una declaración jurada o Affidávit es una manifestación escrita o verbal cuya veracidad es asegurada mediante un juramento
                ante una autoridad judicial o administrativa.</p>
            <p class="text-muted">Esto hace que el contenido de la declaración sea tomado como cierto hasta que se demuestre lo contrario.</p>

            <h2 style="font-size: 25px">¿Para que sirve un Affidávit?</h2>
            <p class="text-muted">Este documento es necesario para algunos trámites de inmigración cuando quieres solicitar que un familiar obtenga la visa o
                residencia en Estados Unidos.</p>
            <p class="text-muted">Este documento del affidavit también se conoce entre los migrantes como declaración jurada de sostenimiento, mantenimiento o
                solvencia económica.</p>

            <h2 style="font-size: 25px">¿Que requisitos necesito para realizar los acuerdos?</h2>
            <ul class="text-muted">
                <li>Identificación válida de la persona que va a realizar la declaración jurada.</li>
                <li>Información de lo que se quiere dejar estipulado en el documento.</li>
            </ul>

            <h2 style="font-size: 25px">¿Donde puedo realizar un acuerdo?</h2>
            <p class="text-muted">Acérquese a nuestra oficina y un asesor lo guiará en la gestión del documento para que realice el trámite de manera correcta y segura.</p>


        <h2 style="font-size: 25px">¿En que tiempo me entregan un Affidávit?</h2>
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

            @if (!sizeof($posts) == 0)
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
        document.getElementById('prisection').style.backgroundImage = "url('../img/affidavit.jpg')";
        // document.getElementsByTagName("script")[0].parentNode.appendChild(scriptPopper);
        // document.getElementsByTagName("script")[0].parentNode.appendChild(scriptBootstrap);
    });
  </script>
@endsection

