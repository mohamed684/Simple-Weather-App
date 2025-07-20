<?php

namespace App\Weather;

class RemoteWeatherFetcher implements WeatherFetcherInterface {

    public function fetch(string $city): WeatherInfo {
        
        $url = "https://downloads.codingcoursestv.eu/056%20-%20php/weather/weather.php?" . http_build_query(['city' => $city]);

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Return the response
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);  // Follow redirects
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);           // Timeout

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'cURL Error: ' . curl_error($ch);
            curl_close($ch);
            exit;
        }

        curl_close($ch);

        $data = json_decode($response, true);
        return new WeatherInfo($data['city'], $data['temperature'], $data['weather']);
    }
}