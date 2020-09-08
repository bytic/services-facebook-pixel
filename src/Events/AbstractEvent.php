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
     * @var array
     */
    protected $properties = [];

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

    /**
     * @return array
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * @param array $properties
     */
    public function setProperties(array $properties)
    {
        $this->properties = $properties;
    }
}
