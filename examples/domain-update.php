<?php

use Tnhnclskn\Ilkbyte\Ilkbyte;

require_once(__DIR__ . '/../vendor/autoload.php');

$ilkbyte = Ilkbyte::create();

// $response = $ilkbyte->domainUpdate('ni.net.tr', 1234, '89.252.xxx.xx');
// OR
$response = $ilkbyte->domain('ni.net.tr')->update(1234, '89.252.xxx.xx');

var_dump($response);
