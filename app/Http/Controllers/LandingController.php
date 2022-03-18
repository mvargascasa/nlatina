<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;


class LandingController extends Controller
{

    public function apostilla(){
        $data['oficina'] = 'New York';
        $data['header'] = 'Notaría Pública <br> <b>New York</b> <br> Gestión Fácil y Rápida';
        $data['service'] = 'General'; // General Imprime todos los servicios
        $data['meta_description'] = null;
        $data['keywords'] = null;
        $data['imgup'] = 'img/newyork-landing-notaria-latina.jpg';
        $data['imgdown'] = 'img/oficina-notaria-latina-newyork.jpg';
        $data['dirtext'] = ' 67-03 Roosevelt Avenue <br> Woodside, NY 11377 ';
        $data['dirlink'] = 'https://g.page/notariapublicalatina';
        $data['dirmap']  = 'img/map.jpg';
        $data['tlfhidden'] = '17187665041';
        $data['tlfshow'] = '718 766-5041';
        $data['landing'] = "Apostillas"; 
        return view('landing.general',$data);
    }

    public function notaria()
    {
        return view('landing.notaria');
    }

    public function thank(Request $request)
    {
        return view('landing.thank');
    }

    public function thankpost(Request $request)
    {
        // falta capturar URL que solicita

        $pais = $this->getCodPais($request->get('cod_pais'));
        
        $interest = $request->interest ?? 'General';
        $sendoffices = '';
        if ($interest == 'General')             $sendoffices = ',newyork@notarialatina.com';
        if ($interest == 'Landing New York')    $sendoffices = ',newyork@notarialatina.com';
        if ($interest == 'Landing New Jersey')  $sendoffices = ',newjersey@notarialatina.com';
        if ($interest == 'Landing Florida')     $sendoffices = ',florida@notarialatina.com';

        if(isset($request->aaa) && isset($request->bbb) && isset($request->ddd)){

            $message = "<br><strong>Nuevo Lead Landing</strong>
            <br> Nombre: ". strip_tags($request->aaa)."
            <br> Telef: ". strip_tags($request->get('cod_pais')) . " " . strip_tags($request->bbb)."
            <br> País: " . strip_tags($pais)."
            <br> Interes: ".strip_tags($interest)."
            <br> Mensaje: ".strip_tags($request->ddd)."
            <br> Fuente: GoogleAds ";
        
            $header='';
            $header .= 'From: <lead_landing@notarialatina.com>' . "\r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail('notariapublicalatina@gmail.com'.$sendoffices,'Lead Landing: '.strip_tags($request->aaa), $message, $header);    
        }

        if(isset($request->fname)){
            $message = "<br><strong>Nuevo Lead Landing</strong>
            <br> Nombre: ". strip_tags($request->fname)."
            <br> Telef: ". strip_tags($request->get('cod_pais')) . " " . strip_tags($request->tlf)."
            <br> País: ". strip_tags($pais)."
            <br> Interes: ".strip_tags($interest)."
            <br> Mensaje: ".strip_tags($request->message)."
            <br> Fuente: GoogleAds ";
        
            $header='';
            $header .= 'From: <lead_landing@notarialatina.com>' . "\r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail('notariapublicalatina@gmail.com'.$sendoffices,'Lead Landing: '.strip_tags($request->fname), $message, $header);    
        }

        return view('landing.thank');
    }

