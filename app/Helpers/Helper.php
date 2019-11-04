<?php

// This class file to define all general functions

namespace App\Helpers;

use Redirect;

class Helper {

    static function getCountryCode() {
        $code='';
        $visitor_ip = $_SERVER['REMOTE_ADDR'];
        $visitor_ip_details = json_decode(@file_get_contents("http://ipinfo.io/{$visitor_ip}/json"));
        if(!empty($visitor_ip_details->country)){
            $code = @$visitor_ip_details->country;
        }
        return $visitor_ip_details;
    }

}

?>