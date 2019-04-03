<?php

namespace ByTIC\FacebookPixel\FlashMemory;

use ByTIC\FacebookPixel\Events\AbstractEvent;

/**
 * Class EventsMemory
 * @package ByTIC\FacebookPixel\FlashMemory
 */
class EventsMemory
{
    protected $pixelId;

    protected $previous = null;
    protected $next = [];

    public static $sessionKey = 'facebook-pixel-events';

    /**
     * @param $pixelId
     */
    public function __construct($pixelId)
    {
        $this->pixelId = $pixelId;
    }

    /**
     * @return null|[]
     */
    public function getPrevious()
    {
        if ($this->previous === null) {
            $this->read();
        }
        return $this->previous;
    }

    /**
     * @param AbstractEvent $event
     */
    public function addEvent($event)
    {
        $this->next[trim($event->getTrackName())] = get_class($event);
        $this->write();
    }

    protected function read()
    {
        $this->previous = [];
        if (isset($_SESSION[static::$sessionKey][$this->pixelId])) {
            $data = $_SESSION[static::$sessionKey][$this->pixelId];
            if (is_array($data)) {
                foreach ($data as $name => $class) {
                    $this->previous[$name] = new $class();
                }
            }
            unset($_SESSION[static::$sessionKey][$this->pixelId]);
        }
    }

    protected function clear()
    {
        $this->next = [];
    }

    protected function write()
    {
        $previous = isset($_SESSION[static::$sessionKey][$this->pixelId]) ? $_SESSION[static::$sessionKey][$this->pixelId] : [];
        $data = array_merge($previous, $this->next);
        $_SESSION[static::$sessionKey][$this->pixelId] = $data;
    }
}
