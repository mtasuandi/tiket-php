<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Mtasuandi\Tiket\Auth\TiketAuth;
use Mtasuandi\Tiket\Exceptions\AuthException;

try {
	$auth = new TiketAuth( 'XXX' );
	$access_token = $auth->getToken();
	var_dump( $access_token );
} catch (AuthException $e) {
	var_dump($e);
}