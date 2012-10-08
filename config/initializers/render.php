<?php

class View {

	public static function render ($opts = array()) {
		
		// use can also pass layout as array element to render a view along with layout.
		// multiple declarations returns error.
		
		if ( (!empty($opts['controller']) && !empty($opts['view'])) || (!empty($opts['controller']) && !empty($opts['partial'])) || (!empty($opts['partial']) && !empty($opts['view'])) || (count($opts) < 1) ) {
			Fly::helper('Cannot call render!', Code::render());
		}

		// controller/action with locals. Ex: View::render( array( 'controller' => 'xxx', 'action' => 'xxx' ) )
		elseif (!empty($opts['controller']) && !empty($opts['action']) && !empty($opts['locals'])) {
			$controller = $opts['controller'];
			$action = $opts['action'];
			static::yield($controller, $action, $opts);
		}

		// view only. Ex: View::render( array( 'view' => 'xxx' ) )
		elseif (!empty($opts['view'])) {
			$controller = Router::$_called_controller;
			$action = $opts['view'];
			static::yield($controller, $action, $opts);
		}

		// partial (used in views). Ex: View::render( array( 'partial' => 'xxx' ) )
		elseif (!empty($opts['partial'])) {
			$locals = $opts['locals'];
			extract($locals);
			$controller = Router::$_called_controller;
			$partial = $opts['partial'];
			include VIEW_PATH . $controller . '/_' . $partial . '.html.php';
		}

	}

	protected static function yield($controller, $action, $opts) {
		$locals = $opts['locals'];
		extract($locals);
		
		$view_path = VIEW_PATH . $controller . '/' . $action . '.html.php';
		$layout_file = isset($opts['layout']) ? $opts['layout'] . '.html.php' : 'application.html.php';
		$layout_path = VIEW_PATH . 'layouts/' . $layout_file;

		$layout_content = file_get_contents($layout_path);
		$view_content = file_get_contents($view_path);
		$new_file_content = str_replace('{{yield}}', $view_content, $layout_content);
		$new_file_name = ROOT . 'temp/' . microtime(rand().uniqid()) . '.php';
		$temp_file = file_put_contents($new_file_name, $new_file_content);

		require $new_file_name;
		unlink ($new_file_name);
	}



}

?>