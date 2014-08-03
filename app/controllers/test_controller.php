<?php

class TestController extends ApplicationController {

	// public static $layout = 'test';

	public function before_filter() {
		User::authenticate(array('only' => array('profile')));
	}

	public function after_filter() {
		echo content_tag('div', 'Rendered View: ' . Router::$_called_controller . '/' . Router::$_called_action, array('class' => 'tc m10'));
		echo content_tag('div', 'Rendered Layout: ' . View::$_rendered_layout, array('class' => 'tc m10'));
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
		$locals['user'] = current_user();
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

	public function arguments($id, $id2 = null)
	{
		if (!$id) {
			redirect_to(test_path);
		}
		global $locals;
		$locals['title'] = 'Fly PHP - Arguments';
		$locals['id'] = $id;
		$locals['id2'] = $id2;

		render(array('view' => 'arguments', 'layout' => 'test'));
	}

	protected function trail()
	{
		// protected methods cannot be accessed from the browser
	}

	private function trail1()
	{
		// private methods cannot be accessed from the browser
	}

	public function view_test()
	{
		// this method throws error as it fails to load the view file
		// render(array('view' => 'none'));
	}

	public function xss_test() {
		global $locals;
		$l['title'] = 'XSS Testing';
		$locals = $l;
	}

}