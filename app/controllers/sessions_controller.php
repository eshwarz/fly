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
			$uid = $_SESSION['fly_user'] = $user->id;
			$_SESSION['fly_timezone'] = 123;
			if ($credentials['remember'][0] == 1)
			{
				setcookie("fly_user", $uid, time()+60*60*24*30, "/");
				setcookie("fly_timezone", $password, time()+60*60*24*30, "/");
			}
			redirect_to(root_path);
		} else {
			redirect_to(user_sign_in_path.'?failed=1');
		}
		
	}

	public function destroy() {
		if (isset($_COOKIE['fly_user']) && isset($_COOKIE['fly_timezone']))
		{
			setcookie("fly_user", "", time()-60*60*24*30, "/");
			setcookie("fly_timezone", "", time()-60*60*24*30, "/");
		}
		
		unset($_SESSION['fly_user']);
		unset($_SESSION['fly_timezone']);
		
		session_destroy();
		redirect_to(root_path);
	}

}

?>