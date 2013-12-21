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

	public static function getGender($sex) {
		$sex = (int) $sex;
		if ($sex == 1) {
			return 'Male';
		} elseif ($sex == 2) {
			return 'Female';
		} else {
			return false;
		}
	}

	public static function authenticate($options = NULL) {
		
		$flag = static::checkOptions($options);
		if ($flag == 1) {
			$user_session_cookie = cookie(USER_SESSION_KEY);
			$user_timezone_cookie = cookie(USER_TIMEZONE_KEY);
			if (isset($user_session_cookie) && isset($user_timezone_cookie))
			{
				set_session(USER_SESSION_KEY, $user_session_cookie);
				set_session(USER_TIMEZONE_KEY, $user_timezone_cookie);
			}

			$uid = session(USER_SESSION_KEY);

			if (!$uid)
			{
				if (params('redirect') == true)
				{
					$url = "http://".server('HTTP_HOST').server('REQUEST_URI');
					set_session('redirect', $url);
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