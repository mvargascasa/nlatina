@extends('layouts.app')

@section('scripts')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img{
            position: absolute;
            object-fit: contain;
            width: 75%;
            height: 75%;
        }
    </style>
@endsection

@section('content')
<div class="col-9 mt-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header font-weight-bold">CREAR PARTNER</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['route' => 'partner.store', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('name', 'Nombre') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('lastname', 'Apellido') !!}
                                    {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
                                @error('lastname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('specialty', 'Especialidad') !!}
                                    {!! Form::text('specialty', null, ['class' => 'form-control']) !!}
                                @error('specialty')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('country_residence', 'Pais de residencia') !!}
                                    {!! Form::select('country_residence', [null => 'Seleccione', 'Ecuador' => 'Ecuador', 'Colombia' => 'Colombia'], null, ['class' => 'form-control']) !!}
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
                                    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('email', 'Email') !!}
                                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row pt-4">
                            <div class="col-md-6">
                                <div class="image-wrapper">
                                    <img id="picture" src="{{ asset('img/user.png') }}" alt="">
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

                        <div class="form-group col-md-5">
                            {!! Form::label('status', 'Estado') !!}
                            {!! Form::select('status',[null => 'SELECCIONE', 'NO PUBLICADO' => 'NO PUBLICADO','PUBLICADO' => 'PUBLICADO'],    null,    ['class' => 'form-control custom-select']) !!}
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('biography_html', 'Biografia') !!}
                            {!! Form::textarea('biography_html', null, ['class' => 'form-control','rows' => '4']) !!}
                            @error('biography_html')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Registrar Partner',  ['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}    
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection

@section('end-scripts')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

