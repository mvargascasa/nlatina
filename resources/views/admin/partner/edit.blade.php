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
            width: 60%;
            height: 120%;
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
            .social a{
                top: 50% !important;
                height: 35px !important;
                margin-left: 13px !important;
		    }
            .fab {
                padding-top: 10px !important;
                font-size: 18px !important;
                width: 40px !important;
                height: 40px !important;
                border-radius: 25px !important;
            }
            #specialty_help,#biography_help{margin-left:-25vw !important; width: 50vw !important;}
            /* #divcamposvacios{
                margin-left: -20px;
                width: 100rem !important;
            } */
        }
        #txtCamposVacios{
            font-size: 13px !important;
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
        /* Social media */
        .social{
			/*las im??genes usadas tienen width de 48px*/
			width:48px;
			position:fixed;
			top:50px;
			right: 10px;
		}
		/* Extra centrado vertical*/
		.social{
			/*border:1px solid #000;*/
			top:50%;
			height:205px;
			/*para poner height 192 deber??amos haber indicado en el reset de estilos font-size:0;*/
			margin-top:-100px;
		}

        .media {
            padding-top: 10px;
            font-size: 30px;
            width: 50px;
            height: 50px;
            text-align: center;
            text-decoration: none;
            margin: 3px 2px;
            border-radius: 5px;
        }

        .media:hover {
            opacity: 0.8;
            border-radius: 25px 25px 25px 25px;
            -webkit-transition: 0.5s;
        }

        .fa-facebook-f {
            background: #3B5998;
            color: white;
        }

        .fa-facebook-f:hover{
            color: white;
        }

        .instagram{
            background: #bf3590;
            color: white;
        }

        .instagram:hover{
            color: white;
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
                    <h4 style="color: #002542; margin-top: 20px; text-align: center">Inscripci??n para formar parte de nuestro directorio de partners.</h4>
                    <p style="text-align: center">Ingresa tus datos y forma parte de nuestro directorio de partners. Accede a beneficios de anunciarte <b>gratis</b> en Estados Unidos</p>
                    <p id="txtTercero" style="text-align: center; color: #002542; font-weight: bold">{{ Str::upper('??No olvides completar tu informaci??n para que tus datos puedan publicarse en nuestro sitio web!') }}</p>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (count($camposVacios) < 1 && Str::limit($partner->terminos_verified_at, 10, '') == Str::limit(date(now()), 10, '') && count($advertencias) < 1)
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <b>??Felicidades!</b> Toda tu informaci??n se ha completado con ??xito. En breves minutos tu perfil ser?? publicado gratis en nuestro sitio web
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (count($camposVacios) > 0 && $partner->terminos_verified_at != null)
                            <div id="divcamposvacios" class="alert alert-danger">
                                @if(count($camposVacios) < 5)
                                    <b>Est?? muy cerca de que su perfil sea publicado</b>, por favor complete los siguientes campos:
                                @else
                                    Por favor complete los siguientes campos:
                                @endif
                                <div class="row">
                                    @foreach ($camposVacios as $campoVacio)
                                    <div class="col-12 col-sm-6 col-md-3">
                                        <i class="fas fa-exclamation-circle"></i> <b id="txtCamposVacios"><a style="text-decoration: none; color: #000000" href="#{{$campoVacio}}" onclick="marcarCampo(this);">{{ $campoVacio }}</a></b>       
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mt-2" style="font-size: 13px">
                                    Es necesario que su informaci??n este completa para poder publicar su perfil <b>gratis</b> en nuestro sitio web
                                </div>
                            </div>
                        @endif
                        @if (count($advertencias) > 0)
                            <div class="alert alert-warning">
                                Por favor revise los siguientes campos:
                                <div class="row">
                                    @foreach ($advertencias as $advertencia)
                                    <div class="col-12 col-sm-6 col-md-3">
                                        <i class="fas fa-exclamation-circle"></i> <b id="txtCamposVacios"><a style="text-decoration: none; color: #000000">{{ $advertencia }}</a></b>       
                                    </div>
                                    @endforeach
                                </div>
                                {{-- <div class="mt-2" style="font-size: 13px">
                                </div> --}}
                            </div>
                        @endif
                            <div id="card1" class="card">
                                <div class="card-body">
                                    <p style="font-weight: bold">??? INFORMACI??N PERSONAL</p>
                                    <div class="row border pt-3 mb-3 justify-content-center align-items-center">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-3">
                                            <div class="image-wrapper d-flex justify-content-center">
                                                @if ($partner->img_profile != null)
                                                    <img id="picture" class="img-fluid" src="{{ asset('storage/'.$partner->img_profile) }}" alt="No se pudo cargar la imagen">
                                                @else
                                                   <img id="picture" class="img-fluid" src="{{ asset('img/partners/foto-perfil.jpg') }}" alt="No se pudo cargar la imagen">
                                                @endif                    
                                            </div>
                                            <div class="form-group col-md-12">
                                                @if ($partner->img_profile != null)
                                                    {!! Form::label('img_profile', 'Imagen de perfil', ['id' => 'Imagen de perfil']) !!}
                                                @else
                                                    {!! Form::label('img_profile', 'Imagen de perfil *', ['id' => 'Imagen de perfil', 'style' => 'color: red; font-weight: bold']) !!}
                                                @endif
                                                {!! Form::file('img_profile', ['class' => 'form-control-file', 'accept' => 'image/*', 'onchange' => 'showPreview(event);']) !!}
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <h6>Al momento de subir su foto de perfil, <b>tenga en cuenta los siguientes puntos:</b></h6>
                                            <div>
                                                <p><i class="fas fa-check"></i> La imagen debe ser tama??o carnet o pasaporte</p>
                                                <p><i class="fas fa-check"></i> Aseg??rese que sea una imagen corporativa</p>
                                                @if ($partner->img_profile == null)
                                                <p><i class="fas fa-check"></i> Puede tomar como referencia la imagen de ejemplo</p>
                                                @endif
                                                <i><p>"Recuerde que su <b>imagen</b> es muestra de la <b>calidad</b> de sus servicios"</p></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-1"></div>  
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        @if ($partner->title != null)
                                                            {!! Form::label('title', 'T??tulo', ['id' => 'T??tulo']) !!}
                                                        @else
                                                            {!! Form::label('title', 'T??tulo *', ['id' => 'T??tulo', 'style' => 'color: red; font-weight: bold']) !!}
                                                        @endif
                                                        @if ($partner->title != null)
                                                        {!! Form::select('title', [null => 'Seleccione', 'Abogado' => 'Abogado', 'Licenciado' => 'Licenciado'], $partner->title, ['class' => 'form-control']) !!}
                                                        @else
                                                        {!! Form::select('title', [null => 'Seleccione', 'Abogado' => 'Abogado', 'Licenciado' => 'Licenciado'], "{{ old('title') }}", ['class' => 'form-control']) !!}
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        @if ($partner->name != null)
                                                            {!! Form::label('name', 'Nombre') !!}
                                                        @else
                                                            {!! Form::label('name', 'Nombre *', ['id' => 'Nombre', 'style' => 'color: red; font-weight: bold']) !!}
                                                        @endif
                                                        @if ($partner->name != null)
                                                        {!! Form::text('name', $partner->name, ['class' => 'form-control', 'required']) !!}
                                                        @else 
                                                        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}  
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        @if ($partner->lastname != null)
                                                            {!! Form::label('lastname', 'Apellido') !!}
                                                        @else
                                                            {!! Form::label('lastname', 'Apellido *', ['id' => 'Apellido', 'style' => 'color: red; font-weight: bold']) !!}
                                                        @endif
                                                        @if ($partner->lastname != null)
                                                        {!! Form::text('lastname', $partner->lastname, ['class' => 'form-control', 'required']) !!}                                                        
                                                        @else 
                                                        {!! Form::text('lastname', null, ['class' => 'form-control', 'required']) !!}                                                        
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    @if ($partner->email != null)
                                                        {!! Form::label('email', 'Email') !!}
                                                    @else
                                                        {!! Form::label('email', 'Email *', ['id' => 'Email', 'style' => 'color: red; font-weight: bold']) !!}
                                                    @endif
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
                                                        @if ($partner->country_residence != null)
                                                            {!! Form::label('country_residence', 'Pais de residencia', ['id' => 'Pa??s de residencia']) !!}
                                                        @else
                                                            {!! Form::label('country_residence', 'Pais de residencia *', ['id' => 'Pa??s de residencia', 'style' => 'color: red; font-weight: bold']) !!}
                                                        @endif
                                                    @if ($partner->country_residence != null)
                                                    {!! Form::select('country_residence', [null => 'Seleccione', 'Argentina' => 'Argentina', 'Bolivia' => 'Bolivia', 'Chile' => 'Chile', 'Colombia' => 'Colombia', 'Costa Rica' => 'Costa Rica', 'Ecuador' => 'Ecuador', 'El Salvador' => 'El Salvador', 'Guatemala' => 'Guatemala', 'Honduras' => 'Honduras', 'M??xico' => 'M??xico', 'Nicaragua' => 'Nicaragua', 'Panam??' => 'Panam??', 'Paraguay' => 'Paraguay', 'Per??' => 'Per??', 'Puerto Rico' => 'Puerto Rico', 'Rep??blica Dominicana' => 'Rep??blica Dominicana', 'Uruguay' => 'Uruguay', 'Venezuela' => 'Venezuela'], $partner->country_residence, ['class' => 'form-control']) !!}    
                                                    @else
                                                    {!! Form::select('country_residence', [null => 'Seleccione', 'Argentina' => 'Argentina', 'Bolivia' => 'Bolivia', 'Chile' => 'Chile', 'Colombia' => 'Colombia', 'Costa Rica' => 'Costa Rica', 'Ecuador' => 'Ecuador', 'El Salvador' => 'El Salvador', 'Guatemala' => 'Guatemala', 'Honduras' => 'Honduras', 'M??xico' => 'M??xico', 'Nicaragua' => 'Nicaragua', 'Panam??' => 'Panam??', 'Paraguay' => 'Paraguay', 'Per??' => 'Per??', 'Puerto Rico' => 'Puerto Rico', 'Rep??blica Dominicana' => 'Rep??blica Dominicana', 'Uruguay' => 'Uruguay', 'Venezuela' => 'Venezuela'], "{{ old('country_residence') }}", ['class' => 'form-control']) !!}
                                                    @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        {!! Form::label('codigo_pais', 'C??digo Pa??s') !!}
                                                        @if ($partner->codigo_pais != null)
                                                        {!! Form::text('codigo_pais', $partner->codigo_pais , ['class' => 'form-control', 'readonly', 'style' => 'background-color:#ffffff']) !!}
                                                        @else
                                                        {!! Form::text('codigo_pais', null, ['class' => 'form-control', 'readonly', 'style' => 'background-color:#ffffff']) !!}
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        @if ($partner->phone != null)
                                                            {!! Form::label('phone', 'Telefono', ['id' => 'Tel??fono']) !!}
                                                        @else
                                                            {!! Form::label('phone', 'Telefono *', ['id' => 'Tel??fono', 'style' => 'color: red; font-weight: bold']) !!}
                                                        @endif
                                                        {!! Form::number('phone', $partner->phone, ['class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>  
                                    </div>

                                </div>
                            </div>

                            <div id="card2" class="card mt-4">
                                <div class="card-body">
                                    <p style="font-weight: bold">??? REDES SOCIALES</p>
                                    <p style="font-weight: 400">Para esta secci??n es necesario que complete su informaci??n con al menos una red social</p>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                {{-- @if ($partner->link_facebook != null) --}}
                                                {!! Form::label('link_facebook', 'Link de perfil de Facebook', ['id' => 'Link de Facebook']) !!} <i class="fab fa-facebook-square" style="color: #3b5998"></i>
                                                {{-- @else
                                                    {!! Form::label('link_facebook', 'Link de perfil de Facebook *', ['id' => 'Link de Facebook', 'style' => 'color: red; font-weight: bold']) !!} <i class="fab fa-facebook-square" style="color: #3b5998"></i>
                                                @endif --}}
                                                @if ($partner->link_facebook != null)
                                                {!! Form::text('link_facebook', $partner->link_facebook, ['class' => 'form-control']) !!}
                                                @else
                                                {!! Form::text('link_facebook', null, ['class' => 'form-control']) !!}
                                                @endif
                                                <label style="font-size: 13px; color: #566067">Ej.:https://www.facebook.com/su-usuario</label>
                                                @if (count($socialLinks) > 0 && in_array('Facebook', $socialLinks, false) && $partner->link_facebook != null)
                                                    <div class="alert alert-warning" style="font-size: 12px">
                                                        <i class="fas fa-exclamation-triangle"></i> El link de Facebook no es v??lido
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                {{-- @if ($partner->link_instagram != null) --}}
                                                {!! Form::label('link_instagram', 'Link de perfil de Instagram', ['id' => 'Link de Instagram']) !!} <i class="fab fa-instagram" style="color: #ac2bac"></i>
                                                {{-- @else
                                                    {!! Form::label('link_instagram', 'Link de perfil de Instagram *', ['id' => 'Link de Instagram', 'style' => 'color: red; font-weight: bold;']) !!} <i class="fab fa-instagram" style="color: #ac2bac;"></i>
                                                @endif --}}
                                                @if ($partner->link_instagram != null)
                                                {!! Form::text('link_instagram', $partner->link_instagram, ['class' => 'form-control']) !!}
                                                @else
                                                {!! Form::text('link_instagram', null, ['class' => 'form-control']) !!}
                                                @endif
                                                <label style="font-size: 13px; color: #566067">Ej.:https://www.instagram.com/su-usuario</label>
                                                @if (count($socialLinks) > 0 && in_array('Instagram', $socialLinks, false) && $partner->link_instagram != null)
                                                    <div class="alert alert-warning" style="font-size: 12px">
                                                        <i class="fas fa-exclamation-triangle"></i> El link de Instagram no es v??lido
                                                    </div>
                                                @endif
                                            </div>                            
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                {{-- @if ($partner->link_linkedin != null) --}}
                                                {!! Form::label('link_linkedin', 'Link de perfil de LinkedIn', ['id' => 'Link de LinkedIn']) !!} <i class="fab fa-linkedin text-primary"></i>
                                                {{-- @else
                                                    {!! Form::label('link_linkedin', 'Link de perfil de LinkedIn *', ['id' => 'Link de LinkedIn', 'style' => 'color: red; font-weight: bold']) !!} <i class="fab fa-linkedin text-primary"></i>
                                                @endif --}}
                                                @if ($partner->link_linkedin != null)
                                                {!! Form::text('link_linkedin', $partner->link_linkedin, ['class' => 'form-control']) !!}
                                                @else
                                                {!! Form::text('link_linkedin', null, ['class' => 'form-control']) !!}
                                                @endif
                                                <label style="font-size: 13px; color: #566067">Ej.:https://www.linkedin.com/su-usuario</label>
                                                @if (count($socialLinks) > 0 && in_array('LinkedIn', $socialLinks, false) && $partner->link_linkedin != null)
                                                    <div class="alert alert-warning" style="font-size: 12px">
                                                        <i class="fas fa-exclamation-triangle"></i> El link de LinkedIn no es v??lido
                                                    </div>
                                                @endif
                                            </div>                            
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                {{-- @if ($partner->website != null) --}}
                                                {!! Form::label('website', 'Sitio Web', ['id' => 'Link de Sitio Web']) !!} <i class="fas fa-globe" style="color: #3b5998"></i>
                                                {{-- @else
                                                    {!! Form::label('website', 'Sitio Web *', ['id' => 'Link de Sitio Web', 'style' => 'color: red; font-weight: bold']) !!} <i class="fas fa-globe" style="color: #3b5998"></i>
                                                @endif --}}
                                                @if ($partner->website != null)
                                                {!! Form::text('website', $partner->website, ['class' => 'form-control']) !!}
                                                @else
                                                {!! Form::text('website', null, ['class' => 'form-control']) !!}
                                                @endif
                                                <label style="font-size: 13px; color: #566067">Ej.:https://www.su-dominio.com</label>
                                                @if (count($socialLinks) > 0 && in_array('Website', $socialLinks, false) && $partner->website != null)
                                                    <div class="alert alert-warning" style="font-size: 12px">
                                                        <i class="fas fa-exclamation-triangle"></i> El link del Sitio Web no es v??lido
                                                    </div>
                                                @endif
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="card3" class="card mt-4">
                                <div class="card-body">
                                    <p style="font-weight: bold">??? INFORMACI??N PROFESIONAL</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                @if ($partner->numlicencia != null)
                                                    {!! Form::label('numlicencia', 'N??mero de Licencia o Registro de T??tulo', ['id' => 'N??mero de Licencia', 'style' => 'font-weight: bold']) !!}
                                                @else
                                                    {!! Form::label('numlicencia', 'N??mero de Licencia o Registro de T??tulo *', ['id' => 'N??mero de Licencia', 'style' => 'color: red; font-weight: bold']) !!}
                                                @endif
                                                @if ($partner->numlicencia != null)
                                                {!! Form::text('numlicencia', $partner->numlicencia, ['class' => 'form-control']) !!}
                                                @else
                                                {!! Form::text('numlicencia', null, ['class' => 'form-control']) !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                @if ($partner->company != null)
                                                    {!! Form::label('company', 'Tipo de trabajo', ['id' => 'Tipo de trabajo']) !!}
                                                @else
                                                    {!! Form::label('company', 'Tipo de trabajo *', ['id' => 'Tipo de trabajo', 'style' => 'color: red; font-weight: bold']) !!}
                                                @endif
                                                @if ($partner->company != null)
                                                {!! Form::select('company', [null => 'Seleccione', 'Empresa' => 'Empresa', 'Libre Ejercicio' => 'Libre Ejercicio'], $partner->company, ['class' => 'form-control', 'onchange' => 'showInputNameCompany()']) !!}
                                                @else
                                                {!! Form::select('company', [null => 'Seleccione', 'Empresa' => 'Empresa', 'Libre Ejercicio' => 'Libre Ejercicio'], null, ['class' => 'form-control', 'onchange' => 'showInputNameCompany()']) !!}
                                                @endif
                                            </div>
                                        </div>                            
                                        <div id="divCompanyName" class="col-sm-4" @if ($partner->company == "Empresa") style="display: block" @else style="display: none" @endif>
                                            @if ($partner->company_name != null)
                                                {!! Form::label('company_name', 'Nombre de la Empresa', ['id' => 'Nombre de la empresa']) !!}
                                            @else
                                                {!! Form::label('company_name', 'Nombre de la Empresa *', ['id' => 'Nombre de la empresa', 'style' => 'color: red; font-weight: bold']) !!}
                                            @endif
                                            @if($partner->company_name != null)
                                                {!! Form::text('company_name', $partner->company_name, ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::text('company_name', null, ['class' => 'form-control']) !!} 
                                            @endif
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                @if ($partner->address != null)
                                                    {!! Form::label('address', 'Direcci??n de despacho u oficina', ['id' => 'Direcci??n']) !!}
                                                @else
                                                    {!! Form::label('address', 'Direcci??n de despacho u oficina *', ['id' => 'Direcci??n', 'style' => 'color: red; font-weight: bold']) !!}
                                                @endif
                                                @if ($partner->address != null)
                                                {!! Form::text('address', $partner->address, ['class' => 'form-control']) !!}
                                                @else
                                                {!! Form::text('address', null, ['class' => 'form-control']) !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                @if ($partner->state != null)
                                                    {!! Form::label('state', 'Estado, Departamento o Provincia', ['id' => 'Estado, Departamento o Provincia']) !!}
                                                @else
                                                    {!! Form::label('state', 'Estado, Departamento o Provincia *', ['id' => 'Estado, Departamento o Provincia', 'style' => 'color: red; font-weight: bold']) !!} 
                                                @endif
                                                @if ($partner->state != null)
                                                {!! Form::text('state', $partner->state, ['class' => 'form-control']) !!}
                                                @else
                                                {!! Form::text('state', null, ['class' => 'form-control']) !!}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                @if ($partner->city != null)
                                                    {!! Form::label('city', 'Ciudad', ['id' => 'Ciudad']) !!}
                                                @else
                                                    {!! Form::label('city', 'Ciudad *', ['id' => 'Ciudad', 'style' => 'color: red; font-weight: bold']) !!}
                                                @endif
                                                @if ($partner->city != null)
                                                {!! Form::text('city', $partner->city, ['class' => 'form-control']) !!}    
                                                @else
                                                {!! Form::text('city', null, ['class' => 'form-control']) !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @if(!isset($partner->attached_file))
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                {!! Form::label('attached_file', 'Adjuntar hoja de vida / CV', ['class' => 'text-danger', 'style' => 'font-weight:bold;font-size:15px']) !!}
                                                {!! Form::file('attached_file', ['class' => 'form-control-file', 'accept' => '.pdf,.doc,.docx']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    @isset($partner->attached_file)
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <a target="_blank" class="btn text-white" style="background-color: #002542" href="{{ asset('storage/' . $partner->attached_file) }}">Ver Hoja de Vida/CV guardada</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endisset

                                    @if (count($partner->specialties) > 0)
                                        <p style="font-size: 14px" id="??reas de especializaci??n">??reas en las que trabaja <b>(Escoja entre 1 a 3 opciones)</b></p>
                                    @else
                                        <p style="font-size: 14px; color: red; font-weight: bold" id="??reas de especializaci??n">??reas en las que trabaja * <b style="color: #000000; font-weight: normal">(Escoja entre 1 a 3 opciones)</b></p>
                                    @endif
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
                                                <div class="d-flex">
                                                    @if ($partner->specialty != null)
                                                        {!! Form::label('specialty', 'Especialidad(es)', ['id' => 'Especialidad (Descripci??n)']) !!} <b style="font-size: 14px">(Descripci??n m??s detallada)</b>
                                                    @else
                                                        {!! Form::label('specialty', 'Especialidad(es) *', ['id' => 'Especialidad (Descripci??n)', 'style' => 'color: red; font-weight: bold']) !!} <b style="font-size: 14px">(Descripci??n m??s detallada)</b>
                                                    @endif
                                                    <div style="margin-left: 5px; margin-top: -3px; position: relative;" onclick="viewHelp('specialty_help');">
                                                        <label style="background-color: #002542; color: #ffffff; padding-left: 5px; padding-right: 5px; border-radius: 5px; cursor: pointer">?</label>
                                                        <div id="specialty_help" style="background-color: #002542; color: #ffffff; display: none; position: absolute; width: 40vw; padding: 5px; border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                                            Breve descripci??n del ??rea o ??reas en las que se especializa, por ejemplo si es abogado especialista familiar puede especificar temas como alimentos, divorcios, custodia de hijos, etc.
                                                        </div>
                                                    </div>
                                                </div>
                                                {!! Form::text('specialty', Purify::clean($partner->specialty), ['class' => 'form-control', 'onkeyup' => 'countChars();', 'maxlength' => '200']) !!}
                                                <div class="d-flex float-right" style="font-size: 13px">
                                                    <p id="charNum">0 caracteres</p>
                                                    <span id="txtMaxMinChar" class="text-success" style="margin-left: 5px">(M??nimo: 100 caracteres - M??ximo: 200 caracteres)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex">
                                            @if ($partner->biography_html != null)
                                                {!! Form::label('biography_html', 'Biografia y Experiencia', ['id' => 'Biograf??a']) !!} <b style="font-size: 14px">
                                            @else
                                                {!! Form::label('biography_html', 'Biografia y Experiencia *', ['id' => 'Biograf??a', 'style' => 'color: red; font-weight: bold']) !!}
                                            @endif
                                            <div style="margin-left: 5px; margin-top: -3px; position: relative;" onclick="viewHelp('biography_help');">
                                                <label style="background-color: #002542; color: #ffffff; padding-left: 5px; padding-right: 5px; border-radius: 5px; cursor: pointer">?</label>
                                                <div id="biography_help" style="background-color: #002542; color: #ffffff; display: none; position: absolute; width: 40vw; padding: 5px; border-radius: 5px;">
                                                    Rese??a de algunos aspectos de su carrera profesional, por ejemplo donde obtuvo su t??tulo, experiencia en casos que ha manejado, certificados o reconocimientos que ha obtenido, etc.
                                                    <br>
                                                    <b><i>No olvide compartir su entusiamo por las leyes</i></b>
                                                </div>
                                            </div>
                                        </div>
                                        {!! Form::textarea('biography_html', Purify::clean($partner->biography_html), ['class' => 'form-control','rows' => '4', 'minlength' => '100', 'maxlength' => '200']) !!}
                                        <div class="d-flex float-right" style="font-size: 13px">
                                            <span id="txtMaxMinChar" class="text-success" style="margin-left: 5px">(M??nimo: 400 caracteres)</span>
                                        </div>
                                    </div>
                                    <br>
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
        <div class="social">
            <a target="_blank" href="https://www.facebook.com/notariapublicalatina" class="mb-1" style="text-decoration: none"><i class="fab fa-facebook-f media"></i></a>
            <a target="_blank" href="https://www.instagram.com/notarialatina/" class="mb-1" style="text-decoration: none"><i class="fab fa-instagram instagram media"></i></a>
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
                    <h5><b>?? Felicidades !</b></h5>
                    <p>Est?? a un solo paso para publicar <br> su perfil GRATIS</p>
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
              <h5 class="modal-title" id="exampleModalLongTitle">T??rminos y condiciones</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                {{--DIV POLITICAS Y PRIVACIDAD--}}
                <div class="container p-4 text-justify">
                    <h6 dir="ltr"><strong>POL&Iacute;TICAS DE PRIVACIDAD Y COOKIES</strong></h6>
                    <h6>PRIVACIDAD</h6>
                    <p style="font-weight: bold; font-size: 13px">1. Uso, finalidad y r??gimen jur??dico aplicable</p>
                    <p style="font-size:13px">
                        Notar??a P??blica Latina supone un mecanismo de interactuaci??n y soporte para abogados y potenciales clientes de los mismos 
                        que se rige por el derecho americano y en concreto y en cuanto al tratamiento de datos de car??cter personal, por la vigente 
                        normativa del Comit?? Jur??dico Interamericano OEA/Ser.Q CJI/doc. 474/15 rev.2 26 marzo 2015 de protecci??n de datos personales
                         de las personas f??sicas.
                    </p>
                    <p style="font-size:13px">
                        Se informa que todos los datos personales que el Usuario facilite a trav??s de este sitio Web ser??n tratados por Notar??a P??blica
                         Latina en calidad de responsable del tratamiento, (en adelante, "Notar??a P??blica Latina") para las siguientes finalidades:
                    </p>
                    <ul style="font-size:13px">
                        <li>
                            Posibilitar la prestaci??n de los servicios solicitados; Prestar un servicio personalizado para poner en contacto a los 
                            clientes potenciales con otros abogados del directorio. Identificar el sector del problema del cliente y enfocarle hacia
                            la mejor soluci??n por sectores del derecho. La base jur??dica para llevar a cabo este tratamiento de datos es la ejecuci??n
                            de las obligaciones contractuales asumidas por el Usuario y Notar??a P??blica Latina en el Sitio Web. 
                        </li>
                        <li>
                            Para el caso de solicitudes efectuadas por un Usuario que no mantenga una relaci??n contractual con Notar??a P??blica Latina,
                            la base jur??dica es el consentimiento del Usuario impl??cito en su solicitud a los efectos de que Notar??a P??blica Latina pueda 
                            atenderla. Los datos tratados con esta finalidad se conservar??n mientras se mantenga dicha relaci??n y, una vez finalizada ??sta, 
                            durante los plazos de conservaci??n y de prescripci??n de responsabilidades legalmente previstos. 
                        </li>
                        <li>
                            Mantenerle informado acerca de las noticias relacionadas con Notar??a P??blica Latina, as?? como de los productos y servicios 
                            comercializados tanto por Notar??a P??blica Latina como por terceras entidades pertenecientes o dirigidas al sector jur??dico. 
                            La base jur??dica para llevar a cabo este tratamiento de datos es el consentimiento del Usuario. Los datos tratados con esta 
                            finalidad se conservar??n hasta el momento en que el Usuario retire su consentimiento. El Usuario podr?? en todo momento indicar 
                            expresamente si autoriza o no dicho tratamiento de sus datos a trav??s del contacto que se indica a continuaci??n.
                        </li>
                        <li>
                            Realizar encuestas de satisfacci??n y calidad sobre el servicio de Notar??a P??blica Latina. Dichas encuestas podr??n ir dirigidas
                            tanto a Usuarios abogados como a Usuarios clientes o potenciales clientes de aqu??llos. La base jur??dica para llevar a cabo este
                            tratamiento de datos es el inter??s leg??timo. Los datos tratados con esta finalidad se guardar??n durante los plazos de conservaci??n
                            y de prescripci??n de responsabilidades legalmente previstos. El Usuario podr?? en todo momento indicar expresamente si autoriza o no
                            dicho tratamiento de sus datos. 
                        </li>
                    </ul>
                
                    <p style="font-weight: bold; font-size:13px">2. Destinatarios y categor??as de Encargados del tratamiento</p>
                    <p style="font-size:13px">
                        Los datos podr??n comunicarse a los siguientes destinatarios terceros: Administraciones P??blicas para el cumplimiento de obligaciones legales;
                        a abogados para la ejecuci??n de los servicios; a Entidades bancarias para la gesti??n de cobros y pagos de facturas; y a Encargados del tratamiento 
                        debidamente seleccionados. Asimismo, Notar??a P??blica Latina podr?? transferir los datos a Encargados del Tratamiento ubicados en terceros pa??ses, 
                        para la prestaci??n de servicios de atenci??n al usuario, con los que ha suscrito el correspondiente clausulado tipo de la Organizaci??n de los Estados Americanos, 
                        una copia del cual puede ser solicitado a info@notarialatina.com
                    </p>
                    
                    <p style="font-weight: bold; font-size:13px">3. Ejercicio de derechos del interesado</p>
                    <p style="font-size:13px">
                        La presente pol??tica de privacidad propiedad de Notar??a P??blica Latina informa al interesado que podr?? ejercer en cualquier momento los derechos de acceso, 
                        rectificaci??n, supresi??n, limitaci??n, oposici??n o portabilidad mediante correo electr??nico dirigido a info@notarialatina.com o bien mediante escrito dirigido 
                        a Notar??a P??blica Latina, 67-03 Roosevelt Avenue, Woodside, NY 11377. En los tratamientos cuya legitimaci??n se base en el consentimiento, el Usuario tiene el 
                        derecho a retirar dicho consentimiento en cualquier momento, sin que ello afecte a la licitud del tratamiento basado en el consentimiento previo a su retirada. 
                        El interesado tendr?? derecho a presentar reclamaci??n ante la autoridad de control. Le informamos que no facilitar la informaci??n solicitada puede implicar la 
                        imposibilidad de formalizar o dar cumplimiento al objeto del contrato. Puede contactar con nuestro Delegado de Protecci??n de Datos en info@notarialatina.com, 
                        o bien dirigiendo su solicitud a Notar??a P??blica Latina, 67-03 Roosevelt Avenue, Woodside, NY 11377, a su atenci??n.
                    </p>
                
                    <p style="font-weight: bold; font-size:13px">4. Notar??a P??blica Latina como encargado del tratamiento</p>
                    <p style="font-size:13px">
                        Notar??a P??blica Latina tendr?? la consideraci??n de encargado del tratamiento de todos aquellos datos personales titularidad del Usuario Abogado a los que tenga 
                        acceso durante la prestaci??n de los servicios solicitados por ellos. En este sentido, Notar??a P??blica Latina se obliga a:
                    </p>
                    <ul style="font-size:13px">
                        <li>
                            Tratar los datos personales ??nicamente siguiendo instrucciones documentadas del Usuario Abogado, inclusive con respecto a las transferencias de datos personales, 
                            salvo que est?? obligado a ello en virtud del Derecho de la Uni??n o de los Estados miembros; en tal caso, Notar??a P??blica Latina informar?? al Cliente de esa exigencia 
                            legal previa al tratamiento, salvo que tal derecho lo proh??ba por razones importantes de inter??s p??blico; 
                        </li>
                        <li>
                            Garantizar que las personas autorizadas para tratar datos personales se hayan comprometido a respetar la confidencialidad o est??n sujetas a una obligaci??n de 
                            confidencialidad de naturaleza estatutaria; 
                        </li>
                        <li>
                            Cuando el Encargado recurra a otro encargado para llevar a cabo determinadas actividades de tratamiento por cuenta del Cliente, impondr?? a este otro encargado, 
                            mediante contrato, las mismas obligaciones de protecci??n de datos que las estipuladas en este Contrato; 
                        </li>
                        <li>
                            Asistir al Cliente, teniendo en cuenta la naturaleza del tratamiento, a trav??s de medidas t??cnicas y organizativas apropiadas, siempre que sea posible, 
                            para que ??ste pueda cumplir con su obligaci??n de responder a las solicitudes que tengan por objeto el ejercicio de los derechos de los interesados. La 
                            comunicaci??n debe hacerse de forma inmediata y en ning??n caso m??s all?? del d??a laborable siguiente al de la recepci??n de la solicitud, juntamente, en su caso, 
                            con la informaci??n que pueda ser relevante para atender la solicitud. 
                        </li>
                        <li>
                            Ayudar al Cliente a garantizar el cumplimiento de las obligaciones establecidas en los art??culos 32 a 36 de el Reglamento, teniendo en cuenta la naturaleza del
                            tratamiento y la informaci??n a disposici??n del encargado; 
                        </li>
                        <li>
                            Salvo que el Cliente indique otra cosa, suprimir todos los datos personales una vez finalice la prestaci??n de los Servicios, as?? como suprimir las copias existentes, 
                            a menos que se requiera la conservaci??n de los datos personales en virtud del Derecho de la Uni??n o de los Estados miembros; 
                        </li>
                        <li>
                            Poner a disposici??n del Cliente toda la informaci??n necesaria para demostrar el cumplimiento de las obligaciones establecidas en el art??culo 28 del Reglamento; 
                        </li>
                        <li>
                            Informar inmediatamente al Cliente si, en opini??n del Encargado, una instrucci??n infringe el Reglamento u otras disposiciones en materia de protecci??n de datos 
                            de la Uni??n o de los Estados miembros; 
                        </li>
                        <li>
                            Cumplir con cualquier otra obligaci??n que le corresponda conforme a la normativa vigente de protecci??n de datos. 
                        </li>
                        <li>
                            Notificar al Cliente, cualquier violaci??n de la seguridad de los datos personales de la que tenga conocimiento, juntamente con toda la informaci??n relevante 
                            para la documentaci??n, resoluci??n y comunicaci??n de la incidencia. 
                        </li>
                    </ul>
                
                    <p style="font-weight: bold; font-size:13px">5. Publicaci??n de opiniones</p>
                    <p style="font-size:13px">
                        El Usuario sabe y acepta que al publicar una opini??n sobre un abogado o despacho, la imagen y el nombre de Usuario de su perfil en la red social que haya utilizado 
                        para autenticarse aparecer??n publicados junto a su opini??n en el Sitio Web. Adem??s, mientras la opini??n permanezca publicada, Notar??a P??blica Latina conservar?? 
                        internamente el e-mail, la IP y el identificador de red social del Usuario. La opini??n publicada es accesible a cualquier Usuario que acceda al Sitio Web y quiera 
                        ver las opiniones realizadas sobre un determinado abogado o despacho. 
                    </p>
                
                    <h6>COOKIES</h6>
                    <p style="font-weight: bold; font-size:13px">1. Uso de cookies en el Sitio Web Notar??a P??blica Latina</p>
                    <p style="font-size:13px">
                        Este Sitio Web utiliza cookies propias y de terceros para mejorar los servicios ofrecidos en el mismo y mostrar al Usuario publicidad relacionada con sus preferencias 
                        mediante el an??lisis de sus h??bitos de navegaci??n. Si el Usuario contin??a navegando, consideramos que acepta su uso. A los efectos de esta pol??tica, ???continuar navegando??? 
                        significa hacer clic en cualquier bot??n, casilla de verificaci??n o enlace del sitio web; descargar cualquier contenido del mismo o hacer scroll.
                    </p>
                
                    <p style="font-weight: bold; font-size:13px">2. Definici??n de las cookies</p>
                    <p style="font-size:13px">
                        Las cookies son un conjunto de datos que un servidor deposita en el navegador del Usuario y que puede solicitar posteriormente para reconocerle a lo largo de una serie 
                        de visitas. Es decir, se trata de un peque??o archivo de texto que queda almacenado en el disco duro del ordenador y que sirve para identificar al Usuario cuando se conecta 
                        nuevamente al sitio web. Su objetivo es registrar la visita del Usuario y guardar cierta informaci??n.
                    </p>
                    <p style="font-size:13px">
                        Una cookie es un fichero que se descarga en el ordenador del Usuario cuando accede a determinados sitios web, como por ejemplo, ??ste. Las cookies permiten a dichos sitios web, 
                        entre otras cosas, almacenar y recuperar informaci??n sobre los h??bitos de navegaci??n del Usuario o los de su equipo y, dependiendo de la informaci??n que contengan y de la forma 
                        en que utilice su equipo, pueden utilizarse para reconocer al Usuario.
                    </p>
                
                    <p style="font-weight: bold; font-size:13px">3. ??Qu?? tipos de cookies existen?</p>
                    <p style="font-size:13px">
                        En base a su duraci??n, las cookies pueden clasificarse en "cookies de sesi??n" y en "cookies permanentes". Las cookies de sesi??n desaparecen del equipo del Usuario cuando ??ste 
                        abandona el sitio web visitado o cierra su navegador. Normalmente se almacenan en la memoria cach?? del equipo. Por su parte, las cookies permanentes se almacenan en el disco 
                        duro del equipo del Usuario de forma permanente o prolongada, de modo que el sitio web que la ha lanzado puede leerla cada vez que el Usuario lo visita de nuevo. La fecha de 
                        caducidad de este tipo de cookies viene determinada por el sitio web que las lanza.
                    </p>
                
                    <p style="font-weight: bold; font-size:13px">4. Uso de cookies por Notar??a P??blica Latina</p>
                    <p style="font-size:13px">Notar??a P??blica Latina informa al Usuario que el presente sitio web utiliza cookies para las siguientes finalidades:</p>
                    <ul style="font-size:13px">
                        <li>
                            Cookies propias de Notar??a P??blica Latina utilizadas para controlar las peticiones de autentificaci??n de p??ginas web basada en java; ayudar a mantener asociada 
                            la sesi??n del Usuario en el sitio web; detectar las caracter??sticas del navegador del Usuario y mejorar su experiencia de uso. 
                        </li>
                        <li>
                            Cookies de Google Analytics utilizadas para medir el comportamiento del Usuario; almacenar su n??mero de visitas y analizar lo r??pido que el Usuario abandona el sitio web. 
                        </li>
                    </ul>
                
                    <p style="font-weight: bold; font-size:13px">5. ??Qu?? tipos de cookies utiliza este Sitio Web?</p>
                    <p style="font-size:13px">
                        Cookies de an??lisis: Son aqu??llas que, bien tratadas por Nptar??a P??blica Latina o por terceros, permiten cuantificar el n??mero de Usuarios y as?? realizar la medici??n 
                        y an??lisis estad??stico de la utilizaci??n que ??stos hacen del Sitio Web. Para ello se analiza su navegaci??n en el Sitio Web con el fin de mejorar la oferta de productos, 
                        servicios o contenidos que se muestran en el mismo. Cookies publicitarias: Son aqu??llas que permiten la gesti??n, de la forma m??s eficaz posible, de los espacios publicitarios que, 
                        en su caso, el editor haya incluido en el Sitio Web en base a criterios como el contenido editado o la frecuencia en la que se muestran los anuncios.
                    </p>
                    <p style="font-size:13px">
                        Cookies de publicidad comportamental: Son aqu??llas que permiten la gesti??n, de la forma m??s eficaz posible, de los espacios publicitarios que, en su caso, el editor haya incluido 
                        en una p??gina web, aplicaci??n o plataforma desde la que presta el servicio solicitado. Estas cookies almacenan informaci??n del comportamiento de los Usuarios obtenida a trav??s de 
                        la observaci??n continuada de sus h??bitos de navegaci??n, lo que permite desarrollar un perfil espec??fico para mostrar publicidad en funci??n del mismo.
                    </p>
                    <p style="font-size:13px">
                        En concreto, este Sitio Web utiliza:
                    </p>
                    <ul style="font-size:13px">
                        <li>
                            Google Analytics, herramienta de anal??tica ofrecida por el tercero Google Inc., sito en Estados Unidos. Google Analytics utiliza cookies propias para notificar las interacciones 
                            de los Usuarios en el Sitio Web, almacenando informaci??n de identificaci??n no personal. Los navegadores no comparten cookies de origen a trav??s de distintos dominios. El Usuario 
                            puede ampliar esta informaci??n sobre el uso de cookies en Google Analytics. 
                        </li>
                        <li>
                            Google Dynamic Remarketing, herramienta de remarketing ofrecida por el tercero Google Inc., sito en Estados Unidos. Mediante el remarketing din??mico y la inserci??n de las 
                            correspondientes cookies en el navegador del Usuario, ??ste podr?? visualizar publicidad relacionada con los contenidos visitados en el Sitio Web, incluso cuando ya no est?? 
                            navegando por el mismo. El Usuario puede ampliar esta informaci??n sobre el uso de cookies en Google Dynamic Remarketing. 
                        </li>
                        <li>
                            Google AdSense, herramienta para la publicaci??n de anuncios publicitarios ofrecida por el tercero Google Inc., sito en Estados Unidos. Google AdSense utiliza cookies 
                            para orientar la publicidad seg??n el contenido que es relevante para el Usuario, mejorar los informes de rendimiento de la campa??a y evitar mostrar anuncios que el 
                            Usuario ya haya visto. El Usuario puede ampliar esta informaci??n sobre el uso de cookies en Google AdSense. 
                        </li>
                        <li>
                            Google AdWords Conversion, es la herramienta de seguimiento de campa??as de publicidad AdWords ofrecida por el tercero Google Inc., sito en Estados Unidos. Google AdWords 
                            Conversion utiliza cookies para ayudarnos a realizar un seguimiento de las ventas y de otras conversiones de los anuncios publicitarios que mostramos, a??adiendo una cookie 
                            al ordenador del Usuario cuando este hace clic en un anuncio. Dicha cookie dura 30 d??as y no recopila ni realiza un seguimiento de informaci??n que pueda identificar al Usuario. 
                            El Usuario puede ampliar esta informaci??n sobre el uso de cookies en Google AdWords Conversion. 
                        </li>
                    </ul>
                
                    <p style="font-weight: bold; font-size:13px">6. ??Puedo configurar la instalaci??n de cookies en mi navegador?</p>
                    <p style="font-size:13px">
                        El Usuario puede configurar su navegador para ser avisado de la recepci??n de cookies y, si lo desea, impedir su instalaci??n en su equipo. Asimismo, el Usuario puede revisar en su 
                        navegador qu?? cookies tiene instaladas y cu??l es el plazo de caducidad de las mismas, pudiendo eliminarlas. Por favor, para ampliar esta informaci??n consulte las instrucciones y 
                        manuales de su navegador. En caso de que el Usuario no permita el uso de cookies durante su navegaci??n por este sitio web, Notar??a P??blica Latina no garantiza que la informaci??n 
                        aparecida durante la navegaci??n por el mismo sea exacta, completa o, incluso, que la navegaci??n sea t??cnicamente posible o viable.
                    </p>
                
                    <p style="font-weight: bold; font-size:13px">7. ??C??mo puede el Usuario bloquear o eliminar las cookies que utiliza este sitio web?</p>
                    <p style="font-size:13px">
                        El Usuario puede permitir, bloquear o eliminar las cookies instaladas en su equipo mediante la configuraci??n de las opciones del navegador instalado en su ordenador. Si el Usuario 
                        no desea que sus datos se recopilen con Google Analytics, puede instalar un complemento de inhabilitaci??n para navegadores. El hecho de bloquear la instalaci??n 
                        de las cookies descritas en esta pol??tica no impide la efectiva utilizaci??n del Sitio Web por parte del Usuario.
                    </p>
                    <p style="font-size:13px">
                        Para permitir, conocer, bloquear o eliminar las cookies instaladas en tu equipo puedes hacerlo mediante la configuraci??n de las opciones del navegador instalado en su ordenador. 
                        Por ejemplo puedes encontrar informaci??n sobre c??mo hacerlo en el caso que uses como navegador:
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

    {{-- @if ($partner->terminos_verified_at == null) --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $("document").ready(function(){
                setTimeout(() => {
                    if (localStorage.getItem("modalwaslaunchedaux") == null) {
                        $('#modalFollowInstagram').modal('toggle');
                        localStorage.setItem("modalwaslaunchedaux", true);
                    }
                }, 11000);
            });
        </script>
    {{-- @endif --}}
    
    <div class="modal fade" id="modalFollowInstagram">
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content">
              <div class="modal-header" style="display: inline; border-radius: 5px">
                  <h6 class="modal-title text-center" style="font-weight: bold">S??guenos en nuestras cuentas oficiales y mantente informado cada d??a</h6>
                  <div class="row text-center mt-3 mb-4">
                      <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2"></div>
                      <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                          {{-- <a target="_blank" href="https://www.facebook.com/notariapublicalatina" class="btn btn-primary" style="background-color: #0c8aef; width: 60px; height: 60px" href="#!" role="button"
                          ><i class="fab fa-facebook-f fa-2x mt-2"></i
                          ></a> --}}
                          <a target="_blank" href="https://www.facebook.com/notariapublicalatina" style="text-decoration: none" class="fab fa-facebook-f media"></a>
                      </div>
                      <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                          {{-- <a target="_blank" href="https://www.instagram.com/notarialatina/" class="btn btn-primary" style="background-color: #bf3590; width: 60px; height: 60px" href="#!" role="button"
                          ><i class="fab fa-instagram fa-2x mt-2"></i
                          ></a> --}}
                          <a target="_blank" href="https://www.instagram.com/notarialatina/" style="text-decoration: none" class="fab fa-instagram instagram media"></a>
                      </div>
                      <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2"></div>
                  </div>
                  <div class="row text-center">
                  </div>
              </div>
          </div>
        </div>
    </div>
    
@endsection

@section('end-scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function viewHelp(div){
            var div_help =  document.getElementById(div);
            console.log(div_help);
            if(div_help.style.display == 'none'){div_help.style.display = 'block';}
            else {div_help.style.display = 'none';}
        }

        if(localStorage.getItem('modalwaslaunchedaux') != null){
            console.log(localStorage.getItem('modalwaslaunchedaux'));
        }

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
                case "M??xico":codigo = "+52";break;
                case "Nicaragua":codigo = "+505";break;
                case "Panam??":codigo = "+507";break;
                case "Paraguay":codigo = "+595";break;
                case "Per??":codigo = "+51";break;
                case "Puerto Rico":codigo = "+1787";break;
                case "Rep??blica Dominicana":codigo = "+1809";break;
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

