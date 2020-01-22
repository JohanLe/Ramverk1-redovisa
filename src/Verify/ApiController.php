<?php

namespace Anax\Verify;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Anax\Verify\Verify;
use Anax\Verify\GeoMap;


/**
 * Style chooser controller loads available stylesheets from a directory and
 * lets the user choose the stylesheet to use.
 */
class ApiController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    
    /**
     * @return string
     */
    public function indexAction() : string
    {
        return "Try '../api-geo/json/<ipadress>'";
    }

    public function jsonActionGet($ipa) : string
    {
        $verify = new Verify();
        $geoMap = new GeoMap();


        $isValid = $verify->validateAdress($ipa);
       
        if($isValid){
            $filter = "ip,type,longitude,latitude,country_name,continent_name";
            $result = $geoMap->get($ipa, $filter); 
            return $result;
        }
        return false;
    }



}

