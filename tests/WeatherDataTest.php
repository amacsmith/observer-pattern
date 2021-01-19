<?php

namespace AMacsmith\ObserverPattern\Tests;

use AMacSmith\ObserverPattern\Solution\Observers\Displays\CurrentCondition;
use AMacSmith\ObserverPattern\Solution\Observers\Displays\DisplayTypes;
use AMacSmith\ObserverPattern\Solution\Observers\Displays\Forecast;
use AMacSmith\ObserverPattern\Solution\Observers\Displays\Statistic;
use AMacSmith\ObserverPattern\Solution\Observers\Displays\WeatherDisplay;
use AMacSmith\ObserverPattern\Solution\Subjects\WeatherData;
use Exception;
use PHPUnit\Framework\TestCase;

class WeatherDataTest extends TestCase
{
    /**
     * @var WeatherData
     */
    private WeatherData $weatherData;

    /**
     * @var CurrentCondition
     */
    private CurrentCondition $currentConditions;

    /**
     * @var Forecast
     */
    private Forecast $forecast;

    /**
     * @var Statistic
     */
    private Statistic $statistics;

    protected function setUp(): void
    {
        $this->weatherData = new WeatherData(50, 50, 50);
        $weatherDisplayFactory = new WeatherDisplay($this->weatherData);
        try {
            $this->currentConditions = $weatherDisplayFactory->make(DisplayTypes::CURRENTCONDITIONS, $this->weatherData);
            $this->forecast = $weatherDisplayFactory->make(DisplayTypes::FORECAST, $this->weatherData);
            $this->statistics = $weatherDisplayFactory->make(DisplayTypes::STATISTIC, $this->weatherData);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        parent::setUp();
    }

    public function test_simulate_weather_data()
    {
        $this->weatherData->setMeasurements(50, 50, 50);
        echo PHP_EOL;
        $this->assertEquals(50, $this->currentConditions->getTemperature());
        $this->assertEquals(50, $this->currentConditions->getHumidity());
        $this->assertEquals(50, $this->currentConditions->getPressure());
        $this->assertEquals('Warmer', $this->forecast->getTemperatureForecast());
        $this->assertEquals('Muggier', $this->forecast->getHumidityForecast());
        $this->assertEquals('Clear', $this->forecast->getPressureForecast());
        $this->assertEquals(50, $this->statistics->getAverageTemperature());
        $this->assertEquals(50, $this->statistics->getAverageHumidity());
        $this->assertEquals(50, $this->statistics->getAveragePressure());
        $this->weatherData->setMeasurements(100, 100, 100);
        echo PHP_EOL;
        $this->assertEquals(100, $this->currentConditions->getTemperature());
        $this->assertEquals(100, $this->currentConditions->getHumidity());
        $this->assertEquals(100, $this->currentConditions->getPressure());
        $this->assertEquals('Warmer', $this->forecast->getTemperatureForecast());
        $this->assertEquals('Muggier', $this->forecast->getHumidityForecast());
        $this->assertEquals('Clear', $this->forecast->getPressureForecast());
        $this->assertEquals(75, $this->statistics->getAverageTemperature());
        $this->assertEquals(75, $this->statistics->getAverageHumidity());
        $this->assertEquals(75, $this->statistics->getAveragePressure());
        $this->weatherData->setMeasurements(0, 0, 0);
        echo PHP_EOL;
        $this->assertEquals(0, $this->currentConditions->getTemperature());
        $this->assertEquals(0, $this->currentConditions->getHumidity());
        $this->assertEquals(0, $this->currentConditions->getPressure());
        $this->assertEquals('Same or Cooler', $this->forecast->getTemperatureForecast());
        $this->assertEquals('Same or Dryer', $this->forecast->getHumidityForecast());
        $this->assertEquals('Same or Cloudier', $this->forecast->getPressureForecast());
        $this->assertEquals(50, $this->statistics->getAverageTemperature());
        $this->assertEquals(50, $this->statistics->getAverageHumidity());
        $this->assertEquals(50, $this->statistics->getAveragePressure());


    }
}