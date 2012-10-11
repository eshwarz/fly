<?php

class HomeController extends ApplicationController {

	public function index() {

		$posts = Post::all();

		View::render(array('view' => 'index',
			'locals' => array(
												'title' => 'Fly with PHP',
												'content' => 'We flied with PHP',
												'posts' => $posts
											)
		));
	}

}

?>
