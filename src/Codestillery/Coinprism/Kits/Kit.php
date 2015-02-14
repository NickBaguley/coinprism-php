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
	protected $client;

	/**
	 * Constructor
	 *
	 * @param \Codestillery\Coinprism\Http\Client $client
	 */
	public function __construct(Client $client) {
		$this->client = $client;
	}

	/**
	 * Return HTTP client
	 *
	 * @return \Codestillery\Coinprism\Http\Client $client
	 */
	public function getHttpClient() {
		return $this->client;
	}

}