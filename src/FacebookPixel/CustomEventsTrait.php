<?php

namespace ByTIC\FacebookPixel\FacebookPixel;

use ByTIC\FacebookPixel\EventsFactory;

/**
 * Trait CustomEventsTrait
 * @package ByTIC\FacebookPixel\FacebookPixel
 */
trait CustomEventsTrait
{
    /**
     * Add Complete Registration event
     */
    public function completeRegistration()
    {
        $this->addEvent(EventsFactory::create('CompleteRegistration'));
    }
}
