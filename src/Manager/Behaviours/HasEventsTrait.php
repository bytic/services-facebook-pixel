<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\Manager\Behaviours;

use ByTIC\FacebookPixel\Events\AbstractEvent;
use ByTIC\FacebookPixel\ServerSide\ServerEventFactory;

/**
 *
 */
trait HasEventsTrait
{
    public function addEvent($event, $pixelId = null)
    {
        $pixels = !empty($pixelId) ? [$this->pixel($pixelId)] : $this->getPixels();
        foreach ($pixels as $pixel) {
            $event = clone $event;
            $pixel->addEvent($event);
        }
    }

    public function addEventInMemory($event, $pixelId = null)
    {
        $pixels = !empty($pixelId) ? [$this->pixel($pixelId)] : $this->getPixels();
        foreach ($pixels as $pixel) {
            $event = clone $event;
            $pixel->addEventInMemory($event);
        }
    }

    public function getPixelsEvents(): array
    {
        $events = [];
        $pixels = $this->getPixels();
        foreach ($pixels as $pixel) {
            $pixelEvents = $pixel->getEvents();
            if (is_array($pixelEvents) && count($pixelEvents) > 0) {
                $events = array_merge($events, $pixelEvents);
            }
        }
        return $events;
    }

    /**
     * @param $pixelId
     *
     * @return void
     */
    public function sendEvent(AbstractEvent $event, $pixelId = null)
    {
        $this->sendEvents([$event], $pixelId);
    }

    /**
     * @param $events
     * @param $pixelId
     *
     * @return void
     */
    public function sendEvents($events, $pixelId = null)
    {
        $this->initialize();
        $request = $this->createRequest($pixelId);

        $events = array_map(function ($event) {
            return ServerEventFactory::fromEvent($event);
        }, $events);
        $request->setEvents($events);

        $request->execute();
    }
}
