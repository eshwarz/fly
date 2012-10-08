<?php

class Registry
{
	protected static $_data = array();

	public static function set($key, $value) {
		static::$_data[$key] = $value;
	}

	public static function get($key) {
		return static::$_data[$key];
	}

}

?>