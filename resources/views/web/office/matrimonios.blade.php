@extends('layouts.web')

@section('header')
    <title>Matrimonios en {{ $data['office'] }} | Notaria Latina</title>
    <meta name="description" content="Convierta su sueño de casarse en Florida ante un notario. Descubra cómo planificar una boda legal y memorable  con la ayuda de un notario autorizado ✅">
    <meta name="keywords" content="casarse en florida, matrimonios en florida, licencia para casarse en florida, requisitos para casarse en florida, matrimonio en la florida, matrimonio florida, notarios para bodas, notarios para bodas cerca de mi, notarios para bodas civiles, notarios para bodas civiles cerca de mi, casarse en florida requisitos, donde casarse en florida, casarse en florida ante notario, notario para casarse en florida">

    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Matrimonios en {{ $data['office'] }} | Notaria Latina">
    <meta property="og:description" content="Si desea dar este paso importante en su vida, que mejor para hacerlo que en Florida. ¿Necesita saber como realizar el proceso de matrimonio?">
    <meta property="og:image" content="{{ asset('img/matrimonios.webp') }}">
    <style>
      #card_posts:hover{box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;}
    </style>
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
    <h2 class="px-2 py-1" style="font-size: 1.6rem; border-left: 3px solid #FFBE3E;">¿Quién puede emitir el certificado de matrimonio?</h2>
    <p class="text-muted text-justify">
        Hace ya más de un año que los notarios pueden certificar el matrimonio en Florida, 
        al igual que tramitar el expediente previo a la celebración del matrimonio mediante un acta notarial.
        El fin de esta acta es para constatar que ambos contribuyentes cumplan los requisitos de capacidad, 
        además de que no existan impedimentos legales de cualquier otro tipo de matrimonio.  
    </p>
    <h2 class="px-2 py-1" style="font-size: 1.6rem; border-left: 3px solid #FFBE3E;">¿Qué requisitos se necesitan?</h2>
    <p class="text-muted text-justify">Ante un notario público tendrás que tener la siguiente documentación:</p>
    <ul class="text-muted">
        <li>Documento de identidad, pasaporte o un tipo de ID.</li>
        <li>Certificado de nacimiento, expedido hace menos de un año por el Registro Civil del lugar de nacimiento.</li>
        <li>Certificados de empadronamiento en el lugar de residencia durante los dos últimos años ; o certificado del Consulado, si se ah residido en el extranjero. </li>
        <li>Si su pareja estaba casado antes necesitara brindar la acta de matrimonio anulada, o certificado de defunción del primer cónyuge. </li>
        <li>Los extranjero deberán presentar un certificado de capacidad matrimonio o certificado de soltería para poderse casar en florida. </li>
    </ul>
    <h2 class="px-2 py-1" style="font-size: 1.6rem; border-left: 3px solid #FFBE3E;">¿Cómo se lleva a cabo el matrimonio?</h2>
    <p class="text-muted text-justify">
        Para la tramitación del acta el notario publico le preguntará a los futuros 
        esposos si reúnen los requisitos necesarios para contraer matrimonio. Así el notario publico escuchará a cada uno
        por separado, con la finalidad de cerciorarse de que sus manifestaciones son ciertas y su voluntad es propia 
        para poderse casar.  El notario público finalizará el acta haciendo constar que los contrayentes cumplen los 
        requisitos necesarios para poder contraer el matrimonio. Por último el notario público entregará una copia 
        del acta de los contrayentes quienes podrán contraer el matrimonio ante el mismo notario. 
    </p>
    
    <h2 class="px-2 py-1" style="font-size: 1.6rem; border-left: 3px solid #FFBE3E;">¿En que tiempo me entregan mis documentos traducidos?</h2>
    <ul class="text-muted">
        <li>El tiempo de entrega dentro de los Estados Unidos es de 24 horas.</li>
        <li>El tiempo de entrega fuera de los Estados Unidos es de 3 días laborables.</li>
        <li>El documento digital estará disponible en 24 horas.</li>
    </ul>
    <p class="text-muted"><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
        <a href="https://www.facebook.com/profile.php?id=61553644160037"><em>FanPage de Facebook</em></a><em>.</em></p>
        <div class="d-flex justify-content-center pb-4">
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
<script defer src="{{ asset('js/navbar-style-v1.1.js') }}"></script>
    <script>
      var scriptBootstrap = document.createElement('script');
      scriptBootstrap.src = "{{ asset('js/bootstrap.min.js') }}";

      var scriptPopper = document.createElement('script');
      scriptPopper.src = "{{ asset('js/popper.min.js') }}";
        window.addEventListener('load', (event) => {
            document.getElementById('prisection').style.backgroundImage = "url('../img/matrimonios.webp')";
        //     document.getElementsByTagName("script")[0].parentNode.appendChild(scriptPopper);
        // document.getElementsByTagName("script")[0].parentNode.appendChild(scriptBootstrap);
        });
    </script>
@endsection