<?php

use Tnhnclskn\Ilkbyte\Ilkbyte;

require_once(__DIR__ . '/../vendor/autoload.php');

$ilkbyte = Ilkbyte::create();

// $response = $ilkbyte->serverSnapshotRevert('exampleserver', 1234);
// OR
$response = $ilkbyte->server('exampleserver')->snapshotRevert(1234);

var_dump($response);
