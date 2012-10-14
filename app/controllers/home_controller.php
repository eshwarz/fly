<?php

class HomeController extends ApplicationController {

	public function index() {

		$posts = Post::all( array( 'conditions' => "message LIKE '%hi%'", 'limit' => 10 ) );

		View::render(array('view' => 'index',
			'locals' => array('title' => 'Fly PHP', 'content' => 'We flied with PHP',	'posts' => $posts)
		));
	}

}

?>
