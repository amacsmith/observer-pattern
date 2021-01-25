<?php

namespace AMacSmith\ObserverPattern\RealWorldSolution;

interface Subject
{
    /**
     * Register an Observer.
     * @param Observer $observer
     * @return Subject
     */
    public function register(Observer $observer): Subject;

    /**
     * Unregister an Observer.
     * @param Observer $observer
     * @return Subject
     */
    public function unregister(Observer $observer): Subject;

    /**
     * Notify all Observers that the Subject's state has changed.
     */
    public function notify(): void;
}
