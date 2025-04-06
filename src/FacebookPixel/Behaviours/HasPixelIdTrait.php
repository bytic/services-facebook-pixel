<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\FacebookPixel\Behaviours;

/**
 * Trait HasPixelIdTrait.
 */
trait HasPixelIdTrait
{
    /**
     * @var int
     */
    protected $pixelId;

    /**
     * @return int
     */
    public function getPixelId()
    {
        return $this->pixelId;
    }

    /**
     * @param int $pixelId
     */
    public function setPixelId($pixelId)
    {
        $this->pixelId = $pixelId;
    }
}
