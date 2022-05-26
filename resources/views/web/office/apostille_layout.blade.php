@extends('layouts.web')

@section('header')
    <meta name="title" content="Apostillar {{ $data['description'] }} en {{ $data['office'] }}">
    <meta name="description"     content="{{ $data['metadescription'] }}">
    <meta name="keywords"        content="{{ $data['keywords'] }}">
    <title>Apostillar {{ $data['description'] }} en {{ $data['office'] }} | Notaria Latina</title>

    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1' />

    <meta property="og:url" content="{{Request::url()}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Apostillar {{ $data['description'] }} en {{ $data['office'] }} | Notaria Latina">
    <meta property="og:description" content="{{ $data['metadescription'] }}">
    <meta property="og:image" content="{{ asset('img/IMG-NOTARIA-02.jpg') }}">
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="400" />

    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" as="style" onload="this.rel='stylesheet'" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        h2{font-size: 25px}
        #card_posts:hover{box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;}
        #div_map{padding-top:2%;padding-bottom:2%}
        #div_visitenos{margin-right: 5vw;}
        #div_visitenos h3{font-size: 25px}
        @media screen and (max-width: 580px){
            h2{font-size: 18px}
            #div_map{padding-top:0%;padding-bottom:0%}
            #div_visitenos{margin-right: 0vw;margin-top:10%;}
            #div_visitenos h3{font-size: 20px}
            #title{
                font-size: 20px !important;
            }
            #txtSubtitle{
                font-size: 18px !important;
                justify-content: left !important;
            }
            #card{
                margin-right: 0px !important;
                margin-left: 0px !important;
            }
            #divBody{
                margin-left: 0px !important;
                margin-right: 0px !important;
            }
            .inputs{
                font-size: 12px !important;
                margin-bottom: -25px !important;
            }
        }
    </style>
@endsection

@section('phoneNumberHidden', $data['telfHidden'])
@section('phoneNumber', $data['telfShow'])

@section('content')
<div id="prisection" class="d-flex justify-content-center align-items-center text-center" style="height: 35vh;background-size: cover; background-position: left top; background-repeat: no-repeat;">
    <h1 id="title" style="font-size: 40px; color: #ffffff">Apostillamos <b>{{ $data['description']}}</b> en {{ $data['office']}}</h1>
