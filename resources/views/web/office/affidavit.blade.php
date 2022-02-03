@extends('layouts.web')
@section('header')
<title>Affidávit Notarizados y Apostillados en {{ $data['office'] }} - Notaria Latina</title> 
<meta name="title" content="Affidávit Notarizados y Apostillas en {{ $data['office'] }} - Notaria Latina">
<meta name="description" content="Una declaración jurada o Affidávit es una manifestación escrita o verbal cuya veracidad es asegurada mediante un juramento ante una autoridad judicial o administrativa. Affidavit Support en {{ $data['office'] }}">       
<meta name="keywords" content="Affidávit Notarizados y Apostillados en {{ $data['office'] }}, Affidávit Notarizados y Apostillados near me, notaria latina, notario publico, notary public near me, notario cerca de mi, notario publico near me, notaría {{ Str::lower($data['office']) }}, notary public {{ Str::lower($data['office']) }}, que es un affidavit, para que sirve un affidavit, como hacer una declaracion jurada, requisitos affidavit, obtener affidavit en {{ Str::lower($data['office']) }}, declaracion jurada en {{ Str::lower($data['office']) }}" />

<meta property="og:url"                content="{{ Request::url() }}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="Affidávit Notarizados y Apostillados en {{ $data['office'] }} - Notaria Latina" />
<meta property="og:description"        content="Una declaración jurada o Affidávit es una manifestación escrita o verbal cuya veracidad es asegurada mediante un juramento ante una autoridad judicial o administrativa." />
<meta property="og:image"              content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />
@endsection

@section('phoneNumberHidden', $data['telfHidden'])
@section('phoneNumber', $data['telfShow'])

@section('content')

<section id="prisection" style="background-size: cover;background-position: left center; background-repeat: no-repeat;">
    <div>
        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">
            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Affidávit en {{ $data['office'] }}</h1>
              <a href="javascript:void(0)" class="btn btn-warning btn-lg mt-4" data-toggle="modal" 
              data-target="#exampleModal">INICIAR TRAMITE</a>
          </div>
      </div>
    </div>
  </section>

<div class="container pt-4">
            <h3>Realizamos Declaraciones Juradas (Affidávit).</h3>
            <p class="text-muted">Una declaración jurada o Affidávit es una manifestación escrita o verbal cuya veracidad es asegurada mediante un juramento
                ante una autoridad judicial o administrativa.</p>
            <p class="text-muted">Esto hace que el contenido de la declaración sea tomado como cierto hasta que se demuestre lo contrario.</p>

            <h3>¿Para que sirve un Affidávit?</h3>
            <p class="text-muted">Este documento es necesario para algunos trámites de inmigración cuando quieres solicitar que un familiar obtenga la visa o
                residencia en Estados Unidos.</p>
            <p class="text-muted">Este documento del affidavit también se conoce entre los migrantes como declaración jurada de sostenimiento, mantenimiento o
                solvencia económica.</p>

            <h3>¿Que requisitos necesito para realizar los acuerdos?</h3>
            <ul class="text-muted">
                <li>Identificación válida de la persona que va a realizar la declaración jurada.</li>
                <li>Información de lo que se quiere dejar estipulado en el documento.</li>
            </ul>

            <h3>¿Donde puedo realizar un acuerdo?</h3>
            <p class="text-muted">Acérquese a nuestra oficina y un asesor lo guiará en la gestión del documento para que realice el trámite de manera correcta y segura.</p>


        <h3>¿En que tiempo me entregan un Affidávit?</h3>
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
        document.getElementById('prisection').style.backgroundImage = "url('../img/affidavit.jpg')";
    });
  </script>
@endsection

