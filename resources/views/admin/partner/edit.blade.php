@extends('admin.partner.layouts.sidebar')

@section('title-socios', 'Editar Socios - Notaria Latina')

@section('scripts')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 10%;
        }
        .image-wrapper img{
            /* position: absolute; */
            object-fit: contain;
            width: 70%;
            height: 130%;
            box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }
        input, label{
            font-size: 14px;
        }
        @media screen and (max-width: 580px){
            #txtTercero{
                display: none !important;
            }
            #content{
                margin-left: -30px !important;
                margin-right: -30px !important;
            }
            #card1, #card2, #card3{
                margin-left: -21px !important;
                margin-right: -21px !important; 
            }
        }
    </style>
@endsection

@section('content')
    <div class="col-12 mt-4">
        {{-- <img style="border-radius: 10px; padding: 10px; width: 250px" src="{{ asset('img/partners/WEB-HEREDADO.png') }}" alt=""> --}}
        <div id="content" class="row justify-content-center mt-3">
            <div class="col-12">
                <div class="card" style="background-color: #f4f4fc">
                    <div class="card-header font-weight-bold" style="background-color: #01385f; color: #ffffff">ACTUALIZAR DATOS</div>
                    <h4 style="color: #002542; margin-top: 20px; text-align: center">Inscripción para formar parte de nuestro directorio de partners.</h4>
                    <p style="text-align: center">Ingresa tus datos y forma parte de nuestro directorio de partners. Accede a beneficios de anunciarte gratis en Estados Unidos</p>
                    <p id="txtTercero" style="text-align: center; color: #002542; font-weight: bold">{{ Str::upper('¡No olvides completar tu información para que tus datos puedan publicarse en nuestro sitio web!') }}</p>
                    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        {!! Form::model($partner, ['route' => ['socios.update', $partner], 'enctype' => 'multipart/form-data', 'files' => true, 'method' => 'put']) !!}
                        @csrf
                        @method('put')
                            <div id="card1" class="card">
                                <div class="card-body">
                                    <p style="font-weight: bold">• INFORMACIÓN PERSONAL</p>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="image-wrapper d-flex justify-content-center">
                                                @if ($partner->img_profile != null)
                                                    <img id="picture" class="img-fluid" src="{{ asset('storage/'.$partner->img_profile) }}" alt="No se pudo cargar la imagen">
                                                @else
                                                   <img id="picture" class="img-fluid" src="{{ asset('img/partners/foto-perfil.jpg') }}" alt="No se pudo cargar la imagen">
                                                @endif                    
                                            </div>
                                            <div class="form-group col-md-12">
                                                {!! Form::label('img_profile', 'Imagen de perfil') !!}
                                                {!! Form::file('img_profile', ['class' => 'form-control-file', 'accept' => 'image/*', 'onchange' => 'showPreview(event);']) !!}
                                                @error('img_profile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <hr>
                                                {{-- <p style="color: #00223b">Al momento de subir tu foto de perfil puedes tomar como referencia la siguiente imagen</p> --}}
                                                {{-- <i style="color: #00223b; font-weight: bold">"Recuerda que tu imagen es muestra de la calidad de tus servicios"</i> --}}
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        {!! Form::label('title', 'Título') !!}
                                                        @if ($partner->title != null)
                                                        {!! Form::select('title', [null => 'Seleccione', 'Abogado' => 'Abogado', 'Licenciado' => 'Licenciado'], $partner->title, ['class' => 'form-control']) !!}
                                                        @else
                                                        {!! Form::select('title', [null => 'Seleccione', 'Abogado' => 'Abogado', 'Licenciado' => 'Licenciado'], null, ['class' => 'form-control']) !!}
                                                        @endif
                                                        @error('title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        {!! Form::label('name', 'Nombre') !!}
                                                        {!! Form::text('name', $partner->name, ['class' => 'form-control']) !!}
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        {!! Form::label('lastname', 'Apellido') !!}
                                                        {!! Form::text('lastname', $partner->lastname, ['class' => 'form-control']) !!}
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    {!! Form::label('email', 'Email') !!}
                                                        {!! Form::email('email', $partner->email, ['class' => 'form-control']) !!}
                                                        @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
        
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        {!! Form::label('country_residence', 'Pais de residencia') !!}
                                                    @if ($partner->country_residence != null)
                                                    {!! Form::select('country_residence', [null => 'Seleccione', 'Argentina' => 'Argentina', 'Bolivia' => 'Bolivia', 'Colombia' => 'Colombia', 'Costa Rica' => 'Costa Rica', 'Ecuador' => 'Ecuador', 'El Salvador' => 'El Salvador', 'España' => 'España', 'Estados Unidos' => 'Estados Unidos', 'Guatemala' => 'Guatemala', 'Honduras' => 'Honduras', 'México' => 'México', 'Nicaragua' => 'Nicaragua', 'Panamá' => 'Panamá', 'Paraguay' => 'Paraguay', 'Perú' => 'Perú', 'Puerto Rico' => 'Puerto Rico', 'República Dominicana' => 'República Dominicana', 'Uruguay' => 'Uruguay', 'Venezuela' => 'Venezuela'], $partner->country_residence, ['class' => 'form-control']) !!}    
                                                    @else
                                                    {!! Form::select('country_residence', [null => 'Seleccione', 'Argentina' => 'Argentina', 'Bolivia' => 'Bolivia', 'Colombia' => 'Colombia', 'Costa Rica' => 'Costa Rica', 'Ecuador' => 'Ecuador', 'El Salvador' => 'El Salvador', 'España' => 'España', 'Estados Unidos' => 'Estados Unidos', 'Guatemala' => 'Guatemala', 'Honduras' => 'Honduras', 'México' => 'México', 'Nicaragua' => 'Nicaragua', 'Panamá' => 'Panamá', 'Paraguay' => 'Paraguay', 'Perú' => 'Perú', 'Puerto Rico' => 'Puerto Rico', 'República Dominicana' => 'República Dominicana', 'Uruguay' => 'Uruguay', 'Venezuela' => 'Venezuela'], null, ['class' => 'form-control']) !!}
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
                                </div>
                            </div>

                            <div id="card2" class="card mt-4">
                                <div class="card-body">
                                    <p style="font-weight: bold">• REDES SOCIALES</p>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                {!! Form::label('link_facebook', 'Link de perfil de Facebook') !!} <i class="fab fa-facebook-square" style="color: #3b5998"></i>
                                                @if ($partner->link_facebook != null)
                                                {!! Form::text('link_facebook', $partner->link_facebook, ['class' => 'form-control']) !!}
                                                @else
                                                {!! Form::text('link_facebook', null, ['class' => 'form-control']) !!}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                {!! Form::label('link_instagram', 'Link de perfil de Instagram') !!} <i class="fab fa-instagram" style="color: #ac2bac"></i>
                                                @if ($partner->link_instagram != null)
                                                {!! Form::text('link_instagram', $partner->link_instagram, ['class' => 'form-control']) !!}
                                                @else
                                                {!! Form::text('link_instagram', null, ['class' => 'form-control']) !!}
                                                @endif
                                            </div>                            
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                {!! Form::label('link_linkedin', 'Link de perfil de LinkedIn') !!} <i class="fab fa-linkedin text-primary"></i>
                                                @if ($partner->link_linkedin != null)
                                                {!! Form::text('link_linkedin', $partner->link_linkedin, ['class' => 'form-control']) !!}
                                                @else
                                                {!! Form::text('link_linkedin', null, ['class' => 'form-control']) !!}
                                                @endif
                                            </div>                            
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                {!! Form::label('website', 'Sitio Web') !!} <i class="fas fa-globe" style="color: #3b5998"></i>
                                                @if ($partner->website != null)
                                                {!! Form::text('website', $partner->website, ['class' => 'form-control']) !!}
                                                @else
                                                {!! Form::text('website', null, ['class' => 'form-control']) !!}
                                                @endif
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="card3" class="card mt-4">
                                <div class="card-body">
                                    <p style="font-weight: bold">• INFORMACIÓN PROFESIONAL</p>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                {!! Form::label('company', 'Tipo de trabajo') !!}
                                                @if ($partner->company != null)
                                                {!! Form::select('company', [null => 'Seleccione', 'Empresa' => 'Empresa', 'Libre Ejercicio' => 'Libre Ejercicio'], $partner->company, ['class' => 'form-control', 'onchange' => 'showInputNameCompany()']) !!}
                                                @else
                                                {!! Form::select('company', [null => 'Seleccione', 'Empresa' => 'Empresa', 'Libre Ejercicio' => 'Libre Ejercicio'], null, ['class' => 'form-control', 'onchange' => 'showInputNameCompany()']) !!}
                                                @endif
                                            @error('company')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                        </div>                            
                                        <div id="divCompanyName" class="col-sm-4" @if ($partner->company == "Empresa") style="display: block" @else style="display: none" @endif>
                                            {!! Form::label('company_name', 'Nombre de la Empresa') !!}
                                            @if($partner->company_name != null)
                                                {!! Form::text('company_name', $partner->company_name, ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::text('company_name', null, ['class' => 'form-control']) !!} 
                                            @endif
                                            @error('company_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{--EMPIEZA CHECKBOXES--}}
                                    <p style="font-size: 14px">Área de especialización <b>(Escoja entre 1 a 3 opciones)</b></p>
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
                                    {{--TERMINA CHECKBOXES--}}
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('specialty', 'Especialidad(es)') !!} <b style="font-size: 14px">(Descripción más detallada sus especialidades)</b>
                                                {!! Form::text('specialty', $partner->specialty, ['class' => 'form-control', 'onkeyup' => 'countChars();']) !!}
                                                <div class="d-flex float-right">
                                                    <p id="charNum">0 caracteres</p>
                                                    <span class="text-success" style="margin-left: 5px">(Mínimo: 150 caracteres - Máximo: 200 caracteres)</span>
                                                </div>
                                                @error('specialty')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('biography_html', 'Biografia') !!} <b>(Descripción de trayectoria y experiencia en su área)</b>
                                        {!! Form::textarea('biography_html', $partner->biography_html, ['class' => 'form-control','rows' => '4']) !!}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <span class="text-success float-right" style="font-size: 15px">(Mínimo: 600 caracteres - Máximo: 1000 caracteres)</span>
                                            </div>
                                        </div>
                                        @error('biography_html')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-column float-right mt-3">
                                <div class="form-group">
                                    {!! Form::submit('Aceptar y Registrarme',  ['class' => 'btn text-white', 'style' => 'background-color: #00223b']) !!}
                                </div>
                                <a style="text-decoration: none; color: black; text-align: end; font-size: 10px" href="{{ route('web.socios.politicas') }}">Términos y condiciones</a>
                            </div>
                            {!! Form::close() !!}  
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('end-scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        window.addEventListener('load', function(){
            countChars();
            showInputNameCompany();
        });

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

        var selectPaisResidencia = document.getElementById('country_residence');
        var inputCodPais = document.getElementById('codigo_pais');
        
        selectPaisResidencia.onchange  = function(e){
            switch (selectPaisResidencia.value) {
                case "Argentina":codigo = "+54";break;
                case "Bolivia":codigo = "+591";break;
                case "Colombia":codigo = "+57";break;
                case "Costa Rica":codigo = "+506";break;
                case "Ecuador":codigo = "+593";break;
                case "El Salvador":codigo = "+503";break;
                case "España":codigo = "+34";break;
                case "Estados Unidos" :codigo = "+1";break;
                case "Guatemala":codigo = "+502";break;
                case "Honduras":codigo = "+504";break;
                case "México":codigo = "+52";break;
                case "Nicaragua":codigo = "+505";break;
                case "Panamá":codigo = "+507";break;
                case "Paraguay":codigo = "+595";break;
                case "Perú":codigo = "+51";break;
                case "Puerto Rico":codigo = "+1787";break;
                case "República Dominicana":codigo = "+1809";break;
                case "Uruguay":codigo = "+598";break;
                case "Venezuela":codigo = "+58";break;
            }
            inputCodPais.value = codigo;
        }

        function countChars(){
            obj = document.getElementById('specialty');
            document.getElementById("charNum").innerHTML = obj.value.length+' caracteres'; 
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

