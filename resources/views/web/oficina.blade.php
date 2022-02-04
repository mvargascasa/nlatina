@extends('layouts.web')

@section('header')
    <title>Notaria Latina en {{ $data['office'] }}</title>
    <meta name="description" content="{{ $data['metadescription'] }}">
    <meta name="keywords" content="{{ $data['keywords'] }}">
    <style>
        @media screen and (max-width: 580px){
            .titulo{
                margin-top: 15%;
            }
            .first-row{
                padding-bottom: 15px;
            }
            .second-row{
                padding-top: 0;
                margin-left: 10%;
            }
            #sectionthree{
                min-width: 110vw;
                min-height: 110vh;
            }
            #imgApostille{
                padding-top: 5%;
            }
            #imgrowapostille{
                width: 100%!important;
                height: 100%!important;
            }
        }
        .titulo{
            color: white;
            font-weight: bold;
        }

        i{
            color:#9A7A2E;
        }

        .checks > p{
            color: #143b6b;
        }

        .checks > .row > .col > p{
            color: #143b6b;
        }
        #sectionthree{
            width: 100vw;
            height: 55vh;
        }
        .fifth-row{
            margin-top: 5%;
            justify-content: center;
            align-items: center;
        }

        /*HOVER IMAGENES DE SERVICIOS*/
        .grow img{
            transition: 1s ease;
        }

        .grow img:hover{
            -webkit-transform: scale(1.2);
            -ms-transform: scale(1.2);
            transform: scale(1.2);
            transition: 1s ease;
        }

        #colService:hover{
            background-color: #ece8e3;
            -webkit-transition: 600ms;
            -webkit-transform: initial;
        }
    </style>
    <script src="{{ asset('js/lazysizes.min.js') }}"></script>
@endsection

@section('phoneNumberHidden', $data['telfHidden'])
@section('phoneNumber', $data['telfShow'])

