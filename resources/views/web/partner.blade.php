@extends('layouts.web')
@section('header')
    <meta name="description" content="@isset($partner->specialty) Abogado en {{ $partner->city }}, {{$partner->state}} - {{ $partner->specialty }} ⚖👨‍⚖️@else Contamos con un amplio directorio de abogados/as y notarios en Latinoamérica | Notaria Latina ⚖👨‍⚖️ @endisset">
    <meta name="keywords" content="abogado near me, abogado cerca de mi, notario near me, notario cerca de mi, abogado en {{ Str::lower($partner->city) }} {{ Str::lower($partner->state) }}, abogado en {{ Str::lower($partner->state) }} {{ Str::lower($partner->city) }}, notario en {{ Str::lower($partner->city) }} {{ Str::lower($partner->state) }}, abogados en {{ Str::lower($partner->country_residence) }}, @foreach($partner->specialties as $specialty)abogado {{ Str::lower($specialty->name_specialty) }} en {{ Str::lower($partner->city . " " .  $partner->state)}}, @endforeach @isset($partner->address)abogado en {{ Str::lower($partner->address)}} @endisset, abogado en {{ Str::lower($partner->state) }} {{ Str::lower($partner->country_residence) }}, abogado en {{ Str::lower($partner->city) }} {{ Str::lower($partner->country_residence) }}, abogado en {{ Str::lower($partner->city) }} {{ Str::lower($partner->state) }} para extranjeros, abogado en {{ Str::lower($partner->city) }} {{ Str::lower($partner->state) }} para migrantes, abogado en {{ Str::lower($partner->city) }} {{ Str::lower($partner->country_residence) }} para migrantes">
    <meta property="og:title" content="Abogado en {{ $partner->city }}, {{ $partner->state }} - #{{ $partner->id }} | Notaria Latina"/>
    <meta property="og:site_name" content="https://notarialatina.com"/>
    <meta property="og:url" content="{{ Request::url() }}"/>
    <meta property="og:description" content="{{ $partner->specialty}}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:locale" content="es"/>
    <meta property="og:image" content="https://notarialatina.com/storage/{{$partner->img_profile}}"/>
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="400" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
@php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
@endphp
    <title>Abogado en {{ Str::ucfirst($partner->city)}}, {{ Str::ucfirst($partner->state)}} - #{{ $partner->id }} | Notaria Latina</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        #svgwpp{
            display: none;
        }
        .bg-header{
            /* background-color: #002542; */
            width: 100%;
            height: 300px;
            position: absolute;
            filter: brightness(60%);
        }
        .container{
            position: relative;
        }
        .formContact{
            background-color: #002542;
            text-align: center;
        }
        input, textarea{
            width: 90%
        }

        .info-header{
            color: white;
        }
        #info_biografia{margin-top:4% !important}

        @media screen and (max-width: 580px){
            .info-header{
                color: #000000 !important;
                margin-top: 10% !important; 
            }
            #divImgPartner{
                display: flex;
                justify-content: center;
            }
            #divPhoneAndEmail p{
                margin-left: 0.3% !important;
            }
            #rowinfoheader{
                margin-left: 0.5% !important;
            }
            .rowinfobody{
                margin-left: 3% !important;
            }
            #txtemail{
                color: #000000 !important;
            }
            #info_biografia{margin-top: 0px !important;}
        }

        #nombre, #telefono, #mensaje{
            margin-bottom: 15px;
        }

        form{
            padding: 15px;
        }

        #country_residence{
            margin-right: 2.5px;
        }

        #telefono{
            margin-left: 2.5px;
        }

        .social{
            color: #9A7A2E;
        }

        /*RATING CSS*/
        div.stars {
            display: inline-block;
        }

        input.star { display: none; }

        label.star {
            float: right;
            padding: 10px;
            font-size: 20px;
            color: 
            #444;
            transition: all .2s;
        }

        input.star:checked ~ label.star:before {
            content: 'f005';
            color: 
            #e74c3c;
            transition: all .25s;
        }

        input.star-5:checked ~ label.star:before {
            color: 
            #e74c3c;
            text-shadow: 0 0 5px 
            #7f8c8d;
        }

        input.star-1:checked ~ label.star:before { color: 
        #F62; }

        label.star:hover { transform: rotate(-15deg) scale(1.3); }

        label.star:before {
        content: 'f006';
        font-family: FontAwesome;
        }


        .horline > li:not(:last-child):after {
            content: " |";
        }
        .horline > li {
        font-weight: bold;
        color: 
        #ff7e1a;

        }

        /*OTHER RATING*/
        #form {
        width: 250px;
        margin: 0 auto;
        height: 50px;
        }

        #form p {
        text-align: center;
        }

        #form label {
        font-size: 20px;
        }

        input[type="radio"] {
        display: none;
        }

        label {
        color: grey;
        }

        .clasificacion {
        direction: rtl;
        unicode-bidi: bidi-override;
        }

        label:hover,
        label:hover ~ label {
        color: orange;
        }

        input[type="radio"]:checked ~ label {
        color: orange;
        }
        #divcallphone{
            display: none;
        }
    </style>
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
                    console.log('ejecutando codigo del recaptcha...');
            }, 3500);
        </script>
    
    
        {{-- {!! htmlScriptTagJsApi([
        'callback_then' => 'callbackThen',
        'callback_catch' => 'callbackCatch'
        ]) !!} --}}
