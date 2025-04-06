<?php

declare(strict_types=1);

namespace ByTIC\FacebookPixel\Events;

/**
 * Class FacebookPixel.
 *
 * @author Gabriel Solomon <hello@gabrielsolomon.ro>
 */
abstract class AbstractEvent
{
    protected ?string $pixelId = null;
    /**
     * @var string
     */
    protected $eventName;

    protected $eventId;

    public const NAME = null;

    /**
     * @var array
     */
    protected $properties = [];

    public function __construct()
    {
        if (!empty(static::NAME)) {
            $this->eventName = static::NAME;
        }
    }

    public function forPixel($pixelId): self
    {
        $this->pixelId = $pixelId;

        return $this;
    }

    public function getPixelId(): ?string
    {
        return $this->pixelId;
    }

    public function hasPixelId(): bool
    {
        return !empty($this->pixelId);
    }

    public function getEventName(): string
    {
        return $this->eventName;
    }

    /**
     * @param string $eventName
     */
    public function setEventName($eventName)
    {
        $this->eventName = $eventName;
    }

    /**
     * @return mixed
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * @param mixed $eventId
     */
    public function setEventId($eventId): void
    {
        $this->eventId = $eventId;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function setProperties(array $properties)
    {
        $this->properties = $properties;
    }
}
