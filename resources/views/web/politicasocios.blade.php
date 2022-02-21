@extends('layouts.web')
@section('header')
    <title>Políticas de Privacidad - Notaría Latina</title>
    <meta name="description" content="Políticas de Privacidad - Notaría Latina - Términos y Condiciones - Notario Público en Queens New York. Gestión en Línea en todo EE.UU. Poderes, Apostillas, Traducciones, Autorizaciones de Viaje, Affidavit."/>
    <meta name="keywords" content="políticas de privacidad, terminos y condiciones, notaria latina, notario publico, notario cerca de mi, notario publico near me, traducción de documentos near me, apostillar documentos near me, notaría nueva york, notary public queens" />

    <meta property="og:url"                content="{{route('web.index')}}" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Políticas de Privacidad - Notaría Latina - Notario Público en Queens New York." />
    <meta property="og:description"        content="Gestión en Línea en todo EE.UU. Poderes, Apostillas, Traducciones, Autorizaciones de Viaje, Affidavit." />
    <meta property="og:image"              content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />

    <style>
        #etiquetaPhone{
            display: none;
        }
    </style>
@endsection

@section('phoneNumberHidden', '+18007428602')
@section('phoneNumber', '800-742-8602')

@section('content')

    @include('web.partials.policies_partners')
    
@endsection

@section('numberWpp', '13479739888')