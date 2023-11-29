@extends('layouts.web')
@section('header')
<title>Traducción de documentos en {{ $data['office'] }} - Notaria Latina</title> 
<meta name="description"        content="Realizamos traducciones de documentos en {{ $data['office'] }} para sus trámites más importantes. Contáctenos ahora y lo asesoramos en el proceso! ✔">       
<meta name="keywords"           content="que es una traduccion de documento, para que sirve la traduccion de un documento, que tipo de documento se puede traducir, requisitos para la traduccion de un documento en {{ Str::lower($data['office']) }}, traduccion de documentos en {{ Str::lower($data['office']) }}, apostilla y traduccion de documentos en {{ Str::lower($data['office']) }}, donde puedo traducir un documento en {{ Str::lower($data['office']) }}, donde puedo traducir un certificado en {{ Str::lower($data['office']) }}, donde puedo traducir un diploma en {{ Str::lower($data['office']) }}, traduccion de documentos notariales en {{ Str::lower($data['office']) }}, traduccion y apostilla de documentos en {{ Str::lower($data['office']) }}" />

<meta property="og:url"         content="{{ Request::url() }}" />
<meta property="og:type"        content="article" />
<meta property="og:title"       content="Traducciones Notarizadas y Apostilladas en {{ $data['office'] }} - Notaria Latina" />
<meta property="og:description" content="Realizamos traducciones de documentos para sus trámites más importantes.Para las traducciones de documentos el único requisito es presentar el documento original que desea traducir." />
<meta property="og:image"       content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />

<style>
  #card_posts:hover{box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;}
</style>
@endsection

@section('phoneNumberHidden', $data['telfHidden'])
@section('phoneNumber', $data['telfShow'])

@section('content')

<section id="prisection" style="background-size: cover;background-position: left center; background-repeat: no-repeat; background-image: url('{{ asset('img/traducciones.webp') }}')">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Traducción de documentos en {{ $data['office'] }}</h1>
  
              <button class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</button>
          </div>

      </div>
    </div>
  </section>
  
<div class="container pt-4">
            <h2 style="font-size: 25px">Realizamos traducciones de documentos para sus trámites más importantes.</h2>
            <p class="text-muted">Las traducciones son una transcripción de textos de un idioma a otro diferente, es así que pueden ser presentados
                frente a las entidades que soliciten los mismos.</p>
            <p class="text-muted">Estos documentos y traducciones se solicitan generalmente para gestionar trámites fuera del país de origen del
                documento y con un idioma diferente.</p>
            <p class="text-muted">Ademas deben estar certificados por un notario para demostrar su validez, por lo tanto nuestro personal calificado
                realizará la traducción de sus documentos testificando que lo transcrito es fiel copia del documento original y así tendra valor legal.</p>

            <h2 style="font-size: 25px">¿Para que sirven las traducciones de documentos?</h2>
            <p class="text-muted">Al obtener un documento con sus correctas traducciones nos permiten validar su información es así que este se pueda
                utilizar fuera del país de origen y usted pueda gestionar de manera correcta sus trámites más importantes.</p>

            <h2 style="font-size: 25px">¿Que tipo de documentos se pueden traducir?</h2>
            <ul class="text-muted">
                <li>Certificados de nacimiento.</li>
                <li>Diplomas.</li>
                <li>Certificados de matrimonio.</li> 
                <li>Documentos de divorcio.</li>
                <li>Certificados de defunción.</li>
                <li>Documentos medicos.</li>
                <li>Documentos legales.</li>
                <li>Certificados estudiantiles.</li>
                <li>Estados financieros.</li>
            </ul>

            <h2 style="font-size: 25px">¿Que requisitos necesito para la traduccion de documentos?</h2>
            <p class="text-muted">Para las traducciones de documentos el único requisito es presentar el documento original que desea traducir,
                es por esto que el trámite es tan simple y rápido.</p>

        <h2 style="font-size: 25px">¿En donde puedo traducir un documento?</h2>
        <p class="text-muted">Para que un documento traducido tenga validez debe ser certificado por un notario debidamente acreditado.</p>
        <p class="text-muted">Por lo tanto es importante que se acerque a nuestra oficina con el documento que desea traducir y uno de
            nuestros asesores lo guiará con su trámite de manera correcta y segura.</p>

        <h2 style="font-size: 25px">¿En que tiempo me entregan mi documento traducido?</h2>
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
{{-- <script defer src="{{asset('js/jquery-3.4.1.min.js')}}"></script> --}}
<script>
  let scriptBootstrap = document.createElement('script');
  scriptBootstrap.src = "{{ asset('js/bootstrap.min.js') }}";

  var scriptPopper = document.createElement('script');
  scriptPopper.src = "{{ asset('js/popper.min.js') }}";
    window.addEventListener('load', (event) => {
        //document.getElementById('prisection').style.backgroundImage = "url('../img/traducciones.webp')";
        // document.getElementsByTagName("script")[0].parentNode.appendChild(scriptPopper);
        // document.getElementsByTagName("script")[0].parentNode.appendChild(scriptBootstrap);
    });
  </script>
@endsection

