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
class VerifyController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;


        // 2a03:2880:f003:c07:face:b00c::2 Facebook
        // 2001:4860:4860::8888   |  2001:4860:4860::8844 google
    
    /**
     * Recive data,set data to view and render view.
     */
    public function indexAction() : object
    {
        $session = $this->di->get("session");
        $page = $this->di->get("page");

        $geoMap = new GeoMap();

        $userData = $geoMap->getUserData("ip");
        
        $data = [
            "hasData"=>true,
            "ipData"=>json_decode($session->get("ipData")) ?? null,
            "userIp" => $userData->ip
        ];
        

        $page->add("verify_v2/index", $data);
        $data = [];
        $session->set("ipData", null);
        return $page->render([
            "title" => "Verify-Geo",
        ]);
    }
    /**
     * Get data from input, check if it is valid.
     */
    public function indexActionPost() : String
    {
       
        $session = $this->di->get("session");
        $request = $this->di->get("request");
        $response = $this->di->get("response");

        $geoMap = new GeoMap();
        $verify = new Verify();

        $ipa = $request->getPost("ipadress") ?? null;

        $isValid = $verify->validateAdress($ipa);
        $result = $isValid;

        if ($isValid) {
            $filter = "ip,type,longitude,latitude,country_name,continent_name";
            $result = $geoMap->get($ipa, $filter); 
        } else {
            $result = $isValid;
        }

        $result = $geoMap->get($ipa, $filter);
        $session->set("ipData", $result);
        
        return $response->redirect("verify_geo");
    }

    /**
     * Redirect to api-controller
     */
    public function apiActionPost() : String
    {
        $response = $this->di->get("response");
        $request = $this->di->get("request");

        $ipa = $request->getPost("ipadress") ?? null;

        return $response->redirect("api-geo/json/{$ipa}");
    }
}
