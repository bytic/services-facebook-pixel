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