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
			$uid = $_SESSION[USER_SESSION_KEY] = $user->id;
			$_SESSION[USER_TIMEZONE_KEY] = 123;
			if ($credentials['remember'][0] == '1')
			{
				setcookie(USER_SESSION_KEY, $uid, time()+60*60*24*30, "/");
				setcookie(USER_TIMEZONE_KEY, $password, time()+60*60*24*30, "/");
			}
			redirect_to(AFTER_SIGN_IN_PATH);
		} else {
			redirect_to(user_sign_in_path.'?failed=1');
		}
		
	}

	public function destroy() {
		if (isset($_COOKIE[USER_SESSION_KEY]) && isset($_COOKIE[USER_TIMEZONE_KEY]))
		{
			setcookie(USER_SESSION_KEY, "", time()-60*60*24*30, "/");
			setcookie(USER_TIMEZONE_KEY, "", time()-60*60*24*30, "/");
		}
		
		unset($_SESSION[USER_SESSION_KEY]);
		unset($_SESSION[USER_TIMEZONE_KEY]);
		
		session_destroy();
		redirect_to(root_path);
	}

}

?>