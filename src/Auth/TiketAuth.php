<?php
namespace Mtasuandi\Tiket\Auth;

use Mtasuandi\Tiket\Exceptions\TiketException;
use Mtasuandi\Tiket\Exceptions\AuthException;
use Mtasuandi\Tiket\Util\Config;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

/**
 * Class that implement necessary functionality to obtain an access token from a user
 * 
 * @package 		Auth
 * @author 			M Teguh A Suandi
 */
class TiketAuth {
	
	public $apiKey;

	public function __construct( $apiKey )
	{
		$this->apiKey = $apiKey;
		$this->client = new Client();
	}

	/**
	 * Obtain access token
	 * @param 		string $apiKey
	 * @return 		string
	 * @throws		AuthException
	 */
	public function getToken()
	{
		$params = [
			'verify' => false,
			'query' => [
				'method' => 'getToken',
				'secretkey' => $this->apiKey,
				'output' => Config::get( 'response.format' )
			]
		];

		$baseUrl = sprintf( Config::get( 'endpoints.base_url' ), Config::get( 'settings.api' ) ) . Config::get( 'endpoints.get_token' );

		try {
			$response = $this->client->request( 'GET', $baseUrl, $params );
			$body = $response->getBody();
		} catch ( ClientException $e ) {
			throw $this->convertException( $e );
		}

		return $body->getContents();
	}

	/**
	 * @param 		ClientException $exception
	 * @return 		AuthException
	 */
	private function convertException( $exception )
	{
		$authException = new AuthException( $exception->getResponse()->getReasonPhrase(), $exception->getCode() );
		$authException->setUrl( $exception->getResponse()->getEffectiveUrl() );
		$authException->setErrors( json_decode( $exception->getResponse()->getBody()->getContents() ) );
		return $authException;
	}
}