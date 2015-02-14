<?php

if (!isset($argv)) {
	echo "This script can only be run from command line\n";
	exit -1;
}

require_once __DIR__ . "/../vendor/autoload.php";

use Codestillery\Coinprism\Toolkit;

$toolkit = Toolkit::getInstance("https://api.coinprism.com");
$kit = $toolkit->getTransactionBuilder();
$out = $kit->send(1000, "1zLkEoZF7Zdoso57h9si5fKxrKopnGSDn", "akSjSW57xhGp86K6JFXXroACfRCw7SPv637", 10, "AHthB6AQHaSS9VffkfMqTKTxVV43Dgst36");
var_dump($out);