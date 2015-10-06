<?php
namespace Mtasuandi\Tiket\Exceptions;

use Exception;

/**
 * General exception
 *
 * @package 		Exceptions
 * @author 			M Teguh A Suandi
 */
class TiketException extends Exception {

	private $errors;
	private $url;

	public function setErrors( array $errors )
	{
		$this->errors = $errors;
	}

	public function getErrors()
	{
		return $this->errors;
	}

	public function setUrl( $url )
	{
		$this->url = $url;
	}

	public function getUrl()
	{
		return $this->url;
	}
}