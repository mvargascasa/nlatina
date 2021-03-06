<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Partner;
use App\Specialty;
use Detection\MobileDetect;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;

class HomeController extends Controller
{
    
    public function index(){
        return view('admin.partner.home');
    }

    public function edit(Partner $partner)
    {

        /*ESCAPAR CARACTERES ESPECIALES Y CONTAR PARA VALIDAR QUE SEA MAYOR A 400*/
        $biographyDecode = html_entity_decode($partner->biography_html, ENT_QUOTES);

        $charCountBio = strip_tags($biographyDecode);

        $charCountBio = Str::length($charCountBio);
        /*--------*/

        $camposVacios = [];
        $socialLinks = [];
        $advertencias = [];

        //LINKS DE REDES PARA VALIDAR QUE SEA LINK VALIDO
        if (!Str::startsWith($partner->link_facebook, 'https')) {
            array_push($socialLinks, "Facebook");
        }
        if (!Str::startsWith($partner->link_instagram, 'https')) {
            array_push($socialLinks, "Instagram");
        }
        if (!Str::startsWith($partner->link_linkedin, 'https')) {
            array_push($socialLinks, "LinkedIn");
        }
        if (!Str::startsWith($partner->website, 'https')) {
            array_push($socialLinks, "Website");
        }

        //CAMPOS VACIOS
        if($partner->img_profile == null && $partner->img_profile == null){ array_push ( $camposVacios , "Imagen de perfil");}
        if($partner->title == null){ array_push ( $camposVacios , "Título"); }
        if($partner->name == null){ array_push ( $camposVacios , "Nombre"); }
        if($partner->lastname == null){ array_push ( $camposVacios , "Apellido"); }
        if($partner->email == null){ array_push ( $camposVacios , "Email"); }
        // if($partner->link_facebook == null){ array_push( $camposVacios, "Link de Facebook");}
        // if($partner->link_instagram == null){ array_push( $camposVacios, "Link de Instagram");}
        // if($partner->link_linkedin == null){ array_push( $camposVacios, "Link de LinkedIn");}
        // if($partner->website == null){ array_push( $camposVacios, "Link de Sitio Web");}
        if($partner->country_residence == null){ array_push ( $camposVacios , "País de residencia"); }
        if($partner->phone == null){ array_push ( $camposVacios , "Teléfono"); }
        if($partner->state == null){ array_push ( $camposVacios , "Estado, Departamento o Provincia"); }
        if($partner->city == null){ array_push ( $camposVacios , "Ciudad"); }
        if($partner->address == null){ array_push ( $camposVacios , "Dirección"); }
        if($partner->numlicencia == null){ array_push( $camposVacios, "Número de Licencia" );}
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

        //ADVERTENCIAS
        if($partner->biography_html != null && $charCountBio < 400){ array_push( $advertencias, "La biografía debe tener al menos 400 caracteres");}

        $specialties = Specialty::all();

        return view('admin.partner.edit', compact('partner', 'specialties', 'camposVacios', 'socialLinks', 'advertencias'));
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

        $url_cv = null;
        if($partner->attached_file == null && $request->attached_file != null){
            $url_cv = Storage::put('cvs', $request->file('attached_file'));
        }

        if(Str::startsWith($request->link_facebook, 'www')){
            $request->link_facebook = 'https://' . $request->link_facebook;
        } else if (Str::startsWith($request->link_facebook, 'facebook')) {
            $request->link_facebook = 'https://www.' . $request->link_facebook;
        }

        if(Str::startsWith($request->link_instagram, 'www')){
            $request->link_instagram = 'https://' . $request->link_instagram;
        } else if (Str::startsWith($request->link_instagram, 'instagram')) {
            $request->link_instagram = 'https://www.' . $request->link_instagram;
        }

        if(Str::startsWith($request->link_linkedin, 'www')){
            $request->link_linkedin = 'https://' . $request->link_linkedin;
        } else if (Str::startsWith($request->link_linkedin, 'linkedin')) {
            $request->link_linkedin = 'https://www.' . $request->link_linkedin;
        }

        if(Str::startsWith($request->website, 'www')){
            $request->website = 'https://' . $request->website;
        }

        $partner->title = $request->title;
        $partner->name = Purify::clean($request->name);
        $partner->lastname = Purify::clean($request->lastname);
        $partner->email = Purify::clean($request->email);
        $partner->country_residence = $request->country_residence;
        $partner->codigo_pais = Purify::clean($request->codigo_pais);
        $partner->numlicencia = Purify::clean($request->numlicencia);
        $partner->phone = Purify::clean($request->phone);
        $partner->state = Purify::clean($request->state);
        $partner->city = Purify::clean($request->city);
        $partner->address = Purify::clean($request->address);
        $partner->link_facebook = Purify::clean($request->link_facebook);
        $partner->link_instagram =  Purify::clean($request->link_instagram);
        $partner->link_linkedin = Purify::clean($request->link_linkedin);
        $partner->website = Purify::clean($request->website);
        if($url_cv != null){
            $partner->attached_file = $url_cv;
        }
        
        if($request->company == "Empresa"){
            $partner->company = $request->company;
            $partner->company_name = Purify::clean($request->company_name);
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
        $partner->specialty = Purify::clean($request->specialty);
        $partner->biography_html = $request->biography_html;
        if($request->filled('checkTerminos') != null){
            $partner->checkterminos = $request->filled('checkTerminos');
            $partner->terminos_verified_at = date('y-m-d h:i:s');
        }
        $partner->slug = Str::slug($partner->name . ' '. $partner->lastname . ' ' . $partner->id, '-');

        $partner->save();

        return redirect()->route('socios.edit', $partner)->with(['status' => 'Se actualizó su información']);
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

    public function getCustomers(Partner $partner){
        
        $detect = new MobileDetect();
        $isMobile = FALSE;

        if($detect->isMobile()){
            $isMobile = TRUE;
        }

        $customers = $partner->customers;
        return view('admin.partner.customersview', compact('customers', 'isMobile'));

    }
}
