<?php

namespace AMacSmith\ObserverPattern\Solution\Observers\Displays;

use AMacSmith\ObserverPattern\Solution\Observer;
use AMacSmith\ObserverPattern\Solution\Subjects\WeatherData;

class Statistic extends WeatherDisplay implements Observer, DisplayElement
{
    private float $averageTemperature;
    private array $temperatures = [];
    private float $averageHumidity;
    private array $humidities = [];
    private float $averagePressure;
    private array $pressures = [];

    /**
     * Statistic constructor.
     * @param WeatherData $weatherData
     */
    public function __construct(WeatherData $weatherData)
    {
        $this->weatherData = $weatherData;
        $weatherData->register($this);
    }
    
    /**
     * Update weather statistics
     */
    public function update(): void
    {
        $this->temperatures[] = $this->weatherData->getTemperature();
        $this->humidities[] = $this->weatherData->getHumidity();
        $this->pressures[] = $this->weatherData->getPressure();

        $this->averageTemperature = array_sum($this->temperatures)/count($this->temperatures);
        $this->averageHumidity = array_sum($this->humidities)/count($this->humidities);
        $this->averagePressure = array_sum($this->pressures)/count($this->pressures);
        $this->display();
    }

    /**
     * display weather statistics
     */
    public function display(): void
    {
        echo "Statistics: {$this->averageTemperature}F degrees, {$this->averageHumidity}% humidity, {$this->averagePressure}% Pressure".PHP_EOL;
    }

    /**
     * @return float
     */
    public function getAverageTemperature(): float
    {
        return $this->averageTemperature;
    }

    /**
     * @return float
     */
    public function getAverageHumidity(): float
    {
        return $this->averageHumidity;
    }

    /**
     * @return float
     */
    public function getAveragePressure(): float
    {
        return $this->averagePressure;
    }
}