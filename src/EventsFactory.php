<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel;

use ByTIC\FacebookPixel\Events\AbstractEvent;
use ByTIC\FacebookPixel\Events\CustomEvent;
use ByTIC\FacebookPixel\Utility\EventIdGenerator;

/**
 * Class EventsFactory.
 */
class EventsFactory
{
    /**
     * @param string $type
     *
     * @return AbstractEvent
     */
    public static function create($type, array $properties = [], $eventId = null)
    {
        $class = self::eventClass($type);
        /** @var AbstractEvent $event */
        $event = new $class();

        $eventId = null === $eventId ? EventIdGenerator::generate() : $eventId;
        $event->setEventId($eventId);

        $event->setProperties($properties);

        return $event;
    }

    /**
     * @param $type
     *
     * @return string
     */
    public static function eventClass($type)
    {
        switch ($type) {
            case 'AddToCart':
            case 'CompleteRegistration':
            case 'Donate':
            case 'Lead':
            case 'Search':
            return '\ByTIC\FacebookPixel\Events\\' . $type;
            default:
                return CustomEvent::class;
        }
    }
}
