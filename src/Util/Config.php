<?php
namespace Mtasuandi\Tiket\Util;

/**
 * Configuration class to handle endpoints, urls, error messages etc
 *
 * @package 		Util
 * @author 			M Teguh A Suandi
 */
class Config {

	/**
	 * @var array - array of configuration properties
	 */
	private static $props = [
		'endpoints' => [
			'base_url' => 'https://%s.tiket.com/',
			'get_token' => 'apiv1/payexpress'
		],
		'settings' => [
			'version' => '1.0',
			/**
			 * Determine application environment
			 * Development: api-sandbox
			 * Production: api
			 */
			'api' => 'api-sandbox'
		]
	];

	/**
	 * Get a configuration property given a specified location, example usage: Config::get('settings.version')
	 * @param 		index - location of the property to obtain
	 * @return 		string
	 */
	public function get( $index )
	{
		$index = explode( '.', $index );
		return self::getValue( $index, self::$props );
	}

	/**
	 * Navigate through a config array looking for a particular index
	 * @param 		array $index The index sequence we are navigating down
	 * @param 		array $value The portion of the config array to process
	 * @return 		mixed
	 */
	private function getValue( $index, $value )
	{
		if ( is_array( $index ) && count( $index ) ) {
			$current_index = array_shift( $index );
		}

		if ( is_array( $index ) && count( $index ) && is_array( $value[$current_index] ) && count( $value[$current_index] ) ) {
			return self::getValue( $index, $value[$current_index] );
		} else {
			return $value[$current_index];
		}
	}
}