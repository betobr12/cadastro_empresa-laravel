<?php

namespace App\Libraries;

class Helpers {

    public static function mask_cep($cep){
        $value = $cep;
        if($value <> ''){
            $value = preg_replace("/[^0-9]/",'',$value);
            if(strlen($value) == 8){
                return(
                    substr($value, 0, 5).'-'.
                    substr($value, 5, 3)
                );
            } else{
                return $value;
            }
        } else {
            return $value;
        }
    }

    public static function mask_phone($phone){
        $value = $phone;
        if($value <> ''){
            $value = preg_replace("/[^0-9]/",'',$value);
            if(strlen($value) == 13){
                return(
                    substr($value, 0, 2).' '.
                    substr($value, 2, 2).' '.
                    substr($value, 4, 1).' '.
                    substr($value, 5, 4).' '.
                    substr($value, 9, 4)
                );
            } else if(strlen($value) == 12){
                return(
                    substr($value, 0, 2).' '.
                    substr($value, 2, 2).' '.
                    substr($value, 4, 4).' '.
                    substr($value, 8, 4)
                );
            } else if(strlen($value) == 11){
                return(
                    substr($value, 0, 2).' '.
                    substr($value, 2, 1).' '.
                    substr($value, 3, 4).' '.
                    substr($value, 7, 4)
                );
            } else if(strlen($value) == 10){
                return(
                    substr($value, 0, 2).' '.
                    substr($value, 2, 4).' '.
                    substr($value, 6, 4)
                );
            } else if(strlen($value) == 9){
                return(
                    substr($value, 0, 1).' '.
                    substr($value, 1, 4).' '.
                    substr($value, 5, 4)
                );
            } else if(strlen($value) == 8){
                return(
                    substr($value, 0, 4).' '.
                    substr($value, 4, 4)
                );
            } else {
                return $value;
            }
        } else {
            return $value;
        }
    }

    public static function mask_cpf_cnpj($cpf_cnpj){
        $value = $cpf_cnpj;
        if($value <> ''){
            $value = preg_replace("/[^0-9]/",'',$value);
            if(strlen($value) == 11){
                return(
                    substr($value, 0, 3).'.'.
                    substr($value, 3, 3).'.'.
                    substr($value, 6, 3).'-'.
                    substr($value, 9, 2)
                );
            } else if(strlen($value) == 14){
                return(
                    substr($value, 0, 2).'.'.
                    substr($value, 2, 3).'.'.
                    substr($value, 5, 3).'/'.
                    substr($value, 8, 4).'-'.
                    substr($value, 12, 2)
                );
            } else {
                return $value;
            }
        } else {
            return $value;
        }
    }

}
