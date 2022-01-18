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

@endsection

@section('phoneNumberHidden', '+18007428602')
@section('phoneNumber', '800-742-8602')

@section('content')

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Nosotros</h1>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
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
</div>


@endsection

@section('numberWpp', '13479739888')

@section('script')
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('img/inicio.jpg')";
    });
  </script>
@endsection

