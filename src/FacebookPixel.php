<?php
declare(strict_types=1);

namespace ByTIC\FacebookPixel;

use ByTIC\FacebookPixel\Events\AbstractEvent;

/**
 * Class FacebookPixel
 *
 * @author Gabriel Solomon <hello@gabrielsolomon.ro>
 */
class FacebookPixel
{

    /**
     * @var int
     */
    protected $pixelId;

    /** @var AbstractEvent[] */
    private $events = [];

    /**
     * @return int
     */
    public function getPixelId()
    {
        return $this->pixelId;
    }

    /**
     * @param int $pixelId
     */
    public function setPixelId($pixelId)
    {
        $this->pixelId = $pixelId;
    }

    /**
     * @return AbstractEvent[]
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @param AbstractEvent[] $events
     */
    public function setEvents($events)
    {
        $this->events = $events;
    }

    /**
     * Add Complete Registration event
     */
    public function completeRegistration()
    {
        $this->addEvent(EventsFactory::create('CompleteRegistration'));
    }

    /**
     * @param AbstractEvent $event
     */
    public function addEvent($event)
    {
        $this->events[] = $event;
    }

    /**
     * @return string
     */
    public function render()
    {
        return $this->renderTemplate('basecode') . $this->renderTemplate('events');
    }

    /**
     * @param string $name
     * @return string
     */
    protected function renderTemplate($name)
    {
        ob_start();
        include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $name . '.php');
        return ob_get_clean();
    }
}
