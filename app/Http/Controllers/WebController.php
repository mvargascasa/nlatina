<?php

namespace App\Http\Controllers;

use App\Consulate;
use App\Country;
use App\Http\Traits\GetCodByCountryTrait;
use App\Http\Traits\GetCountryByCodTrait;
use App\Mail\SendLead;
use App\Partner;
use App\Post;
use App\Rating;
use App\Specialty;
use App\State;
use Illuminate\Http\Request;
use Session;

class WebController extends Controller
{
    use GetCountryByCodTrait, GetCodByCountryTrait;

    public function index() {
        $indexPosts = Post::select('name', 'body', 'slug', 'created_at')
            ->where('status','PUBLICADO')
            ->latest()
            ->limit(6)
            ->get();
        return view('index',compact('indexPosts'));  
    }
    public function apostillas()
    {
        return view('web.apostillas');
    }
    public function showpost(Request $request)
    {
        $posts = Post::where('status','PUBLICADO')->orderBy('id','desc')->limit(3)->get();
        $post = Post::where('slug', $request->slug)->where('status','PUBLICADO')->first();

        if($post){
            return view('web.post.show',compact('post','posts'));
        }else{
            return redirect()->route('post.blog');
        }
    }
    public function showblog()
    {
        $posts = Post::where('status','PUBLICADO')->orderBy('id','desc')->paginate(12);
        return view('web.post.index',compact('posts'));
    }
    
    public function consulado(Request $request)
    {
        //$consuls = Consulate::orderBy('country')->get();
        $consul = Consulate::where('slug', $request->slug)->first();
        
        $posts = Post::where('status','PUBLICADO')->orderBy('id','desc')->limit(3)->get();

        if($consul){
            return view('web.consul.a-show',compact('consul','posts',));
        }else{
            return redirect()->route('consul.index');
        }
    }
    
    public function consulados()
    {
        $consuls = Consulate::orderBy('country')->get();
        return view('web.consul.all',compact('consuls'));
    }

    public function showAllPartners(Request $request){
        // $countries = Partner::select('country_residence')
        // ->where('status', 'PUBLICADO')
        // ->distinct()
        // ->get();

        $countries = Country::select(['name_country', 'id'])->get();

        $specialties = Specialty::all();           

        $country = $request->get('country');
        $specialty = $request->get('specialty');
        $state = $request->get('state');

        $partners = Partner::select(['id', 'img_profile', 'name', 'lastname', 'title', 'state', 'codigo_pais', 'specialty', 'country_residence', 'phone', 'email', 'slug'])
                ->where('status', 'PUBLICADO')
                ->orderBy('id', 'DESC')
                ->country($country)
                ->state($state)
                ->specialties($specialty)
                ->distinct()
                ->get();


        return view('web.partners', compact('countries', 'specialties', 'partners'));
        
    }

    public function search(Request $request){
        $countries = Country::select(['name_country', 'id'])->get();

        $specialties = Specialty::all();           

        $country = $request->get('country');
        $specialty = $request->get('specialty');
        $state = $request->get('state');

        $partners = Partner::select(['id', 'img_profile', 'name', 'lastname', 'title', 'state', 'codigo_pais', 'specialty', 'country_residence', 'phone', 'email', 'slug'])
                ->where('status', 'PUBLICADO')
                ->orderBy('id', 'DESC')
                ->country($country)
                ->state($state)
                ->specialties($specialty)
                ->distinct()
                ->get();

        return response()->json([
            'viewPartnersCountry' => view('web.partials.view_partners', compact('countries', 'specialties', 'partners'))
        ]);
    }

    public function fetchStateAfter(Request $request){
        $states = State::where('country_id', $request->id)->get();
        return response()->json($states);
    }

    public function fetchState(Request $request){
        
        $dataToLoad = 12;

        if($request->dataLoad != null){
            $dataToLoad = $dataToLoad + $request->dataLoad;
        }

        $countries = Country::select(['id', 'name_country'])->get();
        $states = State::where('country_id', $request->country)->get();
        $partners = Partner::select(['id', 'img_profile', 'name', 'lastname', 'title', 'state', 'codigo_pais', 'specialty', 'country_residence', 'phone', 'email', 'slug'])
                ->where('status', 'PUBLICADO')
                ->orderBy('id', 'DESC')
                ->country($request->country)
                ->state($request->state)
                ->specialties($request->specialty)
                ->limit($dataToLoad)
                ->get();

        $partnersCount = Partner::where('status', 'PUBLICADO')
                    ->orderBy('id', 'DESC')
                    ->country($request->country)
                    ->state($request->state)
                    ->specialties($request->specialty)
                    ->get();
        $totalPartners = $partnersCount->count();
        
        $specialties = Specialty::select(['id', 'name_specialty'])->get();

        return response()->json([
            'viewPartners' => view('web.partials.view_partners', compact('countries', 'states', 'partners', 'specialties', 'totalPartners'))->render()
        ]);
    }

    public function showPartner($slug){
        $partner = Partner::where('slug', $slug)->first(); 
        return view('web.partner', compact('partner'));
    }

