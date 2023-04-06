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
@php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
@endphp
    <title>Abogado en {{ Str::ucfirst($partner->city)}}, {{ Str::ucfirst($partner->state)}} - #{{ $partner->id }} | Notaria Latina</title>
    <style>
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

        @media screen and (max-width: 480px){
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
            .bg-header{min-height: 130px;}
            #img-logo{width: 190px !important; height: 60px !important;}
            #prisection{display: none !important};
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
    <section id="prisection" class="bg-header pt-5 d-flex justify-content-center align-items-center" style="background-size: cover; background-position: left top; background-repeat: no-repeat;"></div>
        <p id="txtpartnerid" style="display: none">{{ $partner->id }}</p>
        {{-- <div id="rowinfoheader" class="row mt-5">
            <div class="col-sm-2"></div>
            <div id="divImgPartner" class="col-sm-2">
                <img id="imgPartner" src="{{asset('storage/' . $partner['img_profile'] )}}" alt="Abogado en {{ $partner->city }}, {{ $partner->state }}, {{ $partner->country_residence }}" width="200" height="260">
            </div>
            <div class="col-sm-8 mt-5 info-header">
                <h1><b>Abogado en {{$partner->city}}, {{$partner->state}}</b> <img width="25" height="25" src="{{asset('img/partners/'.Str::lower(Str::studly($partner->country_residence)).'.png')}}" alt="IMG_BAND_{{ $partner->country_residence }}">
                </h1>
                <p style="font-size: 20px; margin-top: 15px"><b style="font-weight: 100" id="txtnamelastname">{{$partner->name . " " . $partner->lastname}}</b></p>
                @if ($partner->company == "Empresa")
                    <p style="margin-top: 10px"><i class="fas fa-building"></i> {{ $partner->company_name }}</p>
                @else
                    <p style="margin-top: 10px"><i class="fas fa-user"></i> {{ $partner->company}}</p>
                @endif
                <br>
            </div>
        </div> --}}
        <div id="divimglogo">
            <img id="img-logo" width="500px" height="150px" class="lazy" data-src="{{asset('img/logo-notaria-latina.png')}}" alt="partners notaria latina">
        </div>
    </section>
    <div style="background-color: #FEC02F; height: 10px"></div>

    <div class="row mt-4">
        <div class="col-sm-6 d-flex justify-content-center align-items-center py-5 border-right border-warning">
            <img width="300px" height="390px" class="lazy" data-src="{{asset('storage/' . $partner['img_profile'] )}}" alt="{{$partner->slug}}">
        </div>
        <div class="col-sm-6 border-left border-warning d-flex align-items-center">
            <div class="mx-5">
                <p class="color-warning h3 font-weight-bold" style="letter-spacing: 15px">ABOGADO</p>
                <p class="txt-blue h2 mt-3">{{$partner->name . ' ' . $partner->lastname}}</p>
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
                <div class="row justify-content-center">
                    <div id="divshowphone" class="row d-flex justify-content-center w-50" style="border-radius: 5px; margin-left: 1%; margin-right: 1%; padding-top: 2.5%;"> </div> 
                </div>
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
                </div>
                <div class="row mt-5">
                    @if (isset($partner->url_video))
                    <div class="col-sm-6">
                        <video width="300px" class="lazy" data-src="{{asset('storage/'.$partner->url_video)}}" controls></video>
                    </div>   
                    @endif
                    <div class="@if(isset($partner->url_video)) col-sm-6 @else col-sm-12 @endif txt-blue mt-3">
                        <div @if(!isset($partner->url_video)) class="mx-4" @endif>
                            {!! $partner->biography_html !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="formContact rounded shadow h-100 d-flex align-items-center px-3">
                <div>
                    <h4 class="text-white text-center p-3">¿Necesita realizar una consulta?</h4>
                    <p class="text-white px-3">Complete el formulario con su información y el partner <b class="text-warning">{{$partner->name . " " . $partner->lastname}}</b> se comunicará con usted</p>
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
                            <div class="w-100">
                                <input type="hidden" name="codpais" id="codTelfPais">
                                <input class="form-control ml-1 rounded-0" style="font-size: 12px" type="text" id="telefono" placeholder="Teléfono" name="phone" autocomplete="off" required>
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
    @endif

        {{-- <div id="info_biografia" class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-6 border-right">
                <div class="rowinfobody">
                    <h2 style="font-size: 18px"><b>Biografía</b></h2>
                    <div>
                        {!! Purify::clean($partner->biography_html) !!}
                    </div>
                    @isset($partner->specialty)
                        <div class="mt-3">
                            <h2 style="font-weight: 600; font-size: 18px">Especialidades</h2>
                            <p style="font-weight: 400">{{ Purify::clean($partner->specialty) }}</p>
                        </div>
                    @endisset
                </div>
            </div>
            <div class="col-sm-3">
                <div class="rowinfobody">
                    <div style="color: #9A7A2E">
                        @isset($partner->address)
                            <h3 style="font-weight: bold; font-size: 18px"><i class="fas fa-map-marker-alt"></i> Dirección</h3>
                            <p style="color: #9A7A2E">{{$partner->address}}</p>
                        @endisset
                        @if($partner->website != null && Str::startsWith($partner->website, 'https'))
                            <h3 class="mt-2" style="font-weight: bold; font-size: 18px"><i class="fas fa-globe"></i> Sitio web</h3>
                            <a target="_blank" rel="nofollow" style="color: #9A7A2E" href="{{$partner->website}}">{{ $partner->website }}</a>
                        @endif
                        @if(Str::startsWith($partner->link_facebook, 'https') || Str::startsWith($partner->link_instagram, 'https') || Str::startsWith($partner->link_linkedin, 'https'))
                            <h3 style="font-weight: bold; margin-top: 10px; font-size: 18px">Redes Sociales</h3>
                            <div style="margin-top: 20px">
                                @if($partner->link_facebook != null && Str::startsWith($partner->link_facebook, 'https'))
                                    <a target="_blank" rel="nofollow" class="social" href="{{$partner->link_facebook}}"><i class="fab fa-facebook-square fa-2x"></i></a>
                                @endif
                                @if($partner->link_instagram != null && Str::startsWith($partner->link_instagram, 'https'))
                                    <a target="_blank" rel="nofollow" class="social" href="{{$partner->link_instagram}}"><i class="fab fa-instagram fa-2x"></i></a>
                                @endif
                                @if($partner->link_linkedin != null && Str::startsWith($partner->link_linkedin, 'https'))
                                    <a target="_blank" rel="nofollow" class="social" href="{{ $partner->link_linkedin}}"><i class="fab fa-linkedin fa-2x"></i></a>
                                @endif
                            </div>
                        @endif
                    </div>
                    <h3 style="font-weight: bold; margin-top: 10px; color: #9A7A2E; font-size: 18px">Reviews</h3>
                        @php
                          $rating = $partner->averageRating();
                        @endphp
                    <div data-toggle="modal" data-target="#exampleModalCenter" style="margin-top: 10px; color: #9A7A2E; cursor: pointer">
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
                    @php
                        $bandera = false;
                        foreach($partner->ratings as $rating){
                            if($rating->comment != null){
                                $bandera = true;
                            }
                        }   
                    @endphp
                    @if ($bandera)
                        <div class="mt-2" style="color: #9A7A2E; cursor: pointer" data-toggle="modal" data-target="#modalComentarios">  
                            <p>{{ $partner->timesRated()}} @if($partner->timesRated() > 1) comentarios @else comentario @endif</p>
                        </div>
                    @else
                        <div class="mt-2" style="color: #9A7A2E">  
                            <p>{{ $partner->timesRated()}} @if($partner->timesRated() > 1) comentarios @else comentario @endif</p>
                        </div>
                    @endif
                    @if(count($partner->customers) > 0)
                        <div style="color: #9A7A2E">
                            <p class="font-weight-bold"><i class="fas fa-search"></i> {{count($partner->customers)}} @if(count($partner->customers) == 1) persona ha @else personas han @endif realizado una consulta</p>
                        </div>
                    @endif
                    @if($partner->views > 0)
                        <div style="color: #9A7A2E">
                            <p class="font-weight-bold"><i class="fas fa-eye"></i> {{$partner->views+1}} visualizaciones al perfil</p>
                        </div>
                    @endif
                </div>
                <div class="formContact mt-4 rounded shadow">
                    <h4 class="text-white text-center p-3">¿Necesita realizar una consulta?</h4>
                    <p class="text-white px-3">Complete el formulario con su información y el partner <b class="text-warning">{{$partner->name . " " . $partner->lastname}}</b> se comunicará con usted</p>
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
                            <div class="w-100">
                                <input type="hidden" name="codpais" id="codTelfPais">
                                <input class="form-control ml-1 rounded-0" style="font-size: 12px" type="text" id="telefono" placeholder="Teléfono" name="phone" autocomplete="off" required>
                            </div>
                        </div>
                        <textarea class="form-control rounded-0" style="font-size: 12px" id="mensaje" rows="4" placeholder="Ej: Hola, me interesa consultar por sus servicios y deseo que me contacten" name="mensaje" autocomplete="off" required></textarea>
                        <div style="display: none">
                            <input type="hidden" name="aux">
                        </div>
                        <button class="btn mb-3 rounded-0" style="background-color: #FEC02F;" type="submit"><i class="fas fa-envelope"></i> Enviar</button>
                    </form>
                </div>
                @php
                    if (Cache::has('partner'.$partner->id)) {
                        $array = Cache::get('partner'.$partner->id);
                        $partnerCache = $array['partner'];
                        $ip = $array['ip'];
                    }
                @endphp
                <div id="divshowphone" class="row d-flex mt-4 justify-content-center border shadow" style="border-radius: 5px; margin-left: 1%; margin-right: 1%; padding-top: 4%;"> </div>
            </div>
        </div> --}}
        

        {{--MODAL DE VALORACION DE PARTNER--}}
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{ route('partner.rating', $partner)}}" method="POST">
                @csrf
              <div class="modal-content">
                <div class="modal-header" style="background-color: #002542; color: #ffffff">
                  <h5 class="modal-title" id="exampleModalLongTitle">Valoración de Partner</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Para valorar un partner necesitas completar los siguientes campos con tu información y enviar la calificación</p>
                        <input class="form-control" type="text" id="nombre" placeholder="Nombre y Apellido" name="nameRating" autocomplete="off" required>
                        <div class="d-flex">
                            <select name="country_residenceRating" id="country_residence" class="form-control" required>
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
                    @for ($i = 0; $i < 3; $i++)
                    <div class="card text-left rounded-0 mb-1">
                      <div class="card-body">
                        <p class="card-title"><img width="25px" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt=""> User</p>
                        <p class="card-text text-muted">{{$partner->customers[$i]->mensaje}}</p>
                      </div>
                    </div> 
                    @endfor
                    <div>
                        <p class="float-right text-warning">Visualizando 3 de {{count($partner->customers)}} consultas</p>
                    </div>
                </div>
              </div>
            </div>
          </div>
          @endif

        {{--ESTO ES PARA MI PERFIL--}}
        @if ($partner->name . " " . $partner->lastname == "Sebastian Armijos")
            <div class="mt-5">
                <a href="{{ route('web.eliminar.cache.partner', $partner) }}">Eliminar cache Partner</a>
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
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('{{url('img/partners/FONDO-PARTNER-INDIVIDUAL.webp')}}')";
        const divshowphone = document.getElementById('divshowphone');
        let id = document.getElementById('txtpartnerid').textContent;
        if(!localStorage.getItem("prueba"+id)){
            divshowphone.innerHTML = "<p class='pl-3 pr-3 shadow-sm' style='cursor: pointer; color: #002542; background-color: #FEC02F; height: 35px; padding: 5px; border-radius: 25px 0px 0px 25px;' data-toggle='modal' data-target='.bd-example-modal-sm'>Ver teléfono</p><p style='background-color: #002542; color: #ffffff; padding: 5px; border-radius: 0px 25px 25px 0px' class='ml-3 pr-3'><i class='fas fa-phone-alt' style='color: rgb(241, 132, 15)'></i>{{ Str::limit($partner->codigo_pais . ' ' . $partner->phone, 11, '...')  }}</p>";
        } else {
            divshowphone.innerHTML = "<a class='pl-3 pr-3 shadow-sm' style='color: #002542; background-color: #FEC02F; padding: 5px; height: 35px; border-radius: 25px 0px 0px 25px; text-decoration: none' href='tel:{{$partner->codigo_pais}}{{$partner->phone}}'>Llamar</a><p style='background-color: #002542; color: #ffffff; padding: 5px; border-radius: 0px 25px 25px 0px' class='ml-1 pl-3 pr-3'><i class='fas fa-phone-alt' style='color: rgb(241, 132, 15)'></i>{{ $partner->codigo_pais . ' ' . $partner->phone}}</p>";
        }
        setTimeout(() => {setviewed();}, 3000);
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