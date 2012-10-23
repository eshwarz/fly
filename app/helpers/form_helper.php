<?php

class Form {

	public static function form_tag ($options) {
		$class = isset($options['class']) ? $options['class'] : 'fly_form'; 

		if (isset($options['url'])) {
			$form = '<form action="'.SERVER_PATH.$options['url'].'" method="'.$options['method'].'" class="'.$class.'">';
		}
		elseif (isset($options['action'])) {
			$controller = Router::$_called_controller;
			$form = '<form action="'.SERVER_PATH.$controller.'/'.$options['action'].'" method="'.$options['method'].'" class="'.$class.'">';
		}
			echo $form;
	}

	public static function end_form () {
		echo "</form>";
	}

	public static function input ($name, $params) {
		$id = isset($params['id']) ? $params['id'] : $name;
		$type = isset($params['as']) ? $params['as'] : 'text';
		$label = isset($params['label']) ? $params['label'] : ucwords(humanize($name));
		
		$params['id'] = $id;
		unset($params['as']);

		// text and password
		if ($type == 'text' || $type == 'password') {
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
			$input = '<select name="'.$name.'" '.array_to_params($params).' id="'.$name.'">';
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

		$output = '
			<div class="element">
				<label for="'.$id.'" >'.$label.'</label>
				<div class="input_controls">'.$input.'</div>
				<div class="clearfix"></div>
			</div>
		';
		echo $output;
	}

	public static function submit($params) {
		$output = '<input type="submit" '.array_to_params($params).' />';
		return $output;
	}

	public static function reset($params) {
		$output = '<input type="reset" '.array_to_params($params).' />';
		return $output;
	}

	public static function format($key, $value) {
		$output = '
			<div class="element">
				<label>'.$key.'</label>
				<div class="input_controls">'.$value.'</div>
				<div class="clearfix"></div>
			</div>
		';
		echo $output;
	}
}

?>