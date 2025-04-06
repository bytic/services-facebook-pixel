<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\Manager\Behaviours;

use ByTIC\FacebookPixel\FacebookPixel;
use ByTIC\FacebookPixel\ServerSide\EventRequestFactory;

/**
 *
 */
trait HasRequestsTrait
{
    /**
     * @param string|FacebookPixel $pixel
     */
    protected function createRequest($pixel): EventRequestFactory
    {
        $this->initialize();

        $pixel = $pixel instanceof FacebookPixel ? $pixel : $this->pixel();
        $request = EventRequestFactory::create($pixel->getPixelId());

        ///                ->setPartnerAgent($this->fbeHelper->getPartnerAgent())
        $testCode = $this->getTestEventCode();
        if ($testCode) {
            $request->setTestEventCode($testCode);
        }

        return $request;
    }
}