    public function oficinasny(?string $service = null){
        $data['telfHidden'] = '+13479739888';
        $data['telfWpp'] = '13479739888';
        $data['telfShow'] = '347-973-9888';
        $data['office'] = 'New York';
        $data['keywords'] = 'apostillar cerca de mi, apostille near me, apostille new york, apostillar new york, apostillar documentos rapido new york, apostillar documentos new york, donde puedo apostillar un documento, donde apostillar en new york, apostillado de documentos, fast document apostille new york';
        if($service != null){
            switch ($service) {
                case 'certificaciones-en-new-york':
                    return view('web.office.certificaciones', compact('data'));
                    break;
                case 'travel-authorization-en-new-york':
                    return view('web.office.authorization', compact('data'));
                    break;
                case 'acuerdos-en-new-york':
                    return view('web.office.acuerdos', compact('data'));
                    break;
                case 'cartas-de-invitacion-en-new-york':
                    return view('web.office.invitacion', compact('data'));
                    break;
                case 'revocatorias-en-new-york':
                    return view('web.office.revocatorias', compact('data'));
                    break;
                case 'contratos-en-new-york':
                    return view('web.office.contratos', compact('data'));
                    break;
                case 'testamentos-en-new-york':
                    return view('web.office.testamentos', compact('data'));
                    break;
                case 'motor-vehicle-comission-en-new-york':
                    return view('web.office.vehicle_comission', compact('data'));
                    break;
                case 'poder-notarial-new-york':
                    return view('web.office.poderes', compact('data'));
                    break;
                case 'traducir-documentos-new-york':
                    return view('web.office.traducciones', compact('data'));
                    break;
                case 'apostillar-documentos-new-york':
                    return view('web.office.apostillas', compact('data'));
                    break;
                case 'affidavit-support-new-york':
                    return view('web.office.affidavit', compact('data'));
                    break;
                case 'motor-vehicle-commission-en-new-york':
                    return view('web.office.vehicle_comission', compact('data'));
                    break;
                case 'apostillar-certificado-de-nacimiento-new-york':
                    $data['description'] = 'Certificados de Nacimiento';
                    $data['metadescription'] = "Apostillamos Certificados de Nacimiento en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar acta de nacimiento near me, apostillar partida de nacimiento new york, apostillar inscripcion de nacimiento new york, apostillar certificado de nacimiento new york, apostillar acta de nacimiento new york, donde apostillar certificado de nacimiento en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-reporte-consular-new-york':
                    $data['description'] = 'Reporte Consular';
                    $data['metadescription'] = "Apostillamos Reporte Consular CRBA Nacidos en el Extranjero en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar crba near me, apostillar crba new york, apostillar reporte consular de nacimiento en el extranjero new york, apostillar certificado de nacimiento en el extranjero new york, apostillar inscripcion de nacimiento extranjero new york, apostillar acta de nacimiento extranjero new york, apostille birth certificate abroad new york, donde apostillar crba en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificados-de-matrimonio-new-york':
                    $data['description'] = 'Certificados de Matrimonio';
                    $data['metadescription'] = "Apostillamos Certificados de Matrimonio en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar certificado de matrimonio near me, apostillar certificado de matrimonio en new york, apostillar acta de matrimonio en new york, apostilla matrimonio new york, apostillar partida de matrimonio new york, apostille marriage certificate, apostille marriage certificate new york, donde apostillar certificado de matrimonio en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-defuncion-new-york':
                    $data['description'] = 'Certificados de Defunción';
                    $data['metadescription'] = "Apostillamos Certificados de Defunción en New York de una manera ágil y rápida";
                    $data['keywords'] .= ", apostillar certificado de defuncion, apostillar certificado de defuncion near me, apostillar certificado de defuncion en new york, apostillar acta de defuncion en new york, como apostillar un certificado de defuncion, apostillado de certificado de defuncion, apostille death certificate new york, apostille death certificate near me, donde apostillar certificado de defuncion en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-divorcio-new-york':
                    $data['description'] = 'Certificados de Divorcio';
                    $data['metadescription'] = "Apostillamos Certificados de Divorcio en New York de una manera ágil y rápida";
                    $data['keywords'] .= ", apostillar certificado de divorcio, apostillar acta de divorcio, apostillar certificado de divorcio near me, apostillar certificado de divorcio en new york, apostilllar acta de divorcio new york, apostillar sentencia de divorcio new york, apostille divorce certificate new york, apostille divorce certificate near me, donde apostillar certificado de divorcio en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-naturalizacion-new-york':
                    $data['description'] = 'Certificados de Naturalización';
                    $data['metadescription'] = "Apostillamos Certificados de Naturalización en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar certificado de naturalizacion, apostillar acta de naturalizacion, apostillar certificado de naturalizacion near me, apostillar certificado de naturalizacion new york, apostillar acta de naturalizacion new york, apostille naturalization certificate near me, apostille naturalization certificate new york, donde apostillar certificado de naturalizacion en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-expediente-de-adopcion-new-york':
                    $data['description'] = 'Expediente de Adopción';
                    $data['metadescription'] = "Apostillamos Expediente de Adopción en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar expediente de adopcion, apostillar expediente de adopcion near me, apostillar expediente de adopcion new york, apostille adoption file, apostille adoption file near me, apostille adoption file new york, donde apostillar expediente de adopcion en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-copia-de-pasaporte-new-york':
                    $data['description'] = 'Copia de pasaporte';
                    $data['metadescription'] = "Apostillamos Copia de Pasaporte en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar copia de pasaporte, apostillar copia de pasaporte near me, apostillar copia de pasaporte new york, apostille copy of passport, apostille copy of passport near me, apostille copy of passport new york, donde apostillar copia de pasaporte en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-copia-de-licencia-de-conducir-new-york':
                    $data['description'] = 'Copia de Licencia de Conducir';
                    $data['metadescription'] = "Apostillamos Copia de Licencia de Conducir en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar copia de licencia de conducir, apostillar copia de licencia de conducir near me, apostillar copia de licencia de conducir new york, apostille copy of driver's license, apostille copy of driver's license near me, apostille copy of driver's license new york, donde apostillar copia de licencia de conducir en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-escrituras-testamentos-new-york':
                    $data['description'] = 'Escrituras y Testamentos';
                    $data['metadescription'] = "Apostillamos Escrituras y/o Testamentos en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar escrituras, apostillar testamento, apostillar escrituras near me, apostillar testamentos near me, apostillar escrituras new york, apostillar testamentos new york, apostille deeds near me, apostille deeds new york, apostille wills near me, apostille wills new york, donde apostillar escrituras en new york, donde apostillar testamentos en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-declaraciones-juradas-de-estado-unico-new-york':
                    $data['description'] = 'Declaraciones Juradas';
                    $data['metadescription'] = "Apostillamos Declaraciones Juradas en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar affidavit, apostillar declaracion jurada, apostillar affidavit near me, apostillar declaracion jurada near me, apostillar affidavit near me, apostillar declaracion jurada new york, apostille affidavit, donde apostillar affidavit en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-titulo-de-automovil-new-york':
                    $data['description'] = 'Título de coche/automóvil';
                    $data['metadescription'] = "Apostillamos Título de automóvil en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar titulo de automovil, apostillar titulo de automovil near me, apostillar titulo de automovil new york, apostille car title, apostille car title near me, apostille car title new york, donde apostillar titulo de automovil en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-autorizacion-de-viaje-new-york':
                    $data['description'] = 'Autorización de Viaje';
                    $data['metadescription'] = "Apostillamos Autorización de Viaje  en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar autorizacion de viaje, apostillar autorizacion de viaje near me, apostillar autorizacion de viaje new york, apostille travel authorization, apostille travel authorization near me, apostille travel authorization new york, donde apostillar autorizacion de viaje en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-poder-notarial-personal-new-york':
                    $data['description'] = 'Poder Notarial Personal';
                    $data['metadescription'] = "Apostillamos Poder Notarial Personal en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar poder notarial, apostillar carta poder new york, apostillar poder notarial near me, apostillar poder notarial new york, apostillar poder personal new york, apostille power of attorney, apostille power of attorney new york, donde apostillar carta poder en new york, donde apostillar poder notarial en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-registro-de-policia-estatal-new-york':
                    $data['description'] = 'Registro de la policía estatal';
                    $data['metadescription'] = "Apostillamos Registro de Policía Estatal en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar registro policial, apostillar registro de policia estatal, apostillar registro policial near me, apostillar registro policial new york, apostille police record new york, apostill police record new york, donde apostillar registro policial new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-registro-de-antecedentes-fbi-new-york':
                    $data['description'] = 'Registros de antecedentes del FBI';
                    $data['metadescription'] = "Apostillamos Registros de antecedentes del FBI en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar antecedentes del fbi, apostillar registro de antecentes del fbi, apostillar registros de antecedentes del fbi near me, apostillar registros de antecedentes del fbi new york, apostille fbi background check new york, donde apostillar antecedentes del fbi new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-diploma-universitario-new-york':
                    $data['description'] = 'Diploma Universitario';
                    $data['metadescription'] = "Apostillamos Diploma Universitario en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar diploma, apostillar diploma universitario near me, apostillar diploma universitario new york, apostillar titulo universitario new york, apostille university diploma new york, donde apostillar diploma universitario en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-transcripcion-universitaria-new-york':
                    $data['description'] = 'Transcripción Universitaria';
                    $data['metadescription'] = "Apostillamos Transcripción Universitaria en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar transcripcion universitaria, apostillar transcripcion universitaria near me, apostillar transcripcion universitaria new york, apostillar transcripcion titulo universitario new york, apostille university transcript new york, donde apostillar transcripcion universitaria new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-diploma-de-escuela-secundaria-new-york':
                    $data['description'] = 'Diploma de Escuela Secundaria';
                    $data['metadescription'] = "Apostillamos Diploma de Escuela Secundaria en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar diploma secundario, apostillar diploma escuela secundaria, apostillar diploma escuela secundaria near me, apostillar diploma escuela secundaria new york, apostille high school diploma new york, donde apostillar diploma secundaria en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-transcripcion-de-escuela-secundaria-new-york':
                    $data['description'] = 'Transcripción de Escuela Secundaria';
                    $data['metadescription'] = "Apostillamos Transcripción de Escuela Secundaria en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar transcripcion de escuela secundaria, apostillar transcripcion de escuela secundaria near me, apostillar transcripcion de escuela secundaria new york, apostille high school transcript new york, donde apostillar transcripcion de escuela secundaria new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-incorporacion-new-york':
                    $data['description'] = 'Certificado de Incorporación';
                    $data['metadescription'] = "Apostillamos Certificado de Incorporación en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar certificado de incorporacion, apostillar acta de incorporacion, apostillar certificado de incorporacion near me, apostillar certificado de incorporacion new york, apostille certificate of incorporation new york, donde apostillar certificado de incorporacion en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-buena-reputacion-new-york':
                    $data['description'] = 'Certificado de Buena Reputación';
                    $data['metadescription'] = "Apostillamos Certificados de Buena Reputación en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar certificado de buena reputacion, apostillar certificado de buena reputacion near me, apostillar certificado de buena reputacion new york, apostille certificate of good standing new york, donde apostillar certificado de buena reputacion en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-origen-new-york':
                    $data['description'] = 'Certificado de Origen';
                    $data['metadescription'] = "Apostillamos Certificados de Origen en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar certificado de origen, apostillar certificado de origen near me, apostillar certificado de origen new york, apostille certificate of origin new york, donde apostillar certificado de origen en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-marca-patente-new-york':
                    $data['description'] = 'Marcas o Patentes';
                    $data['metadescription'] = "Apostillamos Marcas o Potentes en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar marca new york, apostillar patente new york, apostillar marca near me, apostillar patente near me, apostillar marca, apostille mark new york, apostille patent new york, donde apostillar marca en new york, donde apostillar patente en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-poder-comercial-new-york':
                    $data['description'] = 'Poder Comercial';
                    $data['metadescription'] = "Apostillamos Poder Comercial en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar poder comercial,  apostillar poder comercial new york, apostillar poder comercial near me, apostille commercial power new york, donde apostillar poder comercial new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-declaracion-jurada-comercial-new-york':
                    $data['description'] = 'Declaración Jurada Comercial';
                    $data['metadescription'] = "Apostillamos Declaración Jurada Comercial en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar declaracion jurada comercial, apostillar affidavit comercial, apostillar declaracion jurada comercial near me, apostillar declaracion jurada comercial new york, apostille commercial affidavit new york, apostillar affidavir comercial new york, donde apostillar affidavit comercial en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-fda-new-york':
                    $data['description'] = 'Certificado FDA';
                    $data['metadescription'] = "Apostillamos Certificado FDA en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar certificado fda, apostillar certificado fda near me, apostillar certificado fda new york, apostille fda certificate new york, donde apostillar certificado fda en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-facturas-new-york':
                    $data['description'] = 'Facturas';
                    $data['metadescription'] = "Apostillamos Facturas en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar facturas, apostillar facturas near me, apostillar factura new york, apostille invoices new york, donde apostillar facturas en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;   
                case 'apostillar-departamento-de-hacienda-new-york':
                    $data['description'] = 'Departamento de Hacienda';
                    $data['metadescription'] = "Apostillamos Departamento de Hacienda en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar documento departamento de hacienda, apostillar departamento de hacienda near me, apostillar departamento de hacienda new york, apostille department of finance new york, donde apostillar departamento de hacienda en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-gobierno-extranjero-new-york':
                    $data['description'] = 'Certificado de Gobierno Extranjero';
                    $data['metadescription'] = "Apostillamos Certificado de Gobierno Extranjero en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar certificado de gobierno extranjero, apostillar certificado de gobierno extranjero near me, apostillar certificado de gobierno extranjero new york, apostille foreign government certificate new york, apostillar certificado de gobierno extranjero en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-venta-gratis-new-york':
                    $data['description'] = 'Certificado de Venta gratis';
                    $data['metadescription'] = "Apostillamos Certificados de Venta en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar certificado de venta, apostillar acta de venta, apostillar certificado de venta near me, apostillar acta de venta near me, apostillar certificado de venta new york, apostillar acta de venta new york, apostille sales certificate new york, donde apostillar certificado de venta en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-ordenes-de-compra-new-york':
                    $data['description'] = 'Órdenes de compra';
                    $data['metadescription'] = "Apostillamos Órdenes de Compra en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar orden de compra, apostillar orden de compra near me, apostillar orden de compra new york, apostille purchase order new york, donde apostillar orden de compra en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                default:
                    # code...
                    break;
            }
        } else {
            //$data['oficina'] = 'New York';
            $data['title'] = 'Apostillas en New York';
            $data['subtitle'] = '¡Apostillamos todo tipo de documentos para New York!';
            $data['imggrid'] = 'img/oficinas/ICONOS-15.webp';
            $data['txtgrid'] = 'Motor Vehicle Commission';
            $data['telfHidden'] = '+13479739888';
            $data['telfWpp'] = '13479739888';
            $data['telfShow'] = '347-973-9888';
            $data['imgapostilla'] = 'img/oficinas/apostillany.webp';
            $data['imgup'] = 'img/oficinas/BANER-NEW-YORK.jpg';
            $data['imgdown'] = 'img/oficina-notaria-latina-newyork.jpg';
            $data['widthimgdown'] = '90%';
            $data['heightimgdown'] = '100%';
            $data['paddingtop'] = '0px';
            $data['urlmap'] = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.7118327106805!2d-73.90010968459403!3d40.74636597932825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25f030415024b%3A0x3b391bcaf4cd7c10!2sNotaria%20Latina%20-%20Queens%20New%20York!5e0!3m2!1ses-419!2sec!4v1642622200464!5m2!1ses-419!2sec';
            $data['metadescription'] = 'Apostillamos todo tipo de documentos en New York, de una manera rápida y segura';
            $data['keywords'] = 'notaria en new york, notarizar en new york, notaria cerca de mi, notary near me, apostille near me, apostille new york, carta poder en new york, traduccion en new york, apostillar documentos en new york, affidavít en new york, travel authorization en new york, certificar documentos en new york';

            return view('web.oficina', compact('data'));
        }
    }

