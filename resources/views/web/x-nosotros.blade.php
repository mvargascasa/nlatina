@extends('layouts.web')
@section('header')
<title>Servicios de Apostillas en Queens New York - Notaria Latina</title> 
<meta name="description"        content="Somos una Notaría en Queens New York que ofrece servicios de Apostillas, Poderes, Traducciones, Affidávit, Autorizaciones de Viaje, Cartas de Invitación.">       
<meta name="keywords"           content="Notaría Pública y Apostilla en Queens New York, Notaría Pública y Apostilla near me, notaria latina, notario publico, notary public near me, notario cerca de mi, notario publico near me, notaría nueva york, notary public queens" />

<meta property="og:url"         content="{{route('web.nosotros')}}" />
<meta property="og:type"        content="website" />
<meta property="og:title"       content="Notaría Pública en Queens New York que ofrece servicios de Apostillas - Notaria Latina" />
<meta property="og:description" content="Somos una Notaría en Queens New York que ofrece servicios de Apostillas, Poderes, Traducciones, Affidávit, Autorizaciones de Viaje, Cartas de Invitación." />
<meta property="og:image"       content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />

<script defer src="{{ asset('js/navbar-style.js') }}"></script>

<style>
    .navbar-img{filter: brightness(0) invert(1) !important;}
    @media screen and (max-width: 575px){
        .img-header{height: 100vh !important}
        .title{font-size: 1.4rem !important}
        .padding-x-0{padding-left: 8% !important; padding-right: 8% !important; padding-top: 5% !important}
        .order-1-row-2{order: 1 !important}
        .order-2-row-2{order: 2 !important}  
    }
</style>
@endsection

@section('phoneNumberHidden', '+18007428602')
@section('phoneNumber', '800-742-8602')

@section('content')

<section id="prisection" class="position-relative">
    <img class="img-header" src="{{ asset('img/banner-nosotros.webp') }}" alt="" style="height: 900px; width: 100%; object-fit: cover; object-position: center top;">
    <div class="position-absolute text-white text-center w-100" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
        <h1 class="title" style="font-weight: 500; font-size: 3rem">Descubra nuestra <br> <span style="color: #FFBE32; font-weight: 700">historia y experiencia</span></h1>
    </div>
