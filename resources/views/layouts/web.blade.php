<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script>
        let stylesheet = document.createElement('link');
        stylesheet.href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css";
        stylesheet.rel = 'stylesheet';
        setTimeout(function () {
            document.getElementsByTagName('head')[0].appendChild(stylesheet);
        }, 3500);
    </script>

    <link rel="icon" href="{{asset('faviconotarialatina-22.png')}}" type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    {{-- <link rel="preload" href="{{asset('css/bootstrap.min.css')}}" as="style" onload="this.rel='stylesheet'"> --}}
    <link rel="preload" href="{{asset('css/styles.min.css?v=2')}}" as="style" onload="this.rel='stylesheet'">
    {{-- <link async href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" rel="preload" as="style" onload="this.rel='stylesheet'"/>
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" rel="preload" as="style" onload="this.rel='stylesheet'"></noscript> --}}
    <meta name="facebook-domain-verification" content="lz9luqstj366xp6jboc5k6mt4m4ssm" />
    <meta name="p:domain_verify" content="bb7d3f8243891d26c63c3baf9c4ee239"/>

<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($actual_link, 'localhost') === false){
?>
    <!-- Google Tag Manager -->
    <script>
    setTimeout(() => {
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':  
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NXP3WCV');    
    }, 3500);
    </script>
    <!-- End Google Tag Manager -->


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
    }, 3500);
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script id="analytics_4"></script>
<script>
    setTimeout(() => {
        document.getElementById('analytics_4').src = 'https://www.googletagmanager.com/gtag/js?id=G-TFNJT2W9R9';
        console.log('cargando script de analytics v4');
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-TFNJT2W9R9');
    }, 3500);
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
        }, 3500);
    </script>
    
<!-- End Facebook Pixel Code -->

<?php };// fin de if url localhost ?>
<style>
    /*iframe{ width: 250px !important;    } */
    html, body {max-width: 100% !important;overflow-x: clip}
    /* #iconcall {animation: wiggle 3s linear infinite;} */
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
@keyframes slidein {from {margin-right: -200px;} to {margin-right: 0px;}}
@keyframes slideout {from {margin-right: 0px;} to {margin-right: -200px}}
    .contenedor{
  width:100px;
  height:240px;
  position:fixed;
  right:7px;
  bottom:80px;
  z-index: 3 !important;
}
.botonF1{
    width:60px;
    height:60px;
    border-radius:100%;
    background:#122944;
    right:0;
    bottom:0;
    position:absolute;
    margin-right:16px;
    margin-bottom:16px;
    border:none;
    outline:none;
    color:#FFF;
    font-size:36px;
    box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    transition:.3s;
    text-align: center;
}
span{
  transition:.5s;  
}
.botonF1:click span{
  transform:rotate(360deg);
}
.botonF1:active{
  transform:scale(1.1);
}
.btncontact{
  width:50px;
  height:50px;
  border-radius:100%;
  border:none;
  color:#FFF;
  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
  font-size:28px;
  outline:none;
  position:absolute;
  right:0;
  bottom:0;
  margin-right:22px;
  transform:scale(0);
}
.botonF2{
  background:#122944;
  margin-bottom:90px;
  transition:0.5s;
}
.botonF3{
  margin-bottom:150px;
  transition:0.7s;
}
.animacionVer{
  transform:scale(1);
}
@media screen and (max-width: 1200px){
    .navbar{padding-left: 5% !important; padding-right: 5% !important}
}
@media screen and (max-width: 580px){
    .box-chat{width: 100vw !important;left: 0px !important; right: 0px !important; bottom: 0px !important; height: 100vh !important;}
    .chatnl{height: 92vh !important}
    /* .dropdown-partners{margin-left: 0px !important;} */
    .footer-padding{padding-left: 0px !important; padding-right: 0px !important}
    .icon-footer{width: 40px !important}
    .img-logo-footer{width: 15rem !important; height: 5rem !important}
}
/* .dropdown:hover .dropdown-menu {
    display: block;
} */
/* .dropdown-partners{
    overflow-y: auto !important;
} */
.color-links{color: #2B384D; text-decoration: none; font-weight: 600}
.color-links-hover{background-color: #FFBE32; color: #122944; border-radius: 25px; font-weight: 500}
.font-family-montserrat{font-family: 'Montserrat'}
</style>
<livewire:styles/>

<script id="script-recaptcha"></script>
<script>
    setTimeout(() => {
        document.getElementById('script-recaptcha').src="https://www.google.com/recaptcha/api.js?render=6LdI9cMeAAAAALgxUrh7mzlzFBlIV-F4Gzvbp2D8";
        console.log('cargando script recaptcha nuevo');
    }, 3000);
</script>

<script>
    document.addEventListener('submit', function(e){
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('6LdI9cMeAAAAALgxUrh7mzlzFBlIV-F4Gzvbp2D8', {action: 'submit'}).then(function(token) {
              
              let form = e.target; //accediendo al formulario

              if(form.id != 'form-chat'){

                let input = document.createElement('input');
                input.type = "hidden";
                input.name = "g-recaptcha-response";
                input.value = token;

                form.appendChild(input);

                //console.log(form);

                form.submit();

              }

          });
        });
    });
