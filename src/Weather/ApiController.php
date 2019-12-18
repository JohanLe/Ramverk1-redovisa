<?php

namespace Anax\Weather;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;




/**
 * Style chooser controller loads available stylesheets from a directory and
 * lets the user choose the stylesheet to use.
 */
class ApiController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction() : string
    {
        $request = $this->di->get("request");
        $validate = $this->di->get("validate");
        $weatherHandler = new WeatherHandler();
        $geoMap = new GeoMap();
        
        $ipa = $request->getGet("ip");
        $valid = $validate->validateIpAdress($ipa);
        $result = "";
        if($valid){
            $cords = json_decode($geoMap->get($ipa));
            if($cords){
                $weather = $weatherHandler->getDailyForecast($cords->latitude,$cords->longitude);

                if($weather){
                    $weather = $weatherHandler->formatDailyForecast($weather->daily->data);
                    $result = json_encode($weather, JSON_PRETTY_PRINT);
                }else{
                    return "Failed to gather weather data";
                }
            }else{

                return "Failed to get cordinates";
            }
        }else{

            return "Ip adress is not valid";
        }


        return $result;
    }
    public function documentationAction() : object
    {
        $page = $this->di->get("page");

        $page->add("weather/apiDocumentation");
        
  
        return $page->render([  
            "title" => "Api",
        ]);
    }



}

