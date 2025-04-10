<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel;

use ByTIC\FacebookPixel\Events\AbstractEvent;
use ByTIC\FacebookPixel\Events\AddPaymentInfo;
use ByTIC\FacebookPixel\Events\AddToCart;
use ByTIC\FacebookPixel\Events\CompleteRegistration;
use ByTIC\FacebookPixel\Events\CustomEvent;
use ByTIC\FacebookPixel\Events\Donate;
use ByTIC\FacebookPixel\Events\Lead;
use ByTIC\FacebookPixel\Events\Search;
use ByTIC\FacebookPixel\Events\SubmitApplication;
use ByTIC\FacebookPixel\Events\ViewContent;
use ByTIC\FacebookPixel\Utility\EventIdGenerator;

/**
 * Class EventsFactory.
 */
class EventsFactory
{
    /**
     * @param array $properties
     * @param $eventId
     * @return AddPaymentInfo|AbstractEvent
     */
    public static function createAddPaymentInfo(array $properties = [], $eventId = null): AddPaymentInfo|AbstractEvent
    {
        return self::create(AddPaymentInfo::NAME, $properties, $eventId);
    }

    /**
     * @param array $properties
     * @param $eventId
     * @return AddToCart|AbstractEvent
     */
    public static function createAddToCart(array $properties = [], $eventId = null): AddToCart|AbstractEvent
    {
        return self::create(AddToCart::NAME, $properties, $eventId);
    }

    /**
     * @param array $properties
     * @param $eventId
     * @return CompleteRegistration|AbstractEvent
     */
    public static function createCompleteRegistration(
        array $properties = [],
        $eventId = null
    ): CompleteRegistration|AbstractEvent {
        return self::create(CompleteRegistration::NAME, $properties, $eventId);
    }

    /**
     * @param array $properties
     * @param $eventId
     * @return CustomEvent|AbstractEvent
     */
    public static function createCustomEvent(array $properties = [], $eventId = null): CustomEvent|AbstractEvent
    {
        return self::create(CustomEvent::NAME, $properties, $eventId);
    }

    /**
     * @param array $properties
     * @param null $eventId
     * @return Donate|AbstractEvent
     */
    public static function createDonate(array $properties = [], $eventId = null): Donate|AbstractEvent
    {
        return self::create(Donate::NAME, $properties, $eventId);
    }

    /**
     * @param array $properties
     * @param null $eventId
     * @return Lead|AbstractEvent
     */
    public static function createLead(array $properties = [], $eventId = null): Lead|AbstractEvent
    {
        return self::create(Lead::NAME, $properties, $eventId);
    }

    /**
     * @param array $properties
     * @param $eventId
     * @return Search
     */
    public static function createSearch(array $properties = [], $eventId = null): Search|AbstractEvent
    {
        return self::create(Search::NAME, $properties, $eventId);
    }

    /**
     * @param array $properties
     * @param $eventId
     * @return SubmitApplication|AbstractEvent
     */
    public static function createSubmitApplication(
        array $properties = [],
        $eventId = null
    ): SubmitApplication|AbstractEvent {
        return self::create(SubmitApplication::NAME, $properties, $eventId);
    }

    /**
     * @param array $properties
     * @param null $eventId
     * @return ViewContent|AbstractEvent
     */
    public static function createViewContent(array $properties = [], $eventId = null): ViewContent|AbstractEvent
    {
        return self::create(ViewContent::NAME, $properties, $eventId);
    }

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
        if (in_array($type, AbstractEvent::STANDARD_EVENTS)) {
            return '\ByTIC\FacebookPixel\Events\\' . $type;
        }

        return CustomEvent::class;
    }
}
