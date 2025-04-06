<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\FacebookPixel\Behaviours;

use ByTIC\FacebookPixel\Renderer\Related\HasRenderer;

/**
 * Trait CanRenderTrait.
 */
trait CanRenderTrait
{
    use HasRenderer;

    /**
     * @return string
     */
    public function render($options = null)
    {
        $return = '';
        if ($this->shouldRenderBaseCode($options)) {
            $return .= $this->getRenderer()->render('basecode', ['pixel' => $this]);
        }
        $return .= $this->getRenderer()->render('events', ['pixel' => $this, 'events' => $this->getEvents()]);

        return $return;
    }
}
