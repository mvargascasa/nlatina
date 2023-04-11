<?php

namespace App\Http\Controllers;

//use App\Conversion;
use App\Http\Traits\GetCountryByCodTrait;
use App\Post;
// use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Carbon\Carbon;
// use Stevebauman\Purify\Facades\Purify;


class LandingController extends Controller
{
    use GetCountryByCodTrait;

    public $more_reviewsnj = 'https://g.page/r/CVNRV-zNuJiZEAE';
    public $reviewsnj = [
        [
            'name' => 'Ronald Pacheco',
            'stars' => 5,
            'message' => 'Rápida y muy amable. He ido para traducir una licencia de conducir y poder presentarla a la NJMVC  y en apenas unos minutos pudieron hacerlo. Cuando vuelva a necesitar hacer algún otro trámite seguro que volveré allí. Muchas Gracias',
            'link' => 'https://goo.gl/maps/qB6rXkmXYBwkD25v5'
        ],
        [
            'name' => 'Linda Madrid',
            'stars' => 5,
            'message' => 'Excelente servicio el que se me brindo el dia de hoy. Su personal es atento y logro solventar todas mis gestiones en un buen tiempo y con mucha cortesía. Recomiendo el lugar',
            'link' => 'https://goo.gl/maps/7D4uE3NVJXP6oY2g7'
        ],
        [
            'name' => 'Gabriela Anchaluisa',
            'stars' => 5,
            'message' => 'Excelente atención!!! El servicio es muy eficiente y las personas muy amables en la atención. Felicitaciones 👏',
            'link' => 'https://goo.gl/maps/VLUsbPvBEi6ZwyA99'
        ]
    ];

    public $more_reviewsny = 'https://g.page/notariapublicalatina';
    public $reviewsny = [
        [
            'name' => 'Cesar Augusto Tonuzco',
            'stars' => 5,
            'message' => 'Excelente servicio me hicieron la traducción  en un momento 🤩',
            'link' => 'https://goo.gl/maps/bPRSyrCHDkBpF7cU8'
        ],
        [
            'name' => 'Yessenia Hernandez',
            'stars' => 5,
            'message' => 'Servicios muy buenos y super atentos a las necesidades del cliente. Profesionales en todo momento.',
            'link' => 'https://goo.gl/maps/kQTmXqC9oQRCBhZr9'
        ],
        [
            'name' => 'Vladimir Paccha',
            'stars' => 5,
            'message' => 'Quedo muy agradecido por el servicio de la Notaria Latina son muy buenos en su trabajo y también los recomiendo.',
            'link' => 'https://goo.gl/maps/MyFgAdFhdZa959sf8'
        ]
    ];

    public $more_reviewsfl = 'https://g.page/r/CeRrwPx_W2-xEAE';
    public $reviewsfl = [
        [
            'name' => 'Maria Sampayo',
            'stars' => 5,
            'message' => 'Quiero resaltar el excelente servicio de la Notaría Pública Latina. Llegue a ellos a través de Google porque necesitaba traducir y apostillar mi licencia de maternidad y el certificado de nacimiento de mi hija. [...] Si ustedes requieren traducir y apostillar documentos, no duden en hacerlo con esta notaría. Son los mejores.',
            'link' => 'https://goo.gl/maps/J8uRSU1H2JG4oLaT6'
        ],
        [
            'name' => 'Vangie Vazquez',
            'stars' => 5,
            'message' => 'Son los mejores y más diligentes! Hicieron que este proceso fuera fácil. Apostillar express un documento en la Florida no es fácil pero con este equipo de trabajo nada es imposible. No se preocupe deje que ellos les oriente y tendrán unos resultados positivos tal como todo lo que uno sueña con la tranquilidad del deber cumplido.',
            'link' => 'https://goo.gl/maps/D6m7fLHLuZXXDSLj7'
        ],
        [
            'name' => 'Melba Gomes',
            'stars' => 5,
            'message' => 'Super recomendable y segura me ayudaron con todos los trámites, me hicieron más fácil todo mil gracias no sabía que existía esta oficina y me la recomendaron desde Colombia',
            'link' => 'https://goo.gl/maps/gXmSRnL8Yy8Nb3DE9'
        ]
    ];

