<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\Manager\Behaviours;

use ByTIC\FacebookPixel\FacebookPixel;
use ByTIC\FacebookPixel\PixelFactory;
use Exception;

/**
 *
 */
trait HasPixelsTrait
{
    protected $pixels = [];

    /**
     * @param $id
     *
     * @return FacebookPixel|false|mixed
     *
     * @throws Exception
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

        throw new Exception('No pixel found');
    }

    /**
     * @return array|mixed
     */
    public function getPixels()
    {
        return $this->pixels;
    }

    /**
     * @param $pixelId
     * @param $method
     * @param ...$args
     * @return void
     * @throws Exception
     */
    public function callPixelMethod($pixelId, $method, ...$args): void
    {
        $pixels = !empty($pixelId) ? [$this->pixel($pixelId)] : $this->getPixels();
        foreach ($pixels as $pixel) {
            call_user_func_array([$pixel, $method], $args);
        }
    }

    /**
     * @param $id
     * @return FacebookPixel
     */
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
