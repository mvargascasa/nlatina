<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  {{-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Apostillas Inmediatas en Estados Unidos - Notaria Latina</title>
  <meta name="robots" content="noindex">

<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($actual_link, 'localhost') === false){
?>

<!-- Google Tag Manager -->
{{-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NXP3WCV');</script> --}}
    <!-- End Google Tag Manager -->

  <!-- Global site tag (gtag.js) - Google Ads: 806267889 -->
{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=AW-806267889"></script> --}}
<!-- Global site tag (gtag.js) - Google Analytics -->
{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124437679-3"></script> --}}
{{-- <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-124437679-3');
</script> --}}

<?php };// fin de if url localhost ?>

  <style>
    html, body {max-width: 100% !important;overflow-x: hidden !important;}
    .quienes-somos{
      background: rgb(24,55,84);
      background: radial-gradient(circle, rgba(24,55,84,1) 0%, rgba(26,29,34,1) 100%);
    }
    .f-blue{
            background-color: #122944;
        }
    .navfoot{
            background-color: #333 !important;
            height: 70px;
        }
    .hrw{
            border: 1px solid white;
            width: 100px;
        }
    .hrb{
            border: 1px solid #122944;
            width: 100px;
        }
    .card > .card-header > img{border-radius: 5px 5px 0px 0px}
    #first, #second, #third, #fourth{box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;}
    #second:hover, #third:hover, #fourth:hover{box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;}
  </style>
</head>
<body style="background-color: #F5F4F4">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXP3WCV"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header>
        <nav class="navbar navfoot navbar-dark navbar-expand-lg navbar-light bg-light">
          <div class="d-flex flex-grow-1">
              <span class="w-100 d-lg-none d-block">
                  <a class="navbar-brand" href="{{route('web.index')}}">
                      <img src="{{asset('img/marca-notaria-latina.png')}}" width="140" height="30" alt="">
                    </a>
              </span>

              <a class="navbar-brand d-none d-lg-inline-block " href="{{route('web.index')}}">
                  <img src="{{asset('img/marca-notaria-latina.png')}}" width="140" height="30" alt="">
                </a>
              <div class="w-100 text-right">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
                      <span class="navbar-toggler-icon"></span>
                  </button>
              </div>
          </div>
          <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
              <ul class="navbar-nav ml-auto flex-nowrap">
                  <li class="nav-item"> <a class="nav-link" href="{{route('web.index')}}">Inicio</a> </li>

                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                    id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Servicios</a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li> <a class="dropdown-item" href="{{route('web.apostillas')}}"> Apostillas</a> </li>
                            <li> <a class="dropdown-item" href="{{route('web.poderes')}}"> Poderes </a> </li>
                            <li> <a class="dropdown-item" href="{{route('web.traducciones')}}"> Traducciones </a> </li>
                            <li> <a class="dropdown-item" href="{{route('web.affidavit')}}"> Affidavit </a> </li>
                            <li> <a class="dropdown-item" href="{{route('web.acuerdos')}}"> Acuerdos </a> </li>
                            <li> <a class="dropdown-item" href="{{route('web.autorizaciones')}}"> Autorizaciones de Viaje </a> </li>
                            <li> <a class="dropdown-item" href="{{route('web.invitacion')}}"> Cartas de Invitación </a> </li>
                            <li> <a class="dropdown-item" href="{{route('web.certificaciones')}}"> Certificaciones </a> </li>
                            <li> <a class="dropdown-item" href="{{route('web.contratos')}}"> Contratos </a> </li>
                            <li> <a class="dropdown-item" href="{{route('web.poderesp')}}"> Poderes Especiales </a> </li>
                            <li> <a class="dropdown-item" href="{{route('web.revocatorias')}}"> Revocatorias </a> </li>
                            <li> <a class="dropdown-item" href="{{route('web.testamentos')}}"> Testamentos </a> </li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                            id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Consulados en NY</a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li> <a class="dropdown-item" href="{{route('web.argentina')}}"> Argentina </a> </li>
                                <li> <a class="dropdown-item" href="{{route('web.bolivia')}}"> Bolivia </a> </li>
                                <li> <a class="dropdown-item" href="{{route('web.colombia')}}"> Colombia </a> </li>
                                <li> <a class="dropdown-item" href="{{route('web.costarica')}}"> Costa Rica </a> </li>
                                <li> <a class="dropdown-item" href="{{route('web.ecuador')}}"> Ecuador </a> </li>
                                <li> <a class="dropdown-item" href="{{route('web.salvador')}}"> El Salvador </a> </li>
                                <li> <a class="dropdown-item" href="{{route('web.honduras')}}"> Honduras </a> </li>
                                <li> <a class="dropdown-item" href="{{route('web.mexico')}}"> México </a> </li>
                                <li> <a class="dropdown-item" href="{{route('web.paraguay')}}"> Paraguay </a> </li>
                                <li> <a class="dropdown-item" href="{{route('web.peru')}}"> Perú </a> </li>
                                <li> <a class="dropdown-item" href="{{route('web.uruguay')}}"> Uruguay </a> </li>
                                <li> <a class="dropdown-item" href="{{route('web.venezuela')}}"> Venezuela </a> </li>

                            </ul>
                </li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('web.nosotros')}}">Sobre Nosotros</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('web.contactenos')}}">Contáctenos</a> </li>
                  </li>
              </ul>
          </div>
      </nav>

      </header>

<section class="container" style="min-height: 85vh;">
    <div class="row p-4 p-md-5">
        <div class="col-md-12 text-center">
            <h1 class="font-weight-bold" style="font-size: 60px;">¡Gracias!</h1>
        </div>
        <div data-aos="zoom-in" class="col-md-12 text-center">

            <h4 class="p-2">Gracias por comunicarte y confiar en nosotros</h4>

            <div id="first" class="bg-white col-sm-5 pb-4 text-center mt-5" style="margin: 0px auto; border-radius: 20px">
                <img id="imghelp" width="200rem" height="200rem" class="img-fluid p-4" src="{{asset('img/helpline.jpg')}}" alt="">
                <p class="lead">En breve te contactaremos.</p>
                <a class="btn btn-warning" href="/">Ir a NotariaLatina.com</a>
            </div>
        </div>
    </div>
    <h3 class="text-center">Más Servicios</h3>
    <div class="row justify-content-center mt-5">
        <div class="col-sm-4 d-flex justify-content-center mb-3">
            <div id="second" data-aos="fade-right" class="card" style="width: 95%;">
                <div class="card-header" style="padding: 0px !important">
                    <img class="img-fluid" src="https://laverdad.com.mx/wp-content/uploads/2020/09/DATA_ART_132942_VERTIL.jpg" alt="">
                </div>
                <div class="card-body">
                  <h5 class="card-title text-center"><img width="25" height="25" src="{{asset('img/pencil.svg')}}" alt="poderes" > PODERES</h5>
                  <p class="card-text text-muted">
                      Gestione sus trámites legales sin estar presente por medio de un apoderado de confianza, una solución para gestionar bienes y trámites importantes
                  </p>
                </div>
                <div class="card-footer bg-white text-center" style="border: 0px">
                    <a href="{{ route('web.poderes') }}" class="card-link btn btn-warning">Más Información <i class="fas fa-info-circle"></i></a>
                </div>
              </div>
        </div>
        <div class="col-sm-4 d-flex justify-content-center mb-3">
            <div id="third" data-aos="fade-up" class="card" style="width: 95%">
                <div class="card-header" style="padding: 0px !important">
                    <img class="img-fluid" src="https://cdn.mequieroir.com/wp-content/uploads/2019/11/apostilla.jpg" alt="">
                </div>
                <div class="card-body">
                  <h5 class="card-title text-center"><img width="25" height="25" src="{{asset('img/pencil.svg')}}" alt="apostillas" > APOSTILLAS</h5>
                  <p class="card-text text-muted">
                      Autentificación de documentos solicitados por entidades de otro país diferente al originario mediante la apostilla de los mismos
                  </p>
                </div>
                <div class="card-footer bg-white text-center" style="border: 0px">
                    <a href="{{ route('web.apostillas') }}" class="card-link btn btn-warning">Más Información <i class="fas fa-info-circle"></i></a>
                </div>
              </div>
        </div>
        <div class="col-sm-4 d-flex justify-content-center mb-3">
            <div id="fourth" data-aos="fade-left" class="card" style="width: 95%">
                <div class="card-header" style="padding: 0px !important">
                    <img class="img-fluid" src="https://uploads-ssl.webflow.com/61388d0210d654c3910bea20/61388edd7690956d2a06475c_60cb72f08be728702ffc6bbf_5f74afb5ac0d42bbcd049cc2_las-tres-grandes-preguntas-sobre-los-notarios-featured.jpeg" alt="">
                </div>
                <div class="card-body">
                  <h5 class="card-title text-center"><img width="25" height="25" src="{{asset('img/pencil.svg')}}" alt="poderes" > TRADUCCIONES</h5>
                  <p class="card-text text-muted">
                      Transcripción de documentos de un idioma a otro diferente, certificados por un notario para ser presentados frente a las entidades que lo soliciten
                  </p>
                </div>
                <div class="card-footer bg-white text-center" style="border: 0px">
                    <a href="{{ route('web.traducciones') }}" class="card-link btn btn-warning">Más Información <i class="fas fa-info-circle"></i></a>
                </div>
              </div>
        </div>
    </div>
</section>

<div class="row justify-content-center">
    <div class="col-sm-12 text-center p-5">
        <a href="https://www.facebook.com/notariapublicalatina" title="Facebook Notaria Latina" target="_blank"><i class="fab fa-facebook fa-2x mx-1" style="color: #3b5998"></i></a>
        <a href="https://www.instagram.com/notarialatina" title="Instagram Notaria Latina" target="_blank"><i class="fab fa-instagram fa-2x mx-1" style="color: #C13584"></i></a>
        <a href="https://api.whatsapp.com/send?phone=13479739888" title="WhatsApp Notaria Latina" target="_blank"><i class="fab fa-whatsapp fa-2x mx-1" style="color: #25D366"></i></a>
    </div>
</div>










<footer class="text-center navfoot text-white py-3">  Copyright ©2020 Notaria Latina. All rights reserved.  </footer>

<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

</body>
</html>