    public function oficinasnj(?string $service = null){
        $data['telfHidden'] = '+19088009046';
        $data['telfWpp'] = '19088009046';
        $data['telfShow'] = '908-800-9046';
        $data['office'] = 'New Jersey';
        if($service != null){
            switch ($service) {
                case 'certificaciones-en-new-jersey':
                    return view('web.office.certificaciones', compact('data'));
                    break;
                case 'travel-authorization-en-new-jersey':
                    return view('web.office.authorization', compact('data'));
                    break;
                case 'acuerdos-en-new-jersey':
                    return view('web.office.acuerdos', compact('data'));
                    break;
                case 'cartas-de-invitacion-en-new-jersey':
                    return view('web.office.invitacion', compact('data'));
                    break;
                case 'revocatorias-en-new-jersey':
                    return view('web.office.revocatorias', compact('data'));
                    break;
                case 'contratos-en-new-jersey':
                    return view('web.office.contratos', compact('data'));
                    break;
                case 'testamentos-en-new-jersey':
                    return view('web.office.testamentos', compact('data'));
                    break;
                case 'motor-vehicle-comission-en-new-jersey':
                    return view('web.office.vehicle_comission', compact('data'));
                    break;
                case 'poder-notarial-new-jersey':
                    return view('web.office.poderes', compact('data'));
                    break;
                case 'traducir-documentos-new-jersey':
                    return view('web.office.traducciones', compact('data'));
                    break;
                case 'apostillar-documentos-new-jersey':
                    return view('web.office.apostillas', compact('data'));
                    break;
                case 'affidavit-support-new-jersey':
                    return view('web.office.affidavit', compact('data'));
                    break;
                case 'motor-vehicle-commission-en-new-jersey':
                    return view('web.office.vehicle_comission', compact('data'));
                    break;
                case 'apostillar-certificado-de-nacimiento-new-jersey':
                    $data['description'] = 'Certificados de Nacimiento';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-reporte-consular-new-jersey':
                    $data['description'] = 'Reporte Consular';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-matrimonio-new-jersey':
                    $data['description'] = 'Certificados de Matrimonio';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-defuncion-new-jersey':
                    $data['description'] = 'Certificados de Defunción';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-divorcio-new-jersey':
                    $data['description'] = 'Certificados de Divorcio';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-naturalizacion-new-jersey':
                    $data['description'] = 'Certificados de Naturalización';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-expediente-de-adopcion-new-jersey':
                    $data['description'] = 'Expediente de Adopción';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-copia-de-pasaporte-new-jersey':
                    $data['description'] = 'Copia de pasaporte';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-copia-de-licencia-de-conducir-new-jersey':
                    $data['description'] = 'Copia de Licencia de Conducir';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-escrituras-testamentos-new-jersey':
                    $data['description'] = 'Escrituras y Testamentos';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-declaraciones-juradas-de-estado-unico-new-jersey':
                    $data['description'] = 'Declaraciones Juradas';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-titulo-de-automovil-new-jersey':
                    $data['description'] = 'Título de coche/automóvil';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-autorizacion-de-viaje-new-jersey':
                    $data['description'] = 'Autorización de Viaje';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-poder-notarial-personal-new-jersey':
                    $data['description'] = 'Poder Notarial Personal';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-registro-de-policia-estatal-new-jersey':
                    $data['description'] = 'Registro de la policía estatal';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-registro-de-antecedentes-fbi-new-jersey':
                    $data['description'] = 'Registros de antecedentes del FBI';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-diploma-universitario-new-jersey':
                    $data['description'] = 'Diploma Universitario';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-transcripcion-universitaria-new-jersey':
                    $data['description'] = 'Transcripción Universitaria';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-diploma-de-escuela-secundaria-new-jersey':
                    $data['description'] = 'Diploma de Escuela Secundaria';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-transcripcion-de-escuela-secundaria-new-jersey':
                    $data['description'] = 'Transcripción de Escuela Secundaria';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-incorporacion-new-jersey':
                    $data['description'] = 'Certificado de Incorporación';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-buena-reputacion-new-jersey':
                    $data['description'] = 'Certificado de Buena Reputación';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-origen-new-jersey':
                    $data['description'] = 'Certificado de Origen';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-marca-patente-new-jersey':
                    $data['description'] = 'Marcas o Patentes';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-poder-comercial-new-jersey':
                    $data['description'] = 'Poder Comercial';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-declaracion-jurada-comercial-new-jersey':
                    $data['description'] = 'Declaración Jurada Comercial';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-fda-new-jersey':
                    $data['description'] = 'Certificado FDA';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-facturas-new-jersey':
                    $data['description'] = 'Facturas';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;   
                case 'apostillar-departamento-de-hacienda-new-jersey':
                    $data['description'] = 'Departamento de Hacienda';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-gobierno-extranjero-new-jersey':
                    $data['description'] = 'Certificado de Gobierno Extranjero';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-venta-gratis-new-jersey':
                    $data['description'] = 'Certificado de Venta gratis';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-ordenes-de-compra-new-jersey':
                    $data['description'] = 'Órdenes de compra';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                default:
                    # code...
                    break;
            }

        } else {
            //$data['oficina'] = 'New Jersey';
            $data['title'] = 'Apostillas express en New Jersey';
            $data['subtitle'] = '¡Apostillamos todo tipo de documento de 3 a 4 días!';
            $data['imggrid'] = 'img/oficinas/ICONOS-15.webp';
            $data['txtgrid'] = 'Motor Vehicle Commission';
            $data['telfHidden'] = '+19088009046';
            $data['telfWpp'] = '19088009046';
            $data['telfShow'] = '908-800-9046';
            $data['imgapostilla'] = 'img/oficinas/apostillanj.webp';
            $data['imgup'] = 'img/newjersey-landing-notaria-latina.jpg';
            $data['imgdown'] = 'img/oficinas/CHICA-APOST.webp';
            $data['widthimgdown'] = '70%';
            $data['heightimgdown'] = '25rem';
            $data['paddingtop'] = '15px';
            $data['urlmap'] = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3026.4152573854667!2d-74.21549248459648!3d40.66481847933702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24d541387e7ff%3A0x335c07b09362e483!2s1146%20E%20Jersey%20St%2C%20Elizabeth%2C%20NJ%2007201%2C%20EE.%20UU.!5e0!3m2!1ses!2sec!4v1642459239606!5m2!1ses!2sec';
            $data['metadescription'] = 'Apostillamos todo tipo de documentos en New Jersey, de una manera rápida y segura';
            $data['keywords'] = 'notaria en new jersey, notarizar en new jersey, notaria cerca de mi, notary near me, apostille near me, apostille new jersey, carta poder en new jersey, traduccion en new jersey, apostillar documentos en new jersey, affidavít en new jersey, travel authorization en new jersey, certificar documentos en new jersey';
    
            return view('web.oficina', compact('data'));
        }
    }

