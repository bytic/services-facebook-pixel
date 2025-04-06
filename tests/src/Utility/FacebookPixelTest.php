<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\Tests\Utility;

use ByTIC\FacebookPixel\Tests\TestCase;
use ByTIC\FacebookPixel\Utility\FacebookPixel;

/**
 *
 */
class FacebookPixelTest extends TestCase
{
    public function testCallStatic()
    {
        $pixelId = '12345';
        FacebookPixel::setAccessToken($pixelId);
        self::assertSame($pixelId, FacebookPixel::getAccessToken());
    }
}
