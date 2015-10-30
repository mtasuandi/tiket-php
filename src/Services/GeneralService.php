<?php
namespace Mtasuandi\Tiket\Services;

use Mtasuandi\Tiket\Exceptions\TiketException;
use Mtasuandi\Tiket\Util\Config;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Stream\Stream;

/**
 * Performs all actions related to Tiket.com General API
 * 
 * @package 	Services
 * @author 		M Teguh A Suandi
 */
class GeneralService extends BaseService
{
	/**
	 * Get a list currency
	 * 
	 * @return 	Array of list currency
	 * @throws 	TiketException
	 */
	public function getListCurrency()
	{
		$params = [
			'verify' => false,
			'query' => [
				'output' => Config::get( 'response.format' )
			]
		];

		$baseUrl = sprintf( Config::get( 'endpoints.base_url' ), Config::get( 'settings.api' ) ) . Config::get( 'endpoints.general_list_currency' );

		try {
			$response = parent::send( 'GET', $baseUrl, $params );
		} catch (TiketException $e) {
			throw parent::convertException( $e );
		}

		return $response;
	}

	/**
	 * Get a list language
	 * 
	 * @return 	Array of list language
	 * @throws 	TiketException
	 */
	public function getListLanguage()
	{
		$params = [
			'verify' => false,
			'query' => [
				'output' => Config::get( 'response.format' )
			]
		];

		$baseUrl = sprintf( Config::get( 'endpoints.base_url' ), Config::get( 'settings.api' ) ) . Config::get( 'endpoints.general_list_language' );

		try {
			$response = parent::send( 'GET', $baseUrl, $params );
		} catch (TiketException $e) {
			throw parent::convertException( $e );
		}

		return $response;
	}

	/**
	 * Get a list country
	 * 
	 * @return 	Array of list country
	 * @throws 	TiketException
	 */
	public function getListCountry()
	{
		$params = [
			'verify' => false,
			'query' => [
				'output' => Config::get( 'response.format' )
			]
		];

		$baseUrl = sprintf( Config::get( 'endpoints.base_url' ), Config::get( 'settings.api' ) ) . Config::get( 'endpoints.general_list_country' );

		try {
			$response = parent::send( 'GET', $baseUrl, $params );
		} catch (TiketException $e) {
			throw parent::convertException( $e );
		}

		return $response;
	}

	/**
	 * Get a transaction policies
	 * 
	 * @return 	Array of transaction policies
	 * @throws 	TiketException
	 */
	public function getTransactionPolicies()
	{
		$params = [
			'verify' => false,
			'query' => [
				'output' => Config::get( 'response.format' )
			]
		];

		$baseUrl = sprintf( Config::get( 'endpoints.base_url' ), Config::get( 'settings.api' ) ) . Config::get( 'endpoints.general_transaction_policies' );

		try {
			$response = parent::send( 'GET', $baseUrl, $params );
		} catch (TiketException $e) {
			throw parent::convertException( $e );
		}

		return $response;
	}
}