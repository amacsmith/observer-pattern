<?php

namespace AMacSmith\ObserverPattern\Solution\Observers\Displays;

use AMacSmith\ObserverPattern\Solution\Subjects\WeatherData;
use Exception;

class WeatherDisplay
{
    /**
     * WeatherDisplayFactory constructor.
     * @param WeatherData $weatherData
     */
    public function __construct(protected WeatherData $weatherData){}

    /**
     * @param string $displayType
     * @param WeatherData $weatherData
     * @return CurrentCondition|Forecast|Statistic
     * @throws Exception
     */
    public function make(string $displayType, WeatherData $weatherData): Statistic|Forecast|CurrentCondition
    {
        return match ($displayType) {
            DisplayTypes::CURRENTCONDITIONS => new CurrentCondition($weatherData),
            DisplayTypes::FORECAST => new Forecast($weatherData),
            DisplayTypes::STATISTIC => new Statistic($weatherData),
            default => throw new Exception('Invalid display type given ' . $displayType),
        };
    }
}