    public function thankpostnj (Request $request)
    {
        $pais = $this->getCodPais($request->get('cod_pais'));

        if ($request->aux != null || preg_match("/^[a-z]+$/i", $request->bbb)) {

            $message = "<br><strong>Nuevo Lead Landing</strong>
                        <br> Nombre: ". strip_tags($request->aaa)."
                        <br> Telef: ".strip_tags($request->get('cod_pais'))." ".  strip_tags($request->bbb)."
                        <br> País: " .strip_tags($pais)."
                        <br> Mensaje: ".strip_tags($request->ddd)." 
                        <br> Fuente: GoogleAds 
                        <br> Proviene: Landing Campañas
                        ";
                    
            $header='';
            $header .= 'From: <lead_landing@notarialatina.com>' . "\r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            mail('sebas31051999@gmail.com','Lead Landing: '.strip_tags($request->aaa), $message, $header);

        } else {

            $interest = $request->interest ?? 'General';
    
            $sendoffices = ',newyork@notarialatina.com';
            if ($interest == 'General')             $sendoffices = ',newyork@notarialatina.com';
            if ($interest == 'Landing New York')    $sendoffices = ',newyork@notarialatina.com';
            if ($interest == 'Landing New Jersey')  $sendoffices = ',newjersey@notarialatina.com';
            if ($interest == 'Landing Florida')     $sendoffices = ',florida@notarialatina.com';
    
                $message = "<br><strong>Nuevo Lead Landing</strong>
                            <br> Nombre: ". strip_tags($request->aaa)."
                            <br> Telef: ".strip_tags($request->get('cod_pais'))." ".  strip_tags($request->bbb)."
                            <br> País: " .strip_tags($pais)."
                            <br> Interes: ".  strip_tags($interest)."
                            <br> Mensaje: ".strip_tags($request->ddd)." 
                            <br> Fuente: GoogleAds ";
                        
                $header='';
                $header .= 'From: <lead_landing@notarialatina.com>' . "\r\n";
                $header .= "MIME-Version: 1.0\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                mail('notariapublicalatina@gmail.com'.$sendoffices,'Lead Landing: '.strip_tags($request->aaa), $message, $header);      
        }

        return view('landing.thank');

        //'notariapublicalatina@gmail.com'.$sendoffices
    }    

    // correo notariapublicalatina@gmail.com
    // New Jersey
    public function newjersey() {
        $data['oficina'] = 'New Jersey';
        $data['header'] = 'Notaría Pública <br> <b>New Jersey</b> <br> Gestión Fácil y Rápida';
        $data['service'] = 'General';// General Imprime todos los servicios
        $data['meta_description'] = '¿Necesitas apostillar un documento en New Jersey? ¿Tramitar una carta poder general o especial? ¿Traducir un certificado? Notaria Latina lo hace por ti, contáctate con nosotros y te asesoraremos con personal calificado.';
        $data['keywords'] = 'notaria en new jersey, apostillar documentos en new jersey, notarizar carta poder en new jersey, poder especial en new jersey, poder general en new jersey, tramitar carta poder new jersey, traducir documentos en new jersey, traduccion de certificados, poder notarial new jersey, poderes notariales new jersey, carta poder legal new jersey, donde hacer una carta poder new jersey';
        $data['imgup'] = 'img/newjersey-landing-notaria-latina.jpg';
        $data['imgdown'] = 'img/oficina-notaria-latina-newjersey.jpg';
        $data['dirtext'] = '1146 East Jersey St <br> Elizabeth, NJ 07201 ';
        $data['dirlink'] = 'https://goo.gl/maps/pyszsGuTmGpoWgXW8';
        $data['dirmap']  = 'img/map-newjersey-notaria.jpg';
        $data['tlfhidden'] = '19082249594 ';
        $data['tlfshow'] = '908 224-9594';
        $data['landing'] = 'General';
        return view('landing.general',$data);
    }

