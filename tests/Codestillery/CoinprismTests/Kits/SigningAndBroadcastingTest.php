<?php

namespace Codestillery\CoinprismTests\Kits;

use \Codestillery\Coinprism\Kits\SigningAndBroadcasting;

class SigningAndBroadcastingTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @test
	 * @covers \Codestillery\Coinprism\Kits\SigningAndBroadcasting::sign
	 */
	public function sign_ok() {
		$json = file_get_contents(__DIR__ . "/mocks/SigningAndBroadcasting_sign_ok.json");
		$expected = json_decode($json, true);
		$content = json_encode($expected);

		$response = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Response", ["getContent" => $content]);
		$client = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Client", ["post" => $response]);

		$raw = "0100000001d238c42ec059b8c7747cd51debb4310108f6279d14957472822cf061a660828b000000001976a914760fdb3483204406ddb73a45b20b7c9be61d0a7e88acffffffff0288130000000000001976a91430a5d35558ade668b8829a2a0f60a3f10358327e88ac306f0100000000001976a914760fdb3483204406ddb73a45b20b7c9be61d0a7e88ac00000000";
		$keys = ["D8414E7062013DD24D3A3E71EFA8C72142A63F45E3B1AFA4653AFDFD9BC8D67E"];

		$kit = new SigningAndBroadcasting($client);
		$actual = $kit->sign($raw, $keys);
		$this->assertEquals($expected["raw"], $actual);
	}

	/**
	 * @test
	 * @covers \Codestillery\Coinprism\Kits\SigningAndBroadcasting::push
	 */
	public function push_ok() {
		$expected = "a649d400222899444ecbc99f8279643cecdc1b301cbc1e0e1d69d90fbc7917b1";

		$response = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Response", ["getContent" => json_encode($expected)]);
		$client = \Mockery::mock("\\Codestillery\\Coinprism\\Http\\Client", ["post" => $response]);

		$raw = "0100000001d238c42ec059b8c7747cd51debb4310108f6279d14957472822cf061a660828b000000006b483045022100d326257244e8cb86889509cf5b4717edf273d9e6e643f571c434753059eb01a902204aa761f44e89b55af0e2fa0caef580401a4ba61eebf8bc29020ce23f6fab1ee2012102661ac805eef8015c7c8d617c65ef327c4f2272fd5d9e97456a0d32d3bcf6f563ffffffff0288130000000000001976a91430a5d35558ade668b8829a2a0f60a3f10358327e88ac306f0100000000001976a914760fdb3483204406ddb73a45b20b7c9be61d0a7e88ac00000000";

		$kit = new SigningAndBroadcasting($client);
		$actual = $kit->push($raw);
		$this->assertEquals($expected, $actual);
	}

}