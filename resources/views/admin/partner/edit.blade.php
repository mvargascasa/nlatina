@extends('admin.partner.layouts.sidebar')

@section('title-socios', 'Editar Partner - Notaria Latina')

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
        @media screen and (max-width: 850px){
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
            #cardParent{
                border: none !important;
            }
            #txtCamposVacios{
                font-size: 12px !important;
            }
            #charNum{
                font-size: 10px !important;
            }
            #txtMaxMinChar{
                font-size: 10px !important;
            }
            #modalBienvenido .modal-dialog{
                width: 96% !important;
            }
        }
        .modal-dialog{
            overflow-y: initial !important
        }
        .modal-body{
            height: 450px;
            overflow-y: auto;
        }

        .marcarLabel {
            background-color: #002542;
            color: #ffffff;
            border-radius: 5px;
            transition: background-color 3s ease;
            padding: 5px;
        }

    </style>
@endsection

@section('content')
{!! Form::model($partner, ['route' => ['socios.update', $partner], 'enctype' => 'multipart/form-data', 'files' => true, 'method' => 'put']) !!}
@csrf
@method('put')
    <div class="col-12 mt-4">
        <div id="content" class="row justify-content-center mt-3">
            <div class="col-12">
                <div id="cardParent" class="card" style="background-color: #f4f4fc">
                    <div class="card-header font-weight-bold" style="background-color: #01385f; color: #ffffff">ACTUALIZAR DATOS</div>
                    <h4 style="color: #002542; margin-top: 20px; text-align: center">Inscripción para formar parte de nuestro directorio de partners.</h4>
                    <p style="text-align: center">Ingresa tus datos y forma parte de nuestro directorio de partners. Accede a beneficios de anunciarte <b>gratis</b> en Estados Unidos</p>
                    <p id="txtTercero" style="text-align: center; color: #002542; font-weight: bold">{{ Str::upper('¡No olvides completar tu información para que tus datos puedan publicarse en nuestro sitio web!') }}</p>
                    <div class="card-body">
                        @if (count($camposVacios) < 1 && Str::limit($partner->terminos_verified_at, 10, '') == Str::limit(date(now()), 10, ''))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <b>¡Felicidades!</b> Toda tu información se ha completado con éxito. En breves minutos tu perfil será publicado gratis en nuestro sitio web
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (count($camposVacios) > 0)
                            <div class="alert alert-danger">
                                Los siguientes campos se encuentran vacios:
                                <div class="row">
                                    @foreach ($camposVacios as $campoVacio)
                                    <div class="col-6 col-sm-3">
                                        <i class="fas fa-exclamation-circle"></i> <b id="txtCamposVacios"><a style="text-decoration: none; color: #000000" href="#{{$campoVacio}}" onclick="marcarCampo(this);">{{ $campoVacio }}</a></b>       
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mt-2">
                                    Si su información no esta completa, su perfil no podrá anunciarse <b>gratis</b> en nuestro sitio web
                                </div>
                            </div>
                        @endif
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
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        {!! Form::label('title', 'Título', ['id' => 'Título']) !!}
                                                        @if ($partner->title != null)
                                                        {!! Form::select('title', [null => 'Seleccione', 'Abogado' => 'Abogado', 'Licenciado' => 'Licenciado'], $partner->title, ['class' => 'form-control']) !!}
                                                        @else
                                                        {!! Form::select('title', [null => 'Seleccione', 'Abogado' => 'Abogado', 'Licenciado' => 'Licenciado'], "{{ old('title') }}", ['class' => 'form-control']) !!}
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        {!! Form::label('name', 'Nombre') !!}
                                                        @if ($partner->name != null)
                                                        {!! Form::text('name', $partner->name, ['class' => 'form-control', 'required']) !!}
                                                        @else 
                                                        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}  
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        {!! Form::label('lastname', 'Apellido') !!}
                                                        @if ($partner->lastname != null)
                                                        {!! Form::text('lastname', $partner->lastname, ['class' => 'form-control', 'required']) !!}                                                        
                                                        @else 
                                                        {!! Form::text('lastname', null, ['class' => 'form-control', 'required']) !!}                                                        
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    {!! Form::label('email', 'Email') !!}
                                                    @if ($partner->email != null)
                                                    {!! Form::email('email', $partner->email, ['class' => 'form-control', 'type' => 'email', 'required']) !!}                                                        
                                                    @else
                                                    {!! Form::email('email', null, ['class' => 'form-control', 'type' => 'email', 'required']) !!}                                                        
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
        
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                    {!! Form::label('country_residence', 'Pais de residencia', ['id' => 'País de residencia']) !!}
                                                    @if ($partner->country_residence != null)
                                                    {!! Form::select('country_residence', [null => 'Seleccione', 'Argentina' => 'Argentina', 'Bolivia' => 'Bolivia', 'Chile' => 'Chile', 'Colombia' => 'Colombia', 'Costa Rica' => 'Costa Rica', 'Ecuador' => 'Ecuador', 'El Salvador' => 'El Salvador', 'Guatemala' => 'Guatemala', 'Honduras' => 'Honduras', 'México' => 'México', 'Nicaragua' => 'Nicaragua', 'Panamá' => 'Panamá', 'Paraguay' => 'Paraguay', 'Perú' => 'Perú', 'Puerto Rico' => 'Puerto Rico', 'República Dominicana' => 'República Dominicana', 'Uruguay' => 'Uruguay', 'Venezuela' => 'Venezuela'], $partner->country_residence, ['class' => 'form-control']) !!}    
                                                    @else
                                                    {!! Form::select('country_residence', [null => 'Seleccione', 'Argentina' => 'Argentina', 'Bolivia' => 'Bolivia', 'Chile' => 'Chile', 'Colombia' => 'Colombia', 'Costa Rica' => 'Costa Rica', 'Ecuador' => 'Ecuador', 'El Salvador' => 'El Salvador', 'Guatemala' => 'Guatemala', 'Honduras' => 'Honduras', 'México' => 'México', 'Nicaragua' => 'Nicaragua', 'Panamá' => 'Panamá', 'Paraguay' => 'Paraguay', 'Perú' => 'Perú', 'Puerto Rico' => 'Puerto Rico', 'República Dominicana' => 'República Dominicana', 'Uruguay' => 'Uruguay', 'Venezuela' => 'Venezuela'], "{{ old('country_residence') }}", ['class' => 'form-control']) !!}
                                                    @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        {!! Form::label('codigo_pais', 'Código País') !!}
                                                        @if ($partner->codigo_pais != null)
                                                        {!! Form::text('codigo_pais', $partner->codigo_pais , ['class' => 'form-control', 'readonly', 'style' => 'background-color:#ffffff']) !!}
                                                        @else
                                                        {!! Form::text('codigo_pais', null, ['class' => 'form-control', 'readonly', 'style' => 'background-color:#ffffff']) !!}
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        {!! Form::label('phone', 'Telefono', ['id' => 'Teléfono']) !!}
                                                        {!! Form::number('phone', $partner->phone, ['class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        {!! Form::label('state', 'Estado/Departamento/Provincia', ['id' => 'Estado']) !!}
                                                        @if ($partner->state != null)
                                                        {!! Form::text('state', $partner->state, ['class' => 'form-control']) !!}
                                                        @else
                                                        {!! Form::text('state', null, ['class' => 'form-control']) !!}
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        {!! Form::label('city', 'Ciudad', ['id' => 'Ciudad']) !!}
                                                        @if ($partner->city != null)
                                                        {!! Form::text('city', $partner->city, ['class' => 'form-control']) !!}    
                                                        @else
                                                        {!! Form::text('city', null, ['class' => 'form-control']) !!}
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        {!! Form::label('address', 'Dirección', ['id' => 'Dirección']) !!}
                                                        @if ($partner->address != null)
                                                        {!! Form::text('address', $partner->address, ['class' => 'form-control']) !!}
                                                        @else
                                                        {!! Form::text('address', null, ['class' => 'form-control']) !!}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="card2" class="card mt-4">
                                <div class="card-body">
                                    <p style="font-weight: bold">• REDES SOCIALES</p>
                                    <p>Si <b>por el momento no cuenta con redes sociales</b>, puede continuar completando su información profesional</p>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                {!! Form::label('link_facebook', 'Link de perfil de Facebook') !!} <i class="fab fa-facebook-square" style="color: #3b5998"></i>
                                                @if ($partner->link_facebook != null)
                                                {!! Form::text('link_facebook', $partner->link_facebook, ['class' => 'form-control']) !!}
                                                @else
                                                {!! Form::text('link_facebook', null, ['class' => 'form-control']) !!}
                                                @endif
                                                <label style="font-size: 13px; color: #566067">Ej.:https://www.facebook.com/su-usuario</label>
                                                @if (count($socialLinks) > 0 && in_array('Facebook', $socialLinks, false) && $partner->link_facebook != null)
                                                    <div class="alert alert-warning" style="font-size: 12px">
                                                        <i class="fas fa-exclamation-triangle"></i> El link de Facebook no es válido
                                                    </div>
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
                                                <label style="font-size: 13px; color: #566067">Ej.:https://www.instagram.com/su-usuario</label>
                                                @if (count($socialLinks) > 0 && in_array('Instagram', $socialLinks, false) && $partner->link_instagram != null)
                                                    <div class="alert alert-warning" style="font-size: 12px">
                                                        <i class="fas fa-exclamation-triangle"></i> El link de Instagram no es válido
                                                    </div>
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
                                                <label style="font-size: 13px; color: #566067">Ej.:https://www.linkedin.com/su-usuario</label>
                                                @if (count($socialLinks) > 0 && in_array('LinkedIn', $socialLinks, false) && $partner->link_linkedin != null)
                                                    <div class="alert alert-warning" style="font-size: 12px">
                                                        <i class="fas fa-exclamation-triangle"></i> El link de LinkedIn no es válido
                                                    </div>
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
                                                <label style="font-size: 13px; color: #566067">Ej.:https://www.su-dominio.com</label>
                                                @if (count($socialLinks) > 0 && in_array('Website', $socialLinks, false) && $partner->website != null)
                                                    <div class="alert alert-warning" style="font-size: 12px">
                                                        <i class="fas fa-exclamation-triangle"></i> El link del Sitio Web no es válido
                                                    </div>
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
                                                {!! Form::label('company', 'Tipo de trabajo', ['id' => 'Tipo de trabajo']) !!}
                                                @if ($partner->company != null)
                                                {!! Form::select('company', [null => 'Seleccione', 'Empresa' => 'Empresa', 'Libre Ejercicio' => 'Libre Ejercicio'], $partner->company, ['class' => 'form-control', 'onchange' => 'showInputNameCompany()']) !!}
                                                @else
                                                {!! Form::select('company', [null => 'Seleccione', 'Empresa' => 'Empresa', 'Libre Ejercicio' => 'Libre Ejercicio'], null, ['class' => 'form-control', 'onchange' => 'showInputNameCompany()']) !!}
                                                @endif
                                            </div>
                                        </div>                            
                                        <div id="divCompanyName" class="col-sm-4" @if ($partner->company == "Empresa") style="display: block" @else style="display: none" @endif>
                                            {!! Form::label('company_name', 'Nombre de la Empresa', ['id' => 'Nombre de la empresa']) !!}
                                            @if($partner->company_name != null)
                                                {!! Form::text('company_name', $partner->company_name, ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::text('company_name', null, ['class' => 'form-control']) !!} 
                                            @endif
                                        </div>
                                    </div>
                                    <p style="font-size: 14px" id="Áreas de especialización">Área de especialización <b>(Escoja entre 1 a 3 opciones)</b></p>
                                    <div class="form-group">
                                        <div class="row">
                                                @foreach ($specialties as $specialty)
                                                <div class="col-6 col-sm-4">
                                                    <label for="specialties">
                                                        {!! Form::checkbox('specialties[]', $specialty->id, null, ['class' => 'checkSpecialties']) !!}
                                                        {{ $specialty->name_specialty}}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('specialty', 'Especialidad(es)', ['id' => 'Especialidad (Descripción)']) !!} <b style="font-size: 14px">(Descripción más detallada)</b>
                                                {!! Form::text('specialty', $partner->specialty, ['class' => 'form-control', 'onkeyup' => 'countChars();', 'minlength' => '100', 'maxlength' => '200']) !!}
                                                <div class="d-flex float-right">
                                                    <p id="charNum">0 caracteres</p>
                                                    <span id="txtMaxMinChar" class="text-success" style="margin-left: 5px">(Mínimo: 100 caracteres - Máximo: 200 caracteres)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{-- <div>
                                            {{ $charCountBio }}
                                            <br>
                                            {{ $biographyDecode }}
                                        </div> --}}
                                        {!! Form::label('biography_html', 'Biografia', ['id' => 'Biografía']) !!} <b>(Descripción de trayectoria y experiencia en su área)</b>
                                        {!! Form::textarea('biography_html', $partner->biography_html, ['class' => 'form-control','rows' => '4']) !!}
                                    </div>
                                    <div class="float-right">
                                        @if ($partner->terminos_verified_at != null)
                                        {!! Form::submit('Guardar',  ['class' => 'btn text-white', 'style' => 'background-color: #00223b']) !!}
                                        @else
                                        {!! Form::button('Guardar',  ['class' => 'btn text-white', 'style' => 'background-color: #00223b', 'data-toggle' => 'modal', 'data-target' => '#exampleModalCenter']) !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($partner->terminos_verified_at == null)
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $("document").ready(function(){
            $('#modalBienvenido').modal('toggle')
        });
    </script>
    @endif

    <div class="modal fade" id="modalBienvenido" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="width: 45%">
            <div class="modal-content">
                <div class="modal-header text-center" style="display: inline; border-bottom: none; margin-bottom: 0px;">
                    <h5><b>¡ Felicidades !</b></h5>
                    <p>Está a un solo paso para publicar <br> su perfil GRATIS</p>
                </div>
                <div class="modal-body d-flex justify-content-center" style="border-bottom: none; margin-top: -30px">
                  <img id="imgWelcome" class="img-fluid" src="" alt="Partners de Notaria Latina">
              </div>
              <div class="modal-footer justify-content-center" style="border-top: none;">
                <button type="button" class="btn btn-primary" style="background-color: #002542; color: #ffffff" onclick="$('#modalBienvenido').modal('hide')">Continuar</button>
              </div>
            </div>
        </div>
      </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Términos y condiciones</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                {{--DIV POLITICAS Y PRIVACIDAD--}}
                <div class="container p-4 text-justify">
                    <h6 dir="ltr"><strong>POL&Iacute;TICAS DE PRIVACIDAD Y COOKIES</strong></h6>
                    <h6>PRIVACIDAD</h6>
                    <p style="font-weight: bold; font-size: 13px">1. Uso, finalidad y régimen jurídico aplicable</p>
                    <p style="font-size:13px">
                        Notaría Pública Latina supone un mecanismo de interactuación y soporte para abogados y potenciales clientes de los mismos 
                        que se rige por el derecho americano y en concreto y en cuanto al tratamiento de datos de carácter personal, por la vigente 
                        normativa del Comité Jurídico Interamericano OEA/Ser.Q CJI/doc. 474/15 rev.2 26 marzo 2015 de protección de datos personales
                         de las personas físicas.
                    </p>
                    <p style="font-size:13px">
                        Se informa que todos los datos personales que el Usuario facilite a través de este sitio Web serán tratados por Notaría Pública
                         Latina en calidad de responsable del tratamiento, (en adelante, "Notaría Pública Latina") para las siguientes finalidades:
                    </p>
                    <ul style="font-size:13px">
                        <li>
                            Posibilitar la prestación de los servicios solicitados; Prestar un servicio personalizado para poner en contacto a los 
                            clientes potenciales con otros abogados del directorio. Identificar el sector del problema del cliente y enfocarle hacia
                            la mejor solución por sectores del derecho. La base jurídica para llevar a cabo este tratamiento de datos es la ejecución
                            de las obligaciones contractuales asumidas por el Usuario y Notaría Pública Latina en el Sitio Web. 
                        </li>
                        <li>
                            Para el caso de solicitudes efectuadas por un Usuario que no mantenga una relación contractual con Notaría Pública Latina,
                            la base jurídica es el consentimiento del Usuario implícito en su solicitud a los efectos de que Notaría Pública Latina pueda 
                            atenderla. Los datos tratados con esta finalidad se conservarán mientras se mantenga dicha relación y, una vez finalizada ésta, 
                            durante los plazos de conservación y de prescripción de responsabilidades legalmente previstos. 
                        </li>
                        <li>
                            Mantenerle informado acerca de las noticias relacionadas con Notaría Pública Latina, así como de los productos y servicios 
                            comercializados tanto por Notaría Pública Latina como por terceras entidades pertenecientes o dirigidas al sector jurídico. 
                            La base jurídica para llevar a cabo este tratamiento de datos es el consentimiento del Usuario. Los datos tratados con esta 
                            finalidad se conservarán hasta el momento en que el Usuario retire su consentimiento. El Usuario podrá en todo momento indicar 
                            expresamente si autoriza o no dicho tratamiento de sus datos a través del contacto que se indica a continuación.
                        </li>
                        <li>
                            Realizar encuestas de satisfacción y calidad sobre el servicio de Notaría Pública Latina. Dichas encuestas podrán ir dirigidas
                            tanto a Usuarios abogados como a Usuarios clientes o potenciales clientes de aquéllos. La base jurídica para llevar a cabo este
                            tratamiento de datos es el interés legítimo. Los datos tratados con esta finalidad se guardarán durante los plazos de conservación
                            y de prescripción de responsabilidades legalmente previstos. El Usuario podrá en todo momento indicar expresamente si autoriza o no
                            dicho tratamiento de sus datos. 
                        </li>
                    </ul>
                
                    <p style="font-weight: bold; font-size:13px">2. Destinatarios y categorías de Encargados del tratamiento</p>
                    <p style="font-size:13px">
                        Los datos podrán comunicarse a los siguientes destinatarios terceros: Administraciones Públicas para el cumplimiento de obligaciones legales;
                        a abogados para la ejecución de los servicios; a Entidades bancarias para la gestión de cobros y pagos de facturas; y a Encargados del tratamiento 
                        debidamente seleccionados. Asimismo, Notaría Pública Latina podrá transferir los datos a Encargados del Tratamiento ubicados en terceros países, 
                        para la prestación de servicios de atención al usuario, con los que ha suscrito el correspondiente clausulado tipo de la Organización de los Estados Americanos, 
                        una copia del cual puede ser solicitado a info@notarialatina.com
                    </p>
                    
                    <p style="font-weight: bold; font-size:13px">3. Ejercicio de derechos del interesado</p>
                    <p style="font-size:13px">
                        La presente política de privacidad propiedad de Notaría Pública Latina informa al interesado que podrá ejercer en cualquier momento los derechos de acceso, 
                        rectificación, supresión, limitación, oposición o portabilidad mediante correo electrónico dirigido a info@notarialatina.com o bien mediante escrito dirigido 
                        a Notaría Pública Latina, 67-03 Roosevelt Avenue, Woodside, NY 11377. En los tratamientos cuya legitimación se base en el consentimiento, el Usuario tiene el 
                        derecho a retirar dicho consentimiento en cualquier momento, sin que ello afecte a la licitud del tratamiento basado en el consentimiento previo a su retirada. 
                        El interesado tendrá derecho a presentar reclamación ante la autoridad de control. Le informamos que no facilitar la información solicitada puede implicar la 
                        imposibilidad de formalizar o dar cumplimiento al objeto del contrato. Puede contactar con nuestro Delegado de Protección de Datos en info@notarialatina.com, 
                        o bien dirigiendo su solicitud a Notaría Pública Latina, 67-03 Roosevelt Avenue, Woodside, NY 11377, a su atención.
                    </p>
                
                    <p style="font-weight: bold; font-size:13px">4. Notaría Pública Latina como encargado del tratamiento</p>
                    <p style="font-size:13px">
                        Notaría Pública Latina tendrá la consideración de encargado del tratamiento de todos aquellos datos personales titularidad del Usuario Abogado a los que tenga 
                        acceso durante la prestación de los servicios solicitados por ellos. En este sentido, Notaría Pública Latina se obliga a:
                    </p>
                    <ul style="font-size:13px">
                        <li>
                            Tratar los datos personales únicamente siguiendo instrucciones documentadas del Usuario Abogado, inclusive con respecto a las transferencias de datos personales, 
                            salvo que esté obligado a ello en virtud del Derecho de la Unión o de los Estados miembros; en tal caso, Notaría Pública Latina informará al Cliente de esa exigencia 
                            legal previa al tratamiento, salvo que tal derecho lo prohíba por razones importantes de interés público; 
                        </li>
                        <li>
                            Garantizar que las personas autorizadas para tratar datos personales se hayan comprometido a respetar la confidencialidad o estén sujetas a una obligación de 
                            confidencialidad de naturaleza estatutaria; 
                        </li>
                        <li>
                            Cuando el Encargado recurra a otro encargado para llevar a cabo determinadas actividades de tratamiento por cuenta del Cliente, impondrá a este otro encargado, 
                            mediante contrato, las mismas obligaciones de protección de datos que las estipuladas en este Contrato; 
                        </li>
                        <li>
                            Asistir al Cliente, teniendo en cuenta la naturaleza del tratamiento, a través de medidas técnicas y organizativas apropiadas, siempre que sea posible, 
                            para que éste pueda cumplir con su obligación de responder a las solicitudes que tengan por objeto el ejercicio de los derechos de los interesados. La 
                            comunicación debe hacerse de forma inmediata y en ningún caso más allá del día laborable siguiente al de la recepción de la solicitud, juntamente, en su caso, 
                            con la información que pueda ser relevante para atender la solicitud. 
                        </li>
                        <li>
                            Ayudar al Cliente a garantizar el cumplimiento de las obligaciones establecidas en los artículos 32 a 36 de el Reglamento, teniendo en cuenta la naturaleza del
                            tratamiento y la información a disposición del encargado; 
                        </li>
                        <li>
                            Salvo que el Cliente indique otra cosa, suprimir todos los datos personales una vez finalice la prestación de los Servicios, así como suprimir las copias existentes, 
                            a menos que se requiera la conservación de los datos personales en virtud del Derecho de la Unión o de los Estados miembros; 
                        </li>
                        <li>
                            Poner a disposición del Cliente toda la información necesaria para demostrar el cumplimiento de las obligaciones establecidas en el artículo 28 del Reglamento; 
                        </li>
                        <li>
                            Informar inmediatamente al Cliente si, en opinión del Encargado, una instrucción infringe el Reglamento u otras disposiciones en materia de protección de datos 
                            de la Unión o de los Estados miembros; 
                        </li>
                        <li>
                            Cumplir con cualquier otra obligación que le corresponda conforme a la normativa vigente de protección de datos. 
                        </li>
                        <li>
                            Notificar al Cliente, cualquier violación de la seguridad de los datos personales de la que tenga conocimiento, juntamente con toda la información relevante 
                            para la documentación, resolución y comunicación de la incidencia. 
                        </li>
                    </ul>
                
                    <p style="font-weight: bold; font-size:13px">5. Publicación de opiniones</p>
                    <p style="font-size:13px">
                        El Usuario sabe y acepta que al publicar una opinión sobre un abogado o despacho, la imagen y el nombre de Usuario de su perfil en la red social que haya utilizado 
                        para autenticarse aparecerán publicados junto a su opinión en el Sitio Web. Además, mientras la opinión permanezca publicada, Notaría Pública Latina conservará 
                        internamente el e-mail, la IP y el identificador de red social del Usuario. La opinión publicada es accesible a cualquier Usuario que acceda al Sitio Web y quiera 
                        ver las opiniones realizadas sobre un determinado abogado o despacho. 
                    </p>
                
                    <h6>COOKIES</h6>
                    <p style="font-weight: bold; font-size:13px">1. Uso de cookies en el Sitio Web Notaría Pública Latina</p>
                    <p style="font-size:13px">
                        Este Sitio Web utiliza cookies propias y de terceros para mejorar los servicios ofrecidos en el mismo y mostrar al Usuario publicidad relacionada con sus preferencias 
                        mediante el análisis de sus hábitos de navegación. Si el Usuario continúa navegando, consideramos que acepta su uso. A los efectos de esta política, “continuar navegando” 
                        significa hacer clic en cualquier botón, casilla de verificación o enlace del sitio web; descargar cualquier contenido del mismo o hacer scroll.
                    </p>
                
                    <p style="font-weight: bold; font-size:13px">2. Definición de las cookies</p>
                    <p style="font-size:13px">
                        Las cookies son un conjunto de datos que un servidor deposita en el navegador del Usuario y que puede solicitar posteriormente para reconocerle a lo largo de una serie 
                        de visitas. Es decir, se trata de un pequeño archivo de texto que queda almacenado en el disco duro del ordenador y que sirve para identificar al Usuario cuando se conecta 
                        nuevamente al sitio web. Su objetivo es registrar la visita del Usuario y guardar cierta información.
                    </p>
                    <p style="font-size:13px">
                        Una cookie es un fichero que se descarga en el ordenador del Usuario cuando accede a determinados sitios web, como por ejemplo, éste. Las cookies permiten a dichos sitios web, 
                        entre otras cosas, almacenar y recuperar información sobre los hábitos de navegación del Usuario o los de su equipo y, dependiendo de la información que contengan y de la forma 
                        en que utilice su equipo, pueden utilizarse para reconocer al Usuario.
                    </p>
                
                    <p style="font-weight: bold; font-size:13px">3. ¿Qué tipos de cookies existen?</p>
                    <p style="font-size:13px">
                        En base a su duración, las cookies pueden clasificarse en "cookies de sesión" y en "cookies permanentes". Las cookies de sesión desaparecen del equipo del Usuario cuando éste 
                        abandona el sitio web visitado o cierra su navegador. Normalmente se almacenan en la memoria caché del equipo. Por su parte, las cookies permanentes se almacenan en el disco 
                        duro del equipo del Usuario de forma permanente o prolongada, de modo que el sitio web que la ha lanzado puede leerla cada vez que el Usuario lo visita de nuevo. La fecha de 
                        caducidad de este tipo de cookies viene determinada por el sitio web que las lanza.
                    </p>
                
                    <p style="font-weight: bold; font-size:13px">4. Uso de cookies por Notaría Pública Latina</p>
                    <p style="font-size:13px">Notaría Pública Latina informa al Usuario que el presente sitio web utiliza cookies para las siguientes finalidades:</p>
                    <ul style="font-size:13px">
                        <li>
                            Cookies propias de Notaría Pública Latina utilizadas para controlar las peticiones de autentificación de páginas web basada en java; ayudar a mantener asociada 
                            la sesión del Usuario en el sitio web; detectar las características del navegador del Usuario y mejorar su experiencia de uso. 
                        </li>
                        <li>
                            Cookies de Google Analytics utilizadas para medir el comportamiento del Usuario; almacenar su número de visitas y analizar lo rápido que el Usuario abandona el sitio web. 
                        </li>
                    </ul>
                
                    <p style="font-weight: bold; font-size:13px">5. ¿Qué tipos de cookies utiliza este Sitio Web?</p>
                    <p style="font-size:13px">
                        Cookies de análisis: Son aquéllas que, bien tratadas por Nptaría Pública Latina o por terceros, permiten cuantificar el número de Usuarios y así realizar la medición 
                        y análisis estadístico de la utilización que éstos hacen del Sitio Web. Para ello se analiza su navegación en el Sitio Web con el fin de mejorar la oferta de productos, 
                        servicios o contenidos que se muestran en el mismo. Cookies publicitarias: Son aquéllas que permiten la gestión, de la forma más eficaz posible, de los espacios publicitarios que, 
                        en su caso, el editor haya incluido en el Sitio Web en base a criterios como el contenido editado o la frecuencia en la que se muestran los anuncios.
                    </p>
                    <p style="font-size:13px">
                        Cookies de publicidad comportamental: Son aquéllas que permiten la gestión, de la forma más eficaz posible, de los espacios publicitarios que, en su caso, el editor haya incluido 
                        en una página web, aplicación o plataforma desde la que presta el servicio solicitado. Estas cookies almacenan información del comportamiento de los Usuarios obtenida a través de 
                        la observación continuada de sus hábitos de navegación, lo que permite desarrollar un perfil específico para mostrar publicidad en función del mismo.
                    </p>
                    <p style="font-size:13px">
                        En concreto, este Sitio Web utiliza:
                    </p>
                    <ul style="font-size:13px">
                        <li>
                            Google Analytics, herramienta de analítica ofrecida por el tercero Google Inc., sito en Estados Unidos. Google Analytics utiliza cookies propias para notificar las interacciones 
                            de los Usuarios en el Sitio Web, almacenando información de identificación no personal. Los navegadores no comparten cookies de origen a través de distintos dominios. El Usuario 
                            puede ampliar esta información sobre el uso de cookies en Google Analytics. 
                        </li>
                        <li>
                            Google Dynamic Remarketing, herramienta de remarketing ofrecida por el tercero Google Inc., sito en Estados Unidos. Mediante el remarketing dinámico y la inserción de las 
                            correspondientes cookies en el navegador del Usuario, éste podrá visualizar publicidad relacionada con los contenidos visitados en el Sitio Web, incluso cuando ya no esté 
                            navegando por el mismo. El Usuario puede ampliar esta información sobre el uso de cookies en Google Dynamic Remarketing. 
                        </li>
                        <li>
                            Google AdSense, herramienta para la publicación de anuncios publicitarios ofrecida por el tercero Google Inc., sito en Estados Unidos. Google AdSense utiliza cookies 
                            para orientar la publicidad según el contenido que es relevante para el Usuario, mejorar los informes de rendimiento de la campaña y evitar mostrar anuncios que el 
                            Usuario ya haya visto. El Usuario puede ampliar esta información sobre el uso de cookies en Google AdSense. 
                        </li>
                        <li>
                            Google AdWords Conversion, es la herramienta de seguimiento de campañas de publicidad AdWords ofrecida por el tercero Google Inc., sito en Estados Unidos. Google AdWords 
                            Conversion utiliza cookies para ayudarnos a realizar un seguimiento de las ventas y de otras conversiones de los anuncios publicitarios que mostramos, añadiendo una cookie 
                            al ordenador del Usuario cuando este hace clic en un anuncio. Dicha cookie dura 30 días y no recopila ni realiza un seguimiento de información que pueda identificar al Usuario. 
                            El Usuario puede ampliar esta información sobre el uso de cookies en Google AdWords Conversion. 
                        </li>
                    </ul>
                
                    <p style="font-weight: bold; font-size:13px">6. ¿Puedo configurar la instalación de cookies en mi navegador?</p>
                    <p style="font-size:13px">
                        El Usuario puede configurar su navegador para ser avisado de la recepción de cookies y, si lo desea, impedir su instalación en su equipo. Asimismo, el Usuario puede revisar en su 
                        navegador qué cookies tiene instaladas y cuál es el plazo de caducidad de las mismas, pudiendo eliminarlas. Por favor, para ampliar esta información consulte las instrucciones y 
                        manuales de su navegador. En caso de que el Usuario no permita el uso de cookies durante su navegación por este sitio web, Notaría Pública Latina no garantiza que la información 
                        aparecida durante la navegación por el mismo sea exacta, completa o, incluso, que la navegación sea técnicamente posible o viable.
                    </p>
                
                    <p style="font-weight: bold; font-size:13px">7. ¿Cómo puede el Usuario bloquear o eliminar las cookies que utiliza este sitio web?</p>
                    <p style="font-size:13px">
                        El Usuario puede permitir, bloquear o eliminar las cookies instaladas en su equipo mediante la configuración de las opciones del navegador instalado en su ordenador. Si el Usuario 
                        no desea que sus datos se recopilen con Google Analytics, puede instalar un complemento de inhabilitación para navegadores. El hecho de bloquear la instalación 
                        de las cookies descritas en esta política no impide la efectiva utilización del Sitio Web por parte del Usuario.
                    </p>
                    <p style="font-size:13px">
                        Para permitir, conocer, bloquear o eliminar las cookies instaladas en tu equipo puedes hacerlo mediante la configuración de las opciones del navegador instalado en su ordenador. 
                        Por ejemplo puedes encontrar información sobre cómo hacerlo en el caso que uses como navegador:
                    </p>
                    <ul style="font-size:13px">
                        <li>Firefox</li>
                        <li>Chrome</li>
                        <li>Explorer</li>
                        <li>Safari</li>
                        <li>Opera</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-check">
                    <input type="checkbox" name="checkTerminos" class="form-check-input" id="exampleCheck1" onchange="comprobar();">
                    <label class="form-check-label" for="exampleCheck1">Aceptar</label>
                  </div>
              {!! Form::submit('Guardar', ['class' => 'btn text-white', 'style' => 'background-color: #00223b', 'id' => 'btnActualizar']) !!}
            </div>
          </div>
        </div>
      </div>
    {!! Form::close() !!}
@endsection

@section('end-scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        window.addEventListener('load', function(){
            countChars();
            showInputNameCompany();
            comprobar();
            setSrcImageWelcome();
            deshabilitarCheckBox();
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
                case "":codigo = ""; break;
                case "Argentina":codigo = "+54";break;
                case "Bolivia":codigo = "+591";break;
                case "Colombia":codigo = "+57";break;
                case "Chile":codigo = "+56"; break;
                case "Costa Rica":codigo = "+506";break;
                case "Ecuador":codigo = "+593";break;
                case "El Salvador":codigo = "+503";break;
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

        function comprobar()
        {   
            obj = document.getElementById('exampleCheck1');
            if (obj.checked){
                document.getElementById('btnActualizar').disabled = false;
            } else{  
                document.getElementById('btnActualizar').disabled = true;
            }     
        }

        function setSrcImageWelcome() {
            var screenWidth = screen.width;
            if(screenWidth > 850){
            document.getElementById("imgWelcome").src = "{{ asset('img/partners/bienvenida_pc.jpg') }}";
            } else {
            document.getElementById("imgWelcome").src = "{{ asset('img/partners/bienvenida.jpg') }}";
            }
        }

        function deshabilitarCheckBox(){
            var bol = $(".checkSpecialties:checked").length >= 3;     
            $(".checkSpecialties").not(":checked").attr("disabled",bol);
        }

        $(".checkSpecialties").click(() => deshabilitarCheckBox());

        function marcarCampo(event){
            var label = document.getElementById(event.textContent);
            label.classList.add('marcarLabel');
            setTimeout(function(){ 
                label.classList.remove('marcarLabel');
             }, 2000);
        }


    </script>
@endsection

