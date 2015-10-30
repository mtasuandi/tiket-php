<?php
namespace Mtasuandi\Tiket\Services;

use Mtasuandi\Tiket\Exceptions\TiketException;
use Mtasuandi\Tiket\Util\Config;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;

/**
 * Super class for all services
 *
 * @package 	Services
 * @author 		M Teguh A Suandi
 */
abstract class BaseService
{
	/**
	 * Helper function to return required headers for making an HTTP request with Tiket.com
	 * @return 	array - authorization headers
	 */
	private static function getHeaders()
	{
		return [
			'twh' => Config::get( 'settings.user_agent' )
		];
	}

	/**
	 * GuzzleHTTP Client Implementation to use for HTTP requests
	 * @var 	Client
	 */
	private $client;

	/**
	 * Token for the application
	 * @var 	string
	 */
	private $token;

	/**
	 * Constructor with the option to supply an alternative rest client to be used
	 * @param 	string $token - Tiket.com Token
	 */
	public function __construct( $token )
	{
		$this->token 	= $token;
		$this->client = new Client( $this->getHeaders() );
	}

	/**
	 * Get the rest client being used by the service
	 * @return 	Client - GuzzleHTTP Client
	 */
	protected function getClient()
	{
		return $this->client;
	}

	/**
	 * Create send request for the API Calls
	 */
	protected function send( $method, $baseUrl, $params = [] )
	{
		$params['query']['token'] = $this->token;
		$response = $this->client->request( $method, $baseUrl, $params );
		return $response->getBody()->getContents();
	}

	/**
   * Turns a ClientException into a TiketException - like magic.
   * @param 	ClientException $exception - Guzzle ClientException
   * @return 	TiketException
   */
  protected function convertException( $exception )
  {
    $tiketException = new TiketException( $exception->getResponse()->getReasonPhrase(), $exception->getCode() );
    $tiketException->setUrl( $exception->getResponse()->getEffectiveUrl() );
    $tiketException->setErrors( json_decode( $exception->getResponse()->getBody()->getContents() ) );
    return $tiketException;
  }
}