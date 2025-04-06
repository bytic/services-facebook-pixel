<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel;

/**
 *
 */
class FacebookPixelManager
{
    use Manager\Behaviours\CanRenderTrait;
    use Manager\Behaviours\HasAccessTokenTrait;
    use Manager\Behaviours\HasApiTrait;
    use Manager\Behaviours\HasEventsTrait;
    use Manager\Behaviours\HasParamsTrait;
    use Manager\Behaviours\HasPixelsTrait;
    use Manager\Behaviours\HasRequestsTrait;
}
