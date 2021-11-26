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
  
  <title>Notaria Latina en {{$oficina}} - Apostillas, Poderes y Traducciones</title>

  @yield('header')

<?php
  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if(strpos($actual_link, 'localhost') === false){
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VJK9KRV3TL"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-VJK9KRV3TL');
</script>
<?php } ?>
  <style>
    .quienes-somos{      background: rgb(24,55,84);      background: radial-gradient(circle, rgba(24,55,84,1) 0%, rgba(26,29,34,1) 100%);    }
    .f-blue{      background-color: #122944;    }
    .navfoot{      background-color: #333 !important;      height: 70px;    }
    .hrw{      border: 1px solid white;      width: 100px;    }
    .hrb{      border: 1px solid #122944;      width: 100px;    }
    .bg-bordo{background: #522621; border: 0}
  </style>
</head>
<body>


<header>
  <nav class="navbar navbar-dark navfoot">
    <a class="navbar-brand pl-3" href="#">
      <img src="{{asset('img/marca-notaria-latina.png')}}" width="140" height="30" alt="Notaria Latina">
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
  <img id="prisection" src="" class="card-img" alt="Notaria Pública en {{ $oficina }}" style="max-height: 90vh;min-height: 40vh;  object-fit: cover;">
  <div class="card-img-overlay my-auto" style="background:rgba(2, 2, 2, 0.5)">
    <div class="d-sm-block d-md-none text-center" style="margin-top: 20%;">
        <div class="font-italic" style="font-size: 22px; font-weight: 600">{!!$header!!}</div>
    </div>    
    <div class="text-center d-none d-sm-none d-md-block" style="margin-top: 10%;">
      <div class="font-italic" style="font-size: 60px; font-weight: 600">{!!$header!!}</div>
    </div>
  </div>
</section>

<section class="row quienes-somos text-white p-4 align-middle">
  <div class="col-12 text-center align-middle py-4">
    <a href="tel:+{{$tlfhidden??'19082249594'}}" class="btn btn-lg btn-warning" >LLAMAR: <b>{{$tlfshow??'NJ (908) 224-9594'}}</b> </a>
  </div>
</section>

@if ($info != null)
  <section class="container mt-5">
    <div class="row">
      @foreach ($info as $i)
      <div class="col-sm-6 col-md-4 mb-2">
        <div class="card" style="width: 100%; height: 100%; background-color:rgb(247, 247, 247)">
          <div class="card-body text-center" style="color: rgb(102, 102, 102)">
            <h6 class="card-title"><b>{{ $i['0'] }}</b></h6>
            <p class="card-text">{!!  $i['1'] !!}</p>
          </div>
        </div>
      </div>
      @endforeach
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
  @elseif($info == null)
    <h4 class="text-center py-4 px-4">{!!$service!!}</h4>
  @endif
  </section>


<section class="row quienes-somos text-white  m-0">
  <div class="card col-12 p-0" style="border-radius:0;border:0" >
    <img src="{{asset($imgdown)}}" class="card-img" style="height: 100%;object-fit: cover;" alt="..." >
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
      <img id="dirmap" src="" alt="">
    </a>
  </div>
</section>


<section class="row quienes-somos text-white m-0">  
      <div class="col-12 col-md-6 pb-5 px-5 mx-auto">
          <div class="card-body text-center">  
            <h2 class="font-italic font-weight-bold">Solicitar Tramite</h2>      
            <small> Envíe el formulario y un asesor le contactará breve. </small>     
            <form method="POST" action="{{route('landing.thankpostnj')}}">
                @csrf
              <input type="hidden" id="interest" name="interest" value="Landing {{$oficina}}">
              <div class="form-group pt-4">
                <input id="aaa" name="aaa" type="text" class="form-control" placeholder="Nombres"  maxlength="40" minlength="2" autocomplete="off" required>
              </div>
              <div class="form-group">
                <input id="bbb" name="bbb" type="text" class="form-control" placeholder="Teléfono" maxlength="14" minlength="8" autocomplete="off" required>
              </div>
              <div class="form-group">
                <input id="ddd" name="ddd" type="text" class="form-control" placeholder="Mensaje"  maxlength="100" autocomplete="off" required>
              </div>  
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
</script>

</body>
</html>