    public function njweb() {
        $data['oficina'] = 'New Jersey';
        $data['header'] = 'Notaría Pública <br> New Jersey <br> Gestión Fácil y Rápida';
        $data['service'] = 'General';// General Imprime todos los servicios
        $data['meta_description'] = '¿Estas buscando apostillar un documento, una carta poder o traducir un certificado? Notaria Latina ofrece estos y otros servicios en New Jersey. Contáctanos y te asesoraremos en tus trámites';
        $data['keywords'] = 'notaria, notaría cerca, notaria new jersey, notaria en new jersey, notarizar documentos en new jersey, apostillar certificado de nacimiento new jersey, apostillar poderes new jersey, apostillar carta poder en new jersey, traducir documentos new jersey';
        $data['imgup'] = 'img/newjersey-landing-notaria-latina.jpg';
        $data['imgdown'] = 'img/oficina-notaria-latina-newjersey.jpg';
        $data['dirtext'] = '1146 East Jersey St <br> Elizabeth, NJ 07201 ';
        $data['dirlink'] = 'https://goo.gl/maps/pyszsGuTmGpoWgXW8';
        $data['dirmap']  = 'img/map-newjersey-notaria.jpg';
        $data['tlfhidden'] = '19082249596';
        $data['tlfshow'] = '908 224-9596';
        $data['landing'] = 'General Web';
        return view('landing.general',$data);
    }  

    public function njtrad() {
        $data['oficina'] = 'New Jersey';
        $data['header'] = 'Servicio de Traducción <br> en New Jersey';  
        $data['service'] = 'Realizamos todo tipo de traducciones <br> en Ingles y Español'; 
        $data['meta_description'] = '¿Necesitas traducir un tipo de documento en New Jersey pero no sabes donde hacerlo? Notaria Latina esta a tu servicio!. Contamos con personal calificado para ayudarte en tus trámites. Contáctanos';
        $data['keywords'] = 'servicio de traduccion new jersey, agencia de traduccion new jersey, traducir documentos new jersey, traductor certificado new jersey, traducir certificados new jersey, traduccion certificada new jersey, notario traductor new jersey, traductor jurado new jersey, traducir licencia de conducir, traducir acta de nacimiento, traducir documentos en new jersey, traducir acta de nacimiento en new jersey, traducir diploma en new jersey, traducir certificado de matrimonio en new jersey, traducir documento de divorcio en new jersey, traducir certificado de defuncion en new jersey, traducir documentos legales en new jersey, donde puedo traducir documentos en new jersey';
        $data['imgup'] = 'img/landing-traducciones.jpg';
        $data['imgdown'] = 'img/oficina-notaria-latina-newjersey.jpg';
        $data['dirtext'] = '1146 East Jersey St <br> Elizabeth, NJ 07201 ';
        $data['dirlink'] = 'https://goo.gl/maps/pyszsGuTmGpoWgXW8';
        $data['dirmap']  = 'img/map-newjersey-notaria.jpg';
        $data['tlfhidden'] = '19082249259';
        $data['tlfshow'] = '908 224-9259';
        $data['landing'] = 'Traducciones';
        return view('landing.general',$data);
    }  

    public function njpod() {
        $data['oficina'] = 'New Jersey';
        $data['header']  = 'Poderes <br> en New Jersey'; 
        $data['service'] = 'Realizamos todo tipo de Poderes Generales y Poderes Especiales';
        $data['meta_description'] = $data['service'];
        $data['keywords'] = 'New Jersey, Poderes Especiales, Poderes Generales, Trámites Bancarios, Carta Poder, Menor de edad, Compra Venta Propiedades, Créditos, Pasaporte, Pleitos, Cobranzas';
        $data['imgup'] = 'img/landing-poderes.jpg';
        $data['imgdown'] = 'img/oficina-notaria-latina-newjersey.jpg';
        $data['dirtext'] = '1146 East Jersey St <br> Elizabeth, NJ 07201 ';
        $data['dirlink'] = 'https://goo.gl/maps/pyszsGuTmGpoWgXW8';
        $data['dirmap']  = 'img/map-newjersey-notaria.jpg';
        $data['tlfhidden'] = '19082249258';
        $data['tlfshow'] = '908 224-9258';
        $data['landing'] = "Poderes"; 
        return view('landing.general',$data);
    }   

