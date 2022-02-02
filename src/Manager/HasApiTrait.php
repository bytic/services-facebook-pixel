<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\Manager;

use FacebookAds\Api;

/**
 *
 */
trait HasApiTrait
{
    protected $initialized = false;

    protected function initialize()
    {
        if ($this->initialized) {
            return;
        }
        $this->initialized = true;
        Api::init(null, null, $this->getAccessToken(), false);
    }
}
