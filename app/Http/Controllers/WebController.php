<?php

namespace App\Http\Controllers;

use App\Consulate;
use App\Mail\SendLead;
use App\Partner;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
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
}
