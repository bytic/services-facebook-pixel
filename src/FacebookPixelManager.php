<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel;

/**
 *
 */
class FacebookPixelManager
{
    use Manager\HasAccessTokenTrait;
    use Manager\HasApiTrait;
    use Manager\HasEventsTrait;
    use Manager\HasParamsTrait;
    use Manager\HasPixelsTrait;
    use Manager\HasRequestsTrait;
}
