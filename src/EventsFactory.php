<?php
declare(strict_types=1);

namespace ByTIC\FacebookPixel;

use ByTIC\FacebookPixel\Events\AbstractEvent;

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
    public static function create($type, array $properties = [])
    {
        $class = self::eventClass($type);
        /** @var AbstractEvent $event */
        $event = new $class();
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
                return '\ByTIC\FacebookPixel\Events\CustomEvent';
        }
    }
}
