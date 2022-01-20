@extends('layouts.app')

@section('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
@endsection

@section('content')
    <div class="container mt-5 ">
        <h1>Perfil del Socio {{ $partner->name}}</h1>
        <div class="form-group mt-5 border p-5">
            {!! Form::model($partner, ['route' => ['partner.update', $partner], 'enctype' => 'multipart/form-data', 'files' => true, 'method' => 'POST']) !!}
            @csrf
            @method('put')
            <div class="row">
                <div class="col-sm-3">
                    <div>
                        @isset($partner->img_profile)
                            <img id="picture" class="img-fluid" width="200" height="150" src="{{ asset('storage/'.$partner->img_profile) }}" alt="No se pudo cargar la imagen">
                        @else
                            <img id="picture" class="img-fluid" src="{{ asset('img/user.webp') }}" width="200" height="150" alt="No se pudo cargar la imagen">
                        @endisset
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('img_profile', 'Imagen de perfil') !!}
                        {!! Form::file('img_profile', ['class' => 'form-control-file', 'accept' => 'image/*', 'onchange' => 'showPreview(event);']) !!}
                        @error('img_profile')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="d-flex">
                        <div>
                            {!! Form::select('status',[null => 'SELECCIONE', 'NO PUBLICADO' => 'NO PUBLICADO','PUBLICADO' => 'PUBLICADO'], $partner->status,    ['class' => 'form-control custom-select']) !!}
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="form-group mx-3">
                            {!! Form::submit('Guardar',  ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                    {{--NOMBRE Y APELLIDO, EMAIL, NACIONALIDAD--}}
                    <p style="font-weight: bold">DATOS PERSONALES</p>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', $partner->name, ['class' => 'form-control']) !!}
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('lastname', 'Apellido') !!}
                                {!! Form::text('lastname', $partner->lastname, ['class' => 'form-control']) !!}
                                @error('lastname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('email', 'Email') !!}
                                {!! Form::email('email', $partner->email, ['class' => 'form-control']) !!}
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        {{-- <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('nationality', 'Nacionalidad') !!}
                                {!! Form::select('nationality', [null => 'Seleccione', 'Argentina' => 'Argentina', 'Bolivia' => 'Bolivia', 'Colombia' => 'Colombia', 'Costa Rica' => 'Costa Rica', 'Ecuador' => 'Ecuador', 'El Salvador' => 'El Salvador', 'España' => 'España', 'Guatemala' => 'Guatemala', 'Honduras' => 'Honduras', 'México' => 'México', 'Nicaragua' => 'Nicaragua', 'Panamá' => 'Panamá', 'Paraguay' => 'Paraguay', 'Perú' => 'Perú', 'Puerto Rico' => 'Puerto Rico', 'República Dominicana' => 'República Dominicana', 'Uruguay' => 'Uruguay', 'Venezuela' => 'Venezuela'], $partner->nationality, ['class' => 'form-control']) !!}
                                @error('nationality')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> --}}
                    </div>

                    {{--PAIS DE RESIDENCIA, CODIGO, TELEFONO--}}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('country_residence', 'Pais de residencia') !!}
                                @if ($partner->country_residence != null)
                                {!! Form::select('country_residence', [null => 'Seleccione', 'Argentina' => 'Argentina', 'Bolivia' => 'Bolivia', 'Colombia' => 'Colombia', 'Costa Rica' => 'Costa Rica', 'Ecuador' => 'Ecuador', 'El Salvador' => 'El Salvador', 'España' => 'España', 'Estados Unidos' => 'Estados Unidos', 'Guatemala' => 'Guatemala', 'Honduras' => 'Honduras', 'México' => 'México', 'Nicaragua' => 'Nicaragua', 'Panamá' => 'Panamá', 'Paraguay' => 'Paraguay', 'Perú' => 'Perú', 'Puerto Rico' => 'Puerto Rico', 'República Dominicana' => 'República Dominicana', 'Uruguay' => 'Uruguay', 'Venezuela' => 'Venezuela'], $partner->country_residence, ['class' => 'form-control', 'onchange' => 'changeCodPais();']) !!}    
                                @else
                                {!! Form::select('country_residence', [null => 'Seleccione', 'Argentina' => 'Argentina', 'Bolivia' => 'Bolivia', 'Colombia' => 'Colombia', 'Costa Rica' => 'Costa Rica', 'Ecuador' => 'Ecuador', 'El Salvador' => 'El Salvador', 'España' => 'España', 'Estados Unidos' => 'Estados Unidos', 'Guatemala' => 'Guatemala', 'Honduras' => 'Honduras', 'México' => 'México', 'Nicaragua' => 'Nicaragua', 'Panamá' => 'Panamá', 'Paraguay' => 'Paraguay', 'Perú' => 'Perú', 'Puerto Rico' => 'Puerto Rico', 'República Dominicana' => 'República Dominicana', 'Uruguay' => 'Uruguay', 'Venezuela' => 'Venezuela'], null, ['class' => 'form-control', 'onchange' => 'changeCodPais();']) !!}
                                @endif
                                @error('country_residence')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('codigo_pais', 'Código País') !!}
                                @if ($partner->codigo_pais != null)
                                {!! Form::text('codigo_pais', $partner->codigo_pais , ['class' => 'form-control', 'readonly']) !!}
                                @else
                                {!! Form::text('codigo_pais', null, ['class' => 'form-control', 'readonly']) !!}
                                @endif
                            @error('codigo_pais')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('phone', 'Telefono') !!}
                                {!! Form::number('phone', $partner->phone, ['class' => 'form-control']) !!}
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                    </div>

                    {{--ESTADO-PROVINCIA,CIUDAD, DIRECCION--}}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('state', 'Estado') !!}
                                @if ($partner->state != null)
                                {!! Form::text('state', $partner->state, ['class' => 'form-control']) !!}
                                @else
                                {!! Form::text('state', null, ['class' => 'form-control']) !!}
                                @endif
                            @error('state')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('city', 'Ciudad') !!}
                                @if ($partner->city != null)
                                {!! Form::text('city', $partner->city, ['class' => 'form-control']) !!}    
                                @else
                                {!! Form::text('city', null, ['class' => 'form-control']) !!}
                                @endif
                            @error('city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('address', 'Dirección') !!}
                                @if ($partner->address != null)
                                {!! Form::text('address', $partner->address, ['class' => 'form-control']) !!}
                                @else
                                {!! Form::text('address', null, ['class' => 'form-control']) !!}
                                @endif
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{--REDES SOCIALES--}}
            <p class="mt-3" style="font-weight: bold">REDES SOCIALES</p>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        {!! Form::label('link_facebook', 'Link de perfil de Facebook') !!} <i class="fab fa-facebook-square"></i>
                        @if ($partner->link_facebook != null)
                        {!! Form::text('link_facebook', $partner->link_facebook, ['class' => 'form-control']) !!}
                        @else
                        {!! Form::text('link_facebook', null, ['class' => 'form-control']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {!! Form::label('link_instagram', 'Link de perfil de Instagram') !!} <i class="fab fa-instagram"></i>
                        @if ($partner->link_instagram != null)
                        {!! Form::text('link_instagram', $partner->link_instagram, ['class' => 'form-control']) !!}
                        @else
                        {!! Form::text('link_instagram', null, ['class' => 'form-control']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {!! Form::label('link_linkedin', 'Link de perfil de LinkedIn') !!} <i class="fab fa-linkedin"></i>
                        @if ($partner->link_linkedin != null)
                        {!! Form::text('link_linkedin', $partner->link_linkedin, ['class' => 'form-control']) !!}
                        @else
                        {!! Form::text('link_linkedin', null, ['class' => 'form-control']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {!! Form::label('website', 'Sitio Web') !!} <i class="fas fa-globe"></i>
                        @if ($partner->website != null)
                        {!! Form::text('website', $partner->website, ['class' => 'form-control']) !!}
                        @else
                        {!! Form::text('website', null, ['class' => 'form-control']) !!}
                        @endif
                    </div> 
                </div>
            </div>

            {{--ESPECIALIDADES--}}
            <p style="font-weight: bold">INFORMACIÓN PROFESIONAL</p>
            
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('company', 'Empresa') !!}
                        {!! Form::select('company', [null => 'Seleccione', 'Empresa' => 'Empresa', 'Independiente' => 'Independiente'], null, ['class' => 'form-control', 'onchange' => 'showInputNameCompany()']) !!}
                    @error('company')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <div id="divCompanyName" class="col-sm-4" @if ($partner->company == "Empresa") style="display: block" @else style="display: none" @endif>
                    {!! Form::label('company_name', 'Nombre de la Empresa') !!}
                    @if ($partner->company_name != null)
                        {!! Form::text('company_name', $partner->company_name, ['class' => 'form-control']) !!}
                    @else
                        {!! Form::text('company_name', null, ['class' => 'form-control']) !!} 
                    @endif
                    @error('company_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <p>Área de especialización <b>(Escoja entre 1 a 3 opciones)</b></p>
                <div class="form-group">
                    <div class="row">
                        @foreach ($specialties as $specialty)
                            <div class="col-sm-4">
                            <label for="specialties">
                            {!! Form::checkbox('specialties[]', $specialty->id, null) !!}
                            {{ $specialty->name_specialty}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                @error('specialties')
                    <div>
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
                </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('specialty', 'Especialidad(es)') !!} <b>(Descripción más detallada)</b>
                        @isset ($partner->specialty)
                        {!! Form::text('specialty', $partner->specialty, ['class' => 'form-control', 'onkeyup' => 'countChars();']) !!}
                        @else
                        {!! Form::text('specialty', null, ['class' => 'form-control', 'onkeyup' => 'countChars();']) !!}
                        @endisset
                        <div class="d-flex">
                            <p id="charNum">0 caracteres</p>
                            <span class="text-success" style="margin-left: 5px">(Mínimo: 150 caracteres - Máximo: 200 caracteres)</span>
                        </div>   
                        @error('specialty')
                            <div>
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror   
                    </div>
                </div>
            </div>

            {{--BIOGRAFIA--}}
            <p style="font-weight: bold">Biografía</p>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('biography_html', 'Biografia') !!} <b>(Descripción de trayectoria y experiencia en su área)</b>
                        {!! Form::textarea('biography_html', $partner->biography_html, ['class' => 'form-control','rows' => '4']) !!}
                        @error('biography_html')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            {!! Form::close() !!}  
        </div>
    </div>
@endsection

@section('end-scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        window.addEventListener('load', countChars());

        document.addEventListener("DOMContentLoaded", function(event) {
            CKEDITOR.replace('biography_html');
        });

        function changeCodPais(){
            var selectPaisResidencia = document.getElementById('country_residence');
            var inputCodPais = document.getElementById('codigo_pais');
                switch (selectPaisResidencia.value) {
                    case "Argentina":  inputCodPais.value = "+54";break;
                    case "Bolivia": inputCodPais.value = "+591";break;
                    case "Colombia": inputCodPais.value = "+57";break;
                    case "Costa Rica": inputCodPais.value = "+506";break;
                    case "Ecuador": inputCodPais.value = "+593";break;
                    case "El Salvador": inputCodPais.value = "+503";break;
                    case "España": inputCodPais.value = "+34";break;
                    case "Estados Unidos": inputCodPais.value = "+1"; break;
                    case "Guatemala": inputCodPais.value = "+502";break;
                    case "Honduras": inputCodPais.value = "+504";break;
                    case "México": inputCodPais.value = "+52";break;
                    case "Nicaragua": inputCodPais.value = "+505";break;
                    case "Panamá": inputCodPais.value = "+507";break;
                    case "Paraguay": inputCodPais.value = "+595";break;
                    case "Perú": inputCodPais.value = "+51";break;
                    case "Puerto Rico": inputCodPais.value = "+1787";break;
                    case "República Dominicana": inputCodPais.value = "+1809";break;
                    case "Uruguay": inputCodPais.value = "+598";break;
                    case "Venezuela": inputCodPais.value = "+58";break;
                }
            }
        

        function countChars(){
            obj = document.getElementById('specialty');
            document.getElementById("charNum").innerHTML = obj.value.length+' caracteres';
        }

        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview  = document.getElementById("picture");
                preview.src = src;
                preview.style.display = "block";
            }
        }


        function showInputNameCompany(){
            var selectCompany = document.getElementById('company').value;
            var divCompanyName = document.getElementById('divCompanyName');
            if(selectCompany == "Empresa"){
                divCompanyName.style.display = "block";
            } else {
                divCompanyName.style.display = "none";
            }
        }
    </script>
@endsection

