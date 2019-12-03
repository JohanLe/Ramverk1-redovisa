<?php

namespace Anax\Verify;

class Verify {


public function validateAdress($ipa) {
    if(strlen($ipa) > 15) {
        if(filter_var($ipa, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            return true;
        }
    }
    else {
        if(filter_var($ipa, FILTER_VALIDATE_IP)) {
            return true;
        }
    }
    return false;
}




}


