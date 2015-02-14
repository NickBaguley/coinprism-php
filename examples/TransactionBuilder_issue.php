<?php

if (!isset($argv)) {
	echo "This script can only be run from command line\n";
	exit -1;
}

require_once __DIR__ . "/../vendor/autoload.php";

use Codestillery\Coinprism\Toolkit;

$toolkit = Toolkit::getInstance("https://private-anon-90718c204-coinprism.apiary-mock.com");
$kit = $toolkit->getTransactionBuilder();
$out = $kit->issue(1000, "1zLkEoZF7Zdoso57h9si5fKxrKopnGSDn", "akSjSW57xhGp86K6JFXXroACfRCw7SPv637", 500, "u=https://site.com/assetdef");
var_dump($out);