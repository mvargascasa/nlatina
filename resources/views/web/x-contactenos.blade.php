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
  @media screen and (max-width: 580px){
    #prisection{min-height:500px !important}
    #cap{min-height:500px !important}
  }
</style>
@endsection

@section('phoneNumberHidden', '+18007428602')
@section('phoneNumber', '800-742-8602')

@section('content')

<section class="position-relative">
  <img class="img-header" src="{{ asset('img/banner-contactenos.webp') }}" alt="Imagen de notario certificando un documento" style="height: 900px; width: 100%; object-fit: cover; object-position: center top;">
  <div class="position-absolute text-white text-center w-100" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
      <h1 class="title" style="font-weight: 500; font-size: 3rem">Visítenos, estamos <br> <span style="color: #FFBE32; font-weight: 700">cerca de usted</span></h1>
  </div>
</section>

<section id="prisection">
  <section class="container">
    <div class="row">
      <div class="col-sm-6 mb-4 p-5 d-flex align-items-center">
        <img class="img-fluid" src="{{ asset('img/oficinas/oficina-new-york-notaria-latina.jpg') }}" alt="Notaria Latina en New York">
      </div>
      <div class="col-sm-6 p-5">
        <h2 style="font-weight: 600">NEW YORK</h2>
        <a class="text-dark" href="https://g.page/notariapublicalatina" target="_blank">
          <div class="d-flex align-items-center">
            <p>
              <i class="fas fa-map-marker-alt"></i>
            </p>
            <p class="ml-2" style="font-size: smaller">67-03 Roosevelt Avenue <br> Woodside, NY 11377</p>
          </div>
        </a>
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

    <hr style="height: 5px; background-color: #122944">

    <div class="row">
      <div class="col-sm-6 mb-4 p-5 text-right">
        <h2 style="font-weight: 600">NEW JERSEY</h2>
        <a href="https://g.page/r/CVNRV-zNuJiZEAE" target="_blank" class="text-dark">
          <div class="d-flex align-items-center justify-content-end">
            <p class="mr-2" style="font-size: smaller">1146 East Jersey St <br> Elizabeth, NJ 07201</p>
            <p>
              <i class="fas fa-map-marker-alt"></i>
            </p>
          </div>
        </a>
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
      <div class="col-sm-6 p-5 d-flex align-items-center">
        <img class="img-fluid" src="{{ asset('img/oficinas/oficina-new-jersey-notaria-latina.jpg') }}" alt="Notaria Latina en New Jersey">
      </div>
    </div>

    <hr style="height: 5px; background-color: #122944">

    <div class="row">
      <div class="col-sm-6 mb-4 p-5 d-flex align-items-center">
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

