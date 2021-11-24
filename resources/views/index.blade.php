@extends('layouts.web')

@section('header')
<?php
    $mobile = false; 
    if(isset($_SERVER['HTTP_USER_AGENT'])){
        $useragent= $_SERVER['HTTP_USER_AGENT'];
        $ismobile=preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|zh-cn|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4));
        if($ismobile) $mobile = true; 
    }
?>
    <title>Notaría Latina - Notario Público en Queens New York</title>
    <meta name="description" content="Notaría Latina - Notario Público en Queens New York. Gestión en Línea en todo EE.UU. Poderes, Apostillas, Traducciones, Autorizaciones de Viaje, Affidavit."/>
    <meta name="keywords" content="notaria latina, notario publico, notario cerca de mi, notario publico near me, traducción de documentos near me, apostillar documentos near me, notaría nueva york, notary public queens" />

    <meta property="og:url"                content="{{route('web.index')}}" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Notaría Latina - Notario Público en Queens New York." />
    <meta property="og:description"        content="Gestión en Línea en todo EE.UU. Poderes, Apostillas, Traducciones, Autorizaciones de Viaje, Affidavit." />
    <meta property="og:image"              content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />
    

@endsection
@section('content')



<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active"  style="background:rgba(2, 2, 2, 0.5);">
          <img src="{{asset('img/5.jpg')}}" class="d-block w-100" alt="..." 
          style="height: 550px;object-fit: cover; object-position: left top;">
          <div class="carousel-caption">
              <h1 class="tit-not">Notaría Pública</h1>
              <h2 class="heading-title">Gestión Fácil y Rápida</h2>
              <h5 class="heading-title">Notarizamos Documentos</h5>
              <hr width="200" style="border-color: #fff">
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>
        </div>

@if(!$mobile)
        <div class="carousel-item"  style="background:rgba(2, 2, 2, 0.5);">
          <img src="{{asset('img/2.jpg')}}" class="d-block w-100" alt="..." 
          style="height: 550px;object-fit: cover; object-position: left bottom;">
          <div class="carousel-caption">
              <h1 class="tit-not">TRADUCCIONES</h1>
              <h5 class="heading-title">Notarizamos Documentos</h5>
              <hr width="200" style="border-color: #fff">
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>
        </div>
        <div class="carousel-item"  style="background:rgba(2, 2, 2, 0.5);">
          <img src="{{asset('img/3.jpg')}}" class="d-block w-100" alt="..." 
          style="height: 550px;object-fit: cover; object-position: left top;">
          <div class="carousel-caption">
              <h1 class="tit-not">APOSTILLAS</h1>
              <h5 class="heading-title">Notarizamos Documentos</h5>
              <hr width="200" style="border-color: #fff">
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>
        </div>
        <div class="carousel-item"  style="background:rgba(2, 2, 2, 0.5);">
          <img src="{{asset('img/4.jpg')}}" class="d-block w-100" alt="..." 
          style="height: 550px;object-fit: cover; object-position: left bottom;">
          <div class="carousel-caption">
              <h1 class="tit-not">PODERES GENERALES</h1>
              <h2 class="heading-title">Y ESPECIALES</h2>
              <h5 class="heading-title">Notarizamos Documentos</h5>
              <hr width="200" style="border-color: #fff">
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>
        </div>
@endif

    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
  </div>

  <div class="p-2" style=" position: absolute;right: 20px;top: 80px;z-index: 999">
    <a class="text-warning" href="tel:+18007428602" style="font-weight: bols;" onclick="gtag_report_conversion('tel:+18007428602');gtag('event', 'click', { 'event_category': 'Seguimiento de llamadas', 'event_label': 'HomePage:{{Request::segment(1)}}', 'value': '0'});">
        <i class="fa fa-phone-square-alt"></i> 800-742-8602
    </a>
</div>

<div style="background-color: #333">
    <div class="container" >
        <div class="row text-white">
            <div class="col-12 col-sm-6 p-4 my-2">
                <span class="text-muted font-weight-bold">¿Por qué elegirnos?</span> <br><br>
                <h3 class="heading-title pb-4">Brindamos el mejor servicio y asesoramiento a latinos en Estados Unidos.</h3>
                <hr class="hrwf">
                <img id="imgdoc" class="mx-4" src="{{asset('img/docverify-approved-enotary-small.png')}}" height="80" alt="">
                <img id="imgnna" class="mx-4" src="{{asset('img/national-notary-association.png')}}" height="80" alt="">
            </div>
            <div class="col-12 col-sm-6 p-4 my-4  d-flex align-items-center">


                <span style="font-size:18px; text-indent: 40px;">
                  Somos una notaría autorizada, para autenticar documentos en Estados Unidos, por medio de una Apostilla. Nuestro servicio es realizado bajo normas y reglas estrictamente legales, para que su trabajo sea entregado con la mayor prontitud y satisfacción.
                  <br><br>
                  Brindamos servicios notariales para toda Latinoamérica desde los Estados Unidos.</span>
            </div>
        </div>
    </div>
</div>


<div class="container">
  <div class="row py-4">
      <div class="col-12 text-center py-4">
          <h2 class="tit-not">Nuestros Servicios</h2>
          <hr class="hrb">
        </div>
      <div class="col-12 col-sm-12 col-md-4">
          <div class="serviceBox">
              <h3 class="title">Apostillas</h3>
              <a class="stretched-link" href="{{route('web.apostillas')}}">
              <div class="service-icon">
                  <img class="pt-3" src="{{asset('img/apostillas.png')}}" width="50" alt="">
              </div>
              </a>
              <p class="description">
                  Autentificamos sus documentos solicitados por entidades de otro país diferente al originario mediante la apostilla de los mismos.
              </p>
          </div>
      </div>

      <div class="col-12 col-sm-12 col-md-4">
          <div class="serviceBox">
              <h3 class="title">Poderes</h3>
              <a class="stretched-link" href="{{route('web.poderes')}}">
              <div class="service-icon">
                  <img class="pt-4" src="{{asset('img/poderes.png')}}" width="40" alt="">
              </div>
              </a>
              <p class="description">
                  Gestione sus trámites legales sin estar presente por medio de un apoderado de confianza, una solución para gestionar bienes y trámites importantes.
              </p>
          </div>
      </div>

      <div class="col-12 col-sm-12 col-md-4">
          <div class="serviceBox">
              <h3 class="title">Traducciones</h3>
              <a class="stretched-link" href="{{route('web.traducciones')}}">
              <div class="service-icon">
                  <img class="pt-4" src="{{asset('img/traducciones.png')}}" width="40" alt="">
              </div>
              </a>
              <p class="description">
                  Transcripción de documentos de un idioma a otro diferente, certificados por un notario para ser presentados frente a las entidades que lo soliciten.
              </p>
          </div>
      </div>

  </div>

</div>

</div>

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
 aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-white" style="background-color: #333 !important;">
          <h5 class="modal-title" id="exampleModalLabel">Complete el siguiente formulario y en breve le contactamos.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: #FFF !important;">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @include('z-form')
        </div>
      </div>
    </div>
  </div>
@endsection



@section('script')
<script>
    window.addEventListener('load', (event) => {
        //document.getElementById('prisection').style.backgroundImage = "url('img/inicio.jpg')";
        document.getElementById('imgdoc').src = "img/docverify-approved-enotary-small.png";
        document.getElementById('imgnna').src = "img/national-notary-association.png";
    });
  </script>
@endsection

