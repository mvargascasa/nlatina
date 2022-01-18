<?php

namespace App\Http\Controllers;

use App\Consulate;
use App\Http\Traits\GetCountryByCodTrait;
use App\Mail\SendLead;
use App\Partner;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    use GetCountryByCodTrait;

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
        $countries = Partner::select('country_residence')
        ->where('status', 'PUBLICADO')
        ->distinct()
        ->get();

        $specialties = Partner::select('specialty')
                ->where('status', 'PUBLICADO')
                ->distinct()
                ->get();            

        $country = $request->get('country');
        $specialty = $request->get('specialty');

        $partners = Partner::select(['id', 'img_profile', 'name', 'codigo_pais', 'specialty', 'nationality', 'phone', 'email'])
                ->where('status', 'PUBLICADO')
                ->orderBy('id', 'DESC')
                ->country($country)
                ->specialty($specialty)
                ->distinct()
                ->get();

        return view('web.partners', compact('partners', 'countries', 'specialties'));
    }

    public function showPartner($id){
        $partner = Partner::find($id); 
        return view('web.partner', compact('partner'));
    }

    public function oficinasnj(){
        $data['oficina'] = 'New Jersey';
        $data['telfHidden'] = '+19082249594';
        $data['telfShow'] = '908 224-9594';
        $data['imgapostilla'] = 'img/oficinas/apostillanj.png';
        $data['imgup'] = 'img/oficina-notaria-latina-newjersey.jpg';
        $data['imgdown'] = 'img/oficinas/CHICA-APOST-RECORTADO.png';
        $data['urlmap'] = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3026.4152573854667!2d-74.21549248459648!3d40.66481847933702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24d541387e7ff%3A0x335c07b09362e483!2s1146%20E%20Jersey%20St%2C%20Elizabeth%2C%20NJ%2007201%2C%20EE.%20UU.!5e0!3m2!1ses!2sec!4v1642459239606!5m2!1ses!2sec';

        return view('web.oficina', compact('data'));
    }

    public function oficinasfl(){
        $data['oficina'] = 'Florida';
        $data['telfHidden'] = '+13054229149';
        $data['telfShow'] = '305 422-9149';
        $data['imgapostilla'] = 'img/oficinas/apostillafl.png';
        $data['imgup'] = 'img/oficina-notaria-florida.jpg';
        $data['imgdown'] = 'img/oficinas/Plaza_opt.jpg';
        $data['urlmap'] = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3581.404392613644!2d-80.25914568497105!3d26.150956283461554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d90638fe895e7b%3A0xaa63cebf0d7899!2s2104%20N%20University%20Dr%2C%20Sunrise%2C%20FL%2033322%2C%20EE.%20UU.!5e0!3m2!1ses!2sec!4v1642375956270!5m2!1ses!2sec';

        return view('web.oficina', compact('data'));
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
                    <br>Nombre: " . strip_tags($partner->name) ."
                    <br>Especialidad: " . strip_tags($partner->specialty) ."
                    <br>Teléfono: " . strip_tags($partner->phone) ."
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
        $to = "sebas31051999@gmail.com";
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
}
