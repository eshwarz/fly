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
			static::yield_view($controller, $action, $opts);
		}

		// view only. Ex: View::render( array( 'view' => 'xxx' ) )
		elseif (!empty($opts['view'])) {
			$controller = Router::$_called_controller;
			$action = $opts['view'];
			static::yield_view($controller, $action, $opts);
		}

		// partial (used in views). Ex: View::render( array( 'partial' => 'xxx' ) )
		elseif (!empty($opts['partial'])) {
			$locals = $opts['locals'];
			if (!empty($locals))
				extract($locals);
			$controller = Router::$_called_controller;
			$partial = $opts['partial'];
			$partial_array = explode('/', $partial);
			
			// partial in a controller.
			if (count($partial_array) == 1)
				include VIEW_PATH . $controller . '/_' . $partial . '.html.php';
			else { // partial in another view folder.
				$partial_file = array_pop($partial_array);
				$folders = implode('/', $partial_array);
				include VIEW_PATH . $folders. '/_' . $partial_file . '.html.php';
			}
		}

	}

	protected static function yield_view($controller, $action, $opts) {
		$locals = $opts['locals'];
		
		$view_path = VIEW_PATH . $controller . '/' . $action . '.html.php';
		$layout_file = isset($opts['layout']) ? $opts['layout'] . '.html.php' : 'application.html.php';
		$layout_path = VIEW_PATH . 'layouts/' . $layout_file;
		$view_content = file_get_contents($view_path);
		
		static::yield($view_content, $layout_path, $locals);
	}

	public static function yield($view_content, $layout_path, $locals = null) {
		if (!empty($locals))
			extract($locals);

		$layout_content = file_get_contents($layout_path);
		$new_file_content = str_replace('{{yield}}', $view_content, $layout_content);
		$new_file_name = ROOT . 'temp/' . microtime(rand().uniqid()) . '.php';
		$temp_file = file_put_contents($new_file_name, $new_file_content);

		require $new_file_name;
		unlink ($new_file_name);
	}



}

?>