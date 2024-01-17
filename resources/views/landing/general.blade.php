<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  @if ($meta_description != null)
  <meta name="description" content="{{$meta_description}}">    
  @endif
  @if ($keywords != null)
  <meta name="keywords" content="{{ $keywords }}">
  @endif
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="robots" content="index,follow,snippet">

  <meta property="og:url" content="{{ Request::url() }}">
  <meta property="og:type" content="website">
  <meta property="og:title" content="@isset($title){{$title}}@else Notaria Latina en {{ $oficina }} - Apostillas, Poderes y Traducciones @endisset">
  <meta property="og:description" content="@isset($meta_description){{$meta_description}}@else Realizamos todo tipo de notarización de documentos en New Jersey como apostillas, poderes, traducciones de una manera rápida y segura. Contáctenos ahora! ✔ @endisset">
  <meta property="og:image" content="{{asset($imgup)}}">

  {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet"> --}}

  <title>@isset($title) {{ $title }} @else Notaria Latina en {{$oficina}} - Apostillas, Poderes y Traducciones @endisset</title>

  <script>
    var stylesheet = document.createElement('link');
    stylesheet.href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css";
    stylesheet.rel = 'stylesheet';
    setTimeout(function () {
        document.getElementsByTagName('head')[0].appendChild(stylesheet);
    }, 3000);
  </script>

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
    }, 3500);

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
    }, 4000);
</script>

    {{-- {!! htmlScriptTagJsApi([
      'callback_then' => 'callbackThen',
      'callback_catch' => 'callbackCatch'
    ]) !!} --}}

  @yield('header')

