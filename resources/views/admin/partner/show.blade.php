@extends('layouts.app')

@section('scripts')
    
@endsection

@section('content')
    <div class="container mt-5">
        <h1>Perfil del Socio {{ $partner->name}}</h1>
            <div class="row"> 
                <div class="col-sm-4 float-end">
                    <div class="form-group">
                        {!! Form::open(['route' => ['partner.update', $partner], 'enctype' => 'multipart/form-data', 'files' => true, 'method' => 'POST']) !!}

                                @csrf
                                @method('put')

                                {{-- <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::hidden('name', $partner->name) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::hidden('lastname', $partner->lastname) !!}
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::hidden('specialty', $partner->specialty) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::hidden('country_residence', $partner->country_residence) !!}
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::hidden('phone', $partner->phone) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {!! Form::hidden('email', $partner->email) !!}
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="form-row">
                                    <div class="form-group col-md-6">
                                        {!! Form::hidden('img_profile', $partner->img_profile) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::hidden('biography_html', $partner->biography_html) !!}
                                </div> --}}
                                <div class="d-flex">
                                    <div>
                                        {{-- {!! Form::label('status', 'Estado') !!} --}}
                                        {!! Form::select('status',[null => 'SELECCIONE', 'NO PUBLICADO' => 'NO PUBLICADO','PUBLICADO' => 'PUBLICADO'], $partner->status,    ['class' => 'form-control custom-select']) !!}
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="form-group mx-3">
                                        {!! Form::submit('Guardar',  ['class' => 'btn btn-primary']) !!}
                                    </div>
                                    {!! Form::close() !!}  
                                </div>            
                </div>
            </div>
        </div>
        <div class="mt-5 border p-5">
            <div class="row">
                <div class="col-sm-4">
                    @isset($partner->img_profile)
                        <img class="img-fluid" width="300" height="250" src="{{ asset('storage/'.$partner->img_profile) }}" alt="No se pudo cargar la imagen">
                    @else
                        <img class="img-fluid" src="{{ asset('img/user.webp') }}" width="300" height="250" alt="No se pudo cargar la imagen">
                    @endisset
                </div>
                <div class="col-sm-8">
                    <h4 class="mt-4">Nombre: {{ $partner->name}} {{$partner->lastname}}</h4>
                    <h5 class="mt-4">
                        Teléfono: {{ $partner->phone}}
                    </h5>
                    <h5 class="mt-4">
                        Email: {{ $partner->email}}
                    </h5>
                    <h5 class="mt-4">
                        País de residencia: 
                        @isset($partner->country_residence)
                        {{ $partner->country_residence}}
                        @else
                        <b>Sin información</b>
                        @endisset
                    </h5>
                    <h5 class="mt-4">
                        Especialidad: 
                        @isset($partner->specialty)
                        {{ $partner->specialty}}
                        @else
                        <b>Sin información</b>
                        @endisset
                    </h5>
                </div>
            </div>
            <div class="row mt-4">
                <h3>Biografía</h3>
            </div>
            <div class="row mt-4">
                @isset($partner->biography_html)
                    {!! $partner->biography_html !!}
                @else
                    <p><b>Sin información</b></p>
                @endisset
            </div>
        </div>
    </div>
@endsection

@section('end-scripts')
    
@endsection

