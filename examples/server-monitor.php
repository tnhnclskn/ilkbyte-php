<?php

use Tnhnclskn\Ilkbyte\Ilkbyte;

require_once(__DIR__ . '/../vendor/autoload.php');

$ilkbyte = Ilkbyte::create();

// $response = $ilkbyte->serverMonitor('exampleserver');
// OR
$response = $ilkbyte->server('exampleserver')->monitor();

var_dump($response);
