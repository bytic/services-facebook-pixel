<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\Renderer\Related;

use ByTIC\FacebookPixel\Renderer\Renderer;

/**
 *
 */
trait HasRenderer
{
    protected Renderer|null $renderer = null;

    public function getRenderer(): Renderer
    {
        if (null === $this->renderer) {
            $this->renderer = new Renderer();
        }
        return $this->renderer;
    }

    public function render($options = null)
    {

    }

    /**
     * @param $options
     * @return bool
     */
    protected function shouldRenderBaseCode($options = null): bool
    {
        if ('events' === $options) {
            return false;
        }

        return true;
    }
}
