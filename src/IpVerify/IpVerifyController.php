<?php

namespace Anax\IpVerify;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Anax\IpVerify\VerifyHelper;



/**
 * Style chooser controller loads available stylesheets from a directory and
 * lets the user choose the stylesheet to use.
 */
class IpVerifyController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    
    /**
     * This is the index method action, it handles:
     * ANY METHOD mountpoint
     * ANY METHOD mountpoint/
     * ANY METHOD mountpoint/index
     *
     * @return string
     */
    public function indexAction() : object
    {
    
        //$response = $this->di->get("response");
        //$request = $this->di->get("request");
        $session = $this->di->get("session");
        $ipAd = $session->get("ip") ?? null;
        
    

        $data = [
            "data" => $ipAd,
        ];
            
        $page = $this->di->get("page");
        $page->add("ipverify/index", $data);
        
        $session->set("ip", null);
        
        return $page->render([  
            "title" => "Test",
        ]);

    }
  
    /**
     * This sample method action it the handler for route:
     * POST mountpoint/create
     *
     * @return string
     */
    public function indexActionPost() : string
    {
        $response = $this->di->get("response");
        $request = $this->di->get("request");
        $session = $this->di->get("session");
        $verify = new VerifyHelper();

       
        // 2a03:2880:f003:c07:face:b00c::2 Facebook
        // 2001:4860:4860::8888 2001:4860:4860::8844 google


        if($request->getPost("submitJson")){
            // TODO the json file controll stuff.
            $ipAd = $request->getPost("ipadress") ?? null;
            return $response->redirect("api/json/".$ipAd);
        }
        else {
            
            $ipAd = $request->getPost("ipadress") ?? null;
            if(strlen($ipAd) < 15){
                $isValid = $verify->verifyIpv4($ipAd) ?? false;
                $domain = json_decode($verify->getDomainInfo($ipAd)) ?? null;
            }
            else {
                $isValid = $verify->verifyIpv6($ipAd);
                $domain = json_decode($verify->getDomainInfo($ipAd)) ?? null;
            }
           
            $domainInfo = [
                "domain" => $domain->reverse ?? "Not found",
                "country"=> $domain->country ?? "Not found",
                "isp"=> $domain->isp ?? "Not found",
                "org"=> $domain->org ?? "Not found",
                "as"=> $domain->as ?? "Not found"
            ];
        
            $result = [
                "ip" => $ipAd,
                "valid" => $isValid,
                "domainInfo" => $domainInfo
            ];
            $session->set("ip", $result);
        };
        
        return $response->redirect("verify");
    }

    /**
     * This sample method dumps the content of $di.
     * GET mountpoint/dump-app
     *
     * @return string
     */
    public function dumpDiActionGet() : string
    {
        // Deal with the action and return a response.
        $services = implode(", ", $this->di->getServices());
        return __METHOD__ . "<p>\$di contains: $services";
    }



   

    /**
     * Adding an optional catchAll() method will catch all actions sent to the
     * router. You can then reply with an actual response or return void to
     * allow for the router to move on to next handler.
     * A catchAll() handles the following, if a specific action method is not
     * created:
     * ANY METHOD mountpoint/**
     *
     * @param array $args as a variadic parameter.
     *
     * @return mixed
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function catchAll(...$args)
    {
        // Deal with the request and send an actual response, or not.
        //return __METHOD__ . ", \$db is {$this->db}, got '" . count($args) . "' arguments: " . implode(", ", $args);
        return $args;
    }
}

