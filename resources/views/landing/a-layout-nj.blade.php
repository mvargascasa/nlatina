<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  @yield('header')


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VJK9KRV3TL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VJK9KRV3TL');
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
  <nav class="navbar navbar-dark navfoot">
  <a class="navbar-brand pl-3" href="{{route('web.index')}}">
      <img src="img/marca-notaria-latina.png" width="140" height="30" alt="">
    </a>

      <div class="d-flex justify-content-end pr-3">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active ">
               <a class="nav-link" href="tel:+{{$tlfhidden??'17187665041'}}" onclick="gtag_report_conversion('tel:+{{$tlfhidden??'17187665041'}}');gtag('event', 'click', { 'event_category': 'Seguimiento de llamadas', 'event_label': 'LandingPage:{{Request::segment(1)}}', 'value': '0'});">
                {{$tlfshow??'NY (718) 766-5041'}} </a>
            </li>
        </ul>
    </div>
  </nav>
</header>






@yield('content')





<section class="row quienes-somos text-white">
  <div class="col-12 text-center p-4"> <h2 class="font-italic font-weight-bold">Quienes Somos</h2> <hr class="hrw"> </div>
  <div class="col-12 col-md-6 text-center">
    <img class="py-5 img-fluid" src="img/marca-notaria-latina.png" alt="" height="180">
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
    <p class="lead">1146 East Jersey St <br> Elizabeth, NJ 07201</p>
    <h5 class="font-weight-bold">Telefonos</h5>
    <p class="lead">NY (718) 766 5041</p>
    <h5 class="font-weight-bold">Email</h5>
    <p class="lead">info@notarialatina.com</p>
  </div>
  <div class="col-12 col-md-6  text-left pb-4 ">
    <a href="https://goo.gl/maps/T6uyypZS7JCXPUEV7" target="_blank">
      <img id="dirmap" src="" alt="">
    </a>
  </div>
</section>




<footer class="text-center navfoot text-white py-3">  Copyright ©2020 Notaria Latina. All rights reserved.  </footer>

<script>
  window.addEventListener('load', (event) => {
      document.getElementById('prisection').style.backgroundImage = "url('{{asset('img/a-ini.jpg')}}')";
      document.getElementById('dirmap').src = "{{asset('img/map.jpg')}}";
  });
</script>

</body>
</html>
