<?php

namespace App\Http\Controllers;

use App\Http\Traits\GetCountryByCodTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;


class LandingController extends Controller
{
    use GetCountryByCodTrait;

    public function apostilla(){
        $data['oficina'] = 'New York';
        $data['header'] = 'Notaría Pública <br> <b>New York</b> <br> Gestión Fácil y Rápida';
        $data['service'] = 'General'; // General Imprime todos los servicios
        $data['meta_description'] = 'Apostillamos todo tipo de Documentos tales como certificados de nacimiento, matrimonio, divorcio, poderes generales y especiales, autorizaciones de viaje, etc. En Notaria Latina lo hacemos de una manera ágil y rápida!';
        $data['keywords'] = 'apostillar documentos en new york, apostillar documentos en new jersey, apostillar certificado de nacimiento en new york, apostillar certificado de nacimiento en new jersey, apostillar certificado de matrimonio en new york, apostillar certificado de matrimonio en new jersey';
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

        $country = $this->getPaisByCodigo($request->country);
        // falta capturar URL que solicita

        //$pais = $this->getCodPais($request->get('cod_pais'));
        if(!Str::contains($request->message, 'https')){
            $interest = $request->interest ?? 'General';
            $sendoffices = '';
            if ($interest == 'General')             $sendoffices = ',newyork@notarialatina.com';
            if ($interest == 'Landing New York')    $sendoffices = ',newyork@notarialatina.com';
            if ($interest == 'Landing New Jersey')  $sendoffices = ',newjersey@notarialatina.com';
            if ($interest == 'Landing Florida')     $sendoffices = ',florida@notarialatina.com';
    
            if(isset($request->aaa) && isset($request->bbb) && isset($request->ddd)){
    
                $message = "<br><strong>Nuevo Lead</strong>
                <br> Nombre: ". strip_tags($request->aaa)."
                <br> Telef: ". strip_tags($request->get('cod_pais')) . " " . strip_tags($request->bbb)."
                <br> Interes: ".strip_tags($interest)."
                <br> Mensaje: ".strip_tags($request->ddd)."
                <br> Fuente: GoogleAds 
                <br> Página: " . url()->previous() . " "; 
                
    
                //<br> País: " . strip_tags($pais)."
    
                $header='';
                $header .= 'From: <lead_landing@notarialatina.com>' . "\r\n";
                $header .= "MIME-Version: 1.0\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                mail('notariapublicalatina@gmail.com'.$sendoffices,'Lead Landing: '.strip_tags($request->aaa), $message, $header);  
                mail('sebas31051999@gmail.com','Lead: '.strip_tags($request->aaa), $message, $header);  
            }
    
            if(isset($request->fname)){
    
                $message = "<br><strong>Nuevo Lead</strong>
                <br> Nombre: ". strip_tags($request->fname)." ". strip_tags($request->lname) . " 
                <br> País: " . strip_tags($country) . "
                <br> Telef: ". strip_tags($request->cod) . " " . strip_tags($request->tlf)."
                <br> Interes: ".strip_tags($interest)."
                <br> Mensaje: ".strip_tags($request->message)."
                <br> Fuente: GoogleAds 
                <br> Página: " . url()->previous() . "
                ";
    
                // <br> País: ". strip_tags($pais)."
            
                $header='';
                $header .= 'From: <lead_landing@notarialatina.com>' . "\r\n";
                $header .= "MIME-Version: 1.0\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                mail('notariapublicalatina@gmail.com'.$sendoffices,'Lead Landing: '.strip_tags($request->fname), $message, $header);
                mail('sebas31051999@gmail.com','Lead: '.strip_tags($request->aaa), $message, $header);      
            }
        }
        return view('landing.thank');
    }

