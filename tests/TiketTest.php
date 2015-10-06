<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Mtasuandi\Tiket\Auth\TiketAuth;
use Mtasuandi\Tiket\Exceptions\AuthException;

$auth = new TiketAuth( 'f5c0502333aeedebb9a4f70aa8b234de' );

try {
	$access_token = $auth->getToken();
	echo '<pre>'; print_r( $access_token );
} catch (AuthException $e) {
	echo $e->getMessage();
}