<?php

use Tnhnclskn\Ilkbyte\Ilkbyte;

require_once(__DIR__ . '/../vendor/autoload.php');

$ilkbyte = Ilkbyte::create();

// $response = $ilkbyte->serverShow('exampleserver');
// OR
$response = $ilkbyte->server('exampleserver')->show();

var_dump($response);
