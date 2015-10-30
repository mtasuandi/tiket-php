<?php
namespace Mtasuandi\Tiket;

use Mtasuandi\Tiket\Services\GeneralService;

/**
 * Expose all implemented Tiket.com API functionality
 *
 * @package 	Mtasuandi\Tiket
 * @version 	1.0
 * @author 		M Teguh A Suandi
 * @link 			http://mtasuandi.com
 */
class Tiket {
	/**
	 * Handle interaction with General API
	 * @var 	GeneralService
	 */
	public $generalService;


	/**
	 * Class constructor
	 * Registers the Token with the Tiket.com class that will be used for all API calls.
	 * @param 	string $token - Tiket.com Token
	 */
	public function __construct( $token )
	{
		$this->generalService = new GeneralService( $token );
	}
}