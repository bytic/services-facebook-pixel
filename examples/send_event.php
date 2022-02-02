<?php

declare(strict_types=1);

use ByTIC\FacebookPixel\Events\CompleteRegistration;
use ByTIC\FacebookPixel\Events\Donate;
use ByTIC\FacebookPixel\Events\InitiateCheckout;
use ByTIC\FacebookPixel\EventsFactory;
use ByTIC\FacebookPixel\Utility\FacebookPixel;

require_once '../vendor/autoload.php';

$token = 'YOUR_TOKEN';
$pixelId = 'YOUR_PIXEL_ID';

FacebookPixel::setAccessToken($token);
FacebookPixel::setTestEventCode('123456789');

$pixel = FacebookPixel::pixel($pixelId);

$event = EventsFactory::create('Lead');
FacebookPixel::sendEvent($event);

FacebookPixel::sendEvents([
    EventsFactory::create(CompleteRegistration::NAME),
    EventsFactory::create(InitiateCheckout::NAME),
    EventsFactory::create(Donate::NAME),
]);
