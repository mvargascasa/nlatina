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
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta property="og:url" content="{{ Request::url() }}">
  <meta property="og:type" content="website">
  <meta property="og:title" content="@isset($title){{$title}}@else Notaria Latina en {{ $oficina }} - Apostillas, Poderes y Traducciones @endisset">
  
  <meta property="og:image" content="{{asset($imgup)}}">
  <title>@isset($title) {{ $title }} @else Notaria Latina en {{$oficina}} - Apostillas, Poderes y Traducciones @endisset</title>

  <script type="text/javascript">
    function callbackThen(response){
        // read HTTP status
        console.log(response.status);
        // read Promise object
        response.json().then(function(data){
        console.log(data);
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
        console.log('cargando script recaptcha...');
    }, 3500);

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
            console.log('ejecutando codigo del recaptcha...');
    }, 4000);
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
    console.log('cargando script de analytics despues de 3seg...');
  }, 3000);
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
    @media screen and (max-width: 580px){#divpais{display: inline !important;}#divcodigoandtelefono{width: 100% !important;margin-top: 16px;margin-bottom: 16px;}#pais{width: 100% !important;}}
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
    <div class="d-sm-block d-md-none text-center" style="margin-top: 20%;">
        <div class="font-italic"><h1 style="font-size: 22px; font-weight: 600">{!!$header!!}</h1></div>
    </div>    
    <div class="text-center d-none d-sm-none d-md-block" style="margin-top: 10%;">
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
            <h6 class="card-title"><b>TIPOS DE CARTA PODER</b></h6>
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
            <h6 class="card-title text-center"><b>SOLICITE UN PODER PARA:</b></h6>
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
            <h6 class="card-title"><b>¿DONDE HACER UNA CARTA PODER EN <p style="text-transform: uppercase">{{ $oficina }}?</p></b></h6>
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
        <h2 class="font-italic font-weight-bold">Nuestros Servicios</h2>
        <hr class="hrb">
      </div>
  
  
    <div class="col lead col-12 col-md-4 col-lg-3 col-xl-3 px-4">
  
      <span class="lead font-weight-bold ">Apostillas:</span>
      <ul>
        <li>Diplomas</li>
        <li>Certificados de nacimiento.</li>
        <li>Poderes</li>
        <li>Contratos.</li>
        <li>Testamentos.</li>
    </ul>
    </div>
  
    <div class="col lead col-12 col-md-4 col-lg-3 col-xl-3 px-4">
      <span class="lead font-weight-bold ">Poderes:</span>
     <ul>
      <li>Para compra/venta.</li>
      <li>Administración de Propiedades.</li>
      <li>Inversiones de Dinero.</li>
      <li>Reclamos legales.</li>
      <li>Procedimientos en su nombre.</li>
    </ul>
    </div>
  
    <div class="col lead col-12 col-md-4 col-lg-3 col-xl-3 px-4">
      <span class="lead font-weight-bold ">Traducciones:</span>
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
            <form method="POST" action="{{route('landing.thankpostnj')}}">
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


<footer class="text-center navfoot text-white py-3">  Copyright ©2020 Notaria Latina. All rights reserved.  </footer>

<script>
  window.addEventListener('load', (event) => {
      document.getElementById('prisection').src = "{{asset($imgup)}}";
      document.getElementById('dirmap').src = "{{asset($dirmap)}}";
      console.log('ok');
  });

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

</script>

</body>
</html>





