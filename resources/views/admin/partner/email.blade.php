<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <style>
        h2, p, label{
            color: #00223b;
        }

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
        <div class="row justify-content-center">
            <img style="width: 250px" src="{{ asset('img/partners/WEB-HEREDADO.png') }}" alt="">
        </div>
        <hr>
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        
                        <form method="POST" action="{{route('socio.password.email')}}">
                            @csrf
                            <h2 style="font-weight: bold">Partner</h2>
                            <p>Restablecer contraseña</p>
                            <div class="form-group row">
                                <div class="col">
                                    <label for="email" style="font-size: 15px" class="col col-form-label text-md-left">{{ __('Correo electrónico') }}</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col text-center">
                                    <button type="submit" class="btn text-white" style="background-color: #00223b">
                                        {{ __('Enviar enlace para restablecer contraseña') }}
                                    </button>
                                </div>
                            </div>
                        </form>
            </div>
        </div>
        <hr style="margin-top: 70px">
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



