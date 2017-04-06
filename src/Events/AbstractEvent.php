<?php
declare(strict_types=1);

namespace ByTIC\FacebookPixel\Events;

/**
 * Class FacebookPixel
 *
 * @author Gabriel Solomon <hello@gabrielsolomon.ro>
 */
abstract class AbstractEvent
{
    /**
     * @var string
     */
    protected $trackName;

    /**
     * @return string
     */
    public function getTrackName()
    {
        return $this->trackName;
    }

    /**
     * @param string $trackName
     */
    public function setTrackName($trackName)
    {
        $this->trackName = $trackName;
    }
}
