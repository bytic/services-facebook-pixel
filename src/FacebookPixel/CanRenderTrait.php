<?php
declare(strict_types=1);

namespace ByTIC\FacebookPixel\FacebookPixel;

use ByTIC\FacebookPixel\Renderer\Renderer;

/**
 * Trait CanRenderTrait.
 */
trait CanRenderTrait
{
    /**
     * @return string
     */
    public function render($options = null)
    {
        static $rendered = null;
        if (null === $rendered) {
            $renderer = new Renderer();
        }
        $return = '';

        if ($this->shouldRenderBaseCode($options)) {
            $return .= $renderer->render('basecode', ['pixel' => $this]);
        }
        $return .= $renderer->render('events', ['pixel' => $this, 'events' => $this->getEvents()]);

        return $return;
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
