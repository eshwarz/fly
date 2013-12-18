<?php

class TestController extends ApplicationController {

	// public static $layout = 'test';

	public function before_filter() {
		User::authenticate(array('only' => array('profile')));
	}

	public function index()
	{
		global $locals;
		$version = Fly::version();
		$locals['title'] = 'Fly PHP ' . $version;
		$locals['note'] = b('Note:') . ' This is a test page by '. b('Fly PHP') . '. Delete the corresponding controller and the view file itself or it can even be kept for later reference.';
	}

	public function posts()
	{
		global $locals;
		// $posts = Post::all( array( 'conditions' => "message LIKE '%hi%'", 'limit' => 10 ) );
		$locals['title'] = 'Fly PHP';
		$locals['content'] = 'We flied with PHP';
		$locals['posts'] = $posts;
	}

	public function forms()
	{
		global $locals;
		$locals['title'] = 'Fly PHP';
	}

	public function profile()
	{
		global $locals;
		$locals['title'] = 'Fly PHP';
	}

	public function helpers()
	{
		global $locals;
		$locals['title'] = 'Fly PHP - Usage of HTML Helpers';
	}

	public function input()
	{
		global $locals;
		$locals['title'] = 'FlyPHP - Usage of Input Helpers';
		$locals['params'] = params();
		$locals['id'] = params('id');
		$locals['fruit'] = get_params('fruit');
	}

	protected function trail()
	{
		// protected methods cannot be accessed from the browser
	}

	public function view_test()
	{
		
	}

}