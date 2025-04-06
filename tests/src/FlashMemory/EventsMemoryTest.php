<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\Tests\FlashMemory;

use ByTIC\FacebookPixel\Events\CompleteRegistration;
use ByTIC\FacebookPixel\EventsFactory;
use ByTIC\FacebookPixel\FlashMemory\EventsMemory;
use ByTIC\FacebookPixel\Tests\TestCase;

/**
 * Class EventsMemoryTest.
 */
class EventsMemoryTest extends TestCase
{
    public function testKeepDataUntilRead()
    {
        $_SESSION[EventsMemory::$sessionKey][9]['CompleteRegistration'] = CompleteRegistration::class;
        $memory = new EventsMemory(9);

        self::assertCount(1, $_SESSION[EventsMemory::$sessionKey][9]);

        $memory->addEvent(EventsFactory::create('CompleteRegistration'));
        self::assertCount(1, $_SESSION[EventsMemory::$sessionKey][9]);

        $memory->addEvent(EventsFactory::create('AddToCart'));
        self::assertCount(2, $_SESSION[EventsMemory::$sessionKey][9]);

        $events = $memory->getPrevious();
        self::assertFalse(isset($_SESSION[EventsMemory::$sessionKey][9]));
        self::assertCount(2, $events);
    }
}