    public function njapos() {
        $data['oficina'] = 'New Jersey';
        $data['header'] = 'Apostillas <br> en New Jersey';
        $data['service'] = 'Apostillamos todo tipo de documentos como: <br> Certificados, Poderes, Traducciones, Diplomas, Contratos, Testamentos';  
        $data['meta_description'] = 'Apostillamos todo tipo de documentos como Certificados, Poderes, Traducciones, Diplomas, Contratos, Testamentos en New Jersey';
        $data['keywords'] = 'apostillar, apostillar documentos, apostillas en new jersey, apostillar partida de nacimiento, apostillar documentos en new jersey, apostille near me, apostillar cerca de mi, apostille in new jersey, apostillado de actas, apostillar acta de nacimiento new jersey, apostillar carta poder new jersey, apostillar certificado de matrimonio new jersey, carta poder apostillada, donde apostillar documentos en new jersey';
        $data['imgup'] = 'img/landing-apostillas-nj.jpg';
        $data['imgdown'] = 'img/oficina-notaria-latina-newjersey.jpg';
        $data['dirtext'] = '1146 East Jersey St <br> Elizabeth, NJ 07201 ';
        $data['dirlink'] = 'https://goo.gl/maps/pyszsGuTmGpoWgXW8';
        $data['dirmap']  = 'img/map-newjersey-notaria.jpg';
        $data['tlfhidden'] = '19082249552';
        $data['tlfshow'] = '908 224-9552';
        $data['landing'] = 'Apostillas';
        return view('landing.general',$data);
    }


    // New York
    public function newyork() {
        $data['oficina'] = 'New York';
        $data['header'] = 'Notaría Pública <br> <b>New York</b> <br> Gestión Fácil y Rápida';
        $data['service'] = 'General';// General Imprime todos los servicios
        $data['meta_description'] = '¿Necesitas apostillar un documento en New York? ¿Tramitar una carta poder? ¿Traducir un certificado? Notaria Latina lo hace por ti, contáctate con nosotros y te asesoraremos con personal calificado.';
        $data['keywords'] = 'notaría, notaria near me, notaría pública, notaria en new york, notarizar documentos, notarizar documentos en new york, carta poder notariada, notaría cerca, notario cerca, notaría ecuador, notaria publico cercano';
        $data['imgup'] = 'img/newyork-landing-notaria-latina.jpg';
        $data['imgdown'] = 'img/oficina-notaria-latina-newyork.jpg';
        $data['dirtext'] = ' 67-03 Roosevelt Avenue <br> Woodside, NY 11377 ';
        $data['dirlink'] = 'https://g.page/notariapublicalatina';
        $data['dirmap']  = 'img/map.jpg';
        $data['tlfhidden'] = '13474281520';
        $data['tlfshow'] = '347 428-1520';
        $data['landing'] = 'General';
        return view('landing.general',$data);
    }

    public function nyweb() {
        $data['oficina'] = 'New York';
        $data['header'] = 'Notaría Pública <br> <b>New York</b> <br> Gestión Fácil y Rápida';
        $data['service'] = 'General';// General Imprime todos los servicios
        $data['meta_description'] = '¿Estas buscando apostillar un documento, una carta poder o traducir un certificado? Notaria Latina ofrece estos y otros servicios en New York. Contáctanos y te asesoraremos en tus trámites';
        $data['keywords'] = 'notarias, departamento estado, notaria latina, notaria publica, carta poder para viajar un menor, carta de invitacion a usa, requisitos para carta de invitacion, permiso para salir del pais, apostillar documentos, notarizar documentos en new york, apostillar documentos en new york, carta poder en new york, traduccion de documentos new york, notaria en new york, servicios notariales en new york';
        $data['imgup'] = 'img/newyork-landing-notaria-latina.jpg';
        $data['imgdown'] = 'img/oficina-notaria-latina-newyork.jpg';
        $data['dirtext'] = ' 67-03 Roosevelt Avenue <br> Woodside, NY 11377 ';
        $data['dirlink'] = 'https://g.page/notariapublicalatina';
        $data['dirmap']  = 'img/map.jpg';
        $data['tlfhidden'] = '13474281519';
        $data['tlfshow'] = '347 428-1519';
        $data['landing'] = 'General Web';
        return view('landing.general',$data);
    }  

