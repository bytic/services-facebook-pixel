<?php
declare(strict_types=1);

namespace ByTIC\FacebookPixel\Tests\Manager\Behaviours;

use ByTIC\FacebookPixel\EventsFactory;
use ByTIC\FacebookPixel\Tests\TestCase;
use ByTIC\FacebookPixel\Utility\FacebookPixel;

/**
 *
 */
class CanRenderTraitTest extends TestCase
{
    public function testRenderEvents()
    {
        $manager = FacebookPixel::instance();

        $pixel1 = '9999999';
        $manager->pixel($pixel1);

        $pixel2 = '1111111';
        $manager->pixel($pixel2);

        $event1 = EventsFactory::create('Lead');
        $event1->setEventId('13b7bb4d-b7bb-49fb-b060-374555e5610e');
        $manager->addEvent($event1);

        $event2 = EventsFactory::create('Donate', ['currency' => 'USD', 'value' => 30.00]);
        $event2->setEventId('15672a13-e7ab-4c95-ba45-3891bd752c93');
        $manager->addEvent($event2, $pixel2);

        $event3 = EventsFactory::createViewContent()
            ->withName('Donation Form')
            ->withType('donation_form')
            ->withIds([123]);
        $event3->setEventId('c897136b-7734-4cdf-bca6-d7a27a322c07');
        $manager->addEvent($event3, $pixel2);

        $html = $manager->render();
        $path = TEST_FIXTURE_PATH . DIRECTORY_SEPARATOR . 'html' . DIRECTORY_SEPARATOR . 'manager_multiple_events.html';
        self::assertStringEqualsFile($path, $html);
    }
}