    public function oficinasfl(?string $service = null){
        $data['office'] = 'Florida';
        $data['telfHidden'] = '+13056003290';
        $data['telfWpp'] = '13056003290';
        $data['telfShow'] = '305-600-3290';
        if($service != null){
            switch ($service) {
                case 'certificaciones-en-florida':
                    return view('web.office.certificaciones', compact('data'));
                    break;
                case 'travel-authorization-en-florida':
                    return view('web.office.authorization', compact('data'));
                    break;
                case 'acuerdos-en-florida':
                    return view('web.office.acuerdos', compact('data'));
                    break;
                case 'cartas-de-invitacion-en-florida':
                    return view('web.office.invitacion', compact('data'));
                    break;
                case 'revocatorias-en-florida':
                    return view('web.office.revocatorias', compact('data'));
                    break;
                case 'contratos-en-florida':
                    return view('web.office.contratos', compact('data'));
                    break;
                case 'testamentos-en-florida':
                    return view('web.office.testamentos', compact('data'));
                    break;
                case 'matrimonios-en-florida':
                    return view('web.office.matrimonios', compact('data'));
                    break;
                case 'poder-notarial-florida':
                    return view('web.office.poderes', compact('data'));
                    break;
                case 'traducir-documentos-florida':
                    return view('web.office.traducciones', compact('data'));
                    break;
                case 'apostillar-documentos-florida':
                    return view('web.office.apostillas', compact('data'));
                    break;
                case 'affidavit-support-florida':
                    return view('web.office.affidavit', compact('data'));
                    break;
                case 'matrimonios-en-florida':
                    return view('web.office.matrimonios', compact('data'));
                    break;
                case 'apostillar-certificado-de-nacimiento-florida':
                    $data['description'] = 'Certificados de Nacimiento';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-reporte-consular-florida':
                    $data['description'] = 'Reporte Consular';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-matrimonio-florida':
                    $data['description'] = 'Certificados de Matrimonio';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-defuncion-florida':
                    $data['description'] = 'Certificados de Defunción';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-divorcio-florida':
                    $data['description'] = 'Certificados de Divorcio';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-naturalizacion-florida':
                    $data['description'] = 'Certificados de Naturalización';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-expediente-de-adopcion-florida':
                    $data['description'] = 'Expediente de Adopción';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-copia-de-pasaporte-florida':
                    $data['description'] = 'Copia de pasaporte';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-copia-de-licencia-de-conducir-florida':
                    $data['description'] = 'Copia de Licencia de Conducir';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-escrituras-testamentos-florida':
                    $data['description'] = 'Escrituras y Testamentos';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-declaraciones-juradas-de-estado-unico-florida':
                    $data['description'] = 'Declaraciones Juradas';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-titulo-de-automovil-florida':
                    $data['description'] = 'Título de coche/automóvil';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-autorizacion-de-viaje-florida':
                    $data['description'] = 'Autorización de Viaje';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-poder-notarial-personal-florida':
                    $data['description'] = 'Poder Notarial Personal';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-registro-de-policia-estatal-florida':
                    $data['description'] = 'Registro de la policía estatal';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-registro-de-antecedentes-fbi-florida':
                    $data['description'] = 'Registros de antecedentes del FBI';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-diploma-universitario-florida':
                    $data['description'] = 'Diploma Universitario';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-transcripcion-universitaria-florida':
                    $data['description'] = 'Transcripción Universitaria';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-diploma-de-escuela-secundaria-florida':
                    $data['description'] = 'Diploma de Escuela Secundaria';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-transcripcion-de-escuela-secundaria-florida':
                    $data['description'] = 'Transcripción de Escuela Secundaria';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-incorporacion-florida':
                    $data['description'] = 'Certificado de Incorporación';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-buena-reputacion-florida':
                    $data['description'] = 'Certificado de Buena Reputación';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-origen-florida':
                    $data['description'] = 'Certificado de Origen';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-marca-patente-florida':
                    $data['description'] = 'Marcas o Patentes';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-poder-comercial-florida':
                    $data['description'] = 'Poder Comercial';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-declaracion-jurada-comercial-florida':
                    $data['description'] = 'Declaración Jurada Comercial';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-fda-florida':
                    $data['description'] = 'Certificado FDA';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-facturas-florida':
                    $data['description'] = 'Facturas';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;   
                case 'apostillar-departamento-de-hacienda-florida':
                    $data['description'] = 'Departamento de Hacienda';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-gobierno-extranjero-florida':
                    $data['description'] = 'Certificado de Gobierno Extranjero';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-venta-gratis-florida':
                    $data['description'] = 'Certificado de Venta gratis';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-ordenes-de-compra-florida':
                    $data['description'] = 'Órdenes de compra';
                    $data['metadescription'] = "";
                    $data['keywords'] = "";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                default:
                    # code...
                    break;
            }

        } else {
            //$data['oficina'] = 'Florida';
            $data['title'] = 'Apostillas en Florida';
            $data['subtitle'] = '¡Apostillamos todo tipo de documentos para Florida!';
            $data['imggrid'] = 'img/oficinas/MATRIMONIO FL.webp';
            $data['txtgrid'] = 'Matrimonios';
            $data['telfHidden'] = '+13056003290';
            $data['telfWpp'] = '13056003290';
            $data['telfShow'] = '305-600-3290';
            $data['imgapostilla'] = 'img/oficinas/apostillafl.webp';
            $data['imgup'] = 'img/oficina-notaria-florida.webp';
            $data['imgdown'] = 'img/oficinas/Plaza_opt.webp';
            $data['widthimgdown'] = '100%';
            $data['heightimgdown'] = '100%';
            $data['paddingtop'] = '0px';
            $data['urlmap'] = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3581.404392613644!2d-80.25914568497105!3d26.150956283461554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d90638fe895e7b%3A0xaa63cebf0d7899!2s2104%20N%20University%20Dr%2C%20Sunrise%2C%20FL%2033322%2C%20EE.%20UU.!5e0!3m2!1ses!2sec!4v1642375956270!5m2!1ses!2sec';
            $data['metadescription'] = 'Apostillamos todo tipo de documentos en Florida, de una manera rápida y segura';
            $data['keywords'] = 'notaria en florida, notarizar en florida, notaria cerca de mi, notary near me, apostille near me, apostille florida, carta poder en florida, traduccion en florida, apostillar documentos en florida, affidavít en florida, travel authorization en florida, certificar documentos en florida';

            return view('web.oficina', compact('data'));
        }
    } 

