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
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Detection\MobileDetect;

class WebController extends Controller
{
    use GetCountryByCodTrait, GetCodByCountryTrait;

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

    public function index() {

        $detect = new MobileDetect();
        $mobile = FALSE;

        if($detect->isMobile()){
            $mobile = TRUE;
        }

        $reviews = [
            ['name' => 'Alejandra Castaño orozco', 'message' => 'Exelente servicio , muy amables,nos resolvieron las dudas y nos ayudaron con nuestros trámites , súper recomendado AAA+++', 'avatar' => 'alejandra-castano.png'],
            ['name' => 'Hernando Urguiled', 'message' => 'Excelente el servicio. Muy bonito el servicio de todas las señoritas en la ofcina, especialmente de Mayra. Recomiendo completamente el lugar', 'avatar' => 'hernando-urguiled.png'],
            ['name' => 'Carlos Luis Galeano', 'message' => 'Excelente servicio al cliente , todas las dudas que tiene se las aclaran de una manera rápida y los trámites . Lo recomiendo', 'avatar' => 'carlos-luis-galeano.png'],
            ['name' => 'Carito Diaz', 'message' => 'La señorita Crystal fue muy amable y servicial conmigo haciendo mis trámites y tuvo mucha paciencia. Se los recomiendo si necesitan hacer cualquier trámite para ecuador ☺️😉', 'avatar' => 'carito-dias.png'],
            ['name' => 'Jose Shoro', 'message' => 'Mi agradecimiento a la Srta Angi por su gentileza y ayuda para solucionar mi problema en la traducción felicitaciones y que siga los éxitos Muchas Bendiciones', 'avatar' => 'jose-shoro.jpg'],
            ['name' => 'Heliberto Cañas', 'message' => 'Muy buena atención, excelente, me recibieron los documentos por Whatsapp y me los tenían listos el día de la cita.', 'avatar' => 'heliberto-canas.jpg'],
            ['name' => 'Aurelia G', 'message' => 'Excelente servicio!!! Luna fue super amable, diligente, y profesional todo salio perfecto!!! La recomiendo', 'avatar' => 'aurelia-g.png'],
            ['name' => 'Amelia Salgado', 'message' => 'Excelente servicio el que ofrecen. Están dispuestos ayudarte en cualquier trámite que necesite. Son puntuales con la entrega de los documentos. Los recomendaría 100%', 'avatar' => 'amelia-salgado.png'],
            ['name' => 'Adriana Gioni', 'message' => 'Excelente atención, rapidez y amabilidad. Luna fue muy amable y eficiente en su trabajo. Sin duda volveré a gestionar algún trámite con ellos.', 'avatar' => 'adriana-gioni.png'],
        ];

        $indexPosts = Post::select('name', 'body', 'slug', 'imgdir', 'created_at')
            ->where('status','PUBLICADO')
            ->latest()
            ->limit(6)
            ->get();

        $consulates = DB::table('consulates')->select('slug')->get();

        return view('index',compact('indexPosts', 'consulates', 'reviews', 'mobile'));  
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

    public function commentpost(Request $request, $slug){
        $post = Post::where('slug', $slug)->where('status', 'PUBLICADO')->first();
        $to = "sebas31051999@gmail.com";
        $subject = 'Comentario en Post de Notaria Latina | ' . date('d-m-y');
        $message = "<br><strong><h3>Información</h3></strong>
                    <br><b>Nombre:</b> " . strip_tags($request->name). " " . strip_tags($request->lastname) . "
                    <br><b>Email:</b> " . strip_tags($request->email) . "
                    <br><b>Mensaje:</b> " . strip_tags($request->message) . "
                    <br><b>Post:</b> " . strip_tags($post->name) . "
                    <br><b>Página:</b> https://notarialatina.com/post/" . strip_tags($post->slug) . "
                    <br> 
                    <img style='width: 150px; margin-top:20px' src='https://notarialatina.com/img/partners/WEB-HEREDADO.png' alt='IMAGEN NOTARIA LATINA'>
        ";

        $header = 'From: <blog@notarialatina.com>' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n".
                'Content-type:text/html;charset=UTF-8' . "\r\n"
                ;
            
        mail($to, $subject, $message, $header);

        $request->session()->flash('sendcomment', 'Gracias por enviar su información');

        return back();
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

    public function fetchState($pais = null){
        $pais = Str::title(str_replace('-', ' ', $pais));
        $country_aux = Country::where('name_country', 'LIKE', "%$pais%")->first();
        $countries = Country::select(['id', 'name_country'])->orderBy('name_country', 'asc')->get();
        $states = State::where('country_id', $country_aux->id)->get();
        $partners = Partner::select(['id', 'img_profile', 'name', 'lastname', 'title', 'state', 'codigo_pais', 'specialty', 'country_residence', 'phone', 'email', 'slug'])
                ->country($country_aux->id)
                // ->state($request->state)
                // ->specialties($request->specialty)
                ->where('status', 'PUBLICADO')
                //->inRandomOrder('name')
                ->orderBy('name', 'DESC')
                // ->limit($dataToLoad)
                ->paginate(16);
                // ->inRandomOrder()
                // ->get();

        // $partnersCount = Partner::where('status', 'PUBLICADO')
        //             ->orderBy('id', 'DESC')
        //             ->country($country->id)
        //             ->state($request->state)
        //             ->specialties($request->specialty)
        //             ->get();
                    
        // $totalPartners = $partnersCount->count();
        
        $specialties = Specialty::select(['id', 'name_specialty'])->get();

        return view('web.partners_result', compact('countries', 'states', 'partners', 'specialties', 'country_aux'));
    }

    public function fetchStateB(Request $request){
        $country_aux = Country::where('name_country', 'LIKE', "%$request->pais%")->first();
        $countries = Country::select(['id', 'name_country'])->orderBy('name_country', 'asc')->get();
        $states = State::where('country_id', $country_aux->id)->get();
        $partners = Partner::select(['id', 'img_profile', 'name', 'lastname', 'title', 'state', 'codigo_pais', 'specialty', 'country_residence', 'phone', 'email', 'slug'])
                ->country($country_aux->id)
                ->state($request->state)
                ->specialties($request->specialty)
                ->where('status', 'PUBLICADO')
                //->inRandomOrder('name')
                ->orderBy('name', 'DESC')
                // ->limit($dataToLoad)
                ->paginate(16);
                // ->inRandomOrder()
                // ->get();

        // $partnersCount = Partner::where('status', 'PUBLICADO')
        //             ->orderBy('id', 'DESC')
        //             ->country($country->id)
        //             ->state($request->state)
        //             ->specialties($request->specialty)
        //             ->get();
                    
        // $totalPartners = $partnersCount->count();

        $countryID = $request->country;
        
        $specialties = Specialty::select(['id', 'name_specialty'])->get();

        //return response()->json($partners);

        return response()->json([
            'viewPartners' => view('web.partials.view_partners', compact('countries', 'states', 'partners', 'specialties', 'countryID', 'country_aux'))->render()
        ]);
    }

    public function showPartner(Request $request, $slug){

        if(Str::startsWith($slug, 'abogado')) {
            $partner = Partner::where('slug', $slug)->where('status', 'PUBLICADO')->first();
        } 
        else {
            $partner = Partner::where('old_slug', $slug)->where('status', 'PUBLICADO')->first();
            if($partner)return redirect()->route('web.showpartner', $partner->slug);
            else return redirect()->route('web.showallpartners');
        }

        if($partner){
            $testimonials = Rating::where('partner_id', $partner->id)->latest()->take(3)->get();
            return view('web.partner', compact('partner', 'testimonials'));
        } else {
            return redirect()->route('web.showallpartners');
        }
    }

    public function oficinasny(?string $service = null){
        $data['telfHidden'] = '+13479739888';
        $data['telfWpp'] = '13479739888';
        $data['telfShow'] = '347-973-9888';
        $data['office'] = 'New York';
        $data['address'] = '67-03 Roosevelt Avenue, Woodside Queens, NY 11377';
        $data['location'] = 'https://g.page/notariapublicalatina';
        $data['metadescription'] = "Notarizamos todo tipo de documentos en New York tales como apostillas, certificados, poderes, traducciones de una manera ágil y rápida. Solicítelo aquí! ✔";
        if($service != null){
            switch ($service) {
                case 'certificaciones-en-new-york':
                    $data['metadescription'] = "Las certificaciones son documentos sellados y firmados por un notario. Contáctenos para realizar el trámite de su documento de una manera segura! ✔";
                    $data['keywords'] = "copia certificada, copia certificada de un documento, donde puedo obtener copia certificada de documento, tramitar copia certificadad de documento, copia certificada acta de nacimiento, certificaciones en estados unidos, certificar documentos en estados unidos, que es una certificacion, para que sirve certificar un documento, como certificar documentos, que necesito para certificar un documento, requisitos para certificar un documento, que necesito para certificar un documento en new york, requisitos para certificar un documento en new york, certificar documentos en new york, certificar acta de nacimiento en new york, certificar partida de nacimiento en new york, certificar acta de matrimonio en new york, certificar declaracion jurada en new york, certificar affidavit en new york, certificar licencia de conducir en new york, certificar carta poder en new york, donde puedo certificar un documento en new york, donde puedo certificar documentos en new york, quien puede certificar documentos";
                    $posts = Post::where('name', 'LIKE', '%certificacion%')->limit(3)->get();
                    $data['imgback'] = "img/oficinas/copia-certificada-de-documentos.webp";
                    $data['body'] = "
                    <h2 style='font-size: 25px'>Obtenga el Certificado de su documento en New York</h2>
                    <p class='text-muted'>
                        El certificado de un documento consta de un escrito firmado y sellado por un notario. Mediante este archivo se manifiesta que la copia realizada
                        es verídica copia del documento original.
                    </p>
                    <p class='text-muted'>Este certificado lo expide el mismo notario en base al documento original corroborando que es una reproducción exacta del documento principal.</p>

                    <h2 style='font-size: 25px;background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Para que sirve un certificado?</h2>
                    <p class='text-muted'>Como se menciono anteriormente, al ser una copia fiel del documento original, este demuestra lo legítimos que son nuestros documentos. 
                        Se pueden utilizar para cualquier trámite legal que necesite realizar, por ejemplo algún proceso judicial, por motivos de negocios, o por razones profesionales.</p>
                    <p class='text-muted'>Estos trámites que requieran de un certificado se los puede realizar tanto nacional como internacionalmente.</p>
                    
                    <h2 style='font-size: 25px;font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Por qué es importante certificar un documento?</h2>
                    <p class='text-muted'>Existen algunas razones por las cuales es necesario optar por la certificación de cualquier tipo de documento. La más relevante es cuando
                        necesite enviar documentos personales importantes como su pasaporte, acta de matrimonio o de nacimiento, etc., para completar cualquier trámite que este gestionando.
                        Es por ello que conviene optar por una copia certificada, ya que puede conservar el documento original y así evitar la pérdida o daño del mismo.
                    </p>
                    <p class='text-muted'>Otra razón podría ser que nuestros documentos se encuentren en deterioro y debido a esto no sean válidos por las entidades que lo soliciten. Para evitar
                     gestionar este documento desde un principio, sería una buena opción obtener la certificación del mismo. Esto eludirá cualquier problema que se le presente cuando gestione trámites importantes.</p>

                    <h2 style='font-size: 25px;background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Qué tipo de documentos puedo certificar?</h2>
                    <ul class='text-muted'>
                        <li>Partidas de nacimiento.</li>
                        <li>Actas de matrimonio.</li>
                        <li>Cartas.</li>
                        <li>Licencias de conducir.</li>
                        <li>Declaraciones juradas.</li>
                        <li>Escrituras.</li>
                        <li>Entre otros</li>
                    </ul>

                    <h2 style='font-size: 25px;background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Cuál es la validez de un certificado?</h2>
                    <p class='text-muted'>
                        Cualquier copia certificada que se haya emitido es válida igual que el documento original, no tiene una fecha de vencimiento 
                        y se puede utilizar para gestionar cualquier trámite. Es por ello que conviene realizarlo con una autoridad competente para evitar
                        cualquier tipo de fraude o contratiempo que puede presentarse a futuro.
                    </p>

                    <h2 style='font-size: 25px;background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Qué necesito para certificar un documento?</h2>
                    <p class='text-muted'>Lo único necesario para obtener una copia certificada es poseer el documento original que va a certificar. El notario verificará que es original
                    y procederá con la certificación del mismo. Esto lo puede hacer de dos formas diferentes:
                        <ul class='text-muted'>
                            <li>Sellar la copia del documento original certificando que es exacta y legal</li>
                            <li>Adjuntar un certificado notarial mencionando que la copia es legítima y verdadera acorde al documento original</li>
                        </ul> 
                    </p>

                    <h2 style='font-size: 25px;background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Donde puedo obtener este certificado?</h2>
                    <p class='text-muted'>Puede acercarse a nuestra oficina en New York con el documento a certificar y un asesor lo guiará para que realice el trámite de manera correcta y segura.
                        También puede contactarnos en línea mediante nuestro sitio web o llamándonos personalmente.
                    </p>

                    <h2 style='font-size: 25px;background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Cuál es el tiempo de entrega de mi documento certificado?</h2>
                    <ul class='text-muted'>
                        <li>El tiempo de entrega dentro de los Estados Unidos es de 24 horas.</li>
                        <li>El tiempo de entrega fuera de los Estados Unidos es de 3 días laborables.</li>
                        <li>El documento digital estará disponible en 24 horas.</li>
                        <li class='text-danger'>Por motivos de codiv-19 puede existir retraso en los tiempos de entrega.</li>
                    </ul>
                    <p class='text-muted'><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
                        <a href='https://www.facebook.com/notariapublicalatina/'><em>FanPage de Facebook</em></a><em>.</em></p>
                    ";
                    return view('web.office.certificaciones', compact('data', 'posts'));
                    break;
                case 'travel-authorization-en-new-york':
                    $data['metadescription'] .= "Realizamos Autorizaciones de Viaje para Menores de Edad en New York de una manera ágil y rápida!";
                    $data['keywords'] = "que es una autorizacion de viaje, requisitos para realizar una autorizacion de viaje en new york, para que sirve una autorizacion de viaje, cuanto dura una autorizacion de viaje en new york, realizar autorizacion de viaje en new york, donde puedo realizar una autorizacion de viaje en new york, autorizacion de viaje para niños en new york, donde puedo realizar una carta de autorizacion de viaje en new york, permiso de viaje en usa, autorizacion de viaje para niños, permiso notarial de viaje, permiso notarial de viaje en new york, permiso notarial de viaje en estados unidos, menor carta notarial para permiso de viaje, carta de permiso de viaje para niños en ingles, notario para sacar permiso de viaje, carta notarial para permiso de viaje, carta notarial para permiso de viaje en new york, carta notarial para permiso de viaje en estados unidos, autorizacion para viaje de menores al extranjero, carta autorizacion de viaje, carta para permiso de viaje, carta permiso de viaje para niños";
                    $posts = Post::where('name', 'LIKE', '%autorizacion%')->limit(3)->get();
                    $data['imgback'] = "img/oficinas/permiso-viaje-de-menores-1.webp";
                    $data['body'] = "
                    <h2 style='font-size: 25px'>Una Autorización de Viaje es un documento que le permite a su hijo o hija, menor de edad, viajar al extranjero sin necesidad que sus padres lo acompañen.</h2>
                    <p class='text-muted'>Este documento, emitido por una autoridad competente, nombra a un titular quien será el encargado de viajar con el menor. Esta persona puede ser un familiar,
                        un amigo o alguna auxiliar de viaje, por ejemplo una aeromoza de la propia aerolinea (persona que forma parte de la tripulación de un avión y tiene como función atender a los pasajeros prestándoles servicios para su comodidad y seguridad).</p>
                    <p class='text-muted'>Este permiso de viaje debe expresar el consentimiento de los padres o tutor autorizando la salida del país de su hijo/a junto con la persona encargada.
                        En el caso de que el niño o la niña necesiten viajar solo con uno de sus padres, también se puede realizar dicha autorización.</p>

                    <h2 style='font-size: 25px;background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Qué requisitos son necesarios para realizar una autorización de viaje?</h2>
                    <ul class='text-muted'>
                        <li>Identificación de los padres que van a dar la autorización.</li>
                        <li>Nombres completos del menor que va a viajar.</li>
                        <li>Fecha de nacimiento de su hijo/a.</li>
                        <li>Nombres completos de la persona que va a acompañar al menor.</li>
                        <li>Información del vuelo.</li>
                    </ul>
                    <p class='text-muted'>En algunos casos, puede que se requiera más información para realizar el permiso de viaje del menor, por ejemplo el país de destino del viaje, cuanto tiempo va a estar fuera del país, entre otros.</p>

                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Por cuanto tiempo es válido un permiso de viaje?</h2>
                    <p class='text-muted'>Esta carta otorgando el permiso de un viaje solo es válida por el período que el menor vaya a estar fuera del país. Finalizado este tiempo la autorización deja de estar en rigor automáticamente.  </p>

                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿En donde puedo obtener una autorización de viaje?</h2>
                    <p class='text-muted'>Puede contactarnos por medio de un formulario, mediante una llamada o acercándose personalmente a nuestra oficina en New York con los requisitos necesarios y un asesor lo guiará para que realice el trámite de manera correcta y segura.</p>

                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿En que tiempo me entregan la autorización de viaje?</h2>
                    <p class='text-muted'>
                        El tiempo de entrega es inmediato siempre que la persona que realiza el trámite se acerque con los requisitos correspondientes.
                    </p>
                    <p class='text-muted'><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
                        <a href='https://www.facebook.com/notariapublicalatina/'><em>FanPage de Facebook</em></a><em>.</em></p>
                    ";
                    return view('web.office.authorization', compact('data', 'posts'));
                    break;
                case 'acuerdos-en-new-york':
                    $data['metadescription'] = "Realizamos Acuerdos en New York de una manera ágil y rápida!";
                    $data['keywords'] = ", tramitar acuerdo new york, realizar acuerdo new york, process agreement new york, make deal new york";
                    $posts = Post::where('name', 'LIKE', '%acuerdo%')->limit(3)->get();
                    return view('web.office.acuerdos', compact('data', 'posts'));
                    break;
                case 'cartas-de-invitacion-en-new-york':
                    $data['metadescription'] .= "Tramitamos Cartas de Invitación en New York de una manera ágil y rápida!";
                    $data['keywords'] = ", realizar carta de invitacion new york, tramitar carta de invitacion new york, make invitation letter new york, process letter of invitation new york";
                    $posts = Post::where('name', 'LIKE', '%invitacion%')->limit(3)->get();
                    return view('web.office.invitacion', compact('data', 'posts'));
                    break;
                case 'revocatorias-en-new-york':
                    $data['metadescription'] .= "Realizamos Revocatorias de Poderes en New York de una manera ágil y rápida!";
                    $data['keywords'] = ", revocar carta poder new york, revocar poder general new york, revocar poder especial new york, realizar revocatoria new york, anular poder new york, anular carta poder new york, cancelar poder new york, cancelar carta poder new york, revoke power new york, override power new york, cancel power new york";
                    $posts = Post::where('name', 'LIKE', '%revocatoria%')->limit(3)->get();
                    return view('web.office.revocatorias', compact('data', 'posts'));
                    break;
                case 'contratos-en-new-york':
                    $data['metadescription'] .= "Realizamos todo tipo de Contratos en New York de una manera ágil y rápida!";
                    $data['keywords'] = ", contrato de arrendamiento new york, contrato de trabajo new york, contrato de renta new york, realizar contrato de arriendo new york, realizar contrato compra venta new york, realizar contrato prestamo new york, realizar contrato prenupcial new york, realizar contrato de servicio new york, realizar contrato de transporte new york, make contract new york";
                    $posts = Post::where('name', 'LIKE', '%contrato%')->limit(3)->get();
                    return view('web.office.contratos', compact('data', 'posts'));
                    break;
                case 'testamentos-en-new-york':
                    $data['metadescription'] .= "Realizamos Testamentos en New York de una manera ágil y rápida!";
                    $data['keywords'] = ", realizar testamento new york, hacer testamento new york, tramitar testamento new york, make a will new york";
                    $posts = Post::where('name', 'LIKE', '%testamento%')->limit(3)->get();
                    return view('web.office.testamentos', compact('data', 'posts'));
                    break;
                case 'motor-vehicle-commission-en-new-york':
                    $data['metadescription'] .= "Motor Vehicle Commission en New York de una manera ágil y rápida!";
                    $data['keywords'] = ", traducir historial de manejo new york, obtener licencia de conducir new york, traducir documentos licencia de conducir";
                    return view('web.office.vehicle_comission', compact('data'));
                    break;
                case 'poder-notarial-new-york':
                    // $data['metadescription'] .= "Realizamos Poderes Generales y Especiales en New York de una manera ágil y rápida!";
                    // $data['keywords'] .= ", realizar carta poder new york, realizar poder especial new york, realizar poder general new york, tramitar poder new york, make power of attorney new york, process power new york";
                    $data['body'] = "
                        <h2 style='font-size: 25px'>Tramitamos todo tipo de Carta Poder en New York</h2>
                        <p class='text-muted'>Un poder o carta poder es un documento legal con el objetivo de otorgar control, ya sea total o parcial, sobre sus activos a otra persona
                            en el caso que usted no pudiera estar presente. Este documento le permite realizar trámites a distancia siendo una solución para gestionar sus bienes, trámites
                            bancarios y otras tareas importantes.</p>
                        <p class='text-muted'>La persona que realiza el poder generalmente se la conoce como <b>poderdante o mandante</b> y la que recibe ese documento se le denomina <b>apoderado o mandatario</b>.
                            Es recomendable asignar una persona de absoluta confianza, de preferencia un familiar, para que realice las tareas asignadas que se especificaran en la carta poder,
                            de esta manera evita futuros inconvenientes que se puedan presentar.</p>

                        <h2 style='font-size: 25px'>¿Para que se utiliza un poder notarial?</h2>
                        <p class='text-muted'>Este documento se lo puede utilizar para gestionar diversos trámites como comprar y vender propiedades o terrenos, así como obtener las escrituras y administrar las
                        mismas, manejar cuentas bancarias, retiro de dinero de las entidades financieras, registro de menores, entre otros trámites.</p>
                        <p class='text-muted'>El documento que porte la apostilla tiene validez legal en cualquiera de los países miembros del Convenio. La cual consiste en un sello
                            que la autoridad encargada estampa en seco y se agrega como nota al reverso o como hoja adicional de los documentos que se quisiera
                            autenticar. Es por eso que los únicos autorizados para validar esta apostilla son los notarios debidamente acreditados.</p>

                        <h2 style='font-size: 25px'>Tipos de Poderes</h2>
                        <p class='text-muted'>
                            Existen dos tipos de poderes por los cuales el poderdante puede optar dependiendo de las necesidades que tenga. Estos pueden ser:
                        </p>
                        <ul class='text-muted'>
                            <li><b>Poder Especial:</b> Otorgar control a una actividad especifica sobre sus activos a otra persona en el caso de que usted no pudiera estar presente. Este poder es un poco más restringido en cuanto a las actividades que tiene permitido realizar el apoderado</li>
                            <li><b>Poder General:</b>  Otorgar control más amplio y con más atribuciones sobre sus activos a otra persona en el caso de que usted no pudiera estar presente. El poder general es más ilimitado con las tareas que el apoderado puede ejercer</li>
                        </ul>

                        <h2 style='font-size: 25px'>¿En que documentos es necesaria la apostilla?</h2>
                        <ul class='text-muted'>
                            <li>Compra y Venta de propiedades o terrenos</li>
                            <li>Administración de propiedades.</li>
                            <li>Administrar sus cuentas y transacciones bancarias.</li>
                            <li>Inversiones de dinero.</li>
                            <li>Hacer reclamos legales</li>
                            <li>Procedimientos legales en su nombre.</li>
                        </ul>

                        <h2 style='font-size: 25px'>¿Cuáles son los requisitos para realizar el trámite?</h2>
                        <p class='text-muted'>Entre los requerimientos que debe tener en cuenta para solicitar un poder notarial se encuentran los siguientes:</p>
                        <ul class='text-muted'>
                            <li>Identificación válida del poderdante.</li>
                            <li>Nombres y apellidos del apoderado.</li>
                            <li>Número de cédula del apoderado.</li>
                        </ul>

                    <h2 style='font-size: 25px'>¿Que tiempo de validez tiene un poder?</h2>
                    <p class='text-muted'>Según sea el caso, un poder es válido por un tiempo limitado o indefinido según el poderdante lo establezca a la hora de realizar el poder con el notario.
                        Existen algunas causas por las cuales un poder puede estar en vigor solo por cierto tiempo, por ejemplo por fallecimiento del poderdante o hasta  que por decisión propia solicite la revocatoria del documento.</p>
                    <p class='text-muted'>El poder puede utilizarse aun si el poderdante no se encuentre con todas sus facultades físicas o mentales.</p>

                    <h2 style='font-size: 25px'>¿En donde puedo solicitar un poder?</h2>
                    <p class='text-muted'>Puede contactarnos completando el formulario en línea o acercándose a nuestra oficina. Un asesor lo guiará para que usted realice el trámite de manera correcta y segura.</p>


                    <h2 style='font-size: 25px'>¿Cuánto se demora en entregar el poder?</h2>
                    <ul class='text-muted'>
                        <li>El tiempo de entrega dentro de los Estados Unidos es de 24 horas.</li>
                        <li>El tiempo de entrega fuera de los Estados Unidos es de 3 días laborables.</li>
                        <li>El documento digital estará disponible en 24 horas.</li>
                        <li class='text-danger'>Por motivos de codiv-19 puede existir retraso en los tiempos de entrega.</li>
                    </ul>
                    <p class='text-muted'><b><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
                        <a href='https://www.facebook.com/notariapublicalatina/'><em>FanPage de Facebook</em></a><em>.</em></b></p>
                    ";
                    $posts = Post::where('name', 'LIKE', '%poder')->limit(3)->get();
                    return view('web.office.poderes', compact('data', 'posts'));
                    break;
                case 'traducir-documentos-new-york':
                    $data['metadescription'] .= "Traducimos todo tipo de Documentos en New York de una manera ágil y rápida! ";
                    $data['keywords'] = ", traducir documentos new york, traducir certificado de nacimiento new york, traducir diplomas new york, traducir certificado de matrimonio new york, traducir certificado de divorcio new york, traducir certificado de defuncion new york, traducir documentos medicos new york, traducir certificados estudiantiles new york, translate documents new york";
                    $posts = Post::where('name', 'LIKE', '%traduccion%')->limit(3)->get();
                    return view('web.office.traducciones', compact('data', 'posts'));
                    break;
                case 'apostillar-documentos-new-york':
                    $data['body'] = "
                    <h2 style='font-size: 25px;'>Apostillamos sus documentos requeridos por establecimientos de otro país para que tengan válidez dentro del mismo</h2>
                    <p class='text-muted'>La Apostilla es la manera más sencilla de constatar la veracidad de documentos públicos expedidos en otro país.
                        Es por ello que es un requisito indispensable si desea gestionar trámites internacionales.</p>
                    <p class='text-muted'>De acuerdo al Convenio de la Haya, algunos de los países latinos miembros del convenio donde es válida la apostilla son Argentina, Bolivia,
                        Venezuela, Colombia, Chile, Costa Rica, Ecuador, Estados Unidos, El Salvador, Guatemala, Honduras, Perú, México, entre otros.</p>
        
                    <h2 style='font-size: 25px'>¿Para que sirve apostillar un documento?</h2>
                    <p class='text-muted'>El documento que contenga la apostilla es válido en cualquiera de los países miembros del Convenio mencionados anteriormente.
                     Hablando físicamente, consiste en una hoja que se agrega a los documentos que la autoridad estampa sobre una copia del documento público 
                     que se quisiera autenticar. Por esta razón, los únicos autorizados para validar esta apostilla son los notarios debidamente acreditados.</p>
        
                    <h2 style='font-size: 25px'>¿Qué documentos requieren de una apostilla?</h2>
                    <ul class='text-muted'>
                        <li>Diplomas (<a href='https://notarialatina.com/newyork/apostillar-diploma-de-escuela-secundaria-new-york'>Secundaria</a> o <a href='https://notarialatina.com/newyork/apostillar-diploma-universitario-new-york'>Universitario</a>).</li>
                        <li><a href='https://notarialatina.com/newyork/apostillar-certificado-de-nacimiento-new-york'>Certificados de nacimiento.</a></li>
                        <li><a href='https://notarialatina.com/newyork/apostillar-certificado-de-matrimonio-new-york'>Certificados de matrimonio.</a></li>
                        <li><a href='https://notarialatina.com/newyork/apostillar-certificado-de-defuncion-new-york'>Certificados de defunción.</a></li>
                        <li><a href='https://notarialatina.com/newyork/apostillar-poder-notarial-personal-new-york'>Poderes Generales y Especiales.</a></li>
                        <li>Contratos.</li>
                        <li>Cartas de invitación.</li>
                        <li><a href='https://notarialatina.com/newyork/apostillar-escrituras-testamentos-new-york'>Testamentos.</a></li>
                        <li><a href='https://notarialatina.com/newyork/apostillar-declaraciones-juradas-de-estado-unico-new-york'>Declaraciones juradas.</a></li>
                        <li><a href=''>Estados de cuenta.</a></li>
                        <li><a href='https://notarialatina.com/newyork/apostillar-certificado-de-divorcio-new-york'>Actas de divorcio.</a></li>
                        <li><a href='https://notarialatina.com/newyork/apostillar-facturas-new-york'>Facturas.</a></li>
                        <li>Documentos corporativos.</li>
                    </ul>
        
                    <h2 style='font-size: 25px'>¿Cuáles son los requisitos para apostillar un documento?</h2>
                    <p class='text-muted'>El único requisito es contar con el documento original que desea apostillar. Es por ello que es un trámite sencillo y fácil de hacerlo.</p>
            
                    <h2 style='font-size: 25px'>¿En donde se puede apostillar un documento?</h2>
                    <p class='text-muted'>Puede <a href='https://notarialatina.com/contactenos'>contactarnos</a> completando el formulario en línea o acercarse a nuestra oficina con el documento a
                        apostillar y un asesor lo guiará para que realice el trámite de manera correcta, rápida y segura.</p>
                    <h2 style='font-size: 25px'>¿En que tiempo se realiza una apostilla?</h2>
                    <ul class='text-muted'>
                        <li>El tiempo de entrega dentro de los Estados Unidos es de 24 horas.</li>
                        <li>El tiempo de entrega fuera de los Estados Unidos es de 3 días laborables.</li>
                        <li>El documento digital estará disponible en 24 horas.</li>
                        <li class='text-danger'>Por motivos de codiv-19 puede existir retraso en los tiempos de entrega.</li>
                    </ul>
                    <p class='text-muted'><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
                        <a href='https://www.facebook.com/notariapublicalatina/'><em>FanPage de Facebook</em></a><em>.</em></p>
                    ";
                    $posts = Post::where('name', 'LIKE', '%apostilla%')->limit(3)->get();
                    return view('web.office.apostillas', compact('data', 'posts'));
                    break;
                case 'affidavit-support-en-new-york':
                    $data['metadescription'] .= "Realizamos Declaraciones Juradas (Affidavit) en New York de una manera ágil y rápida!";
                    $data['keywords'] = ", declaracion jurada new york, affidavit new york, realizar declaracion jurada new york, tramitar declaracion jurada new york, make an affidavit new york, process affidavit new york";
                    $posts = Post::where('name', 'LIKE', '%affidavit%')->limit(3)->get();
                    return view('web.office.affidavit', compact('data', 'posts'));
                    break;
                case 'apostillar-certificado-de-nacimiento-new-york':
                    $data['description'] = 'Certificados de Nacimiento';
                    $data['metadescription'] = "Consulte por nuestro servicio de apostilla en certificados de nacimiento en New York 🗽​​. Lo asesoramos de una manera segura. Solicítelo ahora! ✅";
                    $data['keywords'] = "que es un certificado de nacimiento, apostillar certificado de nacimiento en new york, apostillar acta de nacimiento en new york, apostillar partida de nacimiento en new york, donde apostillar certificado de nacimiento en new york, donde puedo realizar un certificado de nacimiento en queens ny, como apostillar un certificado de nacimiento en new york, apostillar certificado de nacimiento queens ny, birth certificate ny, birth certificate queens ny";
                    $data['body'] = "<ul><li><h2>¿Qué es un certificado de nacimiento?</h2></li></ul>
                    <p>El certificado o acta de nacimiento es un documento emitido por el Registro Civil o Consulado respectivo, en el cual se da prueba del lugar, fecha
                        y hora del nacimiento, al igual que toda la información correspondiente como nombres y apellidos, sexo, etc.
                    </p>
                    <ul><li><h2>¿Qué información contiene el certificado de nacimiento?</h2></li></ul>
                    <p>En sí, el certificado de nacimiento contiene información básica del nacimiento y su inscripción. Entre estos consta datos como 
                        los nombres y apellidos del titular, lugar, fecha y hora del nacimiento, al igual que el nombre de los progenitores. 
                    </p>
                    <ul><li><h2>¿Para qué sirve la partida de nacimiento?</h2></li></ul>
                    <p>La partida de nacimiento es un documento esencial para llevar a cabo distintos trámites.</p>
                    <p>Entre estos pueden perfilar los siguientes:</p>
                        <p>✔ Obtener o renovar el documento de Identidad o Pasaporte</p>
                        <p>✔ Para contraer matrimonio, trabajar fuera del país u obtener algun beneficio social</p>
                        <p>✔ Solicitar permiso de paternidad</p>
                    <ul><li><h2>¿Donde puedo obtener un certificado de nacimiento?</h2></li></ul>
                    <p>Puede <a href='#card'>completar el siguiente formulario</a> o dirigirse personalmente a nuestras oficinas en ".$data['office']." donde un asesor lo guiará en el proceso de una manera correcta y segura.</p>
                    <p><i><b>Para apostillar cualquier tipo de documento es necesario realizar la traducción del mismo. Consulte aquí <a href='https://notarialatina.com/traducciones'>como traducir un documento apostillado</a></b></i></p>
                    ";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-reporte-consular-new-york':
                    $data['description'] = 'Reporte Consular (CRBA)';
                    $data['metadescription'] = "Consulte por nuestro servicio de apostilla en reporte consular en New York 🗽. Lo asesoramos de una manera segura. Solicítelo aquí! ✅";
                    $data['keywords'] = "apostillar crba new york, apostillar reporte consular en new york, donde puedo apostillar un reporte consular en new york, donde puedo apostillar un reporte consular de nacimiento en new york, donde solicitar el reporte consular en new york";
                    $data['body'] = "<ul><li><h2>¿Qué es un Reporte Consular de Nacimiento en el Extranjero (CRBA)?</h2></li></ul>
                    <p>
                        Un Reporte Consular de Nacimiento en el Extranjero o CRBA, por sus siglas en inglés, es evidencia de ciudadanía estadounidense, emitida a una persona nacida en el extranjero de padre(s) estadounidenses que cumplan con los requisitos para la transmisión de la ciudadanía bajo La ley de Inmigración y Nacionalidad.
                    </p>
                    <ul><li><h2>¿Para qué sirve el Reporte Consular de Nacimiento en el Extranjero (CRBA)?</h2></li></ul>
                    <p>
                        Es la manera en la cual un ciudadano estadounidense puede transmitir su ciudadanía a su hijo que ha nacido fuera de los Estados Unidos.  
                    </p>
                    <ul><li><h2>¿Cuáles son los requisitos para obtener el Reporte Consular de Nacimiento en el Extranjero (CRBA)?</h2></li></ul>
                    <p>
                        El juntar los documentos requeridos para aplicar a un Reporte Consular de Nacimiento en el Extranjero (CRBA) puede ser difícil pero si se realiza correctamente le puede ahorrar varias visitas a la embajada o consulado, evitar que la que su aplicación sea puesta en espera o sea rechazada.                    
                    </p>
                    <p>Las condiciones para aplicar para este proceso son:</p>
                    <ol>
                        <p><li>Al menos uno de los padres debe ser ciudadano estadounidense al nacer su hijo.</li></p>
                        <p><li>El padre que transmite la ciudadanía debe probar una estancia de tiempo mínima en el territorio de los Estados Unidos (presencia física) previo al nacimiento del menor. En general el periodo de residencia a demostrar es de 5 años.</li></p>
                        <p><li>Debe existir una relación biológica (consanguínea) o legal entre el niño y el padre que transmite la ciudadanía.</li></p>
                    </ol>
                    <ul><li><h2>¿Dónde puedo obtener un Reporte Consular de Nacimiento en el Extranjero (CRBA)?</h2></li></ul>
                    <p>Puede <a href='#card'>completar el siguiente formulario</a> o dirigirse personalmente a nuestras oficinas en ".$data['office']." donde un asesor lo guiará en el proceso de una manera correcta y segura.</p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-matrimonio-new-york':
                    $data['description'] = 'Certificados de Matrimonio';
                    $data['metadescription'] = "Notarizamos y Apostillamos certificado de matrimonio en New York 🗽 de una manera ágil y rápida. Contáctenos y lo ayudamos en el proceso ✅";
                    $data['keywords'] = "que es un certificado de matrimonio, requisitos para realizar un certificado de matrimonio en new york, donde puedo solicitar un certificado de matrimonio, apostillar certificado de matrimonio en new york, apostillar acta de matrimonio en new york, donde puedo apostillar un certificado de matrimonio en new york, donde apostillar certificado de matrimonio en new york";
                    $data['body'] = "<ul><li><h2>¿Qué es un certificado de matrimonio?</h2></li></ul>
                    <p>El acta o certificado de matrimonio es un documento que se encarga afirmar y legalizar la unión matrimonial entre dos personas. Dicho documento 
                        contiene información importante como el lugar, fecha y hora en el cual se realizó dicho proceso.
                    </p>
                    <ul><li><h2>¿Para qué sirve el certificado de matrimonio?</h2></li></ul>
                    En pocas palabras, el certificado o acta de matrimonio sirve para preservar y garantizar la unión matrimonial. Además de esto, este documento
                    permite verificar que contrajo matrimonio, lo cual lo ayudará para realizar ciertos trámites.
                    <ul><li><h2>¿Cómo registrar un matrimonio en el extranjero?</h2></li></ul> 
                    <p>Si un acto matrimonial se lleva a cabo en el exterior, deberá inscribir y certificar en el Consulado respectivo, el cual a su vez se comunicará
                        con el registro civil del país para proceder con el trámite.
                    </p>
                    <ul><li><h2>¿Qué requisitos se necesita para un certificado de matrimonio?</h2></li></ul>
                    <p>Para dar paso con el proceso de obtención del certificado de matrimonio, necesita tener presente lo siguiente:</p>
                    <ul>
                        <li>Nombres completos de las personas a contraer matrimonio</li>
                        <li>Fecha que se llevo a cabo el matrimonio</li>
                        <li>Lugar donde se celebró el matrimonio</li>
                        <li>Parentesco de quien lo solicita</li>
                        <li>Nombre completo del solicitante</li>
                    </ul>
                    <ul><li><h2>¿Donde puedo obtener un certificado de matrimonio?</h2></li></ul>
                    <p>
                        Si desea solicitar o apostillar un certificado de matrimonio puede realizarlo completando el siguiente formulario con su información o acercarse a nuestras oficinas en ".$data['office']." donde un asesor se contactará para ayudarlo
                        en el proceso de una manera correcta y segura.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-defuncion-new-york':
                    $data['description'] = 'Certificados de Defunción';
                    $data['metadescription'] = "Notarizamos y Apostillamos certificados de defunción en New York 🗽 de una manera segura y rápida. Contáctenos y lo asesoramos en el trámite ✅";
                    $data['keywords'] = "que es un certificado de defuncion, para que sirve un certificado de defuncion, donde puedo solicitar un certificado de defuncion en new york, apostillar certificado de defuncion en new york, apostillar acta de defuncion en new york, como apostillar un certificado de defuncion en new york, certificado de defuncion new york apostillar, como solicitar certificado de defuncion en new york";
                    $data['body'] = "<ul><li><h2>¿Qué es un certificado de defunción?</h2></li></ul>
                    <p>Un acta o certificado de defunción es un documento mediante el cual termina cualquier proceso administrativo que la persona haya tenido en vida.</p>
                    <ul><li><h2>¿Para que me sirve un certificado de defunción?</h2></li></ul>
                    <p>Además de que un certificado de defunción permite a los familiares de la persona difunta llevar ciertos trámites, es el único medio de suspender completamente sus obligaciones frente al Estado y ante cualquier otra
                        institución con la que hubiera tenido algún compromiso.
                    </p>
                    <ul><li><h2>¿Quién puede tramitar el certificado de defunción?</h2></li></ul>
                    <p>La primera persona que tiene derecho ha tramitar este certificado de defunción es la pareja o cónyuge del difunto. Ante cualquier circunstancia
                        de que esta persona no pueda hacerlo, lo realizarán los familiares más cercanos de la persona que falleció.
                    </p>
                    <ul><li><h2 id='title'>¿Ante que autoridad puedo solicitar un certificado de defunción?</h2></li></ul>
                    <p>Si desea tramitar o apostillar un acta o certificado de defunción puede completar el <a href='#card'>siguiente formulario</a> con su información o acercarse a nuestras oficinas en ".$data['office']." donde un asesor se comunicará con usted para guiarlo en el trámite de una manera correcta y segura.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-divorcio-new-york':
                    $data['description'] = 'Certificados de Divorcio';
                    $data['metadescription'] = "El certificado de divorcio es un documento necesario para realizar diversos trámites ⚖. Para apostillar dicho documento contáctenos y lo asesoramos! ✅";
                    $data['keywords'] = "que es un certificado de divorcio, requisitos para un certificado de divorcio new york, solicitar certificado de divorcio en new york, apostillar documentos en new york, apostillar certificado de divorcio en new york, apostillar acta de divorcio en new york, donde apostillar certificado de divorcio en new york, donde puedo apostillar un certificado de divorcio en new york, donde puedo sacar el certificado de divorcio en new york";
                    $data['body'] = "<ul><li><h2>¿Qué es un acta o certificado de divorcio?</h2></li></ul>
                    <p>El certificado de divorcio es un escrito mediante el cual constata legalmente la separación de una pareja que estaba unida en matrimonio</p>
                    <ul><li><h2>¿Para qué se utiliza un certificado de divorcio?</h2></li></ul>
                    <p>Dicho documento es necesario para realizar distintos trámites dependiendo del país en el que se encuentre. Por ejemplo se solicita este documento cuando
                        una persona contrae nuevamente matrimonio.
                    </p>
                    <p>En Estados Unidos, este certificado es obligado para aquellos migrantes que soliciten el <i>Green Card</i> (Permiso de residencia permanente), para realizar cualquier tipo de trámite, renovar visa o pasaporte, etc.</p>
                    <ul><li><h2>¿Cuáles son los requisitos necesarios para un certificado de divorcio?</h2></li></ul>
                    <p>Entre los requerimientos que se solicitan para obtener dicho documento se encuentran los siguientes:</p>
                    <ol>
                        <li>Copia de certificado de nacimiento de los cónyuges</li>
                        <li>En caso de tener hijos, copia del certificado de nacimiento de cada uno de ellos</li>
                        <li>Copia del certificado de matrimonio</li>
                        <li>Copia del documento de identidad</li>
                        <li>Solicitud y acuerdo de divorcio realizado por el abogado</li>
                        <li>Poder que se concede al abogado</li>
                    </ol>
                    <ul><li><h2>¿Donde puedo obtener el certificado de divorcio?</h2></li></ul>
                    <p>Si desea realizar dicho trámite puede completar el <a href='#card'>siguiente formulario</a> con su información y un asesor se contactará con usted. O puede visitar
                        nuestras oficinas en ".$data['office']." donde se le brindará la ayuda necesaria con el trámite en gestión.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-naturalizacion-new-york':
                    $data['description'] = 'Certificados de Naturalización';
                    $data['metadescription'] = "El certificado de naturalización es un escrito necesario para realizar diversos trámites notariales ⚖. Agende una cita aquí para asesorarlo en el proceso! ✅";
                    $data['keywords'] = "que es un certificado de naturalizacion, requisitos para sacar el certificado de naturalizacion en new york, apostillar certificado de naturalizacion en new york, apostillar acta de naturalizacion en new york, donde apostillar certificado de naturalizacion en new york, como sacar el certificado de naturalizacion en new york, como solicitar certificado de naturalizacion en new york, certificado de naturalizacion americana";
                    $data['body'] = "<ul><li><h2>¿Qué es un certificado de naturalización?</h2></li></ul>
                    <p>El certificado de naturalización es un documento el cual acredita que una persona extranjera se conveirte en ciudadano del país en que reside.</p>
                    <ul><li><h2>¿Para qué sirve un certificado de naturalización?</h2></li></ul>
                    <p>Lo que hace el acta o certificado de naturalización es otorgarle a los ciudadanos naturalizados algunos privilegios y beneficios en el país que se encuentra, 
                        entre los cuales se encuentra la capacidad de votar. Sobre todo es un documento el cual le permite demostrar que es un ciudadano más de dicho país
                    </p>
                    <ul><li><h2>¿Cuáles son los requisitos para obtener el certificado de naturalización?</h2></li></ul>
                    <p>Algunos de los requerimientos para obtener su certificado de naturalización son los siguientes:</p>
                    <ol>
                        <li>Tener al menos 18 años</li>
                        <li>Ser residente al menos 5 años</li>
                        <li>Poder leer, escribir y hablar inglés básico</li>
                        <li>Comprender la historia básica del gobierno de los Estados Unidos</li>
                        <li>Ser una persona de buen carácter moral</li>
                    </ol>
                    <ul><li><h2>¿Donde puedo hacer el trámite para el certificado de naturalización?</h2></li></ul>
                    <p>Si desea empezar el proceso para adquirir el acta de naturalización puede completar el <a href='#card'>siguiente formulario</a> con su información
                        o acercarse a nuestras oficinas en ".$data['office']." donde un asesor lo orientará en la gestión de dicho documento de una manera ágil y segura.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-expediente-de-adopcion-new-york':
                    $data['description'] = 'Expediente de Adopción';
                    $data['metadescription'] = "Notarizamos y apostillamos todo tipo de documentos como el expediente de adopción en New York 🗽 de una manera rápida y segura. Contáctenos! ✅";
                    $data['keywords'] = "apostillar expediente de adopcion en new york, apostillar expediente de adopcion cerca de mi, donde apostillar expediente de adopcion en new york, donde puedo apostillar expediente de adopcion en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-copia-de-pasaporte-new-york':
                    $data['description'] = 'Copia de Pasaporte';
                    $data['metadescription'] = "Notarizamos y apostillamos todo tipo de documentos como copia de pasaporte en New York 🗽 de una manera ágil y segura. Contáctenos! ✅";
                    $data['keywords'] = "apostillar copia de pasaporte en new york, apostillar copia de pasaporte cerca de mi, donde apostillar copia de pasaporte en new york, como sacar copia de pasaporte en new york, donde puedo apostillar copia de pasaporte en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-copia-de-licencia-de-conducir-new-york':
                    $data['description'] = 'Copia de Licencia de Conducir';
                    $data['metadescription'] = "Apostillamos todo tipo de documentos como copia de licencia de conducir en New York 🗽 de una forma rápida y segura. Contáctenos! ✅";
                    $data['keywords'] = "apostillar copia licencia de conducir en new york, apostillar copia de licencia de conducir cerca de mi, donde apostillar copia de licencia de conducir en new york, donde puedo apostillar copia de licencia de conducir en new york, donde puedo solicitar una copia de licencia de conducir en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-escrituras-testamentos-new-york':
                    $data['description'] = 'Escrituras y Testamentos';
                    $data['metadescription'] = "Notarizamos y apostillamos todo tipo de documentos como Escrituras y Testamentos en New York 🗽 de una forma segura. Solicite aquí! ✅";
                    $data['keywords'] = "apostillar escrituras en new york, apostillar testamento en new york, donde apostillar escrituras en new york, donde apostillar testamento en new york, donde puedo apostillar una escritura en new york, donde puedo apostillar un testamento en new york, apostillar escritura notarial en new york, apostillar escritura publica en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-declaraciones-juradas-de-estado-unico-new-york':
                    $data['description'] = 'Declaraciones Juradas';
                    $data['metadescription'] = "Notarizamos y Apostillamos Declaraciones Juradas (Affidávit) en New York 🗽 de una manera rápida y segura. Agende su cita ahora! ✅";
                    $data['keywords'] = "apostillar declaracion jurada en new york, apostillar declaracion juramentada en new york, apostillar affidavit support en new york, apostillar declaracion jurada cerca de mi, donde apostillar una declaracion jurada en new york, donde apostillar una declaracion juramentada en new york, donde apostillar affidavit en new york, apostillar declaracion juramentada en new york estados unidos";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-titulo-de-automovil-new-york':
                    $data['description'] = 'Título de Coche/Automóvil';
                    $data['metadescription'] = "Notarizamos y Apostillamos Título de Automóvil en New York 🗽 de una forma segura. Consulte por nuestros servicios y lo ayudamos en el trámite ✅";
                    $data['keywords'] = "apostillar documentos en new york, apostillar titulo de automovil en new york, apostillar titulo de coche en new york, donde apostillar titulo de automovil en new york, donde apostillar titulo de coche en new york, apostillar titulo de auto en new york, apostillar titulo de vehiculo en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-autorizacion-de-viaje-new-york':
                    $data['description'] = 'Autorización de Viaje';
                    $data['metadescription'] = "Notarizamos y Apostillamos todo tipo de documentos como Autorización de Viaje en New York 🗽 de una manera segura. Consulte por nuestro servicio ✅";
                    $data['keywords'] = "que es una autorizacion de viaje, requisitos para autorizacion de viaje en new york, apostillar autorizacion de viaje en new york, apostillar autorizacion de viaje cerca de mi, donde apostillar una autorizacion de viaje en new york, donde puedo apostillar una autorizacion de viaje en new york, apostillar autorizacion de viaje para menor de edad en new york, donde puedo hacer una autorizacion de viaje para niños en new york, carta de autorizacion de viaje en new york";
                    $data['body'] = "<ul><li><h2 id='title'>¿Qué es una autorización de viaje?</h2></li></ul>
                    <p>Una autorización de viaje es un escrito en el cual uno o ambos padres autorizan el viaje, dentro o fuera del país, de su hijo o hija menor de edad, ya sea con los mismos, algún familiar o solos.</p>
                    <ul><li><h2 id='title'>¿En qué situaciones piden la autorización de viaje?</h2></li></ul>
                    <p>La autorización de viaje se puede solicitar cuando:</p>
                    <ol>
                        <li>El menor de edad viaja dentro o fuera del país sin ninguno de sus padres</li>
                        <li>El menor de edad viaje con terceras personas, las cuales pueden ser familiares</li>
                    </ol>
                    <ul><li><h2 id='title'>¿Qué requisitos necesito para la autorización de viaje?</h2></li></ul>
                    <p>Los requerimientos para solicitar una autorización de viaje son los siguientes:</p>
                    <ol>
                        <li>Identificación de uno o ambos padres o de su representante legal</li>
                        <li>Nombres y apellidos del menor de edad</li>
                        <li>Fecha de nacimiento del menor</li>
                        <li>En caso de que viaje con una tercera persona, nombres y apellidos de la misma</li>
                        <li>Información del vuelo</li>
                    </ol>
                    <ul><li><h2 id='title'>¿Ante que autoridad puedo solicitar una autorización de viaje?</h2></li></ul>
                    <p>Las autorizaciones de viaje se pueden tramitar ante cualquier Notaría Pública en el territorio en el que se encuentre. Si necesita solicitar o apostillar
                        una autorización de viaje acérquese a nuestra oficina en ". $data['office']." con los requisitos necesarios o <b><a href='#card'>complete el siguiente formulario</a></b> y una asesor lo contactará
                        para guiarlo de una manera correcta y segura.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-poder-notarial-personal-new-york':
                    $data['description'] = 'Poder Notarial Personal';
                    $data['metadescription'] = "Notarizamos y Apostillamos todo tipo de documentos como Poder Notarial Personal en New York 🗽 de una forma segura. Contáctenos ahora! ✅";
                    $data['keywords'] = "apostillar documentos en new york, apostillar poder notarial en new york, apostillar carta poder en new york, apostillar poder notarial cerca de mi, donde apostillar carta poder en new york, donde apostillar poder notarial en new york, donde puedo apostillar un poder en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-registro-de-policia-estatal-new-york':
                    $data['description'] = 'Registro de la Policía Estatal';
                    $data['metadescription'] = "Apostillamos todo tipo de documentos como Registro de la Policía Estatal en New York 🗽 de una manera ágil y segura. Contáctenos! ✅";
                    $data['keywords'] = "apostillar documentos en new york, apostillar registro policial en new york, apostillar registro de la policia en new york, apostillar registro policial cerca de mi, donde apostillar registro policial en new york, donde puedo apostillar un registro policial en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-registro-de-antecedentes-fbi-new-york':
                    $data['description'] = 'Registros de Antecedentes del FBI';
                    $data['metadescription'] = "Apostillamos Registro de Antecedentes del FBI en New York 🗽 de una forma rápida y segura. Consulte ahora por nuestros servicios! ✅";
                    $data['keywords'] = "notaria latina en queens new york, apostillar documentos en new york, apostillar antecedentes del fbi en new york, apostillar registro de antecentes del fbi en new york, apostillar registros de antecedentes del fbi cerca de mi, donde apostillar antecedentes del fbi en new york, donde apostillar registro de antecedentes del fbi en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-diploma-universitario-new-york':
                    $data['description'] = 'Diploma Universitario';
                    $data['metadescription'] = "Apostillamos Diplomas Universitarios en New York 🗽 de una forma segura. Contáctese con nosotros ahora y lo asesoramos en el trámite ✅";
                    $data['keywords'] = "notaria latina en queens new york, notaria en queens ny, apostillar documentos en new york, apostillar diploma universitario en new york, apostillar diploma universitario cerca de mi, apostillar titulo universitario en new york, donde apostillar diploma universitario en new york, donde puedo apostillar un titulo universitario en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-transcripcion-universitaria-new-york':
                    $data['description'] = 'Transcripción Universitaria';
                    $data['metadescription'] = "Apostillamos Transcripción Universitaria en New York 🗽 de una manera rápida y segura. Contáctese con nosotros y lo ayudamos en el trámite! ✅";
                    $data['keywords'] = "notaria latina en queens new york, notaria en queens ny, apostillar documentos en new york, apostillar transcripcion universitaria en new york, apostillar transcripcion universitaria cerca de mi, apostillar transcripcion de titulo universitario en new york, donde apostillar transcripcion universitaria en new york, donde apostillar transcripcion de titulo universitario en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-diploma-de-escuela-secundaria-new-york':
                    $data['description'] = 'Diploma de Escuela Secundaria';
                    $data['metadescription'] = "Apostillamos Diploma de Escuela Secundaria en New York 🗽 de una forma ágil y segura. Contáctenos y lo asesoramos con el trámite ✅";
                    $data['keywords'] = "notaria latina en queens new york, notaria en queens ny, apostillar documentos en new york, apostillar diploma secundario en new york, apostillar diploma de escuela secundaria en new york, apostillar diploma escuela secundaria cerca de mi, donde apostillar diploma de secundaria en new york, donde apostillar diploma de escuela secundaria en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-transcripcion-de-escuela-secundaria-new-york':
                    $data['description'] = 'Transcripción de Escuela Secundaria';
                    $data['metadescription'] = "Apostillamos Transcripción de Escuela Secundaria en New York 🗽 de una manera rápida y segura. Agende su cita aquí para ayudarlo con el trámite! ✅";
                    $data['keywords'] = "notaria latina en queens new york, notaria en queens ny, apostillar documentos en new york, apostillar transcripcion de secundaria en new york, apostillar transcripcion de escuela secundaria en new york, donde apostillar transcripcion de escuela secundaria en new york, donde puedo apostillar una transcripcion de secundaria en new york, apostillar transcripcion de secundaria cerca de mi";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-incorporacion-new-york':
                    $data['description'] = 'Certificado de Incorporación';
                    $data['metadescription'] = "Apostillamos todo tipo de documentos como Certificado de Incorporación en New York 🗽 de una forma segura. Consulte por nuestro servicio aquí! ✅";
                    $data['keywords'] = "notaria latina en queens new york, notaria en queens ny, apostillar documentos en new york, apostillar certificado de incorporacion en new york, apostillar acta de incorporacion en new york, apostillar certificado de incorporacion cerca de mi, donde apostillar certificado de incorporacion en new york, donde puedo apostillar un certificado de incorporacion en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-buena-reputacion-new-york':
                    $data['description'] = 'Certificado de Buena Reputación';
                    $data['metadescription'] = "Apostillamos Certificado de Buena Reputación en New York 🗽 de una manera segura. Envíe su documento por nuestro sitio web o contáctenos! ✅";
                    $data['keywords'] = "notaria latina en queens new york, notaria en queens ny, apostillar documentos en new york, apostillar certificado de buena reputacion en new york, apostillar certificado de buena reputacion cerca de mi, donde apostillar certificado de buena reputacion en new york, donde puedo apostillar un certificado de buena reputación en new york, apostillar certificado de buena conducta en new york";
                    $data['body'] = "<ul><li><h2>¿Qué es un certificado de buena reputación?</h2></li></ul>
                    <p>Un certificado de buena reputación es un documento que avala que una institución comercial en la actualidad esta registrada y con los permisos correspondientes
                        para realizar negocios.
                    </p>
                    <ul><li><h2>¿Para qué sirve un certificado de buena reputación?</h2></li></ul>
                    <p>El obtener un certificado de buena reputación no es obligado. Sin embargo es útil cuando necesite realizar una serie de trámites como por ejemplo abrir una cuenta bancaria comercial,
                        obtener pagos de clientes por medio de tarjetas de crédito o débito, requerir algún tipo de crédito para su negocio, etc.
                    </p>
                    <ul><li><h2>¿Qué necesito para obtener el certificado de buena reputación?</h2></li></ul>
                    <p>El principal requisito para obtener su certificado de buena reputación es estar registrado en la Secretaría de Estado dependiento en el que se encuentre. Para esto, deberá
                        contar con el nombre de su institución y el número de registro.
                    </p>
                    <p>Para que el certificado sea emitido, su entidad comercial deberá constar con lo siguiente:</p>
                    <ol>
                        <li>Estar registrado</li>
                        <li>Contar con los documentos necesarios, por ejemplo una declaración anual</li>
                        <li>Pagar la tarifa requerida</li>
                    </ol>
                    <ul><li><h2>¿Donde puedo obtener el certificado de buena reputación?</h2></li></ul>
                    <p>Si desea realizar el trámite para obtener dicho documento complete el siguiente formulario con su información o puede acercarse a nuestra oficinas
                        en " . $data['office'] . " donde un asesor lo ayudará brindando la atención necesaria.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-origen-new-york':
                    $data['description'] = 'Certificado de Origen';
                    $data['metadescription'] = "Apostillamos Certificados de Origen en New York 🗽 de una manera segura. Envíe su documento o contáctese con nosotros para asesorarlo en el trámite ✅";
                    $data['keywords'] = "notaria latina en queens new york, notaria en queens ny, apostillar documentos en new york, apostillar certificado de origen en new york, apostillar certificado de origen cerca de mi, donde apostillar certificado de origen en new york, donde puedo apostillar certificado de origen en new york, apostillar acta de origen en new york";
                    $data['body'] = "<ul><li><h2>¿Qué es el certificado de origen?</h2></li></ul>
                    <p>El certificado de origen es un documento cuyo objetivo es determinar el país de procedencia de dicha mercancia, por ello dispone
                        de algunas preferencias o beneficios debido algunos acuerdos comerciales entre países.
                    </p>
                    <ul><li><h2>¿Para qué sirve el certificado de origen?</h2></li></ul>
                    <p>Este certificado de origen sirve para garantizar la procedencia de los productos que pretende entrar a un territorio.</p>
                    <ul><li><h2>¿Cómo puedo obtener el certificado de origen?</h2></li></ul>
                    <p>La información básica y necesario para la obtención de un certificado de origen es la siguiente:</p>
                    <ol>
                        <li>Información de la autoridad que certifica el documento</li>
                        <li>Información de las personas que exporta e importa</li>
                        <li>Características del producto (Peso, Marca, Cantidad, etc.)</li>
                        <li>Identificar la mercancía mediante la clasificación arancelaria</li>
                        <li>Tipo de embalaje</li>
                    </ol>
                    <ul><li><h2>¿Donde puedo tramitar el certificado de origen?</h2></li></ul>
                    <p>Para poder comenzar con el proceso del certificado de origen puede completar el siguiente formulario con su información correspondiente o dirigirse 
                        a nuestras oficinas en ".$data['office']." donde un asesor lo guiará en el proceso de una manera ágil y segura.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-marca-patente-new-york':
                    $data['description'] = 'Marcas o Patentes';
                    $data['metadescription'] = "Apostillamos Marcas o Patentes en New York 🗽 de una manera rápida y segura. Contáctenos o puede enviar su documento para ayudarlo con el proceso ✅";
                    $data['keywords'] = "notaria latina en queens new york, notaria en queens ny, apostillar documentos en new york, apostillar marca en new york, apostillar patente en new york, apostillar marca cerca de mi, apostillar patente cerca de mi, donde apostillar marca en new york, donde apostillar patente en new york, donde puedo apostillar una marca en new york, donde puedo apostillar una patente en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-poder-comercial-new-york':
                    $data['description'] = 'Poder Comercial';
                    $data['metadescription'] = "Apostillamos Poder Comercial en New York 🗽 de una manera segura y rápida. Envíe su documento o puede consultar por nuestros servicios aquí! ✅";
                    $data['keywords'] = "notaria latina en queens new york, notaria en queens ny, apostillar documentos en new york,  apostillar poder comercial new york, donde apostillar poder comercial new jersey, donde puedo apostillar un poder comercial en new york, donde apostillar carta poder comercial en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-declaracion-jurada-comercial-new-york':
                    $data['description'] = 'Declaración Jurada Comercial';
                    $data['metadescription'] = "Apostillamos Declaración Jurada Comercial en New York 🗽 de una forma segura. Contáctese con nosotros o envíe su documento por nuestro sitio web ✅";
                    $data['keywords'] = "que es una declaracion juramentada comercial, para que sirve una declaracion juramentada en new york, requisitos para una declaracion juramentada en new york, apostillar documentos en new york, apostillar declaracion jurada comercial en new york, apostillar affidavit comercial en new york, apostillar declaracion jurada comercial cerca de mi, donde apostillar affidavit comercial en new york, donde apostillar declaracion jurada comercial en new york, apostillar declaracion juramentada comercial en new york";
                    $data['body'] = "<ul><li><h2>¿Qué es una declaración juramentada comercial?</h2></li></ul>
                    <p>Una declaración juramentada es una documento mediante el cual una persona manifiesta una situación o un hecho, el mismo que es verificado y garantizado mediante una autoridad competente</p>
                    <ul><li><h2>¿Para qué sirve una declaración juramentada?</h2></li></ul>
                    <p>El objetivo de dicho documento es generar un compromiso legal de la persona que hace la declaración acorde a lo que esta estipulado en el escrito. Es decir, el declarante se compromote
                        con la veracidad de lo que ha manifestado. En la mayoría de los casos se utilizan para reunir pruebas en un juicio o en otros aspectos como asuntos familiares, bienes raíces, etc.
                    </p>
                    <ul><li><h2>¿Ante que situaciones necesito una declaración juramentada?</h2></li></ul>
                    <p>La declaración juramentada puede ser necesaria para diferentes situaciones, entre las cuales perfilan los ingresos de una persona, situación familiar o para declarar que una personas cumple con ciertos
                        requerimientos necesarios para realizar algún trámite legal.
                    </p>
                    <ul><li><h2>¿Qué requisitos son necesarios para una declaración juramentada?</h2></li></ul>
                    <p>Una declaración juramentada debe satisfacer los siguientes requisitos:</p>
                    <ol>
                        <li>Nombres y dirección del solicitante</li>
                        <li>Firma de la persona que solicita, testigos y notario</li>
                        <li>La declaración debe estar acorde a la postura del declarante</li>
                        <li>Dicho documento no debe ser obligado para los testigos, es decir debe ser voluntaria</li>
                    </ol>
                    <ul><li><h2>¿Donde puedo solicitar una declaración juramentada?</h2></li></ul>
                    <p>Si necesita apostillar u obtener una declaración juramentada puede completar el <a href='#card'>siguiente formulario</a> o acercarse a nuestras oficinas en ".$data['office']." para que un asesor pueda
                        contactarse con usted y brindarle la asesoría necesaria.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-fda-new-york':
                    $data['description'] = 'Certificado FDA';
                    $data['metadescription'] = "Apostillamos Certificados FDA en New York 🗽 de una manera rápida y segura. Acérquese a nuestras oficinas o envíe su documento por nuestro sitio web ✅";
                    $data['keywords'] = "notaria latina en queens new york, notaria en queens ny, apostillar documentos en new york, apostillar certificado fda en new york, apostillar certificado fda cerca de mi, donde apostillar certificado fda en new york, donde puedo apostillar un certificado fda en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-facturas-new-york':
                    $data['description'] = 'Facturas';
                    $data['metadescription'] = "Apostillamos todo tipo de documentos como Facturas en New York 🗽 de una manera segura. Contáctenos o envíe su documento y lo ayudamos en el trámite ✅";
                    $data['keywords'] = "notaria latina en queens new york, notaria en queens ny, apostillar documentos en new york, apostillar una factura en new york, apostillar facturas cerca de mi, donde apostillar facturas en new york, donde puedo apostillar una factura en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;   
                case 'apostillar-departamento-de-hacienda-new-york':
                    $data['description'] = 'Departamento de Hacienda';
                    $data['metadescription'] = "Apostillamos todo tipo de documentos en New York 🗽 como departamento de hacienda. Contáctese con nosotros y lo asesoramos en el trámite ✅";
                    $data['keywords'] = "notaria latina en queens new york, notaria en queens ny, apostillar documentos en new york, apostillar documento departamento de hacienda en new york, apostillar departamento de hacienda cerca de mi, donde apostillar departamento de hacienda en new york, donde puedo apostillar departamento de hacienda en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-gobierno-extranjero-new-york':
                    $data['description'] = 'Certificado de Gobierno Extranjero';
                    $data['metadescription'] = "Apostillamos Certificado de Gobierno Extranjero en New York 🗽 de una manera rápida y segura. Contáctenos y ayudamos con el proceso ✅";
                    $data['keywords'] = "apostillar documentos en new york, apostillar certificado de gobierno extranjero en new york, apostillar certificado de gobierno extranjero cerca de mi, donde apostillar certificado de gobierno extranjero en new york, donde puedo apostillar certificado de gobierno extranjero en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-venta-gratis-new-york':
                    $data['description'] = 'Certificado de Venta gratis';
                    $data['metadescription'] = "Apostillamos Certificado de Venta Gratis en New York 🗽 de una manera segura. Contáctenos para asesorarle correctamento con el trámite ✅";
                    $data['keywords'] = "apostillar documentos en new york, apostillar certificado de venta gratis en new york, apostillar acta de venta gratis en new york, apostillar certificado de venta cerca de mi, apostillar acta de venta cerca de mi, donde apostillar certificado de venta en new york, donde puedo apostillar certificado de venta gratis en new york";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-ordenes-de-compra-new-york':
                    $data['description'] = 'Órdenes de Compra';
                    $data['metadescription'] = "Apostillamos todo tipo de documentos como Órdenes de Compra en New York 🗽 de una forma segura. Contáctenos y lo asesoramos en el proceso ✅";
                    $data['keywords'] = "apostillar documentos en new york, apostillar orden de compra en new york, apostillar orden de compra cerca de mi, donde apostillar una orden de compra en new york, donde puedo apostillar una orden de compra en new york";
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
            $data['urlmap'] = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.7118317711106!2d-73.897921!3d40.746365999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25f030415024b%3A0x3b391bcaf4cd7c10!2sNotar%C3%ADa%20Latina%20en%20New%20York!5e0!3m2!1ses-419!2sec!4v1676310563039!5m2!1ses-419!2sec';
            $data['imgurlmap'] = "img/oficinas/maps-ny.webp";
            $data['imgurlmapmobile'] = "img/oficinas/maps-ny-mobile.webp";
            $data['keywords'] = 'notaria new york
            notario cerca de mi,
            notaria cerca de mi, 
            notarias cerca de mi,
            notario publico cerca de mi,
            notario publico en español cerca de mi,
            notarias publicas cerca de mi,
            notarios publicos cerca de mi, 
            notaria en queens,
            notarias en queens ny,
            notaria en new york,
            notaria queens,
            notaria en queens ny, 
            notaria en queens new york,
            notaria latina en queens new york,
            notario publico en new york,
            notaria publico new york,
            notaria publico en queens new york,
            notarizar documentos near me,
            notarizar en linea new york,
            notarizar en linea en new york,
            notarizar documentos,
            notarizar documentos en new york,
            notarizar documentos en queens new york,
            tramitar documentos new york,
            tramitar documentos en new york,
            donde puedo tramitar documentos en new york,
            donde puedo tramitar un documento en new york,
            tramitar documentos queens new york,
            tramitar documentos en queens new york,
            notarizar un documento,
            notarizar un documento new york,
            notarizar un documento en new york,
            notarizar documentos new york,
            notarizar documentos en new york,
            realizar tramite notarial new york,
            realizar tramite notarial en new york,
            realizar un tramite notarial en new york,
            donde puedo notarizar documentos en new york,
            donde puedo notarizar un documento en new york,
            donde puedo realizar un tramite notarial new york,
            donde puedo realizar un tramite notarial en new york,
            donde puedo notarizar un documento cerca de mi,
            tramites notariales en new york,
            tramites notariales new york,
            tramites notariales queens new york,
            tramites notariales en queens new york,
            servicios notariales new york,
            servicios notariales en new york';
            $data['reviews'] = $this->reviewsny;
            $data['more_reviews'] = $this->more_reviewsny;
            $data['urlindications'] = "https://www.google.com/maps/dir//Notar%C3%ADa+Latina+en+New+York+67-03+Roosevelt+Ave+Queens,+NY+11377+Estados+Unidos/@40.746366,-73.897921,16z/data=!4m5!4m4!1m0!1m2!1m1!1s0x89c25f030415024b:0x3b391bcaf4cd7c10";

            $consulates = DB::table('consulates')->select('slug')->get();

            return view('web.oficina', compact('data', 'consulates'));
        }
    }

    public function oficinasnj(?string $service = null){
        $data['telfHidden'] = '+19088009046'; //+19082249260
        $data['telfWpp'] = '13479739888';
        $data['telfShow'] = '908-800-9046';
        $data['office'] = 'New Jersey';
        $data['address'] = '1146 East Jersey St Elizabeth, NJ 07201';
        $data['location'] = 'https://g.page/r/CVNRV-zNuJiZEAE';
        $data['metadescription'] = "Notarizamos todo tipo de documentos en New Jersey 🗽 como apostillas, certificados, poderes, traducciones de una manera ágil y rápida. Solicítelo aquí! ✅";
        if($service != null){
            switch ($service) {
                case 'certificaciones-en-new-jersey':
                    $data['metadescription'] .= "Realizamos todo tipo de Certificaciones en New Jersey de una manera ágil y rápida!";
                    $data['keywords'] = "copia certificada, copia certificada de un documento, donde puedo obtener copia certificada de documento, tramitar copia certificadad de documento, copia certificada acta de nacimiento, certificaciones en estados unidos, certificar documentos en estados unidos, que es una certificacion, para que sirve certificar un documento, como certificar documentos, que necesito para certificar un documento, requisitos para certificar un documento, que necesito para certificar un documento en new jersey, requisitos para certificar un documento en new jersey, certificar documentos en new jersey, certificar acta de nacimiento en new jersey, certificar partida de nacimiento en new jersey, certificar acta de matrimonio en new jersey, certificar declaracion jurada en new jersey, certificar affidavit en new jersey, certificar licencia de conducir en new jersey, certificar carta poder en new jersey, donde puedo certificar un documento en new jersey, donde puedo certificar documentos en new jersey, quien puede certificar documentos";
                    $posts = Post::where('name', 'LIKE', '%certificacion%')->limit(3)->get();
                    $data['imgback'] = "img/oficinas/copia-certificada-de-documentos-1.webp";
                    $data['body'] = "
                    <h2 style='font-size: 25px;'>Copia Certificada de su documento en New Jersey</h2>
                    <p class='text-muted'>
                        Como su nombre lo menciona, la copia certificada de un documento es un impreso exacto del escrito que va a certificar el cual va sellado por un notario constatando que es una copia fidedigna del documento.
                    </p>
                    <p class='text-muted'>Este certificado es emitido por el notario que verifica que el duplicado sea una copia exacta del documento principal.</p>

                    <h2 style='font-size: 25px;background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Para que se utiliza un certificado?</h2>
                    <p class='text-muted'>El uso principal de este documento es demostrar la legitimidad de nuestra documentación personal al momento de gestionar cualquier tipo de trámite, 
                    como puede ser un proceso judicial, para algún tipo de comercio en su negocio, o por razones profesionales en cuanto a un empleo.</p>
                    <p class='text-muted'>Este documento es válido para gestionar cualquier tipo de diligencia ya sea nacional o internacionalmente.</p>
                    
                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Por qué es fundamental certificar un documento?</h2>
                    <p class='text-muted'>Una de las razones, y quizás la más importante, es al momento
                        que necesite enviar sus documentos personales como pasaporte, partida de nacimiento, acta de matrimonio, etc., para efectuar cualquier tipo de diligencia que este tramitando.
                        La opción más viable para no perder los documentos originales o evitar daños es decidir hacer una copia certificada.
                    </p>
                    <p class='text-muted'>Otra motivo puede ser que nuestra documentación se encuentra en mal estado físico y esto podría causar que las entidades que lo solicitan no lo acepten como válido. Para prevenir
                     estos incidentes y tener que conseguir nuevamente estos papeles, una buena idea sería obtener el certificado del documento a solicitar. Esto evitará cualquier inconveniente que se le presente a última hora.</p>

                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Qué documentos se pueden certificar?</h2>
                    <ul class='text-muted'>
                        <li>Actas de nacimiento, matrimonio, etc.</li>
                        <li>Cartas</li>
                        <li>Permisos de conducir.</li>
                        <li>Declaraciones juradas (Affidávit).</li>
                        <li>Escrituras.</li>
                        <li>Entre otros</li>
                    </ul>

                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Cuánto tiempo es válido la copia certificada?</h2>
                    <p class='text-muted'>
                        Cualquier certificado que haya sido expedido se mantiene en rigor del mismo modo que lo hace el documento original, no tiene un período determinado de validez 
                        y su uso puede llevarse a cabo bajo cualquier tramitación. Por eso lo preferible es realizarlo con una autoridad con las facultades pertinentes para eludir
                        cualquier tipo de violación de autoridad, falsificación o contratiempo que puede surgir con este documento a futuro.
                    </p>

                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Qué requirimiento es necesario para empezar con el procedimiento?</h2>
                    <p class='text-muted'>El único requisito indispensable para adquirir una copia certificada es disponer del documento original. El notario comprobará que es verídico
                    y continuará realizando la certificación de dicho documento. Existen dos formas en que se puede certificar un documento:
                        <ul class='text-muted'>
                            <li>La primera es que el notario sella la copia generada del documento, asegurando que es veraz y correcta</li>
                            <li>La segunda manera es anexando un certificado notarial indicando que el duplicado del documento es auténtico en concordancia con el documento original</li>
                        </ul> 
                    </p>

                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Donde puedo conseguir este documento?</h2>
                    <p class='text-muted'>Contáctenos agendando una cita mediante nuestro sitio web, por medio de una llamada o acercándose a nuestra oficina en New Jersey con su documento a certificar. Un asesor lo guiará para que realice el trámite de manera correcta y segura.
                    </p>

                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Cuánto se demoran en entregar el documento?</h2>
                    <ul class='text-muted'>
                        <li>El tiempo de entrega dentro de los Estados Unidos es de 24 horas.</li>
                        <li>El tiempo de entrega fuera de los Estados Unidos es de 3 días laborables.</li>
                        <li>El documento digital estará disponible en 24 horas.</li>
                        <li class='text-danger'>Por motivos de codiv-19 puede existir retraso en los tiempos de entrega.</li>
                    </ul>
                    <p class='text-muted'><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
                        <a href='https://www.facebook.com/notariapublicalatina/'><em>FanPage de Facebook</em></a><em>.</em></p>
                    ";
                    return view('web.office.certificaciones', compact('data', 'posts'));
                    break;
                case 'travel-authorization-en-new-jersey':
                    $data['metadescription'] .= "Realizamos Autorizaciones de Viaje para Menores de Edad en New Jersey de una manera ágil y rápida!";
                    $data['keywords'] = "que es una autorizacion de viaje, requisitos para realizar una autorizacion de viaje en new jersey, para que sirve una autorizacion de viaje, cuanto dura una autorizacion de viaje en new jersey, realizar autorizacion de viaje en new jersey, donde puedo realizar una autorizacion de viaje en new jersey, autorizacion de viaje para niños en new jersey, donde puedo realizar una carta de autorizacion de viaje en new jersey, permiso de viaje en usa, autorizacion de viaje para niños, permiso notarial de viaje, permiso notarial de viaje en new jersey, permiso notarial de viaje en estados unidos, menor carta notarial para permiso de viaje, carta de permiso de viaje para niños en ingles, notario para sacar permiso de viaje, carta notarial para permiso de viaje, carta notarial para permiso de viaje en new jersey, carta notarial para permiso de viaje en estados unidos, autorizacion para viaje de menores al extranjero, carta autorizacion de viaje, carta para permiso de viaje, carta permiso de viaje para niños";
                    $posts = Post::where('name', 'LIKE', '%autorizacion%')->limit(3)->get();
                    $data['imgback'] = "img/oficinas/permiso-de-viaje-para-menores.webp";
                    $data['body'] = "
                    <h2 style='font-size: 25px'>El Permiso de Viaje es un documento que autoriza a su hijo/a menor edad viajar fuera del país en caso de que los padres no puedan acompañarlo(a).</h2>
                    <p class='text-muted'>Consta de una carta o escrito que se le otorga a una persona como el delegado de viajar con el menor. Este sujeto puede tratarse de un familiar,
                        algún amigo o ayudante de viaje, por ejemplo una azafata de la aerolínea por la cual va a viajar (personal de un avión que tiene como objetivo atender a los pasajeros prestándoles servicios para su comodidad y seguridad).</p>
                    <p class='text-muted'>Este permiso para viajar debe constar con la aprobación de los padres para que su hijo salga del país con el acompañante designado.
                        Incluso puede realizar este trámite si el menor va a realizar el viaje con solo uno de sus padres.
                    </p>

                    <h2 style='font-size: 25px;background-color: #F5F8FA; padding:7px; border-radius: 5px'>Requisitos para obtener la autorización de viaje</h2>
                    <ul class='text-muted'>
                        <li>Identificación de los padres.</li>
                        <li>Nombres completos y fecha de nacimiento del menor</li>
                        <li>Nombres y apellidos de la persona designada a viajar con el menor.</li>
                        <li>Información del vuelo.</li>
                    </ul>
                    <p class='text-muted'>Puede que se requiera de más información para realizar la carta de autorización para el niño/a, por ejemplo el país de destino al que va a viajar, lapso de tiempo que estará fuera del país, entre otros.</p>

                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Qué tiempo es válido este documento?</h2>
                    <p class='text-muted'>Una vez emitida la autorización por una autoridad competente, el tiempo de validez comprenderá el período en que el menor se encuentre fuera del país. Es decir, la autorización deja de ser válida automáticamente cuando el menor regrese a su país natal de residencia.</p>

                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Donde puedo obtener este permiso?</h2>
                    <p class='text-muted'>Puede contactarse con nosotros mediante un formulario en línea, una llamada o acercándose personalmente a nuestra oficina en Florida con los requisitos correspondientes y un asesor lo ayudará en el proceso de una manera correcta y segura.</p>

                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Cuánto tiempo se demora en realizar este documento?</h2>
                    <p class='text-muted'>
                        La entrega de esta carta permiso es de inmediata, claro deberá contar con los requisitos respectivos y en orden mencionados anteriormente.
                    </p>
                    <p class='text-muted'><em>Si desea mantenerse actualizado sobre nuestros servicios puede seguirnos en nuestra </em>
                        <a href='https://www.facebook.com/notariapublicalatina/'><em>FanPage de Facebook</em></a><em>.</em></p>
                    ";
                    return view('web.office.authorization', compact('data', 'posts'));
                    break;
                case 'acuerdos-en-new-jersey':
                    $data['metadescription'] .= "Realizamos Acuerdos en New Jersey de una manera ágil y rápida!";
                    $data['keywords'] = ", tramitar acuerdo new jersey, realizar acuerdo new jersey, process agreement new jersey, make deal new jersey";
                    $posts = Post::where('name', 'LIKE', '%acuerdo%')->limit(3)->get();
                    return view('web.office.acuerdos', compact('data', 'posts'));
                    break;
                case 'cartas-de-invitacion-en-new-jersey':
                    $data['metadescription'] .= "Tramitamos Cartas de Invitación en New Jersey de una manera ágil y rápida!";
                    $data['keywords'] = ", realizar carta de invitacion new jersey, tramitar carta de invitacion new jersey, make invitation letter new jersey, process letter of invitation new jersey";
                    $posts = Post::where('name', 'LIKE', '%invitacion%')->limit(3)->get();
                    return view('web.office.invitacion', compact('data', 'posts'));
                    break;
                case 'revocatorias-en-new-jersey':
                    $data['metadescription'] .= "Realizamos Revocatorias de Poderes en New Jersey de una manera ágil y rápida!";
                    $data['keywords'] = ", revocar carta poder new jersey, revocar poder general new jersey, revocar poder especial new jersey, realizar revocatoria new jersey, anular poder new jersey, anular carta poder new jersey, cancelar poder new jersey, cancelar carta poder new jersey, revoke power new jersey, override power new jersey, cancel power new jersey";
                    $posts = Post::where('name', 'LIKE', '%revocatoria%')->limit(3)->get();
                    return view('web.office.revocatorias', compact('data', 'posts'));
                    break;
                case 'contratos-en-new-jersey':
                    $data['metadescription'] .= "Realizamos todo tipo de Contratos en New Jersey de una manera ágil y rápida!";
                    $data['keywords'] = ", contrato de arrendamiento new jersey, contrato de trabajo new jersey, contrato de renta new jersey, realizar contrato de arriendo new jersey, realizar contrato compra venta new jersey, realizar contrato prestamo new jersey, realizar contrato prenupcial new jersey, realizar contrato de servicio new jersey, realizar contrato de transporte new jersey, make contract new jersey";
                    $posts = Post::where('name', 'LIKE', '%contrato%')->limit(3)->get();
                    return view('web.office.contratos', compact('data', 'posts'));
                    break;
                case 'testamentos-en-new-jersey':
                    $data['metadescription'] .= "Realizamos Testamentos en New Jersey de una manera ágil y rápida!";
                    $data['keywords'] = ", realizar testamento new jersey, hacer testamento new jersey, tramitar testamento new jersey, make a will new jersey";
                    $posts = Post::where('name', 'LIKE', '%testamento%')->limit(3)->get();
                    return view('web.office.testamentos', compact('data', 'posts'));
                    break;
                case 'motor-vehicle-commission-en-new-jersey':
                    $data['metadescription'] .= "Motor Vehicle Commission en New Jersey de una manera ágil y rápida!";
                    $data['keywords'] = ", traducir historial de manejo new jersey, obtener licencia de conducir new jersey, traducir documentos licencia de conducir";
                    return view('web.office.vehicle_comission', compact('data'));
                    break;
                case 'poder-notarial-new-jersey':
                    // $data['metadescription'] .= "Realizamos Poderes Generales y Especiales en New Jersey de una manera ágil y rápida!";
                    // $data['keywords'] .= ", realizar carta poder new jersey, realizar poder especial new jersey, realizar poder general new jersey, tramitar poder new jersey, make power of attorney new jersey, process power new jersey";
                    $data['body'] = "
                    <h2 style='font-size: 25px'>Realizamos todo tipo de Carta Poder en New Jersey</h2>
                        <p class='text-muted'>Un poder consiste de un documento legal el cual sirve para conceder, ya sea total o parcial, cierta autoridad sobre sus activos a otra persona
                            en el caso que usted no pudiera estar presente. Este le permite gestionar sus trámites a distancia siendo una solución para gestionar sus bienes, trámites
                            bancarios y otras tareas importantes.</p>
                        <p class='text-muted'>La persona que esta concediendo este poder se llama <b>poderdante o mandante</b> y la que recibe el mismo se la conoce como <b>apoderado o mandatario</b>.
                            Lo recomendable es asignar una persona de confianza, de preferencia un familiar, para que realice las tareas encargadas que se especifican en la carta,
                            asi previene futuros inconvenientes que podrían presentarse.</p>

                        <h2 style='font-size: 25px'>¿Para que sirve un poder?</h2>
                        <p class='text-muted'>Un poder sirve para administrar diferentes trámites como la compra y venta de propiedades, así como conseguir y administrar escrituras de 
                        las mismas, gestionar cuentas bancarias, retiro de dinero, entro otros.
                        </p>
                        <p class='text-muted'>El documento con la apostilla tiene validez legal en cualquiera de los países miembros del Convenio, el cual consiste en un sello
                            que la autoridad encargada estampa en seco y se agrega como nota al reverso o como hoja adicional de los documentos que se quisiera
                            autenticar. Es por eso que los únicos autorizados para validar esta apostilla son los notarios debidamente acreditados.</p>

                        <h2 style='font-size: 25px'>¿Cuantos tipos de Poderes existen?</h2>
                        <p class='text-muted'>
                            El poderdante puede escoger entre dos tipos de poderes que son los siguientes:
                        </p>
                        <ul class='text-muted'>
                            <li><b>Poder Especial:</b> Este tipo de poder es un poco más restrictivo ya que otorga control limitado a una actividad especifica sobre sus activos o bienes a otra persona en el caso de que usted no pudiera estar presente.</li>
                            <li><b>Poder General: </b> Este poder es más ilimitado debido a que otorga un control más amplio y con más atribuciones sobre sus activos a otra persona en el caso de que usted no pudiera estar presente.</li>
                        </ul>

                        <h2 style='font-size: 25px'>¿En que documentos se requiere la apostilla?</h2>
                        <ul class='text-muted'>
                            <li>Compra y Venta</li>
                            <li>Administración de propiedades.</li>
                            <li>Administrar sus cuentas y transacciones bancarias.</li>
                            <li>Inversiones de dinero.</li>
                            <li>Hacer reclamos legales</li>
                            <li>Procedimientos legales en su nombre.</li>
                        </ul>

                        <h2 style='font-size: 25px'>¿Que requisitos se necesitan para realizar el trámite?</h2>
                        <p class='text-muted'>Para realizar el trámite de una manera correcta, es necesario contar con lo siguiente:</p>
                        <ul class='text-muted'>

                            <li>Identificación válida del poderdante.</li>
                            <li>Nombres y apellidos del apoderado.</li>
                            <li>Número de cédula del apoderado.</li>
                        </ul>

                    <h2 style='font-size: 25px'>¿Cuanto tiempo es válido un poder?</h2>
                        <p class='text-muted'>Una carta poder tiene validez por el tiempo  que el poderdante establezca a la hora de realizar el poder con el notario,
                            por fallecimiento del mismo o hasta  que por voluntad propia solicite una revocatoria.</p>
                        <p class='text-muted'>El poder puede utilizarse aun si el poderdante no se encuentre con todas sus facultades físicas o mentales.</p>

                    <h2 style='font-size: 25px'>¿En donde puedo solicitar un poder?</h2>
                        <p class='text-muted'>Puede completar nuestro formulario en línea o acercarse a nuestra oficina y solicitar su carta poder, un asesor lo guiará para que usted realice el trámite de manera correcta y segura.</p>


                    <h2 style='font-size: 25px'>¿Cuanto tiempo tarda en hacer un poder?</h2>
                        <ul class='text-muted'>
                            <li>El tiempo de entrega dentro de los Estados Unidos es de 24 horas.</li>
                            <li>El tiempo de entrega fuera de los Estados Unidos es de 3 días laborables.</li>
                            <li>El documento digital estará disponible en 24 horas.</li>
                            <li class='text-danger'>Por motivos de codiv-19 puede existir retraso en los tiempos de entrega.</li>
                        </ul>
                        <p class='text-muted'><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
                        <a href='https://www.facebook.com/notariapublicalatina/'><em>FanPage de Facebook</em></a><em>.</em></p>
                    ";
                    $posts = Post::where('name', 'LIKE', '%poder')->limit(3)->get();
                    return view('web.office.poderes', compact('data', 'posts'));
                    break;
                case 'traducir-documentos-new-jersey':
                    $data['metadescription'] .= "Traducimos todo tipo de Documentos en New Jersey de una manera ágil y rápida! ";
                    $data['keywords'] = ", traducir documentos new jersey, traducir certificado de nacimiento new jersey, traducir diplomas new jersey, traducir certificado de matrimonio new jersey, traducir certificado de divorcio new jersey, traducir certificado de defuncion new jersey, traducir documentos medicos new jersey, traducir certificados estudiantiles new jersey, translate documents new jersey";
                    $posts = Post::where('name', 'LIKE', '%traduccion%')->limit(3)->get();
                    return view('web.office.traducciones', compact('data', 'posts'));
                    break;
                case 'apostillar-documentos-new-jersey':
                    $data['body'] = "
                    <h2 style='font-size: 25px;'>Realizamos la Apostilla de sus documentos requeridos por organismos de otro país mediante una Apostilla.</h2>
                    <p class='text-muted'>La Apostilla es la manera más fácil de autentificar documentos públicos expedidos en otro país. Mediante esta es posible gestionar
                        trámites internacionales, lo que la hacen un documento indispensable.
                    </p>
                    <p class='text-muted'>Acorde al Convenio de la Haya, algunos de los países latinos miembros del convenio donde es válida la apostilla son Argentina, Bolivia,
                        Venezuela, Colombia, Chile, Costa Rica, Ecuador, Estados Unidos, El Salvador, Guatemala, Honduras, Perú, México, entre otros.</p>
        
                    <h2 style='font-size: 25px'>¿Cuál es el objetivo de apostillar un documento?</h2>
                    <p class='text-muted'>El documento que porte la apostilla respalda la veracidad del mismo, lo cual permite ser válida y ejercer cierta autoridad acorde a lo que esta descrito. 
                        En términos generales, consiste de un sello que la autoridad competente estampa en seco y se agrega como nota al reverso del escrito o como una hoja adicional. 
                        Los únicos autorizados para constatar la veracidad de esta apostilla son los notarios debidamente acreditados.</p>
        
                    <h2 style='font-size: 25px'>¿Qué documentos necesitan de una apostilla?</h2>
                    <ul class='text-muted'>
                        <li>Diplomas (<a href='https://notarialatina.com/newjersey/apostillar-diploma-de-escuela-secundaria-new-jersey'>Escuela Secundaria</a> o <a href='https://notarialatina.com/newjersey/apostillar-diploma-universitario-new-jersey'>Universitarios</a>)</li>
                        <li><a href='https://notarialatina.com/newjersey/apostillar-certificado-de-nacimiento-new-jersey'>Partida de nacimiento.</a></li>
                        <li><a href='https://notarialatina.com/newjersey/apostillar-certificado-de-matrimonio-new-jersey'>Certificados de matrimonio.</a></li>
                        <li><a href='https://notarialatina.com/newjersey/apostillar-certificado-de-defuncion-new-jersey'>Acta de defunción.</a></li>
                        <li><a href='https://notarialatina.com/newjersey/apostillar-certificado-de-divorcio-new-jersey'>Acta de divorcio.</a></li>
                        <li><a href='https://notarialatina.com/newjersey/apostillar-poder-notarial-personal-new-jersey'>Poderes Generales</a></li>
                        <li><a href='https://notarialatina.com/newjersey/apostillar-poder-notarial-personal-new-jersey'>Poderes Especiales</a></li>
                        <li>Contratos.</li>
                        <li>Cartas de invitación.</li>
                        <li><a href='https://notarialatina.com/newjersey/apostillar-escrituras-testamentos-new-jersey'>Testamentos.</a></li>
                        <li><a href='https://notarialatina.com/newjersey/apostillar-declaraciones-juradas-de-estado-unico-new-jersey'>Declaraciones juradas.</a></li>
                        <li>Estados de cuenta.</li>
                        <li><a href='https://notarialatina.com/newjersey/apostillar-facturas-new-jersey'>Facturas.</a></li>
                        <li>Documentos corporativos.</li>
                    </ul>
        
                    <h2 style='font-size: 25px'>¿Qué necesito para apostillar de un documento?</h2>
                    <p class='text-muted'>El requisito singular que necesita es poseer el documento original que va a ser apostillado. Por ello se trata de un trámite sencillo</p>
            
                    <h2 style='font-size: 25px'>¿En donde puedo obtener mi documento apostillado?</h2>
                    <p class='text-muted'>Puede contactarnos completando el <a href='https://notarialatina.com/contactenos'>siguiente formulario</a> o dirigirse personalmente a nuestra oficina con el documento que desea
                        apostillar. Un de nuestros asesores lo guiará en el proceso de una manera eficaz y segura</p>
                    <h2 style='font-size: 25px'>¿En que tiempo se realiza una apostilla?</h2>
                    <ul class='text-muted'>
                        <li>El tiempo de entrega dentro de los Estados Unidos es de 24 horas.</li>
                        <li>El tiempo de entrega fuera de los Estados Unidos es de 3 días laborables.</li>
                        <li>El documento digital estará disponible en 24 horas.</li>
                        <li class='text-danger'>Por motivos de codiv-19 puede existir retraso en los tiempos de entrega.</li>
                    </ul>
                    <p class='text-muted'><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
                        <a href='https://www.facebook.com/notariapublicalatina/'><em>FanPage de Facebook</em></a><em>.</em></p>
                    ";
                    $posts = Post::where('name', 'LIKE', '%apostilla%')->limit(3)->get();
                    return view('web.office.apostillas', compact('data', 'posts'));
                    break;
                case 'affidavit-support-en-new-jersey':
                    $data['metadescription'] .= "Realizamos Declaraciones Juradas (Affidavit) en New Jersey de una manera ágil y rápida!";
                    $data['keywords'] = ", declaracion jurada new jersey, affidavit new jersey, realizar declaracion jurada new jersey, tramitar declaracion jurada new jersey, make an affidavit new jersey, process affidavit new jersey";
                    $posts = Post::where('name', 'LIKE', '%affidavit%')->limit(3)->get();
                    return view('web.office.affidavit', compact('data', 'posts'));
                    break;
                case 'apostillar-certificado-de-nacimiento-new-jersey':
                    $data['description'] = 'Certificados de Nacimiento';
                    $data['metadescription'] = "Consulte por nuestro servicio de apostilla en certificados de nacimiento en New Jersey 🗽 Lo asesoramos de una manera segura. Solicítelo ahora! ✅";
                    $data['keywords'] = "certificados en estados unidos, certificado de nacimiento, acta de nacimiento, que es un certificado de nacimiento, apostillar certificado de nacimiento en new jersey, apostillar acta de nacimiento en new jersey, apostillar partida de nacimiento en new jersey, donde apostillar certificado de nacimiento en new jersey, donde puedo realizar un certificado de nacimiento en new jersey, como apostillar un certificado de nacimiento en new jersey, apostillar certificado de nacimiento nj, apostillar near me, apostilla un documento, apostilla de acta de nacimiento, apostillar, apostillar un documento, que apostillar un documento, apostillar significado, apostillar que es, apostillar que significa, apostillar near me, apostilla un documento, apostillar un documento, apostilla de acta de nacimiento, donde se apostilla un documento en new jersey, donde puedo apostillar un documento en new jersey, donde puedo apostillar un certificado de nacimiento en new jersey, donde puedo apostillar partida de nacimiento en new jersey, donde puedo legalizar y apostillar partida de nacimiento";
                    $data['content'] = ['¿Qué es un certificado de nacimiento?','¿Qué información contiene el certificado de nacimiento?','¿Para qué sirve la partida de nacimiento?','¿Donde puedo obtener un certificado de nacimiento?'];
                    $data['body'] = "<ul><li><h2>¿Qué es un certificado de nacimiento?</h2></li></ul>
                    <p>El certificado o acta de nacimiento es un documento emitido por el Registro Civil o Consulado respectivo, en el cual se da prueba del lugar, fecha
                        y hora del nacimiento, al igual que toda la información correspondiente como nombres y apellidos, sexo, etc.
                    </p>
                    <ul><li><h2>¿Qué información contiene el certificado de nacimiento?</h2></li></ul>
                    <p>En sí, el certificado de nacimiento contiene información básica del nacimiento y su inscripción. Entre estos consta datos como 
                        los nombres y apellidos del titular, lugar, fecha y hora del nacimiento, al igual que el nombre de los progenitores. 
                    </p>
                    <ul><li><h2>¿Para qué sirve la partida de nacimiento?</h2></li></ul>
                    <p>El acta o certificado de nacimiento es un documento esencial para llevar a cabo distintos trámites.</p>
                    <p>Entre estos pueden perfilar los siguientes:</p>
                        <p>✔ Obtener o renovar el documento de Identidad o Pasaporte</p>
                        <p>✔ Para contraer matrimonio, trabajar fuera del país u obtener algun beneficio social</p>
                        <p>✔ Solicitar permiso de paternidad</p>
                    <ul><li><h2>¿Donde puedo obtener un certificado de nacimiento?</h2></li></ul>
                    <p>Puede <a href='#card'>completar el siguiente formulario</a> o dirigirse personalmente a nuestras oficinas en ".$data['office']." donde un asesor lo guiará en el proceso de una manera correcta y segura.</p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-reporte-consular-new-jersey':
                    $data['description'] = 'Reporte Consular (CRBA)';
                    $data['metadescription'] = "Consulte por nuestros servicios de apostilla en reporte consular (CRBA) en New Jersey 🗽 Lo asesoramos de una manera segura. Solicítelo aquí! ✅";
                    $data['keywords'] = "reporte consular, reporte consular new jersey, crba estados unidos, apostillar crba new jersey, apostillar reporte consular en new jersey, donde puedo apostillar un reporte consular en new jersey, donde puedo apostillar un reporte consular de nacimiento en new jersey, donde solicitar el reporte consular en new jersey";
                    $data['body'] = "<ul><li><h2>¿Qué es un Reporte Consular de Nacimiento en el Extranjero (CRBA)?</h2></li></ul>
                    <p>
                        Un Reporte Consular de Nacimiento en el Extranjero o CRBA, por sus siglas en inglés, es evidencia de ciudadanía estadounidense, emitida a una persona nacida en el extranjero de padre(s) estadounidenses que cumplan con los requisitos para la transmisión de la ciudadanía bajo La ley de Inmigración y Nacionalidad.
                    </p>
                    <ul><li><h2>¿Para qué sirve el Reporte Consular de Nacimiento en el Extranjero (CRBA)?</h2></li></ul>
                    <p>
                        Es la manera en la cual un ciudadano estadounidense puede transmitir su ciudadanía a su hijo que ha nacido fuera de los Estados Unidos.  
                    </p>
                    <ul><li><h2>¿Cuáles son los requisitos para obtener el Reporte Consular de Nacimiento en el Extranjero (CRBA)?</h2></li></ul>
                    <p>
                        El juntar los documentos requeridos para aplicar a un Reporte Consular de Nacimiento en el Extranjero (CRBA) puede ser difícil pero si se realiza correctamente le puede ahorrar varias visitas a la embajada o consulado, evitar que la que su aplicación sea puesta en espera o sea rechazada.                    
                    </p>
                    <p>Las condiciones para aplicar para este proceso son:</p>
                    <ol>
                        <p><li>Al menos uno de los padres debe ser ciudadano estadounidense al nacer su hijo.</li></p>
                        <p><li>El padre que transmite la ciudadanía debe probar una estancia de tiempo mínima en el territorio de los Estados Unidos (presencia física) previo al nacimiento del menor. En general el periodo de residencia a demostrar es de 5 años.</li></p>
                        <p><li>Debe existir una relación biológica (consanguínea) o legal entre el niño y el padre que transmite la ciudadanía.</li></p>
                    </ol>
                    <ul><li><h2>¿Dónde puedo obtener un Reporte Consular de Nacimiento en el Extranjero (CRBA)?</h2></li></ul>
                    <p>Puede <a href='#card'>completar el siguiente formulario</a> o dirigirse personalmente a nuestras oficinas en ".$data['office']." donde un asesor lo guiará en el proceso de una manera correcta y segura.</p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-matrimonio-new-jersey':
                    $data['description'] = 'Certificados de Matrimonio';
                    $data['metadescription'] = "Notarizamos y Apostillamos certificados de matrimonio en New Jersey 🗽 de una manera ágil y rápida. ¡Contáctenos! Lo ayudamos con el proceso ✅";
                    $data['keywords'] = "que es un certificado de matrimonio, requisitos para realizar un certificado de matrimonio en new jersey, donde puedo solicitar un certificado de matrimonio, apostillar certificado de matrimonio en new jersey, apostillar acta de matrimonio en new jersey, donde puedo apostillar un certificado de matrimonio en new jersey, donde apostillar certificado de matrimonio en new jersey";
                    $data['content'] = ['¿Qué es un certificado de matrimonio?','¿Para qué sirve el certificado de matrimonio?','¿Cómo registrar un matrimonio en el extranjero?','¿Qué requisitos se necesita para un certificado de matrimonio?','¿Donde puedo obtener un certificado de matrimonio?'];
                    $data['body'] = "<ul><li><h2>¿Qué es un certificado de matrimonio?</h2></li></ul>
                    <p>El acta o certificado de matrimonio es un documento que se encarga afirmar y legalizar la unión matrimonial entre dos personas. Dicho documento 
                        contiene información importante como el lugar, fecha y hora en el cual se realizó dicho proceso.
                    </p>
                    <ul><li><h2>¿Para qué sirve el certificado de matrimonio?</h2></li></ul>
                    En pocas palabras, el certificado o acta de matrimonio sirve para preservar y garantizar la unión matrimonial. Además de esto, este documento
                    permite verificar que contrajo matrimonio, lo cual lo ayudará para realizar ciertos trámites.
                    <ul><li><h2>¿Cómo registrar un matrimonio en el extranjero?</h2></li></ul> 
                    <p>Si un acto matrimonial se lleva a cabo en el exterior, deberá inscribir y certificar en el Consulado respectivo, el cual a su vez se comunicará
                        con el registro civil del país para proceder con el trámite.
                    </p>
                    <ul><li><h2>¿Qué requisitos se necesita para un certificado de matrimonio?</h2></li></ul>
                    <p>Para dar paso con el proceso de obtención del certificado de matrimonio, necesita tener presente lo siguiente:</p>
                    <ul>
                        <li>Nombres completos de las personas a contraer matrimonio</li>
                        <li>Fecha que se llevo a cabo el matrimonio</li>
                        <li>Lugar donde se celebró el matrimonio</li>
                        <li>Parentesco de quien lo solicita</li>
                        <li>Nombre completo del solicitante</li>
                    </ul>
                    <ul><li><h2>¿Donde puedo obtener un certificado de matrimonio?</h2></li></ul>
                    <p>
                        Si desea solicitar o apostillar un certificado de matrimonio puede realizarlo completando el <a href='#card'>siguiente formulario</a> con su información o acercarse a nuestras oficinas en ".$data['office']." donde un asesor se contactará para ayudarlo
                        en el proceso de una manera correcta y segura.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-defuncion-new-jersey':
                    $data['description'] = 'Certificados de Defunción';
                    $data['metadescription'] = "Notarizamos y Apostillamos certificados de defunción en New Jersey 🗽 de una manera segura y rápida. ¡Contáctenos! Y lo asesoramos en el trámite ✅";
                    $data['keywords'] = "que es un certificado de defuncion, para que sirve un certificado de defuncion, donde puedo solicitar un certificado de defuncion en new jersey, apostillar certificado de defuncion en new jersey, apostillar acta de defuncion en new jersey, como apostillar un certificado de defuncion en new jersey, certificado de defuncion new jersey apostillar, como solicitar certificado de defuncion en new jersey";
                    $data['content'] = ['¿Qué es un certificado de defunción?','¿Para que me sirve un certificado de defunción?','¿Quién puede tramitar el certificado de defunción?','¿Ante que autoridad puedo solicitar un certificado de defunción?'];
                    $data['body'] = "<ul><li><h2>¿Qué es un certificado de defunción?</h2></li></ul>
                    <p>Un acta, partida o certificado de defunción es un documento mediante el cual termina cualquier proceso administrativo que la persona haya tenido en vida.</p>
                    <ul><li><h2>¿Para que me sirve un certificado de defunción?</h2></li></ul>
                    <p>Además de que un certificado de defunción permite a los familiares de la persona difunta llevar ciertos trámites, es el único medio de suspender completamente sus obligaciones frente al Estado y ante cualquier otra
                        institución con la que hubiera tenido algún compromiso.
                    </p>
                    <ul><li><h2>¿Quién puede tramitar el certificado de defunción?</h2></li></ul>
                    <p>La primera persona que tiene derecho ha tramitar este certificado de defunción es la pareja o cónyuge del difunto. Ante cualquier circunstancia
                        de que esta persona no pueda hacerlo, lo realizarán los familiares más cercanos de la persona que falleció.
                    </p>
                    <ul><li><h2 id='title'>¿Ante que autoridad puedo solicitar un certificado de defunción?</h2></li></ul>
                    <p>Si desea tramitar o apostillar un acta o certificado de defunción puede completar el siguiente formulario con su información o acercarse a nuestras oficinas en ".$data['office']." donde un asesor se comunicará con usted para guiarlo en el trámite de una manera correcta y segura.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-divorcio-new-jersey':
                    $data['description'] = 'Certificados de Divorcio';
                    $data['metadescription'] = "El Certificado de Divorcio es un escrito necesario para diversos trámites notariales ⚖ Consulte aquí para más información sobre nuestros servicios ✅";
                    $data['keywords'] = "que es un certificado de divorcio, requisitos para un certificado de divorcio new jersey, solicitar certificado de divorcio en new jersey, apostillar documentos en new jersey, apostillar certificado de divorcio en new jersey, apostillar acta de divorcio en new jersey, donde apostillar certificado de divorcio en new jersey, donde puedo apostillar un certificado de divorcio en new jersey, donde puedo sacar el certificado de divorcio en new jersey";
                    $data['content'] = ['¿Qué es un acta o certificado de divorcio?','¿Para qué se utiliza un certificado de divorcio?','¿Cuáles son los requisitos necesarios para un certificado de divorcio?','¿Donde puedo obtener el certificado de divorcio?'];
                    $data['body'] = "<ul><li><h2>¿Qué es un acta o certificado de divorcio?</h2></li></ul>
                    <p>El certificado de divorcio es un escrito mediante el cual constata legalmente la separación de una pareja que estaba unida en matrimonio</p>
                    <ul><li><h2>¿Para qué se utiliza un certificado de divorcio?</h2></li></ul>
                    <p>Dicho documento es necesario para realizar distintos trámites dependiendo del país en el que se encuentre. Por ejemplo se solicita este documento cuando
                        una persona contrae nuevamente matrimonio.
                    </p>
                    <p>En Estados Unidos, este certificado es obligado para aquellos migrantes que soliciten el <i>Green Card</i> (Permiso de residencia permanente), para realizar cualquier tipo de trámite, renovar visa o pasaporte, etc.</p>
                    <ul><li><h2>¿Cuáles son los requisitos necesarios para un certificado de divorcio?</h2></li></ul>
                    <p>Entre los requerimientos que se solicitan para obtener dicho documento se encuentran los siguientes:</p>
                    <ol>
                        <li>Copia de certificado de nacimiento del esposa y esposa</li>
                        <li>En caso de tener hijos, copia del certificado de nacimiento de cada uno de ellos</li>
                        <li>Copia del certificado de matrimonio</li>
                        <li>Copia del documento de identidad</li>
                        <li>Solicitud y acuerdo de divorcio realizado por el abogado</li>
                        <li>Poder que se concede al abogado</li>
                    </ol>
                    <ul><li><h2>¿Donde puedo obtener el certificado de divorcio?</h2></li></ul>
                    <p>Si desea realizar dicho trámite puede completar el siguiente formulario con su información y un asesor se contactará con usted. O puede visitar
                        nuestras oficinas en ".$data['office']." donde se le brindará la ayuda necesaria con el trámite en gestión.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-naturalizacion-new-jersey':
                    $data['description'] = 'Certificados de Naturalización';
                    $data['metadescription'] = "El Certificado de Naturalización es un escrito que acredita la ciudadania a una persona extranjera 👨‍⚖️ Consulte aquí cómo realizar el trámite. ¡Vamos allá! ✅";
                    $data['keywords'] = "que es un certificado de naturalizacion, requisitos para sacar el certificado de naturalizacion en new jersey, apostillar certificado de naturalizacion en new jersey, apostillar acta de naturalizacion en new jersey, donde apostillar certificado de naturalizacion en new jersey, como sacar el certificado de naturalizacion en new jersey, como solicitar certificado de naturalizacion en new jersey, certificado de naturalizacion americana";
                    $data['content'] = ['¿Qué es un certificado de naturalización?','¿Para qué sirve un certificado de naturalización?','¿Cuáles son los requisitos para obtener el certificado de naturalización?','¿Donde puedo hacer el trámite para el certificado de naturalización?'];
                    $data['body'] = "<ul><li><h2>¿Qué es un certificado de naturalización?</h2></li></ul>
                    <p>El certificado de naturalización es un documento el cual acredita que una persona extranjera se conveirte en ciudadano del país en que reside.</p>
                    <ul><li><h2>¿Para qué sirve un certificado de naturalización?</h2></li></ul>
                    <p>Lo que hace el acta o certificado de naturalización es otorgarle a los ciudadanos naturalizados algunos privilegios y beneficios en el país que se encuentra, 
                        entre los cuales se encuentra la capacidad de votar. Sobre todo es un documento el cual le permite demostrar que es un ciudadano más de dicho país
                    </p>
                    <ul><li><h2>¿Cuáles son los requisitos para obtener el certificado de naturalización?</h2></li></ul>
                    <p>Algunos de los requerimientos para obtener su certificado de naturalización son los siguientes:</p>
                    <ol>
                        <li>Tener al menos 18 años</li>
                        <li>Ser residente al menos 5 años</li>
                        <li>Poder leer, escribir y hablar inglés básico</li>
                        <li>Comprender la historia básica del gobierno de los Estados Unidos</li>
                        <li>Ser una persona de buen carácter moral</li>
                    </ol>
                    <ul><li><h2>¿Donde puedo hacer el trámite para el certificado de naturalización?</h2></li></ul>
                    <p>Si desea empezar el proceso para adquirir el acta de naturalización puede completar el siguiente formulario con su información
                        o acercarse a nuestras oficinas en ".$data['office']." donde un asesor lo orientará en la gestión de dicho documento de una manera ágil y segura.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-expediente-de-adopcion-new-jersey':
                    $data['description'] = 'Expediente de Adopción';
                    $data['metadescription'] = "Notarizamos y Apostillamos todo tipo de documentos como el Expediente de Adopción en New Jersey ⚖ de una manera segura. ¡Contáctenos ahora! ✅";
                    $data['keywords'] = "apostillar expediente de adopcion en new jersey, apostillar expediente de adopcion cerca de mi, donde apostillar expediente de adopcion en new jersey, donde puedo apostillar expediente de adopcion en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-copia-de-pasaporte-new-jersey':
                    $data['description'] = 'Copia de pasaporte';
                    $data['metadescription'] = "⚖ Notarizamos y Apostillamos todo tipo de documentos como Copia de Pasaporte en New Jersey de una manerá ágil y segura. ¡Solicite su trámite! ✅";
                    $data['keywords'] = "apostillar copia de pasaporte en new jersey, apostillar copia de pasaporte cerca de mi, donde apostillar copia de pasaporte en new jersey, como sacar copia de pasaporte en new jersey, donde puedo apostillar copia de pasaporte en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-copia-de-licencia-de-conducir-new-jersey':
                    $data['description'] = 'Copia de Licencia de Conducir';
                    $data['metadescription'] = "Apostillamos todo tipo de documentos como Copia de Licencia de Conducir en New Jersey 🗽 de una forma rápida y segura. ¡Contáctenos! ✅";
                    $data['keywords'] = "apostillar copia licencia de conducir en new jersey, apostillar copia de licencia de conducir cerca de mi, donde apostillar copia de licencia de conducir en new jersey, donde puedo apostillar copia de licencia de conducir en new jersey, donde puedo solicitar una copia de licencia de conducir en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-escrituras-testamentos-new-jersey':
                    $data['description'] = 'Escrituras y Testamentos';
                    $data['metadescription'] = "👨‍⚖️ Notarizamos y Apostillamos todo tipo de documentos como Escrituras y Testamentos en New Jersey de una forma segura. ¡Solicitelo aquí! ✅";
                    $data['keywords'] = "apostillar escrituras en new jersey, apostillar testamento en new jersey, donde apostillar escrituras en new jersey, donde apostillar testamento en new jersey, donde puedo apostillar una escritura en new jersey, donde puedo apostillar un testamento en new jersey, apostillar escritura notarial en new jersey, apostillar escritura publica en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-declaraciones-juradas-de-estado-unico-new-jersey':
                    $data['description'] = 'Declaraciones Juradas';
                    $data['metadescription'] = "⚖ Notarizamos y Apostillamos Declaraciones Juradas (Affidávit) en New Jersey de una manera rápida y segura. ¡Agende su cita ahora! ✅";
                    $data['keywords'] = "apostillar declaracion jurada en new jersey, apostillar declaracion juramentada en new jersey, apostillar affidavit support en new jersey, apostillar declaracion jurada cerca de mi, donde apostillar una declaracion jurada en new jersey, donde apostillar una declaracion juramentada en new jersey, donde apostillar affidavit en new jersey, apostillar declaracion juramentada en new jersey estados unidos";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-titulo-de-automovil-new-jersey':
                    $data['description'] = 'Título de coche/automóvil';
                    $data['metadescription'] = "👨‍⚖️ Notarizamos y Apostillamos Título de Automóvil en New Jersey de una forma ágil y segura. Consulte por nuestros servicios y lo ayudamos en el trámite ✅";
                    $data['keywords'] = "apostillar documentos en new jersey, apostillar titulo de automovil en new jersey, apostillar titulo de coche en new jersey, donde apostillar titulo de automovil en new jersey, donde apostillar titulo de coche en new jersey, apostillar titulo de auto en new jersey, apostillar titulo de vehiculo en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-autorizacion-de-viaje-new-jersey':
                    $data['description'] = 'Autorización de Viaje';
                    $data['metadescription'] = "⚖ Notarizamos y Apostillamos todo tipo de documentos como Autorización de Viaje en New Jersey de una manera segura. Consulte por nuestros servicios ✅";
                    $data['keywords'] = "que es una autorizacion de viaje, requisitos para autorizacion de viaje en new jersey, apostillar autorizacion de viaje en new jersey, apostillar autorizacion de viaje cerca de mi, donde apostillar una autorizacion de viaje en new jersey, donde puedo apostillar una autorizacion de viaje en new jersey, apostillar autorizacion de viaje para menor de edad en new jersey, donde puedo hacer una autorizacion de viaje para niños en new jersey, carta de autorizacion de viaje en new jersey";
                    $data['content'] = ['¿Qué es una autorización de viaje?','¿En qué situaciones se pide una autorización de viaje?','¿Qué requisitos necesito para la autorización de un viaje?','¿Ante que autoridad puedo solicitar una autorización de viaje?'];
                    $data['body'] = "<ul><li><h2 id='title'>¿Qué es una autorización de viaje?</h2></li></ul>
                    <p>Una autorización de viaje es un escrito en el cual uno o ambos padres autorizan el viaje, dentro o fuera del país, de su hijo o hija menor de edad, ya sea con los mismos, algún familiar o solos.</p>
                    <ul><li><h2 id='title'>¿En qué situaciones piden la autorización de viaje?</h2></li></ul>
                    <p>La autorización de viaje se puede solicitar cuando:</p>
                    <ol>
                        <li>El menor de edad viaja dentro o fuera del país sin ninguno de sus padres</li>
                        <li>El menor de edad viaje con terceras personas, las cuales pueden ser familiares</li>
                    </ol>
                    <ul><li><h2 id='title'>¿Qué requisitos necesito para la autorización de viaje?</h2></li></ul>
                    <p>Los requerimientos para solicitar una autorización de viaje son los siguientes:</p>
                    <ol>
                        <li>Identificación de uno o ambos padres o de su representante legal</li>
                        <li>Nombres y apellidos del menor de edad</li>
                        <li>Fecha de nacimiento del menor</li>
                        <li>En caso de que viaje con una tercera persona, nombres y apellidos de la misma</li>
                        <li>Información del vuelo</li>
                    </ol>
                    <ul><li><h2 id='title'>¿Ante que autoridad puedo solicitar una autorización de viaje?</h2></li></ul>
                    <p>Las autorizaciones de viaje se pueden tramitar ante cualquier Notaría Pública en el territorio en el que se encuentre. Si necesita solicitar o apostillar
                        una autorización de viaje acérquese a nuestra oficina en ". $data['office']." con los requisitos necesarios o <b>complete el siguiente formulario</b> y una asesor lo contáctara
                        para guiarlo de una manera correcta y segura.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-poder-notarial-personal-new-jersey':
                    $data['description'] = 'Poder Notarial Personal';
                    $data['metadescription'] = "👨‍⚖️ Notarizamos y Apostillamos todo tipo de documentos como Poder Notarial Personal en New Jersey de una forma segura. ¡Contáctenos ahora! ✅";
                    $data['keywords'] = "apostillar documentos en new jersey, apostillar poder notarial en new jersey, apostillar carta poder en new jersey, apostillar poder notarial cerca de mi, donde apostillar carta poder en new jersey, donde apostillar poder notarial en new jersey, donde puedo apostillar un poder en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-registro-de-policia-estatal-new-jersey':
                    $data['description'] = 'Registro de la Policía Estatal';
                    $data['metadescription'] = "Apostillamos todo tipo de documentos como Registro de la Policía Estatal en New Jersey 🗽 de una manera ágil y segura. ¡Contáctenos ahora! ✅";
                    $data['keywords'] = "apostillar documentos en new jersey, apostillar registro policial en new jersey, apostillar registro de la policia en new jersey, apostillar registro policial cerca de mi, donde apostillar registro policial en new jersey, donde puedo apostillar un registro policial en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-registro-de-antecedentes-fbi-new-jersey':
                    $data['description'] = 'Registros de antecedentes del FBI';
                    $data['metadescription'] = "Apostillamos Registro de Antecedentes del FBI en New Jersey 🗽 de una forma rápida y segura. Lo asesoramos con personal calificado. ¡Agende una cita! ✅";
                    $data['keywords'] = "notaria latina en elizabeth new jersey, apostillar documentos en new jersey, apostillar antecedentes del fbi en new jersey, apostillar registro de antecentes del fbi en new jersey, apostillar registros de antecedentes del fbi cerca de mi, donde apostillar antecedentes del fbi en new jersey, donde apostillar registro de antecedentes del fbi en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-diploma-universitario-new-jersey':
                    $data['description'] = 'Diploma Universitario';
                    $data['metadescription'] = "Apostillamos Diplomas Universitarios en New Jersey 🗽 de una forma segura. Contáctese con nosotros y lo asesoramos en el trámite. ¡Agende una cita! ✅";
                    $data['keywords'] = "notaria latina en elizabeth new jersey, notaria en elizabeth nj, apostillar documentos en new jersey, apostillar diploma universitario en new jersey, apostillar diploma universitario cerca de mi, apostillar titulo universitario en new jersey, donde apostillar diploma universitario en new jersey, donde puedo apostillar un titulo universitario en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-transcripcion-universitaria-new-jersey':
                    $data['description'] = 'Transcripción Universitaria';
                    $data['metadescription'] = "Apostillamos Transcripción Universitaria en New Jersey 🗽 de una manera rápida y segura. Contamos con personal calificado. ¡Contáctenos ahora! ✅";
                    $data['keywords'] = "notaria latina en elizabeth new jersey, notaria en elizabeth nj, apostillar documentos en new jersey, apostillar transcripcion universitaria en new jersey, apostillar transcripcion universitaria cerca de mi, apostillar transcripcion de titulo universitario en new jersey, donde apostillar transcripcion universitaria en new jersey, donde apostillar transcripcion de titulo universitario en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-diploma-de-escuela-secundaria-new-jersey':
                    $data['description'] = 'Diploma de Escuela Secundaria';
                    $data['metadescription'] = "Apostillamos Diploma de Escuela Secundaria en New Jersey 🗽 de una forma ágil y segura. Lo asesoramos con el trámite. ¡Contáctenos! ✅";
                    $data['keywords'] = "notaria latina en elizabeth new jersey, notaria en elizabeth nj, apostillar documentos en new jersey, apostillar diploma secundario en new jersey, apostillar diploma de escuela secundaria en new jersey, apostillar diploma escuela secundaria cerca de mi, donde apostillar diploma de secundaria en new jersey, donde apostillar diploma de escuela secundaria en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-transcripcion-de-escuela-secundaria-new-jersey':
                    $data['description'] = 'Transcripción de Secundaria';
                    $data['metadescription'] = "Apostillamos Transcripción de Escuela Secundaria en New Jersey de una manera rápida y segura. Agende su cita aquí para ayudarlo con el trámite! ✅";
                    $data['keywords'] = "notaria latina en elizabeth new jersey, notaria en elizabeth nj, apostillar documentos en new jersey, apostillar transcripcion de secundaria en new jersey, apostillar transcripcion de escuela secundaria en new jersey, donde apostillar transcripcion de escuela secundaria en new jersey, donde puedo apostillar una transcripcion de secundaria en new jersey, apostillar transcripcion de secundaria cerca de mi";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-incorporacion-new-jersey':
                    $data['description'] = 'Certificado de Incorporación';
                    $data['metadescription'] = "Apostillamos todo tipo de documentos como Certificado de Incorporación en New Jersey 🗽 de una forma segura. Consulte por nuestros servicios aquí! ✅";
                    $data['keywords'] = "notaria latina en elizabeth new jersey, notaria en elizabeth nj, apostillar documentos en new jersey, apostillar certificado de incorporacion en new jersey, apostillar acta de incorporacion en new jersey, apostillar certificado de incorporacion cerca de mi, donde apostillar certificado de incorporacion en new jersey, donde puedo apostillar un certificado de incorporacion en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-buena-reputacion-new-jersey':
                    $data['description'] = 'Certificado de Buena Reputación';
                    $data['metadescription'] = "Apostillamos Certificado de Buena Reputación en New Jersey 🗽 de una manera segura. Envíe su documento por nuestro sitio web o contáctenos ✅";
                    $data['keywords'] = "notaria latina en elizabeth new jersey, notaria en elizabeth nj, apostillar documentos en new jersey, apostillar certificado de buena reputacion en new jersey, apostillar certificado de buena reputacion cerca de mi, donde apostillar certificado de buena reputacion en new jersey, donde puedo apostillar un certificado de buena reputación en new jersey, apostillar certificado de buena conducta en new jersey";
                    $data['content'] = ['¿Qué es un certificado de buena reputación?','¿Para qué sirve un certificado de buena reputación?','¿Qué necesito para obtener el certificado de buena reputación?','¿Donde puedo obtener el certificado de buena reputación?'];
                    $data['body'] = "<ul><li><h2>¿Qué es un certificado de buena reputación?</h2></li></ul>
                    <p>Un certificado de buena reputación es un documento que avala que una institución comercial en la actualidad esta registrada y con los permisos correspondientes
                        para realizar negocios.
                    </p>
                    <ul><li><h2>¿Para qué sirve un certificado de buena reputación?</h2></li></ul>
                    <p>El obtener un certificado de buena reputación no es obligado. sin embargo es útil cuando necesite realizar una serie de trámites como por ejemplo abrir una cuenta bancaria comercial,
                        obtener pagos de clientes por medio de tarjetas de crédito o débito, requerir algún tipo de crédito para su negocio, etc.
                    </p>
                    <ul><li><h2>¿Qué necesito para obtener el certificado de buena reputación?</h2></li></ul>
                    <p>El principal requisito para obtener su certificado de buena reputación es estar registrado en la Secretaría de Estado dependiento en el que se encuentre. Para esto, deberá
                        contar con el nombre de su institución y el número de registro.
                    </p>
                    <p>Para que el certificado sea emitido, su entidad comercial deberá constar con lo siguiente:</p>
                    <ol>
                        <li>Estar registrado</li>
                        <li>Contar con los documentos necesarios, por ejemplo una declaración anual</li>
                        <li>Pagar la tarifa requerida</li>
                    </ol>
                    <ul><li><h2>¿Donde puedo obtener el certificado de buena reputación?</h2></li></ul>
                    <p>Si desea realizar el trámite para obtener dicho documento complete el siguiente formulario con su información o puede acercarse a nuestra oficinas
                        en " . $data['office'] . " donde un asesor se contactará con usted para brindarle la ayuda necesaria.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-origen-new-jersey':
                    $data['description'] = 'Certificado de Origen';
                    $data['metadescription'] = "Apostillamos Certificados de Origen en New Jersey 🗽 de una manera segura. Envíe su documento o contáctenos para asesorarlo en el trámite ✅";
                    $data['keywords'] = "notaria latina en elizabeth new jersey, notaria en elizabeth nj, apostillar documentos en new jersey, apostillar certificado de origen en new jersey, apostillar certificado de origen cerca de mi, donde apostillar certificado de origen en new jersey, donde puedo apostillar certificado de origen en new jersey, apostillar acta de origen en new jersey";
                    $data['content'] = ['¿Qué es el certificado de origen?','¿Para qué sirve el certificado de origen?','¿Cómo puedo obtener el certificado de origen?','¿Donde puedo tramitar el certificado de origen?'];
                    $data['body'] = "<ul><li><h2>¿Qué es el certificado de origen?</h2></li></ul>
                    <p>El certificado de origen es un documento cuyo objetivo es determinar el país de procedencia de dicha mercancia, por ello dispone
                        de algunas preferencias o beneficios debido algunos acuerdos comerciales entre países.
                    </p>
                    <ul><li><h2>¿Para qué sirve el certificado de origen?</h2></li></ul>
                    <p>Este certificado de origen sirve para garantizar la procedencia de los productos que pretende entrar a un territorio.</p>
                    <ul><li><h2>¿Cómo puedo obtener el certificado de origen?</h2></li></ul>
                    <p>La información básica y necesario para la obtención de un certificado de origen es la siguiente:</p>
                    <ol>
                        <li>Información de la autoridad que certifica el documento</li>
                        <li>Información de las personas que exporta e importa</li>
                        <li>Características del producto (Peso, Marca, Cantidad, etc.)</li>
                        <li>Identificar la mercancía mediante la clasificación arancelaria</li>
                        <li>Tipo de embalaje</li>
                    </ol>
                    <ul><li><h2>¿Donde puedo tramitar el certificado de origen?</h2></li></ul>
                    <p>Para poder comenzar con el proceso del certificado de origen puede completar el siguiente formulario con su información correspondiente o dirigirse 
                        a nuestras oficinas en ".$data['office']." donde un asesor lo guiará en el proceso de una manera ágil y segura.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-marca-patente-new-jersey':
                    $data['description'] = 'Marcas o Patentes';
                    $data['metadescription'] = "Apostillamos Marca o Patente en New Jersey 🗽 de una manera rápida y segura. Contáctenos o envíe su documento para ayudarlo con el proceso ✅";
                    $data['keywords'] = "notaria latina en elizabeth new jersey, notaria en elizabeth nj, apostillar documentos en new jersey, apostillar marca en new jersey, apostillar patente en new jersey, apostillar marca cerca de mi, apostillar patente cerca de mi, donde apostillar marca en new jersey, donde apostillar patente en new jersey, donde puedo apostillar una marca en new jersey, donde puedo apostillar una patente en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-poder-comercial-new-jersey':
                    $data['description'] = 'Poder Comercial';
                    $data['metadescription'] = "Apostillamos Poder Comercial en New Jersey de una manera segura y rápida. Envíe su documento o consulte por nuestros servicios ¡Agende una cita! ✅";
                    $data['keywords'] = "notaria latina en elizabeth new jersey, notaria en elizabeth nj, apostillar documentos en new jersey, apostillar poder comercial new jersey, apostillar poder comercial near me, donde apostillar poder comercial new jersey, donde puedo apostillar una carta poder comercial en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-declaracion-jurada-comercial-new-jersey':
                    $data['description'] = 'Declaración Jurada Comercial';
                    $data['metadescription'] = "Apostillamos Declaración Jurada Comercial en New Jersey 🗽 de una forma segura. Contáctenos o envíe su documento por nuestro sitio web ¡Que espera! ✅";
                    $data['keywords'] = "que es una declaracion juramentada comercial, para que sirve una declaracion juramentada en new jersey, requisitos para una declaracion juramentada en new jersey, apostillar documentos en new jersey, apostillar declaracion jurada comercial en new jersey, apostillar affidavit comercial en new jersey, apostillar declaracion jurada comercial cerca de mi, donde apostillar affidavit comercial en new jersey, donde apostillar declaracion jurada comercial en new jersey, apostillar declaracion juramentada comercial en new jersey";
                    $data['content'] = ['¿Qué es una declaración juramentada comercial?','¿Para qué sirve una declaración juramentada?','¿Ante que situaciones necesito una declaración juramentada?','¿Qué requisitos son necesarios para una declaración juramentada?','¿Donde puedo solicitar una declaración juramentada?'];
                    $data['body'] = "<ul><li><h2>¿Qué es una declaración juramentada comercial?</h2></li></ul>
                    <p>Una declaración juramentada es una documento mediante el cual una persona manifiesta una situación o un hecho, el mismo que es verificado y garantizado mediante una autoridad competente</p>
                    <ul><li><h2>¿Para qué sirve una declaración juramentada?</h2></li></ul>
                    <p>El objetivo de dicho documento es generar un compromiso legal de la persona que hace la declaración acorde a lo que esta estipulado en el escrito. Es decir, el declarante se compromote
                        con la veracidad de lo que ha manifestado. En la mayoría de los casos se utilizan para reunir pruebas en un juicio o en otros aspectos como asuntos familiares, bienes raíces, etc.
                    </p>
                    <ul><li><h2>¿Ante que situaciones necesito una declaración juramentada?</h2></li></ul>
                    <p>La declaración juramentada puede ser necesaria para diferentes situaciones, entre las cuales perfilan los ingresos de una persona, situación familiar o para declarar que una personas cumple con ciertos
                        requerimientos necesarios para realizar algún trámite legal.
                    </p>
                    <ul><li><h2>¿Qué requisitos son necesarios para una declaración juramentada?</h2></li></ul>
                    <p>Una declaración juramentada debe satisfacer los siguientes requisitos:</p>
                    <ol>
                        <li>Nombres y dirección del solicitante</li>
                        <li>Firma de la persona que solicita, testigos y notario</li>
                        <li>La declaración debe estar acorde a la postura del declarante</li>
                        <li>Dicho documento no debe ser obligado para los testigos, es decir debe ser voluntaria</li>
                    </ol>
                    <ul><li><h2>¿Donde puedo solicitar una declaración juramentada?</h2></li></ul>
                    <p>Si necesita apostillar u obtener una declaración juramentada puede completar el <a>siguiente formulario</a> o acercarse a nuestras oficinas en ".$data['office']." para que un asesor pueda
                        contactarse con usted y brindarle la asesoría necesaria.
                    </p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-fda-new-jersey':
                    $data['description'] = 'Certificado FDA';
                    $data['metadescription'] = "⚖Apostillamos Certificados FDA en New Jersey de una manera rápida y segura. Acérquese a nuestras oficinas o envíe su documento por nuestro sitio web ✅";
                    $data['keywords'] = "notaria latina en elizabeth new jersey, notaria en elizabeth nj, apostillar documentos en new jersey, apostillar certificado fda en new jersey, apostillar certificado fda cerca de mi, donde apostillar certificado fda en new jersey, donde puedo apostillar un certificado fda en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-facturas-new-jersey':
                    $data['description'] = 'Facturas';
                    $data['metadescription'] = "Apostillamos todo tipo de documentos como Facturas en New Jersey 🗽 de una manera segura. Consulte por nuestros servicios de notaria. ¡Contáctenos! ✅";
                    $data['keywords'] = "notaria latina en elizabeth new jersey, notaria en elizabeth nj, apostillar documentos en new jersey, apostillar una factura en new jersey, apostillar facturas cerca de mi, donde apostillar facturas en new jersey, donde puedo apostillar una factura en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;   
                case 'apostillar-departamento-de-hacienda-new-jersey':
                    $data['description'] = 'Departamento de Hacienda';
                    $data['metadescription'] = "Apostillamos todo tipo de documentos en New Jersey 🗽 como Departamento de Hacienda. Contáctese con nosotros y lo asesoramos con el trámite! ✅";
                    $data['keywords'] = "notaria latina en elizabeth new jersey, notaria en elizabeth nj, apostillar documentos en new jersey, apostillar documento departamento de hacienda en new jersey, apostillar departamento de hacienda cerca de mi, donde apostillar departamento de hacienda en new jersey, donde puedo apostillar departamento de hacienda en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-gobierno-extranjero-new-jersey':
                    $data['description'] = 'Certificado de Gobierno Extranjero';
                    $data['metadescription'] = "Apostillamos Certificado de Gobierno Extranjero en New Jersey 🗽 de una manera rápida y segura. Contáctenos y lo ayudamos con el proceso ✅";
                    $data['keywords'] = "apostillar documentos en new jersey, apostillar certificado de gobierno extranjero en new jersey, apostillar certificado de gobierno extranjero cerca de mi, donde apostillar certificado de gobierno extranjero en new jersey, donde puedo apostillar certificado de gobierno extranjero en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-venta-gratis-new-jersey':
                    $data['description'] = 'Certificado de Venta gratis';
                    $data['metadescription'] = "Apostillamos Certificado de Venta Gratis en New Jersey 🗽 de una manera segura. Contamos con personal calificado a su servicio. ¡Contáctenos ahora! ✅";
                    $data['keywords'] = "apostillar documentos en new jersey, apostillar certificado de venta gratis en new jersey, apostillar acta de venta gratis en new jersey, apostillar certificado de venta cerca de mi, apostillar acta de venta cerca de mi, donde apostillar certificado de venta en new jersey, donde puedo apostillar certificado de venta gratis en new jersey";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-ordenes-de-compra-new-jersey':
                    $data['description'] = 'Órdenes de compra';
                    $data['metadescription'] = "Apostillamos todo tipo de documentos como Órdenes de Compra en New Jersey 🗽 de una forma segura. Personal calificado a su servicio. ¡Contáctenos! ✅";
                    $data['keywords'] = "apostillar documentos en new jersey, apostillar orden de compra en new jersey, apostillar orden de compra cerca de mi, donde apostillar una orden de compra en new jersey, donde puedo apostillar una orden de compra en new jersey";
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
            $data['telfWpp'] = '19088009046';//13479739888
            $data['telfShow'] = '908-800-9046';
            $data['imgapostilla'] = 'img/oficinas/apostillanj.webp';
            $data['imgup'] = 'img/newjersey-landing-notaria-latina.webp';
            $data['imgdown'] = 'img/oficinas/apostillas-en-new-jersey.webp'; //img/oficinas/CHICA-APOST.webp
            $data['widthimgdown'] = '85%';
            $data['heightimgdown'] = '27rem';
            $data['paddingtop'] = '0px';
            $data['urlmap'] = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3026.4152609855228!2d-74.2132981!3d40.6648184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24dde7100d355%3A0x9998b8cdec575153!2sNotar%C3%ADa%20Latina%20en%20New%20Jersey!5e0!3m2!1ses-419!2sec!4v1676308468772!5m2!1ses-419!2sec'; 
            $data['imgurlmap'] = "img/oficinas/maps-nj-2.webp";
            $data['imgurlmapmobile'] = "img/oficinas/maps-nj-mobile-2.webp";
            $data['keywords'] = 'notaria new jersey,
                notario cerca de mi,
                notaria cerca de mi, 
                notaria publica latina nj,
                notario publico cerca de mi,
                notarias publicas cerca de mi,
                notarios publicos cerca de mi, 
                notaria en new jersey,
                notaria elizabeth,
                notaria en elizabeth nj, 
                notaria en elizabeth new jersey,
                notaria latina en new jersey,
                notaria latina elizabeth nj,
                notaria latina en elizabeth new jersey,
                notario publico en new jersey,
                notaria publico new jersey,
                notaria publico en elizabeth new jersey,
                notarizar documentos,
                notarizar documentos near me,
                notarizar en linea new jersey,
                notarizar en linea en new jersey,
                notarizar documentos en new jersey,
                notarizar documentos en elizabeth new jersey,
                tramitar documentos new jersey,
                tramitar documentos en new jersey,
                donde puedo tramitar documentos en new jersey,
                donde puedo tramitar un documento en new jersey,
                tramitar documentos elizabeth new jersey,
                tramitar documentos en elizabeth new jersey,
                notarizar documentos new jersey,
                notarizar un documento,
                notarizar un documento new jersey,
                notarizar un documento en new jersey,
                documento notarizado,
                documento notarizado new jersey,
                documento notarizado en new jersey,
                notarizar documentos en new jersey,
                realizar tramite notarial new jersey,
                realizar tramite notarial en new jersey,
                realizar un tramite notarial en new jersey,
                donde puedo notarizar documentos en new jersey,
                donde puedo notarizar un documento en new jersey,
                donde puedo realizar un tramite notarial new jersey,
                donde puedo realizar un tramite notarial en new jersey,
                donde puedo notarizar un documento cerca de mi,
                tramites notariales en new jersey,
                tramites notariales new jersey,
                tramites notariales elizabeth new jersey,
                tramites notariales en elizabeth new jersey,
                servicios notariales new jersey,
                servicios notariales en new jersey';
            $data['reviews'] = $this->reviewsnj;
            $data['more_reviews'] = $this->more_reviewsnj;
            $data['urlindications'] = "https://www.google.com/maps/dir//Notar%C3%ADa+Latina+en+New+Jersey+1146+E+Jersey+St+Elizabeth,+NJ+07201+Estados+Unidos/@40.6648184,-74.2132981,16z/data=!4m8!4m7!1m0!1m5!1m1!1s0x89c24dde7100d355:0x9998b8cdec575153!2m2!1d-74.2132981!2d40.6648184";

            $consulates = DB::table('consulates')->select('slug')->get();

            return view('web.oficina', compact('data', 'consulates'));
        }
    }

    public function oficinasfl(?string $service = null){
        $data['office'] = 'Florida';
        $data['telfHidden'] = '+13056003290';
        $data['telfWpp'] = '13056003290';
        $data['telfShow'] = '305-600-3290';
        $data['address'] = '2104 N University Dr, Sunrise Miami, FL 33322';
        $data['location'] = 'https://g.page/r/CeRrwPx_W2-xEAE';
        $data['metadescription'] = "Realizamos Poderes Generales y Especiales, Apostilla y Traducción de todo tipo de documentos en Florida. ¿Desea saber más? ¡Contáctenos ahora! ✅";
        if($service != null){
            switch ($service) {
                case 'certificaciones-en-florida':
                    $data['metadescription'] .= "Realizamos todo tipo de Certificaciones en Florida de una manera ágil y rápida!";
                    $data['keywords'] = "copia certificada, copia certificada de un documento, donde puedo obtener copia certificada de documento, tramitar copia certificadad de documento, copia certificada acta de nacimiento, certificaciones en estados unidos, certificar documentos en estados unidos, que es una certificacion, para que sirve certificar un documento, como certificar documentos, que necesito para certificar un documento, requisitos para certificar un documento, que necesito para certificar un documento en florida, requisitos para certificar un documento en florida, certificar documentos en florida, certificar acta de nacimiento en florida, certificar partida de nacimiento en florida, certificar acta de matrimonio en florida, certificar declaracion jurada en florida, certificar affidavit en florida, certificar licencia de conducir en florida, certificar carta poder en florida, donde puedo certificar un documento en florida, donde puedo certificar documentos en florida, quien puede certificar documentos";
                    $posts = Post::where('name', 'LIKE', '%certificacion%')->limit(3)->get();
                    $data['imgback'] = "img/oficinas/copia-certificada-de-documentos-2.webp";
                    $data['body'] = "
                    <h2 style='font-size: 25px;'>Realice su Copia Certificada de documentos en Florida</h2>
                    <p class='text-muted'>
                        Una copia certificada es un duplicado correcto y preciso de un documento personal que necesite certificar demostrando que esta bajo su nombre. Esta copia va a acompañada de un sello manifestando que es un documento de confianza y de procedencia veraz.
                    </p>
                    <p class='text-muted'>Este certificado es sellado y otorgado por el notario quien comprueba que la copia sea un duplicado preciso del documento original.</p>

                    <h2 style='font-size: 25px;background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Para qué es necesario un certificado?</h2>
                    <p class='text-muted'>El objetivo de este escrito es mostrar que nuestra documentación es lícita para administrar cualquier trámite que estemos realizando, 
                    el cual podría ser un procedimiento jurídico, razones comerciales para nuestro negocio, o por motivos profesionales en cuanto a un empleo, entre otros.</p>
                    <p class='text-muted'>Gracias a este certificado es posible llevar a cabo nuestra tramitación en territorio nacional e internacional.</p>
                    
                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Cuál es la importancia de obtener una copia certificada?</h2>
                    <p class='text-muted'>Una de las causas, y quizás una de las principales, para optar por realizar este proceso es cuando alguna entidad o autoridad necesita de nuestros documentos personales y tenemos 
                        que enviarlos, por ejemplo un pasaporte, partida de nacimiento, acta de matrimonio, etc.
                        Por ello lo más conveniente es tramitar una copia certificada de nuestro documento para no extraviar el original o prevenir cualquier daño del mismo.
                    </p>
                    <p class='text-muted'>Otra razón por la cual optamos en obtener este certificado puede ser que nuestro documento personal se encuentra esta en mal estado, lo cual podría ocasionar que los organismos que lo requieren no lo aprueben como válido. Para impedir
                     que esto suceda, una buena elección sería tramitar el certificado del documento. De esta manera evitará cualquier contratiempo que se le presente de último momento.</p>

                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>Documentos que se pueden certificar</h2>
                    <p>Entre los documentos que se puede solicitar una copia certificada se encuentran los siguientes:</p>
                    <ul class='text-muted'>
                        <li>Partidas de nacimiento, matrimonio, etc.</li>
                        <li>Cartas</li>
                        <li>Permisos de conducir.</li>
                        <li>Declaraciones juradas (Affidávit).</li>
                        <li>Escrituras.</li>
                        <li>Entre otros</li>
                    </ul>

                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Por cuanto tiempo está vigente el certificado?</h2>
                    <p class='text-muted'>
                        El certificado entra en rigor desde el momento en que es emitido y es válido mientras su documento original lo sea. Es decir, no cuenta con un período de caducidad 
                        y se puede utilizar en cualquier trámite necesario. Es por esta razón que lo recomendable es hacerlo con una autoridad con la capacidad necesaria para evadir
                        cualquier tipo de violación de derecho del escrito, fraude o percance que puede surgir con este archivo a futuro.
                    </p>

                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>Requisitos para solicitar un certificado de un documento</h2>
                    <p class='text-muted'>El principal y único requisito es poseer del documento original que va a ser certificado. El notario estará encargado de cerciorarse que su documentación sea veraz
                    y procederá con la certificación. Para este paso se puede hacer de dos maneras:
                        <ul class='text-muted'>
                            <li>Primero que el notario estampe con un sello la copia del documento, garantizando que es confiable y legítimo</li>
                            <li>Segundo agregando otro documento conocido como certificado notarial, en el cual se indica que la copia del documento es válida de acuerdo con el documento principal</li>
                        </ul> 
                    </p>

                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Donde puedo adquirir este certificado?</h2>
                    <p class='text-muted'>Puede agendar una cita completando nuestro formulario de contacto o mediante una llamada. Un asesor lo guiará en el proceso para continuar con el trámite de manera eficiente y sencilla. También puede acercarse personalmente a nuestra oficina en Florida con su documento a certificar.
                    </p>

                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿En que tiempo me entregan el documento certificado?</h2>
                    <ul class='text-muted'>
                        <li>El tiempo de entrega dentro de los Estados Unidos es de 24 horas.</li>
                        <li>El tiempo de entrega fuera de los Estados Unidos es de 3 días laborables.</li>
                        <li>El documento digital estará disponible en 24 horas.</li>
                        <li class='text-danger'>Por motivos de codiv-19 puede existir retraso en los tiempos de entrega.</li>
                    </ul>
                    <p class='text-muted'><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
                        <a href='https://www.facebook.com/notariapublicalatina/'><em>FanPage de Facebook</em></a><em>.</em></p>
                    ";
                    return view('web.office.certificaciones', compact('data', 'posts'));
                    break;
                case 'travel-authorization-en-florida':
                    $data['metadescription'] .= "Realizamos Autorizaciones de Viaje para Menores de Edad en Florida de una manera ágil y rápida!";
                    $data['keywords'] = "que es una autorizacion de viaje, requisitos para realizar una autorizacion de viaje en florida, para que sirve una autorizacion de viaje, cuanto dura una autorizacion de viaje en florida, realizar autorizacion de viaje en florida, donde puedo realizar una autorizacion de viaje en florida, autorizacion de viaje para niños en florida, donde puedo realizar una carta de autorizacion de viaje en florida, permiso de viaje en usa, autorizacion de viaje para niños, permiso notarial de viaje, permiso notarial de viaje en florida, permiso notarial de viaje en estados unidos, menor carta notarial para permiso de viaje, carta de permiso de viaje para niños en ingles, notario para sacar permiso de viaje, carta notarial para permiso de viaje, carta notarial para permiso de viaje en florida, carta notarial para permiso de viaje en estados unidos, autorizacion para viaje de menores al extranjero, carta autorizacion de viaje, carta para permiso de viaje, carta permiso de viaje para niños";
                    $posts = Post::where('name', 'LIKE', '%autorizacion%')->limit(3)->get();
                    $data['imgback'] = "img/oficinas/permiso-de-viaje-menores-2.webp";
                    $data['body'] = "
                    <h2 style='font-size: 25px'>La Autorización de Viaje permitirá que su hijo(a) menor edad pueda viajar a otro país sin la compañia de sus padres en caso que no puedan hacerlo.</h2>
                    <p class='text-muted'>Este escrito acredita a una tercera persona como el encargado de viajar con el menor. Dicho individuo puede ser un miembro de la familia,
                        un amigo o alguna auxiliar de viaje, por ejemplo una azafata de la misma aerolinea (personal de la tripulación de un avión que tiene como función atender a los pasajeros prestándoles servicios para su comodidad y seguridad).</p>
                    <p class='text-muted'>Esta carta de autorización debe manifestar la aprobación, por parte de los progenitores del menor, la salida del país del mismo acompañado de la persona hecha a cargo.
                        También se puede realizar este permiso si el menor necesita viajar solo con uno de los padres. </p>

                    <h2 style='font-size: 25px;background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Qué necesito para realizar una autorización de viaje?</h2>
                    <p class='text-muted'>Entre los requisitos necesarios para realizar este proceso se encuentran los siguientes:</p>
                    <ul class='text-muted'>
                        <li>Documento de identidad de los padres.</li>
                        <li>Nombres y apellidos del hijo o hija.</li>
                        <li>Fecha de nacimiento del menor.</li>
                        <li>Nombres completos del acompañante del menor.</li>
                        <li>Información del vuelo.</li>
                    </ul>
                    <p class='text-muted'>Es posible que en algunas situaciones requieran más información para realizar el permiso de viaje del niño/a, por ejemplo el país al que realiza el viaje, período en el que se encontrara fuera del país, entre otros.</p>

                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Cuál es la duración de esta carta de autorización?</h2>
                    <p class='text-muted'>Este permiso, emitido por una autoridad competente, solo es válido durante el tiempo en que el menor se encuentre fuera del país. Al terminar este período, la autorización deja de ser válida automáticamente.</p>

                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿En donde puedo realizar el trámite?</h2>
                    <p class='text-muted'>Contáctenos completando un formulario en línea, mediante una llamada o acercándose personalmente a nuestra oficina en New Jersey con los requisitos necesarios y un asesor lo guiará para que realice el trámite de manera correcta y segura.</p>

                    <h2 style='font-size: 25px; background-color: #F5F8FA; padding:7px; border-radius: 5px'>¿Cuál es el tiempo de entrega del documento?</h2>
                    <p class='text-muted'>
                        La entrega de la autorizacion es de inmediato, siempre y cuando la persona que realiza el trámite cuente con los requisitos respectivos y en orden.
                    </p>
                    <p class='text-muted'><em>Si desea mantenerse actualizado sobre nuestros servicios puede seguirnos en nuestra </em>
                        <a href='https://www.facebook.com/notariapublicalatina/'><em>FanPage de Facebook</em></a><em>.</em></p>
                    ";
                    return view('web.office.authorization', compact('data', 'posts'));
                    break;
                case 'acuerdos-en-florida':
                    $data['metadescription'] .= "Realizamos Acuerdos en Florida de una manera ágil y rápida!";
                    $data['keywords'] = ", tramitar acuerdo florida, realizar acuerdo florida, process agreement florida, make deal florida";
                    $posts = Post::where('name', 'LIKE', '%acuerdo%')->limit(3)->get();
                    return view('web.office.acuerdos', compact('data', 'posts'));
                    break;
                case 'cartas-de-invitacion-en-florida':
                    $data['metadescription'] .= "Tramitamos Cartas de Invitación en Florida de una manera ágil y rápida!";
                    $data['keywords'] = ", realizar carta de invitacion florida, tramitar carta de invitacion florida, make invitation letter florida, process letter of invitation florida";
                    $posts = Post::where('name', 'LIKE', '%invitacion%')->limit(3)->get();
                    return view('web.office.invitacion', compact('data', 'posts'));
                    break;
                case 'revocatorias-en-florida':
                    $data['metadescription'] .= "Realizamos Revocatorias de Poderes en Florida de una manera ágil y rápida!";
                    $data['keywords'] = ", revocar carta poder florida, revocar poder general florida, revocar poder especial florida, realizar revocatoria florida, anular poder florida, anular carta poder florida, cancelar poder florida, cancelar carta poder florida, revoke power florida, override power florida, cancel power florida";
                    $posts = Post::where('name', 'LIKE', '%revocatoria%')->limit(3)->get();
                    return view('web.office.revocatorias', compact('data', 'posts'));
                    break;
                case 'contratos-en-florida':
                    $data['metadescription'] .= "Realizamos todo tipo de Contratos en Florida de una manera ágil y rápida!";
                    $data['keywords'] = ", contrato de arrendamiento florida, contrato de trabajo florida, contrato de renta florida, realizar contrato de arriendo florida, realizar contrato compra venta florida, realizar contrato prestamo florida, realizar contrato prenupcial florida, realizar contrato de servicio florida, realizar contrato de transporte florida, make contract florida";
                    $posts = Post::where('name', 'LIKE', '%contrato%')->limit(3)->get();
                    return view('web.office.contratos', compact('data', 'posts'));
                    break;
                case 'testamentos-en-florida':
                    $data['metadescription'] .= "Realizamos Testamentos en Florida de una manera ágil y rápida!";
                    $data['keywords'] = ", realizar testamento florida, hacer testamento florida, tramitar testamento florida, make a will florida";
                    $posts = Post::where('name', 'LIKE', '%testamento%')->limit(3)->get();
                    return view('web.office.testamentos', compact('data', 'posts'));
                    break;
                case 'matrimonios-en-florida':
                    $data['metadescription'] .= "Notarizamos Certificados de Matrimonio en Florida de una manera ágil y rápida!";
                    $data['keywords'] = ", notarizar certificado de matrimonio florida, tramitar certificado de matrimonio florida, notarizar acta de matrimonio florida, tramitar acta de matrimonio florida, notarize marriage certificate florida, process marriage certificate florida";
                    $posts = Post::where('name', 'LIKE', '%matrimonio%')->limit(3)->get();
                    return view('web.office.matrimonios', compact('data', 'posts'));
                    break;
                case 'poder-notarial-florida':
                    // $data['metadescription'] .= "Realizamos Poderes Generales y Especiales en Florida de una manera ágil y rápida!";
                    // $data['keywords'] .= ", realizar carta poder florida, realizar poder especial florida, realizar poder general florida, tramitar poder florida, make power of attorney florida, process power florida";
                    $data['body'] = "
                    <h2 style='font-size: 25px'>Hacemos todo tipo de Carta Poder en Florida</h2>
                        <p class='text-muted'>Un poder consta de un documento legal con el propósito de ceder total o parcialmente cierto derecho a otra persona para que realice un trámite
                            o acto jurídico a su nombre en el caso que usted no pudiera estar presente. Este le permite realizar firmas, procesos administrativos, entre otros según se describan en el documento, siendo una solución para gestionar sus bienes y otras tareas importantes.</p>
                        <p class='text-muted'>La persona que otorga este documento se llama <b>poderdante o mandante</b> y la persona que lo recibe se le denomina <b>apoderado o mandatario</b>.
                            Lo aconsejable es delegar a una persona de confianza, de preferencia que sea de la familia, para realizar las tareas descritas en el poder,
                            de esta manera puede evitar futuros inconvenientes que podrían presentarse.</p>

                        <h2 style='font-size: 25px'>¿Para que se puede usar una carta poder?</h2>
                        <p class='text-muted'>Un poder notarial lo ayuda a gestionar diversos procedimientos administrativos o jurídicos, como la compra y venta de propiedades, al igual que obtener y administrar escrituras de 
                        las mismas, gestionar cuentas bancarias, retiro de dinero, entro otros.
                        </p>
                        <p class='text-muted'>La carta poder apostillada tiene validez legal en los países miembros del Convenio, el cual consiste en un sello
                            que la autoridad encargada estampa en seco y se agrega como nota al reverso o como hoja adicional de los documentos que se quisiera
                            autenticar. Es por eso que los únicos autorizados para validar esta apostilla son los notarios debidamente acreditados.</p>

                        <h2 style='font-size: 25px'>Tipos de Poderes</h2>
                        <p class='text-muted'>
                            La persona encargada de realizar el documento puede elegir entre dos tipos de poderes dependendiendo el alcance que desea. Estos pueden ser:
                        </p>
                        <ul class='text-muted'>
                            <li><b>Poder Especial:</b> Este tipo de poder es más limitado ya que otorga control a una actividad especifica sobre sus posesiones o recursos a otra persona en el caso de que usted no pudiera estar presente.</li>
                            <li><b>Poder General: </b> Este poder es más permisible debido a que otorga un control más amplio y con más atribuciones sobre sus activos a otra persona en el caso de que usted no pudiera estar presente.
                                Sin embargo hay que tener mucho cuidado a la hora de optar por este, debido a que se puede hacer mal uso del mismo.
                            </li>
                        </ul>

                        <h2 style='font-size: 25px'>Documentos que requieren de una Apostilla</h2>
                        <ul class='text-muted'>
                            <li>Compra y Venta</li>
                            <li>Administración de propiedades.</li>
                            <li>Administrar sus cuentas y transacciones bancarias.</li>
                            <li>Inversiones de dinero.</li>
                            <li>Hacer reclamos legales</li>
                            <li>Procedimientos legales en su nombre.</li>
                        </ul>

                        <h2 style='font-size: 25px'>Requisitos para obtener un Poder</h2>
                        <p class='text-muted'>Los requisitos para realizar un poder son simples:</p>
                        <ul class='text-muted'>
                            <li>Identificación válida de quien otorga el poder</li>
                            <li>Nombres completos del apoderado.</li>
                            <li>Número de cédula del apoderado.</li>
                        </ul>

                    <h2 style='font-size: 25px'>¿Cuanto tiempo tiene de válidez un poder?</h2>
                        <p class='text-muted'>Una poder notarial es válido por el período que el poderdante establezca al momento de realizarlo con el notario.
                            Existen causas por las cuales el poder queda sin efecto alguno, por ejemplo el fallecimiento de la persona que otorga el poder o hasta  que por voluntad propia solicite una revocatoria.</p>
                        <p class='text-muted'>Aún si el poderdante no esta con las facultades físicas o mentales, el poder puede ser utilizado por el apoderado.</p>

                    <h2 style='font-size: 25px'>¿En donde puedo solicitar un poder?</h2>
                        <p class='text-muted'>Complete nuestro formulario en línea y nos contactaremos con usted. O puede acercarse a nuestra oficina y solicitar su poder, un asesor lo guiará para que usted realice el trámite de manera correcta y segura.</p>
                    <h2 style='font-size: 25px'>¿Cuanto tiempo tarda en hacer un poder?</h2>
                        <ul class='text-muted'>
                            <li>El tiempo de entrega dentro de los Estados Unidos es de 24 horas.</li>
                            <li>El tiempo de entrega fuera de los Estados Unidos es de 3 días laborables.</li>
                            <li>El documento digital estará disponible en 24 horas.</li>
                            <li class='text-danger'>Por motivos de codiv-19 puede existir retraso en los tiempos de entrega.</li>
                        </ul>
                        <p class='text-muted'><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
                        <a href='https://www.facebook.com/notariapublicalatina/'><em>FanPage de Facebook</em></a><em>.</em></p>
                    ";
                    $posts = Post::where('name', 'LIKE', '%poder')->limit(3)->get();
                    return view('web.office.poderes', compact('data', 'posts'));
                    break;
                case 'traducir-documentos-florida':
                    $data['metadescription'] .= "Traducimos todo tipo de Documentos en Florida de una manera ágil y rápida! ";
                    $data['keywords'] = ", traducir documentos florida, traducir certificado de nacimiento florida, traducir diplomas florida, traducir certificado de matrimonio florida, traducir certificado de divorcio florida, traducir certificado de defuncion florida, traducir documentos medicos florida, traducir certificados estudiantiles florida, translate documents florida";
                    $posts = Post::where('name', 'LIKE', '%traduccion%')->limit(3)->get();
                    return view('web.office.traducciones', compact('data', 'posts'));
                    break;
                case 'apostillar-documentos-florida':
                    $data['body'] = "
                    <h2 style='font-size: 25px;'>Certificamos sus documentos requeridos por instituciones de otro país mediante la Apostilla de estos.</h2>
                    <p class='text-muted'>La Apostilla es la mejor opción al momento de demostrar la veracidad de documentos públicos expedidos en otro país. Por medio de esta es posible administrar 
                        trámites internacionales, entre otras gestiones que necesite realizarlas.
                    </p>
                    <p class='text-muted'>Algunos de los países latinos miembros del Convenio de la Haya donde es válida la apostilla son Argentina, Bolivia,
                        Venezuela, Colombia, Chile, Costa Rica, Ecuador, Estados Unidos, El Salvador, Guatemala, Honduras, Perú, México, entre otros.</p>
        
                    <h2 style='font-size: 25px'>¿Cuál es la finalidad de apostillar un documento?</h2>
                    <p class='text-muted'>Este proceso es muy necesario ya que respalda la veracidad del documento apostillado, lo cual le permite estar en vigor y ejercer cierto derecho acorde a lo que esta descrito. 
                        En términos más sencillos, consiste de un sello que la autoridad competente estampa y se añade como nota al otro lado del escrito o como una hoja adicional. 
                        Los Notarios acreditados son los únicos autorizados para efecutar este trámite y certificar la veracidad del escrito.</p>
        
                    <h2 style='font-size: 25px'>Documentos que requieren ser apostillados</h2>
                    <ul class='text-muted'>
                        <li>Diplomas de <a href='https://notarialatina.com/florida/apostillar-diploma-de-escuela-secundaria-florida'>Escuela Secundaria</a> o <a href='https://notarialatina.com/florida/apostillar-diploma-universitario-florida'>Universitarios</a></li>
                        <li><a href='https://notarialatina.com/florida/apostillar-certificado-de-nacimiento-florida'>Certificado de nacimiento.</a></li>
                        <li><a href='https://notarialatina.com/florida/apostillar-certificado-de-matrimonio-florida'>Acta de matrimonio.</a></li>
                        <li><a href='https://notarialatina.com/florida/apostillar-certificado-de-defuncion-florida'>Certificado de defunción.</a></li>
                        <li><a href='https://notarialatina.com/florida/apostillar-certificado-de-divorcio-florida'>Acta de divorcio.</a></li>
                        <li><a href='https://notarialatina.com/florida/apostillar-poder-notarial-personal-florida'>Poderes Generales</a></li>
                        <li><a href='https://notarialatina.com/florida/apostillar-poder-notarial-personal-florida'>Poderes Especiales</a></li>
                        <li>Contratos.</li>
                        <li>Cartas de invitación.</li>
                        <li><a href='https://notarialatina.com/florida/apostillar-escrituras-testamentos-florida'>Testamentos.</a></li>
                        <li><a href='https://notarialatina.com/florida/apostillar-escrituras-testamentos-florida'>Declaraciones juradas (Affidavit).</a></li>
                        <li>Estados de cuenta.</li>
                        <li><a href='https://notarialatina.com/florida/apostillar-facturas-florida'>Facturas.</a></li>
                        <li>Documentos corporativos.</li>
                    </ul>
        
                    <h2 style='font-size: 25px'>Requerimientos para apostillar un documento</h2>
                    <p class='text-muted'>Para ejecutar este proceso solamente necesita poseer el documento original que va a ser apostillado. Es por eso que se trata de un trámite fácil y sencillo.</p>
            
                    <h2 style='font-size: 25px'>¿En donde se puede apostillar documentos?</h2>
                    <p class='text-muted'>Contáctenos en línea completando el <a href='https://notarialatina.com/contactenos'>siguiente formulario</a> o acérquese personalmente a nuestra oficina con el documento que necesita
                        apostillar. Nuestros asesores lo ayudarán con el trámite de una manera sencilla y eficaz</p>
                    <h2 style='font-size: 25px'>¿En que tiempo se realiza una apostilla?</h2>
                    <ul class='text-muted'>
                        <li>El tiempo de entrega dentro de los Estados Unidos es de 24 horas.</li>
                        <li>El tiempo de entrega fuera de los Estados Unidos es de 3 días laborables.</li>
                        <li>El documento digital estará disponible en 24 horas.</li>
                        <li class='text-danger'>Por motivos de codiv-19 puede existir retraso en los tiempos de entrega.</li>
                    </ul>
                    <p class='text-muted'><em>Si desea mantenerse actualizado sobre nuestros servicios puede visitar nuestra </em>
                        <a href='https://www.facebook.com/notariapublicalatina/'><em>FanPage de Facebook</em></a><em>.</em></p>
                    ";
                    $posts = Post::where('name', 'LIKE', '%apostilla%')->limit(3)->get();
                    return view('web.office.apostillas', compact('data', 'posts'));
                    break;
                case 'affidavit-support-en-florida':
                    $data['metadescription'] .= "Realizamos Declaraciones Juradas (Affidavit) en Florida de una manera ágil y rápida!";
                    $data['keywords'] = ", declaracion jurada florida, affidavit florida, realizar declaracion jurada florida, tramitar declaracion jurada florida, make an affidavit florida, process affidavit florida";
                    $posts = Post::where('name', 'LIKE', '%affidavit%')->limit(3)->get();
                    return view('web.office.affidavit', compact('data', 'posts'));
                    break;
                case 'apostillar-certificado-de-nacimiento-florida':
                    $data['description'] = 'Certificados de Nacimiento';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Nacimiento en Florida? En Notaria Latina te ayudamos de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar acta de nacimiento near me, apostillar partida de nacimiento florida, apostillar inscripcion de nacimiento florida, apostillar certificado de nacimiento florida, apostillar acta de nacimiento florida, donde apostillar certificado de nacimiento en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-reporte-consular-florida':
                    $data['description'] = 'Reporte Consular';
                    $data['metadescription'] .= "¿Necesitas apostillar un Reporte Consular (CRBA) en Florida? En Notaria Latina lo hacemos de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar crba near me, apostillar crba florida, apostillar reporte consular de nacimiento en el extranjero florida, apostillar certificado de nacimiento en el extranjero florida, apostillar inscripcion de nacimiento extranjero florida, apostillar acta de nacimiento extranjero florida, apostille birth certificate abroad florida, donde apostillar crba en florida";
                    $data['body'] = "<ul><li><h2>¿Qué es un Reporte Consular de Nacimiento en el Extranjero (CRBA)?</h2></li></ul>
                    <p>
                        Un Reporte Consular de Nacimiento en el Extranjero o CRBA, por sus siglas en inglés, es evidencia de ciudadanía estadounidense, emitida a una persona nacida en el extranjero de padre(s) estadounidenses que cumplan con los requisitos para la transmisión de la ciudadanía bajo La ley de Inmigración y Nacionalidad.
                    </p>
                    <ul><li><h2>¿Para qué sirve el Reporte Consular de Nacimiento en el Extranjero (CRBA)?</h2></li></ul>
                    <p>
                        Es la manera en la cual un ciudadano estadounidense puede transmitir su ciudadanía a su hijo que ha nacido fuera de los Estados Unidos.  
                    </p>
                    <ul><li><h2>¿Cuáles son los requisitos para obtener el Reporte Consular de Nacimiento en el Extranjero (CRBA)?</h2></li></ul>
                    <p>
                        El juntar los documentos requeridos para aplicar a un Reporte Consular de Nacimiento en el Extranjero (CRBA) puede ser difícil pero si se realiza correctamente le puede ahorrar varias visitas a la embajada o consulado, evitar que la que su aplicación sea puesta en espera o sea rechazada.                    
                    </p>
                    <p>Las condiciones para aplicar para este proceso son:</p>
                    <ol>
                        <p><li>Al menos uno de los padres debe ser ciudadano estadounidense al nacer su hijo.</li></p>
                        <p><li>El padre que transmite la ciudadanía debe probar una estancia de tiempo mínima en el territorio de los Estados Unidos (presencia física) previo al nacimiento del menor. En general el periodo de residencia a demostrar es de 5 años.</li></p>
                        <p><li>Debe existir una relación biológica (consanguínea) o legal entre el niño y el padre que transmite la ciudadanía.</li></p>
                    </ol>
                    <ul><li><h2>¿Dónde puedo obtener un Reporte Consular de Nacimiento en el Extranjero (CRBA)?</h2></li></ul>
                    <p>Puede <a href='#card'>completar el siguiente formulario</a> o dirigirse personalmente a nuestras oficinas en ".$data['office']." donde un asesor lo guiará en el proceso de una manera correcta y segura.</p>";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-matrimonio-florida':
                    $data['description'] = 'Certificados de Matrimonio';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Matrimonio en Florida? Notaria Latina te ayuda de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar certificado de matrimonio near me, apostillar certificado de matrimonio en florida, apostillar acta de matrimonio en florida, apostilla matrimonio florida, apostillar partida de matrimonio florida, apostille marriage certificate, apostille marriage certificate florida, donde apostillar certificado de matrimonio en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-defuncion-florida':
                    $data['description'] = 'Certificados de Defunción';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Defunción en Florida? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar certificado de defuncion, apostillar certificado de defuncion near me, apostillar certificado de defuncion en florida, apostillar acta de defuncion en florida, como apostillar un certificado de defuncion, apostillado de certificado de defuncion, apostille death certificate florida, apostille death certificate near me, donde apostillar certificado de defuncion en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-divorcio-florida':
                    $data['description'] = 'Certificados de Divorcio';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Divorcio en Florida? En Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar certificado de divorcio, apostillar acta de divorcio, apostillar certificado de divorcio near me, apostillar certificado de divorcio en florida, apostilllar acta de divorcio florida, apostillar sentencia de divorcio florida, apostille divorce certificate florida, apostille divorce certificate near me, donde apostillar certificado de divorcio en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-de-naturalizacion-florida':
                    $data['description'] = 'Certificados de Naturalización';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Naturalización en Florida? Nosotros podemos ayudarte con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar certificado de naturalizacion, apostillar acta de naturalizacion, apostillar certificado de naturalizacion near me, apostillar certificado de naturalizacion florida, apostillar acta de naturalizacion florida, apostille naturalization certificate near me, apostille naturalization certificate florida, donde apostillar certificado de naturalizacion en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-expediente-de-adopcion-florida':
                    $data['description'] = 'Expediente de Adopción';
                    $data['metadescription'] .= "¿Necesitas apostillar un Expediente de Adopción en Florida? En Notaria Latina te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar expediente de adopcion, apostillar expediente de adopcion near me, apostillar expediente de adopcion florida, apostille adoption file, apostille adoption file near me, apostille adoption file florida, donde apostillar expediente de adopcion en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-copia-de-pasaporte-florida':
                    $data['description'] = 'Copia de pasaporte';
                    $data['metadescription'] .= "¿Necesitas apostillar una copia de pasaporte en Florida? Nosotros podemos ayudarte con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar copia de pasaporte, apostillar copia de pasaporte near me, apostillar copia de pasaporte florida, apostille copy of passport, apostille copy of passport near me, apostille copy of passport florida, donde apostillar copia de pasaporte en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-copia-de-licencia-de-conducir-florida':
                    $data['description'] = 'Copia de Licencia de Conducir';
                    $data['metadescription'] .= "¿Necesitas apostillar una copia de licencia de conducir en Florida? Notaria Latina te ayuda con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar licencia de conducir, apostillar copia de licencia de conducir, apostillar copia de licencia de conducir near me, apostillar copia de licencia de conducir florida, apostille copy of driver's license, apostille copy of driver's license near me, apostille copy of driver's license florida, donde apostillar copia de licencia de conducir en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-escrituras-testamentos-florida':
                    $data['description'] = 'Escrituras y Testamentos';
                    $data['metadescription'] .= "¿Necesitas apostillar una escritura o testamento en Florida? Nosotros te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar escrituras, apostillar testamento, apostillar escrituras near me, apostillar testamentos near me, apostillar escrituras florida, apostillar testamentos florida, apostille deeds near me, apostille deeds florida, apostille wills near me, apostille wills florida, donde apostillar escrituras en florida, donde apostillar testamentos en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-declaraciones-juradas-de-estado-unico-florida':
                    $data['description'] = 'Declaraciones Juradas';
                    $data['metadescription'] .= "¿Necesitas apostillar una Declaración Jurada (Affidávit) en Florida? En Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar affidavit, apostillar declaracion jurada, apostillar affidavit near me, apostillar declaracion jurada near me, apostillar affidavit near me, apostillar declaracion jurada florida, apostille affidavit, donde apostillar affidavit en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-titulo-de-automovil-florida':
                    $data['description'] = 'Título de coche/automóvil';
                    $data['metadescription'] .= "¿Necesitas apostillar un Título de Automóvil en Florida? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar titulo de automovil, apostillar titulo de automovil near me, apostillar titulo de automovil florida, apostille car title, apostille car title near me, apostille car title florida, donde apostillar titulo de automovil en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-autorizacion-de-viaje-florida':
                    $data['description'] = 'Autorización de Viaje';
                    $data['metadescription'] .= "¿Necesitas apostillar una Autorización de Viaje en Florida? Notaria Latina podemos ayudarte con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar autorizacion de viaje, apostillar autorizacion de viaje near me, apostillar autorizacion de viaje florida, apostille travel authorization, apostille travel authorization near me, apostille travel authorization florida, donde apostillar autorizacion de viaje en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-poder-notarial-personal-florida':
                    $data['description'] = 'Poder Notarial Personal';
                    $data['metadescription'] .= "¿Necesitas apostillar una Carta Poder en Florida? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar poder notarial, apostillar carta poder florida, apostillar poder notarial near me, apostillar poder notarial florida, apostillar poder personal florida, apostille power of attorney, apostille power of attorney florida, donde apostillar carta poder en florida, donde apostillar poder notarial en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-registro-de-policia-estatal-florida':
                    $data['description'] = 'Registro de la policía estatal';
                    $data['metadescription'] .= "¿Necesitas apostillar un Registro Policial en Florida? En Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar registro policial, apostillar registro de policia estatal, apostillar registro policial near me, apostillar registro policial florida, apostille police record florida, apostill police record florida, donde apostillar registro policial florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-registro-de-antecedentes-fbi-florida':
                    $data['description'] = 'Registros de antecedentes del FBI';
                    $data['metadescription'] .= "¿Necesitas apostillar un Registro de Antecedentes FBI en Florida? Notaria Latina lo hace por ti de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar antecedentes del fbi, apostillar registro de antecentes del fbi, apostillar registros de antecedentes del fbi near me, apostillar registros de antecedentes del fbi florida, apostille fbi background check florida, donde apostillar antecedentes del fbi florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-diploma-universitario-florida':
                    $data['description'] = 'Diploma Universitario';
                    $data['metadescription'] .= "¿Necesitas apostillar un Diploma Universitario en Florida? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar diploma, apostillar diploma universitario near me, apostillar diploma universitario florida, apostillar titulo universitario florida, apostille university diploma florida, donde apostillar diploma universitario en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-transcripcion-universitaria-florida':
                    $data['description'] = 'Transcripción Universitaria';
                    $data['metadescription'] .= "¿Necesitas apostillar una Transcripción Universitaria en Florida? En Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar transcripcion universitaria, apostillar transcripcion universitaria near me, apostillar transcripcion universitaria florida, apostillar transcripcion titulo universitario florida, apostille university transcript florida, donde apostillar transcripcion universitaria florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-diploma-de-escuela-secundaria-florida':
                    $data['description'] = 'Diploma de Escuela Secundaria';
                    $data['metadescription'] .= "¿Necesitas apostillar un Diploma de Escuela Secundaria en Florida? Notaria Latina te ayuda con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar diploma secundario, apostillar diploma escuela secundaria, apostillar diploma escuela secundaria near me, apostillar diploma escuela secundaria florida, apostille high school diploma florida, donde apostillar diploma secundaria en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-transcripcion-de-escuela-secundaria-florida':
                    $data['description'] = 'Transcripción de Escuela Secundaria';
                    $data['metadescription'] .= "¿Necesitas apostillar una Transcripción de Escuela Secundaria en Florida? Nosotros te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar transcripcion de escuela secundaria, apostillar transcripcion de escuela secundaria near me, apostillar transcripcion de escuela secundaria florida, apostille high school transcript florida, donde apostillar transcripcion de escuela secundaria florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-incorporacion-florida':
                    $data['description'] = 'Certificado de Incorporación';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Incorporación en Florida? En Notaria Latina podemos ayudarte con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar certificado de incorporacion, apostillar acta de incorporacion, apostillar certificado de incorporacion near me, apostillar certificado de incorporacion florida, apostille certificate of incorporation florida, donde apostillar certificado de incorporacion en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-buena-reputacion-florida':
                    $data['description'] = 'Certificado de Buena Reputación';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Buena Reputación en Florida? Notaria Latina te ayuda con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar certificado de buena reputacion, apostillar certificado de buena reputacion near me, apostillar certificado de buena reputacion florida, apostille certificate of good standing florida, donde apostillar certificado de buena reputacion en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-origen-florida':
                    $data['description'] = 'Certificado de Origen';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Origen en Florida? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar certificado de origen, apostillar certificado de origen near me, apostillar certificado de origen florida, apostille certificate of origin florida, donde apostillar certificado de origen en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-marca-patente-florida':
                    $data['description'] = 'Marcas o Patentes';
                    $data['metadescription'] .= "¿Necesitas apostillar una Marca o Patente en Florida? En Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar marca florida, apostillar patente florida, apostillar marca near me, apostillar patente near me, apostillar marca, apostille mark florida, apostille patent florida, donde apostillar marca en florida, donde apostillar patente en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break; 
                case 'apostillar-poder-comercial-florida':
                    $data['description'] = 'Poder Comercial';
                    $data['metadescription'] .= "¿Necesitas apostillar un Poder Comercial en Florida? Notaria Latina te ayuda con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar poder comercial,  apostillar poder comercial florida, apostillar poder comercial near me, apostille commercial power florida, donde apostillar poder comercial florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-declaracion-jurada-comercial-florida':
                    $data['description'] = 'Declaración Jurada Comercial';
                    $data['metadescription'] .= "¿Necesitas apostillar una Declaración Jurada Comercial en Florida? Nosotros te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar declaracion jurada comercial, apostillar affidavit comercial, apostillar declaracion jurada comercial near me, apostillar declaracion jurada comercial florida, apostille commercial affidavit florida, apostillar affidavir comercial florida, donde apostillar affidavit comercial en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-certificado-fda-florida':
                    $data['description'] = 'Certificado FDA';
                    $data['metadescription'] .= "¿Necesitas apostillar un certificado FDA en Florida? En Notaria Latina te ayudamos con el trámite de una manera ágil y rápida 😉";
                    $data['keywords'] = ", apostillar certificado fda, apostillar certificado fda near me, apostillar certificado fda florida, apostille fda certificate florida, donde apostillar certificado fda en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-facturas-florida':
                    $data['description'] = 'Facturas';
                    $data['metadescription'] .= "¿Necesitas apostillar Facturas en Florida? Notaria Latina te ayuda con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar facturas, apostillar facturas near me, apostillar factura florida, apostille invoices florida, donde apostillar facturas en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;   
                case 'apostillar-departamento-de-hacienda-florida':
                    $data['description'] = 'Departamento de Hacienda';
                    $data['metadescription'] .= "Apostillamos Departamento de Hacienda en Florida de una manera ágil y rápida 😉";
                    $data['keywords'] = ", apostillar documento departamento de hacienda, apostillar departamento de hacienda near me, apostillar departamento de hacienda florida, apostille department of finance florida, donde apostillar departamento de hacienda en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-gobierno-extranjero-florida':
                    $data['description'] = 'Certificado de Gobierno Extranjero';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Gobierno Extranjero en Florida? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar certificado de gobierno extranjero, apostillar certificado de gobierno extranjero near me, apostillar certificado de gobierno extranjero florida, apostille foreign government certificate florida, apostillar certificado de gobierno extranjero en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;  
                case 'apostillar-certificado-de-venta-gratis-florida':
                    $data['description'] = 'Certificado de Venta gratis';
                    $data['metadescription'] .= "¿Necesitas apostillar un Certificado de Venta en Florida? En Notaria Latina te ayudamos con el proceso de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar certificado de venta, apostillar acta de venta, apostillar certificado de venta near me, apostillar acta de venta near me, apostillar certificado de venta florida, apostillar acta de venta florida, apostille sales certificate florida, donde apostillar certificado de venta en florida";
                    return view('web.office.apostille_layout', compact('data'));
                    break;
                case 'apostillar-ordenes-de-compra-florida':
                    $data['description'] = 'Órdenes de compra';
                    $data['metadescription'] .= "¿Necesitas apostillar una Órden de Compra en Florida? Nosotros te ayudamos con el trámite de una manera ágil y rápida 😉 Puedes enviar tus documentos por nuestro sitio web o acercarte a nuestras oficinas";
                    $data['keywords'] = ", apostillar orden de compra, apostillar orden de compra near me, apostillar orden de compra florida, apostille purchase order florida, donde apostillar orden de compra en florida";
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
            $data['urlmap'] = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3581.4033731651734!2d-80.256546!3d26.1509895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9072fab0cb6ff%3A0xb16f5b7ffcc06be4!2sNotar%C3%ADa%20Latina%20en%20Florida!5e0!3m2!1ses-419!2sec!4v1676310634077!5m2!1ses-419!2sec";
            $data['imgurlmap'] = "img/oficinas/maps-fl-2.webp";
            $data['imgurlmapmobile'] = "img/oficinas/maps-fl-mobile-2.webp";
            $data['metadescription'] = 'Realizamos Poderes Generales y Especiales, Apostilla y Traducción de todo tipo de documentos en Florida. ¿Desea saber más? ¡Contáctenos ahora! ✅';
            $data['keywords'] = 'notaria florida,
                notario cerca de mi,
                notaria cerca de mi, 
                notario publico cerca de mi,
                notarias publicas cerca de mi,
                notarios publicos cerca de mi,
                notaria en florida,  
                notaria sunrise, 
                notaria latina sunrise,
                notaria en sunrise fl, 
                notaria en sunrise florida, 
                notaria latina en sunrise florida, 
                notario publico en florida, 
                notaria publico florida,
                notaria publico en sunrise florida,
                notarizar documentos near me,
                notarizar en linea florida,
                notarizar en linea en florida,
                notarizar documentos,
                notarizar documentos en florida,
                notarizar documentos en sunrise florida, 
                tramitar documentos florida,
                tramitar documentos en florida,
                donde puedo tramitar documentos en florida,
                donde puedo tramitar un documento en florida,
                tramitar documentos sunrise florida,
                tramitar documentos en sunrise florida,
                notarizar documentos florida,
                notarizar documentos en florida,
                realizar tramite notarial florida,
                realizar tramite notarial en florida,
                realizar un tramite notarial en florida,
                donde puedo notarizar documentos en florida, 
                notarizar un documento,
                notarizar un documento florida,
                donde puedo notarizar un documento en florida,
                donde puedo realizar un tramite notarial florida,
                donde puedo realizar un tramite notarial en florida,
                donde puedo notarizar un documento cerca de mi,
                tramites notariales en florida,
                tramites notariales florida,
                tramites notariales sunrise florida,
                tramites notariales en sunrise florida,
                servicios notariales florida,
                servicios notariales en florida';
            $data['reviews'] = $this->reviewsfl;
            $data['more_reviews'] = $this->more_reviewsfl;
            $data['urlindications'] = "https://www.google.com/maps/dir//Notar%C3%ADa+Latina+en+Florida+2104+N+University+Dr+Sunrise,+FL+33322+Estados+Unidos/@26.1509895,-80.256546,16z/data=!4m5!4m4!1m0!1m2!1m1!1s0x88d9072fab0cb6ff:0xb16f5b7ffcc06be4";

            $consulates = DB::table('consulates')->select('slug')->get();

            return view('web.oficina', compact('data', 'consulates'));
        }
    } 

    public function sendEmailContact(Request $request, Partner $partner){

        if (!Str::startsWith($request->codpais, '+') || $request->aux != null || $request->email == "defensoria.asociada@gmail.com") {

            //ENVIO A MI CORREO SI OCURRE UNA DE ESTAS OPCIONES EN EL IF
            $to = "sebas31051999@gmail.com";
            $subject = 'Alguien ha intentado ingresar en formulario del partner ' . $partner->name . " " . $partner->lastname;
            $message = "<br><strong><h3>Datos del cliente</h3></strong>
                        <br>Nombre: " . strip_tags($request->name). " " . strip_tags($request->lastname) . "
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
            $to = "partners@notarialatina.com"; //partners@notarialatina.com,hserrano@notarialatina.com
            $subject = 'Lead para Partner Abogado - Notaria Latina';
            $message = "<br><strong><h3>Datos del cliente</h3></strong>
                        <br>Nombre: " . strip_tags($request->name). " " . strip_tags($request->lastname) . "
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
                        <p><b>Nombre:</b> " . strip_tags($request->name) . " " . strip_tags($request->lastname) . "</p>
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
                'nombre' => Purify::clean($request['name']) . " " . Purify::clean($request['lastname']),
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

    //Funcion que envia mail desde las paginas de las oficinas - /newjersey /newyork /florida
    public function sendEmailOficina(Request $request){
        // $pais = $this->getPaisByCodigo($request->cod_pais);

        if($request->aux != null || preg_match("/[a-zA-Z]/", $request->bbb) || !Str::startsWith($request->codpais, '+')){

            $message = "<br><strong>Nuevo Lead Landing</strong>
                        <br> Nombre: ". strip_tags($request->aaa)." " . strip_tags($request->lastname) ."
                        <br> Telef: ".strip_tags($request->codpais) ." ".  strip_tags($request->bbb)."
                        <br> Email: " . strip_tags($request->email) ."
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
                case 'Oficina New Jersey': $sendoffices = 'newjersey@notarialatina.com'; $abrev = 'nj'; $office = 'New Jersey'; break; //newjersey@notarialatina.com
                case 'Oficina New York': $sendoffices = 'newyork@notarialatina.com'; $abrev = 'ny'; $office = 'New York'; break; //newyork@notarialatina.com
                case 'Oficina Florida': $sendoffices = 'florida@notarialatina.com'; $abrev = 'fl'; $office = 'Florida'; break; //florida@notarialatina.com
                default: break;
            }

            switch ($request->service) {
                case 'Apostilla': $page = 'apostilla_' . $abrev; break; 
                case 'Poder Notariado': $page = 'poder_notari_' . $abrev; break;
                case 'Traduccion': $page = 'traducciones_' . $abrev; break;
                case 'Affidavit': $page = 'affidavit_' . $abrev; break;
                case 'Acuerdos': $page = 'acuerdos_' . $abrev; break;
                case 'Autorizaciones de Viaje': $page = 'autori_viaje_' . $abrev; break;
                case 'Cartas de Invitación': $page = 'carta_inv_' . $abrev; break;
                case 'Certificaciones': $page = 'certificaciones_' . $abrev; break;
                case 'Contratos': $page = 'contratos_' . $abrev; break;
                case 'Revocatorias': $page = 'revocatorias_' . $abrev; break;
                case 'Testamentos': $page = 'testamentos_' . $abrev; break;
                case 'Otro': $page = 'tramite_' . $abrev; break;
                default: break;
            }

            $token = 'KEY017C562DF36C32F89898F8D77773A25F_mu0OEZ7QDrNc2WRWCEgaHG';
            $datasend = [ 'name'=> strip_tags($request->aaa)." ". strip_tags($request->lastname), 'country' => strip_tags($request->pais), 'code' => strip_tags($request->codpais), 'phone' => strip_tags($request->bbb), 'email' =>  strip_tags($request->email), 'interest' => strip_tags($request->service), 'office' => strip_tags($office), 'message' => strip_tags($request->ddd), 'from' => url()->previous(), 'created_at'=> Carbon::now()->subHour(5)->format('Y-m-d H:i:s') ];    
            $postdata = json_encode($datasend);
            $opts = [ "http" => [ "method" => "POST", 'header' => "Content-Type: application/json\r\n". "x-auth-token: $token\r\n", 'content' => $postdata ], ]; 
            $context = stream_context_create($opts);
            file_get_contents('https://notarialatina.vercel.app/api/email', false, $context);


            $to = "notariapublicalatina@gmail.com," . $sendoffices; //notariapublicalatina@gmail.com,hserrano@notarialatina.com
            $subject = "Lead " . strip_tags($request->interest) . ": " . strip_tags($request->aaa);
            $message = "<br><strong><h3>Información del Lead</h3></strong>
                    <br><b>Nombre:</b> " . strip_tags($request->aaa). " " . strip_tags($request->lastname) ."
                    <br><b>País de residencia:</b> " . strip_tags($request->pais) ."
                    <br><b>Teléfono:</b> " .strip_tags($request->codpais) . " " . strip_tags($request->bbb) ."
                    <br><b>Email: </b> " . strip_tags($request->email) ."
                    <br><b>Mensaje:</b> " . strip_tags($request->ddd) . "
                    <br><b>Interes:</b> " . strip_tags($request->service) ."
                    <br><b>Proveniente:</b> Página de " . strip_tags($request->interest) . "
                    <br><b>Página: </b> " . url()->previous() . "
                    <br>
                    <img style='width: 150px; margin-top:20px' src='https://notarialatina.com/img/partners/WEB-HEREDADO.png' alt='IMAGEN NOTARIA LATINA'>
            ";

            $header = 'From: <'.$page. '@notarialatina.com>' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n".
            'Content-type:text/html;charset=UTF-8' . "\r\n"
            ;
    
            mail($to, $subject, $message, $header);
            mail('sebas31051999@gmail.com', $subject, $message, $header);
        }

        //$request->session()->flash('report', 'Se ha enviado el correo');

        //return back();

        return redirect()->route('landing.thank');
    }

    public function postStar(Request $request, Partner $partner){

        $rating = new Rating();
        $rating->user_id = $partner->id;
        $rating->rating = $request->input('star');
        $rating->comment = strip_tags($request->mensajeRating);
        $rating->name_customer = strip_tags($request->nameRating);
        $rating->country = $request->country_residenceRating;
        $partner->ratings()->save($rating);

        $to = "notariapublicalatina@gmail.com," . $partner->email;
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

        $recipient_email = 'notariapublicalatina@gmail.com'; //info@notarialatina.com

        if(isset($request->url_current)){
            switch ($request->url_current) {
                case 'web.oficina.newjersey': $recipient_email .= ",newjersey@notarialatina.com"; $abrev = '_nj'; $office = 'New Jersey'; break; //newjersey@notarialatina.com
                case 'web.oficina.newyork': $recipient_email .= ",newyork@notarialatina.com"; $abrev = '_ny'; $office = 'New York'; break; //newyork@notarialatina.com
                case 'web.oficina.florida': $recipient_email .= ",florida@notarialatina.com"; $abrev = '_fl'; $office = 'Florida'; break; //florida@notarialatina.com
                default: $recipient_email .= ",newyork@notarialatina.com"; break;
            }
        }

        switch ($request->document) {
            case 'Certificados de Nacimiento': $page = 'apostillas_cnac' . $abrev; break;
            case 'Reporte Consular (CRBA)': $page = 'apostillas_rc' . $abrev; break;
            case 'Certificados de Matrimonio': $page = 'apostillas_cm' . $abrev; break;
            case 'Certificados de Defunción': $page = 'apostillas_cdiv' . $abrev; break;
            case 'Certificados de Divorcio': $page = 'apostillas_cdef' . $abrev; break;
            case 'Certificados de Naturalización': $page = 'apostillas_cnat' . $abrev; break;
            case 'Expediente de Adopción': $page = 'apostillas_ea' . $abrev; break;
            case 'Copia de Pasaporte': $page = 'apostillas_cp' . $abrev; break;
            case 'Copia de Licencia de Conducir': $page = 'apostillas_lc' . $abrev; break;
            case 'Escrituras y Testamentos': $page = 'apostillas_et' . $abrev; break;
            case 'Declaraciones Juradas': $page = 'apostillas_dj' . $abrev; break;
            case 'Título de Coche/Automóvil': $page = 'apostillas_tc' . $abrev; break;
            case 'Autorización de Viaje': $page = 'apostillas_av' . $abrev; break;
            case 'Poder Notarial Personal': $page = 'apostillas_pn' . $abrev; break;
            case 'Registro de la Policía Estatal': $page = 'apostillas_rpe' . $abrev; break;
            case 'Registros de Antecedentes del FBI': $page = 'apostillas_rafbi' . $abrev; break;
            case 'Diploma Universitario': $page = 'apostillas_du' . $abrev; break;
            case 'Transcripción Universitaria': $page = 'apostillas_tu' . $abrev; break;
            case 'Diploma de Escuela Secundaria': $page = 'apostillas_des' . $abrev; break;
            case 'Transcripción de Escuela Secundaria': $page = 'apostillas_tes' . $abrev; break;
            case 'Certificado de Incorporación': $page = 'apostillas_ci' . $abrev; break;
            case 'Certificado de Buena Reputación': $page = 'apostillas_cbr' . $abrev; break;
            case 'Certificado de Origen': $page = 'apostillas_co' . $abrev; break;
            case 'Marcas o Patentes': $page = 'apostillas_mp' . $abrev; break;
            case 'Poder Comercial': $page = 'apostillas_pc' . $abrev; break;
            case 'Declaración Jurada Comercial': $page = 'apostillas_djc' . $abrev; break;
            case 'Certificado FDA': $page = 'apostillas_cfda' . $abrev; break;
            case 'Facturas': $page = 'apostillas_fact' . $abrev; break;
            case 'Departamento de Hacienda': $page = 'apostillas_dh' . $abrev; break;
            case 'Certificado de Gobierno Extranjero': $page = 'apostillas_cge' . $abrev; break;
            case 'Certificado de Venta gratis': $page = 'apostillas_cvg' . $abrev; break;
            case 'Órdenes de Compra': $page = 'apostillas_oc' . $abrev; break;
            default: $page = "apostillas" . $abrev; break;
        }
        
        $codigo_pais = $this->getCodByPais($request->cod_pais);

        //send to mongodb
        $token = 'KEY017C562DF36C32F89898F8D77773A25F_mu0OEZ7QDrNc2WRWCEgaHG';
        $datasend = [ 'name'=> strip_tags($request->name)." ". strip_tags($request->lastname), 'country' => strip_tags($request->cod_pais), 'code' => strip_tags($codigo_pais), 'phone' => strip_tags($request->phone), 'email' =>  strip_tags($request->email), 'interest' => strip_tags($request->document), 'office' => strip_tags($office), 'message' => strip_tags($request->mensaje), 'from' => url()->previous(), 'created_at'=> Carbon::now()->subHour(5)->format('Y-m-d H:i:s') ];    
        $postdata = json_encode($datasend);
        $opts = [ "http" => [ "method" => "POST", 'header' => "Content-Type: application/json\r\n". "x-auth-token: $token\r\n", 'content' => $postdata ], ]; 
        $context = stream_context_create($opts);
        file_get_contents('https://notarialatina.vercel.app/api/email', false, $context);


        //return $codigo_pais;

        $from_email		 = $page . "@notarialatina.com"; //from mail, sender email address
        //$recipient_email = 'sebas31051999@gmail.com'; //recipient email address info@notarialatina.com,hserrano@notarialatina.com
        
        $subject = 'Servicios de Apostilla | Notaria Latina - ' . date(now()); //subject for the email
        $message = "<br><strong><h3>Información del cliente</h3></strong>
        <br><b>Nombre:</b> " . strip_tags($request->name). " " . strip_tags($request->lastname) . "
        <br><b>País de residencia:</b> " . strip_tags($request->cod_pais) . "
        <br><b>Teléfono:</b> " . $codigo_pais ." " . strip_tags($request->phone) . "
        <br><b>Email:</b> " . strip_tags($request->email) . "
        <br><b>Página proveniente: </b> " . url()->previous() . "
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
            mail($recipient_email, $subject, $body, $headers);
            mail('sebas31051999@gmail.com', $subject, $body, $headers);
        } else {
            mail($recipient_email, $subject, $message, $headers);
            mail('sebas31051999@gmail.com', $subject, $message, $headers);
        }

        // if($sentMailResult){
        //     $request->session()->flash('success', 'Hemos enviado tu información');
        // } else {
        //     $request->session()->flash('error', 'Algo salio mal');
        // }
        
        //return back();

        return redirect()->route('landing.thank');
    }

    public function sendEmailToViewPhone(Request $request, Partner $partner){
    
        $ip = $_SERVER['REMOTE_ADDR'];

        $data = [
            'partner' => Str::lower(Str::studly($partner->name . ' ' . $partner->lastname . ' ' . $partner->id)),
            'ip' => $ip
        ];

        Cache::put('partner'.$partner->id, $data);

        $to = "partners@notarialatina.com";
        $subject = "Consulta por teléfono de partner: " . strip_tags($partner->name) . " " . strip_tags($partner->lastname) . " | ". date(now());
        $message = "<br><strong><h3>Datos del lead</h3></strong>
                <br><b>Nombre:</b> " . strip_tags($request->name). " " . strip_tags($request->lastname) . "
                <br><b>Teléfono:</b> " . strip_tags($request->phone) ."
                <br><b>País de residencia: </b> " . strip_tags($request->country_residence_view_phone) . "
                <br><b>Email:</b> " . strip_tags($request->email) . "
                <br>
                <img style='width: 150px; margin-top:20px' src='https://notarialatina.com/img/partners/WEB-HEREDADO.png' alt='IMAGEN NOTARIA LATINA'>
        ";
        $header = 'From: <partners@notarialatina.com>' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n".
        'Content-type:text/html;charset=UTF-8' . "\r\n"
        ;

        $customer = Customer::create([
            'nombre' => Purify::clean($request->name) . " " . Purify::clean($request->lastname),
            'email' => Purify::clean($request->email),
            'pais' => Purify::clean($request->country_residence_view_phone),
            'telefono' => Purify::clean($request->phone),
            'mensaje' => Purify::clean('Consulta por número telefónico')
        ]);

        $partner->customers()->attach($customer->id);

        mail($to, $subject, $message, $header);

        mail('sebas31051999@gmail.com', $subject, $message, $header);

        $request->session()->flash('solicited', 'Gracias por enviar tu valoración');

        return back();
    }

    public function eliminarCachePartner(Partner $partner){
        Cache::forget('partner'.$partner->id);
        return redirect()->back();
    }

    public function showvideos(){
        $videos = DB::table('video')->where('status', 1)->get();
        return view('web.videos.index', compact('videos'));
    }

    public function cita(Request $request){

        switch ($request->office) {
            case 'New York': $to = "newyork@notarialatina.com"; break;
            case 'New Jersey': $to = "newjersey@notarialatina.com"; break;
            case 'Florida': $to = "florida@notarialatina.com"; break;
            default: $to = "servicios@notarialatina.com"; break;
        }

        $subject = "Lead Cita Consular: " . strip_tags($request->name);
        $message = "<br><h3>Información del Lead</h3>
                    <br><b>Nombre:</b> " . strip_tags($request->name). " " . strip_tags($request->lastname) ."
                    <br><b>Teléfono:</b> " .strip_tags($request->phone) . " " . strip_tags($request->bbb) ."
                    <br><b>Email: </b> " . strip_tags($request->email) ."
                    <br><b>Oficina:</b> " . strip_tags($request->office) ."
                    <br><b>Mensaje:</b> " . strip_tags($request->message) . "
                    <br><b>Página: </b> " . url()->previous() . "
                    <br>
                    <img style='width: 150px; margin-top:20px' src='https://notarialatina.com/img/partners/WEB-HEREDADO.png' alt='IMAGEN NOTARIA LATINA'>
                    ";

        $header = 'From: <cita_consular@notarialatina.com>' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n".
            'Content-type:text/html;charset=UTF-8' . "\r\n"
        ;
    
        mail("notariapublicalatina@gmail.com,".$to, $subject, $message, $header);
        mail('sebas31051999@gmail.com', $subject, $message, $header);

        return redirect()->back()->with('status', 'Su información ha sido enviada');
    }

    public function setview(Request $request){
        $partner = Partner::where('id', $request->id)->first();
        $partner->views = $partner->views + 1;
        $partner->save();
        return response()->json($partner->views);
    }
}