</div>

    @if(isset($data['body']))
        <div class="container mt-5">
            <div class="row d-flex mx-1">
                <div class="d-flex">
                    <section>
                        {!! $data['body'] !!}    
                    </section>
                </div>
                <div>
                </div>
            </div>
        </div>
    @endif

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div data-aos="zoom-in" id="card" class="card" style="box-shadow: 1px 1px 4px 4px #d5d4d4; border-radius: 0px;">
                    <div class="card-header" style="border-bottom: none; background-color: #333333">
                        <div class="d-flex justify-content-center align-items-center">
                            <h5 id="txtSubtitle" class="text-center text-white" style="font-size: 30px; margin-left: 5%; margin-right: 5%; margin-top: 1%; padding-top: 2%; padding-bottom: 2%">Para apostillar <b>{{ $data['description'] }}</b>, complete el formulario y nos pondrémos en contacto</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="divBody" class="mt-3" style="margin-left: 10%; margin-right: 10%">
                            {!! Form::open(['route' => 'send.apostilla', 'enctype' => 'multipart/form-data', 'files' => true, 'method' => 'POST']) !!}
                                @csrf
                                <input type="hidden" name="document" value="{{ $data['description'] }}">
                                <input type="hidden" name="from" value="{{$data['office']}}">
                                <div class="mb-5 d-flex">
                                    <input style="border: none; border-bottom:solid 1px; border-radius: 0px; margin-right: 5px; border-color: rgb(228, 216, 216)" type="text" class="form-control inputs" placeholder="Nombre*" name="name" autocomplete="off" value="{{ old('name')}}" required>
                                    <input style="border: none; border-bottom:solid 1px; border-radius: 0px; border-color: rgb(228, 216, 216)" type="text" class="form-control inputs" placeholder="Apellido*" name="lastname" autocomplete="off" value="{{ old('lastname')}}" required>
                                </div>
                                <div class="mb-5 d-flex">
                                    @include('layouts.select_countries')
                                    <input class="form-control inputs" type="number" placeholder="Teléfono*" style="border: none; border-bottom:solid 1px; border-radius: 0px; border-radius: 0px; border-color: rgb(228, 216, 216)" name="phone" id="phone" maxlength="14" minlength="8" autocomplete="off" required>
                                </div>
                                <div class="mb-5 d-flex">
                                    <input type="email" name="email" id="email" style="border: none; border-bottom:solid 1px; border-radius: 0px; border-color: rgb(228, 216, 216)" class="form-control inputs" placeholder="Correo electrónico*" required/>
                                </div>
                                <div class="mb-5 d-flex">
                                    <textarea name="mensaje" id="mensaje" rows="4" style=" border-radius: 0px; border-color: rgb(228, 216, 216)" class="form-control inputs" placeholder="Mensaje"></textarea>
                                </div>
                                <label class="mb-2 inputs" for="adjunto">Adjuntar un archivo</label>
                                <div class="mb-5 d-flex">
                                    <input type="file" name="adjunto" id="adjunto" class="form-control inputs">
                                </div>
                                <div class="mb-5 d-flex justify-content-center">
                                    <input style="background-color: #ffc107; color: #000000; border: none" type="submit" value="Enviar" class="btn btn-primary btn-block">
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>

    <hr style="width: 40vw; margin-top: 50px; margin-bottom: 40px">

    <div data-aos="fade-up" style="background-color: #122944" class="mt-5 mb-5 pt-5 pb-5 text-center text-white">
        <h2>¿Desea saber más información para apostillar <b style="color: #FFC107">{{ $data['description']}}</b>?</h2>
        <p style="font-size: 16px">Llámenos y lo guiamos en el proceso de una manera segura <i class="fa-solid fa-check"></i></p>
        <a href="tel:{{$data['telfHidden']}}" class="btn" style="background-color: #FFC107"><i class="fa-solid fa-phone-flip"></i> LLAMAR</a>
    </div>

    <div data-aos="flip-up" id="div_map" class="mt-5">
        <div class="row">
            <div class="col-sm-6">
                <div class="d-flex justify-content-center">
                    @php
                        switch ($data['office']) {
                            case 'New Jersey': $img_location = 'map-newjersey-notaria.webp'; break;
                            case 'New York': $img_location = 'maps-newyork-notaria.webp'; break;
                            case 'Florida': $img_location = 'map-florida-notaria.jpg'; break;
                            default:break;
                        }
                    @endphp
                    <a target="_blank" href="{{ $data['location'] }}">
                        <img width="400vw" height="100vh" class="lazy img-fluid" data-src="{{ asset('img/'.$img_location) }}" alt="Apostillar {{ $data['description'] }} en {{ $data['office'] }} | Notaria Latina">
                    </a>
                </div>
            </div>
            <div class="col-sm-6 d-flex justify-content-center align-items-center text-center">
                <div id="div_visitenos">
                    <h3 style="color: #122944; font-weight:600">¡Visítenos en nuestras oficinas en {{ $data['office']}} para asesorarlo con el trámite personalmente!</h3>
                    <p style="font-size: 20px; margin-bottom: 5px">Dirección:</p>
                    <i class="fa-solid fa-location-dot" style="color: #122944; font-size: 20px"></i> <a target="_blank" style="color: #000000; font-size: 19px" href="{{$data['location']}}">{{$data['address']}}</a>
                </div>
            </div>
        </div>
    </div>

    @php
        $posts = DB::table('posts')->where('name', 'LIKE', '%apostilla%')->inRandomOrder()->limit(3)->get();
    @endphp

    <div class="mt-5" style="margin-left: 7%; margin-right: 7%">
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

    @if (session('success'))
        @php
            echo "
                <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                <script>
                    swal('Hemos enviado tu información', 'Nos pondremos en contacto lo antes posible', 'success');
                </script>
                ";    
        @endphp
    @endif
    @if(session('error'))
        @php
            echo "
                <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                <script>
                    swal('Algo salió mal!', 'Intenta enviando nuevamente', 'success');
                </script>
                ";    
        @endphp
    @endif
@endsection


@section('numberWpp', $data['telfWpp'])

@section('script')
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('{{url('img/Apostilla-General.webp')}}')";
    });
    document.addEventListener("DOMContentLoaded",function(){var e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var n=new IntersectionObserver(function(e,t){e.forEach(function(e){if(e.isIntersecting){var t=e.target;t.src=t.dataset.src,t.classList.remove("lazy"),n.unobserve(t)}})});e.forEach(function(e){n.observe(e)})}else{var t;function r(){t&&clearTimeout(t),t=setTimeout(function(){var n=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+n&&(e.src=e.dataset.src,e.classList.remove("lazy"))}),0==e.length&&(document.removeEventListener("scroll",r),window.removeEventListener("resize",r),window.removeEventListener("orientationChange",r))},20)}e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)}});
</script>
@endsection