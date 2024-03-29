@extends('layouts.web')
@section('header')
<title>Certificaciones de documentos en {{ $data['office'] }} - Notaria Latina</title> 
<meta name="description" content="Las certificaciones son documentos sellados y firmados por un notario. Contáctenos y lo ayudamos en el trámite del documento en {{$data['office']}} &#9989;">       
<meta name="keywords" content="{{$data['keywords']}}" />

{{-- certificaciones en estados unidos, que es una certificacion, para que sirve una certificacion, requisitos para certificar un documento en {{ Str::lower($data['office']) }}, certificar documentos en {{ Str::lower($data['office']) }}, certificar acta de nacimiento en {{ Str::lower($data['office']) }}, certificar acta de matrimonio en {{ Str::lower($data['office']) }}, certificar declaracion jurada en {{ Str::lower($data['office']) }}, certificar licencia de conducir en {{ Str::lower($data['office']) }}, donde puedo certificar un documento en {{ Str::lower($data['office']) }}, donde puedo realizar un certificado en {{ Str::lower($data['office']) }} --}}
<meta property="og:url"                content="{{ Request::url() }}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="Certificaciones de Documentos Notarizados y Apostillados en {{ $data['office'] }} - Notaria Latina" />
<meta property="og:description"        content="Las certificaciones son documentos firmados y sellados por un notario, que le proporciona autenticidad a nuestros documentos, pueden ser utilizados en todo aquel trámite legale donde se requiera total veracidad." />
<meta property="og:image"              content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />

<style>
  #card_posts:hover{box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;}
  @media screen and (max-width: 600px){h2{font-size: 18px !important}}
  @media screen and (min-width: 600px){#rowimage{min-height: 550px !important}}
  body{text-align: justify}
</style>
@endsection

@section('phoneNumberHidden', $data['telfHidden'])
@section('phoneNumber', $data['telfShow'])

@section('content')

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat; background-image: url('{{asset($data['imgback'])}}')">
    <div>

        <div id="rowimage" class="row align-items-center" style="min-height: 500px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title">Certificaciones de documentos en {{ $data['office'] }}</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
          @isset($data['body'])
            {!!$data['body']!!}
          @else
            <h2 style="font-size: 25px">Realizamos Certificaciones de documentos en {{ $data['office'] }}</h2>
            <p class="text-muted">Las certificaciones son documentos firmados y sellados por un notario.</p>
            <p class="text-muted">Este trámite consta en una firma y sello en la que se declara que la copia emitida es fiel copia del documento original.</p>
            <p class="text-muted">Es decir, es un documento que el mismo notario expide o en base a un documento preexistente, así como la afirmación de que
                una transcripción o reproducción coincide fielmente con su original.</p>

            <h2 style="font-size: 25px">¿Para que me sirven las certificaciones?</h2>
            <p class="text-muted">Al ser la certificación un documento que le proporciona autenticidad a nuestros documentos, pueden ser utilizados
                en todo aquel trámite legal donde se requiera total veracidad.</p>
            <p class="text-muted">Esta certificación nos sirve para realizar tanto trámites nacionales como internacionales.</p>
            <p class="text-muted">Es importante que certifique documentos que puedan estar en deterioro para evitar gestionar este documento desde un
                inicion. Esto le evitará contratiempos a la hora de realizar trámites y gestiones importantes.</p>

            <h2 style="font-size: 25px">¿Qué tipo de documentos puedo certificar?</h2>
            <ul class="text-muted">
                <li>Actas de nacimiento.</li>
                <li>Actas de matrimonio.</li>
                <li>Cartas.</li>
                <li>Licencias de conducir.</li>
                <li>Declaraciones juradas.</li>
                <li>Escrituras.</li>
            </ul>

        <h2 style="font-size: 25px">¿Qué validez tienen las certificaciones?</h2>
        <p class="text-muted">Cualquier documento que sea certificado tiene la misma validez que el documento original, no vence en el tiempo y se puede
            utilizar el cualquier trámite legal que se necesite.</p>

        <h2 style="font-size: 25px">¿Que requisitos necesito para certificar un documento?</h2>
        <p class="text-muted">El único requisito es presentar el documento original que desea certificar, siempre que el notario pueda constatar que este es original.</p>

        <h2 style="font-size: 25px">¿En donde puedo certificar un documento?</h2>
        <p class="text-muted">Acérquese a nuestra oficina con el documento que desea certificar y un asesor lo guiará para que realice el trámite de manera correcta y segura.</p>




        <h2 style="font-size: 25px">¿En que tiempo me entregan mi documento certificado?</h2>
        <ul class="text-muted">
            <li>El tiempo de entrega dentro de los Estados Unidos es de 24 horas.</li>
            <li>El tiempo de entrega fuera de los Estados Unidos es de 3 días laborables.</li>
            <li>El documento digital estará disponible en 24 horas.</li>
            <li class="text-danger">Por motivos de codiv-19 puede existir retraso en los tiempos de entrega.</li>
        </ul>
        <p class="text-muted"><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
            <a href="https://www.facebook.com/notariapublicalatina/"><em>FanPage de Facebook</em></a><em>.</em></p>
            @endisset
            <div class="d-flex justify-content-center pb-4">
              <a class="btn btn-warning rounded-pill m-1 shadow-sm" href="{{route('web.contactenos')}}">Solicitar Trámite</a>
              <a class="btn btn-danger m-1 rounded-pill shadow-sm" href="tel:{{$data['telfHidden']}}">Llamar ahora</a>
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
<script defer src="{{ asset('js/navbar-style-v1.1.js') }}"></script>
<script>
  let scriptBootstrap = document.createElement('script');
  scriptBootstrap.src = "{{ asset('js/bootstrap.min.js') }}";

  let scriptPopper = document.createElement('script');
  scriptPopper.src = "{{ asset('js/popper.min.js') }}";
    window.addEventListener('load', (event) => {
        //document.getElementById('prisection').style.backgroundImage = "url({{asset($data['imgback'])}})";
        // document.getElementsByTagName("script")[0].parentNode.appendChild(scriptPopper);
        // document.getElementsByTagName("script")[0].parentNode.appendChild(scriptBootstrap);
    });
  </script>
@endsection

