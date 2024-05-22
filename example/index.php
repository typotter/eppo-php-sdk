<?php
print("hello, world");

use Eppo\EppoClient;

require __DIR__ . '/vendor/autoload.php';

$eppoClient = EppoClient::init(
    "<your_api_key>"
);
$subjectAttributes = [];
$assignment = $eppoClient->getStringAssignment('experiment_5', 'subject1', $subjectAttributes);

var_dump($assignment);