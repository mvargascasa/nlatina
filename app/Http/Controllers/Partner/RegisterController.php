<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request){
        
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:partners,email|min:5|max:191',
            'password' => 'required|string|min:8|max:255'
        ]);

        // $url = Storage::put('partners', $request->file('img_profile'));  ESTAS VALIDACIONES VAN A AFECTAR EN LA PARTE DEL ADMINISTRADOR DE PARTNERS

        // $partner = new Partner();
        // // $cod_pais = $request->get('cod_pais'); //OBTENER EL CODIGO DEL PAIS EN EL REQUEST PARA ENVIARLO POR EL MAIL
        
        $partner = Partner::create([
            'name' => $request['name'],
            'lastname' => $request['lastname'],
            'email'=> $request['email'],
            'password'=> bcrypt($request['password']),
        ]);
    
        $this->sendEmail($partner);

        return redirect()->route('partner.showform')->with('succes', 'Register complete!');
    }

    public function sendEmail(Partner $partner){

        $subject = 'Registro de Socio - Abogado';
        $message = "<br><strong>Un nuevo socio se ha registrado en nuestra página - Notaria Latina</strong>
                    <br>Nombre: " . strip_tags($partner->nombre). " " . strip_tags($partner->apellido)."
                    <br>Email: " . strip_tags($partner->email)."
        ";

        $header = 'From: <partners@notarialatina.com>' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n".
                'Content-type:text/html;charset=UTF-8' . "\r\n"
                ;
        
        mail("info@casacredito.com,hserrano@casacredito.com", $subject, $message, $header);
    }
}
