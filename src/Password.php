<?php

namespace CIInputManager;

/**
 * Description of Input
 *
 * @author gorlando
 */
class Password{
	
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
			$attrs["readonly"] = TRUE;
		}else{
			$attrs["readonly"] = FALSE;
		}
		if(array_key_exists("disabled", $attrs) && is_bool($attrs["disabled"]) && $attrs["disabled"] === TRUE){
			$attrs["disabled"] = TRUE;
		}else{
			$attrs["disabled"] = FALSE;
		}
		if(array_key_exists("required", $attrs) && is_bool($attrs["required"]) && $attrs["required"] === TRUE){
			$attrs["required"] = TRUE;
		}else{
			$attrs["required"] = FALSE;
		}
		
		return $attrs;
	}
	
	public static function create(array $attrs) : string {
		$_ci = & get_instance();
		
		list(
				'name' => $name, 
				'value' => $value, 
				'classes' => $classes, 
				'readonly' => $readonly, 
				'disabled' => $disabled,
				'required' => $required
			) = Input::check_attributes($attrs);
        
		$data = array(
            'name' => $name,
            'id' => $name,
            'value' => $_ci->input->post($name) !== FALSE ? $_ci->input->post($name) : $value,
            'class' => $classes
        );
		if(is_bool($readonly) && $readonly === TRUE){
			$data['readonly'] = 'readonly';
		}
		if(is_bool($disabled) && $disabled === TRUE){
			$data['disabled'] = 'disabled';
		}
		if(is_bool($required) && $required === TRUE){
			$data['required'] = 'required';
		}
        return form_password($data);
	}
}
