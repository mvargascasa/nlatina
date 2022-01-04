@extends('admin.partner.layouts.sidebar')

@section('scripts')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img{
            position: absolute;
            object-fit: contain;
            width: 30%;
            height: 70%;
            box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }
    </style>
@endsection

@section('content')
<div class="container">

    <div class="col-12 mt-4">
        <img style="background-color: black; border-radius: 10px; padding: 10px;" src="{{ asset('img/marca-notaria-latina.png') }}" alt="">
        <h4 style="color: rgb(97, 97, 250); margin-top: 10px; text-align: center">Inscripción para formar parte de nuestro directorio de partners.</h4>
        <p style="text-align: center">Ingresa tus datos y forma parte de nuestro directorio de partners. Accede a beneficios de anunciarte gratis en Estados Unidos</p>
        <div class="row justify-content-center mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header font-weight-bold">ACTUALIZAR DATOS</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {!! Form::open(['route' => ['socios.update', $partner], 'enctype' => 'multipart/form-data', 'files' => true, 'method' => 'POST']) !!}

                            @csrf
                            @method('put')

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Nombre y Apellido') !!}
                                        {!! Form::text('name', $partner->name, ['class' => 'form-control']) !!}
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('specialty', 'Especialidad') !!}
                                        {!! Form::text('specialty', $partner->specialty, ['class' => 'form-control']) !!}
                                        @error('specialty')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        {!! Form::label('company', 'Empresa') !!}
                                        {!! Form::text('company', $partner->company, ['class' => 'form-control']) !!}
                                    @error('company')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        {!! Form::label('nationality', 'Nacionalidad') !!}
                                        {!! Form::select('nationality', [null => 'Seleccione', 'Argentina' => 'Argentina', 'Bolivia' => 'Bolivia', 'Colombia' => 'Colombia', 'Costa Rica' => 'Costa Rica', 'Ecuador' => 'Ecuador', 'El Salvador' => 'El Salvador', 'España' => 'España', 'Guatemala' => 'Guatemala', 'Honduras' => 'Honduras', 'México' => 'México', 'Nicaragua' => 'Nicaragua', 'Panamá' => 'Panamá', 'Paraguay' => 'Paraguay', 'Perú' => 'Perú', 'Puerto Rico' => 'Puerto Rico', 'República Dominicana' => 'República Dominicana', 'Uruguay' => 'Uruguay', 'Venezuela' => 'Venezuela'], $partner->nationality, ['class' => 'form-control']) !!}
                                    @error('nationality')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        {!! Form::label('country_residence', 'Pais de residencia') !!}
                                    @if ($partner->country_residence != null)
                                        {!! Form::select('country_residence', [null => 'Seleccione', 'Argentina' => 'Argentina', 'Bolivia' => 'Bolivia', 'Colombia' => 'Colombia', 'Costa Rica' => 'Costa Rica', 'Ecuador' => 'Ecuador', 'El Salvador' => 'El Salvador', 'España' => 'España', 'Guatemala' => 'Guatemala', 'Honduras' => 'Honduras', 'México' => 'México', 'Nicaragua' => 'Nicaragua', 'Panamá' => 'Panamá', 'Paraguay' => 'Paraguay', 'Perú' => 'Perú', 'Puerto Rico' => 'Puerto Rico', 'República Dominicana' => 'República Dominicana', 'Uruguay' => 'Uruguay', 'Venezuela' => 'Venezuela'], $partner->country_residence, ['class' => 'form-control']) !!}    
                                    @else
                                        {!! Form::select('country_residence', [null => 'Seleccione', 'Argentina' => 'Argentina', 'Bolivia' => 'Bolivia', 'Colombia' => 'Colombia', 'Costa Rica' => 'Costa Rica', 'Ecuador' => 'Ecuador', 'El Salvador' => 'El Salvador', 'España' => 'España', 'Guatemala' => 'Guatemala', 'Honduras' => 'Honduras', 'México' => 'México', 'Nicaragua' => 'Nicaragua', 'Panamá' => 'Panamá', 'Paraguay' => 'Paraguay', 'Perú' => 'Perú', 'Puerto Rico' => 'Puerto Rico', 'República Dominicana' => 'República Dominicana', 'Uruguay' => 'Uruguay', 'Venezuela' => 'Venezuela'], null, ['class' => 'form-control']) !!}
                                    @endif
                                    @error('country_residence')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('phone', 'Telefono') !!}
                                        {!! Form::number('phone', $partner->phone, ['class' => 'form-control']) !!}
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('email', 'Email') !!}
                                        {!! Form::email('email', $partner->email, ['class' => 'form-control']) !!}
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row pt-4">
                                <div class="col-md-6">
                                    <div class="image-wrapper d-flex justify-content-center">
                                        @if ($partner->img_profile != null)
                                            <img id="picture" class="img-fluid" src="{{ asset('storage/'.$partner->img_profile) }}" alt="No se pudo cargar la imagen">
                                        @else
                                           <img id="picture" class="img-fluid" src="{{ asset('img/user.webp') }}" alt="No se pudo cargar la imagen">
                                        @endif                    
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('img_profile', 'Imagen de perfil') !!}
                                    {!! Form::file('img_profile', ['class' => 'form-control-file', 'accept' => 'image/*', 'onchange' => 'showPreview(event);']) !!}
                                    @error('img_profile')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('biography_html', 'Biografia (Descripción de trayectoria y experiencia en su área)') !!}
                                {!! Form::textarea('biography_html', $partner->biography_html, ['class' => 'form-control','rows' => '4']) !!}
                                @error('biography_html')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-flex flex-column float-right">
                                <div class="form-group">
                                    {!! Form::submit('Aceptar y Registrarme',  ['class' => 'btn btn-primary']) !!}
                                </div>
                                <a style="text-decoration: none; color: black; text-align: end; font-size: 10px" href="#">Términos y condiciones</a>
                                {!! Form::close() !!}  
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection

@section('end-scripts')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            CKEDITOR.replace('biography_html');
        });

        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview  = document.getElementById("picture");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
@endsection

