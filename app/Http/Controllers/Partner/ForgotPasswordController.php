<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:partner');
    }

    public function showLinkRequestForm(){
        return view('admin.partner.email');
    }

    protected function broker(){
        return Password::broker('partners');
    }

    protected function guard(){
        return Auth::guard('partner');
    }
}