</script>

  @yield('header')
  </head>
<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXP3WCV"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=757596345081494&ev=PageView&noscript=1"/>
    </noscript>
    <header>
        <section>
            <nav class="navbar navbar-expand-lg position-fixed w-100 font-family-montserrat" style="z-index: 2; padding-left: 15%; padding-right: 15%">
              <div class="d-flex flex-grow-1">
                  <span class="w-100 d-lg-none d-block">
                      <a class="navbar-brand" href="{{route('web.index')}}">
                          <img src="{{asset('img/notaria latina logo.png')}}" width="210px" height="50px" alt="Notaria Latina en New York, New Jersey y Florida | Apostillas, Poderes y Traducciones">
                        </a>
                  </span>
    
                  <a class="navbar-brand d-none d-lg-inline-block " href="{{route('web.index')}}">
                      <img id="navbar-img" class="" src="{{asset('img/notaria latina logo.png')}}" width="210px" height="50px" alt="Notaria Latina en New York, New Jersey y Florida | Apostillas, Poderes y Traducciones">
                    </a>
                  <div class="w-100 text-right mt-2">
                      <button class="navbar-toggler" type="button" title="Barra de navegacion" data-toggle="collapse" data-target="#myNavbar">
                        <i class="fas fa-bars" style="color: #122944;"></i>
                          {{-- <span class="navbar-toggler-icon"></span> --}}
                      </button>
                  </div>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="navbar-nav ml-auto flex-nowrap px-4" style=" z-index: 1000; position: relative;">
                    {{-- @if(Request::is('/')) text-warning @else text-white @endif --}}
                      <li class="nav-item px-1 @if(Request::is('/')) color-links-hover @endif"> <a class="nav-link color-links" href="{{route('web.index')}}">INICIO</a> </li>
                      <li class="nav-item dropdown px-1 @if(Request::is('/traducciones')) color-links-hover @endif">
                          <a class="nav-link dropdown-toggle @if(Route::currentRouteName() == 'web.apostillas' || Route::currentRouteName() == 'web.poderes' || Route::currentRouteName() == 'web.traducciones' || Route::currentRouteName() == 'web.affidavit' || Route::currentRouteName() == 'web.acuerdos' || Route::currentRouteName() == 'web.autorizaciones' || Route::currentRouteName() == 'web.invitacion' || Route::currentRouteName() == 'web.certificaciones' || Route::currentRouteName() == 'web.contratos' || Route::currentRouteName() == 'web.revocatorias' || Route::currentRouteName() == 'web.testamentos') color-links-hover @endif color-links" href="javascript:void(0)"
                            id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SERVICIOS</a>
    
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                {{-- <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#"> Apostillas</a> 
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item"><a href="{{route('web.apostillar.naturalizacion')}}">Carta de Naturalización</a></li>
                                        <li class="dropdown-item"><a href="{{route('web.apostillar.nacimiento')}}">Certificado de Nacimiento</a></li>
                                        <li class="dropdown-item"><a href="{{route('web.apostillar.acta.constitutiva')}}">Acta Constitutiva</a></li>
                                        <li class="dropdown-item"><a href="{{route('web.apostillar.poder.notarial')}}">Poder Notarial</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"> 
                                    <a class="dropdown-item dropdown-toggle" href="#"> Poderes </a> 
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item"><a href="{{route('web.poderesg')}}">Poderes Generales</a></li>
                                        <li class="dropdown-item"><a href="{{route('web.poderesp')}}">Poderes Especiales</a></li>
                                        <li class="dropdown-item"><a href="{{route('web.poderesnf')}}">Poder Notarial Financiero</a></li>
                                    </ul>
                                </li> --}}
                                <li> <a class="dropdown-item" href="{{route('web.apostillas')}}"> Apostillas </a> </li>
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
                        
    {{-- @php
    $consuls = \App\Consulate::select('country', 'slug')->where('country', '!=', 'Chile')->orderBy('country')->get();
    @endphp
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="javascript:void(0)"
            id="DropConsul" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Consulados en NY</a>
    
            <ul class="dropdown-menu" aria-labelledby="DropConsul">
                @foreach ($consuls as $consul)                
                <li> <a class="dropdown-item" href="{{route('consul.slug',$consul->slug)}}"> {{$consul->country}} </a> </li>
                @endforeach
    
            </ul>
    </li>  --}}
                    {{-- @if(Request::is('blog') || Request::is('post/*')) text-warning @else text-white @endif --}}
                    {{-- @if(Request::is('videos')) text-warning @else text-white @endif --}}
                    {{-- <li class="nav-item"> <a class="nav-link color-links" href="{{route('web.videos')}}">VIDEOS</a> </li> --}}
                    {{-- @if(Request::is('nosotros')) text-warning @else text-white @endif --}}
                    <li class="nav-item px-1 @if(Request::is('nosotros')) color-links-hover @endif"> <a class="nav-link color-links" href="{{route('web.nosotros')}}">NOSOTROS</a> </li>
                    {{-- @if(Request::is('contactenos')) text-warning @else text-white @endif --}}
                    <li class="nav-item px-1 dropdown">
                        <a class="nav-link dropdown-toggle @if(Route::currentRouteName() == 'partners.fetch.state' || Route::currentRouteName() == 'web.showallpartners') color-links-hover @endif color-links" href="javascript:void(0)"
                          id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PORTAL DE ABOGADOS</a>
    
                          <ul class="dropdown-menu dropdown-partners" aria-labelledby="navbarDropdown">
                            <li> <a class="dropdown-item" href="{{ route('web.showallpartners') }}">Ver todos los países</a></li>
                            <li> <a class="dropdown-item" href="{{ route('partners.fetch.state', 'argentina') }}"><img class="img-fluid" src="{{ asset('img/partners/argentina.png') }}" alt=""> Argentina </a> </li>
                            <li> <a class="dropdown-item" href="{{ route('partners.fetch.state', 'bolivia')}}"> <img src="{{ asset('img/partners/bolivia.png') }}" alt=""> Bolivia </a> </li>
                            <li> <a class="dropdown-item" href="{{ route('partners.fetch.state', 'chile')}}"> <img src="{{ asset('img/partners/chile.png') }}" alt=""> Chile </a> </li>
                            <li> <a class="dropdown-item" href="{{ route('partners.fetch.state', 'colombia')}}"> <img src="{{ asset('img/partners/colombia.png') }}" alt=""> Colombia </a> </li>
                            <li> <a class="dropdown-item" href="{{ route('partners.fetch.state', 'costa-rica')}}"> <img src="{{ asset('img/partners/costarica.png') }}" alt=""> Costa Rica </a> </li>
                            <li> <a class="dropdown-item" href="{{ route('partners.fetch.state', 'ecuador')}}"> <img src="{{ asset('img/partners/ecuador.png') }}" alt=""> Ecuador </a> </li>
                            <li> <a class="dropdown-item" href="{{ route('partners.fetch.state', 'el-salvador')}}"> <img src="{{ asset('img/partners/elsalvador.png') }}" alt=""> El Salvador </a> </li>
                            <li> <a class="dropdown-item" href="{{ route('partners.fetch.state', 'guatemala')}}"> <img src="{{ asset('img/partners/guatemala.png') }}" alt=""> Guatemala </a> </li>
                            <li> <a class="dropdown-item" href="{{ route('partners.fetch.state', 'honduras')}}"> <img src="{{ asset('img/partners/honduras.png') }}" alt=""> Honduras </a> </li>
                            <li> <a class="dropdown-item" href="{{ route('partners.fetch.state', 'mexico')}}"> <img src="{{ asset('img/partners/mexico.png') }}" alt=""> México </a> </li>
                            <li> <a class="dropdown-item" href="{{ route('partners.fetch.state', 'nicaragua')}}"> <img src="{{ asset('img/partners/nicaragua.png') }}" alt=""> Nicaragua </a> </li>
                            <li> <a class="dropdown-item" href="{{ route('partners.fetch.state', 'panama')}}"> <img src="{{ asset('img/partners/panama.png') }}" alt=""> Panamá </a> </li>
                            <li> <a class="dropdown-item" href="{{ route('partners.fetch.state', 'paraguay')}}"> <img src="{{ asset('img/partners/paraguay.png') }}" alt=""> Paraguay </a> </li>
                            <li> <a class="dropdown-item" href="{{ route('partners.fetch.state', 'peru')}}"> <img src="{{ asset('img/partners/peru.png') }}" alt=""> Perú </a> </li>
                            <li> <a class="dropdown-item" href="{{ route('partners.fetch.state', 'puerto-rico')}}"> <img src="{{ asset('img/partners/puertorico.png') }}" alt=""> Puerto Rico </a> </li>
                            <li> <a class="dropdown-item" href="{{ route('partners.fetch.state', 'republica-dominicana')}}"> <img src="{{ asset('img/partners/repúblicadominicana.png') }}" alt=""> República Dominicana </a> </li>
                            <li> <a class="dropdown-item" href="{{ route('partners.fetch.state', 'uruguay')}}"> <img src="{{ asset('img/partners/uruguay.png') }}" alt=""> Uruguay </a> </li>
                            <li> <a class="dropdown-item" href="{{ route('partners.fetch.state', 'venezuela')}}"> <img src="{{ asset('img/partners/venezuela.png') }}" alt=""> Venezuela </a> </li>  
                          </ul>
                      </li>
                      <li class="nav-item px-1 @if(Request::is('blog') || Request::is('post/*')) color-links-hover @endif"> <a class="nav-link color-links" href="{{route('post.blog')}}">BLOG</a> </li>
                      <li class="nav-item px-1 @if(Request::is('contactenos')) color-links-hover @endif"> <a class="nav-link color-links" href="{{route('web.contactenos')}}">OFICINAS</a> </li>
                    {{-- <li class="nav-item"> <a class="nav-link text-white" type="button" class="btn btn-primary" data-toggle="modal" data-target="#searchModal">Buscar</a></li> --}}
                      {{-- <li class="nav-item"><a class="nav-link" href="{{ route('partners.registro') }}">Registrarse</a></li> --}}
                  </ul>
              </div>
          </nav>
        </section>
        @if(Route::current()->getName() != "web.oficina.newjersey" && Route::current()->getName() != "web.oficina.newyork" && Route::current()->getName() != "web.oficina.florida" && Route::current()->getName() != "web.showpartner")
            <div id="etiquetaPhone" class="p-2" style="position: absolute;right: 20px;">
                    <a class="h5" href="tel:@yield('phoneNumberHidden')" style="color: #FFBE32 !important"
                    onclick="gtag_report_conversion('tel:+18007428602');gtag('event', 'click', { 'event_category': 'Seguimiento de llamadas', 'event_label': 'HomePage:{{Request::segment(1)}}', 'value': '0'});">
                    <i class="fas fa-phone-square-alt"></i> @yield('phoneNumber')
                    </a>
            </div>
        @endif
      </header>

