@extends('layouts.web')
@section('header')
    <title>Consulado de {{$consul->country}} en New York - Notaría Latina</title>
    <meta name="description"        content="Información para Ciudadanos de {{$consul->country}} en New York sobre Trámites Consulares, Apostillas, Poderes, Renovación de Pasaportes."/>
    <meta name="keywords"           content="Consulado de {{$consul->country}}, Migrante de {{$consul->country}}, Tramites Consulares, Apostillas, Poderes, Renovación de Pasaportes, consulado de {{ $consul->country }} en New York, trámites consulares en new york, carta poder en new york, renovacion de pasaportes en new york" />

    <meta property="og:url"         content="https://notarialatina.com" />
    <meta property="og:type"        content="website" />
    <meta property="og:title"       content="Consulado de {{$consul->country}} en New York - Notaría Latina" />
    <meta property="og:description" content="Información para Ciudadanos de {{$consul->country}} en New York sobre Trámites Consulares, Apostillas, Poderes, Renovación de Pasaportes." />
    <meta property="og:image"       content="https://notarialatina.com/img/meta-notaria-latina-queens-new-york.jpg" />
@endsection

@section('phoneNumberHidden', '+18007428602')
@section('phoneNumber', '800-742-8602')

@section('content')

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>

        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">

            <div class="col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title" >Consulado de {{$consul->country}} en New York</h1>
          </div>

      </div>
    </div>
  </section>

<div class="container pt-4">
        <div class="row">

            <div class="col-12 col-md-9 p-4">
                <h2>APOSTILLA {{strtoupper($consul->country)}}</h2>
                <hr>
                <p><b>{{$consul->country}}</b> es miembro del Convenio de La Haya sobre Apostilla y cualquier documento oficial destinado a este país requiere una Apostilla del Secretario de Estado. El Convenio del 5 de octubre de 1961 por el que se abroga el requisito de legalización de documentos públicos extranjeros.</p>
                <p>Podemos Apostillar documentos emitidos desde cualquier estado de los EE.UU. Incluidos los documentos emitidos por el gobierno federal de EE.UU.</p>
                <p><b>Horario de atención:</b> de 8 AM a  6 PM De lunes a sábado</p>
                <p><b>Atención al cliente:</b> <a href="tel:+17187665041">+1 718 766 5041</a></p>
                <p><b>Correo electrónico:</b> <a href="mailto:info@notarialatina.com ">info@notarialatina.com </a></p>
                <p>Los documentos comunes que recibimos son:</p>
                <ul>
                    <li>Certificados de nacimiento</li>
                    <li>Certificados de matrimonio</li>
                    <li>Certificados de defunción</li>
                    <li>Decreto de divorcio
                    <li>Declaración Jurada de Estado Único</li>
                    <li>Verificaciones de antecedentes</li>
                    <li>Poderes generales y especiales</li>
                    <li>Copia de pasaporte</li>
                    <li>Copia de la licencia de conducir</li>
                    <li>Transcripciones</li>
                    <li>Diplomas</li>
                    <li>Carta de autorización</li>
                    <li>Autorización de viaje</li>
                    <li>Certificados médicos</li>
                    <li>Certificado de buena conducta</li>
                    <li>Certificación de libre venta</li>
                    <li>Certificación de origen</li>
                    <li>Carta poder legal</li>
                    <li>Cambio de nombre</li>
                </ul>
              <p>Tenga en cuenta: solo podemos ayudarlo con documentos que se originen en los Estados Unidos. Si sus documentos se originaron en <b>{{$consul->country}}</b>, deberá comunicarse con la autoridad competente correspondiente para que lo ayude en ese país.</p>
              <p>La apostilla de documentos en EE.UU. es un proceso que debe delegarse a un Notario Público para su correcta gestión en <b>{{$consul->country}}</b>.</p>
<br>
              
              <h3>Publicaciones Relacionadas al Consulado de {{$consul->country}}</h3>
              <hr>
              
              <div class="row">
                  @php 
                    if(count($consul->posts->where('status', 'PUBLICADO'))>0) $printposts =$consul->posts->where('status', 'PUBLICADO')->take(3) ;
                    else  $printposts = $posts;
                @endphp
                @foreach ($printposts as $lpost)
                    <div class="col-12 col-md-4">
                        <div class="card my-2">
                            <a href="{{route('post.slug',$lpost->slug)}}" class="stretched-link">
                                <img src="{{url('uploads/'.$lpost->imgdir)}}" class="card-img-top" alt="Consulado de {{ $consul->country }}" style="object-fit: cover;height: 150px !important;">
                            </a>
                            <div class="card-body p-2" style="position:relative;">
                            <span class="d-block text-muted font-weight-bold text-truncate "
                                    style="font-size:1rem">{{$lpost->name}}</span>
                            <span class="d-block text-muted text-truncate">
                                <?php echo strip_tags(substr($lpost->body,0,100))  ?>
                            </span>
                            <div class="small text-muted float-left">{{$lpost->created_at->format('M d')}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            </div>
            
            <div class="col-12 col-md-3"> 
                <h4 style="color: #122944;font-weight: bold">Información</h4>
                <hr>
                {!!$consul->html!!} 
            </div>
        </div>
</div>


@endsection

@section('script')
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('{{url('uploads/'.$consul->header)}}')";
    });
  </script>
@endsection

