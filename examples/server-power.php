<?php

use Tnhnclskn\Ilkbyte\Ilkbyte;

require_once(__DIR__ . '/../vendor/autoload.php');

$ilkbyte = Ilkbyte::create();

// $response = $ilkbyte->serverPower('exampleserver', 'destroy');
// OR
$response = $ilkbyte->server('exampleserver')->power('destroy');

var_dump($response);
