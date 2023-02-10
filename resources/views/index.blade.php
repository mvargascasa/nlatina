@extends('layouts.web')

@section('header')
<?php
    $mobile = false; 
    if(isset($_SERVER['HTTP_USER_AGENT'])){
        $useragent= $_SERVER['HTTP_USER_AGENT'];
        $ismobile=preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|zh-cn|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4));
        if($ismobile) $mobile = true; 
    }
?>
    <title>Notaría Latina - Notario Público en Queens New York</title>
    <meta name="description" content="Notaría Latina - Notario Público en Queens New York. Gestión en Línea en todo EE.UU. Poderes, Apostillas, Traducciones, Autorizaciones de Viaje, Affidavit."/>
    <meta name="keywords" content="notaria latina, notarialatina, notaria americana, notaria estados unidos, apostillas, carta poder, notario, notario publico, notario publico estados unidos, notario publico new york, notario publico queens new york, notario publico cerca de mi, notaria en new york, notaria queens, notaria latina queens, notaria en queens new york, notario en queens new york, notary public in queens new york, notaria cerca de mi, notario cerca de mi, notarizar documentos en new york, notarizar documentos en queens new york, apostillar documentos en new york, poderes en queens new york, servicios notariales estados unidos, servicios notariales, notaria en estados unidos, notarizar documentos, notarizar documentos en estados unidos, apostillar near me, apostillar un documento, apostillar un documento en estados unidos, apostillar documentos en new york, carta poder apostillada, traduccion de un documento, traduccion de un documento en estados unidos, traduccion de documentos cerca de mi" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:url"                content="{{route('web.index')}}" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Notaría Latina - Notario Público en Queens New York." />
    <meta property="og:description"        content="Gestión en Línea en todo EE.UU. Poderes, Apostillas, Traducciones, Autorizaciones de Viaje, Affidavit." />
    <meta property="og:image"              content="{{asset('img/IMG-NOTARIA-02.jpg')}}" />
    
    <meta name="google-site-verification" content="dJnD6aMr-q5ldI-YRk2UM1KC0A8GEBUok__9ZpS0CiQ" />

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

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

    <style>
      @media screen and (max-width: 580px){
        #titleTraducciones{
          margin-bottom: 15% !important;
        }
        #titleApostillas{
          margin-bottom: 15% !important;
        }
        #locations{
          margin-left: 0% !important;
          margin-right: 0% !important;
        }
        .child-locations{
          margin-top: 5% !important;
          border: none !important;
        }
      }

      .child-locations{
        background: linear-gradient(to left, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0), #122944, #122944);
        background-position: right bottom;
        background-size: 400% 100%;
        transition: all 0.7s ease-out;
        transition-timing-function: linear;
      }
      
      .child-locations:hover{
        background-position: left bottom;
        opacity: 0.8;
      }

      .underline{
        position: relative;
      }

      .underline::before{
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        width: 0;
        height: 2px;
        background-color: #ffffff;
        transition: width 0.6s cubic-bezier(0.25, 1, 0.5, 1);
      }

      @media (hover: hover) and (pointer: fine) {
        .underline:hover::before{
          left: 0;
          right: auto;
          width: 100%;
        }
      }
    </style>
@endsection
@section('phoneNumberHidden', '+18007428602')
@section('phoneNumber', '800-742-8602')

@section('content')



