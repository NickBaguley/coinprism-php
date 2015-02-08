<?php

namespace Codestillery\Coinprism\Http;

/**
 * Http response
 *
 * Contains result of Http call and connection details.
 * Automatically closes connection resource upon destruction.
 *
 * @author Michał Rudnicki <michal.rudnicki@codestillery.com>
 */
class Response {

	protected $content;
	protected $curl;

	/**
	 * Constructor
	 *
	 * @param string $content
	 * @param resource $curl
	 */
	public function __construct($content, $curl) {
		$this->content = $content;
		$this->curl = $curl;
	}

	/**
	 * Destructor
	 */
	public function __destruct() {
		is_resource($this->curl) and curl_close($this->curl);
	}

	/**
	 * Return content of Http response
	 *
	 * @return string
	 */
	public function getContent() {
		return $this->content;
	}

}