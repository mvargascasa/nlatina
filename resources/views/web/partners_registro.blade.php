@extends('layouts.web')
@section('header')
@php 
$countriesmeta = \App\Partner::select('country_residence')->distinct()->get();
@endphp

<title>Abogados y Notarias en Latinoamérica a su alcance | Notaria Latina</title>
<meta name="description" content="Regístrese gratis y forme parte de nuestro directorio de partners en Latinoamérica para que sus servicios sean solicitados por clientes potenciales | Notaria Latina">
<meta name="keywords" content="legislacion, judicial, abogados en latinoamerica, abogados near me, abogados cerca de mi, abogados de accidentes, abogados de familia, abogados de divorcio, abogados de inmigracion, abogado inmobiliario, abogados de trabajo, abogados testamentos y herencias, notario near me, notario cerca de mi, abogado notaria near me, abogado penalista, abogado civil, @foreach($countriesmeta as $country)abogado en {{Str::lower($country->country_residence)}},@endforeach abogados latinos">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    html, body {
        max-width: 100% !important;
        overflow-x: hidden !important;
    }

    #svgwpp{
        display: none;
    }
    /*QUITAR LA ETIQUETA DE TELEFONO DE LA ESQUINA SUPERIOR DERECHA EN LA PAGINA DE LOS PARTNERS*/
    #etiquetaPhone{
        display: none;
    }
    .testimotionals {width:100%;display:inline-block;}
    .testimotionals .card {
        position:relative;
        overflow:hidden;
        width:100%;
        margin:0 auto;
        /* background:rgb(255, 255, 255); */
        background: #f5f6f8;
        padding:20px;
        box-sizing:border-box;
        text-align:justify;
        /* box-shadow:0 10px 40px rgba(0,0,0,.5) */
    }

    .testimotionals .card .layer {
        z-index:2;
        position:absolute;
        top:calc(100% - 5px);
        height:100%;
        width:100%;
        left:0;
        background:linear-gradient(to left , #002542, #002542);
        transition:0.5s;
    }

    .testimotionals .card .content {
        z-index:2; 
        position:relative;
        color: black;
    }

    .testimotionals .card .content:hover {
        color: white;
    }

    .testimotionals .card:hover  .layer{
        top:0;
    }

    .testimotionals .card .content h5{
        margin-top: 10px;
        font-size:14px;
        color:rgb(160, 85, 85);
    }
    .testimotionals .card:hover .content h5{
        font-size:14px;
        color:rgb(255, 255, 255);
    }

    .testimotionals .card .content p{
        font-size:14px;
        color:rgb(0, 0, 0);
        text-align: left; /*LE AGREGUE ESTO PARA QUE SE JUSTIFIQUE A LA IZQUIERDA*/
    }
    .testimotionals .card:hover .content p{
        font-size:14px;
        color:rgb(255, 255, 255);
    }

    .testimotionals .card .content h6{
        font-size:14px;
        color:rgb(0, 0, 0);
    }
    .testimotionals .card:hover .content h6{
        font-size:14px;
        color:rgb(255, 255, 255);
    }

    .testimotionals .card .content .row p{
        font-size:11px;
        color:rgb(0, 0, 0);
    }
    .testimotionals .card:hover .row p{
        font-size:11px;
        color:rgb(255, 255, 255);
    }

    .testimotionals .card .content .image {
        width:100%; 
        height:100%;
        overflow:hidden;
        display: flex;
        justify-content: center;
    }

    .form{
        margin-left: 20%;
        margin-right: 20%;
        margin-top: 5%;
        margin-bottom: 10px;
    }

    @media screen and (max-width: 860px){
        .countrysearch{
            margin-left: 0% !important;
            font-size: 13px;
        }

        .form{
            margin-left: 0%;
            margin-right: 0%;
        }

        .titulo{
            margin-top: 15%;
            margin-left: 0px !important;
            text-align: center;
        }
        .subtitle{
            margin-left: 0px !important;
            text-align: center !important;
        }
        #rowTxt{
            padding-top: 15px !important;  
        }
        #rowTxt h5{
            font-size: 16px;  
        }
        #rowTxt p{
            font-size: 15px; 
        }
        #rowFiltros{ 
            margin-left: -40px !important;
            margin-right: -65px !important;
        }
        #btnBuscar{
            width: 120px !important; 
            height: 20px !important; 
            font-size: 10px !important;
        }
        #imgBanner{
            height: 100px !important;
        }
        #imgPareja{
            margin-left: 12% !important;
            width: 210px !important;
        }
        #txtBanner{
            font-size: 11px !important;
            margin-right: 10% !important;
        }
        #divBeneficios{
            text-align: center !important;
            float: none !important;
            text-align: center !important;
        }
        #divImageAbogado{
            display: flex !important;
            justify-content: center !important;
        }
    }
    @media screen and (max-width: 580px){
        .contenido{
            margin-left: 0% !important;
            margin-right: 0% !important;
        }
        #rowDataPartner{
           margin-left: -15% !important;
        }
        .txtDataPartner{
            font-size: 10px !important;
        }
        .dismissMarginTopBottom{
            margin-top: 0% !important;
            margin-bottom: 0% !important;
        }
        .image{
            width: 100px !important; 
            height: 125px !important;
        }
        #colRegisterForm{
            margin-bottom: -10px !important;
        }
        #titlemovil{
            display: block !important;
        }
        #titlepc{
            display: none !important;
        }
        .parrafoBeneficios{
            margin: 0px !important;
        }
    }
    .titulo{
        font-size: 25px;
    }
    .emptyRegister{
        text-align: center;
        justify-content: center;
        align-items: center;
    }

    #texto{
        align-items: center;
    }

    #telefono{
        margin-left: 2.5px;
    }

    #nacionalidad{
        margin-right: 2.5px;
    }
    select {
        box-shadow: 2px 2px 3px #bfbfbf;
    }
    .checkBeneficios{
        color: #fec02f;
    }
    #titlemovil{
        display: none;
    }
    #titlepc{
        display: block;
    }
    .parrafoBeneficios{
        margin: 5px;
    }
