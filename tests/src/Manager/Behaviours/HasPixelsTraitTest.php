<?php
declare(strict_types=1);

namespace ByTIC\FacebookPixel\Tests\Manager\Behaviours;

use ByTIC\FacebookPixel\Tests\TestCase;
use ByTIC\FacebookPixel\Utility\FacebookPixel;

/**
 *
 */
class HasPixelsTraitTest extends TestCase
{
    public function test_pixels()
    {
        $manager = FacebookPixel::instance();
        self::assertCount(0, $manager->getPixels());

        $pixel1 = '9999999';
        $manager->pixel($pixel1);
        self::assertCount(1, $manager->getPixels());

        $pixel2 = '1111111';
        $manager->pixel($pixel2);
        self::assertCount(2, $manager->getPixels());
    }
}
