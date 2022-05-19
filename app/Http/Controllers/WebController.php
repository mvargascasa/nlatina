<?php

namespace App\Http\Controllers;

use App\Consulate;
use App\Country;
use App\Customer;
use App\Http\Traits\GetCodByCountryTrait;
use App\Http\Traits\GetCountryByCodTrait;
use App\Mail\SendLead;
use App\Partner;
use App\Post;
use App\Rating;
use App\Specialty;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Session;
use Illuminate\Support\Str;
use Intervention\Image\Image;
use Stevebauman\Purify\Facades\Purify;

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

        // $specialties = Specialty::all();           

        // $country = $request->get('country');
        // $specialty = $request->get('specialty');
        // $state = $request->get('state');

        // $partners = Partner::select(['id', 'img_profile', 'name', 'lastname', 'title', 'state', 'codigo_pais', 'specialty', 'country_residence', 'phone', 'email', 'slug'])
        //         ->where('status', 'PUBLICADO')
        //         ->orderBy('id', 'DESC')
        //         ->country($country)
        //         ->state($state)
        //         ->specialties($specialty)
        //         ->distinct()
        //         ->get();


        return view('web.partners', compact('countries'));
        
    }

    // public function search(Request $request){
    //     $countries = Country::select(['name_country', 'id'])->get();

    //     $specialties = Specialty::all();           

    //     $country = $request->get('country');
    //     $specialty = $request->get('specialty');
    //     $state = $request->get('state');

    //     $partners = Partner::select(['id', 'img_profile', 'name', 'lastname', 'title', 'state', 'codigo_pais', 'specialty', 'country_residence', 'phone', 'email', 'slug'])
    //             ->where('status', 'PUBLICADO')
    //             ->orderBy('id', 'DESC')
    //             ->country($country)
    //             ->state($state)
    //             ->specialties($specialty)
    //             ->distinct()
    //             ->get();

    //     return response()->json([
    //         'viewPartnersCountry' => view('web.partials.view_partners', compact('countries', 'specialties', 'partners'))
    //     ]);
    // }

    //ESTA FUNCION ES PARA CARGAR LOS ESTADOS CUANDO HAYA UN CAMBIO EN EL SELECT DE COUNTRIES
    public function fetchStateAfter(Request $request){
        $country = Country::where('name_country', $request->id)->first();
        $states = State::where('country_id', $country->id)->get();
        return response()->json($states);
    }

    public function fetchState(Request $request){
        $country = Country::where('name_country', $request->pais)->first();
        $countries = Country::select(['id', 'name_country'])->orderBy('name_country', 'asc')->get();
        $states = State::where('country_id', $country->id)->get();
        $partners = Partner::select(['id', 'img_profile', 'name', 'lastname', 'title', 'state', 'codigo_pais', 'specialty', 'country_residence', 'phone', 'email', 'slug'])
                ->country($country->id)
                // ->state($request->state)
                // ->specialties($request->specialty)
                ->where('status', 'PUBLICADO')
                //->inRandomOrder('name')
                ->orderBy('name', 'DESC')
                // ->limit($dataToLoad)
                ->paginate(16);
                // ->inRandomOrder()
                // ->get();

        $partnersCount = Partner::where('status', 'PUBLICADO')
                    ->orderBy('id', 'DESC')
                    ->country($country->id)
                    ->state($request->state)
                    ->specialties($request->specialty)
                    ->get();
                    
        $totalPartners = $partnersCount->count();
        
        $specialties = Specialty::select(['id', 'name_specialty'])->get();

        return view('web.partners_result', compact('countries', 'states', 'partners', 'specialties', 'totalPartners'));
    }

    public function fetchStateB(Request $request){
        $country = Country::where('name_country', $request->pais)->first();
        $countries = Country::select(['id', 'name_country'])->orderBy('name_country', 'asc')->get();
        $states = State::where('country_id', $country->id)->get();
        $partners = Partner::select(['id', 'img_profile', 'name', 'lastname', 'title', 'state', 'codigo_pais', 'specialty', 'country_residence', 'phone', 'email', 'slug'])
                ->country($country->id)
                ->state($request->state)
                ->specialties($request->specialty)
                ->where('status', 'PUBLICADO')
                //->inRandomOrder('name')
                ->orderBy('name', 'DESC')
                // ->limit($dataToLoad)
                ->paginate(16);
                // ->inRandomOrder()
                // ->get();

        $partnersCount = Partner::where('status', 'PUBLICADO')
                    ->orderBy('id', 'DESC')
                    ->country($country->id)
                    ->state($request->state)
                    ->specialties($request->specialty)
                    ->get();
                    
        $totalPartners = $partnersCount->count();

        $countryID = $request->country;
        
        $specialties = Specialty::select(['id', 'name_specialty'])->get();

            return response()->json([
                'viewPartners' => view('web.partials.view_partners', compact('countries', 'states', 'partners', 'specialties', 'totalPartners', 'countryID'))->render()
            ]);
    }

    public function showPartner(Request $request, $slug){

        $partner = Partner::where('slug', $slug)->where('status', 'PUBLICADO')->first(); 
        
        if($partner){
            return view('web.partner', compact('partner'));
        } else {
            return redirect()->route('web.showallpartners');
        }
    }

    public function oficinasny(?string $service = null){
        $data['telfHidden'] = '+13479739888';
        $data['telfWpp'] = '13479739888';
        $data['telfShow'] = '347-973-9888';
        $data['office'] = 'New York';
        $data['metadescription'] = "Notarizamos todo tipo de documentos en New York tales como apostillas, certificados, poderes, traducciones de una manera ágil y rápida. Solicítelo aquí! ✔";
        $data['keywords'] = 'notaria en new york, notaria en queens new york, notaria latina en queens new york, notaria cerca de mi, notario publico en new york, notarizar documentos en queens new york, notario publico cerca de mi, apostillar documentos en queens new york';
        if($service != null){
            switch ($service) {
                case 'certificaciones-en-new-york':
                    $data['metadescription'] .= "Realizamos todo tipo de Certificaciones en New York de una manera ágil y rápida!";
                    $data['keywords'] .= ", certificar acta de nacimiento new york, certificar acta de matrimonio new york, certificar cartas new york, certificar licencia de conducir new york, certificar declaracion jurada new york, certificar affidavit new york, certificar escrituras new york";
                    return view('web.office.certificaciones', compact('data'));
                    break;
                case 'travel-authorization-en-new-york':
                    $data['metadescription'] .= "Realizamos Autorizaciones de Viaje para Menores de Edad en New York de una manera ágil y rápida!";
                    $data['keywords'] .= ", autorizacion de viaje new york, tramitar autorizacion de viaje new york, realizar autorizacion de viaje new york, obtener autorizacion de viaje new york, make new york travel authorization";
                    return view('web.office.authorization', compact('data'));
                    break;
                case 'acuerdos-en-new-york':
                    $data['metadescription'] .= "Realizamos Acuerdos en New York de una manera ágil y rápida!";
                    $data['keywords'] .= ", tramitar acuerdo new york, realizar acuerdo new york, process agreement new york, make deal new york";
                    return view('web.office.acuerdos', compact('data'));
                    break;
                case 'cartas-de-invitacion-en-new-york':
                    $data['metadescription'] .= "Tramitamos Cartas de Invitación en New York de una manera ágil y rápida!";
                    $data['keywords'] .= ", realizar carta de invitacion new york, tramitar carta de invitacion new york, make invitation letter new york, process letter of invitation new york";
                    return view('web.office.invitacion', compact('data'));
                    break;
                case 'revocatorias-en-new-york':
                    $data['metadescription'] .= "Realizamos Revocatorias de Poderes en New York de una manera ágil y rápida!";
                    $data['keywords'] .= ", revocar carta poder new york, revocar poder general new york, revocar poder especial new york, realizar revocatoria new york, anular poder new york, anular carta poder new york, cancelar poder new york, cancelar carta poder new york, revoke power new york, override power new york, cancel power new york";
                    return view('web.office.revocatorias', compact('data'));
                    break;
                case 'contratos-en-new-york':
                    $data['metadescription'] .= "Realizamos todo tipo de Contratos en New York de una manera ágil y rápida!";
                    $data['keywords'] .= ", contrato de arrendamiento new york, contrato de trabajo new york, contrato de renta new york, realizar contrato de arriendo new york, realizar contrato compra venta new york, realizar contrato prestamo new york, realizar contrato prenupcial new york, realizar contrato de servicio new york, realizar contrato de transporte new york, make contract new york";
                    return view('web.office.contratos', compact('data'));
                    break;
                case 'testamentos-en-new-york':
                    $data['metadescription'] .= "Realizamos Testamentos en New York de una manera ágil y rápida!";
                    $data['keywords'] .= ", realizar testamento new york, hacer testamento new york, tramitar testamento new york, make a will new york";
                    return view('web.office.testamentos', compact('data'));
                    break;
                case 'motor-vehicle-commission-en-new-york':
                    $data['metadescription'] .= "Motor Vehicle Commission en New York de una manera ágil y rápida!";
                    $data['keywords'] .= ", traducir historial de manejo new york, obtener licencia de conducir new york, traducir documentos licencia de conducir";
                    return view('web.office.vehicle_comission', compact('data'));
                    break;
                case 'poder-notarial-new-york':
                    $data['metadescription'] .= "Realizamos Poderes Generales y Especiales en New York de una manera ágil y rápida!";
                    $data['keywords'] .= ", realizar carta poder new york, realizar poder especial new york, realizar poder general new york, tramitar poder new york, make power of attorney new york, process power new york";
                    return view('web.office.poderes', compact('data'));
                    break;
                case 'traducir-documentos-new-york':
                    $data['metadescription'] .= "Traducimos todo tipo de Documentos en New York de una manera ágil y rápida! ";
                    $data['keywords'] .= ", traducir documentos new york, traducir certificado de nacimiento new york, traducir diplomas new york, traducir certificado de matrimonio new york, traducir certificado de divorcio new york, traducir certificado de defuncion new york, traducir documentos medicos new york, traducir certificados estudiantiles new york, translate documents new york";
                    return view('web.office.traducciones', compact('data'));
                    break;
                case 'apostillar-documentos-new-york':
                    $data['metadescription'] .= "¿Necesitas apostillar un documento? Te ayudamos a tramitar todo tipo de Documentos en New York de una manera ágil y rápida!";
                    $data['keywords'] .= ", apostillar documentos new york, apostillar diploma new york, apostillar poder general new york, apostillar poder especial new york, apostillar certificado de matrimonio new york, apostillar certificado de defuncion new york, apostillar contrato new york, apostillar carta de invitacion new york, apostillar testamentos new york, apostillar declaraciones juradas new york, apostillar affidavit new york, apostillar acta de divorcio new york, apostillar facturas new york, apostille documents new york";
                    return view('web.office.apostillas', compact('data'));
                    break;
                case 'affidavit-support-en-new-york':
                    $data['metadescription'] .= "Realizamos Declaraciones Juradas (Affidavit) en New York de una manera ágil y rápida!";
                    $data['keywords'] .= ", declaracion jurada new york, affidavit new york, realizar declaracion jurada new york, tramitar declaracion jurada new york, make an affidavit new york, process affidavit new york";
                    return view('web.office.affidavit', compact('data'));
                    break;
                case 'apostillar-certificado-de-nacimiento-new-york':
                    $data['description'] = 'Certificados de Nacimiento';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Nacimiento en New York? En Notaria Latina te ayudamos de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar acta de nacimiento near me, apostillar partida de nacimiento new york, apostillar inscripcion de nacimiento new york, apostillar certificado de nacimiento new york, apostillar acta de nacimiento new york, donde apostillar certificado de nacimiento en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-reporte-consular-new-york':
                    $data['description'] = 'Reporte Consular';
                    $data['metadescription'] .= "¿Necesitas apostillar un Reporte Consular (CRBA) en New York? En Notaria Latina lo hacemos de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar crba near me, apostillar crba new york, apostillar reporte consular de nacimiento en el extranjero new york, apostillar certificado de nacimiento en el extranjero new york, apostillar inscripcion de nacimiento extranjero new york, apostillar acta de nacimiento extranjero new york, apostille birth certificate abroad new york, donde apostillar crba en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-matrimonio-new-york':
                    $data['description'] = 'Certificados de Matrimonio';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Matrimonio en New York? Notaria Latina te ayuda de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de matrimonio near me, apostillar certificado de matrimonio en new york, apostillar acta de matrimonio en new york, apostilla matrimonio new york, apostillar partida de matrimonio new york, apostille marriage certificate, apostille marriage certificate new york, donde apostillar certificado de matrimonio en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-defuncion-new-york':
                    $data['description'] = 'Certificados de Defunción';
                    $data['metadescription'] .= "¿Necesitas apostillar un certificado de defunción en New York? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de defuncion, apostillar certificado de defuncion near me, apostillar certificado de defuncion en new york, apostillar acta de defuncion en new york, como apostillar un certificado de defuncion, apostillado de certificado de defuncion, apostille death certificate new york, apostille death certificate near me, donde apostillar certificado de defuncion en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-divorcio-new-york':
                    $data['description'] = 'Certificados de Divorcio';
                    $data['metadescription'] .= "¿Necesitas apostillar un certificado de divorcio en New York? En Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de divorcio, apostillar acta de divorcio, apostillar certificado de divorcio near me, apostillar certificado de divorcio en new york, apostilllar acta de divorcio new york, apostillar sentencia de divorcio new york, apostille divorce certificate new york, apostille divorce certificate near me, donde apostillar certificado de divorcio en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-naturalizacion-new-york':
                    $data['description'] = 'Certificados de Naturalización';
                    $data['metadescription'] .= "¿Requieres apostillar un certificado de naturalización en New York? Nosotros podemos ayudarte con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de naturalizacion, apostillar acta de naturalizacion, apostillar certificado de naturalizacion near me, apostillar certificado de naturalizacion new york, apostillar acta de naturalizacion new york, apostille naturalization certificate near me, apostille naturalization certificate new york, donde apostillar certificado de naturalizacion en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-expediente-de-adopcion-new-york':
                    $data['description'] = 'Expediente de Adopción';
                    $data['metadescription'] .= "¿Necesitas apostillar un expediente de adopción en New York? En Notaria Latina te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar expediente de adopcion, apostillar expediente de adopcion near me, apostillar expediente de adopcion new york, apostille adoption file, apostille adoption file near me, apostille adoption file new york, donde apostillar expediente de adopcion en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-copia-de-pasaporte-new-york':
                    $data['description'] = 'Copia de pasaporte';
                    $data['metadescription'] .= "¿Necesitas apostillar una copia de pasaporte en New York? Nosotros podemos ayudarte con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar copia de pasaporte, apostillar copia de pasaporte near me, apostillar copia de pasaporte new york, apostille copy of passport, apostille copy of passport near me, apostille copy of passport new york, donde apostillar copia de pasaporte en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-copia-de-licencia-de-conducir-new-york':
                    $data['description'] = 'Copia de Licencia de Conducir';
                    $data['metadescription'] .= "¿Necesitas apostillar una copia de licencia de conducir en New York? Notaria Latina te ayuda con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar licencia de conducir, apostillar copia de licencia de conducir, apostillar copia de licencia de conducir near me, apostillar copia de licencia de conducir new york, apostille copy of driver's license, apostille copy of driver's license near me, apostille copy of driver's license new york, donde apostillar copia de licencia de conducir en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-escrituras-testamentos-new-york':
                    $data['description'] = 'Escrituras y Testamentos';
                    $data['metadescription'] .= "¿Necesitas apostillar una escritura o testamento en New York? Nosotros te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar escrituras, apostillar testamento, apostillar escrituras near me, apostillar testamentos near me, apostillar escrituras new york, apostillar testamentos new york, apostille deeds near me, apostille deeds new york, apostille wills near me, apostille wills new york, donde apostillar escrituras en new york, donde apostillar testamentos en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-declaraciones-juradas-de-estado-unico-new-york':
                    $data['description'] = 'Declaraciones Juradas';
                    $data['metadescription'] .= "¿Necesitas apostillar una Declaración Jurada (Affidávit) en New York? En Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar affidavit, apostillar declaracion jurada, apostillar affidavit near me, apostillar declaracion jurada near me, apostillar affidavit near me, apostillar declaracion jurada new york, apostille affidavit, donde apostillar affidavit en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-titulo-de-automovil-new-york':
                    $data['description'] = 'Título de coche/automóvil';
                    $data['metadescription'] .= "¿Necesitas apostillar un Título de Automóvil en New York? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar titulo de automovil, apostillar titulo de automovil near me, apostillar titulo de automovil new york, apostille car title, apostille car title near me, apostille car title new york, donde apostillar titulo de automovil en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-autorizacion-de-viaje-new-york':
                    $data['description'] = 'Autorización de Viaje';
                    $data['metadescription'] .= "¿Necesitas apostillar una Autorización de Viaje en New York? Notaria Latina podemos ayudarte con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar autorizacion de viaje, apostillar autorizacion de viaje near me, apostillar autorizacion de viaje new york, apostille travel authorization, apostille travel authorization near me, apostille travel authorization new york, donde apostillar autorizacion de viaje en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-poder-notarial-personal-new-york':
                    $data['description'] = 'Poder Notarial Personal';
                    $data['metadescription'] .= "¿Necesitas apostillar una Carta Poder en New York? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar poder notarial, apostillar carta poder new york, apostillar poder notarial near me, apostillar poder notarial new york, apostillar poder personal new york, apostille power of attorney, apostille power of attorney new york, donde apostillar carta poder en new york, donde apostillar poder notarial en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-registro-de-policia-estatal-new-york':
                    $data['description'] = 'Registro de la policía estatal';
                    $data['metadescription'] .= "¿Necesitas apostillar un Registro Policial en New York? En Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar registro policial, apostillar registro de policia estatal, apostillar registro policial near me, apostillar registro policial new york, apostille police record new york, apostill police record new york, donde apostillar registro policial new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-registro-de-antecedentes-fbi-new-york':
                    $data['description'] = 'Registros de antecedentes del FBI';
                    $data['metadescription'] .= "¿Necesitas apostillar un Registro de Antecedentes FBI en New York? Notaria Latina lo hace por ti de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar antecedentes del fbi, apostillar registro de antecentes del fbi, apostillar registros de antecedentes del fbi near me, apostillar registros de antecedentes del fbi new york, apostille fbi background check new york, donde apostillar antecedentes del fbi new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-diploma-universitario-new-york':
                    $data['description'] = 'Diploma Universitario';
                    $data['metadescription'] .= "¿Necesitas apostillar un Diploma Universitario en New York? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar diploma, apostillar diploma universitario near me, apostillar diploma universitario new york, apostillar titulo universitario new york, apostille university diploma new york, donde apostillar diploma universitario en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-transcripcion-universitaria-new-york':
                    $data['description'] = 'Transcripción Universitaria';
                    $data['metadescription'] .= "¿Necesitas apostillar una Transcripción Universitaria en New York? En Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar transcripcion universitaria, apostillar transcripcion universitaria near me, apostillar transcripcion universitaria new york, apostillar transcripcion titulo universitario new york, apostille university transcript new york, donde apostillar transcripcion universitaria new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-diploma-de-escuela-secundaria-new-york':
                    $data['description'] = 'Diploma de Escuela Secundaria';
                    $data['metadescription'] .= "¿Necesitas apostillar un Diploma de Escuela Secundaria en New York? Notaria Latina te ayuda con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar diploma secundario, apostillar diploma escuela secundaria, apostillar diploma escuela secundaria near me, apostillar diploma escuela secundaria new york, apostille high school diploma new york, donde apostillar diploma secundaria en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-transcripcion-de-escuela-secundaria-new-york':
                    $data['description'] = 'Transcripción de Escuela Secundaria';
                    $data['metadescription'] = "¿Necesitas apostillar una Transcripción de Escuela Secundaria en New York? Nosotros te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar transcripcion de escuela secundaria, apostillar transcripcion de escuela secundaria near me, apostillar transcripcion de escuela secundaria new york, apostille high school transcript new york, donde apostillar transcripcion de escuela secundaria new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-incorporacion-new-york':
                    $data['description'] = 'Certificado de Incorporación';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Incorporación en New York? En Notaria Latina podemos ayudarte con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de incorporacion, apostillar acta de incorporacion, apostillar certificado de incorporacion near me, apostillar certificado de incorporacion new york, apostille certificate of incorporation new york, donde apostillar certificado de incorporacion en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-buena-reputacion-new-york':
                    $data['description'] = 'Certificado de Buena Reputación';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Buena Reputación en New York? Notaria Latina te ayuda con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de buena reputacion, apostillar certificado de buena reputacion near me, apostillar certificado de buena reputacion new york, apostille certificate of good standing new york, donde apostillar certificado de buena reputacion en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-origen-new-york':
                    $data['description'] = 'Certificado de Origen';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Origen en New York? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de origen, apostillar certificado de origen near me, apostillar certificado de origen new york, apostille certificate of origin new york, donde apostillar certificado de origen en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-marca-patente-new-york':
                    $data['description'] = 'Marcas o Patentes';
                    $data['metadescription'] .= "¿Necesitas apostillar una Marca o Patente en New York? En Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar marca new york, apostillar patente new york, apostillar marca near me, apostillar patente near me, apostillar marca, apostille mark new york, apostille patent new york, donde apostillar marca en new york, donde apostillar patente en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-poder-comercial-new-york':
                    $data['description'] = 'Poder Comercial';
                    $data['metadescription'] .= "¿Necesitas apostillar un Poder Comercial en New York? Notaria Latina te ayuda con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar poder comercial,  apostillar poder comercial new york, apostillar poder comercial near me, apostille commercial power new york, donde apostillar poder comercial new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-declaracion-jurada-comercial-new-york':
                    $data['description'] = 'Declaración Jurada Comercial';
                    $data['metadescription'] .= "¿Necesitas apostillar una Declaración Jurada Comercial en New York? Nosotros te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar declaracion jurada comercial, apostillar affidavit comercial, apostillar declaracion jurada comercial near me, apostillar declaracion jurada comercial new york, apostille commercial affidavit new york, apostillar affidavir comercial new york, donde apostillar affidavit comercial en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-fda-new-york':
                    $data['description'] = 'Certificado FDA';
                    $data['metadescription'] .= "¿Necesitas apostillar un certificado FDA en New York? En Notaria Latina te ayudamos con el trámite de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar certificado fda, apostillar certificado fda near me, apostillar certificado fda new york, apostille fda certificate new york, donde apostillar certificado fda en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-facturas-new-york':
                    $data['description'] = 'Facturas';
                    $data['metadescription'] .= "¿Necesitas apostillar Facturas en New York? Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar facturas, apostillar facturas near me, apostillar factura new york, apostille invoices new york, donde apostillar facturas en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;   
                case 'apostillar-departamento-de-hacienda-new-york':
                    $data['description'] = 'Departamento de Hacienda';
                    $data['metadescription'] .= "Apostillamos Departamento de Hacienda en New York de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar documento departamento de hacienda, apostillar departamento de hacienda near me, apostillar departamento de hacienda new york, apostille department of finance new york, donde apostillar departamento de hacienda en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-gobierno-extranjero-new-york':
                    $data['description'] = 'Certificado de Gobierno Extranjero';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Gobierno Extranjero en New York? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de gobierno extranjero, apostillar certificado de gobierno extranjero near me, apostillar certificado de gobierno extranjero new york, apostille foreign government certificate new york, apostillar certificado de gobierno extranjero en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-venta-gratis-new-york':
                    $data['description'] = 'Certificado de Venta gratis';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Venta en New York? En Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de venta, apostillar acta de venta, apostillar certificado de venta near me, apostillar acta de venta near me, apostillar certificado de venta new york, apostillar acta de venta new york, apostille sales certificate new york, donde apostillar certificado de venta en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-ordenes-de-compra-new-york':
                    $data['description'] = 'Órdenes de Compra';
                    $data['metadescription'] .= "¿Necesitas apostillar una Órden de Compra en New York? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
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
            $data['imggrid'] = 'img/oficinas/ICONOS-17.webp';
            $data['txtgrid'] = 'Affidávit Support';
            $data['telfHidden'] = '+13479739888';
            $data['telfWpp'] = '13479739888';
            $data['telfShow'] = '347-973-9888';
            $data['imgapostilla'] = 'img/oficinas/apostillany.webp';
            $data['imgup'] = 'img/oficinas/BANER-NEW-YORK.webp';
            $data['imgdown'] = 'img/oficina-notaria-latina-newyork.jpg';
            $data['widthimgdown'] = '90%';
            $data['heightimgdown'] = '100%';
            $data['paddingtop'] = '0px';
            $data['urlmap'] = 'https://goo.gl/maps/ovKfQSvTmA5SBqqF6';
            $data['imgurlmap'] = "img/oficinas/maps-ny.webp";
            $data['imgurlmapmobile'] = "img/oficinas/maps-ny-mobile.webp";
            $data['keywords'] = 'notaria en new york, notaria en queens new york, notaria latina en queens new york, notaria cerca de mi, notario publico en new york, notarizar documentos en queens new york, notario publico cerca de mi, apostillar documentos en queens new york';

            return view('web.oficina', compact('data'));
        }
    }

    public function oficinasnj(?string $service = null){
        $data['telfHidden'] = '+19088009046'; //+19082249260
        $data['telfWpp'] = '13479739888';
        $data['telfShow'] = '908-800-9046';
        $data['office'] = 'New Jersey';
        $data['metadescription'] = "Notarizamos todo tipo de documentos en New Jersey tales como apostillas, certificados, poderes, traducciones de una manera ágil y rápida. Solicítelo aquí! ✔";
        $data['keywords'] = 'notaria en new jersey, notaria publica en new jersey, notaria latina en elizabeth new jersey, notaria en elizabeth nj, notario publico en new jersey, notaria publica latina en nj, notarizar documentos en new jersey, notaria cerca de mi, notario publico cerca de mi, apostillar documentos en new jersey';
        if($service != null){
            switch ($service) {
                case 'certificaciones-en-new-jersey':
                    $data['metadescription'] .= "Realizamos todo tipo de Certificaciones en New Jersey de una manera ágil y rápida!";
                    $data['keywords'] .= ", certificar acta de nacimiento new jersey, certificar acta de matrimonio new jersey, certificar cartas new jersey, certificar licencia de conducir new jersey, certificar declaracion jurada new jersey, certificar affidavit new jersey, certificar escrituras new jersey";
                    return view('web.office.certificaciones', compact('data'));
                    break;
                case 'travel-authorization-en-new-jersey':
                    $data['metadescription'] .= "Realizamos Autorizaciones de Viaje para Menores de Edad en New Jersey de una manera ágil y rápida!";
                    $data['keywords'] .= ", autorizacion de viaje new jersey, tramitar autorizacion de viaje new jersey, realizar autorizacion de viaje new jersey, obtener autorizacion de viaje new jersey, make new jersey travel authorization";
                    return view('web.office.authorization', compact('data'));
                    break;
                case 'acuerdos-en-new-jersey':
                    $data['metadescription'] .= "Realizamos Acuerdos en New Jersey de una manera ágil y rápida!";
                    $data['keywords'] .= ", tramitar acuerdo new jersey, realizar acuerdo new jersey, process agreement new jersey, make deal new jersey";
                    return view('web.office.acuerdos', compact('data'));
                    break;
                case 'cartas-de-invitacion-en-new-jersey':
                    $data['metadescription'] .= "Tramitamos Cartas de Invitación en New Jersey de una manera ágil y rápida!";
                    $data['keywords'] .= ", realizar carta de invitacion new jersey, tramitar carta de invitacion new jersey, make invitation letter new jersey, process letter of invitation new jersey";
                    return view('web.office.invitacion', compact('data'));
                    break;
                case 'revocatorias-en-new-jersey':
                    $data['metadescription'] .= "Realizamos Revocatorias de Poderes en New Jersey de una manera ágil y rápida!";
                    $data['keywords'] .= ", revocar carta poder new jersey, revocar poder general new jersey, revocar poder especial new jersey, realizar revocatoria new jersey, anular poder new jersey, anular carta poder new jersey, cancelar poder new jersey, cancelar carta poder new jersey, revoke power new jersey, override power new jersey, cancel power new jersey";
                    return view('web.office.revocatorias', compact('data'));
                    break;
                case 'contratos-en-new-jersey':
                    $data['metadescription'] .= "Realizamos todo tipo de Contratos en New Jersey de una manera ágil y rápida!";
                    $data['keywords'] .= ", contrato de arrendamiento new jersey, contrato de trabajo new jersey, contrato de renta new jersey, realizar contrato de arriendo new jersey, realizar contrato compra venta new jersey, realizar contrato prestamo new jersey, realizar contrato prenupcial new jersey, realizar contrato de servicio new jersey, realizar contrato de transporte new jersey, make contract new jersey";
                    return view('web.office.contratos', compact('data'));
                    break;
                case 'testamentos-en-new-jersey':
                    $data['metadescription'] .= "Realizamos Testamentos en New Jersey de una manera ágil y rápida!";
                    $data['keywords'] .= ", realizar testamento new jersey, hacer testamento new jersey, tramitar testamento new jersey, make a will new jersey";
                    return view('web.office.testamentos', compact('data'));
                    break;
                case 'motor-vehicle-commission-en-new-jersey':
                    $data['metadescription'] .= "Motor Vehicle Commission en New Jersey de una manera ágil y rápida!";
                    $data['keywords'] .= ", traducir historial de manejo new jersey, obtener licencia de conducir new jersey, traducir documentos licencia de conducir";
                    return view('web.office.vehicle_comission', compact('data'));
                    break;
                case 'poder-notarial-new-jersey':
                    $data['metadescription'] .= "Realizamos Poderes Generales y Especiales en New Jersey de una manera ágil y rápida!";
                    $data['keywords'] .= ", realizar carta poder new jersey, realizar poder especial new jersey, realizar poder general new jersey, tramitar poder new jersey, make power of attorney new jersey, process power new jersey";
                    return view('web.office.poderes', compact('data'));
                    break;
                case 'traducir-documentos-new-jersey':
                    $data['metadescription'] .= "Traducimos todo tipo de Documentos en New Jersey de una manera ágil y rápida! ";
                    $data['keywords'] .= ", traducir documentos new jersey, traducir certificado de nacimiento new jersey, traducir diplomas new jersey, traducir certificado de matrimonio new jersey, traducir certificado de divorcio new jersey, traducir certificado de defuncion new jersey, traducir documentos medicos new jersey, traducir certificados estudiantiles new jersey, translate documents new jersey";
                    return view('web.office.traducciones', compact('data'));
                    break;
                case 'apostillar-documentos-new-jersey':
                    $data['metadescription'] .= "Apostillamos todo tipo de Documentos en New Jersey de una manera ágil y rápida!";
                    $data['keywords'] .= ", apostillar documentos new jersey, apostillar diploma new jersey, apostillar poder general new jersey, apostillar poder especial new jersey, apostillar certificado de matrimonio new jersey, apostillar certificado de defuncion new jersey, apostillar contrato new jersey, apostillar carta de invitacion new jersey, apostillar testamentos new jersey, apostillar declaraciones juradas new jersey, apostillar affidavit new jersey, apostillar acta de divorcio new jersey, apostillar facturas new jersey, apostille documents new jersey";
                    return view('web.office.apostillas', compact('data'));
                    break;
                case 'affidavit-support-en-new-jersey':
                    $data['metadescription'] .= "Realizamos Declaraciones Juradas (Affidavit) en New Jersey de una manera ágil y rápida!";
                    $data['keywords'] .= ", declaracion jurada new jersey, affidavit new jersey, realizar declaracion jurada new jersey, tramitar declaracion jurada new jersey, make an affidavit new jersey, process affidavit new jersey";
                    return view('web.office.affidavit', compact('data'));
                    break;
                case 'apostillar-certificado-de-nacimiento-new-jersey':
                    $data['description'] = 'Certificados de Nacimiento';
                    $data['metadescription'] = "Consulte por nuestro servicio de apostilla en certificados de nacimiento en New Jersey. Lo asesoramos de una manera segura. Solicítelo ahora! ✔";
                    $data['keywords'] = "que es un certificado de nacimiento, apostillar certificado de nacimiento en new jersey, apostillar acta de nacimiento en new jersey, apostillar partida de nacimiento en new jersey, donde apostillar certificado de nacimiento en new jersey, donde puedo realizar un certificado de nacimiento en new jersey, como apostillar un certificado de nacimiento en new jersey, apostillar certificado de nacimiento nj";
                    $data['content'] = ['¿Qué es un certificado de nacimiento?','¿Qué información contiene el certificado de nacimiento?','¿Para qué sirve la partida de nacimiento?','¿Donde puedo obtener un certificado de nacimiento?'];
                    $data['body'] = "<ul><li><h3>¿Qué es un certificado de nacimiento?</h3></li></ul>
                    <p>El certificado o acta de nacimiento es un documento emitido por el Registro Civil o Consulado respectivo, en el cual se da prueba del lugar, fecha
                        y hora del nacimiento, al igual que toda la información correspondiente como nombres y apellidos, sexo, etc.
                    </p>
                    <ul><li><h3>¿Qué información contiene el certificado de nacimiento?</h3></li></ul>
                    <p>En sí, el certificado de nacimiento contiene información básica del nacimiento y su inscripción. Entre estos consta datos como 
                        los nombres y apellidos del titular, lugar, fecha y hora del nacimiento, al igual que el nombre de los progenitores. 
                    </p>
                    <ul><li><h3>¿Para qué sirve la partida de nacimiento?</h3></li></ul>
                    <p>El acta o certificado de nacimiento es un documento esencial para llevar a cabo distintos trámites.</p>
                    <p>Entre estos pueden perfilar los siguientes:</p>
                    <ul>
                        <li>Obtener o renovar el documento de Identidad o Pasaporte</li>
                        <li>Para contraer matrimonio, trabajar fuera del país u obtener algun beneficio social</li>
                        <li>Solicitar permiso de paternidad</li>
                    </ul>
                    <ul><li><h3>¿Donde puedo obtener un certificado de nacimiento?</h3></li></ul>
                    <p>Puede completar el siguiente formulario o dirigirse personalmente a nuestras oficinas en ".$data['office']." donde un asesor lo guiará en el proceso de una manera correcta y segura.</p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-reporte-consular-new-jersey':
                    $data['description'] = 'Reporte Consular';
                    $data['metadescription'] = "Consulte por nuestro servicio de apostilla en reporte consular en New Jersey. Lo asesoramos de una manera segura. Solicítelo aquí! ✔";
                    $data['keywords'] = " apostillar crba new jersey, apostillar reporte consular en new jersey, donde puedo apostillar un reporte consular en new jersey, donde puedo apostillar un reporte consular de nacimiento en new jersey, donde solicitar el reporte consular en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-matrimonio-new-jersey':
                    $data['description'] = 'Certificados de Matrimonio';
                    $data['metadescription'] = "Notarizamos y Apostillamos certificados de matrimonio en New Jersey de una manera ágil y rápida. Contáctenos y lo ayudamos con el proceso ✔";
                    $data['keywords'] = "que es un certificado de matrimonio, requisitos para realizar un certificado de matrimonio en new jersey, donde puedo solicitar un certificado de matrimonio, apostillar certificado de matrimonio en new jersey, apostillar acta de matrimonio en new jersey, donde puedo apostillar un certificado de matrimonio en new jersey, donde apostillar certificado de matrimonio en new jersey";
                    $data['content'] = ['¿Qué es un certificado de matrimonio?','¿Para qué sirve el certificado de matrimonio?','¿Cómo registrar un matrimonio en el extranjero?','¿Qué requisitos se necesita para un certificado de matrimonio?','¿Donde puedo obtener un certificado de matrimonio?'];
                    $data['body'] = "<ul><li><h3>¿Qué es un certificado de matrimonio?</h3></li></ul>
                    <p>El acta o certificado de matrimonio es un documento que se encarga afirmar y legalizar la unión matrimonial entre dos personas. Dicho documento 
                        contiene información importante como el lugar, fecha y hora en el cual se realizó dicho proceso.
                    </p>
                    <ul><li><h3>¿Para qué sirve el certificado de matrimonio?</h3></li></ul>
                    En pocas palabras, el certificado o acta de matrimonio sirve para preservar y garantizar la unión matrimonial. Además de esto, este documento
                    permite verificar que contrajo matrimonio, lo cual lo ayudará para realizar ciertos trámites.
                    <ul><li><h3>¿Cómo registrar un matrimonio en el extranjero?</h3></li></ul> 
                    <p>Si un acto matrimonial se lleva a cabo en el exterior, deberá inscribir y certificar en el Consulado respectivo, el cual a su vez se comunicará
                        con el registro civil del país para proceder con el trámite.
                    </p>
                    <ul><li><h3>¿Qué requisitos se necesita para un certificado de matrimonio?</h3></li></ul>
                    <p>Para dar paso con el proceso de obtención del certificado de matrimonio, necesita tener presente lo siguiente:</p>
                    <ul>
                        <li>Nombres completos de las personas a contraer matrimonio</li>
                        <li>Fecha que se llevo a cabo el matrimonio</li>
                        <li>Lugar donde se celebró el matrimonio</li>
                        <li>Parentesco de quien lo solicita</li>
                        <li>Nombre completo del solicitante</li>
                    </ul>
                    <ul><li><h3>¿Donde puedo obtener un certificado de matrimonio?</h3></li></ul>
                    <p>
                        Si desea solicitar o apostillar un certificado de matrimonio puede realizarlo completando el siguiente formulario con su información o acercarse a nuestras oficinas en ".$data['office']." donde un asesor se contactará para ayudarlo
                        en el proceso de una manera correcta y segura.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-defuncion-new-jersey':
                    $data['description'] = 'Certificados de Defunción';
                    $data['metadescription'] = "Notarizamos y Apostillamos certificados de defunción en New Jersey de una manera segura y rápida. Contáctenos y lo asesoramos en el trámite ✔";
                    $data['keywords'] = "que es un certificado de defuncion, para que sirve un certificado de defuncion, donde puedo solicitar un certificado de defuncion en new jersey, apostillar certificado de defuncion en new jersey, apostillar acta de defuncion en new jersey, como apostillar un certificado de defuncion en new jersey, certificado de defuncion new jersey apostillar, como solicitar certificado de defuncion en new jersey";
                    $data['content'] = ['¿Qué es un certificado de defunción?','¿Para que me sirve un certificado de defunción?','¿Quién puede tramitar el certificado de defunción?','¿Ante que autoridad puedo solicitar un certificado de defunción?'];
                    $data['body'] = "<ul><li><h3>¿Qué es un certificado de defunción?</h3></li></ul>
                    <p>Un acta, partida o certificado de defunción es un documento mediante el cual termina cualquier proceso administrativo que la persona haya tenido en vida.</p>
                    <ul><li><h3>¿Para que me sirve un certificado de defunción?</h3></li></ul>
                    <p>Además de que un certificado de defunción permite a los familiares de la persona difunta llevar ciertos trámites, es el único medio de suspender completamente sus obligaciones frente al Estado y ante cualquier otra
                        institución con la que hubiera tenido algún compromiso.
                    </p>
                    <ul><li><h3>¿Quién puede tramitar el certificado de defunción?</h3></li></ul>
                    <p>La primera persona que tiene derecho ha tramitar este certificado de defunción es la pareja o cónyuge del difunto. Ante cualquier circunstancia
                        de que esta persona no pueda hacerlo, lo realizarán los familiares más cercanos de la persona que falleció.
                    </p>
                    <ul><li><h3 id='title'>¿Ante que autoridad puedo solicitar un certificado de defunción?</h3></li></ul>
                    <p>Si desea tramitar o apostillar un acta o certificado de defunción puede completar el siguiente formulario con su información o acercarse a nuestras oficinas en ".$data['office']." donde un asesor se comunicará con usted para guiarlo en el trámite de una manera correcta y segura.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-divorcio-new-jersey':
                    $data['description'] = 'Certificados de Divorcio';
                    $data['metadescription'] = "El certificado de divorcio es un escrito que constata la separación de una pareja. Para apostillar dicho documento contáctenos y lo asesoramos! ✔";
                    $data['keywords'] = "que es un certificado de divorcio, requisitos para un certificado de divorcio new jersey, solicitar certificado de divorcio en new jersey, apostillar documentos en new jersey, apostillar certificado de divorcio en new jersey, apostillar acta de divorcio en new jersey, donde apostillar certificado de divorcio en new jersey, donde puedo apostillar un certificado de divorcio en new jersey, donde puedo sacar el certificado de divorcio en new jersey";
                    $data['content'] = ['¿Qué es un acta o certificado de divorcio?','¿Para qué se utiliza un certificado de divorcio?','¿Cuáles son los requisitos necesarios para un certificado de divorcio?','¿Donde puedo obtener el certificado de divorcio?'];
                    $data['body'] = "<ul><li><h3>¿Qué es un acta o certificado de divorcio?</h3></li></ul>
                    <p>El certificado de divorcio es un escrito mediante el cual constata legalmente la separación de una pareja que estaba unida en matrimonio</p>
                    <ul><li><h3>¿Para qué se utiliza un certificado de divorcio?</h3></li></ul>
                    <p>Dicho documento es necesario para realizar distintos trámites dependiendo del país en el que se encuentre. Por ejemplo se solicita este documento cuando
                        una persona contrae nuevamente matrimonio.
                    </p>
                    <p>En Estados Unidos, este certificado es obligado para aquellos migrantes que soliciten el <i>Green Card</i> (Permiso de residencia permanente), para realizar cualquier tipo de trámite, renovar visa o pasaporte, etc.</p>
                    <ul><li><h3>¿Cuáles son los requisitos necesarios para un certificado de divorcio?</h3></li></ul>
                    <p>Entre los requerimientos que se solicitan para obtener dicho documento se encuentran los siguientes:</p>
                    <ol>
                        <li>Copia de certificado de nacimiento del esposa y esposa</li>
                        <li>En caso de tener hijos, copia del certificado de nacimiento de cada uno de ellos</li>
                        <li>Copia del certificado de matrimonio</li>
                        <li>Copia del documento de identidad</li>
                        <li>Solicitud y acuerdo de divorcio realizado por el abogado</li>
                        <li>Poder que se concede al abogado</li>
                    </ol>
                    <ul><li><h3>¿Donde puedo obtener el certificado de divorcio?</h3></li></ul>
                    <p>Si desea realizar dicho trámite puede completar el siguiente formulario con su información y un asesor se contactará con usted. O puede visitar
                        nuestras oficinas en ".$data['office']." donde se le brindará la ayuda necesaria con el trámite en gestión.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-naturalizacion-new-jersey':
                    $data['description'] = 'Certificados de Naturalización';
                    $data['metadescription'] = "El certificado de naturalización es un escrito que acredita la ciudadania a una persona extranjera. Contáctenos para el trámite de dicho documento ✔";
                    $data['keywords'] = "que es un certificado de naturalizacion, requisitos para sacar el certificado de naturalizacion en new jersey, apostillar certificado de naturalizacion en new jersey, apostillar acta de naturalizacion en new jersey, donde apostillar certificado de naturalizacion en new jersey, como sacar el certificado de naturalizacion en new jersey, como solicitar certificado de naturalizacion en new jersey, certificado de naturalizacion americana";
                    $data['content'] = ['¿Qué es un certificado de naturalización?','¿Para qué sirve un certificado de naturalización?','¿Cuáles son los requisitos para obtener el certificado de naturalización?','¿Donde puedo hacer el trámite para el certificado de naturalización?'];
                    $data['body'] = "<ul><li><h3>¿Qué es un certificado de naturalización?</h3></li></ul>
                    <p>El certificado de naturalización es un documento el cual acredita que una persona extranjera se conveirte en ciudadano del país en que reside.</p>
                    <ul><li><h3>¿Para qué sirve un certificado de naturalización?</h3></li></ul>
                    <p>Lo que hace el acta o certificado de naturalización es otorgarle a los ciudadanos naturalizados algunos privilegios y beneficios en el país que se encuentra, 
                        entre los cuales se encuentra la capacidad de votar. Sobre todo es un documento el cual le permite demostrar que es un ciudadano más de dicho país
                    </p>
                    <ul><li><h3>¿Cuáles son los requisitos para obtener el certificado de naturalización?</h3></li></ul>
                    <p>Algunos de los requerimientos para obtener su certificado de naturalización son los siguientes:</p>
                    <ol>
                        <li>Tener al menos 18 años</li>
                        <li>Ser residente al menos 5 años</li>
                        <li>Poder leer, escribir y hablar inglés básico</li>
                        <li>Comprender la historia básica del gobierno de los Estados Unidos</li>
                        <li>Ser una persona de buen carácter moral</li>
                    </ol>
                    <ul><li><h3>¿Donde puedo hacer el trámite para el certificado de naturalización?</h3></li></ul>
                    <p>Si desea empezar el proceso para adquirir el acta de naturalización puede completar el siguiente formulario con su información
                        o acercarse a nuestras oficinas en ".$data['office']." donde un asesor lo orientará en la gestión de dicho documento de una manera ágil y segura.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-expediente-de-adopcion-new-jersey':
                    $data['description'] = 'Expediente de Adopción';
                    $data['metadescription'] = "Notarizamos y Apostillamos todo tipo de documentos como el Expediente de Adopción de una manera rápida y segura. Contáctenos ahora! ✔";
                    $data['keywords'] = "apostillar expediente de adopcion en new jersey, apostillar expediente de adopcion cerca de mi, donde apostillar expediente de adopcion en new jersey, donde puedo apostillar expediente de adopcion en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-copia-de-pasaporte-new-jersey':
                    $data['description'] = 'Copia de pasaporte';
                    $data['metadescription'] = "Notarizamos y Apostillamos todo tipo de documentos como copia de pasaporte en New Jersey de una manerá ágil y segura. Contáctenos! ✔";
                    $data['keywords'] = "apostillar copia de pasaporte en new jersey, apostillar copia de pasaporte cerca de mi, donde apostillar copia de pasaporte en new jersey, como sacar copia de pasaporte en new jersey, donde puedo apostillar copia de pasaporte en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-copia-de-licencia-de-conducir-new-jersey':
                    $data['description'] = 'Copia de Licencia de Conducir';
                    $data['metadescription'] = "Apostillamos todo tipo de documentos como copia de licencia de conducir en New Jersey de una forma rápida y segura. Contáctenos! ✔";
                    $data['keywords'] = "apostillar copia licencia de conducir en new jersey, apostillar copia de licencia de conducir cerca de mi, donde apostillar copia de licencia de conducir en new jersey, donde puedo apostillar copia de licencia de conducir en new jersey, donde puedo solicitar una copia de licencia de conducir en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-escrituras-testamentos-new-jersey':
                    $data['description'] = 'Escrituras y Testamentos';
                    $data['metadescription'] = "Notarizamos y Apostillamos todo tipo de documentos como Escrituras y Testamentos en New Jersey de una forma segura. Solicite aquí! ✔";
                    $data['keywords'] = "apostillar escrituras en new jersey, apostillar testamento en new jersey, donde apostillar escrituras en new jersey, donde apostillar testamento en new jersey, donde puedo apostillar una escritura en new jersey, donde puedo apostillar un testamento en new jersey, apostillar escritura notarial en new jersey, apostillar escritura publica en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-declaraciones-juradas-de-estado-unico-new-jersey':
                    $data['description'] = 'Declaraciones Juradas';
                    $data['metadescription'] = "Notarizamos y Apostillamos Declaraciones Juradas (Affidávit) en New Jersey de una manera rápida y segura. Agende su cita ahora! ✔";
                    $data['keywords'] = "apostillar declaracion jurada en new jersey, apostillar declaracion juramentada en new jersey, apostillar affidavit support en new jersey, apostillar declaracion jurada cerca de mi, donde apostillar una declaracion jurada en new jersey, donde apostillar una declaracion juramentada en new jersey, donde apostillar affidavit en new jersey, apostillar declaracion juramentada en new jersey estados unidos";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-titulo-de-automovil-new-jersey':
                    $data['description'] = 'Título de coche/automóvil';
                    $data['metadescription'] = "Notarizamos y Apostillamos Título de Automóvil en New Jersey de una forma ágil y segura. Consulte por nuestros servicios y lo ayudamos en el trámite ✔";
                    $data['keywords'] = "apostillar documentos en new jersey, apostillar titulo de automovil en new jersey, apostillar titulo de coche en new jersey, donde apostillar titulo de automovil en new jersey, donde apostillar titulo de coche en new jersey, apostillar titulo de auto en new jersey, apostillar titulo de vehiculo en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-autorizacion-de-viaje-new-jersey':
                    $data['description'] = 'Autorización de Viaje';
                    $data['metadescription'] = "Notarizamos y Apostillamos todo tipo de documentos como Autorización de Viaje en New Jersey de una manera segura. Consulte por nuestros servicios ✔";
                    $data['keywords'] = "que es una autorizacion de viaje, requisitos para autorizacion de viaje en new jersey, apostillar autorizacion de viaje en new jersey, apostillar autorizacion de viaje cerca de mi, donde apostillar una autorizacion de viaje en new jersey, donde puedo apostillar una autorizacion de viaje en new jersey, apostillar autorizacion de viaje para menor de edad en new jersey, donde puedo hacer una autorizacion de viaje para niños en new jersey, carta de autorizacion de viaje en new jersey";
                    $data['content'] = ['¿Qué es una autorización de viaje?','¿En qué situaciones se pide una autorización de viaje?','¿Qué requisitos necesito para la autorización de un viaje?','¿Ante que autoridad puedo solicitar una autorización de viaje?'];
                    $data['body'] = "<ul><li><h3 id='title'>¿Qué es una autorización de viaje?</h3></li></ul>
                    <p>Una autorización de viaje es un escrito en el cual uno o ambos padres autorizan el viaje, dentro o fuera del país, de su hijo o hija menor de edad, ya sea con los mismos, algún familiar o solos.</p>
                    <ul><li><h3 id='title'>¿En qué situaciones piden la autorización de viaje?</h3></li></ul>
                    <p>La autorización de viaje se puede solicitar cuando:</p>
                    <ol>
                        <li>El menor de edad viaja dentro o fuera del país sin ninguno de sus padres</li>
                        <li>El menor de edad viaje con terceras personas, las cuales pueden ser familiares</li>
                    </ol>
                    <ul><li><h3 id='title'>¿Qué requisitos necesito para la autorización de viaje?</h3></li></ul>
                    <p>Los requerimientos para solicitar una autorización de viaje son los siguientes:</p>
                    <ol>
                        <li>Identificación de uno o ambos padres o de su representante legal</li>
                        <li>Nombres y apellidos del menor de edad</li>
                        <li>Fecha de nacimiento del menor</li>
                        <li>En caso de que viaje con una tercera persona, nombres y apellidos de la misma</li>
                        <li>Información del vuelo</li>
                    </ol>
                    <ul><li><h3 id='title'>¿Ante que autoridad puedo solicitar una autorización de viaje?</h3></li></ul>
                    <p>Las autorizaciones de viaje se pueden tramitar ante cualquier Notaría Pública en el territorio en el que se encuentre. Si necesita solicitar o apostillar
                        una autorización de viaje acérquese a nuestra oficina en ". $data['office']." con los requisitos necesarios o <b>complete el siguiente formulario</b> y una asesor lo contáctara
                        para guiarlo de una manera correcta y segura.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-poder-notarial-personal-new-jersey':
                    $data['description'] = 'Poder Notarial Personal';
                    $data['metadescription'] = "Notarizamos y Apostillamos todo tipo de documentos como Poder Notarial Personal en New Jersey de una forma segura. Contáctenos ahora! ✔";
                    $data['keywords'] = "apostillar documentos en new jersey, apostillar poder notarial en new jersey, apostillar carta poder en new jersey, apostillar poder notarial cerca de mi, donde apostillar carta poder en new jersey, donde apostillar poder notarial en new jersey, donde puedo apostillar un poder en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-registro-de-policia-estatal-new-jersey':
                    $data['description'] = 'Registro de la policía estatal';
                    $data['metadescription'] = "Apostillamos todo tipo de documentos como Registro de la Policía Estatal en New Jersey de una manera ágil y segura. Contáctenos! ✔";
                    $data['keywords'] = "apostillar documentos en new jersey, apostillar registro policial en new jersey, apostillar registro de la policia en new jersey, apostillar registro policial cerca de mi, donde apostillar registro policial en new jersey, donde puedo apostillar un registro policial en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-registro-de-antecedentes-fbi-new-jersey':
                    $data['description'] = 'Registros de antecedentes del FBI';
                    $data['metadescription'] = "Apostillamos Registro de Antecedentes del FBI en New Jersey de una forma rápida y segura. Consulte ahora por nuestros servicios! ✔";
                    $data['keywords'] = "notaria latina en elizabeth new jersey, apostillar documentos en new jersey, apostillar antecedentes del fbi en new jersey, apostillar registro de antecentes del fbi en new jersey, apostillar registros de antecedentes del fbi cerca de mi, donde apostillar antecedentes del fbi en new jersey, donde apostillar registro de antecedentes del fbi en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-diploma-universitario-new-jersey':
                    $data['description'] = 'Diploma Universitario';
                    $data['metadescription'] = "Apostillamos Diplomas Universitarios en New Jersey de una forma segura. Contáctese con nosotros ahora y lo asesoramos en el trámite ✔";
                    $data['keywords'] = "notaria latina en elizabeth new jersey, notaria en elizabeth nj, apostillar documentos en new jersey, apostillar diploma universitario en new jersey, apostillar diploma universitario cerca de mi, apostillar titulo universitario en new jersey, donde apostillar diploma universitario en new jersey, donde puedo apostillar un titulo universitario en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-transcripcion-universitaria-new-jersey':
                    $data['description'] = 'Transcripción Universitaria';
                    $data['metadescription'] = "Apostillamos Transcripción Universitaria en New Jersey de una manera rápida y segura. Contáctese con nosotros y lo ayudamos en el trámite! ✔";
                    $data['keywords'] = "notaria latina en elizabeth new jersey, notaria en elizabeth nj, apostillar documentos en new jersey, apostillar transcripcion universitaria en new jersey, apostillar transcripcion universitaria cerca de mi, apostillar transcripcion de titulo universitario en new jersey, donde apostillar transcripcion universitaria en new jersey, donde apostillar transcripcion de titulo universitario en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-diploma-de-escuela-secundaria-new-jersey':
                    $data['description'] = 'Diploma de Escuela Secundaria';
                    $data['metadescription'] = "Apostillamos Diploma de Escuela Secundaria en New Jersey de una forma ágil y segura. Contáctenos y lo asesoramos con el trámite ✔";
                    $data['keywords'] = "notaria latina en elizabeth new jersey, notaria en elizabeth nj, apostillar documentos en new jersey, apostillar diploma secundario en new jersey, apostillar diploma de escuela secundaria en new jersey, apostillar diploma escuela secundaria cerca de mi, donde apostillar diploma de secundaria en new jersey, donde apostillar diploma de escuela secundaria en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-transcripcion-de-escuela-secundaria-new-jersey':
                    $data['description'] = 'Transcripción de Escuela Secundaria';
                    $data['metadescription'] = "Apostillamos Transcripción de Escuela Secundaria en New Jersey de una manera rápida y segura. Agende su cita aquí para ayudarlo con el trámite! ✔";
                    $data['keywords'] = "notaria latina en elizabeth new jersey, notaria en elizabeth nj, apostillar documentos en new jersey, apostillar transcripcion de secundaria en new jersey, apostillar transcripcion de escuela secundaria en new jersey, donde apostillar transcripcion de escuela secundaria en new jersey, donde puedo apostillar una transcripcion de secundaria en new jersey, apostillar transcripcion de secundaria cerca de mi";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-incorporacion-new-jersey':
                    $data['description'] = 'Certificado de Incorporación';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Incorporación en New Jersey? En Notaria Latina podemos ayudarte con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de incorporacion, apostillar acta de incorporacion, apostillar certificado de incorporacion near me, apostillar certificado de incorporacion new jersey, apostille certificate of incorporation new jersey, donde apostillar certificado de incorporacion en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-buena-reputacion-new-jersey':
                    $data['description'] = 'Certificado de Buena Reputación';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Buena Reputación en New Jersey? Notaria Latina te ayuda con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de buena reputacion, apostillar certificado de buena reputacion near me, apostillar certificado de buena reputacion new jersey, apostille certificate of good standing new jersey, donde apostillar certificado de buena reputacion en new jersey";
                    $data['content'] = ['¿Qué es un certificado de buena reputación?','¿Para qué sirve un certificado de buena reputación?','¿Qué necesito para obtener el certificado de buena reputación?','¿Donde puedo obtener el certificado de buena reputación?'];
                    $data['body'] = "<ul><li><h3>¿Qué es un certificado de buena reputación?</h3></li></ul>
                    <p>Un certificado de buena reputación es un documento que avala que una institución comercial en la actualidad esta registrada y con los permisos correspondientes
                        para realizar negocios-
                    </p>
                    <ul><li><h3>¿Para qué sirve un certificado de buena reputación?</h3></li></ul>
                    <p>El obtener un certificado de buena reputación no es obligado. sin embargo es útil cuando necesite realizar una serie de trámites como por ejemplo abrir una cuenta bancaria comercial,
                        obtener pagos de clientes por medio de tarjetas de crédito o débito, requerir algpun tipo de crédito para su negocio, etc.
                    </p>
                    <ul><li><h3>¿Qué necesito para obtener el certificado de buena reputación?</h3></li></ul>
                    <p>El principal requisito para obtener su certificado de buena reputación es estar registrado en la Secretaría de Estado dependiento en el que se encuentre. Para esto, deberá
                        contar con el nombre de su institución y el número de registro.
                    </p>
                    <p>Para que el certificado sea emitido, su entidad comercial deberá constar con lo siguiente:</p>
                    <ol>
                        <li>Estar registrado</li>
                        <li>Contar con los documentos necesarios, por ejemplo una declaración anual</li>
                        <li>Pagar la tarifa requerida</li>
                    </ol>
                    <ul><li><h3>¿Donde puedo obtener el certificado de buena reputación?</h3></li></ul>
                    <p>Si desea realizar el trámite para obtener dicho documento complete el siguiente formulario con su información o puede acercarse a nuestra oficinas
                        en ... donde un asesir se contactará con usted para brindarle la ayuda necesaria.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-origen-new-jersey':
                    $data['description'] = 'Certificado de Origen';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Origen en New Jersey? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de origen, apostillar certificado de origen near me, apostillar certificado de origen new jersey, apostille certificate of origin new jersey, donde apostillar certificado de origen en new jersey";
                    $data['content'] = ['¿Qué es el certificado de origen?','¿Para qué sirve el certificado de origen?','¿Cómo puedo obtener el certificado de origen?','¿Donde puedo tramitar el certificado de origen?'];
                    $data['body'] = "<ul><li><h3>¿Qué es el certificado de origen?</h3></li></ul>
                    <p>El certificado de origen es un documento cuyo objetivo es determinar el país de procedencia de dicha mercancia, por ello dispone
                        de algunas preferencias o beneficios debido algunos acuerdos comerciales entre países.
                    </p>
                    <ul><li><h3>¿Para qué sirve el certificado de origen?</h3></li></ul>
                    <p>Este certificado de origen sirve para garantizar la procedencia de los productos que pretende entrar a un territorio.</p>
                    <ul><li><h3>¿Cómo puedo obtener el certificado de origen?</h3></li></ul>
                    <p>La información básica y necesario para la obtención de un certificado de origen es la siguiente:</p>
                    <ol>
                        <li>Información de la autoridad que certifica el documento</li>
                        <li>Información de las personas que exporta e importa</li>
                        <li>Características del producto (Peso, Marca, Cantidad, etc.)</li>
                        <li>Identificar la mercancía mediante la clasificación arancelaria</li>
                        <li>Tipo de embalaje</li>
                    </ol>
                    <ul><li><h3>¿Donde puedo tramitar el certificado de origen?</h3></li></ul>
                    <p>Para poder comenzar con el proceso del certificado de origen puede completar el siguiente formulario con su información correspondiente o dirigirse 
                        a nuestras oficinas en ".$data['office']." donde un asesor lo guiará en el proceso de una manera ágil y segura.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-marca-patente-new-jersey':
                    $data['description'] = 'Marcas o Patentes';
                    $data['metadescription'] .= "¿Necesitas apostillar una Marca o Patente en New Jersey? En Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar marca new jersey, apostillar patente new jersey, apostillar marca near me, apostillar patente near me, apostillar marca, apostille mark new jersey, apostille patent new jersey, donde apostillar marca en new jersey, donde apostillar patente en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-poder-comercial-new-jersey':
                    $data['description'] = 'Poder Comercial';
                    $data['metadescription'] .= "¿Necesitas apostillar un Poder Comercial en New Jersey? Notaria Latina te ayuda con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar poder comercial,  apostillar poder comercial new jersey, apostillar poder comercial near me, apostille commercial power new jersey, donde apostillar poder comercial new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-declaracion-jurada-comercial-new-jersey':
                    $data['description'] = 'Declaración Jurada Comercial';
                    $data['metadescription'] .= "¿Necesitas apostillar una Declaración Jurada Comercial en New Jersey? Nosotros te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar declaracion jurada comercial, apostillar affidavit comercial, apostillar declaracion jurada comercial near me, apostillar declaracion jurada comercial new jersey, apostille commercial affidavit new jersey, apostillar affidavir comercial new jersey, donde apostillar affidavit comercial en new jersey";
                    $data['content'] = ['¿Qué es una declaración juramentada comercial?','¿Para qué sirve una declaración juramentada?','¿Ante que situaciones necesito una declaración juramentada?','¿Qué requisitos son necesarios para una declaración juramentada?','¿Donde puedo solicitar una declaración juramentada?'];
                    $data['body'] = "<ul><li><h3>¿Qué es una declaración juramentada comercial?</h3></li></ul>
                    <p>Una declaración juramentada es una documento mediante el cual una persona manifiesta una situación o un hecho, el mismo que es verificado y garantizado mediante una autoridad competente</p>
                    <ul><li><h3>¿Para qué sirve una declaración juramentada?</h3></li></ul>
                    <p>El objetivo de dicho documento es generar un compromiso legal de la persona que hace la declaración acorde a lo que esta estipulado en el escrito. Es decir, el declarante se compromote
                        con la veracidad de lo que ha manifestado. En la mayoría de los casos se utilizan para reunir pruebas en un juicio o en otros aspectos como asuntos familiares, bienes raíces, etc.
                    </p>
                    <ul><li><h3>¿Ante que situaciones necesito una declaración juramentada?</h3></li></ul>
                    <p>La declaración juramentada puede ser necesaria para diferentes situaciones, entre las cuales perfilan los ingresos de una persona, situación familiar o para declarar que una personas cumple con ciertos
                        requerimientos necesarios para realizar algún trámite legal.
                    </p>
                    <ul><li><h3>¿Qué requisitos son necesarios para una declaración juramentada?</h3></li></ul>
                    <p>Una declaración juramentada debe satisfacer los siguientes requisitos:</p>
                    <ol>
                        <li>Nombres y dirección del solicitante</li>
                        <li>Firma de la persona que solicita, testigos y notario</li>
                        <li>La declaración debe estar acorde a la postura del declarante</li>
                        <li>Dicho documento no debe ser obligado para los testigos, es decir debe ser voluntaria</li>
                    </ol>
                    <ul><li><h3>¿Donde puedo solicitar una declaración juramentada?</h3></li></ul>
                    <p>Si necesita apostillar u obtener una declaración juramentada puede completar el siguiente formulario o acercarse a nuestras oficinas en ... para que un asesor pueda
                        contactarse con usted y brindarle la asesoría necesaria.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-fda-new-jersey':
                    $data['description'] = 'Certificado FDA';
                    $data['metadescription'] .= "¿Necesitas apostillar un certificado FDA en New Jersey? En Notaria Latina te ayudamos con el trámite de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar certificado fda, apostillar certificado fda near me, apostillar certificado fda new jersey, apostille fda certificate new jersey, donde apostillar certificado fda en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-facturas-new-jersey':
                    $data['description'] = 'Facturas';
                    $data['metadescription'] .= "¿Necesitas apostillar Facturas en New Jersey? Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar facturas, apostillar facturas near me, apostillar factura new jersey, apostille invoices new jersey, donde apostillar facturas en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;   
                case 'apostillar-departamento-de-hacienda-new-jersey':
                    $data['description'] = 'Departamento de Hacienda';
                    $data['metadescription'] .= "Apostillamos Departamento de Hacienda en New Jersey de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar documento departamento de hacienda, apostillar departamento de hacienda near me, apostillar departamento de hacienda new jersey, apostille department of finance new jersey, donde apostillar departamento de hacienda en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-gobierno-extranjero-new-jersey':
                    $data['description'] = 'Certificado de Gobierno Extranjero';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Gobierno Extranjero en New Jersey? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de gobierno extranjero, apostillar certificado de gobierno extranjero near me, apostillar certificado de gobierno extranjero new jersey, apostille foreign government certificate new jersey, apostillar certificado de gobierno extranjero en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-venta-gratis-new-jersey':
                    $data['description'] = 'Certificado de Venta gratis';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Venta en New Jersey? En Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de venta, apostillar acta de venta, apostillar certificado de venta near me, apostillar acta de venta near me, apostillar certificado de venta new jersey, apostillar acta de venta new jersey, apostille sales certificate new jersey, donde apostillar certificado de venta en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-ordenes-de-compra-new-jersey':
                    $data['description'] = 'Órdenes de compra';
                    $data['metadescription'] .= "¿Necesitas apostillar una Órden de Compra en New Jersey? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar orden de compra, apostillar orden de compra near me, apostillar orden de compra new jersey, apostille purchase order new jersey, donde apostillar orden de compra en new jersey";
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
            $data['imggrid'] = 'img/oficinas/ICONOS-17.webp';
            $data['txtgrid'] = 'Affidávit Support';
            $data['telfHidden'] = '+19088009046';
            $data['telfWpp'] = '13479739888';
            $data['telfShow'] = '908-800-9046';
            $data['imgapostilla'] = 'img/oficinas/apostillanj.webp';
            $data['imgup'] = 'img/newjersey-landing-notaria-latina.webp';
            $data['imgdown'] = 'img/oficinas/CHICA-APOST.webp';
            $data['widthimgdown'] = '70%';
            $data['heightimgdown'] = '25rem';
            $data['paddingtop'] = '15px';
            $data['urlmap'] = 'https://g.page/r/CVNRV-zNuJiZEAE';
            $data['imgurlmap'] = "img/oficinas/maps-nj-2.webp";
            $data['imgurlmapmobile'] = "img/oficinas/maps-nj-mobile-2.webp";
            $data['keywords'] = 'notaria en new jersey, notaria publica en new jersey, notaria latina en elizabeth new jersey, notaria en elizabeth nj, notario publico en new jersey, notaria publica latina en nj, notarizar documentos en new jersey, notaria cerca de mi, notario publico cerca de mi, apostillar documentos en new jersey';
    
            return view('web.oficina', compact('data'));
        }
    }

    public function oficinasfl(?string $service = null){
        $data['office'] = 'Florida';
        $data['telfHidden'] = '+13056003290';
        $data['telfWpp'] = '13056003290';
        $data['telfShow'] = '305-600-3290';
        $data['metadescription'] = "";
        $data['keywords'] = 'tramitar documentos florida, certificar documentos florida, traducir documentos florida, apostillar cerca de mi, apostille near me, apostille florida, apostillar florida, apostillar documentos rapido florida, apostillar documentos florida, donde puedo apostillar un documento, donde apostillar en florida, apostillado de documentos, fast document apostille florida, apostillar documentos fl, tramitar documentos fl, notarizar documentos fl';
        if($service != null){
            switch ($service) {
                case 'certificaciones-en-florida':
                    $data['metadescription'] .= "Realizamos todo tipo de Certificaciones en Florida de una manera ágil y rápida!";
                    $data['keywords'] .= ", certificar acta de nacimiento florida, certificar acta de matrimonio florida, certificar cartas florida, certificar licencia de conducir florida, certificar declaracion jurada florida, certificar affidavit florida, certificar escrituras florida";
                    return view('web.office.certificaciones', compact('data'));
                    break;
                case 'travel-authorization-en-florida':
                    $data['metadescription'] .= "Realizamos Autorizaciones de Viaje para Menores de Edad en Florida de una manera ágil y rápida!";
                    $data['keywords'] .= ", autorizacion de viaje florida, tramitar autorizacion de viaje florida, realizar autorizacion de viaje florida, obtener autorizacion de viaje florida, make florida travel authorization";
                    return view('web.office.authorization', compact('data'));
                    break;
                case 'acuerdos-en-florida':
                    $data['metadescription'] .= "Realizamos Acuerdos en Florida de una manera ágil y rápida!";
                    $data['keywords'] .= ", tramitar acuerdo florida, realizar acuerdo florida, process agreement florida, make deal florida";
                    return view('web.office.acuerdos', compact('data'));
                    break;
                case 'cartas-de-invitacion-en-florida':
                    $data['metadescription'] .= "Tramitamos Cartas de Invitación en Florida de una manera ágil y rápida!";
                    $data['keywords'] .= ", realizar carta de invitacion florida, tramitar carta de invitacion florida, make invitation letter florida, process letter of invitation florida";
                    return view('web.office.invitacion', compact('data'));
                    break;
                case 'revocatorias-en-florida':
                    $data['metadescription'] .= "Realizamos Revocatorias de Poderes en Florida de una manera ágil y rápida!";
                    $data['keywords'] .= ", revocar carta poder florida, revocar poder general florida, revocar poder especial florida, realizar revocatoria florida, anular poder florida, anular carta poder florida, cancelar poder florida, cancelar carta poder florida, revoke power florida, override power florida, cancel power florida";
                    return view('web.office.revocatorias', compact('data'));
                    break;
                case 'contratos-en-florida':
                    $data['metadescription'] .= "Realizamos todo tipo de Contratos en Florida de una manera ágil y rápida!";
                    $data['keywords'] .= ", contrato de arrendamiento florida, contrato de trabajo florida, contrato de renta florida, realizar contrato de arriendo florida, realizar contrato compra venta florida, realizar contrato prestamo florida, realizar contrato prenupcial florida, realizar contrato de servicio florida, realizar contrato de transporte florida, make contract florida";
                    return view('web.office.contratos', compact('data'));
                    break;
                case 'testamentos-en-florida':
                    $data['metadescription'] .= "Realizamos Testamentos en Florida de una manera ágil y rápida!";
                    $data['keywords'] .= ", realizar testamento florida, hacer testamento florida, tramitar testamento florida, make a will florida";
                    return view('web.office.testamentos', compact('data'));
                    break;
                case 'matrimonios-en-florida':
                    $data['metadescription'] .= "Notarizamos Certificados de Matrimonio en Florida de una manera ágil y rápida!";
                    $data['keywords'] .= ", notarizar certificado de matrimonio florida, tramitar certificado de matrimonio florida, notarizar acta de matrimonio florida, tramitar acta de matrimonio florida, notarize marriage certificate florida, process marriage certificate florida";
                    return view('web.office.matrimonios', compact('data'));
                    break;
                case 'poder-notarial-florida':
                    $data['metadescription'] .= "Realizamos Poderes Generales y Especiales en Florida de una manera ágil y rápida!";
                    $data['keywords'] .= ", realizar carta poder florida, realizar poder especial florida, realizar poder general florida, tramitar poder florida, make power of attorney florida, process power florida";
                    return view('web.office.poderes', compact('data'));
                    break;
                case 'traducir-documentos-florida':
                    $data['metadescription'] .= "Traducimos todo tipo de Documentos en Florida de una manera ágil y rápida! ";
                    $data['keywords'] .= ", traducir documentos florida, traducir certificado de nacimiento florida, traducir diplomas florida, traducir certificado de matrimonio florida, traducir certificado de divorcio florida, traducir certificado de defuncion florida, traducir documentos medicos florida, traducir certificados estudiantiles florida, translate documents florida";
                    return view('web.office.traducciones', compact('data'));
                    break;
                case 'apostillar-documentos-florida':
                    $data['metadescription'] .= "Apostillamos todo tipo de Documentos en Florida de una manera ágil y rápida!";
                    $data['keywords'] .= ", apostillar documentos florida, apostillar diploma florida, apostillar poder general florida, apostillar poder especial florida, apostillar certificado de matrimonio florida, apostillar certificado de defuncion florida, apostillar contrato florida, apostillar carta de invitacion florida, apostillar testamentos florida, apostillar declaraciones juradas florida, apostillar affidavit florida, apostillar acta de divorcio florida, apostillar facturas florida, apostille documents florida";
                    return view('web.office.apostillas', compact('data'));
                    break;
                case 'affidavit-support-en-florida':
                    $data['metadescription'] .= "Realizamos Declaraciones Juradas (Affidavit) en Florida de una manera ágil y rápida!";
                    $data['keywords'] .= ", declaracion jurada florida, affidavit florida, realizar declaracion jurada florida, tramitar declaracion jurada florida, make an affidavit florida, process affidavit florida";
                    return view('web.office.affidavit', compact('data'));
                    break;
                case 'apostillar-certificado-de-nacimiento-florida':
                    $data['description'] = 'Certificados de Nacimiento';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Nacimiento en Florida? En Notaria Latina te ayudamos de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar acta de nacimiento near me, apostillar partida de nacimiento florida, apostillar inscripcion de nacimiento florida, apostillar certificado de nacimiento florida, apostillar acta de nacimiento florida, donde apostillar certificado de nacimiento en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-reporte-consular-florida':
                    $data['description'] = 'Reporte Consular';
                    $data['metadescription'] .= "¿Necesitas apostillar un Reporte Consular (CRBA) en Florida? En Notaria Latina lo hacemos de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar crba near me, apostillar crba florida, apostillar reporte consular de nacimiento en el extranjero florida, apostillar certificado de nacimiento en el extranjero florida, apostillar inscripcion de nacimiento extranjero florida, apostillar acta de nacimiento extranjero florida, apostille birth certificate abroad florida, donde apostillar crba en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-matrimonio-florida':
                    $data['description'] = 'Certificados de Matrimonio';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Matrimonio en Florida? Notaria Latina te ayuda de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de matrimonio near me, apostillar certificado de matrimonio en florida, apostillar acta de matrimonio en florida, apostilla matrimonio florida, apostillar partida de matrimonio florida, apostille marriage certificate, apostille marriage certificate florida, donde apostillar certificado de matrimonio en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-defuncion-florida':
                    $data['description'] = 'Certificados de Defunción';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Defunción en Florida? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de defuncion, apostillar certificado de defuncion near me, apostillar certificado de defuncion en florida, apostillar acta de defuncion en florida, como apostillar un certificado de defuncion, apostillado de certificado de defuncion, apostille death certificate florida, apostille death certificate near me, donde apostillar certificado de defuncion en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-divorcio-florida':
                    $data['description'] = 'Certificados de Divorcio';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Divorcio en Florida? En Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de divorcio, apostillar acta de divorcio, apostillar certificado de divorcio near me, apostillar certificado de divorcio en florida, apostilllar acta de divorcio florida, apostillar sentencia de divorcio florida, apostille divorce certificate florida, apostille divorce certificate near me, donde apostillar certificado de divorcio en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-naturalizacion-florida':
                    $data['description'] = 'Certificados de Naturalización';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Naturalización en Florida? Nosotros podemos ayudarte con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de naturalizacion, apostillar acta de naturalizacion, apostillar certificado de naturalizacion near me, apostillar certificado de naturalizacion florida, apostillar acta de naturalizacion florida, apostille naturalization certificate near me, apostille naturalization certificate florida, donde apostillar certificado de naturalizacion en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-expediente-de-adopcion-florida':
                    $data['description'] = 'Expediente de Adopción';
                    $data['metadescription'] .= "¿Necesitas apostillar un Expediente de Adopción en Florida? En Notaria Latina te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar expediente de adopcion, apostillar expediente de adopcion near me, apostillar expediente de adopcion florida, apostille adoption file, apostille adoption file near me, apostille adoption file florida, donde apostillar expediente de adopcion en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-copia-de-pasaporte-florida':
                    $data['description'] = 'Copia de pasaporte';
                    $data['metadescription'] .= "¿Necesitas apostillar una copia de pasaporte en Florida? Nosotros podemos ayudarte con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar copia de pasaporte, apostillar copia de pasaporte near me, apostillar copia de pasaporte florida, apostille copy of passport, apostille copy of passport near me, apostille copy of passport florida, donde apostillar copia de pasaporte en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-copia-de-licencia-de-conducir-florida':
                    $data['description'] = 'Copia de Licencia de Conducir';
                    $data['metadescription'] .= "¿Necesitas apostillar una copia de licencia de conducir en Florida? Notaria Latina te ayuda con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar licencia de conducir, apostillar copia de licencia de conducir, apostillar copia de licencia de conducir near me, apostillar copia de licencia de conducir florida, apostille copy of driver's license, apostille copy of driver's license near me, apostille copy of driver's license florida, donde apostillar copia de licencia de conducir en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-escrituras-testamentos-florida':
                    $data['description'] = 'Escrituras y Testamentos';
                    $data['metadescription'] .= "¿Necesitas apostillar una escritura o testamento en Florida? Nosotros te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar escrituras, apostillar testamento, apostillar escrituras near me, apostillar testamentos near me, apostillar escrituras florida, apostillar testamentos florida, apostille deeds near me, apostille deeds florida, apostille wills near me, apostille wills florida, donde apostillar escrituras en florida, donde apostillar testamentos en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-declaraciones-juradas-de-estado-unico-florida':
                    $data['description'] = 'Declaraciones Juradas';
                    $data['metadescription'] .= "¿Necesitas apostillar una Declaración Jurada (Affidávit) en Florida? En Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar affidavit, apostillar declaracion jurada, apostillar affidavit near me, apostillar declaracion jurada near me, apostillar affidavit near me, apostillar declaracion jurada florida, apostille affidavit, donde apostillar affidavit en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-titulo-de-automovil-florida':
                    $data['description'] = 'Título de coche/automóvil';
                    $data['metadescription'] .= "¿Necesitas apostillar un Título de Automóvil en Florida? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar titulo de automovil, apostillar titulo de automovil near me, apostillar titulo de automovil florida, apostille car title, apostille car title near me, apostille car title florida, donde apostillar titulo de automovil en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-autorizacion-de-viaje-florida':
                    $data['description'] = 'Autorización de Viaje';
                    $data['metadescription'] .= "¿Necesitas apostillar una Autorización de Viaje en Florida? Notaria Latina podemos ayudarte con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar autorizacion de viaje, apostillar autorizacion de viaje near me, apostillar autorizacion de viaje florida, apostille travel authorization, apostille travel authorization near me, apostille travel authorization florida, donde apostillar autorizacion de viaje en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-poder-notarial-personal-florida':
                    $data['description'] = 'Poder Notarial Personal';
                    $data['metadescription'] .= "¿Necesitas apostillar una Carta Poder en Florida? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar poder notarial, apostillar carta poder florida, apostillar poder notarial near me, apostillar poder notarial florida, apostillar poder personal florida, apostille power of attorney, apostille power of attorney florida, donde apostillar carta poder en florida, donde apostillar poder notarial en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-registro-de-policia-estatal-florida':
                    $data['description'] = 'Registro de la policía estatal';
                    $data['metadescription'] .= "¿Necesitas apostillar un Registro Policial en Florida? En Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar registro policial, apostillar registro de policia estatal, apostillar registro policial near me, apostillar registro policial florida, apostille police record florida, apostill police record florida, donde apostillar registro policial florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-registro-de-antecedentes-fbi-florida':
                    $data['description'] = 'Registros de antecedentes del FBI';
                    $data['metadescription'] .= "¿Necesitas apostillar un Registro de Antecedentes FBI en Florida? Notaria Latina lo hace por ti de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar antecedentes del fbi, apostillar registro de antecentes del fbi, apostillar registros de antecedentes del fbi near me, apostillar registros de antecedentes del fbi florida, apostille fbi background check florida, donde apostillar antecedentes del fbi florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-diploma-universitario-florida':
                    $data['description'] = 'Diploma Universitario';
                    $data['metadescription'] .= "¿Necesitas apostillar un Diploma Universitario en Florida? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar diploma, apostillar diploma universitario near me, apostillar diploma universitario florida, apostillar titulo universitario florida, apostille university diploma florida, donde apostillar diploma universitario en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-transcripcion-universitaria-florida':
                    $data['description'] = 'Transcripción Universitaria';
                    $data['metadescription'] .= "¿Necesitas apostillar una Transcripción Universitaria en Florida? En Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar transcripcion universitaria, apostillar transcripcion universitaria near me, apostillar transcripcion universitaria florida, apostillar transcripcion titulo universitario florida, apostille university transcript florida, donde apostillar transcripcion universitaria florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-diploma-de-escuela-secundaria-florida':
                    $data['description'] = 'Diploma de Escuela Secundaria';
                    $data['metadescription'] .= "¿Necesitas apostillar un Diploma de Escuela Secundaria en Florida? Notaria Latina te ayuda con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar diploma secundario, apostillar diploma escuela secundaria, apostillar diploma escuela secundaria near me, apostillar diploma escuela secundaria florida, apostille high school diploma florida, donde apostillar diploma secundaria en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-transcripcion-de-escuela-secundaria-florida':
                    $data['description'] = 'Transcripción de Escuela Secundaria';
                    $data['metadescription'] .= "¿Necesitas apostillar una Transcripción de Escuela Secundaria en Florida? Nosotros te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar transcripcion de escuela secundaria, apostillar transcripcion de escuela secundaria near me, apostillar transcripcion de escuela secundaria florida, apostille high school transcript florida, donde apostillar transcripcion de escuela secundaria florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-incorporacion-florida':
                    $data['description'] = 'Certificado de Incorporación';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Incorporación en Florida? En Notaria Latina podemos ayudarte con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de incorporacion, apostillar acta de incorporacion, apostillar certificado de incorporacion near me, apostillar certificado de incorporacion florida, apostille certificate of incorporation florida, donde apostillar certificado de incorporacion en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-buena-reputacion-florida':
                    $data['description'] = 'Certificado de Buena Reputación';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Buena Reputación en Florida? Notaria Latina te ayuda con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de buena reputacion, apostillar certificado de buena reputacion near me, apostillar certificado de buena reputacion florida, apostille certificate of good standing florida, donde apostillar certificado de buena reputacion en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-origen-florida':
                    $data['description'] = 'Certificado de Origen';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Origen en Florida? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de origen, apostillar certificado de origen near me, apostillar certificado de origen florida, apostille certificate of origin florida, donde apostillar certificado de origen en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-marca-patente-florida':
                    $data['description'] = 'Marcas o Patentes';
                    $data['metadescription'] .= "¿Necesitas apostillar una Marca o Patente en Florida? En Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar marca florida, apostillar patente florida, apostillar marca near me, apostillar patente near me, apostillar marca, apostille mark florida, apostille patent florida, donde apostillar marca en florida, donde apostillar patente en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-poder-comercial-florida':
                    $data['description'] = 'Poder Comercial';
                    $data['metadescription'] .= "¿Necesitas apostillar un Poder Comercial en Florida? Notaria Latina te ayuda con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar poder comercial,  apostillar poder comercial florida, apostillar poder comercial near me, apostille commercial power florida, donde apostillar poder comercial florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-declaracion-jurada-comercial-florida':
                    $data['description'] = 'Declaración Jurada Comercial';
                    $data['metadescription'] .= "¿Necesitas apostillar una Declaración Jurada Comercial en Florida? Nosotros te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar declaracion jurada comercial, apostillar affidavit comercial, apostillar declaracion jurada comercial near me, apostillar declaracion jurada comercial florida, apostille commercial affidavit florida, apostillar affidavir comercial florida, donde apostillar affidavit comercial en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-fda-florida':
                    $data['description'] = 'Certificado FDA';
                    $data['metadescription'] .= "¿Necesitas apostillar un certificado FDA en Florida? En Notaria Latina te ayudamos con el trámite de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar certificado fda, apostillar certificado fda near me, apostillar certificado fda florida, apostille fda certificate florida, donde apostillar certificado fda en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-facturas-florida':
                    $data['description'] = 'Facturas';
                    $data['metadescription'] .= "¿Necesitas apostillar Facturas en Florida? Notaria Latina te ayuda con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar facturas, apostillar facturas near me, apostillar factura florida, apostille invoices florida, donde apostillar facturas en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;   
                case 'apostillar-departamento-de-hacienda-florida':
                    $data['description'] = 'Departamento de Hacienda';
                    $data['metadescription'] .= "Apostillamos Departamento de Hacienda en Florida de una manera ágil y rápida 😉";
                    $data['keywords'] .= ", apostillar documento departamento de hacienda, apostillar departamento de hacienda near me, apostillar departamento de hacienda florida, apostille department of finance florida, donde apostillar departamento de hacienda en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-gobierno-extranjero-florida':
                    $data['description'] = 'Certificado de Gobierno Extranjero';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Gobierno Extranjero en Florida? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de gobierno extranjero, apostillar certificado de gobierno extranjero near me, apostillar certificado de gobierno extranjero florida, apostille foreign government certificate florida, apostillar certificado de gobierno extranjero en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-venta-gratis-florida':
                    $data['description'] = 'Certificado de Venta gratis';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Venta en Florida? En Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar certificado de venta, apostillar acta de venta, apostillar certificado de venta near me, apostillar acta de venta near me, apostillar certificado de venta florida, apostillar acta de venta florida, apostille sales certificate florida, donde apostillar certificado de venta en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-ordenes-de-compra-florida':
                    $data['description'] = 'Órdenes de compra';
                    $data['metadescription'] .= "¿Necesitas apostillar una Órden de Compra en Florida? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] .= ", apostillar orden de compra, apostillar orden de compra near me, apostillar orden de compra florida, apostille purchase order florida, donde apostillar orden de compra en florida";
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
            $data['urlmap'] = "https://g.page/r/CeRrwPx_W2-xEAE";
            $data['imgurlmap'] = "img/oficinas/maps-fl-2.webp";
            $data['imgurlmapmobile'] = "img/oficinas/maps-fl-mobile-2.webp";
            $data['metadescription'] .= 'Apostillamos todo tipo de documentos en Florida, de una manera rápida y segura';
            $data['keywords'] = 'notaria en florida, notarizar en florida, notaria cerca de mi, notary near me, apostille near me, apostille florida, carta poder en florida, traduccion en florida, apostillar documentos en florida, affidavít en florida, travel authorization en florida, certificar documentos en florida';

            return view('web.oficina', compact('data'));
        }
    } 

    public function sendEmailContact(Request $request, Partner $partner){

        if (!Str::startsWith($request->codpais, '+') || $request->aux != null) {

            //ENVIO A MI CORREO SI OCURRE UNA DE ESTAS OPCIONES EN EL IF
            $to = "sebas31051999@gmail.com";
            $subject = 'Alguien ha intentado ingresar en formulario del partner ' . $partner->name . " " . $partner->lastname;
            $message = "<br><strong><h3>Datos del cliente</h3></strong>
                        <br>Nombre: " . strip_tags($request->name). "
                        <br>Email: " . strip_tags($request->email) . "
                        <br>País de residencia: " . strip_tags($request->country_residence) ."
                        <br>Teléfono: " . strip_tags($request->codpais) . " " . strip_tags($request->phone) ."
                        <br>Mensaje: " . strip_tags($request->mensaje) . "
                        <br>IP: " . strip_tags($request->ip()) . "
                        <br>Input Aux: " . strip_tags($request->aux) . "
                        <br>
                        <img style='width: 150px; margin-top:20px' src='https://notarialatina.com/img/partners/WEB-HEREDADO.png' alt='IMAGEN NOTARIA LATINA'>
            ";

            $header = 'From: <partners@notarialatina.com>' . "\r\n" .
                    'MIME-Version: 1.0' . "\r\n".
                    'Content-type:text/html;charset=UTF-8' . "\r\n"
                    ;
            
            mail($to, $subject, $message, $header);

            $request->session()->flash('emailsendedme', 'Hemos enviado su información');

            return back();

        } else {
            //ENVIO A NOTARIA LATINA
            $to = "partners@notarialatina.com,hserrano@notarialatina.com"; //partners@notarialatina.com,hserrano@notarialatina.com
            $subject = 'Lead para Partner Abogado - Notaria Latina';
            $message = "<br><strong><h3>Datos del cliente</h3></strong>
                        <br>Nombre: " . strip_tags($request->name). "
                        <br>País de residencia: " . strip_tags($request->country_residence) ."
                        <br>Teléfono: " . strip_tags($request->codpais) . " " . strip_tags($request->phone) ."
                        <br>Mensaje: " . strip_tags($request->mensaje) . "
                        <br>Correo: " . strip_tags($request->email) . "
                        <br>
                        <br><strong><h3>Partner al cual consulta</h3></strong>
                        <br>Nombre: " . strip_tags($partner->name) . " " . strip_tags($partner->lastname) . "
                        <br>Pais: " . strip_tags($partner->country_residence) . "
                        <br>
                        <img style='width: 150px; margin-top:20px' src='https://notarialatina.com/img/partners/WEB-HEREDADO.png' alt='IMAGEN NOTARIA LATINA'>
            ";
    
            $header = 'From: <partners@notarialatina.com>' . "\r\n" .
                    'MIME-Version: 1.0' . "\r\n".
                    'Content-type:text/html;charset=UTF-8' . "\r\n"
                    ;
            
            mail($to, $subject, $message, $header);
            
            //ENVIO AL PARTNER
            $toPartner = $partner->email;
            $subjectPartner = 'Un cliente ha consultado por usted - Notaria Latina ⚖';
            $messagePartner = "<div style='font-size:13px; margin: 5%; padding: 3%; border-style: ridge;'>
                        <strong style='text-align:center; font-size: 15px'><h3>Lo saludamos de Notaria Latina</h3></strong>
                        <br><p style='font-size: 15px; margin:0'>Queremos informarle que un cliente ha consultado por usted, no olvide ponerse en contacto con el mismo y brindarle sus servicios 📃</p>  
                        <br><strong><h3>La información del cliente es la siguiente:</h3></strong>
                        <p><b>Nombre:</b> " . strip_tags($request->name). "</p>
                        <p><b>Email:</b> " . strip_tags($request->email) . "</p>
                        <p><b>País de residencia:</b> " . strip_tags($request->country_residence) ."</p>
                        <p><b>Teléfono:</b> " . strip_tags($request->codpais) . " " . strip_tags($request->phone) ."</p>
                        <p><b>Mensaje:</b> " . strip_tags($request->mensaje) . "</p>
                        <br>
                        <a href='https://notarialatina.com'><img style='width: 150px; margin-top:20px' src='https://notarialatina.com/img/partners/WEB-HEREDADO.png' alt='IMAGEN NOTARIA LATINA'></a>
                        </div>
            ";
    
            $headerPartner = 'From: <no-reply@notarialatina.com>' . "\r\n" .
                    'MIME-Version: 1.0' . "\r\n".
                    'Content-type:text/html;charset=UTF-8' . "\r\n"
                    ;
            
            mail($toPartner, $subjectPartner, $messagePartner, $headerPartner);

            //GUARDANDO EN LA BASE DE DATOS
            $customer = Customer::create([
                'nombre' => Purify::clean($request['name']),
                'email' => Purify::clean($request['email']),
                'pais' => Purify::clean($request['country_residence']),
                'telefono' => Purify::clean($request['phone']),
                'mensaje' => Purify::clean($request['mensaje']),
            ]);
    
            $partner->customers()->attach($customer->id);
    
            $request->session()->flash('report', 'Se ha enviado el correo');
    
            return back();
        }
        //partners@notarialatina.com,hserrano@notarialatina.com
    }


    //notariapublicalatina@gmail.com,hserrano@notarialatina.com
    public function sendEmailOficina(Request $request){
        // $pais = $this->getPaisByCodigo($request->cod_pais);

        if($request->aux != null || preg_match("/[a-zA-Z]/", $request->bbb) || !Str::startsWith($request->codpais, '+')){

            $message = "<br><strong>Nuevo Lead Landing</strong>
                        <br> Nombre: ". strip_tags($request->aaa)."
                        <br> Telef: ".strip_tags($request->codpais) ." ".  strip_tags($request->bbb)."
                        <br> País: " .strip_tags($request->pais)."
                        <br> Mensaje: ".strip_tags($request->ddd)." 
                        <br> Fuente: GoogleAds 
                        <br> Proviene: " . strip_tags($request->interest) . " 
                        ";
                    
            $header='';
            $header .= 'From: <lead_landing@notarialatina.com>' . "\r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            mail('sebas31051999@gmail.com','Bot Lead Landing: '.strip_tags($request->aaa), $message, $header);
        } else {

            switch ($request->interest) {
                case 'Oficina New Jersey': $sendoffices = 'newjersey@notarialatina.com'; //newjersey@notarialatina.com
                    break;
                case 'Oficina New York': $sendoffices = 'newyork@notarialatina.com'; //newyork@notarialatina.com
                    break;
                case 'Oficina Florida': $sendoffices = 'florida@notarialatina.com'; //florida@notarialatina.com
                    break;
                default:
                    break;
            }

            $to = "notariapublicalatina@gmail.com," . $sendoffices; //notariapublicalatina@gmail.com,hserrano@notarialatina.com
            $subject = "Lead " . strip_tags($request->interest) . " | " . date(now());
            $message = "<br><strong><h3>Datos del Lead</h3></strong>
                    <br>Nombre: " . strip_tags($request->aaa). "
                    <br>País de residencia: " . strip_tags($request->pais) ."
                    <br>Teléfono: " .strip_tags($request->cod_pais) . " " . strip_tags($request->bbb) ."
                    <br>Mensaje: " . strip_tags($request->ddd) . "
                    <br>Proveniente: Página de " . strip_tags($request->interest) . "
                    <br>
                    <img style='width: 150px; margin-top:20px' src='https://notarialatina.com/img/partners/WEB-HEREDADO.png' alt='IMAGEN NOTARIA LATINA'>
            ";

            $header = 'From: <'.Str::lower(Str::studly($request->interest)). '@notarialatina.com>' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n".
            'Content-type:text/html;charset=UTF-8' . "\r\n"
            ;
    
            mail($to, $subject, $message, $header);
        }

        $request->session()->flash('report', 'Se ha enviado el correo');

        return back();
    }

    public function postStar(Request $request, Partner $partner){

        $rating = new Rating();
        $rating->user_id = $partner->id;
        $rating->rating = $request->input('star');
        $rating->comment = strip_tags($request->mensajeRating);
        $rating->name_customer = strip_tags($request->nameRating);
        $rating->country = $request->country_residenceRating;
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

    //FUNCION PARA ENVIAR SOLICITUD DE APOSTILLA CON ADJUNTO
    public function sendEmailApostille(Request $request){

        $from_email		 = "apostillas@notarialatina.com"; //from mail, sender email address
        $recipient_email = 'info@notarialatina.com,hserrano@notarialatina.com'; //recipient email address info@notarialatina.com,hserrano@notarialatina.com
        
        $subject = 'Servicios de Apostilla | Notaria Latina - ' . date(now()); //subject for the email
        $message = "<br><strong><h3>Información del cliente</h3></strong>
        <br><b>Nombre:</b> " . strip_tags($request->name). " " . strip_tags($request->lastname) . "
        <br><b>País de residencia:</b> " . strip_tags($request->cod_pais) . "
        <br><b>Teléfono:</b> " . strip_tags($request->phone) . "
        <br><b>Email:</b> " . strip_tags($request->email) . "
        <br><b>Página proveniente: </b> Oficina " . strip_tags($request->from) . "
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

    public function sendEmailToViewPhone(Request $request, Partner $partner){
    
        $ip = $_SERVER['REMOTE_ADDR'];

        $data = [
            'partner' => Str::lower(Str::studly($partner->name . ' ' . $partner->lastname . ' ' . $partner->id)),
            'ip' => $ip
        ];

        Cache::put('partner'.$partner->id, $data);

        $to = "info@notarialatina.com";
        $subject = "Consulta para ver teléfono del Partner: " . strip_tags($partner->name) . " " . strip_tags($partner->lastname) . " | ". date(now());
        $message = "<br><strong><h3>Datos del solicitante</h3></strong>
                <br>Nombre: " . strip_tags($request->name). "
                <br>Teléfono: " . strip_tags($request->phone) ."
                <br>Email: " . strip_tags($request->email) . "
                <br>
                <img style='width: 150px; margin-top:20px' src='https://notarialatina.com/img/partners/WEB-HEREDADO.png' alt='IMAGEN NOTARIA LATINA'>
        ";
        $header = 'From: <partners@notarialatina.com>' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n".
        'Content-type:text/html;charset=UTF-8' . "\r\n"
        ;

        mail($to, $subject, $message, $header);

        $request->session()->flash('solicited', 'Gracias por enviar tu valoración');

        return back();
    }

    public function eliminarCachePartner(Partner $partner){
        Cache::forget('partner'.$partner->id);
        return redirect()->back();
    }

}