<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="1000">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active"  style="background:rgba(2, 2, 2, 0.5);">
          <img data-src="{{asset('img/5.webp')}}" class="lazy d-block w-100" alt="..." 
          style="height: 550px;object-fit: cover; object-position: left top;">
          <div class="carousel-caption">
            <div>
              <h1 class="tit-not">Notaría Pública</h1>
              <p class="heading-title h2" style="margin-bottom: @if(!$mobile) 6% @else 2% @endif">Gestión Fácil y Rápida</p>
              <div id="locations" class="row" style="margin-left: 10%; margin-right: 10%; margin-bottom: 7%">
                <div id="div2" class="col-sm-4 @if(!$mobile) border-right @endif">
                  <div class="child-locations mb-2 rounded-pill">
                    <i class="fas fa-map-marker-alt"><a class="underline" style="color: #ffffff; text-decoration: none; font-size: 20px" href="{{ route('web.oficina.newjersey') }}"></i> Oficinas New Jersey</a>
                  </div>
                  <div class="d-flex justify-content-center">
                    <a href="https://api.whatsapp.com/send?phone=19088009046" class="text-white">
                      <div class="text-center">
                        <i class="fab fa-whatsapp bg-success rounded-circle" style="font-size: 30px"></i>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-4 @if(!$mobile) border-left border-right @endif">
                  <div class="child-locations mb-2 rounded-pill">
                    <i class="fas fa-map-marker-alt"><a class="underline" style="color: #ffffff; text-decoration: none; font-size: 20px" href="{{ route('web.oficina.newyork') }}"></i> Oficinas New York</a>
                  </div>
                  <div class="d-flex justify-content-center">
                    <a href="https://api.whatsapp.com/send?phone=13479739888" class="text-white">
                      <div class="text-center">
                        <i class="fab fa-whatsapp bg-success rounded-circle" style="font-size: 30px"></i>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-4 @if(!$mobile) border-left @endif">
                  <div class="child-locations mb-2 rounded-pill">
                    <i class="fas fa-map-marker-alt"><a class="underline" style="color: #ffffff; text-decoration: none; font-size: 20px" href="{{ route('web.oficina.florida') }}"></i> Oficinas Florida</a>
                  </div>
                  <div class="d-flex justify-content-center">
                    <a href="https://api.whatsapp.com/send?phone=13056003290" class="text-white">
                      <div class="text-center">
                        <i class="fab fa-whatsapp bg-success rounded-circle" style="font-size: 30px"></i>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
              {{-- <h5 class="heading-title">Notarizamos Documentos</h5> --}}
              {{-- <hr width="200" style="border-color: #fff"> --}}
              {{-- href="javascript:void(0)" --}}
              <button class="btn btn-warning btn-lg button" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</button>
          </div>
        </div>

