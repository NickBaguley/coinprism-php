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
		$response = $this->client->get($path, [], [], false);
		return json_decode($response->getContent(), true);
	}

	/**
	 * Retrieve recent transactions invoiving address
	 *
	 * @param string $address to be querried
	 * @return array
	 */
	public function getRecentTransactions($address) {
		$path = "/v1/addresses/" . urlencode($address) . "/transactions";
		$response = $this->client->get($path, [], [], false);
		return json_decode($response->getContent(), true);
	}

	/**
	 * Retrieve all unspent outputs of an address
	 *
	 * @param string $address to be querried
	 * @return array
	 */
	public function getUnspentOutputs($address) {
		$path = "/v1/addresses/" . urlencode($address) . "/unspents";
		$response = $this->client->get($path, [], [], false);
		return json_decode($response->getContent(), true);
	}

	/**
	 * Return details about bitcoin or colored coin transaction
	 *
	 * @param string $txid to be investigated
	 * @return array
	 */
	public function getTransactionDetails($txid) {
		$path = "/v1/transactions/" . urlencode($txid);
		$response = $this->client->get($path, [], [], false);
		return json_decode($response->getContent(), true);
	}

	/**
	 * Retrieve asset definition
	 *
	 * @param string $id of an asset
	 * @return array
	 */
	public function getAssetDefinition($id) {
		$path = "/v1/assets/" . urlencode($id);
		$response = $this->client->get($path, [], [], false);
		return json_decode($response->getContent(), true);
	}

	/**
	 * Retrieve addresses holding an asset
	 *
	 * @param string $id of an asset
	 * @param int $height
	 * @return array
	 */
	public function getAddressesHolding($id) {
		$path = "/v1/assets/" . urlencode($id) . "/owners";
		$response = $this->client->get($path, [], [], false);
		return json_decode($response->getContent(), true);
	}

}