</style>
<script type="text/javascript">
    function callbackThen(response){
        // read HTTP status
        console.log(response.status);
        // read Promise object
        response.json().then(function(data){
        console.log(data);
        });
    }

    function callbackCatch(error){
        console.error('Error:', error)
    }
    </script>


    {!! htmlScriptTagJsApi([
    'callback_then' => 'callbackThen',
    'callback_catch' => 'callbackCatch'
    ]) !!}
<script src="{{ asset('js/lazysizes.min.js') }}"></script>
@endsection

@section('content')
<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>
        <div class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">
            <div class="col-sm-6 col-12 text-white">
                <h4 id="titlemovil" style="margin-left: 25%" class="titulo">Anúnciese <b>GRATIS</b> <br> en los <b>ESTADOS UNIDOS</b></h4>
                <h4 id="titlepc" style="margin-left: 25%" class="titulo">Anúnciese <b>GRATIS</b> en los <b>ESTADOS UNIDOS</b></h4>
                <h4 style="margin-left: 25%; color: #fec02f" class="font-weight-bold subtitle"><i>Regístrese ahora..!</i></h4>
            </div>
            <div id="colRegisterForm" class="col-12 col-sm-12 col-md-12 col-lg-6">
                @include('admin.partner.layouts.form_register')
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-sm-6 mt-5">
            <div id="divBeneficios" class="float-right text-right">
                <h4 class="font-weight-bold">Usted puede acceder <br> a varios beneficios como:</h4>
                <p class="parrafoBeneficios">Mayor crecimiento económico y profesional <i class="fa fa-check checkBeneficios"></i></p>
                <p class="parrafoBeneficios">Clientes potenciales de su país de origen <i class="fa fa-check checkBeneficios"></i>
                <p class="parrafoBeneficios"> Genere su propia base de datos <i class="fa fa-check checkBeneficios"></i></p>
                <p class="parrafoBeneficios">Posicionamiento internacional <i class="fa fa-check checkBeneficios"></i></p>
                <p class="parrafoBeneficios">Obtenga más prestigio en su país <i class="fa fa-check checkBeneficios"></i></p>
            </div>
        </div>
        <div id="divImageAbogado" class="col-sm-6 mt-4">
            <img width="35%" src="{{ asset('img/partners/DISEÑO PARTNERS Y ABOGADOS -03.webp') }}" alt="">
        </div>
    </div>
