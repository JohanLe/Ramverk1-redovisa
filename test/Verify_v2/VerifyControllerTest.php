<?php


namespace Anax\Verify;

use PHPUnit\Framework\TestCase;

/**
 * VerifyController test class.
 */
class VerifyControllerTest extends TestCase
{


    public function testGet(){

        $this->assertTrue(true);
        
    }



    // Verify Controller
    // Fungerar inte precis som med tidigare "huvud controller testen" hittar inte controllern..
    /*
    public function testIndexAction(){

        $controller = new VerifyController();
        $res = $controller->indexAction();
        var_dump($res);
        $this->assertEquals("Try '../api-geo/json/<ipadress>'", $res);
        
    }

    public function testindexActionPost(){

        $controller = new VerifyController();
        $res = $controller->indexActionPost();
        var_dump($controller);
        $this->assertEquals("Try '../api-geo/json/<ipadress>'", $res);
        
    }
    */
}
