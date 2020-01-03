<?php

namespace Anax\Weather;

use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class ApiTest extends TestCase
{


      /**
     * Test and se if it return an Object
     */
    public function testIndexAction(){

        $controller = new ApiController();
        $res = $controller->indexAction();
        $this->assertIsString($res);
    }

        /**
     * Test and se if it return an Object
     */
    public function testDocumentationAction(){

        $controller = new ApiController();
        $res = $controller->documentationAction();
        $this->assertIsObject($res);
    }



}
