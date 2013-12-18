<?php

class BootstrapController extends ApplicationController {

	public static $layout = none;

	public function index() {
		global $locals;
		$locals['title'] = 'Fly PHP - Bootstrap 3.0 Templates';
		render(array('view' => 'index', 'layout' => 'application'));
	}

	public function starter() {}

	public function carousel() {}

}
