<?php
declare(strict_types=1);

namespace ByTIC\FacebookPixel\Utility;

use ByTIC\FacebookPixel\Events\AbstractEvent;
use ByTIC\FacebookPixel\FacebookPixelManager;

/**
 * @method static void setAccessToken($accessToken)
 * @method static sendEvent(AbstractEvent $event)
 * @method static string getAccessToken()
 * @method static void setTestEventCode($test_event_code)
 * @method static \ByTIC\FacebookPixel\FacebookPixel pixel($id = null)
 */
class FacebookPixel
{

    /**
     * @param string $method
     * @param array $parameters
     * @return false|mixed
     */
    public static function __callStatic(string $method, array $parameters)
    {
        return call_user_func_array([static::instance(), $method], $parameters);
    }

    public static function instance(): \ByTIC\FacebookPixel\FacebookPixelManager
    {
        static $instance;
        if (!($instance instanceof FacebookPixelManager)) {
            $instance = new FacebookPixelManager();
        }
        return $instance;
    }
}