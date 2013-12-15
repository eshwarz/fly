<?php
// Welcome to fly with PHP framework 
// For the easiest way to use PHP.
// This is an open source software. Feel free to fork it at http://github.com/eshwarz/fly

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
	return Html::array_to_params($array);
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
	return Html::link_to($text, $url, $params);
}

function redirect_to($path) {
	return Html::redirect_to($path);
}

function content_tag($tag, $content, $options = array()) {
	return Html::content_tag($tag, $content, $options);
}

// strong tag
function strong($content, $options = array()) {
	return Html::strong($content, $options);
}

// b tag
function b($content, $options = array()) {
	return Html::b($content, $options);
}

// i tag
function i($content, $options = array()) {
	return Html::i($content, $options);
}

// u tag
function u($content, $options = array()) {
	return Html::u($content, $options);
}

// em tag
function em($content, $options = array()) {
	return Html::em($content, $options);
}

// br tag
function br() {
	return Html::br();
}

// hr tag
function hr() {
	return Html::hr();
}

function humanize($str) {
	$str = trim(strtolower($str));
	$str = preg_replace('/[^a-z0-9\s+]/', ' ', $str);
	$str = preg_replace('/\s+/', ' ', $str);
	$str = explode(' ', $str);
	$str = array_map('ucwords', $str);
	return implode(' ', $str);
}

//to escape apostrophe and slashes, etc.
function escape_data ($data) 
{
	if (ini_get('magic_quotes_gpc')) 
	{
		$data = stripslashes($data);
	}
	$data = str_replace("\n","<br>",$data);
	return mysql_real_escape_string(trim($data), $con);
}


// used once

function link_less($file) {
	return '<link rel="stylesheet/less" type="text/css" href="'.$file.'" />';
}

function link_css($file) {
	return '<link rel="stylesheet/css" type="text/css" href="'.$file.'"/>';
}