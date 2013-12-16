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
		return '<link rel="stylesheet/less" type="text/css" href="'.$css_file.'" />';
	}

	static function link_css ($file)
	{
		return '<link rel="stylesheet/css" type="text/css" href="'.$file.'"/>';
	}

}