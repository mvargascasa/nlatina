@extends('layouts.web')
@section('header')
    <title>Partners de Casa Credito Promotora</title>
    <style>
        .bg-header{
            background-color: #002542;
            width: 100%;
            height: 300px;
            position: absolute;
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

    </style>
@endsection

@section('content')
    <div class="bg-header"></div>
    <div class="container">
        @if ($partner != null)
            
        
        <div class="row mt-4">
            <div class="col-sm-6">
                <img class="float-right" src="{{asset('storage/' . $partner['img_profile'] )}}" alt="Imagen 1" width="250" height="310">
            </div>
            <div class="col-sm-6 mt-3 info-header">
                <h3><b>{{ $partner->name }} {{ $partner->lastname }}</b></h3>
                <p>{{ $partner->country_residence}}</p>
                <p>{{ $partner->company }}</p>
                <br>
                <div class="row">
                    <p class="ml-3"><i class="fas fa-phone-alt" style="color: rgb(241, 132, 15)"></i> {{ $partner->codigo_pais }} {{ $partner->phone }}</p>
                    <p class="float-right ml-5"><i class="far fa-envelope" style="margin-right: 5px; color: rgb(241, 132, 15)"></i>{{ $partner->email }}</p>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-sm-1"></div>
            <div class="col-sm-7 text-justify border-right">
                <h6><b>Biografia</b></h6>
                <div>
                    {!! $partner->biography_html !!}
                </div>
                <div style="color: #9A7A2E">
                    <h6><b>Área</b></h6>
                    @foreach ($partner->specialties as $specialty)
                        <p><i class="fas fa-check"></i> {{$specialty->name_specialty }}</p>
                    @endforeach
                </div>
                <div style="color: #9A7A2E">
                    <h6><b>Especialidades</b></h6>
                    <p>{{ $partner->specialty }}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div style="color: #9A7A2E">
                    @isset($partner->address)
                        <h6 style="font-weight: bold"><i class="fas fa-map-marker-alt"></i> Dirección</h6>
                        <p>{{ $partner->address}}</p>
                    @endisset
                    @isset($partner->website)
                        <h6 style="font-weight: bold"><i class="fas fa-globe"></i> Sitio web</h6>
                        <a target="_blank" style="color: #9A7A2E" href="{{$partner->website}}">{{ $partner->website }}</a>
                    @endisset
                    @if($partner->link_facebook != null || $partner->link_instagram != null || $partner->link_linkedin != null)
                        <h6 style="font-weight: bold; margin-top: 10px">Redes Sociales</h6>
                        <div style="margin-top: 20px">
                            @isset ($partner->link_facebook)
                                <a target="_blank" class="social" href="{{$partner->link_facebook}}"><i class="fab fa-facebook-square fa-2x"></i></a>
                            @endisset
                            @isset($partner->link_instagram)
                                <a target="_blank" class="social" href="{{$partner->link_instagram}}"><i class="fab fa-instagram fa-2x"></i></a>
                            @endisset
                            @isset($partner->link_linkedin)
                                <a target="_blank" class="social" href="{{ $partner->link_linkedin}}"><i class="fab fa-linkedin fa-2x"></i></a>
                            @endisset
                        </div>
                    @endif
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
    </div>
@endsection