{{-- @if(!$mobile) --}}
        <div class="carousel-item"  style="background:rgba(2, 2, 2, 0.5);">
          <img data-src="{{asset('img/2.webp')}}" class="lazy d-block w-100" alt="..." 
          style="height: 550px;object-fit: cover; object-position: left bottom;">
          <div class="carousel-caption">
            <div>
              <p id="titleTraducciones" class="tit-not h1" style="margin-bottom: 7%">TRADUCCIONES</p>
              <div id="locations" class="row" style="margin-left: 11%; margin-right: 10%; margin-bottom: 7%">
                <div class="col-sm-4 @if(!$mobile) border-right @endif">
                  <div class="child-locations mb-2 rounded-pill">
                    <i class="fas fa-map-marker-alt"><a class="underline" style="color: #ffffff; text-decoration: none; font-size: 20px" href="{{ route('web.oficina.newjersey') }}"></i> Oficinas New Jersey</a>
                  </div>
                  <div class="d-flex justify-content-center">
                    <a href="https://api.whatsapp.com/send?phone=19088009046" class="text-white">
                      <div class="text-center">
                        <i class="fab fa-whatsapp bg-success rounded-circle" style="font-size: 30px"></i>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-4 @if(!$mobile) border-left border-right @endif">
                  <div class="child-locations mb-2 rounded-pill">
                    <i class="fas fa-map-marker-alt"><a class="underline" style="color: #ffffff; text-decoration: none; font-size: 20px" href="{{ route('web.oficina.newyork') }}"></i> Oficinas New York</a>
                  </div>
                  <div class="d-flex justify-content-center">
                    <a href="https://api.whatsapp.com/send?phone=13479739888" class="text-white">
                      <div class="text-center">
                        <i class="fab fa-whatsapp bg-success rounded-circle" style="font-size: 30px"></i>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-4 @if(!$mobile) border-left @endif">
                  <div class="child-locations mb-2 rounded-pill">
                    <i class="fas fa-map-marker-alt"><a class="underline" style="color: #ffffff; text-decoration: none; font-size: 20px" href="{{ route('web.oficina.florida') }}"></i> Oficinas Florida</a>
                  </div>
                  <div class="d-flex justify-content-center">
                    <a href="https://api.whatsapp.com/send?phone=13056003290" class="text-white">
                      <div class="text-center">
                        <i class="fab fa-whatsapp bg-success rounded-circle" style="font-size: 30px"></i>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              {{-- <hr width="200" style="border-color: #fff"> --}}
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#exampleModal">INICIAR TRAMITE</a>

            </div>
          </div>
        </div>
        <div class="carousel-item"  style="background:rgba(2, 2, 2, 0.5);">
          <img data-src="{{asset('img/3.webp')}}" class="lazy d-block w-100" alt="..." 
          style="height: 550px;object-fit: cover; object-position: left top;">
          <div class="carousel-caption">
              <p id="titleApostillas" class="tit-not h1" style="margin-bottom: 7%">APOSTILLAS</p>
              <div id="locations" class="row" style="margin-left: 10%; margin-right: 10%; margin-bottom: 7%">
                <div class="col-sm-4 @if(!$mobile) border-right @endif">
                  <div class="child-locations mb-2 rounded-pill">
                    <i class="fas fa-map-marker-alt"><a class="underline" style="color: #ffffff; text-decoration: none; font-size: 20px" href="{{ route('web.oficina.newjersey') }}"></i> Oficinas New Jersey</a>
                  </div>
                  <div class="d-flex justify-content-center">
                    <a href="https://api.whatsapp.com/send?phone=19088009046" class="text-white">
                      <div class="text-center">
                        <i class="fab fa-whatsapp bg-success rounded-circle" style="font-size: 30px"></i>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-4 @if(!$mobile) border-left border-right @endif">
                  <div class="child-locations mb-2 rounded-pill">
                    <i class="fas fa-map-marker-alt"><a class="underline" style="color: #ffffff; text-decoration: none; font-size: 20px" href="{{ route('web.oficina.newyork') }}"></i> Oficinas New York</a>
                  </div>
                  <div class="d-flex justify-content-center">
                    <a href="https://api.whatsapp.com/send?phone=13479739888" class="text-white">
                      <div class="text-center">
                        <i class="fab fa-whatsapp bg-success rounded-circle" style="font-size: 30px"></i>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-4 @if(!$mobile) border-left @endif">
                  <div class="child-locations mb-2 rounded-pill">
                    <i class="fas fa-map-marker-alt"><a class="underline" style="color: #ffffff; text-decoration: none; font-size: 20px" href="{{ route('web.oficina.florida') }}"></i> Oficinas Florida</a>
                  </div>
                  <div class="d-flex justify-content-center">
                    <a href="https://api.whatsapp.com/send?phone=13056003290" class="text-white">
                      <div class="text-center">
                        <i class="fab fa-whatsapp bg-success rounded-circle" style="font-size: 30px"></i>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              {{-- <hr width="200" style="border-color: #fff"> --}}
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>
        </div>
        <div class="carousel-item"  style="background:rgba(2, 2, 2, 0.5);">
          <img data-src="{{asset('img/4.webp')}}" class="lazy d-block w-100" alt="..." 
          style="height: 550px;object-fit: cover; object-position: left bottom;">
          <div class="carousel-caption">
              <p class="tit-not h1" style="margin-bottom: @if(!$mobile) 7% @else 2% @endif">PODERES GENERALES Y ESPECIALES</p>
              <div id="locations" class="row" style="margin-left: 10%; margin-right: 10%; margin-bottom: 7%">
                <div class="col-sm-4 @if(!$mobile) border-right @endif">
                  <div class="child-locations mb-2 rounded-pill">
                    <i class="fas fa-map-marker-alt"><a class="underline" style="color: #ffffff; text-decoration: none; font-size: 20px" href="{{ route('web.oficina.newjersey') }}"></i> Oficinas New Jersey</a>
                  </div>
                  <div class="d-flex justify-content-center">
                    <a href="https://api.whatsapp.com/send?phone=19088009046" class="text-white">
                      <div class="text-center">
                        <i class="fab fa-whatsapp bg-success rounded-circle" style="font-size: 30px"></i>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-4 @if(!$mobile) border-left border-right @endif">
                  <div class="child-locations mb-2 rounded-pill">
                    <i class="fas fa-map-marker-alt"><a class="underline" style="color: #ffffff; text-decoration: none; font-size: 20px" href="{{ route('web.oficina.newyork') }}"></i> Oficinas New York</a>
                  </div>
                  <div class="d-flex justify-content-center">
                    <a href="https://api.whatsapp.com/send?phone=13479739888" class="text-white">
                      <div class="text-center">
                        <i class="fab fa-whatsapp bg-success rounded-circle" style="font-size: 30px"></i>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-sm-4 @if(!$mobile) border-left @endif">
                  <div class="child-locations mb-2 rounded-pill">
                    <i class="fas fa-map-marker-alt"><a class="underline" style="color: #ffffff; text-decoration: none; font-size: 20px" href="{{ route('web.oficina.florida') }}"></i> Oficinas Florida</a>
                  </div>
                  <div class="d-flex justify-content-center">
                    <a href="https://api.whatsapp.com/send?phone=13056003290" class="text-white">
                      <div class="text-center">
                        <i class="fab fa-whatsapp bg-success rounded-circle" style="font-size: 30px"></i>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              {{-- <hr width="200" style="border-color: #fff"> --}}
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>
        </div>
{{-- @endif --}}

    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
  </div>

  <div class="p-2" style=" position: absolute;right: 20px;top: 80px;z-index: 999">
    <a class="text-warning h5" href="tel:+18007428602" style="font-weight: bols;" onclick="gtag_report_conversion('tel:+18007428602');gtag('event', 'click', { 'event_category': 'Seguimiento de llamadas', 'event_label': 'HomePage:{{Request::segment(1)}}', 'value': '0'});">
        <i class="fa fa-phone-square-alt"></i> 800-742-8602
    </a>
