<?php

class ApplicationController {

	function __construct() {
		// getting the user details from cookie in case of any
		$user_session_cookie = cookie(USER_SESSION_KEY);
		$user_timezone_cookie = cookie(USER_TIMEZONE_KEY);

		// decoding the uid from the cookie and storing in the session
		if (!empty($user_session_cookie)) {
			$decoded_session_uid = base64_decode($user_session_cookie);
			$uid = str_replace(USER_SESSION_KEY_SALT, '', $decoded_session_uid);
			if (!empty($uid) && isset($user_timezone_cookie)) {
				set_session(USER_SESSION_KEY, $uid);
				set_session(USER_TIMEZONE_KEY, $user_timezone_cookie);
			}
		}


	}

}

?>