<?php
declare(strict_types=1);

namespace ByTIC\FacebookPixel\Utility;

/**
 *
 */
class EventIdGenerator
{
    public static function generate(): string
    {
        return static::guidv4();
    }

    /**
     * @return string A 36 character string containing dashes.
     * @internal use generate() instead
     */
    public static function guidv4()
    {
        $data = openssl_random_pseudo_bytes(16);

        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}