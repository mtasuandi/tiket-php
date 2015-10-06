[![Build Status](https://travis-ci.org/mtasuandi/tiket-php.svg?branch=master)](https://travis-ci.org/mtasuandi/tiket-php)

# Tiket.com PHP Library
Tiket.com PHP Library http://docs.tiket.com/.

# Quickstart
Register for an API key for production [here](http://www.tiket.com/affiliate "Affiliate") and for development [here](http://sandbox.tiket.com/affiliate "Sandbox").

## Installation
```
composer require mtasuandi/tiket-php dev-master
```

## Environment
By default, the API will point to sandbox url. If you want to change to production, change Util/config.php.

From:
```php
'settings' => [
	'version' => '1.0',
	/**
	 * Determine application environment
	 * Development: api-sandbox
	 * Production: api
	 */
	'api' => 'api-sandbox'
	]
```
To:
```php
'settings' => [
	'version' => '1.0',
	/**
	 * Determine application environment
	 * Development: api-sandbox
	 * Production: api
	 */
	'api' => 'api'
	]
```

## Usage Auth
```php
<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Mtasuandi\Tiket\Auth\TiketAuth;
use Mtasuandi\Tiket\Exceptions\AuthException;

$auth = new TiketAuth( 'API_KEY' );

try {
	$access_token = $auth->getToken();
	echo '<pre>'; print_r( $access_token ); echo '</pre>';
} catch (AuthException $e) {
	echo $e->getMessage();
}
```

# License
The MIT License (MIT).