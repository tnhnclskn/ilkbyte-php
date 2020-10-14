<?php

use Tnhnclskn\Ilkbyte\Ilkbyte;

require_once(__DIR__ . '/../vendor/autoload.php');

$ilkbyte = Ilkbyte::create();

// $response = $ilkbyte->domainDelete('ni.net.tr', 1234);
// OR
$response = $ilkbyte->domain('ni.net.tr')->delete(1234);

var_dump($response);
