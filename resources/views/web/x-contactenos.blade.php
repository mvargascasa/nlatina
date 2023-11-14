@extends('layouts.web')
@section('header')
<title>Contáctanos en Queens New York - Notaria Latina</title> 
<meta name="description"        content="Notaría Pública en Queens New York, Ubicada en Roosevelt Avenue 67-03, Teléfono: +1(718)766-5041. Contactenos y le bridaremos Asesoría en Línea.">       
<meta name="keywords"           content="Notaría Pública y Apostilla en Queens New York, Notaría Pública y Apostilla near me, notaria latina, notario publico, notary public near me, notario cerca de mi, notario publico near me, notaría nueva york, notary public queens, notaria cerca de mi" />

<meta property="og:url"         content="{{route('web.contactenos')}}" />
<meta property="og:type"        content="website" />
<meta property="og:title"       content="Contacto para Servicios de Notaría y Apostillas en Queens New York - Notaria Latina" />
<meta property="og:description" content="Notaría Pública en Queens New York, Ubicada en Roosevelt Avenue 67-03, Teléfono: +1(718)766-5041. Contactenos y le bridaremos Asesoría en Línea." />
<meta property="og:image"       content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />

<meta name="csrf-token" content="{{ csrf_token() }}">

<script type="text/javascript">
  function callbackThen(response){
      // read HTTP status
      console.log(response.status);
      // read Promise object
      response.json().then(function(data){
        if(data.success && data.score > 0.5){
          console.log(data);
        } else {
          document.getElementById('formlead').addEventListener('submit', function (event) {
            event.preventDefault();
            console.log('recaptcha error. Stop form submission!');
          });
        }
      });
  }

  function callbackCatch(error){
      console.error('Error:', error)
  }
  </script>

<script defer src="{{ asset('js/navbar-style.js') }}"></script>

<script id="scriptrecaptcha"></script>
<script>
  setTimeout(() => {
     document.getElementById('scriptrecaptcha').src = "https://www.google.com/recaptcha/api.js?render=6LdI9cMeAAAAALgxUrh7mzlzFBlIV-F4Gzvbp2D8"; 
      //console.log('cargando script recaptcha...');
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
          //console.log('ejecutando codigo del recaptcha...');
  }, 3500);
</script>

<style>
  .navbar-img{filter: brightness(0) invert(1) !important;}
  @media screen and (max-width: 580px){
    #prisection{min-height:500px !important}
    #cap{min-height:500px !important}
    .img-header{height: 100vh !important;}
    .padding-0{padding-left: 0% !important; padding-right: 0% !important; padding-bottom: 0% !important}
    .first-mobile{order: 1 !important}
    .second-mobile{order: 2 !important}
    .title{font-size: 1.5rem !important}
  }
  input[type=number]::-webkit-inner-spin-button, 
  input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
    margin: 0; 
  }
    input[type=number] {
    -moz-appearance: textfield;
  }
  body{font-family: 'Montserrat'}
</style>
@endsection

@section('phoneNumberHidden', '+18007428602')
@section('phoneNumber', '800-742-8602')

@section('content')

<section class="position-relative">
  <img id="navbar-img" class="img-header" src="{{ asset('img/banner-contactenos.webp') }}" alt="Imagen de notario certificando un documento" style="height: 800px; width: 100%; object-fit: cover; object-position: center top;">
  <div class="position-absolute text-white text-center w-100" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
      <h1 class="title" style="font-weight: 500; font-size: 3rem">Visítenos, estamos <br> <span style="color: #FFBE32; font-weight: 700">cerca de usted</span></h1>
  </div>
</section>

