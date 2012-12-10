<?php

class TestController extends ApplicationController {

	public function before_filter() {
		User::authenticate( array('only' => array('profile')) );
	}

	public function index() {

		render (array('view' => 'index',
			'locals' => array(
												'title' => 'Fly PHP',
												'content' => 'This is a test page by <b>Fly PHP</b>. Delete the corresponding controller and the view file itself or it can even be kept for later reference.'
											)
		));
	}



	public function posts() {

		// $posts = Post::all( array( 'conditions' => "message LIKE '%hi%'", 'limit' => 10 ) );

		render (array('view' => 'posts',
			'locals' => array('title' => 'Fly PHP', 'content' => 'We flied with PHP',	'posts' => $posts)
		));
	}

	public function forms() {
		// redirect_to (test_path);
		render (array('view' => 'forms', 'locals' => array( 'title' => 'Fly PHP' )));
	}

	public function profile() {
		render (array('view' => 'profile', 'locals' => array( 'title' => 'Fly PHP' )));
	}

}

?>