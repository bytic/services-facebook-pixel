<?php

use ByTIC\FacebookPixel\Utility\FacebookPixel;

require_once '../vendor/autoload.php';

$token = 'YOUR_TOKEN';
$pixelId = 'YOUR_PIXEL_ID';

FacebookPixel::setAccessToken($token);
FacebookPixel::setTestEventCode("123456789");

$pixel = FacebookPixel::pixel($pixelId);

$event = \ByTIC\FacebookPixel\EventsFactory::create('Lead');
FacebookPixel::sendEvent($event);

FacebookPixel::sendEvents([
    \ByTIC\FacebookPixel\EventsFactory::create(\ByTIC\FacebookPixel\Events\CompleteRegistration::NAME),
    \ByTIC\FacebookPixel\EventsFactory::create(\ByTIC\FacebookPixel\Events\InitiateCheckout::NAME),
    \ByTIC\FacebookPixel\EventsFactory::create(\ByTIC\FacebookPixel\Events\Donate::NAME),
]);