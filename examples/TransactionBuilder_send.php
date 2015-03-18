<?php

if (!isset($argv)) {
	echo "This script can only be run from command line\n";
	exit -1;
}

require_once __DIR__ . "/../vendor/autoload.php";

use Codestillery\Coinprism\Toolkit;

//$api = "https://private-anon-2234885ee-coinprism.apiary-mock.com";
$api = "https://api.coinprism.com";
$toolkit = Toolkit::getInstance($api);
$kit = $toolkit->getTransactionBuilder();
$out = $kit->send(
	1000, // fee
	"1BThkpJ2453DBsHFKjMeVsYX5LjRvAKbmR", // from bitcoin address
	"akVigWnLqtv6hL6rByUoHbxEcuvTtaVvogt", // recipient address
	10, // amount
	"AH4CuJntyPGtM37H3cHj6WBERYQLaKU5kF" // asset id
);
var_dump($out);