    public function apostilla(){
        $data['oficina'] = 'New York';
        $data['header'] = 'Notaría Pública <br> <b>New York</b> <br> Gestión Fácil y Rápida';
        $data['service_aux'] = "Apostilla Express";
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
        $data['tlfwpp'] = '13479739888'; 
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

        if(isset($request->country)){
            $country = $this->getPaisByCodigo($request->country);
        }
        // falta capturar URL que solicita

        //$pais = $this->getCodPais($request->get('cod_pais'));
        if(!Str::contains($request->message, 'https')){

            // $header='';
            // $header .= 'From: <prueba@notarialatina.com>' . "\r\n";
            // $header .= "MIME-Version: 1.0\r\n";
            // $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // $message = "<strong>Prueba de envio</strong>";

            // $sended = mail('sebas31051999@gmail.com,notariapublicalatina@gmail.com', 'Prueba de envio', $message, $header);

            // if($sended) return "se envio el correo";
            // else return "error al enviar";

            // if(isset($request->office)) $interest = $request->office;
            // else $interest = $request->interest ?? 'General';

            $interest = 'General';

            if(isset($request->office)){
                $interest = $request->office;
            } else {
                $interest = $request->url_current;
            }

            $servicename = $request->service ?? $request->servicename;
            $servicename = Str::ucfirst(str_replace('-', ' ', $servicename));
            //return $servicename;
            
            $sendoffices = '';

            if ($interest == 'web.oficina.newyork'              || $interest == 'New York' || $request->state == "Nueva York"){     $sendoffices = ',newyork@notarialatina.com'; $office = 'New York'; } //
            else if ($interest == 'web.oficina.newjersey'       || $interest == 'New Jersey' || $request->state == 'Nueva Jersey'){   $sendoffices = ',newjersey@notarialatina.com'; $office = 'New Jersey'; }//
            else if ($interest == 'web.oficina.florida'         || $interest == 'Florida' || $request->state == "Florida"){      $sendoffices = ',florida@notarialatina.com'; $office = 'Florida'; }//
            else { $sendoffices = ",servicios@notarialatina.com"; $office = 'General'; };

            // if ($interest == 'web.oficina.newyork'              || $interest == 'New York')     $sendoffices = 'sebas31051999@gmail.com'; //
            // else if ($interest == 'web.oficina.newjersey'       || $interest == 'New Jersey')   $sendoffices = 'sebas25211@hotmail.com'; //
            // else if ($interest == 'web.oficina.florida'         || $interest == 'Florida')      $sendoffices = 'sebastian.armijos.est@tecazuay.edu.ec'; //
            // else $sendoffices = "sebas31051999@gmail.com";

            // if(isset($request->url_current) && ($request->url_current == "web.oficina.newjersey" || $request->url_current == "web.oficina.newyork" || $request->url_current == "web.oficina.florida")){
            //     if($request->url_current == "web.oficina.newjersey")    $sendoffices = ',newjersey@notarialatina.com';
            //     if($request->url_current == "web.oficina.newyork")      $sendoffices = ',newyork@notarialatina.com';
            //     if($request->url_current == "web.oficina.florida")      $sendoffices = ',florida@notarialatina.com';
            // }
    
            if(isset($request->aaa) && isset($request->bbb) && isset($request->ddd)){
   
                if(isset($request->cod_pais)){
                    $country = $this->getPaisByCodigo($request->cod_pais);
                } else {$country = "undefined";}
                
                // $token = 'KEY017C562DF36C32F89898F8D77773A25F_mu0OEZ7QDrNc2WRWCEgaHG';
                // $datasend = [ 'name'=> strip_tags($request->aaa), 'country' => strip_tags($country), 'state' => strip_tags($request->state), 'code' => strip_tags($request->get('cod_pais')), 'phone' => strip_tags($request->bbb), 'email' =>  strip_tags($request->ccc), 'interest' => strip_tags($servicename), 'office' => strip_tags($office), 'message' => strip_tags($request->ddd), 'from' => url()->previous(), 'created_at'=> Carbon::now()->subHour(5)->format('Y-m-d H:i:s') ];    
                // $postdata = json_encode($datasend);
                // $opts = [ "http" => [ "method" => "POST", 'header' => "Content-Type: application/json\r\n". "x-auth-token: $token\r\n", 'content' => $postdata ], ]; 
                // $context = stream_context_create($opts);
                // file_get_contents('https://notarialatina.vercel.app/api/email', false, $context);

                $message = "<br><strong>Nuevo Lead</strong>
                <br><b> Nombre: </b> ". strip_tags($request->aaa)."
                <br><b> País: </b> " . strip_tags($country) . "
                <br><b> Estado: </b> " . strip_tags($request->state) . "
                <br><b> Telef: </b> ". strip_tags($request->get('cod_pais')) . " " . strip_tags($request->bbb)."
                <br><b> Email: </b> " . strip_tags($request->ccc) ."
                <br><b> Interes: </b> ".strip_tags($request->service)."
                <br><b> Mensaje: </b> ".strip_tags($request->ddd)."
                <br><b> Fuente: </b> GoogleAds 
                <br><b> Página: </b> " . url()->previous() . " ";
                
                $from = 'lead_landing';

                if(isset($request->service) && isset($request->office)) $from = strtolower(str_replace(" ", "_", $request->service." ".$request->office));
                else $from = 'lead_' . strtolower(str_replace(" ", "_", $request->service));
    
                //<br> País: " . strip_tags($pais)."
    
                $header='';
                $header .= 'From: <'.$from.'@notarialatina.com>' . "\r\n";
                $header .= "MIME-Version: 1.0\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                //mail('notariapublicalatina@gmail.com'.$sendoffices,'Lead: ' . strip_tags($request->service) . " " .strip_tags($request->aaa), $message, $header);  
                mail('sebas31051999@gmail.com','Lead General: '.strip_tags($request->aaa), $message, $header);  
                //mail($sendoffices,'Lead General: '.strip_tags($request->aaa), $message, $header);  
            }
    
            if(isset($request->fname) && isset($request->cod) && Str::startsWith($request->cod, '+')){

                // $header='';
                // $header .= 'From: <prueba@notarialatina.com>' . "\r\n";
                // $header .= "MIME-Version: 1.0\r\n";
                // $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // $message = "<strong>Prueba de envio</strong>";

                // $sended = mail('sebas31051999@gmail.com,notariapublicalatina@gmail.com', 'Prueba de envio', $message, $header);

                // if($sended) return "se envio el correo";
                // else return "error al enviar";

                // $token = 'KEY017C562DF36C32F89898F8D77773A25F_mu0OEZ7QDrNc2WRWCEgaHG';
                // $datasend = [ 'name'=> strip_tags($request->fname)." ". strip_tags($request->lname), 'country' => strip_tags($country), 'state' => strip_tags($request->state), 'code' => strip_tags($request->cod), 'phone' => strip_tags($request->tlf), 'email' =>  strip_tags($request->email), 'interest' => strip_tags($servicename), 'office' => strip_tags($office), 'message' => strip_tags($request->message), 'from' => url()->previous(), 'created_at'=> Carbon::now()->subHour(5)->format('Y-m-d H:i:s') ];    
                // $postdata = json_encode($datasend);
                // $opts = [ "http" => [ "method" => "POST", 'header' => "Content-Type: application/json\r\n". "x-auth-token: $token\r\n", 'content' => $postdata ], ]; 
                // $context = stream_context_create($opts);
                // file_get_contents('https://notarialatina.vercel.app/api/email', false, $context);

                $from = 'general';
                if($request->url_current != 'web.oficina.florida' && $request->url_current != 'web.oficina.newjersey' && $request->url_current != 'web.oficina.newyork'){
                    switch ($request->url_current) {
                        case 'web.index': $page = strtolower(str_replace(' ', '_', $request->service)) . '_home'; break;
                        case 'web.apostillar.naturalizacion': $page = 'apos_naturali_general'; break;
                        case 'web.apostillar.nacimiento': $page = 'apos_cert_naci_general'; break;
                        case 'web.apostillar.acta.constitutiva': $page = 'apos_acta_const_general'; break;
                        case 'web.apostillar.poder.notarial': $page = 'apos_podern_general'; break;
                        case 'web.poderesg': $page = 'poder_general'; break;
                        case 'web.poderesp': $page = 'poder_especial'; break;
                        case 'web.poderesnf': $page = 'poder_financ_general'; break;
                        case 'web.traducciones': $page = 'traduc_general'; break;
                        case 'web.affidavit': $page = 'affidavit_general'; break;
                        case 'web.acuerdos': $page = 'acuerdos_general'; break;
                        case 'web.autorizaciones': $page = 'autorizacion_general'; break;
                        case 'web.invitacion': $page  = 'carta_invit_general'; break;
                        case 'web.certificaciones': $page = 'certifi_general'; break;
                        case 'web.contratos': $page = 'contratos_general'; break;
                        case 'web.revocatorias': $page = 'revocatoria_general'; break;
                        case 'web.testamentos': $page = 'testamentos_general'; break; 
                        case 'web.contactenos': $page = strtolower(str_replace(' ', '_', $request->service)) . '_contact'; break;
                        case 'post.slug': $page = 'lead_post'; break;
                        default: $page = 'lead_'.$from; break;
                    }
                } else {
                    //if(isset($request->url_current) && $request->url_current == "web.index") $from = "home";
                    if(isset($request->url_current) && $request->url_current == "web.oficina.florida") $from = "oficina Florida";
                    if(isset($request->url_current) && $request->url_current == "web.oficina.newjersey") $from = "oficina New Jersey";
                    if(isset($request->url_current) && $request->url_current == "web.oficina.newyork") $from = "oficina New York";

                    switch ($request->url_current) {
                        case 'web.oficina.newyork':
                                switch ($request->servicename) {
                                    //NEW YORK
                                    case 'poder-notarial-new-york': $page = 'poder_notarial_ny'; break;
                                    case 'apostillar-documentos-new-york': $page = 'apostilla_ny'; break;
                                    case 'traducir-documentos-new-york': $page = 'traducciones_ny'; break;
                                    case 'travel-authorization-en-new-york': $page = 'travel_auth_ny'; break;
                                    case 'certificaciones-en-new-york': $page = 'certificaciones_ny'; break;
                                    case 'acuerdos-en-new-york': $page = 'acuerdos_ny';break;
                                    case 'cartas-de-invitacion-en-new-york': $page = 'carta_inv_ny';break;
                                    case 'revocatorias-en-new-york': $page = 'revocatorias_ny';break;
                                    case 'contratos-en-new-york': $page = 'contratos_ny';break;
                                    case 'testamentos-en-new-york': $page = 'testamentos_ny';break;
                                    case 'affidavit-support-en-new-york': $page = 'affidavit_ny';break;
                                    default: $page = "lead_general_u"; break;
                                }
                            break;
                        
                        case 'web.oficina.newjersey':
                            switch ($request->servicename) {
                                //NEW JERSEY
                                case 'poder-notarial-new-jersey': $page = 'poder_notarial_nj'; break;
                                case 'apostillar-documentos-new-jersey': $page = 'apostilla_nj'; break;
                                case 'traducir-documentos-new-jersey': $page = 'traducciones_nj'; break;
                                case 'travel-authorization-en-new-jersey': $page = 'travel_auth_nj'; break;
                                case 'certificaciones-en-new-jersey': $page = 'certificaciones_nj'; break;
                                case 'acuerdos-en-new-jersey': $page = 'acuerdos_nj';break;
                                case 'cartas-de-invitacion-en-new-jersey': $page = 'carta_inv_nj';break;
                                case 'revocatorias-en-new-jersey': $page = 'revocatorias_nj';break;
                                case 'contratos-en-new-jersey': $page = 'contratos_nj';break;
                                case 'testamentos-en-new-jersey': $page = 'testamentos_nj';break;
                                case 'affidavit-support-en-new-jersey': $page = 'affidavit_nj';break;
                                default: $page = "lead_general_u"; break;
                            }
                            break;

                        case 'web.oficina.florida':
                            switch ($request->servicename) {
                                //FLORIDA
                                case 'poder-notarial-florida': $page = 'poder_notarial_fl'; break;
                                case 'apostillar-documentos-florida': $page = 'apostilla_fl'; break;
                                case 'traducir-documentos-florida': $page = 'traducciones_fl'; break;
                                case 'travel-authorization-en-florida': $page = 'travel_auth_fl'; break;
                                case 'certificaciones-en-florida': $page = 'certificaciones_fl'; break;
                                case 'acuerdos-en-florida': $page = 'acuerdos_fl';break;
                                case 'cartas-de-invitacion-en-florida': $page = 'carta_inv_fl';break;
                                case 'revocatorias-en-florida': $page = 'revocatorias_fl';break;
                                case 'contratos-en-florida': $page = 'contratos_fl';break;
                                case 'testamentos-en-florida': $page = 'testamentos_fl';break;
                                case 'matrimonios-en-florida': $page = 'matrimonios_fl';break;
                                default: $page = "lead_general_u"; break;
                            }
                            break;
                        
                        default: break;
                    }
                }

                // $header='';
                // $header .= 'From: <'.$page.'@notarialatina.com>' . "\r\n";
                // $header .= "MIME-Version: 1.0\r\n";
                // $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // $message = "<strong>Prueba de envio</strong>";

                // $sended = mail('sebas31051999@gmail.com', 'Prueba de envio', $message, $header);

                // if($sended) return "se envio el correo";
                // else return "error al enviar";
    
                $message = "<br><strong>Nuevo Lead</strong>
                <br><b> Nombre: </b> ". strip_tags($request->fname) . " " . strip_tags($request->lname) . "
                <br><b> País: </b> " . strip_tags($country);

                // <br> Interes: ".strip_tags($interest)." se quito de debajo de email

                // if(isset($request->email)){
                //     $this->setEmailToLead($request->fname, $request->email);
                // }
    
                // <br> País: ". strip_tags($pais)."
            
                $header='';
                // if(isset($request->service)) $fromheader = strtolower($request->service)."_home";    
                // else $fromheader = "lead_" . strtolower(str_replace(' ', '', $from));

                $header .= 'From: <'.$page.'@notarialatina.com>' . "\r\n";
                $header .= "MIME-Version: 1.0\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                //mail('notariapublicalatina@gmail.com'.$sendoffices,'Lead '.Str::ucfirst($from).': '.strip_tags($request->fname), $message, $header);
                $sended = mail('sebas31051999@gmail.com','Lead prueba', $message, $header);   
                //mail($sendoffices,'Lead '.Str::ucfirst($from).': '.strip_tags($request->fname), $message, $header);   
                if($sended) return "se envio";
                else return "no se envio";
            }

        }
        return view('landing.thank');
    }

