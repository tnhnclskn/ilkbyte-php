<?php

use Tnhnclskn\Ilkbyte\Ilkbyte;

require_once(__DIR__ . '/../vendor/autoload.php');

$ilkbyte = Ilkbyte::create();

$response = $ilkbyte->serverCreateConfig('root', 'password', 'exampleserver', 14, null, 5, 'ssh-rsa [YOUR-SSH-PUBLIC-KEY]');

var_dump($response);
