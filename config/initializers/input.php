<?php
/**
* Input class handles $_GET, $_POST, $_REQUEST, $_COOKIE, $_SESSION, $_SERVER variables, user agent, etc
*/
class Input
{

	function __construct()
	{
	}

	static function getParams ($key = null, $xss_filter = false)
	{
		// getting only particular parameter if key is set otherwise return full array.
		if (!empty($key)) {
			return $_GET[$key];
		} else {
			return $_GET;
		}
	}

	static function postParams ($key = null, $xss_filter = false)
	{
		// getting only particular parameter if key is set otherwise return full array.
		if (!empty($key)) {
			return $_POST[$key];
		} else {
			return $_POST;
		}
	}

	static function params ($key = null, $xss_filter = false)
	{
		// getting only particular parameter if key is set otherwise return full array.
		if (!empty($key)) {
			$param = isset($_POST[$key]) ? self::postParams($key, $xss_filter) : self::getParams($key, $xss_filter);
			return $param;
		} else {
			return $_REQUEST;
		}
	}


}