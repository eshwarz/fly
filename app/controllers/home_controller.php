<?php

class HomeController extends ApplicationController {

	public function index() {

		View::render(array('view' => 'index',
			'locals' => array(
												'title' => 'Fly with PHP',
												'content' => 'We flied with PHP'
											)
		));

		// View::render(array('controller' => 'home', 'action' => 'index',
		// 	'locals' => array(
		// 										'title' => 'Fly with PHP',
		// 										'content' => 'We flied with PHP'
		// 									)
		// ));
	}

}

?>