@yield('content')

{{-- @isset($indexPosts)
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
                            <span class="d-block text-muted text-truncate">
                               <php //echo strip_tags(substr($post->body,0,100)) php> 
                            </span>
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
@endisset --}}

{{-- <section class="row m-0 justify-content-md-center py-4">

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

  </section> --}}
  {{-- <div id="chatbot" class="d-none" style="z-index: 2000; position: fixed; bottom: 15px; right: 15px;">
    <div class="w-full bg-primary text-white py-2 px-2">
      <span>Chat Notaria Latina</span>
      <span class="float-right mr-2" onclick="this.parentElement.parentElement.classList.add('d-none')">X</span>
    </div>
    <div>
      <livewire:chatbot>
    </div>
  </div> --}}

  <footer style="background-color: #2B384D">
    <section class="row p-5">
        <div class="col-sm-12 col-md-1"></div>
        <div class="col-sm-12 col-md-5 d-flex justify-content-center align-items-center">
            <div class="p-5 footer-padding">
                <div class="d-flex justify-content-center align-items-center">
                    <img width="350rem" height="100rem" class="lazy img-logo-footer" data-src="{{ asset('img/logo-notaria-latina.webp') }}" alt="">
                </div>
                <br><br>
                <p class="text-white">Notaría Pública Latina, con 15 años de trayectoria en el campo notarial, ofrece servicios de alta calidad que abarcan los 50 estados de EE.UU</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-1"></div>
        <div class="col-sm-12 col-md-5 text-white d-flex align-items-center">
            <div>
                <div>
                    <h4 style="color: #FFBE32; font-weight: 500">Contacto</h4>
                    <p>
                        <a class="text-white" href="tel:+18007428602"><i class="fab fa-whatsapp"></i> 800 742 8602</a>
                    </p>
                    <p>
                        <a class="text-white" href="mailto:info@notarialatina.com"><i class="far fa-envelope"></i> info@notarialatina.com</a>
                    </p>
                </div>
                <div>
                    <h4 style="color: #FFBE32; font-weight: 500">Horarios</h4>
                    <p><span style="font-weight: 500">Lunes a Viernes:</span> 9:00 am - 6:00 pm</p>
                    <p><span style="font-weight: 500">Sábado:</span> 9:00 am - 4:00 pm</p>
                </div>
                <div>
                    <h4 style="color: #FFBE32; font-weight: 500">Social</h4>
                    <div class="d-flex">
                        <div class="mr-1">
                            <a target="_blank" href="https://www.facebook.com/notariapublicalatina">
                                <img style="width: 50px" class="lazy icon-footer" data-src="{{ asset('img/facebook-footer.png') }}" alt="Facebook Notaria Latina">
                            </a>
                        </div>
                        <div class="mr-1">
                            <a target="_blank" href="https://www.instagram.com/notarialatina">
                                <img style="width: 50px" class="lazy icon-footer" data-src="{{ asset('img/instagram-footer.png') }}" alt="Instagram Notaria Latina">
                            </a>
                        </div>
                        <div class="mr-1">
                            <a target="_blank" href="https://api.whatsapp.com/send?phone=13479739888">
                                <img style="width: 50px" class="lazy icon-footer" data-src="{{ asset('img/footer-whatsapp.png') }}" alt="Whatsapp Notaria Latina">
                            </a>
                        </div>
                        <div class="mr-1">
                            <a target="_blank" href="https://www.youtube.com/channel/UCK1XQrnc5uGP5KvXumMjo9A">
                                <img style="width: 50px" class="lazy icon-footer" data-src="{{ asset('img/youtube-footer.png') }}" alt="Youtube Notaria Latina">
                            </a>
                        </div>
                        <div class="mr-1">
                            <a target="_blank" href="https://www.linkedin.com/company/notaria-p%C3%BAblica-latina/">
                                <img style="width: 50px" class="lazy icon-footer" data-src="{{ asset('img/linkedin-footer.png') }}" alt="Linkedin Notaria Latina">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </footer>

