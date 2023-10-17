@extends('layouts.web')

@section('header')

@php 
    $countriesmeta = \App\Partner::select('country_residence')->distinct()->get();
    $country = DB::table('countries')->where('name_country', Request::get('pais'))->first();
    $currentURL = url()->full(); //Obtener toda la url para mandar og:url
@endphp

    <meta name="robots" content="noindex">

    <title>Abogados en {{ $country_aux->name_country }} a su alcance | Notaria Latina ⚖</title>
    <meta name="description" content="Contamos con un amplio directorio de abogados en {{$country_aux->name_country}} de diferentes áreas como Penal, Civil, Migratorio, Laboral, Familiar, entre otros, para ayudarlo a gestionar sus trámites legales | Notaria Latina 👨🏻‍⚖️">
    <meta name="keywords" content="abogados near me, abogados cerca de mi, abogado {{strtolower($country_aux->name_country)}}, abogados en {{strtolower($country_aux->name_country)}}, abogado en {{strtolower($country_aux->name_country)}}, abogados de {{strtolower($country_aux->name_country)}}, abogados migratorios {{strtolower($country_aux->name_country)}}, abogados migratorios en {{strtolower($country_aux->name_country)}}, abogados de familia {{strtolower($country_aux->name_country)}}, abogados de familia en {{strtolower($country_aux->name_country)}}, abogados de divorcio {{strtolower($country_aux->name_country)}}, abogados de inmigracion {{strtolower($country_aux->name_country)}}, abogados de inmigracion en {{strtolower($country_aux->name_country)}}, abogados familiar {{strtolower($country_aux->name_country)}}, abogados familiar en {{strtolower($country_aux->name_country)}}, abogados online {{strtolower($country_aux->name_country)}}, directorio de abogados en {{strtolower($country_aux->name_country)}}, abogados penalistas {{strtolower($country_aux->name_country)}}, abogados penalistas en {{strtolower($country_aux->name_country)}}, servicios de abogados en {{strtolower($country_aux->name_country)}}, abogados laborales {{strtolower($country_aux->name_country)}}, abogados de migracion {{strtolower($country_aux->name_country)}}, abogados de migracion en {{strtolower($country_aux->name_country)}}">
    <meta property="og:site_name" content="https://notarialatina.com"/>
    <meta property="og:url" content="{{ $currentURL }}"/>
    <meta property="og:description" content="Abogados y Notarias en {{$country_aux->name_country}} a su alcance | Notaria Latina"/>
    <meta property="og:type" content="article"/>
    <meta property="og:locale" content="es"/>
    <meta property="og:image" content="https://notarialatina.com/img/partners/ogimg-partners.jpg"/>
    <style>
        /* ocultar el icono de llamada en la parte inferior derecha */
        #iconcall{display:none}
        /* ocultar la tarjeta de wpp */
        #divwpp{display:none}
        #etiquetaPhone{display: none;}
        #divpreguntas{display: none !important}
        .testimotionals {width:100%;height: 100% !important}
        .testimotionals .card {
            position:relative;
            overflow:hidden;
            width:100%;
            margin:0 auto;
            /* background:rgb(255, 255, 255); */
            background: #ffffff;
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

        .testimotionals .card .content .namepartner{
            margin-top: 10px;
            font-size:14px;
            color:rgb(160, 85, 85) !important;
        }
        .testimotionals .card:hover .content .namepartner{
            font-size:14px;
            color:rgb(255, 255, 255) !important;
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
            #rowImage{
                min-height: 250px !important;
            }
            #titlepc{font-size: 18px !important}
        }
        @media screen and (max-width: 1200px){
            .cardsMobileFeatured{ display: block !important}
            .cardsDesktopFeatured{display: none !important}
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
        .container-image::after {
            content: "";
            width: 100%;
            /* El height controla el alto del degradado */
            height: 350px;
            position: absolute;
            left: 0;
            /* Puedes cambiar la posición del degrado desde aquí */
            bottom: 0;
            /* Si cambias la posición, reemplaza también la dirección en el gradiente */
            background-image: linear-gradient(to top, #002542c7, transparent);
        }

        .hover {
  overflow: hidden;
  position: relative;
  padding-bottom: 60%;
}

.hover-overlay {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 90;
  transition: all 0.4s;
}

.hover section {
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
  transition: all 0.3s;
}

.hover-content {
  position: relative;
  z-index: 99;
}

.hover-2 .hover-overlay {
  background: linear-gradient(to top, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.1));
}

.hover-2-title {
  position: absolute;
  top: 85%;
  left: 0;
  text-align: center;
  width: 100%;
  z-index: 99;
  transition: all 0.3s;
  color: #ffffff;
  padding-left: 10px;
  padding-right: 10px;
}

.hover-2-description {
  width: 100%;
  position: absolute;
  bottom: 0;
  opacity: 0;
  left: 0;
  text-align: center;
  z-index: 99;
  transition: all 0.3s;
  color: #ffffff;
}

.hover-2:hover .hover-2-title {
  transform: translateY(-1.5rem);
}

.hover-2:hover .hover-2-description {
  bottom: 0.5rem;
  opacity: 1;
}

.hover-2:hover .hover-overlay {
  background: linear-gradient(to top, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.1));
}

    </style>
    <script defer src="{{ asset('js/lazysizes.min.js') }}"></script>