    public function sendEmailContact(Request $request, Partner $partner){

        //ENVIO A NOTARIA LATINA
        $to = "partners@notarialatina.com,hserrano@notarialatina.com";
        $subject = 'Lead para Socio Abogado - Notaria Latina';
        $message = "<br><strong><h3>Datos del cliente</h3></strong>
                    <br>Nombre: " . strip_tags($request->name). "
                    <br>País de residencia: " . strip_tags($request->country_residence) ."
                    <br>Teléfono: " . strip_tags($request->phone) ."
                    <br>Mensaje: " . strip_tags($request->mensaje) . "
                    <br>
                    <br><strong><h3>Socio al cual consulta</h3></strong>
                    <br>Nombre: " . strip_tags($partner->name) . " " . strip_tags($partner->lastname) . "
                    <br>Especialidad: " . strip_tags($partner->specialty) ."
                    <br>Pais: " . strip_tags($partner->country_residence) . "
                    <br>Teléfono: " . strip_tags($partner->codigo_pais) . " " . strip_tags($partner->phone) ."
                    <br>Email: " . strip_tags($partner->email) ."
                    <br>
                    <img style='margin-top:20px' src='https://notarialatina.com/img/partners/WEB-HEREDADO.png' alt='IMAGEN NOTARIA LATINA'>
        ";

        $header = 'From: <partners@notarialatina.com>' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n".
                'Content-type:text/html;charset=UTF-8' . "\r\n"
                ;
        
        mail($to, $subject, $message, $header);

        //ENVIO AL PARTNER
        $toPartner = $partner->email;
        $subjectPartner = 'Nuevo Cliente - Notaria Latina';
        $messagePartner = "<br><strong><h3>Un nuevo cliente a consultado por tus servicios</h3></strong>
                    <br><strong><h3>Datos del cliente</h3></strong>
                    <br>Nombre: " . strip_tags($request->name). "
                    <br>País de residencia: " . strip_tags($request->country_residence) ."
                    <br>Teléfono: " . strip_tags($request->phone) ."
                    <br>Mensaje: " . strip_tags($request->mensaje) . "
                    <br>
                    <img style='margin-top:20px' src='https://notarialatina.com/img/partners/WEB-HEREDADO.png' alt='IMAGEN NOTARIA LATINA'>
        ";

        $headerPartner = 'From: <partners@notarialatina.com>' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n".
                'Content-type:text/html;charset=UTF-8' . "\r\n"
                ;
        
        mail($toPartner, $subjectPartner, $messagePartner, $headerPartner);

        $request->session()->flash('report', 'Se ha enviado el correo');

        return back();
    }

