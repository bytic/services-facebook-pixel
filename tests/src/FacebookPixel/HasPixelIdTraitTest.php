<?php

namespace Nip\FacebookPixel\Tests\FacebookPixel;

use ByTIC\FacebookPixel\FacebookPixel;
use Nip\FacebookPixel\Tests\AbstractTest;

/**
 * Class FacebookPixelTest
 * @package Nip\FacebookPixel\Tests\FacebookPixel
 */
class HasPixelIdTraitTest extends AbstractTest
{
    public function testSetPixelId()
    {
        $pixel = new FacebookPixel();
        $pixel->setPixelId('789');
        self::assertEquals(789, $pixel->getPixelId());
    }
}
