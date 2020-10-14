<?php

use Tnhnclskn\Ilkbyte\Ilkbyte;

require_once(__DIR__ . '/../vendor/autoload.php');

$ilkbyte = Ilkbyte::create();

// $response = $ilkbyte->domainPush('ni.net.tr');
// OR
$response = $ilkbyte->domain('ni.net.tr')->push();

var_dump($response);
