<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel;

use ByTIC\FacebookPixel\FacebookPixel\Behaviours\CanRenderTrait;
use ByTIC\FacebookPixel\FacebookPixel\Behaviours\CustomEventsTrait;
use ByTIC\FacebookPixel\FacebookPixel\Behaviours\HasEventsMemoryTrait;
use ByTIC\FacebookPixel\FacebookPixel\Behaviours\HasEventsTrait;
use ByTIC\FacebookPixel\FacebookPixel\Behaviours\HasPixelIdTrait;

/**
 * Class FacebookPixel.
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
     * {@inheritDoc}
     */
    public function render($options = null)
    {
        $this->importEventsFromMemory();

        return $this->renderTrait($options);
    }
}
