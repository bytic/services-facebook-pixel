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
     * @param AbstractEvent $event
     * @param $pixelId
     * @return void
     */
    public function sendEvent(AbstractEvent $event, $pixelId = null)
    {
        $this->initialize();
        $request = $this->createRequest($pixelId);

        $events = [ServerEventFactory::fromEvent($event)];
        $request->setEvents($events);

        $request->execute();
    }
}