    public function thankpostnj (Request $request)
    {

        //return $request;

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
    
            $abrev = "";
            $sendoffices = ',servicios@notarialatina.com';
            if ($interest == 'General'){             $sendoffices = ',servicios@notarialatina.com'; $office = 'General';}
            if ($interest == 'Landing New York'){    $sendoffices = ',newyork@notarialatina.com';$abrev='_ny'; $office = 'New York';}
            if ($interest == 'Landing New Jersey'){  $sendoffices = ',newjersey@notarialatina.com';$abrev='_nj'; $office = 'New Jersey';}
            if ($interest == 'Landing Florida'){     $sendoffices = ',florida@notarialatina.com';$abrev='_fl'; $office = 'Florida';}

            switch ($request->service) {
                case 'Apostilla': $page = 'apostilla_landing' . $abrev; break;
                case 'Poderes':
                case 'Poder Notariado': $page = 'poderes_landing' . $abrev; break;
                case 'Traduccion': $page = 'traduccion_landing' . $abrev; break;
                case 'Affidavit': $page = 'affidavit_landing' . $abrev; break;
                case 'Acuerdos': $page = 'acuerdos_landing' . $abrev; break;
                case 'Autorización de Viaje': $page = 'autorizacion_landing' . $abrev; break;
                case 'Cartas de Invitación': $page = 'carta_inv_landing' . $abrev; break;
                case 'Certificaciones': $page = 'certificacion_landing' . $abrev; break;
                case 'Contratos': $page = 'contratos_landing' . $abrev; break;
                case 'Revocatorias': $page = 'revocatoria_landing' . $abrev; break;
                case 'Testamentos': $page = 'testamentos_landing' . $abrev; break;
                case 'Otro': $page = 'tramite_landing' . $abrev; break;
                default: $page = 'lead_landing' . $abrev; break;
            }

            $token = 'KEY017C562DF36C32F89898F8D77773A25F_mu0OEZ7QDrNc2WRWCEgaHG';
            $datasend = [ 'name'=> strip_tags($request->aaa)." ". strip_tags($request->lname), 'country' => strip_tags($request->pais), 'state' => strip_tags($request->state), 'code' => strip_tags($request->codpais), 'phone' => strip_tags($request->bbb), 'email' =>  '', 'interest' => strip_tags($request->service), 'office' => strip_tags($office), 'message' => strip_tags($request->ddd), 'from' => url()->previous(), 'created_at'=> Carbon::now()->subHour(5)->format('Y-m-d H:i:s') ];    
            $postdata = json_encode($datasend);
            $opts = [ "http" => [ "method" => "POST", 'header' => "Content-Type: application/json\r\n". "x-auth-token: $token\r\n", 'content' => $postdata ], ]; 
            $context = stream_context_create($opts);
            file_get_contents('https://notarialatina.vercel.app/api/email', false, $context);
    
            $message = "<br><strong>Nuevo Lead Landing</strong>
                        <br> Nombre: ". strip_tags($request->aaa)."
                        <br> Telef: ".strip_tags($request->codpais). " ".  strip_tags($request->bbb)."
                        <br> País: " .strip_tags($request->pais)."
                        <br> Estado: " . strip_tags($request->state) . "
                        <br> Mensaje: ".strip_tags($request->ddd)." 
                        <br> Interes: " .strip_tags($request->service_aux) ."
                        <br> Proveniente: ".  strip_tags($interest)."
                        <br> Fuente: GoogleAds 
                        <br> Hora: " . Carbon::now()->subHour(5)->format('Y-m-d H:i:s') . "
                        <br> Página: " . url()->previous() . "
                        ";
                        
            $header='';
            $header .= 'From: <'.$page.'@notarialatina.com>' . "\r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail('notariapublicalatina@gmail.com'.$sendoffices,'Lead '.$interest.": ".strip_tags($request->aaa), $message, $header);      
            mail('sebas31051999@gmail.com','Lead '.$interest.": ".strip_tags($request->aaa), $message, $header);
            //'notariapublicalatina@gmail.com'.$sendoffices
        }

