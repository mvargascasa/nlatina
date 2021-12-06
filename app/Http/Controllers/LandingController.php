<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class LandingController extends Controller
{

    public function apostilla(){
        $data['oficina'] = 'New York';
        $data['header'] = 'Notaría Pública <br> <b>New York</b> <br> Gestión Fácil y Rápida';
        $data['service'] = 'General'; // General Imprime todos los servicios
        $data['imgup'] = 'img/newyork-landing-notaria-latina.jpg';
        $data['imgdown'] = 'img/oficina-notaria-latina-newyork.jpg';
        $data['dirtext'] = ' 67-03 Roosevelt Avenue <br> Woodside, NY 11377 ';
        $data['dirlink'] = 'https://g.page/notariapublicalatina';
        $data['dirmap']  = 'img/map.jpg';
        $data['tlfhidden'] = '17187665041';
        $data['tlfshow'] = '718 766-5041';
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
        
        $interest = $request->interest ?? 'General';
        $sendoffices = '';
        if ($interest == 'General')             $sendoffices = ',newyork@notarialatina.com';
        if ($interest == 'Landing New York')    $sendoffices = ',newyork@notarialatina.com';
        if ($interest == 'Landing New Jersey')  $sendoffices = ',newjersey@notarialatina.com';
        if ($interest == 'Landing Florida')     $sendoffices = ',florida@notarialatina.com';

        if(isset($request->aaa) && isset($request->bbb) && isset($request->ddd)){

            $message = "<br><strong>Nuevo Lead Landing</strong>
            <br> Nombre: ". strip_tags($request->aaa)."
            <br> Telef: ".  strip_tags($request->bbb)."
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
            <br> Telef: ".  strip_tags($request->tlf)."
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
        switch ($request->get('cod_pais')) {
            case '+54': $pais = "Argentina"; break;
            case '+591': $pais = "Bolivia"; break;
            case '+57': $pais = "Colombia"; break;
            case '+506': $pais = "Costa Rica"; break;
            case '+593': $pais = "Ecuador"; break;
            case '+503': $pais = "El Salvador"; break;
            case '+34': $pais = "España"; break;
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

        $interest = $request->interest ?? 'General';

        $sendoffices = ',newyork@notarialatina.com';
        if ($interest == 'General')             $sendoffices = ',newyork@notarialatina.com';
        if ($interest == 'Landing New York')    $sendoffices = ',newyork@notarialatina.com';
        if ($interest == 'Landing New Jersey')  $sendoffices = ',newjersey@notarialatina.com';
        if ($interest == 'Landing Florida')     $sendoffices = ',florida@notarialatina.com';

            $message = "<br><strong>Nuevo Lead Landing</strong>
                        <br> Nombre: ". strip_tags($request->aaa)."
                        <br> Telef: ".  strip_tags($request->bbb)."
                        <br> Código de País: " . strip_tags($request->get('cod_pais'))."
                        <br> País: " .strip_tags($pais)."
                        <br> Interes: ".  strip_tags($interest)."
                        <br> Mensaje: ".strip_tags($request->ddd)." 
                        <br> Fuente: GoogleAds ";
                    
            $header='';
            $header .= 'From: <lead_landing@notarialatina.com>' . "\r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail('notariapublicalatina@gmail.com'.$sendoffices,'Lead Landing: '.strip_tags($request->aaa), $message, $header);      
        return view('landing.thank');
    }    

    // New Jersey
    public function newjersey() {
        $data['oficina'] = 'New Jersey';
        $data['header'] = 'Notaría Pública <br> <b>New Jersey</b> <br> Gestión Fácil y Rápida';
        $data['service'] = 'General';// General Imprime todos los servicios
        $data['meta_description'] = null;
        $data['keywords'] = null;
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
        $data['meta_description'] = null;
        $data['keywords'] = null;
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
        $data['meta_description'] = null;
        $data['keywords'] = null;
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
        $data['meta_description'] = null;
        $data['keywords'] = null;
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
        $data['meta_description'] = null;
        $data['keywords'] = null;
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
        $data['meta_description'] = null;
        $data['keywords'] = null;
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
        $data['meta_description'] = null;
        $data['keywords'] = null;
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
        $data['meta_description'] = 'Contamos con servicios para Poderes Generales y Especiales';
        $data['keywords'] = 'Poder Especial en New York, Poder General en New York, Bienes, Carta Poder New York, Compra o Venta Propiedades New York, Carta Poder Créditos New York, Pasaportes New York';
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
        $data['meta_description'] = null;
        $data['keywords'] = null;
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
        $data['meta_description'] = 'Servicios de apostillas - Cartas Poder - Traducciones de diferentes documentos en Florida';
        $data['keywords'] = 'apostillas en florida, cartas poder en florida, traducciones florida';
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
        $data['meta_description'] = null;
        $data['keywords'] = null;
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
        $data['meta_description'] = null;
        $data['keywords'] = null;
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
        $data['meta_description'] = null;
        $data['keywords'] = null;
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
        $data['meta_description'] = null;
        $data['keywords'] = null;
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
}
