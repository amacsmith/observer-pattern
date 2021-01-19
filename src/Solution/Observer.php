<?php

namespace AMacSmith\ObserverPattern\Solution;

interface Observer
{
    /**
     * Update the observer with new state
     */
    public function update(): void;
}