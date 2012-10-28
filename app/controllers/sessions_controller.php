<?php

class SessionsController extends ApplicationController {

	public function _new() {
		View::render(array('view' => 'new', 'locals' => array('title' => 'Fly - Sign In')));
	}

}

?>