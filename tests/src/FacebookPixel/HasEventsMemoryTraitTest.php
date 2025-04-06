<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\Tests\FacebookPixel;

use ByTIC\FacebookPixel\Events\CompleteRegistration;
use ByTIC\FacebookPixel\EventsFactory;
use ByTIC\FacebookPixel\FacebookPixel;
use ByTIC\FacebookPixel\FlashMemory\EventsMemory;
use ByTIC\FacebookPixel\Tests\TestCase;

/**
 * Class HasEventsMemoryTraitTest.
 */
class HasEventsMemoryTraitTest extends TestCase
{
    public function testAddEventInMemory()
    {
        $pixel = new FacebookPixel();
        $pixel->setPixelId('789');
        $pixel->addEventInMemory(EventsFactory::create('CompleteRegistration'));

        $data = $_SESSION[EventsMemory::$sessionKey]['789'];
        $event = unserialize($data['CompleteRegistration']);
        self::assertInstanceOf(CompleteRegistration::class, $event);
    }

    public function testImportEventsFromMemoryOnRender()
    {
        $memory = new EventsMemory(789);
        $memory->addEvent(EventsFactory::create('CompleteRegistration'));
        $memory->addEvent(EventsFactory::create('AddToCart'));

        $pixel = new FacebookPixel();
        $pixel->setPixelId('789');
        $html = $pixel->render();

        self::assertStringContainsString("'trackSingle', '789', 'CompleteRegistration'", $html);
        self::assertStringContainsString("'trackSingle', '789', 'AddToCart'", $html);
    }
}
