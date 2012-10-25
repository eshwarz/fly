<?php

class User extends ActiveRecord\Model {
	
	public static function authenticate($options) {
		
		$flag = static::checkOptions($options);
		if ($flag == 1) {
			if (isset($_COOKIE['fly_user']) && isset($_COOKIE['fly_timezone']))
			{
				$_SESSION['fly_user'] = $_COOKIE['fly_user'];
				$_SESSION['fly_timezone'] = $_COOKIE['fly_timezone'];
			}

			$uid = $_SESSION['fly_user'];

			if (!$uid)
			{
				if ($_REQUEST['redirect'] == true)
				{
					$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
					$_SESSION['redirect'] = $url;
				}
				// redirect_to(root_path);
				die("User not logged in! :(");
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
		return $flag;
	}

}

?>