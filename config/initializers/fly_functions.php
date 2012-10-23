<?php
// Welcome to fly with PHP framework 
// For the easiest way to use PHP.
// This is an open source. Feel free to fork it at https://github.com/eshwarz/fly.git

// requiring all the files in a folder
function require_all($destination) {
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

// array to parameters
function array_to_params ($array) {
	$params = ' ';
	foreach ($array as $key => $value) {
		$params .= $key.'="'.$value.'" ';
	}
	return $params;
}

function require_js($file) {
	if (file_exists(ROOT . 'app/assets/javascripts/' . $file .'.js'))
		echo '<script src="' . JS_PATH . $file . '.js" type="text/javascript"></script>';
	else if (file_exists(ROOT . 'vendor/assets/javascripts/'. $file . '.js'))
		echo '<script src="' . VENDOR_JS_PATH . $file . '.js" type="text/javascript"></script>';
	else
		Fly::helper("Invalid File: {$file}.js", $file.'.js neither found in <b>app/assets/javascripts/</b> nor in <b>vendor/assets/javascripts/</b>');
}


function require_css($file) {
	$app_css = ROOT . 'app/assets/stylesheets/' . $file .'.css';
	$app_less = ROOT . 'app/assets/stylesheets/' . $file .'.less';
	$vendor_css = ROOT . 'vendor/assets/stylesheets/' . $file .'.css';
	$vendor_less = ROOT . 'vendor/assets/stylesheets/' . $file .'.less';

	if (file_exists($app_css))
		echo link_css(CSS_PATH.$file.'.css');
	else if (file_exists($app_less))
		echo link_less(CSS_PATH.$file.'.less');
	else if (file_exists($vendor_css))
		echo link_css(VENDOR_CSS_PATH.$file.'.css');
	else if (file_exists($vendor_less))
		echo link_less(VENDOR_CSS_PATH.$file.'.less');
	else
		Fly::helper("Invalid File: {$file}.less or {$file}.css", $file.'.less or '.$file.'.css neither found in <b>app/assets/stylesheets/</b> nor in <b>vendor/assets/stylesheets/</b>');
}

function link_to($text, $url, $params = array()) {
	$link = '<a href="'.SERVER_PATH.$url.'" '.array_to_params($params).'>'.$text.'</a>';
	echo $link;
}

function humanize($str) {
	$str = trim(strtolower($str));
	$str = preg_replace('/[^a-z0-9\s+]/', ' ', $str);
	$str = preg_replace('/\s+/', ' ', $str);
	$str = explode(' ', $str);
	$str = array_map('ucwords', $str);
	return implode(' ', $str);
}

// used once

function link_less($file) {
	return '<link rel="stylesheet/less" type="text/css" href="'.$file.'" />';
}
function link_css($file) {
	return '<link rel="stylesheet/css" type="text/css" href="'.$file.'"/>';
}

?>