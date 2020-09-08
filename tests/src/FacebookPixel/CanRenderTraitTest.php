<?php

namespace Nip\FacebookPixel\Tests\FacebookPixel;

use ByTIC\FacebookPixel\EventsFactory;
use ByTIC\FacebookPixel\FacebookPixel;
use Nip\FacebookPixel\Tests\AbstractTest;

/**
 * Class CanRenderTraitTest
 * @package Nip\FacebookPixel\Tests\FacebookPixel
 */
class CanRenderTraitTest extends AbstractTest
{
    public function test_SimpleRender()
    {
        $pixel = new FacebookPixel();
        $pixel->setPixelId('9999999');
        $html = $pixel->render();

        self::assertStringContainsString('9999999', $html);
        self::assertStringContainsString('facebook.com', $html);
    }

    public function test_renderEvents()
    {
        $pixel = new FacebookPixel();
        $pixel->setPixelId('9999999');
        $pixel->addEvent(EventsFactory::create('Lead'));
        $pixel->addEvent(EventsFactory::create('Donate', ['currency' => "USD", 'value' => 30.00]));
        $html = $pixel->render();

        self::assertStringContainsString("fbq('track', 'Donate', {currency:\"USD\",value:30});", $html);
    }
}
