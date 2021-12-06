<?php

namespace Nip\FacebookPixel\Tests\Utility;

use ByTIC\FacebookPixel\Utility\FacebookPixel;
use Nip\FacebookPixel\Tests\AbstractTest;

/**
 *
 */
class FacebookPixelTest extends AbstractTest
{
    public function test_call_static()
    {
        $id = '12345';
        FacebookPixel::setAccessToken($id);
        self::assertSame($id, FacebookPixel::getAccessToken());
    }
}

