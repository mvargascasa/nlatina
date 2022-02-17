@extends('layouts.web')
@section('header')
    <meta name="description" content="@isset($partner->specialty) Abogado en {{ $partner->city }}, {{$partner->state}} - {{ $partner->specialty }} ⚖👨‍⚖️@else Contamos con un amplio directorio de abogados/as y notarios en Latinoamérica | Notaria Latina ⚖👨‍⚖️ @endisset">
    <meta name="keywords" content="abogado near me, abogado cerca de mi, notaria near me, notaria cerca de mi, abogado en {{ Str::lower($partner->city) }} {{ Str::lower($partner->state) }}, notario en {{ Str::lower($partner->city) }} {{ Str::lower($partner->state) }}, abogados en {{ Str::lower($partner->country_residence) }}, @foreach($partner->specialties as $specialty)abogado {{ Str::lower($specialty->name_specialty) }} en {{ Str::lower($partner->city . " " .  $partner->state)}}, @endforeach @isset($partner->address)abogado en {{ Str::lower($partner->address)}} @endisset">
    <meta property="og:title" content="Abogado en {{ $partner->city }}, {{ $partner->state }} | Notaria Latina"/>
    <meta property="og:site_name" content="https://notarialatina.com"/>
    <meta property="og:url" content="{{ Request::url() }}"/>
    <meta property="og:description" content="{{ $partner->specialty}}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:locale" content="es"/>
    <meta property="og:image" content="https://notarialatina.com/storage/{{$partner->img_profile}}"/>
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="400" />
@php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
@endphp
    <title>Abogado en {{ Str::ucfirst($partner->city)}}, {{ Str::ucfirst($partner->state)}} | Notaria Latina</title>
    <style>
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

        @media screen and (max-width: 580px){
            .info-header{
                color: black;
            }
            #divImgPartner{
                display: flex;
                justify-content: center;
            }
            #divPhoneAndEmail p{
                margin-left: 5% !important;
            }
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
    </style>
@endsection

@section('content')
    <div id="prisection" class="bg-header" style="background-size: cover; background-position: left top; background-repeat: no-repeat"></div>
    <div class="container">
        @if ($partner != null)
        <div class="row mt-4">
            <div id="divImgPartner" class="col-sm-6">
                <img id="imgPartner" class="float-right" src="{{asset('storage/' . $partner['img_profile'] )}}" alt="Imagen 1" width="250" height="310">
            </div>
            <div class="col-sm-6 mt-3 info-header">
                <h3><b>
                    @if ($partner->title == "Abogado")
                        Abg.
                    @elseif($partner->title == "Licenciado")
                        Lic.
                    @endif
                    {{ $partner->name }} {{ $partner->lastname }}
                </b></h3>
                <p><img src="{{asset('img/partners/'.Str::lower(Str::studly($partner->country_residence)).'.png')}}" alt=""> {{ $partner->country_residence}}, {{ $partner->city }}</p>
                @if ($partner->company == "Empresa")
                    <p style="margin-top: -10px">{{ $partner->company_name }}</p>
                @else
                    <p style="margin-top: -10px">{{ $partner->company}}</p>
                @endif
                <br>
                <div id="divPhoneAndEmail" class="row d-flex">
                    <p class="ml-3"><i class="fas fa-phone-alt" style="color: rgb(241, 132, 15)"></i> {{ $partner->codigo_pais }} {{ $partner->phone }}</p>
                    <p class="ml-5"><i class="far fa-envelope" style="margin-right: 5px; color: rgb(241, 132, 15)"></i>{{ $partner->email }}</p>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-1"></div>
            <div class="col-sm-7 text-justify border-right">
                <h4><b>Biografía</b></h4>
                <div>
                    {!! $partner->biography_html !!}
                </div>
                <div style="color: #9A7A2E">
                    <h6><b>Área</b></h6>
                    @foreach ($partner->specialties as $specialty)
                        <p><i class="fas fa-check"></i> {{$specialty->name_specialty }}</p>
                    @endforeach
                </div>
                @isset($partner->specialty)
                    <div style="color: #9A7A2E">
                        <h6><b>Especialidades</b></h6>
                        <p>{{ $partner->specialty }}</p>
                    </div>
                @endisset
            </div>
            <div class="col-sm-4">
                <div style="color: #9A7A2E">
                    @isset($partner->address)
                        <h6 style="font-weight: bold"><i class="fas fa-map-marker-alt"></i> Dirección</h6>
                        <p>{{ $partner->address}}</p>
                    @endisset
                    @if($partner->website != null && Str::startsWith($partner->website, 'https'))
                        <h6 style="font-weight: bold"><i class="fas fa-globe"></i> Sitio web</h6>
                        <a target="_blank" style="color: #9A7A2E" href="{{$partner->website}}">{{ $partner->website }}</a>
                    @endif
                    @if(Str::startsWith($partner->link_facebook, 'https') || Str::startsWith($partner->link_instagram, 'https') || Str::startsWith($partner->link_linkedin, 'https'))
                        <h6 style="font-weight: bold; margin-top: 10px">Redes Sociales</h6>
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
                <h6 style="font-weight: bold; margin-top: 10px; color: #9A7A2E">Reviews</h6>
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
                <div style="color: #9A7A2E">  
                    <p>{{ $partner->timesRated()}} opiniones</p>
                </div>
                <div class="formContact mt-4 rounded">
                    <h5 class="text-white text-center p-3">Realice aquí una consulta</h5>
                    <form action="{{ route('web.send.email.socio', $partner) }}" method="POST">
                        @csrf
                        <input class="form-control" type="text" id="nombre" placeholder="Nombre y Apellido" name="name" autocomplete="off" required>
                        <div class="d-flex">
                            <select name="country_residence" id="country_residence" class="form-control" required>
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
                            <input class="form-control" type="number" id="telefono" placeholder="Teléfono" name="phone" autocomplete="off" required>
                        </div>
                        <textarea class="form-control" id="mensaje" rows="4" placeholder="Mensaje" name="mensaje" autocomplete="off" required></textarea>
                        <button class="btn mb-3" style="background-color: #FEC02F" type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
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
    </div>
@endsection

@section('numberWpp', '13479739888')

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('{{url('img/partners/FONDO-PARTNER-INDIVIDUAL.webp')}}')";
    });
</script>
@endsection