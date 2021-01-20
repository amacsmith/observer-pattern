<?php
// @codeCoverageIgnoreStart
namespace AMacSmith\ObserverPattern\Problem;

class WeatherData
{

    /**
     * WeatherData constructor.
     * @param DisplayContract $currentConditionsDisplay
     * @param DisplayContract $statisticsDisplay
     * @param DisplayContract $forecastDisplay
     */
    public function __construct(public DisplayContract $currentConditionsDisplay,
                                public DisplayContract $statisticsDisplay,
                                public DisplayContract $forecastDisplay)
    {}
    
    public function getTemperature()
    {
        return $this->temperature;
    }

    public function getHumidity()
    {
        return $this->humidity;
    }

    public function getPressure()
    {
        return $this->pressure;
    }

    public function measurementsChanged()
    {
        $temperature = $this->getTemperature();
        $humidity = $this->getHumidity();
        $pressure = $this->getPressure();

        $this->currentConditionsDisplay->update($temperature, $humidity, $pressure);
        $this->statisticsDisplay->update($temperature, $humidity, $pressure);
        $this->forecastDisplay->update($temperature, $humidity, $pressure);
    }
}