</div>

<div class="row" style="background-color: #333333">
    <div class="container mt-5">
        <div class="row text-white">
            <div class="col-sm-4 text-center mb-4">
                <img width="15%" src="{{ asset('img/partners/REGISTRO.svg') }}" alt="">
                <h6 style="margin-top: 5px"><b>PASO 1.</b></h6>
                <p style="margin: 0px">Llene el formulario de registro</p>
            </div>
            <div class="col-sm-4 text-center mb-4">
                <img width="14%" src="{{ asset('img/partners/BIO-01.svg') }}" alt="">
                <h6><b>PASO 2.</b></h6>
                <p style="margin: 0px">Complete su biografía</p>
            </div>
            <div class="col-sm-4 text-center mb-4">
                <img width="16%" src="{{ asset('img/partners/TERMINOS-01.svg') }}" alt="">
                <h6 style="margin-top: 6px"><b>PASO 3.</b></h6>
                <p style="margin: 0px">Acepte los términos y condiciones</p>
            </div>
        </div>
        <div class="row mt-1 mb-5">
            <div class="col-sm-12 text-center">
                <h5 style="color: #fec02f"><i>¡Y listo su perfil será activado!</i></h5>
                <p style="color: #ffffff">*Recuerde que si no completa los pasos no podrá acceder a clientes potenciales desde su perfil</p>
            </div>
        </div>
    </div>
</div>

@if (session('success'))
            @php
                echo "
                    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                    <script>
                        swal('Registro exitoso', 'Revisa tu correo para validarlo', 'success');
                    </script>
                    ";    
            @endphp
        @endif
@endsection

@section('numberWpp', '13479739888')

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{-- <script src="https://www.google.com/recaptcha/api.js"></script> --}}
<script>

    // function onSubmit(token) {
    //     document.getElementById("demo-form").submit();
    // }
    
    function mostrarContrasena(){
      var tipo = document.getElementById("password");
      var eye = document.getElementById("eyePassword");
        if(tipo.type == "password"){
            tipo.type = "text";
            eye.classList.remove('fas', 'fa-eye');
            eye.classList.add('fas', 'fa-eye-slash');
        }else{
            tipo.type = "password";
            eye.classList.remove('fas', 'fa-eye-slash');
            eye.classList.add('fas', 'fa-eye');
        }
    }

        var selectPaisResidencia = document.getElementById('country_residence');
        var inputCodPais = document.getElementById('codTelfPais');
        
        selectPaisResidencia.onchange  = function(e){
            switch (selectPaisResidencia.value) {
                case "Argentina":codigo = "+54";break;
                case "Bolivia":codigo = "+591";break;
                case "Chile":codigo = "+56"; break;
                case "Colombia":codigo = "+57";break;
                case "Costa Rica":codigo = "+506";break;
                case "Ecuador":codigo = "+593";break;
                case "El Salvador":codigo = "+503";break;
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

        function evitarSpam(){
            if (!document.getElementById("controlspam").value) {
                return true;
            } else {
                return false;
            }
        }

    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('{{url('img/partners/BANNER-PARTNERS.webp')}}')";
    });
  </script>
@endsection