<?php

namespace Codestillery\Coinprism\Kits;

/**
 * Account management kit
 *
 * Online documentation available at http://docs.coinprism.apiary.io/#reference/account-management
 *
 * @author Michał Rudnicki <michal.rudnicki@codestillery.com>
 */
class AccountManager extends Kit {

	/**
	 * Create account with given label
	 *
	 * @param string $label to be given to account
	 * @return string<string>[]
	 */
	public function createAddress($label) {
		$path = "/v1/account/createaddress";
		$params = ["label" => $label];
		$httpResponse = $this->httpClient->post($path, $params, [], true);
		return json_decode($httpResponse->getContent(), true);
	}

}