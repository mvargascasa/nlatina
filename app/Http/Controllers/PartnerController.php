<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.partners');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

        $toPrincipal = 'hserrano@notarialatina.com';
        $toSecundario = ', notariapublicalatina@gmail.com';
        $toTerciario = ', sebas31051999@gmail.com';
        $subject = 'Suscripción de Partner - Abogado';
        $message = "<br><h2 style='color: #002542'><strong>Suscripción Abogado - Notaria Latina</strong></h2>
                    <br><strong>Nombre:</strong> " . strip_tags($request->nombre). " " . strip_tags($request->apellido)."
                    <br><strong>Especialidad:</strong> " . strip_tags($request->especialidad)."
                    <br><strong>Pais:</strong> " . strip_tags($pais)."
                    <br><strong>Telefono:</strong> " . strip_tags($request->get('cod_pais')) . " " . strip_tags($request->telefono)."
                    <br><strong>Email:</strong> " . strip_tags($request->email)."
        ";

        $header = 'From: <partners@notarialatina.com>' . "\r\n" .
                'Content-type:text/html;charset=UTF-8';
        
        mail($toPrincipal.$toSecundario, $subject, $message, $header);

        return view('web.thankpartner');
        
    }
}
