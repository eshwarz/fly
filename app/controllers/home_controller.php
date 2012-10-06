<?php

class HomeController extends ApplicationController {

	public function index() {
		View::render(array(
			'controller' => 'home',
			'action' => 'index',
			'params' => array(
									'title' => 'Try Fly',
									'content' => 'We flied with PHP'
								)
		));
	}

}

?>