        return view('landing.thank');

        //'notariapublicalatina@gmail.com'.$sendoffices
    }

    public function setEmailToLead($name, $email){
        $posts = Post::select('slug', 'name')->where('status', 'PUBLICADO')->inRandomOrder()->limit(3)->get();
        $post1="";$post2="";$post3="";
        for ($i=0; $i < 3; $i++) { 
            switch ($i) {
                case 0: $post1 = $posts[$i]; break;
                case 1: $post2 = $posts[$i]; break;
                case 2: $post3 = $posts[$i]; break;
                default:break;
            }
        }
        $subject = 'Gracias por contactarse con Notaria Latina';
        $message = "
        <div style='border: 0.5px solid #AA9389; padding: 30px; border-radius: 10px'>
            <div>
                <div style='text-align:center'>
                    <a href='https://notarialatina.com'><img style='margin-top:20px; width:150px' src='https://notarialatina.com/img/partners/WEB-HEREDADO.png' alt='IMAGEN NOTARIA LATINA'></a>
                </div>
            </div>
            <div>
                <h1 style='text-align:center'>¡Gracias " . strip_tags($name) ." por confiar en nosotros!</h1>
                <h4>Su solicitud está siendo procesada, en breve un asesor se pondrá en contacto con usted para ayudarlo con el trámite</h4>
                <p>
                    Brindamos diferentes servicios de Notaria como:
                <p>
                <ul>
                    <li><a href='https://notarialatina.com/apostillas'>🖋 Apostillas</a></li>
                    <li><a href='https://notarialatina.com/poderes'>📃 Poderes</a></li>
                    <li><a href='https://notarialatina.com/traducciones'>📝 Traducciones</a></li>
                </ul>
            </div>
            <hr style='margin-top: 25px'>
            <h4>Algunos artículos que pueden interesarle:</h4>
            <ul>
                <li><i><a href='https://notarialatina.com/post/".$post1->slug."'>".$post1->name."</a></i></li>
                <li><i><a href='https://notarialatina.com/post/".$post2->slug."'>".$post2->name."</a></i></li>
                <li><i><a href='https://notarialatina.com/post/".$post3->slug."'>".$post3->name."</a></i></li>
            </ul>
            <hr style='margin-top: 25px'>
            <div style='margin-top:10px'>
                <h3>¡Notaria Latina agradece su confianza en nosotros! 😉</h3>
            </div>
        </div>
        ";

        $header = 'From: <no-reply@notarialatina.com>' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n".
        'Content-type:text/html;charset=UTF-8' . "\r\n"
        ;

        mail($email, $subject, $message, $header);
    }

    // correo notariapublicalatina@gmail.com
    // New Jersey
    public function newjersey() {
        $data['oficina'] = 'New Jersey';
        $data['header'] = 'Notaría Pública <br> <b>New Jersey</b> <br> Gestión Fácil y Rápida';
        $data['service_aux'] = 'General';
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
        $data['tlfwpp'] = '19088009046';
        $data['reviews'] = $this->reviewsnj;
        $data['more_reviews'] = $this->more_reviewsnj;
        return view('landing.general',$data);
    }

    public function njweb() {
        $data['oficina'] = 'New Jersey';
        $data['header'] = 'Notaría Pública <br> New Jersey <br> Gestión Fácil y Rápida';
        $data['service_aux'] = 'General';
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
        $data['tlfwpp'] = '19088009046';
        $data['reviews'] = $this->reviewsnj;
        $data['more_reviews'] = $this->more_reviewsnj;
        return view('landing.general',$data);
    }  

    public function njtrad() {
        $data['oficina'] = 'New Jersey';
        $data['header'] = 'Traducción de documentos <br> en New Jersey';  
        $data['service_aux'] = 'Traduccion';
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
        $data['tlfwpp'] = '19088009046';
        $data['reviews'] = $this->reviewsnj;
        $data['more_reviews'] = $this->more_reviewsnj;
        return view('landing.general',$data);
    }  

    //Me quedo hasta aqui
    public function njpod() {
        $data['oficina'] = 'New Jersey';
        $data['header']  = 'Poder Especial o General <br> en New Jersey'; 
        $data['service_aux'] = 'Poderes';
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
        $data['tlfwpp'] = '19088009046';
        $data['reviews'] = $this->reviewsnj;
        $data['more_reviews'] = $this->more_reviewsnj;
        return view('landing.general',$data);
    }   

    public function njapos() {
        $data['oficina'] = 'New Jersey';
        $data['header'] = 'Apostilla de documentos <br> en New Jersey';
        $data['service_aux'] = 'Apostilla';
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
        $data['tlfwpp'] = '19088009046';
        $data['reviews'] = $this->reviewsnj;
        $data['more_reviews'] = $this->more_reviewsnj;
        return view('landing.general',$data);
    }


    // New York
    public function newyork() {
        $data['oficina'] = 'New York';
        $data['header'] = 'Notaría Pública <br> <b>New York</b> <br> Gestión Fácil y Rápida';
        $data['service_aux'] = 'General';
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
        $data['reviews'] = $this->reviewsny;
        $data['more_reviews'] = $this->more_reviewsny;
        return view('landing.general',$data);
    }

    public function nyweb() {
        $data['oficina'] = 'New York';
        $data['header'] = 'Notaría Pública <br> <b>New York</b> <br> Gestión Fácil y Rápida';
        $data['service_aux'] = 'General';
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
        $data['reviews'] = $this->reviewsny;
        $data['more_reviews'] = $this->more_reviewsny;
        return view('landing.general',$data);
    }  

    public function nytrad() {
        $data['oficina'] = 'New York';
        $data['header'] = 'Traducción de documentos <br> en New York';  
        $data['service_aux'] = 'Traduccion';
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
        $data['reviews'] = $this->reviewsny;
        $data['more_reviews'] = $this->more_reviewsny;
        return view('landing.general',$data);
    }  

    public function nypod() {
        $data['oficina'] = 'New York';
        $data['header']  = 'Poder Especial o General <br> en New York'; 
        $data['service_aux'] = 'Poderes';
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
        $data['reviews'] = $this->reviewsny;
        $data['more_reviews'] = $this->more_reviewsny;
        return view('landing.general',$data);
    }   

    public function nyapos() {
        $data['oficina'] = 'New York';
        $data['header'] = 'Apostilla de documentos <br> en New York';
        $data['service_aux'] = 'Apostilla';
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
        $data['reviews'] = $this->reviewsny;
        $data['more_reviews'] = $this->more_reviewsny;
        return view('landing.general',$data);
    }  

    


    // Florida
    public function florida() {
        $data['oficina'] = 'Florida';
        $data['header'] = 'Notaría Pública <br> <b>Florida</b> <br> Gestión Fácil y Rápida';
        $data['service_aux'] = 'General';
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
        $data['reviews'] = $this->reviewsfl;
        $data['more_reviews'] = $this->more_reviewsfl;
        return view('landing.general',$data);
    }

    public function flweb() {
        $data['oficina'] = 'Florida';
        $data['header'] = 'Notaría Pública <br> <b>Florida</b> <br> Gestión Fácil y Rápida';
        $data['service_aux'] = 'General';
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
        $data['reviews'] = $this->reviewsfl;
        $data['more_reviews'] = $this->more_reviewsfl;
        return view('landing.general',$data);
    }  

    public function fltrad() {
        $data['oficina'] = 'Florida';
        $data['header'] = 'Traducción de documentos <br> en Florida';  
        $data['service_aux'] = 'Traduccion';
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
        $data['reviews'] = $this->reviewsfl;
        $data['more_reviews'] = $this->more_reviewsfl;
        return view('landing.general',$data);
    }  

    public function flpod() {
        $data['oficina'] = 'Florida';
        $data['header']  = 'Poder Especial o General <br> en Florida'; 
        $data['service_aux'] = 'Poderes';
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
        $data['reviews'] = $this->reviewsfl;
        $data['more_reviews'] = $this->more_reviewsfl;
        return view('landing.general',$data);
    }   

    public function flapos() {
        $data['oficina'] = 'Florida';
        $data['header'] = 'Apostilla de documentos <br> en Florida';
        $data['service_aux'] = 'Apostilla';
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
        $data['reviews'] = $this->reviewsfl;
        $data['more_reviews'] = $this->more_reviewsfl;
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

    // public function storelead(Request $request){
        
    //     $lead = Lead::create([
    //         'name' => Purify::clean($request->name),
    //     ]);
    // }
}
