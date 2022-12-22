<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script>
        var stylesheet = document.createElement('link');
        stylesheet.href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css";
        stylesheet.rel = 'stylesheet';
        setTimeout(function () {
            document.getElementsByTagName('head')[0].appendChild(stylesheet);
        }, 3000);
    </script>

    <link rel="icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon" />
    {{-- <link href="https://fonts.googleapis.com/css2?family=Antic+Didone&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="preload" href="{{asset('css/styles.min.css')}}" as="style" onload="this.rel='stylesheet'">
    {{-- <link async href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" rel="preload" as="style" onload="this.rel='stylesheet'"/>
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" rel="preload" as="style" onload="this.rel='stylesheet'"></noscript> --}}
    <meta name="facebook-domain-verification" content="lz9luqstj366xp6jboc5k6mt4m4ssm" />
    <meta name="p:domain_verify" content="bb7d3f8243891d26c63c3baf9c4ee239"/>

<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($actual_link, 'localhost') === false){
?>
  <!-- Global site tag (gtag.js) - Google Analytics  src=https://www.googletagmanager.com/gtag/js?id=UA-124437679-3 -->
<script id="scriptanalytics" defer></script>
<script>
    var path = window.location.pathname;
    var timeToLoad = 0;
    if(!path.match('/newjersey'))timeToLoad=3000;

    setTimeout(function(){
        document.getElementById('scriptanalytics').src = 'https://www.googletagmanager.com/gtag/js?id=UA-124437679-3';
        console.log('caargando script de analytics...');
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-124437679-3');
        gtag('config', 'AW-702844945');
    }, 1700);
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
{{-- <script id="analytics_4" defer></script>
<script>
    setTimeout(() => {
        document.getElementById('analytics_4').src = 'https://www.googletagmanager.com/gtag/js?id=G-TFNJT2W9R9';
        console.log('cargando script de analytics v4');
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-TFNJT2W9R9');
    }, 1700);
</script> --}}

<!-- Event snippet for Enviar formulario de clientes potenciales conversion page
In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. -->
<script>
    function gtag_report_conversion(url) {
      var callback = function () {
        if (typeof(url) != 'undefined') {
          window.location = url;
        }
      };
      gtag('event', 'conversion', {
          'send_to': 'AW-806267889/3YziCJeyiswBEPHXuoAD',
          'event_callback': callback
      });
      return false;
    }
</script>

<!-- Facebook Pixel Code -->
    <script>
        setTimeout(function(){
            //if(!(window.location.pathname.match('/newjersey') || window.location.pathname.match('/newyork') || window.location.pathname.match('/florida') || window.location.pathname.match('/partners'))){
                !function(f,b,e,v,n,t,s)
                {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
                fbq('init', '757596345081494');
                fbq('track', 'PageView');
            //}
            //console.log('cargando script de facebook pixel code...');
        }, 3000);
    </script>
    
<!-- End Facebook Pixel Code -->

<?php };// fin de if url localhost ?>
<style>
    /*iframe{ width: 250px !important;    } */
    html, body {max-width: 100% !important;overflow-x: hidden !important;}
    #iconcall {animation: wiggle 3s linear infinite;}
    .grecaptcha-badge { visibility: hidden; }
    /* Keyframes */
    @keyframes wiggle {
        0%, 7% {transform: rotateZ(0);}
        15% {transform: rotateZ(-15deg);}
        20% {transform: rotateZ(10deg);}
        25% {transform: rotateZ(-10deg);}
        30% {transform: rotateZ(6deg);}
        35% {transform: rotateZ(-4deg);}
        40%, 100% {transform: rotateZ(0);}
    }
    @keyframes jump {
        from {bottom: 0px;opacity:0;}
        to {opacity:1;}
    }
    
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
</style>

  @yield('header')
  </head>
<body>
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=757596345081494&ev=PageView&noscript=1"/>
    </noscript>
    <header>
        <nav class="navbar navfoot navbar-dark navbar-expand-lg navbar-light bg-light">
          <div class="d-flex flex-grow-1">
              <span class="w-100 d-lg-none d-block">
                  <a class="navbar-brand" href="{{route('web.index')}}">
                      <img src="{{asset('img/marca-notaria-latina.webp')}}" width="140px" height="30px" alt="Notaria Latina en New York, New Jersey y Florida | Apostillas, Poderes y Traducciones">
                    </a>
              </span>

              <a class="navbar-brand d-none d-lg-inline-block " href="{{route('web.index')}}">
                  <img src="{{asset('img/marca-notaria-latina.webp')}}" width="140px" height="30px" alt="Notaria Latina en New York, New Jersey y Florida | Apostillas, Poderes y Traducciones">
                </a>
              <div class="w-100 text-right">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
                      <span class="navbar-toggler-icon"></span>
                  </button>
              </div>
          </div>
          <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
              <ul class="navbar-nav ml-auto flex-nowrap px-4" style=" z-index: 1000; position: relative; background-color: #333;">
                  <li class="nav-item"> <a class="nav-link" href="{{route('web.index')}}">Inicio</a> </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                        id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Servicios</a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#"> Apostillas</a> 
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item"><a href="{{route('web.apostillar.naturalizacion')}}">Carta de Naturalización</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"> 
                                <a class="dropdown-item" href="#"> Poderes </a> 
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item"><a href="{{route('web.poderesg')}}">Poderes Generales</a></li>
                                    <li class="dropdown-item"><a href="{{route('web.poderesp')}}">Poderes Especiales</a></li>
                                    <li class="dropdown-item"><a href="{{route('web.poderesnf')}}">Poder Notarial Financiero</a></li>
                                </ul>
                            </li>
                            <li> <a class="dropdown-item" href="{{route('web.traducciones')}}"> Traducciones </a> </li>
                            <li> <a class="dropdown-item" href="{{route('web.affidavit')}}"> Affidavit </a> </li>
                            <li> <a class="dropdown-item" href="{{route('web.acuerdos')}}"> Acuerdos </a> </li>
                            <li> <a class="dropdown-item" href="{{route('web.autorizaciones')}}"> Autorizaciones de Viaje </a> </li>
                            <li> <a class="dropdown-item" href="{{route('web.invitacion')}}"> Cartas de Invitación </a> </li>
                            <li> <a class="dropdown-item" href="{{route('web.certificaciones')}}"> Certificaciones </a> </li>
                            <li> <a class="dropdown-item" href="{{route('web.contratos')}}"> Contratos </a> </li>
                            <li> <a class="dropdown-item" href="{{route('web.revocatorias')}}"> Revocatorias </a> </li>
                            <li> <a class="dropdown-item" href="{{route('web.testamentos')}}"> Testamentos </a> </li>

                        </ul>
                    </li>
                    
@php
$consuls = \App\Consulate::select('country', 'slug')->orderBy('country')->get();
@endphp
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="javascript:void(0)"
        id="DropConsul" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Consulados en NY</a>

        <ul class="dropdown-menu" aria-labelledby="DropConsul">
            @foreach ($consuls as $consul)                
            <li> <a class="dropdown-item" href="{{route('consul.slug',$consul->slug)}}"> {{$consul->country}} </a> </li>
            @endforeach

        </ul>
</li> 
                <li class="nav-item"> <a class="nav-link" href="{{route('post.blog')}}">Blog</a> </li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('web.showallpartners') }}">Partners</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('web.nosotros')}}">Sobre Nosotros</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('web.contactenos')}}">Contáctenos</a> </li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('partners.registro') }}">Registrarse</a></li>
              </ul>
          </div>
      </nav>
        <div id="etiquetaPhone" class="p-2" style=" position: absolute;right: 20px;">
                <a class="text-warning" href="tel:@yield('phoneNumberHidden')" style="font-weight: bols;"
                onclick="gtag_report_conversion('tel:+18007428602');gtag('event', 'click', { 'event_category': 'Seguimiento de llamadas', 'event_label': 'HomePage:{{Request::segment(1)}}', 'value': '0'});">
                    <i class="fa fa-phone-square-alt"></i> @yield('phoneNumber')
                    {{--800-742-8602--}}
                </a>
        </div>
      </header>