    public function nytrad() {
        $data['oficina'] = 'New York';
        $data['header'] = 'Servicio de Traducción <br> en New York';  
        $data['service'] = 'Realizamos todo tipo de traducciones <br> en Ingles y Español';      
        $data['meta_description'] = '¿Necesitas traducir un tipo de documento en New Jersey pero no sabes donde hacerlo? Notaria Latina esta a tu servicio!. Contamos con personal calificado para ayudarte en tus trámites. Contáctanos';
        $data['keywords'] = 'traducir documentos, traducir documentos en new york, traducir acta de nacimiento en new york, traducir diploma en new york, traducir certificado de matrimonio en new york, traducir documento de divorcio en new york, traducir certificado de defuncion en new york, traducir documentos legales en new york, donde puedo traducir documentos en new york';
        $data['imgup'] = 'img/landing-traducciones.jpg';
        $data['imgdown'] = 'img/oficina-notaria-latina-newyork.jpg';
        $data['dirtext'] = ' 67-03 Roosevelt Avenue <br> Woodside, NY 11377 ';
        $data['dirlink'] = 'https://g.page/notariapublicalatina';
        $data['dirmap']  = 'img/map.jpg';
        $data['tlfhidden'] = '13474281517';
        $data['tlfshow'] = '347 428-1517';
        $data['landing'] = 'Traducciones';
        return view('landing.general',$data);
    }  

    public function nypod() {
        $data['oficina'] = 'New York';
        $data['header']  = 'Poderes <br> en New York'; 
        $data['service'] = 'Realizamos todo tipo de Poderes Generales y Poderes Especiales';
        $data['meta_description'] = 'Notaria Latina cuenta con servicios para Poderes Generales y Especiales. ¡Contáctanos!';
        $data['keywords'] = 'carta poder, carta poder new york, carta poder simple, carta poder legal, poder general, notarizar carta poder,  poder especial, notaria ecuatoriana, carta notariada, carta poder para viajar un menor';
        $data['imgup']   = 'img/landing-poderes.jpg';
        $data['imgdown'] = 'img/oficina-notaria-latina-newyork.jpg';
        $data['dirtext'] = ' 67-03 Roosevelt Avenue <br> Woodside, NY 11377 ';
        $data['dirlink'] = 'https://g.page/notariapublicalatina';
        $data['dirmap']  = 'img/map.jpg';
        $data['tlfhidden'] = '13474281516';
        $data['tlfshow'] = '347 428-1516';
        $data['landing'] = 'Poderes'; 
        return view('landing.general',$data);
    }   

    public function nyapos() {
        $data['oficina'] = 'New York';
        $data['header'] = 'Apostillas <br> en New York';
        $data['service'] = 'Apostillamos todo tipo de documentos como: <br> Certificados, Poderes, Traducciones, Diplomas, Contratos, Testamentos';
        $data['meta_description'] = 'Apostillamos todo tipo de documentos como Certificados, Poderes, Traducciones, Diplomas, Contratos, Testamentos en New York';
        $data['keywords'] = 'apostillar, apostillar documentos, apostillar documentos en new york, apostillar cerca de mi, apostillar acta de nacimiento new york, apostillar carta poder new york, apostillar certificado de matrimonio new york, apostillar actas de divorcio new york';
        $data['imgup'] = 'img/landing-apostillas-ny.jpg';
        $data['imgdown'] = 'img/oficina-notaria-latina-newyork.jpg';
        $data['dirtext'] = ' 67-03 Roosevelt Avenue <br> Woodside, NY 11377 ';
        $data['dirlink'] = 'https://g.page/notariapublicalatina';
        $data['dirmap']  = 'img/map.jpg';
        $data['tlfhidden'] = '13474281518';
        $data['tlfshow'] = '347 428-1518';
        $data['landing'] = 'Apostillas';
        return view('landing.general',$data);
    }  

    