{{-- <footer class="text-white" style="background-color: #122944;">
    <div class="container">
        <div class="row ">
            <div class="col-12 col-sm-6 col-md-3 pt-4">
                <img width="150px" height="35px" src="{{asset('img/marca-notaria-latina.webp')}}" alt="Notaria Latina en New York, New Jersey y Florida | Apostillas, Poderes, Traducciones">
                    <p class="text-white py-2" style="font-size: 19px">
                        Por más de 10 años contamos con su ayuda en el crecimiento y progreso de nuestra empresa. Es por eso que nuestro mayor afán es ofrecerle todas las soluciones con un servicio totalmente integral de notaria.
                    </p>

            </div>
            <div class="col-12 col-sm-6 col-md-6 p-4">
                <h2 class="tit-not">Contacto</h2> <hr class="hrwf">
                <p class="text-muted">

                    <span class="font-weight-bold" style="color: #FFBE32"> New York </span><br>
                    <a href="https://g.page/notariapublicalatina" target="_blank" class="text-white">
                        67-03 Roosevelt Avenue, Woodside, NY 11377 </a><br>
                    <a href="tel:+13479739888" class="text-white pr-2"><i class="fa fa-phone-square-alt"></i> 347 973 9888</a> <br>
                    <br>

                    <span class="font-weight-bold" style="color: #FFBE32"> New Jersey </span> <br>
                    <a href="https://g.page/r/CVNRV-zNuJiZEAE" target="_blank" class="text-white"> 
                        1146 East Jersey St Elizabeth, NJ 07201 </a><br>
                        <a href="tel:+19088009046" class="text-white pr-2"><i class="fa fa-phone-square-alt"></i> 908 800 9046</a><br>
                    <br> 

                    <span class="font-weight-bold" style="color: #FFBE32"> Florida </span><br>
                    <a href="https://g.page/r/CeRrwPx_W2-xEAE" target="_blank" class="text-white">
                        2104 N University Dr, Sunrise, FL 33322 </a><br>
                        <a href="tel:+13056003290" class="text-white pr-2"><i class="fa fa-phone-square-alt"></i> 305 600 3290</a> 
                    <br>

                    <a href="mailto:info@notarialatina.com" class="text-white"><i class="fas fa-envelope"></i> info@notarialatina.com</a>
                </p>
            </div>
            <div class="col-12 col-sm-6 col-md-3 p-4">
                <h2 class="tit-not">Horarios</h2><hr class="hrwf">
                <p class="text-white">
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

                    <a href="https://api.whatsapp.com/send?phone=13479739888" class="lazy" target="_blank">
                        <img data-src="{{asset('img/notary-public-near-me-whatsapp.svg')}}" class="lazy" alt="Whatsapp Notary Public Near Me" width="30" height="30">
                    </a>

                    <a href="https://www.instagram.com/notarialatina" class="lazy" target="_blank">
                        <img data-src="{{asset('img/notary-public-near-me-instagram.svg')}}" class="lazy" alt="Instagram Notary Public Near Me" width="30" height="30">
                    </a>

                    <a href="https://www.youtube.com/channel/UCK1XQrnc5uGP5KvXumMjo9A" class="lazy" target="_blank">
                        <img data-src="{{asset('img/notary-public-near-me-youtube.svg')}}" class="lazy" alt="Youtube Notary Public Near Me" width="30" height="30">
                    </a>

                    <div id="fb-root"></div>
                    <div class="fb-like" data-href="https://www.facebook.com/notariapublicalatina" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
            </div>
        </div>
    </div>
    <div class="text-center navfoot py-3">Copyright ©2023 Notaria Pública Latina. All rights reserved.
        <br><a href="{{route('web.politicas')}}" class="text-muted">Políticas de Privacidad</a>
    </div>
</footer> --}}

