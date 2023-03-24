@extends('layouts.web')
@section('header')
    <title>Consulado de {{$consul->country}} en New York - Notaría Latina</title>
    <meta name="description"        content="Información para Ciudadanos de {{$consul->country}} en New York sobre Trámites Consulares, Apostillas, Poderes, Renovación de Pasaportes."/>
    <meta name="keywords"           content="consulado {{Str::lower($consul->country)}} new york, consulado de {{Str::lower($consul->country)}}, consulado de {{Str::lower($consul->country)}} new york, cita consular {{ Str::lower($consul->country) }}, cita consulado {{Str::lower($consul->country)}}, cita consulado de {{Str::lower($consul->country)}} en new york, cita consular {{$consul->country}} en new york, cita consulado {{Str::lower($consul->country)}} ny, migrante de {{ Str::lower($consul->country) }}, tramite consular {{ Str::lower($consul->country) }}, tramites consulares de {{ Str::lower($consul->country) }} en new york, consulado de {{ Str::lower($consul->country) }} en new york, consulado {{Str::lower($consul->country)}},  consulado de {{Str::lower($consul->country)}} en ny, consulado {{ $consul->demonym }}, consulado {{ $consul->demonym }} en ny, consulado {{ $consul->demonym }} en new york, consulado {{$consul->demonym}} new york, consulado {{$consul->demonym}} de new york, consulado de {{ Str::lower($consul->country)}} en estados unidos, consulado {{ $consul->demonym }} en estados unidos, trámites consulares en new york, embajada {{Str::lower($consul->country)}}, embajada de {{ Str::lower($consul->country) }} en new york" />

    <meta property="og:url"         content="https://notarialatina.com" />
    <meta property="og:type"        content="website" />
    <meta property="og:title"       content="Consulado de {{$consul->country}} en New York - Notaría Latina" />
    <meta property="og:description" content="Información para Ciudadanos de {{$consul->country}} en New York sobre Trámites Consulares, Apostillas, Poderes, Renovación de Pasaportes." />
    <meta property="og:image"       content="https://notarialatina.com/img/meta-notaria-latina-queens-new-york.jpg" />
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <style>
        @media screen and (max-width: 600px){
            #imgBanner{
                min-height: 385px !important;
            }
        }
        /* #phone {animation: wiggle 2s linear infinite;} */
        #emailicon{animation: wiggle 2s linear infinite;}
        .inputs{font-size: 13px}
    </style>

<script type="text/javascript">
    function callbackThen(response){
        // read HTTP status
        console.log(response.status);
        // read Promise object
        response.json().then(function(data){
          if(data.success && data.score > 0.5){
            console.log(data);
          } else {
            document.getElementById('formlead').addEventListener('submit', function (event) {
              event.preventDefault();
              console.log('recaptcha error. Stop form submission!');
            });
          }
        });
    }

    function callbackCatch(error){
        console.error('Error:', error)
    }
    </script>

<script id="scriptrecaptcha"></script>
<script>
    setTimeout(() => {
       document.getElementById('scriptrecaptcha').src = "https://www.google.com/recaptcha/api.js?render=6LdI9cMeAAAAALgxUrh7mzlzFBlIV-F4Gzvbp2D8"; 
        //console.log('cargando script recaptcha...');
    }, 3000);

    setTimeout(() => {
        var csrfToken = document.head.querySelector('meta[name="csrf-token"]');
        grecaptcha.ready(function() {
            grecaptcha.execute('6LdI9cMeAAAAALgxUrh7mzlzFBlIV-F4Gzvbp2D8', {action: 'homepage'}).then(function(token) {
                    
            fetch('/biscolab-recaptcha/validate?token=' + token, {
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": csrfToken.content
                }
            })
            .then(function(response) {
                callbackThen(response)
            })
            .catch(function(err) {
                callbackCatch(err)
            });
                });
            });
            //console.log('ejecutando codigo del recaptcha...');
    }, 3500);
</script>

    @endsection

@section('phoneNumberHidden', '+18007428602')
@section('phoneNumber', '800-742-8602')

