<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    
    public function index(){
        return view('admin.partner.home');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partner.edit', compact('partner'));
    }
    
    public function update(Partner $partner, Request $request)
    {

        if($request->img_profile == null && $partner->img_profile != null){
            $request->img_profile = $partner->img_profile;
            $request->validate([
                'name' => 'required',
                'lastname' => 'required',
                'specialty' => 'required',
                'country_residence' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'img_profile' => 'image',
                'biography_html' => 'required',
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'lastname' => 'required',
                'specialty' => 'required',
                'country_residence' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'img_profile' => 'required|image',
                'biography_html' => 'required',
            ]);
            $url = Storage::put('partners', $request->file('img_profile'));
            $partner->img_profile = $url;
        }

        
        $partner->name = $request->name;
        $partner->lastname = $request->lastname;
        $partner->specialty = $request->specialty;
        $partner->country_residence = $request->country_residence;
        $partner->phone = $request->phone;
        $partner->email = $request->email;
        $partner->biography_html = $request->biography_html;

        $partner->save();

        return redirect()->route('socios.index')->with('success', 'Se guardaron los datos correctamente');
        
    }
}
