<?php

namespace AMacSmith\ObserverPattern\Solution\Observers\Displays;

use AMacSmith\ObserverPattern\Solution\Observer;
use AMacSmith\ObserverPattern\Solution\Subjects\WeatherData;

class CurrentCondition extends WeatherDisplay implements Observer, DisplayElement
{
    private float $temperature;
    private float $humidity;
    private float $pressure;

    /**
     * CurrentCondition constructor.
     * @param WeatherData $weatherData
     */
    public function __construct(WeatherData $weatherData)
    {
        $this->weatherData = $weatherData;
        $this->temperature = $weatherData->getTemperature();
        $this->humidity = $weatherData->getHumidity();
        $this->pressure = $weatherData->getPressure();
        $weatherData->register($this);
    }

    /**
     * Update current weather conditions.
     */
    public function update(): void
    {
        $this->temperature = $this->weatherData->getTemperature();
        $this->humidity = $this->weatherData->getHumidity();
        $this->pressure = $this->weatherData->getPressure();
        $this->display();
    }

    /**
     * Display current weather conditions.
     */
    public function display(): void
    {
        echo "Current Conditions: {$this->temperature}F degrees, {$this->humidity}% humidity, {$this->pressure}% Pressure".PHP_EOL;
    }

    /**
     * @return float
     */
    public function getTemperature(): float
    {
        return $this->temperature;
    }

    /**
     * @return float
     */
    public function getHumidity(): float
    {
        return $this->humidity;
    }

    /**
     * @return float
     */
    public function getPressure(): float
    {
        return $this->pressure;
    }
}
