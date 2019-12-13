<?php 

namespace Anax\Weather;

class WeatherHandler {
    public $url = "https://api.darksky.net/forecast/26ef698985dfe0ef5692b30380a51e04/";

    public function getDailyForecast($latitude, $longitude) {
        $options = "?units=si&exclude=[hourly,minutely,alerts,flags]";
        $params = "$latitude,$longitude";

        $cUrl = curl_init();

        curl_setopt($cUrl, CURLOPT_URL, $this->url . $params . $options);
        curl_setopt($cUrl, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($cUrl);
        curl_close($cUrl);

        $result = json_decode($result);
        if(array_key_exists("error", $result)){
            // Returnera variabel med felmeddelande.
            return false;
        }
        return $result;
    }

    public function formatDailyForecast($data){
        $formated = [];
        $index = 0;
        $day = "";
        foreach ($data as $value){
            if($index == 0){
                $day = "Today";
            }elseif ($index == 1){
                $day = "Tomorrow";
            }else {
                $day = date("D", $value->time);
            }
            
            $forcast = [
                "day" => $day,
                "date" => date("d M", $value->time),
                "summary" => $value->summary,
                "temperatureHigh" => round($value->temperatureHigh, 1),
                "temperatureLow" => round($value->temperatureLow, 1),
                "windSpeed"=> $value->windSpeed
            ];
            array_push($formated, $forcast);
            $index ++;
        } 
        
        return $formated;
    }
    


}