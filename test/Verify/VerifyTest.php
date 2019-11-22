<?php


namespace Anax\IpVerify;


use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class VerifyTest extends TestCase
{
    // Verify controller

    /**
     * Check if controller return an object 
     * that contains key "layout"
     */

    public function testIndexAction(){

        $controller = new IpVerifyController();

        $res = $controller->indexAction();
        $this->assertContains('["layout":"Anax\Page\Page":private]', $res);
    }

    public function testIndexActionPost(){

        $controller = new IpVerifyController();

        $res = $controller->indexActionPost();
        $this->assertContains('["statusCode":"Anax\Response\Response":private]', $res);
    }
    


}
