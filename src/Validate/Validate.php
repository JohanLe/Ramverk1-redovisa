<?php 

namespace Anax\Validate;

class Validate {


    /**
     * @param String - ip-adress
     * Checks if incoming string is a valid ipv4 or ipv6 adress.
     * @return Bool
     */
public function validateIpAdress($ipa){

    if (filter_var($ipa, FILTER_VALIDATE_IP)) {
        return true;
    }
    if (filter_var($ipa, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
        return true;
    }
    return false;
}

/**
 * @param $lat,$long. 
 * Cordinates. Check if they are valid.
 * @return Array - Key->value 
 */
public function validateCords($lat, $long){
    $result = [
        "success"=> true,
        "msg" =>"Success"
    ];

    if($lat < 0 or $lat > 90){
        $result = [
            "success"=> false,
            "msg" => "Latitude needs to be between 0 & 90"
        ];
    }
    if($long < -180 or $long > 180){

        $result = [
            "success"=> false,
            "msg" => "Longitude  needs to be between -180 & 180"
        ];
    }
   return $result;
}

}