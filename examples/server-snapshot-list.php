<?php

use Tnhnclskn\Ilkbyte\Ilkbyte;

require_once(__DIR__ . '/../vendor/autoload.php');

$ilkbyte = Ilkbyte::create();

// $response = $ilkbyte->serverSnapshotList('exampleserver');
// OR
$response = $ilkbyte->server('exampleserver')->snapshots();

var_dump($response);