    public function thankpostnj (Request $request)
    {
        // $pais = $this->getCodPais($request->get('cod_pais'));
        if ($request->aux != null || preg_match("/[a-zA-Z]/", $request->bbb) || !Str::startsWith($request->codpais, '+')) {

            $message = "<br><strong>Nuevo Lead Landing</strong>
                        <br> Nombre: ". strip_tags($request->aaa)."
                        <br> Telef: ".strip_tags($request->codpais)." ".  strip_tags($request->bbb)."
                        <br> País: " .strip_tags($request->pais)."
                        <br> Mensaje: ".strip_tags($request->ddd)."
                        <br> Fuente: " . strip_tags($request->interest) . " 
                        <br> Fuente: GoogleAds 
                        <br> Proviene: Landing Campañas
                        ";
                    
            $header='';
            $header .= 'From: <lead_landing@notarialatina.com>' . "\r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            mail('sebas31051999@gmail.com','Bot Lead Landing: '.strip_tags($request->aaa), $message, $header);

        } else {

            $interest = $request->interest ?? 'General';
    
            $sendoffices = ',newyork@notarialatina.com';
            if ($interest == 'General')             $sendoffices = ',newyork@notarialatina.com';
            if ($interest == 'Landing New York')    $sendoffices = ',newyork@notarialatina.com';
            if ($interest == 'Landing New Jersey')  $sendoffices = ',newjersey@notarialatina.com';
            if ($interest == 'Landing Florida')     $sendoffices = ',florida@notarialatina.com';
    
                $message = "<br><strong>Nuevo Lead Landing</strong>
                            <br> Nombre: ". strip_tags($request->aaa)."
                            <br> Telef: ".strip_tags($request->codpais). " ".  strip_tags($request->bbb)."
                            <br> País: " .strip_tags($request->pais)."
                            <br> Interes: ".  strip_tags($interest)."
                            <br> Mensaje: ".strip_tags($request->ddd)." 
                            <br> Fuente: GoogleAds ";
                        
                $header='';
                $header .= 'From: <lead_landing@notarialatina.com>' . "\r\n";
                $header .= "MIME-Version: 1.0\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                mail('notariapublicalatina@gmail.com'.$sendoffices,'Lead Landing: '.strip_tags($request->aaa), $message, $header);      
                mail('sebas31051999@gmail.com','Lead Landing: '.strip_tags($request->aaa), $message, $header);
                //'notariapublicalatina@gmail.com'.$sendoffices
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
        $data['meta_description'] = 'Notarizamos todo tipo de Documentos en New Jersey 🗽 como Apostillas, Poderes, Traducciones de una manera rápida y segura. ¡Contáctenos ahora! ✅';
        $data['keywords'] = 'notaria en new jersey, notaria latina en new jersey, notaria publica latina en new jersey, notaria en elizabeth new jersey, notario publico en new jersey, notaria cerca de mi, notario publico cerca de mi, apostillar documentos en elizabeth new jersey, traducir documentos en elizabeth new jersey';
        $data['imgup'] = 'img/newjersey-landing-notaria-latina.webp';
        $data['imgdown'] = 'img/oficina-notaria-latina-newjersey.webp';
        $data['dirtext'] = '1146 East Jersey St <br> Elizabeth, NJ 07201 ';
        $data['dirlink'] = 'https://goo.gl/maps/pyszsGuTmGpoWgXW8';
        $data['dirmap']  = 'img/map-newjersey-notaria.webp';
        $data['tlfhidden'] = '19082249594 ';
        $data['tlfshow'] = '908 224-9594';
        $data['landing'] = 'General';
        $data['title'] = 'Notaría Latina en New Jersey | Apostillas, Poderes, Traducciones';
        $data['tlfwpp'] = '13479739888';
        return view('landing.general',$data);
    }

    public function njweb() {
        $data['oficina'] = 'New Jersey';
        $data['header'] = 'Notaría Pública <br> New Jersey <br> Gestión Fácil y Rápida';
        $data['service'] = 'General';// General Imprime todos los servicios
        $data['meta_description'] = 'Tramitamos todo tipo de Documentos en New Jersey como Apostillas, Poderes, Traducciones 📃 de una manera rápida y segura. ¡Contáctenos ahora! ✅';
        $data['keywords'] = 'notaria en new jersey, notaria latina en new jersey, notaria publica latina en new jersey, notaria en elizabeth new jersey, notario publico en new jersey, notaria cerca de mi, notario publico cerca de mi, apostillar documentos en elizabeth new jersey, traducir documentos en elizabeth new jersey';
        $data['imgup'] = 'img/newjersey-landing-notaria-latina.webp';
        $data['imgdown'] = 'img/oficina-notaria-latina-newjersey.webp';
        $data['dirtext'] = '1146 East Jersey St <br> Elizabeth, NJ 07201 ';
        $data['dirlink'] = 'https://goo.gl/maps/pyszsGuTmGpoWgXW8';
        $data['dirmap']  = 'img/map-newjersey-notaria.webp';
        $data['tlfhidden'] = '19082249596';
        $data['tlfshow'] = '908 224-9596';
        $data['landing'] = 'General Web';
        $data['title'] = 'Apostillas, Poderes, Traducciones | Notaría Latina en New Jersey';
        $data['tlfwpp'] = '13479739888';
        return view('landing.general',$data);
    }  

    public function njtrad() {
        $data['oficina'] = 'New Jersey';
        $data['header'] = 'Traducción de documentos <br> en New Jersey';  
        $data['service'] = 'Realizamos todo tipo de traducciones <br> en Ingles y Español'; 
        $data['meta_description'] = '📄 ¿Necesita Traducir un Documento en New Jersey? Lo ayudamos con la Traducción de Certificados, Diplomas, Acuerdos, entre otros. ¡Agende su cita aquí! ✅';
        $data['keywords'] = 'traducir documentos en new jersey, traducir documentos en elizabeth nj, traducir documentos en new jersey a español, traducir certificados en new jersey, traducir acuerdos en new jersey, donde puedo traducir un documento en new jersey, donde traducir un documento en new jersey, traducir actas en new jersey, traducir diploma en new jersey';
        $data['imgup'] = 'img/landing-traducciones.webp';
        $data['imgdown'] = 'img/oficina-notaria-latina-newjersey.webp';
        $data['dirtext'] = '1146 East Jersey St <br> Elizabeth, NJ 07201 ';
        $data['dirlink'] = 'https://goo.gl/maps/pyszsGuTmGpoWgXW8';
        $data['dirmap']  = 'img/map-newjersey-notaria.webp';
        $data['tlfhidden'] = '19082249259';
        $data['tlfshow'] = '908 224-9259';
        $data['landing'] = 'Traducciones';
        $data['title'] = 'Traducir Documentos Notariales en New Jersey | Notaria Latina';
        $data['tlfwpp'] = '13479739888';
        return view('landing.general',$data);
    }  

    //Me quedo hasta aqui
    public function njpod() {
        $data['oficina'] = 'New Jersey';
        $data['header']  = 'Poder Especial o General <br> en New Jersey'; 
        $data['service'] = 'Realizamos todo tipo de Poderes Generales y Poderes Especiales';
        $data['meta_description'] = '📄 ¿Necesita realizar un Poder Notarial en New Jersey? Contáctenos y lo ayudamos con el trámite de un Poder Especial o General de una manera segura ✅';
        $data['keywords'] = 'poder especial en new jersey, poder general en new jersey, tramitar poder especial en new jersey, tramitar poder general en new jersey, realizar tramite para poder especial en new jersey, obtener carta poder en new jersey, donde puedo tramitar un poder en new jersey, donde puedo obtener un poder en new jersey';
        $data['imgup'] = 'img/landing-poderes.webp';
        $data['imgdown'] = 'img/oficina-notaria-latina-newjersey.webp';
        $data['dirtext'] = '1146 East Jersey St <br> Elizabeth, NJ 07201 ';
        $data['dirlink'] = 'https://goo.gl/maps/pyszsGuTmGpoWgXW8';
        $data['dirmap']  = 'img/map-newjersey-notaria.webp';
        $data['tlfhidden'] = '19082249258';
        $data['tlfshow'] = '908 224-9258';
        $data['landing'] = "Poderes"; 
        $data['title'] = 'Realizamos todo tipo de Poderes en New Jersey | Notaria Latina';
        $data['tlfwpp'] = '13479739888';
        return view('landing.general',$data);
    }   

    public function njapos() {
        $data['oficina'] = 'New Jersey';
        $data['header'] = 'Apostilla de documentos <br> en New Jersey';
        $data['service'] = 'Apostillamos todo tipo de documentos como: <br> Certificados, Poderes, Traducciones, Diplomas, Contratos, Testamentos';  
        $data['meta_description'] = '📄 ¿Necesita Apostillar un Documento en New Jersey? Lo ayudamos con la Apostilla de Certificados, Poderes, Traducciones, entre otros. ¡Solicítelo aquí! ✅';
        $data['keywords'] = 'apostillar documentos cerca de mi, apostillar documentos en new jersey, apostillar documentos en elizabeth nj, apostillar certificados en new jersey, apostillar poderes en new jersey, apostillar traduccion en new jersey, apostillar diploma en new jersey, donde apostillar documentos en new jersey, donde puedo apostillar documentos en new jersey';
        $data['imgup'] = 'img/landing-apostillas-nj.webp';
        $data['imgdown'] = 'img/oficina-notaria-latina-newjersey.webp';
        $data['dirtext'] = '1146 East Jersey St <br> Elizabeth, NJ 07201 ';
        $data['dirlink'] = 'https://goo.gl/maps/pyszsGuTmGpoWgXW8';
        $data['dirmap']  = 'img/map-newjersey-notaria.webp';
        $data['tlfhidden'] = '19082249552';
        $data['tlfshow'] = '908 224-9552';
        $data['landing'] = 'Apostillas';
        $data['title'] = 'Apostillar Documentos en New Jersey | Notaria Latina';
        $data['tlfwpp'] = '13479739888';
        return view('landing.general',$data);
    }


    // New York
    public function newyork() {
        $data['oficina'] = 'New York';
        $data['header'] = 'Notaría Pública <br> <b>New York</b> <br> Gestión Fácil y Rápida';
        $data['service'] = 'General';// General Imprime todos los servicios
        $data['meta_description'] = 'Realizamos todo tipo de Trámites Notariales en New York tales como Apostillas, Certificados, Poderes, Traducciones de una manera segura. ¡Contáctenos! ✅';
        $data['keywords'] = 'notaria en new york, notaria latina en new york, notaria publica latina en new york, notaria en queens new york, notario publico en new york, notaria cerca de mi, notario publico cerca de mi, apostillar documentos en queens new york, traducir documentos en queens new york';
        $data['imgup'] = 'img/newyork-landing-notaria-latina.webp';
        $data['imgdown'] = 'img/oficina-notaria-latina-newyork.webp';
        $data['dirtext'] = ' 67-03 Roosevelt Avenue <br> Woodside, NY 11377 ';
        $data['dirlink'] = 'https://g.page/notariapublicalatina';
        $data['dirmap']  = 'img/maps-newyork-notaria.webp';
        $data['tlfhidden'] = '13474281520';
        $data['tlfshow'] = '347 428-1520';
        $data['landing'] = 'General';
        $data['title'] = 'Notaría Latina en New York - Apostillas, Poderes y Traducciones';
        $data['tlfwpp'] = '13479739888';
        return view('landing.general',$data);
    }

    public function nyweb() {
        $data['oficina'] = 'New York';
        $data['header'] = 'Notaría Pública <br> <b>New York</b> <br> Gestión Fácil y Rápida';
        $data['service'] = 'General';// General Imprime todos los servicios
        $data['meta_description'] = 'Tramitamos todo tipo de Documentos en New York 🗽 como Apostillas, Certificados, Poderes, Traducciones de una manera rápida y segura. ¡Iniciar trámite! ✅';
        $data['keywords'] = 'notaria en new york, notaria latina en new york, notaria publica latina en new york, notaria en queens new york, notario publico en new york, notaria cerca de mi, notario publico cerca de mi, apostillar documentos en queens new york, traducir documentos en queens new york';
        $data['imgup'] = 'img/newyork-landing-notaria-latina.webp';
        $data['imgdown'] = 'img/oficina-notaria-latina-newyork.webp';
        $data['dirtext'] = ' 67-03 Roosevelt Avenue <br> Woodside, NY 11377 ';
        $data['dirlink'] = 'https://g.page/notariapublicalatina';
        $data['dirmap']  = 'img/maps-newyork-notaria.webp';
        $data['tlfhidden'] = '13474281519';
        $data['tlfshow'] = '347 428-1519';
        $data['landing'] = 'General Web';
        $data['title'] = 'Apostillas, Poderes y Traducciones en New York | Notaría Latina';
        $data['tlfwpp'] = '13479739888';
        return view('landing.general',$data);
    }  

    public function nytrad() {
        $data['oficina'] = 'New York';
        $data['header'] = 'Traducción de documentos <br> en New York';  
        $data['service'] = 'Realizamos todo tipo de traducciones <br> en Ingles y Español';      
        $data['meta_description'] = '¿Necesita Traducir un Documento en New York? 📄 Lo ayudamos con la Traducción de Certificados, Diplomas, Acuerdos, entre otros. ¡Escríbanos ahora! ✅';
        $data['keywords'] = 'traducir documentos en new york, traducir documentos en queens ny, traducir documentos en new york a español, traducir certificados en new york, traducir acuerdos en new york, donde puedo traducir un documento en new york, donde traducir un documento en new york, traducir actas en new york, traducir diploma en new york';
        $data['imgup'] = 'img/landing-traducciones.webp';
        $data['imgdown'] = 'img/oficina-notaria-latina-newyork.webp';
        $data['dirtext'] = ' 67-03 Roosevelt Avenue <br> Woodside, NY 11377 ';
        $data['dirlink'] = 'https://g.page/notariapublicalatina';
        $data['dirmap']  = 'img/maps-newyork-notaria.webp';
        $data['tlfhidden'] = '13474281517';
        $data['tlfshow'] = '347 428-1517';
        $data['landing'] = 'Traducciones';
        $data['title'] = 'Traducir Documentos Notariales en New York | Notaría Latina';
        $data['tlfwpp'] = '13479739888';
        return view('landing.general',$data);
    }  

    public function nypod() {
        $data['oficina'] = 'New York';
        $data['header']  = 'Poder Especial o General <br> en New York'; 
        $data['service'] = 'Realizamos todo tipo de Poderes Generales y Poderes Especiales';
        $data['meta_description'] = '¿Necesita realizar un Poder Notarial en New York? 📃 Contáctese con nosotros y lo ayudamos con el trámite para realizar un Poder General o Especial ✅';
        $data['keywords'] = 'poder especial en new york, poder general en new york, tramitar poder especial en new york, tramitar poder general en new york, realizar trámite para poder especial en new york, obtener carta poder en new york, donde puedo tramitar un poder en new york, donde puedo obtener un poder en new york';
        $data['imgup']   = 'img/landing-poderes.webp';
        $data['imgdown'] = 'img/oficina-notaria-latina-newyork.webp';
        $data['dirtext'] = ' 67-03 Roosevelt Avenue <br> Woodside, NY 11377 ';
        $data['dirlink'] = 'https://g.page/notariapublicalatina';
        $data['dirmap']  = 'img/maps-newyork-notaria.webp';
        $data['tlfhidden'] = '13474281516';
        $data['tlfshow'] = '347 428-1516';
        $data['landing'] = 'Poderes';
        $data['title'] = 'Realizamos todo tipo de Poderes en New York | Notaria Latina'; 
        $data['tlfwpp'] = '13479739888';
        return view('landing.general',$data);
    }   

    public function nyapos() {
        $data['oficina'] = 'New York';
        $data['header'] = 'Apostilla de documentos <br> en New York';
        $data['service'] = 'Apostillamos todo tipo de documentos como: <br> Certificados, Poderes, Traducciones, Diplomas, Contratos, Testamentos';
        $data['meta_description'] = '¿Necesita Apostillar un Documento en New York? 📃 Nuestro servicio de Apostilla en Certificados, Poderes, Traducciones a su alcance. ¡Solicitar ahora! ✅';
        $data['keywords'] = 'apostillar documentos cerca de mi, apostillar documentos en new york, apostillar documentos en queens ny, apostillar certificados en new york, apostillar poderes en new york, apostillar traduccion en new york, apostillar diploma en new york, donde apostillar documentos en new york, donde puedo apostillar documentos en new york';
        $data['imgup'] = 'img/landing-apostillas-ny.webp';
        $data['imgdown'] = 'img/oficina-notaria-latina-newyork.webp';
        $data['dirtext'] = ' 67-03 Roosevelt Avenue <br> Woodside, NY 11377 ';
        $data['dirlink'] = 'https://g.page/notariapublicalatina';
        $data['dirmap']  = 'img/maps-newyork-notaria.webp';
        $data['tlfhidden'] = '13474281518';
        $data['tlfshow'] = '347 428-1518';
        $data['landing'] = 'Apostillas';
        $data['title'] = 'Apostillar Documentos en New York | Notaría Latina';
        $data['tlfwpp'] = '13479739888';
        return view('landing.general',$data);
    }  

    


    // Florida
    public function florida() {
        $data['oficina'] = 'Florida';
        $data['header'] = 'Notaría Pública <br> <b>Florida</b> <br> Gestión Fácil y Rápida';
        $data['service'] = 'General';// General Imprime todos los servicios
        $data['meta_description'] = 'Realizamos todo tipo de Trámites Notariales en Florida 📃 como Apostillas, Certificados, Poderes, Traducciones de una manera segura ✅';
        $data['keywords'] = 'notaria en florida, notaria latina en florida, notaria publica latina en florida, notaria en sunrise florida, notario publico en florida, notaria cerca de mi, notario publico cerca de mi, apostillar documentos en sunrise florida, traducir documentos en sunrise florida';
        $data['imgup'] = 'img/florida-landing-notaria-latina.jpg';
        $data['imgdown'] = 'img/oficina-notaria-florida.jpg';
        $data['dirtext'] = '2104 N University Dr <br> Sunrise, FL 33322 ';
        $data['dirlink'] = 'https://g.page/notarialatina';
        $data['dirmap']  = 'img/map-florida-notaria.jpg';
        $data['tlfhidden'] = '13054229149';
        $data['tlfshow'] = '305 422 9149';
        $data['landing'] = 'General';
        $data['title'] = 'Notaría Latina en Florida - Apostillas, Poderes y Traducciones';
        $data['tlfwpp'] = '13056003290';
        return view('landing.general',$data);
    }

    public function flweb() {
        $data['oficina'] = 'Florida';
        $data['header'] = 'Notaría Pública <br> <b>Florida</b> <br> Gestión Fácil y Rápida';
        $data['service'] = 'General';// General Imprime todos los servicios
        $data['meta_description'] = 'Tramitamos todo tipo de Documentos en Florida 🗽 como Apostillas, Certificados, Poderes, Traducciones de una manera ágil y segura ¡Contáctenos ahora! ✅';
        $data['keywords'] = 'notaria en florida, notaria latina en florida, notaria publica latina en florida, notaria en sunrise florida, notario publico en florida, notaria cerca de mi, notario publico cerca de mi, apostillar documentos en sunrise florida, traducir documentos en sunrise florida';
        $data['imgup'] = 'img/florida-landing-notaria-latina.jpg';
        $data['imgdown'] = 'img/oficina-notaria-florida.jpg';
        $data['dirtext'] = '2104 N University Dr <br> Sunrise, FL 33322 ';
        $data['dirlink'] = 'https://g.page/notarialatina';
        $data['dirmap']  = 'img/map-florida-notaria.jpg';
        $data['tlfhidden'] = '13053177811';
        $data['tlfshow'] = '305 317 7811';
        $data['landing'] = 'General Web';
        $data['title'] = 'Apostillas, Poderes y Traducciones en Florida | Notaría Latina';
        $data['tlfwpp'] = '13056003290';
        return view('landing.general',$data);
    }  

    public function fltrad() {
        $data['oficina'] = 'Florida';
        $data['header'] = 'Traducción de documentos <br> en Florida';  
        $data['service'] = 'Realizamos todo tipo de traducciones <br> en Ingles y Español';      
        $data['meta_description'] = '¿Necesita Traducir un Documento en Florida? 🗽 Lo ayudamos con la Traducción de Certificados, Poderes, Acuerdos, entre otros. ¡Solicitar traducción! ✅';
        $data['keywords'] = 'traducir documentos en florida, traducir documentos en sunrise florida, traducir documentos en florida a español, traducir certificados en florida, traducir acuerdos en florida, donde puedo traducir un documento en florida, donde traducir un documentos en florida, traducir acta en florida, traducir diploma en florida';
        $data['imgup'] = 'img/landing-traducciones.jpg';
        $data['imgdown'] = 'img/oficina-notaria-florida.jpg';
        $data['dirtext'] = '2104 N University Dr <br> Sunrise, FL 33322 ';
        $data['dirlink'] = 'https://g.page/notarialatina';
        $data['dirmap']  = 'img/map-florida-notaria.jpg';
        $data['tlfhidden'] = '13053177819';
        $data['tlfshow'] = '305 317 7819';
        $data['landing'] = 'Traducciones';
        $data['title'] = 'Traducir Documentos Notariales en Florida | Notaria Latina';
        $data['tlfwpp'] = '13056003290';
        return view('landing.general',$data);
    }  

    public function flpod() {
        $data['oficina'] = 'Florida';
        $data['header']  = 'Poder Especial o General <br> en Florida'; 
        $data['service'] = 'Realizamos todo tipo de Poderes Generales y Poderes Especiales';
        $data['meta_description'] = '¿Necesita realizar un Poder Notarial en Florida? 🗽 Nos especializamos en el Trámite de Poderes Generales y Especiales. ¡Solicitar Poder ahora! ✅';
        $data['keywords'] = 'poder especial en florida, poder general en florida, tramitar poder especial en florida, tramitar poder general en florida, realizar tramite para poder especial en florida, obtener carta poder en florida, donde puedo tramitar un poder en florida, donde puedo obtener un poder en florida';
        $data['imgup']   = 'img/landing-poderes.jpg';
        $data['imgdown'] = 'img/oficina-notaria-florida.jpg';
        $data['dirtext'] = '2104 N University Dr <br> Sunrise, FL 33322 ';
        $data['dirlink'] = 'https://g.page/notarialatina';
        $data['dirmap']  = 'img/map-florida-notaria.jpg';
        $data['tlfhidden'] = '13053177826';
        $data['tlfshow'] = '305 317 7826';
        $data['landing'] = 'Poderes';
        $data['title'] = 'Tramitamos todo tipo de Poderes en Florida | Notaria Latina';
        $data['tlfwpp'] = '13056003290';
        return view('landing.general',$data);
    }   

    public function flapos() {
        $data['oficina'] = 'Florida';
        $data['header'] = 'Apostilla de documentos <br> en Florida';
        $data['service'] = 'Apostillamos todo tipo de documentos como: <br> Certificados, Poderes, Traducciones, Diplomas, Contratos, Testamentos';
        $data['meta_description'] = '¿Necesita Apostillar un Documento en Florida? 📃 Nuestro servicio de apostilla en Certificados, Poderes, Traducciones a su alcance. ¡Solicítelo ahora! ✅';
        $data['keywords'] = 'apostillar documentos cerca de mi, apostillar documentos en florida, apostillar documentos en sunrise florida, apostillar certificados en florida, apostillar poderes en florida, apostillar traduccion en florida, apostillar diploma en florida, donde apostillar documentos en florida, donde puedo apostillar documentos en florida';
        $data['imgup'] = 'img/landing-apostillas-fl.jpg';
        $data['imgdown'] = 'img/oficina-notaria-florida.jpg';
        $data['dirtext'] = '2104 N University Dr <br> Sunrise, FL 33322 ';
        $data['dirlink'] = 'https://g.page/notarialatina';
        $data['dirmap']  = 'img/map-florida-notaria.jpg';
        $data['tlfhidden'] = '13053177820';
        $data['tlfshow'] = '305 317 7820';
        $data['landing'] = 'Apostillas';
        $data['title'] = 'Apostillar Documentos en Florida | Notaria Latina';
        $data['tlfwpp'] = '13056003290';
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
