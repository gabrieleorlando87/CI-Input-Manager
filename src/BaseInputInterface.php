<?php

namespace CIInputManager;

/**
 * Description of BaseInputInterface
 *
 * @author gorlando
 */
interface BaseInputInterface {
	
	public function create(array $attrs) : string;
	
	public function check_attributes(array $attrs) : array;
}
