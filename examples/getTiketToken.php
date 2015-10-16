<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Mtasuandi\Tiket\Auth\TiketAuth;
use Mtasuandi\Tiket\Exceptions\AuthException;

try {
	$auth = new TiketAuth( 'f5c0502333aeedebb9a4f70aa8b234de' );
	$access_token = $auth->getToken();
	var_dump( $access_token );
} catch (AuthException $e) {
	var_dump($e);
}