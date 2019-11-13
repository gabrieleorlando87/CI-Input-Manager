<?php

namespace CIInputManager;

use CIInputManager\BaseInputInterface;

/**
 * Description of BaseInput
 *
 * @author gorlando
 */
abstract class BaseInput implements BaseInputInterface {

	/**
	 * 
	 * @param array $attrs
	 * - name (string): name da dare all'input. Se non settato viene generato univocamente.
	 * - value (string): value dell'input. Se non settato è stringa vuota.
	 * - classes (array): classi css da dare all'input. Se non settato è stringa vuota.
	 * - readonly (bool): per settare l'attributo read only.
	 * - disabled (bool): per settare l'attributo disabled.
	 * @return array
	 */
	public static function check_attributes(array $attrs) : array {
		if(!array_key_exists("name", $attrs) || !is_string($attrs["name"])){
			$attrs["name"] = uniqid();
		}
		if(!array_key_exists("value", $attrs) || !is_string($attrs["value"])){
			$attrs["value"] = '';
		}
		if(!array_key_exists("classes", $attrs)){
			$attrs["classes"] = '';
		}else{
			if(is_array($attrs["classes"]) && count($attrs["classes"]) != 0){
				$attrs["classes"] = implode(" ", $attrs["classes"]);
			}else{
				$attrs["classes"] = '';
			}
		}
		if(array_key_exists("readonly", $attrs) && is_bool($attrs["readonly"]) && $attrs["readonly"] === TRUE){
			$attrs["readonly"] = 'readonly="readonly"';
		}else{
			$attrs["readonly"] = '';
		}
		if(array_key_exists("disabled", $attrs) && is_bool($attrs["disabled"]) && $attrs["disabled"] === TRUE){
			$attrs["disabled"] = 'disabled="disabled"';
		}else{
			$attrs["disabled"] = '';
		}
		if(array_key_exists("required", $attrs) && is_bool($attrs["required"]) && $attrs["required"] === TRUE){
			$attrs["required"] = 'required="required"';
		}else{
			$attrs["required"] = '';
		}
		
		return $attrs;
	}
}