{{-- <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content rounded-0">
        <div class="modal-body">
          <livewire:search />
        </div>
      </div>
    </div>
  </div> --}}

<div id="chat" style="position: fixed; bottom: 170px; right: 10px; width: 200px; z-index: 10; display: none" class="border rounded">
    <div>
        <div style="background-color: #4eda5f; color: #ffffff" class="pl-2">
            En línea
            <div class="float-right mr-1" onclick="openchat()" style="cursor: pointer"><i class="fas fa-times-circle"></i></div>
        </div>
        <div style="position: relative;">
            <img class="img-fluid" src="{{asset('img/whatsapp-wallpaper.jpg')}}" alt="whatsapp de notaria latina">
            <div style="position: absolute; top: 0px; left: 0px; color: #000000" class="w-100 h-100 pl-2 mt-2">
                <div><a href="https://api.whatsapp.com/send?phone=13479739888" class="bg-white px-2 rounded-pill">New York <img style="margin-top: -5px" width="18px" src="{{asset('img/icon-send.svg')}}" alt=""></a></div>
                <div class="mt-1"><a href="https://api.whatsapp.com/send?phone=19088009046" class="bg-white px-2 rounded-pill">New Jersey  <img style="margin-top: -5px" width="18px" src="{{asset('img/icon-send.svg')}}" alt=""></a></div>
                <div class="mt-1"><a href="https://api.whatsapp.com/send?phone=13056003290" class="bg-white px-2 rounded-pill">Florida  <img style="margin-top: -5px" width="18px" src="{{asset('img/icon-send.svg')}}" alt=""></a></div>
            </div>
        </div>
    </div> 
