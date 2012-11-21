<?php

class RegistrationsController extends ApplicationController {

	public function _new() {
		View::render( array( 'view' => 'new', 'locals' => array( 'title' => 'Fly - Sign Up' ) ) );
	}

	public function create() {
		$user = $_POST['User'];
		
		// creating user with above fields
		if ($user['password'] == $user['confirm_password']) {
			unset($user['confirm_password']);

			// one way md5 hash encription on password.
			$user['password'] = md5($user['password']);
			
			User::create($user);
			redirect_to(user_sign_in_path);
		}
	}

}

?>