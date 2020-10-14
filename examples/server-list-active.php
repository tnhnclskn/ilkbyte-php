<?php

use Tnhnclskn\Ilkbyte\Ilkbyte;

require_once(__DIR__ . '/../vendor/autoload.php');

$ilkbyte = Ilkbyte::create();

$response = $ilkbyte->serverList();

var_dump($response);
