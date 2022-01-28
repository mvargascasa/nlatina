<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verificar Correo - Notaria Latina</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <style>
        .footer{
            position: fixed;
            height: 100px;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row bg-light">
            <div class="col-sm-6">
                <div class="p-5 rounded">
                    <div>
                        <img style="width: 200px" src="{{ asset('img/partners/WEB-HEREDADO.png') }}" alt="">
                    </div>
                    <h4 class="mt-4">
                        ¡Felicidades su usuario se ha registrado exitosamente!
                    </h4>
                    <ul>
                        <li>
                            <p class="mt-3">Para continuar, ingrese a su correo electrónico y verifique el enlace de confirmación de registro</p>
                        </li>
                        <li>
                            Si usted ya esta registrado y no ha recibido un correo de confirmación, haga un click
                            <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="d-inline btn btn-link p-0" style="margin-top: -5px">
                                    aquí
                                </button>
                            </form>
                            para enviar nuevamente un enlace
                        </li>
                        <li>
                            <p>Si el correo no llega a su Bandeja de Entrada, no olvide revisar su carpeta de spam</p>
                        </li>
                    </ul>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Hemos reenviado a tu correo un nuevo email para verificar tu cuenta
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-sm-6 d-flex align-items-center">
                <img class="img-fluid" style="width: 75%" src="{{ asset('img/partners/verificacion.png')}}" alt="Notaria Latina">
            </div>
        </div>
    </div>
    
    <footer class="footer text-white" style="background-color: #122944;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-md-3 pt-4">
                    <img style="padding-bottom: 15px;" class="img-fluid" src="{{asset('img/marca-notaria-latina.png')}}" alt="Logo Notaria Latina">
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
