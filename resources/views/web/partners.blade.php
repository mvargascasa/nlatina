@extends('layouts.web')
@section('header')

@php 
    $countriesmeta = \App\Partner::select('country_residence')->distinct()->get();
@endphp

    <title>Abogados y Notarias en Latinoamérica a su alcance | Notaria Latina</title>
    <meta name="description" content="👨‍⚖️ Contamos con un amplio directorio de abogados y notarios en Latinoamérica para ayudarlo a gestionar sus trámites | Notaria Latina">
    <meta name="keywords" content="legislacion, judicial, abogados en latinoamerica, abogados near me, abogados cerca de mi, abogados de accidentes, abogados de familia, abogados de divorcio, abogados de inmigracion, abogado inmobiliario, abogados de trabajo, abogados testamentos y herencias, notario near me, notario cerca de mi, abogado notaria near me, abogado penalista, abogado civil, @foreach($countriesmeta as $country)abogado en {{Str::lower($country->country_residence)}},@endforeach abogados latinos, notarias cerca de mi abiertas">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:site_name" content="https://notarialatina.com"/>
    <meta property="og:url" content="{{ Request::url() }}"/>
    <meta property="og:description" content="Abogados y Notarias en Latinoamérica a su alcance | Notaria Latina"/>
    <meta property="og:type" content="article"/>
    <meta property="og:locale" content="es"/>
    <meta property="og:image" content="https://notarialatina.com/img/partners/ogimg-partners.jpg"/>

    <style>
        /* ocultar etiqueta del numero que hace la llamada */
        /* #etiquetaPhone{display: none;} */
        /* ocultar el icono de llamada en la parte inferior derecha */
        html{
            scroll-behavior: smooth;
        }
        #iconcall{display:none}
        #iconwpp{display: none}
        /* ocultar la tarjeta de wpp */
        /* #divwpp{display:none} */
        #divpreguntas{display:none !important}
        .form{margin-left: 20%;margin-right: 20%;margin-top: 5%;margin-bottom: 10px;}
        @media screen and (max-width: 860px){
            .countrysearch{margin-left: 0% !important;font-size: 13px;}
            .form{margin-left: 0%;margin-right: 0%;}
            .titulo{font-size: 25px !important;}
            #rowTxt{padding-top: 15px !important;  }
            #rowTxt h5{font-size: 16px;  }
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
                width: 100vw !important; /*ESTO LE AUMENTE*/
                max-width: 100vw !important; /*ESTO LE AUMENTE*/
            }
            .txtNamePartner{
                font-size: 13px;
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
            #rowImage{
                min-height: 250px !important;
            }
            #formulario{
                margin-bottom: -10px !important;
            }
            .card-post{flex-direction: column;}
            .card-post > div{ width: 100% !important}
        }
        .titulo{
            font-size: 40px;
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
        .text-color-blue{color: #2B384D}
        input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none;margin: 0;}
    /* FIREFOX */
    input[type="number"] {-moz-appearance: textfield;}input[type="number"]:hover,input[type="number"]:focus {-moz-appearance: number-input;}
    /* OTHER */
    input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none;margin: 0;}
    .countries:hover a div{background-color: #2B384D;}
    .countries:hover a{color: #ffffff}
    .border-right-pill{border-radius: 0px 25px 25px 0px;}
    .text-sm{font-size: 12px}
    .card-post{display: flex}
    .content-post:hover{color: #fec02f}
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
    
        <script id="scriptrecaptcha"></script>
        <script>
            setTimeout(() => {
            document.getElementById('scriptrecaptcha').src = "https://www.google.com/recaptcha/api.js?render=6LdI9cMeAAAAALgxUrh7mzlzFBlIV-F4Gzvbp2D8"; 
                console.log('cargando script recaptcha...');
            }, 3000);
    
            setTimeout(() => {
                var csrfToken = document.head.querySelector('meta[name="csrf-token"]');
                grecaptcha.ready(function() {
                    grecaptcha.execute('6LdI9cMeAAAAALgxUrh7mzlzFBlIV-F4Gzvbp2D8', {action: 'homepage'}).then(function(token) {
                            
                    fetch('/biscolab-recaptcha/validate?token=' + token, {
                        headers: {
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": csrfToken.content
                        }
                    })
                    .then(function(response) {
                        callbackThen(response)
                    })
                    .catch(function(err) {
                        callbackCatch(err)
                    });
                        });
                    });
                    console.log('ejecutando codigo del recaptcha...');
            }, 3500);
        </script>
@endsection

@section('phoneNumberHidden', '+13474283543')
@section('phoneNumber', '347-428-3543')

@section('content')

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>
        <div id="rowImage" class="row align-items-center justify-content-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">
            <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12 col-12 text-white text-center">
                <img width="60px" height="60px" class="mb-3" src="{{asset('faviconotarialatina-22.png')}}" alt="">
                <h1 id="titlemovil" class="font-weight-bold heading-title titulo text-center mb-3"><b style="color: #fec02f">¡Abogados </b> <br> en Latinoamérica a su alcance!</h1>
                {{-- <h1 id="titlepc" class="font-weight-bold heading-title titulo"><b style="color: #fec02f">¡Abogados y Notarías</b> en Latinoamérica <br> a su alcance!</h1> --}}
                <a href="#search-partner" class="btn btn-outline-warning rounded-pill text-white">ENCUENTRE SU ABOGADO</a>
            </div>
            {{-- <div id="formulario" class="col-sm-12 col-md-12 col-xl-6 col-lg-6 mt-5 mb-3">
                @include('admin.partner.layouts.form_register')
            </div> --}}
            {{-- <div id="colRegisterForm" class="col-12 col-sm-12 col-md-12 col-lg-6">
                @include('admin.partner.layouts.form_register')
            </div> --}}
        </div>
    </div>
</section>

<section class="bg-warning" style="height: 10px"></section>

<div id="contentPartner">
    @include('web.partials.search_partner')
</div>

<div style="background-color: #f8f8f8">
    <div class="container py-5">
        <h3 class="text-center font-weight-normal"><span class="font-weight-bold">NOTARIA LATINA</span> EN CIFRAS</h3>
        <div class="row pt-5 px-5" style="color: #2B384D">
            <div class="col-sm-3 text-center">
                <div>
                    <i class="fas fa-users fa-2x"></i>
                    <p class="border-bottom font-weight-bold py-2">+1000 abogados</p>
                    <p>Día a día <span class="font-weight-bold">decenas de abogados</span> se registran en nuestra plataforma</p>
                </div>
            </div>
            <div class="col-sm-3 text-center">
                <div>
                    <i class="fas fa-map-marked-alt fa-2x"></i>
                    <p class="border-bottom font-weight-bold py-2">18 paises</p>
                    <p>Contamos con abogados en toda <span class="font-weight-bolder">LATINOAMERICA</span></p>
                </div>
            </div>
            <div class="col-sm-3 text-center">
                <i class="fas fa-chart-line fa-2x"></i>
                <p class="border-bottom font-weight-bold py-2">+1 año</p>
                    <p>Llevamos más de un año <span class="font-weight-bold">innovando y mejorando</span> nuestra plataforma</p>
            </div>
            <div class="col-sm-3 text-center">
                <i class="fas fa-desktop fa-2x"></i>
                <p class="border-bottom font-weight-bold py-2">Online</p>
                    <p>Puede encontrar abogados en línea, <span class="font-weight-bold">cotizar gratis y sin compromiso</span></p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="text-center mt-5">
        <p class="h4">¿Sabía que puede ampliar su cartera de clientes?</p>
        <p>Con <b style="color: #FEC02F">PARTNERS</b> de <b class="font-weight-bold">Notaria Latina</b> es posible. Una gran cantidad de personas ya han consultado por nuestros abogados registrados</p>
        <p class="h5">Y usted, ¿qué espera?</p>
    </div>
    <div class="row">
        <div class="col-sm-6 mt-5">
            <div id="divBeneficios" class="float-right text-right">
                <h4 class="font-weight-bold">Puede acceder <br> a varios beneficios como:</h4>
                <p class="parrafoBeneficios">Mayor crecimiento económico y profesional <i class="fa fa-check checkBeneficios"></i></p>
                <p class="parrafoBeneficios">Clientes potenciales de su país de origen <i class="fa fa-check checkBeneficios"></i>
                <p class="parrafoBeneficios"> Genere su propia base de datos <i class="fa fa-check checkBeneficios"></i></p>
                <p class="parrafoBeneficios">Posicionamiento internacional <i class="fa fa-check checkBeneficios"></i></p>
                <p class="parrafoBeneficios">Obtenga más prestigio en su país <i class="fa fa-check checkBeneficios"></i></p>
            </div>
        </div>
        <div id="divImageAbogado" class="col-sm-6 mt-4">
            <img width="35%" height="100%" src="{{ asset('img/partners/DISEÑO PARTNERS Y ABOGADOS -03.webp') }}" alt="Abogados en Latinoamerica - Notaria Latina">
        </div>
    </div>
</div>

<div class="row" style="background-color: #333333">
    <div class="container mt-5">
        <div class="row text-white">
            <div class="col-sm-4 text-center mb-4">
                <img width="15%" height="50%" src="{{ asset('img/partners/REGISTRO.svg') }}" alt="Abogados en Latinoamerica - Notaria Latina">
                <h6 style="margin-top: 5px"><b>PASO 1.</b></h6>
                <p style="margin: 0px">Llene el formulario de registro</p>
            </div>
            <div class="col-sm-4 text-center mb-4">
                <img width="14%" height="50%" src="{{ asset('img/partners/BIO-01.svg') }}" alt="Abogados en Latinoamerica - Notaria Latina">
                <h6><b>PASO 2.</b></h6>
                <p style="margin: 0px">Complete su biografía</p>
            </div>
            <div class="col-sm-4 text-center mb-4">
                <img width="16%" height="50%" src="{{ asset('img/partners/TERMINOS-01.svg') }}" alt="Abogados en Latinoamerica - Notaria Latina">
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

<section>
    <x-blog.list-post />
</section>

<div class="position-fixed" style="bottom: 15px; right: 15px">
    <a target="_blank" href="https://api.whatsapp.com/send?phone=13474283543">
        <img width="50px" src="{{ asset('img/whatsapp.png') }}" alt="">
    </a>
</div>

@section('numberWpp', '13474283543') @endsection

@section('script')
<script id="script-jquery" defer></script>
<script src="{{ asset('js/Country.js') }}"></script>
<script>

    setTimeout(() => {
        document.getElementById('script-jquery').src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js";
        console.log('cargando script jquery 3.5.1');
    }, 3000);

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
                            //page = 1 Este parametro iba en SelectCountry
    function selectCountry(name_country){       
        var form = document.getElementById('formSearchPartner');
        var inputCountryId = document.getElementById('countryHidden');
        inputCountryId.value = name_country;
        //Country.setCountryId(id); 
        form.submit();


        // $.ajax({
        //     type: "GET",
        //     url: "{{ route('partners.fetch.state') }}",
        //     data:{
        //         // "_token" : "{{ csrf_token() }}",
        //         "country" : id,
        //         "state" : null,
        //         "specialty": null,
        //         "page": page,
        //     },
        //     // dataType: "json",
        //     success: function(result){
                
        //     },
        //     error: function(xhr, status, error){
        //         var errorMessage = xhr.status + ': ' + xhr.statusText
        //         if(xhr.status == 419){
        //             alert('Por favor recargue la página');
        //         }
        //         // alert('Error - ' + errorMessage);
        //     }
        // });
    }

    let selectPaisResidencia = document.getElementById('country_residence');
    let inputCodPais = document.getElementById('codTelfPais');

    if(selectPaisResidencia){
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
            inputCodPais.innerHTML = codigo;
            setimgcodcountry(selectPaisResidencia.value);
        }
    }    

    function setimgcodcountry(country){
        let country_cast = country.replace(/\s+/g, '').toLowerCase();
        document.getElementById('imgcodcountry').src = "{{asset('img/partners')}}"+"/"+country_cast+".png";
    }

    function evitarSpam(){
        if (!document.getElementById("controlspam").value) {
            return true;
        } else {
            return false;
        }
    }

    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('{{url('img/partners/BANNER-ABOGADOS.webp')}}')";
    });
  </script>
@endsection