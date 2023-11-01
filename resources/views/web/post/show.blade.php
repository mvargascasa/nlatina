@extends('layouts.web')

@section('header')
    <title>{{$post->name}}</title>
    <meta name="description" content="{{$post->metadescrip}}"/>
    <meta name="keywords" content="{{ $post->keywords }}">
    <meta property="og:url"                content="{{route('post.slug',$post->slug)}}" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="{{$post->name}}" />
    <meta property="og:description"        content="{{$post->metadescrip}}" />
    <meta property="og:image"              content="{{url('uploads/i600_'.$post->imgsmall)}}" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link rel="preload" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" as="style" onload="this.rel='stylesheet'"> --}}

    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap'); */
        body{font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif}
        h2{font-size: 25px !important}
        h3{font-size: 20px !important; font-weight: 300 !important}
        #publishpoder{display: none} #publishcarta{display: none}
        @media screen and (max-width: 580px){
            #imgBlog{float: none !important;justify-content: center !important;padding: 0px !important;border-radius: 5px !important}
            #rowImageBanner{min-height: 350px !important;}
            #prisection{height: 350px !important;}
            h1{font-size: 25px !important; }
            h2{font-size: 20px !important; font-weight: 600 !important}
            #benefits{margin-top:25px !important}
            #publishpoder{display: block} #publishcarta{display: block}
        }
        .card:hover{box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;}
        .sticky {position: -webkit-sticky; position: sticky; top: 10px;}
        @media screen and (max-width: 580px){.personalized-container{padding-left: 1px !important; padding-right: 1px !important}}
        @media screen and (max-width: 1300px){.personalized-container{padding-left: 20px !important; padding-right: 20px !important}}
        @media screen and (max-width: 991px){.social{display: none !important}}
        .personalized-container{padding-left: 150px; padding-right: 150px};
    </style>
@endsection

@section('phoneNumberHidden', '+18007428602')
@section('phoneNumber', '800-742-8602')

