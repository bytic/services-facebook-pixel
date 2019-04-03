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
     * @return AbstractEvent
     */
    public static function create($type)
    {
        $class = self::eventClass($type);
        $event = new $class();
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
