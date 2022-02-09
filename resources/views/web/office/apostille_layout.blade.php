@extends('layouts.web')

@section('header')
    <title>Apostillar {{ $data['description'] }} en {{ $data['office'] }} | Notaria Latina</title>
    <style>
        @media screen and (max-width: 580px){
            #title{
                font-size: 20px !important;
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
                font-size: 10px !important;
                margin-bottom: -25px !important;
            }
        }
    </style>
@endsection

@section('phoneNumberHidden', $data['telfHidden'])
@section('phoneNumber', $data['telfShow'])

@section('content')
<div class="d-flex justify-content-center align-items-center text-center" style="height: 20vh; box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">
    <h1 id="title" style="font-size: 40px">Apostillamos <b>{{ $data['description']}}</b> en {{ $data['office']}}</h1>
</div>
    <div class="container mt-5">
        <div id="card" class="card ml-5 mr-5" style="box-shadow: 1px 1px 4px 4px #d5d4d4; border-radius: 0px">
            <div class="card-header" style="border-bottom: none; background-color: #ffffff">
                <div class="d-flex justify-content-center align-items-center">
                    {{-- <img class="img-fluid" style="margin-left: 1%; margin-top: 1%" src="{{ asset('img/apostilla-haya1.png') }}" alt=""> --}}
                    <h4 class="text-center" style="font-size: 30px; margin-left: 5%; margin-right: 5%; margin-top: 1%">Para apostillar <b>{{ $data['description'] }}</b> por favor complete el siguiente formulario con su información y el documento a realizar el trámite</h4>
                </div>
            </div>
            <div class="card-body">
                <div id="divBody" class="mt-3" style="margin-left: 10%; margin-right: 10%">
                    {!! Form::open(['route' => 'send.apostilla', 'enctype' => 'multipart/form-data', 'files' => true, 'method' => 'POST']) !!}
                        @csrf
                        <input type="hidden" name="document" value="{{ $data['description'] }}">
                        <div class="mb-5 d-flex">
                            <input style="border: none; border-bottom:solid 1px; border-radius: 0px; margin-right: 5px; border-color: rgb(228, 216, 216)" type="text" class="form-control inputs" placeholder="Nombre*" name="name" autocomplete="off" value="{{ old('name')}}" required>
                            <input style="border: none; border-bottom:solid 1px; border-radius: 0px; border-color: rgb(228, 216, 216)" type="text" class="form-control inputs" placeholder="Apellido*" name="lastname" autocomplete="off" value="{{ old('lastname')}}" required>
                        </div>
                        <div class="mb-5 d-flex">
                            @include('layouts.select_countries')
                            <input class="form-control inputs" type="text" id="telf" style="border: none; border-bottom:solid 1px; border-radius: 0px; margin-left: 5px; margin-right: 5px; background-color: #ffffff; border-radius: 0px; border-color: rgb(228, 216, 216)" value="Código país" readonly>
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
                            <input style="background-color: #ffc107; color: #000000; border: none" type="submit" value="Enviar" class="btn btn-primary">
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
        var pais = document.getElementById('pais');
        var telf = document.getElementById('telf');

    pais.onchange = function(e) {
	    telf.value = this.value;
	    if((this.value).trim() != '') {
            telf.disabled = false;
	    } else {
		    telf.disabled = true;
	    }
    }
    </script>
@endsection