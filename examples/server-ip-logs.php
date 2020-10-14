<?php

use Tnhnclskn\Ilkbyte\Ilkbyte;

require_once(__DIR__ . '/../vendor/autoload.php');

$ilkbyte = Ilkbyte::create();

// $response = $ilkbyte->serverIpLogs('exampleserver');
// OR
$response = $ilkbyte->server('exampleserver')->ipLogs();

var_dump($response);
