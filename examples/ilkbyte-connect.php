<?php

use Tnhnclskn\Ilkbyte\Ilkbyte;

require_once(__DIR__ . '/../vendor/autoload.php');

// Config from env
/*
 * Add your env file.
 * ILKBYTE_ACCESS_KEY=xxxxxxxxx
 * ILKBYTE_SECRET_KEY=xxxxxxxxxxxxxxxxxxxxxxxxxxx
*/
$ilkbyte = Ilkbyte::create();

// Config from array
$ilkbyte = Ilkbyte::create([
    'access_key' => 'xxxxxxxxx',
    'secret_key' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxx',
]);

$response = $ilkbyte->test();

var_dump($response);
