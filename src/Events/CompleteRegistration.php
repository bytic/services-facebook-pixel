<?php
declare(strict_types=1);

namespace ByTIC\FacebookPixel\Events;

/**
 * Class CompleteRegistration
 *
 * @author Gabriel Solomon <hello@gabrielsolomon.ro>
 */
class CompleteRegistration extends AbstractEvent
{
    /**
     * @var string
     */
    protected $trackName = 'CompleteRegistration';
}
