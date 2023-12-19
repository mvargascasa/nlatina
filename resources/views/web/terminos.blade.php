@extends('layouts.web')
@section('header')
    <title>Términos y Condiciones - Notaría Latina</title>
    <meta name="description" content="Términos y Condiciones de Notaría Latina"/>
    <meta name="keywords" content="terminos y condiciones notaria latina" />

    <meta property="og:url"                content="{{route('web.terminos')}}" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Términos y Condiciones de Notaría Latina" />
    <meta property="og:description"        content="Gestión en Línea en todo EE.UU. Poderes, Apostillas, Traducciones, Autorizaciones de Viaje, Affidavit." />
    <meta property="og:image"              content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />
@endsection

@section('content')

<section class="container p-4">
    
    <h1 style="padding-top: 8%">TÉRMINOS Y CONDICIONES</h1>
     
    <p dir="ltr">Estos términos y condiciones se aplican a todas las entidades del grupo Notaria Latina, que incluyen Notaría Latina Pública Corp, Notaría Pública Latina LLC y Notaría Latina Corp (en adelante, "Notaria Latina", "nosotros" o "nuestra"). Al proporcionar su información de contacto a través de nuestro sitio web, usted acepta lo siguiente:</p>

    <h2 style="font-size: large">1. Consentimiento para el Contacto:</h2>
    <p>Al proporcionar sus datos personales, usted otorga su consentimiento para que Notaria Latina se comunique con usted con el propósito de iniciar o dar seguimiento a trámites notariales solicitados por usted.</p> 
    
    <h2 style="font-size: large">2. Uso de la Información:</h2> 
    <p>Notaria Latina utilizará la información proporcionada exclusivamente para los fines relacionados con los servicios notariales solicitados. No compartiremos, venderemos ni divulgaremos su información a terceros no afiliados sin su consentimiento expreso.</p> 
    
    <h2 style="font-size: large">3. Privacidad y Seguridad:</h2>
    <p>Notaria Latina se compromete a proteger la privacidad y seguridad de la información proporcionada. Implementamos medidas de seguridad adecuadas para prevenir el acceso no autorizado, la divulgación, la alteración o la destrucción de sus datos personales. La recopilación y el uso de la información personal se rigen por nuestra Política de Privacidad, que puede consultarse en <a href="{{ route('web.politicas') }}">Políticas de Privacidad</a>.</p>
    
    <h2 style="font-size: large">4. Comunicación Electrónica:</h2>
    <p>Al proporcionar su información, usted acepta recibir comunicaciones electrónicas relacionadas con los trámites notariales solicitados. Esto puede incluir mensajes de texto, llamadas telefónicas y correos electrónicos.</p>
    
    <h2 style="font-size: large">5. Actualización de Información:</h2>
    <p>Es su responsabilidad notificar a Notaria Latina sobre cualquier cambio en su información de contacto. Notaria Latina no se hace responsable de la pérdida de comunicaciones debido a información desactualizada o incorrecta.</p>
    
    <h2 style="font-size: large">6. Retiro del Consentimiento:</h2>
    <p>En cualquier momento, tiene el derecho de retirar su consentimiento para ser contactado/a. Puede hacerlo comunicándose con Notaria Latina a través de los canales de contacto proporcionados en nuestro sitio web.</p>
    
    <h2 style="font-size: large">7. Cambios en los Términos y Condiciones:</h2>
    <p>Notaria Latina se reserva el derecho de modificar estos términos y condiciones en cualquier momento. Los cambios entrarán en vigor tan pronto como se publiquen en nuestro sitio web. Le recomendamos revisar periódicamente esta sección para estar al tanto de cualquier actualización.</p>
    
    <p>Al proporcionar su información de contacto en nuestro sitio web, usted reconoce haber leído, entendido y aceptado estos términos y condiciones. Si tiene alguna pregunta o inquietud, no dude en ponerse en contacto con nosotros a través de los medios proporcionados en nuestro sitio web.</p>

</section>


@endsection