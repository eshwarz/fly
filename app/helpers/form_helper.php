<?php

class Form {
	
	public $model = 'Form';

	public function __construct ($model = null){
		if (isset($model))
			$this->model = $model;
	}

	public function form_tag ($options) {
		$class = isset($options['class']) ? $options['class'] : 'fly_form';

		$options['class'] = $class;

		// if stacked is true in form tag
		if ($options['stacked']) {
			$options['class'] = $options['class'] . ' stacked';
			unset($options['stacked']);
		}
		
		if (isset($options['url'])) {
			$url = $options['url'];
			unset($options['url']);

			// default method is set to post.
			if (!isset($options['method'])) {
				$options['method'] = 'post';
			}

			// include multipart form data.
			if ($options['multipart'] == true) {
				$options['enctype'] = 'multipart/form-data';
				unset($options['multipart']);
			}

			$form = '<form action="'.$url.'" '.array_to_params($options).'>';
		}
		elseif (isset($options['action'])) {
			$controller = Router::$_called_controller;
			$options['action'] = '/'.$controller.'/'.$options['action'];
			$form = '<form '.array_to_params($options).'>';
		}
			return $form;
	}

	public function end_form () {
		return "</form>";
	}

	public function input ($name, $params) {
		$id = isset($params['id']) ? $params['id'] : $name;
		$type = isset($params['as']) ? $params['as'] : 'text';
		$label = isset($params['label']) ? $params['label'] : ucwords(humanize($name));
		$params['label'] = $label;
		$validate = $params['validate'];

		// making arrayed name
		$name = $this->model."[".$name."]";

		$params['id'] = $id;
		unset($params['as']);

		// text and password
		if ($type == 'text' || $type == 'password' || $type == 'hidden') {
			$input = '<input type="'.$type.'" name="'.$name.'" '.array_to_params($params).' />';
		}

		// textarea
		if ($type == 'textarea') {
			$value = $params['value'];
			unset($params['value']);
			$input = '<textarea name="'.$name.'" '.array_to_params($params).'>'.$value.'</textarea>';
		}
		
		// select
		if ($type == 'select') {
			$collection = $params['collection'];
			unset($params['collection']);
			unset($params['id']);
			$input = '<select name="'.$name.'" '.array_to_params($params).' id="'.$id.'">';
			if ($params['prompt']) {
				$input .= '<option value="">'.$params['prompt'].'</option>';
			}
			foreach ($collection as $option) {
				$input .= '<option value="'.$option[1].'">'.$option[0].'</option>';
			}
			$input .= '</select>';
		}

		// radio buttons
		if ($type == 'radio') {
			$collection = $params['collection'];
			unset($params['collection']);
			unset($params['id']);
			if ($params['stacked'] == 'true')
				$stacked = 'stacked';
			foreach ($collection as $option) {
				if ($option[2] == 'checked')
					$checked = 'checked="checked"';
				else
					$checked = '';
				$input .= '<label class="cp '.$stacked.'"><input type="radio" value="'.$option[1].'" name="'.$name.'" '.array_to_params($params).' id="'.$option[1].'" '.$checked.'>'.$option[0].'</label>';
			}
		}

		// checkboxes
		if ($type == 'checkbox') {
			$collection = $params['collection'];
			unset($params['collection']);
			unset($params['id']);
			if ($params['stacked'] == 'true')
				$stacked = 'stacked';
			foreach ($collection as $option) {
				if ($option[2] == 'checked')
					$checked = 'checked="checked"';
				else
					$checked = '';
				$input .= '<label class="cp '.$stacked.'"><input type="checkbox" value="'.$option[1].'" name="'.$name.'[]" '.array_to_params($params).' id="'.$option[1].'" '.$checked.'>'.$option[0].'</label>';
			}
		}

		if ($type == 'hidden') {
			$output = $input;
		} else {
			$output = '
				<div class="element">
					<label for="'.$id.'" >'.$label;
			
			if ($validate == 'true')
				$output .= '<span>*</span>';

			$output .= '</label>
					<div class="input_controls">'.$input.'</div>
					<div class="clearfix"></div>
				</div>
			';
		}
		
		return $output;
	}

	public static function submit($params) {
		$output = '<input type="submit" '.array_to_params($params).' />';
		return $output;
	}

	public function reset($params) {
		$output = '<input type="reset" '.array_to_params($params).' />';
		return $output;
	}

	public function format($key, $value) {
		$output = '
			<div class="element">
				<label>
					'.$key.'
				</label>
				<div class="input_controls">'.$value.'</div>
				<div class="clearfix"></div>
			</div>
		';
		return $output;
	}
}

?>