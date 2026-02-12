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
    /**
     * @param $data
     * @return UserData
     */
    public static function create($data = []): UserData
    {
        return (new UserData($data))
            ->setClientIpAddress(Util::getIpAddress())
            ->setClientUserAgent(Util::getHttpUserAgent())
            ->setFbp(Util::getFbp())
            ->setFbc(Util::getFbc());
    }

    /**
     * @param RequestInterface|Request $request
     */
    public static function fromRequest(Request $request, $data = []): UserData
    {
        return self::create($data)
            ->setClientIpAddress($request->getClientIp());
    }
}
