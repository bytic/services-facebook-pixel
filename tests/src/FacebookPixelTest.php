<?php

namespace Nip\FacebookPixel\Tests;

use ByTIC\FacebookPixel\FacebookPixel;

/**
 * Class FacebookPixelTest
 * @package Nip\FacebookPixel\Tests
 */
class FacebookPixelTest extends AbstractTest
{
    public function testSetPixelId()
    {
        $pixel = new FacebookPixel();
        $pixel->setPixelId('789');
        self::assertEquals(789, $pixel->getPixelId());
    }
}
