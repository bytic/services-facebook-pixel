<?php
declare(strict_types=1);

namespace ByTIC\FacebookPixel\ServerSide;

use FacebookAds\Object\ServerSide\EventRequestAsync;

class EventRequestFactory
{
    /**
     * @var EventRequestAsync
     */
    protected $request;

    /**
     * @var callable
     */
    protected $onFulfilled = null;

    /**
     * @var callable
     */
    protected $onRejected = null;

    /**
     * @param $pixel
     * @return static
     */
    public static function create($pixel): self
    {
        return new self($pixel);
    }

    /**
     * @param $pixel
     */
    public function __construct($pixel)
    {
        $this->request = new EventRequestAsync($pixel);
    }

    /**
     * @param $method
     * @param $args
     * @return false|mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->request, $method], $args);
    }

    /**
     * @param $code
     * @return $this
     */
    public function setTestEventCode($code): self
    {
        $this->request->setTestEventCode($code);

        return $this;
    }

    /**
     * @param callable|null $onFulfilled
     * @return self
     */
    public function setOnFulfilled(?callable $onFulfilled): self
    {
        $this->onFulfilled = $onFulfilled;
        return $this;
    }

    /**
     * @param callable|null $onRejected
     * @return self
     */
    public function setOnRejected(?callable $onRejected): self
    {
        $this->onRejected = $onRejected;
        return $this;
    }

    public function execute()
    {
        try {
            $this->request->execute()
                ->then(
                    $this->onFulfilled,
                    $this->onRejected
                );
        } catch (\Exception $e) {
//            var_dump($e);
        }
    }
}