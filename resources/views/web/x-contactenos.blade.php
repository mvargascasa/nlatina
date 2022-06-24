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



<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat; min-height: 550px">
  <div>
    <div id="cap" class="row align-items-center" style="min-height: 550px;background:rgba(2, 2, 2, 0.5);">

        <div class="col-12 text-white text-center">
          <h1 class="font-weight-bold heading-title" >Contáctenos</h1>
      </div>

    </div>
  </div>
</section>



<div class="container">
    <div class="row py-4">

        <div class="col-12 col-sm-8 col-md-8 pb-4">
          
          <h3>Contáctenos para servicios de Notaría Pública.</h3><br>
          <h4 class="p-1">Visite nuestras oficinas.</h4>

            <div class="row py-4">
                <div class="col-12 col-sm-6">
                        <p><b>New York:</b>   
                          <a href="https://g.page/notariapublicalatina" target="_blank">
                            <span class="text-muted d-block">67-03 Roosevelt Avenue</span>
                            <span class="text-muted">Woodside, NY 11377</span>
                          </a> <br> 
                          <a href="tel:+17187665041" class="text-muted"><i class="fa fa-phone-square-alt" style="color: #EF5261;"></i> 718-766-5041</a> <br> 
                          <a href="tel:+13479739888" class="text-muted"><i class="fa fa-phone-square-alt" style="color: #EF5261"></i> 347-973-9888</a> <br>
                          <a href="https://api.whatsapp.com/send?phone=13479739888" class="text-muted" target="_blank"><i class="fab fa-whatsapp" style="color: #4CAF50"></i> 347-973-9888</a> <br>
                        </p>

                </div>
                <div class="col-12 col-sm-6">
                  <a target="_blank" href="https://g.page/notariapublicalatina"><img width="100%" height="100%" class="lazy img-fluid" data-src="{{ asset('img/map-ny-contact.webp') }}" alt="Notaria Latina en New York - Poderes, Apostillas, Traducciones"></a>
                </div>
                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.711832710689!2d-73.90010968462246!3d40.746365979328054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25f030415024b%3A0x3b391bcaf4cd7c10!2sNotaria%20Latina%20-%20Queens%20New%20York!5e0!3m2!1ses!2sec!4v1620329311697!5m2!1ses!2sec" 
                class="col-12 col-sm-6" style="border:0;" allowfullscreen="" loading="lazy"></iframe>               --}}
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
              {{-- https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3026.415072742891!2d-74.21549248479062!3d40.664822548437684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24d541387e7ff%3A0x335c07b09362e483!2s1146%20E%20Jersey%20St%2C%20Elizabeth%2C%20NJ%2007201%2C%20EE.%20UU.!5e0!3m2!1ses!2sec!4v1627749319027!5m2!1ses!2sec --}}
              {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3026.4152619231436!2d-74.21548678459651!3d40.664818379336985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24dde7100d355%3A0x9998b8cdec575153!2sNotar%C3%ADa%20Latina%20en%20New%20Jersey!5e0!3m2!1ses-419!2sec!4v1650664174107!5m2!1ses-419!2sec" 
              class="col-12 col-sm-6" style="border:0;" allowfullscreen="" loading="lazy"></iframe>               --}}
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
              {{-- https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3581.4043926136424!2d-80.25914568500467!3d26.15095628346161!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d90638fe895e7b%3A0xaa63cebf0d7899!2s2104%20N%20University%20Dr%2C%20Sunrise%2C%20FL%2033322%2C%20EE.%20UU.!5e0!3m2!1ses!2sec!4v1620329582622!5m2!1ses!2sec --}}
              {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3581.4033736727556!2d-80.25873468497107!3d26.150989483461544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9072fab0cb6ff%3A0xb16f5b7ffcc06be4!2sNotar%C3%ADa%20P%C3%BAblica%20Latina%20en%20Florida!5e0!3m2!1ses-419!2sec!4v1650664300481!5m2!1ses-419!2sec" 
              class="col-12 col-sm-6" style="border:0;" allowfullscreen="" loading="lazy"></iframe>               --}}
              <div class="col-12 col-sm-6">
                <a target="_blank" href="https://g.page/r/CeRrwPx_W2-xEAE"><img width="100%" height="100%" class="lazy img-fluid" data-src="{{ asset('img/map-fl-contact.webp') }}" alt="Notaria Latina en New Jersey - Poderes, Apostillas, Traducciones"></a>
              </div>
            </div>

            <h4 class="p-1">Whatsapp</h4>
            <a class="text-muted d-block" href="https://api.whatsapp.com/send?phone=13478460082" target="_blank"><i class="fab fa-whatsapp"> 347 846 0082</i> </a>
            
            <h4 class="p-1">Email</h4>
            <a href="mailto:info@notarialatina.com" class="text-muted"><i class="fas fa-envelope" style="color: #2196F3"></i> info@notarialatina.com</a>
              
        </div>

        <div class="col-12 col-sm-4 col-md-4 px-4">

            <h4>Envíenos su información y nos pondremos en contacto en breve.</h4>

              @include('web.z-form')

        </div>

    </div>

</div>

</div>
@endsection

@section('numberWpp', '13479739888')

@section('script')
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('img/contactenos.webp')";
    });
    document.addEventListener("DOMContentLoaded",function(){var e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var n=new IntersectionObserver(function(e,t){e.forEach(function(e){if(e.isIntersecting){var t=e.target;t.src=t.dataset.src,t.classList.remove("lazy"),n.unobserve(t)}})});e.forEach(function(e){n.observe(e)})}else{var t;function r(){t&&clearTimeout(t),t=setTimeout(function(){var n=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+n&&(e.src=e.dataset.src,e.classList.remove("lazy"))}),0==e.length&&(document.removeEventListener("scroll",r),window.removeEventListener("resize",r),window.removeEventListener("orientationChange",r))},20)}e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)}});
  </script>
@endsection

