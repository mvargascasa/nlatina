@extends('layouts.web')

@section('header')
    <meta name="title" content="Apostillar {{ $data['description'] }} en {{ $data['office'] }}">
    <meta name="description"     content="{{ $data['metadescription'] }}">
    <meta name="keywords"        content="{{ $data['keywords'] }}">
    <title>Apostillar {{ $data['description'] }} en {{ $data['office'] }} | Notaria Latina</title>
    <style>
        @media screen and (max-width: 580px){
            #title{
                font-size: 20px !important;
            }
            #txtSubtitle{
                font-size: 18px !important;
                justify-content: left !important;
            }
            #card{
                margin-right: 0px !important;
                margin-left: 0px !important;
            }
            #divBody{
                margin-left: 0px !important;
                margin-right: 0px !important;
            }
            .inputs{
                font-size: 12px !important;
                margin-bottom: -25px !important;
            }
        }
    </style>
@endsection

@section('phoneNumberHidden', $data['telfHidden'])
@section('phoneNumber', $data['telfShow'])

@section('content')
<div id="prisection" class="d-flex justify-content-center align-items-center text-center" style="height: 25vh;background-size: cover; background-position: left top; background-repeat: no-repeat;">
    <h1 id="title" style="font-size: 40px; color: #ffffff">Apostillamos <b>{{ $data['description']}}</b> en {{ $data['office']}}</h1>
</div>
    <div class="container mt-5">
        <div id="card" class="card ml-5 mr-5" style="box-shadow: 1px 1px 4px 4px #d5d4d4; border-radius: 0px">
            <div class="card-header" style="border-bottom: none; background-color: #333333">
                <div class="d-flex justify-content-center align-items-center">
                    <h5 id="txtSubtitle" class="text-center text-white" style="font-size: 30px; margin-left: 5%; margin-right: 5%; margin-top: 1%; padding-top: 2%; padding-bottom: 2%">Para apostillar <b>{{ $data['description'] }}</b>, complete el formulario y nos pondrémos en contacto</h5>
                </div>
            </div>
            <div class="card-body">
                <div id="divBody" class="mt-3" style="margin-left: 10%; margin-right: 10%">
                    {!! Form::open(['route' => 'send.apostilla', 'enctype' => 'multipart/form-data', 'files' => true, 'method' => 'POST']) !!}
                        @csrf
                        <input type="hidden" name="document" value="{{ $data['description'] }}">
                        <input type="hidden" name="from" value="{{$data['office']}}">
                        <div class="mb-5 d-flex">
                            <input style="border: none; border-bottom:solid 1px; border-radius: 0px; margin-right: 5px; border-color: rgb(228, 216, 216)" type="text" class="form-control inputs" placeholder="Nombre*" name="name" autocomplete="off" value="{{ old('name')}}" required>
                            <input style="border: none; border-bottom:solid 1px; border-radius: 0px; border-color: rgb(228, 216, 216)" type="text" class="form-control inputs" placeholder="Apellido*" name="lastname" autocomplete="off" value="{{ old('lastname')}}" required>
                        </div>
                        <div class="mb-5 d-flex">
                            @include('layouts.select_countries')
                            <input class="form-control inputs" type="number" placeholder="Teléfono*" style="border: none; border-bottom:solid 1px; border-radius: 0px; border-radius: 0px; border-color: rgb(228, 216, 216)" name="phone" id="phone" maxlength="14" minlength="8" autocomplete="off" required>
                        </div>
                        <div class="mb-5 d-flex">
                            <input type="email" name="email" id="email" style="border: none; border-bottom:solid 1px; border-radius: 0px; border-color: rgb(228, 216, 216)" class="form-control inputs" placeholder="Correo electrónico*" required/>
                        </div>
                        <div class="mb-5 d-flex">
                            <textarea name="mensaje" id="mensaje" rows="4" style=" border-radius: 0px; border-color: rgb(228, 216, 216)" class="form-control inputs" placeholder="Mensaje"></textarea>
                        </div>
                        <label class="mb-2 inputs" for="adjunto">Subir un archivo</label>
                        <div class="mb-5 d-flex">
                            <input type="file" name="adjunto" id="adjunto" class="form-control inputs">
                        </div>
                        <div class="mb-5 d-flex justify-content-center">
                            <input style="background-color: #ffc107; color: #000000; border: none" type="submit" value="Enviar" class="btn btn-primary btn-block">
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        @php
            echo "
                <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                <script>
                    swal('Hemos enviado tu información', 'Nos pondremos en contacto lo antes posible', 'success');
                </script>
                ";    
        @endphp
    @endif
    @if(session('error'))
        @php
            echo "
                <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                <script>
                    swal('Algo salió mal!', 'Intenta enviando nuevamente', 'success');
                </script>
                ";    
        @endphp
    @endif
@endsection


@section('numberWpp', $data['telfWpp'])

@section('script')
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('{{url('img/Apostilla-General.webp')}}')";
    });
</script>
@endsection