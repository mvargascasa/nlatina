<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  @yield('header')


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



  <style>
    html, body {
        max-width: 100% !important;
        overflow-x: hidden !important;
    }
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
    @media screen and (max-width: 580px){
      #dirmap{width: 90% !important}
      #div-image-map{display: flex !important;justify-content: center !important;}
    }
  </style>
</head>
<body>
  <header>
  <nav class="navbar navbar-dark navfoot">
  <a class="navbar-brand pl-3" href="{{route('web.index')}}">
      <img src="img/marca-notaria-latina.png" width="140" height="30" alt="">
    </a>

      <div class="d-flex justify-content-end pr-3">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active ">
               <a class="nav-link" href="tel:+17187665041" onclick="gtag_report_conversion('tel:+17187665041');gtag('event', 'click', { 'event_category': 'Seguimiento de llamadas', 'event_label': 'LandingPage:{{Request::segment(1)}}', 'value': '0'});">
                NY (718) 766-5041</a>
            </li>
        </ul>
    </div>
  </nav>
</header>






@yield('content')





<section class="row quienes-somos text-white">
  <div class="col-12 text-center p-4"> <h2 class="font-italic font-weight-bold">Quienes Somos</h2> <hr class="hrw"> </div>
  <div class="col-12 col-md-6 text-center">
    <img class="lazy py-5 img-fluid" data-src="img/marca-notaria-latina.png" alt="Notaria Latina en Estados Unidos - Apostillas, Poderes, Traducciones en Linea" width="260" height="180">
  </div>
  <div class="col-12 col-md-6 pb-5 px-5">
      <p class="lead">
        Ofrecemos servicios notariales y atención integral, de manera rápida y segura, conforme a las facultades otorgadas por la ley de los Estados Unidos.
      </p>
      <p class="lead">
        Contamos con más de 10 años de experiencia, con un personal altamente calificado y capacitado en asesoría y gestión de trámites, que usted necesita.
      </p>
      <p class="lead">
        Somos su mejor opción respecto a notaría pública.
      </p>
  </div>
</section>

<section class="row">
    <div class="col-12 text-center pt-4"> <h2 class="font-italic font-weight-bold">Contáctanos</h2> <hr class="hrb"> </div>
  <div class="col-12 col-md-6 text-right pb-4 px-5">
    <h5 class="font-weight-bold">Dirección</h5>
    <p class="lead">67-03 Roosevelt Avenue <br> Woodside, NY 11377</p>
    <h5 class="font-weight-bold">Telefonos</h5>
    <p class="lead">NY (718) 766 5041</p>
    <h5 class="font-weight-bold">Email</h5>
    <p class="lead">info@notarialatina.com</p>
  </div>
  <div class="col-12 col-md-6 pb-4">
    <a id="div-image-map" href="https://g.page/notariapublicalatina" target="_blank">
      <img width="50%" height="100%" id="dirmap" class="lazy img-fluid" data-src="{{ asset('img/maps-newyork-notaria.webp') }}" alt="Notaria Latina en Estados Unidos en Linea - Apostillas, Poderes, Traducciones">
    </a>
  </div>
</section>




<footer class="text-center navfoot text-white py-3">  Copyright ©2020 Notaria Latina. All rights reserved.  </footer>

<script>
  window.addEventListener('load', (event) => {
      document.getElementById('prisection').style.backgroundImage = "url('img/a-ini.webp')";
      //document.getElementById('dirmap').data-src = "img/maps-newyork-notaria.webp";
  });
  document.addEventListener("DOMContentLoaded",function(){var e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var n=new IntersectionObserver(function(e,t){e.forEach(function(e){if(e.isIntersecting){var t=e.target;t.src=t.dataset.src,t.classList.remove("lazy"),n.unobserve(t)}})});e.forEach(function(e){n.observe(e)})}else{var t;function r(){t&&clearTimeout(t),t=setTimeout(function(){var n=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+n&&(e.src=e.dataset.src,e.classList.remove("lazy"))}),0==e.length&&(document.removeEventListener("scroll",r),window.removeEventListener("resize",r),window.removeEventListener("orientationChange",r))},20)}e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)}});
</script>

</body>
</html>
