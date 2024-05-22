<?php

use Eppo\EppoClient;
use Eppo\Logger\LoggerInterface;

require __DIR__ . '/vendor/autoload.php';

// .env file for API creds
$env = parse_ini_file(__DIR__ . '/.env');
$apiKey = $env['EPPO_API_KEY'];

// Create a basic logger class to record flag assignments.
class MyLogger implements LoggerInterface
{
    public function logAssignment(string $experiment, string $variation, string $subject, string $timestamp, array $subjectAttributes = [], ?string $allocation = null, ?string $featureFlag = null): void
    {
        print("At ${timestamp}, $subject was assigned $variation for the experiment $experiment");
    }
}
$assignmentLogger = new MyLogger();


$eppoClient = EppoClient::init(
    $apiKey, assignmentLogger: $assignmentLogger,
);

$assignment = $eppoClient->getBooleanAssignment('a-boolean-flag', '100', ['userId' => '100'], false);
var_dump($assignment);

$assignment = $eppoClient->getBooleanAssignment('a-boolean-flag', '200', ['userId' => '200'], false);
var_dump($assignment);

$assignment = $eppoClient->getIntegerAssignment('a-numeric-flag', '1', ['userId' => '1'], null);
var_dump($assignment);

$assignment = $eppoClient->getIntegerAssignment('a-numeric-flag', '10', ['userId' => '10'], null);
var_dump($assignment);

$assignment = $eppoClient->getIntegerAssignment('a-numeric-flag', '100', ['userId' => '100'], null);
var_dump($assignment);

$assignment = $eppoClient->getIntegerAssignment('a-numeric-flag', '1000', ['userId' => '1000'], null);
var_dump($assignment);
