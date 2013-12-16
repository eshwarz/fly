<?php

class SessionsController extends ApplicationController {

	public function _new() {
		if (current_user()) {
			redirect_to(root_path);
		} else {
			render (array('view' => 'new', 'locals' => array('title' => 'Fly - Sign In')));
		}
	}

	public function create() {
		$credentials = $_POST['User'];
		$user = User::find_by_email($credentials['email']);

		if ($user->password == md5($credentials['password'])) {
			
			// authenticating user
			session_start();
			set_session(USER_SESSION_KEY, $user->id);
			$uid = $user->id;
			set_session(USER_TIMEZONE_KEY, 123);
			if ($credentials['remember'][0] == '1')
			{
				set_cookie(USER_SESSION_KEY, $uid, REMEMBER_ME_EXPIRE_TIME);
				set_cookie(USER_TIMEZONE_KEY, 123, REMEMBER_ME_EXPIRE_TIME);
			}
			redirect_to(AFTER_SIGN_IN_PATH);
		} else {
			redirect_to(user_sign_in_path.'?failed=1');
		}
		
	}

	public function destroy() {
		$user_session_cookie = cookie(USER_SESSION_KEY);
		$user_timezone_cookie = cookie(USER_TIMEZONE_KEY);
		if (isset($user_session_cookie) && isset($user_timezone_cookie))
		{
			remove_cookie(USER_SESSION_KEY);
			remove_cookie(USER_TIMEZONE_KEY);
		}
		
		remove_session(USER_SESSION_KEY);
		remove_session(USER_TIMEZONE_KEY);
		
		session_destroy();
		redirect_to(root_path);
	}

}

?>