@section('content')
    <section id="prisection" style="background-size: cover; background-position: left top; background-repeat: no-repeat;">
        <div class="row justify-content-center align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5)">
            <div class="col text-center">
                <h1 class="font-weight-bold heading-title titulo">Notaría Pública Latina <br> en {{ $data['office'] }}</h1>
                <p class="text-white heading-title" style="font-size: 25px">Gestión rápida y segura!</p>
                <a id="btnFirstIniciarTramite" href="#iniciarTramite" class="btn" style="background-color: #ffc107">Iniciar Trámite</a>
            </div>
        </div>
    </section>

    <div class="row" style="background-color: #122944;">
        <div class="col-sm-6 first-row" style="color: #ffffff; padding-left:15%; padding-top: 4%; margin-right: 0px;">
            <h2 style="font-weight: bold">¿Por qué elegirnos?</h2>
            <p style="font-size: 15px;">Brindamos el mejor servicio y asesoría en trámites de notaría para Latinos en Estados Unidos.</p>
            <div>
                <img class="lazyload" width="50px" data-src="{{ asset('img/docverify-approved-enotary-small.png') }}" alt="Notaria Latina en {{ $data['office'] }}">
                <img class="lazyload" data-src="{{ asset('img/logo.png') }}" alt="Notaria Latina en {{ $data['office'] }}">
            </div>
        </div>
        
        <div class="col-sm-6">
            <img class="lazyload" style="width: 100%; height: 100%" data-src="{{ asset('img/oficinas/IMAGENES-NEW-JERSEY2.webp') }}" alt="">
        </div>
    </div>
    
    <div class="row" id="sectionthree" style="background-size: cover; background-position: left top; background-repeat: no-repeat;">
        <div class="col-sm-6 d-flex justify-content-center align-items-center" id="imgApostille">
            <img class="lazyload" style="width: 80%" class="img-fluid" data-src="{{ asset($data['imgapostilla']) }}" alt="">
        </div>
        <div class="col-sm-6 second-row">
            <div class="row" style="padding-top: 9%; padding-right: 50px">
                <div class="col-sm-6">
                    <div class="d-flex">
                        <a class="d-flex" style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'poder-notarial-'.Str::slug($data['office'])) }}">
                            <img class="lazyload" style="width: 30px; height: 30px" data-src="{{asset('img/oficinas/ICONOS-20.webp')}}" alt="">
                            <p style="margin-left: 5px; font-weight: bold; color:#d4aa41">Cartas Poder {{ $data['office'] }}</p>
                        </a>
                    </div>
                    <p style="font-size: 14px; color: #ffffff">Realizamos Poderes Especiales y Poderes Generales con su respectiva Apostilla. Cartas Poder desde {{ $data['office'] }} hacia Latinoamérica</p>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex">
                        <a class="d-flex" style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'traducir-documentos-'.Str::slug($data['office'])) }}">
                            <img class="lazyload" style="width: 30px; height: 30px" data-src="{{asset('img/oficinas/ICONOS-18.webp')}}" alt="">
                            <p style="margin-left: 5px; font-weight: bold; color:#d4aa41">Servicio de Traducción Certificada</p>
                        </a>
                    </div>
                    <p style="font-size: 14px; color: #ffffff">Al obtener un documento con sus correctas traducciones nos permiten validar su información, es así que este se puede utilizar fuera del pais de origen</p>
                </div>
            </div>
            <div class="row" style="padding-right: 50px">
                <div class="col-sm-6">
                    <div class="d-flex">
                        <a class="d-flex" style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'apostillar-documentos-'.Str::slug($data['office'])) }}">
                            <img class="lazyload" style="width: 30px; height: 30px" data-src="{{asset('img/oficinas/ICONOS-19.webp')}}" alt="">
                            <p style="margin-left: 5px; font-weight: bold; color:#d4aa41">¿Cómo apostillar en {{ $data['office'] }}?</p>
                        </a>
                    </div>
                    <p style="font-size: 14px; color: #ffffff">El documento que porte la apostilla tiene validez legal en cualquiera de los países miembros del convenio de la Haya.</p>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex">
                        <a class="d-flex" style="text-decoration: none; color: #000000"  href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'affidavit-support-'.Str::slug($data['office'])) }}">
                            <img class="lazyload" style="width: 30px; height: 30px" data-src="{{asset('img/oficinas/ICONOS-17.webp')}}" alt="">
                            <p style="margin-left: 5px; font-weight: bold; color:#d4aa41">Affidávit Support</p>
                        </a>
                    </div>
                    <p style="font-size: 14px; color: #ffffff">Una declaración jurada o Affidávit es una manifestación escrita o verbal cuya veracidad es asegurada mediante un juramento ante una autoridad judicial</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center align-items-center" style="padding-top: 50px">
        <div class="text-center">
            <i><p style="font-weight: bold; font-size: 20px">¿Necesitas realizar un trámite de Notaría <br> en {{ $data['office'] }}?</p></i>
            <p style="font-size: 15px">¡Contáctanos! ¡Estamos seguros que podemos ayudarte!</p>
        </div>
    </div>
    <div class="row">
        <hr>
        <a class="btn btn-warning rounded-pill" style="font-weight: bold" href="tel:{{$data['telfHidden']}}">LLAMAR {{$data['telfShow']}}</a>
        <hr>
    </div>
    <div style="background-color: rgb(245, 244, 244); padding-bottom:50px">
        <p class="text-center mt-5 mb-5" style="padding-top: 30px; font-size: 25px; font-weight: bold">Servicios adicionales de Notaría Pública</p>
        <div class="row" style="padding-left:20%; padding-right:20%;">
            <div class="col-12 col-sm-3 text-center border" style="padding:25px 25px 25px 25px; width: 90px" id="colService">
                <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'travel-authorization-en-'.Str::slug($data['office'])) }}">
                    <div class="grow">
                        <img style="width: 50px; height: 50px" class="img-fluid lazyload" data-src="{{ asset('img/oficinas/ICONOS-08.webp') }}" alt="">
                    </div>
                    <p>Travel Authorization</p>
                </a>
            </div>
            <div class="col-12 col-sm-3 text-center border" style="padding:25px 25px 25px 25px; width: 90%" id="colService">
                <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'certificaciones-en-'.Str::slug($data['office'])) }}">
                    <div class="grow">
                        <img style="width: 50px; height: 50px" class="img-fluid lazyload" data-src="{{ asset('img/oficinas/ICONOS-09.webp') }}" alt="">
                    </div>
                    <p>Certificaciones</p>
                </a>
            </div>    
            <div class="col-12 col-sm-3 text-center border" style="padding:25px 25px 25px 25px; width: 90%" id="colService">
                <a style="text-decoration: none; color: #000000"  href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'acuerdos-en-'.Str::slug($data['office'])) }}">
                    <div class="grow">
                        <img style="width: 50px; height: 50px" class="img-fluid lazyload" data-src="{{ asset('img/oficinas/ICONOS-10.webp') }}" alt="">
                    </div>
                    <p>Acuerdos</p>
                </a>
            </div>
            <div class="col-12 col-sm-3 text-center border" style="padding:25px 25px 25px 25px; width: 90%" id="colService">
                <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'cartas-de-invitacion-en-'.Str::slug($data['office'])) }}">
                    <div class="grow">
                        <img style="width: 50px; height: 50px" class="img-fluid lazyload" data-src="{{ asset('img/oficinas/ICONOS-11.webp') }}" alt="">
                    </div>
                    <p>Cartas de Invitación</p>
                </a>
            </div>
        </div>
    
        <div class="row mt-1" style="padding-left:20%; padding-right:20%;">
            <div class="col-12 col-sm-3 text-center border" style="padding:25px 25px 25px 25px; width: 90px" id="colService">
                <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'revocatorias-en-'.Str::slug($data['office'])) }}">
                    <div class="grow">
                        <img style="width: 50px; height: 50px" class="img-fluid lazyload" data-src="{{ asset('img/oficinas/ICONOS-12.webp') }}" alt="">
                    </div>
                    <p>Revocatorias</p>
                </a>
            </div>
            <div class="col-12 col-sm-3 text-center border" style="padding:25px 25px 25px 25px; width: 90px" id="colService">
                <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'contratos-en-'.Str::slug($data['office'])) }}">
                    <div class="grow">
                        <img style="width: 50px; height: 50px" class="img-fluid lazyload" data-src="{{ asset('img/oficinas/ICONOS-13.webp') }}" alt="">
                    </div>
                    <p>Contratos</p>
                </a>
            </div>
            <div class="col-12 col-sm-3 text-center border" style="padding:25px 25px 25px 25px; width: 90px" id="colService">
                <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['office'])), 'testamentos-en-'.Str::slug($data['office'])) }}">
                    <div class="grow">
                        <img style="width: 50px; height: 50px" class="img-fluid lazyload" data-src="{{ asset('img/oficinas/ICONOS-14.webp') }}" alt="">
                    </div>
                    <p>Testamentos</p>
                </a>
            </div>
            <div class="col-12 col-sm-3 text-center border" style="padding:25px 25px 25px 25px; width: 90px" id="colService">
                <div class="grow">
                    {{-- <a style="text-decoration: none; color: #000000" href="{{ route('web.oficina.'.Str::lower(Str::studly($data['oficina'])), Str::slug($data['txtgrid']).'-en-'.Str::slug($data['oficina'])) }}""> --}}
                        <img style="width: 50px; height: 50px" class="img-fluid lazyload" data-src="{{ asset($data['imggrid']) }}" alt="">
                        <p>{{ $data['txtgrid'] }}</p>
                    {{-- </a> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 fifth-row text-center" style="padding-top: 4%; padding-bottom: 4%">
            <h3 style="font-weight: bold"><i>{{ Str::upper($data['title']) }}</i></h3>
            <p>{{ $data['subtitle'] }}!</p>
            <p class="text-muted" style="margin-left: 10%; margin-right: 10%">Apostille actas de nacimiento, actas de matrimonio, certificados, poderes, traducciones, diplomas, contratos, testamentos</p>
        </div>
        <div class="col-sm-6">
            <img @if($data['office'] == "New York") class="float-right lazyload" @endif id="imgrowapostille" style="width: {{$data['widthimgdown']}}; height: {{$data['heightimgdown']}}; padding-top: {{$data['paddingtop']}}" class="img-fluid lazyload" data-src="{{$data['imgdown']}}" alt="Notaria Latina en {{$data['office']}}">
        </div>
    </div>

    <section id="iniciarTramite" class="row quienes-somos text-white m-0">  
        <div class="col-12 col-md-6 pb-5 px-3 mx-auto">
            <div class="card-body text-center">  
              <h2 class="font-italic font-weight-bold">Solicitar Tramite</h2>      
              <small> Envíe el formulario y un asesor le contactará breve. </small>     
              <form method="POST" action="{{route('send.email.oficinas')}}">
                  @csrf
                <input type="hidden" id="interest" name="interest" value="Oficina {{$data['office']}}">
                <div class="form-group pt-4">
                  <input id="aaa" name="aaa" type="text" class="form-control" placeholder="Nombre y Apellido"  maxlength="40" minlength="2" autocomplete="off" required>
                </div>
                <div class="row">
                  <div class="col-sm-7">
                    <div class="row">
                      <div class="col-sm-7 mb-3">
                        <select id="pais" name="cod_pais" class="form-control" required>
                          <option value="">País de residencia</option>
                          <option value="+54">Argentina</option>
                          <option value="+591">Bolivia</option>
                          <option value="+57">Colombia</option>
                          <option value="+506">Costa Rica</option>
                          <option value="+593">Ecuador</option>
                          <option value="+503">El Salvador</option>
                          <option value="+34">España</option>
                          <option value="+1">Estados Unidos</option>
                          <option value="+502">Guatemala</option>
                          <option value="+504">Honduras</option>
                          <option value="+52">México</option>
                          <option value="+505">Nicaragua</option>
                          <option value="+507">Panamá</option>
                          <option value="+595">Paraguay</option>
                          <option value="+51">Perú</option>
                          <option value="+1 787">Puerto Rico</option>
                          <option value="+1 809">República Dominicana</option>
                          <option value="+598">Uruguay</option>
                          <option value="+58">Venezuela</option>                    
                        </select>                                        
                      </div>
                      <div class="col-sm-5">
                        <div class="form-group">
                          <input type="text" id="telf" class="form-control" readonly/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <input id="bbb" name="bbb" type="text" class="form-control" placeholder="Teléfono" maxlength="14" minlength="8" autocomplete="off" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input id="ddd" name="ddd" type="text" class="form-control" placeholder="Mensaje"  maxlength="100" autocomplete="off" required>
                </div>  
                <button class="btn btn-lg btn-warning btn-block" type="submit">INICIAR TRAMITE</button>
              </form>
            </div> 
        </div>
  </section>

  <div class="row">
    <iframe src="{{$data['urlmap']}}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>

  <div class="mt-5 checks">
      <h6 class="text-center" style="font-size:25px">Documentos que requieren una apostilla en {{ $data['office'] }}</h6>
      <p style="padding-left: 15%; font-size: 18px; margin-top: 15px">Documentos Personales</p>
      <div class="row" style="padding-left:15%; padding-right:15%;">
        <div class="col-12 col-sm-3">
            <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de nacimiento</p>
            <p style="font-size: 13px"><i class="fas fa-check"></i> Reporte Consular CRBA nacidos en el extranjero</p>
            <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de matrimonio</p>
            <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de defunción</p>
        </div>
        <div class="col-12 col-sm-3">
            <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de divorcio</p>
            <p style="font-size: 13px"><i class="fas fa-check"></i> Certificado de naturalización</p>
            <p style="font-size: 13px"><i class="fas fa-check"></i> Expediente de adopción</p>
            <p style="font-size: 13px"><i class="fas fa-check"></i> Copia de un pasaporte</p>
        </div>
        <div class="col-12 col-sm-3">
            <p style="font-size: 13px"><i class="fas fa-check"></i> Copia de licencia de conducir</p>
            <p style="font-size: 13px"><i class="fas fa-check"></i> Escrituras y testamentos</p>
            <p style="font-size: 13px"><i class="fas fa-check"></i> Declaraciones juradas de estado único</p>
            <p style="font-size: 13px"><i class="fas fa-check"></i> Título de coche/automóvil</p> 
        </div>
        <div class="col-12 col-sm-3">
            <p style="font-size: 13px"><i class="fas fa-check"></i> Autorizaciones de viaje</p>
            <p style="font-size: 13px"><i class="fas fa-check"></i> Poder notarial personal</p>
            <p style="font-size: 13px"><i class="fas fa-check"></i> Registros de la policía estatal</p>
            <p style="font-size: 13px"><i class="fas fa-check"></i> Registros de antecedentes del FBI</p> 
        </div>
      </div>

      <p style="padding-left: 15%; font-size: 18px; margin-top: 10px">Documentos Académicos</p>
      <div class="row" style="padding-left:15%; padding-right:15%;">
        <div class="col-12 col-sm-3">
            <p style="font-size: 13px"><i class="fas fa-check"></i> Diplomas Universitarios</p>
        </div>
        <div class="col-12 col-sm-3">
            <p style="font-size: 13px"><i class="fas fa-check"></i> Transcripciones universitarias</p>
        </div>
        <div class="col-12 col-sm-3">
            <p style="font-size: 13px"><i class="fas fa-check"></i> Diplomas de escuela secundaria</p>
        </div>
        <div class="col-12 col-sm-3">
            <p style="font-size: 13px"><i class="fas fa-check"></i> Transcripciones de escuela secundaria</p>
        </div>
      </div>

      <p style="padding-left: 15%; font-size: 18px; margin-top: 10px">Documentos Corporativos</p>
      <div class="row" style="padding-left:15%; padding-right:15%;">
        <div class="col-12 col-sm-3">
            <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de incorporación</p>
            <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de buena reputación</p>
            <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de origen</p>
        </div>
        <div class="col-12 col-sm-3">
            <p style="font-size: 13px"><i class="fas fa-check"></i> Marcas / Patentes</p>
            <p style="font-size: 13px"><i class="fas fa-check"></i> Poder comercial</p>
            <p style="font-size: 13px"><i class="fas fa-check"></i> Declaración jurada comercial</p>
        </div>
        <div class="col-12 col-sm-3">
            <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados FDA</p>
            <p style="font-size: 13px"><i class="fas fa-check"></i> Facturas</p>
            <p style="font-size: 13px"><i class="fas fa-check"></i> Departamento de hacienda [Formulario 6166]</p>
        </div>
        <div class="col-12 col-sm-3">
            <p style="font-size: 13px"><i class="fas fa-check"></i> Certificado de gobierno extranjero</p>
            <p style="font-size: 13px"><i class="fas fa-check"></i> Certificados de venta gratis</p>
            <p style="font-size: 13px"><i class="fas fa-check"></i> Órdenes de compra</p> 
        </div>
      </div>
  </div>
  @if (session('report'))
        @php
            echo "
                <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                <script>
                    swal('Hemos enviado tu información', 'Nos pondremos en contacto lo antes posible!', 'success');
                </script>
                ";    
        @endphp
    @endif

@endsection

@section('numberWpp', $data['telfWpp'])

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        window.addEventListener('load', (event) => {
            document.getElementById('prisection').style.backgroundImage = "url({{asset($data['imgup'])}})";
            document.getElementById('sectionthree').style.backgroundImage = "url('{{url('img/oficinas/BANNER-NEGRO.webp')}}')";
        });

        var pais = document.getElementById('pais');
        var telf = document.getElementById('telf');

        pais.onchange = function(e) {
        telf.value = this.value;
            if((this.value).trim() != '') {
                telf.disabled = false;
            } else {
                telf.disabled = true;
            }
        }

        $('#btnFirstIniciarTramite').click(function(e){				
		e.preventDefault();		//evitar el eventos del enlace normal
		var strAncla=$(this).attr('href'); //id del ancla
			$('body,html').stop(true,true).animate({				
				scrollTop: $(strAncla).offset().top
			},1000);
	    });
    </script>
@endsection