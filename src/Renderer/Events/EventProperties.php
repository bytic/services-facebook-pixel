<?php
declare(strict_types=1);

namespace ByTIC\FacebookPixel\Renderer\Events;

use ByTIC\FacebookPixel\Events\AbstractEvent;

/**
 *
 */
class EventProperties
{
    public static function for(AbstractEvent $event)
    {
        $properties = '{}';
        $properties = static::buildEventProperties($event, $properties);
        $properties = static::buildEventIdProperties($event, $properties);

        return $properties;
    }

    /**
     * @param $propertiesString
     *
     * @return array|mixed|string|string[]|null
     */
    protected static function buildEventProperties(AbstractEvent $event, $propertiesString)
    {
        $properties = $event->getProperties();
        if (count($properties) < 1) {
            return $propertiesString;
        }
        $propertiesString = json_encode($properties);
        $propertiesString = preg_replace('/"([^"]+)"\s*:\s*/', '$1:', $propertiesString);

        return $propertiesString;
    }

    /**
     * @param $properties
     *
     * @return mixed|string
     */
    protected static function buildEventIdProperties(AbstractEvent $event, $properties)
    {
        $eventId = $event->getEventId();
        if (!empty($eventId)) {
            $properties .= ', {eventID: \'' . $eventId . '\'}';
        }

        return $properties;
    }
}