</div>

<div style="background-color: #333">
    <div class="container" >
        <div class="row text-white">
            <div class="col-12 col-sm-6 p-4 my-2">
                <span class="text-muted font-weight-bold">¿Por qué elegirnos?</span> <br><br>
                <p class="heading-title pb-4 h3">Brindamos el mejor servicio y asesoramiento a latinos en Estados Unidos.</p>
                <hr class="hrwf">
                <img id="imgdoc" class="lazy mx-4" data-src="{{asset('img/docverify-approved-enotary-small.webp')}}" width="60" height="80" alt="">
                <img id="imgnna" class="lazy mx-4" data-src="{{asset('img/national-notary-association.webp')}}" width="190" height="80" alt="">
            </div>
            <div class="col-12 col-sm-6 p-4 my-4  d-flex align-items-center">


                <span style="font-size:18px; text-indent: 40px;">
                  Somos una notaría autorizada, para autenticar documentos en Estados Unidos, por medio de una Apostilla. Nuestro servicio es realizado bajo normas y reglas estrictamente legales, para que su trabajo sea entregado con la mayor prontitud y satisfacción.
                  <br><br>
                  Brindamos servicios notariales para toda Latinoamérica desde los Estados Unidos.</span>
            </div>
        </div>
    </div>
</div>


