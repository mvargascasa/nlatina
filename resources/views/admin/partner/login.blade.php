<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Socios</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.min.css')}}">
    <style>
        .header{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5 pt-2">
        <div class="header">
            <h1 style="color: rgb(23, 10, 49)">INICIO DE SESIÓN</h1>
        </div>
        <section class="vh-100">
            <div class="container-fluid h-custom mt-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://blog.lemontech.com/wp-content/uploads/2021/01/frases-de-abogados.jpg" class="img-fluid"
                    alt="Socios Notaria Latina">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="{{ route('socios.login') }}" method="POST">
                    @csrf
                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">ABOGADOS DE NOTARIA LATINA</p>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="email" id="form3Example3" class="form-control form-control-lg" value="{{ old('email') }}"
                            placeholder="Ingrese su correo electrónico" name="email" required autocomplete="off"/>
                        <label class="form-label" for="form3Example3">{{ __('Correo Electrónico')}}</label>
                    </div>
                    <div class="form-outline mb-3">
                        <input type="password" id="form3Example4" class="form-control form-control-lg" value="{{ old('password') }}"
                        placeholder="Ingrese su contraseña" name="password" required/>
                        <label class="form-label" for="form3Example4">Contraseña</label>
                    </div>
                    <div>
                        <a href="{{ route('socio.show.password.form')}}">Se me olvido mi contraseña</a>
                    </div>
                    @error('email')
                        <div>
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        </div>
                    @enderror
                    @error('password')
                        <div>
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        </div>
                    @enderror
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </section>
    </div>
</body>
</html>