<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset</title>
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
    <div class="container">
        <div class="bg-light p-5 rounded mt-5">
            <div class="row justify-content-center">
                <img style="width: 250px" src="{{ asset('img/partners/WEB-HEREDADO.png') }}" alt="">
            </div>
            <hr>
            <h1 class="text-center">Tu correo se ha registrado exitosamente</h1>
            
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    Hemos reenviado a tu correo un nuevo email para verificar tu cuenta
                </div>
            @endif

            Para continuar, verifique su correo electrónico para ver si hay un enlace de verificación. Si no recibió el correo electrónico,
            <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="d-inline btn btn-link p-0">
                    haga clic aquí para solicitar otro
                </button>.
            </form>
            <p class="mt-3" style="font-weight: bold">Si ya estabas registrado y no recibiste ningun correo, de igual manera da click en el enlace para enviar un link a tu correo y verificar tu cuenta</p>
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
