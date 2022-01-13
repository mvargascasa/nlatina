<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;
    
    public function __construct()
    {
        $this->middleware('guest:partner');
    }
    
    protected function showResetForm($token = null, $email)
    {
        return view('admin.partner.reset', [
            'token' => $token,
            'email' => $email
        ]);
    }
    
    protected function broker(){
        return Password::broker('partners');
    }
    
    protected function guard(){
        return Auth::guard('partner');
    }

    protected $redirectTo = "/partners/login";
}
