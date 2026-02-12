<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\ServerSide;

use ByTIC\FacebookPixel\Events\AbstractEvent;
use ByTIC\FacebookPixel\EventsFactory;
use ByTIC\FacebookPixel\Utility\UserDataFactory;
use FacebookAds\Object\ServerSide\CustomData;
use FacebookAds\Object\ServerSide\Event;
use FacebookAds\Object\ServerSide\UserData;
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
     */
    public static function fromEvent($event, $properties = [], $eventId = null): Event
    {
        $event = $event instanceof AbstractEvent ? $event : EventsFactory::create($event, $properties, $eventId);

        $event = (new Event())
            ->setEventName($event->getEventName())
            ->setEventId($event->getEventId())
            ->setEventTime(time())
            ->setEventSourceUrl(Util::getRequestUri())
            ->setActionSource('website')
            ->setUserData(self::generateUserDataFromEvent($event))
            ->setCustomData(self::generateCustomData($event));
        return $event;
    }

    /**
     * @param AbstractEvent $event
     * @return CustomData
     */
    protected static function generateCustomData($event)
    {
        $customData = new CustomData();
        $properties = $event->getProperties();

        if ($properties['currency']) {
            $customData->setCurrency($properties['currency']);
        }

        if ($properties['value']) {
            $customData->setValue($properties['value']);
        }
        return $customData;
    }

    /**
     * @param AbstractEvent $event
     * @return UserData
     */
    protected static function generateUserDataFromEvent($event): UserData
    {
        $data = $event->getUserProperties();
        // Capture default user-data parameters passed down from the client browser.
        $userData = UserDataFactory::create($data);
        return $userData;
    }
}