@yield('content')   

<section class="row m-0 justify-content-md-center py-4">

    <div class="col-12 text-center py-4"><hr>
      <h2 class="tit-not">Más Servicios</h2>
      <hr class="hrb">
    </div>


    <div class="col col-12 col-md-4 col-lg-3 col-xl-3 pb-4">
        <a href="{{route('web.apostillas')}}" class="btn btn-dark btn-block">Apostillas</a>
        <a href="{{route('web.affidavit')}}" class="btn btn-dark btn-block">Affidávit</a>
        <a href="{{route('web.certificaciones')}}" class="btn btn-dark btn-block">Certificaciones</a>
        <a href="{{route('web.poderesp')}}" class="btn btn-dark btn-block">Poderes Especiales</a>
    </div>

    <div class="col col-12 col-md-4 col-lg-3 col-xl-3 pb-4">
        <a href="{{route('web.poderes')}}" class="btn btn-dark btn-block">Poderes</a>
        <a href="{{route('web.acuerdos')}}" class="btn btn-dark btn-block">Acuerdos</a>
        <a href="{{route('web.invitacion')}}" class="btn btn-dark btn-block">Cartas de Invitación</a>
        <a href="{{route('web.revocatorias')}}" class="btn btn-dark btn-block">Revocatoria</a>
    </div>

    <div class="col col-12 col-md-4 col-lg-3 col-xl-3 pb-4">
        <a href="{{route('web.traducciones')}}" class="btn btn-dark btn-block">Traducciones</a>
        <a href="{{route('web.autorizaciones')}}" class="btn btn-dark btn-block">Autorizaciones de Viaje</a>
        <a href="{{route('web.contratos')}}" class="btn btn-dark btn-block">Contratos</a>
        <a href="{{route('web.testamentos')}}" class="btn btn-dark btn-block">Testamento</a>
    </div>

  </section>
