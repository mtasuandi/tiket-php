<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Mtasuandi\Tiket\Auth\TiketAuth;
use Mtasuandi\Tiket\Exceptions\AuthException;

class TiketTest extends PHPUnit_Framework_TestCase {
	public function testGetToken()
	{
		$auth = new TiketAuth( 'f5c0502333aeedebb9a4f70aa8b234de' );
		$access_token = $auth->getToken();
		$this->assertContains('token', $access_token);
		$this->assertArrayHasKey('diagnostic', ['diagnostic' => []]);
	}
}