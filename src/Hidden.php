<?php

namespace CIInputManager;

use CIInputManager\BaseInput;

/**
 * Description of Hidden
 *
 * @author Gabriele
 */
class Hidden extends BaseInput {

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

        if ($this->_ci->input->post($name) != FALSE) {
            $value = $this->_ci->input->post($name);
        }
        return form_hidden($name.'_hidden', $value);
	}

}
