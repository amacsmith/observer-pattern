<?php

namespace AMacSmith\ObserverPattern\Solution\Subjects;

use AMacSmith\ObserverPattern\Solution\Observer;
use AMacSmith\ObserverPattern\Solution\Subject;

class WeatherData implements Subject
{
    /**
     * WeatherData constructor.
     * @param float $temperature
     * @param float $humidity
     * @param float $pressure
     */
    public function __construct(private float $temperature,
                                private float $humidity,
                                private float $pressure)
    {}

    /**
     * @var array Observer
     */
    private array $observers = [];

    public function register(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    public function unregister(Observer $observer): void
    {
        if(($key = array_search($observer, $this->observers,true)) !== FALSE) {
            unset($this->observers[$key]);
        }
    }

    /**
     * Notify Observers of some change
     */
    public function notify(): void
    {
        foreach($this->observers as $observer) {
            $observer->update();
        }
    }

    /**
     * @param float $temperature
     * @param float $humidity
     * @param float $pressure
     */
    public function setMeasurements(float $temperature, float $humidity, float $pressure): void
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->measurementsChanged();
    }

    /**
     * Measurements have been changed and should now notify Observers
     */
    private function measurementsChanged(): void
    {
        $this->notify();
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