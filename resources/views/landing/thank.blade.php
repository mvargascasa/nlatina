<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <title>Apostillas Inmediatas en Estados Unidos - Notaria Latina</title>
  <!-- Global site tag (gtag.js) - Google Ads: 806267889 -->
  <meta name="robots" content="noindex">
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-806267889"></script>
<script id="scriptanalytics"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-806267889');

  setTimeout(function(){
        document.getElementById('scriptanalytics').src = 'https://www.googletagmanager.com/gtag/js?id=UA-124437679-3';
        console.log('cargando script de analytics...');
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-124437679-3');
        gtag('config', 'AW-702844945');
    }, 1600);
</script>

  <style>
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
  </style>
</head>
<body>
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
            <h1 class="font-italic font-weight-bold" style="font-size: 60px;">¡Gracias!</h1>
        </div>
        <div class="col-12 col-md-5 text-right">
            <img id="imghelp" class="img-fluid p-4" src="{{asset('img/helpline.jpg')}}" alt="">
        </div>
        <div class="col-md-7 text-center">

            <h3 class="font-italic font-weight-bold p-2">Por confiar en nosotros.</h3>
            <p class="lead">En breve te contactaremos.</p>
            <a class="btn btn-warning" href="/">Ir a NotariaLatina.com</a>

            <h3 class="font-italic font-weight-bold pt-4">Mas Servicios</h3>



                  <ul class="nav flex-column">
                    <li class="nav-item p-3"><img src="{{asset('img/pencil.svg')}}" width="30" alt="..." > PODERES</li>
                    <li class="nav-item p-3"><img src="{{asset('img/pencil.svg')}}" width="30" alt="..." > APOSTILLAS</li>
                    <li class="nav-item p-3"><img src="{{asset('img/pencil.svg')}}" width="30" alt="..." > TRADUCCIONES</li>
                  </ul>
        </div>
    </div>
</section>










<footer class="text-center navfoot text-white py-3">  Copyright ©2020 Notaria Latina. All rights reserved.  </footer>

<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

</body>
</html>
