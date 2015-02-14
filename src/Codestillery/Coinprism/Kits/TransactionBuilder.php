<?php

namespace Codestillery\Coinprism\Kits;

class TransactionBuilder extends Kit {

	/**
	 * Create an unsigned transaction for issuing colored coins
	 *
	 * @param int $fee in satoshis
	 * @param string $from bitcoin address
	 * @param string $asset address
	 * @param int $amount number of asset units
	 * @param string $metadata url
	 * @return array
	 */
	public function issue($fee, $from, $asset, $amount, $metadata) {
		$params = [
			"fees" => $fee,
			"from" => $from,
			"asset" => $asset,
			"amount" => $amount,
			"metadata" => $metadata,
		];
		$response = $this->client->post("/v1/issueasset", $params, [], true);
		return json_decode($response->getContent(), true);
	}

	/**
	 * Create an unsigned transaction for sending an asset
	 *
	 * @param int $fee in satoshis
	 * @param string $from bitcoin address
	 * @param array $address of recipient
	 * @param int $amount
	 * @param string $asset address
	 * @return array
	 */
	public function send($fee, $from, $address, $amount, $asset) {
		$params = [
			"fees" => $fee,
			"from" => $from,
			"to" => [
				"address" => $address,
				"amount" => $amount,
				"asset_id" => $asset,
			]
		];
		$response = $this->client->post("/v1/sendasset", $params, [], true);
		return json_decode($response->getContent(), true);
	}

}