@section('content')

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>
        <div id="imgBanner" class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">
            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Consulado de {{$consul->country}} en New York</h1>
          </div>
      </div>
    </div>
  </section>

<div class="container pt-4">
        <div class="row">
            <div class="col-12 col-md-9 p-4">
                <h2>APOSTILLA {{strtoupper($consul->country)}}</h2>
                <hr>
                <p><b>{{$consul->country}}</b> es miembro del Convenio de La Haya sobre Apostilla y cualquier documento oficial destinado a este país requiere una Apostilla del Secretario de Estado. El Convenio del 5 de octubre de 1961 por el que se abroga el requisito de legalización de documentos públicos extranjeros.</p>
                <p>Podemos Apostillar documentos emitidos desde cualquier estado de los EE.UU. Incluidos los documentos emitidos por el gobierno federal de EE.UU.</p>

                <p><b>Horario de atención:</b> de 8 AM a  6 PM De lunes a sábado</p>
                <p style="font-weight: 500"><i>Apostillamos sus documentos de una manera rápida con personal calificado</i></p>
                {{-- <div class="row">
                    <div class="col-12 col-sm-6 mb-3 text-center border-right">
                        <p style="font-weight: 500">¡Llámenos ahora!</p>
                        <a class="btn btn-outline-danger" style="border-radius: 0px !important;" href="tel:+17187665041">+1 718 766 5041 <i id="phone" class="fas fa-phone"></i></a>
                    </div>
                    <div class="col-12 col-sm-6 mb-3 text-center border-left">
                        <p style="font-weight: 500">Solicitar trámite</p>
                        <button class="btn btn-outline-danger mb-3" style="border-radius: 0px !important;" data-toggle="modal" data-target="#exampleModal">Iniciar Proceso <i id="emailicon" class="fas fa-envelope"></i></button>
                    </div>
                </div> --}}
                {{-- <p><b>Contáctenos:</b> <a class="btn" style="background-color: #122944; color: #ffffff" href="tel:+17187665041">+1 718 766 5041 📞</a></p> --}}
                {{-- <p><b>Correo electrónico:</b> <a  href="mailto:info@notarialatina.com ">info@notarialatina.com </a></p> --}}
                {{-- <p><b>Contáctenos</b> y lo ayudamos en el proceso de una manera segura.</p> --}}
                <p>Los documentos comunes que recibimos son:</p>
                <ul>
                    <li>Certificados de nacimiento</li>
                    <li>Certificados de matrimonio</li>
                    <li>Certificados de defunción</li>
                    <li>Decreto de divorcio
                    <li>Declaración Jurada de Estado Único</li>
                    <li>Verificaciones de antecedentes</li>
                    <li>Poderes generales y especiales</li>
                    <li>Copia de pasaporte</li>
                    <li>Copia de la licencia de conducir</li>
                    <li>Transcripciones</li>
                    <li>Diplomas</li>
                    <li>Carta de autorización</li>
                    <li>Autorización de viaje</li>
                    <li>Certificados médicos</li>
                    <li>Certificado de buena conducta</li>
                    <li>Certificación de libre venta</li>
                    <li>Certificación de origen</li>
                    <li>Carta poder legal</li>
                    <li>Cambio de nombre</li>
                </ul>
              <p>Tenga en cuenta: solo podemos ayudarlo con documentos que se originen en los Estados Unidos. Si sus documentos se originaron en <b>{{$consul->country}}</b>, deberá comunicarse con la autoridad competente correspondiente para que lo ayude en ese país.</p>
              <p>La apostilla de documentos en EE.UU. es un proceso que debe delegarse a un Notario Público para su correcta gestión en <b>{{$consul->country}}</b>.</p>
