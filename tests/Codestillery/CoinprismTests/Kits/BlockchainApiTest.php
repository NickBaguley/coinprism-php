<?php

namespace Codestillery\CoinprismTests\Kits;

use Codestillery\Coinprism\Kits\BlockchainApi;

class BlockchainApiTest extends \PHPUnit_Framework_TestCase {

	const BASE_URL = "http://localhost/v1/";

	/**
	 * @test
	 * @covers \Codestillery\Coinprism\Kits\BlockchainApi::getBalance()
	 */
	public function getBalance_ok() {
		$json = file_get_contents(__DIR__ . "/mocks/BlockchainApi_getBalance_ok.json");
		$expected = json_decode($json, true);
		$address = "abcdefghijklmnopqrstuvw";

		$httpResponse = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Response", ["getContent" => $json]);
		$httpClient = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Client", ["get" => $httpResponse]);

		$blockchainApi = new BlockchainApi($httpClient);
		$actual = $blockchainApi->getBalance($address);
		$this->assertEquals($actual, $expected);
	}

	/**
	 * @test
	 * @covers \Codestillery\Coinprism\Kits\BlockchainApi::getRecentTransactions()
	 */
	public function getRecentTransactions_ok() {
		$json = file_get_contents(__DIR__ . "/mocks/BlockchainApi_getRecentTransactions_ok.json");
		$expected = json_decode($json, true);
		$address = "abcdefghijklmnopqrstuvw";

		$httpResponse = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Response", ["getContent" => $json]);
		$httpClient = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Client", ["get" => $httpResponse]);

		$blockchainApi = new BlockchainApi($httpClient);
		$actual = $blockchainApi->getRecentTransactions($address);
		$this->assertEquals($actual, $expected);
	}

	/**
	 * @test
	 * @covers \Codestillery\Coinprism\Kits\BlockchainApi::getUnspentOutputs()
	 */
	public function getUnspentOutputs_ok() {
		$json = file_get_contents(__DIR__ . "/mocks/BlockchainApi_getUnspentOutputs_ok.json");
		$expected = json_decode($json, true);
		$address = "abcdefghijklmnopqrstuvw";

		$httpResponse = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Response", ["getContent" => $json]);
		$httpClient = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Client", ["get" => $httpResponse]);

		$blockchainApi = new BlockchainApi($httpClient);
		$actual = $blockchainApi->getUnspentOutputs($address);
		$this->assertEquals($actual, $expected);
	}

}