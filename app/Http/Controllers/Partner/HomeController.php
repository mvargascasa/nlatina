<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Partner;
use App\Specialty;
use Detection\MobileDetect;
use Illuminate\Broadcasting\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Auth;

class HomeController extends Controller
{
    
    public function index(){
        return view('admin.partner.home');
    }

    public function edit(Partner $partner)
    {

        $detect = new MobileDetect();
        $isMobile = FALSE;

        if($detect->isMobile()){
            $isMobile = TRUE;
        }

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
        //if($partner->specialty == null){ array_push ( $camposVacios , "Especialidad (Descripción)"); }
        if($partner->biography_html == null){ array_push ( $camposVacios , "Biografía"); }

        //ADVERTENCIAS
        if($partner->biography_html != null && $charCountBio < 400){ array_push( $advertencias, "La biografía debe tener al menos 400 caracteres");}

        $specialties = Specialty::all();

        return view('admin.partner.edit', compact('partner', 'specialties', 'camposVacios', 'socialLinks', 'advertencias', 'isMobile'));
    }
    
    public function update(Partner $partner, Request $request)
    {

        if($partner->checkterminos != null || $partner->terminos_verified_at != null){
            $value_changed = "";
            if($partner->name != $request->name) $value_changed = $value_changed . "nombre,";
            if($partner->lastname != $request->lastname) $value_changed = $value_changed . "apellido,";
            if($partner->title != $request->title) $value_changed = $value_changed . "titulo,";
            if($partner->specialty != $request->specialty) $value_changed = $value_changed . "especialidad(descripcion),";
            //if($partner->specialties != $request->specialties) $value_changed = $value_changed . "especialidades(check),";
            if($partner->country_residence != $request->country_residence) $value_changed = $value_changed . "pais de residencia,";
            if($partner->state != $request->state) $value_changed = $value_changed . "estado o provincia,";
            if($partner->city != $request->city) $value_changed = $value_changed . "ciudad,";
            if($partner->address != $request->address) $value_changed = $value_changed . "dirección,";
            if($partner->link_facebook != $request->link_facebook) $value_changed = $value_changed . "link de facebook,";
            if($partner->link_instagram != $request->link_instagram) $value_changed = $value_changed . "link de instagram,";
            if($partner->link_linkedin != $request->link_linkedin) $value_changed = $value_changed . "link de linkedin,";
            if($partner->website != $request->website) $value_changed = $value_changed . "link de website";
            if($partner->numlicencia != $request->numlicencia) $value_changed = $value_changed . "número de licencia,";
            if($partner->company != $request->company) $value_changed = $value_changed . "compañia,";
            if($partner->company_name != $request->company_name) $value_changed = $value_changed . "nombre de la compañia,";
            if($partner->phone != $request->phone) $value_changed = $value_changed . "teléfono,";
            if($partner->email != $request->email) $value_changed = $value_changed . "email,";
            if($partner->biography_html != $request->biography_html) $value_changed = $value_changed . "biografia,";
            if($partner->img_profile != null && isset($request->img_profile)) $value_changed = $value_changed . "imagen de perfil,";
            if($value_changed != ""){
                $updated_partner = DB::table('updated_partner')->insert([
                    'partner_id' => $partner->id,
                    'value_change' => $value_changed
                ]);
            }
        }

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
        // if(isset($partner->state)) $slug = Str::slug('abogado en '.$partner->state.' '.$partner->country_residence.' '.$partner->id);
        // else if(isset($partner->))
        //$partner->slug = Str::slug('abogado en ' . $partner->city . ' '. $partner->state . ' ' . $partner->country_residence . ' ' . $partner->id, '-');
        //$partner->slug = Str::slug($partner->name . ' '. $partner->lastname . ' ' . $partner->id, '-');

        $partner->updated_count = $partner->updated_count + 1;

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

    public function changepassword(Request $request){
        $partner = Partner::where('id', Auth::guard('partner')->user()->id)->first();

        $partner->password = bcrypt($request->password);
        $partner->save();

        return redirect()->route('socios.edit', $partner);
    }

    public function setmodals(Request $request){
        $partner = Partner::where('id', $request->partner_id)->first();
        if($partner->modals != null){
            
        } else {
            $partner->modals = $request->id;
        }
        $saved = $partner->save();

        return response()->json($saved);
    }
}
