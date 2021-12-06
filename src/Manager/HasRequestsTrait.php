<?php
declare(strict_types=1);

namespace ByTIC\FacebookPixel\Manager;

use ByTIC\FacebookPixel\FacebookPixel;
use ByTIC\FacebookPixel\ServerSide\EventRequestFactory;

/**
 *
 */
trait HasRequestsTrait
{
    /**
     * @param string|FacebookPixel $pixel
     * @return EventRequestFactory
     */
    protected function createRequest($pixel): EventRequestFactory
    {
        $this->initialize();

        $pixel = $pixel instanceof FacebookPixel ? $pixel->getPixelId() : $pixel;
        $request = EventRequestFactory::create($pixel);

        ///                ->setPartnerAgent($this->fbeHelper->getPartnerAgent())
        $testCode = $this->getTestEventCode();
        if ($testCode) {
            $request->setTestEventCode($testCode);
        }

        return $request;
    }
}
