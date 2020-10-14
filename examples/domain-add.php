<?php

use Tnhnclskn\Ilkbyte\Ilkbyte;

require_once(__DIR__ . '/../vendor/autoload.php');

$ilkbyte = Ilkbyte::create();

// $response = $ilkbyte->domainAdd('ni.net.tr', 'server1', 'A', '89.252.xxx.xx');
// OR
$response = $ilkbyte->domain('ni.net.tr')->add('server1', 'A', '89.252.xxx.xx');

var_dump($response);
