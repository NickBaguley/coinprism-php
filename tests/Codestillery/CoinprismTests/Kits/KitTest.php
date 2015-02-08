<?php

namespace Codestillery\CoinprismTests\Kits;

use Codestillery\Coinprism\Kits\Kit;
use Codestillery\Coinprism\Http\Client;

class DummyKit extends Kit { }

class KitTest extends \PHPUnit_Framework_TestCase {

	const BASE_URL = "http://localhost/v1/";

	/**
	 * @test
	 * @covers \Codestillery\Coinprism\Kits\Kit::getHttpClient()
	 */
	public function getHttpClient() {
		$httpClient = $this->getMockBuilder("\\Codestillery\\Coinprism\\Http\\Client")
			->disableOriginalConstructor()
			->getMock();

		$kit = new DummyKit($httpClient);
		$actual = $kit->getHttpClient();
		$this->assertSame($actual, $httpClient);
	}

}