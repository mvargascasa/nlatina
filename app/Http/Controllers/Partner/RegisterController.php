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
            'lastname' => 'required',
            'email' => 'required|unique:partners,email|min:5|max:191',
            'password' => 'required|string|min:8|max:255'
        ]);
        
        $partner = Partner::create([
            'name' => $request['name'],
            'lastname' => $request['lastname'],
            'email'=> $request['email'],
            'password'=> bcrypt($request['password']),
        ]);
    
        $this->sendEmail($partner);

        return redirect()->route('partner.showform')->with('success', 'Register complete!');
    }

    public function sendEmail(Partner $partner){

        $subject = 'Registro de Socio - Abogado';
        $message = "<br><strong><h1>Un nuevo socio se ha registrado en nuestra página - Notaria Latina</h1></strong>
                    <br>Nombre: " . strip_tags($partner->name). " " . strip_tags($partner->lastname)."
                    <br>Email: " . strip_tags($partner->email)."
                    <br>
                    <div style='background-color:black'><img width='50' src='http://localhost/awebnot-master/public/img/marca-notaria-latina.png'></div>
        ";

        $header = 'From: <partners@notarialatina.com>' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n".
                'Content-type:text/html;charset=UTF-8' . "\r\n"
                ;
        
        mail("sebas25211@hotmail.com", $subject, $message, $header);

        //notariapublicalatina@gmail.com,hserrano@notarialatina.com
    }
}
