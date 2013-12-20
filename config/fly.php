<?php

// Welcome to fly with PHP framework 
// For the easiest way to use PHP.
// This is an open source software. Feel free to fork it at http://github.com/eshwarz/fly
// Fly main class

class Fly {

	private static $_version = 1.1;

	static function version ()
	{
		return self::$_version;
	}

	static function require_all ($destination)
	{
		$dir = opendir($destination);
		while ($file = readdir($dir))
		{
			if ($file!='.' && $file!='..')
			{
				require_once $destination."/".$file;
			}
		}
		closedir($dir);
	}

	static function require_js ($file)
	{
		if (file_exists(ROOT . 'app/assets/javascripts/' . $file .'.js'))
			echo '<script src="' . JS_PATH . $file . '.js" type="text/javascript"></script>';
		else if (file_exists(ROOT . 'vendor/assets/javascripts/'. $file . '.js'))
			echo '<script src="' . VENDOR_JS_PATH . $file . '.js" type="text/javascript"></script>';
		else
			FlyHelper::helper("Invalid File: {$file}.js", $file.'.js neither found in <b>app/assets/javascripts/</b> nor in <b>vendor/assets/javascripts/</b>');
	}

	static function require_css ($file)
	{
		$app_css = ROOT . 'app/assets/stylesheets/' . $file .'.css';
		$app_less = ROOT . 'app/assets/stylesheets/' . $file .'.less';
		$vendor_css = ROOT . 'vendor/assets/stylesheets/' . $file .'.css';
		$vendor_less = ROOT . 'vendor/assets/stylesheets/' . $file .'.less';

		if (file_exists($app_css))
			echo self::link_css(CSS_PATH.$file.'.css');
		else if (file_exists($app_less))
			echo self::link_less(CSS_PATH.$file.'.less');
		else if (file_exists($vendor_css))
			echo self::link_css(VENDOR_CSS_PATH.$file.'.css');
		else if (file_exists($vendor_less))
			echo self::link_less(VENDOR_CSS_PATH.$file.'.less');
		else
			FlyHelper::helper("Invalid File: {$file}.less or {$file}.css", $file.'.less or '.$file.'.css neither found in <b>app/assets/stylesheets/</b> nor in <b>vendor/assets/stylesheets/</b>');
	}

	static function humanize ($str)
	{
		$str = trim(strtolower($str));
		$str = preg_replace('/[^a-z0-9\s+]/', ' ', $str);
		$str = preg_replace('/\s+/', ' ', $str);
		$str = explode(' ', $str);
		$str = array_map('ucwords', $str);
		return implode(' ', $str);
	}

	//to escape apostrophe and slashes, etc.
	static function escape_data ($data) 
	{
		if (ini_get('magic_quotes_gpc')) 
		{
			$data = stripslashes($data);
		}
		$data = str_replace("\n","<br>",$data);
		return mysql_real_escape_string(trim($data), $con);
	}


	// used once
	static function link_less ($file)
	{
		$less_file = $file;
		$less_file_path = ROOT . str_replace(SERVER_PATH, '', $less_file);

		$file_parts = explode('/', $file);
		$less_filename = $file_parts[count($file_parts) - 1];
		$filename = str_replace('.less', '.css', $less_filename);
		$file = str_replace($less_filename, 'compiled/' . $filename, $file);
		
		$css_file = $file;
		$css_file_path = ROOT . str_replace(SERVER_PATH, '', $css_file);

		$less = new lessc;
		try {
			$less->checkedCompile($less_file_path, $css_file_path);
		} catch (exception $e) {
			FlyHelper::helper("Failed to Compile less: {$less_file_path}", $e->getMessage());
		}
		if (LESS_STYLE_ON_DEV == true && ENV == 'development') {
			$style = $less_file;
			$rel = 'stylesheet/less';
		} else {
			$style = $css_file;
			$rel = 'stylesheet';
		}
		return '<link rel="' . $rel . '" type="text/css" href="' . $style . '" />';
	}

	static function link_css ($file)
	{
		return '<link rel="stylesheet" type="text/css" href="' . $file . '"/>';
	}

	static function errorHandler ($severity, $error, $file, $line)
	{
		switch ($severity) {
			case E_WARNING:
				$error_level = 'E_WARNING';
				break;
			case E_NOTICE:
				$error_level = 'E_NOTICE';
				return;
				break;
			case E_STRICT:
				$error_level = 'E_STRICT';
				break;
			case E_ERROR:
				$error_level = 'E_ERROR';
				break;
			case E_USER_ERROR:
				$error_level = 'E_USER_ERROR';
				break;
			default:
				$error_level = 'UNKNOWN';
				break;
		}

		$message = content_tag('pre', $error, array('style' => 'color: #FF7B7B;'));
		$message .= content_tag('pre', 'In file: ' . $file);
		$message .= content_tag('pre', 'At line: ' . $line);

		FlyHelper::helper('Severity: ' . $error_level . ', No: ' . $severity, $message);
	}

	static function shutdown ()
	{
		if ($error = error_get_last()) {
			switch ($error['type']) {
				case E_ERROR:
					$error_level = 'ERROR';
					break;
				case E_WARNING:
					$error_level = 'WARNING';
					break;
				case E_CORE_ERROR:
					$error_level = 'CORE_ERROR';
					break;
				case E_USER_ERROR:
					$error_level = 'USER_ERROR';
					break;
				case E_RECOVERABLE_ERROR:
					$error_level = 'RECOVERABLE_ERROR';
					break;
				case E_CORE_WARNING:
					$error_level = 'CORE_WARNING';
					break;
				case E_COMPILE_WARNING:
					$error_level = 'COMPILE_WARNING';
					break;
				case E_PARSE:
					$error_level = 'PARSE';
					break;
				case E_USER_NOTICE:
					$error_level = 'E_USER_NOTICE';
					break;
				case E_NOTICE:
					$error_level = 'E_NOTICE';
					return;
					break;
				default:
					$error_level = 'UNKNOWN';
					break;
			}
			$message = content_tag('pre', b('Message: ' . $error['message']), array('style' => 'color: #FF7B7B;'));
			$message .= content_tag('pre', b('In file: ') . $error['file']);
			$message .= content_tag('pre', b('At line: ') . $error['line']);

			FlyHelper::helper('Severity: ' . $error_level . ', Type: ' . $error['type'], $message);
		}
	}

}