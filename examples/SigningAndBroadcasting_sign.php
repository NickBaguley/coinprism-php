<?php

if (!isset($argv)) {
	echo "This script can only be run from command line\n";
	exit -1;
}

require_once __DIR__ . "/../vendor/autoload.php";

use Codestillery\Coinprism\Toolkit;

$raw = "0100000001d238c42ec059b8c7747cd51debb4310108f6279d14957472822cf061a660828b000000001976a914760fdb3483204406ddb73a45b20b7c9be61d0a7e88acffffffff0288130000000000001976a91430a5d35558ade668b8829a2a0f60a3f10358327e88ac306f0100000000001976a914760fdb3483204406ddb73a45b20b7c9be61d0a7e88ac00000000";
$keys = ["D8414E7062013DD24D3A3E71EFA8C72142A63F45E3B1AFA4653AFDFD9BC8D67E"];

$toolkit = Toolkit::getInstance("https://private-anon-90718c204-coinprism.apiary-mock.com");
$kit = $toolkit->getSigningAndBroadcasting();
$out = $kit->sign($raw, $keys);
var_dump($out);