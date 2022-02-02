<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\FacebookPixel;

use ByTIC\FacebookPixel\EventsFactory;

/**
 * Trait CustomEventsTrait.
 */
trait CustomEventsTrait
{
    /**
     * Add Complete Registration event.
     */
    public function completeRegistration()
    {
        $this->addEvent(EventsFactory::create('CompleteRegistration'));
    }
}
