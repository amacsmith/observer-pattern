<?php

namespace AMacSmith\ObserverPattern\Solution\Observers\Displays;

use AMacSmith\ObserverPattern\Solution\Observer;
use AMacSmith\ObserverPattern\Solution\Subjects\WeatherData;

class Forecast extends WeatherDisplay implements Observer, DisplayElement
{
    private float $temperature = 0;
    private string $temperatureForecast;
    private float $humidity = 0;
    private string $humidityForecast;
    private float $pressure = 0;
    private string $pressureForecast;

    /**
     * Forecast constructor.
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
     * Update weather forecast
     */
    public function update(): void
    {
        $this->temperatureForecast = ($this->temperature <= $this->weatherData->getTemperature()) ? 'Warmer' : 'Same or Cooler';
        $this->humidityForecast = ($this->humidity <= $this->weatherData->getHumidity()) ? 'Muggier' : 'Same or Dryer';
        $this->pressureForecast = ($this->pressure <= $this->weatherData->getPressure()) ? 'Clear' : 'Same or Cloudier';
        $this->display();
    }

    /**
     * Display weather forecast
     */
    public function display(): void
    {
        echo "Weather Forecast: {$this->temperatureForecast} temperature, {$this->humidityForecast} air, {$this->pressureForecast} skies".PHP_EOL;
    }

    /**
     * @return string
     */
    public function getTemperatureForecast(): string
    {
        return $this->temperatureForecast;
    }

    /**
     * @return string
     */
    public function getHumidityForecast(): string
    {
        return $this->humidityForecast;
    }

    /**
     * @return string
     */
    public function getPressureForecast(): string
    {
        return $this->pressureForecast;
    }
}