</div>

<div class="contenedor d-flex justify-content-center">
    <div>
        <button class="botonF1">
          <span class="d-flex align-items-center justify-content-center"><img class="lazy" width="35px" height="35px" style="filter: invert(100%)" data-src="{{ asset('img/atencion-al-cliente.png') }}" alt="contactar a notaria latina" title="Contactar a Notaria Latina"></span>
        </button>
        <button class="btncontact botonF2">
            <a href="tel:@yield('phoneNumberHidden')">
                <span class="d-flex align-items-center justify-content-center"><img width="25px" height="25px" class="lazy img-fluid" data-src="{{ asset('img/telephone.png') }}" alt="📞"></span>
            </a>
        </button>
        <button class="btncontact botonF3" onclick="openchat()" id="iconwpp">
          <span class="d-flex" style="margin-left: -6px !important"><img class="lazy" data-src="{{asset('img/whatsapp.png')}}" alt="Whatsapp Notary Public Near Me" width="50px" height="50px"></span>
        </button>
    </div>
</div>

<div class="position-fixed" style="bottom: 5px; right: 5px; cursor: pointer" onclick="document.getElementById('chatnotaria').classList.remove('d-none');">
    <div>
        <button class="botonF1">
            <span class="d-flex align-items-center justify-content-center"><img class="lazy" width="35px" height="35px" data-src="{{ asset('img/chat-notaria-latina.png') }}" alt="contactar a notaria latina" title="Abrir Chat Notaria Latina"></span>
        </button>
    </div>
