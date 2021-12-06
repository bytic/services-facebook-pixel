<?php

namespace ByTIC\FacebookPixel\FacebookPixel;

/**
 * Trait CanRenderTrait
 * @package ByTIC\FacebookPixel\FacebookPixel
 */
trait CanRenderTrait
{
    protected $basePath = null;

    /**
     * @return string
     */
    public function render($options = null)
    {
        return
            $this->shouldRenderBaseCode($options) ? $this->renderTemplate('basecode') : ''
            . $this->renderTemplate('events');
    }

    /**
     * @param string $name
     * @return string
     */
    protected function renderTemplate($name)
    {
        ob_start();
        include $this->getTemplateBasePath() . DIRECTORY_SEPARATOR . $name . '.php';
        return ob_get_clean();
    }

    /**
     * @return string|null
     */
    protected function getTemplateBasePath()
    {
        if ($this->basePath === null) {
            $this->basePath = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'templates';
        }
        return $this->basePath;
    }

    protected function shouldRenderBaseCode($options = null): bool
    {
        if ($options === 'events') {
            return false;
        }
        return true;
    }
}
