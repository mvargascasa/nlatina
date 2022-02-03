@extends('layouts.web')
@section('header')
<title>Traducciones Notarizadas y Apostilladas en {{ $data['office'] }} - Notaria Latina</title> 
<meta name="description"        content="Realizamos traducciones de documentos para sus trámites más importantes.Para las traducciones de documentos el único requisito es presentar el documento original que desea traducir. Traducciones en {{ $data['office'] }}">       
<meta name="keywords"           content="Traducciones Notarizadas y Apostilladas en {{ $data['office'] }}, Traducciones Notarizadas y Apostilladas near me, notaria latina, notario publico, notary public near me, notario cerca de mi, notario publico near me, notaría {{ Str::lower($data['office']) }}, notary public {{ Str::lower($data['office']) }}, que es una traduccion, para que sirve la traduccion de documentos, traducir documento en {{ Str::lower($data['office']) }}, traducir acta de nacimiento en {{ Str::lower($data['office']) }}, traducir certificado de matrimonio en {{ Str::lower($data['office']) }}, traducir documento de divorcio {{ Str::lower($data['office']) }}, traducir certificado de defuncion {{ Str::lower($data['office']) }}" />

<meta property="og:url"         content="{{ Request::url() }}" />
<meta property="og:type"        content="article" />
<meta property="og:title"       content="Traducciones Notarizadas y Apostilladas en {{ $data['office'] }} - Notaria Latina" />
<meta property="og:description" content="Realizamos traducciones de documentos para sus trámites más importantes.Para las traducciones de documentos el único requisito es presentar el documento original que desea traducir." />
<meta property="og:image"       content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />
@endsection

@section('phoneNumberHidden', $data['telfHidden'])
@section('phoneNumber', $data['telfShow'])

@section('content')

<section id="prisection" style="background-size: cover;background-position: left center; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Traducciones en {{ $data['office'] }}</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>
  
<div class="container pt-4">
            <h3>Realizamos traducciones de documentos para sus trámites más importantes.</h3>
            <p class="text-muted">Las traducciones son una transcripción de textos de un idioma a otro diferente, es así que pueden ser presentados
                frente a las entidades que soliciten los mismos.</p>
            <p class="text-muted">Estos documentos y traducciones se solicitan generalmente para gestionar trámites fuera del país de origen del
                documento y con un idioma diferente.</p>
            <p class="text-muted">Ademas deben estar certificados por un notario para demostrar su validez, por lo tanto nuestro personal calificado
                realizará la traducción de sus documentos testificando que lo transcrito es fiel copia del documento original y así tendra valor legal.</p>

            <h3>¿Para que sirven las traducciones de documentos?</h3>
            <p class="text-muted">Al obtener un documento con sus correctas traducciones nos permiten validar su información es así que este se pueda
                utilizar fuera del país de origen y usted pueda gestionar de manera correcta sus trámites más importantes.</p>

            <h3>¿Que tipo de documentos se pueden traducir?</h3>
            <ul class="text-muted">
                <li>Certificados de nacimiento.</li>
                <li>Diplomas.</li>
                <li>Certificados de matrimonio.</li> 
                <li>Documentos de divorcio.</li>
                <li>Certificados de defunción.</li>
                <li>Documentos medicos.</li>
                <li>Documentos legales.</li>
                <li>Certificados estudiantiles.</li>
                <li>Estados financieros.</li>
            </ul>

            <h3>¿Que requisitos necesito para la traduccion de documentos?</h3>
            <p class="text-muted">Para las traducciones de documentos el único requisito es presentar el documento original que desea traducir,
                es por esto que el trámite es tan simple y rápido.</p>

        <h3>¿En donde puedo traducir un documento?</h3>
        <p class="text-muted">Para que un documento traducido tenga validez debe ser certificado por un notario debidamente acreditado.</p>
        <p class="text-muted">Por lo tanto es importante que se acerque a nuestra oficina con el documento que desea traducir y uno de
            nuestros asesores lo guiará con su trámite de manera correcta y segura.</p>

        <h3>¿En que tiempo me entregan mi documento traducido?</h3>
        <ul class="text-muted">
            <li>El tiempo de entrega dentro de los Estados Unidos es de 24 horas.</li>
            <li>El tiempo de entrega fuera de los Estados Unidos es de 3 días laborables.</li>
            <li>El documento digital estará disponible en 24 horas.</li>
            <li class="text-danger">Por motivos de codiv-19 puede existir retraso en los tiempos de entrega.</li>
        </ul>
        <p class="text-muted"><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
            <a href="https://www.facebook.com/notariapublicalatina/"><em>FanPage de Facebook</em></a><em>.</em></p>
            <a class="btn btn-lg btn-warning" href="{{route('web.contactenos')}}">Solicite su Trámite</a>
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

@section('numberWpp', $data['telfWpp'])

@section('script')
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('../img/traducciones.jpg')";
    });
  </script>
@endsection

