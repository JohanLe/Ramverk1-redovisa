<?php

namespace Anax\Weather;

use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class MainControllerTest extends TestCase
{

    /**
     * Test and se if it returns an Object
     */
    public function testIndexAction(){

        $controller = new MainController();
        $res = $controller->indexAction();
        $this->assertIsObject($res);
    }

        /**
     * Test and se if it returns a String
     */
    public function testipadressActionPost(){

        $controller = new MainController();
        $res = $controller->ipadressActionPost();
        $this->assertIsString($res);
    }

    


}
