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
                'nationality' => 'required',
                'specialty' => 'required',
                'country_residence' => 'required',
                'city' => 'required',
                'state' => 'required',
                // 'address' => 'required',
                'company' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'img_profile' => 'image',
                'biography_html' => 'required|min:700',
            ], [
                'biography_html.min' => 'La biografia debe tener al menos 700 caracteres'
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'nationality' => 'required',
                'specialty' => 'required',
                'country_residence' => 'required',
                'city' => 'required',
                'state' => 'required',
                // 'address' => 'required',
                'company' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'img_profile' => 'required|image',
                'biography_html' => 'required|min:700',
            ], [
                'biography_html.min' => 'La biografia debe tener al menos 700 caracteres'
            ]);
            $url = Storage::put('partners', $request->file('img_profile'));
            $partner->img_profile = $url;
        }

        $codigo_pais = $this->getPaisByCodigo($request->country_residence);

        
        $partner->name = $request->name;
        $partner->nationality = $request->nationality;
        $partner->specialty = $request->specialty;
        $partner->country_residence = $request->country_residence;
        $partner->city = $request->city;
        $partner->state = $request->state;
        // $partner->address = $request->address;
        // $partner->link_facebook = $request->link_facebook;
        // $partner->link_instagram = $request->link_instagram;
        // $partner->link_linkedin = $request->link_linkedin;
        $partner->codigo_pais = $request->codigo_pais;
        $partner->company = $request->company;
        $partner->phone = $request->phone;
        $partner->email = $request->email;
        $partner->biography_html = $request->biography_html;

        $partner->save();

        return redirect()->route('socios.index')->with('success', 'Se guardaron los datos correctamente');
        
    }

    public function getPaisByCodigo($pais){
        switch ($pais) {
            case 'Argentina': $codigo_pais = "+54"; break;
            case 'Bolivia': $codigo_pais = "+591"; break;
            case 'Colombia': $codigo_pais = "+57"; break;
            case 'Costa Rica': $codigo_pais = "+506"; break;
            case 'Ecuador': $codigo_pais = "+593"; break;
            case 'El Salvador': $codigo_pais = "+503"; break;
            case 'España': $codigo_pais = "+34"; break;
            case 'Estados Unidos': $codigo_pais = "+1"; break;
            case 'Guatemala': $codigo_pais = "+502"; break;
            case 'Honduras': $codigo_pais = "+504"; break;
            case 'México': $codigo_pais = "+52"; break;
            case 'Nicaragua': $codigo_pais = "+505"; break;
            case 'Panamá': $codigo_pais = "+507"; break;
            case 'Paraguay': $codigo_pais = "+595"; break;
            case 'Perú': $codigo_pais = "+51"; break;
            case 'Puerto Rico': $codigo_pais = "+1 787"; break;
            case 'República Dominicana': $codigo_pais = "+1 809"; break;
            case 'Uruguay': $codigo_pais = "+598"; break;
            case 'Venezuela': $codigo_pais = "+58"; break;
            default:
                # code...
                break;
        }
        return $codigo_pais;
    }
}
