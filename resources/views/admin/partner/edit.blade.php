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
            width: 100%;
            height: 100%;
        }
    </style>
@endsection

@section('content')
<div class="col-9 mt-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header font-weight-bold">EDITAR PARTNER</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['route' => ['partner.update', $partner], 'files' => true, 'method' => 'post']) !!}

                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('name', 'Nombre') !!}
                                    {!! Form::text('name', $partner->name, ['class' => 'form-control']) !!}
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('lastname', 'Apellido') !!}
                                    {!! Form::text('lastname', $partner->lastname, ['class' => 'form-control']) !!}
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
                                    {!! Form::text('specialty', $partner->specialty, ['class' => 'form-control']) !!}
                                @error('specialty')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('country_residence', 'Pais de residencia') !!}
                                    {!! Form::select('country_residence', [null => 'Seleccione', 'Ecuador' => 'Ecuador', 'Colombia' => 'Colombia'], $partner->country_residence, ['class' => 'form-control']) !!}
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
                                <div class="image-wrapper">                    
                                    <img id="picture" src="{{ asset('storage/'.$partner->img_profile) }}" alt="No se pudo cargar la imagen">
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
                            {!! Form::select('status',[null => 'SELECCIONE', 'NO PUBLICADO' => 'NO PUBLICADO','PUBLICADO' => 'PUBLICADO'], $partner->status,    ['class' => 'form-control custom-select']) !!}
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('biography_html', 'Biografia') !!}
                            {!! Form::textarea('biography_html', $partner->biography_html, ['class' => 'form-control','rows' => '4']) !!}
                            @error('biography_html')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex">
                            <div class="form-group">
                                {!! Form::submit('Actualizar Partner',  ['class' => 'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}  
                            <div class="mx-1">
                                <a class="btn btn-danger" href="{{ route('partner.index') }}">Cancelar</a>
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