<div class="container">
  {{-- <div class="row py-4">
      <div class="col-12 text-center py-4">
          <h2 class="tit-not">Nuestros Servicios</h2>
          <hr class="hrb">
        </div>
      <div class="col-12 col-sm-12 col-md-4">
        <a style="text-decoration: none" href="{{route('web.apostillas')}}">
          <div class="serviceBox">
              <h3 class="title">Apostillas</h3>
              <div class="service-icon">
                  <img class="lazy pt-3" data-src="{{asset('img/apostillas.png')}}" width="50" height="65" alt="Apostillas - Notaria Latina">
              </div>
              <p class="description">
                Autentificamos sus documentos solicitados por entidades de otro país diferente al originario mediante la apostilla de los mismos.
              </p>
            </div>
          </a>
      </div>

      <div class="col-12 col-sm-12 col-md-4">
        <a style="text-decoration: none" href="{{route('web.poderes')}}">
          <div class="serviceBox">
              <h3 class="title">Poderes</h3>
              <div class="service-icon">
                  <img class="lazy pt-4" data-src="{{asset('img/poderes.png')}}" width="40" height="65" alt="Poderes - Notaria Latina">
              </div>
              <p class="description">
                Gestione sus trámites legales sin estar presente por medio de un apoderado de confianza, una solución para gestionar bienes y trámites importantes.
              </p>
            </div>
          </a>
      </div>

      <div class="col-12 col-sm-12 col-md-4">
        <a style="text-decoration: none" href="{{route('web.traducciones')}}">
          <div class="serviceBox">
              <h3 class="title">Traducciones</h3>
              <div class="service-icon">
                  <img class="lazy pt-4" data-src="{{asset('img/traducciones.png')}}" width="40" height="70" alt="Traducciones - Notaria Latina">
              </div>
              <p class="description">
                Transcripción de documentos de un idioma a otro diferente, certificados por un notario para ser presentados frente a las entidades que lo soliciten.
              </p>
            </div>
          </a>
      </div>

  </div> --}}

  {{-- div de oficinas --}}
  <div class="row py-4">
    <div class="col-12 text-center py-4">
        <h2 class="tit-not">Visite Nuestras Oficinas</h2>
        <hr class="hrb">
      </div>
    <div class="col-12 col-sm-12 col-md-4 mb-3">
        <a style="text-decoration: none" href="{{ route('web.oficina.newjersey') }}">
        <div class="serviceBox h-100">
            <h3 class="title">New Jersey</h3>
            <div>
              {{-- <a href="{{route('web.oficina.newjersey')}}"> --}}
                <img class="lazy img-fluid rounded" data-src="{{asset('img/oficinas/oficina-new-jersey-notaria-latina.jpg')}}"  alt="Apostillas - Notaria Latina">
              {{-- </a> --}}
            </div>
            <div>
              {{-- <p class="description mt-4">
                Gestione sus trámites notariales en New York. 
              </p> --}}
              <a href="https://g.page/r/CVNRV-zNuJiZEAE">
                <p class="description mt-4"><i class="fas fa-map-marker-alt"></i> 1146 East Jersey St Elizabeth, NJ 07201</p>
              </a>
              <a class="btn btn-danger btn-block" href="tel:+19088009046"><i class="fas fa-phone"></i> Llamar ahora</a>
            </div>
          </div>
          </a>
    </div>

    <div class="col-12 col-sm-12 col-md-4 mb-3">
      <a style="text-decoration: none" href="{{ route('web.oficina.newyork') }}">
        <div class="serviceBox h-100">
            <h3 class="title">New York</h3>
            <div>
              {{-- <a href="{{route('web.oficina.newyork')}}"> --}}
                <img class="lazy img-fluid rounded" data-src="{{asset('img/oficinas/oficina-new-york-notaria-latina.jpg')}}" alt="Poderes - Notaria Latina">
              {{-- </a> --}}
            </div>
            <div>
              {{-- <p class="description mt-4">
                Gestione sus trámites notariales en New Jersey
              </p> --}}
              <a href="https://g.page/notariapublicalatina">
                <p class="description mt-4"><i class="fas fa-map-marker-alt"></i> 67-03 Roosevelt Avenue, Woodside, NY 11377</p>
              </a>
              <a class="btn btn-danger btn-block" href="tel:+13479739888"><i class="fas fa-phone"></i> Llamar ahora</a> 
            </div>
          </div>
        </a>
    </div>

    <div class="col-12 col-sm-12 col-md-4 mb-3">
      <a style="text-decoration: none" href="{{ route('web.oficina.florida') }}">
        <div class="serviceBox h-100">
            <h3 class="title">Florida</h3>
            <div>
                <img class="lazy img-fluid rounded" data-src="{{asset('img/oficinas/oficina-florida-notaria-latina.jpg')}}" alt="Traducciones - Notaria Latina">
            </div>
            <div>
              {{-- <p class="description mt-4">
                Gestione sus trámites notariales en Florida
              </p> --}}
              <a href="https://g.page/r/CeRrwPx_W2-xEAE">
                <p class="description mt-4"><i class="fas fa-map-marker-alt"></i> 2104 N University Dr, Sunrise, FL 33322</p>
              </a>
              <a class="btn btn-danger btn-block" href="tel:+13056003290"><i class="fas fa-phone"></i> Llamar ahora</a>
            </div>
          </div>
        </a>
    </div>

</div>
{{-- termina div oficinas --}}
<hr>
<div class="row rounded py-5">
  <div class="text-center w-100">
    <h3 class="tit-not">¿Qué nos hace diferentes?</h3>
  </div>
  <div class="row mt-4 mx-1">
    <div data-aos="fade-up" class="col-sm-4 text-center my-3 pt-3 @if(!$mobile) border-right @endif">
      <div>
        <i class="fas fa-calendar-alt fa-2x text-danger"></i>
        <p class="tit-not mt-2">Tenemos una gran trayectoria dentro del campo notarial</p>
      </div>
    </div>
    <div data-aos="fade-up" class="col-sm-4 text-center my-3 pt-3 @if(!$mobile) border-left border-right @endif">
      <div>
        <i class="fas fa-university fa-2x text-danger"></i>
        <p class="tit-not mt-2">Contamos con personal capacitado para atender el trámite que necesite</p>
      </div>
    </div>
    <div data-aos="fade-up" class="col-sm-4 text-center my-3 pt-3 @if(!$mobile) border-left @endif">
      <div>
        <i class="fas fa-users fa-2x text-danger"></i>
        <p class="tit-not mt-2">Hemos ayudado a una gran cantidad de clientes</p>
      </div>
    </div>
  </div>
