<?php

namespace Codestillery\Coinprism\Kits;

class BlockchainApi extends Kit {

	/**
	 * Retrieve balance of an account
	 *
	 * @param string $address to be querried
	 * @return array
	 */
	public function getBalance($address) {
		$path = "/v1/addresses/" . urlencode($address);
		$httpResponse = $this->httpClient->get($path, [], [], true);
		return json_decode($httpResponse->getContent(), true);
	}

	/**
	 * Retrieve recent transactions invoiving address
	 *
	 * @param string $address to be querried
	 * @return array
	 */
	public function getRecentTransactions($address) {
		$path = "/v1/addresses/" . urlencode($address) . "/transactions";
		$httpResponse = $this->httpClient->get($path, [], [], true);
		return json_decode($httpResponse->getContent(), true);
	}

	/**
	 * Retrieve all unspent outputs of an address
	 *
	 * @param string $address to be querried
	 * @return array
	 */
	public function getUnspentOutputs($address) {
		$path = "/v1/addresses/" . urlencode($address) . "/unspents";
		$httpResponse = $this->httpClient->get($path, [], [], true);
		return json_decode($httpResponse->getContent(), true);
	}

	/**
	 * Return details about bitcoin or colored coin transaction
	 *
	 * @param string $txid to be investigated
	 * @return array
	 */
	public function getTransactionDetails($txid) {
		$path = "/v1/transactions/" . urlencode($txid);
		$httpResponse = $this->httpClient->get($path, [], [], true);
		return json_decode($httpResponse->getContent(), true);
	}

}