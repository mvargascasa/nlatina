@extends('layouts.web')
@section('header')

@php 
    $countriesmeta = \App\Partner::select('country_residence')->distinct()->get();
@endphp

    <title>Abogados y Notarias en Latinoamérica a su alcance</title>
    <meta name="description" content="👨‍⚖️ Contamos con un amplio directorio de abogados y notarios en Latinoamérica para ayudarlo a gestionar sus trámites | Notaria Latina">
    <meta name="keywords" content="legislacion, judicial, abogados en latinoamerica, abogados near me, abogados cerca de mi, abogados de accidentes, abogados de familia, abogados de divorcio, abogados de inmigracion, abogado inmobiliario, abogados de trabajo, abogados testamentos y herencias, notario near me, notario cerca de mi, abogado notaria near me, abogado penalista, abogado civil, @foreach($countriesmeta as $country)abogado en {{Str::lower($country->country_residence)}},@endforeach abogados latinos, notarias cerca de mi abiertas">
    <style>
        /*QUITAR LA ETIQUETA DE TELEFONO DE LA ESQUINA SUPERIOR DERECHA EN LA PAGINA DE LOS PARTNERS*/
        #etiquetaPhone{
            display: none;
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
                font-size: 25px !important;
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
            #titlemovil{
                display: block !important;
            }
            #titlepc{
                display: none !important;
            }
            #rowImage{
                min-height: 250px !important;
            }
        }
        .titulo{
            font-size: 30px;
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
        #titlemovil{
            display: none;
        }
        #titlepc{
            display: block;
        }
    </style>
@endsection

@section('content')

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>
        <div id="rowImage" class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">
            <div class="col-sm-12 col-12 text-white text-center">
                <h1 id="titlemovil" class="font-weight-bold heading-title titulo"><b style="color: #fec02f">¡Abogados y Notarías</b> <br> en Latinoamérica <br> a su alcance!</h1>
                <h1 id="titlepc" class="font-weight-bold heading-title titulo"><b style="color: #fec02f">¡Abogados y Notarías</b> en Latinoamérica <br> a su alcance!</h1>
            </div>
            {{-- <div id="colRegisterForm" class="col-12 col-sm-12 col-md-12 col-lg-6">
                @include('admin.partner.layouts.form_register')
            </div> --}}
        </div>
    </div>
</section>

<div class="pb-3" id="contentPartner" style="background-color: #f5f6f8">
    @include('web.partials.search_partner')
</div>

@section('numberWpp', '13479739888')

@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/Country.js') }}"></script>
<script>

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
    function selectCountry(id){       
        var form = document.getElementById('formSearchPartner');
        var inputCountryId = document.getElementById('countryHidden');
        inputCountryId.value = id;
        Country.setCountryId(id); 
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

    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('{{url('img/partners/BANNER-ABOGADOS.webp')}}')";
    });
  </script>
@endsection