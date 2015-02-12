<?php

if (!isset($argv)) {
	echo "This script can only be run from command line\n";
	exit -1;
}

require_once __DIR__ . "/../vendor/autoload.php";

use Codestillery\Coinprism\Toolkit;

$toolkit = Toolkit::getInstance("https://api.coinprism.com");
$kit = $toolkit->getBlockchainApi();
$out = $kit->getBalance("akMRazz7MXYvu47ScNMTq9jT6QwubyDSscY");
var_dump($out);