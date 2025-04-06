<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\Tests;

use ByTIC\FacebookPixel\Utility\FacebookPixel;

/**
 * Class AbstractTest.
 */
abstract class TestCase extends \Bytic\Phpqa\PHPUnit\TestCase
{
    protected $object;

    protected function setUp(): void
    {
        parent::setUp();
        FacebookPixel::instance(true);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        FacebookPixel::instance(true);
    }
}