    // Florida
    public function florida() {
        $data['oficina'] = 'Florida';
        $data['header'] = 'Notaría Pública <br> <b>Florida</b> <br> Gestión Fácil y Rápida';
        $data['service'] = 'General';// General Imprime todos los servicios
        $data['meta_description'] = '¿Necesitas apostillar un documento en Florida? ¿Tramitar un poder general o especial? ¿Traducir un certificado? Notaria Latina lo hace por ti, contáctate con nosotros y te asesoraremos con personal calificado.';
        $data['keywords'] = 'apostillas en florida, cartas poder en florida, traducciones florida, notaria en florida, notarizar documentos en florida, notaria en florida, notario publico florida, servicios notariales florida, notarias cerca, notaria latina';
        $data['imgup'] = 'img/florida-landing-notaria-latina.jpg';
        $data['imgdown'] = 'img/oficina-notaria-florida.jpg';
        $data['dirtext'] = '2104 N University Dr <br> Sunrise, FL 33322 ';
        $data['dirlink'] = 'https://g.page/notarialatina';
        $data['dirmap']  = 'img/map-florida-notaria.jpg';
        $data['tlfhidden'] = '13054229149';
        $data['tlfshow'] = '305 422 9149';
        $data['landing'] = 'General';
        return view('landing.general',$data);
    }

    public function flweb() {
        $data['oficina'] = 'Florida';
        $data['header'] = 'Notaría Pública <br> <b>Florida</b> <br> Gestión Fácil y Rápida';
        $data['service'] = 'General';// General Imprime todos los servicios
        $data['meta_description'] = '¿Estas buscando apostillar un documento, una carta poder o traducir un certificado? Notaria Latina ofrece estos y otros servicios en New Jersey. Contáctanos y te asesoraremos en tus trámites';
        $data['keywords'] = 'florida, notaria, direccion de notarias florida, documentos notarias florida, notaria en florida, notario publico cerca de mi, notarios publicos, notario publico mas cercano cerca de mi, notarizar documentos en florida, apostillar certificado de nacimiento florida, apostillar poderes florida, apostillar carta poder en florida, traducir documentos en florida';
        $data['imgup'] = 'img/florida-landing-notaria-latina.jpg';
        $data['imgdown'] = 'img/oficina-notaria-florida.jpg';
        $data['dirtext'] = '2104 N University Dr <br> Sunrise, FL 33322 ';
        $data['dirlink'] = 'https://g.page/notarialatina';
        $data['dirmap']  = 'img/map-florida-notaria.jpg';
        $data['tlfhidden'] = '13053177811';
        $data['tlfshow'] = '305 317 7811';
        $data['landing'] = 'General Web';
        return view('landing.general',$data);
    }  

    public function fltrad() {
        $data['oficina'] = 'Florida';
        $data['header'] = 'Servicio de Traducción <br> en Florida';  
        $data['service'] = 'Realizamos todo tipo de traducciones <br> en Ingles y Español';      
        $data['meta_description'] = '¿Necesitas traducir un documento notarial en New Jersey pero no sabes donde hacerlo? Notaria Latina esta a tu servicio!. Contamos con personal calificado para ayudarte en tus trámites. Ponte en contacto con nosotros y te asesoraremos.';
        $data['keywords'] = 'traducir documentos, traducir documentos en florida, traducir acta de nacimiento en florida, traducir diploma en florida, traducir certificado de matrimonio en florida, traducir documento de divorcio en florida, traducir certificado de defuncion en florida, traducir documentos legales en florida, donde puedo traducir documentos en florida, interprete traductor florida, traductor técnico florida, notario traductor florida, traducciones notariadas florida, traductor certificado florida';
        $data['imgup'] = 'img/landing-traducciones.jpg';
        $data['imgdown'] = 'img/oficina-notaria-florida.jpg';
        $data['dirtext'] = '2104 N University Dr <br> Sunrise, FL 33322 ';
        $data['dirlink'] = 'https://g.page/notarialatina';
        $data['dirmap']  = 'img/map-florida-notaria.jpg';
        $data['tlfhidden'] = '13053177819';
        $data['tlfshow'] = '305 317 7819';
        $data['landing'] = 'Traducciones';
        return view('landing.general',$data);
    }  

