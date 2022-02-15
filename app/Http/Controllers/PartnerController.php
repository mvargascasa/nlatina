<?php

namespace App\Http\Controllers;

use App\Partner;
use App\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fecha_publicado = null;
        $created_at = null;
        $status = null;
        static $orderBy = 'asc';

        if($request->publicadosHoy != null){
            $fecha_publicado = $request->publicadosHoy;
        }

        if($request->registradosHoy != null){
            $created_at = $request->registradosHoy;
        }

        if($request->nopublicados != null){
            $status = $request->nopublicados;
        } else if($request->publicados != null){
            $status = $request->publicados;
        }

        if ($request->orderBy == 'desc') {
            $orderBy = 'asc';
        } else if($request->orderBy == 'asc'){
            $orderBy = 'desc';
        }

        $name = $request->get('name');
        
        $published = Partner::where('status', '=', 'PUBLICADO')->count();
        $notpublished = Partner::where('status', '=', 'NO PUBLICADO')->count();
        $verified = Partner::where('email_verified_at', '!=', 'null')->count();
        $countPublicadosHoy = Partner::where('fecha_publicado', 'LIKE', '%' . Str::limit(date(now()), 10, '') . '%')->count();
        $countRegistradosHoy = Partner::where('created_at', 'LIKE', '%' . Str::limit(date(now()), 10, '') . '%')->count();
        
        // if($request->orderBy != null){

            $partners = Partner::name($name)
            ->fechaPublicado($fecha_publicado)
            ->createdAt($created_at)
            ->status($status)
            ->orderBy('id', $orderBy)
            ->paginate(10);

            

            // return $orderBy;
        
        // } else {
        //     $partners = Partner::name($name)
        //     ->fechaPublicado($fecha_publicado)
        //     ->createdAt($created_at)
        //     ->status($status)
        //     //->orderBy('id', $request->orderBy)
        //     ->paginate(10);

        //     $links = $partners->links();
        // }

        return view('admin.partner.index', compact('partners', 'published', 'notpublished', 'verified', 'countPublicadosHoy', 'countRegistradosHoy', 'orderBy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Partner $partner)
    {
        return view('admin.partner.form', $partner);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        $specialties = Specialty::all();
        return view('admin.partner.show', compact('partner', 'specialties'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {

        if($request->img_profile == null && $partner->img_profile != null){ //IF PARA VALIDAR SI EL USUARIO NO CAMBIA SU FOTO DE PERFIL
            $request->img_profile = $partner->img_profile;
        } else if($request->img_profile != null && $partner->img_profile != null){
            $url = Storage::put('partners', $request->file('img_profile'));
            Storage::delete($partner->img_profile);
            $partner->img_profile = $url;
        } else if($request->img_profile != null && $partner->img_profile == null){
            $url = Storage::put('partners', $request->file('img_profile'));
            $partner->img_profile = $url;
        }

        if($request->specialties){
            $partner->specialties()->detach();
            $partner->specialties()->attach($request->specialties);
        }

        if($request->company == "Empresa"){
            $request->validate([
                'company_name' => 'required'
            ]);
            $partner->company = $request->company;
            $partner->company_name = $request->company_name;
        } else {    
            $partner->company = $request->company;
            $partner->company_name = null;
        }
        
        $partner->status = $request->status;
        $partner->name = $request->name;
        $partner->lastname = $request->lastname;
        $partner->title = $request->title;
        $partner->email = $request->email;
        $partner->nationality = $request->nationality;
        $partner->country_residence = $request->country_residence;
        $partner->codigo_pais = $request->codigo_pais;
        $partner->phone = $request->phone;
        $partner->state = $request->state;
        $partner->city = $request->city;
        $partner->address = $request->address;
        $partner->link_facebook = $request->link_facebook;
        $partner->link_instagram = $request->link_instagram;
        $partner->link_linkedin = $request->link_linkedin;
        $partner->website = $request->website;
        // $partner->company = $request->company;
        $partner->specialty = $request->specialty;
        $partner->biography_html = $request->biography_html;
        $partner->slug = Str::slug($request->name . ' ' . $request->lastname . ' ' . $partner->id, '-'); 
        
        if($request->status == "PUBLICADO" && $partner->fecha_publicado == null){
            $partner->fecha_publicado = date(now());
            $this->sendEmailPublicado($partner);
        }

        $partner->save();

        // if($request->status == "PUBLICADO" && $partner->fecha_publicado != null && Str::limit($partner->fecha_publicado, 10, '') == Str::limit(date(now()), 10, '')){ //|| ($request->status == "PUBLICADO" && $partner->fecha_publicado != date(now()))
            
        // }
        
        return redirect()->route('partner.index')->with('success', 'Se actualizaron los datos');
    }

    public function viewLastPublicated(){
        $partners = Partner::where('status', 'PUBLICADO')
            ->orderBy('updated_at', 'desc')
            ->limit(10)
            ->get();

        return view('admin.partner.form', compact('partners'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::find($id);
        
        if($partner->img_profile != null){
            Storage::delete($partner->img_profile);
        }

        $partner->delete();

        return redirect()->route('partner.index');
    }

    public function verifiEmailAdmin(Partner $partner)
    {
        $partner->email_verified_at = date('Y-m-d h:i:s', time());
        $partner->save();
        return back()->with('success', 'Se ha verificado el correo del usuario');
    }

    public function sendEmailPublicado(Partner $partner){ 

        $to = $partner->email;
        $subject = "Perfil Publicado - Notaria Latina";
        $message = "<br><strong><h3>¡Felicidades " . $partner->name . "! Tu perfil ha sido publicado en Notaria Latina 😉</h3></strong>
                <br>En este momento tu perfil se está visualizando en nuestro sitio web para que tus clientes potenciales puedan encontrarte.
                <br>Puedes ver tu perfil dando click en este <a href='https://notarialatina.com/partners/$partner->slug'>enlace</a> que te redireccionará a tu información publicada
                <br><b>Fecha de publicación: </b> " . strip_tags(Str::limit(date(now()), 10, '')) . "
                <br>
                <img style='width: 150px; margin-top:20px' src='https://notarialatina.com/img/partners/WEB-HEREDADO.png' alt='IMAGEN NOTARIA LATINA'>
        ";
        $header = 'From: <partners@notarialatina.com>' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n".
        'Content-type:text/html;charset=UTF-8' . "\r\n"
        ;

        mail($to, $subject, $message, $header);
        
    }

}
