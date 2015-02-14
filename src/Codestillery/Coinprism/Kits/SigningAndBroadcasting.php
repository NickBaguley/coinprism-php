<?php

namespace Codestillery\Coinprism\Kits;

class SigningAndBroadcasting extends Kit {

	/**
	 * Sign a transaction
	 *
	 * @param string $raw transaction in hex format
	 * @param string[] $keys in hex format
	 * @return string
	 */
	public function sign($raw, array $keys) {
		$params = [
			"transaction" => $raw,
			"keys" => $keys,
		];
		$response = $this->client->post("/v1/signtransaction", $params, [], true);
		$out = json_decode($response->getContent(), true);
		return $out["raw"];
	}

	/**
	 * Push signed transaction to the network
	 *
	 * @param string $raw transaction in hex format
	 * @return array
	 */
	public function push($raw) {
		$response = $this->client->post("/v1/signtransaction", [$raw], [], true);
		return json_decode($response->getContent(), true);
	}

}