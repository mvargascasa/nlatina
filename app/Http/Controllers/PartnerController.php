<?php

namespace App\Http\Controllers;

use App\Partner;
use App\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
    public function index()
    {
        $total = Partner::count();
        $published = Partner::where('status', '=', 'PUBLICADO')->count();
        $notpublished = Partner::where('status', '=', 'NO PUBLICADO')->count();
        $verified = Partner::where('email_verified_at', '!=', 'null')->count();

        $partners = Partner::orderBy('id', 'desc')
                    ->paginate(10);
        return view('admin.partner.index', compact('partners', 'total', 'published', 'notpublished', 'verified'));
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
        // return $request;
        // $request->validate([
        //     'status' => 'required',
        //     'name' => 'required',
        //     'email' => 'required',
        //     'nationality' => 'required',
        //     'country_residence' => 'required',
        //     'phone' => 'required',
        //     'state' => 'required',
        //     'city' => 'required',
        //     'address' => 'address',
        //     'company' => 'required',
        //     'specialties' => 'required|max:3',
        //     'specialty' => 'required',
        //     'biography_html' => 'required'
        // ]);
        if($request->img_profile == null && $partner->img_profile != null){
            $request->img_profile = $partner->img_profile;
            $request->validate([
                'img_profile' => 'image|max:1000',
            ]);
        } else {
            $request->validate([
                'img_profile' => 'required|image|max:1000',
            ]);
            $url = Storage::put('partners', $request->file('img_profile'));
            $partner->img_profile = $url;
        }

        if($request->specialties){
            $partner->specialties()->detach();
            $partner->specialties()->attach($request->specialties);
        }
        
        $partner->status = $request->status;
        $partner->name = $request->name;
        $partner->lastname = $request->lastname;
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
        $partner->company = $request->company;
        $partner->specialty = $request->specialty;
        $partner->biography_html = $request->biography_html;
        
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

    public function verifiEmailAdmin(Partner $partner)
    {
        $partner->email_verified_at = date('Y-m-d h:i:s', time());
        $partner->save();
        return back()->with('success', 'Se ha verificado el correo del usuario');
    }

    public function sendEmail(Partner $partner){ 

        // switch ($cod_pais) {
        //     case '+54': $pais = "Argentina"; break;
        //     case '+591': $pais = "Bolivia"; break;
        //     case '+57': $pais = "Colombia"; break;
        //     case '+506': $pais = "Costa Rica"; break;
        //     case '+593': $pais = "Ecuador"; break;
        //     case '+503': $pais = "El Salvador"; break;
        //     case '+34': $pais = "España"; break;
        //     case '+1': $pais = "Estados Unidos"; break;
        //     case '+502': $pais = "Guatemala"; break;
        //     case '+504': $pais = "Honduras"; break;
        //     case '+52': $pais = "México"; break;
        //     case '+505': $pais = "Nicaragua"; break;
        //     case '+507': $pais = "Panamá"; break;
        //     case '+595': $pais = "Paraguay"; break;
        //     case '+51': $pais = "Perú"; break;
        //     case '+1 787': $pais = "Puerto Rico"; break;
        //     case '+1 809': $pais = "República Dominicana"; break;
        //     case '+598': $pais = "Uruguay"; break;
        //     case '+58': $pais = "Venezuela"; break;
        //     default:
        //         # code...
        //         break;
        // }

        

        //hserrano@notarialatina.com
        //notariapublicalatina@gmail.com
        // return view('web.thankpartner');
        
    }

}
