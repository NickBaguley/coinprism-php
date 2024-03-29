<?php

namespace Codestillery\Coinprism\Http;

/**
 * Http client
 *
 * Performs parametrized Http calls.
 *
 * @author Michał Rudnicki <michal.rudnicki@codestillery.com>
 */
class Client {

	/**
	 * Http response
	 * @var \Codestillery\Coinprism\Http\Response;
	 */
	protected $response;

	protected $options = [];

	/**
	 * Constructor
	 *
	 * @param string $baseUrl to which all paths are relative
	 */
	public function __construct($baseUrl) {
		$this->baseUrl = $baseUrl;
	}

	public function setCurlOptions(array $options) {
		$this->options = $options;
		return $this;
	}

	/**
	 * Return response object or null if no call made
	 *
	 * @return \Codestillery\Coinprism\Http\Response|null
	 */
	public function getResponse() {
		return $this->response;
	}

	/**
	 * Perform parametrized Http call and return response object
	 *
	 * @param string $method
	 * @param string $path relative to $this->baseUrl
	 * @param string<string>[] parameters for Http POST
	 * @param array $options for curl
	 * @param boolean $auth
	 * @return \Codestillery\Coinprism\Http\Response|null
	 */
	protected function call($method, $path, array $params = [], array $options = [], $auth = false) {
		$url = $this->baseUrl . $path;

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_HEADER, FALSE);
		curl_setopt($curl, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
		empty($this->options) or curl_setopt_array($curl, $this->options);
		empty($options) or curl_setopt_array($curl, $options);
		if ("get" !== $method) {
			curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
		}

		$content = curl_exec($curl);
		$this->response = new Response($content, $curl);
		return $this->response;
	}

	public function get($path, array $params = [], array $options = [], $auth = false) {
		return $this->call("get", $path, $params, $options, $auth);
	}

	public function post($path, array $params = [], array $options = [], $auth = false) {
		return $this->call("post", $path, $params, $options, $auth);
	}

}