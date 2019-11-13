<?php

namespace CIInputManager;

use CIInputManager\BaseInput;

/**
 * Description of Dropdown
 *
 * @author gorlando
 */
class Dropdown{
	
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
		
		$data = [];
        $data_sel = $_ci->input->post($name) != FALSE ? [$_ci->input->post($name)] : [$value];
        return form_dropdown($name, $data, $data_sel, 'id="' . $name . '" class="'.$classes.'" '.$readonly.' '.$disabled.' '.$required.' ');
	}
}
