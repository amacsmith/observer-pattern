<?php

namespace AMacSmith\ObserverPattern\Solution\Observers\Displays;

interface DisplayElement
{
    /**
     * Display state.
     */
    public function display(): void;
}
