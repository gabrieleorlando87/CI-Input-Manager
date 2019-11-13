<?php

namespace CIInputManager;

use CIInputManager\BaseInput;

/**
 * Description of Input
 *
 * @author gorlando
 */
class Input{
	
	public static function create(array $attrs) : string {
		$_ci = & get_instance();
		
		list(
				'name' => $name, 
				'value' => $value, 
				'classes' => $classes, 
				'readonly' => $readonly, 
				'disabled' => $disabled,
				'required' => $required
			) = BaseInput::check_attributes($attrs);
        
		$data = array(
            'name' => $name,
            'id' => $name,
            'value' => $_ci->input->post($name) !== FALSE ? $_ci->input->post($name) : $value,
            'class' => $classes,
			'readonly' => $readonly,
			'disabled' => $disabled,
            'required' => $required
        );
        return form_input($data);
	}
}
