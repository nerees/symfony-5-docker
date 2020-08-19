<?php

namespace App;

use Exception;

Class MeteoApi
{
    
    public function getConditions($city)
    {
        if (!$this->locationExists($city)){
            $city = "vilnius";
            //log an error
        }

        $url = "https://api.meteo.lt/v1/places/".$city."/forecasts/long-term/";
        $default_conditions="sunny";

        try {
            $unparsed_json = file_get_contents($url);
            $json_object = json_decode($unparsed_json);
            $weather_conditions_now = $this->get_weather_conditions_now($json_object->forecastTimestamps);

            if ($weather_conditions_now->conditionCode == "clear" || $weather_conditions_now->conditionCode == "isolated-clouds"){
                return "sunny";
            }

            if ($weather_conditions_now->conditionCode == "light-rain" || $weather_conditions_now->conditionCode == "moderate-rain" || $weather_conditions_now->conditionCode == "heavy-rain"){
                return "rainy";
            }

            if ($weather_conditions_now->conditionCode == "scattered-clouds" || $weather_conditions_now->conditionCode == "overcast"){
                return "cloudy";
            }

            if ($weather_conditions_now->conditionCode == "sleet" || $weather_conditions_now->conditionCode == "light-snow" || $weather_conditions_now->conditionCode == "moderate-snow" || $weather_conditions_now->conditionCode == "heavy-snow"){
                return "snow";
            }

            if ($weather_conditions_now->conditionCode == "fog"){
                return "fog";
            }
        } catch (Exception $e) {
            //Log an error with symfony Logger
            //If no results from api returning default
            return $default_conditions;
        }
    }

    public function get_weather_conditions_now($apidata)
    {
        foreach ($apidata as $the_time_is_now)
        {
                if (date($the_time_is_now->forecastTimeUtc) == date('Y-m-d h:00:00')) 
                {
                    return $the_time_is_now;
                }
        }
        return null;
    }

    public function locationExists($city)
    {
        $data = json_decode(file_get_contents("https://api.meteo.lt/v1/places"));

        foreach ($data as $location){
            //echo $location->code . "\n";
            if ($location->code == $city){
                return true;
            }
        }
        return false;
    }
}