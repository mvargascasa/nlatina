<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon" />
  {{-- <link href="https://fonts.googleapis.com/css2?family=Antic+Didone&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="preload" href="{{asset('css/styles.min.css')}}" as="style" onload="this.rel='stylesheet'">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" as="style" onload="this.rel='stylesheet'"/>
    <meta name="facebook-domain-verification" content="lz9luqstj366xp6jboc5k6mt4m4ssm" />

<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($actual_link, 'localhost') === false){
?>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-124437679-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-124437679-3');
  gtag('config', 'AW-702844945');
</script>

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
    <script defer>
        if(!(window.location.pathname.match('/newjersey') || window.location.pathname.match('/newyork') || window.location.pathname.match('/florida') || window.location.pathname.match('/partners'))){
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
        }
    </script>
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=757596345081494&ev=PageView&noscript=1"/>
    </noscript>
<!-- End Facebook Pixel Code -->

<?php };// fin de if url localhost ?>
<style>
    /*iframe{ width: 250px !important;    } */
    html, body {
        max-width: 100% !important;
        overflow-x: hidden !important;
    }
</style>

  @yield('header')
  </head>
<body>

    <header>
        <nav class="navbar navfoot navbar-dark navbar-expand-lg navbar-light bg-light">
          <div class="d-flex flex-grow-1">
              <span class="w-100 d-lg-none d-block">
                  <a class="navbar-brand" href="{{route('web.index')}}">
                      <img src="{{asset('img/marca-notaria-latina.png')}}" width="140px" height="30px" alt="">
                    </a>
              </span>

              <a class="navbar-brand d-none d-lg-inline-block " href="{{route('web.index')}}">
                  <img src="{{asset('img/marca-notaria-latina.png')}}" width="140px" height="30px" alt="">
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
                            <li> <a class="dropdown-item" href="{{route('web.apostillas')}}"> Apostillas</a> </li>
                            <li> <a class="dropdown-item" href="{{route('web.poderes')}}"> Poderes </a> </li>
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
                  </li>
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
                    <div class="card my-2">
                        <div class="card-body p-2" style="position:relative;">
                        <span class="d-block font-weight-bold text-truncate " style="font-size:1rem;color:#122944">{{$post->name}}</span>
                        <span class="d-block text-muted text-truncate"><?php echo strip_tags(substr($post->body,0,100))  ?></span>
                        <div class="small text-muted float-left">
                          <a href="{{route('post.slug',$post->slug)}}" class="stretched-link">{{$post->created_at->format('M d')}}</a>
                        </div>
                        </div>
                    </div>
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
                <img width="150px" height="35px" src="{{asset('img/marca-notaria-latina.png')}}" alt="Logo Notaria Latina">
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
                        <a href="tel:+13479739888" class="text-muted pr-2"><i class="fa fa-phone-square-alt"></i> 347 973 9888</a><br>
                        {{-- 908 800 9046 --}}
                    <br> 

                    {{-- <span class="font-weight-bold text-white"> Florida </span><br>
                    <a href="https://g.page/r/CeRrwPx_W2-xEAE" target="_blank" class="text-muted">
                        2104 N University Dr, Sunrise, FL 33322 </a><br>
                        <a href="tel:+13056003290" class="text-muted pr-2"><i class="fa fa-phone-square-alt"></i> 305 600 3290</a> 
                        <!-- <a href="tel:+13053948840" class="text-muted pr-2"><i class="fa fa-phone-square-alt"></i> 305 394 8840</a><br> -->
                    <br> --}}

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
                        <img data-src="{{asset('img/notary-public-near-me-messenger.svg')}}" alt="Messenger Notary Public Near Me" width="30" height="30">
                    </a>

                    <a href="https://api.whatsapp.com/send?phone=+13479739888" class="lazy" target="_blank">
                        <img data-src="{{asset('img/notary-public-near-me-whatsapp.svg')}}" alt="Whatsapp Notary Public Near Me" width="30" height="30">
                    </a>

                    <a href="https://www.instagram.com/notarialatina" class="lazy" target="_blank">
                        <img data-src="{{asset('img/notary-public-near-me-instagram.svg')}}" alt="Instagram Notary Public Near Me" width="30" height="30">
                    </a>

                    <a href="https://www.youtube.com/channel/UCK1XQrnc5uGP5KvXumMjo9A" class="lazy" target="_blank">
                        <img data-src="{{asset('img/notary-public-near-me-youtube.svg')}}" alt="Youtube Notary Public Near Me" width="30" height="30">
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

    <div class="card card-whatsapp hide-card-whatsapp" id="card_whatsapp" style="z-index:950">
        <div class="card-header bg-success text-white px-4">
            <i class="fab fa-whatsapp"></i> Whatsapp 
            <div class="float-right" onclick="closeWsapp()">
                <i class="fas fa-times"></i>
            </div>
        </div>
          <a onclick="gtag('event', 'click', { 'event_category': 'Mensajes Whatsapp', 'event_label': 'HomePage:{{Request::segment(1)}}', 'value': '0'});"
        href="https://api.whatsapp.com/send?phone=+@yield('numberWpp')" target="_blank"> {{--+13479739888--}}
        <div class="card-body py-4" style="background-image: url({{ asset('img/whatsapp-wallpaper.webp') }});">
            <div class="card">
                <div class="card-body p-2 text-dark">
                    Hola! <br>
                    En que podemos ayudarte?
                </div>
            </div>
        </div>        
      </div>

      <div id="svgwpp" style="width: 60px; position: fixed; bottom: 10px; right: 25px; height: 50px;">
        <a onclick="gtag('event', 'click', { 'event_category': 'Mensajes Whatsapp', 'event_label': 'HomePage:{{Request::segment(1)}}', 'value': '0'});"
        href="https://api.whatsapp.com/send?phone=@yield('numberWpp')" target="_blank">{{--+13479739888--}}
            <img src="{{asset('img/notary-public-near-me-whatsapp.svg')}}" 
            alt="Whatsapp Notary Public Near Me" width="40" height="40">
        </a> 
        </div>
</footer>
{{-- <script defer src="{{asset('js/jquery-3.4.1.min.js')}}" ></script>
<script defer src="{{ asset('js/popper.min.js') }}"></script> --}}
{{-- <script defer src="{{ asset('js/bootstrap.min.js') }}"></script> --}}

@yield('script')

<script>
    //CARGAR EL SCRIPT DE PLUGIN DE FACEBOOK
    var scriptFacebookPlugin = document.createElement('script');
    scriptFacebookPlugin.id = "plugin-facebook";
    scriptFacebookPlugin.async = true;
    scriptFacebookPlugin.defer = true;
    scriptFacebookPlugin.src = "https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v13.0&appId=478871590548026&autoLogAppEvents=1";

    var path = window.location.pathname;

    //CARGO LOS RECURSOS SI LAS URLS SON DIFERENTES AL DE LAS OFICINAS
    if(!(path.match('/newjersey') || path.match('/newyork') || path.match('/florida') || path.match('/partners'))){
        document.getElementsByTagName("script")[0].parentNode.appendChild(scriptFacebookPlugin);
    } else {
        if(screen.width > 580){
            document.getElementsByTagName("script")[0].parentNode.appendChild(scriptFacebookPlugin);
        }
    }

        var script3 = document.createElement("script");

        script3.src = "{{asset('js/jquery-3.4.1.min.js')}}";
        script3.async = true;

        document.addEventListener("DOMContentLoaded", function(event){
            document.getElementsByTagName("script")[0].parentNode.appendChild(script3);
        });

        script3.addEventListener("load", function(event) {
            document.getElementsByTagName("script")[0].parentNode.appendChild(script2);
            document.getElementsByTagName("script")[0].parentNode.appendChild(script);
        });
    
        var script = document.createElement("script");
        var script2 = document.createElement("script");
        // var script3 = document.createElement("script");
        

        // script3.src = "{{asset('js/jquery-3.4.1.min.js')}}";
        // script3.async = true;
        script2.src = "{{ asset('js/popper.min.js') }}";
        script2.async = true;
        script.src = "{{ asset('js/bootstrap.min.js') }}";
        script.async = true;


    // window.addEventListener("load", function(event){
    //     document.getElementsByTagName("script")[0].parentNode.appendChild(script3);
    // });

    function downloadJQueryAtOnLoad(){
        var jquery = document.createElement("script");
        jquery.src = "{{ asset('js/jquery-3.4.1.min.js') }}";
        jquery.defer = true;
        document.body.appendChild(jquery);
    }

    function downloadPopperAtOnLoad(){
        var popper = document.createElement("script");
        popper.src = "{{ asset('js/popper.min.js') }}";
        popper.defer = true;
        document.body.appendChild(popper);
    }

    function downloadBootstrapAtOnLoad(){
        var bootstrap = document.createElement("script");
        bootstrap.src = "{{ asset('js/bootstrap.min.js') }}";
        bootstrap.defer = true;
        document.body.appendChild(bootstrap);
    }

    document.addEventListener("DOMContentLoaded", function(event) {
        if (localStorage.getItem("statusCardWhatsapp") === null) {
            localStorage.setItem("statusCardWhatsapp", "On");
        }
        if (localStorage.getItem("statusCardWhatsapp") == "On") {
            document.getElementById('card_whatsapp').classList.toggle('hide-card-whatsapp');;
            console.log('if on load');
        }       
    });
    const testWsapp = () => {
        document.getElementById('card_whatsapp').classList.toggle('hide-card-whatsapp');
    }
    const closeWsapp = () => {
        localStorage.setItem("statusCardWhatsapp", "Off");
        document.getElementById('card_whatsapp').classList.toggle("hide-card-whatsapp");
    }
    document.addEventListener("DOMContentLoaded",function(){var e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var n=new IntersectionObserver(function(e,t){e.forEach(function(e){if(e.isIntersecting){var t=e.target;t.src=t.dataset.src,t.classList.remove("lazy"),n.unobserve(t)}})});e.forEach(function(e){n.observe(e)})}else{var t;function r(){t&&clearTimeout(t),t=setTimeout(function(){var n=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+n&&(e.src=e.dataset.src,e.classList.remove("lazy"))}),0==e.length&&(document.removeEventListener("scroll",r),window.removeEventListener("resize",r),window.removeEventListener("orientationChange",r))},20)}e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)}});
    
</script>
</body>
</html>
