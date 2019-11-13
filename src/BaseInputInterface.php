<?php

namespace CIInputManager;

/**
 * Description of BaseInputInterface
 *
 * @author gorlando
 */
interface BaseInputInterface {
	
	public static function create(array $attrs) : string;
	
	public static function check_attributes(array $attrs) : array;
}