<section id="prisection">
  <section class="container">
    <div class="row">
      <div class="col-sm-6 mb-4 p-5 d-flex align-items-center padding-0">
        <img class="img-fluid" src="{{ asset('img/oficinas/oficina-new-york-notaria-latina.jpg') }}" alt="Notaria Latina en New York">
      </div>
      <div class="col-sm-6 p-5">
        <h2 style="font-weight: 600">NEW YORK</h2>
        <a class="text-dark" href="https://maps.app.goo.gl/quwA24rdbkwoLJuk9" target="_blank">
          <div class="d-flex align-items-center">
            <p>
              <i class="fas fa-map-marker-alt"></i>
            </p>
            <p class="ml-2" style="font-size: smaller">67-03 Roosevelt Avenue <br> Woodside, NY 11377</p>
          </div>
        </a>
        <p class="ml-2" style="font-size: smaller"><a href="https://api.whatsapp.com/send?text=https://maps.app.goo.gl/quwA24rdbkwoLJuk9" target="_blank">Compartir ubicación</a></p>
        <a href="tel:+13479739888" class="text-dark">
          <div class="d-flex align-items-center">
            <p>
              <i class="fas fa-phone-alt"></i>
            </p>
            <p class="ml-2" style="font-size: smaller">347-973-9888</p>
          </div>
        </a>
        <a class="text-dark" href="https://api.whatsapp.com/send?phone=13479739888&text=Hola, quiero consultar por sus servicios de Notaria ⚖" target="_blank">
          <div class="d-flex align-items-center">
            <p>
              <i class="fab fa-whatsapp"></i>
            </p>
            <p class="ml-2" style="font-size: smaller">347-973-9888</p>
          </div>
        </a>
        <a href="https://g.page/notariapublicalatina" target="_blank">
          <img class="img-fluid" src="{{ asset('img/map-ny-contact.webp') }}" alt="">
        </a>
      </div>
    </div>

    <hr style="height: 5px; background-color: #2B384D">

    <div class="row">
      <div class="col-sm-6 mb-4 p-5 text-right second-mobile">
        <h2 style="font-weight: 600">NEW JERSEY</h2>
        <a href="https://g.page/r/CVNRV-zNuJiZEAE" target="_blank" class="text-dark">
          <div class="d-flex align-items-center justify-content-end">
            <p class="mr-2" style="font-size: smaller">1146 East Jersey St <br> Elizabeth, NJ 07201</p>
            <p>
              <i class="fas fa-map-marker-alt"></i>
            </p>
          </div>
        </a>
        <p class="ml-2" style="font-size: smaller"><a href="https://api.whatsapp.com/send?text=https://maps.app.goo.gl/2zP6Te4D98Gpd7Y8A" target="_blank">Compartir ubicación</a></p>
        <a href="tel:+19088009046" class="text-dark">
          <div class="d-flex align-items-center justify-content-end">
            <p class="mr-2" style="font-size: smaller">908-800-9046</p>
            <p>
              <i class="fas fa-phone-alt"></i>
            </p>
          </div>
        </a>
        <a href="https://api.whatsapp.com/send?phone=19088009046&text=Hola, quiero consultar por sus servicios de Notaria ⚖" target="_blank" class="text-dark">
          <div class="d-flex align-items-center justify-content-end">
            <p class="mr-2" style="font-size: smaller">908-800-9046</p>
            <p>
              <i class="fab fa-whatsapp"></i>
            </p>
          </div>
        </a>
        <a href="https://g.page/r/CVNRV-zNuJiZEAE" target="_blank">
          <img class="img-fluid" src="{{ asset('img/map-nj-contact.webp') }}" alt="">
        </a>
      </div>
      <div class="col-sm-6 p-5 d-flex align-items-center padding-0 first-mobile">
        <img class="img-fluid" src="{{ asset('img/oficinas/oficina-new-jersey-notaria-latina.jpg') }}" alt="Notaria Latina en New Jersey">
      </div>
    </div>

    <hr style="height: 5px; background-color: #2B384D">

    <div class="row">
      <div class="col-sm-6 mb-4 p-5 d-flex align-items-center padding-0">
        <img class="img-fluid" src="{{ asset('img/oficinas/oficina-florida-notaria-latina.jpg') }}" alt="Notaria Latina en Florida">
      </div>
      <div class="col-sm-6 mb-4 p-5">
        <h2 style="font-weight: 600">FLORIDA</h2>
        <a href="https://g.page/r/CeRrwPx_W2-xEAE" target="_blank" class="text-dark">
          <div class="d-flex align-items-center">
            <p>
              <i class="fas fa-map-marker-alt"></i>
            </p>
            <p class="ml-2" style="font-size: smaller">2104 N University Dr <br> Sunrise, FL 33322</p>
          </div>
        </a>
        <p class="ml-2" style="font-size: smaller"><a href="https://api.whatsapp.com/send?text=https://maps.app.goo.gl/jLuceKKNjKFq1gyV9" target="_blank">Compartir ubicación</a></p>
        <a href="tel:+13056003290" class="text-dark">
          <div class="d-flex align-items-center">
            <p>
              <i class="fas fa-phone-alt"></i>
            </p>
            <p class="ml-2" style="font-size: smaller">305-600-3290</p>
          </div>
        </a>
        <a href="https://api.whatsapp.com/send?phone=13056003290&text=Hola, quiero consultar por sus servicios de Notaria ⚖" target="_blank" class="text-dark">
          <div class="d-flex">
            <p>
              <i class="fab fa-whatsapp"></i>
            </p>
            <p class="ml-2" style="font-size: smaller">305-600-3290</p>
          </div>
        </a>
        <a href="https://g.page/r/CeRrwPx_W2-xEAE" target="_blank">
          <img class="img-fluid" src="{{ asset('img/map-fl-contact.webp') }}" alt="">
        </a>
      </div>
    </div>
  </section>
  
