@extends('layouts.web')
@section('header')
    <meta name="description" content="@isset($partner->specialty) Abogado en {{ $partner->city }}, {{$partner->state}} - {{ $partner->specialty }} ⚖👨‍⚖️@else Contamos con un amplio directorio de abogados/as y notarios en Latinoamérica | Notaria Latina ⚖👨‍⚖️ @endisset">
    <meta name="keywords" content="abogado near me, abogado cerca de mi, notario near me, notario cerca de mi, abogado en {{ Str::lower($partner->city) }}, abogado en {{Str::lower($partner->state)}}, abogado en {{ Str::lower($partner->city) }} {{ Str::lower($partner->state) }}, abogado en {{ Str::lower($partner->state) }} {{ Str::lower($partner->city) }}, notario en {{ Str::lower($partner->city) }} {{ Str::lower($partner->state) }}, abogados en {{ Str::lower($partner->country_residence) }}, @foreach($partner->specialties as $specialty)abogado {{ Str::lower($specialty->name_specialty) }} en {{ Str::lower($partner->city . " " .  $partner->state)}}, @endforeach @isset($partner->address)abogado en {{ Str::lower($partner->address)}} @endisset, abogado en {{ Str::lower($partner->state) }} {{ Str::lower($partner->country_residence) }}, abogado en {{ Str::lower($partner->city) }} {{ Str::lower($partner->country_residence) }}, abogado en {{ Str::lower($partner->city) }} {{ Str::lower($partner->state) }} para extranjeros, abogado en {{ Str::lower($partner->city) }} {{ Str::lower($partner->state) }} para migrantes, abogado en {{ Str::lower($partner->city) }} {{ Str::lower($partner->country_residence) }} para migrantes">
    <meta property="og:title" content="Abogado en {{ $partner->city }}, {{ $partner->state }} - #{{ $partner->id }} | Notaria Latina"/>
    <meta property="og:site_name" content="https://notarialatina.com"/>
    <meta property="og:url" content="{{ Request::url() }}"/>
    <meta property="og:description" content="{{ $partner->specialty}}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:locale" content="es"/>
    <meta property="og:image" content="https://notarialatina.com/storage/{{$partner->img_profile}}"/>
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="400" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
@endphp
    <title>Abogado en {{ Str::ucfirst($partner->city)}}, {{ Str::ucfirst($partner->state)}} - #{{ $partner->id }} | Notaria Latina</title>
    <style>
        #iconwpp{
            display: none !important;
        }
        body{font-family: Arial, Helvetica, sans-serif;}
        /* ocultar el icono de llamada en la parte inferior derecha */
        #iconcall{display:none}
        /* ocultar la tarjeta de wpp */
        #divwpp{display:none}
        #svgwpp{
            display: none;
        }
        .bg-header{
            /* background-color: #002542; */
            width: 100%;
            min-height: 400px;
        }
        .container{
            position: relative;
        }
        .formContact{
            background-color: #002542;
            text-align: center;
        }
        input, textarea{
            width: 90%
        }

        .info-header{
            color: white;
        }
        #info_biografia{margin-top:4% !important}
        h1{font-size: 30px !important;}

        @media screen and (max-width: 768px){
            .info-header{
                color: #000000 !important;
                margin-top: 15% !important; 
            }
            h1{font-size: 20px !important;}
            #divImgPartner{
                display: flex;
                justify-content: center;
            }
            #divPhoneAndEmail p{
                margin-left: 0.3% !important;
            }
            #rowinfoheader{
                margin-left: 0.5% !important;
            }
            .rowinfobody{
                margin-left: 3% !important;
            }
            #txtemail{
                color: #000000 !important;
            }
            #info_biografia{margin-top: 0px !important;}
            .bg-header{min-height: 130px; height: 250px}
            #img-logo{width: 190px !important; height: 60px !important;}
            .img-profile{justify-content: center !important}
            .biography{padding-right: 0rem !important}
            .title{font-size: 1.8rem}
        }
        @media screen and (max-width: 1600px){
            .biography{padding-right: 15rem !important}
        }
        @media screen and (max-width: 1200px){
            .biography{padding-right: 0rem !important}
            .img-profile{width: 230px !important; height: 230px !important}
            .first-section{padding-top: 10px !important; margin-top: 15px !important}
            .container-fluid{margin-left: 0px !important; margin-right: 0px !important}
            .title{margin-top: 15px !important}
        }
        @media screen and (min-width: 1600px){
            .biography{padding-right: 25rem !important}
        }
        #nombre, #telefono, #mensaje{
            margin-bottom: 15px;
        }

        form{
            padding: 15px;
        }

        #country_residence{
            margin-right: 2.5px;
        }

        #telefono{
            margin-left: 2.5px;
        }

        .social{
            color: #9A7A2E;
        }

        /*RATING CSS*/
        div.stars {
            display: inline-block;
        }

        input.star { display: none; }

        label.star {
            float: right;
            padding: 10px;
            font-size: 20px;
            color: 
            #444;
            transition: all .2s;
        }

        input.star:checked ~ label.star:before {
            content: 'f005';
            color: 
            #e74c3c;
            transition: all .25s;
        }

        input.star-5:checked ~ label.star:before {
            color: 
            #e74c3c;
            text-shadow: 0 0 5px 
            #7f8c8d;
        }

        input.star-1:checked ~ label.star:before { color: 
        #F62; }

        label.star:hover { transform: rotate(-15deg) scale(1.3); }

        label.star:before {
        content: 'f006';
        font-family: FontAwesome;
        }


        .horline > li:not(:last-child):after {
            content: " |";
        }
        .horline > li {
        font-weight: bold;
        color: 
        #ff7e1a;

        }

        /*OTHER RATING*/
        #form {
        width: 250px;
        margin: 0 auto;
        height: 50px;
        }

        #form p {
        text-align: center;
        }

        #form label {
        font-size: 20px;
        }

        input[type="radio"] {
        display: none;
        }

        label {
        color: grey;
        }

        .clasificacion {
        direction: rtl;
        unicode-bidi: bidi-override;
        }

        label:hover,
        label:hover ~ label {color: orange;}
        input[type="radio"]:checked ~ label {color: orange;}
        #divcallphone{display: none;}
        #divpreguntas{display: none !important}
        .color-warning{color: #FEC02F}
        .txt-blue{color: #2B384D}.bg-blue{background-color: #2B384D}
       

       @media only screen and (max-width:768px) {

         }

       

       .card{

        border: none;
        cursor: pointer;
        box-shadow: 0 0 40px rgba(51, 51, 51, .1)
       }

       .card:hover{

        background-color: #eee;

       }

       .ratings i{

        color: orange;
       }

       .testimonial-list{

        list-style: none;
       }

       .testimonial-list li{

        margin-bottom: 20px;
       }

       .testimonials-margin{

        margin-top: -19px;
       }
    </style>
    <script type="text/javascript">
        function callbackThen(response){
            // read HTTP status
            console.log(response.status);
            // read Promise object
            response.json().then(function(data){
            console.log(data);
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
                console.log('cargando script recaptcha...');
            }, 3000);

            setTimeout(() => {
                let csrfToken = document.head.querySelector('meta[name="csrf-token"]');
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
                    console.log('ejecutando codigo del recaptcha...');
            }, 3500);
        </script>
    
    
        {{-- {!! htmlScriptTagJsApi([
        'callback_then' => 'callbackThen',
        'callback_catch' => 'callbackCatch'
        ]) !!} --}}
@endsection

@section('content')

<p id="txtpartnerid" style="display: none">{{ $partner->id }}</p>

<section id="prisection" class="bg-header pt-5 d-flex justify-content-center" style="background-size: cover; background-position: bottom center; background-repeat: no-repeat;"></section>

<section class="container">
    <div class="row">
        <div class="col-sm-12 col-12 col-md-5 col-xl-5">
            <section class="rounded-circle shadow img-profile" style="border: 5px solid #ffffff; width: 400px; height: 400px; margin-top: -120px; background-size: cover; background-position: center center; background-repeat: no-repeat; background-image: url('{{asset('storage/' . $partner['img_profile'] )}}');"></section>
        </div>
        <div class="col-sm-12 col-12 col-md-7 col-xl-7 d-flex justify-content-start align-items-center">
            <div>
                <p id="txtnamelastname" class="font-weight-bold h3 title">{{ $partner->name }} {{ $partner->lastname }}</p>
                <h1 class="text-muted" style="font-size: 18px !important">Abogado en {{ $partner->city }}, {{ $partner->state }}</h1>
                <div class="d-flex">
                    <span class="text-muted mr-2" style="font-weight: 500"><i class="fas fa-map-marker-alt"></i> {{ $partner->address }}</span>
                    @if($partner->link_facebook != null)
                        <span class="text-muted mr-2" style="font-weight: 500"><i class="fab fa-facebook-f"></i></span>
                    @endif
                    @if($partner->link_linkedin != null)
                        <span class="text-muted mr-2" style="font-weight: 500"><i class="fab fa-linkedin-in"></i></span>
                    @endif
                    @if($partner->link_instagram != null)
                        <span class="text-muted" style="font-weight: 500"><i class="fab fa-instagram"></i></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-light first-section py-5 mt-5">
    <section class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-3 col-xl-3">
                <div class="mb-4">
                    <i class="fas fa-phone mr-1"></i><span id="divshowphone"></span>
                </div>
                <div class="mb-4">
                    <a style="text-decoration: none; color: #000000" href="mailto:{{$partner->email}}">
                        <i class="fas fa-envelope"></i> {{ $partner->email }}
                    </a>
                </div>
                <div class="mt-4">
                    <button data-toggle="modal" data-target="#form_modal" class="btn btn-block btn-warning rounded-pill"><i class="fas fa-comment"></i> Contactar</button>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <div>
                        @php $rating = $partner->averageRating(); @endphp
                        <div class="@if($mobile) text-center @else text-left @endif mr-1">
                            <div data-toggle="modal" data-target="#exampleModalCenter" style="color: #FEC02F; cursor: pointer">
                                @foreach(range(1,5) as $i)
                                    <span class="fa-stack" style="width:2em" onclick="openModalRating();">
                                        <i class="far fa-star fa-stack-2x"></i>
                                        @if($rating > 0)
                                            @if($rating > 0.5)
                                                <i class="fas fa-star fa-stack-2x"></i>
                                            @else
                                                <i class="fas fa-star-half fa-stack-2x"></i>
                                            @endif
                                        @endif
                                    @php $rating--; @endphp
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        <div class="ml-2 mt-1">
                            <p class="pt-1 font-weight-bold txt-blue @if($mobile) text-center @else text-right @endif" style="letter-spacing: 15px; font-size: 20px">REVIEWS</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-9 col-xl-9">
                <div data-aos="fade-left" data-aos-duration="3000">
                    {!! $partner->biography_html !!}
                </div>
            </div>
        </div>
    </section>
</section>

<section class="container pb-5 pt-5">
    <h2 class="txt-blue text-center py-5">ÁREA DE <span class="font-weight-bold">ESPECIALIZACIÓN</span></h2>
    <div class="row justify-content-center">
        @foreach ($partner->specialties as $specialty)
            <div class="col-sm-4" data-aos="fade-up" data-aos-duration="2000">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <img src="{{ asset('img/partners/'.$specialty->name_specialty.'.png') }}" alt="">
                        <p class="txt-blue mt-3">DERECHO <span class="font-weight-bold">{{ strtoupper($specialty->name_specialty) }}</span></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

@if(count($testimonials)>0)
<section class="mt-5 bg-light pb-5">
        <h2 class="txt-blue text-center py-5"><span class="font-weight-bold">REVIEWS</span></h2>
        <section>
            <div class="container container-fluid">
                <div class="d-flex justify-content-center align-items-center" id="accordionExample">
                    <div class="row w-100 justify-content-center">
                        <div class="col-md-6">   
                        <div class="d-flex">
                            <ul class="testimonial-list justify-content-center w-100">
                                @foreach ($testimonials as $testimonial)
                                    <li>
                                        <div class="card p-3" data-toggle="collapse" data-target="#collapse{{$loop->index+1}}" aria-expanded="true" aria-controls="collapse{{$loop->index+1}}">
                                            <div class="d-flex flex-row align-items-center">
                                            <img src="{{ asset('img/user1.png') }}" width="50" class="rounded-circle">
                                            <div class="d-flex flex-column ml-2">
                                                <span class="font-weight-normal">{{$testimonial->name_customer}}</span>
                                                <span>{{$testimonial->country}} <img width="25px" src="{{ asset('img/partners/' . Str::lower(Str::studly($testimonial->country)) . '.png') }}" alt=""></span>    
                                            </div>   
                                            </div>   
                                        </div>   
                                    </li>
                                @endforeach   
                            </ul>
                            </div>
                        </div>
        
                        <div class="col-md-6 d-flex align-items-center">
                        <div class="p-3 testimonials-margin">
                            @foreach ($testimonials as $testimonial)
                                <div id="collapse{{$loop->index+1}}" class="collapse @if($loop->index+1 == 1) show @endif" aria-labelledby="heading{{$loop->index+1}}" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <h4>Comentario</h4>
                                        <p>{{ $testimonial->comment }}</p>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endif


    {{-- <section class="bg-header pt-5 d-flex justify-content-center" style="background-size: cover; background-position: bottom center; background-repeat: no-repeat;"></div>
        <p id="txtpartnerid" style="display: none">{{ $partner->id }}</p>
        <div class="text-center">
            <div id="divimglogo">
                <img id="img-logo" width="500px" height="150px" class="lazy" data-src="{{asset('img/logo-notaria-latina.png')}}" alt="partners notaria latina">
            </div>
            <p class="display-4 text-white tit-not title">Abg. {{ $partner->name . " " . $partner->lastname}}</p>
            <h1 class="tit-not"><span class="text-warning"> Abogado en {{ $partner->city }}, {{ $partner->state }}</span> <span class="text-white">a su alcance</span></h1>
            <div class="container">
                <div class="row mt-5">
                    <div class="col-sm-6 mb-3">
                        <button class="btn btn-warning btn-block rounded-pill font-weight-bold" data-toggle="modal" data-target="#form_modal">CONTACTAR</button>
                    </div>
                    <div class="col-sm-6 mb-3 d-flex justify-content-center">
                        <button id="divshowphone" class="btn btn-outline-warning btn-block rounded-pill text-white"></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div style="background-color: #FEC02F; height: 10px"></div>

    <section class="bg-light pt-4">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-xl-4 py-1">
                <div class="d-flex justify-content-center">
                    @php $rating = $partner->averageRating(); @endphp
                    <div class="@if($mobile) text-center @else text-left @endif mr-1">
                        <div data-toggle="modal" data-target="#exampleModalCenter" style="color: #FEC02F; cursor: pointer">
                            @foreach(range(1,5) as $i)
                                <span class="fa-stack" style="width:2em" onclick="openModalRating();">
                                    <i class="far fa-star fa-stack-2x"></i>
                                    @if($rating > 0)
                                        @if($rating > 0.5)
                                            <i class="fas fa-star fa-stack-2x"></i>
                                        @else
                                            <i class="fas fa-star-half fa-stack-2x"></i>
                                        @endif
                                    @endif
                                @php $rating--; @endphp
                                </span>
                            @endforeach
                        </div>
                    </div>
                    <div class="ml-2">
                        <p class="pt-1 font-weight-bold txt-blue @if($mobile) text-center @else text-right @endif" style="letter-spacing: 15px; font-size: 20px">REVIEWS</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-xl-4 py-1">
                <div class="d-flex justify-content-center">
                    <p class="font-weight-bold" style="letter-spacing: 1px; color: #FEC02F; font-size: 20px"><i class="fas fa-eye"></i> {{$partner->views+1}} <span class="txt-blue">VISUALIZACIONES</span></p>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-xl-4 py-1">
                <div style="cursor: pointer" class="d-flex justify-content-center" data-toggle="modal" data-target="#modalcustomers">
                    <p class="font-weight-bold" style="letter-spacing: 1px; color: #FEC02F; font-size: 20px"><i class="fas fa-search"></i> {{count($partner->customers)}} @if(count($partner->customers) == 1) <span class="txt-blue"> CONSULTA @else CONSULTAS </span> @endif</p>
                </div>
            </div>
        </div>
    </section>

    <section class="">
        <h2 class="txt-blue text-center py-5">EXPERIENCIA Y <span class="font-weight-bold">TRAYECTORIA</span></h2>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-5">
                <div class="d-flex justify-content-end img-profile">
                    <img width="350px" height="450px" class="lazy" data-src="{{asset('storage/' . $partner['img_profile'] )}}" alt="{{$partner->slug}}">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-7 d-flex align-items-center biography">
                <div class="bg-light w-100 p-4" data-aos="fade-left" data-aos-duration="3000">
                    {!! $partner->biography_html !!}
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container">
            @if (count($testimonials) > 0)
            <h2 class="text-center mb-5">TESTIMONIOS</h2>
            <div class="row">
                    @foreach ($testimonials as $testimonial)
                        <div class="col-sm-4 mb-3">
                            <div class="mx-1 p-4 d-flex" style="border: 1px solid #FEC02F">
                                <div class="mr-1">
                                    <img width="50px" height="50px" src="{{ asset('img/user1.png') }}" alt="">
                                </div>
                                <div class="ml-1">
                                    <p class="h5">{{$testimonial->name_customer}}</p>
                                    <p class="mt-3">{{$testimonial->country}} <img width="25px" src="{{ asset('img/partners/' . Str::lower(Str::studly($testimonial->country)) . '.png') }}" alt=""></p>
                                    <p><i>{{$testimonial->comment}}</i></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            @if(isset($partner->url_video))
                <div class="row justify-content-center mt-5">
                    <div>
                        <video class="lazy img-fluid" data-src="{{asset('storage/'.$partner->url_video)}}" controls></video>
                    </div>
                </div>
            @endif
        </div>
    </section> --}}

    {{-- <div class="row mt-4">
        <div class="col-sm-6 d-flex justify-content-center align-items-center py-5 border-right border-warning">
            <img width="300px" height="390px" class="lazy" data-src="{{asset('storage/' . $partner['img_profile'] )}}" alt="{{$partner->slug}}">
        </div>
        <div class="col-sm-6 border-left border-warning d-flex align-items-center">
            <div class="mx-5">
                <p class="color-warning h3 font-weight-bold" style="letter-spacing: 15px">ABOGADO</p>
                <p id="txtnamelastname" class="txt-blue h2 mt-3">{{$partner->name . ' ' . $partner->lastname}}</p>
                <p class="txt-blue mt-3" style="letter-spacing: 15px">{{strtoupper($partner->city . ', ' . $partner->country_residence)}}</p>
                <p class="bg-blue text-white p-2 w-auto text-center font-weight-bold" style="letter-spacing: 15px; border-radius: 0px 25px 25px 0px">{{strtoupper($partner->company)}}</p>
                <div class="row mt-4">
                    <div class="col-sm-6">
                        <p class="pt-2 txt-blue @if($mobile) text-center @else text-right @endif" style="letter-spacing: 15px">REVIEWS</p>
                    </div>
                    @php $rating = $partner->averageRating(); @endphp
                    <div class="col-sm-6 @if($mobile) text-center @else text-left @endif">
                        <div data-toggle="modal" data-target="#exampleModalCenter" style="color: #FEC02F; cursor: pointer">
                            @foreach(range(1,5) as $i)
                                <span class="fa-stack" style="width:2em" onclick="openModalRating();">
                                    <i class="far fa-star fa-stack-2x"></i>
                                    @if($rating > 0)
                                        @if($rating > 0.5)
                                            <i class="fas fa-star fa-stack-2x"></i>
                                        @else
                                            <i class="fas fa-star-half fa-stack-2x"></i>
                                        @endif
                                    @endif
                                @php $rating--; @endphp
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row mt-3 text-center">
                    @if(count($partner->customers) > 0)
                        <div class="col-sm-6">
                            <div style="color: #FEC02F; cursor: pointer" data-toggle="modal" data-target="#modalcustomers">
                                <p style="letter-spacing: 1px"><i class="fas fa-search"></i> {{count($partner->customers)}} @if(count($partner->customers) == 1) CONSULTA @else CONSULTAS @endif</p>
                            </div>
                        </div>
                    @endif
                    @if($partner->views > 0)
                    <div class="col-sm-6">
                        <div style="color: #FEC02F">
                            <p style="letter-spacing: 1px"><i class="fas fa-eye"></i> {{$partner->views+1}} VISUALIZACIONES</p>
                        </div>
                    </div>
                    @endif
                </div>
                <div id="divshowphonee" class="row d-flex justify-content-center" style="border-radius: 5px; padding-top: 2.5%;"> </div> 
            </div>
        </div>
    </div>

    <div class="row bg-light mt-4">
        <div class="col-sm-8 d-flex text-center justify-content-center align-items-center mt-5 mb-5">
            <div>
                <div>
                    <p style="letter-spacing: 15px" class="color-warning font-weight-bold h5">ESPECIALIDAD</p>
                    <div class="mt-4">
                        @foreach ($partner->specialties as $partner_specialty)
                            <p class="txt-blue h6 font-weight-bold"><i>Derecho {{$partner_specialty->name_specialty}}</i></p>   
                        @endforeach
                    </div>
                    <div class="mt-4">
                        {!! $partner->biography_html !!}
                    </div>
                </div>
                <div class="row mt-5">
                    @if (isset($partner->url_video))
                    <div class="col-sm-6">
                        <video width="300px" class="lazy" data-src="{{asset('storage/'.$partner->url_video)}}" controls></video>
                    </div>   
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="formContact rounded shadow h-100 d-flex align-items-center px-3">
                <div>
                    <h4 class="text-white text-center p-3">¿Necesita realizar una consulta?</h4>
                    <p class="text-white px-3">Complete el formulario con su información y el abogado <b class="text-warning">{{$partner->name . " " . $partner->lastname}}</b> se comunicará con usted</p>
                    <form action="{{ route('web.send.email.socio', $partner) }}" method="POST">
                        @csrf
                        <div class="d-flex">
                            <div class="w-100">
                                <input class="form-control mr-1 rounded-0" style="font-size: 12px" type="text" id="nombre" placeholder="Nombre" name="name" autocomplete="off" required>
                            </div>
                            <div class="w-100">
                                <input class="form-control ml-1 rounded-0" style="font-size: 12px" type="text" id="apellido" placeholder="Apellido" name="lastname" autocomplete="off" required>
                            </div>
                        </div>
                        <input type="email" name="email" style="font-size:12px" id="email" placeholder="Correo electrónico" class="form-control rounded-0" autocomplete="off" required>
                        <div class="d-flex mt-3">
                            <div class="w-100">
                                <select name="country_residence" id="country_residence" class="form-control mr-1 rounded-0" style="font-size: 12px" required>
                                    <option value="">País de residencia</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Estados Unidos">Estados Unidos</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="México">México</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Panamá">Panamá</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Perú">Perú</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="República Dominicana">República Dominicana</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Venezuela">Venezuela</option>
                                </select>
                            </div>
                            <div class="w-100 d-flex ml-1">
                                <div class="d-flex" style="height: 20px">
                                    <img id="img-flag-form" width="30px" height="30px" alt="" class="border-0 d-none mr-1">
                                    <input type="text" style="font-size: 12px" class="form-control rounded-0 border-0 bg-white" name="codpais" id="codTelfPais" readonly>
                                </div>
                                <input class="form-control rounded-0" style="font-size: 12px" type="text" id="telefono" placeholder="Teléfono" name="phone" autocomplete="off" required>
                            </div>
                        </div>
                        <textarea class="form-control rounded-0" style="font-size: 12px" id="mensaje" rows="4" placeholder="Ej: Hola, me interesa consultar por sus servicios y deseo que me contacten" name="mensaje" autocomplete="off" required></textarea>
                        <div style="display: none">
                            <input type="hidden" name="aux">
                        </div>
                        <button class="btn mb-3 rounded-0" style="background-color: #FEC02F;" type="submit"><i class="fas fa-envelope"></i> Enviar</button>
                    </form>
                </div>    
            </div>
        </div>
    </div>
    <br>
    @if(count($testimonials) > 0)
    <section onscroll="setimagebg()" id="divtestimonials" class="mt-2" style="min-height: 500px;background-size: cover;background-position: center center;background-repeat: no-repeat;">
        <div class="pt-5">
            <p class="h3 font-weight-bold text-center text-white" style="letter-spacing: 15px">TESTIMONIOS</p>
            <div class="row mx-3 mt-5 justify-content-center">
                @foreach ($testimonials as $testimonial)
                    <div class="col-sm-4 mb-3">
                        <div class="border border-light mx-1 p-4 text-white">
                            <p class="h5">{{$testimonial->name_customer}}</p>
                            <p class="mt-3">{{$testimonial->country}} <img width="25px" src="{{ asset('img/partners/' . Str::lower(Str::studly($testimonial->country)) . '.png') }}" alt=""></p>
                            <p><i>{{$testimonial->comment}}</i></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif --}}

        {{--MODAL DE VALORACION DE PARTNER--}}
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{ route('partner.rating', $partner)}}" method="POST">
                @csrf
              <div class="modal-content">
                <div class="modal-header" style="background-color: #002542; color: #ffffff">
                  <h5 class="modal-title" id="exampleModalLongTitle">Valoración de Abogado</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Para valorar un abogado necesita completar los siguientes campos con su información y enviar la calificación</p>
                        <input class="form-control" type="text" id="nombre" placeholder="Nombre y Apellido" name="nameRating" autocomplete="off" required>
                        <div class="d-flex">
                            <select name="country_residenceRating" class="form-control" required>
                                <option value="">País de residencia</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Estados Unidos">Estados Unidos</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Honduras">Honduras</option>
                                <option value="México">México</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Panamá">Panamá</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Perú">Perú</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="República Dominicana">República Dominicana</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Venezuela">Venezuela</option>
                            </select>
                            <input class="form-control" type="number" id="telefono" placeholder="Teléfono" name="phoneRating" autocomplete="off" required>
                        </div>
                        <textarea class="form-control" id="mensaje" rows="4" placeholder="Mensaje" name="mensajeRating" autocomplete="off" required></textarea>
                        <p>Valoración</p>
                        <p class="clasificacion" id="rateYo" data-rateyo-rating="{{ $partner->averageRating or 0}}">
                            <input class="star" id="radio1" type="radio" name="star" value="5" required><!--
                            --><label for="radio1" style="font-size: 30px">★</label><!--
                            --><input class="star" id="radio2" type="radio" name="star" value="4" required><!--
                            --><label for="radio2" style="font-size: 30px">★</label><!--
                            --><input class="star" id="radio3" type="radio" name="star" value="3" required><!--
                            --><label for="radio3" style="font-size: 30px">★</label><!--
                            --><input class="star" id="radio4" type="radio" name="star" value="2" required><!--
                            --><label for="radio4" style="font-size: 30px">★</label><!--
                            --><input class="star" id="radio5" type="radio" name="star" value="1" required><!--
                            --><label for="radio5" style="font-size: 30px">★</label>
                          </p>
                        </div>
                        <div class="modal-footer" style="background-color: #002542; color: #ffffff">
                            <button type="submit" class="btn" style="background-color: #fec02f">Calificar</button>
                        </div>
                    </form>
              </div>
            </div>
        </div>

        <!--modal para contactar por formulario-->
        <div class="modal fade" id="form_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="formContact rounded shadow h-100 d-flex align-items-center px-3">
                    <div>
                        <h4 class="text-white text-center p-3">¿Necesita realizar una consulta?</h4>
                        <p class="text-white px-3">Complete el formulario con su información y el abogado <b class="text-warning">{{$partner->name . " " . $partner->lastname}}</b> se comunicará con usted</p>
                        <form action="{{ route('web.send.email.socio', $partner) }}" method="POST">
                            @csrf
                            <div class="d-flex">
                                <div class="w-100">
                                    <input class="form-control mr-1 rounded-0" style="font-size: 12px" type="text" id="nombre" placeholder="Nombre" name="name" autocomplete="off" required>
                                </div>
                                <div class="w-100">
                                    <input class="form-control ml-1 rounded-0" style="font-size: 12px" type="text" id="apellido" placeholder="Apellido" name="lastname" autocomplete="off" required>
                                </div>
                            </div>
                            <input type="email" name="email" style="font-size:12px" id="email" placeholder="Correo electrónico" class="form-control rounded-0" autocomplete="off" required>
                            <div class="d-flex mt-3">
                                <div class="w-100">
                                    <select name="country_residence" id="country_residence" class="form-control mr-1 rounded-0" style="font-size: 12px" required>
                                        <option value="">País de residencia</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Estados Unidos">Estados Unidos</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="México">México</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Panamá">Panamá</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Perú">Perú</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="República Dominicana">República Dominicana</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Venezuela">Venezuela</option>
                                    </select>
                                </div>
                                <div class="w-100 d-flex ml-1">
                                    <div class="d-flex" style="height: 20px">
                                        <img id="img-flag-form" width="30px" height="30px" alt="" class="border-0 d-none mr-1">
                                        <input type="text" style="font-size: 12px" class="form-control rounded-0 border-0 bg-white" name="codpais" id="codTelfPais" readonly>
                                    </div>
                                    <input class="form-control rounded-0" style="font-size: 12px" type="text" id="telefono" placeholder="Teléfono" name="phone" autocomplete="off" required>
                                </div>
                            </div>
                            <textarea class="form-control rounded-0" style="font-size: 12px" id="mensaje" rows="4" placeholder="Ej: Hola, me interesa consultar por sus servicios y deseo que me contacten" name="mensaje" autocomplete="off" required></textarea>
                            <div style="display: none">
                                <input type="hidden" name="aux">
                            </div>
                            <button class="btn mb-3 rounded-0" style="background-color: #FEC02F;" type="submit"><i class="fas fa-envelope"></i> Enviar</button>
                        </form>
                    </div>    
                </div>
              </div>
            </div>
        </div>
        <!--termina modal-->


        {{--DIV PARA LLENAR FORMULARIO Y MOSTRAR EL NUMERO--}}
        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-white" style="background-color: #002542">
                        <p style="font-weight: bold"><b style="color: #fec02f">Complete el formulario</b> para ver el número telefónico del partner</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span style="color: #ffffff" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formviewphone" action="{{ route('web.send.view.phone', $partner)}}" method="POST">
                    <div class="modal-body" >
                            @csrf
                            <div class="d-flex mb-3">
                                <div class="mr-1">
                                    <input class="form-control rounded-0" name="name" id="name_formphone" type="text" placeholder="Nombre" required>
                                </div>
                                <div class="ml-1">
                                    <input type="text" class="form-control rounded-0" name="lastname" id="lastname_formphone" placeholder="Apellido" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input class="form-control rounded-0" name="email" type="email" id="email_formphone" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <select name="country_residence_view_phone" id="country_residence_view_phone" class="form-control rounded-0" required>
                                    <option value="">País de residencia</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Estados Unidos">Estados Unidos</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="México">México</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Panamá">Panamá</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Perú">Perú</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="República Dominicana">República Dominicana</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Venezuela">Venezuela</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input class="form-control rounded-0" name="phone" id="phoneformphone" type="text" placeholder="Teléfono" required>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center" style="margin-bottom: -15px;">
                            <button id="btnsubmitformphone" class="btn rounded-0 shadow" style="background-color: #fec02f">Enviar información</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- modal para mostrar los comentarios que le hicieron al partner --}}
        <div class="modal fade" id="modalComentarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header" style="background-color: #002542; color: #ffffff">
                  <h5 class="modal-title" id="exampleModalLongTitle">Comentarios</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    @foreach ($partner->ratings as $rating)
                        @if($rating->comment != null || $rating->name_customer != null)
                            <i>"{{ $rating->comment }}"</i>
                            @php
                                $country = $rating->country;
                                if(str_contains($country, 'á')){$country = str_replace('á', 'a', $country);}
                                elseif(str_contains($country, 'é')){$country = str_replace('é', 'e', $country);}
                                elseif(str_contains($country, 'ú')){$country = str_replace('ú', 'u', $country);}
                            @endphp
                            <p class="text-muted" style="font-size: 15px"><img src="{{ asset('img/partners/' . Str::lower(Str::studly($country)) . '.png') }}" alt="Abogado en {{ $partner->city }}, {{ $partner->state }}, {{ $partner->country_residence }}"> {{ $rating->name_customer }}</p>
                            <hr>   
                        @endif          
                    @endforeach
                </div>
              </div>
            </div>
          </div>

          @if(count($partner->customers)>0)

          @php
              if(count($partner->customers)<3) $length_customers = count($partner->customers); else $length_customers = 3;
          @endphp

          <div class="modal fade" id="modalcustomers" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header" style="background-color: #002542; color: #ffffff">
                  <h5 class="modal-title" id="exampleModalLongTitle">Consultas</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    @for ($i = 0; $i < $length_customers; $i++)
                    <div class="card text-left rounded-0 mb-1">
                      <div class="card-body">
                        <p class="card-title"><img width="25px" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt=""> User</p>
                        <p class="card-text text-muted">{{$partner->customers[$i]->mensaje}}</p>
                      </div>
                    </div> 
                    @endfor
                    <div>
                        <p class="float-right text-warning">Visualizando {{$length_customers}} de {{count($partner->customers)}} consultas</p>
                    </div>
                </div>
              </div>
            </div>
          </div>
          @endif

        {{-- SE MUESTRA CUANDO LLENA EL FORMULARIO DE CONTACTO --}}
        @if (session('report'))
            @php
                echo "
                    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                    <script>
                        swal('Hemos enviado su información', 'Nos pondremos en contacto lo antes posible', 'success');
                    </script>
                    ";    
            @endphp
        @endif
        
        {{-- SE MUESTRA SI EL CLIENTE HA DADO REVIEW AL PARTNER --}}
        @if (session('rating'))
            @php
                echo "
                    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                    <script>
                        swal('Se han enviado los datos', 'Agradecemos su evaluación', 'success');
                    </script>
                    ";    
            @endphp
        @endif

        {{-- SE MUESTRA SI EL CLIENTE HA SOLICITADO VER EL NUMERO DEL PARTNER --}}
        @if (session('solicited'))
            @php
                echo "
                    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                    <script>
                        swal('Se envió la información', 'Ahora puede acceder al teléfono del partner', 'success');
                    </script>
                    ";    
            @endphp
        @endif

        {{-- ENVIO DE "LEAD" A MI CORREO --}}
        @if (session('emailsendedme'))
            @php
                echo "
                    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                    <script>
                        swal('Se envió la información', 'En breve nos pondremos en contacto', 'success');
                    </script>
                    ";    
            @endphp
        @endif
