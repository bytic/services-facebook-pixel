<?php
declare(strict_types=1);

namespace ByTIC\FacebookPixel;

use ByTIC\FacebookPixel\Events\AbstractEvent;
use ByTIC\FacebookPixel\Utility\EventIdGenerator;

/**
 * Class EventsFactory
 *
 * @author Gabriel Solomon <hello@gabrielsolomon.ro>
 */
class EventsFactory
{

    /**
     * @param string $type
     * @param array $properties
     * @return AbstractEvent
     */
    public static function create($type, array $properties = [], $eventId = null)
    {
        $class = self::eventClass($type);
        /** @var AbstractEvent $event */
        $event = new $class();

        $eventId = $eventId === null ? EventIdGenerator::generate() : $eventId;
        $event->setEventId($eventId);

        $event->setProperties($properties);
        return $event;
    }

    /**
     * @param $type
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
                return \ByTIC\FacebookPixel\Events\CustomEvent::class;
        }
    }
}
