<?php
/**
* Input class handles $_GET, $_POST, $_REQUEST, $_SERVER variables, user agent, etc
*/
class Input
{

	// acts as $_GET
	static function getParams ($key = null, $xss_filter = false) {
		// getting only particular parameter if key is set otherwise return full array.
		if (!empty($key)) {
			$value = $_GET[$key];
			// handling xss issues
			if ($xss_filter) {
				$value = self::xss_validate($value);
			}
			return $value;
		} else {
			return $_GET;
		}
	}

	// acts as $_POST
	static function postParams ($key = null, $xss_filter = false) {
		// getting only particular parameter if key is set otherwise return full array.
		if (!empty($key)) {
			$value = $_POST[$key];
			// handling xss issues
			if ($xss_filter) {
				$value = self::xss_validate($value);
			}
			return $value;
		} else {
			return $_POST;
		}
	}

	// acts as $_REQUEST
	static function params ($key = null, $xss_filter = false) {
		// getting only particular parameter if key is set otherwise return full array.
		if (!empty($key)) {
			$param = isset($_POST[$key]) ? self::postParams($key, $xss_filter) : self::getParams($key, $xss_filter);
			return $param;
		} else {
			return $_REQUEST;
		}
	}

	static function server ($key = null) {
		// getting only particular parameter if key is set otherwise return full array.
		if (!empty($key)) {
			return $_SERVER[$key];
		} else {
			return $_SERVER;
		}
	}

	// returns user agent
	static function userAgent () {
		return $_SERVER['HTTP_USER_AGENT'];
	}

	static function xss_validate ($str) {
		// Fix &entity\n;
		$str = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $str);
		$str = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $str);
		$str = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $str);
		$str = html_entity_decode($str, ENT_COMPAT, 'UTF-8');
		 
		// Remove any attribute starting with "on" or xmlns
		$str = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $str);
		 
		// Remove javascript: and vbscript: protocols
		$str = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $str);
		$str = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $str);
		$str = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $str);
		 
		// Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
		$str = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $str);
		$str = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $str);
		$str = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $str);
		 
		// Remove namespaced elements (we do not need them)
		$str = preg_replace('#</*\w+:\w[^>]*+>#i', '', $str);
		 
		do {
			// Remove really unwanted tags
			$old_data = $str;
			$str = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $str);
		} while ($old_data !== $str);
		 
		// returning the purified value
		return $str;
	}


}