@endsection

@section('numberWpp', '13479739888')

@section('script')
{{-- <script id="script_jquery"></script> --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
    window.addEventListener('load', (event) => {
        let img_name = "{{ Str::lower(Str::studly($partner->country_residence)) }}"
        document.getElementById('prisection').style.backgroundImage = `url('{{url('img/portada-header.jpg')}}')`;
        const divshowphone = document.getElementById('divshowphone');
        let id = document.getElementById('txtpartnerid').textContent;
        if(!localStorage.getItem("prueba"+id)){
            divshowphone.innerHTML = "<span style='cursor: pointer;' data-toggle='modal' data-target='.bd-example-modal-sm'>{{ Str::limit($partner->phone, 7) }}</span>";
        } else {
            divshowphone.innerHTML = "<a class='text-dark' style='text-decoration: none' href='tel:{{$partner->codigo_pais}}{{$partner->phone}}'>{{ $partner->phone }}</a>";
        }
        //setTimeout(() => {setviewed();}, 3000);
    });

    //RETIRANDO CARGA DEL SCRIPT - NO SE OCUPA
    // setTimeout(() => {
    //     var scriptjquery = document.getElementById('script_jquery');
    //     scriptjquery.src = "https://code.jquery.com/jquery-3.6.0.min.js";
    //     scriptjquery.integrity = "sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=";
    //     scriptjquery.crossorigin = "anonymous";
    //     console.log('cargando script jquery 3.6.0');
    // }, 3000);

    function openModalPhone(){
        $('.bd-example-modal-sm').modal('show');
    }

    document.getElementById('btnsubmitformphone').addEventListener('click', (event) => {
        event.preventDefault();
        let name_formphone = document.getElementById('name_formphone').value;
        let lastname_formphone = document.getElementById('lastname_formphone').value;
        let email_formphone = document.getElementById('email_formphone').value;
        let country_residence_view_phone = document.getElementById('country_residence_view_phone').value;
        let phoneformphone = document.getElementById('phoneformphone').value;

        if((name_formphone != null && lastname_formphone != null && email_formphone != null && country_residence_view_phone != null && phoneformphone != null) && (name_formphone != "" && lastname_formphone != "" && email_formphone != "" && country_residence_view_phone != "" && phoneformphone != "")){
            let id = document.getElementById('txtpartnerid').textContent;
            let partner = document.getElementById('txtnamelastname').textContent;
            if(localStorage.getItem("prueba"+id) == null){
                partner = partner.replace(/\s/g, "").toLowerCase() + id;
                localStorage.setItem("prueba"+id, partner);
            }
            document.getElementById('formviewphone').submit();
        } else {
            alert('Complete los campos');
        }
    });

    const validatelengthnumber = (event) => {
        let value_country = document.getElementById('country_residence').value;
        let value_number = document.getElementById('telefono').value;
    }

    const getlongnumberbycountry = (country) => {
        switch (country) {
            case "Panamá":
            case "República Dominicana":value=7;break;
            case "Bolivia":
            case "Costa Rica":
            case "El Salvador":
            case "Guatemala":
            case "Honduras":
            case "Nicaragua":
            case "Uruguay":value=8;break;
            case "Chile":
            case "Paraguay":
            case "Perú":value=9;break;
            case "Argentina":
            case "Colombia":
            case "Ecuador":
            case "Estados Unidos":
            case "México":
            case "Venezuela":
            case "Puerto Rico":value=10;break;
            default: break;
        }
        document.getElementById('telefono').setAttribute('minlength', value);
        //alert(value);
    }

    let selectPaisResidencia = document.getElementById('country_residence');
    let inputCodPais = document.getElementById('codTelfPais');
        
        selectPaisResidencia.onchange  = function(e){

            getlongnumberbycountry(selectPaisResidencia.value);
            
            switch (selectPaisResidencia.value) {
                case "" : codigo = ""; break;
                case "Argentina":codigo = "+54";break;
                case "Bolivia":codigo = "+591";break;
                case "Chile":codigo = "+56"; break;
                case "Colombia":codigo = "+57";break;
                case "Costa Rica":codigo = "+506";break;
                case "Ecuador":codigo = "+593";break;
                case "El Salvador":codigo = "+503";break;
                case "Estados Unidos":codigo = "+1";break;
                case "Guatemala":codigo = "+502";break;
                case "Honduras":codigo = "+504";break;
                case "México":codigo = "+52";break;
                case "Nicaragua":codigo = "+505";break;
                case "Panamá":codigo = "+507";break;
                case "Paraguay":codigo = "+595";break;
                case "Perú":codigo = "+51";break;
                case "Puerto Rico":codigo = "+1787";break;
                case "República Dominicana":codigo = "+1809";break;
                case "Uruguay":codigo = "+598";break;
                case "Venezuela":codigo = "+58";break;
            }
            inputCodPais.value = codigo;
            if(codigo){
                let flag_trim = selectPaisResidencia.value.replace(/\s+/g, '').toLowerCase();
                console.log(flag_trim);
                document.getElementById('img-flag-form').classList.remove('d-none');
                document.getElementById('img-flag-form').src = `{{asset('img/partners')}}`+ "/" + flag_trim + ".png";
            } else {
                document.getElementById('img-flag-form').classList.add('d-none');
            }
        }

        const setviewed = () => {
            fetch("{{route('partner.setview')}}", {
                headers: {
                    "Content-Type": "application/json; charset=UTF-8",
                    "X-CSRF-TOKEN": "{{csrf_token()}}"
                },
                method: "POST",
                body: JSON.stringify({
                    "id": "{{$partner->id}}",
                }),
            })
            .then(response => response.json())
            .then(json => console.log(json))
            .catch(err => console.log(err));
        }

        const elem_testimonials = document.querySelector('#divtestimonials');

        // Creamos un objeto IntersectionObserver
        const observerTestimonial = new IntersectionObserver((entries) => {
            // Comprobamos todas las intesecciones. En el ejemplo solo existe una: cuadrado
            entries.forEach((entry) => {
                // Si es observable, entra
                if (entry.isIntersecting) {
                    // Añadimos la clase '.cuadrado--rota'
                    elem_testimonials.style.backgroundImage = "url({{asset('img/testimonios-notaria-latina.jpg')}})"
                }
            });
        });

        // Añado a mi Observable que quiero observar. En este caso el cuadrado
        if(elem_testimonials) observerTestimonial.observe(elem_testimonials);

</script>
@endsection