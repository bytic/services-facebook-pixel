<?php
declare(strict_types=1);

namespace ByTIC\FacebookPixel\ServerSide;

use ByTIC\FacebookPixel\Events\AbstractEvent;
use ByTIC\FacebookPixel\EventsFactory;
use ByTIC\FacebookPixel\Utility\UserDataFactory;
use FacebookAds\Object\ServerSide\CustomData;
use FacebookAds\Object\ServerSide\Event;
use FacebookAds\Object\ServerSide\Util;

/**
 *
 */
class ServerEventFactory
{
    /**
     * @param $event
     * @param $properties
     * @param $eventId
     * @return Event
     */
    public static function fromEvent($event, $properties = [], $eventId = null): Event
    {
        $event = $event instanceof AbstractEvent ? $event : EventsFactory::create($event, $properties, $eventId);

        // Capture default user-data parameters passed down from the client browser.
        $userData = UserDataFactory::create();

        $event = (new Event())
            ->setEventName($event->getEventName())
            ->setEventId($event->getEventId())
            ->setEventTime(time())
            ->setEventSourceUrl(Util::getRequestUri())
            ->setActionSource('website')
            ->setUserData($userData)
            ->setCustomData(new CustomData());

        return $event;
    }
}