</section>

@php
    $url_name = Route::current()->getName();  
@endphp

<section style="background-color: #2B384D">
  <section class="container">
    <div class="d-flex align-items-center justify-content-center pt-5 pl-5 pr-5">
      <div style="height: 1px; background-color: #FFBE32; width: 40px" class="mr-2"></div>
      <div class="text-white">
        <p>
          <h2 style="font-size: smaller">CONTACTO</h2>
        </p>
      </div>
      <div class="ml-2" style="height: 1px; background-color: #FFBE32; width: 40px"></div>
    </div>
    <section>
      <div class="text-center">
        <span class="text-white" style="font-size: 1.7rem; line-height: 2rem !important">Proporcione sus <span style="font-weight: 600; color: #FFBE32;">datos</span> <br> y lo <span style="font-weight: 600; color: #FFBE32">contactaremos</span></span>
      </div>
      <div class="p-5 mt-5" style="border: .1rem solid #FFBE32; border-radius: 50px">
        <form action="{{ route('landing.thankpost') }}" method="POST" id="formlead">
          @csrf
          <input type="hidden" name="url_current" value="{{ $url_name }}">
          <div class="form-group text-white">
            <label for="fname">Nombre:</label>
            <input type="text" name="fname" style="width: 100%; color: #ffffff; background-color: #2B384D; border: none; border-bottom: 1px solid #ffffff" placeholder="Ej: Oscar" required>
          </div>
          <div class="form-group text-white">
            <label for="lastname">Apellidos:</label>
            <input type="text" name="lname" style="width: 100%; color: #ffffff; background-color: #2B384D; border: none; border-bottom: 1px solid #ffffff" placeholder="Ej: Rodriguez" required>
          </div>
          <div class="form-group text-white">
            <label for="country">País de residencia:</label>
            <select name="country" id="sel_country" style="width: 100%; color: #ffffff; background-color: #2B384D; border: none; border-bottom: 1px solid #ffffff; font-size: .9rem" required>
              <option value="">Seleccione</option>
              <option value="+54">Argentina</option>
              <option value="+56">Chile</option>
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
          <input type="hidden" name="cod" id="cod_country">
          <div class="form-group text-white">
            <label for="state">Estado</label>
            <select name="state" id="sel_state" style="width: 100%; color: #ffffff; background-color: #2B384D; border: none; border-bottom: 1px solid #ffffff; font-size: .9rem" required>
              <option value="">Seleccione</option>
            </select>
          </div>
          <div class="form-group text-white">
            <label for="phone">Teléfono</label>
            <input type="number" name="tlf" style="width: 100%; color: #ffffff; background-color: #2B384D; border: none; border-bottom: 1px solid #ffffff;" placeholder="Ingresar solo números" required>
          </div>
          <div class="form-group text-white">
            <label for="email">Email</label>
            <input type="email" name="email" style="width: 100%; color: #ffffff; background-color: #2B384D; border: none; border-bottom: 1px solid #ffffff;" placeholder="Ingresar un correo electrónico válido" required>
          </div>
          <div class="form-group text-white">
            <label for="service">Servicio:</label>
            <select name="service" style="width: 100%; color: #ffffff; background-color: #2B384D; border: none; border-bottom: 1px solid #ffffff; font-size: .9rem" required>
              <option value="">Seleccione</option>
              <option value="Poderes">Poderes</option>
              <option value="Apostillas">Apostillas</option>
              <option value="Traducciones">Traducciones</option>
              <option value="Affidavit">Affidavit</option>
              <option value="Acuerdos">Acuerdos</option>
              <option value="Autorizaciones de Viaje">Autorizaciones de Viaje</option>
              <option value="Cartas de Invitación">Cartas de Invitación</option>
              <option value="Certificaciones">Certificaciones</option>
              <option value="Contratos">Contratos</option>
              <option value="Revocatorias">Revocatorias</option>
              <option value="Testamentos">Testamentos</option>
            </select>
          </div>          
          <div class="form-group text-white">
            <label for="message">Mensaje</label>
            <textarea name="message" rows="4" placeholder="Ej: Necesito tramitar una carta poder..." style="width: 100%; color: #ffffff; background-color: #2B384D; border: none; border-bottom: 1px solid #ffffff" required></textarea>
          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-sm rounded-pill px-4 mt-3" style="background-color: #FFBE32">ENVIAR</button>
          </div>
        </form>
      </div>
    </section>
  </section>