    public function flpod() {
        $data['oficina'] = 'Florida';
        $data['header']  = 'Poderes <br> en Florida'; 
        $data['service'] = 'Realizamos todo tipo de Poderes Generales y Poderes Especiales';
        $data['meta_description'] = 'Notaria Latina ofrece servicios para Poderes Generales y Especiales. Contáctanos y te asesoraremos en tus trámites.';
        $data['keywords'] = 'carta poder, carta poder florida, notarizar carta poder en florida,  poder especial en florida, poder general en florida, bienes, compra o venta propiedades florida, carta poder créditos bienes, pasaportes bienes';
        $data['imgup']   = 'img/landing-poderes.jpg';
        $data['imgdown'] = 'img/oficina-notaria-florida.jpg';
        $data['dirtext'] = '2104 N University Dr <br> Sunrise, FL 33322 ';
        $data['dirlink'] = 'https://g.page/notarialatina';
        $data['dirmap']  = 'img/map-florida-notaria.jpg';
        $data['tlfhidden'] = '13053177826';
        $data['tlfshow'] = '305 317 7826';
        $data['landing'] = 'Poderes';
        return view('landing.general',$data);
    }   

    public function flapos() {
        $data['oficina'] = 'Florida';
        $data['header'] = 'Apostillas <br> en Florida';
        $data['service'] = 'Apostillamos todo tipo de documentos como: <br> Certificados, Poderes, Traducciones, Diplomas, Contratos, Testamentos';
        $data['meta_description'] = 'Apostillamos todo tipo de documentos como: Certificados, Poderes, Traducciones, Diplomas, Contratos, Testamentos en Florida';
        $data['keywords'] = 'apostillar, apostillamiento, apostillar documentos, apostillar documentos en florida, apostillar cerca de mi, apostillar acta de nacimiento florida, apostillar carta poder florida, apostillar certificado de matrimonio florida, apostillar actas de divorcio florida, apostillado de actas florida, apostillar pasaporte florida, como apostillar florida';
        $data['imgup'] = 'img/landing-apostillas-fl.jpg';
        $data['imgdown'] = 'img/oficina-notaria-florida.jpg';
        $data['dirtext'] = '2104 N University Dr <br> Sunrise, FL 33322 ';
        $data['dirlink'] = 'https://g.page/notarialatina';
        $data['dirmap']  = 'img/map-florida-notaria.jpg';
        $data['tlfhidden'] = '13053177820';
        $data['tlfshow'] = '305 317 7820';
        $data['landing'] = 'Apostillas';
        return view('landing.general',$data);
    }
    
    public function getCodPais($cod_pais){
        switch ($cod_pais) {
            case '+54': $pais = "Argentina"; break;
            case '+591': $pais = "Bolivia"; break;
            case '+57': $pais = "Colombia"; break;
            case '+506': $pais = "Costa Rica"; break;
            case '+593': $pais = "Ecuador"; break;
            case '+503': $pais = "El Salvador"; break;
            case '+34': $pais = "España"; break;
            case '+1': $pais = "Estados Unidos"; break;
            case '+502': $pais = "Guatemala"; break;
            case '+504': $pais = "Honduras"; break;
            case '+52': $pais = "México"; break;
            case '+505': $pais = "Nicaragua"; break;
            case '+507': $pais = "Panamá"; break;
            case '+595': $pais = "Paraguay"; break;
            case '+51': $pais = "Perú"; break;
            case '+1 787': $pais = "Puerto Rico"; break;
            case '+1 809': $pais = "República Dominicana"; break;
            case '+598': $pais = "Uruguay"; break;
            case '+58': $pais = "Venezuela"; break;
            default:
                # code...
                break;
        }
        return $pais;
    }
}