<?php
  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if(strpos($actual_link, 'localhost') === false){
?>

  <!-- Google Tag Manager -->
  <script>
    setTimeout(() => {
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':  
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-NXP3WCV');
    }, 3500);
  </script>
  <!-- End Google Tag Manager -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script id="script_analytics" async></script>
<script>
  setTimeout(() => {
    document.getElementById('script_analytics').src = 'https://www.googletagmanager.com/gtag/js?id=G-VJK9KRV3TL';
  }, 3500);
</script>
<script>
  setTimeout(() => {
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-VJK9KRV3TL');
  }, 3500);
</script>



<!-- Google Tag Manager -->
<script>
  setTimeout(() => {
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-KHSFW5X3');
      console.log('cargado script tag manager')
  }, 3500);
</script>
  <!-- End Google Tag Manager -->


@if($oficina == "New York")
  <!--NEW YORK-->
  <!-- Google tag (gtag.js) --> 
  <script id="analytics-new-york"></script>
  <script>
    setTimeout(() => {
      document.getElementById('analytics-new-york').src="https://www.googletagmanager.com/gtag/js?id=AW-702844945";
    }, 3000);
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-702844945');
  </script>

  {{-- <script id="gtag_ny"></script> 
  <script>
    setTimeout(() => {
      document.getElementById('gtag_ny').src="https://www.googletagmanager.com/gtag/js?id=AW-702844945";
      window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-702844945'); 
    }, 3000);
  </script> --}}
@endif

@if($oficina == "New Jersey")
  <!--NEW JERSEY-->
  <!-- Google tag (gtag.js) --> 
  <!-- Google tag (gtag.js) -->
  <script id="analytics-new-jersey"></script>
  <script>
    setTimeout(() => {
      document.getElementById('analytics-new-jersey').src="https://www.googletagmanager.com/gtag/js?id=AW-306069230";
    }, 3000);
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-306069230');
  </script>



  {{-- <script id="gtag_nj"></script> 
  <script>
    setTimeout(() => {
      document.getElementById('gtag_nj').src="https://www.googletagmanager.com/gtag/js?id=AW-306069230";
      window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-306069230');
      console.log('cargado script tag manager nj'); 
    }, 3000);
  </script> --}}
@endif

@if($oficina == "Florida")
  <!--FLORIDA-->
  <!-- Google tag (gtag.js) -->
  <!-- Google tag (gtag.js) -->
  <script id="analytics-florida"></script>
  <script>
    setTimeout(() => {
      document.getElementById('analytics-florida').src="https://www.googletagmanager.com/gtag/js?id=AW-306001515";
    }, 3000);
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-306001515');
  </script>

  {{-- <script id="gtag_fl"></script> 
  <script>
    setTimeout(() => {
      document.getElementById('gtag_fl').src="https://www.googletagmanager.com/gtag/js?id=AW-306001515";
      window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-306001515'); 
      console.log('cargado script tag manager fl')
    }, 3000);
  </script> --}}
@endif

<!--NEW YORK-->
@if ($tlfhidden == '13474281520') 
  <script>gtag('config', 'AW-702844945/Z8xoCIiZ98UYEJGgks8C', { 'phone_conversion_number': '3474281520' }); </script>
  <!-- Event snippet for IDG_NEWYORK_GENERAL_LLAMADA_MOBIL_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-702844945/9vvNCNCl98UYEJGgks8C', 'event_callback': callback }); return false; } </script>
  <!-- Event snippet for IDG_NEWYORK_GENERAL_WHATSAPP_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. -->
  <script> function gtag_report_conversion_wpp(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-702844945/1N_7CN3z9sUYEJGgks8C', 'event_callback': callback }); return false; } </script>
@endif

@if($tlfhidden == '13474281518')
  <script> gtag('config', 'AW-702844945/VSKTCJ_d9sUYEJGgks8C', { 'phone_conversion_number': '3474281518' }); </script>
  <!-- Event snippet for IDG_NEWYORK_APOSTILLA_LLAMADA_MOBIL_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-702844945/tf1JCIzi9sUYEJGgks8C', 'event_callback': callback }); return false; } </script>
  <!-- Event snippet for IDG_NEWYORK_APOSTILLA_WHATSAPP_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion_wpp(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-702844945/PIVnCM7l98UYEJGgks8C', 'event_callback': callback }); return false; } </script>
@endif

@if ($tlfhidden == "13474281517")
    <script> gtag('config', 'AW-702844945/-EO9COrp9sUYEJGgks8C', { 'phone_conversion_number': '3474281517' }); </script>
    <!-- Event snippet for IDG_NEWYORK_TRADUCCION_WHATSAPP_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
    <script> function gtag_report_conversion_wpp(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-702844945/DHAQCKGT68UYEJGgks8C', 'event_callback': callback }); return false; } </script>
    <!-- Event snippet for IDG_NEWYORK_TRADUCCION_LLAMADA_MOBIL_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
    <script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-702844945/BQ14CPrt9sUYEJGgks8C', 'event_callback': callback }); return false; } </script>
@endif

@if($tlfhidden == "13474281516")
  <script> gtag('config', 'AW-702844945/WpSgCPf66sUYEJGgks8C', { 'phone_conversion_number': '3474281516' }); </script>
  <!-- Event snippet for IDG_NEWYORK_PODERES_LLAMADA_MOBIL_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-702844945/JU-VCO386sUYEJGgks8C', 'event_callback': callback }); return false; } </script>
  <!-- Event snippet for IDG_NEWYORK_PODERES_WHATSAPP_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion_wpp(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-702844945/GnWsCIzT98UYEJGgks8C', 'event_callback': callback }); return false; } </script>
@endif

<!--NEW JERSEY-->
@if($tlfhidden == "19082249552")
  <script> gtag('config', 'AW-306069230/hJ7GCNmgpckYEO79-JEB', { 'phone_conversion_number': '9082249552' }); </script>
  <!-- Event snippet for IDG_NEWJERSEY_APOSTILLA_MOBIL_LLAMADA_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-306069230/9AEOCL7rmskYEO79-JEB', 'event_callback': callback }); return false; } </script>
  <!-- Event snippet for IDG_NEWJERSEY_APOSTILLA_WHATSAPP_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion_wpp(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-306069230/I6UfCObRpMkYEO79-JEB', 'event_callback': callback }); return false; } </script>
@endif

@if($tlfhidden == "19082249594")
  <script> setTimeout(() => { gtag('config', 'AW-306069230/VvbbCJu2pMkYEO79-JEB', { 'phone_conversion_number': '9082249594' }); }, 3200); </script>
  <!-- Event snippet for IDG_NEWJERSEY_GENERAL_MOBIL_LLAMADA_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-306069230/7LulCOzFmskYEO79-JEB', 'event_callback': callback }); return false; } </script>
  <!-- Event snippet for IDG_NEWJERSEY_GENERAL_WHATSAPP_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion_wpp(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-306069230/CYO5CNDzpMkYEO79-JEB', 'event_callback': callback }); return false; } </script>
@endif

@if($tlfhidden == "19082249259")
  <script> gtag('config', 'AW-306069230/Hz3ICPe-pckYEO79-JEB', { 'phone_conversion_number': '9082249259' });</script>
  <!-- Event snippet for IDG_NEWJERSEY_TRADUCCION_MOBIL_LLAMADA_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-306069230/6_lFCJCupckYEO79-JEB', 'event_callback': callback }); return false; } </script>
  <!-- Event snippet for IDG_NEWJERSEY_TRADUCCION_WHATSAPP_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion_wpp(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-306069230/xtIpCKDlpMkYEO79-JEB', 'event_callback': callback }); return false; } </script>
@endif

@if($tlfhidden == "19082249258")
  <script> gtag('config', 'AW-306069230/MMmWCJDJpMkYEO79-JEB', { 'phone_conversion_number': '9082249258'});</script>
  <!-- Event snippet for IDG_NEWJERSEY_PODERES_MOBIL_LLAMADA_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-306069230/AJsVCM_YmskYEO79-JEB', 'event_callback': callback }); return false; } </script>
  <!-- Event snippet for IDG_NEWJERSEY_PODERES_WHATSAPP_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion_wpp(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-306069230/Ft5PCLCGpckYEO79-JEB', 'event_callback': callback }); return false; } </script>
@endif

<!--FLORIDA-->
@if($tlfhidden == "13054229149")
  <script> gtag('config', 'AW-306001515/kod7CPX0pskYEOvs9JEB', { 'phone_conversion_number': '3054229149' }); </script>
  <!-- Event snippet for IDG_FLORIDA_GENERAL_MOBIL_LLAMADA_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-306001515/SbnDCOfppskYEOvs9JEB', 'event_callback': callback }); return false; } </script>
  <!-- Event snippet for IDG_FLORIDA_GENERAL_WHATSAPP_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion_wpp(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-306001515/Mbv3CITUnMkYEOvs9JEB', 'event_callback': callback }); return false; } </script>
@endif

@if($tlfhidden == "13053177819")
  <script> gtag('config', 'AW-306001515/uNguCLXDp8kYEOvs9JEB', { 'phone_conversion_number': '3053177819' }); </script>
  <!-- Event snippet for IDG_FLORIDA_TRADUCCION_MOBIL_LLAMADA_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-306001515/exusCM_ypskYEOvs9JEB', 'event_callback': callback }); return false; } </script>
  <!-- Event snippet for IDG_FLORIDA_TRADUCCION_WHATSAPP_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion_wpp(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-306001515/x6R9CI3UnMkYEOvs9JEB', 'event_callback': callback }); return false; } </script>
@endif

@if($tlfhidden == "13053177826")
  <script> gtag('config', 'AW-306001515/vydACJrhnMkYEOvs9JEB', { 'phone_conversion_number': '3053177826' }); </script>
  <!-- Event snippet for IDG_FLORIDA_PODERES_MOBIL_LLAMADA_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-306001515/Th2GCMLlpskYEOvs9JEB', 'event_callback': callback }); return false; } </script>
  <!-- Event snippet for IDG_FLORIDA_PODERES_WHATSAPP_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion_wpp(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-306001515/k8OdCIfUnMkYEOvs9JEB', 'event_callback': callback }); return false; } </script>
@endif

@if($tlfhidden == "13053177820")
  <script> gtag('config', 'AW-306001515/f6kTCLjqnMkYEOvs9JEB', { 'phone_conversion_number': '3053177820' }); </script>
  <!-- Event snippet for IDG_FLORIDA_APOSTILLA_MOBIL_LLAMADA_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-306001515/K_GtCNztpskYEOvs9JEB', 'event_callback': callback }); return false; } </script>
  <!-- Event snippet for IDG_FLORIDA_APOSTILLA_WHATSAPP_BOTON conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. --> 
  <script> function gtag_report_conversion_wpp(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-306001515/gZZPCIrUnMkYEOvs9JEB', 'event_callback': callback }); return false; } </script>
@endif

<?php } ?>
  <style>
    @font-face{
      font-family: 'Montserrat';
      src: url("{{ asset('fonts/MontserratFont.ttf') }}")
    }
    html, body {max-width: 100% !important;overflow-x: hidden !important; font-family: 'Montserrat'; scroll-behavior: smooth}
    .quienes-somos{      background: rgb(24,55,84);      background: radial-gradient(circle, rgba(24,55,84,1) 0%, rgba(26,29,34,1) 100%);    }
    .f-blue{      background-color: #122944;    }
    .navfoot{      background-color: #2B384D !important;      height: 70px;    }
    .hrw{      border: 1px solid white;      width: 100px;    }
    .hrb{      border: 1px solid #122944;      width: 100px;    }
    .bg-bordo{background: #522621; border: 0}
    /* QUITAR SPINNERS DE INPUT TYPE NUMBER */
    /* CHROME */
    input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none;margin: 0;}
    /* FIREFOX */
    input[type="number"] {-moz-appearance: textfield;}input[type="number"]:hover,input[type="number"]:focus {-moz-appearance: number-input;}
    /* OTHER */
    input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none;margin: 0;}
    .logo{width: 300px; height: 75px}
    @media screen and (max-width: 1000px){h1{font-size: 50px !important}}
    @media screen and (max-width: 800px){h1{font-size: 40px !important}.logo{width: 130px !important; height: 30px}.img-oficinas{width: 100% !important}.btn-phone{font-size: small !important}}
    @media screen and (max-width: 580px){.divpais{display: inline !important;}#divcodigoandtelefono{width: 100% !important;margin-top: 16px;margin-bottom: 16px;}#pais{width: 100% !important;}h1{font-size: 30px !important}.resize{width: 100% !important}.labelstate{margin-top: 20px !important}#iframemap{height: 400px !important}}
    #iconcall{bottom: 40px !important; right: 10px !important;}
    .grecaptcha-badge { visibility: hidden; }
    .card-reviews{box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;}
    .card-reviews:hover{
      box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
    }
  </style>
</head>
<body>

  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KHSFW5X3"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXP3WCV"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <header>
      <nav class="bg-transparent position-absolute w-100" style="z-index: 3">
        <section class="position-relative container pt-4">
          <div>
            <img class="logo lazy" data-src="{{asset('img/marca-notaria-latina.png')}}" alt="">
            <div class="float-right">
              <p class="text-white text-center" style="font-size: small; line-height: 0px">CONSULTAR TRAMITE</p>
              <a onclick="return gtag_report_conversion('tel:+{{$tlfhidden}}');" href="tel:+{{$tlfhidden}}" style="background-color: #FFB832; color: #2B384D; font-size: large; font-weight: 700; border-radius: 15px;" class="btn btn-phone"><i class="fas fa-phone-alt"></i> {{ $tlfshow }}</a>
            </div>
          </div>
        </section>
      </nav>
    </header>

    @php
        $consulates = DB::table('consulates')->select('slug')->get();
    @endphp

    <section>
        <div id="prisection" style="height: 800px; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url('{{asset($imgbanner)}}')">
          {{-- <img id="prisection" src="" style="max-height: 90vh;min-height: 40vh;  object-fit: cover; width: 100%; height: 100%;" alt=""> --}}
          <div style="width: 100%; height: 800px;" class="d-flex align-items-center justify-content-center position-relative">
            <div>
              <h1 class="text-white text-center"><span style="font-weight: 200">{{ strtoupper($header) }}</span> <br> <span style="font-size: 3.2rem">{{ strtoupper($oficina) }}</span></h1>
              <div class="row mt-4">
                <div class="col-sm-6 text-center"><i class="far fa-check-circle" style="color: #FFB832"></i> <span class="text-white">15 años de trayectoria</span></div>
                <div class="col-sm-6 text-center"><i class="far fa-check-circle" style="color: #FFB832"></i> <span class="text-white">Enviamos sus documentos</span></div>
                <div class="col-sm-6 text-center"><i class="far fa-check-circle" style="color: #FFB832"></i> <span class="text-white">+20 servicios</span></div>
                <div class="col-sm-6 text-center"><i class="far fa-check-circle" style="color: #FFB832"></i> <span class="text-white">Calidad y eficiencia</span></div>
              </div>
              <div class="mt-5 w-100 d-flex justify-content-center">
                <div class="text-center">
                  @foreach ($consulates as $consulate)
                    @if ($consulate->slug != "espana")
                      <img class="mx-1" width="25px" height="25px" src="{{asset('img/partners/'.str_replace("-", "", $consulate->slug).'.png')}}" alt="">
                    @endif
                  @endforeach
                </div>
              </div>
              <div class="w-100 d-flex justify-content-center">
                <a class="btn mt-4" href="#form" style="background-color: #FFB832; color: #2B384D; border-radius: 15px; font-weight: 700">CONSULTAR</a>
              </div>
            </div>
            <div class="position-absolute" style="bottom: 10px; right: 10px">
              <div class="d-flex align-items-center">
                <img width="120px" height="50px" class="lazy" data-src="{{ asset('img/national-notary-association.webp') }}" alt="">
                <img width="50px" height="60px" class="lazy" data-src="{{ asset('img/docverify-approved-enotary-small.webp') }}" alt="">
              </div>
            </div>
          </div>
        </div>
    </section>

    <section class="container">

      @if($service_aux == "Traduccion")
        <div class="d-flex align-items-center justify-content-center py-5">
          <div style="width: 75px; height: 5px; background-color: #FFB832"></div>
          <h2 style="color: #2B384D" class="px-3 text-center"><span style="font-weight: 300">TRADUCCIÓN DE</span> <span>DOCUMENTOS</span></h2>
          <div style="width: 75px; height: 5px; background-color: #FFB832"></div>
        </div>

        <section class="mb-5">
          <p class="text-justify" style="line-height: 35px">Son una transcripción de textos de un idioma a otro diferente, es así que pueden ser presentados frente a las entidades que soliciten los mismos. Estos documentos y traducciones se solicitan generalmente para gestionar trámites fuera del país de origen del documento y con un idioma diferente.</p>
          <section class="row mt-4 justify-content-center">
            <div class="col-sm-4 mb-3">
              <div class="my-4 p-3 h-100 d-flex align-items-center" style="border-bottom: 10px solid #FFB832; box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;">
                <ul style="font-size: small">
                  <li>Certificados académicos</li>
                  <li>Documentos legales</li>
                  <li>Certificados de nacimiento, matrimonio y defunción</li>
                  <li>Documentos de inmigración</li>
                </ul>
              </div>
            </div>
            <div class="col-sm-4 mb-3">
              <div class="my-4 p-3 h-100 d-flex align-items-center" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px; border-bottom: 10px solid #FFB832">
                <ul style="font-size: small">
                  <li>Certificados médicos</li>
                  <li>Documentos financieros</li>
                  <li>Licencias de conducir</li>
                  <li>Documentos empresariales</li>
                  <li>Documentos notariales</li>
                </ul>
              </div>
            </div>
          </section>
        </section>

        <section class="row justify-content-center my-5 pt-4">
          <a href="#form" class="btn font-weight-bold" style="background-color: #FFB832; color: #2B384D">INICIAR TRÁMITE</a>
        </section>
      @endif

      @if($service_aux == "Poderes")
        <div class="d-flex align-items-center justify-content-center py-5">
          <div style="width: 75px; height: 5px; background-color: #FFB832"></div>
          <h2 style="color: #2B384D" class="px-3 text-center"><span style="font-weight: 300">PODER</span> <span>NOTARIAL</span></h2>
          <div style="width: 75px; height: 5px; background-color: #FFB832"></div>
        </div>

        <section class="mb-5">
          <p class="text-justify" style="line-height: 35px">Es un documento legal que se utiliza para otorgar control total o parcial sobre sus activos a otra persona si usted no pudiera estar presente. Por lo tanto le permite realizar trámites a distancia siendo una solución para gestionar sus bienes, trámites bancarios y otras tareas importantes.</p>
          <section class="row mt-4 justify-content-center">
            <div class="col-sm-4 mb-3">
              <div class="my-4 p-3 h-100 d-flex align-items-center" style="border-bottom: 10px solid #FFB832; box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;">
                <ul style="font-size: small">
                  <li>Representación legal</li>
                  <li>Transacciones financieras</li>
                  <li>Venta de propiedades</li>
                  <li>Gestión de negocios</li>
                  <li>Asuntos inmobiliarios</li>
                  <li>Cuidado de menores</li>
                </ul>
              </div>
            </div>
            <div class="col-sm-4 mb-3">
              <div class="my-4 p-3 h-100 d-flex align-items-center" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px; border-bottom: 10px solid #FFB832">
                <ul style="font-size: small">
                  <li>Trámites legales</li>
                  <li>Viajes Internacionales</li>
                  <li>Recoger documentos importantes</li>
                  <li>Gestión de asuntos personales</li>
                </ul>
              </div>
            </div>
          </section>
        </section>

        <section class="row justify-content-center my-5 pt-4">
          <a href="#form" class="btn font-weight-bold" style="background-color: #FFB832; color: #2B384D">INICIAR TRÁMITE</a>
        </section>

        <div class="d-flex align-items-center justify-content-center py-5">
          <div style="width: 75px; height: 5px; background-color: #FFB832"></div>
          <h2 style="color: #2B384D" class="px-3 text-center"><span style="font-weight: 300">PODER</span> <span>EXPRESS</span></h2>
          <div style="width: 75px; height: 5px; background-color: #FFB832"></div>
        </div>

        <section>
          <p class="text-center" style="line-height: 35px">Este tipo de poder notarial generalmente implica la creación y otorgamiento de manera rápida y eficiente, a menudo para situaciones urgentes o transacciones que requieren una representación legal inmediata.</p>
        </section>

        <section class="row justify-content-center my-5 pt-4">
          <a href="#form" class="btn font-weight-bold" style="background-color: #FFB832; color: #2B384D">INICIAR TRÁMITE</a>
        </section>
      @endif

      @if($service_aux == "Apostilla")
        <div class="d-flex align-items-center justify-content-center py-5">
          <div style="width: 75px; height: 5px; background-color: #FFB832"></div>
          <h2 style="color: #2B384D" class="px-3 text-center"><span style="font-weight: 300">APOSTILLAR</span> <span>DOCUMENTOS</span></h2>
          <div style="width: 75px; height: 5px; background-color: #FFB832"></div>
        </div>

        <section class="mb-5">
          <p class="text-justify" style="line-height: 35px">Es la manera más simple de certificar la autenticidad de documentos públicos expedidos en otro país. Por lo tanto es un requisito indispensable para gestionar trámites internacionales. El documento que porte la apostilla tiene validez legal en cualquiera de los países miembros del Convenio de la Haya, es por eso que los únicos autorizados para validar esta apostilla son los notarios debidamente acreditados</p>
          <section class="row mt-4">
            <div class="col-sm-4 mb-3">
              <div class="my-4 p-3 h-100" style="border-bottom: 10px solid #FFB832; box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;">
                <h3 style="font-size: medium; font-weight: 400; font-size: small">Documentos Personales</h3>
                <ul style="font-size: small">
                  <li>Actas de nacimiento</li>
                  <li>Actas de divorcio</li>
                  <li>Certificados de matrimonio</li>
                  <li>Certificados de defunción</li>
                  <li>Testamentos</li>
                  <li>Otro</li>
                </ul>
              </div>
            </div>
            <div class="col-sm-4 mb-3">
              <div class="my-4 p-3 h-100" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px; border-bottom: 10px solid #FFB832">
                <h3 style="font-size: medium; font-weight: 400; font-size: small">Documentos Académicos</h3>
                <ul style="font-size: small">
                  <li>Diplomas</li>
                  <li>Título Universitario</li>
                  <li>Calificaciones Escolares</li>
                  <li>Transcripciones Detalladas</li>
                  <li>Otros</li>
                </ul>
              </div>
            </div>
            <div class="col-sm-4 mb-3">
              <div class="my-4 p-3 h-100" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px; border-bottom: 10px solid #FFB832">
                <h3 style="font-size: medium; font-weight: 400; font-size: small">Documentos Corporativos</h3>
                <ul style="font-size: small">
                  <li>Contratos</li>
                  <li>Certificados de buena reputación</li>
                  <li>Marcas/Patentes</li>
                  <li>Poderes</li>
                  <li>Acuerdos</li>
                  <li>Otros</li>
                </ul>
              </div>
            </div>
          </section>
        </section>

        <section class="row justify-content-center my-5 pt-4">
          <a href="#form" class="btn font-weight-bold" style="background-color: #FFB832; color: #2B384D">INICIAR TRÁMITE</a>
        </section>

        <div class="d-flex align-items-center justify-content-center py-5">
          <div style="width: 75px; height: 5px; background-color: #FFB832"></div>
          <h2 style="color: #2B384D" class="px-3 text-center"><span style="font-weight: 300">APOSTILLA</span> <span>EXPRESS</span></h2>
          <div style="width: 75px; height: 5px; background-color: #FFB832"></div>
        </div>

        <section>
          <p class="text-center" style="line-height: 35px">Este tipo de apostilla generalmente implica la creación y otorgamiento de manera rápida y eficiente, a menudo para situaciones urgentes o transacciones que requieren una representación legal inmediata</p>
        </section>

        <section class="row justify-content-center my-5 pt-4">
          <a href="#form" class="btn font-weight-bold" style="background-color: #FFB832; color: #2B384D">INICIAR TRÁMITE</a>
        </section>
      @endif

      @if($service_aux == "General")
      <div class="d-flex align-items-center justify-content-center py-5">
        <div style="width: 75px; height: 5px; background-color: #FFB832"></div>
        <h2 style="color: #2B384D" class="px-3 text-center"><span style="font-weight: 300">SERVICIOS</span> <span>DESTACADOS</span></h2>
        <div style="width: 75px; height: 5px; background-color: #FFB832"></div>
      </div>

      <section class="row mb-5 justify-content-center">
        <article class="col-sm-6 mb-5">
          <h2 class="text-center mb-4" style="color: #2B384D; font-weight: 700">APOSTILLAS</h2>
          <details open>
            <summary class="border shadow py-2 pl-3">Documentos que se pueden apostillar</summary>
            <div class="row">
              <div class="col-sm-6" style="height: 210px">
                <div class="my-4 p-3 h-100" style="border-bottom: 10px solid #FFB832; box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;">
                  <h3 style="font-size: medium; font-weight: 400; font-size: small">Documentos Personales</h3>
                  <ul style="font-size: small">
                    <li>Actas de nacimiento</li>
                    <li>Actas de divorcio</li>
                    <li>Certificados de matrimonio</li>
                    <li>Certificados de defunción</li>
                    <li>Testamentos</li>
                    <li>Otro</li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-6" style="height: 210px">
                <div class="my-4 p-3 h-100" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px; border-bottom: 10px solid #FFB832">
                  <h3 style="font-size: medium; font-weight: 400; font-size: small">Documentos Académicos</h3>
                  <ul style="font-size: small">
                    <li>Diplomas</li>
                    <li>Título Universitario</li>
                    <li>Calificaciones Escolares</li>
                    <li>Transcripciones Detalladas</li>
                    <li>Otros</li>
                  </ul>
                </div>
              </div>
            </div>
          </details>
        </article>
        <article class="col-sm-6 mb-5">
          <h2 class="text-center mb-4" style="color: #2B384D; font-weight: 700">CARTAS PODER</h2>
          <details open>
            <summary class="border shadow py-2 pl-3">Tipos de poderes que se puede hacer</summary>
            <div class="row">
              <div class="row">
                <div class="col-sm-6" style="height: 210px">
                  <div class="my-4 p-3 h-100" style="border-bottom: 10px solid #FFB832; box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;">
                    <h3 style="font-size: medium; font-weight: 400; font-size: small">Documentos Personales</h3>
                    <ul style="font-size: small">
                      <li>Representación legal</li>
                      <li>Transacciones financieras</li>
                      <li>Venta de propiedades</li>
                      <li>Gestión de negocios</li>
                      <li>Asuntos inmobiliarios</li>
                      <li>Cuidado de menores</li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6" style="height: 210px">
                  <div class="my-4 p-3 h-100" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px; border-bottom: 10px solid #FFB832">
                    <ul style="font-size: small">
                      <li>Trámites legales</li>
                      <li>Viajes internacionales</li>
                      <li>Recoger documentos importantes</li>
                      <li>Gestión de asuntos personales</li>
                      <li>Otros</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </details>
        </article>
        <article class="col-sm-6 mb-5">
          <h2 class="text-center mb-4" style="color: #2B384D; font-weight: 700">TRADUCCIONES</h2>
          <details open>
            <summary class="border shadow py-2 pl-3">Documentos que se pueden traducir</summary>
            <div class="row">
              <div class="col-sm-6" style="height: 210px">
                <div class="my-4 p-3 h-100" style="border-bottom: 10px solid #FFB832; box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;">
                  <ul style="font-size: small">
                    <li>Certificados académicos</li>
                    <li>Documentos legales</li>
                    <li>Certificados de nacimiento, matrimonio y defunción</li>
                    <li>Documentos de inmigración</li>
                    <li>Certifcados médicos</li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-6" style="height: 210px">
                <div class="my-4 p-3 h-100" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px; border-bottom: 10px solid #FFB832">
                  <ul style="font-size: small">
                    <li>Documentos financieros</li>
                    <li>Licencias de conducir</li>
                    <li>Documentos empresariales</li>
                    <li>Documentos notariales</li>
                    <li>Otros</li>
                  </ul>
                </div>
              </div>
            </div>
          </details>
        </article>
        @if($oficina == "New Jersey" || $oficina == "Florida")
          <article class="col-sm-6 mb-5">
            <h2 class="text-center mb-4" style="color: #2B384D; font-weight: 700">MATRIMONIOS</h2>
            <details open>
              <summary class="border shadow py-2 pl-3">Ceremonias matrimoniales</summary>
              <div class="row">
                <div class="col-sm-6" style="height: 210px">
                  <div class="my-4 p-3 h-100" style="border-bottom: 10px solid #FFB832; box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;">
                    <ul style="font-size: small">
                      <li>Licencias matrimoniales</li>
                      <li>Ceremonias en nuestras instalaciones</li>
                      <li>Ceremonias a domicilio</li>
                      <li>Certificados matrimoniales</li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6" style="height: 210px">
                  <div class="my-4 p-3 h-100" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px; border-bottom: 10px solid #FFB832">
                    <ul style="font-size: small">
                      <li>Documentos para matrimonios fuera de Estados Unidos.</li>
                      <li>Título Universitario</li>
                      <li>Matrimonios para residentes</li>
                      <li>Matrimonios para turistas</li>
                    </ul>
                  </div>
                </div>
              </div>
            </details>
          </article>
        @endif
      </section>

      @endif

    </section>

    <section>
      <section class="row" style="background-color: #2B384D">
        <div class="col-sm-12 col-md-6 text-center">
          <img id="second-image" width="100%" height="100%" class="img-fluid lazy" alt="notaria en newyork, newjersey y florida">
        </div>
        <div class="col-sm-12 col-md-4 d-flex align-items-center p-5">
          <div>
            <div class="d-flex align-items-center">
              <h2 style="font-size: .8rem; font-weight: 400; " class="text-white mr-3 mt-1">¿POR QUÉ ELEGIRNOS?</h2>
              <div style="background-color: #FFB832; width: 80px; height: 2px"></div>
            </div>
            <div>
              <p class="text-white" style="font-size: 2rem">¿Qué nos hace <br><span style="color: #FFB832; font-weight: 700">diferentes?</span></p>
              <p class="text-white">Contamos con <span style="font-weight: 500">más de 10 años de trayectoria</span> en el campo notarial, nuestro personal profesional y capacitado le brindará un servicio integral, rápido y eficaz</p>
              <p class="text-white">Nuestra notaría está avalada por National Notary Association y Approved Electronic Notary</p>
              <div class="d-flex">
                <img id="imgdoc" class="lazy mx-4" data-src="{{asset('img/docverify-approved-enotary-small.webp')}}" width="60" height="80" alt="">
                <img id="imgnna" class="lazy mx-4" data-src="{{asset('img/national-notary-association.webp')}}" width="190" height="80" alt="">
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>
    
    @isset($reviews)
    <section class="container">
      <div class="d-flex align-items-center justify-content-center pt-5">
        <div style="width: 75px; height: 2px; background-color: #FFB832"></div>
        <h2 style="color: #2B384D" class="px-3"><span style="font-weight: 500; font-size: large">TESTIMONIOS</span></h2>
        <div style="width: 75px; height: 2px; background-color: #FFB832"></div>
      </div>
      <h3 class="text-center mt-3" style="color: #2B384D"><span style="font-weight: 300">CLIENTES</span> <span style="font-weight: 600">SATISFECHOS</span></h3>
      <section class="row justify-content-center mt-5">
          <section>
              <div class="row justify-content-center">
                @foreach ($reviews as $review)
                  <div class="col-sm-4 d-flex justify-content-center mb-3">
                    <div class="card card-reviews" style="width: 18rem; height: 100%">
                      <div class="card-body text-center">
                        <h5 class="card-title">{{ $review['name'] }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted d-flex justify-content-center">
                          @for ($i = 0; $i < $review['stars']; $i++)
                            <img width="15" height="15" data-src="{{ asset('img/estrella.webp') }}" class="lazy img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="⭐">
                          @endfor
                        </h6>
                        <p class="card-text">
                          <i>
                            "{{ $review['message']}}"
                          </i>
                        </p>
                      </div>
                      <div class="card-footer bg-white">
                        <a class="text-dark" target="_blank" href="{{ $review['link']}}" class="card-link">Ver comentario</a>
                      </div>
                    </div>
                  </div>
                @endforeach
                <div class="mt-5 mb-5">
                  <a target="_blank" href="{{ $more_reviews }}" style="color: #192939;" class="btn btn-warning"><b style="font-weight: 500; font-size: 17px">Ver más reseñas</b> <i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
              </div>
          </section>
        </section>
      </section>
    @endisset

    <section class="container">
      <section class="row">
        <article class="col-sm-6">
          <article class="h-100">
            <iframe id="iframemap" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </article>
        </article>
        <article class="col-sm-6" id="form">
          <article class="quienes-somos">
            <div class="card-body">
              <div class="text-center">
                <h2 class="font-weight-bold"><span class="text-white">Solicitar</span> <span style="color: #FFB832">Tramite</span></h2>      
                <small class="text-center text-white"> Envíe el formulario y un asesor le contactará breve. </small>     
              </div>
              <form method="POST" action="{{route('landing.thankpostnj')}}" id="formlead">
                  @csrf
                <input type="hidden" id="interest" name="interest" value="Landing {{$oficina}}">
                <input type="hidden" id="service_aux" name="service_aux" value="{{$service_aux}} - {{$oficina}}">
                <div class="row">
                  <div class="col-sm-6 col-6" style="margin: 0px !important">
                    <div class="form-group pt-4">
                      <input id="aaa" name="aaa" type="text" class="form-control" style="border-radius: 10px" placeholder="Nombre"  maxlength="40" minlength="2" autocomplete="off" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-6" style="margin: 0px !important">
                    <div class="form-group pt-4">
                      <input id="lastname" name="lastname" type="text" class="form-control" style="border-radius: 10px" placeholder="Apellido"  maxlength="40" minlength="2" autocomplete="off" required>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="row">
                    <div class="col-sm-6 mb-3">
                      <select id="pais" name="pais" class="form-control w-100" style="border-radius: 10px" required>
                        <option value="">País de residencia</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Chile">Chile</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="España">España</option>
                        <option value="Estados Unidos" selected>Estados Unidos</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Honduras">Honduras</option>
                        <option value="México">México</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Panamá">Panamá</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Perú">Perú</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="República Dominicana">República Dominicana</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Venezuela">Venezuela</option>                    
                      </select> 
                    </div>
                    <div class="col-sm-6 mb-3">
                      <select name="state" id="sel_state" class="form-control w-100" style="border-radius: 10px">
                        <option value="">Estado/Departamento</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6 mb-3">
                      <div class="d-flex w-100">
                        <div style="width: 35%">
                          <input type="text" id="telf" name="codpais" class="form-control bg-white" style="border-radius: 10px 0px 0px 10px" readonly/>
                        </div>
                        <div style="width: 65%">
                          <input id="bbb" name="bbb" type="number" class="form-control" style="border-radius: 0px 10px 10px 0px" placeholder="Teléfono" maxlength="14" minlength="8" autocomplete="off" required> 
                        </div>
                      </div>
                    </div>
                    @if($service_aux == "General")
                    <div class="col-sm-6">
                      <div class="form-group">
                        <select name="service" id="service" class="form-control" style="border-radius: 10px" required>
                          <option value="">Trámite a realizar</option>
                          <option value="Apostilla">Apostilla</option>
                          <option value="Poder Notariado">Poder Notariado</option>
                          <option value="Traduccion">Traduccion</option>
                          <option value="Affidavit">Affidavit</option>
                          <option value="Acuerdos">Acuerdos</option>
                          <option value="Autorización de Viaje">Autorización de Viaje</option>
                          <option value="Cartas de Invitación">Cartas de Invitación</option>
                          <option value="Certificaciones">Certificaciones</option>
                          <option value="Contratos">Contratos</option>
                          <option value="Revocatorias">Revocatorias</option>
                          <option value="Testamentos">Testamentos</option>
                          <option value="Otro">Otro</option>
                        </select>
                      </div>
                    </div>
                    @else
                        <input type="hidden" name="service" value="{{$service_aux}}">
                    @endif
                    <div class="@if($service_aux != "General") col-sm-6 @else col-sm-12 @endif">
                      <div class="form-group">
                        <input type="email" name="email" class="form-control" style="border-radius: 10px" placeholder="Correo electrónico">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input id="ddd" name="ddd" type="text" class="form-control" style="border-radius: 10px" placeholder="Mensaje: Ejemplo 'Necesito tramitar una carta poder...'" autocomplete="off" required>
                      </div>
                    </div>
                  </div>
                </div>
                <input type="hidden" name="aux" style="font-size: 10px" placeholder="Si puede ver este campo, por favor ignórelo" class="form-control" readonly>
                <input type="hidden" name="url" value="{{Request::segment(2)}}" class="form-control" readonly>
  
                <div class="d-flex align-items-start mb-3 text-white">
                  <input type="checkbox" name="accepted" id="accepted" class="mr-2 mt-1">
                  <label for="accepted" style="font-size: small; font-weight: 500">Deseo ser contactado y entiendo como van a ser manipulados mis datos según los <a href="{{ route('web.terminos') }}" target="_blank">Términos y Condiciones</a></label>
                </div>
                <div class="d-flex justify-content-center">
                  <button class="btn btn-lg btn-warning shadow btnsubmit font-weight-bold" style="border-radius: 10px" type="submit">INICIAR TRAMITE</button>
                </div>
              </form>
            </div> 
          </article>
        </article>
      </section>
    </section>

    <section class="container">
      <div class="d-flex align-items-center justify-content-center pt-5 pb-5">
        <div style="width: 75px; height: 3px; background-color: #FFB832" class="mr-1"></div>
        <h2 class="text-center mt-2" style="color: #2B384D;"><span style="font-weight: 300">NUESTRA</span> <span style="font-weight: 600">OFICINA</span></h2>
        <div style="width: 75px; height: 3px; background-color: #FFB832" class="ml-1"></div>
      </div>
      <section class="row">
        <div class="col-sm-7">
          <img style="object-fit: cover" width="100%" height="100%" class="lazy" data-src="{{ asset($imgoffice1) }}" alt="">
          {{-- <div style="height: 600px; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url('{{ asset('img/notaria-en-new-jersey.jpg') }}');"></div> --}}
        </div>
        <div class="col-sm-5">
          {{-- <div class="mb-4" style="height:288px; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url('{{ asset('img/notaria-en-new-jersey.jpg') }}');"></div>
          <div class="mt-4" style="height:288px; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url('{{ asset('img/notaria-en-new-jersey.jpg') }}');"></div> --}}
          <img style="object-fit: cover" height="auto" class="img-fluid lazy mb-4 img-oficinas" data-src="{{ asset($imgoffice2) }}" alt="">
          <img style="object-fit: cover" height="auto" class="lazy img-fluid img-oficinas" data-src="{{ asset($imgoffice3) }}" alt="">
        </div>
      </section>
    </section>

{{-- 
<header>
  <nav class="navbar navbar-dark navfoot">
      <img src="{{asset('img/marca-notaria-latina.png')}}" width="140" height="30" alt="@isset($title){{$title}} @else Notaria Latina en {{ $oficina }} - Apostillas, Poderes y Traducciones @endisset">
      <div class="d-flex justify-content-end pr-3">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active ">
                <a class="nav-link" onclick="return gtag_report_conversion('tel:+{{$tlfhidden}}');" href="tel:+{{$tlfhidden??'19082249594'}}" > <small>{{$oficina}}</small> <br> {{$tlfshow}} </a>
            </li>
        </ul>
    </div>
  </nav>
</header> --}}


{{-- <section class="card text-white" style="border-radius:0;border:0" >
  <img id="prisection" src="" class="card-img" alt="@isset($title) {{ $title }} @else Notaria Latina en {{ $oficina }} - Apostillas, Poderes, Traducciones @endisset" style="max-height: 90vh;min-height: 40vh;  object-fit: cover; width: 100%; height: 100%">
  <div class="card-img-overlay my-auto d-flex align-items-center justify-content-center" style="background:rgba(2, 2, 2, 0.5)">
    <div class="text-center d-md-block">
      <div class="font-italic"><h1 style="font-size: 60px; font-weight: 600">{!!$header !!}</h1></div>
    </div>
  </div>
</section> --}}

{{-- <section class="row quienes-somos text-white p-4 align-middle">
  <div class="col-12 text-center align-middle py-4">
    <a onclick="return gtag_report_conversion('tel:+{{$tlfhidden}}');" href="tel:+{{$tlfhidden??'19082249594'}}" class="btn btn-lg btn-warning" >LLAMAR: <b>{{$tlfshow??'NJ (908) 224-9594'}}</b> </a>
  </div>
</section> --}}

{{-- @if ($landing == "Poderes")
  <section class="container mt-5">
    <div class="row">
      <div class="col-sm-6 col-md-4 mb-2">
        <div class="card" style="width: 100%; height: 100%; background-color:rgb(247, 247, 247)">
          <div class="card-body text-center" style="color: rgb(102, 102, 102)">
            <h2 class="card-title" style="font-size: 16px"><b>TIPOS DE CARTA PODER</b></h2>
            <p class="card-text">
              Realizamos todo tipo de Poder Especial o Poder General Apostillados
              para toda Latinoamérica
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 mb-2">
        <div class="card" style="width: 100%; height: 100%; background-color:rgb(247, 247, 247)">
          <div class="card-body" style="color: rgb(102, 102, 102)">
            <h2 class="card-title text-center" style="font-size: 16px"><b>SOLICITE UN PODER PARA:</b></h2>
            <p class="card-text">
              <ul>
                <li>Gestionar sus bienes, trámites bancarios</li>
                <li>Carta poder para viaje de menor</li>
                <li>Carta poder para compra o venta de propiedades</li>
                <li>Carta poder para solicitar créditos</li>
                <li>Carta poder para gestión de pasaporte</li>
                <li>Carta poder para pleitos y cobranzas</li>
              </ul>
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 mb-2">
        <div class="card" style="width: 100%; height: 100%; background-color:rgb(247, 247, 247)">
          <div class="card-body text-center" style="color: rgb(102, 102, 102)">
            <h2 class="card-title" style="font-size: 16px"><b>¿DONDE HACER UNA CARTA PODER EN <p style="text-transform: uppercase">{{ $oficina }}?</p></b></h2>
            <p class="card-text">
              Llámenos y agende una cita en nuestras oficinas ubicadas en {{ $oficina }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif --}}
  
{{-- <section class="row justify-content-md-center py-4">
@if($service=='General')
    <div class="col-12 text-center py-4">
        <h2 class="font-italic font-weight-bold">Nuestros Servicios en {{ $oficina }}</h2>
        <hr class="hrb">
      </div>
  
  
    <div class="col lead col-12 col-md-4 col-lg-3 col-xl-3 px-4">
  
      <h2><span class="lead font-weight-bold ">Apostillas:</span></h2>
      <ul>
        <li>Diplomas</li>
        <li>Certificados de nacimiento.</li>
        <li>Poderes</li>
        <li>Contratos.</li>
        <li>Testamentos.</li>
    </ul>
    </div>
  
    <div class="col lead col-12 col-md-4 col-lg-3 col-xl-3 px-4">
      <h2><span class="lead font-weight-bold ">Poderes:</span></h2>
     <ul>
      <li>Para compra/venta.</li>
      <li>Administración de Propiedades.</li>
      <li>Inversiones de Dinero.</li>
      <li>Reclamos legales.</li>
      <li>Procedimientos en su nombre.</li>
    </ul>
    </div>
  
    <div class="col lead col-12 col-md-4 col-lg-3 col-xl-3 px-4">
      <h2><span class="lead font-weight-bold ">Traducciones:</span></h2>
     <ul>
      <li>Certificados de nacimiento.</li>
      <li>Diplomas.</li>
      <li>Certificados de matrimonio.</li>
      <li>Documentos de divorcio.</li>
      <li>Certificados de defunción.</li>
    </ul>
    </div>
  @elseif($landing != "Poderes")
    <h4 class="text-center py-4 px-4">{!!$service!!}</h4>
  @endif
  </section> --}}


{{-- <section class="row quienes-somos text-white  m-0">
  <div class="card col-12 p-0" style="border-radius:0;border:0" >
    <img src="{{asset($imgdown)}}" class="card-img" style="height: 100%;object-fit: cover;" alt="@isset($title){{$title}}@else Notaria Latina en {{$oficina}} - Apostillas, Poderes, Traducciones @endisset" >
  </div>
</section> --}}

{{-- <section class="row ">
    <div class="col-12 text-center pt-4">  </div>
  <div class="col-12 col-md-6 text-center px-4 px-5">
    <h4 class="font-weight-bold">Dirección</h4>
    <p class="lead"> <a style="color:black" href="{{$dirlink}}" target="_blank"> {!!$dirtext!!} </a> </p>
    <h4 class="font-weight-bold">Telefonos</h4>
    <p class="lead"><a style="color:black" href="tel:+{{$tlfhidden??'19082249594'}}" target="_blank"> {{$tlfshow??'NJ (908) 224-9594'}} </a> </p>
    <h4 class="font-weight-bold">Email</h4>
    <p class="lead">info@notarialatina.com</p>
  </div>
  <div class="col-12 col-md-6  text-center pb-4 ">
    <a href="{{$dirlink}}" target="_blank">
      <img id="dirmap" width="350vw" height="280vh" src="" alt="@isset($title){{$title}} @else Notaria Latina en {{$oficina}} - Apostillas, Poderes y Traducciones @endisset">
    </a>
  </div>
</section> --}}


{{-- <section class="row quienes-somos text-white m-0">  
      <div class="col-12 col-sm-12 col-md-12 col-lg-6 pb-5 px-3 mx-auto">
          <div class="card-body">
            <div class="text-center">
              <h2 class="font-italic font-weight-bold">Solicitar Tramite</h2>      
              <small class="text-center"> Envíe el formulario y un asesor le contactará breve. </small>     
            </div>
            <form method="POST" action="{{route('landing.thankpostnj')}}" id="formlead">
                @csrf
              <input type="hidden" id="interest" name="interest" value="Landing {{$oficina}}">
              <input type="hidden" id="service_aux" name="service_aux" value="{{$service_aux}} - {{$oficina}}">
              <div class="form-group pt-4">
                <label for="aaa">Nombre y Apellido</label>
                <input id="aaa" name="aaa" type="text" class="form-control rounded-0" placeholder="Nombre y Apellido"  maxlength="40" minlength="2" autocomplete="off" required>
              </div>            
              <div class="divpais form-group d-flex">
                <div class="d-flex w-100 divpais">
                  <div class="mr-1 w-50 resize">
                    <label for="pais">País</label>
                    <select id="pais" name="pais" class="form-control rounded-0 w-100" required>
                      <option value="">País de residencia</option>
                      <option value="Argentina">Argentina</option>
                      <option value="Bolivia">Bolivia</option>
                      <option value="Chile">Chile</option>
                      <option value="Colombia">Colombia</option>
                      <option value="Costa Rica">Costa Rica</option>
                      <option value="Ecuador">Ecuador</option>
                      <option value="El Salvador">El Salvador</option>
                      <option value="España">España</option>
                      <option value="Estados Unidos" selected>Estados Unidos</option>
                      <option value="Guatemala">Guatemala</option>
                      <option value="Honduras">Honduras</option>
                      <option value="México">México</option>
                      <option value="Nicaragua">Nicaragua</option>
                      <option value="Panamá">Panamá</option>
                      <option value="Paraguay">Paraguay</option>
                      <option value="Perú">Perú</option>
                      <option value="Puerto Rico">Puerto Rico</option>
                      <option value="República Dominicana">República Dominicana</option>
                      <option value="Uruguay">Uruguay</option>
                      <option value="Venezuela">Venezuela</option>                    
                    </select> 
                  </div>
                  <div class="mr-1 w-50 resize">
                    <label for="sel_state" class="labelstate">Estado</label>
                    <select name="state" id="sel_state" class="form-control rounded-0 w-100">
                      <option value="">Estado/Departamento</option>
                    </select>
                  </div>
                </div>
                <div id="divcodigoandtelefono" class="d-flex w-100">
                  <div style="width: 35%" class="mr-1">
                    <label for="telf" class="text-left">Código</label>
                    <input type="text" id="telf" name="codpais" class="form-control rounded-0 bg-white" style="border-radius: 5px 0px 0px 5px;" readonly/>
                  </div>
                  <div style="width: 65%">
                    <label for="bbb" style="text-align: left !important">Teléfono</label>
                    <input id="bbb" name="bbb" type="number" class="form-control rounded-0" placeholder="Teléfono" maxlength="14" minlength="8" autocomplete="off" style="border-radius: 0px 5px 5px 0px" required> 
                  </div>
                </div>
              </div>
              @if($service_aux == "General")
              <div class="form-group">
                <label for="service">Servicio</label>
                <select name="service" id="service" class="form-control rounded-0" required>
                  <option value="">Seleccione el trámite a realizar</option>
                  <option value="Apostilla">Apostilla</option>
                  <option value="Poder Notariado">Poder Notariado</option>
                  <option value="Traduccion">Traduccion</option>
                  <option value="Affidavit">Affidavit</option>
                  <option value="Acuerdos">Acuerdos</option>
                  <option value="Autorización de Viaje">Autorización de Viaje</option>
                  <option value="Cartas de Invitación">Cartas de Invitación</option>
                  <option value="Certificaciones">Certificaciones</option>
                  <option value="Contratos">Contratos</option>
                  <option value="Revocatorias">Revocatorias</option>
                  <option value="Testamentos">Testamentos</option>
                  <option value="Otro">Otro</option>
                </select>
              </div>
              @else
                <input type="hidden" name="service" value="{{$service_aux}}">
              @endif
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control rounded-0" placeholder="Ingrese su correo electrónico">
              </div>
              <div class="form-group">
                <label for="ddd">Mensaje</label>
                <input id="ddd" name="ddd" type="text" class="form-control rounded-0" placeholder="Ej: Necesito tramitar una carta poder..." autocomplete="off" required>
              </div>
              <input type="hidden" name="aux" style="font-size: 10px" placeholder="Si puede ver este campo, por favor ignórelo" class="form-control" readonly>
              <input type="hidden" name="url" value="{{Request::segment(2)}}" class="form-control" readonly>

              <div class="d-flex align-items-start mb-3 text-white">
                <input type="checkbox" name="accepted" id="accepted" class="mr-2 mt-1">
                <label for="accepted" style="font-size: small; font-weight: 500">Deseo ser contactado y entiendo como van a ser manipulados mis datos según los <a href="{{ route('web.terminos') }}" target="_blank">Términos y Condiciones</a></label>
              </div>

              <button class="btn btn-lg btn-warning btn-block rounded-0 shadow btnsubmit" type="submit">INICIAR TRAMITE</button>
            </form>
          </div> 
      </div>
</section> --}}

{{-- section para valoraciones de clientes --}}

{{-- onclick="gtag('event', 'click', { 'event_category': 'Mensajes Whatsapp', 'event_label': 'HomePage:{{Request::segment(1)}}', 'value': '0'});" --}}
<div class="d-flex justify-content-center align-items-center px-3 py-1 text-white font-weight-bold" style="position: fixed; bottom: 0px; right: 10px; background-color: #0B6055; border-radius: 10px 10px 0px 0px">
  <a onclick="return gtag_report_conversion_wpp('{{$urlwpp}}')" href="https://api.whatsapp.com/send?phone={{ $tlfwpp }}&text=Hola Notaria Publica Latina, les escribo ya que estoy interesado en el servicio de *{{ $service_aux }}*" target="_blank" class="text-white">
  {{-- Consultar en linea <i class="fab fa-whatsapp ml-1"></i> --}}
  Consultar en linea <img width="25" height="25" class="lazy ml-1 mb-1" data-src="{{asset('img/notaria-latina-new-york.svg')}}" alt="Notaria Latina en Estados Unidos">
</a>
  </div>

<div id="iconcall" style="padding: 8px 11px 10px 11px; border-radius: 25px; position: fixed; bottom: 50px; right: 10px; background-color: #122944; border: 2px solid #ffffff;" class="d-flex">
  <a onclick="return gtag_report_conversion('tel:+{{$tlfhidden}}');" href="tel:+{{$tlfhidden}}">
    <img width="20" height="20" class="lazy img-fluid" data-src="{{ asset('img/telephone.webp') }}" alt="Notaria Latina">
    {{-- <i style="color: #ffffff; font-size: 18px" class="fas fa-phone"></i> --}}
  </a>
</div>

<footer class="text-center navfoot text-white py-3 mt-5"> Copyright ©2024 Notaria Latina. All rights reserved. <a class="text-white font-weight-bold" href="{{ route('web.politicas') }}">Politicas de Privacidad</a> </footer>

<script>
  window.addEventListener('load', (event) => {
      //{{asset($imgup)}}
      //document.getElementById('prisection').style.backgroundImage = "url('{{asset($imgbanner)}}')";
      //document.getElementById('dirmap').src = "{{asset($dirmap)}}";
      document.getElementById('iframemap').src = "{{ $iframesrc }}";
      console.log('ok');
      getstates();setcodcountry();

      if(screen.width > 580){
        //document.getElementById('second-image').src = "{{asset('img/notarizando documento.webp')}}";
        document.getElementById('second-image').setAttribute('data-src', "{{asset('img/notarizando documento.webp')}}");
          //console.log(document.getElementById('img_header').src = "{{ asset('img/notaria en estados unidos.webp') }}");
      } else {
        document.getElementById('second-image').setAttribute('data-src', "{{ asset('img/notarizando documento-mobile.webp') }}");
          //document.getElementById('img_header').src = "{{ asset('img/notaria en estados unidos mobile 2.webp') }}";
      }
  });

  let check_accept_term = document.getElementById('accepted');
  let btnsubmit = document.querySelector('.btnsubmit');


  const validateCheck = () => {
    if(check_accept_term && check_accept_term.checked == true){ btnsubmit.disabled = false; }
        else { 
            if(btnsubmit){
                btnsubmit.disabled = true;
            }
        }
  }

  validateCheck();

  if(check_accept_term){
    check_accept_term.addEventListener('click', function(){
        validateCheck();
    });
  }

  let selectPaisResidencia = document.getElementById('pais');
  let inputCodPais = document.getElementById('telf');

  selectPaisResidencia.onchange = function(){
    setcodcountry();
  }

  const setcodcountry = () => {
    switch (selectPaisResidencia.value) {
      case "":codigo = ""; break;
      case "Argentina":codigo = "+54";break;
      case "Bolivia":codigo = "+591";break;
      case "Chile":codigo = "+56"; break;
      case "Colombia":codigo = "+57";break;
      case "Costa Rica":codigo = "+506";break;
      case "Ecuador":codigo = "+593";break;
      case "El Salvador":codigo = "+503";break;
      case "España":codigo = "+34"; break;
      case "Estados Unidos":codigo = "+1"; break;
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

  let selCountry = document.getElementById('pais');
  let selState = document.getElementById('sel_state');

  selCountry.addEventListener('change', function(){
    getstates();
  });

    const getidbycod = (country_name) => {
      let id = 0;
        switch (country_name) {case 'Argentina': id = 1; break;case 'Bolivia': id = 2; break;case 'Chile': id = 20; break;case 'Colombia': id = 3; break;case 'Costa Rica': id = 4; break;case 'Ecuador': id = 5; break;case 'El Salvador': id = 6; break;case 'España': id = 7; break;case 'Estados Unidos': id = 8; break;case 'Guatemala': id = 9; break;case 'Honduras': id = 10; break;case 'México': id = 11; break;case 'Nicaragua': id = 12; break;case 'Panamá': id = 13; break;case 'Paraguay': id = 14; break;case 'Perú': id = 15; break;case 'Puerto Rico': id = 16; break;case 'República Dominicana': id = 17; break;case 'Uruguay': id = 18; break;case 'Venezuela': id = 19; break;default: break;}
      return id;
    }

    const getstates = async () => {
      selState.options.length = 0;
        let id = getidbycod(selCountry.value);
        //let id = selCountry.options[selCountry.selectedIndex].dataset.id;
        const response = await fetch("{{url('getstates')}}/"+id );        
        const states = await response.json();
        let opt = document.createElement('option');
        opt.appendChild( document.createTextNode('Estado/Departamento') );
        opt.value = '';
        selState.appendChild(opt);
            states.forEach(state => {
                let opt = document.createElement('option');
                opt.appendChild( document.createTextNode(state.name_state) );
                opt.value = state.name_state;
                if(state.name_state == "Nueva York" && "{{$oficina}}" == "New York") opt.selected = true; if(state.name_state == "Nueva Jersey" && "{{$oficina}}" == "New Jersey") opt.selected = true; if(state.name_state == "Florida" && "{{$oficina}}" == "Florida") opt.selected = true;
                selState.appendChild(opt);
        });
    }

  document.addEventListener("DOMContentLoaded",function(){var e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var n=new IntersectionObserver(function(e,t){e.forEach(function(e){if(e.isIntersecting){var t=e.target;t.src=t.dataset.src,t.classList.remove("lazy"),n.unobserve(t)}})});e.forEach(function(e){n.observe(e)})}else{var t;function r(){t&&clearTimeout(t),t=setTimeout(function(){var n=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+n&&(e.src=e.dataset.src,e.classList.remove("lazy"))}),0==e.length&&(document.removeEventListener("scroll",r),window.removeEventListener("resize",r),window.removeEventListener("orientationChange",r))},20)}e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)}});

</script>

</body>
</html>





