<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\Utility;

use FacebookAds\Object\ServerSide\UserData;
use FacebookAds\Object\ServerSide\Util;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 *
 */
class UserDataFactory
{
    public static function create(): UserData
    {
        return (new UserData())
            ->setClientIpAddress(Util::getIpAddress())
            ->setClientUserAgent(Util::getHttpUserAgent())
            ->setFbp(Util::getFbp())
            ->setFbc(Util::getFbc());
    }

    /**
     * @param RequestInterface|Request $request
     */
    public static function fromRequest(Request $request): UserData
    {
        return (new UserData())
            ->setClientIpAddress($request->getClientIp())
            ->setClientUserAgent(Util::getHttpUserAgent())
            ->setFbp(Util::getFbp())
            ->setFbc(Util::getFbc());
    }
}
