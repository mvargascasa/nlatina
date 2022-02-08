<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Partner;
use App\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    
    public function index(){
        return view('admin.partner.home');
    }

    public function edit(Partner $partner)
    {
        $camposVacios = [];

        if($partner->img_profile == null && $partner->img_profile == null){ array_push ( $camposVacios , "Imagen de perfil");}
        if($partner->title == null){ array_push ( $camposVacios , "Título"); }
        if($partner->name == null){ array_push ( $camposVacios , "Nombre"); }
        if($partner->lastname == null){ array_push ( $camposVacios , "Apellido"); }
        if($partner->email == null){ array_push ( $camposVacios , "Email"); }
        if($partner->country_residence == null){ array_push ( $camposVacios , "País de residencia"); }
        if($partner->phone == null){ array_push ( $camposVacios , "Teléfono"); }
        if($partner->state == null){ array_push ( $camposVacios , "Estado"); }
        if($partner->city == null){ array_push ( $camposVacios , "Ciudad"); }
        if($partner->address == null){ array_push ( $camposVacios , "Dirección"); }
        if($partner->company != null){ 
            if($partner->company == "Empresa" && $partner->company_name == null){
                array_push ( $camposVacios , "Nombre de la empresa"); 
            }
        } else {
            array_push ( $camposVacios , "Tipo de trabajo");
        }
        if(count($partner->specialties) == 0){ array_push ( $camposVacios , "Áreas de especialización"); }
        if($partner->specialty == null){ array_push ( $camposVacios , "Especialidad (Descripción)"); }
        if($partner->biography_html == null){ array_push ( $camposVacios , "Biografía"); }

        $specialties = Specialty::all();

        return view('admin.partner.edit', compact('partner', 'specialties', 'camposVacios'));
    }
    
    public function update(Partner $partner, Request $request)
    {
        if($request->img_profile == null && $partner->img_profile != null){ //IF PARA VALIDAR SI EL USUARIO NO CAMBIA SU FOTO DE PERFIL
            $request->img_profile = $partner->img_profile;
        } else if($request->img_profile != null && $partner->img_profile != null){
            $request->validate([
                'img_profile' => 'image'
            ], [
                'img_profile.image' => "El formato no es válido"
            ]); 
            $url = Storage::put('partners', $request->file('img_profile'));
            Storage::delete($partner->img_profile); //Si cambia la imagen de perfil, elimina la antigua foto
            $image = Image::make(Storage::get($url));
            $image->resize(844, 1035, function($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            Storage::put($url, (string) $image->encode('jpg', 72));
            $partner->img_profile = $url;
        } else if($request->img_profile != null && $partner->img_profile == null){
            $request->validate([
                'img_profile' => 'image'
            ], [
                'img_profile.image' => "El formato no es válido"
            ]);
            $url = Storage::put('partners', $request->file('img_profile'));
            $image = Image::make(Storage::get($url));
            $image->resize(844, 1035, function($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            Storage::put($url, (string) $image->encode('jpg', 72));
            $partner->img_profile = $url;
        }

        $partner->title = $request->title;
        $partner->name = $request->name;
        $partner->lastname = $request->lastname;
        $partner->email = $request->email;
        $partner->country_residence = $request->country_residence;
        $partner->codigo_pais = $request->codigo_pais;
        $partner->phone = $request->phone;
        $partner->state = $request->state;
        $partner->city = $request->city;
        $partner->address = $request->address;
        $partner->link_facebook = $request->link_facebook;
        $partner->link_instagram =  $request->link_instagram;
        $partner->link_linkedin = $request->link_linkedin;
        $partner->website = $request->website;
        
        if($request->company == "Empresa"){
            $partner->company = $request->company;
            $partner->company_name = $request->company_name;
        } else {    
            $partner->company = $request->company;
            $partner->company_name = null;
        }
        if($request->specialties){
            $partner->specialties()->detach();
            $partner->specialties()->attach($request->specialties);
        } else {
            $partner->specialties()->detach();
        }
        $partner->specialty = $request->specialty;
        $partner->biography_html = $request->biography_html;
        if($request->filled('checkTerminos') != null){
            $partner->checkterminos = $request->filled('checkTerminos');
            $partner->terminos_verified_at = date('y-m-d h:i:s');
        }
        $partner->slug = Str::slug($partner->name . ' '. $partner->lastname . ' ' . $partner->id, '-');

        $partner->save();

        return redirect()->route('socios.edit', $partner)->with(['status' => 'Se actualizaron los datos']);
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
