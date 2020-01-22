<?php


namespace Anax\Verify;

use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class ApiVerifyTest extends TestCase
{

    // API controller

    public function testIndexAction(){

        $controller = new ApiController();
        $res = $controller->indexAction();
        $this->assertEquals("Try '../api-geo/json/<ipadress>'", $res);
        
    }
   
    /**
     * A valid ip adress
     */
    public function testJsonActionGetSuccess(){
        $controller = new ApiController();
        $res = $controller->jsonActionGet("213.112.139.9");

        $this->assertContains("ipv4", $res);

    }
    /**
     * Not a valid ip adress
     */
    public function testJsonActionGetNotValid(){
        $controller = new ApiController();
        $res = $controller->jsonActionGet("213.asds.2.2");

        $this->assertEmpty($res);

    }
    public function testJsonActionGetSuccessIpv6(){
        $controller = new ApiController();
        $res = $controller->jsonActionGet("2001:4860:4860::8888");

        $this->assertContains("ipv6", $res);

    }



}
