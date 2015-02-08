<?php

namespace Codestillery\CoinprismTests\Kits;

use Codestillery\Coinprism\Kits\AccountManager;

class AccountManagerTest extends \PHPUnit_Framework_TestCase {

	const BASE_URL = "http://localhost/v1/";

	/**
	 * @test
	 * @covers \Codestillery\Coinprism\Kits\AccountManager::createAddress()
	 */
	public function createAddress_ok() {
		$expected = [
			"bitcoin_address" => "1DSEJL9cPKVFko3RAvzwU33eiVtt4yHmgN",
			"asset_address" => "akPQ7YVxwroNwd3CnDZ787txE47543fGFio",
			"private_key_hex" => "425f4b43cea8bead6d1b64f1a3d69fd4a70808a54360ed6f882de7b54f38f115",
		];
		$content = json_encode($expected);

		$httpResponse = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Response", ["getContent" => $content]);
		$httpClient = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Client", ["post" => $httpResponse]);

		$accountManager = new AccountManager($httpClient);
		$actual = $accountManager->createAddress("Label 1");
		$this->assertEquals($actual, $expected);
	}

}