</div>

<!-- Messenger Plugin de chat Code -->
{{-- <div id="fb-root"></div> --}}

<!-- Your Plugin de chat code -->
{{-- <div id="fb-customer-chat" class="fb-customerchat">
</div> --}}

{{-- <script>
    setTimeout(() => {
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "408436099982353");
        chatbox.setAttribute("attribution", "biz_inbox");
    }, 3000);
</script> --}}

<!-- Your SDK code -->
{{-- <script>
    setTimeout(() => {
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v17.0'
          });
        };
      
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    }, 3000);
</script> --}}

<div id="chatnotaria" class="d-none">
    <livewire:chatbot>
</div>
{{-- <script defer id="scriptjquery"></script>
<script defer id="scriptpopper" ></script>
<script defer id="scriptbootstrap" ></script> --}}

@yield('script')
<livewire:scripts/>
<script id="jquery363" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">

document.querySelector('.botonF1').addEventListener('click', function (){
    let btns = document.querySelectorAll('.btncontact');
    btns.forEach(element => {

        if(element.classList.contains('animacionVer')){
            element.classList.remove('animacionVer')
        } else {
            element.classList.add('animacionVer')
        }

    })
})

document.querySelector('.contenedor').addEventListener('mouseleave', function(){
    let btns = document.querySelectorAll('.btncontact');
    btns.forEach(element => {
        element.classList.remove('animacionVer');
    })
})

