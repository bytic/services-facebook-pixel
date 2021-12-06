<?php
declare(strict_types=1);

namespace ByTIC\FacebookPixel\Manager;

trait HasAccessTokenTrait
{
    protected $accessToken;

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param mixed $accessToken
     */
    public function setAccessToken($accessToken): void
    {
        $this->accessToken = $accessToken;
    }
}