<br>
              
              <h3>Publicaciones Relacionadas al Consulado de {{$consul->country}}</h3>
              <hr>
              
              <div class="row">
                  @php 
                    if(count($consul->posts->where('status', 'PUBLICADO'))>0) $printposts =$consul->posts->where('status', 'PUBLICADO')->take(3) ;
                    else  $printposts = $posts;
                @endphp
                @foreach ($printposts as $lpost)
                    <div class="col-12 col-md-4">
                        <div class="card my-2 h-100">
                            <a href="{{route('post.slug',$lpost->slug)}}" class="stretched-link">
                                <img data-src="{{url('uploads/i600_'.$lpost->imgdir)}}" class="lazy card-img-top" alt="Consulado de {{ $consul->country }} en Estados Unidos" style="object-fit: cover;height: 150px !important;">
                                {{-- {{url('uploads/'.$lpost->imgdir)}} --}}
                            </a>
                            <div class="card-body p-2" style="position:relative;">
                            <span class="d-block text-muted font-weight-bold"
                                    style="font-size:15px">{{$lpost->name}}</span>
                            <span class="d-block text-muted text-truncate">
                                <?php echo strip_tags(substr($lpost->body,0,100))  ?>
                            </span>
                            <div class="small text-muted float-left">{{$lpost->created_at->format('M d')}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            </div>
            
            <div class="col-12 col-md-3"> 
                <div>
                    <h4 style="color: #122944;font-weight: bold">Información</h4>
                    <hr>
                    {!!$consul->html!!} 
                </div>
                <div class="bg-light mt-4 shadow-sm">
                    <div class="p-3">
                        <p class="h6 text-center">¿Necesita obtener una cita en el consulado?</p>
                        <p class="inputs text-center"><i class="fas fa-check-circle"></i> Lo ayudamos con el proceso</p>
                        {!! Form::open(['route' => 'consul.send.cite', 'method' => 'POST']) !!}
                        @csrf
                            <div style="font-size: 13px">
                                <div class="form-group">
                                    {!! Form::label('name', 'Nombres') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control rounded-0 inputs', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('lastname', 'Apellidos') !!}
                                    {!! Form::text('lastname', null, ['class' => 'form-control rounded-0 inputs', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email', 'Correo electrónico') !!}
                                    {!! Form::email('email', null, ['class' => 'form-control rounded-0 inputs', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('phone', 'Teléfono') !!}
                                    {!! Form::number('phone', null, ['class' => 'form-control rounded-0 inputs', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('office','¿En donde va a realizar la cita?') !!}
                                    {!! Form::select('office', ["" => 'Seleccione', 'New York' => 'New York', 'New Jersey' => 'New Jersey', 'Florida' => 'Florida'], null, ['class' => 'form-control rounded-0 inputs', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('message', 'Comentario') !!}
                                    {!! Form::textarea('message', null, ['class' => 'form-control rounded-0 inputs', 'rows' => '4', 'placeholder' => 'Hola, necesito realizar una cita consular para el día...', 'required']) !!}
                                </div>
                                <div class="text-center">
                                    {!! Form::submit('Enviar', ['class' => 'btn btn-block btn-warning btn-sm rounded-0 font-weight-bold shadow-sm']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                        <div>
                            <p class="text-center mt-2" style="font-size: 12px">*Recuerde que solamente lo ayudamos generando la cita en el consulado. <b class="text-danger">Nuestras oficinas no son el consulado</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

{{-- modal de contacto --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    @if (session('status'))
        @php
            echo "
                <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                <script>
                    swal('Hemos enviado su información', 'Nos pondremos en contacto lo antes posible', 'success');
                </script>
                ";    
        @endphp
    @endif


@endsection

@section('numberWpp', '13479739888')

@section('script')
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('{{url('uploads/'.$consul->header)}}')";
    });
    document.addEventListener("DOMContentLoaded",function(){var e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var n=new IntersectionObserver(function(e,t){e.forEach(function(e){if(e.isIntersecting){var t=e.target;t.src=t.dataset.src,t.classList.remove("lazy"),n.unobserve(t)}})});e.forEach(function(e){n.observe(e)})}else{var t;function r(){t&&clearTimeout(t),t=setTimeout(function(){var n=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+n&&(e.src=e.dataset.src,e.classList.remove("lazy"))}),0==e.length&&(document.removeEventListener("scroll",r),window.removeEventListener("resize",r),window.removeEventListener("orientationChange",r))},20)}e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)}});
  </script>
@endsection

