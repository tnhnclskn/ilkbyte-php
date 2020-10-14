<?php

use Tnhnclskn\Ilkbyte\Ilkbyte;

require_once(__DIR__ . '/../vendor/autoload.php');

$ilkbyte = Ilkbyte::create();
$response = $ilkbyte->domainShow('ni.net.tr');

// OR

$response = $ilkbyte->domain('ni.net.tr')->show();

var_dump($response);
