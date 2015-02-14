<?php

namespace Codestillery\CoinprismTests\Kits;

use \Codestillery\Coinprism\Kits\TransactionBuilder;

class TransactionBuilderTest extends \PHPUnit_Framework_TestCase {

	const BASE_URL = "http://localhost/v1/";

	/**
	 * @test
	 * @covers \Codestillery\Coinprism\Kits\TransactionBuilder::issue
	 */
	public function issue_ok() {
		$json = file_get_contents(__DIR__ . "/mocks/TransactionBuilder_issue_ok.json");
		$expected = json_decode($json, true);
		$content = json_encode($expected);

		$response = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Response", ["getContent" => $content]);
		$client = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Client", ["post" => $response]);

		$fee = 1000;
		$from = "1zLkEoZF7Zdoso57h9si5fKxrKopnGSDn";
		$asset = "akSjSW57xhGp86K6JFXXroACfRCw7SPv637";
		$amount = 500;
		$metadata = "u=https://site.com/assetdef";

		$transactionBuilder = new TransactionBuilder($client);
		$actual = $transactionBuilder->issue($fee, $from, $asset, $amount, $metadata);
		$this->assertEquals($expected, $actual);
	}

}