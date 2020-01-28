<?php

namespace Anax\IpVerify;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Anax\IpVerify\VerifyHelper;

/**
 * Style chooser controller loads available stylesheets from a directory and
 * lets the user choose the stylesheet to use.
 */
class VerifyApiController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * This is the index method action, it handles:
     * ANY METHOD mountpoint
     * ANY METHOD mountpoint/
     * ANY METHOD mountpoint/index
     * @return string
     */
    public function indexAction() : string
    {
        return "Welcome to the api.</br> </br>Returns a json-formated string.</br> </br>Usage: </br>- /api/json/*ipadress*    </br>- /api/prettyJson/*ipadress*   (Only for easy to read json in browser)</br> </br> - Example: /api/json/2a03:2880:f003:c07:face:b00c::2 ";
    }

    public function jsonActionGet($ipadress = false) : string
    {
        $verify = new VerifyHelper();

        if (!$ipadress) {
            return   "Not a valid ip-adress";
        } else if (strlen($ipadress) <= 15) {
            $valid = $verify->verifyIpv4($ipadress);
            if ($valid) {
                $domainInfo = $verify->getDomainInfo($ipadress) ??  null;
                return $domainInfo;
            };
            return   "Not a valid ip-adress";
        } else {
            $valid = $verify->verifyIpv6($ipadress);
            
            if ($valid) {
                $domainInfo = $verify->getDomainInfo($ipadress) ??  null;
                return $domainInfo;
            };
            return   "Not a valid ip-adress";
        }
        return   "Not a valid ip-adress";
    }

    public function prettyJsonActionGet($ipadress = false) : string
    {
        $verify = new VerifyHelper();

        if (!$ipadress) {
            return   "Not a valid ip-adress";
        } else if (strlen($ipadress) <= 15) {
            $valid = $verify->verifyIpv4($ipadress);
            if ($valid) {
                $domainInfo = $verify->prettyJsonForHtml(json_decode($verify->getDomainInfo($ipadress)) ??  null);
                return $domainInfo;
            };
            return "Not a valid ip-adress";
        } else {
            $valid = $verify->verifyIpv6($ipadress);
            
            if ($valid) {
                $domainInfo = $verify->prettyJsonForHtml(json_decode($verify->getDomainInfo($ipadress)) ??  null);
                return $domainInfo;
            };
            return "Not a valid ip-adress";
        }
        return "Not a valid ip-adress";
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
    /*
    public function catchAll(...$args)
    {
        // Deal with the request and send an actual response, or not.
        //return __METHOD__ . ", \$db is {$this->db}, got '" . count($args) . "' arguments: " . implode(", ", $args);
        return;
    }

*/
}
