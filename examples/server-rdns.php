<?php

use Tnhnclskn\Ilkbyte\Ilkbyte;

require_once(__DIR__ . '/../vendor/autoload.php');

$ilkbyte = Ilkbyte::create();

// $response = $ilkbyte->serverRdns('exampleserver', '89.252.xxx.xx', 'ni.net.tr');
// OR
$response = $ilkbyte->server('exampleserver')->rdns('89.252.xxx.xx', 'ni.net.tr');

var_dump($response);
