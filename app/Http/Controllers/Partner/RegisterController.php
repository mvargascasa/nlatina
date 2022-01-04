<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request){
        
        $request->validate([
            'name' => 'required',
            'nationality' => 'required',
            'phone' => 'required',
            'company' => 'required',
            'email' => 'required|unique:partners,email|min:10|max:191',
            'password' => 'required|string|min:8|max:255'
        ]);
        
        $partner = Partner::create([
            'name' => $request['name'],
            'nationality' => $request['nationality'],
            'phone' => $request['phone'],
            'company' => $request['company'],
            'email'=> $request['email'],
            'password'=> bcrypt($request['password']),
        ]);
    
        $this->sendEmail($partner);

        return redirect()->route('partner.showform')->with('success', 'Register complete!');
    }

    public function sendEmail(Partner $partner){
        $to = "notariapublicalatina@gmail.com,hserrano@notarialatina.com";
        $subject = 'Registro de Socio - Abogado';
        $message = "<br><strong><h3>Un nuevo socio se ha registrado en nuestra página - Notaria Latina</h3></strong>
                    <br>Nombre: " . strip_tags($partner->name). "
                    <br>Nacionalidad: " . strip_tags($partner->nationality) ."
                    <br>Teléfono: " . strip_tags($partner->phone) ."
                    <br>Email: " . strip_tags($partner->email)."
                    <br>Empresa: " . strip_tags($partner->company)."
                    <br>
                    <img style='background-color: black; border-radius: 10px; padding: 10px; margin-top:20px' src='https://notarialatina.com/img/marca-notaria-latina.png' alt='IMAGEN NOTARIA LATINA'>
        ";

        $header = 'From: <partners@notarialatina.com>' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n".
                'Content-type:text/html;charset=UTF-8' . "\r\n"
                ;
        
        mail($to, $subject, $message, $header);
        //notariapublicalatina@gmail.com,hserrano@notarialatina.com
    }
}
