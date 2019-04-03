<?php

namespace ByTIC\FacebookPixel\FacebookPixel;

/**
 * Trait HasPixelIdTrait
 * @package ByTIC\FacebookPixel\FacebookPixel
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