@section('content')

    <section id="prisection" style="background-size: cover; background-repeat: no-repeat; width: 100%; height: 550px">
        <div>
            <div id="rowImageBanner" class="row align-items-center justify-content-center text-white" style="min-height: 550px; background:rgba(2, 2, 2, 0.5);">
                <h1 id="title" class="text-center mt-4 mb-5 px-2">{{$post->name}}</h1>
            </div>
        </div>
    </section>

    <div class="pt-4">
        <div class="row mt-2 mb-2 ml-1 justify-content-center infoblogmobile d-none">
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-6 border-left">
                        <p class=""><img class="lazy" data-src="{{asset('img/calendar.png')}}" width="20px" height="20px" alt=""><b style="font-weight: 500;" class="ml-1 mr-1">Fecha de Publicación:</b> {{ $post->created_at->format('M d, Y')}}</p>
                    </div>
                    @isset($post->reading_time)
                    <div class="col-sm-6 border-left">
                        <p class="d-flex align-items-center"><img class="lazy" data-src="{{asset('img/reloj.png')}}" width="20px" height="20px" alt=""><b style="font-weight: 500" class="ml-1 mr-1">Tiempo de Lectura:</b> {{ $post->reading_time}} min.</p>
                    </div>
                    @endisset
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-1 d-flex justify-content-end sticky-top h-100" style="top: 60px">
                    <section class="d-inline px-3 py-4 bg-light shadow-sm rounded-pill mt-4 social" style="z-index: 3;">
                        <div class="mb-3">
                            <a target="_blank" href="https://www.instagram.com/notarialatina" title="Visitar Instagram de Notaria Latina">
                                <img width="40px" src="{{ asset('img/icon-instagram.png') }}" alt="Instagram Notaria Latina">
                            </a>
                        </div>
                        <div>
                            <a target="_blank" href="https://www.facebook.com/notariapublicalatina" title="Visitar Facebook de Notaria Latina">
                                <img width="40px" src="{{ asset('img/icon-facebook.png') }}" alt="Facebook Notaria Latina">
                            </a>
                        </div>
                    </section>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-xl-8 col-lg-8 mb-4" style="text-align: justify">
                    <div class="mt-3">
                        <?php echo htmlspecialchars_decode($post->body)?>
                    </div>
                    @isset($post->srcvideo)
                        <div class="row mt-5 mb-5">
                            <div class="col-12 d-flex justify-content-center">
                                <iframe id="iframevideo" width="520" height="315" title="{{ $post->name}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    @endisset
                </div>
                <div class="col-12 col-sm-10 col-md-10 col-lg-3 col-xl-3 text-center">
                    <div class="border pb-4 shadow-sm">
                        <p class="tit-not px-4 mt-4 h4">Información del artículo</p>
                        <div class="d-flex justify-content-center mb-2">
                            <img class="p-4 img-fluid lazy" width="500px" height="400px" alt="Imagen {{ $post->name }}" data-src='{{url('uploads/i600_'.$post->imgsmall)}}'>
                        </div>
                        <div class="row px-4 text-justify">
                            <div class="col-sm-12">
                                <span><b style="font-weight: 500;">Última actualización:</b></span><br>
                                <span>{{ $post->updated_at->format('M d, Y')}}</span>
                            </div>
                            @isset($post->reading_time)
                            <div class="col-sm-12">
                                <span class="d-flex align-items-center"><b style="font-weight: 500">Tiempo de Lectura:</b></span>
                                <span>{{ $post->reading_time}} min.</span>
                            </div>
                            @endisset
                        </div>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <h2 class="tit-not">Temas Relacionados</h2>
                    </div>
                    <div class="row mb-4 justify-content-center mx-1">
                        <div class="col-12">
                            <div class="row">
                                @foreach ($posts as $lpost)
                                    <div class="col-12">
                                        <div class="card my-2">
                                            <a href="{{route('post.slug',$lpost->slug)}}" class="stretched-link">
                                                <div>
                                                    <img data-src="{{url('uploads/i600_'.$lpost->imgdir)}}" class="lazy" height="140px" width="100%" alt="{{ $post->name }}" style="object-fit: cover;">
                                                    <div>
                                                        <div class="card-body p-2" style="position:relative;">
                                                            <span class="d-block text-dark font-weight-bold card-title" style="font-size: medium">{{$lpost->name}}</span>
                                                        </div>
                                                        <div class="d-flex justify-content-center pb-3">
                                                            <div>
                                                                <div class="small text-muted float-left mt-3 mr-1"><i class="far fa-calendar-alt" style="font-size: 17px"></i> {{$lpost->created_at->format('M d, Y')}}</div>
                                                                <div class="small text-muted float-right mt-3 ml-1"><i class="far fa-clock mr-1" style="font-size: 17px"></i> {{ $lpost->reading_time}} min.</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="text-center mt-4">
                                    <a class="btn rounded-pill shadow-sm" style="background-color: #2B384D; color: #ffffff" href="{{ route('post.blog') }}">Ver más artículos</a>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="container my-3 rounded-0 py-3">
                    <h4 class="text-center">Compartir el artículo</h4>
                    <div class="row mt-3">
                        <div class="col-sm-12 d-flex justify-content-center">
                            <p title="Compartir en Facebook" style="cursor: pointer" id="shareToFacebook"><i class="fab fa-facebook fa-2x" style="color: #0165E1"></i></p>
                            <p title="Compartir en Twitter" id="shareToTwitter" style="cursor: pointer"><i class="fab fa-twitter fa-2x ml-4" style="color: #1DA1F2"></i></p>
                            <p title="Compartir por WhatsApp" id="shareToWpp" style="cursor: pointer"><i class="fab fa-whatsapp fa-2x ml-4" style="color: #25D366"></i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            {{-- <div class="mt-4">
                <h2 class="text-center">¿Necesita realizar un trámite notarial?</h2>
                <p style="font-weight: 300; font-size: 20px" class="text-center mb-4">Gestionamos el proceso de una manera correcta y diligente.</p>
                <div class="row justify-content-center">
                    <div class="col-sm-6 border p-3" style="border-radius: 5px">
                        @include('z-form')
                    </div>
                    <div class="col-sm-6 w-100 justify-content-center" style="margin-top: auto !important; margin-bottom: auto !important">
                        <div id="benefits" class="text-center">
                            <p style="font-size: 23px"><span>Contáctenos y lo ayudamos con el procedimiento</span></p>
                            <p style="font-size: 17px"><i class="far fa-calendar-check" style="color: #FFC206"></i> Agende una cita en línea</p>
                            <p style="font-size: 17px"><i class="fas fa-headset" style="color: #FFC206"></i> Asesoramiento con personal calificado</p>
                            <p style="font-size: 17px"><i class="far fa-clock" style="color: #FFC206"></i> Trámites en el menor tiempo posible</p>
                        </div>
                    </div>
                </div>
            </div> --}}
    </div>

    <section class="bg-light">
        <section class="container">
            <div class="row justify-content-center py-5">
                <div class="col-12 col-sm-6 d-flex align-items-center pb-4">
                    <div>
                        <p class="h4 text-center">¿Necesita realizar un trámite notarial?</p>
                        <p class="h6">En Notaria Latina contamos con los siguientes servicios:</p>
                        <ul>
                            <li>Poderes</li>
                            <li>Apostillas</li>
                            <li>Traducciones</li>
                            <li>Certificaciones</li>
                            <li>Affidavit</li>
                            <li>Revocatorias</li>
                            <li>Acuerdos</li>
                            <li>Cartas de Invitación</li>
                            <li>Travel Authorization</li>
                            <li>Contratos</li>
                            <li>Testamentos</li>
                            <li>Entre otros</li>
                        </ul>
                    </div>
                </div>
                <article class="col-12 col-sm-12 col-md-12 col-xl-6 col-lg-6">
                    <div class="px-3 py-3 text-white rounded-0 shadow" style="background-color: #2B384D; font-size: 13px;">
                        <p class="h6 text-center py-4">Complete la información y un asesor se contactará con usted</p>
                        @include('z-form')
                    </div>
                </article>
            </div>
        </section>
    </section>
    {{-- video row --}}

    {{-- share row --}}

    {{-- <hr class="my-5">
    <div class="col-12 text-center">
        <h2 class="tit-not">Temas Relacionados</h2>
    </div>
        <div class="row mb-4 justify-content-center mx-1">
            <div class="col-sm-8 col-12">
                <div class="row">
                    @foreach ($posts as $lpost)
                        <div class="col-12 col-md-4">
                            <div class="card my-2">
                                <a href="{{route('post.slug',$lpost->slug)}}" class="stretched-link">
                                    <img data-src="{{url('uploads/i600_'.$lpost->imgdir)}}" class="card-img-top lazy" alt="{{ $post->name }}" style="object-fit: cover; height: 140px">
                                </a>
                                <div class="card-body p-2" style="position:relative;">
                                    <span class="d-block text-muted font-weight-bold text-truncate "
                                            style="font-size:1rem">{{$lpost->name}}</span>
                                    <span class="d-block text-muted text-truncate">
                                        <?php echo strip_tags(substr($lpost->body,0,100))  ?>
                                    </span>
                                <div class="small text-muted float-left mt-3"><i class="far fa-calendar-alt" style="font-size: 17px"></i> {{$lpost->created_at->format('M d, Y')}}</div>
                                <div class="small text-muted float-right mt-3"><i class="far fa-clock mr-1" style="font-size: 17px"></i> {{ $lpost->reading_time}} min.</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div> --}}

    {{-- @if(isset($post) && $post->id == 95)
        <div id="publishpoder">
            <div class="fixed-bottom bg-danger text-white pt-3 text-center d-flex justify-content-center">
                <i class="fas fa-times-circle mt-1 mr-1" onclick="document.getElementById('publishpoder').style.display='none'" style="cursor: pointer"></i>
                <p>¿Necesita tramitar una Carta Poder? <a class="text-white" href="{{route('landing.notaria')}}"><b>Click aquí <i class="fas fa-arrow-circle-right"></i></b></a></p>
            </div>
        </div>
    @endif

    @if(isset($post) && $post->id == 82)
        <div id="publishcarta">
            <div class="fixed-bottom bg-danger text-white pt-3 text-center d-flex justify-content-center">
                <i class="fas fa-times-circle mt-1 mr-1" onclick="document.getElementById('publishcarta').style.display='none'" style="cursor: pointer"></i>
                <p>¿Necesita tramitar una Carta de Invitación? <a class="text-white" href="{{route('landing.notaria')}}"><b><br> Click aquí <i class="fas fa-arrow-circle-right"></i></b></a></p>
            </div>
        </div>
    @endif --}} 

    @if (session('sendcomment'))
        @php
            echo "
                <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                <script>
                    swal('Gracias por enviar su comentario', 'Valoramos mucho su opinión', 'success');
                </script>
                ";    
        @endphp
    @endif
