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
        }

        .form{
            margin-left: 20%;
            margin-right: 20%;
            margin-top: 5%;
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
                    <form action="{{ route('partner.suscripcion') }}" method="POST">        
                        @csrf
                        <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" autocomplete="off" required>
                        </div>
                        <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                            <input type="text" class="form-control" placeholder="Apellido" name="apellido" autocomplete="off" required>
                        </div>
                        <div class="mb-2" style="margin-left: 5%; margin-right: 5%">
                            <input type="text" class="form-control" placeholder="Especialidad" name="especialidad" autocomplete="off" required>
                        </div>
                        <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                            <select id="pais" name="cod_pais" class="form-control" required>
                                <option value="">País de residencia</option>
                                <option value="+54">Argentina</option>
                                <option value="+591">Bolivia</option>
                                <option value="+57">Colombia</option>
                                <option value="+506">Costa Rica</option>
                                <option value="+593">Ecuador</option>
                                <option value="+503">El Salvador</option>
                                <option value="+34">España</option>
                                <option value="+1">Estados Unidos</option>
                                <option value="+502">Guatemala</option>
                                <option value="+504">Honduras</option>
                                <option value="+52">México</option>
                                <option value="+505">Nicaragua</option>
                                <option value="+507">Panamá</option>
                                <option value="+595">Paraguay</option>
                                <option value="+51">Perú</option>
                                <option value="+1 787">Puerto Rico</option>
                                <option value="+1 809">República Dominicana</option>
                                <option value="+598">Uruguay</option>
                                <option value="+58">Venezuela</option>                    
                              </select>  
                            <input style="margin-left: 3px" type="number" class="form-control" placeholder="Teléfono" name="telefono" autocomplete="off" required>
                        </div>
                        <div class="mb-2" style="margin-left: 5%; margin-right: 5%">
                            <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off" required>
                        </div>
                        <div class="mb-4 pb-4" style="margin-left: 5%; margin-right: 5%">
                            <button type="submit" class="btn btn-block" style="background-color: #FEC02F">Sí, me uno!</button>
                        </div>
                    </form>
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
        
        <form action="" method="GET">
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
                <button class="btn btn-primary" type="submit" href="">Buscar</button>
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
                    <a href="{{ route('web.partner', $partner->id) }}">
                        <div class="testimotionals">
                            <div class="card mb-3">
                            <div class="layer"></div>
                            <div class="content">
                                <div class="image">
                                    <img width="100px" height="150px" src="{{ asset('storage/'.$partner->img_profile) }}" alt="">
                                </div>
                                <h5><b>{{ $partner->name }} {{ $partner->lastname }}</b></h5>
                                <p>{{ $partner->specialty }}</p>
                                <h6><b>{{ $partner->country_residence }} <img src="{{ asset('img/partners/ecuador.png') }}"/></b></h6>
                                <div class="row mt-5">
                                    <div class="col-sm-6">
                                        <p><i class="fas fa-phone-alt"></i>{{ $partner->phone }}</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="float-right"><i class="far fa-envelope" style="margin-right: 5px;"></i>{{ $partner->email }}</p>
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
                <div class="alert alert-warning">
                    <h4>No se encontraron registros</h4>
                </div>        
            </div>
        @endif
    {{-- <div class="d-flex justify-content-center">
        <a class="btn btn-primary mt-5" style="background-color: #002542" href="">CARGAR MÁS CONTACTOS</a>
    </div> --}}
</div>
@endsection

@section('script')
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('{{url('img/partners/BANNER-PARTNERS.jpg')}}')";
    });
  </script>
@endsection