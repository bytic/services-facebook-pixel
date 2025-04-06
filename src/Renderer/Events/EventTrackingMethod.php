<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\Renderer\Events;

use ByTIC\FacebookPixel\Events\AbstractEvent;

/**
 *
 */
class EventTrackingMethod
{
    public const NAME = 'track';

    public const NAME_SINGLE = 'trackSingle';

    public const NAME_SINGLE_CUSTOM = 'trackSingleCustom';

    public static function for(AbstractEvent $event): string
    {
        if ($event->hasPixelId()) {
            return "'" . self::NAME_SINGLE . "', '" . $event->getPixelId() . "'";
        }

        return "'" . self::NAME . "'";
    }
}