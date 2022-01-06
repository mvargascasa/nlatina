<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use ThrottlesLogins;
    
    public function showLoginFormSocios(){
        return view('admin.partner.login', [
            'title' => 'Socios Login',
            'loginRoute' => 'socios.login',
            'forgotPasswordRoute' => 'socios.password.request'
        ]);
    }

    public function loginSocios(Request $request){

        $remember = $request->filled('remember');
        
        $this->validator($request);

        if($this->hasTooManyLoginAttempts($request)){
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if(Auth::guard('partner')->attempt($request->only('email', 'password'), $remember)){
            
            $request->session()->regenerate();

            $partner = Partner::where('email', $request->email)->first();
            // return auth('partner')->user(); //ESTO ME DEVUELVE EL USUARIO QUE INICIO SESION
            return redirect()
            ->route('socios.edit', $partner)
            ->with('status', 'You are logged in!');
        }

        $this->incrementLoginAttempts($request);

        throw ValidationException::withMessages([
            'email' => 'Correo y/o contraseña incorrectos'
        ]);
        
    }

    public function logout(Request $request){

        Auth::guard('partner')->logout();
        
        $request->session()->invalidate();

        return redirect()->route('partner.showform');
    }

    public function validator(Request $request){
        $rules = [
            'email' => 'required|email|exists:partners|min:5|max:191',
            'password' => 'required|string|min:8|max:255'
        ];

        $messages = [
            'email.exists' => '¡Ups! Algo salió mal, intentalo nuevamente',
        ];

        $request->validate($rules, $messages);
    }

    //Este metodo no esta siendo utilizado
    public function loginFailed(){
        return redirect()
        ->back()
        ->withInput()
        ->with('error', 'Login Failed, please try again!');
    }

    public function username(){
        return 'email';
    }
}