@endsection

@section('content')
    <div id="prisection" class="bg-header" style="background-size: cover; background-position: left top; background-repeat: no-repeat;"></div>
    {{-- <div class="container"> --}}
        @if ($partner != null)
        <div id="rowinfoheader" class="row mt-3">
            <div class="col-sm-2"></div>
            <div id="divImgPartner" class="col-sm-2">
                <img id="imgPartner" src="{{asset('storage/' . $partner['img_profile'] )}}" alt="Abogado en {{ $partner->city }}, {{ $partner->state }}, {{ $partner->country_residence }}" width="200" height="260">
            </div>
            <div class="col-sm-8 mt-5 info-header">
                <p id="txtpartnerid" style="display: none">{{ $partner->id }}</p>
                <h1 style="font-size: 30px" id="txtnamelastname"><b>
                    @if ($partner->title == "Abogado")
                        Abg.
                    @elseif($partner->title == "Licenciado")
                        Lic.
                    @endif
                    {{ $partner->name }} {{ $partner->lastname }}
                    </b>
                    <p style="font-size: 20px; margin-top: 15px"><img width="25" height="25" src="{{asset('img/partners/'.Str::lower(Str::studly($partner->country_residence)).'.png')}}" alt="Abogado en {{ $partner->city }}, {{ $partner->state }}, {{ $partner->country_residence }}"> {{ $partner->country_residence}}, {{ $partner->city }}</p>
                </h1>
                @if ($partner->company == "Empresa")
                    <p style="margin-top: 10px">{{ $partner->company_name }}</p>
                @else
                    <p style="margin-top: 10px">{{ $partner->company}}</p>
                @endif
                <br>
                {{-- <div id="divPhoneAndEmail" class="row d-flex">
                    <p class="ml-3"><i class="fas fa-phone-alt" style="color: rgb(241, 132, 15)"></i>{{ Str::limit($partner->codigo_pais . ' ' . $partner->phone, 11, '...')  }}</p>
                    <p class="ml-5" style="cursor: pointer; background-color: #002542; padding-left: 1%; padding-right: 1%; border-radius: 5px;">Ver número</p>
                </div> --}}
                {{-- <div class="row d-flex">
                    <a id="txtemail" style="text-decoration: none; color: #ffffff" href="mailto:{{$partner->email}}"><p class="ml-3"><i class="far fa-envelope" style="margin-right: 5px; color: rgb(241, 132, 15)"></i>{{ $partner->email }}</p></a>
                </div> --}}
            </div>
        </div>

        <div id="info_biografia" class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-6 border-right">
                <div class="rowinfobody">
                    <h2 style="font-size: 18px"><b>Biografía</b></h2>
                    <div>
                        {!! Purify::clean($partner->biography_html) !!}
                    </div>
                    {{-- RETIRANDO EL BLOQUE DIV DE AREA CON LAS ESPECIALIDADES --}}
                    {{-- <div style="color: #9A7A2E">
                        <h6><b>Área</b></h6>
                        @foreach ($partner->specialties as $specialty)
                            <p><i class="fas fa-check"></i> {{$specialty->name_specialty }}</p>
                        @endforeach
                    </div> --}}
                    @isset($partner->specialty)
                        <div class="mt-3">
                            <h2 style="font-weight: 600; font-size: 18px">Especialidades</h2>
                            <p style="font-weight: 400">{{ Purify::clean($partner->specialty) }}</p>
                        </div>
                    @endisset
                </div>
                @isset($partner->numlicencia)
                    <div class="rowinfobody">
                        <h2 style="font-weight: 600; font-size: 18px">Número de Licencia - Título</h2>
                        <div class="d-flex">
                            <p style="font-weight: 400; padding: 5px; border-radius: 5px" class="border">{{ Purify::clean($partner->numlicencia) }}</p>
                        </div>
                    </div>
                @endisset
            </div>
            <div class="col-sm-3">
                <div class="rowinfobody">
                    <div style="color: #9A7A2E">
                        @isset($partner->address)
                            <h3 style="font-weight: bold; font-size: 18px"><i class="fas fa-map-marker-alt"></i> Dirección</h3>
                            <a style="color: #9A7A2E" target="_blank" href="https://www.google.com.ec/maps/place/{{$partner->address}}">{{ $partner->address}}</a>
                        @endisset
                        @if($partner->website != null && Str::startsWith($partner->website, 'https'))
                            <h3 class="mt-2" style="font-weight: bold; font-size: 18px"><i class="fas fa-globe"></i> Sitio web</h3>
                            <a target="_blank" style="color: #9A7A2E" href="{{$partner->website}}">{{ $partner->website }}</a>
                        @endif
                        @if(Str::startsWith($partner->link_facebook, 'https') || Str::startsWith($partner->link_instagram, 'https') || Str::startsWith($partner->link_linkedin, 'https'))
                            <h3 style="font-weight: bold; margin-top: 10px; font-size: 18px">Redes Sociales</h3>
                            <div style="margin-top: 20px">
                                @if($partner->link_facebook != null && Str::startsWith($partner->link_facebook, 'https'))
                                    <a target="_blank" class="social" href="{{$partner->link_facebook}}"><i class="fab fa-facebook-square fa-2x"></i></a>
                                @endif
                                @if($partner->link_instagram != null && Str::startsWith($partner->link_instagram, 'https'))
                                    <a target="_blank" class="social" href="{{$partner->link_instagram}}"><i class="fab fa-instagram fa-2x"></i></a>
                                @endif
                                @if($partner->link_linkedin != null && Str::startsWith($partner->link_linkedin, 'https'))
                                    <a target="_blank" class="social" href="{{ $partner->link_linkedin}}"><i class="fab fa-linkedin fa-2x"></i></a>
                                @endif
                            </div>
                        @endif
                    </div>
                    <h3 style="font-weight: bold; margin-top: 10px; color: #9A7A2E; font-size: 18px">Reviews</h3>
                        @php
                          $rating = $partner->averageRating();
                        @endphp
                    <div data-toggle="modal" data-target="#exampleModalCenter" style="margin-top: 10px; color: #9A7A2E; cursor: pointer">
                        @foreach(range(1,5) as $i)
                            <span class="fa-stack" style="width:2em" onclick="openModalRating();">
                                <i class="far fa-star fa-stack-2x"></i>
                                @if($rating > 0)
                                    @if($rating > 0.5)
                                        <i class="fas fa-star fa-stack-2x"></i>
                                    @else
                                        <i class="fas fa-star-half fa-stack-2x"></i>
                                    @endif
                                @endif
                            @php $rating--; @endphp
                            </span>
                        @endforeach
                    </div>
                    @php
                        $bandera = false;
                        foreach($partner->ratings as $rating){
                            if($rating->comment != null){
                                $bandera = true;
                            }
                        }   
                    @endphp
                    @if ($bandera)
                        <div class="mt-2" style="color: #9A7A2E; cursor: pointer" data-toggle="modal" data-target="#modalComentarios">  
                            <p>{{ $partner->timesRated()}} @if($partner->timesRated() > 1) comentarios @else comentario @endif</p>
                        </div>
                    @else
                        <div class="mt-2" style="color: #9A7A2E">  
                            <p>{{ $partner->timesRated()}} @if($partner->timesRated() > 1) comentarios @else comentario @endif</p>
                        </div>
                    @endif
                </div>
                <div class="formContact mt-4 rounded">
                    <h4 class="text-white text-center p-3">Realice aquí una consulta</h4>
                    <form action="{{ route('web.send.email.socio', $partner) }}" method="POST">
                        @csrf
                        <input class="form-control" type="text" id="nombre" placeholder="Nombre y Apellido" name="name" autocomplete="off" required>
                        <input type="email" name="email" id="email" placeholder="Correo electrónico" class="form-control" autocomplete="off" required>
                        <div class="d-flex mt-3">
                            <select name="country_residence" id="country_residence" class="form-control" required>
                                <option value="">País de residencia</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="El Salvador">El Salvador</option>
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
                            <input type="hidden" name="codpais" id="codTelfPais">
                            <input class="form-control" type="number" id="telefono" placeholder="Teléfono" name="phone" autocomplete="off" required>
                        </div>
                        <textarea class="form-control" id="mensaje" rows="4" placeholder="Me encantaría poder ayudarle..." name="mensaje" autocomplete="off" required>Hola, me interesa consultar por sus servicios y deseo que me contacten</textarea>
                        <div style="display: none">
                            <input type="hidden" name="aux">
                        </div>
                        <button class="btn mb-3" style="background-color: #FEC02F" type="submit">Enviar</button>
                    </form>
                </div>
                @php
                    if (Cache::has('partner'.$partner->id)) {
                        $array = Cache::get('partner'.$partner->id);
                        $partnerCache = $array['partner'];
                        $ip = $array['ip'];
                    }
                @endphp
                <div id="divshowphone" class="row d-flex mt-4 justify-content-center border" style="border-radius: 5px; margin-left: 1%; margin-right: 1%; padding-top: 4%;"> </div>
            </div>
        </div>
        @endif

        {{--MODAL DE VALORACION DE PARTNER--}}
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{ route('partner.rating', $partner)}}" method="POST">
                @csrf
              <div class="modal-content">
                <div class="modal-header" style="background-color: #002542; color: #ffffff">
                  <h5 class="modal-title" id="exampleModalLongTitle">Valoración de Partner {{ $partner->name}} {{ $partner->lastname}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Para valorar un partner necesitas completar los siguientes campos con tu información y enviar la calificación</p>
                        <input class="form-control" type="text" id="nombre" placeholder="Nombre y Apellido" name="nameRating" autocomplete="off" required>
                        <div class="d-flex">
                            <select name="country_residenceRating" id="country_residence" class="form-control" required>
                                <option value="">País de residencia</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="El Salvador">El Salvador</option>
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
                            <input class="form-control" type="number" id="telefono" placeholder="Teléfono" name="phoneRating" autocomplete="off" required>
                        </div>
                        <textarea class="form-control" id="mensaje" rows="4" placeholder="Mensaje" name="mensajeRating" autocomplete="off" required></textarea>
                        <p>Valoración</p>
                        <p class="clasificacion" id="rateYo" data-rateyo-rating="{{ $partner->averageRating or 0}}">
                            <input class="star" id="radio1" type="radio" name="star" value="5" required><!--
                            --><label for="radio1" style="font-size: 30px">★</label><!--
                            --><input class="star" id="radio2" type="radio" name="star" value="4" required><!--
                            --><label for="radio2" style="font-size: 30px">★</label><!--
                            --><input class="star" id="radio3" type="radio" name="star" value="3" required><!--
                            --><label for="radio3" style="font-size: 30px">★</label><!--
                            --><input class="star" id="radio4" type="radio" name="star" value="2" required><!--
                            --><label for="radio4" style="font-size: 30px">★</label><!--
                            --><input class="star" id="radio5" type="radio" name="star" value="1" required><!--
                            --><label for="radio5" style="font-size: 30px">★</label>
                          </p>
                        </div>
                        <div class="modal-footer" style="background-color: #002542; color: #ffffff">
                            <button type="submit" class="btn" style="background-color: #fec02f">Calificar</button>
                        </div>
                    </form>
              </div>
            </div>
        </div>
        {{--DIV PARA LLENAR FORMULARIO Y MOSTRAR EL NUMERO--}}
        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-white" style="background-color: #002542">
                        <p style="font-weight: bold">Complete el formulario para ver el número telefónico del partner {{ $partner->name . " " . $partner->lastname}}</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span style="color: #ffffff" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formviewphone" action="{{ route('web.send.view.phone', $partner)}}" method="POST">
                    <div class="modal-body" >
                            @csrf
                            <div class="mb-3">
                                <input class="form-control" name="email" type="email" placeholder="Email" required>
                            </div>
                            <div class="mb-3">
                                <input class="form-control" name="name" type="text" placeholder="Nombre y Apellido" required>
                            </div>
                            <div class="mb-3">
                                <input class="form-control" name="phone" type="number" placeholder="Teléfono" required>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center" style="margin-bottom: -15px;">
                            <button onclick="saveStorage();" class="btn" style="background-color: #fec02f">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- modal para mostrar los comentarios que le hicieron al partner --}}
        <div class="modal fade" id="modalComentarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header" style="background-color: #002542; color: #ffffff">
                  <h5 class="modal-title" id="exampleModalLongTitle">Comentarios</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    @foreach ($partner->ratings as $rating)
                        @if($rating->comment != null || $rating->name_customer != null)
                            <i>"{{ $rating->comment }}"</i>
                            @php
                                $country = $rating->country;
                                if(str_contains($country, 'á')){$country = str_replace('á', 'a', $country);}
                                elseif(str_contains($country, 'é')){$country = str_replace('é', 'e', $country);}
                                elseif(str_contains($country, 'ú')){$country = str_replace('ú', 'u', $country);}
                            @endphp
                            <p class="text-muted" style="font-size: 15px"><img src="{{ asset('img/partners/' . Str::lower(Str::studly($country)) . '.png') }}" alt="Abogado en {{ $partner->city }}, {{ $partner->state }}, {{ $partner->country_residence }}"> {{ $rating->name_customer }}</p>
                            <hr>   
                        @endif          
                    @endforeach
                </div>
              </div>
            </div>
          </div>

        {{--ESTO ES PARA MI PERFIL--}}
        @if ($partner->name . " " . $partner->lastname == "Sebastian Armijos")
            <div class="mt-5">
                <a href="{{ route('web.eliminar.cache.partner', $partner) }}">Eliminar cache Partner</a>
            </div>
        @endif

        {{-- SE MUESTRA CUANDO LLENA EL FORMULARIO DE CONTACTO --}}
        @if (session('report'))
            @php
                echo "
                    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                    <script>
                        swal('Hemos enviado tu información', 'Nos pondremos en contacto lo antes posible!', 'success');
                    </script>
                    ";    
            @endphp
        @endif
        
        {{-- SE MUESTRA SI EL CLIENTE HA DADO REVIEW AL PARTNER --}}
        @if (session('rating'))
            @php
                echo "
                    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                    <script>
                        swal('Se han enviado los datos', 'Gracias por tu evaluación!', 'success');
                    </script>
                    ";    
            @endphp
        @endif

        {{-- SE MUESTRA SI EL CLIENTE HA SOLICITADO VER EL NUMERO DEL PARTNER --}}
        @if (session('solicited'))
            @php
                echo "
                    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                    <script>
                        swal('Se envió la información', 'Ahora puedes acceder al teléfono del partner!', 'success');
                    </script>
                    ";    
            @endphp
        @endif

        {{-- ENVIO DE "LEAD" A MI CORREO --}}
        @if (session('emailsendedme'))
            @php
                echo "
                    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                    <script>
                        swal('Se envió la información', 'En breve nos pondremos en contacto', 'success');
                    </script>
                    ";    
            @endphp
        @endif