@endsection

@section('numberWpp', '13479739888')

@section('script')
    <script>
        window.addEventListener('load', (event) => {
            document.getElementById('prisection').style.backgroundImage = "url('{{url('uploads/i900_'.$post->imgdir)}}')";
        });
        setTimeout(() => {
            let iframevideo = document.getElementById('iframevideo');
            if(iframevideo)
            document.getElementById('iframevideo').src = "{{url('https://www.youtube.com/embed/AHE8EC0wsNA')}}";
        }, 3000);
        let shareLink = window.location.href;
        document.getElementById('shareToFacebook').addEventListener('click', () => {window.open('https://www.facebook.com/sharer/sharer.php?u=' + shareLink, 'facebook-share-dialog', 'width=626, height=436');});
        document.getElementById('shareToTwitter').addEventListener('click', () => {window.open('https://twitter.com/intent/tweet?url='+shareLink)});
        document.getElementById('shareToWpp').addEventListener('click', () => {window.open('https://api.whatsapp.com/send?text='+shareLink, '_blank')});
        document.addEventListener("DOMContentLoaded",function(){var e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var n=new IntersectionObserver(function(e,t){e.forEach(function(e){if(e.isIntersecting){var t=e.target;t.src=t.dataset.src,t.classList.remove("lazy"),n.unobserve(t)}})});e.forEach(function(e){n.observe(e)})}else{var t;function r(){t&&clearTimeout(t),t=setTimeout(function(){var n=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+n&&(e.src=e.dataset.src,e.classList.remove("lazy"))}),0==e.length&&(document.removeEventListener("scroll",r),window.removeEventListener("resize",r),window.removeEventListener("orientationChange",r))},20)}e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)}});
    </script>
@endsection

