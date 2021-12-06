<?php
declare(strict_types=1);

namespace ByTIC\FacebookPixel;

use ByTIC\FacebookPixel\FacebookPixel\CanRenderTrait;
use ByTIC\FacebookPixel\FacebookPixel\CustomEventsTrait;
use ByTIC\FacebookPixel\FacebookPixel\HasEventsMemoryTrait;
use ByTIC\FacebookPixel\FacebookPixel\HasEventsTrait;
use ByTIC\FacebookPixel\FacebookPixel\HasPixelIdTrait;

/**
 * Class FacebookPixel
 *
 * @author Gabriel Solomon <hello@gabrielsolomon.ro>
 */
class FacebookPixel
{
    use CanRenderTrait {
        render as renderTrait;
    }
    use CustomEventsTrait;
    use HasEventsTrait;
    use HasEventsMemoryTrait;
    use HasPixelIdTrait;

    /**
     * @inheritDoc
     */
    public function render($options = null)
    {
        $this->importEventsFromMemory();
        return $this->renderTrait($options);
    }
}
