<?php

namespace Codestillery\Coinprism\Kits;

use Codestillery\Coinprism\Http\Client;

/**
 * API kit abstraction
 *
 * @author Michał Rudnicki <michal.rudnicki@codestillery.com>
 */
abstract class Kit {

	/**
	 * @var \Codestillery\Coinprism\Http\Client
	 */
	protected $httpClient;

	/**
	 * Constructor
	 *
	 * @param \Codestillery\Coinprism\Http\Client $client
	 */
	public function __construct(Client $httpClient) {
		$this->httpClient = $httpClient;
	}

	/**
	 * Return HTTP client
	 *
	 * @return \Codestillery\Coinprism\Http\Client $client
	 */
	public function getHttpClient() {
		return $this->httpClient;
	}

}