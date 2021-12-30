<?php

namespace App\Http\Controllers;

use App\Partner;
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
        $partners = Partner::all();
        return view('admin.partner.index', compact('partners'));
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
        return view('admin.partner.show', compact('partner'));
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
        $request->validate([
            'status' => 'required'
        ]);
        
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
