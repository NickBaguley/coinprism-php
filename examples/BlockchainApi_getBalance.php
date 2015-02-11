<?php

if (!isset($argv)) {
	echo "This script can only be run from command line\n";
	exit -1;
}

require_once __DIR__ . "/../vendor/autoload.php";

use Codestillery\Coinprism\Toolkit;

$toolkit = Toolkit::getInstance("https://private-anon-42ec55107-coinprism.apiary-mock.com");
$kit = $toolkit->getBlockchainApi();
$out = $kit->getBalance("a12345", "json");
var_dump($out);