@isset($indexPosts)
<div class="container">
    <div class="row py-4">
        <div class="col-12 text-center py-4"><hr>
            <h2 class="tit-not">Publicaciones de Interes</h2>
            <hr class="hrb">
          </div>
          @foreach ($indexPosts as $post)
                <div class="col-12 col-md-6">
                    <a href="{{route('post.slug',$post->slug)}}" style="text-decoration: none">
                        <div class="card my-2">
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

<footer class="text-white" style="background-color: #122944;">
    <div class="container">
        <div class="row ">
            <div class="col-12 col-sm-6 col-md-3 pt-4">
                <img width="150px" height="35px" src="{{asset('img/marca-notaria-latina.webp')}}" alt="Notaria Latina en New York, New Jersey y Florida | Apostillas, Poderes, Traducciones">
                    <p class="text-muted py-2" style="font-size: 19px">
                        Por más de 10 años contamos con su ayuda en el crecimiento y progreso de nuestra empresa. Es por eso que nuestro mayor afán es ofrecerle todas las soluciones con un servicio totalmente integral de notaria.
                    </p>

            </div>
            <div class="col-12 col-sm-6 col-md-6 p-4">
                <h2 class="tit-not">Contacto</h2> <hr class="hrwf">
                <p class="text-muted">

                    <span class="font-weight-bold text-white" > New York </span><br>
                    
                    <a href="https://g.page/notariapublicalatina" target="_blank" class="text-muted">
                        67-03 Roosevelt Avenue, Woodside, NY 11377 </a><br>
                    <a href="tel:+17187665041" class="text-muted pr-2"><i class="fa fa-phone-square-alt"></i> 718 766 5041</a> 
                    <a href="tel:+13479739888" class="text-muted pr-2"><i class="fa fa-phone-square-alt"></i> 347 973 9888</a> <br>
                    <br>

                    <span class="font-weight-bold text-white"> New Jersey </span> <br>
                    <a href="https://g.page/r/CVNRV-zNuJiZEAE" target="_blank" class="text-muted"> 
                        1146 East Jersey St Elizabeth, NJ 07201 </a><br>
                        <a href="tel:+19088009046" class="text-muted pr-2"><i class="fa fa-phone-square-alt"></i> 908 800 9046</a><br>
                        {{-- 908 800 9046 --}}
                    <br> 

                    <span class="font-weight-bold text-white"> Florida </span><br>
                    <a href="https://g.page/r/CeRrwPx_W2-xEAE" target="_blank" class="text-muted">
                        2104 N University Dr, Sunrise, FL 33322 </a><br>
                        <a href="tel:+13056003290" class="text-muted pr-2"><i class="fa fa-phone-square-alt"></i> 305 600 3290</a> 
                        <!-- <a href="tel:+13053948840" class="text-muted pr-2"><i class="fa fa-phone-square-alt"></i> 305 394 8840</a><br> -->
                    <br>

                    <a href="mailto:info@notarialatina.com" class="text-muted"><i class="fas fa-envelope"></i> info@notarialatina.com</a>
                </p>
            </div>
            <div class="col-12 col-sm-6 col-md-3 p-4">
                <h2 class="tit-not">Horarios</h2><hr class="hrwf">
                <p class="text-muted">
                    <span class="d-block"> <span class="font-weight-bold">Lunes</span> 9:00 – 6:00 pm</span>
                    <span class="d-block"> <span class="font-weight-bold">Martes</span> 9:00 – 6:00 pm </span>
                    <span class="d-block"> <span class="font-weight-bold">Miércoles</span> 9:00 – 6:00 pm </span>
                    <span class="d-block"> <span class="font-weight-bold">Jueves</span> 9:00 – 6:00 pm </span>
                    <span class="d-block"> <span class="font-weight-bold">Viernes</span> 9:00 – 6:00 pm </span>
                    <span class="d-block"> <span class="font-weight-bold">Sábado</span> 9:00 – 4:00 pm </span>
                    <span class="d-block"> <span class="font-weight-bold">Domingo</span> Cerrado</span>
                </p>
                <h2 class="tit-not">Social</h2><hr class="hrwf">
                <p class="text-muted">

                    <a href="https://www.facebook.com/notariapublicalatina" target="_blank">
                        <img data-src="{{asset('img/notary-public-near-me-facebook.svg')}}" class="lazy" alt="Facebook Notary Public Near Me" width="30" height="30">
                    </a>

                    <a href="https://www.messenger.com/t/notariapublicalatina" class="lazy" target="_blank">
                        <img data-src="{{asset('img/notary-public-near-me-messenger.svg')}}" class="lazy" alt="Messenger Notary Public Near Me" width="30" height="30">
                    </a>

                    <a href="https://api.whatsapp.com/send?phone=+13479739888" class="lazy" target="_blank">
                        <img data-src="{{asset('img/notary-public-near-me-whatsapp.svg')}}" class="lazy" alt="Whatsapp Notary Public Near Me" width="30" height="30">
                    </a>

                    <a href="https://www.instagram.com/notarialatina" class="lazy" target="_blank">
                        <img data-src="{{asset('img/notary-public-near-me-instagram.svg')}}" class="lazy" alt="Instagram Notary Public Near Me" width="30" height="30">
                    </a>

                    <a href="https://www.youtube.com/channel/UCK1XQrnc5uGP5KvXumMjo9A" class="lazy" target="_blank">
                        <img data-src="{{asset('img/notary-public-near-me-youtube.svg')}}" class="lazy" alt="Youtube Notary Public Near Me" width="30" height="30">
                    </a>

                    <div id="fb-root"></div>
                    {{-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v13.0&appId=478871590548026&autoLogAppEvents=1" nonce="tBBwJ6yv"></script> --}}
                    <div class="fb-like" data-href="https://www.facebook.com/notariapublicalatina" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
            </div>
        </div>
    </div>
    <div class="text-center navfoot py-3">Copyright ©2020 Notaria Latina. All rights reserved.
        <br><a href="{{route('web.politicas')}}" class="text-muted">Políticas de Privacidad</a>
    </div>

    {{-- <div class="card card-whatsapp hide-card-whatsapp" id="card_whatsapp" style="z-index:950">
        <div class="card-header bg-success text-white px-4">
            <i class="fab fa-whatsapp"></i> Whatsapp 
            <div class="float-right" onclick="closeWsapp()">
                <i class="fas fa-times"></i>
            </div>
        </div>
          <a onclick="gtag('event', 'click', { 'event_category': 'Mensajes Whatsapp', 'event_label': 'HomePage:{{Request::segment(1)}}', 'value': '0'});"
        href="https://api.whatsapp.com/send?phone=+@yield('numberWpp')" target="_blank"> 
        telefono +13479739888
        <div class="card-body py-4" style="background-image: url({{ asset('img/whatsapp-wallpaper.webp') }});">
            <div class="card">
                <div class="card-body p-2 text-dark">
                    Hola! <br>
                    En que podemos ayudarte?
                </div>
            </div>
        </div>        
      </div> --}}

    <a id="divwpp" onclick="gtag('event', 'click', { 'event_category': 'Mensajes Whatsapp', 'event_label': 'HomePage:{{Request::segment(1)}}', 'value': '0'});" href="https://api.whatsapp.com/send?phone=@yield('numberWpp')" target="_blank">
        <div class="d-flex justify-content-center align-items-center px-3 py-1 text-white" style="position: fixed; bottom: 0px; right: 10px; background-color: #128C7E; border-radius: 10px 10px 0px 0px">
        {{-- Consultar en linea <i class="fab fa-whatsapp ml-1"></i> --}}
        Consultar en linea <img width="25" height="25" class="lazy ml-1 mb-1" data-src="{{asset('img/notaria-latina-new-york.svg')}}" alt="Notaria Latina en Estados Unidos">
        </div>
    </a>

      {{-- <div id="svgwpp" style="width: 60px; position: fixed; bottom: 10px; right: 0px; height: 50px;">
        <a onclick="gtag('event', 'click', { 'event_category': 'Mensajes Whatsapp', 'event_label': 'HomePage:{{Request::segment(1)}}', 'value': '0'});"
        href="https://api.whatsapp.com/send?phone=@yield('numberWpp')" target="_blank">
            <img src="{{asset('img/notary-public-near-me-whatsapp.svg')}}" 
            alt="Whatsapp Notary Public Near Me" width="40" height="40">
        </a> 
        </div> --}}
        {{--+13479739888--}}            
        <div style="position: relative">
            <div id="divpreguntas" style="position: fixed; bottom: 48px; right: 60px; background-color: #122944; color: #ffffff; border-radius: 10px 10px 10px 10px; padding: 2px 7px 2px 7px; border: 2px solid #ffffff; display: none">
                {{-- <div style="position: absolute"> --}}
                    <div style="position: absolute; right: -10px; top: -16px; background-color: #122944; color: #ffffff; padding: 0px 6px 3px 6px; border-radius: 25px; border: 2px solid #ffffff; font-size: 10px; font-weight: 500; cursor: pointer" onclick="document.getElementById('divpreguntas').style.display = 'none'">
                        x
                    </div>
                {{-- </div> --}}
                <div style="font-size: 14px">
                    <b style="font-weight: 500">¿Tiene preguntas?</b> Llámenos ahora
                </div>
            </div>
        </div>
        <div id="iconcall" style="padding: 8px 11px 10px 11px; border-radius: 25px 25px 25px 25px; position: fixed; bottom: 40px; right: 10px;background-color: #122944; border: 2px solid #ffffff;">
            <a href="tel:@yield('phoneNumberHidden')">
                <img width="20" height="20" class="lazy img-fluid" data-src="{{ asset('img/telephone.webp') }}" alt="Notaria Latina">
                {{-- <i style="color: #ffffff; font-size: 18px" class="fas fa-phone"></i> --}}
            </a>
        </div>
</footer>
{{-- <script defer id="scriptjquery"></script>
<script defer id="scriptpopper" ></script>
<script defer id="scriptbootstrap" ></script> --}}

@yield('script')
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">

// setTimeout(() => {
//     document.getElementById('scriptjquery').src = "{{asset('js/jquery-3.4.1.min.js')}}";
//     document.getElementById('scriptpopper').src = "{{ asset('js/popper.min.js') }}";
//     document.getElementById('scriptbootstrap').src = "{{ asset('js/bootstrap.min.js') }}";
//     console.log('cargando los tres scripts');
// }, 3000);
    //get ip address
    // function getip(){
    //     $.getJSON("https://api.ipify.org?format=json", function(response) {
    //         console.log(response.ip);
    //     })
    // }

    var button = document.querySelector('.button');
    if(button)button.disabled = true;

    // setTimeout(() => {
    //     document.getElementById('iconcall').style.display = "block";
    // }, 3000);

    //mostrando codigo de pais al cambiar el select
    var country = document.getElementById('sel_country');
    if(country){
        country.addEventListener('change', () => {
            //var country     = document.getElementById('sel_country');
            var cod_country = document.getElementById('cod_country');
            cod_country.value = country.value;
        });
    }

    //validacion para formularios con datos de paginas web
    var formlead = document.getElementById('formlead');
    if(formlead){
        formlead.addEventListener('submit', (e) => {
            var message = document.getElementById('message').value;
            if(message.includes('https')){
                e.preventDefault();
            }
        });
    }

    //mostrando div de preguntas despues de 5seg
    setTimeout(() => {document.getElementById('divpreguntas').style.display='block';document.getElementById("divpreguntas").style.animation = "jump 1s ease";}, 7000);

    //CARGAR EL SCRIPT DE PLUGIN DE FACEBOOK
    var scriptFacebookPlugin = document.createElement('script');
    scriptFacebookPlugin.id = "plugin-facebook";
    scriptFacebookPlugin.async = true;
    scriptFacebookPlugin.defer = true;
    scriptFacebookPlugin.src = "https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v13.0&appId=478871590548026&autoLogAppEvents=1";

    var path = window.location.pathname;

    //CARGO LOS RECURSOS SI LAS URLS SON DIFERENTES AL DE LAS OFICINAS
    function downloadFacebookJSAtOnLoad(){
        if(!(path.match('/newjersey') || path.match('/newyork') || path.match('/florida') || path.match('/partners'))){
            document.getElementsByTagName("script")[0].parentNode.appendChild(scriptFacebookPlugin);
        } else {
            if(screen.width > 580){
                document.getElementsByTagName("script")[0].parentNode.appendChild(scriptFacebookPlugin);
            }
        }
    }

    let script3 = document.createElement("script");

    function downloadJSAtOnload() {
        script3.src = "{{asset('js/jquery-3.4.1.min.js')}}";
        document.body.appendChild(script3);
        console.log('cargando script de jquery');
    }

    setTimeout(function(){
        downloadFacebookJSAtOnLoad();
        //console.log('cargando script de facebook snippet...');
    }, 3000);

    let timeToLoadJquery = 1500;
    if(path.match('/newjersey') || path.match('/newyork') || path.match('/consulado')) {
        timeToLoadJquery = 3000;
    }

    setTimeout(function () {
        downloadJSAtOnload();
        //console.log('cargando script de jquery...');
        if(button)button.disabled = false;
    }, timeToLoadJquery);

        // document.addEventListener("DOMContentLoaded", function(event){
        //     document.getElementsByTagName("script")[0].parentNode.appendChild(script3);
        // });
    
        var script = document.createElement("script");
        var script2 = document.createElement("script");
        // var script3 = document.createElement("script");
        

        // script3.src = "{{asset('js/jquery-3.4.1.min.js')}}";
        // script3.async = true;
        script2.src = "{{ asset('js/popper.min.js') }}";
        script2.defer = true;
        script.src = "{{ asset('js/bootstrap.min.js') }}";
        script.defer = true;

        script3.addEventListener("load", function(event) {
            document.getElementsByTagName("script")[0].parentNode.appendChild(script2);
            document.getElementsByTagName("script")[0].parentNode.appendChild(script);
            console.log('cargando scripts de popper y bootstrap');
            //getip();
        });


    // window.addEventListener("load", function(event){
    //     document.getElementsByTagName("script")[0].parentNode.appendChild(script3);
    // });

    // function downloadJQueryAtOnLoad(){
    //     var jquery = document.createElement("script");
    //     jquery.src = "{{ asset('js/jquery-3.4.1.min.js') }}";
    //     jquery.defer = true;
    //     document.body.appendChild(jquery);
    // }

    // function downloadPopperAtOnLoad(){
    //     var popper = document.createElement("script");
    //     popper.src = "{{ asset('js/popper.min.js') }}";
    //     popper.defer = true;
    //     document.body.appendChild(popper);
    // }

    // function downloadBootstrapAtOnLoad(){
    //     var bootstrap = document.createElement("script");
    //     bootstrap.src = "{{ asset('js/bootstrap.min.js') }}";
    //     bootstrap.defer = true;
    //     document.body.appendChild(bootstrap);
    // }

    // document.addEventListener("DOMContentLoaded", function(event) {
    //     if (localStorage.getItem("statusCardWhatsapp") === null) {
    //         localStorage.setItem("statusCardWhatsapp", "On");
    //     }
    //     if (localStorage.getItem("statusCardWhatsapp") == "On") {
    //         document.getElementById('card_whatsapp').classList.toggle('hide-card-whatsapp');;
    //         console.log('if on load');
    //     }       
    // });
    const testWsapp = () => {
        document.getElementById('card_whatsapp').classList.toggle('hide-card-whatsapp');
    }
    const closeWsapp = () => {
        localStorage.setItem("statusCardWhatsapp", "Off");
        document.getElementById('card_whatsapp').classList.toggle("hide-card-whatsapp");
    }
    document.addEventListener("DOMContentLoaded",function(){
        var e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var n=new IntersectionObserver(function(e,t){e.forEach(function(e){if(e.isIntersecting){var t=e.target;t.src=t.dataset.src,t.classList.remove("lazy"),n.unobserve(t)}})});e.forEach(function(e){n.observe(e)})}else{var t;function r(){t&&clearTimeout(t),t=setTimeout(function(){var n=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+n&&(e.src=e.dataset.src,e.classList.remove("lazy"))}),0==e.length&&(document.removeEventListener("scroll",r),window.removeEventListener("resize",r),window.removeEventListener("orientationChange",r))},20)}e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)};
        // make it as accordion for smaller screens
        if (window.innerWidth < 992) {

        // close all inner dropdowns when parent is closed
        document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
            everydropdown.addEventListener('hidden.bs.dropdown', function () {
            // after dropdown is hidden, then find all submenus
                this.querySelectorAll('.submenu').forEach(function(everysubmenu){
                // hide every submenu as well
                everysubmenu.style.display = 'none';
                });
            })
        });

        document.querySelectorAll('.dropdown-menu a').forEach(function(element){
            element.addEventListener('click', function (e) {
                let nextEl = this.nextElementSibling;
                if(nextEl && nextEl.classList.contains('submenu')) {	
                // prevent opening link if link needs to open dropdown
                e.preventDefault();
                if(nextEl.style.display == 'block'){
                    nextEl.style.display = 'none';
                } else {
                    nextEl.style.display = 'block';
                }

                }
            });
        })
        };

        });

        $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');


        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass("show");
        });
        return false;
        });
</script>
</body>
</html>
