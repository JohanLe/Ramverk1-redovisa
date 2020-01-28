<?php

namespace Anax\IpVerify;

class VerifyHelper
{
    public function type($ipAdress)
    {
        if (strlen($ipAdress) >= 15) {
            return "IPV4";
        }
        return "IPV6";
    }

    /**
     * @param adress - ip adress as string.
     * @return Bool.
     * Checks if ipv4 ip adress is valid or not.
     * If not valid - return false
     * If valid - return true
     */
    public function verifyIpv4($ipAdress)
    {
        $list = explode(".", $ipAdress);
        $i = 0;
        foreach ($list as $byte) {
            $strLen = strlen($byte);
            if ($byte > 255 || $byte < 0) {
                return false;
            }
            if ($strLen < 1 && $strLen > 3) {
                return false;
            }
            $i++;
        }
        if ($i != 4) {
            return false;
        }
        return true;
    }
    /**
     * @param adress - ip adress as string.
     * @return Bool.
     * Checks if ipv6 ip adress is valid or not.
     * If not valid - return false
     * If valid - return true
     */
    public function verifyIpv6($ipAdress)
    {
        if (filter_var($ipAdress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            return true;
        } else {
            echo("$ipAdress is not a valid IPv6 address");
            return false;
        }
    }

    public function getDomainInfo($ipAdress)
    {
        $result = file_get_contents('http://ip-api.com/json/'. $ipAdress . "?fields=65535");
        return $result;
    }

    /**
     * @param JSON-object
     * @return STRING - "json like". Make json string look nice in the browser.
     */
    public function prettyJsonForHtml($jsonData)
    {
        $jsonStr = "{ </br>";
        foreach ($jsonData as $key => $value) {
            if ($key == "reverse") {
                $key = "domain";
            }
            $jsonStr = $jsonStr . "    \"{$key}\" : \"{$value}\", </br>";
        };
        $jsonStr = $jsonStr . "}";
        return $jsonStr;
    }
}
