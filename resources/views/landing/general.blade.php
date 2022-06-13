<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  @if ($meta_description != null)
  <meta name="description" content="{{$meta_description}}">    
  @endif
  @if ($keywords != null)
  <meta name="keywords" content="{{ $keywords }}">
  @endif
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="robots" content="index, follow">

  <meta property="og:url" content="{{ Request::url() }}">
  <meta property="og:type" content="website">
  <meta property="og:title" content="@isset($title){{$title}}@else Notaria Latina en {{ $oficina }} - Apostillas, Poderes y Traducciones @endisset">
  <meta property="og:description" content="@isset($meta_description){{$meta_description}}@else Realizamos todo tipo de notarización de documentos en New Jersey como apostillas, poderes, traducciones de una manera rápida y segura. Contáctenos ahora! ✔ @endisset">
  <meta property="og:image" content="{{asset($imgup)}}">

  <title>@isset($title) {{ $title }} @else Notaria Latina en {{$oficina}} - Apostillas, Poderes y Traducciones @endisset</title>

  <script>
    var stylesheet = document.createElement('link');
    stylesheet.href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css";
    stylesheet.rel = 'stylesheet';
    setTimeout(function () {
        document.getElementsByTagName('head')[0].appendChild(stylesheet);
    }, 3000);
  </script>

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

    {{-- {!! htmlScriptTagJsApi([
      'callback_then' => 'callbackThen',
      'callback_catch' => 'callbackCatch'
    ]) !!} --}}

  @yield('header')

