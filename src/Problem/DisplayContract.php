<?php

// @codeCoverageIgnoreStart

namespace AMacSmith\ObserverPattern\Problem;

interface DisplayContract
{
    public function update(float $temperature, float $humidity, float $pressure): void;
}