</div>

<hr>
<div data-aos="flip-right" style="background-color: rgb(235, 235, 235)" class="row text-center py-5 mt-5">
  <div class="w-100">
    <h3 class="tit-not">¿Tiene alguna pregunta?</h3>
    <p>No dude en contactarnos y uno de nuestros asesores lo ayudará</p>
    <a class="btn btn-dark rounded-0" href="{{route('web.contactenos')}}">Contactarme</a>
  </div>
</div>

@isset($indexPosts)

<div class="container">
    <div class="row py-4">
        <div class="col-12 text-center py-4"><hr>
            <h2 class="tit-not mt-5">Publicaciones de Interes</h2>
            <hr class="hrb">
          </div>
          @foreach ($indexPosts as $post)
                <div class="col-12 col-md-6">
                    <a href="{{route('post.slug',$post->slug)}}" style="text-decoration: none">
                      <div class="card my-2 shadow-sm">
                            <div class="card-body p-2" style="position:relative;">
                              <span class="d-block font-weight-bold text-truncate " style="font-size:1rem;color:#122944">{{$post->name}}</span>
                              <span class="d-block text-muted text-truncate"><?php echo strip_tags(substr($post->body,0,100))  ?></span>
                              <div class="small text-muted float-left">
                                <a href="{{route('post.slug',$post->slug)}}">{{$post->created_at->format('M d')}}</a>
                              </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-12">
            <a href="{{route('post.blog')}}" style="color:#122944">Ver más Publicaciones</a>
            </div>
    </div>

</div>
@endisset

{{-- <hr class="hrb mb-4 mt-5">
<div class="row mt-5 d-inline">
  <div class="d-flex justify-content-center mb-4">
    <h3 class="tit-not">También puede buscarnos en nuestras redes sociales</h3>
  </div>
  <div class="fb-page mt-3 w-auto" data-href="https://www.facebook.com/notariapublicalatina" data-tabs="timeline" data-width="" data-height="" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true" data-lazy="true"><blockquote cite="https://www.facebook.com/notariapublicalatina" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/notariapublicalatina">Notaría Pública Latina</a></blockquote></div>
</div> --}}

</div>

</div>

@section('numberWpp', '13479739888')

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-white" style="background-color: #333 !important;">
          <p class="modal-title h5" id="exampleModalLabel">Complete el siguiente formulario y en breve le contactamos.</p>
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

  {{-- <div id="fb-root"></div> --}}
@endsection



@section('script')
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
{{-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v16.0&appId=671843794640246&autoLogAppEvents=1" nonce="W0bUXQ4L"></script> --}}
<script>
    window.addEventListener('load', (event) => {
        //document.getElementById('prisection').style.backgroundImage = "url('img/inicio.jpg')";
        document.getElementById('imgdoc').src = "img/docverify-approved-enotary-small.webp";
        document.getElementById('imgnna').src = "img/national-notary-association.webp";
        AOS.init();
    });
    document.addEventListener("DOMContentLoaded",function(){var e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var n=new IntersectionObserver(function(e,t){e.forEach(function(e){if(e.isIntersecting){var t=e.target;t.src=t.dataset.src,t.classList.remove("lazy"),n.unobserve(t)}})});e.forEach(function(e){n.observe(e)})}else{var t;function r(){t&&clearTimeout(t),t=setTimeout(function(){var n=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+n&&(e.src=e.dataset.src,e.classList.remove("lazy"))}),0==e.length&&(document.removeEventListener("scroll",r),window.removeEventListener("resize",r),window.removeEventListener("orientationChange",r))},20)}e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)}});
    setTimeout(() => {
      $('.carousel').carousel({
        interval: 1000 * 4
      });
    }, 3000);
  </script>
@endsection

