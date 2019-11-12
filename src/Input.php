<?php

namespace CIInputManager;

use CIInputManager\BaseInput;

/**
 * Description of Input
 *
 * @author gorlando
 */
class Input extends BaseInput {
	
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
        
		$data = array(
            'name' => $name,
            'id' => $name,
            'value' => $this->_ci->input->post($name) !== FALSE ? $this->_ci->input->post($name) : $value,
            'class' => $classes,
			'readonly' => $readonly,
			'disabled' => $disabled,
            'required' => $required
        );
        return form_input($data);
	}
}
