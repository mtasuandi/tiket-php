<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Mtasuandi\Tiket\Tiket;
use Mtasuandi\Tiket\Exception\TiketException;

$token = 'XXX';
$tiket = new Tiket( $token );

try {
	$response = $tiket->generalService->getListCurrency();
} catch (TiketException $ex) {
  foreach ($ex->getErrors() as $error) {
    print_r($error);
  }

  if (!isset($response)) {
    $response = null;
  }
}

var_dump($response);