<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Partners</title>
    <meta name="description" content="Inicio de Sesión - Partners de Notaria Latina ⚖">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    <style>
        html, body{
            max-width: 100% !important;
            overflow-x: hidden !important;
        }
        .img-logo{
            width: 150px;
            margin-top: 20px;
            margin-left: 40px;
            margin-bottom: 20px;
        }

        #div-relative{
            position: relative;
        }

        #div-absolute{
            position: absolute;
            top: 0;
            right: 70px;
            color: white;
        }
        #formLoginOculto{
            display: none;
        }
        #formLogin{
            display: block;
        }
        @media screen and (max-width: 580px){
            #lista{
                margin-top: 0px !important;
            }
            #lista > li{
                color: #ffffff;
            }
            #formLoginOculto{
                display: block;
            }
            #formLogin{
                display: none;
            }
        }

    </style>
</head>
<body>
    <div>
        <div class="row">
            <a href="{{ route('web.index') }}"><img class="img-logo" src="{{ asset('img/partners/WEB-HEREDADO.png') }}" alt=""></a>
        </div>
        <div class="row">
            {{--DIV PARA MOSTRAR EM MOVIL QUE SALGA PRIMERO--}}
            <div id="formLoginOculto" class="col-sm-4 mb-4">
                <div class="mx-2 mt-1">
                    <h1 style="font-weight: bold">Iniciar Sesión</h1>
                    <form action="{{ route('socios.login') }}" method="POST">
                        @csrf
                        <div class="form-outline mb-4">
                            <label class="form-label mb-3" for="form3Example3">{{ __('Correo Electrónico')}}</label>
                            <input type="email" id="form3Example3" class="form-control" value="{{ old('email') }}"
                                name="email" required autocomplete="off"/>
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label mb-3" for="form3Example4">Contraseña</label>
                            {{-- <input type="password" id="form3Example4" class="form-control" value="{{ old('password') }}"
                            name="password" required/> --}}
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="passwordmovil" autocomplete="off" required>
                                <div class="input-group-append" style="cursor: pointer" onclick="mostrarContrasena();"> {{--onmousedown="mostrarContrasena();" onmouseup="mostrarContrasena();"--}}
                                  <span class="input-group-text" id="basic-addon2"><i id="eyePasswordMovil" class="fas fa-eye"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Recuerdame en este ordenador</label>
                        </div>

                        @if ($errors->has('email'))
                            <div class="alert alert-danger" role="alert">
                                Credenciales incorrectas, intentalo nuevamente
                            </div>
                        @endif
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-block"
                                style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: #00223b">Entrar</button>
                        </div>
                    </form>
                    <div style="text-align: center; margin-top: 15px">
                        <a style="text-decoration: none;" class="text-muted" href="{{ route('socio.password.request')}}">¿Olvidó su contraseña?</a>
                    </div>
                    <div class="d-flex" style="margin-top: 15px">
                        <hr style="width: 40%">o<hr style="width: 40%">
                    </div>
                    <div style="margin-top: 15px" class="text-center">
                        <h6 class="text-muted">¿Aún no está registrado? <a style="text-decoration: none; color: #000000; font-weight: bold" href="{{ route('partners.registro') }}">Únase</a></h6>
                    </div>
                </div>
            </div>
            {{--TERMINA DIV OCULTO PARA MOSTRAR EN MOVIL--}}
            <div class="col-sm-6">
                <div id="div-relative">
                    <img id="imgFondoBeneficios" class="img-fluid" src="{{ asset('img/partners/FOTO-IZQUIERDA-AZUL.jpg') }}" alt="">
                    <div id="div-absolute">
                        <h4 style="margin-top: 30px; font-weight: bold; margin-left: 25px">Accede a varios beneficios</h4>
                        <div class="row" style="margin-top: 20px; margin-left:20px">
                            <div class="d-flex">
                                <img class="img-fluid" style="width: 60px; height: 60px; margin:5px" src="{{ asset('img/partners/ICONOS LOGIN-10.png') }}" alt="">
                                <img class="img-fluid" style="width: 60px; height: 60px; margin:5px" src="{{ asset('img/partners/ICONOS LOGIN-11.png') }}" alt="">
                                <img class="img-fluid" style="width: 60px; height: 60px; margin:5px" src="{{ asset('img/partners/ICONOS LOGIN-12.png') }}" alt="">
                                <img class="img-fluid" style="width: 60px; height: 60px; margin:5px" src="{{ asset('img/partners/ICONOS LOGIN-13.png') }}" alt="">
                            </div>
                        </div>
                        <ul id="lista" style="margin-top: 30px;">
                            <li>Reciba preguntas de futuros clientes</li>
                            <li>Deje que los usuarios le encuentren en nuestro directorio</li>
                            <li>Trato directo con los clientes</li>
                            <li>Testimonios y calificación de su servicio</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="formLogin" class="col-sm-4">
                <div class="mx-2 mt-1">
                    <h1 style="font-weight: bold">Iniciar Sesión</h1>
                    <form action="{{ route('socios.login') }}" method="POST">
                        @csrf
                        <div class="form-outline mb-4">
                            <label class="form-label mb-3" for="form3Example3">{{ __('Correo Electrónico')}}</label>
                            <input type="email" id="form3Example3" class="form-control" value="{{ old('email') }}"
                                name="email" required autocomplete="off"/>
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label mb-3" for="form3Example4">Contraseña</label>
                            {{-- <input type="password" id="form3Example4" class="form-control" value="{{ old('password') }}"
                            name="password" required/> --}}
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="passwordpc" autocomplete="off" required>
                                <div class="input-group-append" style="cursor: pointer" onclick="mostrarContrasena();"> {{--onmousedown="mostrarContrasena();" onmouseup="mostrarContrasena();"--}}
                                  <span class="input-group-text" id="basic-addon2"><i id="eyePasswordPc" class="fas fa-eye"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Recuerdame en este ordenador</label>
                        </div>

                        @if ($errors->has('email'))
                            <div class="alert alert-danger" role="alert">
                                Credenciales incorrectas, intentalo nuevamente
                            </div>
                        @endif
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-block"
                                style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: #00223b">Entrar</button>
                        </div>
                    </form>
                    <div style="text-align: center; margin-top: 15px">
                        <a style="text-decoration: none;" class="text-muted" href="{{ route('socio.password.request')}}">¿Olvidó su contraseña?</a>
                    </div>
                    <div class="d-flex" style="margin-top: 15px">
                        <hr style="width: 40%">o<hr style="width: 40%">
                    </div>
                    <div style="margin-top: 15px" class="text-center">
                        <h6 class="text-muted">¿Aún no está registrado? <a style="text-decoration: none; color: #000000; font-weight: bold" href="{{ route('partners.registro') }}">Únase</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">

            </div>
        </div>
    </div>

    <script defer src="{{asset('js/jquery-3.4.1.min.js')}}" ></script>
    <script defer src="{{asset('js/popper.min.js')}}"></script>
    <script defer src="{{asset('js/bootstrap.min.js')}}"></script>
    <script>
        function mostrarContrasena(){
        var tipo1 = document.getElementById("passwordpc");
        var eye1 = document.getElementById("eyePasswordPc");
        var tipo2 = document.getElementById("passwordmovil");
        var eye2 = document.getElementById("eyePasswordMovil");
            if(tipo1.type == "password"){
                tipo1.type = "text";
                eye1.classList.remove('fas', 'fa-eye');
                eye1.classList.add('fas', 'fa-eye-slash');
            }else{
                tipo1.type = "password";
                eye1.classList.remove('fas', 'fa-eye-slash');
                eye1.classList.add('fas', 'fa-eye');
            }
            if(tipo2.type == "password"){
                tipo2.type = "text";
                eye2.classList.remove('fas', 'fa-eye');
                eye2.classList.add('fas', 'fa-eye-slash');
            }else{
                tipo2.type = "password";
                eye2.classList.remove('fas', 'fa-eye-slash');
                eye2.classList.add('fas', 'fa-eye');
            }
        }
    </script>
</body>
</html>