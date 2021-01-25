Observer pattern

Implementation of the observer pattern given a problem. There is also some added pieces to the solution to drill in the point more. I also implemented a simple factory to handle the creation of WeatherDisplays called WeatherDisplay. There are also tests that only test against the solution directory and that is why the code coverage is so low. 

[![Build Status](https://travis-ci.org/amacsmith/observer-pattern.svg?branch=main)](https://travis-ci.org/amacsmith/observer-pattern)

[![codecov](https://codecov.io/gh/amacsmith/observer-pattern/branch/main/graph/badge.svg)](https://codecov.io/gh/amacsmith/observer-pattern)

[![StyleCI](https://github.styleci.io/repos/331114984/shield?branch=main)](https://github.styleci.io/repos/331114984?branch=main)

Usage

```
$this->weatherData = new WeatherData(50, 50, 50);
$weatherDisplayFactory = new WeatherDisplay($this->weatherData);
try {
    $this->currentConditions = $weatherDisplayFactory->make(DisplayTypes::CURRENTCONDITIONS, $this->weatherData);
    $this->forecast = $weatherDisplayFactory->make(DisplayTypes::FORECAST, $this->weatherData);
    $this->statistics = $weatherDisplayFactory->make(DisplayTypes::STATISTIC, $this->weatherData);
} catch (Exception $e) {
    echo $e->getMessage();
}

$this->weatherData->setMeasurements(50, 50, 50);
        
$this->currentConditions->getTemperature();
$this->currentConditions->getHumidity();
$this->currentConditions->getPressure();

$this->forecast->getTemperatureForecast();
$this->forecast->getHumidityForecast();
$this->forecast->getPressureForecast();

$this->statistics->getAverageTemperature();
$this->statistics->getAverageHumidity();
$this->statistics->getAveragePressure();

$this->weatherData->setMeasurements(100, 100, 100);

$this->currentConditions->getTemperature();
$this->currentConditions->getHumidity();
$this->currentConditions->getPressure();

$this->forecast->getTemperatureForecast();
$this->forecast->getHumidityForecast();
$this->forecast->getPressureForecast();

$this->statistics->getAverageTemperature();
$this->statistics->getAverageHumidity();
$this->statistics->getAveragePressure();

$this->weatherData->setMeasurements(0, 0, 0);

$this->currentConditions->getTemperature();
$this->currentConditions->getHumidity();
$this->currentConditions->getPressure();

$this->forecast->getTemperatureForecast();
$this->forecast->getHumidityForecast();
$this->forecast->getPressureForecast();

$this->statistics->getAverageTemperature();
$this->statistics->getAverageHumidity();
$this->statistics->getAveragePressure();

```
