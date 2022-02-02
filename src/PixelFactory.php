<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel;

/**
 * Class PixelFactory.
 *
 * @author Gabriel Solomon <hello@gabrielsolomon.ro>
 */
class PixelFactory
{
    /**
     * @param int $pixelId
     *
     * @return FacebookPixel
     */
    public static function create($pixelId)
    {
        $pixel = new FacebookPixel();
        $pixel->setPixelId($pixelId);

        return $pixel;
    }
}
