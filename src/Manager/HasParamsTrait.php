<?php
declare(strict_types=1);

namespace ByTIC\FacebookPixel\Manager;


/**
 *
 */
trait HasParamsTrait
{
    protected $test_event_code = null;

    /**
     * @return null
     */
    public function getTestEventCode()
    {
        return $this->test_event_code;
    }

    /**
     * @param null $test_event_code
     */
    public function setTestEventCode($test_event_code): void
    {
        $this->test_event_code = $test_event_code;
    }
}