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
			"fees" => (int)$fee,
			"from" => $from,
			"asset" => $asset,
			"amount" => (int)$amount,
			"metadata" => $metadata,
		];
		$response = $this->client->post("/v1/issueasset", $params, [], true);
		return json_decode($response->getContent(), true);
	}

/*
\"fees\": 1000,
  \"from\": \"1zLkEoZF7Zdoso57h9si5fKxrKopnGSDn\",
  \"to\": [
    {
      \"address\": \"akSjSW57xhGp86K6JFXXroACfRCw7SPv637\",
      \"amount\": \"10\",
      \"asset_id\": \"AHthB6AQHaSS9VffkfMqTKTxVV43Dgst36\"
    }
  ]
*/
}