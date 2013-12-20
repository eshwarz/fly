<?php

/**
* Session, Cookie handler
*/

class Session
{

	private static $_cookie_domain = COOKIE_DOMAIN;

	private static $_cookie_path = COOKIE_PATH;

	static function setSession ($key, $value)
	{
		$_SESSION[$key] = $value;
		return $value;
	}

	static function getSession ($key = null)
	{
		if (!empty($key)) {
			return $_SESSION[$key];
		} else {
			return $_SESSION;
		}
	}

	static function removeSession ($key = null)
	{
		if (!empty($key)) {
			unset($_SESSION[$key]);
		}
	}

	static function saveCookie ($key, $value, $expire = 0, $path = COOKIE_PATH, $domain = COOKIE_DOMAIN, $secure = false, $httponly = false)
	{
		setcookie($key, $value, time() + (int)$expire, $path);
	}

	static function cookie ($key = null)
	{
		if (!empty($key)) {
			return $_COOKIE[$key];
		} else {
			return $_COOKIE;
		}
	}

	static function removeCookie ($key)
	{
		if (!empty($key)) {
			setcookie($key, '', time() - 1, COOKIE_PATH);
		}
	}
	
}