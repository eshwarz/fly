<?php

class RegistrationsController extends ApplicationController {

	public function _new() {
		View::render( array( 'view' => 'new', 'locals' => array( 'title' => 'Fly - SignUp' ) ) );
	}

	public function create() {
		$user = $_POST['User'];

		// creating user with above filleds

	}

}

?>