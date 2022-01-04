<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:partner');
    }

    public function showLinkRequestForm(){
        return view('admin.partner.email', [
            'title' => 'Partner Password Reset',
            'passwordEmailRoute' => 'admin.password.email'
        ]);
    }

    public function broker(){
        return Password::broker('partners');
    }

    public function guard(){
        return Auth::guard('partner');
    }
}
