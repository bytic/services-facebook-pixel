<?php

namespace ByTIC\FacebookPixel\FacebookPixel;

use ByTIC\FacebookPixel\Events\AbstractEvent;

/**
 * Trait HasEventsTrait
 * @package ByTIC\FacebookPixel\FacebookPixel
 */
trait HasEventsTrait
{
    /** @var AbstractEvent[] */
    protected $events = null;

    /**
     * @return AbstractEvent[]
     */
    public function getEvents()
    {
        if ($this->events === null) {
            $this->initEvents();
        }
        return $this->events;
    }

    protected function initEvents()
    {

    }

    /**
     * @param AbstractEvent[] $events
     */
    public function setEvents($events)
    {
        $this->events = $events;
    }

    /**
     * @param AbstractEvent $event
     */
    public function addEvent($event)
    {
        $this->events[] = $event;
    }
}
