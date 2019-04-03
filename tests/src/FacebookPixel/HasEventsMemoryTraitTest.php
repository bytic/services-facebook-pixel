<?php

namespace Nip\FacebookPixel\Tests\FacebookPixel;

use ByTIC\FacebookPixel\Events\CompleteRegistration;
use ByTIC\FacebookPixel\EventsFactory;
use ByTIC\FacebookPixel\FacebookPixel;
use ByTIC\FacebookPixel\FlashMemory\EventsMemory;
use Nip\FacebookPixel\Tests\AbstractTest;

/**
 * Class HasEventsMemoryTraitTest
 * @package Nip\FacebookPixel\Tests\FacebookPixel
 */
class HasEventsMemoryTraitTest extends AbstractTest
{
    public function testAddEventInMemory()
    {
        $pixel = new FacebookPixel();
        $pixel->setPixelId('789');
        $pixel->addEventInMemory(EventsFactory::create('CompleteRegistration'));

        $data = $_SESSION[EventsMemory::$sessionKey]['789'];
        self::assertSame(CompleteRegistration::class, $data['CompleteRegistration']);
    }

    public function testImportEventsFromMemoryOnRender()
    {
        $memory = new EventsMemory(789);
        $memory->addEvent(EventsFactory::create('CompleteRegistration'));
        $memory->addEvent(EventsFactory::create('AddToCart'));

        $pixel = new FacebookPixel();
        $pixel->setPixelId('789');
        $html = $pixel->render();

        self::assertContains("'track', 'CompleteRegistration'", $html);
        self::assertContains("'track', 'AddToCart'", $html);
    }
}
