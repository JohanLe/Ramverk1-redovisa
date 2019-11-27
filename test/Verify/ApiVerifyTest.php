<?php


namespace Anax\IpVerify;

use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class ApiVerifyTest extends TestCase
{

    // API controller

    public function testindexAction(){

        $controller = new VerifyApiController();

        $res = $controller->indexAction();
        $this->assertContains("Welcome to the api.</br> </br>Returns a json-formated string.</br> </br>Usage: </br>- /api/json/*ipadress*    </br>- /api/prettyJson/*ipadress*   (Only for easy to read json in browser)</br> </br> - Example: /api/json/2a03:2880:f003:c07:face:b00c::2 ", $res);
    }
    /**
     * Empty string / No string
     * 
     */
    public function testJsonActionGetEmptyParam(){
        $controller = new VerifyApiController();

        $res = $controller->jsonActionGet();
        $this->assertContains('Not a valid ip-adress', $res);
    }
    
    /**
     * Fail IPV4
     * Bad ip
     */
    public function testJsonActionGetBadIp(){
        $controller = new VerifyApiController();

        $res = $controller->jsonActionGet("192.a92.22.2");
        $this->assertContains('"status":"fail"', $res);
    }

                    /**
     * Fail IPV4
     * Not valid ipadress format.
     */
    public function testPrettyJsonActionGetFailIpv4(){
        $controller = new VerifyApiController();
        
        $res = $controller->prettyJsonActionGet("192.a92.aaa");
        $this->assertContains('Not a valid ip-adress', $res);
    }
    /**
     * Fail IPV4
     * Not valid ipadress format.
     */
    public function testPrettyJsonActionGetNoResultIpv4(){
        $controller = new VerifyApiController();
        
        $res = $controller->prettyJsonActionGet("0.199.199.199");
        $this->assertContains('"status" : "fail"', $res);
    }
    
    /**
     * Succsess IPV6
     */                             
    public function testJsonActionGetSuccessIpv6(){
        $controller = new VerifyApiController();
        
        $res = $controller->jsonActionGet("2a03:2880:f003:c07:face:b00c::2");
        $this->assertContains('"status":"success"', $res);
    }
        /**
     * Succsess IPV6
     */
    public function testPrettyJsonActionGetSuccessIpv6(){
        $controller = new VerifyApiController();
        
        $res = $controller->prettyJsonActionGet("2a03:2880:f003:c07:face:b00c::2");
        $this->assertContains('"status" : "success"', $res);
    }
    /**
     * Fail IPV6
     * Not valid ipadress format.
     */
    public function testPrettyJsonActionGetBadIp(){
        $controller = new VerifyApiController();
        
        $res = $controller->prettyJsonActionGet("2a03:2880:-f003:c07:face:b00c::2");
        $this->assertContains('Not a valid ip-adress', $res);
    }





}
