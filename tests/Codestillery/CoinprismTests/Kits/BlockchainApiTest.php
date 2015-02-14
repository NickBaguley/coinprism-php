<?php

namespace Codestillery\CoinprismTests\Kits;

use \Codestillery\Coinprism\Kits\BlockchainApi;

class BlockchainApiTest extends \PHPUnit_Framework_TestCase {

	const BASE_URL = "http://localhost/v1/";

	/**
	 * @test
	 * @covers \Codestillery\Coinprism\Kits\BlockchainApi::getBalance
	 */
	public function getBalance_ok() {
		$json = file_get_contents(__DIR__ . "/mocks/BlockchainApi_getBalance_ok.json");
		$expected = json_decode($json, true);
		$address = "abcdefghijklmnopqrstuvw";

		$response = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Response", ["getContent" => $json]);
		$client = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Client", ["get" => $response]);

		$blockchainApi = new BlockchainApi($client);
		$actual = $blockchainApi->getBalance($address);
		$this->assertEquals($expected, $actual);
	}

	/**
	 * @test
	 * @covers \Codestillery\Coinprism\Kits\BlockchainApi::getRecentTransactions
	 */
	public function getRecentTransactions_ok() {
		$json = file_get_contents(__DIR__ . "/mocks/BlockchainApi_getRecentTransactions_ok.json");
		$expected = json_decode($json, true);
		$address = "abcdefghijklmnopqrstuvw";

		$response = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Response", ["getContent" => $json]);
		$client = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Client", ["get" => $response]);

		$blockchainApi = new BlockchainApi($client);
		$actual = $blockchainApi->getRecentTransactions($address);
		$this->assertEquals($expected, $actual);
	}

	/**
	 * @test
	 * @covers \Codestillery\Coinprism\Kits\BlockchainApi::getUnspentOutputs
	 */
	public function getUnspentOutputs_ok() {
		$json = file_get_contents(__DIR__ . "/mocks/BlockchainApi_getUnspentOutputs_ok.json");
		$expected = json_decode($json, true);
		$address = "abcdefghijklmnopqrstuvw";

		$response = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Response", ["getContent" => $json]);
		$client = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Client", ["get" => $response]);

		$blockchainApi = new BlockchainApi($client);
		$actual = $blockchainApi->getUnspentOutputs($address);
		$this->assertEquals($expected, $actual);
	}

	/**
	 * @test
	 * @covers \Codestillery\Coinprism\Kits\BlockchainApi::getTransactionDetails
	 */
	public function getTransactionDetails_ok() {
		$json = file_get_contents(__DIR__ . "/mocks/BlockchainApi_getTransactionDetails_ok.json");
		$expected = json_decode($json, true);
		$txid = "eba760a81b177051b0520418b4e10596955adb98196c15367a2467ab66a19b5c";

		$response = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Response", ["getContent" => $json]);
		$client = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Client", ["get" => $response]);

		$blockchainApi = new BlockchainApi($client);
		$actual = $blockchainApi->getTransactionDetails($txid);
		$this->assertEquals($expected, $actual);
	}

	/**
	 * @test
	 * @covers \Codestillery\Coinprism\Kits\BlockchainApi::getAssetDefinition
	 */
	public function getAssetDefinition_ok() {
		$json = file_get_contents(__DIR__ . "/mocks/BlockchainApi_getAssetDefinition_ok.json");
		$expected = json_decode($json, true);
		$id = "AS6tDJJ3oWrcE1Kk3T14mD8q6ycHYVzyYQ";

		$response = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Response", ["getContent" => $json]);
		$client = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Client", ["get" => $response]);

		$blockchainApi = new BlockchainApi($client);
		$actual = $blockchainApi->getAssetDefinition($id);
		$this->assertEquals($expected, $actual);
	}

	/**
	 * @test
	 * @covers \Codestillery\Coinprism\Kits\BlockchainApi::getGetAddressesHolding
	 */
	public function getAddressesHolding_ok() {
		$json = file_get_contents(__DIR__ . "/mocks/BlockchainApi_getAddressesHolding_ok.json");
		$expected = json_decode($json, true);
		$id = "AS6tDJJ3oWrcE1Kk3T14mD8q6ycHYVzyYQ";

		$response = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Response", ["getContent" => $json]);
		$client = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Client", ["get" => $response]);

		$blockchainApi = new BlockchainApi($client);
		$actual = $blockchainApi->getAddressesHolding($id);
		$this->assertEquals($expected, $actual);
	}

}