@endsection

@section('numberWpp', '13479739888')

@section('script')
{{-- <script id="script_jquery"></script> --}}
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('{{url('img/partners/FONDO-PARTNER-INDIVIDUAL.webp')}}')";
        const divshowphone = document.getElementById('divshowphone');
        var id = document.getElementById('txtpartnerid').textContent;
        if(!localStorage.getItem("prueba"+id)){
            divshowphone.innerHTML = "<p style='background-color: #002542; color: #ffffff; padding: 5px; border-radius: 5px' class='ml-3'><i class='fas fa-phone-alt' style='color: rgb(241, 132, 15)'></i>{{ Str::limit($partner->codigo_pais . ' ' . $partner->phone, 11, '...')  }}</p><p class='ml-5' style='cursor: pointer; color: #002542; padding: 5px' data-toggle='modal' data-target='.bd-example-modal-sm'>Ver teléfono</p>";
        } else {
            divshowphone.innerHTML = "<p style='background-color: #002542; color: #ffffff; padding: 5px; border-radius: 5px' class='ml-3'><i class='fas fa-phone-alt' style='color: rgb(241, 132, 15)'></i>{{ $partner->codigo_pais . ' ' . $partner->phone}}</p><a class='ml-5' style='color: #002542; text-decoration: none' href='tel:{{$partner->codigo_pais}}{{$partner->phone}}'>Llamar</a>";
        }
    });

    //RETIRANDO CARGA DEL SCRIPT - NO SE OCUPA
    // setTimeout(() => {
    //     var scriptjquery = document.getElementById('script_jquery');
    //     scriptjquery.src = "https://code.jquery.com/jquery-3.6.0.min.js";
    //     scriptjquery.integrity = "sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=";
    //     scriptjquery.crossorigin = "anonymous";
    //     console.log('cargando script jquery 3.6.0');
    // }, 3000);

    function openModalPhone(){
        $('.bd-example-modal-sm').modal('show');
    }

    function saveStorage(){
        var id = document.getElementById('txtpartnerid').textContent;
        var partner = document.getElementById('txtnamelastname').textContent;
        if(localStorage.getItem("prueba"+id) == null){
            partner = partner.replace(/\s/g, "") + id;
            localStorage.setItem("prueba"+id, partner);
        }
        document.getElementById('formviewphone').submit();
    }

    var selectPaisResidencia = document.getElementById('country_residence');
    var inputCodPais = document.getElementById('codTelfPais');
        
        selectPaisResidencia.onchange  = function(e){
            switch (selectPaisResidencia.value) {
                case "" : codigo = ""; break;
                case "Argentina":codigo = "+54";break;
                case "Bolivia":codigo = "+591";break;
                case "Chile":codigo = "+56"; break;
                case "Colombia":codigo = "+57";break;
                case "Costa Rica":codigo = "+506";break;
                case "Ecuador":codigo = "+593";break;
                case "El Salvador":codigo = "+503";break;
                case "Estados Unidos":codigo = "+1";break;
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
@endsection