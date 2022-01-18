@extends('layouts.web')
@section('header')
<title>Apostillas en Queens New York - Notaria Latina</title> 
<meta name="description" content="Autentificamos sus documentos solicitados por entidades de otro país diferente al originario mediante la apostilla de los mismos.">       
<meta name="keywords" content="Apostillas en Queens New York, Affidávit near me, notaria latina, apostillar, apostillar cerca de mi, notario publico, notary public near me, notario cerca de mi, notario publico near me, notaría nueva york, notary public queens, que es una apostilla, para que sirve apostillar un documento, apostillar documentos cerca de mi, requisitos para apostillar un documento, apostillar en new york, apostillar acta de nacimiento new york, apostillar poder en new york, apostillar carta poder en new york" />

<meta property="og:url"                content="{{route('web.apostillas')}}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="Apostillas en Queens New York - Notaria Latina" />
<meta property="og:description"        content="Autentificamos sus documentos solicitados por entidades de otro país diferente al originario mediante la apostilla de los mismos." />
<meta property="og:image"              content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />

@endsection
@section('phoneNumberHidden', '+18007428602')
@section('phoneNumber', '800-742-8602')

@section('content')

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Apostillas</h1>
  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
            <h3>Autentificamos sus documentos solicitados por entidades de otro país diferente al originario mediante la apostilla de los mismos.</h3>
            <p class="text-muted">La Apostilla, es la manera más simple de certificar la autenticidad de documentos públicos expedidos en otro país. Por lo tanto es un
                requisito indispensable para gestionar trámites internacionales.</p>
            <p class="text-muted">De acuerdo al Convenio de la Haya, algunos de los países latinos miembros del convenio donde es válida la apostilla son Argentina, Bolivia,
                Venezuela, Colombia, Chile, Costa Rica, Ecuador, Estados Unidos, El Salvador, Guatemala, Honduras, Perú, México, entre otros.</p>

            <h3>Para que me sirve apostillar un documento?</h3>
            <p class="text-muted">El documento que porte la apostilla tiene validez legal en cualquiera de los países miembros del Convenio. La cual consiste en un sello
                que la autoridad encargada estampa en seco y se agrega como nota al reverso o como hoja adicional de los documentos que se quisiera
                autenticar. Es por eso que los únicos autorizados para validar esta apostilla son los notarios debidamente acreditados.</p>

                <h3>En que documentos se necesita la apostilla?</h3>
        <ul class="text-muted">
            <li>Diplomas</li>
            <li>Certificados de nacimiento.</li>
            <li>Poderes Generales</li>
            <li>Poderes Especiales</li>
            <li>Certificados de matrimonio.</li>
            <li>Certificados de defunción.</li>
            <li>Contratos.</li>
            <li>Cartas de invitación.</li>
            <li>Testamentos.</li>
            <li>Declaraciones juradas.</li>
            <li>Estados de cuenta.</li>
            <li>Actas de divorcio.</li>
            <li>Facturas.</li>
            <li>Documentos corporativos.</li>
        </ul>

        <h3>Que requisitos necesito para la apostilla de un documento?</h3>
        <p class="text-muted">El único requisito es poseer el documento original que desea apostillar. Por lo tanto es un trámite simple.</p>

        <h3>En donde puedo apostillar un documento?</h3>
        <p class="text-muted">Puede <a href="{{route('web.contactenos')}}">contactarnos</a> o acercarse a nuestra oficina con el documento que desea
            apostillar y un asesor lo guiará para que realice el trámite de manera correcta, rápida y segura.</p>
        <h3>En que tiempo se realiza una apostilla?</h3>
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

@section('numberWpp', '13479739888')

@section('script')
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('img/inicio.jpg')";
    });
  </script>
@endsection

