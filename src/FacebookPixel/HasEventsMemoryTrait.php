<?php

namespace ByTIC\FacebookPixel\FacebookPixel;

use ByTIC\FacebookPixel\Events\AbstractEvent;
use ByTIC\FacebookPixel\FlashMemory\EventsMemory;

/**
 * Trait HasEventsTrait
 * @package ByTIC\FacebookPixel\FacebookPixel
 */
trait HasEventsMemoryTrait
{
    protected $memory = null;

    /**
     * @param AbstractEvent $event
     */
    public function addEventInMemory($event)
    {
        $this->getEventsMemory()->addEvent($event);
    }

    protected function importEventsFromMemory()
    {
        $events = $this->getEventsMemory()->getPrevious();
        foreach ($events as $event) {
            $this->addEvent($event);
        }
    }

    /**
     * @return EventsMemory|null
     */
    protected function getEventsMemory()
    {
        if ($this->memory === null) {
            $this->memory = new EventsMemory($this->getPixelId());
        }
        return $this->memory;
    }
}
