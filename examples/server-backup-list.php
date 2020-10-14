<?php

use Tnhnclskn\Ilkbyte\Ilkbyte;

require_once(__DIR__ . '/../vendor/autoload.php');

$ilkbyte = Ilkbyte::create();

// $response = $ilkbyte->serverBackupList('exampleserver');
// OR
$response = $ilkbyte->server('exampleserver')->backups();

var_dump($response);