@endsection

@section('content')
    <section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
        <div>
            <div id="rowImage" class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">
                <div class="col-sm-12 col-12 text-white text-center">
                    <h1 id="titlepc" class="font-weight-bold heading-title titulo"><b style="color: #fec02f">¡Abogados</b> de {{$country_aux->name_country}} a su alcance!</h1>
                    <p>Contamos con un amplio directorio de <b style="color: #fec02f">abogados en {{$country_aux->name_country}}</b> a su disposición</p>
                </div>
                {{-- <div id="colRegisterForm" class="col-12 col-sm-12 col-md-12 col-lg-6">
                    @include('admin.partner.layouts.form_register')
                </div> --}}
            </div>
        </div>
    </section>
    
    <section class="pb-3 bg-white container" id="contentPartner" style="background-color: #f5f6f8">
        @include('web.partials.view_partners')
    </section>

    <section class="container accordion mb-5" id="accordionExample">
        <h3 style="font-weight: 400" class="mt-1 mb-3">Preguntas Frecuentes</h3>
        <article class="card rounded-0">
            <div class="card-header bg-light" id="headingOne" style="cursor: pointer">
                <div class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <span style="font-weight: 500"><i class="fas fa-check-circle"></i> ¿Por qué es importante contratar un abogado en {{ $country_aux->name_country }}?</span>
                </div>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body text-muted">
                    <p>Contratar un abogado {{ $demonym[0]->demonym}} es crucial porque brinda conocimientos especializados en leyes y regulaciones, protege nuestros derechos legales y ofrece asesoramiento experto en situaciones legales complejas. Su experiencia y habilidades nos permiten tomar decisiones informadas y asegurar que nuestras acciones estén respaldadas por un enfoque legal sólido.</p>
                </div>
            </div>
        </article>
        <article class="card rounded-0">
            <div class="card-header bg-light" id="headingTwo" style="cursor: pointer">
                <div class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <span style="font-weight: 500"><i class="fas fa-check-circle"></i> ¿Qué servicios legales ofrecen los abogados de {{ $country_aux->name_country }}?</span>
                </div>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body text-muted">
                  <p>Algunos de los servicios más comunes que ofrecen los abogados que ejercen en {{ $country_aux->name_country }} incluyen:</p>
                  <ol>
                      <li>Derecho Civil</li>
                      <li>Derecho Penal</li>
                      <li>Derecho Laboral</li>
                      <li>Derecho Comercial</li>
                      <li>Derecho de Familia</li>
                      <li>Derecho Administrativo</li>
                      <li>Derecho Tributario</li>
                      <li>Derecho Constitucional</li>
                  </ol>
                </div>
              </div>
        </article>
        <article class="card rounded-0">
            <div class="card-header bg-light" id="headingThree" style="cursor: pointer">
                <div class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <span style="font-weight: 500"><i class="fas fa-check-circle"></i> ¿Cómo puedo verificar la idoneidad y experiencia de Abogados {{ ucfirst($demonym[0]->demonym) }}s?</span>
                </div>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body text-muted">
                    <p>Para verificar la idoneidad y experiencia de abogados, investiga su licencia y registro en organismos legales, busca reseñas en línea y solicita referencias de clientes anteriores. Programa una reunión para evaluar su conocimiento y capacidad de comunicación. Decisión informada para tus necesidades legales.</p>
                </div>
              </div>
        </article>
    </section>