    //partners@notarialatina.com,hserrano@notarialatina.com

    public function sendEmailOficina(Request $request){
        $pais = $this->getPaisByCodigo($request->cod_pais);
        $to = "notariapublicalatina@gmail.com,hserrano@notarialatina.com";
        $subject = "Lead " . strip_tags($request->interest);
        $message = "<br><strong><h3>Datos del Lead</h3></strong>
                <br>Nombre: " . strip_tags($request->aaa). "
                <br>País de residencia: " . strip_tags($pais) ."
                <br>Teléfono: " .strip_tags($request->cod_pais) . " " . strip_tags($request->bbb) ."
                <br>Mensaje: " . strip_tags($request->ddd) . "
                <br>
                <img style='width: 150px; margin-top:20px' src='https://notarialatina.com/img/partners/WEB-HEREDADO.png' alt='IMAGEN NOTARIA LATINA'>
        ";
        $header = 'From: <partners@notarialatina.com>' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n".
        'Content-type:text/html;charset=UTF-8' . "\r\n"
        ;

        mail($to, $subject, $message, $header);

        $request->session()->flash('report', 'Se ha enviado el correo');

        return back();
    }

    public function postStar(Request $request, Partner $partner){

        $rating = new Rating();
        $rating->user_id = $partner->id;
        $rating->rating = $request->input('star');
        $partner->ratings()->save($rating);

        $to = "notariapublicalatina@gmail.com,hserrano@notarialatina.com," . $partner->email;
        $subject = "Valoración de Partner: " . strip_tags($partner->name) . " " . strip_tags($partner->lastname);
        $message = "<br><strong><h3>Datos del cliente que lo evalúa</h3></strong>
                <br>Nombre: " . strip_tags($request->nameRating). "
                <br>País de residencia: " . strip_tags($request->country_residenceRating) ."
                <br>Teléfono: " . strip_tags($request->phoneRating) ."
                <br>Mensaje: " . strip_tags($request->mensajeRating) . "
                <br>Valoración: " . strip_tags($request->star) . " estrellas 
                <br>
                <img style='width: 150px; margin-top:20px' src='https://notarialatina.com/img/partners/WEB-HEREDADO.png' alt='IMAGEN NOTARIA LATINA'>
        ";
        $header = 'From: <partners@notarialatina.com>' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n".
        'Content-type:text/html;charset=UTF-8' . "\r\n"
        ;

        mail($to, $subject, $message, $header);

        $request->session()->flash('rating', 'Gracias por enviar tu valoración');

        return redirect()->back();
    }

