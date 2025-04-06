<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\Tests\FacebookPixel;

use ByTIC\FacebookPixel\FacebookPixel;
use ByTIC\FacebookPixel\Tests\TestCase;

/**
 * Class FacebookPixelTest.
 */
class HasPixelIdTraitTest extends TestCase
{
    public function testSetPixelId()
    {
        $pixel = new FacebookPixel();
        $pixel->setPixelId('789');
        self::assertEquals(789, $pixel->getPixelId());
    }
}
