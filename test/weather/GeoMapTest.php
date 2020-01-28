<?php


namespace Anax\Weather;

use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class GeoMapTest extends TestCase
{

    // API controller

    public function testGet(){

        $geoMap = new GeoMap();
        $res = $geoMap->get("213.112.139.9");
        $this->assertIsString($res);
        
    }
    /**
     * With Filter
     */
    public function testGetFilter(){

        $geoMap = new GeoMap();
        $res = $geoMap->get("213.112.139.9", "ip,country_name");
        $this->assertIsString($res);
        
    }
    public function testGetUserData(){

        $geoMap = new GeoMap();
        $res = $geoMap->getUserData();
    
         $this->assertObjectHasAttribute('longitude', $res);
        
    }
    /**
     * With Filter
     */
    public function testGetUserDataFilter(){

        $controller = new GeoMap();
        $res = $controller->getUserData("ip,country_name");
     
        $this->assertObjectHasAttribute('country_name', $res);
        $this->assertObjectHasAttribute('ip', $res);
    }




}
