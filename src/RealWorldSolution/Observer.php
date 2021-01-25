<?php

namespace AMacSmith\ObserverPattern\RealWorldSolution;

interface Observer
{
    /**
     * Update the observer with new state.
     */
    public function update(): void;
}