</section>



{{-- <section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat; min-height: 550px">
  <div>
    <div id="cap" class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5);">

        <div class="col-12 text-white text-center">
          <h1 class="font-weight-bold heading-title" >Contáctenos</h1>
      </div>

    </div>
  </div>
</section> --}}

{{-- @php
    $detect = new \Detection\MobileDetect();
    $isMobile = FALSE;

    if($detect->isMobile()){
        $isMobile = TRUE;
    }
@endphp --}}


{{-- <div class="container">
    <div class="row py-4 justify-content-center">
      <h3 class="mt-1 mb-4 text-center">Contáctenos para servicios de Notaría Pública.</h3><br>

      @if ($isMobile)
        <div class="col-12 col-sm-4 col-md-4 px-4">

          <h5>Envíenos su información y nos pondremos en contacto en breve.</h5>

          @include('web.z-form')

        </div>
      @endif

        <div class="col-12 col-sm-8 col-md-8 pb-4">
          
          <h4 class="p-1 @if($isMobile) mt-3 @endif text-center">Visite nuestras oficinas.</h4>

            <div class="row py-4">
                <div class="col-12 col-sm-6">
                        <p><b>New York:</b>   
                          <a href="https://g.page/notariapublicalatina" target="_blank">
                            <span class="text-muted d-block">67-03 Roosevelt Avenue</span>
                            <span class="text-muted">Woodside, NY 11377</span>
                          </a> <br> 
                          <a href="tel:+13479739888" class="text-muted"><i class="fa fa-phone-square-alt" style="color: #EF5261"></i> 347-973-9888</a> <br>
                          <a href="https://api.whatsapp.com/send?phone=13479739888" class="text-muted" target="_blank"><i class="fab fa-whatsapp" style="color: #4CAF50"></i> 347-973-9888</a> <br>
                        </p>

                </div>
                <div class="col-12 col-sm-6">
                  <a target="_blank" href="https://g.page/notariapublicalatina"><img width="100%" height="100%" class="lazy img-fluid" data-src="{{ asset('img/map-ny-contact.webp') }}" alt="Notaria Latina en New York - Poderes, Apostillas, Traducciones"></a>
                </div>
            </div>         

            <div class="row py-4">
              <div class="col-12 col-sm-6">
                      <p><b>New Jersey:</b>   
                        <a href="https://g.page/r/CVNRV-zNuJiZEAE" target="_blank">
                          <span class="text-muted d-block"> 1146 East Jersey St  </span>
                          <span class="text-muted"> Elizabeth, NJ 07201</span>
                        </a> <br> 
                        <a href="tel:+19088009046" class="text-muted"><i class="fa fa-phone-square-alt" style="color: #EF5261"></i> 908-800-9046</a> <br>
                        <a href="https://api.whatsapp.com/send?phone=19088009046" class="text-muted" target="_blank"><i class="fab fa-whatsapp" style="color: #4CAF50"></i> 908-800-9046</a> <br> 
                      </p> 
              </div>
              <div class="col-12 col-sm-6">
                <a target="_blank" href="https://g.page/r/CVNRV-zNuJiZEAE"><img width="100%" height="100%" class="lazy img-fluid" data-src="{{ asset('img/map-nj-contact.webp') }}" alt="Notaria Latina en New Jersey - Poderes, Apostillas, Traducciones"></a>
              </div>
            </div>


            <div class="row py-4">
              <div class="col-12 col-sm-6">
                      <p><b>Florida:</b>   
                        <a href="https://g.page/r/CeRrwPx_W2-xEAE" target="_blank">
                          <span class="text-muted d-block"> 2104 N University Dr </span>
                          <span class="text-muted"> Sunrise, FL 33322</span>
                        </a> <br> 
                        <a href="tel:+13056003290" class="text-muted"><i class="fa fa-phone-square-alt" style="color: #EF5261"></i> 305-600-3290</a> <br> 
                        <a href="https://api.whatsapp.com/send?phone=13056003290" class="text-muted" target="_blank"><i class="fab fa-whatsapp" style="color: #4CAF50"></i> 305-600-3290</a> <br> 
                        <!-- <a href="tel:+13053948840" class="text-muted"><i class="fa fa-phone-square-alt"></i> 305-394-8840</a> <br> -->
                      </p>
              </div>
              <div class="col-12 col-sm-6">
                <a target="_blank" href="https://g.page/r/CeRrwPx_W2-xEAE"><img width="100%" height="100%" class="lazy img-fluid" data-src="{{ asset('img/map-fl-contact.webp') }}" alt="Notaria Latina en New Jersey - Poderes, Apostillas, Traducciones"></a>
              </div>
            </div>

            <h4 class="p-1 d-none">Whatsapp</h4>
            <a class="text-muted d-none" href="https://api.whatsapp.com/send?phone=13478460082" target="_blank"><i class="fab fa-whatsapp" style="color: #4CAF50"></i> 347 846 0082</a>
            
            <h4 class="p-1">Email</h4>
            <a href="mailto:info@notarialatina.com" class="text-muted"><i class="fas fa-envelope" style="color: #2196F3"></i> info@notarialatina.com</a>
              
        </div>

        @if (!$isMobile)
        <div class="col-12 col-sm-4 col-md-4 px-4">

            <h5>Envíenos su información y nos pondremos en contacto en breve.</h5>

              @include('web.z-form')

        </div>
        @endif

    </div>

</div>

</div> --}}
@endsection

@section('numberWpp', '13479739888')

@section('script')
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('img/fondo-contactenos.png')";
    });
    //document.addEventListener("DOMContentLoaded",function(){var e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var n=new IntersectionObserver(function(e,t){e.forEach(function(e){if(e.isIntersecting){var t=e.target;t.src=t.dataset.src,t.classList.remove("lazy"),n.unobserve(t)}})});e.forEach(function(e){n.observe(e)})}else{var t;function r(){t&&clearTimeout(t),t=setTimeout(function(){var n=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+n&&(e.src=e.dataset.src,e.classList.remove("lazy"))}),0==e.length&&(document.removeEventListener("scroll",r),window.removeEventListener("resize",r),window.removeEventListener("orientationChange",r))},20)}e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)}});
  </script>
@endsection