<?php
  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if(strpos($actual_link, 'localhost') === false){
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script id="script_analytics" async></script>
<script>
  setTimeout(() => {
    document.getElementById('script_analytics').src = 'https://www.googletagmanager.com/gtag/js?id=G-VJK9KRV3TL';
    //console.log('cargando script de analytics despues de 3seg...');
  }, 2000);
</script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-VJK9KRV3TL');
</script>
<?php } ?>
  <style>
    html, body {max-width: 100% !important;overflow-x: hidden !important;}
    .quienes-somos{      background: rgb(24,55,84);      background: radial-gradient(circle, rgba(24,55,84,1) 0%, rgba(26,29,34,1) 100%);    }
    .f-blue{      background-color: #122944;    }
    .navfoot{      background-color: #333 !important;      height: 70px;    }
    .hrw{      border: 1px solid white;      width: 100px;    }
    .hrb{      border: 1px solid #122944;      width: 100px;    }
    .bg-bordo{background: #522621; border: 0}
    /* QUITAR SPINNERS DE INPUT TYPE NUMBER */
    /* CHROME */
    input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none;margin: 0;}
    /* FIREFOX */
    input[type="number"] {-moz-appearance: textfield;}input[type="number"]:hover,input[type="number"]:focus {-moz-appearance: number-input;}
    /* OTHER */
    input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none;margin: 0;}
    @media screen and (max-width: 1000px){h1{font-size: 50px !important}}
    @media screen and (max-width: 800px){h1{font-size: 40px !important}}
    @media screen and (max-width: 580px){#divpais{display: inline !important;}#divcodigoandtelefono{width: 100% !important;margin-top: 16px;margin-bottom: 16px;}#pais{width: 100% !important;}h1{font-size: 30px !important}}
    #iconcall{bottom: 40px !important; right: 10px !important; animation: wiggle 3s linear infinite}
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
    .grecaptcha-badge { visibility: hidden; }
  </style>
</head>
<body>


<header>
  <nav class="navbar navbar-dark navfoot">
    <a class="navbar-brand pl-3" href="{{ route('web.index') }}">
      <img src="{{asset('img/marca-notaria-latina.png')}}" width="140" height="30" alt="@isset($title){{$title}} @else Notaria Latina en {{ $oficina }} - Apostillas, Poderes y Traducciones @endisset">
    </a>
      <div class="d-flex justify-content-end pr-3">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active ">
                <a class="nav-link" href="tel:+{{$tlfhidden??'19082249594'}}" > <small>{{$oficina}}</small> <br> {{$tlfshow}}  </a>
            </li>
        </ul>
    </div>
  </nav>
</header>


<section class="card text-white" style="border-radius:0;border:0" >
  <img id="prisection" src="" class="card-img" alt="@isset($title) {{ $title }} @else Notaria Latina en {{ $oficina }} - Apostillas, Poderes, Traducciones @endisset" style="max-height: 90vh;min-height: 40vh;  object-fit: cover; width: 100%; height: 100%">
  <div class="card-img-overlay my-auto" style="background:rgba(2, 2, 2, 0.5)">
    {{-- <div class="d-sm-block d-md-none text-center" style="margin-top: 20%;">
        <div class="font-italic"><h1 style="font-size: 22px; font-weight: 600">{!!$header!!}</h1></div>
    </div>     --}}
    <div class="text-center d-md-block" style="margin-top: 12%;">
      <div class="font-italic"><h1 style="font-size: 60px; font-weight: 600">{!!$header!!}</h1></div>
    </div>
  </div>
</section>

<section class="row quienes-somos text-white p-4 align-middle">
  <div class="col-12 text-center align-middle py-4">
    <a href="tel:+{{$tlfhidden??'19082249594'}}" class="btn btn-lg btn-warning" >LLAMAR: <b>{{$tlfshow??'NJ (908) 224-9594'}}</b> </a>
  </div>
</section>

@if ($landing == "Poderes")
  <section class="container mt-5">
    <div class="row">
      <div class="col-sm-6 col-md-4 mb-2">
        <div class="card" style="width: 100%; height: 100%; background-color:rgb(247, 247, 247)">
          <div class="card-body text-center" style="color: rgb(102, 102, 102)">
            <h2 class="card-title" style="font-size: 16px"><b>TIPOS DE CARTA PODER</b></h2>
            <p class="card-text">
              Realizamos todo tipo de Poder Especial o Poder General Apostillados
              para toda Latinoamérica
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 mb-2">
        <div class="card" style="width: 100%; height: 100%; background-color:rgb(247, 247, 247)">
          <div class="card-body" style="color: rgb(102, 102, 102)">
            <h2 class="card-title text-center" style="font-size: 16px"><b>SOLICITE UN PODER PARA:</b></h2>
            <p class="card-text">
              <ul>
                <li>Gestionar sus bienes, trámites bancarios</li>
                <li>Carta poder para viaje de menor</li>
                <li>Carta poder para compra o venta de propiedades</li>
                <li>Carta poder para solicitar créditos</li>
                <li>Carta poder para gestión de pasaporte</li>
                <li>Carta poder para pleitos y cobranzas</li>
              </ul>
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 mb-2">
        <div class="card" style="width: 100%; height: 100%; background-color:rgb(247, 247, 247)">
          <div class="card-body text-center" style="color: rgb(102, 102, 102)">
            <h2 class="card-title" style="font-size: 16px"><b>¿DONDE HACER UNA CARTA PODER EN <p style="text-transform: uppercase">{{ $oficina }}?</p></b></h2>
            <p class="card-text">
              Llámenos y agende una cita en nuestras oficinas ubicadas en {{ $oficina }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
  
<section class="row justify-content-md-center py-4">
@if($service=='General')
    <div class="col-12 text-center py-4">
        <h2 class="font-italic font-weight-bold">Nuestros Servicios en {{ $oficina }}</h2>
        <hr class="hrb">
      </div>
  
  
    <div class="col lead col-12 col-md-4 col-lg-3 col-xl-3 px-4">
  
      <h2><span class="lead font-weight-bold ">Apostillas:</span></h2>
      <ul>
        <li>Diplomas</li>
        <li>Certificados de nacimiento.</li>
        <li>Poderes</li>
        <li>Contratos.</li>
        <li>Testamentos.</li>
    </ul>
    </div>
  
    <div class="col lead col-12 col-md-4 col-lg-3 col-xl-3 px-4">
      <h2><span class="lead font-weight-bold ">Poderes:</span></h2>
     <ul>
      <li>Para compra/venta.</li>
      <li>Administración de Propiedades.</li>
      <li>Inversiones de Dinero.</li>
      <li>Reclamos legales.</li>
      <li>Procedimientos en su nombre.</li>
    </ul>
    </div>
  
    <div class="col lead col-12 col-md-4 col-lg-3 col-xl-3 px-4">
      <h2><span class="lead font-weight-bold ">Traducciones:</span></h2>
     <ul>
      <li>Certificados de nacimiento.</li>
      <li>Diplomas.</li>
      <li>Certificados de matrimonio.</li>
      <li>Documentos de divorcio.</li>
      <li>Certificados de defunción.</li>
    </ul>
    </div>
  @elseif($landing != "Poderes")
    <h4 class="text-center py-4 px-4">{!!$service!!}</h4>
  @endif
  </section>


<section class="row quienes-somos text-white  m-0">
  <div class="card col-12 p-0" style="border-radius:0;border:0" >
    <img src="{{asset($imgdown)}}" class="card-img" style="height: 100%;object-fit: cover;" alt="@isset($title){{$title}}@else Notaria Latina en {{$oficina}} - Apostillas, Poderes, Traducciones @endisset" >
  </div>
</section>

<section class="row ">
    <div class="col-12 text-center pt-4">  </div>
  <div class="col-12 col-md-6 text-center px-4 px-5">
    <h4 class="font-weight-bold">Dirección</h4>
    <p class="lead"> <a style="color:black" href="{{$dirlink}}" target="_blank"> {!!$dirtext!!} </a> </p>
    <h4 class="font-weight-bold">Telefonos</h4>
    <p class="lead"><a style="color:black" href="tel:+{{$tlfhidden??'19082249594'}}" target="_blank"> {{$tlfshow??'NJ (908) 224-9594'}} </a> </p>
    <h4 class="font-weight-bold">Email</h4>
    <p class="lead">info@notarialatina.com</p>
  </div>
  <div class="col-12 col-md-6  text-center pb-4 ">
    <a href="{{$dirlink}}" target="_blank">
      <img id="dirmap" width="350vw" height="280vh" src="" alt="@isset($title){{$title}} @else Notaria Latina en {{$oficina}} - Apostillas, Poderes y Traducciones @endisset">
    </a>
  </div>
</section>


<section class="row quienes-somos text-white m-0">  
      <div class="col-12 col-md-6 pb-5 px-3 mx-auto">
          <div class="card-body text-center">  
            <h2 class="font-italic font-weight-bold">Solicitar Tramite</h2>      
            <small> Envíe el formulario y un asesor le contactará breve. </small>     
            <form method="POST" action="{{route('landing.thankpostnj')}}" id="formlead">
                @csrf
              <input type="hidden" id="interest" name="interest" value="Landing {{$oficina}}">
              <div class="form-group pt-4">
                <input id="aaa" name="aaa" type="text" class="form-control" placeholder="Nombre y Apellido"  maxlength="40" minlength="2" autocomplete="off" required>
              </div>
              <div id="divpais" class="form-group d-flex">
                <select id="pais" name="pais" class="form-control mr-2" style="width: 50%" required>
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
                <div id="divcodigoandtelefono" class="d-flex" style="width: 50%">
                  <input type="text" id="telf" name="codpais" class="form-control" style="border-radius: 5px 0px 0px 5px; width: 75px" readonly/>
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
                    <input id="bbb" name="bbb" type="number" class="form-control" placeholder="Teléfono" maxlength="14" minlength="8" autocomplete="off" required>
                  </div>
                </div>
              </div> --}}
              <div class="form-group">
                <input id="ddd" name="ddd" type="text" class="form-control" placeholder="Mensaje"  maxlength="100" autocomplete="off" required>
              </div>
              <input type="hidden" name="aux" style="font-size: 10px" placeholder="Si puede ver este campo, por favor ignórelo" class="form-control" readonly>  
              <button class="btn btn-lg btn-warning btn-block" type="submit">INICIAR TRAMITE</button>
            </form>
          </div> 
      </div>
</section>

<a onclick="gtag('event', 'click', { 'event_category': 'Mensajes Whatsapp', 'event_label': 'HomePage:{{Request::segment(1)}}', 'value': '0'});" href="https://api.whatsapp.com/send?phone={{ $tlfwpp }}" target="_blank">
  <div class="d-flex justify-content-center align-items-center px-3 py-1 text-white" style="position: fixed; bottom: 0px; right: 10px; background-color: #128C7E; border-radius: 10px 10px 0px 0px">
  {{-- Consultar en linea <i class="fab fa-whatsapp ml-1"></i> --}}
  Consultar en linea <img width="25" height="25" class="lazy ml-1 mb-1" data-src="{{asset('img/notaria-latina-new-york.svg')}}" alt="Notaria Latina en Estados Unidos">
  </div>
</a>

<div id="divpreguntas" style="position: fixed; bottom: 48px; right: 60px; background-color: #122944; color: #ffffff; border-radius: 10px 10px 10px 10px; padding: 2px 7px 2px 7px; border: 2px solid #ffffff; display: none">
  <div style="position: relative">
      <div style="position: absolute; right: -10px; top: -16px; background-color: #122944; color: #ffffff; padding: 0px 6px 3px 6px; border-radius: 25px; border: 2px solid #ffffff; font-size: 10px; font-weight: 500; cursor: pointer" onclick="document.getElementById('divpreguntas').style.display = 'none'">
          x
      </div>
  </div>
  <div style="font-size: 14px">
      <b style="font-weight: 500">¿Tiene preguntas?</b> Llámenos ahora
  </div>
</div>

<div id="iconcall" style="padding: 8px 11px 10px 11px; border-radius: 25px; position: fixed; bottom: 50px; right: 10px; background-color: #122944; border: 2px solid #ffffff;" class="d-flex">
  <a href="tel:+{{$tlfhidden}}">
    <img width="20" height="20" class="lazy img-fluid" data-src="{{ asset('img/telephone.webp') }}" alt="Notaria Latina">
    {{-- <i style="color: #ffffff; font-size: 18px" class="fas fa-phone"></i> --}}
  </a>
</div>

<footer class="text-center navfoot text-white py-3">  Copyright ©2020 Notaria Latina. All rights reserved.  </footer>

<script>
  window.addEventListener('load', (event) => {
      document.getElementById('prisection').src = "{{asset($imgup)}}";
      document.getElementById('dirmap').src = "{{asset($dirmap)}}";
      console.log('ok');
  });

  //mostrando div que va al lado del icono de llamar
  setTimeout(() => {document.getElementById('divpreguntas').style.display='block';document.getElementById("divpreguntas").style.animation = "jump 1s ease";}, 5000);

  // var pais = document.getElementById('pais');
  // var telf = document.getElementById('telf');

  // pais.onchange = function(e) {
	//   telf.value = this.value;
	//   if((this.value).trim() != '') {
  //   telf.disabled = false;
	// } else {
	// 	telf.disabled = true;
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

  document.addEventListener("DOMContentLoaded",function(){var e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var n=new IntersectionObserver(function(e,t){e.forEach(function(e){if(e.isIntersecting){var t=e.target;t.src=t.dataset.src,t.classList.remove("lazy"),n.unobserve(t)}})});e.forEach(function(e){n.observe(e)})}else{var t;function r(){t&&clearTimeout(t),t=setTimeout(function(){var n=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+n&&(e.src=e.dataset.src,e.classList.remove("lazy"))}),0==e.length&&(document.removeEventListener("scroll",r),window.removeEventListener("resize",r),window.removeEventListener("orientationChange",r))},20)}e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)}});

</script>

</body>
</html>





