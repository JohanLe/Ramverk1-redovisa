<?php


namespace Anax\Weather;

use PHPUnit\Framework\TestCase;
use Anax\Weather\Storage;

/**
 * Example test class.
 */
class StorageTest extends TestCase
{

    // API controller

    public function testGetForecast(){
        $storage = new Storage();
        $res = $storage->getForecast();

        $this->assertIsString($res);
    }

    public function testGetLocation(){
        $storage = new Storage();
        $res = $storage->getLocation();

        $this->assertIsString($res);
    }




}
