<?php
/**
* Input class handles $_GET, $_POST, $_REQUEST, $_SERVER variables, user agent, etc
*/
class Input
{

	// acts as $_GET
	static function getParams ($key = null, $xss_filter = false)
	{
		// getting only particular parameter if key is set otherwise return full array.
		if (!empty($key)) {
			return $_GET[$key];
		} else {
			return $_GET;
		}
	}

	// acts as $_POST
	static function postParams ($key = null, $xss_filter = false)
	{
		// getting only particular parameter if key is set otherwise return full array.
		if (!empty($key)) {
			return $_POST[$key];
		} else {
			return $_POST;
		}
	}

	// acts as $_REQUEST
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

	static function server ($key = null)
	{
		// getting only particular parameter if key is set otherwise return full array.
		if (!empty($key)) {
			return $_SERVER[$key];
		} else {
			return $_SERVER;
		}
	}

	// returns user agent
	static function userAgent ()
	{
		return $_SERVER['HTTP_USER_AGENT'];
	}


}