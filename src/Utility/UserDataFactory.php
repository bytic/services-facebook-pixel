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
        $userData = (new UserData())
            ->setClientIpAddress(Util::getIpAddress())
            ->setClientUserAgent(Util::getHttpUserAgent())
            ->setFbp(Util::getFbp())
            ->setFbc(Util::getFbc());
        return $userData;
    }

    /**
     * @param RequestInterface|Request $request
     * @return UserData
     */
    public static function fromRequest(Request $request): UserData
    {
        $userData = (new UserData())
            ->setClientIpAddress($request->getClientIp())
            ->setClientUserAgent(Util::getHttpUserAgent())
            ->setFbp(Util::getFbp())
            ->setFbc(Util::getFbc());
        return $userData;
    }
}