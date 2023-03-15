@extends('layouts.web')

@section('header')
    <title>Notaría Pública Latina en {{ $data['office'] }} - Tramite sus documentos</title>
    <meta name="description" content="{{ $data['metadescription'] }}">
    <meta name="keywords" content="{{ $data['keywords'] }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow, snippet">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    {{-- link para la tipografia montserrat --}}
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <style>
        @media screen and (max-width: 580px){
            .titulo{margin-top: 15%; font-size: 25px !important}
            .txtgestion{font-size: 15px; letter-spacing: 0px !important;}
            .first-row{padding-bottom: 15px;}
            /* #sectionthree{min-width: 110vw;min-height: 130vh;} */
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
            .col-sm-8{margin-left: 40px !important; margin-right: 40px !important}
        }
        .titulo{color: white;font-weight: bold;}
        i{color:#2B384D;}
        .checks > p{color: #143b6b;}
        .checks > .row > .col > p{color: #143b6b;}
        /* #sectionthree{width: 100vw;height: auto;} */
        .fifth-row{margin-top: 5%;justify-content: center;align-items: center;}
        /*HOVER IMAGENES DE SERVICIOS*/
        .grow:hover{background-color: #ece8e3;-webkit-transition: 600ms;-webkit-transform: initial;}
        .grow img{transition: 1s ease;}
        .grow:hover > img{-webkit-transform: scale(1.2);-ms-transform: scale(1.2);transform: scale(1.2);transition: 1s ease;}
        .card-footer:hover{background-color: #ece8e3 !important;-webkit-transition: 600ms !important;-webkit-transform: initial !important;}
        #colService:hover{background-color: #ece8e3;-webkit-transition: 600ms;-webkit-transform: initial;}
        /* .linkServices{color: #2B384D;} */
        .linkServices{color: #d4aa41;}
        #linkServices:hover .linkServices{color: #ffffff;}
        #linkServices:hover{background-color: #122944}
        #linkServices:hover > .border {background-color: #ffffff}
        #linkServices:hover .imgServices {filter: grayscale(1);-webkit-transform: scale(1.2);-ms-transform: scale(1.2);transform: scale(1.2);transition: 1s ease;}
        /* #linkServices:hover .imgServices {filter: brightness(0) invert(1);}  */
        #svgwpp{bottom: 75px !important;right: 0px !important;}
        #iconcall{bottom: 20px !important; }
        .grecaptcha-badge { visibility: hidden; }
        /* QUITAR SPINNERS DE INPUT TYPE NUMBER */
        /* CHROME */
        input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none;margin: 0;}
        /* FIREFOX */
        input[type="number"] {-moz-appearance: textfield;}input[type="number"]:hover,input[type="number"]:focus {-moz-appearance: number-input;}
        /* OTHER */
        input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none;margin: 0;}
        .add-services{box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px !important;}
        .add-services:hover{box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;}
        .font-family-montserrat{font-family: 'Montserrat'};
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

{{-- @section('phoneNumberHidden', $data['telfHidden'])
@section('phoneNumber', $data['telfShow']) --}}

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
        <div class="row justify-content-center align-items-center position-relative" style="min-height: @if($isMobile) 490px @else 550px @endif;background:rgba(2, 2, 2, 0.5)">
            <div class="col text-center justify-content-center">
                <img class="mt-5" width="100px" height="90px" src="{{asset('img/iso2.png')}}" alt="">
                <h1 class="titulo mt-4" style="font-size: 50px"><i class="fas fa-map-marker-alt" style="color: #FFB832"></i> Notaría Latina en {{ $data['office'] }}</h1>
                <div class="d-flex justify-content-center mt-3">
                    <div class="w-auto">
                        <p class="text-white rounded-pill px-2 font-weight-bold txtgestion" style="background-color: #FFB832; color: #2B384D !important; letter-spacing: 10px">GESTIÓN RÁPIDA Y FÁCIL</p>
                    </div>
                </div>
                <button id="btnFirstIniciarTramite" href="#iniciarTramite" class="btn btn-outline-warning rounded-pill mt-4" style="color: #ffffff">INICIAR TRÁMITE</button>
                <div class="d-flex justify-content-center mt-5">
                    <div class="d-flex">
                        @foreach ($consulates as $consulate)
                            @if ($consulate->slug != "espana")
                                <img class="mx-1" width="25px" height="25px" src="{{asset('img/partners/'.str_replace("-", "", $consulate->slug).'.png')}}" alt="">
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="position-absolute" style="top: 8px; right: 43px !important;">
                <a class="text-warning h5" href="tel:{{$data['telfHidden']}}" style="font-weight: bols;" onclick="gtag_report_conversion('tel:{{$data['telfHidden']}}');gtag('event', 'click', { 'event_category': 'Seguimiento de llamadas', 'event_label': 'HomePage:{{Request::segment(1)}}', 'value': '0'});">
                    <i class="fa fa-phone-square-alt" style="color: #FFB832"></i> {{$data['telfShow']}}
                </a>
            </div>
        </div>
    </section>
    <div style="background-color: #FFB832; height: 10px"></div>

    <section class="pt-5 pb-5" style="background-size: cover; background-position: left top; background-repeat: no-repeat;">
        <h2 class="text-center w-100 pb-4" style="color: #122944">Nuestros Servicios</h2>
        <div style="margin-left: 20%; margin-right: 20%">

            {{-- nuevo div de servicios --}}

            {{-- <div class="row justify-content-center">
                <div class="col-sm-4 col-12 mt-3">
                    <div class="card h-100" style="border-color: #FFBE32; border-radius: 25px" id="linkServices">
                        <div class="d-flex align-items-center h-100">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="lazy imgServices ml-3" style="width: 40px; height: 60px" data-src="{{asset('img/oficinas/iconos web/poderes.png')}}" alt="">
                            </div>
                            <div class="mx-3" style="width: 3px; height: 60px; background-color: #FFBE32"></div>
                            <div class="pt-1 pr-3">
                                <h3 class="linkServices mt-2 font-family-montserrat" style="font-weight: bold; font-size: 22px">PODERES</h3>
                                <p class="font-family-montserrat" style="font-size: 14px"><i class="linkServices ">Es un documento legal con el objetivo de otorgar control</i></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                    <div class="card h-100" style="border-color: #FFBE32; border-radius: 25px" id="linkServices">
                        <div class="d-flex align-items-center h-100">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="lazy imgServices ml-3" style="width: 40px; height: 60px" data-src="{{asset('img/oficinas/iconos web/apostilla.png')}}" alt="">
                            </div>
                            <div class="mx-3" style="width: 4px; height: 60px; background-color: #FFBE32"></div>
                            <div class="pt-1 pr-3">
                                <h3 class="linkServices mt-2 font-family-montserrat" style="font-weight: bold; font-size: 22px">APOSTILLAS</h3>
                                <p class="font-family-montserrat" style="font-size: 14px"><i class="linkServices ">Constatar la veracidad de documentos públicos expedidos en otro país</i></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                    <div class="card h-100" style="border-color: #FFBE32; border-radius: 25px" id="linkServices">
                        <div class="d-flex align-items-center h-100">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="lazy imgServices ml-3" style="width: 40px; height: 60px" data-src="{{asset('img/oficinas/iconos web/traducciones.png')}}" alt="">
                            </div>
                            <div class="mx-3" style="width: 4px; height: 60px; background-color: #FFBE32"></div>
                            <div class="pt-1 pr-3">
                                <h3 class="linkServices mt-2 font-family-montserrat" style="font-weight: bold; font-size: 22px">TRADUCCIONES</h3>
                                <p class="font-family-montserrat" style="font-size: 14px"><i class="linkServices">Textos de un idioma a otro diferente, sirven para gestionar trámites fuera del país de origen</i></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                    <div class="card h-100" style="border-color: #FFBE32; border-radius: 25px" id="linkServices">
                        <div class="d-flex align-items-center h-100">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="lazy imgServices ml-3" style="width: 40px; height: 60px; margin-right: -2px;" data-src="{{asset('img/oficinas/iconos web/certificaciones.png')}}" alt="">
                            </div>
                            <div class="mx-3" style="width: 10px; height: 60px; background-color: #FFBE32"></div>
                            <div class="pt-1 pr-3">
                                <h3 class="linkServices mt-2 font-family-montserrat" style="font-weight: bold; font-size: 22px">CERTIFICACIONES</h3>
                                <p class="font-family-montserrat" style="font-size: 14px"><i class="linkServices">Mediante este se manifiesta que la copia realizada es verídica copia del documento original</i></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                    <div class="card h-100" style="border-color: #FFBE32; border-radius: 25px" id="linkServices">
                        <div class="d-flex align-items-center h-100">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="lazy imgServices ml-3" style="width: 40px; height: 60px" data-src="{{asset($data['imggrid'])}}" alt="">
                            </div>
                            <div class="mx-2" style="width: 4px; height: 60px; background-color: #FFBE32"></div>
                            <div class="pt-1 pr-3">
                                <h3 class="linkServices mt-2 font-family-montserrat" style="font-weight: bold; font-size: 22px">{{ strtoupper($data['txtgrid']) }}</h3>
                                <p class="font-family-montserrat" style="font-size: 14px"><i class="linkServices">Mediante un juramento ante una autoridad judicial o administrativa asegura la veracidad de algo</i></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                    <div class="card h-100" style="border-color: #FFBE32; border-radius: 25px" id="linkServices">
                        <div class="d-flex align-items-center h-100">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="lazy imgServices ml-3" style="width: 40px; height: 60px" data-src="{{asset('img/oficinas/iconos web/revocatorias.png')}}" alt="Como hacer una Revocatoria en Estados Unidos">
                            </div>
                            <div class="mx-3" style="width: 3px; height: 60px; background-color: #FFBE32"></div>
                            <div class="pt-1 pr-3">
                                <h3 class="linkServices mt-2 font-family-montserrat" style="font-weight: bold; font-size: 22px">REVOCATORIA</h3>
                                <p class="font-family-montserrat" style="font-size: 14px"><i class="linkServices">Deja sin efecto un poder otorgado sin antelación</i></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                    <div class="card h-100" style="border-color: #FFBE32; border-radius: 25px" id="linkServices">
                        <div class="d-flex align-items-center h-100">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="lazy imgServices ml-3" style="width: 40px; height: 60px" data-src="{{asset('img/oficinas/iconos web/acuerdos.png')}}" alt="Como hacer un acuerdo en Estados Unidos">
                            </div>
                            <div class="mx-2" style="width: 3px; height: 60px; background-color: #FFBE32"></div>
                            <div class="pt-1 pr-3">
                                <h3 class="linkServices mt-2 font-family-montserrat" style="font-weight: bold; font-size: 22px">ACUERDOS</h3>
                                <p class="font-family-montserrat" style="font-size: 14px"><i class="linkServices">Es un convenio firmado entre dos o más personas</i></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                    <div class="card h-100" style="border-color: #FFBE32; border-radius: 25px" id="linkServices">
                        <div class="d-flex align-items-center h-100">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="lazy imgServices ml-3" style="width: 40px; height: 60px" data-src="{{asset('img/oficinas/iconos web/cartas.png')}}" alt="Como tramitar una carta de invitacion en Estados Unidos">
                            </div>
                            <div class="mx-3" style="width: 3px; height: 60px; background-color: #FFBE32"></div>
                            <div class="pt-1 pr-3">
                                <h3 class="linkServices mt-2 font-family-montserrat" style="font-weight: bold; font-size: 22px">CARTAS DE INVITACIÓN</h3>
                                <p class="font-family-montserrat" style="font-size: 14px"><i class="linkServices">Requisito válido que se presenta ante el consulado que lo requiera para la gestión de la visa de turista</i></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                    <div class="card h-100" style="border-color: #FFBE32; border-radius: 25px" id="linkServices">
                        <div class="d-flex align-items-center h-100">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="lazy imgServices ml-3" style="width: 40px; height: 60px" data-src="{{asset('img/oficinas/iconos web/travel.png')}}" alt="Como hacer una autorizacion de viaje a Estados Unidos">
                            </div>
                            <div class="mx-3" style="width: 3px; height: 60px; background-color: #FFBE32"></div>
                            <div class="pt-1 pr-3">
                                <h3 class="linkServices mt-2 font-family-montserrat" style="font-weight: bold; font-size: 22px">TRAVEL AUTHORIZATION</h3>
                                <p class="font-family-montserrat" style="font-size: 14px"><i class="linkServices">Nombra a un titular quien será el encargado de viajar con el menor</i></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                    <div class="card h-100" style="border-color: #FFBE32; border-radius: 25px" id="linkServices">
                        <div class="d-flex align-items-center h-100">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="lazy imgServices ml-3" style="width: 40px; height: 60px" data-src="{{asset('img/oficinas/iconos web/contratos.png')}}" alt="Como hacer una autorizacion de viaje a Estados Unidos">
                            </div>
                            <div class="mx-3" style="width: 3px; height: 60px; background-color: #FFBE32"></div>
                            <div class="pt-1 pr-3">
                                <h3 class="linkServices mt-2 font-family-montserrat" style="font-weight: bold; font-size: 22px">CONTRATOS</h3>
                                <p class="font-family-montserrat" style="font-size: 14px"><i class="linkServices">Son documentos legales, firmados por dos personas que reflejan los derechos y obligaciones</i></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                    <div class="card h-100" style="border-color: #FFBE32; border-radius: 25px" id="linkServices">
                        <div class="d-flex align-items-center h-100">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="lazy imgServices ml-3" style="width: 40px; height: 60px" data-src="{{asset('img/oficinas/iconos web/testamento.png')}}" alt="Como tramitar un testamento en Estados Unidos">
                            </div>
                            <div class="mx-3" style="width: 3px; height: 60px; background-color: #FFBE32"></div>
                            <div class="pt-1 pr-3">
                                <h3 class="linkServices mt-2 font-family-montserrat" style="font-weight: bold; font-size: 22px">TESTAMENTO</h3>
                                <p class="font-family-montserrat" style="font-size: 14px"><i class="linkServices">Son documentos legales que reflejan la voluntad de una persona de distribuir sus bienes</i></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div> --}}
            {{-- termina nuevo div de servicios --}}

            <div class="row">
                <div data-aos="fade-right" class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 d-flex justify-content-center align-items-center">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'poder-notarial-'.Str::slug($data['office'])) }}">
                        <div id="linkServices" class="text-center border pt-4 pb-4 pl-3 pr-3 mb-3" style="border-radius: 10px; border: 2px solid #e4b63e !important;">
                            <div class="border" style="border-radius: 50%; margin-left: 50px; margin-right: 50px; padding: 12px; border: 2px solid #e4b63e !important">
                                <img class="lazy imgServices" style="width: 50px; height: 50px" data-src="{{asset('img/oficinas/ICONOS-20.webp')}}" alt="">
                            </div>
                            <h3 class="linkServices mt-1" style="margin-left: 5px; font-weight: bold;">Poderes</h3>
                        </div>
                    </a>
                </div>
                <div data-aos="fade-up" class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 d-flex justify-content-center align-items-center">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-documentos-'.Str::slug($data['office'])) }}">
                        <div id="linkServices" class="text-center border pt-4 pb-4 pl-3 pr-3 mb-3" style="border-radius: 10px; border: 2px solid #e4b63e !important">
                            <div class="border" style="border-radius: 50%; margin-left: 50px; margin-right: 50px; padding: 12px; border: 2px solid #e4b63e !important">
                                <img class="lazy imgServices" style="width: 50px; height: 50px" data-src="{{asset('img/oficinas/ICONOS-19.webp')}}" alt="">
                            </div>
                            <h3 class="linkServices mt-1" style="margin-left: 5px; font-weight: bold;">Apostillas</h3>
                        </div>
                    </a>
                </div>
                <div data-aos="fade-left" class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 d-flex justify-content-center align-items-center" style="">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'traducir-documentos-'.Str::slug($data['office'])) }}">
                        <div id="linkServices" class="text-center border pt-4 pb-4 pl-3 pr-3 mb-3" style="border-radius: 10px; border: 2px solid #e4b63e !important">
                            <div class="border" style="border-radius: 50%; margin-left: 50px; margin-right: 50px; padding: 12px; border: 2px solid #e4b63e !important">
                                <img class="lazy imgServices" style="width: 50px; height: 50px" data-src="{{asset('img/oficinas/ICONOS-18.webp')}}" alt="">
                            </div>
                            <h3 class="linkServices mt-1" style="margin-left: 5px; font-weight: bold;">Traducciones</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div @if(!$isMobile) style="margin-left: 15%; margin-right: 15%" @else class="mx-4" @endif>
            <div class="row">
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90%">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'travel-authorization-en-'.Str::slug($data['office'])) }}">
                        <div id="linkServices" class="grow" style="padding:25px; border-radius: 10px; height: 100%; border-radius: 10px; border: 2px solid #e4b63e !important">
                            <img style="width: 50px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-08.webp') }}" alt="">
                            <h3 style="font-size: 15px" class="mt-2 linkServices">Travel Authorization</h3>
                        </div>
                    </a>  
                </div>
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90%;">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'certificaciones-en-'.Str::slug($data['office'])) }}">
                        <div id="linkServices" class="grow" style="padding:25px; border-radius: 10px; height: 100%; border-radius: 10px; border: 2px solid #e4b63e !important">
                            <img style="width: 40px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-09.webp') }}" alt="">
                            <h3 style="font-size: 15px" class="mt-2 linkServices">Certificaciones</h3>
                        </div>
                    </a>
                </div>    
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90%">
                    <a style="text-decoration: none; color: #000000"  href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'acuerdos-en-'.Str::slug($data['office'])) }}">
                        <div id="linkServices" class="grow" style="padding: 25px; border-radius: 10px; height: 100%; border-radius: 10px; border: 2px solid #e4b63e !important">
                            <img style="width: 50px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-10.webp') }}" alt="">
                            <h3 style="font-size: 15px" class="mt-2 linkServices">Acuerdos</h3>
                        </div>
                    </a>
                </div>
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90%">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'cartas-de-invitacion-en-'.Str::slug($data['office'])) }}">
                        <div id="linkServices" class="grow" style="padding: 25px; border-radius: 10px; height: 100%; border-radius: 10px; border: 2px solid #e4b63e !important">
                            <img style="width: 50px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-11.webp') }}" alt="">
                            <h3 style="font-size: 15px" class="mt-2 linkServices">Cartas de Invitación</h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90px">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'revocatorias-en-'.Str::slug($data['office'])) }}">
                        <div id="linkServices" class="grow" style="padding: 25px; border-radius: 10px; border-radius: 10px; border: 2px solid #e4b63e !important">
                            <img style="width: 50px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-12.webp') }}" alt="">
                            <h3 style="font-size: 15px" class="mt-2 linkServices">Revocatorias</h3>
                        </div>
                    </a>
                </div>
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90px">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'contratos-en-'.Str::slug($data['office'])) }}">
                        <div id="linkServices" class="grow" style="padding: 25px; border-radius: 10px; border-radius: 10px; border: 2px solid #e4b63e !important">
                            <img style="width: 50px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-13.webp') }}" alt="">
                            <h3 style="font-size: 15px" class="mt-2 linkServices">Contratos</h3>
                        </div>
                    </a>
                </div>
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90px">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'testamentos-en-'.Str::slug($data['office'])) }}">
                        <div id="linkServices" class="grow" style="padding: 25px; border-radius: 10px; border-radius: 10px; border: 2px solid #e4b63e !important">
                            <img style="width: 50px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-14.webp') }}" alt="">
                            <h3 style="font-size: 15px" class="mt-2 linkServices">Testamentos</h3>
                        </div>
                    </a>
                </div>
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90px">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), Str::lower(Str::slug($data['txtgrid'])).'-en-'.Str::slug($data['office'])) }}"">
                        <div id="linkServices" class="grow" style="padding: 25px; border-radius: 10px; border-radius: 10px; border: 2px solid #e4b63e !important">
                            <img style="width: 50px; height: 50px; filter: brightness(0.85) saturate(85%);" class="img-fluid lazy" data-src="{{ asset($data['imggrid']) }}" alt="">
                            <h3 style="font-size: 15px" class="mt-2 linkServices">{{ $data['txtgrid'] }}</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>



        {{-- <div class="col-sm-6 d-flex justify-content-center align-items-center" id="imgApostille">
            <img class="lazy" style="width: 500px; height: 350px;" class="img-fluid" data-src="{{ asset($data['imgapostilla']) }}" alt="">
        </div> --}}
        {{-- <div class="col-sm-6"> --}}
            {{-- <div>
                <h2 id="txtNuestrosServicios" class="text-center text-white mb-3" style="padding-top: 10%; margin-right: 12%; font-family: sans-serif">Nuestros Servicios</h2>
                <hr id="hrNuestrosServicios" style="width: 10%; margin-right: 51%; border: 1px solid #ffffff">
            </div>
            <div class="row" id="colServices" style="margin-right: 10%;">
                
            </div> --}}
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
        {{-- </div> --}}
        </section>

    {{-- <div class="row" style="background-color: #122944;">
        <div class="col-sm-6 first-row" style="color: #ffffff; padding-left:15%; padding-top: 4%; margin-right: 0px;">
            <p style="font-weight: bold" class="h2">¿Por qué elegirnos?</p>
            <p style="font-size: 15px;">Brindamos el mejor servicio y asesoría en trámites de notaría para Latinos en Estados Unidos.</p>
            <div>
                <img class="lazy" width="50px" height="60px" data-src="{{ asset('img/docverify-approved-enotary-small.webp') }}" alt="Notaria Latina en {{ $data['office'] }}">
                <img class="lazy" width="160px" height="55px" data-src="{{ asset('img/logo.webp') }}" alt="Notaria Latina en {{ $data['office'] }}">
            </div>
        </div>
        
        <div class="col-sm-6">
            <img class="lazy" style="width: 100%; height: 100%" data-src="{{ asset('img/oficinas/IMAGENES-NEW-JERSEY2.webp') }}" alt="">
        </div>
    </div> --}}

    <div data-aos="flip-down" class="pb-5" style="background-color: #F5F4F4">
        <div class="row justify-content-center align-items-center" style="padding-top: 50px">
            <div class="text-center">
                <p class="h2 heading-title">¿Necesita realizar un trámite de Notaría <br> en {{ $data['office'] }}?</p>
                <i><p class="font-family-montserrat" style="font-size: 15px"><b>¡Contáctenos!</b> Estamos seguros que podemos ayudarle</p></i>
            </div>
        </div>
        <div class="row">
            <hr>
            <a class="btn btn-warning rounded-pill" style="font-weight: bold" href="tel:{{$data['telfHidden']}}"><i style="color: #000000" class="fas fa-phone"></i> <i>LLAMAR <br> {{$data['telfShow']}}</i> </a>
            <hr>
        </div>
    </div>

    {{-- <div style="background-color: rgb(245, 244, 244); padding-bottom:50px">
        <h2 class="text-center mt-5" style="padding-top: 30px; font-size: 25px; font-weight: bold">Servicios adicionales de Notaría Pública</h2>
        <div class="container">
            <div class="row justify-content-center">
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90%">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'travel-authorization-en-'.Str::slug($data['office'])) }}">
                        <div class="grow border add-services" style="padding:25px; border-radius: 10px; height: 100%">
                            <img style="width: 50px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-08.webp') }}" alt="">
                            <h3 style="font-size: 15px" class="mt-2">Travel Authorization</h3>
                        </div>
                    </a>  
                </div>
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90%;">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'certificaciones-en-'.Str::slug($data['office'])) }}">
                        <div class="grow border add-services" style="padding:25px; border-radius: 10px; height: 100%">
                            <img style="width: 40px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-09.webp') }}" alt="">
                            <h3 style="font-size: 15px" class="mt-2">Certificaciones</h3>
                        </div>
                    </a>
                </div>    
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90%">
                    <a style="text-decoration: none; color: #000000"  href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'acuerdos-en-'.Str::slug($data['office'])) }}">
                        <div class="grow border add-services" style="padding: 25px; border-radius: 10px; height: 100%">
                            <img style="width: 50px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-10.webp') }}" alt="">
                            <h3 style="font-size: 15px" class="mt-2">Acuerdos</h3>
                        </div>
                    </a>
                </div>
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90%">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'cartas-de-invitacion-en-'.Str::slug($data['office'])) }}">
                        <div class="grow border add-services" style="padding: 25px; border-radius: 10px; height: 100%">
                            <img style="width: 50px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-11.webp') }}" alt="">
                            <h3 style="font-size: 15px" class="mt-2">Cartas de Invitación</h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90px">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'revocatorias-en-'.Str::slug($data['office'])) }}">
                        <div class="grow border add-services" style="padding: 25px; border-radius: 10px">
                            <img style="width: 50px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-12.webp') }}" alt="">
                            <h3 style="font-size: 15px" class="mt-2">Revocatorias</h3>
                        </div>
                    </a>
                </div>
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90px">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'contratos-en-'.Str::slug($data['office'])) }}">
                        <div class="grow border add-services" style="padding: 25px; border-radius: 10px">
                            <img style="width: 50px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-13.webp') }}" alt="">
                            <h3 style="font-size: 15px" class="mt-2">Contratos</h3>
                        </div>
                    </a>
                </div>
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90px">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'testamentos-en-'.Str::slug($data['office'])) }}">
                        <div class="grow border add-services" style="padding: 25px; border-radius: 10px">
                            <img style="width: 50px; height: 50px" class="img-fluid lazy" data-src="{{ asset('img/oficinas/ICONOS-14.webp') }}" alt="">
                            <h3 style="font-size: 15px" class="mt-2">Testamentos</h3>
                        </div>
                    </a>
                </div>
                <div data-aos="flip-left" class="col-6 col-sm-3 text-center mt-4" style="width: 90px">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), Str::lower(Str::slug($data['txtgrid'])).'-en-'.Str::slug($data['office'])) }}"">
                        <div class="grow border add-services" style="padding: 25px; border-radius: 10px">
                            <img style="width: 50px; height: 50px; filter: brightness(0.85) saturate(85%);" class="img-fluid lazy" data-src="{{ asset($data['imggrid']) }}" alt="">
                            <h3 style="font-size: 15px" class="mt-2">{{ $data['txtgrid'] }}</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    
    </div> --}}

    <div class="row">
        <div class="col-sm-6 fifth-row text-center" style="padding-top: 3%; padding-bottom: 4%">
            <p class="h2" style="font-weight: bold"><i>{{ Str::upper($data['title']) }}</i></p>
            <p>{{ $data['subtitle'] }}!</p>
            <p class="text-muted" style="margin-left: 10%; margin-right: 10%">Apostille actas de nacimiento, actas de matrimonio, certificados, poderes, traducciones, diplomas, contratos, testamentos</p>
        </div>
        <div class="col-sm-6">
            <img @if($data['office'] == "New York" || $data['office'] == "New Jersey") class="float-right lazy" @endif id="imgrowapostille" style="width: {{$data['widthimgdown']}}; height: {{$data['heightimgdown']}}; padding-top: {{$data['paddingtop']}}" class="img-fluid lazy" data-src="{{$data['imgdown']}}" alt="Notaria Latina en {{$data['office']}}">
        </div>
    </div>

    <section data-aos="zoom-in" id="iniciarTramite" class="row quienes-somos text-white m-0">  
        <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 pb-5 px-3 mx-auto">
            <div class="card-body text-center">  
              <p class="font-italic font-weight-bold h2">Solicitar Tramite</p>      
              <small> Envíe el formulario y un asesor le contactará breve. </small>     
              <form method="POST" action="{{route('send.email.oficinas')}}">
                  @csrf
                <input type="hidden" id="interest" name="interest" value="Oficina {{$data['office']}}">
                <div class="d-flex pt-4">
                    <div class="form-group w-100 mr-1">
                      <input id="aaa" name="aaa" type="text" class="form-control" placeholder="Nombre"  maxlength="40" minlength="2" autocomplete="off" required>
                    </div>
                    <div class="form-group w-100 ml-1">
                        <input id="lastname" name="lastname" type="text" class="form-control" placeholder="Apellido" minlength="2" maxlength="40" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Correo electrónico" required>
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
                    <select name="service" id="service" class="form-control" required>
                        <option value="">Seleccione el trámite a realizar</option>
                        <option value="Apostilla">Apostilla</option>
                        <option value="Poder Notariado">Poder Notariado</option>
                        <option value="Traduccion">Traduccion</option>
                        <option value="Affidavit">Affidavit</option>
                        <option value="Acuerdos">Acuerdos</option>
                        <option value="Autorizaciones de Viaje">Autorizaciones de Viaje</option>
                        <option value="Cartas de Invitación">Cartas de Invitación</option>
                        <option value="Certificaciones">Certificaciones</option>
                        <option value="Contratos">Contratos</option>
                        <option value="Revocatorias">Revocatorias</option>
                        <option value="Testamentos">Testamentos</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>

                <div class="form-group">
                  <input id="ddd" name="ddd" type="text" class="form-control" placeholder="Mensaje"  maxlength="100" autocomplete="off" required>
                </div>
                <input type="hidden" style="font-size: 10px" placeholder="Si puede ver este campo, por favor ignórelo" name="aux" class="form-control" readonly>  
                <button class="btn btn-lg btn-warning btn-block" type="submit">INICIAR TRAMITE</button>
              </form>
            </div> 
        </div>
  </section>

    <div class="row py-5">
        <div class="col-sm-2"></div>
        <div data-aos="flip-up" class="col-sm-8 border px-4 pt-5 pb-5 rounded text-center shadow">
            <p><i class="fas fa-map-marked-alt" style="color: #9C7D32"></i> Nuestra oficina se encuentra ubicada en <b style="color: #9C7D32">{{$data['address']}}, Estados Unidos</b>, donde le brindaremos la mejor asesoría notarial en sus trámites</p>
            {{-- <p class="font-weight-bold">¿Necesita ayuda para llegar?</p> --}}
            {{-- <a class="btn btn-warning" target="_blank" href="{{$data['urlindications']}}">Ver indicaciones <i class="fas fa-share text-dark"></i></a> --}}
        </div>
        <div class="col-sm-2"></div>
    </div>

    <div class="row">
        {{-- <a href="{{ $data['urlmap']}}" target="_blank">
            <img id="imgurlmap" style="width: 100%; height: 100%" class="lazy img-fluid" data-src="@if($isMobile) {{ asset($data['imgurlmapmobile']) }} @else {{ asset($data['imgurlmap']) }} @endif" alt="Apostillar Documentos en {{ $data['office'] }}">
        </a> --}}
        <iframe id="dirurlmap" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

  <div class="mt-5 checks">
      <h2 class="text-center">Servicios Adicionales</h2>
      <hr style="width: 10%; border: 1px solid #000000">
      <h3 class="text-center" style="font-size:25px">Documentos que requieren una apostilla en {{ $data['office'] }}</h3>
      <p style="padding-left: 15%; font-size: 18px; margin-top: 15px">Documentos Personales</p>
      <div class="row" style="padding-left:15%; padding-right:15%;">
        <div class="col-12 col-sm-3">
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-de-nacimiento-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de nacimiento</p>
            </a>
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-reporte-consular-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Reporte Consular CRBA nacidos en el extranjero</p>
            </a>
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-de-matrimonio-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de matrimonio</p>
            </a>
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-de-defuncion-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de defunción</p>
            </a>
        </div>
        <div class="col-12 col-sm-3">
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-de-divorcio-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de divorcio</p>
            </a>
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-de-naturalizacion-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificado de naturalización</p>
            </a>
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-expediente-de-adopcion-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Expediente de adopción</p>
            </a>
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-copia-de-pasaporte-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Copia de un pasaporte</p>
            </a>
        </div>
        <div class="col-12 col-sm-3">
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-copia-de-licencia-de-conducir-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Copia de licencia de conducir</p>
            </a>
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-escrituras-testamentos-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Escrituras y testamentos</p>
            </a>
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-declaraciones-juradas-de-estado-unico-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Declaraciones juradas de estado único</p>
            </a>
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-titulo-de-automovil-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Título de coche/automóvil</p> 
            </a>
        </div>
        <div class="col-12 col-sm-3">
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-autorizacion-de-viaje-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Autorizaciones de viaje</p>
            </a>
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-poder-notarial-personal-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Poder notarial personal</p>
            </a>
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-registro-de-policia-estatal-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Registros de la policía estatal</p>
            </a>
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-registro-de-antecedentes-fbi-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Registros de antecedentes del FBI</p> 
            </a>
        </div>
      </div>

      <p style="padding-left: 15%; font-size: 18px; margin-top: 10px">Documentos Académicos</p>
      <div class="row" style="padding-left:15%; padding-right:15%;">
        <div class="col-12 col-sm-3">
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-diploma-universitario-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Diplomas Universitarios</p>
            </a>
        </div>
        <div class="col-12 col-sm-3">
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-transcripcion-universitaria-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Transcripciones universitarias</p>
            </a>
        </div>
        <div class="col-12 col-sm-3">
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-diploma-de-escuela-secundaria-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Diplomas de escuela secundaria</p>
            </a>
        </div>
        <div class="col-12 col-sm-3">
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-transcripcion-de-escuela-secundaria-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Transcripciones de escuela secundaria</p>
            </a>
        </div>
      </div>

      <p style="padding-left: 15%; font-size: 18px; margin-top: 10px">Documentos Corporativos</p>
      <div class="row" style="padding-left:15%; padding-right:15%;">
        <div class="col-12 col-sm-3">
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-de-incorporacion-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de incorporación</p>
            </a>
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-de-buena-reputacion-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de buena reputación</p>
            </a>
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-de-origen-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de origen</p>
            </a>
        </div>
        <div class="col-12 col-sm-3">
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-marca-patente-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Marcas / Patentes</p>
            </a>
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-poder-comercial-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Poder comercial</p>
            </a>
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-declaracion-jurada-comercial-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Declaración jurada comercial</p>
            </a>
        </div>
        <div class="col-12 col-sm-3">
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-fda-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados FDA</p>
            </a>
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-facturas-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Facturas</p>
            </a>
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-departamento-de-hacienda-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Departamento de hacienda [Formulario 6166]</p>
            </a>
        </div>
        <div class="col-12 col-sm-3">
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-de-gobierno-extranjero-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificado de gobierno extranjero</p>
            </a>
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-certificado-de-venta-gratis-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de venta gratis</p>
            </a>
            <a href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-ordenes-de-compra-'.Str::slug($data['office'])) }}">
                <p style="font-size: 13px"><i class="fas fa-check"></i> Órdenes de compra</p>
            </a>
        </div>
      </div>
  </div>

  <section style="background-color: #F5F4F4" class="pt-2 mt-5">
    <div class="container text-center mt-3 mb-4">
      <p class="mt-5 mb-5 h2">Lo que opinan nuestros clientes</p>
      <div class="row justify-content-center">
        @foreach ($data['reviews'] as $review)
          <div class="col-sm-4 d-flex justify-content-center mb-3">
            <div data-aos="fade-up" class="card card-reviews" style="width: 18rem; height: 100%; background-color: #F5F4F4">
              <div class="card-body text-center">
                <p class="card-title h5">{{ $review['name'] }}</p>
                <p class="card-subtitle mb-2 text-muted d-flex justify-content-center h6">
                  @for ($i = 0; $i < $review['stars']; $i++)
                    <img width="15" height="15" data-src="{{ asset('img/estrella.webp') }}" class="lazy img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="⭐">
                  @endfor
                </p>
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

  {{-- <div>
    <div class="text-center font-weight-bold p-5">
        <p class="h5"><i>Como Notaría autorizada en {{$data['office']}}, estamos aquí para ayudarlo en todas sus necesidades de notarización de documentos</i></p>
    </div>
    <div class="text-center pt-5">
        <h2>¿Por qué es importante notarizar un documento?</h2>
        <div class="row mx-4 py-5">
            <div class="col-sm-4 my-1" data-aos="zoom-in">
                <div class="border shadow-sm p-5 h-100">
                    <img width="100px" height="100px" src="{{asset('img/oficinas/convenio.png')}}" alt="notarizar documentos">
                    <p class="mt-4">Un documento notarizado puede ser requerido por una variedad de situaciones legales, financieras o personales.</p>
                </div>
            </div>
            <div class="col-sm-4 my-1" data-aos="zoom-in">
                <div class="border shadow-sm p-5 h-100">
                    <img width="100px" height="100px" src="{{asset('img/oficinas/tutor.png')}}" alt="notarizar un documento">
                    <p class="mt-4">Mediante la notarización de documentos se verifica la identidad del firmante del documento por medio de un Notario</p>
                </div>
            </div>
            <div class="col-sm-4 my-1" data-aos="zoom-in">
                <div class="border shadow-sm p-5 h-100">
                    <img width="100px" height="100px" src="{{asset('img/oficinas/document.png')}}" alt="notarizar documento {{$data['office']}}">
                    <p class="mt-4">Es una constancia que el firmante ha firmado el documento de manera voluntaria y bajo su propio libre albedrío</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}
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
            //document.getElementById('sectionthree').style.backgroundImage = "url('{{url('img/oficinas/BANNER-NEGRO.webp')}}')";
            //setImageUrlByViewport();
        });

        setTimeout(() => {
            document.getElementById('dirurlmap').src = "{{$data['urlmap']}}";
        }, 3000);

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