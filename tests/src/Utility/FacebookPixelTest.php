<?php

declare(strict_types=1);

namespace Nip\FacebookPixel\Tests\Utility;

use ByTIC\FacebookPixel\Utility\FacebookPixel;
use Nip\FacebookPixel\Tests\AbstractTest;

/**
 *
 */
class FacebookPixelTest extends AbstractTest
{
    public function testCallStatic()
    {
        $pixelId = '12345';
        FacebookPixel::setAccessToken($pixelId);
        self::assertSame($pixelId, FacebookPixel::getAccessToken());
    }
}
