<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Partner;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SocialController extends Controller
{
    public function facebookRedirect(){
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook(){
        try{

            $statement = DB::select("SHOW TABLE STATUS LIKE 'partners'");
            $nextId = $statement[0]->Auto_increment;

            $userSocial = Socialite::driver('facebook')->user();
            $partner = Partner::where(['email' => $userSocial->email])->first();
    
            if($partner) {
                Auth::guard('partner')->login($partner);
                return redirect()->route('socios.edit', $partner);
            } else {
                $partner = Partner::create([
                    'name' => $userSocial->name,
                    'email' => $userSocial->email,
                    'fb_id' => $userSocial->id,
                    // 'password' => bcrypt('admin@123'),
                    'slug' => Str::slug($userSocial->name . " " . $nextId, '-'),
                ]);

                Auth::guard('partner')->login($partner);
                return redirect()->route('socios.edit', $partner);
            }
        } catch(Exception $exception){
            dd($exception->getMessage());
        }
    }
}
