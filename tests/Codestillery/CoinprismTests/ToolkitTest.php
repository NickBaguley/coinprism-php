<?php

namespace Codestillery\CoinprismTests;

use Codestillery\Coinprism\Toolkit;
use Codestillery\Coinprism\Http\Client;
use Codestillery\Coinprism\Kits\BlockchainApi;
use Codestillery\Coinprism\Kits\TransactionBuilder;
use Codestillery\Coinprism\Kits\SigningAndBroadcasting;
use Codestillery\Coinprism\Kits\AccountManager;

class ToolkitTest extends \PHPUnit_Framework_TestCase {

	const BASE_URL = "http://localhost/v1/";

	/**
	 * @test
	 * @covers \codestillery\Coinprism\Toolkit::getInstance()
	 */
	public function getInstance() {
		$toolkit1 = Toolkit::getInstance(self::BASE_URL);
		$toolkit2 = Toolkit::getInstance(self::BASE_URL);
		$this->assertTrue($toolkit1 instanceof Toolkit);
		$this->assertTrue($toolkit2 instanceof Toolkit);
		$this->assertSame($toolkit1, $toolkit2);
	}

	/**
	 * @test
	 * @covers \codestillery\Coinprism\Toolkit::getHttpClient()
	 */
	public function getHttpClient() {
		$toolkit = Toolkit::getInstance(self::BASE_URL);
		$client1 = $toolkit->getHttpClient();
		$client2 = $toolkit->getHttpClient();
		$this->assertTrue($client1 instanceof Client);
		$this->assertTrue($client2 instanceof Client);
		$this->assertSame($client1, $client2);
	}

	/**
	 * @test
	 * @covers \codestillery\Coinprism\Toolkit::getBlockchainApi()
	 */
	public function getBlockchainApi() {
		$toolkit = Toolkit::getInstance(self::BASE_URL);
		$kit1 = $toolkit->getBlockchainApi();
		$kit2 = $toolkit->getBlockchainApi();
		$this->assertTrue($kit1 instanceof BlockchainApi);
		$this->assertTrue($kit2 instanceof BlockchainApi);
		$this->assertSame($kit1, $kit2);
	}

	/**
	 * @test
	 * @covers \codestillery\Coinprism\Toolkit::getTransactionBuilder()
	 */
	public function getTransactionBuilder() {
		$toolkit = Toolkit::getInstance(self::BASE_URL);
		$kit1 = $toolkit->getTransactionBuilder();
		$kit2 = $toolkit->getTransactionBuilder();
		$this->assertTrue($kit1 instanceof TransactionBuilder);
		$this->assertTrue($kit2 instanceof TransactionBuilder);
		$this->assertSame($kit1, $kit2);
	}

	/**
	 * @test
	 * @covers \codestillery\Coinprism\Toolkit::getSigningAndBroadcasting()
	 */
	public function getSigningAndBroadcasting() {
		$toolkit = Toolkit::getInstance(self::BASE_URL);
		$kit1 = $toolkit->getSigningAndBroadcasting();
		$kit2 = $toolkit->getSigningAndBroadcasting();
		$this->assertTrue($kit1 instanceof SigningAndBroadcasting);
		$this->assertTrue($kit2 instanceof SigningAndBroadcasting);
		$this->assertSame($kit1, $kit2);
	}

	/**
	 * @test
	 * @covers \codestillery\Coinprism\Toolkit::getAccountManager()
	 */
	public function getAccountManager() {
		$toolkit = Toolkit::getInstance(self::BASE_URL);
		$kit1 = $toolkit->getAccountManager();
		$kit2 = $toolkit->getAccountManager();
		$this->assertTrue($kit1 instanceof AccountManager);
		$this->assertTrue($kit2 instanceof AccountManager);
		$this->assertSame($kit1, $kit2);
	}

}