@section('numberWpp', '13479739888')

@endsection

@section('script')
    <script src="{{ asset('js/Country.js') }}"></script>
    <script>
    function selectCountry(id, page = 1){
        let state = document.querySelector("select[name='state']").value;
        let specialty = document.querySelector("select[name='specialty']").value;
        $.ajax({
            type: "GET",
            url: "{{ route('partners.fetch.state.b') }}",
            data:{
                "pais" : id,
                "state" : state,
                "specialty": specialty,
                "page": page,
            },
            dataType: "json",
            success: function(result){
                $('#contentPartner').html(result.viewPartners);
                Country.setCountryId(id);
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

    $(document).on('click', '.pagination a', function(event){
        event.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        
        let country_id = $('#pais').val();
        // if(country_id == null || country_id == undefined){
        //     country_id = Country.getCountryId();
        // }

        // const valores = window.location.search;
        // const urlParams = new URLSearchParams(valores);
        // var country_id = urlParams.get('country');

        selectCountry(country_id, page);
    });

//      selectCountry
//      stateSelect
//      specialty

    let selCountryPartners = document.getElementById('pais');
    selCountryPartners.addEventListener('change', function(){
        if(selCountryPartners.value != ""){
            selCountryPartners.style.backgroundColor = "#002542";
            selCountryPartners.style.color = "#ffffff";
        } else {
            selCountryPartners.style.backgroundColor = "#ffffff";
            selCountryPartners.style.color = "#000000";
        }
    })

    let selectState = document.getElementById('stateSelect');
    selectState.addEventListener('change', function(){
        if(selectState.value != ""){
            selectState.style.backgroundColor = "#002542";
            selectState.style.color = "#ffffff";
        } else {
            selectState.style.backgroundColor = "#ffffff";
            selectState.style.color = "#000000";
        }
    })

    let specialty = document.getElementById('specialty');
    specialty.addEventListener('change', function(){
        if(specialty.value != ""){
            specialty.style.backgroundColor = "#002542";
            specialty.style.color = "#ffffff";
        } else {
            specialty.style.backgroundColor = "#ffffff";
            specialty.style.color = "#000000";
        }
    })

    function changeurllocation(option){
        // debugger;
        pais = option.value.toLowerCase();
        pais = pais.replace(/\s/g, "-");
        // console.log(pais);
        let url = "{{route('partners.fetch.state', ':pais')}}";
        url = url.replace(":pais", pais);
        window.location.href = url;
    }

    function loadStates(){
        var idCountry = $('#pais').val();
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

    function scrollToFilters(e) {
        e.preventDefault();
        const offsetTop = document.querySelector("#rowTxt").offsetTop;

        scroll({
            top: offsetTop,
            behavior: "smooth"
        });
    }
        
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('{{url('img/partners/BANNER-ABOGADOS.webp')}}')";
        scrollToFilters(event);
    });
    </script>
@endsection
