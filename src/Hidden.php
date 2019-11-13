<?php

namespace CIInputManager;

use CIInputManager\BaseInput;

/**
 * Description of Hidden
 *
 * @author Gabriele
 */
class Hidden{
	
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

        if ($_ci->input->post($name) != FALSE) {
            $value = $_ci->input->post($name);
        }
        return form_hidden($name.'_hidden', $value);
	}

}
