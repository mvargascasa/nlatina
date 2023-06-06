<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Partner;
use App\Specialty;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // static $orderBy = 'asc';

        // if($request->nopublicados != null){
        //     $status = $request->nopublicados;
        // } else if($request->publicados != null){
            //     $status = $request->publicados;
        // }
        
        $name = $request->get('name');
        $lastname = $request->get('lastname');
        
        $total = Partner::count();
        $published = Partner::where('status', '=', 'PUBLICADO')->count();
        $notpublished = Partner::where('status', '=', 'NO PUBLICADO')->count();
        $verified = Partner::where('email_verified_at', '!=', 'null')->count();
        $countPublicadosHoy = Partner::where('fecha_publicado', 'LIKE', '%' . Str::limit(date(now()), 10, '') . '%')->count();
        $countRegistradosHoy = Partner::where('created_at', 'LIKE', '%' . Str::limit(date(now()), 10, '') . '%')->count();
        
        if($request->publicadosHoy != null){
            
            $contadorPaginatePublicados = $countPublicadosHoy + 1;

            $fecha_publicado = $request->publicadosHoy;

            $partners = Partner::name($name)
                ->lastname($lastname)
                ->fechaPublicado($fecha_publicado)
                ->createdAt($created_at)
                ->status($status)
                ->orderBy('id', 'desc')
                ->paginate($contadorPaginatePublicados);
        } else 
        if($request->registradosHoy != null){

            $contadorPaginateRegistrados = $countRegistradosHoy + 1;

            $created_at = $request->registradosHoy;

            $partners = Partner::name($name)
                ->lastname($lastname)
                ->fechaPublicado($fecha_publicado)
                ->createdAt($created_at)
                ->status($status)
                ->orderBy('id', 'desc')
                ->paginate($contadorPaginateRegistrados);
        } else {
            $partners = Partner::name($name)
                ->lastname($lastname)
                //->fechaPublicado($fecha_publicado)
                //->createdAt($created_at)
                ->status($status)
                ->orderBy('id', 'desc')
                ->paginate(10);
        }

        return view('admin.partner.index', compact('partners', 'total', 'published', 'notpublished', 'verified', 'countPublicadosHoy', 'countRegistradosHoy'));
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
        $comments_status = DB::table('comments_status')->select('type', 'type_value', 'comment', 'created_at')->where('partner_id', $partner->id)->get();
        $specialties = Specialty::all();
        return view('admin.partner.show', compact('partner', 'specialties', 'comments_status'));
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
        //set comment into table comments_status if status = no aplica
        if(isset($request->comment) && ($request->status == "NO APLICA" || $request->status == "NO PUBLICADO")){
            DB::table('comments_status')->insert([
                'partner_id' => $partner->id,
                'type' => 'STATUS',
                'type_value' => $request->status,
                'comment' => $request->comment
            ]);
        };

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

        if(isset($request->presentation)){
            if(Storage::exists($partner->url_video)) Storage::delete($partner->url_video);
            $url_video = Storage::put('videos', $request->file('presentation'));
            $partner->url_video = $url_video;
        }

        if($request->specialties){
            $partner->specialties()->detach();
            $partner->specialties()->attach($request->specialties);
        }

        if($request->company == "Empresa"){
            // $request->validate([
            //     'company_name' => 'required'
            // ]);
            $partner->company = $request->company;
            $partner->company_name = $request->company_name;
        } else {    
            $partner->company = $request->company;
            $partner->company_name = null;
        }

        if($request->status == "NO PUBLICADO" && ($partner->status == "PUBLICADO" || $partner->status == null || $partner->status == "")){
            $this->sendEmailPartnerDesactivado($partner);
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
        $partner->numlicencia = $request->numlicencia;
        $partner->link_facebook = $request->link_facebook;
        $partner->link_instagram = $request->link_instagram;
        $partner->link_linkedin = $request->link_linkedin;
        $partner->website = $request->website;
        // $partner->company = $request->company;
        $partner->specialty = $request->specialty;
        $partner->biography_html = $request->biography_html;
        //$partner->slug = Str::slug('abogado en ' . $partner->city . ' ' . $partner->state . ' ' . $partner->country_residence . ' ' . $partner->id, '-');
        //$partner->slug = Str::slug($request->name . ' ' . $request->lastname . ' ' . $partner->id, '-'); 
        
        if($request->status == "PUBLICADO" && $partner->fecha_publicado == null){
            $partner->fecha_publicado = date(now());
            $this->sendEmailPublicado($partner);
        }

        $partner->save();

        return redirect()->route('partner.show', $partner)->with('success', 'Se actualizaron los datos');
    }

    public function viewLastPublicated(){

        $total = Partner::count();
        $published = Partner::where('status', '=', 'PUBLICADO')->count();
        $notpublished = Partner::where('status', '=', 'NO PUBLICADO')->count();
        $verified = Partner::where('email_verified_at', '!=', 'null')->count();
        $countPublicadosHoy = Partner::where('fecha_publicado', 'LIKE', '%' . Str::limit(date(now()), 10, '') . '%')->count();
        $countRegistradosHoy = Partner::where('created_at', 'LIKE', '%' . Str::limit(date(now()), 10, '') . '%')->count();
        
        $partners = Partner::where('status', 'PUBLICADO')
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('admin.partner.index', compact('partners', 'total', 'published', 'notpublished', 'verified', 'countPublicadosHoy', 'countRegistradosHoy'));
    }

    public function getAllNotPublicated(){
        
        $total = Partner::count();
        $published = Partner::where('status', '=', 'PUBLICADO')->count();
        $notpublished = Partner::where('status', '=', 'NO PUBLICADO')->count();
        $verified = Partner::where('email_verified_at', '!=', 'null')->count();
        $countPublicadosHoy = Partner::where('fecha_publicado', 'LIKE', '%' . Str::limit(date(now()), 10, '') . '%')->count();
        $countRegistradosHoy = Partner::where('created_at', 'LIKE', '%' . Str::limit(date(now()), 10, '') . '%')->count();
        
        $partners = Partner::where('status', 'NO PUBLICADO')
        ->orderBy('id', 'asc')
        ->paginate(10);

        return view('admin.partner.index', compact('partners', 'total', 'published', 'notpublished', 'verified', 'countPublicadosHoy', 'countRegistradosHoy'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $partner = Partner::find($id);
        
    //     // if($partner->img_profile != null){
    //     //     Storage::delete($partner->img_profile);
    //     // }

    //     $partner->delete();

    //     return redirect()->route('partner.index');
    // }

    public function verifiEmailAdmin(Partner $partner)
    {
        $partner->email_verified_at = date('Y-m-d h:i:s', time());
        $partner->save();
        return back()->with('success', 'Se ha verificado el correo del usuario');
    }

    public function sendEmailPublicado(Partner $partner){ 

        $to = $partner->email;
        $subject = "Perfil Publicado - Notaria Latina";
        $message = "<br><strong><h3>¡Felicidades " . $partner->name . "! Su perfil ha sido publicado en Notaria Latina 😉</h3></strong>
                <br>En este momento Su perfil se está visualizando en nuestro sitio web para que sus clientes potenciales puedan encontrarlo/a.
                <br>¿Por qué no incrementar su visibilidad online? Si aún no lo hace, suba un video de presentación a su perfil o envielo a nuestro <a href='https://api.whatsapp.com/send?phone=13474283543'>WhatsApp</a> donde será publicado en nuestras plataformas para un mayor alcance.
                <br><b>Fecha de publicación: </b> " . strip_tags(Str::limit(date(now()), 10, '')) . "
        ";
        
        $header = 'From: <partners@notarialatina.com>' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n".
        'Content-type:text/html;charset=UTF-8' . "\r\n"
        ;

        mail($to, $subject, $message, $header);
        
    }

    //SE ENVIA EL CORREO PERSONALIZADO INDIVIDUAL AL PARTNER DESDE EL ADMIN
    public function sendEmailPartner(Request $request, Partner $partner){
        $to = $partner->email;
        $subject = $request->asunto;
        $message = $request->mensaje;
        // $message .= "
        //         <br>
        //         <img style='width: 150px; margin-top:20px' src='https://notarialatina.com/img/partners/WEB-HEREDADO.png' alt='IMAGEN NOTARIA LATINA'>
        // ";
        $header = 'From: <partners@notarialatina.com>' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n".
        'Content-type:text/html;charset=UTF-8' . "\r\n"
        ;

        $send_email = mail($to, $subject, $message, $header);

        $email_sended = DB::table('email_sended')->insert([
            'partner_id' => $partner->id,
            'partner_name' => $partner->name,
            'partner_lastname' => $partner->lastname,
            'partner_email' => $partner->email,
            'subject' => $subject,
            'message' => $message
        ]);

        if($send_email && $email_sended) $request->session()->flash('emailsent', 'Se ha enviado el correo');
        else $request->session()->flash('emailsent', 'No se pudo enviar el mensaje');

        return back();
    }

    //ENVIA CORREO DESACTIVADO CUANDO EL STATUS CAMBIE A NO PUBLICADO Y LA FECHA_PUBLICADO SEA != NULL
    public function sendEmailPartnerDesactivado(Partner $partner){
        $to = $partner->email;
        $subject = "Perfil No Publicado - Notaria Latina";
        $message = "<div style='font-size:13px; margin-top: 5%; margin-left: 5%; margin-right: 5%; margin-bottom: 5%;'>
                    <br><strong><h3>Hola " . $partner->name . ". Reciba un cordial saludo de Notaria Latina</h3></strong>
                    <br>Queremos informarle que su perfil no ha sido publicado en nuestra plataforma debido a que algunos campos están incompletos o no cumplen con los requisitos necesarios.
                    <br>Una vez que complete su información restante su perfil será publicado en nuestro sitio web.
                    <br>Puede Iniciar Sesión y editar su perfil o si tiene alguna inquietud no dude en contactarnos por este medio o por <a href='https://api.whatsapp.com/send?phone=13474283543'>Whatsapp</a>
                    <br>
                    <br><b><i>¡Notaria Latina, formando parte de su crecimiento!</i></b>
                </div>
        ";
        $header = 'From: <partners@notarialatina.com>' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n".
        'Content-type:text/html;charset=UTF-8' . "\r\n"
        ;

        mail($to, $subject, $message, $header);
    }

    public function showallcustomers(){
        $customers = Customer::with('partners')
                    ->orderBy('id', 'desc')
                    ->paginate(10);
        $totalCustomers = Customer::count();
        return view('admin.partner.allcustomers', compact('customers', 'totalCustomers'));
    }

    //funcion de prueba para setear un nuevo slug en el partner
    public function setslug(Partner $partner){
        $partner->old_slug = $partner->slug;
        if ($partner->country_residence == $partner->state && $partner->state == $partner->city) {
            $newslug = Str::slug('abogado en ' . $partner->country_residence . ' ' . $partner->id);
        } else if($partner->state == $partner->city){
            $newslug = Str::slug('abogado en ' . $partner->state . ' ' . $partner->country_residence . ' ' . $partner->id);
        } else {
            $newslug =  Str::slug('abogado en ' . $partner->city . ' ' . $partner->state . ' ' . $partner->country_residence . ' ' . $partner->id);
        }
        $partner->slug = $newslug;
        $partner->save();
        return redirect()->route('partner.show', $partner);
    }

    public function redirectIfPartnerId($id){
        $partner = Partner::find($id);
        return redirect()->route('partner.show', $partner);
    }

    public function viewemailsended(Request $request){
        // if($request->name != null || $request->lastname != null){
        //     $partner = Partner::select('id')->where('name', 'LIKE', "%$request->name%")->where('lastname', 'LIKE', "%$request->lastname%")->get();
        //     if(count($partner)>0) $emails_sended = DB::table('email_sended')->where('partner_id', $partner->id)->get();
        // } else {
            $emails_sended = DB::table('email_sended')->paginate(10);
        // }
        return view('admin.partner.emails.index',compact('emails_sended'));
    }

    public function showemail($id){
        $email = DB::table('email_sended')->where('id_email_sended', $id)->first();
        return view('admin.partner.emails.show', compact('email'));
    }

    public function indexnotifications(){
        $changes = DB::table('updated_partner')->orderBy('id_updated_partner', 'DESC')->paginate(5);
        return view('admin.partner.notifications.index', compact('changes'));
    }

    public function setviewednotification($id_updated_partner){
        $updated_partner = DB::table('updated_partner')->where('id_updated_partner', $id_updated_partner)->first();
        if($updated_partner){
            if($updated_partner->viewed == false){
                DB::update('update updated_partner set viewed = ? where id_updated_partner = ?', [true, $updated_partner->id_updated_partner]);
            }
            $partner = Partner::find($updated_partner->partner_id);
            return redirect()->route('partner.show', $partner);
        }
        return "no se encontro";
    }

    public function formassignlead(Request $request, $id){

        $customer = Customer::where('id', $id)->first();

        $countries = DB::table('countries')->get();

        $specialties = DB::table('specialties')->get();

        $partners = Partner::select('id', 'name', 'lastname')->where('country_residence', 'LIKE', "%$customer->pais%")->where('state', 'LIKE', "%$customer->estado%")->where('status', 'PUBLICADO')->get();

        return view('admin.assign-lead', compact('customer', 'partners', 'countries', 'specialties'));
    }

    public function assignlead(Request $request){

        $customer = Customer::where('id', $request->customer_id)->first();
        $country = Country::where('name_country ',$customer->pais)->first();
        $phonecode = $country->phonecode??'';
        $partner = Partner::where('id', $request->partner_id)->first();
        $partner->customers()->attach($customer->id);
        $customer->tipo = "ASIGNADO";
        $customer->save();

        $message = "<br><strong>Notaria Latina le ha referido un Cliente</strong>
                    <br><b> Nombre:</b> ". strip_tags($customer->nombre). "
                    <br><b> Telef: </b> +".$phonecode.' '.strip_tags($customer->telefono)."
                    <br><b> Email: </b>" . strip_tags($customer->email) ."
                    <br><b> País: </b>" .strip_tags($customer->pais)."
                    <br><b> Estado: </b>" . strip_tags($customer->estado) . "
                    <br><b> Caso: </b>". strip_tags($customer->mensaje)." 
                    <br>Puede ingresar a su perfil en nuestro sitio web y visualizar más información.";
                            
        $header='';
        $header .= 'From: <partners@notarialatina.com>' . "\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($partner->email,'Cliente Asignado: '. strip_tags($customer->nombre), $message, $header);

        return redirect()->route('partner.form.assign.lead', $customer->id)->with('status', 'Se asigno el lead: ' . $customer->nombre . ' al Abogado: ' . $partner->name . " " . $partner->lastname);
    }

    public function searchpartnertoassign(Request $request){

        $country = Country::select('name_country')->where('id', $request->country)->first();
        $partners = Partner::where('country_residence', 'LIKE', "%$country->name_country%")->where('state', 'LIKE', "%$request->state%")->specialties($request->specialty)->where('status', 'PUBLICADO')->with('customers')->get();
        return response()->json($partners);
    }

    public function deleteFileVideo(Partner $partner){
        if(Storage::exists($partner->url_video) || $partner->url_video != null){
            Storage::delete($partner->url_video);
            $partner->url_video = null;
            $partner->save();
        }
        return redirect()->route('partner.show', $partner)->with('delete-file', 'Se elimino el video del abogado/a: ' . $partner->name);
    }
    //ENVIAR CORREO A LOS PARTNERS QUE NO TIENEN NUMERO DE LICENCIA
    // public function sendEmailMasivo(Request $request){
    //     $to = $request->emails;
    //     $subject = $request->asunto;
    //     $message = $request->mensaje;
    //     $message .= "
    //             <br>
    //             <img style='width: 150px; margin-top:20px' src='https://notarialatina.com/img/partners/WEB-HEREDADO.png' alt='IMAGEN NOTARIA LATINA'>
    //     ";
    //     $header = 'From: <partners@notarialatina.com>' . "\r\n" .
    //     'MIME-Version: 1.0' . "\r\n".
    //     'Content-type:text/html;charset=UTF-8' . "\r\n"
    //     ;

    //     $send = mail($to, $subject, $message, $header);

    //     if($send){
    //         $request->session()->flash('emailsent', 'Se han enviado los correos');
    //     } else {
    //         $request->session()->flash('notemailsent', 'Hubo un error en el envio de los correos');
    //     }

    //     return back();
    // }

}
