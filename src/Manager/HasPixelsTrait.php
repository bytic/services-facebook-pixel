<?php
declare(strict_types=1);

namespace ByTIC\FacebookPixel\Manager;

use ByTIC\FacebookPixel\FacebookPixel;
use ByTIC\FacebookPixel\PixelFactory;

/**
 *
 */
trait HasPixelsTrait
{
    protected $pixels = [];

    /**
     * @param $id
     * @return FacebookPixel|false|mixed
     * @throws \Exception
     */
    public function pixel($id = null)
    {
        if (isset($this->pixels[$id])) {
            return $this->pixels[$id];
        }

        if (!empty($id)) {
            $pixel = PixelFactory::create($id);
            $this->addPixel($pixel);
            return $pixel;
        }
        if (count($this->pixels) > 0) {
            return reset($this->pixels);
        }

        throw new \Exception('No pixel found');
    }

    protected function createPixel($id): FacebookPixel
    {
        return PixelFactory::create($id);
    }

    protected function addPixel(FacebookPixel $pixel): self
    {
        $this->pixels[$pixel->getPixelId()] = $pixel;

        return $this;
    }
}
