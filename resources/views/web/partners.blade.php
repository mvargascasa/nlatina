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
    <script src="{{ asset('js/lazysizes.min.js') }}"></script>
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

    function loadStates(){
        var idCountry = $('#country').val();
            $.ajax({
                url: "{{ route('partners.fetch.state.a') }}",
                type: "POST",
                data: {
                    "_token" : "{{ csrf_token() }}",
                    "id": idCountry
                },
                dataType: "json",
                success: function(result){
                    $('#stateSelect').html('<option value="">Todos</option>');
                    $.each(result, function(key, value){
                        $('#stateSelect').append('<option value="' + value.name_state + '">' + value.name_state + "</option>");
                    });
                }
            });
    }

        function selectCountry(id){
            $.ajax({
                type: "POST",
                url: "{{ route('partners.fetch.state') }}",
                data: {
                    "_token" : "{{ csrf_token() }}",
                    "country" : id,
                    "state" : null,
                    "specialty": null
                },
                dataType: "json",
                success: function(result){
                    $('#contentPartner').html(result.viewPartners);
                },
                error: function(xhr, status, error){
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    if(xhr.status == 419){
                        alert('Por favor recargue la página');
                    }
                    // alert('Error - ' + errorMessage);
                }
            });
        }

    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('{{url('img/partners/BANNER-ABOGADOS.webp')}}')";
    });
  </script>
@endsection