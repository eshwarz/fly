<?php

class User extends ActiveRecord\Model {
	
	static $validates_presence_of = array(array('first_name'), array('last_name'), array('email'), array('password'), array('sex'));
	static $validates_uniqueness_of = array(array('email'));

	public static function genders() {
		return array(
			array('Male', 1),
			array('Female', 2)
		);
	}


	public static function authenticate($options = NULL) {
		
		$flag = static::checkOptions($options);
		if ($flag == 1) {
			if (isset($_COOKIE[USER_SESSION_KEY]) && isset($_COOKIE[USER_TIMEZONE_KEY]))
			{
				$_SESSION[USER_SESSION_KEY] = $_COOKIE[USER_SESSION_KEY];
				$_SESSION[USER_TIMEZONE_KEY] = $_COOKIE[USER_TIMEZONE_KEY];
			}

			$uid = $_SESSION[USER_SESSION_KEY];

			if (!$uid)
			{
				if ($_REQUEST['redirect'] == true)
				{
					$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
					$_SESSION['redirect'] = $url;
				}
				redirect_to(user_sign_in_path);
			}

		}
	}

	public static function checkOptions($options) {
		$action = Router::$_called_action;
		$flag = 0;
		// only option for authentication
		if (isset($options['only'])) {
			$key = array_search($action, $options['only']);
			if (is_integer($key))
				$flag = 1;
		}
		// except option for authentication
		elseif (isset($options['except'])) {
			$key = array_search($action, $options['except']);
			if (is_bool($key))
				$flag = 1;
		}
		// authentication required for all the methods in a controller if no arguments are passed.
		elseif ($options == NULL) {
			$flag = 1;
		}
		return $flag;
	}

}

?>