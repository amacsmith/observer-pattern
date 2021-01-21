<?php

namespace AMacSmith\ObserverPattern\Solution\Observers\Displays;

use AMacSmith\ObserverPattern\Solution\Subjects\WeatherData;
use Exception;

class WeatherDisplay
{
    protected WeatherData $weatherData;

    /**
     * WeatherDisplayFactory constructor.
     * @param WeatherData $weatherData
     */
    public function __construct(WeatherData $weatherData){
        $this->weatherData = $weatherData;
    }

    /**
     * @param string $displayType
     * @param WeatherData $weatherData
     * @return CurrentCondition|Forecast|Statistic
     * @throws Exception
     */
    public function make(string $displayType, WeatherData $weatherData)
    {
        switch ($displayType) {
            case DisplayTypes::CURRENTCONDITIONS:
                return new CurrentCondition($weatherData);
                break;
            case DisplayTypes::FORECAST:
                return new Forecast($weatherData);
                break;
            case DisplayTypes::STATISTIC:
                return new Statistic($weatherData);
                break;
            default:
                throw new Exception('Invalid display type given ' . $displayType);
        }
    }
}