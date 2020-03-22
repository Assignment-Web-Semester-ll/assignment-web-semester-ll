<?php
// namespace App\Helper;

use Illuminate\Http\Request;

if(!function_exists('ConvertStringToBoolean')){
    function ConvertStringToBoolean(string $string){
        if(isset($string)){
            return strtolower($string) == "true" ? true : false;
        }
        return false;
    }
}