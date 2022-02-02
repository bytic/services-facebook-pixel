<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\Manager;

use ByTIC\FacebookPixel\Events\AbstractEvent;
use ByTIC\FacebookPixel\ServerSide\ServerEventFactory;

/**
 *
 */
trait HasEventsTrait
{
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
