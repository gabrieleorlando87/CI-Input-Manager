<?php

namespace CIInputManager;

use CIInputManager\BaseInput;

/**
 * Description of Dropdown
 *
 * @author gorlando
 */
class Dropdown extends BaseInput{
	
	public function __construct($attrs = []) {
		parent::__construct();
		
		return $this->create($attrs);
	}
	
	public function create(array $attrs) : string {
		list(
				'name' => $name, 
				'value' => $value, 
				'classes' => $classes, 
				'readonly' => $readonly, 
				'disabled' => $disabled,
				'required' => $required
			) = $this->check_attributes($attrs);
		
		$data = [];
        $data_sel = [$value];
        if ($this->_ci->input->post($name) != FALSE) {
            $data_sel[] = $this->_ci->input->post($name);
        }
        return form_dropdown($name, $data, $data_sel, 'id="' . $name . '" class="'.$classes.'" '.$readonly.' '.$disabled.' '.$required.' ');
	}
}
