<?php

namespace AMacSmith\ObserverPattern\Solution;

interface Subject
{
    /**
     * Register an Observer
     * @param Observer $observer
     */
    public function register(Observer $observer): void;

    /**
     * Unregister an Observer
     * @param Observer $observer
     */
    public function unregister(Observer $observer): void;

    /**
     * Notify all Observers that the Subject's state has changed
     */
    public function notify(): void;
}