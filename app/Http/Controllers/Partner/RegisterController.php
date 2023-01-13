<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\GetCodByCountryTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class RegisterController extends Controller
{

    use GetCodByCountryTrait;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request){

        $statement = DB::select("SHOW TABLE STATUS LIKE 'partners'");
        $nextId = $statement[0]->Auto_increment;

        // $codigoPais = $this->getCodByPais($request->country_residence);
        //CONDICION PARA QUE NO GUARDE LA INFO SI EL CODIGO DE PAIS NO EMPIEZA CON + | BOTS ESTABAN GUARDANDO ESTE CAMPO CON LETRAS ALEATORIAS (TLiCEZogI)

        // if(Str::startsWith($request->codTelfPais, '+')){

            $request->validate([
                'name' => 'required',
                'lastname' => 'required',
                'country_residence' => 'required',
                'phone' => 'required',
                'email' => 'required|unique:partners,email|min:10|max:191',
                'password' => 'required|string|min:8|max:255'
            ]);
            
            $partner = Partner::create([
                'name' => strip_tags($request['name']), 
                'lastname' => strip_tags($request['lastname']),
                'country_residence' => strip_tags($request['country_residence']),
                'codigo_pais' => strip_tags($request['codTelfPais']),
                'phone' => strip_tags($request['phone']),
                // 'company' => strip_tags($request['company']),
                'email'=> $request['email'],
                'password'=> bcrypt($request['password']),
                'slug' => Str::slug('abogado en ' . $request['country_residence'] . ' ' . $nextId, '-')
                // 'slug' => Str::slug($request['name'] . ' ' . $request['lastname'] . ' ' . $nextId, '-')
            ]);
    
            // event(new Registered($partner));
        
            //Envia correo a los administradores de que se ha registrado un nuevo usuario
            //$this->sendEmail($partner);
    
            $this->sendEmailPartner($partner);
    
            Auth::guard('partner')->login($partner);
    
            return redirect()->route('socios.edit', compact('partner'))->with('success', 'Register complete!');

            // } else {
                
            //     $macaddress = exec('getmac');
            //     $ipaddress = $request->ip();

            //     $to = "sebas31051999@gmail.com"; //partners@notarialatina.com,hserrano@notarialatina.com
            //     $subject = 'Un nuevo registro | ' . date(now());
            //     $message = "<br><strong><h2>Información</h2></strong>
            //             <br>Nombre: " . strip_tags($request->name). " " . strip_tags($request->lastname) . "
            //             <br>Nacionalidad: " . strip_tags($request->country_residence) ."
            //             <br>Teléfono: ". strip_tags($request->codTelfPais) . " " .  strip_tags($request->phone) ."
            //             <br>Email: " . strip_tags($request->email)."
            //             <br>Tipo de trabajo: " . strip_tags($request->company)."
            //             <br>Mac Address: " . strip_tags($macaddress) ."
            //             <br>Ip Address: " . strip_tags($ipaddress) . " 
            //     ";

            //     $header = 'From: <partners@notarialatina.com>' . "\r\n" .
            //         'MIME-Version: 1.0' . "\r\n".
            //         'Content-type:text/html;charset=UTF-8' . "\r\n"
            //         ;
            
            //     mail($to, $subject, $message, $header);

            //     $request->session()->flash('success', 'Hemos enviado tu información');

            //     return back();
                
            // }

    }

    public function sendEmail(Partner $partner){
        $codigo_pais = $this->getCodigoPais($partner->country_residence);
        $to = "partners@notarialatina.com"; //partners@notarialatina.com,hserrano@notarialatina.com
        $subject = 'Registro de Partner - Abogado';
        $message = "<br><strong><h2>Un nuevo partner se ha registrado en nuestra página - Notaria Latina</h2></strong>
                    <br>Nombre: " . strip_tags($partner->name). " " . strip_tags($partner->lastname) . "
                    <br>Nacionalidad: " . strip_tags($partner->country_residence) ."
                    <br>Teléfono: ". strip_tags($codigo_pais) . " " .  strip_tags($partner->phone) ."
                    <br>Email: " . strip_tags($partner->email)."
                    <br>Tipo de trabajo: " . strip_tags($partner->company)."
                    <br>
                    <img style='margin-top:20px; width:210px; height:75px' src='https://notarialatina.com/img/partners/WEB-HEREDADO.png' alt='IMAGEN NOTARIA LATINA'>
        ";

        $header = 'From: <partners@notarialatina.com>' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n".
                'Content-type:text/html;charset=UTF-8' . "\r\n"
                ;
        
        mail($to, $subject, $message, $header);
        //partners@notarialatina.com,hserrano@notarialatina.com
    }

    public function sendEmailPartner(Partner $partner){
        $subject = 'Registro Exitoso - Notaria Latina';
        $message = "
        <div style='margin-left: 5%; margin-right: 5%; padding-left: 5%; padding-right: 5%; border: 0.5px solid #9b9b9b; border-radius: 5px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; background-color: #F4F4F4; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;'>
            <div>
                <div style='text-align:center; margin-bottom: 10px;'>
                    <img style='margin-top:20px; width:150px' src='https://notarialatina.com/img/partners/WEB-HEREDADO.png' alt='IMAGEN NOTARIA LATINA'>
                </div>
            </div>
            <div>
                <div style='background-color: #122944; color: #ffffff; padding-top: 5px; padding-bottom: 5px;'>
                    <h1 style='text-align:center'>Bienvenido Sebastian Armijos</h1>
                </div>
                <div style='font-size: 20px;'>
                    <p>¡Felicidades! Ya forma parte de Notaria Latina 👨‍⚖️</p>
                    <p style='line-height: 30px;'>
                        No olvide <a href='https://notarialatina.com/partners/login'>Iniciar sesión</a> en su cuenta con su correo electrónico y completar toda su información para que clientes potenciales consultar por sus servicios.
                        Se verificará que sus datos estén correctamente completos para que pueda ser publicado en nuestro sitio oficial y de esta manera pueda llegar a futuros clientes.
                    </p>
                    <div style='background-color: #C30000; color: #ffffff;  border-radius: 5px;'>
                        <p style='padding-top: 5px; padding-bottom: 5px; margin-left: 5px; margin-right: 5px;'>⚠ No olvide completar toda su información y cargar una fotografía personal</p>
                    </div>
                    <br>
                    <p style='color: #6a6a6a;'><i>¡Notaria Latina agradece tu suscripción y te desea lo mejor!</i> ⚖</p>
                </div>
            </div>
        </div>
        ";

        $header = 'From: <partners@notarialatina.com>' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n".
        'Content-type:text/html;charset=UTF-8' . "\r\n"
        ;

        mail($partner->email, $subject, $message, $header);

    }

    public function getCodigoPais($pais){
        switch ($pais) {
            case 'Argentina': $codigo_pais = "+54"; return $codigo_pais; break;
            case 'Bolivia': $codigo_pais = "+591"; return $codigo_pais; break;
            case 'Colombia': $codigo_pais = "+57"; return $codigo_pais; break;
            case 'Costa Rica': $codigo_pais = "+506"; return $codigo_pais; break;
            case 'Ecuador': $codigo_pais = "+593"; return $codigo_pais; break;
            case 'El Salvador': $codigo_pais = "+503"; return $codigo_pais; break;
            case 'España': $codigo_pais = "+34"; return $codigo_pais; break;
            case 'Estados Unidos': $codigo_pais = "+1"; return $codigo_pais; break;
            case 'Guatemala': $codigo_pais = "+502"; return $codigo_pais; break;
            case 'Honduras': $codigo_pais = "+504"; return $codigo_pais; break;
            case 'México': $codigo_pais = "+52"; return $codigo_pais; break;
            case 'Nicaragua': $codigo_pais = "+505"; return $codigo_pais; break;
            case 'Panamá': $codigo_pais = "+507"; return $codigo_pais; break;
            case 'Paraguay': $codigo_pais = "+595"; return $codigo_pais; break;
            case 'Perú': $codigo_pais = "+51"; return $codigo_pais; break;
            case 'Puerto Rico': $codigo_pais = "+1 787"; return $codigo_pais; break;
            case 'República Dominicana': $codigo_pais = "+1 809"; return $codigo_pais; break;
            case 'Uruguay': $codigo_pais = "+598"; return $codigo_pais; break;
            case 'Venezuela': $codigo_pais = "+58"; return $codigo_pais; break;
            default:
                break;
        }
    }
}
