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
    <meta name="description" content="Notario Público en Queens New York. Gestión en Línea en todo EE.UU. Poderes, Apostillas, Traducciones, Autorizaciones de Viaje, Affidavit. | Notaria Latina"/>
    <meta name="keywords" content="notaria latina, notaria latina cerca de mi, notario publico cerca de mi, notaria latina queens, notaria en queens new york, notario en queens new york, notaria cerca de mi, notario cerca de mi, servicios notariales estados unidos, notaria en estados unidos" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:url"                content="{{route('web.index')}}" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Notaría Latina - Notario Público en Queens New York." />
    <meta property="og:description"        content="Notario Público en Queens New York. Gestión en Línea en todo EE.UU. Poderes, Apostillas, Traducciones, Autorizaciones de Viaje, Affidavit. | Notaria Latina" />
    <meta property="og:image"              content="{{asset('img/IMG-NOTARIA-02.jpg')}}" />
    
    <meta name="google-site-verification" content="dJnD6aMr-q5ldI-YRk2UM1KC0A8GEBUok__9ZpS0CiQ" />

    {{-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> --}}

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
      }, 3200);
  
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
        #titleTraducciones{margin-bottom: 15% !important;}
        #titleApostillas{margin-bottom: 15% !important;}
        #locations{margin-left: 0% !important;margin-right: 0% !important;}
        .child-locations{margin-top: 5% !important;border: none !important;}
      }

      @media screen and (max-width: 1200px){.links-offices{font-size: 30px !important}}
      @media screen and (max-width: 1000px){}
      @media screen and (max-width: 800px){.links-offices{font-size: 25px !important;} .txt-gestion-facil{font-size: 15px !important;letter-spacing: 3px !important} .img-logo{width: 300px !important}.title-h1{font-size: 2.5rem !important}}
      @media screen and (max-width: 400px){.img-logo{width: 250px !important}.title-h1{font-size: 1.8rem !important}.img-header{height: 100vh !important}}

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
      .card:hover{box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px !important;}
      .rate {height: 46px;padding: 0 10px;}
      .rate:not(:checked) > input {position:absolute;top:-9999px;}
      .rate:not(:checked) > label {width:1em;overflow:hidden;white-space:nowrap;font-size:20px;color:#ffc700;}
      .rate:not(:checked) > label:before {content: '★ ';}
      .rate > input:checked ~ label {color: #ffc700;}
      .letter-color{color: #2B384D !important}
      .font-family-montserrat{font-family: 'Montserrat'}
      #carousel-thumbs {background: rgba(255,255,255,.3);bottom: 0;left: 0;padding: 0;right: 0;}
      #carousel-thumbs {border: 5px solid transparent;}
      #carousel-thumbs img:hover {border-color: rgba(255,255,255,.3);}
      #carousel-thumbs .selected img {border-color: #fff;}
      .carousel-control-prev-icon {background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='darkorange' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;}
      .carousel-control-next-icon {background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='darkorange' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;}
      .carousel-control-prev, .carousel-control-next {width: 100px;}
      .card-different:hover img{transform: scale(1.3); transition: transform 0.5s ease-in-out} #linkServices:hover .imgServices {filter: brightness(0) invert(1);} 
      /* @keyframes play {
        .serviceBox { background: red;}
      } */
      .changebgcolor {background-color: #122944;}
      .changetxtcolor{color: #ffffff !important}
      .changeimgcolor{filter: brightness(0) invert(1);}
      .card-hover:hover {border-bottom: .5rem solid #2B384D !important; box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px !important;}
    </style>
@endsection
@section('phoneNumberHidden', '+18007428602')
@section('phoneNumber', '800-742-8602')

@section('content')

<section>
    <section class="position-relative">
      <img class="img-header" src="{{ asset('img/notaria en estados unidos.webp') }}" alt="" style="height: 900px; width: 100%; object-fit: cover; object-position: center top;">
      <section class="position-absolute" style="top: 30%; left: 15%">
        <h1 class="title-h1" style="color: #122944; font-size: 3.5rem"><span style="font-weight: 400">Brindamos servicios <br> notariales para toda</span> <br><span style="font-weight: 700">Latinoamerica desde <br> los Estados Unidos</span></h1>
        <button class="btn rounded-pill px-5 mt-4" style="background-color: #FFBE32; color: #122944; font-weight: 700; font-size: 1.2rem" data-toggle="modal" data-target="#exampleModal">INICIAR TRÁMITE</button>
      </section>
    </section>
</section>

<section class="text-white" style="background-color: #122944">
  <section class="container">
    <div class="row p-5">
      <div class="col-sm-12 col-md-6 py-3">
        <div class="d-flex">
          <p class="mr-3" style="font-size: .9rem">SOBRE NOSOTROS</p><div style="width: 40%; height: 3px; background-color: #FFB832; margin-top: 10px"></div>
        </div>
        <h2 style="font-size: 2.5rem"><span style="font-weight: 100">Bienvenido/a a</span> <br> <span style="font-weight: 500">Notaría Pública <br> Latina</span></h2>
      </div>
      <div class="col-sm-12 col-md-6 py-3 text-justify">
        <p>Somos una notaría autorizada, para autenticar documentos en Estados Unidos, por medio de una Apostilla. Nuestro servicio es realizado bajo normas y reglas estrictamente legales, para que su trabajo sea entregado con la mayor prontitud y satisfacción.</p>
        <p style="font-weight: 500">Brindamos servicios notariales para toda Latinoamérica desde los Estados Unidos</p>
        <a class="btn btn-sm rounded-pill px-4" style="background-color: #FFB832; color: #122944; font-weight: 600" href="{{ route('web.nosotros') }}">LEER MÁS</a>
      </div>
    </div>
  </section>
</section>

<section class="pt-5 pb-5" id="services_section" style="background-size: cover; background-position: center; background-repeat: no-repeat">
  <section class="container">
    <section>
      <div class="d-flex justify-content-center align-items-center">
        <div style="background-color: #FFB832; height: 3px; width: 5rem"></div>
        <h2 class="mx-4" style="font-size: .9rem; margin-top: 6px; font-weight: 500">NUESTROS SERVICIOS</h2>
        <div style="background-color: #FFB832; height: 3px; width: 5rem"></div>
      </div>
      <p class="text-center" style="font-size: 2.5rem"><span style="font-weight: 300">Áreas de</span> <span style="font-weight: 600">Experiencia</span></p>
    </section>
    <section class="row justify-content-center gax-4">
      <div class="col-12 col-md-6 col-lg-4 mb-5">
        <a style="text-decoration: none; color: #000000" href="{{ route('web.poderes') }}">
          <div class="d-flex card-hover" style="border-bottom: .5rem solid #FFB832; height: 8rem">
            <div>
              <img width="40rem" src="{{ asset('img/icon-poderes.webp') }}" alt="">
            </div>
            <div class="px-4">
              <h3 style="font-size: 1.2rem; color: #122944">Poderes</h3>
              <p>Gestione sus trámites sin estar presente por medio de un apoderado</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-5">
        <a style="text-decoration: none; color: #000000" href="{{ route('web.apostillas') }}">
          <div class="d-flex card-hover" style="border-bottom: .5rem solid #FFB832; height: 8rem">
            <div>
              <img width="40rem" src="{{ asset('img/icon-apostillas.webp') }}" alt="">
            </div>
            <div class="px-4">
              <h3 style="font-size: 1.2rem; color: #122944">Apostillas</h3>
              <p>Autentificamos sus documentos solicitados por entidades de otro país</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-5">
        <a style="text-decoration: none; color: #000000" href="{{ route('web.traducciones') }}">
          <div class="d-flex card-hover" style="border-bottom: .5rem solid #FFB832; height: 8rem">
            <div>
              <img width="40rem" src="{{ asset('img/icon-traducciones.webp') }}" alt="">
            </div>
            <div class="px-4">
              <h3 style="font-size: 1.2rem; color: #122944">Traducciones</h3>
              <p>Transcripción de documentos de un idioma a otro diferente</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-5">
        <a style="text-decoration: none; color: #000000" href="{{ route('web.certificaciones') }}">
          <div class="d-flex card-hover" style="border-bottom: .5rem solid #FFB832; height: 8rem">
            <div>
              <img width="40rem" src="{{ asset('img/icon-certificaciones.webp') }}" alt="">
            </div>
            <div class="px-4">
              <h3 style="font-size: 1.2rem; color: #122944">Certificaciones</h3>
              <p>Demuestre que la copia realizada es veridica copia del documento original</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-5">
        <a style="text-decoration: none; color: #000000" href="{{ route('web.affidavit') }}">
          <div class="d-flex card-hover" style="border-bottom: .5rem solid #FFB832; height: 8rem">
            <div>
              <img width="40rem" src="{{ asset('img/icon-affidavit.webp') }}" alt="">
            </div>
            <div class="px-4">
              <h3 style="font-size: 1.2rem; color: #122944">Affidavit</h3>
              <p>Asegure la veracidad de un documento mediante una declaracion juramentada</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-5">
        <a style="text-decoration: none; color: #000000" href="{{ route('web.revocatorias') }}">
          <div class="d-flex card-hover" style="border-bottom: .5rem solid #FFB832; height: 8rem">
            <div>
              <img width="40rem" src="{{ asset('img/icon-revocatoria.webp') }}" alt="">
            </div>
            <div class="px-4">
              <h3 style="font-size: 1.2rem; color: #122944">Revocatoria</h3>
              <p>Deje sin efecto un poder otorgado sin antelación</p>
            </div>
          </div>
        </a>
      </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-5">
        <a style="text-decoration: none; color: #000000" href="{{ route('web.acuerdos') }}">
          <div class="d-flex card-hover" style="border-bottom: .5rem solid #FFB832; height: 8rem">
            <div>
              <img width="40rem" src="{{ asset('img/icon-acuerdos.webp') }}" alt="">
            </div>
            <div class="px-4">
              <h3 style="font-size: 1.2rem; color: #122944">Acuerdos</h3>
              <p>Percátese de firmar un convenio entre dos o más personas</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-5">
        <a style="text-decoration: none; color: #000000" href="{{ route('web.invitacion') }}">
          <div class="d-flex card-hover" style="border-bottom: .5rem solid #FFB832; height: 8rem">
            <div>
              <img width="40rem" src="{{ asset('img/icon-cartas-de-invitacion.webp') }}" alt="">
            </div>
            <div class="px-4">
              <h3 style="font-size: 1.2rem; color: #122944">Cartas de Invitación</h3>
              <p>Documento válido para la tramitación de una visa de turista</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-5">
        <a style="text-decoration: none; color: #000000" href="{{ route('web.autorizaciones') }}">
          <div class="d-flex card-hover" style="border-bottom: .5rem solid #FFB832; height: 8rem">
            <div>
              <img width="40rem" src="{{ asset('img/icon-travel-authorization.webp') }}" alt="">
            </div>
            <div class="px-4">
              <h3 style="font-size: 1.2rem; color: #122944">Travel Authorization</h3>
              <p>Nombre a un titular quien será el encargado de viajar con un menor de edad</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-5">
        <a style="text-decoration: none; color: #000000" href="{{ route('web.contratos') }}">
          <div class="d-flex card-hover" style="border-bottom: .5rem solid #FFB832; height: 8rem">
            <div>
              <img width="40rem" src="{{ asset('img/icon-contratos.webp') }}" alt="">
            </div>
            <div class="px-4">
              <h3 style="font-size: 1.2rem; color: #122944">Contratos</h3>
              <p>Gestione sus documentos legales que reflejan los derechos y obligaciones</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-12 col-md-6 col-lg-4 mb-3">
        <a style="text-decoration: none; color: #000000" href="{{ route('web.testamentos') }}">
          <div class="d-flex card-hover" style="border-bottom: .5rem solid #FFB832; height: 8rem">
            <div>
              <img width="40rem" src="{{ asset('img/icon-testamentos.webp') }}" alt="">
            </div>
            <div class="px-4">
              <h3 style="font-size: 1.2rem; color: #122944">Testamentos</h3>
              <p>Documento que refleja la voluntad de una persona de distribuir sus bienes</p>
            </div>
          </div>
        </a>
      </div>
    </section>
  </section>
</section>

<section>
  <section class="row" style="background-color: #122944">
    <div class="col-sm-12 col-md-6">
      <img class="img-fluid" src="{{ asset('img/notarizando documento.webp') }}" alt="notaria en newyork, newjersey y florida">
    </div>
    <div class="col-sm-12 col-md-4 d-flex align-items-center p-5">
      <div>
        <div class="d-flex align-items-center">
          <h2 style="font-size: .8rem; font-weight: 400; " class="text-white mr-3 mt-1">¿POR QUÉ ELEGIRNOS?</h2>
          <div style="background-color: #FFB832; width: 80px; height: 2px"></div>
        </div>
        <div>
          <p class="text-white" style="font-size: 2rem">¿Qué nos hace <br><span style="color: #FFB832; font-weight: 700">diferentes?</span></p>
          <p class="text-white">Contamos con <span style="font-weight: 500">más de 10 años de trayectoria</span> en el campo notarial, nuestro personal profesional y capacitado le brindará un servicio integral, rápido y eficaz</p>
          <p class="text-white">Nuestra notaría está avalada por National Notary Association y Approved Electronic Notary</p>
          <div class="d-flex">
            <img id="imgdoc" class="lazy mx-4" data-src="{{asset('img/docverify-approved-enotary-small.webp')}}" width="60" height="80" alt="">
            <img id="imgnna" class="lazy mx-4" data-src="{{asset('img/national-notary-association.webp')}}" width="190" height="80" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
</section>


{{-- <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="3000">
    <ol class="carousel-indicators">
      <li style="width: 10px; height: 10px" data-target="#carouselExampleCaptions" data-slide-to="0" class="active rounded-circle"></li>
      <li style="width: 10px; height: 10px" data-target="#carouselExampleCaptions" data-slide-to="1" class="rounded-circle"></li>
      <li style="width: 10px; height: 10px" data-target="#carouselExampleCaptions" data-slide-to="2" class="rounded-circle"></li>
      <li style="width: 10px; height: 10px" data-target="#carouselExampleCaptions" data-slide-to="3" class="rounded-circle"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
          <img data-src="@if($mobile) {{asset('img/5-mobile.webp')}} @else {{ asset('img/5.webp')}} @endif" class="lazy d-block w-100" alt="..." 
          style="height: 850px;object-fit: cover; object-position: center center; filter: brightness(0.4);">
          <div class="carousel-caption">
            <div class="@if($mobile) mb-5 @endif">
              <img class="img-logo pb-5 img-fluid lazy" width="500px" height="250px" data-src="@if($mobile) {{asset('img/logo-notaria-latina-mobile.webp')}} @else {{asset('img/logo-notaria-latina.webp')}} @endif" alt="">
              <div class="pb-5" style="display:flex ;justify-content: center;">
                <p class="txt-gestion-facil h4 w-auto rounded-pill pl-3 pr-1 py-1 font-family-montserrat text-center" style="background-color: #FFBE32; color: #2B384D; font-weight: semibold; letter-spacing: 10px; font-size: 20px; margin-bottom: @if(!$mobile) 6% @else 2% @endif">GESTIÓN RÁPIDA Y FÁCIL</p>
              </div>
              <div class="d-flex justify-content-center @if(!$mobile) mb-5 @else mb-4 @endif" style="margin-top: @if(!$mobile) -50px @else -30px @endif !important">
                <div class="d-flex">
                    @foreach ($consulates as $consulate)
                        @if ($consulate->slug != "espana")
                            <img class="mx-1" width="25px" height="25px" src="{{asset('img/partners/'.str_replace("-", "", $consulate->slug).'.png')}}" alt="">
                        @endif
                    @endforeach
                </div>
              </div>
              <button class="btn btn-outline-warning btn-lg button rounded-pill text-white mb-5" data-toggle="modal" data-target="#exampleModal">INICIAR TRAMITE</button>
            </div>
          </div>
        </div>

        <div class="carousel-item"  style="background:rgba(2, 2, 2, 0.5);">
          <img data-src="@if($mobile) {{asset('img/4-mobile.webp')}} @else {{asset('img/4.webp')}} @endif" class="lazy d-block w-100" alt="..." 
          style="height: 850px;object-fit: cover; object-position: center center; filter: brightness(0.4);">
          <div class="carousel-caption">
            <div class="@if($mobile) mb-5 @endif">
              <img class="img-logo pb-5 img-fluid lazy" width="500px" height="250px" data-src="@if($mobile) {{asset('img/logo-notaria-latina-mobile.webp')}} @else {{asset('img/logo-notaria-latina.webp')}} @endif" alt="">
              <div class="pb-5" style="display:flex; justify-content: center; text-align: center !important">
                <p class="txt-gestion-facil h4 w-auto rounded-pill pl-3 pr-1 py-1 font-family-montserrat" style="background-color: #FFBE32; color: #2B384D; font-weight: bold; letter-spacing: 10px; font-size: 20px; margin-bottom: @if(!$mobile) 6% @else 2% @endif">PODERES</p>
              </div>
              <div class="d-flex justify-content-center @if(!$mobile) mb-5 @else mb-4 @endif" style="margin-top: @if(!$mobile) -50px @else -30px @endif !important">
                <div class="d-flex">
                    @foreach ($consulates as $consulate)
                        @if ($consulate->slug != "espana")
                            <img class="mx-1" width="25px" height="25px" src="{{asset('img/partners/'.str_replace("-", "", $consulate->slug).'.png')}}" alt="">
                        @endif
                    @endforeach
                </div>
              </div>
              <button class="btn btn-outline-warning btn-lg button rounded-pill text-white mb-5" data-toggle="modal" data-target="#exampleModal">INICIAR TRAMITE</button>

            </div>
          </div>
        </div>
        <div class="carousel-item"  style="background:rgba(2, 2, 2, 0.5);">
          <img data-src="@if($mobile) {{asset('img/3-mobile.webp')}} @else {{asset('img/3.webp')}} @endif" class="lazy d-block w-100" alt="..." 
          style="height: 850px;object-fit: cover; object-position: center center; filter: brightness(0.4)">
          <div class="carousel-caption">
            <div class="@if($mobile) mb-5 @endif">
              <img class="img-logo pb-5 img-fluid lazy" width="500px" height="250px" data-src="@if($mobile) {{asset('img/logo-notaria-latina-mobile.webp')}} @else {{asset('img/logo-notaria-latina.webp')}} @endif" alt="">
              <div class="pb-5" style="display:flex ;justify-content: center">
                <p class="txt-gestion-facil h4 w-auto rounded-pill pl-3 pr-1 py-1 font-family-montserrat" style="background-color: #FFBE32; color: #2B384D; font-weight: bold; letter-spacing: 10px; font-size: 20px; margin-bottom: @if(!$mobile) 6% @else 2% @endif">APOSTILLAS</p>
              </div>
              <div class="d-flex justify-content-center @if(!$mobile) mb-5 @else mb-4 @endif" style="margin-top: @if(!$mobile) -50px @else -30px @endif !important">
                <div class="d-flex">
                    @foreach ($consulates as $consulate)
                        @if ($consulate->slug != "espana")
                            <img class="mx-1" width="25px" height="25px" src="{{asset('img/partners/'.str_replace("-", "", $consulate->slug).'.png')}}" alt="">
                        @endif
                    @endforeach
                </div>
              </div>
              <button class="btn btn-outline-warning btn-lg button rounded-pill text-white mb-5" data-toggle="modal" data-target="#exampleModal">INICIAR TRAMITE</button>
            </div>
          </div>
        </div>
        <div class="carousel-item"  style="background:rgba(2, 2, 2, 0.5);">
          <img data-src="@if($mobile) {{asset('img/2-mobile.webp')}} @else {{asset('img/2.webp')}} @endif" class="lazy d-block w-100" alt="..." 
          style="height: 850px;object-fit: cover; object-position: center center; filter: brightness(0.4)">
          <div class="carousel-caption">
            <div class="@if($mobile) mb-5 @endif">
              <img class="img-logo pb-5 img-fluid lazy" width="500px" height="250px" data-src="@if($mobile){{asset('img/logo-notaria-latina-mobile.webp')}} @else {{asset('img/logo-notaria-latina.webp')}} @endif" alt="">
              <div class="pb-5" style="display:flex ;justify-content: center">
                <p class="txt-gestion-facil h4 w-auto rounded-pill pl-3 pr-1 py-1 font-family-montserrat" style="background-color: #FFB832; color: #2B384D; font-weight: bold; letter-spacing: 10px; font-size: 20px; margin-bottom: @if(!$mobile) 6% @else 2% @endif">TRADUCCIONES</p>
              </div>
              <div class="d-flex justify-content-center @if(!$mobile) mb-5 @else mb-5 @endif" style="margin-top: @if(!$mobile) -50px @else -10px @endif !important">
                <div class="d-flex">
                    @foreach ($consulates as $consulate)
                        @if ($consulate->slug != "espana")
                            <img class="mx-1" width="25px" height="25px" src="{{asset('img/partners/'.str_replace("-", "", $consulate->slug).'.png')}}" alt="">
                        @endif
                    @endforeach
                </div>
              </div>
              <button class="btn btn-outline-warning btn-lg button rounded-pill text-white mb-5" data-toggle="modal" data-target="#exampleModal">INICIAR TRAMITE</button>
            </div>
          </div>
        </div>

    </div>
    <label style="cursor: pointer" class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </label>
    <label style="cursor: pointer" class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </label>
  </div> --}}

  {{-- <div class="p-2" style="position: absolute;right: 20px;top: 80px;z-index: 999">
    <a class="h5" href="tel:+18007428602" style="color: #FFB832 !important" onclick="gtag_report_conversion('tel:+18007428602');gtag('event', 'click', { 'event_category': 'Seguimiento de llamadas', 'event_label': 'HomePage:{{Request::segment(1)}}', 'value': '0'});">
      <i class="fas fa-phone-square-alt"></i> 800-742-8602
    </a>
  </div> --}}

{{-- <div class="container">
  <div class="col-12 text-center pt-4">
      <h2 class="tit-not">Nuestros Servicios</h2>
      <hr class="hrb">
    </div> --}}

  {{-- <div class="row py-4">
      <div class="col-12 col-sm-12 col-md-4">
        <a style="text-decoration: none" href="{{route('web.apostillas')}}">
          <div class="serviceBox h-100">
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
          <div class="serviceBox h-100">
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
          <div class="serviceBox h-100">
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

  {{-- <div class="row justify-content-center">

    <div class="col-12 col-sm-6 col-md-6 col-xl-4 mt-3">
      <a style="text-decoration: none" href="{{route('web.poderes')}}">
        <div class="card h-100 serviceBox sb1" id="linkServices">
            <div class="d-flex align-items-center h-100">
                <div class="d-flex justify-content-center align-items-center">
                    <img class="lazy imgServices ml-3" style="width: 40px; height: 60px" data-src="{{asset('img/oficinas/iconos web/poderes.png')}}" alt="">
                </div>
                <div class="mx-3" style="width: 3px; height: 60px; background-color: #FFBE32"></div>
                <div class="pr-3">
                    <h3 class="title" style="font-weight: 600; font-size: 25px">PODERES</h3>
                    <p class="font-family-montserrat description" style="font-size: 20px">Gestione sus trámites sin estar presente por medio de un apoderado</p>
                </div>
            </div>
        </div>
      </a>
  </div>

  <div class="col-12 col-sm-6 col-md-6 col-xl-4 mt-3">
    <a style="text-decoration: none" href="{{route('web.apostillas')}}">
      <div class="card h-100 serviceBox sb2" id="linkServices">
          <div class="d-flex align-items-center h-100">
              <div class="d-flex justify-content-center align-items-center">
                  <img class="lazy imgServices ml-3" style="width: 40px; height: 60px" data-src="{{asset('img/oficinas/iconos web/apostilla.png')}}" alt="">
              </div>
              <div class="mx-3" style="width: 3px; height: 60px; background-color: #FFBE32"></div>
              <div class="pr-3">
                  <h3 class="linkServices mt-2 font-family-montserrat title" style="font-weight: 600; font-size: 25px">APOSTILLAS</h3>
                  <p class="font-family-montserrat description" style="font-size: 20px">Autentificamos sus documentos solicitados por entidades de otro país</p>
              </div>
          </div>
      </div>
    </a>
  </div>

  <div class="col-12 col-sm-6 col-md-6 col-xl-4 mt-3">
    <a style="text-decoration: none" href="{{route('web.traducciones')}}">
      <div class="card h-100 serviceBox sb3" id="linkServices">
          <div class="d-flex align-items-center h-100">
              <div class="d-flex justify-content-center align-items-center">
                  <img class="lazy imgServices ml-3" style="width: 40px; height: 60px" data-src="{{asset('img/oficinas/iconos web/traducciones.png')}}" alt="">
              </div>
              <div class="ml-3 mr-3" style="width: 2px; height: 60px; background-color: #FFBE32"></div>
              <div class="pr-3">
                  <h3 class="linkServices mt-2 font-family-montserrat title" style="font-weight: bold; font-size: 25px">TRADUCCIONES</h3>
                  <p class="font-family-montserrat description" style="font-size: 20px">Transcripción de documentos de un idioma a otro diferente</p>
              </div>
          </div>
      </div>
    </a>
  </div>

    <div class="col-6 col-sm-6 col-md-6 col-xl-4 mt-3">
      <a style="text-decoration: none" href="{{route('web.certificaciones')}}">
        <div class="card @if(!$mobile) h-100 @endif serviceBox sb4" id="linkServices">
            <div class="@if(!$mobile) d-flex @endif align-items-center h-100">
                <div class="d-flex justify-content-center align-items-center">
                    <img class="lazy imgServices ml-3" style="width: 35px; height: 55px;" data-src="{{asset('img/oficinas/iconos web/certificaciones.png')}}" alt="">
                </div>
                @if(!$mobile)<div class="mx-3" style="width: 2px; height: 60px; background-color: #FFBE32"></div>@endif
                <div class="@if(!$mobile) pr-3 @endif">
                    <h3 class="linkServices mt-2 font-family-montserrat title" style="font-weight: bold; font-size: @if(!$mobile) 25px @else 15px @endif">CERTIFICACIONES</h3>
                    @if(!$mobile)<p class="font-family-montserrat description" style="font-size: 20px">Demuestre que la copia realizada es verídica copia del documento original</p>@endif
                </div>
            </div>
        </div>
      </a>
    </div>

    <div class="col-6 col-sm-6 col-md-6 col-xl-4 mt-3">
      <a style="text-decoration: none" href="{{route('web.affidavit')}}">
        <div class="card @if(!$mobile) h-100 @endif serviceBox sb5" id="linkServices">
            <div class="@if(!$mobile) d-flex @endif align-items-center h-100">
                <div class="d-flex justify-content-center align-items-center">
                    <img class="lazy imgServices ml-3" style="width: 40px; height: 60px" data-src="{{asset('img/oficinas/iconos web/poderes.png')}}" alt="">
                </div>
                @if(!$mobile)<div class="ml-3 mr-3" style="width: 3px; height: 60px; background-color: #FFBE32"></div>@endif
                <div class="@if(!$mobile) pr-3 @endif">
                    <h3 class="linkServices mt-2 font-family-montserrat title" style="font-weight: bold; font-size: @if(!$mobile) 25px @else 15px @endif">AFFIDAVIT</h3>
                    @if(!$mobile)<p class="font-family-montserrat description" style="font-size: 20px">Asegure la veracidad de un documento mediante una declaración juramentada</p>@endif
                </div>
            </div>
        </div>
      </a>
    </div>

    <div class="col-6 col-sm-6 col-md-6 col-xl-4 @if(!$mobile) mt-3 @else mt-0 @endif">
      <a style="text-decoration: none" href="{{route('web.revocatorias')}}">
        <div class="card @if(!$mobile) h-100 @endif serviceBox sb6" id="linkServices">
            <div class="@if(!$mobile) d-flex @endif align-items-center h-100">
                <div class="d-flex justify-content-center align-items-center">
                    <img class="lazy imgServices ml-3" style="width: 40px; height: 60px" data-src="{{asset('img/oficinas/iconos web/revocatorias.png')}}" alt="Como hacer una Revocatoria en Estados Unidos">
                </div>
                @if(!$mobile)<div class="mx-3" style="width: 2px; height: 60px; background-color: #FFBE32"></div>@endif
                <div class="@if(!$mobile) pr-3 @endif">
                    <h3 class="linkServices mt-2 font-family-montserrat title" style="font-weight: bold; font-size: @if(!$mobile) 25px @else 15px @endif">REVOCATORIA</h3>
                    @if(!$mobile)<p class="font-family-montserrat description" style="font-size: 20px">Deje sin efecto un poder otorgado sin antelación</p>@endif
                </div>
            </div>
        </div>
      </a>
    </div>

    <div class="col-6 col-sm-6 col-md-6 col-xl-4 @if(!$mobile) mt-3 @else mt-0 @endif">
      <a style="text-decoration: none" href="{{route('web.acuerdos')}}">
        <div class="card @if(!$mobile) h-100 @endif serviceBox sb7" id="linkServices">
            <div class="@if(!$mobile) d-flex @endif align-items-center h-100">
                <div class="d-flex justify-content-center align-items-center">
                    <img class="lazy imgServices ml-3" style="width: 40px; height: 60px" data-src="{{asset('img/oficinas/iconos web/acuerdos.png')}}" alt="Como hacer un acuerdo en Estados Unidos">
                </div>
                @if(!$mobile)<div class="ml-3 mr-3" style="width: 2px; height: 60px; background-color: #FFBE32"></div>@endif
                <div class="@if(!$mobile) pr-3 @endif">
                    <h3 class="linkServices mt-2 font-family-montserrat title" style="font-weight: bold; font-size:@if(!$mobile) 25px @else 15px @endif">ACUERDOS</h3>
                    @if(!$mobile)<p class="font-family-montserrat description" style="font-size: 20px">Percátese de firmar un convenio entre dos o más personas</p>@endif
                </div>
            </div>
        </div>
      </a>
    </div>

    <div class="col-6 col-sm-6 col-md-6 col-xl-4 @if(!$mobile) mt-3 @else mt-0 @endif">
      <a style="text-decoration: none" href="{{route('web.invitacion')}}">
        <div class="card @if(!$mobile) h-100 @endif serviceBox sb8" id="linkServices">
            <div class="@if(!$mobile) d-flex @endif align-items-center h-100">
                <div class="d-flex justify-content-center align-items-center">
                    <img class="lazy imgServices ml-3" style="width: 40px; height: 60px" data-src="{{asset('img/oficinas/iconos web/cartas.png')}}" alt="Como tramitar una carta de invitacion en Estados Unidos">
                </div>
                @if(!$mobile)<div class="mx-3" style="width: 3px; height: 60px; background-color: #FFBE32"></div>@endif
                <div class="@if(!$mobile) pr-3 @endif">
                    <h3 class="linkServices mt-2 font-family-montserrat title" style="font-weight: bold; font-size:@if(!$mobile) 25px @else 15px @endif">CARTAS DE INVITACIÓN</h3>
                    @if(!$mobile)<p class="font-family-montserrat description" style="font-size: 20px">Documento válido para la tramitación de una visa de turista</p>@endif
                </div>
            </div>
        </div>
      </a>
    </div>

    <div class="col-6 col-sm-6 col-md-6 col-xl-4 @if(!$mobile) mt-3 @else mt-0 @endif">
      <a style="text-decoration: none" href="{{route('web.autorizaciones')}}">
        <div class="card @if(!$mobile) h-100 @endif serviceBox sb9" id="linkServices">
            <div class="@if(!$mobile) d-flex @endif align-items-center h-100">
                <div class="d-flex justify-content-center align-items-center">
                    <img class="lazy imgServices ml-3" style="width: 40px; height: 60px" data-src="{{asset('img/oficinas/iconos web/travel.png')}}" alt="Como hacer una autorizacion de viaje a Estados Unidos">
                </div>
                @if(!$mobile)<div class="mx-3" style="width: 3px; height: 60px; background-color: #FFBE32"></div>@endif
                <div class="@if(!$mobile) pr-3 @endif">
                    <h3 class="linkServices mt-2 font-family-montserrat title" style="font-weight: bold; font-size: @if(!$mobile) 25px @else 15px @endif">TRAVEL AUTHORIZATION</h3>
                    @if(!$mobile)<p class="font-family-montserrat description" style="font-size: 20px">Nombre a un titular quien será el encargado de viajar con un menor de edad</p>@endif
                </div>
            </div>
        </div>
      </a>
    </div>

    <div class="col-6 col-sm-6 col-md-6 col-xl-4 @if(!$mobile) mt-3 @else mt-0 @endif">
      <a style="text-decoration: none" href="{{route('web.contratos')}}">
        <div class="card @if(!$mobile) h-100 @endif serviceBox sb10" id="linkServices">
            <div class="@if(!$mobile) d-flex @endif align-items-center h-100">
                <div class="d-flex justify-content-center align-items-center">
                    <img class="lazy imgServices ml-3" style="width: 40px; height: 60px" data-src="{{asset('img/oficinas/iconos web/contratos.png')}}" alt="Como hacer una autorizacion de viaje a Estados Unidos">
                </div>
                @if(!$mobile)<div class="mx-3" style="width: 3px; height: 60px; background-color: #FFBE32"></div>@endif
                <div class="@if(!$mobile) pr-3 @endif">
                    <h3 class="linkServices mt-2 font-family-montserrat title" style="font-weight: bold; font-size: @if(!$mobile) 25px @else 15px @endif">CONTRATOS</h3>
                    @if(!$mobile)<p class="font-family-montserrat description" style="font-size: 20px">Gestione sus documentos legales que reflejan los derechos y obligaciones</p>@endif
                </div>
            </div>
        </div>
      </a>
    </div>

    <div class="col-6 col-sm-6 col-md-6 col-xl-4 @if(!$mobile) mt-3 @else mt-0 @endif">
      <a style="text-decoration: none" href="{{route('web.testamentos')}}">
        <div class="card @if(!$mobile) h-100 @endif serviceBox sb11" id="linkServices">
            <div class="@if(!$mobile) d-flex @endif align-items-center h-100">
                <div class="d-flex justify-content-center align-items-center">
                    <img class="lazy imgServices ml-3" style="width: 40px; height: 60px" data-src="{{asset('img/oficinas/iconos web/testamento.png')}}" alt="Como tramitar un testamento en Estados Unidos">
                </div>
                @if(!$mobile)<div class="mx-3" style="width: 3px; height: 60px; background-color: #FFBE32"></div>@endif
                <div class="@if(!$mobile) pr-3 @endif">
                    <h3 class="linkServices mt-2 font-family-montserrat title" style="font-weight: bold; font-size:@if(!$mobile) 25px @else 15px @endif">TESTAMENTOS</h3>
                    @if(!$mobile)<p class="font-family-montserrat description" style="font-size: 20px">Documento que refleja la voluntad de una persona de distribuir sus bienes</p>@endif
                </div>
            </div>
        </div>
      </a>
    </div>

</div> --}}

  {{-- <div class="row mt-4">
    <div class="col-12 col-sm-12 col-md-4">
      <a style="text-decoration: none" href="{{route('web.traducciones')}}">
        <div class="serviceBox h-100">
            <h3 class="title">Certficaciones</h3>
            <div class="service-icon">
                <img class="lazy pt-4" data-src="{{asset('img/oficinas/iconos web/certificaciones.png')}}" width="40" height="70" alt="Certificaciones - Notaria Latina">
            </div>
            <p class="description">
              Mediante este se manifiesta que la copia realizada es verídica copia del documento original
            </p>
          </div>
        </a>
    </div>

    <div class="col-12 col-sm-12 col-md-4">
      <a style="text-decoration: none" href="{{route('web.traducciones')}}">
        <div class="serviceBox h-100">
            <h3 class="title">Affidavit</h3>
            <div class="service-icon">
                <img class="lazy pt-4" data-src="{{asset('img/poderes.png')}}" width="40" height="70" alt="Affidavit - Notaria Latina">
            </div>
            <p class="description">
              Mediante un juramento ante una autoridad judicial o administrativa asegura la veracidad de algo
            </p>
          </div>
        </a>
    </div>

    <div class="col-12 col-sm-12 col-md-4">
      <a style="text-decoration: none" href="{{route('web.traducciones')}}">
        <div class="serviceBox h-100">
            <h3 class="title">Revocatoria</h3>
            <div class="service-icon">
                <img class="lazy pt-4" data-src="{{asset('img/oficinas/iconos web/revocatorias.png')}}" width="40" height="70" alt="Revocatoria - Notaria Latina">
            </div>
            <p class="description">
              Deja sin efecto un poder otorgado sin antelación
            </p>
          </div>
        </a>
    </div>
  </div>

  <div class="row mt-4">

    <div class="col-12 col-sm-12 col-md-4">
      <a style="text-decoration: none" href="{{route('web.traducciones')}}">
        <div class="serviceBox h-100">
            <h3 class="title">Acuerdos</h3>
            <div class="service-icon">
                <img class="lazy pt-4" data-src="{{asset('img/oficinas/iconos web/acuerdos.png')}}" width="40" height="70" alt="Acuerdos - Notaria Latina">
            </div>
            <p class="description">
              Es un convenio firmado entre dos o más personas
            </p>
          </div>
        </a>
    </div>

    <div class="col-12 col-sm-12 col-md-4">
      <a style="text-decoration: none" href="{{route('web.traducciones')}}">
        <div class="serviceBox h-100">
            <h3 class="title">Cartas de Invitación</h3>
            <div class="service-icon">
                <img class="lazy pt-4" data-src="{{asset('img/oficinas/iconos web/cartas.png')}}" width="40" height="70" alt="Cartas de Invitación - Notaria Latina">
            </div>
            <p class="description">
              Mediante este se manifiesta que la copia realizada es verídica copia del documento original
            </p>
          </div>
        </a>
    </div>

    <div class="col-12 col-sm-12 col-md-4">
      <a style="text-decoration: none" href="{{route('web.traducciones')}}">
        <div class="serviceBox h-100">
            <h3 class="title">Travel Authorization</h3>
            <div class="service-icon">
                <img class="lazy pt-4" data-src="{{asset('img/oficinas/iconos web/travel.png')}}" width="40" height="70" alt="Travel Authorization - Notaria Latina">
            </div>
            <p class="description">
              Mediante un juramento ante una autoridad judicial o administrativa asegura la veracidad de algo
            </p>
          </div>
        </a>
    </div>

  </div>

  <div class="row mt-4 justify-content-center">
    
    <div class="col-12 col-sm-12 col-md-4">
      <a style="text-decoration: none" href="{{route('web.traducciones')}}">
        <div class="serviceBox h-100">
            <h3 class="title">Contratos</h3>
            <div class="service-icon">
                <img class="lazy pt-4" data-src="{{asset('img/oficinas/iconos web/contratos.png')}}" width="40" height="70" alt="Contratos - Notaria Latina">
            </div>
            <p class="description">
              Deja sin efecto un poder otorgado sin antelación
            </p>
          </div>
        </a>
    </div>

    <div class="col-12 col-sm-12 col-md-4">
      <a style="text-decoration: none" href="{{route('web.traducciones')}}">
        <div class="serviceBox h-100">
            <h3 class="title">Testamentos</h3>
            <div class="service-icon">
                <img class="lazy pt-4" data-src="{{asset('img/oficinas/iconos web/testamento.png')}}" width="40" height="70" alt="Testamentos - Notaria Latina">
            </div>
            <p class="description">
              Es un convenio firmado entre dos o más personas
            </p>
          </div>
        </a>
    </div>
  </div> --}}

{{-- </div>
</div> --}}

{{-- <div class="@if($mobile) mt-1 @else mt-5 @endif">
  <div>
      <div class="row">
          <div class="col-12 col-sm-6 p-4 my-2 text-white pt-5 pb-5 shadow" style="background-color: #2B384D; padding-left: 10% !important">
              <p class="heading-title pb-4 h3">Brindamos el mejor servicio y asesoramiento a latinos en Estados Unidos.</p>
              <hr class="hrwf">
              <img id="imgdoc" class="lazy mx-4" data-src="{{asset('img/docverify-approved-enotary-small.webp')}}" width="60" height="80" alt="">
              <img id="imgnna" class="lazy mx-4" data-src="{{asset('img/national-notary-association.webp')}}" width="190" height="80" alt="">
          </div>
          <div class="col-12 col-sm-6 p-4 my-2 d-flex align-items-center px-5 shadow" style="padding-right: 5% !important; background-color: #12294409;">

            <i>
              <span class="font-family-montserrat" style="font-size:18px; text-indent: 40px; text-align: justify">
                <b>Somos una notaría autorizada</b>, para autenticar documentos en Estados Unidos, por medio de una Apostilla. Nuestro servicio es realizado bajo normas y reglas estrictamente legales, para que su trabajo sea entregado con la mayor prontitud y satisfacción.
                <br><br>
                Brindamos servicios notariales para toda <b>Latinoamérica desde los Estados Unidos</b>.</span></i>
          </div>
      </div>
  </div>
</div> --}}

{{-- <div class="container">

<div class="row">
<hr>
<div class="row rounded @if(!$mobile) py-5 @endif">
  <div class="text-center w-100">
    <h3 class="tit-not letter-color">¿Qué nos hace diferentes?</h3>
  </div>
  <div class="row @if($mobile) mt-1 mx-2 @else mt-4 mx-5 @endif">
    <div data-aos="fade-up" class="col-sm-4 text-center pt-3">
      <div class="card-different border h-100 pt-4 px-5 py-3 shadow" style="background-color: #2B384D; border-radius: 20px">
        
        <img width="50px" height="50px" src="{{ asset('img/calendar-home.png') }}" alt="image calendar">
        <hr class="w-50" style="background-color: #FFBE32">
        <i><p class="mt-2 text-white font-family-montserrat">Tenemos una trayectoria dentro del campo notarial por más de <b>10 años</b></p></i>
      </div>
    </div>
    <div data-aos="fade-up" class="col-sm-4 text-center pt-3">
      <div class="card-different border h-100 pt-4 px-5 py-3 shadow" style="background-color: #2B384D; border-radius: 20px">
        
        <img width="50px" height="50px" src="{{ asset('img/museo-home.png') }}" alt="image museum">
        <hr class="w-50" style="background-color: #FFBE32">
        <i><p class="mt-2 text-white font-family-montserrat">Contamos con un <b>personal profesional y capacitado</b> para la realización de trámites</p></i>
      </div>
    </div>
    <div data-aos="fade-up" class="col-sm-4 text-center pt-3">
      <div class="card-different border h-100 pt-4 px-5 py-3 shadow" style="background-color: #2B384D; border-radius: 20px">
        
        <img width="50px" height="50px" src="{{ asset('img/users-home.png') }}" alt="image users">
        <hr class="w-50" style="background-color: #FFBE32">
        <i><p class="mt-2 text-white font-family-montserrat">Estamos comprometido con nuestros clientes brindándole un <b>servicio integral, rápido y eficaz</b></p></i>
      </div>
    </div>
  </div>
</div>

</div>

</div> --}}

{{-- <div data-aos="flip-right" style="background-color: #12294409" class="row text-center py-5 mt-5 shadow">
  <div class="w-100">
    <h3 class="tit-not letter-color" style="font-weight: 600 !important">¿Tiene alguna pregunta?</h3>
    <i><p class="letter-color font-family-montserrat">No dude en contactarnos y uno de nuestros asesores lo ayudará</p></i>
    <a class="btn btn-warning py-3 shadow-sm" style="border-radius: 10px" href="{{route('web.contactenos')}}"><i class="font-weight-bold letter-color">CONTACTARME</i></a>
  </div>
</div> --}}

{{-- <div class="container mt-5">
  <div class="row @if($mobile) pt-0 @else pt-4 @endif">
    <div class="col-12 text-center py-4">
        <h2 class="tit-not letter-color">Visite Nuestras Oficinas</h2>
        <hr class="hrb letter-color">
      </div>

      <div class="col-12 col-sm-12 col-md-4 mb-3">
        <a style="text-decoration: none" href="{{ route('web.oficina.newyork') }}">
          <div class="serviceBox h-100">
              <h3 class="title">New York</h3>
              <div>
              <img class="lazy img-fluid rounded" width="500px" height="500px" data-src="{{asset('img/oficinas/oficina-new-york-notaria-latina.jpg')}}" alt="Poderes - Notaria Latina">
              </div>
              <div>
                <p class="description mt-4"><i class="fas fa-map-marker-alt"></i> 67-03 Roosevelt Avenue, Woodside, NY 11377</p>
                <a class="btn btn-block" href="tel:+13479739888"><i class="fas fa-phone"></i> Llamar ahora</a>
                <a class="btn btn-block" href="https://api.whatsapp.com/send?phone=13479739888"><i class="fab fa-whatsapp"></i> Whatsapp</a>
              </div>
            </div>
          </a>
      </div>

    <div class="col-12 col-sm-12 col-md-4 mb-3">
        <a style="text-decoration: none" href="{{ route('web.oficina.newjersey') }}">
        <div class="serviceBox h-100">
            <h3 class="title">New Jersey</h3>
            <div>
                <img class="lazy img-fluid rounded" width="500px" height="500px" data-src="{{asset('img/oficinas/oficina-new-jersey-notaria-latina.jpg')}}"  alt="Apostillas - Notaria Latina">
            </div>
            <div>
              <p class="description mt-4"><i class="fas fa-map-marker-alt"></i> 1146 East Jersey St Elizabeth, NJ 07201</p>
              <a class="btn btn-block" href="tel:+19088009046"><i class="fas fa-phone"></i> Llamar ahora</a>
              <a class="btn btn-block" href="https://api.whatsapp.com/send?phone=19088009046"><i class="fab fa-whatsapp"></i> Whatsapp</a>
            </div>
          </div>
          </a>
    </div>

    <div class="col-12 col-sm-12 col-md-4 mb-3">
      <a style="text-decoration: none" href="{{ route('web.oficina.florida') }}">
        <div class="serviceBox h-100">
            <h3 class="title">Florida</h3>
            <div>
                <img class="lazy img-fluid rounded" width="500px" height="500px" data-src="{{asset('img/oficinas/oficina-florida-notaria-latina.jpg')}}" alt="Traducciones - Notaria Latina">
            </div>
            <div>
              <p class="description mt-4"><i class="fas fa-map-marker-alt"></i> 2104 N University Dr, Sunrise, FL 33322</p>
              <a class="btn btn-block" href="tel:+13056003290"><i class="fas fa-phone"></i> Llamar ahora</a>
              <a class="btn btn-block" href="https://api.whatsapp.com/send?phone=13056003290"><i class="fab fa-whatsapp"></i> Whatsapp</a>
            </div>
          </div>
        </a>
    </div>

</div>
</div> --}}


{{-- @isset($indexPosts)

<div class="container">
    <div class="row pb-4">
        <div class="col-12 text-center py-4">
            <h2 class="tit-not letter-color @if(!$mobile) mt-5 @endif">Publicaciones de Interes</h2>
            <hr class="hrb letter-color">
          </div>
          @foreach ($indexPosts as $post)
              <div class="col-12 col-md-4 mb-4">
                <div class="card my-2 h-100">
                    <a href="{{route('post.slug',$post->slug)}}" class="stretched-link">
                        <img data-src="{{url('uploads/i600_'.$post->imgdir)}}" class="card-img-top lazy" alt="Imagen {{ $post->name }}" style="object-fit: cover;height: 150px !important;">
                    </a>
                    <div class="card-body p-2" style="position:relative;">
                    <span class="d-block text-muted font-weight-bold letter-color"
                            style="font-size:1rem">{{$post->name}}</span>
                    <span class="d-block text-muted text-truncate letter-color">
                        {{substr($post->body, 0, 300)}}
                    </span>
                </div>
                <div class="card-footer bg-white" style="border: none">
                    <div class="small text-muted float-left letter-color">
                        <i class="far fa-calendar-alt" style="font-size: 17px"></i>
                        {{$post->created_at->format('M d, Y')}}
                    </div>
                    <div class="small text-muted float-right">
                        <p class="d-flex align-items-center letter-color">
                            <i class="far fa-clock mr-1" style="font-size: 17px"></i>
                            {{ $post->reading_time}} min.
                        </p>
                    </div>    
                </div>
                </div>
            </div>
            @endforeach
            <div class="col-12 text-center">
            <a class="btn btn-warning py-3 mt-3 letter-color" style="border-radius: 10px" href="{{route('post.blog')}}"><i class="font-weight-bold">VER MÁS PUBLICACIONES</i></a>
            </div>
    </div>

</div>
@endisset --}}

{{-- <section id="divtestimonials" class="mt-2" style="min-height: 550px;background-size: cover;background-position: center center;background-repeat: no-repeat;">
  <div>
    <div class="pt-5">
      <p class="h2 text-center text-white font-weight-bold" style="letter-spacing: 10px">TESTIMONIOS</p>
      <div class="row text-white @if(!$mobile) mx-5 @else mx-1 @endif mt-5">
        <div class="col-sm-6 mb-2">
          <div class="border border-white p-5">
            <div class="rate">
              <input type="radio" id="star5" name="rate" value="5" disabled />
              <label for="star5" title="text">5 stars</label>
              <input type="radio" id="star4" name="rate" value="4" disabled/>
              <label for="star4" title="text">4 stars</label>
              <input type="radio" id="star3" name="rate" value="3" disabled/>
              <label for="star3" title="text">3 stars</label>
              <input type="radio" id="star2" name="rate" value="2" disabled/>
              <label for="star2" title="text">2 stars</label>
              <input type="radio" id="star1" name="rate" value="1" disabled/>
              <label for="star1" title="text">1 star</label>
            </div>
            <p class="h3 heading-title">Hernando Urguiled</p>
            <p class="font-family-montserrat">Excelente el servicio. Muy bonito el servicio de todas las señoritas en la oficina, especialmente de Mayra. Recomiendo completamente el lugar</p>
          </div>
        </div>
        <div class="col-sm-6 mb-2">
          <div class="border border-white p-5">
            <div class="rate">
              <input type="radio" id="star5" name="rate" value="5" disabled />
              <label for="star5" title="text">5 stars</label>
              <input type="radio" id="star4" name="rate" value="4" disabled/>
              <label for="star4" title="text">4 stars</label>
              <input type="radio" id="star3" name="rate" value="3" disabled/>
              <label for="star3" title="text">3 stars</label>
              <input type="radio" id="star2" name="rate" value="2" disabled/>
              <label for="star2" title="text">2 stars</label>
              <input type="radio" id="star1" name="rate" value="1" disabled/>
              <label for="star1" title="text">1 star</label>
            </div>
            <p class="h3 heading-title">Jenny Flores</p>
            <p class="font-family-montserrat">Excelente servicio 100% recomendado a la señorita Stefany muchas gracias por su excelente servicio al cliente!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}

@if($mobile)
<div class="bg-light py-5">
  <h2 class="tit-not letter-color text-center">Testimonios</h2>
  <hr class="hrb letter-color">
  <div id="carouselExampleFade" class="carousel slide carousel-fade ml-3 mr-3" data-ride="carousel" data-interval="3000">
    <div class="carousel-inner">
      @foreach ($reviews as $review)
        <div class="carousel-item {{ $loop->first ? 'active' : ' '}}">
          <div class="row justify-content-center">
            <div class="col-12 selected">
              <div class="card rounded-0 shadow-sm mx-1 h-100">
                <div class="card-body">
                  <img width="25px" height="25px" class="lazy float-right" data-src="{{asset('img/icon-google.png')}}" alt="">
                  <p class="card-title h6"><img width="25px" height="25px" class="lazy rounded-circle" data-src="{{asset('img/reviews/'.$review['avatar'])}}" alt=""> {{$review['name']}}</p>
                  <p class="card-text">{{$review['message']}}</p>
                  <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" disabled />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" disabled/>
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" disabled/>
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" disabled/>
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" disabled/>
                    <label for="star1" title="text">1 star</label>
                  </div>
                </div>
              </div>
            </div>   
          </div>
        </div>
      @endforeach
    </div>
    <label class="carousel-control-prev" style="margin-left: -45px" data-target="#carouselExampleFade" data-slide="prev">
      {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
      <span class="visually-hidden"><i class="fas fa-chevron-circle-left text-dark"></i></span>
    </label>
    <label class="carousel-control-next" style="margin-right: -45px" type="button" data-target="#carouselExampleFade" data-slide="next">
      {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
      <span class="visually-hidden"><i class="fas fa-chevron-circle-right text-dark"></i></span>
    </label>
  </div>
</div>
@else
<div class="row d-inline text-center">
  <div class="bg-light pt-5">
    <h2 class="tit-not letter-color">Testimonios</h2>
    <hr class="hrb letter-color">
    <div id="carousel-thumbs" class="carousel slide mt-5 mb-5 text-left" data-ride="carousel" data-interval="3000">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row justify-content-center">
            @for ($i = 0; $i < 3; $i++)
              <div id="carousel-selector-{{ $i }}" class="thumb col-3 col-sm-3 px-0 selected">
                <div class="card rounded-0 shadow-sm mx-1 h-100">
                  <div class="card-body">
                    <img width="25px" height="25px" class="lazy float-right" data-src="{{asset('img/icon-google.png')}}" alt="">
                    <p class="card-title h6"><img width="25px" height="25px" class="lazy rounded-circle" data-src="{{asset('img/reviews/'.$reviews[$i]['avatar'])}}" alt=""> {{$reviews[$i]['name']}}</p>
                    <p class="card-text">{{$reviews[$i]['message']}}</p>
                    <div class="rate">
                      <input type="radio" id="star5" name="rate" value="5" disabled />
                      <label for="star5" title="text">5 stars</label>
                      <input type="radio" id="star4" name="rate" value="4" disabled/>
                      <label for="star4" title="text">4 stars</label>
                      <input type="radio" id="star3" name="rate" value="3" disabled/>
                      <label for="star3" title="text">3 stars</label>
                      <input type="radio" id="star2" name="rate" value="2" disabled/>
                      <label for="star2" title="text">2 stars</label>
                      <input type="radio" id="star1" name="rate" value="1" disabled/>
                      <label for="star1" title="text">1 star</label>
                    </div>
                  </div>
                </div>
              </div>   
            @endfor
          </div>
        </div>
    
        @if(count($reviews)>3)
        <div class="carousel-item">
          <div class="row justify-content-center">
            @for ($i = 3; $i < 6; $i++)
              <div id="carousel-selector-{{ $i }}" class="thumb col-3 col-sm-3 px-0 selected">
                <div class="card rounded-0 shadow-sm mx-1 h-100">
                  <div class="card-body">
                    <img width="25px" height="25px" class="lazy float-right" data-src="{{asset('img/icon-google.png')}}" alt="">
                    <p class="card-title h6"><img width="25px" height="25px" class="lazy rounded-circle" data-src="{{asset('img/reviews/'.$reviews[$i]['avatar'])}}" alt=""> {{$reviews[$i]['name']}}</p>
                    <p class="card-text">{{$reviews[$i]['message']}}</p>
                    <div class="rate">
                      <input type="radio" id="star5" name="rate" value="5" disabled />
                      <label for="star5" title="text">5 stars</label>
                      <input type="radio" id="star4" name="rate" value="4" disabled/>
                      <label for="star4" title="text">4 stars</label>
                      <input type="radio" id="star3" name="rate" value="3" disabled/>
                      <label for="star3" title="text">3 stars</label>
                      <input type="radio" id="star2" name="rate" value="2" disabled/>
                      <label for="star2" title="text">2 stars</label>
                      <input type="radio" id="star1" name="rate" value="1" disabled/>
                      <label for="star1" title="text">1 star</label>
                    </div>
                  </div>
                </div>
              </div>   
            @endfor
          </div>
        </div>
        @endif
    
        @if(count($reviews)>6)
        <div class="carousel-item">
          <div class="row justify-content-center">
            @for ($i = 6; $i < 9; $i++)
              <div id="carousel-selector-{{ $i }}" class="thumb col-3 col-sm-3 px-0 selected">
                <div class="card rounded-0 shadow-sm mx-1 h-100">
                  <div class="card-body">
                    <img width="25px" height="25px" class="lazy float-right" data-src="{{asset('img/icon-google.png')}}" alt="">
                    <p class="card-title h6"><img width="25px" height="25px" class="lazy rounded-circle" data-src="{{asset('img/reviews/'.$reviews[$i]['avatar'])}}" alt=""> {{$reviews[$i]['name']}}</p>
                    <p class="card-text">{{$reviews[$i]['message']}}</p>
                    <div class="rate">
                      <input type="radio" id="star5" name="rate" value="5" disabled />
                      <label for="star5" title="text">5 stars</label>
                      <input type="radio" id="star4" name="rate" value="4" disabled/>
                      <label for="star4" title="text">4 stars</label>
                      <input type="radio" id="star3" name="rate" value="3" disabled/>
                      <label for="star3" title="text">3 stars</label>
                      <input type="radio" id="star2" name="rate" value="2" disabled/>
                      <label for="star2" title="text">2 stars</label>
                      <input type="radio" id="star1" name="rate" value="1" disabled/>
                      <label for="star1" title="text">1 star</label>
                    </div>
                  </div>
                </div>
              </div>   
            @endfor
          </div>
        </div>
        @endif
    
      </div>
    
      {{-- <div id="carousel-selector-1" class="thumb col-2 col-sm-2 px-0 selected" data-bs-slide-to="1" data-bs-target="#myCarousel">
        <img style="width: 100%" src="https://kinsta.com/es/wp-content/uploads/sites/8/2020/10/tipos-de-archivos-de-imagen.png" class="img-fluid" alt="">     
      </div>   --}}
    
    
      <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    
    </div>
  </div>
  </div>
  @endif
  

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
{{-- <script src="https://unpkg.com/aos@next/dist/aos.js"></script> --}}
{{-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v16.0&appId=671843794640246&autoLogAppEvents=1" nonce="W0bUXQ4L"></script> --}}
<script>
    window.addEventListener('load', (event) => {
        //document.getElementById('prisection').style.backgroundImage = "url('img/inicio.jpg')";
        document.getElementById('imgdoc').src = "img/docverify-approved-enotary-small.webp";
        document.getElementById('imgnna').src = "img/national-notary-association.webp";
        document.getElementById('services_section').style.backgroundImage = "url('img/fondo servicios.png')";
        //document.getElementById('divtestimonials').style.backgroundImage = "url({{asset('img/testimonios-notaria-latina.jpg')}})"
        // AOS.init();
    });

    document.addEventListener("DOMContentLoaded",function(){var e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var n=new IntersectionObserver(function(e,t){e.forEach(function(e){if(e.isIntersecting){var t=e.target;t.src=t.dataset.src,t.classList.remove("lazy"),n.unobserve(t)}})});e.forEach(function(e){n.observe(e)})}else{var t;function r(){t&&clearTimeout(t),t=setTimeout(function(){var n=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+n&&(e.src=e.dataset.src,e.classList.remove("lazy"))}),0==e.length&&(document.removeEventListener("scroll",r),window.removeEventListener("resize",r),window.removeEventListener("orientationChange",r))},20)}e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)}});
    setTimeout(() => {
      $('.carousel').carousel({interval: 3000});
    }, 3000);

    // const elem_testimonials = document.querySelector('#divtestimonials');

    // // Creamos un objeto IntersectionObserver
    // const observerTestimonial = new IntersectionObserver((entries) => {
    //       // Comprobamos todas las intesecciones. En el ejemplo solo existe una: cuadrado
    //       entries.forEach((entry) => {
    //           // Si es observable, entra
    //           if (entry.isIntersecting) {
    //             // Añadimos la clase '.cuadrado--rota'
    //             elem_testimonials.style.backgroundImage = "url({{asset('img/testimonios-notaria-latina.jpg')}})"
    //           }
    //       });
    //   });

    // // Añado a mi Observable que quiero observar. En este caso el cuadrado
    // observerTestimonial.observe(elem_testimonials);

    if("{{$mobile}}"){
      const observer = new IntersectionObserver(entries => {
        // Loop over the entries
        entries.forEach(entry => {
          let children = entry.target.childNodes;
          // console.log(children);
          let children_to_children = children[1].childNodes;
          let children_x3 = "";
          if(children_to_children[5]) children_x3 = children_to_children[5].childNodes;
          // If the element is visible
          if (entry.isIntersecting) {
            // Add the animation class
            entry.target.classList.add('changebgcolor');
            if(children_x3 != ""){children_x3[1].classList.add('changetxtcolor');} else {children[1].childNodes[3].childNodes[1].classList.add('changetxtcolor')}
            if(children_x3 != "") children_x3[3].classList.add('changetxtcolor');
            children_to_children[1].childNodes[1].classList.add('changeimgcolor');
          } else {
            entry.target.classList.remove('changebgcolor');
            if(children_x3 != "") {children_x3[1].classList.remove('changetxtcolor');} else {children[1].childNodes[3].childNodes[1].classList.add('changetxtcolor')}
            if(children_x3 != "") children_x3[3].classList.remove('changetxtcolor');
            children_to_children[1].childNodes[1].classList.remove('changeimgcolor');
          }
        });
      });

      for (let index = 1; index < 12; index++) {
        observer.observe(document.querySelector('.sb'+index));
      }
    }


  </script>
@endsection

