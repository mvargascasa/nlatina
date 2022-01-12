@extends('layouts.web')
@section('header')
    <title>Socios de Casa Credito Promotora</title>
    <meta name="description" content="Socios de Casa Credito Promotora">
    <style>
        .testimotionals {
            width:100%;
            display:inline-block;
        }

        .testimotionals .card {
            position:relative;
            overflow:hidden;
            width:100%;
            margin:0 auto;
            background:rgb(255, 255, 255);
            padding:20px;
            box-sizing:border-box;
            text-align:justify;
            /* box-shadow:0 10px 40px rgba(0,0,0,.5) */
        }

        .testimotionals .card .layer {
            z-index:2;
            position:absolute;
            top:calc(100% - 5px);
            height:100%;
            width:100%;
            left:0;
            background:linear-gradient(to left , #002542, #002542);
            transition:0.5s;
        }

        .testimotionals .card .content {
            z-index:2; 
            position:relative;
        }

        .testimotionals .card:hover  .layer{
            top:0;
        }

        .testimotionals .card .content h5{
            margin-top: 10px;
            font-size:14px;
            color:rgb(160, 85, 85);
        }
        .testimotionals .card:hover .content h5{
            font-size:14px;
            color:rgb(255, 255, 255);
        }

        .testimotionals .card .content p{
            font-size:14px;
            color:rgb(0, 0, 0);
        }
        .testimotionals .card:hover .content p{
            font-size:14px;
            color:rgb(255, 255, 255);
        }

        .testimotionals .card .content h6{
            font-size:14px;
            color:rgb(0, 0, 0);
        }
        .testimotionals .card:hover .content h6{
            font-size:14px;
            color:rgb(255, 255, 255);
        }

        .testimotionals .card .content .row p{
            font-size:11px;
            color:rgb(0, 0, 0);
        }
        .testimotionals .card:hover .row p{
            font-size:11px;
            color:rgb(255, 255, 255);
        }

        .testimotionals .card .content .image {
            width:100%; 
            height:100%;
            overflow:hidden;
            display: flex;
            justify-content: center;
        }

        .form{
            margin-left: 20%;
            margin-right: 20%;
            margin-top: 5%;
            margin-bottom: 10px;
        }

        @media screen and (max-width: 580px){
            .form{
                margin-left: 0%;
                margin-right: 0%;
            }

            .titulo{
                margin-top: 15%;
            }
        }

        .titulo{
            font-size: 30px;
        }

        .emptyRegister{
            text-align: center;
            justify-content: center;
            align-items: center;
        }

        #texto{
            align-items: center;
        }

        #telefono{
            margin-left: 2.5px;
        }

        #nacionalidad{
            margin-right: 2.5px;
        }
        
    </style>
@endsection

@section('content')

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>
        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">
            <div class="col-sm-6 col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title titulo">¡Abogados en Latinoamérica <br> a su alcance!</h1>
            </div>
            <div class="col-sm-6">
                <div class="text-center form" style="background-color: #002542;">
                    <h4 class="text-white pt-4 px-4" style="margin: 10px 10px 10px 10px;">¿Eres abogado y quieres anunciarte en Estados Unidos?</h4>
                    <p class="text-white">Únete hoy e impulsa tus servicios</p>
                    <form action="{{ route('socios.registro') }}" method="POST">        
                        @csrf
                        <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                            <input type="text" class="form-control" placeholder="Nombre y Apellido" name="name" autocomplete="off" value="{{ old('name')}}" required>
                        </div>
                        @error('name')
                            <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                        <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                            <select name="nationality" id="nacionalidad" class="form-control" required>
                                <option value="">Nacionalidad</option>
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
                            <input type="number" name="phone" class="form-control" id="telefono" placeholder="Teléfono" autocomplete="off" value="{{ old('phone') }}" required>
                        </div>
                        @error('nationality')
                            <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                        @error('phone')
                            <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                        <div class="mb-2" style="margin-left: 5%; margin-right: 5%">
                            <input type="text" class="form-control" placeholder="Empresa" name="company" autocomplete="off" value="{{ old('company') }}" required>
                        </div>
                        <div class="mb-2" style="margin-left: 5%; margin-right: 5%">
                            <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off" value="{{ old('email') }}" required>
                        </div>
                        @error('email')
                            <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                        <div class="mb-2" style="margin-left: 5%; margin-right: 5%">
                            <input type="password" class="form-control" placeholder="Contraseña" name="password" autocomplete="off" {{ old('password') }} required>
                        </div>
                        @error('password')
                            <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                        <div class="mb-2" style="margin-left: 5%; margin-right: 5%">
                            <button type="submit" class="btn btn-block" style="background-color: #FEC02F">Sí, me uno!</button>
                        </div>
                    </form>
                    <div>
                        <p class="text-white" style="font-size: 12px;">*Al registrarse aceptas nuestras <a href="{{ route('web.socios.politicas') }}" style="color: red">Políticas de privacidad</a></p>
                    </div>
                    <div class="pb-3">
                        <p class="text-white">O si estas registrado puedes <a href="{{route('partner.showform')}}">Iniciar Sesión</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div>
    <p class="text-center mt-5">Solicite los servicios de un abogado <br> en Latinoamérica</p>
</div>
<hr style="width: 50%">
<div class="row">
    <div class="col-sm-12 col-12 d-flex justify-content-center">
        <div style="display: inline-block" class="mr-2">
            <p><b>BUSCAR POR:</b></p>
        </div>
        
        <form action="{{ route('web.showallpartners') }}" method="GET">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <select class="form-control" name="country" id="country">
                        <option value="">País</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->country_residence }}">{{ $country->country_residence}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <select class="form-control" name="specialty" id="specialty">
                        <option value="">Especialidad</option>
                        @foreach ($specialties as $specialty)
                            <option value="{{ $specialty->specialty }}">{{ $specialty->specialty}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Buscar</button>
            </div>
            </div>
        </form>
    </div>
</div>

<div class="container mt-5 contenido">
    @if (count($partners) > 0)
        <div class="row">
            @foreach ($partners as $partner)
                <div class="col-sm-3">
                    <a href="{{ route('web.showpartner', $partner->id) }}">
                        <div class="testimotionals">
                            <div class="card mb-3">
                            <div class="layer"></div>
                            <div class="content">
                                <div class="image">
                                    <img width="125px" height="150px" src="{{ asset('storage/'.$partner->img_profile) }}" alt="">
                                </div>
                                <h5><b>{{ $partner->name }} {{ $partner->lastname }}</b></h5>
                                <p>{{ $partner->specialty }}</p>
                                <h6><b>{{ $partner->nationality }} <img src="{{ asset('img/partners/'.Str::lower(Str::studly($partner->nationality)).'.png') }}"/></b></h6>
                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <p><i class="fas fa-phone-alt"></i> {{ $partner->codigo_pais }} {{ $partner->phone }}</p>
                                    </div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p><i class="far fa-envelope" style="margin-right: 5px;"></i>{{ $partner->email }}</p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        @else
            <div class="row d-flex text-align-center justify-content-center">
                <div class="alert alert-success">
                    <h4>No se encontraron registros</h4>
                </div>        
            </div>
        @endif
</div>
@endsection

@section('script')
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('{{url('img/partners/BANNER-PARTNERS.jpg')}}')";
    });
  </script>
@endsection