// document.onreadystatechange = function() {
//         if (document.readyState !== "complete") {
//             document.querySelector("body").style.visibility = "hidden";
//             document.querySelector("#loader").style.visibility = "visible";
//         } else {
//             document.querySelector(
//             "#loader").style.display = "none";
//             document.querySelector(
//             "body").style.visibility = "visible";
//         }
//     };

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

    let button = document.querySelector('.button');
    if(button)button.disabled = true;

    // setTimeout(() => {
    //     document.getElementById('iconcall').style.display = "block";
    // }, 3000);

    //mostrando codigo de pais al cambiar el select
    let country = document.getElementById('sel_country');
    if(country){
        country.addEventListener('change', () => {
            //var country     = document.getElementById('sel_country');
            let cod_country = document.getElementById('cod_country');
            cod_country.value = country.value;
        });
    }

    let country_serv_form = document.getElementById('sel_country_serv');
    if(country_serv_form){
        country_serv_form.addEventListener('change', () => {
            let cod_country_serv = document.getElementById('cod_country_serv');
            cod_country_serv.value = country_serv_form.value;
        });       
    }

    //validacion para formularios con datos de paginas web
    let formlead = document.getElementById('formlead');
    if(formlead){
        formlead.addEventListener('submit', (e) => {
            let message = document.getElementById('message').value;
            if(message.includes('https')){
                e.preventDefault();
            }
        });
    }

    //mostrando div de preguntas despues de 5seg
    //setTimeout(() => {document.getElementById('divpreguntas').style.display='block';document.getElementById("divpreguntas").style.animation = "jump 1s ease";}, 7000);

    //CARGAR EL SCRIPT DE PLUGIN DE FACEBOOK
    var scriptFacebookPlugin = document.createElement('script');
    scriptFacebookPlugin.id = "plugin-facebook";
    scriptFacebookPlugin.async = true;
    scriptFacebookPlugin.defer = true;

    var path = window.location.pathname;

    //CARGO LOS RECURSOS SI LAS URLS SON DIFERENTES AL DE LAS OFICINAS
    function downloadFacebookJSAtOnLoad(){
        if(!(path.match('/newjersey') || path.match('/newyork') || path.match('/florida') || path.match('/partners'))){
            scriptFacebookPlugin.src = "https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v13.0&appId=478871590548026&autoLogAppEvents=1";
            document.getElementsByTagName("script")[0].parentNode.appendChild(scriptFacebookPlugin);
        } else {
            if(screen.width > 580){
            scriptFacebookPlugin.src = "https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v13.0&appId=478871590548026&autoLogAppEvents=1";
            document.getElementsByTagName("script")[0].parentNode.appendChild(scriptFacebookPlugin);
            }
        }
    }

    let script3 = document.createElement("script");

    function downloadJSAtOnload() {
        //document.getElementById('jquery363').src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js";
        script3.src = "{{asset('js/jquery-3.4.1.min.js')}}";
        document.body.appendChild(script3);
        console.log('cargando script de jquery y jquery 3.6.3');
    }

    setTimeout(function(){
        downloadFacebookJSAtOnLoad();
        //console.log('cargando script de facebook snippet...');
    }, 3000);

    let timeToLoadJquery = 2500;
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

    function openchat(){
        let divchat = document.getElementById('chat');
        if(divchat.style.display == "block"){
            divchat.style.animation = "slideout 1s 1";
            setTimeout(() => {
                divchat.style.display = "none";
            }, 1000);
        } else {
            divchat.style.display = "block";
            divchat.style.animation = "slidein 1s 1";
        }

    }

    const selCountry = document.getElementById('sel_country');
    const selState = document.getElementById('sel_state');
    const selCountryServ = document.getElementById('sel_country_serv');
    const selStateServ = document.getElementById('sel_state_serv');

    if(selCountry) selCountry.addEventListener("change", function() {getstates(selState, this);});
    if(selCountryServ) selCountryServ.addEventListener('change', function(){getstates(selStateServ, this);})
    
    const getidbycod = (cod) => {
        let id = 0;
        switch (cod) {case '+54': id = 1; break;case '+591': id = 2; break;case '+56': id = 20; break;case '+57': id = 3; break;case '+506': id = 4; break;case '+593': id = 5; break;case '+503': id = 6; break;case '+34': id = 7; break;case '+1': id = 8; break;case '+502': id = 9; break;case '+504': id = 10; break;case '+52': id = 11; break;case '+505': id = 12; break;case '+507': id = 13; break;case '+595': id = 14; break;case '+51': id = 15; break;case '+1 787': id = 16; break;case '+1 809': id = 17; break;case '+598': id = 18; break;case '+58': id = 19; break;default: break;}
        return id;
    }

    const setimgsrc = (selectCountry) => {
        let imgcountry = "";
        if(selectCountry.id == "sel_country_serv") imgcountry = document.getElementById('img-country-serv');
        else imgcountry = document.getElementById('img-country');
        if(imgcountry) imgcountry.src = "{{asset('img/partners')}}"+"/"+selectCountry.options[selectCountry.selectedIndex].text.replace(/\s+/g, '').toLowerCase()+".png";
    }

    const  getstates = async (selState, selCountry) => {
        selState.options.length = 0;
        let id = getidbycod(selCountry.value);
        setimgsrc(selCountry);
        //let id = selCountry.options[selCountry.selectedIndex].dataset.id;
        const response = await fetch("{{url('getstates')}}/"+id );        
        const states = await response.json();
        let opt = document.createElement('option');
        opt.appendChild( document.createTextNode('Seleccione') );
        opt.value = '';
        selState.appendChild(opt);
            states.forEach(state => {
                let opt = document.createElement('option');
                opt.appendChild( document.createTextNode(state.name_state) );
                opt.value = state.name_state;
                selState.appendChild(opt);
            });
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

        setTimeout(() => {
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
        }, 3000);

        window.addEventListener('scroll', function(){
            if(window.scrollY == 0 && screen.width > 992 && window.location.href == 'https://notarialatina.com/'){
                document.querySelector('.navbar').classList.remove('bg-white');
                document.querySelector('.navbar').style.transition = 'all 0.5s ease';
                document.querySelector('.navbar').classList.remove('shadow');
            } else {
                document.querySelector('.navbar').classList.add('bg-white');
                document.querySelector('.navbar').style.transition = 'all 0.5s ease';
                document.querySelector('.navbar').classList.add('shadow');
            }
        });

        window.addEventListener('load', function(){
            if((window.scrollY == 0 && screen.width < 992) || (window.scrollY == 0 && screen.width < 992 && window.location.href != 'http://localhost/awebnot-master/public/')){
                document.querySelector('.navbar').classList.add('bg-white');
                document.querySelector('.navbar').style.transition = 'all 0.5s ease';
            }
        })
</script>
</body>
<div id="loader" class="center"></div>
</html>
