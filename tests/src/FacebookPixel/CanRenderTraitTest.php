<?php

namespace Nip\FacebookPixel\Tests\FacebookPixel;

use ByTIC\FacebookPixel\FacebookPixel;
use Nip\FacebookPixel\Tests\AbstractTest;

/**
 * Class CanRenderTraitTest
 * @package Nip\FacebookPixel\Tests\FacebookPixel
 */
class CanRenderTraitTest extends AbstractTest
{
    public function testSimpleRender()
    {
        $pixel = new FacebookPixel();
        $pixel->setPixelId('9999999');
        $html = $pixel->render();
        self::assertContains('9999999', $html);
        self::assertContains('facebook.com', $html);
    }
}
