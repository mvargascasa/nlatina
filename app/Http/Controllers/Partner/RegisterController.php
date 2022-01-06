<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
            // 'confirmation_code' => Str::random(25)
        ]);
    
        //Envia correo a los administradores de que se ha registrado un nuevo usuario
        $this->sendEmail($partner);

        //Send verification email
        // Mail::send('admin.partners.confirmation_code', $request, function ($message) use ($request){
        //     $message->to($request->email, $request->name)->subject('Por favor confirma tu correo electronico');
        // });

        $this->sendEmailPartner($partner);

        Auth::guard('partner')->login($partner);

        return redirect()->route('socios.edit', compact('partner'))->with('success', 'Register complete!');
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

    public function sendEmailPartner(Partner $partner){
        $subject = 'Registro Exitoso - Notaria Latina';
        $message = "
        <div>
            <div>
                <div>
                    <img style='background-color: black; border-radius: 10px; padding: 10px; margin-top:20px' src='https://notarialatina.com/img/marca-notaria-latina.png' alt='IMAGEN NOTARIA LATINA'>
                </div>
            </div>
            <div>
                <h1 style='text-align:center'>Bienvenido " . strip_tags($partner->name)  ." </h1>
                <h5>Ya formas parte de Notaria Latina 👨‍⚖️</h5>
                <h5>
                    No olvides de <a href='https://notarialatina.com/socios/login'>Iniciar sesión</a> y completar toda tu información para que las personas puedan encontrarte y consultar por tus servicios.
                    Se verificará que tus datos estén correctamente completos para que puedas ser publicado en nuestro sitio oficial y de esta manera puedas llegar a tus futuros clientes. 
                </h5>
                <h4>Notaria Latina agradece tu suscripción y te desea lo mejor! 😉⚖</h4>
                <img style='width:250px' src='https://blog.lemontech.com/wp-content/uploads/2021/01/frases-de-abogados.jpg' alt='Abogados Notaria Latina'>
            </div>
        </div>
        ";

        $header = 'From: <partners@notarialatina.com>' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n".
        'Content-type:text/html;charset=UTF-8' . "\r\n"
        ;

        mail($partner->email, $subject, $message, $header);

    }
}
