@extends('layouts.web')
@section('header')

@php 
    $countriesmeta = \App\Partner::select('country_residence')->distinct()->get();
@endphp

    <title>Abogados y Notarias en Latinoamérica a su alcance</title>
    <meta name="description" content="👨‍⚖️ Contamos con un amplio directorio de abogados y notarios en Latinoamérica para ayudarlo a gestionar sus trámites | Notaria Latina">
    <meta name="keywords" content="legislacion, judicial, abogados en latinoamerica, abogados near me, abogados cerca de mi, abogados de accidentes, abogados de familia, abogados de divorcio, abogados de inmigracion, abogado inmobiliario, abogados de trabajo, abogados testamentos y herencias, notario near me, notario cerca de mi, abogado notaria near me, abogado penalista, abogado civil, @foreach($countriesmeta as $country)abogado en {{Str::lower($country->country_residence)}},@endforeach abogados latinos">
    <style>
        html, body {
            max-width: 100% !important;
            overflow-x: hidden !important;
        }
        /*QUITAR LA ETIQUETA DE TELEFONO DE LA ESQUINA SUPERIOR DERECHA EN LA PAGINA DE LOS PARTNERS*/
        #etiquetaPhone{
            display: none;
        }
        .testimotionals {width:100%;display:inline-block;}
        .testimotionals .card {
            position:relative;
            overflow:hidden;
            width:100%;
            margin:0 auto;
            /* background:rgb(255, 255, 255); */
            background: #f5f6f8;
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
            color: black;
        }

        .testimotionals .card .content:hover {
            color: white;
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
            text-align: left; /*LE AGREGUE ESTO PARA QUE SE JUSTIFIQUE A LA IZQUIERDA*/
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

        @media screen and (max-width: 860px){
            .countrysearch{
                margin-left: 0% !important;
                font-size: 13px;
            }

            .form{
                margin-left: 0%;
                margin-right: 0%;
            }

            .titulo{
                margin-top: 15%;
            }
            #rowTxt{
                padding-top: 15px !important;  
            }
            #rowTxt h5{
                font-size: 16px;  
            }
            #rowTxt p{
                font-size: 15px; 
            }
            #rowFiltros{ 
                margin-left: -40px !important;
                margin-right: -65px !important;
            }
            #btnBuscar{
                width: 120px !important; 
                height: 20px !important; 
                font-size: 10px !important;
            }
            #imgBanner{
                height: 100px !important;
            }
            #imgPareja{
                margin-left: 12% !important;
                width: 210px !important;
            }
            #txtBanner{
                font-size: 11px !important;
                margin-right: 10% !important;
            }
        }
        @media screen and (max-width: 580px){
            .contenido{
                margin-left: 0% !important;
                margin-right: 0% !important;
            }
            #rowDataPartner{
               margin-left: -15% !important;
            }
            .txtDataPartner{
                font-size: 10px !important;
            }
            .dismissMarginTopBottom{
                margin-top: 0% !important;
                margin-bottom: 0% !important;
            }
            .image{
                width: 100px !important; 
                height: 125px !important;
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
        select {
            box-shadow: 2px 2px 3px #bfbfbf;
        }
    </style>
    <script src="{{ asset('js/lazysizes.min.js') }}"></script>
@endsection

@section('content')

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>
        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">
            <div class="col-sm-6 col-12 text-white text-center">
              <h1 class="font-weight-bold heading-title titulo">¡Abogados y Notarias<br> en Latinoamérica a su alcance!</h1>
            </div>
            <div class="col-sm-6">
                <div class="text-center form" style="background-color: #002542;">
                    <h4 class="text-white pt-4 px-4" style="margin: 10px 10px 10px 10px;">¿Eres abogado y quieres anunciarte en Estados Unidos?</h4>
                    <p class="text-white">Se parte de nuestro equipo AHORA!</p>
                    <form action="{{ route('socios.registro') }}" method="POST">        
                        @csrf
                        <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                            <input style="margin-right: 1%" type="text" class="form-control" placeholder="Nombre" name="name" autocomplete="off" value="{{ old('name')}}" required>
                            <input type="text" class="form-control" placeholder="Apellido" name="lastname" autocomplete="off" value="{{ old('lastname')}}" required>
                        </div>
                        @error('name')
                            <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                        <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                            <select name="country_residence" id="country_residence" class="form-control" required>
                                <option value="">País</option>
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
                            <input type="text" style="margin-left: 3px; background-color: #ffffff" name="codTelfPais" id="codTelfPais" class="form-control" readonly>
                            <input type="number" name="phone" class="form-control" id="telefono" placeholder="Teléfono" autocomplete="off" value="{{ old('phone') }}" required>
                        </div>
                        @error('country_residence')
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
                            {{-- <input type="text" class="form-control" placeholder="Empresa" name="company" autocomplete="off" value="{{ old('company') }}" required> --}}
                            <select name="company" id="company" class="form-control" required>
                                <option value="Empresa">Empresa</option>
                                <option value="Libre Ejercicio">Libre Ejercicio</option>
                            </select>
                        </div>
                        <div class="mb-2" style="margin-left: 5%; margin-right: 5%">
                            <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off" value="{{ old('email') }}" required>
                        </div>
                        @error('email')
                            <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                        <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                            {{-- <input type="password" class="form-control" placeholder="Crea una contraseña para tu perfil" name="password" autocomplete="off" {{ old('password') }} required> --}}
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" placeholder="Cree una contraseña" id="password" autocomplete="off" required>
                                <div class="input-group-append" style="cursor: pointer" onclick="mostrarContrasena();"> {{--onmousedown="mostrarContrasena();" onmouseup="mostrarContrasena();"--}}
                                  <span class="input-group-text" id="basic-addon2"><i id="eyePassword" class="fas fa-eye"></i></span>
                                </div>
                            </div>
                        </div>
                        @error('password')
                            <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                        <div class="mb-2" style="margin-left: 5%; margin-right: 5%">
                            <button type="submit" class="btn btn-block" style="background-color: #FEC02F">Registrarse</button>
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

<div class="pb-3" id="contentPartner" style="background-color: #f5f6f8">
    @include('web.partials.search_partner')   
</div>

@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function mostrarContrasena(){
      var tipo = document.getElementById("password");
      var eye = document.getElementById("eyePassword");
        if(tipo.type == "password"){
            tipo.type = "text";
            eye.classList.remove('fas', 'fa-eye');
            eye.classList.add('fas', 'fa-eye-slash');
        }else{
            tipo.type = "password";
            eye.classList.remove('fas', 'fa-eye-slash');
            eye.classList.add('fas', 'fa-eye');
        }
    }

    function loadStates(){
        var idCountry = $('#country').val();
            $.ajax({
                url: "{{ route('partners.fetch.state.a') }}",
                type: "POST",
                data: {
                    "_token" : "{{ csrf_token() }}",
                    "id": idCountry
                },
                dataType: "json",
                success: function(result){
                    $('#stateSelect').html('<option value="">Todos</option>');
                    $.each(result, function(key, value){
                        $('#stateSelect').append('<option value="' + value.name_state + '">' + value.name_state + "</option>");
                    });
                }
            });
    }

        function selectCountry(id){
            $.ajax({
                type: "POST",
                url: "{{ route('partners.fetch.state') }}",
                data: {
                    "_token" : "{{ csrf_token() }}",
                    "country" : id,
                    "state" : null,
                    "specialty": null
                },
                dataType: "json",
                success: function(result){
                    $('#contentPartner').html(result.viewPartners);
                },
                error: function(xhr, status, error){
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    if(xhr.status == 419){
                        alert('Por favor recargue la página');
                    }
                    // alert('Error - ' + errorMessage);
                }
            });
        }

        var selectPaisResidencia = document.getElementById('country_residence');
        var inputCodPais = document.getElementById('codTelfPais');
        
        selectPaisResidencia.onchange  = function(e){
            switch (selectPaisResidencia.value) {
                case "Argentina":codigo = "+54";break;
                case "Bolivia":codigo = "+591";break;
                case "Colombia":codigo = "+57";break;
                case "Costa Rica":codigo = "+506";break;
                case "Ecuador":codigo = "+593";break;
                case "El Salvador":codigo = "+503";break;
                case "España":codigo = "+34";break;
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

    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('{{url('img/partners/BANNER-PARTNERS.webp')}}')";
    });
  </script>
@endsection