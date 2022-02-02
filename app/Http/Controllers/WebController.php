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
        // return json_encode(array($states, $partners, $specialties));

        return response()->json([
            'viewPartners' => view('web.partials.view_partners', compact('countries', 'states', 'partners', 'specialties', 'totalPartners'))->render()
        ]);
    }

    public function showPartner($slug){
        $partner = Partner::where('slug', $slug)->first(); 
        return view('web.partner', compact('partner'));
    }

    public function oficinasny(?string $service = null){
        if($service != null){
            $data['office'] = 'New York';
            switch ($service) {
                case 'certificaciones-en-new-york':
                    // $data['office'] = 'New York';
                    // $data['title'] = 'Certificar documentos en New York';
                    return view('web.office.certificaciones', compact('data'));
                    break;
                case 'travel-authorization-en-new-york':
                    // $data['office'] = 'New York';
                    // $data['title'] = 'Autorizaciones de viaje en New York';
                    return view('web.office.authorization', compact('data'));
                    break;
                case 'acuerdos-en-new-york':
                    return view('web.office.acuerdos', compact('data'));
                    break;
                case 'cartas-de-invitacion-en-new-york':
                    return view('web.office.invitacion', compact('data'));
                    break;
                default:
                    # code...
                    break;
            }

        } else {
            $data['oficina'] = 'New York';
            $data['title'] = 'Apostillas en New York';
            $data['subtitle'] = '¡Apostillamos todo tipo de documentos para New York!';
            $data['imggrid'] = 'img/oficinas/ICONOS-15.png';
            $data['txtgrid'] = 'New York Motor Vehicle Commission';
            $data['telfHidden'] = '+13479739888';
            $data['telfWpp'] = '13479739888';
            $data['telfShow'] = '347-973-9888';
            $data['imgapostilla'] = 'img/oficinas/apostillany.png';
            $data['imgup'] = 'img/oficinas/BANER-NEW-YORK.jpg';
            $data['imgdown'] = 'img/oficina-notaria-latina-newyork.jpg';
            $data['widthimgdown'] = '90%';
            $data['heightimgdown'] = '100%';
            $data['paddingtop'] = '0px';
            $data['urlmap'] = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.7118327106805!2d-73.90010968459403!3d40.74636597932825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25f030415024b%3A0x3b391bcaf4cd7c10!2sNotaria%20Latina%20-%20Queens%20New%20York!5e0!3m2!1ses-419!2sec!4v1642622200464!5m2!1ses-419!2sec';
            $data['metadescription'] = '';
            $data['keywords'] = '';

            return view('web.oficina', compact('data'));
        }
    }

    public function oficinasnj(?string $service = null){
        if($service != null){
            $data['office'] = 'New Jersey';
            switch ($service) {
                case 'certificaciones-en-new-jersey':
                    // $data['office'] = 'New Jersey';
                    // $data['title'] = 'Certificar documentos en New Jersey';
                    return view('web.office.certificaciones', compact('data'));
                    break;
                case 'travel-authorization-en-new-jersey':
                    // $data['office'] = 'New Jersey';
                    // $data['title'] = 'Autorizaciones de viaje en New Jersey';
                    return view('web.office.authorization', compact('data'));
                    break;
                case 'acuerdos-en-new-jersey':
                    return view('web.office.acuerdos', compact('data'));
                    break;
                case 'cartas-de-invitacion-en-new-jersey':
                    return view('web.office.invitacion', compact('data'));
                    break;
                
                default:
                    # code...
                    break;
            }

        } else {
            $data['oficina'] = 'New Jersey';
            $data['title'] = 'Apostillas express en New Jersey';
            $data['subtitle'] = '¡Apostillamos todo tipo de documento de 3 a 4 días!';
            $data['imggrid'] = 'img/oficinas/ICONOS-15.png';
            $data['txtgrid'] = 'New Jersey Motor Vehicle Commission';
            $data['telfHidden'] = '+19088009046';
            $data['telfWpp'] = '19088009046';
            $data['telfShow'] = '908-800-9046';
            $data['imgapostilla'] = 'img/oficinas/apostillanj.png';
            $data['imgup'] = 'img/newjersey-landing-notaria-latina.jpg';
            $data['imgdown'] = 'img/oficinas/CHICA-APOST.png';
            $data['widthimgdown'] = '70%';
            $data['heightimgdown'] = '25rem';
            $data['paddingtop'] = '15px';
            $data['urlmap'] = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3026.4152573854667!2d-74.21549248459648!3d40.66481847933702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24d541387e7ff%3A0x335c07b09362e483!2s1146%20E%20Jersey%20St%2C%20Elizabeth%2C%20NJ%2007201%2C%20EE.%20UU.!5e0!3m2!1ses!2sec!4v1642459239606!5m2!1ses!2sec';
            $data['metadescription'] = '';
            $data['keywords'] = '';
    
            return view('web.oficina', compact('data'));
        }
    }

    public function oficinasfl(?string $service = null){
        if($service != null){
            $data['office'] = 'Florida';
            switch ($service) {
                case 'certificaciones-en-florida':
                    // $data['office'] = 'Florida';
                    // $data['title'] = 'Certificar documentos en Florida';
                    return view('web.office.certificaciones', compact('data'));
                    break;
                case 'travel-authorization-en-florida':
                    // $data['office'] = 'Florida';
                    // $data['title'] = 'Autorizaciones de viaje en Florida';
                    return view('web.office.authorization', compact('data'));
                    break;
                case 'acuerdos-en-florida':
                    return view('web.office.acuerdos', compact('data'));
                    break;
                case 'cartas-de-invitacion-en-florida':
                    return view('web.office.invitacion', compact('data'));
                    break;
                
                default:
                    # code...
                    break;
            }

        } else {
            $data['oficina'] = 'Florida';
            $data['title'] = 'Apostillas en Florida';
            $data['subtitle'] = '¡Apostillamos todo tipo de documentos para Florida!';
            $data['imggrid'] = 'img/oficinas/MATRIMONIO FL.png';
            $data['txtgrid'] = 'Matrimonios';
            $data['telfHidden'] = '+13056003290';
            $data['telfWpp'] = '13056003290';
            $data['telfShow'] = '305-600-3290';
            $data['imgapostilla'] = 'img/oficinas/apostillafl.png';
            $data['imgup'] = 'img/oficina-notaria-florida.jpg';
            $data['imgdown'] = 'img/oficinas/Plaza_opt.jpg';
            $data['widthimgdown'] = '100%';
            $data['heightimgdown'] = '100%';
            $data['paddingtop'] = '0px';
            $data['urlmap'] = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3581.404392613644!2d-80.25914568497105!3d26.150956283461554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d90638fe895e7b%3A0xaa63cebf0d7899!2s2104%20N%20University%20Dr%2C%20Sunrise%2C%20FL%2033322%2C%20EE.%20UU.!5e0!3m2!1ses!2sec!4v1642375956270!5m2!1ses!2sec';
            $data['metadescription'] = '';
            $data['keywords'] = '';

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
}
