<?php

namespace App\Http\Traits;

trait GetCodByCountryTrait{

    public function getCodByPais($pais){
        switch ($pais) {
            case 'Argentina': $codigoPais = "+54"; break;
            case 'Bolivia': $codigoPais = "+591"; break;
            case 'Colombia': $codigoPais = "+57"; break;
            case 'Costa Rica': $codigoPais = "+506"; break;
            case 'Ecuador': $codigoPais = "+593"; break;
            case 'El Salvador': $codigoPais = "+503"; break;
            case 'España': $codigoPais = "+34"; break;
            case 'Estados Unidos': $codigoPais = "+1"; break;
            case 'Guatemala': $codigoPais = "+502"; break;
            case 'Honduras': $codigoPais = "+504"; break;
            case 'México': $codigoPais = "+52"; break;
            case 'Nicaragua': $codigoPais = "+505"; break;
            case 'Panamá': $codigoPais = "+507"; break;
            case 'Paraguay': $codigoPais = "+595"; break;
            case 'Perú': $codigoPais = "+51"; break;
            case 'Puerto Rico': $$codigoPaisis = "+1787"; break;
            case 'República Dominicana': $codigoPais = "+1809"; break;
            case 'Uruguay': $codigoPais = "+598"; break;
            case 'Venezuela': $codigoPais = "+58"; break;
            default:
                # code...
                break;
        }
        return $codigoPais;
    }

}