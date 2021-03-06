@extends('layouts.web')

@section('header')
    <title>Notaría Pública Latina en {{ $data['office'] }} - Tramite sus documentos</title>
    <meta name="description" content="{{ $data['metadescription'] }}">
    <meta name="keywords" content="{{ $data['keywords'] }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow, snippet">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        @media screen and (max-width: 580px){
            .titulo{margin-top: 15%;}
            .first-row{padding-bottom: 15px;}
            #sectionthree{min-width: 110vw;min-height: 130vh;}
            #imgApostille{padding-top: 5%;}
            #imgApostille img{width: 400px !important;height: 250px !important;}
            #imgrowapostille{width: 100%!important;height: 100%!important;}
            .linkServices{margin-left: -5px !important;padding: 0px 0px 0px 0px !important; margin-top: 0% !important; margin-bottom: 0% !important;}
            #colServices{
                padding-top: 0px !important;
                margin-left: 10% !important;
            }
            #txtNuestrosServicios{
                margin-right: 0px !important; 
            }
            #hrNuestrosServicios{
                margin-right: auto !important;
            }
            #divpais{
                display: inline !important;
            }
            #divcodigoandtelefono{
                width: 100% !important;
                margin-top: 16px;
                margin-bottom: 16px;
            }
            #pais{
                width: 100% !important;
            }
        }
        .titulo{color: white;font-weight: bold;}
        i{color:#9A7A2E;}
        .checks > p{color: #143b6b;}
        .checks > .row > .col > p{color: #143b6b;}
        #sectionthree{width: 100vw;height: 55vh;}
        .fifth-row{margin-top: 5%;justify-content: center;align-items: center;}
        /*HOVER IMAGENES DE SERVICIOS*/
        .grow:hover{background-color: #ece8e3;-webkit-transition: 600ms;-webkit-transform: initial;}
        .grow img{transition: 1s ease;}
        .grow:hover > img{-webkit-transform: scale(1.2);-ms-transform: scale(1.2);transform: scale(1.2);transition: 1s ease;}
        .card-footer:hover{background-color: #ece8e3 !important;-webkit-transition: 600ms !important;-webkit-transform: initial !important;}
        #colService:hover{background-color: #ece8e3;-webkit-transition: 600ms;-webkit-transform: initial;}
        .linkServices{color: #d4aa41;}
        #linkServices:hover .linkServices{color: #ffffff;}
        #linkServices:hover{background-color: #122944}
        #linkServices:hover > .border {background-color: #ffffff}
        #linkServices:hover .imgServices {filter: grayscale(1);-webkit-transform: scale(1.2);-ms-transform: scale(1.2);transform: scale(1.2);transition: 1s ease;}
        #svgwpp{bottom: 75px !important;right: 0px !important;}
        #iconcall{bottom: 40px !important; }
        .grecaptcha-badge { visibility: hidden; }
        /* QUITAR SPINNERS DE INPUT TYPE NUMBER */
        /* CHROME */
        input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none;margin: 0;}
        /* FIREFOX */
        input[type="number"] {-moz-appearance: textfield;}input[type="number"]:hover,input[type="number"]:focus {-moz-appearance: number-input;}
        /* OTHER */
        input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none;margin: 0;}
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
    
    
            {{--  {!! htmlScriptTagJsApi([
             'callback_then' => 'callbackThen',
             'callback_catch' => 'callbackCatch'
            ]) !!} --}}

@endsection

@section('phoneNumberHidden', $data['telfHidden'])
@section('phoneNumber', $data['telfShow'])

@php
// detectando si el dispositivo es movil para cargar la imagen del mapa de google
    $detect = new \Detection\MobileDetect();
    $isMobile = FALSE;

    if($detect->isMobile()){
        $isMobile = TRUE;
    }
@endphp

@section('content')
    <section id="prisection" style="background-size: cover; background-position: left top; background-repeat: no-repeat;">
        <div class="row justify-content-center align-items-center" style="min-height: @if($isMobile) 465px @else 550px @endif;background:rgba(2, 2, 2, 0.5)">
            <div class="col text-center">
                <h1 class="font-weight-bold heading-title titulo">Notaría Pública Latina <br> en {{ $data['office'] }}</h1>
                <p class="text-white heading-title" style="font-size: 25px">Gestión rápida y segura!</p>
                <a id="btnFirstIniciarTramite" href="#iniciarTramite" class="btn" style="background-color: #ffc107">Iniciar Trámite</a>
            </div>
        </div>
    </section>

    <div class="row" style="background-color: #122944;">
        <div class="col-sm-6 first-row" style="color: #ffffff; padding-left:15%; padding-top: 4%; margin-right: 0px;">
            <h2 style="font-weight: bold">¿Por qué elegirnos?</h2>
            <p style="font-size: 15px;">Brindamos el mejor servicio y asesoría en trámites de notaría para Latinos en Estados Unidos.</p>
            <div>
                <img class="lazy" width="50px" height="60px" data-src="{{ asset('img/docverify-approved-enotary-small.webp') }}" alt="Notaria Latina en {{ $data['office'] }}">
                <img class="lazy" width="160px" height="55px" data-src="{{ asset('img/logo.webp') }}" alt="Notaria Latina en {{ $data['office'] }}">
            </div>
        </div>
        
        <div class="col-sm-6">
            <img class="lazy" style="width: 100%; height: 100%" data-src="{{ asset('img/oficinas/IMAGENES-NEW-JERSEY2.webp') }}" alt="">
        </div>
    </div>
    
    <div class="row" id="sectionthree" style="background-size: cover; background-position: left top; background-repeat: no-repeat;">
        <div class="col-sm-6 d-flex justify-content-center align-items-center" id="imgApostille">
            <img class="lazy" style="width: 500px; height: 350px;" class="img-fluid" data-src="{{ asset($data['imgapostilla']) }}" alt="">
        </div>
        <div class="col-sm-6">
            <div>
                <h3 id="txtNuestrosServicios" class="text-center text-white mb-3" style="padding-top: 10%; margin-right: 12%; font-family: sans-serif">Nuestros Servicios</h3>
                <hr id="hrNuestrosServicios" style="width: 10%; margin-right: 51%; border: 1px solid #ffffff">
            </div>
            <div class="row" id="colServices" style="margin-right: 10%;">
                <div data-aos="fade-right" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 d-flex justify-content-center align-items-center">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'poder-notarial-'.Str::slug($data['office'])) }}">
                        <div id="linkServices" class="text-center border pt-4 pb-4 pl-3 pr-3 mb-3" style="border-radius: 10px; border: 2px solid #e4b63e !important;">
                            <div class="border" style="border-radius: 50%; margin-left: 50px; margin-right: 50px; padding: 12px; border: 2px solid #e4b63e !important">
                                <img class="lazy imgServices" style="width: 50px; height: 50px" data-src="{{asset('img/oficinas/ICONOS-20.webp')}}" alt="">
                            </div>
                            <h4 class="linkServices mt-1" style="margin-left: 5px; font-weight: bold;">Poderes</h4>
                        </div>
                    </a>
                </div>
                <div data-aos="fade-up" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 d-flex justify-content-center align-items-center">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-documentos-'.Str::slug($data['office'])) }}">
                        <div id="linkServices" class="text-center border pt-4 pb-4 pl-3 pr-3 mb-3" style="border-radius: 10px; border: 2px solid #e4b63e !important">
                            <div class="border" style="border-radius: 50%; margin-left: 50px; margin-right: 50px; padding: 12px; border: 2px solid #e4b63e !important">
                                <img class="lazy imgServices" style="width: 50px; height: 50px" data-src="{{asset('img/oficinas/ICONOS-19.webp')}}" alt="">
                            </div>
                            <h4 class="linkServices mt-1" style="margin-left: 5px; font-weight: bold;">Apostillas</h4>
                        </div>
                    </a>
                </div>
                <div data-aos="fade-left" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 d-flex justify-content-center align-items-center" style="">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'traducir-documentos-'.Str::slug($data['office'])) }}">
                        <div id="linkServices" class="text-center border pt-4 pb-4 pl-3 pr-3 mb-3" style="border-radius: 10px; border: 2px solid #e4b63e !important">
                            <div class="border" style="border-radius: 50%; margin-left: 50px; margin-right: 50px; padding: 12px; border: 2px solid #e4b63e !important">
                                <img class="lazy imgServices" style="width: 50px; height: 50px" data-src="{{asset('img/oficinas/ICONOS-18.webp')}}" alt="">
                            </div>
                            <h4 class="linkServices mt-1" style="margin-left: 5px; font-weight: bold;">Traducciones</h4>
                        </div>
                    </a>
                </div>
            </div>
            {{-- <div id="colServices" class="row" style="padding-top: 13%;">
                <div class="col-sm-6 d-flex justify-content-center mb-4">
                    <div id="linkServices" class="d-flex text-center">
                        <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'poder-notarial-'.Str::slug($data['office'])) }}">
                            <img class="lazyload imgServices" style="width: 50px; height: 50px" data-src="{{asset('img/oficinas/ICONOS-20.webp')}}" alt="">
                            <p class="linkServices" style="margin-left: 5px; font-weight: bold;">PODERES</p>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 d-flex justify-content-center">
                    <div id="linkServices" class="d-flex text-center">
                        <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-documentos-'.Str::slug($data['office'])) }}">
                            <img class="lazyload imgServices" style="width: 50px; height: 50px" data-src="{{asset('img/oficinas/ICONOS-19.webp')}}" alt="">
                            <p class="linkServices" style="margin-left: 5px; font-weight: bold;">APOSTILLAS</p>
                        </a>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="row pt-4">
                <div class="col-sm-6 d-flex justify-content-center mb-4">
                    <div id="linkServices" class="d-flex text-center">
                        <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'traducir-documentos-'.Str::slug($data['office'])) }}">
                            <img class="lazyload imgServices" style="width: 50px; height: 50px" data-src="{{asset('img/oficinas/ICONOS-18.webp')}}" alt="">
                            <p class="linkServices" style="margin-left: 5px; font-weight: bold;">TRADUCCIONES</p>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 d-flex justify-content-center">
                    <div id="linkServices" class="d-flex text-center">
                        <a style="text-decoration: none; color: #000000"  href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'affidavit-support-'.Str::slug($data['office'])) }}">
                            <img class="lazyload imgServices" style="width: 50px; height: 50px" data-src="{{asset('img/oficinas/ICONOS-17.webp')}}" alt="">
                            <p class="linkServices" style="margin-left: 5px; font-weight: bold;">AFFIDÁVIT</p>
                        </a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    <div data-aos="flip-down">
        <div class="row justify-content-center align-items-center" style="padding-top: 50px">
            <div class="text-center">
                <i><h2 style="font-weight: bold; font-size: 20px">¿Necesita realizar un trámite de Notaría <br> en {{ $data['office'] }}?</h2></i>
                <p style="font-size: 15px"><b>¡Contáctenos!</b> Estamos seguros que podemos ayudarle</p>
            </div>
        </div>
        <div class="row">
            <hr>
            <a class="btn btn-warning rounded-pill" style="font-weight: bold" href="tel:{{$data['telfHidden']}}"><i style="color: #000000" class="fas fa-phone"></i> LLAMAR {{$data['telfShow']}}</a>
            <hr>
        </div>
    </div>
    <div style="background-color: rgb(245, 244, 244); padding-bottom:50px">
        <p class="text-center mt-5" style="padding-top: 30px; font-size: 25px; font-weight: bold">Servicios adicionales de Notaría Pública</p>
        <div class="container">
            <div class="row justify-content-center">
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90%">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'travel-authorization-en-'.Str::slug($data['office'])) }}">
                        <div class="grow border" style="padding:25px; border-radius: 10px; height: 100%">
                            <img style="width: 50px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-08.webp') }}" alt="">
                            <p>Travel Authorization</p>
                        </div>
                    </a>  
                </div>
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90%;">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'certificaciones-en-'.Str::slug($data['office'])) }}">
                        <div class="grow border" style="padding:25px; border-radius: 10px; height: 100%">
                            <img style="width: 40px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-09.webp') }}" alt="">
                            <p>Certificaciones</p>
                        </div>
                    </a>
                </div>    
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90%">
                    <a style="text-decoration: none; color: #000000"  href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'acuerdos-en-'.Str::slug($data['office'])) }}">
                        <div class="grow border" style="padding: 25px; border-radius: 10px; height: 100%">
                            <img style="width: 50px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-10.webp') }}" alt="">
                            <p>Acuerdos</p>
                        </div>
                    </a>
                </div>
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90%">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'cartas-de-invitacion-en-'.Str::slug($data['office'])) }}">
                        <div class="grow border" style="padding: 25px; border-radius: 10px; height: 100%">
                            <img style="width: 50px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-11.webp') }}" alt="">
                            <p>Cartas de Invitación</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90px">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'revocatorias-en-'.Str::slug($data['office'])) }}">
                        <div class="grow border" style="padding: 25px; border-radius: 10px">
                            <img style="width: 50px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-12.webp') }}" alt="">
                            <p>Revocatorias</p>
                        </div>
                    </a>
                </div>
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90px">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'contratos-en-'.Str::slug($data['office'])) }}">
                        <div class="grow border" style="padding: 25px; border-radius: 10px">
                            <img style="width: 50px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-13.webp') }}" alt="">
                            <p>Contratos</p>
                        </div>
                    </a>
                </div>
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90px">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'testamentos-en-'.Str::slug($data['office'])) }}">
                        <div class="grow border" style="padding: 25px; border-radius: 10px">
                            <img style="width: 50px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-14.webp') }}" alt="">
                            <p>Testamentos</p>
                        </div>
                    </a>
                </div>
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90px">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), Str::lower(Str::slug($data['txtgrid'])).'-en-'.Str::slug($data['office'])) }}"">
                        <div class="grow border" style="padding: 25px; border-radius: 10px">
                            <img style="width: 50px; height: 50px; filter: brightness(0.85) saturate(85%);" class="img-fluid lazy" data-src="{{ asset($data['imggrid']) }}" alt="">
                            <p>{{ $data['txtgrid'] }}</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    
    </div>

    <div class="row">
        <div class="col-sm-6 fifth-row text-center" style="padding-top: 3%; padding-bottom: 4%">
            <h2 style="font-weight: bold"><i>{{ Str::upper($data['title']) }}</i></h2>
            <p>{{ $data['subtitle'] }}!</p>
            <p class="text-muted" style="margin-left: 10%; margin-right: 10%">Apostille actas de nacimiento, actas de matrimonio, certificados, poderes, traducciones, diplomas, contratos, testamentos</p>
        </div>
        <div class="col-sm-6">
            <img @if($data['office'] == "New York") class="float-right lazy" @endif id="imgrowapostille" style="width: {{$data['widthimgdown']}}; height: {{$data['heightimgdown']}}; padding-top: {{$data['paddingtop']}}" class="img-fluid lazy" data-src="{{$data['imgdown']}}" alt="Notaria Latina en {{$data['office']}}">
        </div>
    </div>

    <section data-aos="zoom-in" id="iniciarTramite" class="row quienes-somos text-white m-0">  
        <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 pb-5 px-3 mx-auto">
            <div class="card-body text-center">  
              <h2 class="font-italic font-weight-bold">Solicitar Tramite</h2>      
              <small> Envíe el formulario y un asesor le contactará breve. </small>     
              <form method="POST" action="{{route('send.email.oficinas')}}">
                  @csrf
                <input type="hidden" id="interest" name="interest" value="Oficina {{$data['office']}}">
                <div class="form-group pt-4">
                  <input id="aaa" name="aaa" type="text" class="form-control" placeholder="Nombre y Apellido"  maxlength="40" minlength="2" autocomplete="off" required>
                </div>
                <div id="divpais" class="form-group d-flex">
                    <select id="pais" name="pais" class="form-control mr-2" style="width: 50%" required>
                        <option value="">País de residencia</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Chile">Chile</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="España">España</option>
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
                      <div id="divcodigoandtelefono" class="d-flex" style="width: 50%">
                          <input type="text" id="telf" name="codpais" class="form-control" style="border-radius: 5px 0px 0px 5px; width: 75px; background-color: #ffffff" readonly/>
                          <input id="bbb" name="bbb" type="number" class="form-control" placeholder="Teléfono" maxlength="14" minlength="8" autocomplete="off" style="border-radius: 0px 5px 5px 0px" required>
                      </div>
                </div>

                {{-- <div class="row">
                  <div class="col-sm-7">
                    <div class="row">
                      <div class="col-sm-7 mb-3">
                        <select id="pais" name="pais" class="form-control" required>
                          <option value="">País de residencia</option>
                          <option value="Argentina">Argentina</option>
                          <option value="Bolivia">Bolivia</option>
                          <option value="Colombia">Colombia</option>
                          <option value="Costa Rica">Costa Rica</option>
                          <option value="Ecuador">Ecuador</option>
                          <option value="El Salvador">El Salvador</option>
                          <option value="España">España</option>
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
                      <div class="col-sm-5">
                        <div class="form-group">
                          <input type="text" id="telf" name="codpais" class="form-control" readonly/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <input id="bbb" name="bbb" type="text" class="form-control" placeholder="Teléfono" maxlength="14" minlength="8" autocomplete="off" required>
                    </div>
                  </div>
                </div> --}}
                <div class="form-group">
                  <input id="ddd" name="ddd" type="text" class="form-control" placeholder="Mensaje"  maxlength="100" autocomplete="off" required>
                </div>
                <input type="hidden" style="font-size: 10px" placeholder="Si puede ver este campo, por favor ignórelo" name="aux" class="form-control" readonly>  
                <button class="btn btn-lg btn-warning btn-block" type="submit">INICIAR TRAMITE</button>
              </form>
            </div> 
        </div>
  </section>

    <div class="row">
        <a href="{{ $data['urlmap']}}" target="_blank">
            <img id="imgurlmap" style="width: 100%; height: 100%" class="lazy img-fluid" data-src="@if($isMobile) {{ asset($data['imgurlmapmobile']) }} @else {{ asset($data['imgurlmap']) }} @endif" alt="Apostillar Documentos en {{ $data['office'] }}">
        </a>
    </div>

  <div class="mt-5 checks">
      <h3 class="text-center">Servicios Adicionales</h3>
      <hr style="width: 10%; border: 1px solid #000000">
      <h2 class="text-center" style="font-size:25px">Documentos que requieren una apostilla en {{ $data['office'] }}</h2>
      <p style="padding-left: 15%; font-size: 18px; margin-top: 15px">Documentos Personales</p>
      <div class="row" style="padding-left:15%; padding-right:15%;">
        <div class="col-12 col-sm-3">
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-de-nacimiento-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de nacimiento</p>
            </a>
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-reporte-consular-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Reporte Consular CRBA nacidos en el extranjero</p>
            </a>
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-de-matrimonio-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de matrimonio</p>
            </a>
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-de-defuncion-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de defunción</p>
            </a>
        </div>
        <div class="col-12 col-sm-3">
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-de-divorcio-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de divorcio</p>
            </a>
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-de-naturalizacion-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificado de naturalización</p>
            </a>
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-expediente-de-adopcion-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Expediente de adopción</p>
            </a>
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-copia-de-pasaporte-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Copia de un pasaporte</p>
            </a>
        </div>
        <div class="col-12 col-sm-3">
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-copia-de-licencia-de-conducir-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Copia de licencia de conducir</p>
            </a>
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-escrituras-testamentos-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Escrituras y testamentos</p>
            </a>
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-declaraciones-juradas-de-estado-unico-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Declaraciones juradas de estado único</p>
            </a>
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-titulo-de-automovil-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Título de coche/automóvil</p> 
            </a>
        </div>
        <div class="col-12 col-sm-3">
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-autorizacion-de-viaje-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Autorizaciones de viaje</p>
            </a>
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-poder-notarial-personal-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Poder notarial personal</p>
            </a>
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-registro-de-policia-estatal-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Registros de la policía estatal</p>
            </a>
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-registro-de-antecedentes-fbi-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Registros de antecedentes del FBI</p> 
            </a>
        </div>
      </div>

      <p style="padding-left: 15%; font-size: 18px; margin-top: 10px">Documentos Académicos</p>
      <div class="row" style="padding-left:15%; padding-right:15%;">
        <div class="col-12 col-sm-3">
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-diploma-universitario-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Diplomas Universitarios</p>
            </a>
        </div>
        <div class="col-12 col-sm-3">
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-transcripcion-universitaria-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Transcripciones universitarias</p>
            </a>
        </div>
        <div class="col-12 col-sm-3">
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-diploma-de-escuela-secundaria-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Diplomas de escuela secundaria</p>
            </a>
        </div>
        <div class="col-12 col-sm-3">
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-transcripcion-de-escuela-secundaria-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Transcripciones de escuela secundaria</p>
            </a>
        </div>
      </div>

      <p style="padding-left: 15%; font-size: 18px; margin-top: 10px">Documentos Corporativos</p>
      <div class="row" style="padding-left:15%; padding-right:15%;">
        <div class="col-12 col-sm-3">
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-de-incorporacion-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de incorporación</p>
            </a>
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-de-buena-reputacion-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de buena reputación</p>
            </a>
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-de-origen-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de origen</p>
            </a>
        </div>
        <div class="col-12 col-sm-3">
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-marca-patente-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Marcas / Patentes</p>
            </a>
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-poder-comercial-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Poder comercial</p>
            </a>
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-declaracion-jurada-comercial-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Declaración jurada comercial</p>
            </a>
        </div>
        <div class="col-12 col-sm-3">
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-fda-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados FDA</p>
            </a>
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-facturas-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Facturas</p>
            </a>
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-departamento-de-hacienda-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Departamento de hacienda [Formulario 6166]</p>
            </a>
        </div>
        <div class="col-12 col-sm-3">
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-de-gobierno-extranjero-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificado de gobierno extranjero</p>
            </a>
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-de-venta-gratis-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de venta gratis</p>
            </a>
            <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-ordenes-de-compra-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Órdenes de compra</p>
            </a>
        </div>
      </div>
  </div>

  <section style="background-color: #F5F4F4" class="pt-2 mt-5">
    <div class="container text-center mt-3 mb-4">
      <h2 class="mt-5 mb-5">Lo que opinan nuestros clientes</h2>
      <div class="row justify-content-center">
        @foreach ($data['reviews'] as $review)
          <div class="col-sm-4 d-flex justify-content-center mb-3">
            <div data-aos="fade-up" class="card card-reviews" style="width: 18rem; height: 100%; background-color: #F5F4F4">
              <div class="card-body text-center">
                <h5 class="card-title">{{ $review['name'] }}</h5>
                <h6 class="card-subtitle mb-2 text-muted d-flex justify-content-center">
                  @for ($i = 0; $i < $review['stars']; $i++)
                    <img width="15" height="15" data-src="{{ asset('img/estrella.webp') }}" class="lazy img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="⭐">
                  @endfor
                </h6>
                <p class="card-text">
                  <i style="color: #000000">
                    "{{ $review['message']}}"
                  </i>
                </p>
              </div>
              <div class="card-footer" style="background-color: #F5F4F4">
                <a target="_blank" href="{{ $review['link']}}" class="card-link">Ver comentario</a>
              </div>
            </div>
          </div>
        @endforeach
        <div class="mt-5 mb-5">
          <a target="_blank" href="{{ $data['more_reviews'] }}" style="color: #192939;" class="btn btn-warning"><b style="font-weight: 500; font-size: 17px">Ver más reseñas</b> <i class="fas fa-long-arrow-alt-right"></i></a>
        </div>
      </div>
    </div>
  </section>
  @if (session('report'))
        @php
            echo "
                <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                <script>
                    swal('Hemos enviado su información', 'Nos pondremos en contacto lo antes posible!', 'success');
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
            document.getElementById('prisection').style.backgroundImage = "url({{asset($data['imgup'])}})";
            document.getElementById('sectionthree').style.backgroundImage = "url('{{url('img/oficinas/BANNER-NEGRO.webp')}}')";
            //setImageUrlByViewport();
        });

        //window.addEventListener('resize', setImageUrlByViewport);

        //FUNCION PARA SETEAR SRC DE LA IMAGEN DEPENDIENDO DEL TAMAÑO DE LA PANTALLA
        // function setImageUrlByViewport(){
        //     var imgUrlMap = document.getElementById('imgurlmap');
        //     if (screen.width < 580){
        //         imgUrlMap.src = "{{ $data['imgurlmapmobile'] }}";
        //         imgUrlMap.style.width = "100%";
        //         imgUrlMap.style.height = "100%";
        //     } else {
        //         imgUrlMap.src = "{{ $data['imgurlmap'] }}";
        //         imgUrlMap.style.width = "100%";
        //         imgUrlMap.style.height = "100%";
        //     }
        // }

        var selectPaisResidencia = document.getElementById('pais');
        var inputCodPais = document.getElementById('telf');

        selectPaisResidencia.onchange  = function(e){
            switch (selectPaisResidencia.value) {
            case "":codigo = ""; break;
            case "Argentina":codigo = "+54";break;
            case "Bolivia":codigo = "+591";break;
            case "Chile":codigo = "+56"; break;
            case "Colombia":codigo = "+57";break;
            case "Costa Rica":codigo = "+506";break;
            case "Ecuador":codigo = "+593";break;
            case "El Salvador":codigo = "+503";break;
            case "España":codigo = "+34"; break;
            case "Estados Unidos":codigo = "+1"; break;
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

        //DESPLAZAMIENTO AL HACER CLICK EN EL BOTON INICIAR TRAMITE DEL BANNER
        var btnTramite = document.getElementById('btnFirstIniciarTramite');
        btnTramite.addEventListener('click', clickHandler);

        function clickHandler(e) {
            e.preventDefault();
            const href = this.getAttribute("href");
            const offsetTop = document.querySelector(href).offsetTop;
            scroll({
                top: offsetTop,
                behavior: "smooth"
            });
        }
        document.addEventListener("DOMContentLoaded",function(){var e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var n=new IntersectionObserver(function(e,t){e.forEach(function(e){if(e.isIntersecting){var t=e.target;t.src=t.dataset.src,t.classList.remove("lazy"),n.unobserve(t)}})});e.forEach(function(e){n.observe(e)})}else{var t;function r(){t&&clearTimeout(t),t=setTimeout(function(){var n=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+n&&(e.src=e.dataset.src,e.classList.remove("lazy"))}),0==e.length&&(document.removeEventListener("scroll",r),window.removeEventListener("resize",r),window.removeEventListener("orientationChange",r))},20)}e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)}});
    </script>
@endsection