    public function sendEmailApostille(Request $request){

        $from_email		 = "apostillas@notarialatina.com"; //from mail, sender email address
        $recipient_email = 'sebas31051999@gmail.com'; //recipient email address
        
        $subject = 'Servicios de Apostilla | Notaria Latina - ' . date(now()); //subject for the email
        $message = "<br><strong><h3>Información del cliente</h3></strong>
        <br><b>Nombre:</b> " . strip_tags($request->name). " " . strip_tags($request->lastname) . "
        <br><b>País de residencia:</b> " . strip_tags($request->cod_pais) . "
        <br><b>Teléfono:</b> " . strip_tags($request->phone) . "
        <br><b>Email:</b> " . strip_tags($request->email) . "
        <br><b>Documento a Apostillar:</b> " . strip_tags($request->document) . "
        <br><b>Mensaje:</b> " . strip_tags($request->mensaje) . "
        "; //body of the email

        if ($request->file('adjunto') != null) {
            $tmp_name = $_FILES['adjunto']['tmp_name']; // get the temporary file name of the file on the server
            $name	 = $_FILES['adjunto']['name']; // get the name of the file
            $size	 = $_FILES['adjunto']['size']; // get size of the file for size validation
            $type	 = $_FILES['adjunto']['type']; // get type of the file
            $error	 = $_FILES['adjunto']['error']; // get the error (if any)
    
            //validate form field for attaching the file
            if($error > 0)
            {
                die('Upload error or No files uploaded');
            }
    
            //read from the uploaded file & base64_encode content
            $handle = fopen($tmp_name, "r"); // set the file handle only for reading the file
            $content = fread($handle, $size); // reading the file
            fclose($handle);				 // close upon completion
    
            $encoded_content = chunk_split(base64_encode($content));
    
            $boundary = md5("random"); // define boundary with a md5 hashed value
        }
        

        //header
        $headers = "MIME-Version: 1.0\r\n"; // Defining the MIME version
        $headers .= "From:".$from_email."\r\n"; // Sender Email
        if ($request->file('adjunto') != null) {
            $headers .= "Content-Type: multipart/mixed;"; // Defining Content-Type
            $headers .= "boundary = $boundary\r\n"; //Defining the Boundary
        } else {
            $headers .= "Content-Type: text/html; charset=UTF-8";
        }
            
        //plain text
        $body = "";
        if ($request->file('adjunto') != null) {
            $body .= "--$boundary\r\n";
            $body .= "Content-Type: text/html; charset=UTF-8\r\n";
            $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
            $body .= chunk_split(base64_encode($message));
        }
            
        //attachment
        if ($request->file('adjunto') != null) {
            $body .= "--$boundary\r\n";
            $body .="Content-Type: $type; name=".$name."\r\n";
            $body .="Content-Disposition: attachment; filename=".$name."\r\n";
            $body .="Content-Transfer-Encoding: base64\r\n";
            $body .="X-Attachment-Id: ".rand(1000, 99999)."\r\n\r\n";
            $body .= $encoded_content; // Attaching the encoded file with email
        }
        
        if($request->file('adjunto') != null){
            $sentMailResult = mail($recipient_email, $subject, $body, $headers);
        } else {
            $sentMailResult = mail($recipient_email, $subject, $message, $headers);
        }

        if($sentMailResult){
            $request->session()->flash('success', 'Hemos enviado tu información');
        } else {
            $request->session()->flash('error', 'Algo salio mal');
        }
        
        return back();
    }
}