</section>

  <section class="row">
    <article class="col-sm-7 d-flex align-items-center" style="padding-left: 0px !important; padding-right: 0px !important; background-repeat: no-repeat; background-size: cover; background-position: center; background-image: url({{ asset('img/fondo-quienes-somos.png') }});">
        <div class="padding-x-0" style="padding-left: 25%; padding-right: 10%">
            <div>
                <p class="d-flex align-items-center" style="font-size: 14px; color: #122944">NOSOTROS <span class="ml-2" style="background-color: #FFBE32; height: 1.8px; width: 70px"></span></p>
            </div>
            <div style="color: #122944;">
                <h2 style="font-weight: 400">¿Quiénes <span style="font-weight: 700">somos?</span></h2>
                <div style="font-size: 1.1rem; text-align: justify">
                    <p>Somos <span style="font-weight: 600">Notaría Pública Latina</span>, nos dedicamos a ofrecer servicios notariales de alta calidad a los 50 estados de EE.UU con el objetivo de brindar la máxima seguridad en la certificación de hechos, de conformidad con las facultades otorgadas por la ley.</p>
                    <p>Durante más de 15 años, hemos tenido el honor de contar con su confianza, lo que ha contribuidoen gran medida al crecimiento y desarrollo de nuestra empresa.</p>
                    <p>Nuestra misión principal es proporcionar soluciones integrales a través de un servicio notarial completo y confiable.</p>
                </div>
            </div>
        </div>
    </article>
    <article class="col-sm-5" style="padding-left: 0px !important; padding-right: 0px !important">
        <img class="img-fluid" src="{{ asset('img/notaria-con-sello.png') }}" alt="">
    </article>
  </section>

  <section class="row">
    <article class="col-sm-5 pr-0 pl-0 order-2-row-2">
        <img class="img-fluid" src="{{ asset('img/img-nuestra-experiencia.png') }}" alt="">
    </article>
    <article class="col-sm-7 pl-0 pr-0 d-flex align-items-center order-1-row-2" style="background-color: #122944; color: #ffffff">
        <div class="padding-x-0" style="padding-left: 10%; padding-right: 25%">
            <div>
                <p class="d-flex align-items-center justify-content-end" style="font-size: 14px; color: #ffffff"><span class="mr-2" style="background-color: #FFBE32; height: 1.8px; width: 70px"></span> NOSOTROS</p>
            </div>
            <div style="font-size: 1.1rem; text-align: justify; direction: rtl">
                <h2 style="font-weight: 400">Nuestra <span style="font-weight: 700; color: #FFBE32">experiencia</span></h2>
                <p>Con una trayectoria de más de 15 años en el campo notarial, en Notaría Pública Latina hemos acumulado una valiosa experiencia que respalda la excelencia en nuestros servicios</p>
                <p>Nuestra larga historia de compromiso con la comunidad nos ha permitido perfeccionar y agilizar los trámites notariales, convirtiéndonos en un referente de confianza.</p>
            </div>
        </div>
    </article>
  </section>

  <section class="row">
    <article class="col-sm-7 d-flex align-items-center" style="padding-left: 0px !important; padding-right: 0px !important; background-repeat: no-repeat; background-size: cover; background-position: center; background-image: url({{ asset('img/fondo-nuestro-personal.png') }});">
        <div class="padding-x-0" style="padding-left: 25%; padding-right: 10%">
            <div>
                <p class="d-flex align-items-center" style="font-size: 14px; color: #122944">NOSOTROS <span class="ml-2" style="background-color: #FFBE32; height: 1.8px; width: 70px"></span></p>
            </div>
            <div style="color: #122944;">
                <h2 style="font-weight: 400">Nuestro <span style="font-weight: 700">personal</span></h2>
                <div style="font-size: 1.1rem; text-align: justify">
                    <p>Nuestro equipo está compuesto por profesionales jóvenes y altamente capacitados, comprometidos con brindarle la mejor asistencia en todos los trámites que pueda necesitar</p>
                    <p>En <span style="font-weight: 600">Notaría Pública Latina</span>, creemos que la juventud, la experiencia y la capacitación se combinan para ofrecer un servicio notarial de primera calidad.</p>
                    <p>Somos su opción de confianza para todos los asuntos relacionados con la notaría pública, y nos comprometemos a proporcinarle un servicio integral, rápido y eficaz.</p>
                </div>
            </div>
        </div>
    </article>
    <article class="col-sm-5" style="padding-left: 0px !important; padding-right: 0px !important">
        <img class="img-fluid" src="{{ asset('img/img-nuestro-personal.png') }}" alt="">
    </article>
  </section>

{{-- <div class="container pt-4">
        <div class="row">
            <div class="col-12 col-md-6 quienes-somos text-center d-flex align-items-center justify-content-center">
                <img class="py-5 img-fluid" src="{{asset('img/marca-notaria-latina.png')}}" alt="" height="180">
            </div>
            <div class="col-12 col-md-6 text-muted p-4">


                Somos una oficina que ofrece servicios notariales para brindar la mayor seguridad mediante la fe publica a hechos, de conformidad a las facultades otorgadas por la ley.

                <br><br>Por más de 10 años contamos con su ayuda en el crecimiento y progreso de nuestra empresa. Es por eso que nuestro mayor afán es ofrecerle todas las soluciones con un servicio totalmente integral de notaria.

                <br><br>Contamos con un personal joven y muy capacitado para la realización de los trámites que usted necesita, somos la mejor opción con la que puede contar respecto a notaría pública.

                <br><br>Es por eso que nos comprometemos con usted a brindarle un servicio integral, rápido y siempre eficaz.

                <br><br>Agradecemos su elección y estamos a su disposición siempre que lo requiera.

            </div>
        </div>
</div> --}}


@endsection

@section('numberWpp', '13479739888')

@section('script')
<script>
    // window.addEventListener('load', (event) => {
    //     document.getElementById('prisection').style.backgroundImage = "url('img/banner-nosotros.webp')";
    // });
  </script>
@endsection

