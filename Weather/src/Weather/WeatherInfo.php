<?php

namespace App\Weather;
class WeatherInfo {

    public function __construct(
        public string $city,
        public int $temperature,
        public string $weatherType
    ) {}

    public function getCelsius() {
        return round($this->temperature - 273.15);
    }
}