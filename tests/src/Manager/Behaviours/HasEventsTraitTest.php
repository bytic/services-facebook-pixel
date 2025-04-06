<?php

namespace ByTIC\FacebookPixel\Tests\Manager\Behaviours;

use ByTIC\FacebookPixel\EventsFactory;
use ByTIC\FacebookPixel\Tests\TestCase;
use ByTIC\FacebookPixel\Utility\FacebookPixel;

/**
 *
 */
class HasEventsTraitTest extends TestCase
{
    public function test_addEvents()
    {
        $manager = FacebookPixel::instance();

        self::assertCount(0, $manager->getPixels());

        $pixel1Id = '9999999';
        $pixel1 = $manager->pixel($pixel1Id);
        self::assertNull($pixel1->getEvents());

        $pixel2Id = '1111111';
        $pixel2 = $manager->pixel($pixel2Id);
        self::assertNull($pixel2->getEvents());
        self::assertCount(0, $manager->getPixelsEvents());

        $manager->addEvent(EventsFactory::create('Lead'));
        self::assertCount(1, $pixel1->getEvents());
        self::assertCount(1, $pixel2->getEvents());
        self::assertCount(2, $manager->getPixelsEvents());

        $manager->addEvent(EventsFactory::create('Donate', ['currency' => 'USD', 'value' => 30.00]), $pixel2Id);
        self::assertCount(1, $pixel1->getEvents());
        self::assertCount(2, $pixel2->getEvents());

        $events = $manager->getPixelsEvents();
        self::assertCount(3, $events);
    }
}
