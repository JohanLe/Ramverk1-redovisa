<?php

namespace Anax\Weather;

use PHPUnit\Framework\TestCase;

/**
 * Example test class.
 */
class WeatherHandlerTest extends TestCase
{


    public function testGetDailyForecast(){
        $controller = new WeatherHandler();
        $res = $controller->getDailyForecast(12,12);
        $this->assertIsInt($res->latitude);
    }
    /**
     * Fail, due to wrong cordinates
     */
    public function testGetDailyForecast1(){
        $controller = new WeatherHandler();
        $res = $controller->getDailyForecast("a","c");
        $this->assertFalse($res);
    }
    /**
     * Check if an array is returned.
     */
    public function testformatDailyForecast(){
        $controller = new WeatherHandler();
        $forecast = $controller->getDailyForecast(12,12);
 
        $res = $controller->formatDailyForecast($forecast->daily->data);
        $this->assertIsArray($res);
    }




}
