<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'specialty' => 'required',
            'country_residence' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'img_profile' => 'required | image',
            'biography_html' => 'required',
            'status' => 'required'
        ]);

        $url = Storage::put('partners', $request->file('img_profile'));

        $partner = new Partner();

        $partner->name = $request->name;
        $partner->lastname = $request->lastname;
        $partner->specialty = $request->specialty;
        $partner->country_residence = $request->country_residence;
        $partner->phone = $request->phone;
        $partner->email = $request->email;
        $partner->biography_html = $request->biography_html;
        $partner->img_profile = $url;
        $partner->status = $request->status;

        $partner->save();

        return redirect()->route('partner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('admin.partner.edit', compact('partner'));
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

        if($request->img_profile == null){
            $request->img_profile = $partner->img_profile;
        } else {
            $url = Storage::put('partners', $request->file('img_profile'));
            $partner->img_profile = $url;
        }
        
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'specialty' => 'required',
            'country_residence' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'img_profile' => 'image',
            'biography_html' => 'required',
            'status' => 'required'
        ]);
        
        $partner->name = $request->name;
        $partner->lastname = $request->lastname;
        $partner->specialty = $request->specialty;
        $partner->country_residence = $request->country_residence;
        $partner->phone = $request->phone;
        $partner->email = $request->email;
        $partner->biography_html = $request->biography_html;
        $partner->status = $request->status;
        
        $partner->save();
        
        return redirect()->route('partner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sendEmail(Request $request){

        switch ($request->get('cod_pais')) {
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

        $subject = 'Suscripción de Partner - Abogado';
        $message = "<br><strong>Suscripción Abogado - Notaria Latina</strong>
                    <br>Nombre: " . strip_tags($request->nombre). " " . strip_tags($request->apellido)."
                    <br>Especialidad: " . strip_tags($request->especialidad)."
                    <br>Pais: " . strip_tags($pais)."
                    <br>Telefono: " . strip_tags($request->get('cod_pais')) . " " . strip_tags($request->telefono)."
                    <br>Email: " . strip_tags($request->email)."
        ";

        $header = 'From: <partners@notarialatina.com>' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n".
                'Content-type:text/html;charset=UTF-8' . "\r\n"
                ;
        
        mail("hserrano@notarialatina.com,notariapublicalatina@gmail.com", $subject, $message, $header);

        return view('web.thankpartner');
        
    }

    public function showAllPartners(Request $request){

        $countries = Partner::select('country_residence')
                    ->distinct()
                    ->get();

        $specialties = Partner::select('specialty')
                    ->distinct()
                    ->get();            

        $country = $request->get('country');
        $specialty = $request->get('specialty');
        
        $partners = Partner::select(['id', 'img_profile', 'name', 'lastname', 'specialty', 'country_residence', 'phone', 'email'])
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

}
