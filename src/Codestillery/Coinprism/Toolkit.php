<?php

namespace Codestillery\Coinprism;

use \Codestillery\Coinprism\Kits\BlockchainApi;
use \Codestillery\Coinprism\Kits\TransactionBuilder;
use \Codestillery\Coinprism\Kits\SigningAndBroadcasting;
use \Codestillery\Coinprism\Kits\AccountManager;

/**
 * Coinprism API toolkit
 *
 * Provides semantically categorized API toolkit.
 * Holds collection of singleton instances for each base URL.
 * Manages lifecycle of HTTP client for each instance.
 *
 * @author Michał Rudnicki <michal.rudnicki@codestillery.com>
 */
class Toolkit {

	const KIT_BLOCKCHAIN = 0;
	const KIT_TRANSACTION_BUILDER = 1;
	const KIT_SIGNING_AND_BROADCASTING = 2;
	const KIT_ACCOUNT_MANAGER = 3;

	/**
	 * Toolkit instances mapped by base URL
	 * @var \Codestillery\Coinprism\Toolkit<string>[]
	 */
	protected static $instances = [];

	/**
	 * Base URL of Coinprism service endpoint
	 * @var string
	 */
	protected $baseUrl;

	/**
	 * HTTP client
	 * @var \Codestillery\Coinprism\Http\Client
	 */
	protected $httpClient;

	/**
	 * Semantic kits
	 * @var \Codestillery\Coinprism\Kits\Kit<int>
	 */
	protected $kits = [];

	/**
	 * Constructor
	 *
	 * @param string $baseUrl of Coinprism service endpoint
	 */
	protected function __construct($baseUrl) {
		$this->baseUrl = $baseUrl;
	}

	/**
	 * Return singleton instance of toolkit for given base URL
	 *
	 * @param string $baseUrl of Coinprism service endpoint
	 * @return \Codestillery\Coinprism\Toolkit
	 */
	public static function getInstance($baseUrl) {
		if (false === isset(static::$instances[$baseUrl])) {
			static::$instances[$baseUrl] = new Toolkit($baseUrl);
		}
		return static::$instances[$baseUrl];
	}

	/**
	 * Return HTTP client
	 *
	 * @return \Codestillery\Coinprism\Http\Client
	 */
	public function getHttpClient() {
		if (null === $this->httpClient) {
			$this->httpClient = new Http\Client($this->baseUrl);
		}
		return $this->httpClient;
	}

	/**
	 * Return blockchain API kit
	 *
	 * @return \Codestillery\Coinprism\Kits\BlockchainApi
	 */
	public function getBlockchainApi() {
		if (false === isset($this->kits[static::KIT_BLOCKCHAIN])) {
			$this->kits[static::KIT_BLOCKCHAIN] = new BlockchainApi($this->getHttpClient());
		}
		return $this->kits[static::KIT_BLOCKCHAIN];
	}

	/**
	 * Return transaction builder kit
	 *
	 * @return \Codestillery\Coinprism\Kits\TransactionBuilder
	 */
	public function getTransactionBuilder() {
		if (false === isset($this->kits[static::KIT_TRANSACTION_BUILDER])) {
			$this->kits[static::KIT_TRANSACTION_BUILDER] = new TransactionBuilder($this->getHttpClient());
		}
		return $this->kits[static::KIT_TRANSACTION_BUILDER];
	}

	/**
	 * Return signing and broadcasting kit
	 *
	 * @return \Codestillery\Coinprism\Kits\SigningAndBroadcasting
	 */
	public function getSigningAndBroadcasting() {
		if (false === isset($this->kits[static::KIT_SIGNING_AND_BROADCASTING])) {
			$this->kits[static::KIT_SIGNING_AND_BROADCASTING] = new SigningAndBroadcasting($this->getHttpClient());
		}
		return $this->kits[static::KIT_SIGNING_AND_BROADCASTING];
	}

	/**
	 * Return account manager kit
	 *
	 * @return \Codestillery\Coinprism\Kits\AccountManager
	 */
	public function getAccountManager() {
		if (false === isset($this->kits[static::KIT_ACCOUNT_MANAGER])) {
			$this->kits[static::KIT_ACCOUNT_MANAGER] = new AccountManager($this->getHttpClient());
		}
		return $this->kits[static::KIT_ACCOUNT_MANAGER];
	}

}