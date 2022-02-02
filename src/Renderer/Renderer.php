<?php
declare(strict_types=1);

namespace ByTIC\FacebookPixel\Renderer;

/**
 *
 */
class Renderer
{
    protected $basePath = null;

    /**
     * @param string|null $basePath
     */
    public function __construct($basePath = null)
    {
        $this->basePath = $basePath;
    }

    /**
     * @param string $name
     */
    public function render($name, $variables = []): string
    {
        ob_start();
        extract($variables);
        include $this->getTemplateBasePath() . DIRECTORY_SEPARATOR . $name . '.php';

        return ob_get_clean();
    }

    protected function getTemplateBasePath(): ?string
    {
        if (null === $this->basePath) {
            $this->basePath = dirname(dirname(__DIR__))
                . DIRECTORY_SEPARATOR . 'resources'
                . DIRECTORY_SEPARATOR . 'views';
        }

        return $this->basePath;
    }
}
