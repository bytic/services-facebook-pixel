<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\Tests\FacebookPixel;

use ByTIC\FacebookPixel\EventsFactory;
use ByTIC\FacebookPixel\FacebookPixel;
use ByTIC\FacebookPixel\Tests\TestCase;

/**
 * Class CanRenderTraitTest.
 */
class CanRenderTraitTest extends TestCase
{
    public function test_SimpleRender()
    {
        $pixel = new FacebookPixel();
        $pixel->setPixelId('9999999');
        $html = $pixel->render();

        self::assertStringContainsString('9999999', $html);
        self::assertStringContainsString('facebook.com', $html);
    }

    public function test_RenderEvents()
    {
        $pixel = new FacebookPixel();
        $pixel->setPixelId('9999999');
        $pixel->addEvent(EventsFactory::create('Lead'));
        $pixel->addEvent(EventsFactory::create('Donate', ['currency' => 'USD', 'value' => 30.00]));
        $html = $pixel->render();

        self::assertStringContainsString("fbq('trackSingle', '9999999', 'Donate', {currency:\"USD\",value:30}", $html);
    }
}
