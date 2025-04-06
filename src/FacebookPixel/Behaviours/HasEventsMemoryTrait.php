<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\FacebookPixel\Behaviours;

use ByTIC\FacebookPixel\Events\AbstractEvent;
use ByTIC\FacebookPixel\FlashMemory\EventsMemory;

/**
 * Trait HasEventsTrait.
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
        if (null === $this->memory) {
            $this->memory = new EventsMemory($this->getPixelId());
        }

        return $this->memory;
    }
}
