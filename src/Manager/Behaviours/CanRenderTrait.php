<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\Manager\Behaviours;

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
        $this->callPixelMethod(null, 'importEventsFromMemory');
        if ($this->shouldRenderBaseCode($options)) {
            $return .= $this->getRenderer()->render('basecode', ['pixels' => $this->getPixels()]);
        }
        $events = $this->getPixelsEvents();
        $return .= $this->getRenderer()->render('events', ['events' => $this->getPixelsEvents()]);

        return $return;
    }
}
