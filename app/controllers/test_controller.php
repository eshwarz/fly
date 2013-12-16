<?php

class TestController extends ApplicationController {

	public function before_filter() {
		User::authenticate(array('only' => array('profile')));
	}

	public function index() {
		$version = Fly::version();
		$locals['title'] = 'Fly PHP ' . $version;
		$locals['note'] = b('Note:') . ' This is a test page by '. b('Fly PHP') . '. Delete the corresponding controller and the view file itself or it can even be kept for later reference.';
		render(array('view' => 'index', 'locals' => $locals));
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

	public function helpers() {
		$locals['title'] = 'Fly PHP - Usage of HTML Helpers';
		render(array('view' => 'helpers', 'locals' => $locals));
	}

	public function input()
	{
		$locals['title'] = 'FlyPHP - Usage of Input Helpers';
		$locals['params'] = params();
		$locals['id'] = params('id');
		$locals['fruit'] = getParams('fruit');
		
		render(array('view' => 'input', 'locals' => $locals));
	}

	protected function trail() {
		// protected methods cannot be accessed from the browser
	}

}